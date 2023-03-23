<?php
class User_m extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    //Харламов
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

    //Пручковский
    public function add_user($data)
    {
        $this->db->insert('users', $data);
    }

    public function upd_user($data)
    {
        $this->db->update('users', $data);

        // $sql = "UPDATE users SET fio='$fio', role='$role', login='$login', password='$password' WHERE ID_user=$ID_user";
        // $query = $this->db->query($sql);
        // return $query->result_array();
    }

    public function del_user($data)
    {
        $this->db->delete('users', $data);
    }

    public function sel_user_table()
    {
        $sql = "SELECT * FROM users";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    //Уничтожение все сессии|Кузнецов !НОВЫЙ!
    public function kill_session()
    {
        $this->session->sess_destroy();
    }

}