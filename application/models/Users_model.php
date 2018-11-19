<?php

class Users_model extends CI_Model
{
  public function __construct()
  {
    $this->load->database();
  }

  public function get_user($uname)
  {
    if (empty($uname)) {
      return NULL;
    }

    $query = $this->db->get_where('users', array( 'username' => $uname ));
    return $query->row_array();
  }
}
