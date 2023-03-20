<?php
    class Register extends CI_Controller {

    //Страница регистрации
	public function index()
	{
		$this->load->view('templates/header.php');
		$this->load->view('templates/navbar.php');
        $this->load->view('pages/reg');
		$this->load->view('templates/footer.php');
	}

    //После нажатия кнопки "Зарегистроваться" на странице регистрации
    public function reg_action()
    {
        if (!empty($_POST))
        {
            $fio = $this->input->post('fio');
            $role = $this->input->post('role');
            $login = $this->input->post('login');
            $password = $this->input->post('password');
            $repassword = $this->input->post('repassword');

            //Проверка, совпадают ли пароли
            if ($password == $repassword)
            {
                //Записывают данные к переменных
                $data = array(
                    'fio'      => $fio,
                    'role'     => $role,
                    'login'    => $login,
                    'password' => $repassword
                );
                
                //Выбрать нужную модель и активировать
                $this->load->model('user');
                $this->user->ins_register($data);

                //Быстрая сессия
                $this->session->set_flashdata('success', 'Регистрация успешно прошла!');
                redirect(base_url('login/index'));
            }
            else
            {
                redirect(base_url('register/index'));
            }
        }
    }

}