<?php

class User extends CI_Controller {

	public function __construct()
	{
    	parent::__construct();
    	$this->load->model('user_model');
        $this->load->helper(array('url_helper', 'assets', 'tools', 'form'));
        $this->load->library(array('messages', 'form_validation'));
        // $this->output->enable_profiler(true);
	}

	public function signup()
	{	
        $data['title'] = 'Identification';
        $data['messages'] = FALSE;

        $this->form_validation->set_rules('pseudo', 'pseudo', 'trim|required|is_unique[users.pseudo]',
            array('required' => 'Vous devez renseigner un %s.',
                    'is_unique' => 'Ce %s est déjà utilisé.', 
                    )
        );
        $this->form_validation->set_rules('email', 'email', 'trim|required|valid_email|is_unique[users.email]', 
            array('required' => 'Vous devez renseigner une adresse mail valide.',
                  'is_unique' => 'Cette adresse mail est déjà utilisée', 
                    )
        );
        $this->form_validation->set_rules('password', 'mot de passe', 'required', 
                array('required' => 'Vous devez renseigner un %s.')
        );
        if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('templates/header', $data);
            $this->load->view('user/signup', $data);
            $this->load->view('templates/footer');                                              
        }
        else
        {
            // enregistrement utilisateur
            $pseudo = $this->user_model->signup();
            // fin enregistrement utilisateur

            // envoi mail à l'utilisateur
            $this->email->from('nicolas.lourdel@nlmonsite.ovh', 'Nicolas Lourdel');
            $this->email->to($this->input->post('email'));

            $this->email->subject('Inscription');
            $this->email->message('Votre inscription sur le site a bien été enregistrée</br>
                                    Votre pseudo est : '.$pseudo);

            $CR_Mail = TRUE;
            $CR_Mail = $this->email->send();
            $this->email->print_debugger();
            // fin envoi mail à l'utilisateur
            
            if ($CR_Mail === FALSE)
            {
                $message = " ### CR_Mail=$CR_Mail - Erreur envoi mail <br> \n";
            }
            else
            {
                $message = "Un mail de confirmation vous a été envoyé.";
            }  
            $this->session->set_userdata(array('message' => $message,
                                                'pseudo' => $pseudo));
            redirect('user/logged');
        }
    }
    public function login()
    {
        $data['title'] = 'Connexion';
        $data['messages'] = FALSE;

        $this->form_validation->set_rules('pseudo', 'pseudo', 'trim|required',
                array('required' => 'Vous devez renseigner un %s.')
        );
        $this->form_validation->set_rules('password', 'mot de passe', 'required', 
                array('required' => 'Vous devez renseigner un %s.')
        );
        if ($this->form_validation->run())
        {
            $pseudo = $this->input->post('pseudo');
            $password = $this->input->post('password');
            $check_password = $this->user_model->check_id($pseudo, $password);

            if($check_password === FALSE)
            {
                    $data['messages'] = "Vos identifiants sont incorrect."; 

                $this->load->view('templates/header', $data);
                $this->load->view('user/login', $data);
                $this->load->view('templates/footer');  
            }
            else
            {                            
                $message = "Content de te revoir parmis nous !";
                $this->session->set_userdata(array('message' => $message,
                                                    'pseudo' => $pseudo));
                redirect('user/logged'); 
            }                      
        }
        else
        {
            $this->load->view('templates/header', $data);
            $this->load->view('user/login', $data);
            $this->load->view('templates/footer'); 
        }
    }
    public function logged()
    { 
        $data['title'] = 'Bienvenue';

        $this->load->view('templates/header', $data);
        $this->load->view('user/logged');
        $this->load->view('templates/footer'); 
    }

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('news');
	}
}