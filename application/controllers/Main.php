<?php
    class Main extends CI_Controller {
	
	
	public function index()
	{	
		//Сессия
		$data['session'] = $this->session->userdata('login_session');

		//Товар
		$this->load->model('tovar');
        $data['tovar'] = $this->tovar->sel_tovar();	

		//Вьюв
		$this->load->view('templates/header.php');
		$this->load->view('templates/navbar.php', $data);
        $this->load->view('pages/home.php', $data);
		$this->load->view('templates/footer.php');
	}

	public function exit()
	{
		//Уничтожение сессий после нажатия кнопки "Выйти"
		$this->load->model('kill_session');
		$this->kill_session->kill_session();
		redirect(base_url('login/index'));
	}
}