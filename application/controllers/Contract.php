<?php
	class Contract extends CI_Controller {

	public function browse_contract()
	{
        $data['session'] = $this->session->userdata('login_session');

        $this->load->model('contract_m');
        $data['contract'] = $this->contract_m->sel_contract();
        $this->load->view('templates/header');
        $this->load->view('templates/navbar_operator', $data);
        $this->load->view('pages/contract_browse', $data);
        $this->load->view('templates/footer');
	}



}