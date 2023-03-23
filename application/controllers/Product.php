<?php
	class Product extends CI_Controller {

    //Просмотр товаров с привязкой к определенному прайс-листу|Кузнецов
	public function browse_product()
	{
        //Сессия
		$data['session'] = $this->session->userdata('login_session');

        $this->load->model('product_m');
        $data['product'] = $this->product_m->sel_product();
        $data['group']   = $this->product_m->sel_group();
        $this->load->view('templates/header');
        $this->load->view('templates/navbar_admin', $data);
        $this->load->view('pages/product', $data);
        $this->load->view('templates/footer');
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

    //Изменение цены товара с привязкой к определенному прайс-листу|Кузнецов
    public function upd_price_product()
	{
        $price = $this->input->post('price');
        $id    = $this->input->post('ID_list');
        $this->load->model('product_m');
        $this->product_m->upd_price_product($price, $id);

        redirect('product/browse_product');
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