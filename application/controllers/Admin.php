<?php
    class Admin extends CI_Controller {

	public function index()
	{
		$data['session'] = $this->session->userdata('login_session');
		
		$this->load->view('templates/header.php');
		$this->load->view('templates/navbar_admin.php');
        $this->load->view('pages/admin.php', $data);
		$this->load->view('templates/footer.php');
	}
}