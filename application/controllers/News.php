<?php
class News extends CI_Controller {

    const NB_COMMENT_PER_PAGE = 5;

    public function __construct()
    {
        parent::__construct();
        $this->load->model('news_model');
        $this->load->helper(array('url_helper', 'assets', 'tools'));
        $this->load->library(array('messages', 'pagination'));
        // $this->output->enable_profiler(true);
    }

    public function index($nb_comment = 0)
    {
        

        // $this->benchmark->mark('code_start');
        $data['news'] = $this->news_model->get_news(self::NB_COMMENT_PER_PAGE, $nb_comment); 
        // $this->benchmark->mark('code_end');    

        $data['session'] = $this->session->userdata(); // permet d'afficher les données de la session dans un var_dump.
        $data['title'] = 'Liste des news';

        $config['base_url'] = 'http://codeigniter.test/news/index/';
        $config['total_rows'] = $this->news_model->count_news();
        $config['per_page'] = self::NB_COMMENT_PER_PAGE;

        $this->pagination->initialize($config);
        
        $this->load->view('templates/header', $data);
        $this->load->view('news/index', $data);
        $this->load->view('templates/footer');
    }
    public function view($label = NULL)
    {
        $data['news_item'] = $this->news_model->get_one_news($label);

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
        if ($_SESSION['pseudo'] === NULL)
        {
                redirect('user');
        }
        $this->load->helper('form');
        $this->load->library('form_validation');

        $data['title'] = 'Ajouter un article';

        $this->form_validation->set_rules('title', 'Titre', 'required',
                array('required' => 'Vous devez renseigner un %s.')
        );
        $this->form_validation->set_rules('comment', 'Commentaire', 'required',
              array('required' => 'De quoi voulez vous parler ?')
        );

        if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('templates/header', $data);
            $this->load->view('news/create');
            $this->load->view('templates/footer');

        }
        else
        {
            $data['title'] = 'Ajouter un article';
            $data['message'] = 'Votre article a bien été enregistré !!';
            $this->news_model->set_news();
            $this->load->view('templates/header', $data);
            $this->load->view('news/success');
            $this->load->view('templates/footer');
        }
    }
    public function delete($label = NULL)
    {
        if ($_SESSION['pseudo'] === NULL)
        {
                redirect('user');
        }
        $data['title'] = 'Supprimer un article';
        $data['message'] = 'Votre article a bien été supprimé !!';
        $this->news_model->delete_news($label);
        $this->load->view('templates/header', $data);
        $this->load->view('news/success');
        $this->load->view('templates/footer');

    }
    // public function _remap($method) // essai : redirige toute les URLS vers la page maintenance.
    // {
    //        $this->maintenance();
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
