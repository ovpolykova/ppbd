<?php
	class Product extends CI_Controller {

    //Просмотр типов прайс-листа|Кузнецов
	public function browse_product()
	{
        //Сессия
		$data['session'] = $this->session->userdata('login_session');

        $this->load->model('price_m');
        $data['type_t'] = $this->price_m->sel_type_t();
        
        $this->load->view('templates/header');
        $this->load->view('templates/navbar_admin', $data);
        $this->load->view('pages/product', $data);
        $this->load->view('templates/footer');
	}

    //Добавление типа прайс-листа|Кузнецов
	public function add_type_t()
	{
        //Сессия
		$data['session'] = $this->session->userdata('login_session');

        $data = array(
            'type_t' => $this->input->post('type_t')
        );
        $this->load->model('price_m');
        $this->price_m->add_type_t($data);

        redirect('product/browse_product');
	}

    //Добавление типа прайс-листа|Кузнецов
	public function upd_type_t()
	{
        //Сессия
		$data['session'] = $this->session->userdata('login_session');

        $ID_type_t = $this->input->post('ID_type_t');
        $data = array(
            'type_t' => $this->input->post('type_t')
        );
        $this->load->model('price_m');
        $this->price_m->upd_type_t($ID_type_t, $data);

        redirect('product/browse_product');
	}

    //Удаление типа прайс-листа|Кузнецов
	public function del_type_t()
	{
        //Сессия
		$data['session'] = $this->session->userdata('login_session');

        $ID_type_t = $this->input->post('ID_type_t');
        $this->load->model('price_m');
        $this->price_m->del_type_t($ID_type_t);

        redirect('product/browse_product');
	}
}