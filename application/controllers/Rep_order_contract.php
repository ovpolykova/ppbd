<?php
    class Rep_order_contract extends CI_Controller {

    //Просмотр заказа|Пручковский
    public function browse_rep_order_contract()
    {
        //Сессия
		$data['session'] = $this->session->userdata('login_session');

        $this->load->model('report_m');
        $data['order'] = $this->report_m->sel_rep_order_contract();
        $this->load->view('templates/header');
        $this->load->view('templates/navbar_admin', $data);
        $this->load->view('pages/rep_order_contract', $data);
        $this->load->view('templates/footer');
    }

    //Выбрать заказ по контрагентам за период|Пручковский
    public function sel_rep_order_contract_date()
    {
        //Сессия
		$data['session'] = $this->session->userdata('login_session');

        $date1 = $this->input->post('date1');
        $date2  = $this->input->post('date2');

        $this->load->model('report_m');
        $data['order'] = $this->report_m->sel_rep_order_contract_date($date1, $date2);
        $this->load->view('templates/header');
        $this->load->view('templates/navbar_admin', $data);
        $this->load->view('pages/rep_order_contract', $data);
        $this->load->view('templates/footer');
    }

}
?>