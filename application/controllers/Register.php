<?php
class Register extends CI_Controller {

    public function index()
    {
        $this->load->view('templates/header');
        $this->load->view('templates/navbar');
        $this->load->view('pages/register');

        $this->load->view('templates/footer');
    }

    public function reg_action()
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
                
                $this->load->model('user');
                $this->user->add_user($data);

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
?>