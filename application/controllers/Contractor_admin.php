<?php
    class Contractor_admin extends CI_Controller {

    public function index()
    {
        $this->load->model('contractor_m');
        $data['contract'] = $this->contractor_m->sel_contractor();
        $this->load->view('templates/header');
        $this->load->view('templates/navbar_admin');
        $this->load->view('pages/contractor_editing', $data);
        $this->load->view('templates/footer');
    }
}
?>