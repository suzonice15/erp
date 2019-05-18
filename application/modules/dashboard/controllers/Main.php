<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Main_model');
    }

    public function index()
    {
        $this->load->view('home/admin_home_tpl');
    }

    public function logout()
    {
        $this->session->unset_userdata('user_name');
        $this->session->unset_userdata('role_id');
        $this->session->unset_userdata('powered_by');
        $this->session->unset_userdata('copy_write');
        $success_mas['success'] = "<h4 style='color:green;'>Your are successfully logout.</h4>";
        $this->session->set_userdata($success_mas);
        redirect('welcome');

    }
}
