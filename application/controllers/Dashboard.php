<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard  extends CI_Controller
{
	public function __construct()
        {
            parent::__construct();
			$this->load->model('DepositModel');
			$this->load->model('WithdrawalModel');
			$this->load->model('Referral_bonus_model');
			$this->load->model('Indirect_bonus_model');
        }

	public function index()
	{
		$data = array(
			'title' => "Dashboard",
			'profit' => '0',
			'deposit' => '0',
			'referral_bonus' => '0',
			'balance' => '0'
		);
		

		$max = $this->DepositModel->get_total_growth($this->session->email);
		$deduction = $this->WithdrawalModel->compute_total_withdrawn($this->session->email);

		$data['profit'] = $max;

		$this->load->model('Members');
		$member = $this->Members->get_member($this->session->email);

		$deposits = $this->DepositModel->get_deposit_per_member($member->id);

		$total_deposit = 0;
		foreach($deposits as $deposit){
			if(!$deposit->is_expired){
				if($deposit->is_pending == '0')
					$total_deposit += $deposit->amount;
			}else{
				continue;
			}
		}
		
		$data['deposit'] = $total_deposit;

		$bonuses = $this->Referral_bonus_model->get_per_member_id($member->id);
		$total_bonus = 0;

		foreach($bonuses as $bonus){
			$total_bonus += $bonus->amount;
		}
		
		$indirect_bonuses = $this->Indirect_bonus_model->get_per_member_id($member->id);

		foreach($indirect_bonuses as $indirect_bonus){
			$total_bonus += $indirect_bonus->amount;
		}

		$data['referral_bonus'] = $total_bonus;

		$data['balance'] = ($max + $total_bonus) - $deduction;

		$this->load->view('templates/header', $data);
		$this->load->view('pages/dashboard', $data);
		$this->load->view('templates/footer');

	}
	
}
