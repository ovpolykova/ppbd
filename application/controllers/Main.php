<?php
	class Main extends CI_Controller {

	public function index()
	{
        $this->load->view('templates/header');
        $this->load->view('templates/navbar');
        $this->load->view('pages/home');
        $this->load->view('templates/footer');
	}

    public function product()
    {
        $this->load->model('product');
        $data['product'] = $this->product->sel_product();
        $this->load->view('templates/header');
        $this->load->view('templates/navbar');
        $this->load->view('pages/product', $data);
        $this->load->view('templates/footer');
    }
}
?>