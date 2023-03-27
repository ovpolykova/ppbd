<?php
	class Price extends CI_Controller {

    //Просмотр прайс-листов|Кузнецов
	public function browse_price()
	{
        //Сессия
		$data['session'] = $this->session->userdata('login_session');

        //Фильтр
        $name_product = '';

        if ($this->input->post('name_product') != '')
        {
            $name_product = $this->input->post('name_product');
        }

        $ID_type_t = "t.ID_type_t IS NOT NULL";

        if ($this->input->post('ID_type_t') != '')
        {
            $ID_type_t = "t.ID_type_t=".$this->input->post('ID_type_t');
        }
        
        $this->load->model('price_m');
        $data['price_list'] = $this->price_m->sel_price_filter($name_product, $ID_type_t);
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
            $a = 1;

            for ($i=1; $i <= 3; $i++) { 
                $data = array(
                    'ID_product' => $this->input->post('ID_product'),
                    'ID_type_t'  => $this->input->post('value'.$a++),
                    'ID_valuta'  => $this->input->post('value'.$a++),
                    'price'      => $this->input->post('value'.$a++)
                );
                $check = $this->input->post('value'.($a-1));

                if ($check != 0) {
                    $this->load->model('price_m');
                    $this->price_m->add_price($data);
                }
            }

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