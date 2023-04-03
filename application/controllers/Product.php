<?php
	class Product extends CI_Controller {

    //Просмотр товаров с привязкой к определенному прайс-листу|Кузнецов
	public function browse_product_price()
	{
        //Сессия
		$data['session'] = $this->session->userdata('login_session');

        $this->load->model('product_m');
        $data['product'] = $this->product_m->sel_product();
        $this->load->model('price_m');
        $data['price'] = $this->price_m->sel_price();
        $data['valuta'] = $this->price_m->sel_valuta();
        
        $this->load->view('templates/header');
        $this->load->view('templates/navbar_admin', $data);
        $this->load->view('pages/product', $data);
        $this->load->view('templates/footer');
	}

    //Просмотр товаров|Волобуев
	public function browse_product()
	{
        //Сессия
		$data['session'] = $this->session->userdata('login_session');

        $this->load->model('product_m');
        $data['result'] = $this->product_m->sel_product_card();
        
        // $this->load->model('price_m');
        // $data['price'] = $this->price_m->sel_price();
        // $data['valuta'] = $this->price_m->sel_valuta();
        
        $this->load->view('templates/header');
        $this->load->view('templates/navbar_contragent', $data);
        $this->load->view('pages/product', $data);
        $this->load->view('templates/footer');
	} 
}