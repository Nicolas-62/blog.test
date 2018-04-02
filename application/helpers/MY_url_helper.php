<?php  
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('site_url'))
{
	function site_url($uri = '') // fonction initiale, 2eme arg : $protocol = NULL
	{
		if( ! is_array($uri))
		{
		//	Tous les paramètres sont insérés dans un tableau
		$uri = func_get_args();
		}
		return get_instance()->config->site_url($uri); // 2eme arg : $protocol (http)
	}
}
if ( ! function_exists('url'))
{
	function url($text, $uri = '')
	{
		if( ! is_array($uri))
		{
			//	Suppression de la variable $text
			$uri = func_get_args();
			array_shift($uri);
		}
	
		echo '<a href="' . site_url($uri) . '">' . htmlentities($text) . '</a>';
		return '';
	}
}