<?php

class Users extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('users_model');
    $this->load->library('session');
  }

  public function login()
  {
    $this->load->library('form_validation');

    $data['title'] = 'Login to the system';
    $data['site_name'] = 'Sahana';

    $this->form_validation->set_rules('username', 'Username', 'required');
    $this->form_validation->set_rules('password', 'Password', 'required');

    $this->load->view('templates/header', $data);
    $next = 'users/index';
    if ($this->form_validation->run() == TRUE) {
      $uname = $this->input->post('username');
      $upass = $this->input->post('password');
      $dbuser = $this->users_model->get_user($uname);
      if ($uname == $dbuser['username'] && $upass == $dbuser['userpass']) {
        $next = 'users/success';
      }
    }
    $this->load->view($next);
    $this->load->view('templates/footer');
  }
}
