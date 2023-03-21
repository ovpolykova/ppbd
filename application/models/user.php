<?php
class User extends CI_Model {

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
    public function add_user()
    {

    }

    public function upd_user()
    {

    }

    public function del_user()
    {

    }


}