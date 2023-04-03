<?php
	class Main extends CI_Controller {
    
    //Главная страница|Кузнецов
	public function index()
	{
        $this->load->view('templates/header');
        $this->load->view('templates/navbar');
        $this->load->view('pages/home');
        $this->load->view('templates/footer');
	}

    //Просмотр товара с фильтром
    public function product()
    {
        //Сессия
		$data['session'] = $this->session->userdata('login_session');

        $this->load->view('templates/header');
        $this->load->view('templates/navbar_contragent', $data);
        $this->load->view('pages/home');
        $this->load->view('templates/footer');
    }

    //Завершение сессии|Кузнецов
    public function exit()
    {
		$this->load->model('user_m');
		$this->user_m->kill_session();
		redirect(base_url());
    }
}
?>