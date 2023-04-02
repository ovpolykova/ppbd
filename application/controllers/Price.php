<?php
	class Price extends CI_Controller {

    //Просмотр прайс-листов|Кузнецов
	public function browse_price()
	{
        //Сессия
		$data['session'] = $this->session->userdata('login_session');
        $this->load->model('price_m');

        $data_filter = array();
        //Фильтр
        foreach ($this->price_m->sel_group() as $row) {
            if (isset($_GET[$row['ID_group']])) {
                array_push($data_filter, $row['ID_group']);
            }
        }

        $data['type_t']  = $this->price_m->sel_type_t();
        $data['valuta']  = $this->price_m->sel_valuta();
        
        $this->load->library('pagination');

        if ($_GET) {
            $data['product'] = $this->price_m->sel_product_filter($data_filter);
        } else {
            $data['product'] = $this->price_m->sel_product();
        }
        
        $data['price']   = $this->price_m->sel_price();
        $data['group']   = $this->price_m->sel_group();

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
            'ID_list' => $this->input->post('ID_list')
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