<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Withdrawals_admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this
            ->load
            ->model('WithdrawalModel');
        $this
            ->load
            ->model('Members');
        $this
            ->load
            ->model('PackageModel');
        $this
            ->load
            ->model('Withdrawal_Mode_model');
        $this
            ->load
            ->model('Bitcoin_model');
        $this
            ->load
            ->model('Bank_model');
        $this
            ->load
            ->model('Gcash_model');
        $this
            ->load
            ->model('Remittance_model');
    }

    public function index()
    {
        $data['title'] = 'Withdrawals';

        $pending_withdrawals = $this
            ->WithdrawalModel
            ->get_pending();

        // print_r($pending_withdrawals);
        $withdrawal_data = array();
        foreach ($pending_withdrawals as $pending)
        {
            // print_r();
            if (!$this
                ->Members
                ->is_exist($pending->member_id))
            {
                continue;
            }

            $member_data = $this
                ->Members
                ->get_member_by_id($pending->member_id);

            $temp = array();
            $temp['id'] = $pending->id;
            $temp['member_id'] = $member_data->id;
            $temp['client_name'] = ucfirst($member_data->first_name) . ' ' . ucfirst($member_data->last_name);

            $taxed_amount = $pending->amount - ($pending->amount * 0.10);
            $temp['amount'] = number_format($taxed_amount,2);

            $temp['email'] = $member_data->email_address;
            $temp['phone'] = $member_data->contact_number;
            $temp['date'] = $pending->date;

            $mode = $this
                ->Withdrawal_Mode_model
                ->get_by_id($pending->payment_method_id);

            if ($mode->description == 'bitcoin')
            {
                $btc = $this
                    ->Bitcoin_model
                    ->get_per_member_id($member_data->id);

                $temp['mode'] = ucfirst('Coins.ph');
                $temp['pop_over_title'] = "Coins.ph";
                $temp['pop_over_text'] = "<div class='form-group'>
                                        <strong class='mr-4'>Coins.ph Address</strong></br>
                                        <label>" . $btc->address . "</label>
                                      </div>
                                  ";
            }
            else if ($mode->description == 'bank')
            {
                $bank = $this
                    ->Bank_model
                    ->get_per_member_id($member_data->id);

                $temp['mode'] = ucfirst($mode->description);
                $temp['pop_over_title'] = "Bank Account";
                $temp['pop_over_text'] = "<div class='form-group'>
                                        <strong class='mr-4'>Bank Name</strong></br>
                                        <label>" . $bank->bank_name . "</label>
                                      </div>
                                      <div class='form-group'>
                                        <strong class='mr-4'>Account Name</strong></br>
                                        <label>" . $bank->account_name . "</label>
                                      </div>
                                      <div class='form-group'>
                                        <strong class='mr-4'>Account Number</strong></br>
                                        <label>" . $bank->account_number . "</label>
                                      </div>
                                  ";
            }
            else if ($mode->description == 'gcash')
            {
                $gc = $this
                    ->Gcash_model
                    ->get_per_member_id($member_data->id);

                $temp['mode'] = ucfirst($mode->description);
                $temp['pop_over_title'] = "GCash";
                $temp['pop_over_text'] = "<div class='form-group'>
                                        <strong class='mr-4'>GCash Number</strong></br>
                                        <label>" . $gc->phone_number . "</label>
                                      </div>
                                  ";

            }
            else if ($mode->description == 'remittance')
            {
                $remit = $this
                    ->Remittance_model
                    ->get_per_member_id($member_data->id);

                $temp['mode'] = ucfirst($mode->description);
                $temp['pop_over_title'] = "Remittance";
                $temp['pop_over_text'] = "<div class='form-group'>
                                        <strong class='mr-4'>Remittance Center</strong></br>
                                        <label>" . $remit->remittance_center . "</label>
                                      </div>
                                      <div class='form-group'>
                                        <strong class='mr-4'>First Name</strong></br>
                                        <label>" . $remit->first_name . "</label>
                                      </div>
                                      <div class='form-group'>
                                        <strong class='mr-4'>Middle Name</strong></br>
                                        <label>" . $remit->middle_name . "</label>
                                      </div>
                                      <div class='form-group'>
                                        <strong class='mr-4'>Last Name</strong></br>
                                        <label>" . $remit->last_name . "</label>
                                      </div>
                                      <div class='form-group'>
                                        <strong class='mr-4'>Address</strong></br>
                                        <label>" . $remit->address . "</label>
                                      </div>
                                      <div class='form-group'>
                                        <strong class='mr-4'>Phone Number</strong></br>
                                        <label>" . $remit->first_name . "</label>
                                      </div>
                                  ";

            }

            array_push($withdrawal_data, $temp);
        }

        $data['withdrawal_data'] = $withdrawal_data;

        $this
            ->load
            ->view('admin/templates/header', $data);
        $this
            ->load
            ->view('admin/pages/pending_withdrawals', $data);
        $this
            ->load
            ->view('admin/templates/footer');
    }

    public function approve_withdrawal($withdrawal_id)
    {

        $this
            ->WithdrawalModel
            ->Approve_pending($withdrawal_id);

        redirect('withdrawals_admin', 'refresh');
    }

    public function delete_withdrawal($withdrawal_id)
    {

        $this
            ->withdrawalModel
            ->delete_withdrawal($withdrawal_id);
        redirect('withdrawals_admin', 'refresh');
    }

    public function view_withdrawal($withdrawal_id, $wmode, $member_id)
    {

    }

}

