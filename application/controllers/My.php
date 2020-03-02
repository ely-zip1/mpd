<?php
defined('BASEPATH') or exit('No direct script access allowed');

class My  extends CI_Controller
{
	public function __construct()
        {
            parent::__construct();
        }

	public function ref($referral_code = 'ggwp')
	{
        
		$data = array(
			'title' => "Registration",
			'my_ref_code' => $referral_code
        );
        
			// $this->load->view('login/header', $data);
			// $this->load->view('login/registration', $data);
			// $this->load->view('login/footer');
			
			redirect('registration','refresh');
            

	}
	
}
