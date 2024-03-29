<?php
	class Login extends CI_Controller {

    //Страница авторизации|Харламов
	public function index()
	{
        $this->load->view('templates/header');
        $this->load->view('templates/navbar');
        $this->load->view('pages/login');
        $this->load->view('templates/footer');
	}

    //Выполнение входа|Харламов
    public function log_action()
	{
        $login = $this->input->post('login');
        $password = $this->input->post('password');

        $this->load->model('user_m');
        $result = $this->user_m->sel_user($login, $password);

        if($result != false)
        {
            $ID_user = $result->ID_user;
            $fio = $result->fio;
            $role = $result->role;

            $session = array(
                'ID_user' => $ID_user,
                'fio' => $fio,
                'role' => $role
            );

            $this->session->set_userdata('login_session', $session);

            switch($role)
            {
                case 'Администратор': redirect((base_url('product/browse_product'))); 
                break;
                case 'Оператор': redirect(base_url('contract/browse_contract'));
                break;
                case 'Контрагент': redirect(base_url(('main/index'))); 
                break;
            }
        }
        else
        {
            $this->session->set_flashdata('login_false', 'Неверный логин или пароль!');
            redirect(base_url('login/index'));
        }
	}

}