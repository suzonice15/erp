<?php

class Leave_Type extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('master/leave_type_model');
    }

    public function index()
    {

    }

    public function all_leave_type()
    {
        $this->config->load('pagination');
        $this->load->library("pagination");
        $config = array();
        $config["base_url"] = base_url() . "master/leave_type/all_leave_type";
        $config["total_rows"] = $this->Main_model->countAll('master_leave_type');;
        $config['per_page'] = 10;
        $config['uri_segment'] = 4;
        $config['num_links'] = 2;
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $data["leave_type"] = $this->leave_type_model->select_all_leave_type($config["per_page"], $page);
        $data["links"] = $this->pagination->create_links();
        if ($this->input->is_ajax_request()) {
            $this->load->view('leave_type/per_page_leave_type', $data);
        } else {
            $this->load->view('leave_type/leave_type_tpl', $data);
        }
    }

    public function load_add_leave_type_from()
    {
        $this->load->view('master/leave_type/leave_type_from');
    }

    public function create_leave_type()
    {
        $data = array(
            'leave_name' => $this->input->post('leave_type_name'),
            'duration' => $this->input->post('duration')
        );
        $result = $this->Main_model->insertData($data, 'master_leave_type');
        if ($result) {
            $msg['load_success_message'] = "Leave type successfully added.";
            $this->load->view('messages/success_message', $msg);
        }
    }

    public function load_update_leave_type_from($id)
    {
        $data['leave_type'] = $this->Main_model->getValue("id = '$id'", 'master_leave_type', '*', "ID DESC");
        $this->load->view('master/leave_type/update_leave_type_from', $data);
    }

    public function update_leave_type()
    {
        $id = $this->input->post('id');
        $data = array(
            'leave_name' => $this->input->post('leave_type_name'),
            'duration' => $this->input->post('duration')
        );
        $result = $this->Main_model->updateData($data, "master_leave_type", "id='$id'");
        if ($result) {
            $msg['load_success_message'] = "Leave type update successfully.";
            $this->load->view('messages/success_message', $msg);
        }
    }

    public function delete_leave_type($id)
    {
        $this->Main_model->deleteData("id = '$id'", "master_leave_type");
    }
}

?>