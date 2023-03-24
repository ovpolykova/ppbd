<?php
    class User extends CI_Controller {

    //Просмотр пользователей|Пручковский
    public function browse_user()
    {
        //Сессия
		$data['session'] = $this->session->userdata('login_session');

        $this->load->model('user_m');
        $data['users'] = $this->user_m->sel_user_table();
        $this->load->view('templates/header');
        $this->load->view('templates/navbar_admin', $data);
        $this->load->view('pages/user', $data);
        $this->load->view('templates/footer');
    }

    //Добавление пользователя|Пручковский
    public function add_action()
    {
        if (!empty($_POST))
        {
            $fio = $this->input->post('fio');
            $role = $this->input->post('role');
            $login = $this->input->post('login');
            $password = $this->input->post('password');
            $repassword = $this->input->post('repassword');

            if ($password == $repassword)
            {
                $data = array(
                    'fio'      => $fio,
                    'role'     => $role,
                    'login'    => $login,
                    'password' => $repassword
                );
                
                $this->load->model('user_m');
                $this->user_m->add_user($data);

                redirect(base_url('user/browse_user'));
            }
            else
            {
                redirect(base_url('user/browse_user'));
            }
        }
    }

    //Изменение пользователя|Пручковский
    public function upd_action()
    {
        $fio      = $this->input->post('fio');
        $role     = $this->input->post('role');
        $login    = $this->input->post('login');
        $password = $this->input->post('password');
        $id       = $this->input->post('ID_user');
        $this->load->model('user_m');
        $this->user_m->upd_user($fio, $role, $login, $password, $id);

        redirect('user/browse_user');
    }
    
    //Удаление пользователя|Пручковский
    public function del_action()
    {
        $data = array(
            'ID_user' => $this->input->post('ID_user')
        );
        $this->load->model('user_m');
        $this->user_m->del_user($data);
        
        redirect('user/browse_user');
    }

}
?>