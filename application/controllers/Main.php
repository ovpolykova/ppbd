<?php
    class Main extends CI_Controller {

	public function index()
	{
		$this->load->view('templates/header.php');
		$this->load->view('templates/navbar.php');
         

		// меню админ 
		//$this->load->view('templates/navbar_adm.php');

		// меню оператор
		//$this->load->view('templates/navbar_oper.php');

		// товары
        $this->load->model('tovar');
        $data['tovar'] = $this->tovar->sel_tovar();
         
		// справочник контренгтов
		$this->load->model('contr');
        $data['contr'] = $this->contr->sel_contr();
		$this->load->view('pages/admcontp.php', $data);



		//главная страница
        $this->load->view('pages/home.php', $data);
		$this->load->view('templates/footer.php');
	}
}
