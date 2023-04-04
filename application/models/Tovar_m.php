<?php
class Tovar_m extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    //Выбрать товар| Харламов
    public function sel_tovar()
    {
        $query = $this->db->get('product');
        return $query->result_array();
    }

    //Выбрать контрагента фильтры для заказы | Харламов 
   
    public function sel_tov()
    {
        $query = $this->db->select('*')
                          ->from('order, contract, product, price_list')
                          ->where('order.ID_contract = contract.ID_contract')
                          ->where('price_list.ID_product = product.ID_product')
                          ->where('order.ID_list = price_list.ID_list')
                          ->order_by('contractor')
                        
                          ->get();
        return $query->result_array();
    }

    //Выбрать контрагент с фильтром|Харламов
    public function sel_tov_zak_filter($data_filter)
    {
    $query = $this->db->select('*')
                    ->from('order, contract, product, price_list')
                    ->where('order.ID_contract = contract.ID_contract')
                    ->where('price_list.ID_product = product.ID_product')
                    ->where('order.ID_list = price_list.ID_list')
                    ->where('order.ID_list', $data_filter)
                    ->order_by('contractor')
                    

                    ->get();
    return $query->result_array();
    }

}
