<?php
	class Order extends CI_Controller {

	public function browes_order()
	{
        $this->load->model('order_m');
        $data['browesorder'] = $this->order_m->sel_order();
        $this->load->view('templates/header');
        $this->load->view('templates/navbar_operator');
        $this->load->view('pages/order_delivery', $data);
        $this->load->view('templates/footer');
	}



}