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

		/*$data = $this->LinkModel->get_links();

		foreach ($data as $link)
		{
        	echo $link->Link;
        	echo "</br>";
    	}*/


		//$this->load->helper('url');
		//redirect('/generate', 'refresh');

    	$data['link'] = $this->gen_link($hash);
    	$this->load->helper('form');    	
		$this->load->view('generate', $data);
	}

	private function gen_link($hash)
	{
		$this->load->helper('url');

		return site_url('go/' . $hash);
	}
}
