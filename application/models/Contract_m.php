<?php
class Contract_m extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    //Выбрать контрагента|Пручковский
    public function sel_contract()
    {
        $query = $this->db->select('ID_contract, contractor, type_c, address_c, date_c, inn, kpp, login, password')
                          ->from('contract, type_c')
                          ->where('contract.ID_type_c = type_c.ID_type_c')
                          ->order_by('ID_contract')
                          ->get();
        return $query->result_array();
    }

    //Выбрать контрагента фильтры для заказы | Харламов 
   
    public function sel_contract_zak()
    {
        $query = $this->db->select('*')
                          ->from('order, contract')
                          ->where('order.ID_contract = contract.ID_contract')
                          ->order_by('contractor')
                        
                          ->get();
        return $query->result_array();
    }

    //Выбрать контрагент|Харламов
    public function sel_contragent()
    {
        $query = $this->db->get('contract');
        return  $query->result_array();
    }

    //Выбрать контрагент с фильтром|Харламов
    public function sel_contract_zak_filter($data_filter)
    {
        $query = $this->db->select('*')
                          ->from('order, contract')
                          ->where('order.ID_contract = contract.ID_contract')
                          ->where('order.ID_contract', $data_filter)
                          ->order_by('contractor')
                          ->get();
        return $query->result_array();
    }

    //Добавить контрагента|Пручковский
    public function add_contract($data)
    {
        $this->db->insert('contract', $data);
    }

    //Изменить контрагента|Пручковский
    public function upd_contract($contractor, $ID_type_c, $address_c, $date_c, $inn, $kpp, $login, $password, $id)
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