<?php
class User_m extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    //Выбрать пользователя|Харламов
    public function sel_user($login, $password)
    {
        $sql = "SELECT * FROM users WHERE login='$login' AND password='$password'";
        $query = $this->db->query($sql);
        
        if($query->num_rows()==1)
        {
            return $query->row();
        }
        else 
        {
            return false;
        }
        
    }

    //Добавить пользователя|Пручковский
    public function add_user($data)
    {
        $this->db->insert('users', $data);
    }

    //Изменить пользователя|Пручковский
    public function upd_user($fio, $role, $login, $password, $id)
    {
        $this->db->set('fio', $fio)
                 ->set('role', $role)
                 ->set('login', $login)
                 ->set('password', $password)
                 ->where('ID_user', $id)
                 ->update('users');
    }

    //Удалить пользователя|Пручковский
    public function del_user($data)
    {
        $this->db->delete('users', $data);
    }

    //Выбрать пользователя для таблиц|Пручковский
    public function sel_user_table()
    {
        $query = $this->db->get('users');
        return $query->result_array();
    }

    //Уничтожение все сессии|Кузнецов !НОВЫЙ!
    public function kill_session()
    {
        $this->session->sess_destroy();
    }

}