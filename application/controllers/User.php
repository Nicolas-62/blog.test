<?php

class User extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
        $this->load->helper('url_helper');
        $this->load->helper('assets');
        $this->load->helper('tools');
        $this->load->helper('form');
        $this->load->library('messages');
        $this->load->library('session');
        $this->load->library('form_validation');
	}

	public function index()
	{	

        $data['title'] = 'Identification';
        $data['messages'] = FALSE;
        $data['form'] = TRUE;

        if(!empty($_SESSION['pseudo']))
        {
        	if($_SESSION['pseudo'] === TRUE)
        	{
        		$data['messages'] = 'Votre mot de passe est incorrect ou ce pseudo est déjà utilisé !';   
        		$_SESSION['pseudo'] = FALSE;     		
        	}
        	else
        	{
	        	$data['messages'] = 'Vous êtes connecté !';
				$data['form'] = FALSE;	
        	}
        }

        $this->load->view('templates/header', $data);
        $this->load->view('user/index', $data);
        $this->load->view('templates/footer');
	}

	public function connect()
	{
		$data['title'] = 'Identification';
		$data['messages'] = FALSE;
		$data['form'] = TRUE;

        $this->form_validation->set_rules('pseudo', 'Pseudo', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        
        if ($this->form_validation->run() === FALSE)
        {
	        $this->load->view('templates/header', $data);
	        $this->load->view('user/index', $data);
	        $this->load->view('templates/footer');
        }
        else
        {
			$pseudo = $this->user_model->login();
			$_SESSION['pseudo'] = $pseudo;	
			redirect('user');
		}
	}

	public function disconnect()
	{
		$this->session->sess_destroy();
		redirect('news');
	}


}