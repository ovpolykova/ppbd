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

    //Просмотр товара с фильтром|Кузнецов
    public function product()
    {
        $this->load->model('product_m');
        $data['product'] = $this->product_m->sel_product();
        $this->load->view('templates/header');
        $this->load->view('templates/navbar');
        $this->load->view('pages/product', $data);
        $this->load->view('templates/footer');
    }

    //Завершение сессии|Кузнецов
    public function exit()
    {
        
    }
}
?>