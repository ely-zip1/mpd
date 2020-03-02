<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Approved_withdrawals_admin extends CI_Controller
{
    
  public function __construct()
  {
    parent::__construct();
    $this->load->model('WithdrawalModel');
    $this->load->model('Members');
    $this->load->model('PackageModel');
  }

  public function index()
  {
    $data['title'] = 'Withdrawals';

    $approved_withdrawals = $this->WithdrawalModel->get_approved();

    // print_r($pending_withdrawals);

    $withdrawal_data = array();
    foreach($approved_withdrawals as $approved){
      // print_r();

      if(!$this->Members->is_exist($approved->member_id)){
        continue;
      }
      
      $member_data = $this->Members->get_member_by_id($approved->member_id);

      $temp = array();
      $temp['id'] = $approved->id;
      $temp['client_name'] = ucfirst($member_data->first_name) . ' ' . ucfirst($member_data->last_name);
      $temp['amount'] = number_format($approved->amount,2);
      $temp['email'] = $member_data->email_address;
      $temp['date'] = $approved->date;
      
      $mode = $this->Withdrawal_Mode_model->get_by_id($pending->payment_method_id);

      if ($mode->description == 'bitcoin'){
        $temp['mode'] = 'Coins.ph';
      }else{
        $temp['mode'] = $mode->description;
      }

      array_push($withdrawal_data, $temp);
    }

    $data['withdrawal_data'] = $withdrawal_data;

    $this->load->view('admin/templates/header', $data);
    $this->load->view('admin/pages/approved_withdrawals', $data);
    $this->load->view('admin/templates/footer');
  }

}
