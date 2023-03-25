<?php
class Report_m extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    //Выбрать заказы, подготовленных к доставке|Харламов
    public function sel_order_delivery()
    {
        $sql = "SELECT `order`.ID_order, users.fio, contract.contractor, product.name_product, count,  date_order, date_send, status FROM users, contract, price_list, product, `order` 
            WHERE `order`.ID_order = users.ID_user AND `order`.ID_contract = contract.ID_contract 
            AND `order`.ID_list = price_list.ID_list AND price_list.ID_product = product.ID_product AND status = 'Подготовен к доставку'";
        $query = $this->db->query($sql);
        return $query->result_array(); 
        
    }

    //Выбрать заказ по контрагентам за период|Пручковский
    public function sel_rep_order_contract($date1, $date2)
    {
        $sql = "";
        $query = $this->db->query($sql);
        return $query->result_array(); 
    }

    //Выбрать заказ по товарам за период|Пручковский
    public function sel_rep_order_product($date1, $date2)
    {
        $sql = "";
        $query = $this->db->query($sql);
        return $query->result_array(); 
    }

    //Выбрать заказ, не выполненных в срок за период|Кузнецов
    public function sel_rep_order_fall($date1, $date2)
    {
        $query = $this->db->select('*')
                 ->from('order o, contract c')
                 ->where('o.ID_contract=c.ID_contract')
                 ->where('(date_send-date_order)>5')
                 ->where("date_send BETWEEN '$date1' AND '$date2'")
                 ->get();
        return $query->result_array(); 
    }
}