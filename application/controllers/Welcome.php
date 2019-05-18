<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Welcome_model');
        $user_name = $this->session->userdata('user_name');
        if ($user_name) {
            redirect('dashboard/main');
        }
    }

    public function index()
    {
        $this->load->view('login');
    }

    public function check_login()
    {
        $user_name = $this->input->post('email');
        $password = $this->input->post('password');
        $result = $this->Welcome_model->check_user_login($user_name, $password);
        if ($result) {
            $set_dept = "";
            $dept = $this->Welcome_model->check_user_department($user_name);
            if ($dept->department_id) {
                $set_dept = $dept->department_id;
            } else {
                $set_dept = $dept->department_id;
            }
            $data = array(
                'user_name' => $result->user_name,
                'role_id' => $result->role_id,
                'role_name' => $result->role_name,
                'department_id' => $set_dept,
                'powered_by' => '<strong>Powered by</strong> Shoriful Islam',
                'copy_write' => 'Copyright © 2017 banglasoft.com.bd'
            );
            $this->session->set_userdata($data);
            redirect('dashboard/main');
        } else {
            $err_mas['msg'] = "<h4 style='color: red;'>Your user name or password invalid!!!</h4>";
            $this->session->set_userdata($err_mas);
            $this->index();
        }

    }

}
