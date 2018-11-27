<?php

class MembershipFee_model extends CI_Model
{
  public function __construct()
  {
    parent::__construct();
    $this->load->database();
  }

  public function insert_memebership_fee($data)
  {
    // $data: assoc array of member details.
    // insert member to the database
    $this->db->insert('memship',$data);
  }


  public function get_membership_fee($id)
  {
    
    $this->db->where('id', $id);
    $query=$this->db->get('memship');
    return $query->row();

  }

  public function get_all_fees()
  {
    
    $this->db->select("*");  
    $this->db->from("memship");  
    $query = $this->db->get();  
    return $query;  

  }

  public function delete_membership_fee($id)
  {
    // delete member details by given id in membership fee table
    $this->db->where('id', $id);
    $this->db->delete('memship');
  }

  /*public function update_fee($data ,$id)
  {
    
    $this->db->where('id' , $id);
    $this->db->update('memship', $data );
  }*/
}
