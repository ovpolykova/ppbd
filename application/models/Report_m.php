<?php
class Report_m extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    //Выбрать заказы, подготовленных к доставке|Харламов
    public function sel_order_delivery()
    {
        $sql = "SELECT `order`.ID_order,  contract.contractor, product.name_product, count,  date_order, date_send, status FROM contract, price_list, product, `order` 
            WHERE `order`.ID_contract = contract.ID_contract
            AND `order`.ID_list = price_list.ID_list AND price_list.ID_product = product.ID_product AND status = 'Подготовка к отправке'";
        $query = $this->db->query($sql);
        return $query->result_array(); 
        
    }

    //Выбрать заказ по контрагентам за период|Пручковский
    public function sel_rep_order_contract($date1, $date2)
    {
        $query = $this->db->select("contractor, SUM(price*count), COUNT(ID_order)")
                          ->from("`order`, `contract`, price_list")
                          ->where("`order`.ID_contract=`contract`.ID_contract")
                          ->where("`order`.ID_list=price_list.ID_list")
                          ->where("date_order BETWEEN '$date1' AND '$date2'")
                          ->group_by("contractor")
                          ->get();
        return $query->result_array();
    }

     //Выбрать заказ по контрагентам за период|Пручковский
    public function sel_rep_order_product($date1, $date2)
    {
        $query = $this->db->select("name_product, SUM(price*count), COUNT(ID_order)")
                          ->from("`order`, `product`, price_list")
                          ->where("`order`.ID_list=price_list.ID_list")
                          ->where("price_list.ID_product=product.ID_product")
                          ->where("date_order BETWEEN '$date1' AND '$date2'")
                          ->group_by("name_product")
                          ->get();
        return $query->result_array();
    }

    //Выбрать заказ, не выполненных в срок за период|Кузнецов
    public function sel_rep_order_fall()
    {
        $sql = "SELECT `order`.ID_order, contractor, name_product, date_order, date_send, status FROM `order`, `contract`, `product`, `price_list` WHERE `order`.`ID_contract`=`contract`.`ID_contract` AND `order`.`ID_list`=`price_list`.`ID_list` AND `price_list`.`ID_product`=`product`.`ID_product` AND (((date_send-date_order)>5) OR (date_send is null AND (NOW()-date_order)>5))";
        $query = $this->db->query($sql);
        return $query->result_array();
    }


    public function upd_order_status_doc($status, $date_send, $id)
    {
        $this->db->set("status", $status)
                 ->set("date_send", $date_send)
                 ->where("ID_order", $id)
                 ->update("`order`");
    }
}