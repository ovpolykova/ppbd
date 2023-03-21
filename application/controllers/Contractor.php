<?php
	class Contractor extends CI_Controller {

	public function index()
	{
        $this->load->model('contractor');
        $data['contract'] = $this->contractor->sel_contractor();
        $this->load->view('templates/header');
        $this->load->view('templates/navbar_operator');
        $this->load->view('pages/contractor_browse', $data);
        $this->load->view('templates/footer');
	}

    public function browse_contractor()
	{
        $this->load->model('contractor');
        $data['contract'] = $this->contractor->sel_contractor();
        $this->load->view('templates/header');
        $this->load->view('templates/navbar_operator');
        $this->load->view('pages/contractor_browse', $data);
        $this->load->view('templates/footer');
	}


}