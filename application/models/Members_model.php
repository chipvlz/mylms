<?php

class Members_model extends CI_Model
{
  public function __construct()
  {
    parent::__construct();
    $this->load->database();
  }

  public function put_user($data)
  {
    // $data: assoc array of user details.
    // insert user to the database
  }

  public function get_user($data)
  {
    // get user by given attributes.
  }

  public function delete_user($data)
  {
    // delete user by given attributes.
  }

  public function update_user($data)
  {
    // update user by given attributes.
  }
}
