<?php
	class Main extends CI_Controller {

	public function index()
	{
        $this->load->view('pages/home');
	}

    public function product()
    {
        $this->load->model('product');
        $data['product'] = $this->product->sel_product();
        $this->load->view('pages/home', $data);
    }
}
?>