<?php
class Product_m extends CI_Model {

        public function __construct()
        {
            $this->load->database();
        }

        public function sel_product()
        {
            $sql = "SELECT * FROM product";
            $query = $this->db->query($sql);
            return $query->result_array();
        }
}