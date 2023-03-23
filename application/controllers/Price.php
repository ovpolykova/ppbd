<?php
	class Price extends CI_Controller {

    //Просмотр прайс-листов|Кузнецов
	public function browse_price()
	{
        //Сессия
		$data['session'] = $this->session->userdata('login_session');

        $this->load->model('price_m');
        $data['price_list'] = $this->price_m->sel_price();
        $data['type_t'] = $this->price_m->sel_type_t();
        $data['valuta'] = $this->price_m->sel_valuta();
        $data['product'] = $this->price_m->sel_product();
        $this->load->view('templates/header');
        $this->load->view('templates/navbar_admin', $data);
        $this->load->view('pages/price', $data);
        $this->load->view('templates/footer');
	}

    //Добавление прайс-листа|Кузнецов
    public function add_price()
	{
        if (!empty($_POST))
        {
            $data = array(
                'ID_product' => $this->input->post('ID_product'),
                'ID_type_t'  => $this->input->post('ID_type_t'),
                'ID_valuta'  => $this->input->post('ID_valuta'),
                'price'      => $this->input->post('price')
            );
            $this->load->model('price_m');
            $this->price_m->add_price($data);

            $this->session->set_flashdata('success_add_price','Прайс-лист успешно добавлен!');
            redirect('price/browse_price');
        }
	}

    //Изменение прайс-листа|Кузнецов
    public function upd_price()
	{
        $data = array(
            'ID_product' => $this->input->post('ID_product'),
            'ID_type_t'  => $this->input->post('ID_type_t'),
            'ID_valuta'  => $this->input->post('ID_valuta'),
            'price'      => $this->input->post('price')
        );
        $id = "ID_list=".$this->input->post('ID_list');
        $this->load->model('price_m');
        $this->price_m->upd_price($data, $id);

        redirect('price/browse_price');
	}

    //Удаление прайс-листа|Кузнецов
    public function del_price()
	{
        $data = array(
            'ID_list' => $this->input->post('ID_list')
        );
        $this->load->model('price_m');
        $this->price_m->del_price($data);
        redirect('price/browse_price');
	}
}