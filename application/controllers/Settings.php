<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Settings  extends CI_Controller
{
	public function __construct()
        {
            parent::__construct();
        }

	public function index()
	{
		$data = array(
			'title' => "Settings"
		);

		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/pages/settings', $data);
		$this->load->view('admin/templates/footer');

	}
	
}
