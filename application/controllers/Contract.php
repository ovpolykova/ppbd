<?php
	class Contract extends CI_Controller {

    //Просмотр контрагентов|Харламов
	public function browse_contract()
	{
        $this->load->model('contract_m');
        $data['contract'] = $this->contract_m->sel_contract();
        $this->load->view('templates/header');
        $this->load->view('templates/navbar_operator');
        $this->load->view('pages/contract_browse', $data);
        $this->load->view('templates/footer');
	}

    //Просмотр контрагентов|Пручковский
    public function browse_contract_admin()
    {
        //Сессия
		$data['session'] = $this->session->userdata('login_session');
        $this->load->model('contract_m');

        //Пагинация
        $this->load->library('pagination');

        $config['base_url'] = base_url('contract/browse_contract_admin');
        $config['per_page'] = 100;
        $config['total_rows'] = $this->contract_m->getTotalRows();

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

        $data['contract'] = $this->contract_m->sel_contract($config['per_page'], $this->uri->segment(3));

        $this->load->view('templates/header');
        $this->load->view('templates/navbar_admin', $data);
        $this->load->view('pages/contract', $data);
        $this->load->view('templates/footer');
    }

    //Добавление контрагента|Пручковский
    public function add_contract()
    {
        if (!empty($_POST))
        {
            $contractor = $this->input->post('contractor');
            $ID_type_c  = $this->input->post('ID_type_c');
            $address_c  = $this->input->post('address_c');
            $date_c     = $this->input->post('date_c');
            $inn        = $this->input->post('inn');
            $kpp        = $this->input->post('kpp');
            $login      = $this->input->post('login');
            $password   = $this->input->post('password');

            $data = array(
                'contractor' => $contractor,
                'ID_type_c'  => $ID_type_c,
                'address_c'  => $address_c,
                'date_c'     => $date_c,
                'inn'        => $inn,
                'kpp'        => $kpp,
                'login'      => $login,
                'password'   => $password
            );
            
            $this->load->model('contract_m');
            $this->contract_m->add_contract($data);

            redirect(base_url('contract/browse_contract_admin'));
        }
    }

    //Изменение контрагента|Пручковский
    public function upd_contract()
    {
        $contractor = $this->input->post('contractor');
        $ID_type_c  = $this->input->post('ID_type_c');
        $address_c  = $this->input->post('address_c');
        $date_c     = $this->input->post('date_c');
        $inn        = $this->input->post('inn');
        $kpp        = $this->input->post('kpp');
        $login      = $this->input->post('login');
        $password   = $this->input->post('password');
        $id         = $this->input->post('ID_contract');
        $this->load->model('contract_m');
        $this->contract_m->upd_contract($contractor, $ID_type_c, $address_c, $date_c, $inn, $kpp, $id, $login, $password);

        redirect('contract/browse_contract_admin');
    }

    //Удаление контрагента|Пручковский
    public function del_contract()
    {
        $data = array(
            'ID_contract' => $this->input->post('ID_contract')
        );
        $this->load->model('contract_m');
        $this->contract_m->del_contract($data);
        
        redirect('contract/browse_contract_admin');
    }

}