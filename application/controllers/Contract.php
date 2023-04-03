<?php
	class Contract extends CI_Controller {

    //Просмотр контрагентов|Харламов
	public function browse_contract()
	{
        $data['session'] = $this->session->userdata('login_session');

        $this->load->model('contract_m');
        $data['contract'] = $this->contract_m->sel_contract_zak();
        $this->load->view('templates/header');
        $this->load->view('templates/navbar_operator', $data);
        $this->load->view('pages/contract_browse', $data);
        $this->load->view('templates/footer');

        
	}

    //Просмотр контрагентов|Пручковский
    public function browse_contract_admin()
    {
        //Сессия
		$data['session'] = $this->session->userdata('login_session');

        $this->load->model('contract_m');
        $data['contract'] = $this->contract_m->sel_contract();
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

            $data = array(
                'contractor' => $contractor,
                'ID_type_c'  => $ID_type_c,
                'address_c'  => $address_c,
                'date_c'     => $date_c,
                'inn'        => $inn,
                'kpp'        => $kpp
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
        $id         = $this->input->post('ID_contract');
        $this->load->model('contract_m');
        $this->contract_m->upd_contract($contractor, $ID_type_c, $address_c, $date_c, $inn, $kpp, $id);

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