<?php
class Cv extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url_helper');
        $this->load->helper('assets');
        $this->load->helper('tools');
    }
    public function index()
    {
        $this->load->view('cv/index');
    }
}