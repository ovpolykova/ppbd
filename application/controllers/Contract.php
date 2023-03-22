<?php
	class Contract extends CI_Controller {

	public function browse_contract()
	{
        $this->load->model('contract_m');
        $data['contract'] = $this->contract_m->sel_contract();
        $this->load->view('templates/header');
        $this->load->view('templates/navbar_operator');
        $this->load->view('pages/contract_browse', $data);
        $this->load->view('templates/footer');
	}



}