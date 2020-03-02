<?php
defined('BASEPATH') or exit('No direct script access allowed');

class UpdateAccount extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Bank_model');
        $this->load->model('Bitcoin_model');
        $this->load->model('Gcash_model');
        $this->load->model('Remittance_model');
        $this->load->model('Members');
    }
    
    public function index()
    {
        $data = array(
            'title' => "Account Update",
            'form_submission' => 'UpdateAccount'
        );
        
        $this->db->where('email_address', $this->session->email);
        $query = $this->db->get('td_members', 1);
        
        $member = $query->row();
        
        $bank_details       = $this->Bank_model->get_per_member_id($member->id);
        $bitcoin_details    = $this->Bitcoin_model->get_per_member_id($member->id);
        $gcash_details      = $this->Gcash_model->get_per_member_id($member->id);
        $remittance_details = $this->Remittance_model->get_per_member_id($member->id);
        
        if (isset($bank_details)) {
            $data['bank_name']           = $bank_details->bank_name;
            $data['bank_account_name']   = $bank_details->account_name;
            $data['bank_account_number'] = $bank_details->account_number;
        }
        if (isset($bitcoin_details)) {
            $data['btc_address'] = $bitcoin_details->address;
        }
        if (isset($gcash_details)) {
            $data['gc'] = $gcash_details->phone_number;
        }
        if (isset($remittance_details)) {
            $data['remit_fname']       = $remittance_details->first_name;
            $data['remit_mname']       = $remittance_details->middle_name;
            $data['remit_lname']       = $remittance_details->last_name;
            $data['remit_address']     = $remittance_details->address;
            $data['remit_phone']       = $remittance_details->phone_number;
            $data['remit_center'] = $remittance_details->remittance_center;
		}
		
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger">',"</div>");
        
        if (isset($_POST['btc-submit'])) {
            $this->form_validation->set_rules('btc-address', 'Coins.ph Address', 'required');
        } else if (isset($_POST['bank-submit'])) {
            $this->form_validation->set_rules('bank-name', 'Bank Name', 'required');
            $this->form_validation->set_rules('bank-account-name', 'Account Name', 'required');
            $this->form_validation->set_rules('bank-account-number', 'Account Number', 'required');
        } else if (isset($_POST['gc-submit'])) {
            $this->form_validation->set_rules('gc-address', 'GCash Address', 'required');
        } else if (isset($_POST['remit-submit'])) {
            $this->form_validation->set_rules('remit-center', 'Remittance Center', 'required');
            $this->form_validation->set_rules('remit-fname', 'First Name', 'required');
            $this->form_validation->set_rules('remit-mname', 'Middle Name', 'required');
            $this->form_validation->set_rules('remit-lname', 'Last Name', 'required');
            $this->form_validation->set_rules('remit-address', 'Address', 'required');
            $this->form_validation->set_rules('remit-phone-number', 'Phone Number', 'required|numeric');
        }
        
        if ($this->form_validation->run() == FALSE) {
            // echo "failed validation";
            $this->load->view('templates/header', $data);
            $this->load->view('pages/update_account', $data);
            $this->load->view('templates/footer');
        } else {
			// echo 'successssssssssssssssssssss';
			$this->process_update();
        }
        
    }

    public function process_update(){
		
		// echo '<pre>';
		// echo $_POST;
		// echo '</pre>';

        switch($_POST['pay-type']){
            case 'btc': 
				$this->update_btc();
				$this->session->set_flashdata('success_message','Coins.ph account updated.');
                break;
			case 'bank': 
                $this->update_bank();
				$this->session->set_flashdata('success_message','Bank account updated.');
                break;
            case 'gc': 
                $this->update_gc();
				$this->session->set_flashdata('success_message','GCash account updated.');
                break;
            case 'remit': 
                $this->update_remit();
				$this->session->set_flashdata('success_message','Remittance account updated.');
                break;
		}
		
        redirect('UpdateAccount','refresh');
	}
	
	public function update_btc(){
		$member = $this->Members->get_member($this->session->email);

		$btc_account = $this->Bitcoin_model->get_per_member_id($member->id);
		if(isset($btc_account)){
			$account = array(
				'address' => $_POST['btc-address'],
				'member_id' => $member->id
			);
			$this->Bitcoin_model->update($account);
		}else{
			$account = array(
				'address' => $_POST['btc-address'],
				'member_id' => $member->id
			);
			$this->Bitcoin_model->add($account);
		}
	}
	// -----------------------------------------------------------------------------------
	// -----------------------------------------------------------------------------------
	public function update_bank(){
		$member = $this->Members->get_member($this->session->email);

		$bank_account = $this->Bank_model->get_per_member_id($member->id);
		if(isset($bank_account)){
			$account = array(
				'bank_name' => $_POST['bank-name'],
				'account_name' => $_POST['bank-account-name'],
				'account_number' => $_POST['bank-account-number'],
				'member_id' => $member->id
			);
			$this->Bank_model->update($account);
		}else{
			$account = array(
				'bank_name' => $_POST['bank-name'],
				'account_name' => $_POST['bank-account-name'],
				'account_number' => $_POST['bank-account-number'],
				'member_id' => $member->id
			);
			$this->Bank_model->add($account);
		}
	}
	// -----------------------------------------------------------------------------------
	// -----------------------------------------------------------------------------------
	public function update_gc(){
		$member = $this->Members->get_member($this->session->email);

		$gc_account = $this->Gcash_model->get_per_member_id($member->id);
		if(isset($gc_account)){
			$account = array(
				'phone_number' => $_POST['gc-address'],
				'member_id' => $member->id
			);
			$this->Gcash_model->update($account);
		}else{
			$account = array(
				'phone_number' => $_POST['gc-address'],
				'member_id' => $member->id
			);
			$this->Gcash_model->add($account);
		}
	}
	// -----------------------------------------------------------------------------------
	// -----------------------------------------------------------------------------------
	public function update_remit(){
		$member = $this->Members->get_member($this->session->email);

		$remit_account = $this->Remittance_model->get_per_member_id($member->id);
		if(isset($remit_account)){
			$account = array(
				'first_name' => $_POST['remit-fname'],
				'middle_name' => $_POST['remit-mname'],
				'last_name' => $_POST['remit-lname'],
				'address' => $_POST['remit-address'],
				'phone_number' => $_POST['remit-phone-number'],
				'remittance_center' => $_POST['remit-center'],
				'member_id' => $member->id
			);
			$this->Remittance_model->update($account);
		}else{
			$account = array(
				'first_name' => $_POST['remit-fname'],
				'middle_name' => $_POST['remit-mname'],
				'last_name' => $_POST['remit-lname'],
				'address' => $_POST['remit-address'],
				'phone_number' => $_POST['remit-phone-number'],
				'remittance_center' => $_POST['remit-center'],
				'member_id' => $member->id
			);
			$this->Remittance_model->add($account);
		}
	}
    
}