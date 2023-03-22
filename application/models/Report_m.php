<?php
class Report_m extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    //Выбрать заказы, подготовленных к доставке|Харламов
    public function sel_order_delivery()
    {
        
    }

    //Выбрать заказ по контрагентам за период|Пручковский
    public function sel_rep_order_contract()
    {
        
    }

    //Выбрать заказ по товарам за период|Пручковский
    public function sel_rep_order_product()
    {
        
    }

    //Выбрать заказ, не выполненных в срок за период|Кузнецов
    public function sel_rep_order_fall()
    {
        
    }
}