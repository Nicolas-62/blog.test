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
        if(isset($_SESSION['pseudo']))
        {
            redirect('news');
        }
        else
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
                // $this->email->cc('nicolas.lourdel@laposte.net');

                $this->email->subject('Inscription');
                $this->email->set_alt_message('Votre inscription sur le site a bien été enregistrée Votre pseudo est : '.$pseudo.'');
                
                // $this->email->attach('https://www.nlmonsite.ovh/assets/images/dessin.svg', 'attachment', 'dessin.svg');
                $filename = 'https://www.nlmonsite.ovh/assets/images/blog.jpg';
                $this->email->attach($filename);
                $cid = $this->email->attachment_cid($filename);
                $this->email->message('<p>Votre inscription sur le site a bien été enregistrée !</br>
                                        Votre pseudo est : '.$pseudo.'</br></p>
                                        <p>Pour retourner sur le blog cliquez ici :</p> 
                                        <p><a href="https://www.nlmonsite.ovh/news">
                                        <img src="cid:'. $cid .'" alt="blog de nico" />
                                        </a></p>');
                $CR_Mail = TRUE;
                $CR_Mail = $this->email->send();
                $this->email->print_debugger();
                // fin envoi mail à l'utilisateur
                
                if ($CR_Mail === FALSE)
                {
                    $message = " Erreur envoi mail, votre inscription a bien été effectuée mais le mail de confirmation n'a pu être envoyé<br> \n";
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
    }
    public function login()
    {
        if(isset($_SESSION['pseudo']))
        {
            redirect('news');
        }
        else
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
    }
    public function logged()
    { 
        if(isset($_SESSION['pseudo']))
        {
            redirect('news');
        }
        else
        {
            $data['title'] = 'Bienvenue';

            $this->load->view('templates/header', $data);
            $this->load->view('user/logged');
            $this->load->view('templates/footer'); 
        }
    }

	public function logout()
	{
        if(isset($_SESSION['pseudo']))
        {
            redirect('news');
        }
        else
        {
            $this->session->unset_userdata('pseudo');
    		$this->session->sess_destroy();
    		redirect('news');
        }
	}
}