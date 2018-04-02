<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('french_date'))
{
	function french_date($data)
	{
        $data = date("d-m-Y", strtotime($data));
        return $data;		
	}
}