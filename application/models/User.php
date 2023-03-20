<?php
 
class User extends CI_Model {
    
    //Выборка из таблицы users для логина
    public function sel_login($login, $password)
    {
        $sql = "SELECT * FROM users WHERE login='$login' AND password='$password'";
        $query = $this->db->query($sql);
        if ($query->num_rows()==1)
        {
            return $query->row();
        }
        else
        {
            return false;
        }
    }

    //Добавление в таблицу users от регистрации
    public function ins_register($data)
    {
        $this->db->insert('users', $data);
    }

}