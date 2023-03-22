<?php
	class Main extends CI_Controller {
    
    //Главная страница
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
        $this->load->model('product');
        $data['product'] = $this->product->sel_product();
        $this->load->view('templates/header');
        $this->load->view('templates/navbar');
        $this->load->view('pages/product', $data);
        $this->load->view('templates/footer');
    }

    //Завершение сессии
    public function exit()
    {
        
    }
}
?>