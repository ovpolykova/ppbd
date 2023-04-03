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
    public function sel_rep_order_contract($date1, $date2, $limit, $offset)
    {
        $this->db->limit($limit, $offset);
        $query = $this->db->select("ID_order, contractor, date_order, date_send, SUM(price*count), status")
                          ->from("`order`, `contract`, price_list")
                          ->where("`order`.ID_contract=`contract`.ID_contract")
                          ->where("`order`.ID_list=price_list.ID_list")
                          ->where("date_order BETWEEN '$date1' AND '$date2'")
                          ->where("status IN ('Отправлен','Подготовка к отправке')")
                          ->group_by("ID_order, contractor, date_order, date_send, status")
                          ->get();
        return $query->result_array();
    }

    //Получение количества для пагинации контрагента|Пручковский
    public function getTotalRows_contract()
    {
        $query = $this->db->get('`order`');
        return $query->num_rows();
    }

    //Выбрать заказ по товарам за период|Пручковский
    public function sel_rep_order_product($date1, $date2, $limit, $offset)
    {
        $this->db->limit($limit, $offset);
        $query = $this->db->select("ID_order, name_product, date_order, date_send, SUM(price*count), status")
                          ->from("`order`, price_list, product")
                          ->where("`order`.ID_list=price_list.ID_list")
                          ->where("price_list.ID_product=product.ID_product")
                          ->where("date_order BETWEEN '$date1' AND '$date2'")
                          ->where("status IN ('Отправлен','Подготовка к отправке')")
                          ->group_by("ID_order, name_product, date_order, date_send, status")
                          ->get();
        return $query->result_array(); 
    }

    //Получение количества для пагинации товара|Пручковский
    public function getTotalRows_product()
    {
        $query = $this->db->get('`order`');
        return $query->num_rows();
    }

    //Выбрать заказ, не выполненных в срок за период|Кузнецов
    public function sel_rep_order_fall($date1, $date2, $limit, $offset)
    {
        $this->db->limit($limit, $offset);
        $query = $this->db->select('*')
                 ->from('order o, contract c')
                 ->where('o.ID_contract=c.ID_contract')
                 ->where('(date_send-date_order)>5')
                 ->where("date_send BETWEEN '$date1' AND '$date2'")
                 ->get();
        return $query->result_array(); 
    }

    //Получение количества для пагинации не выполненных в срок за период|Кузнецов
    public function getTotalRows_fall()
    {
        $query = $this->db->get('`order`');
        return $query->num_rows();
    }
}