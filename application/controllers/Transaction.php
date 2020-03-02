<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Support  extends CI_Controller
{
	public function __construct()
        {
            parent::__construct();
        }

	public function index()
	{
		$data = array(
			'title' => "Transaction History"
		);

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/header', $data);
			$this->load->view('pages/transaction_log', $data);
			$this->load->view('templates/footer');
		}
		else {

		}

	}
	
}
