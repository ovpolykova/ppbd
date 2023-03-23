<?php
class Price_m extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    //Выбрать прайс-лист|Кузнецов
    public function sel_price()
    {
        $query = $this->db->select('*')
                          ->from('price_list p, product, type_t t, valuta v')
                          ->where('p.ID_product=product.ID_product')
                          ->where('p.ID_type_t=t.ID_type_t')
                          ->where('p.ID_valuta=v.ID_valuta')
                          ->get();
        return $query->result_array();
    }

    //Добавить прайс-лист|Кузнецов
    public function add_price($data)
    {
        $this->db->insert('price_list', $data);
    }

    //Изменить прайс-лист|Кузнецов
    public function upd_price()
    {
        
    }

    //Удалить прайс-лист|Кузнецов
    public function del_price($data)
    {
        $this->db->delete('price_list', $data);
    }

    //Выбрать тип товара|Кузнецов !НОВЫЙ!
    public function sel_type_t()
    {
        $query = $this->db->get('type_t');
        return $query->result_array();
    }

    //Выбрать валюту|Кузнецов !НОВЫЙ!
    public function sel_valuta()
    {
        $query = $this->db->get('valuta');
        return $query->result_array();
    }
}