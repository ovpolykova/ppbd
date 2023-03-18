<?php
    class Main extends CI_Controller {

	public function index()
	{
		$this->load->view('templates/header.php');
		$this->load->view('templates/navbar.php');

		$this->load->view('templates/navbar_adm.php');


        $this->load->model('tovar');
        $data['tovar'] = $this->tovar->sel_tovar();
        $this->load->view('pages/home.php', $data);
		$this->load->view('templates/footer.php');
	}
}
