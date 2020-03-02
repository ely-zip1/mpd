<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MyPackage  extends CI_Controller
{
	public function __construct()
        {
            parent::__construct();
        }

	public function index()
	{
        
		$data = array(
			'title' => "My Packages"
        );
        
			$this->load->view('templates/header', $data);
			$this->load->view('pages/mypackage', $data);
			$this->load->view('templates/footer');
            

	}
	
}
