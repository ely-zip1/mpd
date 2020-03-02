<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Pages  extends CI_Controller
{

	public function index($pageName = 'dashboard')
	{
		$data = array(
			'title' => "Dashboard"
		);

		$this->load->view('templates/header');
		$this->load->view('pages/' . $pageName, $data);
		$this->load->view('templates/footer');
	}
}
