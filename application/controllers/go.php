<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
Author: Jeferson Ricardo Böes
Email: jefersonboes@gmail.com
Date: 05/2013
*/

class Go extends CI_Controller {

	public function _remap($hash)
	{
	    $this->load->database();

		$this->load->model('LinkModel');

		$link = $this->LinkModel->get_link($hash);

		if ($link)
		{
			$this->load->helper('url');
			redirect($link, 'refresh');
		}
		else
		{
			$this->load->view("invalid_link");
		}
	}
}
