<?php
    class User extends CI_Controller {

    public function index()
    {
        $this->load->model('user_m');
        $data['users'] = $this->user_m->sel_user_table();
        $this->load->view('templates/header');
        $this->load->view('templates/navbar_admin');
        $this->load->view('pages/user', $data);
        $this->load->view('templates/footer');
    }

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

                redirect(base_url('user/index'));
            }
            else
            {
                redirect(base_url('user/index'));
            }
        }
    }

    public function upd_action()
    {
        if (!empty($_POST))
        {
            $ID_user = $this->input->post('ID_user');
            $fio = $this->input->post('fio');
            $role = $this->input->post('role');
            $login = $this->input->post('login');
            $password = $this->input->post('password');

            $data = array(
                'ID_user'  => $ID_user,
                'fio'      => $fio,
                'role'     => $role,
                'login'    => $login,
                'password' => $password
            );
            
            $this->load->model('user_m');
            $this->user_m->upd_user($data);

            redirect(base_url('user/index'));
        }
    }

    public function del_action()
    {
        
    }

}
?>