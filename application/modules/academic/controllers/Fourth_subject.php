<?php

class Fourth_subject extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('academic/Fourth_subject_model');
    }

    public function index()
    {
    }

    public function all_fourth_subject()
    {
        $this->config->load('pagination');
        $this->load->library("pagination");
        $config = array();
        $config["base_url"] = base_url() . "academic/fourth_subject/all_fourth_subject";

        $student_id = $this->input->post('student_id');
        $subject_id = $this->input->post('subject_id');

        if ($student_id) {
            $config["total_rows"] = $this->Main_model->countByLikeCondition("student_id", $student_id, "academic_fourth_subject");
        } else if ($subject_id) {
            $config["total_rows"] = $this->Main_model->countByWhereCondition("subject_id = '$subject_id'", "academic_fourth_subject");
        } else {
            $config["total_rows"] = $this->Main_model->countAll('academic_fourth_subject');
        }

        $config['per_page'] = 20;
        $config['uri_segment'] = 4;
        $config['num_links'] = 2;
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;

        if ($student_id) {
            $data["fourth_subject"] = $this->Fourth_subject_model->select_fourth_subject_by_student_id($config["per_page"], $page, $student_id);
        } else if ($subject_id) {
            $data["fourth_subject"] = $this->Fourth_subject_model->select_fourth_subject_by_subject_id($config["per_page"], $page, $subject_id);
        } else {
            $data["fourth_subject"] = $this->Fourth_subject_model->select_fourth_subject($config["per_page"], $page);
        }
        $data['subject'] = $this->Main_model->getValue("status='2'", 'master_subject', '*', "ID DESC");
        $data["links"] = $this->pagination->create_links();
        if ($this->input->is_ajax_request()) {
            $this->load->view('fourth_subject/per_page_fourth_subject', $data);
        } else {

            $this->load->view('fourth_subject/fourth_subject_tpl', $data);
        }
    }

    public function load_fourth_subject_from()
    {
        $data['subject'] = $this->Main_model->getValue("status='2'", 'master_subject', '*', "ID DESC");
        $this->load->view('academic/fourth_subject/add_fourth_subject_from', $data);
    }


    public function create_fourth_subject()
    {
        $total_fields = $this->input->post('total_num_of_fields');
        $student_id = $this->input->post('student_id');
        $subject_id = $this->input->post('subject_id');
        for ($i = 0; $i < $total_fields; $i++) {
            $data['student_id'] = $student_id[$i];
            $data['subject_id'] = $subject_id[$i];
            $result = $this->Main_model->insertData($data, 'academic_fourth_subject');
        }
        if ($result) {
            $msg['add_fourth_subject'] = "Fourth subject successfully added.";
            $this->load->view('messages/success_message', $msg);
        }
    }

    public function load_update_fourth_subject_from($id)
    {
        $data['fourth_subject'] = $this->Main_model->getValue("id='$id'", 'academic_fourth_subject', '*', "ID DESC");
        $data['subject'] = $this->Main_model->getValue("status='2'", 'master_subject', '*', "ID DESC");
        $this->load->view('academic/fourth_subject/update_fourth_subject_from', $data);
    }

    public function update_fourth_subject()
    {
        $id = $this->input->post('id');
        $data = array(
            'student_id' => $this->input->post('student_id'),
            'subject_id' => $this->input->post('subject_id')
        );

        $result = $this->Main_model->updateData($data, "academic_fourth_subject", "id='$id'");
        if ($result) {
            $msg['add_fourth_subject'] = "Fourth subject successfully updated.";
            $this->load->view('messages/success_message', $msg);
        }
    }

}

?>