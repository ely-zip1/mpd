<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Referral  extends CI_Controller
{
	public function __construct()
        {
            parent::__construct();
		
			$this->load->model('Referral_codes');
			$this->load->model('Members');
			$this->load->model('Referral_bonus_model');
			$this->load->model('ReferralModel');
        }

	public function index()
	{
        
		$data = array(
			'title' => "Referral"
        );

		$member = $this->Members->get_member($this->session->email);
		$referral_code = $this->Referral_codes->get_members_code($member->referral_code_id);

		$data['referral_code'] = $referral_code->code;
		$referrals = array();
		$clients = $this->ReferralModel->get_referees($member->id);

		foreach($clients as $client){
			$client_details = $this->Members->get_member_by_id($client->referee_id);
			$temp = array(
				'name' => $client_details->first_name . ' ' . $client_details->last_name,
				'email' => $client_details->email_address,
				'phone' => $client_details->contact_number,
				'date' => $client_details->date,
				'is_direct' => 'Direct'
			);
		        
			array_push($referrals, $temp);
			
		    $indirect_clients = $this->ReferralModel->get_referees($client_details->id);
		    
		    foreach($indirect_clients as $indirect_client){
    			$indirect_client_details = $this->Members->get_member_by_id($indirect_client->referee_id);
    			$temp2 = array(
    				'name' => $indirect_client_details->first_name . ' ' . $indirect_client_details->last_name,
    				'email' => $indirect_client_details->email_address,
    				'phone' => $indirect_client_details->contact_number,
    				'date' => $indirect_client_details->date,
    				'is_direct' => 'Indirect'
    			);
		        
			    array_push($referrals, $temp2);
		    }
		}

		$data['referrals'] = $referrals;

		$this->load->view('templates/header', $data);
		$this->load->view('pages/refer_users', $data);
		$this->load->view('templates/footer');
            

	}
	
}
