<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ChangePassword  extends CI_Controller
{
	public function __construct()
        {
            parent::__construct();
        }

	public function index()
	{
		$data = array(
			'title' => "Password Update"
		);

		$this->form_validation->set_rules('current_password', 'Current Password', 'required|min_length[6]');
		$this->form_validation->set_rules('new_password', 'Password', 'required|min_length[6]');
		$this->form_validation->set_rules('new_password2', 'Password ', 'required|min_length[6]');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/header', $data);
			$this->load->view('pages/update_password', $data);
			$this->load->view('templates/footer');
		}
		else {

		}

	}
	
}
