<?php
	class Order extends CI_Controller {
    
    //Просмотр заказов|Харламов
	public function browes_order()
	{
        $this->load->model('order_m');
        $data['browesorder'] = $this->order_m->sel_order();
        
        $this->load->view('templates/header');
        $this->load->view('templates/navbar_operator');
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
        $this->load->model('report_m');
        $data['otchter'] = $this->report_m->sel_order_delivery();

        $this->load->view('templates/header');
        $this->load->view('templates/navbar_operator');
        $this->load->view('pages/order_del_otch', $data);
        $this->load->view('templates/footer');
	}

    //Просмотр товаров|Волобуев
    public function browse_product_zakaz()
    {
        $this->load->model('order_m');

        //Сессия
		$data['session'] = $this->session->userdata('login_session');
        $data['contract'] = $this->order_m->sel_contract();

        $ID_list = $_GET['ID_list'];

        $ID_user = $this->session->userdata('login_session');
        $data['order'] = $this->order_m->sel_order_2($ID_user['ID_user']);

        $this->load->view('templates/header');
        $this->load->view('templates/navbar_contragent', $data);
        $this->load->view('pages/moizakaz', $data);
        $this->load->view('templates/footer');
    }

    //Добавление заказа|Волобуев
    public function add_order()
    {
        $this->load->model('order_m');
        
        $data['session'] = $this->session->userdata('login_session');
        $data['contract'] = $this->order_m->sel_contract();
        
        $ID_user = $this->session->userdata('login_session');
        $data['order'] = $this->order_m->sel_order_2($ID_user['ID_user']);
        
        $ID_contract = $this->input->post('contract');
        $count = $this->input->post('col');
        $ID_list = $_GET['ID_list'];
        
        $this->load->model('contract_m');
        $this->contract_m->add_contract($ID_user, $ID_contract, $ID_list, $count);

        $this->load->view('templates/header');
        $this->load->view('templates/navbar_contragent', $data);
        $this->load->view('pages/moizakaz', $data);
        $this->load->view('templates/footer');

        redirect(base_url('order/browse_product_zakaz'));
    }
}