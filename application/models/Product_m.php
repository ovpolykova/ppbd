<?php
class Product_m extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    //Просмотр товаров с привязкой к определенному прайс-листу|Кузнецов
    public function sel_product()
    {
        $query = $this->db->select ('*')
                          ->from ('price_list p, product, valuta v')
                          ->where('p.ID_product=product.ID_product')
                          ->where('p.ID_valuta=v.ID_valuta')
                          ->get();
        return $query->result_array();
    }

    //Добавление товара с привязкой к определенному прайс-листу|Кузнецов
    public function add_product($data)
    {
        //$this->db->insert('product', $data);
    }

    //Изменение цены товара с привязкой к определенному прайс-листу|Кузнецов
    public function upd_price_product($price, $id)
    {
        $this->db->set('price', $price)
                 ->where('ID_list', $id)
                 ->update('price_list');
    }

    //Удаление товара с привязкой к определенному прайс-листу|Кузнецов
    public function del_product($data)
    {
        //$this->db->delete('product', $data);
    }

    //Выбрать группу|Кузнецов !НОВЫЙ!
    public function sel_group()
    {
        $query = $this->db->get('group');
        return $query->result_array();
    }
    
}