<?php
 
class Tovar extends CI_Model {
           
    public function sel_tovar()
    {
        $sql = "SELECT * FROM tovar";
        $query = $this->db->query($sql);
        return  $query->result_array();
    }

}
           
