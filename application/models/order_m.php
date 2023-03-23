<?php
class Order_m extends CI_Model {

        public function __construct()
        {
            $this->load->database();
        }


        public function sel_order()
        {
            $sql = "SELECT `order`.ID_order, users.fio, producer.name_p, contract.contractor, product.name_product, count,  date_order, date_send, status FROM users, producer, contract, price_list, product, `order` 
            WHERE `order`.ID_order = users.ID_user AND `order`.ID_producter = producer.ID_producer AND `order`.ID_contract = contract.ID_contract 
            AND `order`.ID_list = price_list.ID_list AND price_list.ID_product = product.ID_product";
            $query = $this->db->query($sql);
            return $query->result_array(); 
        }

        public function upd_order_status()
        {
            $this->db->set('status', 'storder');
            $this->db->where('ID_order', 'id');
            $this->db->update('order');
                   
       
        }
}


