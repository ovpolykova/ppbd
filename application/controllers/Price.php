<?php
    class Price extends CI_Controller {

    //Просмотр прайс-листов|Кузнецов
    public function browse_price()
    {
        $this->load->model('price_m');
        $this->load->library('pagination');

        if (!empty($_POST))
        {
            $data_filter = array();
            $a = 0;

            foreach ($this->price_m->sel_group() as $row)
            {
                array_push($data_filter, $this->input->post($row['ID_group']));
                if ($this->input->post($row['ID_group']) != NULL) $a++;
            }

            $this->session->set_userdata('filter', $data_filter);
            $this->session->set_userdata('check', $a);
        }

        //Пагинация
        $config['base_url'] = base_url('price/browse_price');
        $config['per_page'] = 10;
        
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
            $config['total_rows'] = count($this->price_m->sel_product_filter($this->session->userdata('filter'), NULL, NULL, NULL));
            $this->pagination->initialize($config);
            $data['product'] = $this->price_m->sel_product_filter($this->session->userdata('filter'), NULL, $config['per_page'], $this->uri->segment(3));
        }
        else
        {
            $config['total_rows'] = count($this->price_m->sel_product(NULL, NULL));
            $this->pagination->initialize($config);
            $data['product'] = $this->price_m->sel_product($config['per_page'], $this->uri->segment(3));
        }

        $data['type_t'] = $this->price_m->sel_type_t();
        $data['valuta'] = $this->price_m->sel_valuta();
        $data['price']  = $this->price_m->sel_price();
        $data['group']  = $this->price_m->sel_group();

        //Сессия
        $data['filter']  = $this->session->userdata('filter');
        $data['session'] = $this->session->userdata('login_session');

        $this->load->view('templates/header');
        $this->load->view('templates/navbar_admin', $data);
        $this->load->view('pages/price', $data);
        $this->load->view('templates/footer');
    }

    //Добавление прайс-листа|Кузнецов
    public function add_price()
    {
        if (!empty($_POST))
        {
            $data = array(
                'ID_product' => $this->input->post('ID_product'),
                'ID_type_t'  => $this->input->post('ID_type_t'),
                'ID_valuta'  => $this->input->post('ID_valuta'),
                'price'      => $this->input->post('price')
            );

            $this->load->model('price_m');
            $this->price_m->add_price($data);
            
            redirect('price/browse_price');
        }
    }

    //Изменение прайс-листа|Кузнецов
    public function upd_price()
    {
        $data = array(
            'ID_product' => $this->input->post('ID_product'),
            'ID_type_t'  => $this->input->post('ID_type_t'),
            'ID_valuta'  => $this->input->post('ID_valuta'),
            'price'      => $this->input->post('price')
        );
        $id = "ID_list=".$this->input->post('ID_list');
        
        $this->load->model('price_m');
        $this->price_m->upd_price($data, $id);

        redirect('price/browse_price');
    }

    //Удаление прайс-листа|Кузнецов
    public function del_price()
    {
        $data = array(
            'ID_list' => $_GET['ID_list']
        );

        $this->load->model('price_m');
        $this->price_m->del_price($data);

        redirect('price/browse_price');
    }
    
    //Изменение цены товара с привязкой к определенному прайс-листу|Кузнецов
    public function upd_price_product()
    {
        $a = 1;
        
        for ($i=1; $i <= $this->input->post('count_list'); $i++) { 
            $id = $this->input->post('value'.$a++);
            $valuta = $this->input->post('value'.$a++);
            $price = $this->input->post('value'.$a++);

            $this->load->model('product_m');
            $this->product_m->upd_price_product($valuta, $price, $id);
        }

        redirect('price/browse_price');
    }
}
