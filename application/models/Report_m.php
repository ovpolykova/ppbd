<?php
class Report_m extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    //Выбрать заказы, подготовленных к доставке|Харламов
    public function sel_order_delivery()
    {
        $sql = "SELECT `order`.ID_order, users.fio, producer.name_p, contract.contractor, product.name_product, count,  date_order, date_send, status FROM users, producer, contract, price_list, product, `order` 
            WHERE `order`.ID_order = users.ID_user AND `order`.ID_producter = producer.ID_producer AND `order`.ID_contract = contract.ID_contract 
            AND `order`.ID_list = price_list.ID_list AND price_list.ID_product = product.ID_product AND status = 'Подготовен к доставку'";
        $query = $this->db->query($sql);
        return $query->result_array(); 
        
    }

    //Выбрать заказ по контрагентам|Пручковский
    public function sel_rep_order_contract()
    {
        $query = $this->db->select('ID_order, contractor, SUM(price*count)')
                          ->from('`order`, `contract`, price_list')
                          ->where('`order`.ID_contract=`contract`.ID_contract')
                          ->where('`order`.ID_list=price_list.ID_list')
                          ->group_by('ID_order, contractor')
                          ->get();
        return $query->result_array();
    }

    //Выбрать заказ по контрагентам за период|Пручковский
    public function sel_rep_order_contract_date($date1, $date2)
    {
        $query = $this->db->select('ID_order, contractor, SUM(price*count)')
                          ->from('`order`, `contract`, price_list')
                          ->where('`order`.ID_contract=`contract`.ID_contract')
                          ->where('`order`.ID_list=price_list.ID_list')
                          ->where("date_send BETWEEN '$date1' AND '$date2'")
                          ->group_by('ID_order, contractor')
                          ->get();
        return $query->result_array();
    }

    //Выбрать заказ по товарам|Пручковский
    public function sel_rep_order_product()
    {
        $query = $this->db->select('ID_order, name_product, SUM(price*count)')
                          ->from('`order`, price_list, product')
                          ->where('`order`.ID_list=price_list.ID_list')
                          ->where('price_list.ID_product=product.ID_product')
                          ->group_by('ID_order, name_product')
                          ->get();
        return $query->result_array();
    }

    //Выбрать заказ по товарам за период|Пручковский
    public function sel_rep_order_product_date($date1, $date2)
    {
        $query = $this->db->select('ID_order, name_product, SUM(price*count)')
                          ->from('`order`, price_list, product')
                          ->where('`order`.ID_list=price_list.ID_list')
                          ->where('price_list.ID_product=product.ID_product')
                          ->where("date_send BETWEEN '$date1' AND '$date2'")
                          ->group_by('ID_order, name_product')
                          ->get();
        return $query->result_array(); 
    }

    //Выбрать заказ, не выполненных в срок за период|Кузнецов
    public function sel_rep_order_fall()
    {
        
    }
}