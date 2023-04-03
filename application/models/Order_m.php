<?php
class Order_m extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    //Выбрать заказ|Харламов
    public function sel_order()
    {
        $sql = "SELECT `order`.ID_order, users.fio, contract.contractor, product.name_product, count,  date_order, date_send, status FROM users, contract, price_list, product, `order` 
        WHERE `order`.ID_order = users.ID_user AND `order`.ID_contract = contract.ID_contract 
        AND `order`.ID_list = price_list.ID_list AND price_list.ID_product = product.ID_product";
        $query = $this->db->query($sql);
        return $query->result_array(); 
    }

    //Изменить статус заказа|Харламов
    public function upd_order_status($status, $id)
    {
        $this->db->set('status', $status)
                ->where('ID_order', $id)
                ->update('order');
    }

    //Просмотр заказ|Волобуев
    public function sel_order_2($ID_user)
    {
        $sql = "SELECT * FROM `order`, `users`, `contract`, `price_list`,`product` WHERE 
        `order`.`ID_user`=`users`.`ID_user` AND `order`.`ID_contract`=`contract`.`ID_contract` 
        AND `price_list`.`ID_product`=`product`.`ID_product` AND `order`.`ID_list`=`price_list`.`ID_list` AND `order`.`ID_user`=$ID_user";
        $query = $this->db->query($sql);
        return $query->result_array(); 
    }

    //Выбрать контрагент|Волобуев
    public function sel_contract()
    {
        $query = $this->db->select('*')
                          ->from('contract')
                          ->get();
        return $query->result_array();
    }

    //Добавить заказа|Волобуев
    public function add_order($ID_user, $ID_contract, $ID_list, $count)
    {
        $sql = "INSERT INTO `order`(`ID_user`, `ID_contract`, `ID_list`, `count`,  `status`) VALUES ($ID_user, $ID_contract, $ID_list, $count, 'Заказан')";
        $query = $this->db->query($sql);
        return $query->result_array(); 
    }
}