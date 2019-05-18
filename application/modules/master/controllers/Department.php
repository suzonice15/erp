<?php

class Department extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('master/Department_model');

    }

    public function index()
    {

    }

    public function all_department()
    {
        $this->config->load('pagination');
        $this->load->library("pagination");
        $config = array();
        $config["base_url"] = base_url() . "master/department/all_department";
        $config["total_rows"] = $this->Main_model->countAll('master_department');;
        $config['per_page'] = 10;
        $config['uri_segment'] = 4;
        $config['num_links'] = 2;
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $data["department"] = $this->Department_model->select_all_department($config["per_page"], $page);
        $data["links"] = $this->pagination->create_links();
        if ($this->input->is_ajax_request()) {
            $this->load->view('department/per_page_department', $data);
        } else {
            $this->load->view('department/department_tpl', $data);
        }
    }

    public function load_add_department_from()
    {
        $this->load->view('master/department/department_from');
    }

    public function create_department()
    {
        $data = array(
            'department_name' => $this->input->post('department_name')
        );
        $result = $this->Main_model->insertData($data, 'master_department');
        if ($result) {
            $msg['load_success_message'] = "Department successfully added.";
            $this->load->view('messages/success_message', $msg);
        }
    }

    public function load_update_department_from($id)
    {
        $data['department'] = $this->Main_model->getValue("id = '$id'", 'master_department', '*', "ID DESC");
        $this->load->view('master/department/update_department_from', $data);
    }

    public function update_department()
    {
        $id = $this->input->post('id');
        $data = array(
            'department_name' => $this->input->post('department_name')
        );
        $result = $this->Main_model->updateData($data, "master_department", "id='$id'");
        if ($result) {
            $msg['load_success_message'] = "Department update successfully.";
            $this->load->view('messages/success_message', $msg);
        }
    }

    public function delete_department($id)
    {
        $this->Main_model->deleteData("id = '$id'", "master_department");
    }
    
    public function check_duplicate_data($department_name = null)
    {
        $set_data = urldecode($department_name);
        $result = $this->Department_model->check_duplicate_data($set_data);
        if ($result) {
            echo "<p style='color: red; font-size: 16px;'>This Department name already exit !!!</p>";
        } else {
            echo "";
        }
    }


}

?>