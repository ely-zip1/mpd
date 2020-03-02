<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Withdrawal_Mode_model extends CI_Model {

  // ------------------------------------------------------------------------

  public function __construct()
  {
    parent::__construct();
  }

  // ------------------------------------------------------------------------


  // ------------------------------------------------------------------------
  public function index()
  {
    // 
  }

  // ------------------------------------------------------------------------

  public function get_all(){
    $query = $this->db->get('td_withdrawal_mode');
    return $query->result();
  }

  public function get_by_id($id){
    $this->db->where('id',$id);
    $query = $this->db->get('td_withdrawal_mode',1);
    return $query->row();
  }
}