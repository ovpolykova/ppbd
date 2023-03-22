<?php
class Report extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    //Выбрать заказы, подготовленных к доставке|Харламов
    public function sel_order_delivery()
    {
        $sql = "SELECT `order`.ID_order, users.fio, producer.name_p, contract.contractor, product.name_product, count,  date_order, date_send, status FROM users, producer, contract, price_list, product, `order` 
            WHERE `order`.ID_order = users.ID_user AND `order`.ID_producter = producer.ID_producer AND `order`.ID_contract = contract.ID_contract 
            AND `order`.ID_list = price_list.ID_list AND price_list.ID_product = product.ID_product AND status = 'Подготовка к отправке'";
        $query = $this->db->query($sql);
        return $query->result_array(); 
        
    }

    //Выбрать заказ по контрагентам за период|Пручковский
    public function sel_rep_order_contract()
    {
        
    }

    //Выбрать заказ по товарам за период|Пручковский
    public function sel_rep_order_product()
    {
        
    }

    //Выбрать заказ, не выполненных в срок за период|Кузнецов
    public function sel_rep_order_fall()
    {
        
    }
}