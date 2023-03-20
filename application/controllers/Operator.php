<?php
    class Operator extends CI_Controller {

	public function index()
	{
		$data['session'] = $this->session->userdata('login_session');

		$this->load->view('templates/header.php');
		$this->load->view('templates/navbar_operator.php');
        $this->load->view('pages/operator.php', $data);
		$this->load->view('templates/footer.php');
	}
}