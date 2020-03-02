<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PayTower  extends CI_Controller
{
	public function __construct()
        {
            parent:: __construct();
            $this->load->model('Deposit_Options');
        }

	public function index()
	{

        $options = $this->Deposit_Options->get_all();

        $btc = '';
        $eth = '';
        $bch = '';
        $gc  = '';
        $pp  = '';

        foreach($options as $row){
            if($row->name == 'Bitcoin'){
                $btc = $row->account;
            }else if($row->name == 'Ethereum'){
                $eth = $row->account;
            }if($row->name == 'Bitcoin Cash'){
                $bch = $row->account;
            }if($row->name == 'GCash'){
                $gc = $row->account;
            }if($row->name == 'Paypal'){
                $pp = $row->account;
            }
        }
        
		$data = array(
			'title' => "Payment",
			'btc'   => $btc,
			'eth'   => $eth,
			'bch'   => $bch,
			'gc'    => $gc,
			'pp'    => $pp
        );
         $data['package']         = 'Blue Diamond';
         $data['form_submission'] = 'PayTower';
         
        if(isset($_POST['btc-submit'])){
            $this->form_validation->set_rules('btc-amount','Amount','required|greater_than_equal_to[600]|less_than_equal_to[5999]');
        }else if(isset($_POST['eth-submit'])){
            $this->form_validation->set_rules('eth-amount','Amount','required|greater_than_equal_to[600]|less_than_equal_to[5999]');
            
        }else if(isset($_POST['bch-submit'])){
            $this->form_validation->set_rules('bch-amount','Amount','required|greater_than_equal_to[600]|less_than_equal_to[5999]');
            
        }else if(isset($_POST['gc-submit'])){
            $this->form_validation->set_rules('gc-amount','Amount','required|greater_than_equal_to[600]|less_than_equal_to[5999]');
            
        }else if(isset($_POST['pp-submit'])){
            $this->form_validation->set_rules('pp-amount','Amount','required|greater_than_equal_to[600]|less_than_equal_to[5999]');
            
        }
        if ($this->form_validation->run() == FALSE) {
            // echo "failed validation";
			$this->load->view('templates/header', $data);
			$this->load->view('pages/tower_payment_options', $data);
            $this->load->view('templates/footer');
		}else{

            $this->process_payment();
        }

    }

    public function process_payment(){
        $this->load->model('DepositModel');
        $this->load->model('Members');
        
        switch($_POST['pay-type']){
            case 'btc': 
                $payment_id = '1';
                $amount     = $_POST['btc-amount'];
                break;
            case 'eth': 
                $payment_id = '2';
                $amount     = $_POST['eth-amount'];
                break;
            case 'bch': 
                $payment_id = '3';
                $amount     = $_POST['bch-amount'];
                break;
            case 'gc': 
                $payment_id = '4';
                $amount     = $_POST['gc-amount'];
                break;
            case 'pp': 
                $payment_id = '5';
                $amount     = $_POST['pp-amount'];
                break;
        }

        $member_data = $this->Members->get_member($this->session->email);
            
        date_default_timezone_set('Asia/Manila');

        $deposit_data = array(
            'member_id'          => $member_data->id,
            'date'               => date('Y-m-d H:i:s'),
            'amount'             => $amount,
            'deposit_options_id' => $payment_id,
            'package_id'         => '2',
            'is_pending'         => '1'
        );

        $this->DepositModel->add_deposit($deposit_data);

        redirect('deposits','refresh');
    }
	
}
