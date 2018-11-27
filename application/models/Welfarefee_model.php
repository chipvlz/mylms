<?php

class Welfarefee_model extends CI_Model
{
  public function __construct()
  {
    $this->load->database();
  }

  public function get_welfare_amount()
  {
    //get the sum of the amount column
    $this->db->select_sum('amount');
    $result = $this->db->get('welfarefee')->row();  
    return $result->amount;   
  }
}
?>
