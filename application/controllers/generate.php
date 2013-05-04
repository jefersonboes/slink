<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
Author: Jeferson Ricardo Böes
Email: jefersonboes@gmail.com
Date: 05/2013
*/

class Generate extends CI_Controller {

	public function index()
	{
		$this->load->view('generate');
	}

	public function process()
	{
		$this->load->database();

		$link = $this->input->post('link');

		$link = $this->check_link($link);

		$this->load->model('LinkModel');

		$hash = $this->LinkModel->gen_link_hash($link);

		echo $this->gen_link($hash);
	}

	private function gen_link($hash)
	{
		$this->load->helper('url');

		return site_url('go/' . $hash);
	}

	private function check_link($link)
	{
		$pos = stripos($link, "http://");

		if ($pos === false)
			$pos = stripos($link, "https://");

		if ($pos === false)
			return "http://" . $link;

		return $link;
	}
}
