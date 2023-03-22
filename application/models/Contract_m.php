<?php
class Contract_m extends CI_Model {

        public function __construct()
        {
            $this->load->database();
        }


        public function sel_contract()
        {
            $sql = "SELECT ID_contract, contractor, type_c, address_c, date_c, inn, kpp   
            FROM contract, type_c WHERE contract.ID_type_c = type_c.ID_type_c";
            $query = $this->db->query($sql);
            return $query->result_array(); 
        }
}