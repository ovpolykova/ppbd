<?php
    class Login extends CI_Controller {

	public function index()
	{
		$this->load->view('templates/header.php');
		$this->load->view('templates/navbar.php');
        $this->load->view('pages/log');
		$this->load->view('templates/footer.php');
	}
}
