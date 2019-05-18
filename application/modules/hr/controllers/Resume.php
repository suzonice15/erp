<?php

class Resume extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('hr/resume_model');
    }

    public function index()
    {
    }

    public function all_resume()
    {
        $this->config->load('pagination');
        $this->load->library("pagination");
        $config = array();
        $config["base_url"] = base_url() . "hr/resume/all_resume";

        $emp_id = $this->input->post('emp_id');
        $email_address = $this->input->post('email_address');
        $emp_name = $this->input->post('emp_name');

        if ($emp_id) {
            $result = $this->resume_model->countAllByLikeCondition("hr_basic.emp_id", $emp_id);
            $config["total_rows"] = $result->count_total_rows;
        } else {
            $result = $this->resume_model->countAll();
            $config["total_rows"] = $result->count_total_rows;
        }


        $config['per_page'] = 20;
        $config['uri_segment'] = 4;
        $config['num_links'] = 2;
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;

        if ($emp_id) {
            $data["resume"] = $this->resume_model->select_resume_by_emp_id($config["per_page"], $page, $emp_id);
        } else {
            $data["resume"] = $this->resume_model->select_resume($config["per_page"], $page);
        }

        $data["links"] = $this->pagination->create_links();
        if ($this->input->is_ajax_request()) {
            $this->load->view('resume/per_page_resume', $data);
        } else {
            $this->load->view('resume/resume_tpl', $data);
        }
    }


    public function load_details_resume_from($emp_id)
    {
        $data['basic'] = $this->resume_model->select_basic_by_emp_id($emp_id);
        $data['job'] = $this->resume_model->select_job_by_emp_id($emp_id);
        $data['job_posting'] = $this->resume_model->select_job_posting_by_emp_id($emp_id);
        $data['family'] = $this->resume_model->select_family_by_emp_id($emp_id);
        $data['child'] = $this->resume_model->select_child_by_emp_id($emp_id);
        $data['academic'] = $this->resume_model->select_academic_by_emp_id($emp_id);
        $data['ward_and_honours'] = $this->resume_model->select_ward_and_honours_by_emp_id($emp_id);
        $data['co_curricular_activities'] = $this->resume_model->select_co_curricular_activities_by_emp_id($emp_id);
        $data['experience'] = $this->resume_model->select_experience_by_emp_id($emp_id);
        $data['nominee'] = $this->resume_model->select_nominee_by_emp_id($emp_id);
        $data['previous_job_history'] = $this->resume_model->select_previous_job_history_by_emp_id($emp_id);
        $data['reference'] = $this->resume_model->select_reference_by_emp_id($emp_id);
        $data['research_and_publication'] = $this->resume_model->select_research_and_publication_by_emp_id($emp_id);
        $data['training'] = $this->resume_model->select_training_by_emp_id($emp_id);
        $data['contact'] = $this->resume_model->select_contact_by_emp_id($emp_id);
        $data['contact1'] = $this->resume_model->select_contact_by_emp_id1($emp_id);
        $this->load->view('hr/resume/details_resume_from', $data);
    }
}

?>