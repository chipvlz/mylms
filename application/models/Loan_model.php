<?php
class Loan_model extends CI_Model
{
  public function __construct()
  {
    parent::__construct();
    $this->load->database();
  }
  public function insert_loan($data)
  {
    // $data: assoc array of loan details.
    // insert loan to the database
    $this->db->insert('loan',$data);
  }
  public function get_loan($id)
  {
    // get loan details by given id in loan table
    $this->db->where('id', $id);
    $query=$this->db->get('loan');
    return $query->row();
  }
  public function get_all()
  {
    // get loans details by  loan table
    $this->db->select("*");  
    $this->db->from("loan");  
    $query = $this->db->get();  
    return $query->result_array();  
  }
  public function delete_loan($id)
  {
    // delete loan details by given id in loan table
    $this->db->where('id', $id);
    $this->db->delete('loan');
  }
  public function update_loan($data ,$id)
  {
    // update loan details by given id in loan table.
    $this->db->where('id' , $id);
    $this->db->update('loan', $data );
  }
}