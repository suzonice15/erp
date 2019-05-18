<?php

class Class_subject extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('master/Class_subject_model');

    }

    public function index()
    {

    }

    public function all_class_subject()
    {
        $this->config->load('pagination');
        $this->load->library("pagination");
        $config = array();
        $config["base_url"] = base_url() . "master/class_subject/all_class_subject";

        $class_id = $this->input->post('class_id');
        $subject_id = $this->input->post('subject_id');


        if ($class_id) {
            $config["total_rows"] = $this->Main_model->countByWhereCondition("class_id = '$class_id'", "master_class_subject");
        } else if ($subject_id) {
            $config["total_rows"] = $this->Main_model->countByWhereCondition("subject_id = '$subject_id'", "master_class_subject");
        } else {
            $config["total_rows"] = $this->Main_model->countAll('master_class_subject');
        }

        $config['per_page'] = 10;
        $config['uri_segment'] = 4;
        $config['num_links'] = 2;
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;

        if ($class_id) {
            $data["class_subject"] = $this->Class_subject_model->select_all_class_subject_by_class_id($config["per_page"], $page, $class_id);
        } else if ($subject_id) {
            $data["class_subject"] = $this->Class_subject_model->select_all_class_subject_by_subject_id($config["per_page"], $page, $subject_id);
        } else {
            $data["class_subject"] = $this->Class_subject_model->select_all_class_subject($config["per_page"], $page);
        }

        $data["links"] = $this->pagination->create_links();
        if ($this->input->is_ajax_request()) {
            $this->load->view('class_subject/per_page_class_subject', $data);
        } else {
            $data['class'] = $this->Main_model->getValue("", 'master_class', '*', "ID DESC");
            $data['subject'] = $this->Main_model->getValue("", 'master_subject', '*', "ID DESC");
            $this->load->view('class_subject/class_subject_tpl', $data);
        }
    }

    public function load_add_class_subject_from()
    {
        $data['class'] = $this->Main_model->getValue("", 'master_class', '*', "ID DESC");
        $data['subject'] = $this->Main_model->getValue("", 'master_subject', '*', "ID DESC");
        $this->load->view('master/class_subject/class_subject_from', $data);
    }

    public function create_class_subject()
    {
        $total_fields = $this->input->post('total_num_of_fields');
        $class_id = $this->input->post('class_id');
        $subject_id = $this->input->post('subject_id');
        for ($i = 0; $i < $total_fields; $i++) {
            $data['class_id'] = $class_id[$i];
            $data['subject_id'] = $subject_id[$i];
            $data['status'] = 1;
            $result = $this->Main_model->insertData($data, 'master_class_subject');
        }
        if ($result) {
            $msg['load_success_message'] = "Class subject successfully added.";
            $this->load->view('messages/success_message', $msg);
        }
    }
    
    public function load_update_class_subject_from($id)
    {
        $data['class'] = $this->Main_model->getValue("", 'master_class', '*', "ID DESC");
        $data['subject'] = $this->Main_model->getValue("", 'master_subject', '*', "ID DESC");
        $data['class_subject'] = $this->Main_model->getValue("id='$id'", 'master_class_subject', '*', "ID DESC");
        $this->load->view('master/class_subject/update_class_subject_from', $data);
    }

    public function update_class_subject()
    {
        $id = $this->input->post('id');
        $data = array(
            'class_id' => $this->input->post('class_id'),
            'subject_id' => $this->input->post('subject_id')
        );
        $result = $this->Main_model->updateData($data, "master_class_subject", "id='$id'");
        if ($result) {
            $msg['load_success_message'] = "Class subject update successfully.";
            $this->load->view('messages/success_message', $msg);
        }
    }
}

?>