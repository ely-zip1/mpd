<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Plans  extends CI_Controller
{
	public function __construct()
        {
            parent::__construct();
        }

	public function index()
	{
		$data = array(
			'title' => "Plans"
        );
        
			$this->load->view('templates/header', $data);
			$this->load->view('pages/plans', $data);
			$this->load->view('templates/footer');

	}
	
}
