<?php
	class Main extends CI_Controller {
    
    //Главная страница|Кузнецов
	public function index()
	{
        $this->load->view('templates/header');
        $this->load->view('templates/navbar');
        $this->load->view('pages/home');
        $this->load->view('templates/footer');
	}

    //Просмотр товара с фильтром
    public function product()
    {
        //Пагинация
        $this->load->library('pagination');
        $this->load->model('price_m');

        $search = $this->input->post('search');
        
        if (!empty($_POST))
        {
            $a = 0;

            if ($search != NULL)
            {
                $data_filter = array(
                    'search' => $search
                );
            }
            else
            {
                $data_filter = array();
            }

            foreach ($this->price_m->sel_group() as $row)
            {
                array_push($data_filter, $this->input->post($row['ID_group']));
                if ($this->input->post($row['ID_group']) != NULL) $a++;
            }

            $this->session->set_userdata('filter', $data_filter);
            $this->session->set_userdata('check', $a);
        }
        
        $config['base_url']   = base_url('main/product');
        $config['per_page']   = 8;
        
        //Стиль пагинации
        $config['full_tag_open']   = '<nav><ul class="pagination">';
        $config['full_tag_close']  = '</ul></nav>';
        $config['first_tag_open']  = '<li class="page-item">';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open']   = '<li class="page-item">';
        $config['last_tag_close']  = '</li>';
        $config['num_tag_open']    = '<li class="page-item">';
        $config['num_tag_close']   = '</li>';
        $config['cur_tag_open']    = '<li class="page-item active"><a class="page-link">';
        $config['cur_tag_close']   = '</a></li>';
        $config['first_link']      = 'Первая';
        $config['last_link']       = 'Последняя';
        $config['next_link']       = FALSE;
        $config['prev_link']       = FALSE;
        $config['attributes']      = array('class' => 'page-link');

        //Проверка, включается ли фильтр
        if ($this->session->userdata('check') > 0)
        {
            $config['total_rows'] = count($this->price_m->sel_product_filter($this->session->userdata('filter'), $search, NULL, NULL));
            $this->pagination->initialize($config);
            $data['product'] = $this->price_m->sel_product_filter($this->session->userdata('filter'), $search, $config['per_page'], $this->uri->segment(3));
        }
        //Проверка, включается ли поиск
        elseif ($search != NULL)
        {
            $config['total_rows'] = count($this->price_m->sel_product_search($search, NULL, NULL));
            $this->pagination->initialize($config);
            $data['product'] = $this->price_m->sel_product_search($search, $config['per_page'], $this->uri->segment(3));
        }
        else
        {
            $config['total_rows'] = count($this->price_m->sel_product(NULL, NULL));
            $this->pagination->initialize($config);
            $data['product'] = $this->price_m->sel_product($config['per_page'], $this->uri->segment(3));
        }

        $data['group']   = $this->price_m->sel_group();

        //Сессия
		$data['session'] = $this->session->userdata('login_session');
        $data['filter']  = $this->session->userdata('filter');
        $this->load->view('templates/header');
        $this->load->view('templates/navbar_contragent', $data);
        $this->load->view('pages/product_list', $data);
        $this->load->view('templates/footer');
    }

    //Завершение сессии|Кузнецов
    public function exit()
    {
		$this->load->model('user_m');
		$this->user_m->kill_session();
		redirect(base_url());
    }
}
?>