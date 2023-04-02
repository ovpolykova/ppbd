<?php
    class User extends CI_Controller {

    //Просмотр пользователей|Пручковский
    public function browse_user()
    {
        //Сессия
		$data['session'] = $this->session->userdata('login_session');
        $this->load->model('user_m');

        //Пагинация
        $this->load->library('pagination');

        $config['base_url'] = base_url('user/browse_user');
        $config['per_page'] = 5;
        $config['total_rows'] = $this->user_m->getTotalRows();

        //Стиль пагинации
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';
        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link">';
        $config['cur_tag_close'] = '</li>';

        $config['attributes'] = array('class' => 'page-link');

        $this->pagination->initialize($config);

        $data['users'] = $this->user_m->sel_user_table($config['per_page'], $this->uri->segment(3));
        
        $this->load->view('templates/header');
        $this->load->view('templates/navbar_admin', $data);
        $this->load->view('pages/user', $data);
        $this->load->view('templates/footer');
    }

    //Добавление пользователя|Пручковский
    public function add_user()
    {
        if (!empty($_POST))
        {
            $fio        = $this->input->post('fio');
            $role       = $this->input->post('role');
            $login      = $this->input->post('login');
            $password   = $this->input->post('password');
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
    public function upd_user()
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
    public function del_user()
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