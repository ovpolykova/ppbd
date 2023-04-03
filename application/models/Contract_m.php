<?php
class Contract_m extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    //Выбрать контрагента|Харламов
    public function sel_user($login, $password)
    {
        $sql = "SELECT * FROM `contract` WHERE login='$login' AND password='$password'";
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

    //Выбрать контрагента|Пручковский
    public function sel_contract($limit, $offset)
    {
        $this->db->limit($limit, $offset);
        $query = $this->db->select('ID_contract, contractor, type_c, address_c, date_c, inn, kpp, login, password')
                          ->from('contract, type_c')
                          ->where('contract.ID_type_c = type_c.ID_type_c')
                          ->order_by('ID_contract')
                          ->get();
        return $query->result_array();
    }

    //Получение количества для пагинации контрагента|Пручковский
    public function getTotalRows()
    {
        $query = $this->db->get('contract');
        return $query->num_rows();
    }

    //Добавить контрагента|Пручковский
    public function add_contract($data)
    {
        $this->db->insert('contract', $data);
    }

    //Изменить контрагента|Пручковский
    public function upd_contract($contractor, $ID_type_c, $address_c, $date_c, $inn, $kpp, $id, $login, $password)
    {
        $this->db->set('contractor', $contractor)
                 ->set('ID_type_c', $ID_type_c)
                 ->set('address_c', $address_c)
                 ->set('date_c', $date_c)
                 ->set('inn', $inn)
                 ->set('kpp', $kpp)
                 ->set('login', $login)
                 ->set('password', $password)
                 ->where('ID_contract', $id)
                 ->update('contract');
    }

    //Удалить контрагента|Пручковский
    public function del_contract($data)
    {
        $this->db->delete('contract', $data);
    }

}