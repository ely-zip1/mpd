<?php
defined('BASEPATH') or exit('No direct script access allowed');
class AdminDashboard extends CI_Controller
{
    
  public function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
    $data['title'] = 'Admin';
    
    // $this->load->view('admin/templates/header', $data);
    // $this->load->view('admin/pages/admin_dashboard', $data);
    // $this->load->view('admin/templates/footer');

    redirect('deposits_admin', 'refresh');
  }

}
