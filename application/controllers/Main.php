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