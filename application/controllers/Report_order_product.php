<?php
    class Report_order_product extends CI_Controller {

    //Просмотр заказа|Пручковский
    public function index()
    {
        //Сессия
		$data['session'] = $this->session->userdata('login_session');

        // $this->load->model('report_m');
        // $data['order'] = $this->report_m->sel_rep_order_product();
        $this->load->view('templates/header');
        $this->load->view('templates/navbar_admin', $data);
        $this->load->view('pages/report_order_product', $data);
        $this->load->view('templates/footer');
    }

    public function sel_rep_order_product()
    {
        
    }

}
?>