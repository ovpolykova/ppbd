<?php
	class Product extends CI_Controller {

    //Просмотр товаров с привязкой к определенному прайс-листу|Кузнецов
	public function browse_product()
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

        redirect('product/browse_product');
	}
}