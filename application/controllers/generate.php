<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Generate extends CI_Controller {

	public function index()
	{
		$this->load->helper('form');
		$this->load->view('generate');
	}

	public function process()
	{
		$this->load->database();

		$link = $this->input->post('link');

		$this->load->model('LinkModel');		

		$hash = $this->LinkModel->get_hash($link);

		if (!$hash)
		{
			$hash = $this->LinkModel->gen_hash();

			$this->LinkModel->Link = $link;
			$this->LinkModel->Hash = $hash;
			$this->LinkModel->insert_link();
		}

		echo $this->gen_link($hash);
	}

	private function gen_link($hash)
	{
		$this->load->helper('url');

		return site_url('go/' . $hash);
	}
}