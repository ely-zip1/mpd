<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Withdrawals  extends CI_Controller
{
	public function __construct()
        {
			parent::__construct();

			$this->load->model('DepositModel');
			$this->load->model('WithdrawalModel');
			$this->load->model('Bank_model');
			$this->load->model('Bitcoin_model');
			$this->load->model('Gcash_model');
			$this->load->model('Remittance_model');
			$this->load->model('Members');
			$this->load->model('Withdrawal_Mode_model');
			$this->load->model('Referral_bonus_model');
			$this->load->model('Indirect_bonus_model');
			$this->load->database();
        }

	public function index()
	{
		$data = array(
			'title' => "Withdrawals"
        );

		$member = $this->Members->get_member($this->session->email);
		
		$withdrawal_query = $this->WithdrawalModel->get_withdrawal_per_member($member->id);
		
		$withdrawal_data = array();
		foreach($withdrawal_query as $row){

			$withdrawal = array();
			$withdrawal['amount'] = number_format($row->amount,2);

			$wmode = $this->Withdrawal_Mode_model->get_by_id($row->payment_method_id);

            if($wmode->description == 'bitcoin'){
			    $withdrawal['payment_mode'] = 'Coins.ph';
            }else{
			    $withdrawal['payment_mode'] = ucfirst($wmode->description);
            }
			
			if($row->is_pending == '1'){
				$withdrawal['status'] = 'Pending';
			}else{
				$withdrawal['status'] = 'Fulfilled';
			}
			
			$withdrawal['date'] = $row->date;
			
			array_push($withdrawal_data,$withdrawal);
		}
		
		$data['withdrawal_data'] = $withdrawal_data;

		$bonuses = $this->Referral_bonus_model->get_total_bonus($member->id);
		$indirect_bonuses = $this->Indirect_bonus_model->get_total_bonus($member->id);
		$max = $this->DepositModel->get_total_growth($this->session->email);
		$deduction = $this->WithdrawalModel->compute_total_withdrawn($this->session->email);

		$withdrawable = ($max + $bonuses + $indirect_bonuses) - $deduction;

		$data['total_profit'] = number_format($withdrawable,2);
		
		$tax_deduction = $withdrawable * 0.10;
		$total_withdrawable = $withdrawable - $tax_deduction;
		$data['withdrawable_amount'] = number_format($total_withdrawable,2);
		
		if($withdrawable >= 5){
		    $data['can_withdraw'] = true;
		}else{
		    $data['can_withdraw'] = false;
		}

		$this->form_validation->set_rules('withdraw_amount', 'Amount', 'required|numeric|greater_than_equal_to[5]|less_than_equal_to['.$total_withdrawable.']');

		if ($this->form_validation->run() == FALSE) {
            // echo "failed validation";
			$this->load->view('templates/header', $data);
			$this->load->view('pages/withdrawals', $data);
			$this->load->view('templates/footer');
		}
		else {
			$this->make_request();

			
			redirect('withdrawals','refresh');
			
		}


	}

	public function make_request(){
            
		date_default_timezone_set('Asia/Manila');

		$member = $this->Members->get_member($this->session->email);
		$modes = $this->Withdrawal_Mode_model->get_all();

		if($_POST['withdraw_mode'] == 'bitcoin'){
			if(!$this->Bitcoin_model->has_account($member->id)){
				$this->session->set_flashdata('missing_account', 'Please provide your Coins.ph address.');
				redirect('UpdateAccount','refresh');
			}
			else{

				$withdrawal_data = array(
					'member_id' => $member->id,
					'date'		=> date('Y-m-d H:i:s'),
					'amount'	=> $_POST['withdraw_amount'],
					'is_pending'=> '1'
				);

				foreach($modes as $mode){
					if($mode->description == 'bitcoin'){
						$withdrawal_data['payment_method_id'] = $mode->id;
						break;
					}
				}

				$this->WithdrawalModel->add_new_withdrawal($withdrawal_data);
			}
		}
		else if($_POST['withdraw_mode'] == 'bank'){
			if(!$this->Bank_model->has_account($member->id)){
				$this->session->set_flashdata('missing_account', 'Please provide your bank account details.');
				redirect('UpdateAccount','refresh');
			}
			else{

				$withdrawal_data = array(
					'member_id' => $member->id,
					'date'		=> date('Y-m-d H:i:s'),
					'amount'	=> $_POST['withdraw_amount'],
					'is_pending'=> '1'
				);

				foreach($modes as $mode){
					if($mode->description == 'bank'){
						$withdrawal_data['payment_method_id'] = $mode->id;
						break;
					}
				}

				$this->WithdrawalModel->add_new_withdrawal($withdrawal_data);
			}
		}
		else if($_POST['withdraw_mode'] == 'gcash'){
			if(!$this->Gcash_model->has_account($member->id)){
				$this->session->set_flashdata('missing_account', 'Please provide your GCash info.');
				redirect('UpdateAccount','refresh');
			}
			else{

				$withdrawal_data = array(
					'member_id' => $member->id,
					'date'		=> date('Y-m-d H:i:s'),
					'amount'	=> $_POST['withdraw_amount'],
					'is_pending'=> '1'
				);

				foreach($modes as $mode){
					if($mode->description == 'gcash'){
						$withdrawal_data['payment_method_id'] = $mode->id;
						break;
					}
				}

				$this->WithdrawalModel->add_new_withdrawal($withdrawal_data);
			}
		}
		else if($_POST['withdraw_mode'] == 'remittance'){
			if(!$this->Remittance_model->has_account($member->id)){
				$this->session->set_flashdata('missing_account', 'Please provide your preferred remittance service.');
				redirect('UpdateAccount','refresh');
			}
			else{

				$withdrawal_data = array(
					'member_id' => $member->id,
					'date'		=> date('Y-m-d H:i:s'),
					'amount'	=> $_POST['withdraw_amount'],
					'is_pending'=> '1'
				);

				foreach($modes as $mode){
					if($mode->description == 'remittance'){
						$withdrawal_data['payment_method_id'] = $mode->id;
						break;
					}
				}

				$this->WithdrawalModel->add_new_withdrawal($withdrawal_data);
			}
		}
	}
}
