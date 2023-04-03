<?php
    class Report extends CI_Controller {

    //Отчет заказов по контрагентам|Пручковский
    public function browse_rep_order_contract()
    {
        //Сессия
		$data['session'] = $this->session->userdata('login_session');
        $this->load->model('report_m');

        $date1 = "2000-01-01";
        $date2 = "2100-01-01";

        if (!empty($this->input->post('date1'))) {
            $date1 = $this->input->post('date1');
        }

        if (!empty($this->input->post('date2'))) {
            $date2 = $this->input->post('date2');
        }
        
        //Пагинация
        $this->load->library('pagination');

        $config['base_url'] = base_url('report/browse_rep_order_contract');
        $config['per_page'] = 10;
        $config['total_rows'] = $this->report_m->getTotalRows_contract();

        //Стиль пагинации
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['next_tag_open'] = '<li class="page-item ">';
        $config['next_tag_close'] = '</li>';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';
        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link">';
        $config['cur_tag_close'] = '</a></li>';

        $config['attributes'] = array('class' => 'page-link');

        $this->pagination->initialize($config);

        $data['order'] = $this->report_m->sel_rep_order_contract($date1, $date2, $config['per_page'], $this->uri->segment(3));
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
        $this->load->model('report_m');

        $date1 = "2000-01-01";
        $date2 = "2100-01-01";

        if (!empty($this->input->post('date1'))) {
            $date1 = $this->input->post('date1');
        }

        if (!empty($this->input->post('date2'))) {
            $date2 = $this->input->post('date2');
        }
        
        //Пагинация
        $this->load->library('pagination');

        $config['base_url'] = base_url('report/browse_rep_order_product');
        $config['per_page'] = 10;
        $config['total_rows'] = $this->report_m->getTotalRows_product();

        //Стиль пагинации
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['next_tag_open'] = '<li class="page-item ">';
        $config['next_tag_close'] = '</li>';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';
        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link">';
        $config['cur_tag_close'] = '</a></li>';

        $config['attributes'] = array('class' => 'page-link');

        $this->pagination->initialize($config);

        $data['order'] = $this->report_m->sel_rep_order_product($date1, $date2, $config['per_page'], $this->uri->segment(3));
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
        $this->load->model('report_m');

        $date1 = "2000-01-01";
        $date2 = "2100-01-01";

        if (!empty($this->input->post('date1'))) {
            $date1 = $this->input->post('date1');
        }

        if (!empty($this->input->post('date2'))) {
            $date2 = $this->input->post('date2');
        }

        //Пагинация
        $this->load->library('pagination');

        $config['base_url'] = base_url('report/browse_order_fall');
        $config['per_page'] = 10;
        $config['total_rows'] = $this->report_m->getTotalRows_fall();

        //Стиль пагинации
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['next_tag_open'] = '<li class="page-item ">';
        $config['next_tag_close'] = '</li>';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';
        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link">';
        $config['cur_tag_close'] = '</a></li>';

        $config['attributes'] = array('class' => 'page-link');

        $this->pagination->initialize($config);
        
        $data['order_fall'] = $this->report_m->sel_rep_order_fall($date1, $date2, $config['per_page'], $this->uri->segment(3));
        $this->load->view('templates/header');
        $this->load->view('templates/navbar_admin', $data);
        $this->load->view('pages/order_fall', $data);
        $this->load->view('templates/footer');
    }

}
?>