<?php
class News extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->model('news_model');
                $this->load->helper('url_helper');
                $this->load->helper('assets');
                $this->load->helper('tools');
                $this->load->library('messages');
                $this->load->library('session');
        }

        public function index()
        {
                $data['news'] = $this->news_model->get_news();         
                $data['session'] = $this->session->userdata();
                $data['title'] = 'Liste des news';
                
                $this->load->view('templates/header', $data);
                $this->load->view('news/index', $data);
                $this->load->view('templates/footer');
        }
        public function view($label = NULL)
        {
                $data['news_item'] = $this->news_model->get_news($label);

                if (empty($data['news_item']))
                {
                        show_404();
                }
                $data['title'] = $data['news_item']['title'];

                $this->load->view('templates/header', $data);
                $this->load->view('news/view', $data);
                $this->load->view('templates/footer');
        }
        public function create()
        {
                if ($_SESSION['pseudo'] == FALSE)
                {
                        redirect('user');
                }
                $this->load->helper('form');
                $this->load->library('form_validation');

                $data['title'] = 'Ajouter un article';

                $this->form_validation->set_rules('title', 'Titre', 'required');
                $this->form_validation->set_rules('comment', 'Commentaire', 'required');

                if ($this->form_validation->run() === FALSE)
                {
                    $this->load->view('templates/header', $data);
                    $this->load->view('news/create');
                    $this->load->view('templates/footer');

                }
                else
                {
                    $data['title'] = 'Ajouter un article';
                    $this->news_model->set_news();
                    $this->load->view('templates/header', $data);
                    $this->load->view('news/success');
                    $this->load->view('templates/footer');
                }
        }
        // public function _remap($method) // essai : redirige toute les URLS vers la page maintenance.
        // {
        //         $this->maintenance();
        // }
        public function maintenance()
        {
               $data['title'] = 'Maintenance';

                $this->load->view('templates/header', $data);
                $this->load->view('news/maintenance');
                $this->load->view('templates/footer');
        }
        // public function _output($output) // info sur les données de la page
        // {
        //         var_dump($output);
        // }
        public function redirection()
        {
                $data['title'] = 'Redirection';
                $this->load->view('templates/header', $data);
                $this->load->view('news/redirection', $data);
                $this->load->view('templates/footer');
        }
}
