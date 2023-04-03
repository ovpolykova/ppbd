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
                          ->order_by('ID_list')
                          ->get();
        return $query->result_array();
    }

    //Добавить прайс-лист|Кузнецов
    public function add_price($data)
    {
        $this->db->insert('price_list', $data);
    }
    
    //Добавить тип прайс-листа|Кузнецов
    public function add_type_t($data)
    {
        $this->db->insert('type_t', $data);
    }

    //Изменить прайс-лист|Кузнецов
    public function upd_price($data, $id)
    {
        $this->db->update('price_list', $data, $id);
    }

    //Изменить тип прайс-листа|Кузнецов
    public function upd_type_t($ID_type_t, $data)
    {
        $this->db->where("ID_type_t=$ID_type_t AND NOT EXISTS(SELECT * FROM price_list WHERE ID_type_t = $ID_type_t)", null, false)
                 ->update('type_t', $data);
    }

    //Удалить прайс-лист|Кузнецов
    public function del_price($data)
    {
        $this->db->delete('price_list', $data);
    }

    //Удалить тип прайс-листа|Кузнецов
    public function del_type_t($ID_type_t)
    {
        $this->db->where("ID_type_t=$ID_type_t AND NOT EXISTS(SELECT * FROM price_list WHERE ID_type_t = $ID_type_t)", null, false)
                 ->delete('type_t');
    }

    //Выбрать Товар|Кузнецов
    public function sel_product($limit, $offset)
    {
        $this->db->limit($limit, $offset);
        $query = $this->db->select('*')
                          ->where('p.ID_group=g.ID_group')
                          ->get('product p, group g');
        return $query->result_array();
    }

    //Выбрать товар ФИЛЬТР|Кузнецов
    public function sel_product_filter($data_filter, $limit, $offset)
    {
        $this->db->limit($limit, $offset);
        $query = $this->db->select('*')
                          ->where('p.ID_group=g.ID_group')
                          ->where_in('p.ID_group', $data_filter)
                          ->get('product p, group g');
        return $query->result_array();
    }

    //Выбрать тип прайс-листа|Кузнецов
    public function sel_type_t()
    {
        $query = $this->db->get('type_t');
        return $query->result_array();
    }

    //Выбрать валюту|Кузнецов
    public function sel_valuta()
    {
        $query = $this->db->get('valuta');
        return $query->result_array();
    }

    //Выбрать прайс-лист c фильтром|Кузнецов
    public function sel_price_filter($name_product, $ID_type_t)
    {
        $query = $this->db->select('*')
                          ->from('price_list p, product, type_t t, valuta v')
                          ->where('p.ID_product=product.ID_product')
                          ->where('p.ID_type_t=t.ID_type_t')
                          ->where('p.ID_valuta=v.ID_valuta')
                          ->where($ID_type_t)
                          ->like('name_product', $name_product)
                          ->order_by('ID_list')
                          ->get();
        return $query->result_array();
        var_dump($this->db->last_query());
    }

    //Выбрать группу товара|Кузнецов
    public function sel_group()
    {
        $query = $this->db->get('group');
        return $query->result_array();
    }

}