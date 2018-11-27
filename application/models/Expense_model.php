<?php

class Expense_model extends CI_Model
{
  public function __construct()
  {
    $this->load->database();
  }

  public function get_expense_amount()
  {
    $this->db->select_sum('amount');
    $result = $this->db->get('expenses')->row();  
    return $result->amount;   
  }
}
?>
