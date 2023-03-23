<?php
class Product_m extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    //Выбрать товар|Кузнецов
    public function sel_product()
    {
        $query = $this->db->get('product');
        return $query->result_array();
    }

    //Добавить товар|Кузнецов
    public function add_product($data)
    {
        $this->db->insert('product', $data);
    }

    //Изменить товар|Кузнецов
    public function upd_product()
    {
        
    }

    //Удалить товар|Кузнецов
    public function del_product($data)
    {
        $this->db->delete('product', $data);
    }

    //Изменить цену товара|Кузнецов
    public function upd_product_price()
    {
        
    }

    //Выбрать группу|Кузнецов !НОВЫЙ!
    public function sel_group()
    {
        $query = $this->db->get('group');
        return $query->result_array();
    }
    
}