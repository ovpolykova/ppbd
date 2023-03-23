<?php
class Contract_m extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    //Харламов
    public function sel_contract()
    {
        $sql = "SELECT ID_contract, contractor, type_c, address_c, date_c, inn, kpp   
        FROM contract, type_c WHERE contract.ID_type_c = type_c.ID_type_c ORDER BY ID_contract";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    //Добавить контрагента|Пручковский
    public function add_contract($data)
    {
        $this->db->insert('contract', $data);
    }

    //Изменить контрагента|Пручковский
    public function upd_contract($contractor, $ID_type_c, $address_c, $date_c, $inn, $kpp, $id)
    {
        $this->db->set('contractor', $contractor)
                 ->set('ID_type_c', $ID_type_c)
                 ->set('address_c', $address_c)
                 ->set('date_c', $date_c)
                 ->set('inn', $inn)
                 ->set('kpp', $kpp)
                 ->where('ID_contract', $id)
                 ->update('contract');
    }

    //Удалить контрагента|Пручковский
    public function del_contract($data)
    {
        $this->db->delete('contract', $data);
    }
}