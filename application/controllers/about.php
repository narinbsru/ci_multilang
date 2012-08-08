<?php

class About extends CI_Controller {

    function index() {
// you might want to just autoload these two helpers
        $this->load->helper('language');
        $this->load->helper('url');

// load language file
        $this->lang->load('about');

        $data['thislang'] = $this->lang->lang();
        $this->load->view('about',$data);
    }

}

?>