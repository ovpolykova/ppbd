<?php
	class Tovar extends CI_Controller {

    //Просмотр контрагентов|Харламов
	public function browse_tovar()
	{
        $data['session'] = $this->session->userdata('login_session');

        $this->load->model('tovar_m');

        if (!empty($_POST)) {
            $data_filter = array(
                'ID_product' => $this->input->post('ID_product')
            );
            $data['tovars'] = $this->tovar_m->sel_tov_zak_filter($data_filter['ID_product']);
        } else {
            $data['tovars'] = $this->tovar_m->sel_tov();
        }
        
        
        
        $data['tova'] = $this->tovar_m->sel_tovar();
   

        $this->load->view('templates/header');
        $this->load->view('templates/navbar_operator', $data);
        $this->load->view('pages/tovar', $data);
        $this->load->view('templates/footer');
	}


}
