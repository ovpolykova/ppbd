<?php
class Sel_contractor extends CI_Model {

        public function __construct()
        {
                $this->load->database();
        }


        public function sel_contractor()
        {
            $sql = "SELECT ID_contract as ['№'], contractor as ['Контрагент'], type_c as ['Тип контрагент'], address_c as ['Юр. адрес'], date_c as ['Дата договора'], inn as ['ИНН'], kpp as ['КПП']   
            FROM contract, type_c WHERE contract.ID_type_c = type_c.ID_type_c";
            $query = $this->db->query($sql);
            return $query->result_array();
            
            
        }
}