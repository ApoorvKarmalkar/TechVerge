<?php
class Login extends MY_Controller {
  public function __construct() {
    parent::__construct();
    if ($this->session->userdata('id')) {
      return redirect('admin/welcome');
    }
  }
  public function index() {
    $this->form_validation->set_rules('username','Username','trim|required|max_length[30]');
    $this->form_validation->set_rules('password','Password','required|max_length[16]|min_length[8]');
    if($this->form_validation->run()) {
      $username = $this->input->post('username');
      $password = $this->input->post('password');
      $this->load->model('login_model');
      $id = $this->login_model->isValidate($username,$password);
      if ($id) {
        $this->session->set_userdata('id',$id);
        return redirect('admin/welcome');
      }
      else {
        $this->session->set_flashdata('login_failed','The username or password is invalid');
        return redirect('login/index');
      }
    }
    else {
      $this->load->view('admin/login');
    }
  }
  public function register() {
    $this->form_validation->set_rules('username','Username','trim|required|max_length[30]|is_unique[users.username]');
    $this->form_validation->set_rules('password','Password','required|max_length[16]|min_length[8]');
    $this->form_validation->set_rules('firstname','First Name','trim|required|alpha|max_length[30]');
    $this->form_validation->set_rules('lastname','Last Name','trim|required|alpha|max_length[30]');
    $this->form_validation->set_rules('email','Email','trim|required|valid_email');
    if ($this->form_validation->run()) {
      $userData = $this->input->post();
      $this->load->model('login_model');
      if ($this->login_model->addUser($userData)) {
        $this->session->set_flashdata('user_added','User added successfully');
      }
      else {
        $this->session->set_flashdata('user_not_added','User not added. Please try again!');
      }
      return redirect('login/register');
    }
    else {
      $this->load->view('admin/register');
    }
  }
}
