<?php
	class Order extends CI_Controller {
    
    //Просмотр заказов|Харламов
	public function browes_order()
	{
        $data['session'] = $this->session->userdata('login_session');

        $this->load->model('order_m');
        $data['browesorder'] = $this->order_m->sel_order();
        
        $this->load->view('templates/header');
        $this->load->view('templates/navbar_operator', $data);
        $this->load->view('pages/order_delivery', $data);
        $this->load->view('templates/footer');
	}


    //Изменение заказов|Харламов
    public function upd_order()
	{
        $status = $this->input->post('storder');
        $id     = $this->input->post('ID_order');
        $this->load->model('order_m');
        $this->order_m->upd_order_status($status, $id);
        $data['browesorder'] = $this->order_m->upd_order_status($status, $id);
        
        redirect('order/browes_order');
	}

   

    //Отчет списка подготовленных к доставке заказов|Харламов
    public function rep_delivery()
	{

        $data['session'] = $this->session->userdata('login_session');

        $this->load->model('report_m');
        $data['otchter'] = $this->report_m->sel_order_delivery();

        $this->load->view('templates/header');
        $this->load->view('templates/navbar_operator', $data);
        $this->load->view('pages/order_del_otch', $data);
        $this->load->view('templates/footer');
	}

    public function rep_delivery_doc()
	{

        $data['session'] = $this->session->userdata('login_session');

        $this->load->model('report_m');
        $data['otchter'] = $this->report_m->sel_order_delivery();

        $this->load->view('templates/header');
        $this->load->view('templates/navbar_operator', $data);
        $this->load->view('pages/order_del_otch', $data);
        $this->load->view('templates/footer');
	}


    public function upd_order_doc()
	{
        $status = 'отправка';
        $id     = $this->input->post('ID_order');
        $this->load->model('report_m');
        $this->report_m->upd_order_status_doc($status, $id);
        $data['otchter'] = $this->report_m->upd_order_status_doc($status, $id);
        
        redirect('order/rep_delivery');
	}

}