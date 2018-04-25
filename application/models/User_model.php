<?php
class User_model extends CI_Model {

    public function signup() 
    {
    	$pseudo = $this->input->post('pseudo');
        $email = $this->input->post('email');
    	$password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);

		$data = array(
        'pseudo' => $pseudo,
        'email' => $email,
        'password' => $password,
    	);
    	$this->db->insert('users', $data);            

        return $pseudo;  	   	  	
	}
    public function check_id($pseudo, $password)
    {
        $valid_id = TRUE;
        $query = $this->db->get_where('users', array('pseudo' => $pseudo));
        $data = $query->row_array();
        if(!$data['pseudo'])
        {           
            $valid_id = FALSE;
        }
        elseif (password_verify($password, $data['password']) === FALSE) {

            $valid_id = FALSE;
        }
        return $valid_id;
    }
}