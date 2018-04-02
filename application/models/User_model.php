<?php
class User_model extends CI_Model {

	public function __construct()
    {
        $this->load->database();
    }

    public function login() 
    {
    	$pseudo = $this->input->post('pseudo');
    	$password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
    	$query = $this->db->get_where('users', array('pseudo' => $pseudo));
    	$data = $query->row_array();

    	if(!$data['pseudo'])
    	{
			$data = array(
	        'pseudo' => $pseudo,
	        'password' => $password,
	    	);
	    	$this->db->insert('users', $data); 
            return $pseudo;
    	}
    	elseif(password_verify($this->input->post('password'), $data['password']) === FALSE)
    	{
    		$pseudo = TRUE;
            return $pseudo;
		}
		else
		{
			return $pseudo; 	
		}   	   	  	
	}
}