<?php
 
class contr extends CI_Model {
           
    public function sel_contr()
    {
        $sql = "SELECT *, type_c.type_c FROM contract, type_c WHERE contract.ID_type_c = type_c.ID_type_c";
        $query = $this->db->query($sql);
        return  $query->result_array();
    }

}