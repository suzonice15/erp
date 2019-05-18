<?php

class Child extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('hr/Child_model');
    }

    public function index()
    {
    }

    public function all_child()
    {
        $this->config->load('pagination');
        $this->load->library("pagination");
        $config = array();
        $config["base_url"] = base_url() . "hr/child/all_child";
        
        $emp_id = $this->input->post('emp_id');
        
        if ($emp_id) {
            $result = $this->Child_model->countAllByLikeCondition("hr_child.emp_id", $emp_id);
            $config["total_rows"] = $result->count_total_rows;
        } else {
            $result = $this->Child_model->countAll();
            $config["total_rows"] = $result->count_total_rows;
        }

        $config['per_page'] = 20;
        $config['uri_segment'] = 4;
        $config['num_links'] = 2;
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;

        if ($emp_id) {
            $data["child"] = $this->Child_model->select_emp_child_by_emp_id($config["per_page"], $page, $emp_id);
        } else {
            $data["child"] = $this->Child_model->select_emp_child($config["per_page"], $page);
        }

        $data["links"] = $this->pagination->create_links();
        if ($this->input->is_ajax_request()) {
            $this->load->view('child/per_page_child', $data);
        } else {
            $this->load->view('child/child_tpl', $data);
        }
    }

    public function load_add_child_from()
    {
        $data['gender'] = $this->Main_model->getValue("", 'master_gender', '*', "ID DESC");
        $data['profession'] = $this->Main_model->getValue("", 'master_profession', '*', "ID DESC");
        $this->load->view('hr/child/child_from', $data);
    }

    public function create_child()
    {
        $total_fields = $this->input->post('total_num_of_fields');
        $emp_id = $this->input->post('emp_id');
        $child_name = $this->input->post('child_name');
        $gender_id = $this->input->post('gender_id');
        $profession_id = $this->input->post('profession_id');
        $class = $this->input->post('class');
        $institute = $this->input->post('institute');

        for ($i = 0; $i < $total_fields; $i++) {
            $data['emp_id'] = $emp_id[$i];
            $data['child_name'] = $child_name[$i];
            $data['profession_id'] = $profession_id[$i];
            $data['gender_id'] = $gender_id[$i];
            $data['class'] = $class[$i];
            $data['institute'] = $institute[$i];
            $result = $this->Main_model->insertData($data, 'hr_child');
        }
        if ($result) {
            $msg['load_success_message'] = "Child info successfully added.";
            $this->load->view('messages/success_message', $msg);
        }

    }

    public function load_update_child_from($id)
    {
        $data['gender'] = $this->Main_model->getValue("", 'master_gender', '*', "ID DESC");
        $data['profession'] = $this->Main_model->getValue("", 'master_profession', '*', "ID DESC");
        $data['child'] = $this->Main_model->getValue("id= '$id'", 'hr_child', '*', "ID DESC");
        $this->load->view('hr/child/update_child_from', $data);
    }

    public function update_child()
    {
        $id = $this->input->post('id');
        $data = array(
            'emp_id' => $this->input->post('emp_id'),
            'child_name' => $this->input->post('child_name'),
            'profession_id' => $this->input->post('profession_id'),
            'gender_id' => $this->input->post('gender_id'),
            'class' => $this->input->post('class'),
            'institute' => $this->input->post('institute')
        );
        $result = $this->Main_model->updateData($data, "hr_child", "id='$id'");
        if ($result) {
            $msg['load_success_message'] = "Emp family child info update successfully.";
            $this->load->view('messages/success_message', $msg);
        }
    }
}

?>