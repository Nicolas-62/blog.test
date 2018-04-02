<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Messages
{
	private $message_success = 'Si ce message s\'affiche alors la librairie "messages" est fonctionnelle';
	
	public function recuperer_message()
	{
		return $this->message_success;
	}

}