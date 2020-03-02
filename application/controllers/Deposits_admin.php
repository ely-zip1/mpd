<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Deposits_admin extends CI_Controller
{
    
  public function __construct()
  {
    parent::__construct();
    $this->load->model('DepositModel');
    $this->load->model('Members');
    $this->load->model('Deposit_Options');
    $this->load->model('PackageModel');
    $this->load->model('Referral_bonus_model');
    $this->load->model('Indirect_bonus_model');
    $this->load->model('ReferralModel');
  }

  public function index()
  {
    $data['title'] = 'Deposits';

    $pending_deposits = $this->DepositModel->get_pending();

    // print_r($pending_deposits);

    $deposit_data = array();
    foreach($pending_deposits as $pending){
      // print_r($pending);

      if(isset($pending->member_id)){

        if(!$this->Members->is_exist($pending->member_id)){
          continue;
        }
        
        $member_data = $this->Members->get_member_by_id($pending->member_id);
        $deposit_mode = $this->Deposit_Options->get_by_id($pending->deposit_options_id);
        $package_data = $this->PackageModel->get_package_by_id($pending->package_id);

        $temp = array();
        $temp['id'] = $pending->id;
        $temp['client_name'] = ucfirst($member_data->first_name) . ' ' . ucfirst($member_data->last_name);
        $temp['email'] = $member_data->email_address;
        $temp['phone'] = $member_data->contact_number;
        $temp['amount'] = number_format($pending->amount,2);
        $temp['plan'] = $package_data->package_name;
        $temp['date'] = $pending->date;
        
        if($deposit_mode->name == 'Bitcoin'){
            $temp['mode'] = 'Coins.ph';
        }else{
            $temp['mode'] = $deposit_mode->name;
        }

        array_push($deposit_data, $temp);
      }
    }

    $data['deposit_data'] = $deposit_data;

    $this->load->view('admin/templates/header', $data);
    $this->load->view('admin/pages/pending_deposits', $data);
    $this->load->view('admin/templates/footer');
  }

  public function approve_deposit($deposit_id){
    $root_member = $this->Members->get_root();

    $deposit = $this->DepositModel->get_by_id($deposit_id);

    $member = $this->Members->get_member_by_id($deposit->member_id);

    $referral2 = $this->ReferralModel->get_referrer($member->id);
    $bonus_amount = $deposit->amount * 0.10;
    $indirect_bonus_amount = $deposit->amount * 0.02;

    $bonus_data = array(
      'deposit_id' => $deposit->id,
      'referrer_id' => $referral2->referrer_id,
      'amount' => $bonus_amount
    );

    $referral1 = $this->ReferralModel->get_referrer($referral2->referrer_id);
    
    if(isset($referral1->referrer_id)){

      $indirect_bonus_data = array(
        'amount' => $indirect_bonus_amount,
        'deposit_id' => $deposit->id,
        'member_id' => $referral1->referrer_id,
        'first_level_id' => $referral2->referrer_id,
        'second_level_id' => $member->id
      );
      
      $this->Indirect_bonus_model->add($indirect_bonus_data);

    }
    $this->Referral_bonus_model->add($bonus_data);
    $this->DepositModel->Approve_pending($deposit_id);

    redirect('deposits_admin', 'refresh');

  }


  public function delete_deposit($deposit_id){

    $this->DepositModel->delete_deposit($deposit_id);
    
    redirect('deposits_admin', 'refresh');

  }

}
