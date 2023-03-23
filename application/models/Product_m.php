<?php
class Product_m extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    //Просмотр товаров с привязкой к определенному прайс-листу|Кузнецов
    public function sel_product()
    {
        $query = $this->db->select('p.ID_product, name_product')
                          ->from('price_list p, product')
                          ->where('p.ID_product=product.ID_product')
                          ->group_by('ID_product, name_product')
                          ->get();
        return $query->result_array();
    }

    //Добавление товара с привязкой к определенному прайс-листу|Кузнецов
    public function add_product($data)
    {
        //$this->db->insert('product', $data);
    }

    //Изменение цены товара с привязкой к определенному прайс-листу|Кузнецов
    public function upd_price_product($valuta, $price, $id)
    {
        $this->db->set('ID_valuta', $valuta)
                 ->set('price', $price)
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
        // $query = $this->db->get('group');
        // return $query->result_array();
    }

    //Список прайс-листа одного товара|Кузнецов
    public function sel_price_id_product($id)
    {
        $query = $this->db->select('*')
                          ->from('price_list p, product, type_t t, valuta v')
                          ->where('p.ID_product=product.ID_product')
                          ->where('p.ID_type_t=t.ID_type_t')
                          ->where('p.ID_valuta=v.ID_valuta')
                          ->where('p.ID_product', $id)
                          ->get();
        return $query->result_array();
    }
}