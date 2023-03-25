<?php
    class Report extends CI_Controller {

    //Отчет заказов по контрагентам|Пручковский
    public function browse_rep_order_contract()
    {
        //Сессия
		$data['session'] = $this->session->userdata('login_session');

        $date1 = "2000-01-01";
        $date2 = "2100-01-01";

        if (!empty($this->input->post('date1'))) {
            $date1 = $this->input->post('date1');
        }

        if (!empty($this->input->post('date2'))) {
            $date2 = $this->input->post('date2');
        }
        
        $this->load->model('report_m');
        $data['order'] = $this->report_m->sel_rep_order_contract($date1, $date2);
        $this->load->view('templates/header');
        $this->load->view('templates/navbar_admin', $data);
        $this->load->view('pages/rep_order_contract', $data);
        $this->load->view('templates/footer');
    }

    //Отчет заказов по товарам|Пручковский
    public function browse_rep_order_product()
    {
        //Сессия
        $data['session'] = $this->session->userdata('login_session');

        $date1 = "2000-01-01";
        $date2 = "2100-01-01";

        if (!empty($this->input->post('date1'))) {
            $date1 = $this->input->post('date1');
        }

        if (!empty($this->input->post('date2'))) {
            $date2 = $this->input->post('date2');
        }
        
        $this->load->model('report_m');
        $data['order'] = $this->report_m->sel_rep_order_product($date1, $date2);
        $this->load->view('templates/header');
        $this->load->view('templates/navbar_admin', $data);
        $this->load->view('pages/rep_order_product', $data);
        $this->load->view('templates/footer');
    }    

    //Просмотр заказов, не выполненных в срок|Кузнецов
    public function browse_order_fall()
    {
        //Сессия
		$data['session'] = $this->session->userdata('login_session');

        $date1 = "2000-01-01";
        $date2 = "2100-01-01";

        if (!empty($this->input->post('date1'))) {
            $date1 = $this->input->post('date1');
        }

        if (!empty($this->input->post('date2'))) {
            $date2 = $this->input->post('date2');
        }

        $this->load->model('report_m');
        $data['order_fall'] = $this->report_m->sel_rep_order_fall($date1, $date2);

        $this->load->view('templates/header');
        $this->load->view('templates/navbar_admin', $data);
        $this->load->view('pages/order_fall', $data);
        $this->load->view('templates/footer');
    }

}
?>