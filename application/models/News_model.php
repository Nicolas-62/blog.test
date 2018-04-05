<?php
class News_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    public function get_news($label = FALSE)
	{
    if ($label === FALSE)
    {
        $this->db->select('*')->from('news')->order_by('date', 'DESC');
        $query = $this->db->get();
        return $query->result_array();
    }
    $query = $this->db->get_where('news', array('label' => $label));
    return $query->row_array();
	}

	public function set_news()
	{
    $this->load->helper('url');

    $label = url_title($this->input->post('title'), 'dash', TRUE); 
    //  url_title permet l'usage de la donnée en URL : dash transforme les espaces en tirets et TRUE force la passage des caractères en minuscule.
    $comment = $this->input->post('comment');
    $comment = preg_replace('#https://[a-z0-9._/-]+#i', '<a href="$0">$0</a>', $comment);

    $data = array(
        'title' => $this->input->post('title'),
        'label' => $label,
        'comment' => $comment,
        'author' => $this->input->post('author')

    );

    return $this->db->insert('news', $data);
	}
}