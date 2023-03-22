<?php
	class Product extends CI_Controller {

    //Просмотр товаров с привязкой к определенному прайс-листу|Кузнецов
	public function browse_product()
	{
        
	}

    //Добавление товара с привязкой к определенному прайс-листу|Кузнецов
    public function add_product()
	{
        if (!empty($_POST))
        {
            $data = array(
                'name_product' => $this->input->post('name_product'),
                'ID_group'     => $this->input->post('ID_group'),
                'unit'         => $this->input->post('unit'),
                'description'  => $this->input->post('description'),
                'image'        => $this->input->post('image'),
            );
            $this->load->model('product_m');
            $this->product_m->add_product($data);

            $this->session->set_flashdata('success_add_product','Продукт успешно добавлен!');
            redirect('main/product');
        }
	}

    //Изменение товара с привязкой к определенному прайс-листу|Кузнецов
    public function upd_product()
	{
        
	}

    //Удаление товара с привязкой к определенному прайс-листу|Кузнецов
    public function del_product()
	{
        $data = array(
            'ID_product' => $this->input->post('ID_product')
        );
        $this->load->model('product_m');
        $this->product_m->del_product($data);
        redirect('main/product');
	}
}