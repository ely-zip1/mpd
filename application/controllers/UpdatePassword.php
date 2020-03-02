<?php
defined('BASEPATH') or exit('No direct script access allowed');

class UpdatePassword  extends CI_Controller
{
	public function __construct()
        {
            parent::__construct();
			$this->load->model('Members');
        }

	public function index()
	{
		$data = array(
			'title' => "Password Update"
		);

		$this->form_validation->set_rules('current-password', 'Current Password', 'required|min_length[6]|callback_validate_password');
		$this->form_validation->set_rules('new-password', 'Password', 'required|min_length[6]');
		$this->form_validation->set_rules('password-confirm', 'Confirm Password ', 'required|min_length[6]|matches[new-password]');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/header', $data);
			$this->load->view('pages/update_password', $data);
			$this->load->view('templates/footer');
		}
		else {
            $this->Members->update_password($this->session->email, $_POST['new-password']);
            
            if(is_password_set){
                $this->session->set_flashdata('update_password_message', 'Your password has been updated.');
                redirect('UpdatePassword','auto');
            }
		}

	}
	
	function validate_password(){

		$is_valid = $this->Members->verify_member($this->session->email,$_POST['current-password']);

		if($is_valid){
			return true;
		}else{
			$this->form_validation->set_message('validate_password','Invalid password.');
			return false;
		}
	}
	
	function is_password_set(){

		$is_valid = $this->members->verify_member($this->session->email,$_POST['new-password']);

		if($is_valid){
			return true;
		}else{
			return false;
		}
	}
	
}
