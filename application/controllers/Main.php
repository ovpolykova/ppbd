<?php
	class Main extends CI_Controller {

	public function index()
	{
        $this->load->view('templates/header');
        $this->load->view('templates/navbar');
       // $this->load->view('templates/navbar_admin');

       $this->load->view('templates/footer');
	}

}
