<?php
class Order_m extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    //Выбрать заказ|Харламов
    public function sel_order()
    {
        $sql = "SELECT `order`.ID_order, users.fio, producer.name_p, contract.contractor, product.name_product, count,  date_order, date_send, status FROM users, contract, price_list, product, `order`, producer 
        WHERE `order`.ID_order = users.ID_user AND `order`.ID_contract = contract.ID_contract AND `order`.`ID_producter` = producer.ID_producer AND status='Заказан'
        AND `order`.ID_list = price_list.ID_list AND price_list.ID_product = product.ID_product";
        $query = $this->db->query($sql);
        return $query->result_array(); 
    }

    //Изменить статус заказа|Харламов
    public function upd_order_status($status, $date_send,  $id)
    {
        $this->db->set('status', $status)
                ->set('date_send', $date_send)
                ->where('ID_order', $id)
                ->update('order');
    }

    
}