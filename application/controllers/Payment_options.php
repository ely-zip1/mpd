<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Payment_Options  extends CI_Controller
{
	public function __construct()
        {
            parent::__construct();
            $this->load->model('Deposit_Options');
        }

	public function index($package_name = '')
	{

        $options = $this->Deposit_Options->get_all();

        $btc = '';
        $eth = '';
        $bch = '';
        $gc = '';
        $pp = '';

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
			'btc' => $btc,
			'eth' => $eth,
			'bch' => $bch,
			'gc' => $gc,
			'pp' => $pp
        );
         $data['package'] = $package_name;

			$this->load->view('templates/header', $data);
			$this->load->view('pages/payment_options', $data);
			$this->load->view('templates/footer');

    }
    
    public function knight_subscription(){
        $this->index('knight');
    }
    
    public function tower_subscription(){
        $this->index('tower');
    }
    
    public function queen_subscription(){
        $this->index('queen');
    }

    public function validate_knight(){
        
        $this->form_validation->set_rules('btc-amount','Amount','required|greater_than_equal_to[50]|less_than_equal_to[499]');
        $this->form_validation->set_rules('eth-amount','Amount','required|greater_than_equal_to[50]|less_than_equal_to[499]');
        $this->form_validation->set_rules('bch-amount','Amount','required|greater_than_equal_to[50]|less_than_equal_to[499]');
        $this->form_validation->set_rules('gc-amount','Amount','required|greater_than_equal_to[50]|less_than_equal_to[499]');
        $this->form_validation->set_rules('pp-amount','Amount','required|greater_than_equal_to[50]|less_than_equal_to[499]');
        
		$data = array(
            'title' => "Payment"
        );

        if ($this->form_validation->run() == FALSE) {
            // echo "failed validation";
			$this->load->view('templates/header', $data);
			$this->load->view('pages/payment_options', $data);
			$this->load->view('templates/footer');
		}
		else {

        }
    }
	
}
