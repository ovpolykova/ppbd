<?php
 
class Kill_session extends CI_Model {
           
    public function kill_session()
    {
        $this->session->sess_destroy();
    }

}