<?php
class News_model extends CI_Model {

    public function get_news($nb_comment_per_page, $debut)
	{
        $this->db->select('*')->from('news')->order_by('date', 'DESC')->limit($nb_comment_per_page, $debut);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_one_news($label)
    {
        $query = $this->db->get_where('news', array('label' => $label));
        return $query->row_array();
    }

    public function count_news()
    {
        return $this->db->count_all('news');
    }

	public function set_news()
	{
        $this->load->helper('url');

        $label = url_title($this->input->post('title'), 'dash', TRUE); 
        //  url_title permet l'usage de la donnée en URL : dash transforme les espaces en tirets et TRUE force la passage des caractères en minuscule.
        $comment = $this->input->post('comment');

        $data = array(
            'title' => $this->input->post('title'),
            'label' => $label,
            'comment' => $comment,
            'author' => $this->input->post('author')

        );
        return $this->db->insert('news', $data);
	}
    
    public function delete_news($label)
    {
       return $this->db->delete('news', array('label' => $label));
    }
}