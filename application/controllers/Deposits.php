<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Deposits  extends CI_Controller
{
	public function __construct()
        {
            parent::__construct();
        }

	public function index()
	{
		$data = array(
			'title' => "Deposits"
		);
		
		$this->load->model('DepositModel');
		$this->load->model('Deposit_Options');
		$this->load->model('Members');
		$this->load->model('PackageModel');

        $member_data = $this->Members->get_member($this->session->email);
		$member_deposits = $this->DepositModel->get_deposit_per_member($member_data->id);

		$deposit_data = array();
		$x = 0;
		foreach($member_deposits as $row){

			$deposit = array();
			$deposit['package'] = $this->PackageModel->get_package_by_id($row->package_id)->package_name;
			$deposit['amount'] = number_format($row->amount,2);
			if($row->deposit_options_id = '1'){
			    $deposit['mode'] = 'Coins.ph';
			}else{
			    $deposit['mode'] = $this->Deposit_Options->get_by_id($row->deposit_options_id)->name;
			}

			if($row->is_pending == '1'){
				$deposit['status'] = 'Pending';
			}else{
				$deposit['status'] = 'Fulfilled';
			}

			$deposit['date'] = $row->date;
			$deposit['date_approved'] = $row->date_approved;

			array_push($deposit_data,$deposit);
		}

		$data['deposit_data'] = $deposit_data;

        
		$this->load->view('templates/header', $data);
		$this->load->view('pages/deposits', $data);
		$this->load->view('templates/footer');

	}
	
}
