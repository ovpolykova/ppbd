<?php
    class Login extends CI_Controller {

    //Страница авторизации
	public function index()
	{
		$this->load->view('templates/header.php');
		$this->load->view('templates/navbar.php');
        $this->load->view('pages/log');
		$this->load->view('templates/footer.php');
	}

    //После нажатия кнопки "Войти" на странице авторизации
    public function log_action()
    {
        if (!empty($_POST))
        {
            //Записывают данные к переменных
            $login = $this->input->post('login');
            $password = $this->input->post('password');

            //Выбрать нужную модель и активировать
            $this->load->model('user');
            $result = $this->user->sel_login($login, $password);

            if ($result != false)
            {
                //Записывают данные к переменных
                $ID_user = $result->ID_user;
                $fio = $result->fio;
                $role = $result->role;

                //Записывают данные к сессии
                $session = array(
                    'ID_user' => $ID_user,
                    'fio'     => $fio,
                    'role'    => $role
                );

                $this->session->set_userdata('login_session', $session);

                //Направление страницы зависит от роли
                switch ($role)
                {
                    case 'Администратор': redirect(base_url('admin/index')); break;
                    case 'Оператор': redirect(base_url('operator/index')); break;
                    case 'Контрагент': redirect(base_url('main/index')); break;
                }
            }
            else
            {
                $this->session->set_flashdata('login_false', 'Неверный логин или пароль!');
                redirect(base_url('login/index'));
            }

        }
    }

}
