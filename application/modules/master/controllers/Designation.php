<?php

class Designation extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('master/designation_model');

    }

    public function index()
    {

    }

    public function all_designation()
    {
        $this->config->load('pagination');
        $this->load->library("pagination");
        $config = array();
        $config["base_url"] = base_url() . "master/designation/all_designation";
        $config["total_rows"] = $this->Main_model->countAll('master_designation');;
        $config['per_page'] = 10;
        $config['uri_segment'] = 4;
        $config['num_links'] = 2;
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $data["designation"] = $this->designation_model->select_all_designation($config["per_page"], $page);
        $data["links"] = $this->pagination->create_links();
        if ($this->input->is_ajax_request()) {
            $this->load->view('designation/per_page_designation', $data);
        } else {
            $this->load->view('designation/designation_tpl', $data);
        }
    }

    public function load_add_designation_from()
    {
        $this->load->view('master/designation/designation_from');
    }

    public function create_designation()
    {
        $data = array(
            'designation_name' => $this->input->post('designation_name')
        );
        $result = $this->Main_model->insertData($data, 'master_designation');
        if ($result) {
            $msg['load_success_message'] = "Designation successfully added.";
            $this->load->view('messages/success_message', $msg);
        }
    }

    public function load_update_designation_from($id)
    {
        $data['designation'] = $this->Main_model->getValue("id = '$id'", 'master_designation', '*', "ID DESC");
        $this->load->view('master/designation/update_designation_from', $data);
    }

    public function update_designation()
    {
        $id = $this->input->post('id');
        $data = array(
            'designation_name' => $this->input->post('designation_name')
        );
        $result = $this->Main_model->updateData($data, "master_designation", "id='$id'");
        if ($result) {
            $msg['load_success_message'] = "Designation update successfully.";
            $this->load->view('messages/success_message', $msg);
        }
    }

    public function delete_designation($id)
    {
        $this->Main_model->deleteData("id = '$id'", "master_designation");
    }
    
    public function check_duplicate_data($designation_name = null)
    {
        $set_data = urldecode($designation_name);
        $result = $this->designation_model->check_duplicate_data($set_data);
        if ($result) {
            echo "<p style='color: red; font-size: 16px;'>This designation name already exit !!!</p>";
        } else {
            echo "";
        }
    }


}

?>