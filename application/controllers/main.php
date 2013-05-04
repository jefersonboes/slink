<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
Author: Jeferson Ricardo Böes
Email: jefersonboes@gmail.com
Date: 05/2013
*/

class Main extends CI_Controller {

	public function _remap($method)
	{
		$request = $this->uri->segment(1);
		$this->go_page($request);
	}

	private function go_page($hash)
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
