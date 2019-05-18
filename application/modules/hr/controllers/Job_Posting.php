<?php

class Job_Posting extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('hr/job_posting_model');
    }

    public function index()
    {
    }

    public function all_job_posting()
    {
        $this->config->load('pagination');
        $this->load->library("pagination");
        $config = array();
        $config["base_url"] = base_url() . "hr/job_posting/all_job_posting";

        $emp_id = $this->input->post('emp_id');
        $department_id = $this->input->post('department_id');

        if ($emp_id) {
            $result = $this->job_posting_model->countAllByLikeCondition("hr_job_posting.emp_id", $emp_id);
            $config["total_rows"] = $result->count_total_rows;
        } else if ($department_id) {
            $result = $this->job_posting_model->countAllByWhereCondition("hr_job_posting.department_id", $department_id);
            $config["total_rows"] = $result->count_total_rows;
        } else {
            $result = $this->job_posting_model->countAll();
            $config["total_rows"] = $result->count_total_rows;
        }

        $config['per_page'] = 20;
        $config['uri_segment'] = 4;
        $config['num_links'] = 9;
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;

        if ($emp_id) {
            $data["job_posting"] = $this->job_posting_model->select_all_job_posting_by_emp_id($config["per_page"], $page, $emp_id);
        } else if ($department_id) {
            $data["job_posting"] = $this->job_posting_model->select_all_job_posting_by_department_id($config["per_page"], $page, $department_id);
        } else {
            $data["job_posting"] = $this->job_posting_model->select_all_job_posting($config["per_page"], $page);
        }

        $data["links"] = $this->pagination->create_links();
        if ($this->input->is_ajax_request()) {
            $data['department'] = $this->Main_model->getValue("", 'master_department', '*', "ID DESC");
            $this->load->view('job_posting/per_page_job_posting', $data);
        } else {
            $data['department'] = $this->Main_model->getValue("", 'master_department', '*', "ID DESC");
            $this->load->view('job_posting/job_posting_tpl', $data);
        }
    }

    public function load_add_job_posting_from()
    {
        $data['department'] = $this->Main_model->getValue("", 'master_department', '*', "ID DESC");
        $data['shift'] = $this->Main_model->getValue("", 'master_shift', '*', "ID DESC");
        $data['section'] = $this->Main_model->getValue("", 'master_section', '*', "ID DESC");
        $data['designation'] = $this->Main_model->getValue("", 'master_designation', '*', "ID DESC");
        $this->load->view('hr/job_posting/job_posting_from', $data);
    }

    public function create_job_posting()
    {
        $emp_id = $this->input->post('emp_id');
        $data = array(
            'status' => '0'
        );
        $this->Main_model->updateData($data, "hr_job_posting", "emp_id='$emp_id'");
        $data1 = array(
            'emp_id' => $this->input->post('emp_id'),
            'basic_salary' => $this->input->post('basic_salary'),
            'department_id' => $this->input->post('department_id'),
            'shift_id' => $this->input->post('shift_id'),
            'section_id' => $this->input->post('section_id'),
            'designation_id' => $this->input->post('designation_id'),
            'post_name' => $this->input->post('post_name'),
            'joining_date' => $this->input->post('joining_date'),
            'confirmation_date' => $this->input->post('confirmation_date'),
            'status' => '1'
        );
        $this->Main_model->insertData($data1, 'hr_job_posting');
        $data2 = array(
            'user_name' => $this->input->post('emp_id'),
            'password' => '123456',
            'role_id' => '7',
            'status' => '1'
        );
        $result = $this->Main_model->insertData($data2, 'master_user');
        if ($result) {
            $msg['load_success_message'] = "Job posting successfully added.";
            $this->load->view('messages/success_message', $msg);
        }
    }


    public function load_update_job_posting_from($id)
    {
        $data['department'] = $this->Main_model->getValue("", 'master_department', '*', "ID DESC");
        $data['shift'] = $this->Main_model->getValue("", 'master_shift', '*', "ID DESC");
        $data['section'] = $this->Main_model->getValue("", 'master_section', '*', "ID DESC");
        $data['designation'] = $this->Main_model->getValue("", 'master_designation', '*', "ID DESC");
        $data['job_posting'] = $this->Main_model->getValue("id='$id'", 'hr_job_posting', '*', "ID DESC");
        $this->load->view('hr/job_posting/update_job_posting_from', $data);
    }

    public function update_job_posting()
    {
        $id = $this->input->post('id');
        $data = array(
            'emp_id' => $this->input->post('emp_id'),
            'basic_salary' => $this->input->post('basic_salary'),
            'department_id' => $this->input->post('department_id'),
            'shift_id' => $this->input->post('shift_id'),
            'section_id' => $this->input->post('section_id'),
            'designation_id' => $this->input->post('designation_id'),
            'post_name' => $this->input->post('post_name'),
            'joining_date' => $this->input->post('joining_date'),
            'confirmation_date' => $this->input->post('confirmation_date'),
            'status' => $this->input->post('status')
        );
        $result = $this->Main_model->updateData($data, "hr_job_posting", "id='$id'");
        if ($result) {
            $msg['load_success_message'] = "Job posting update successfully.";
            $this->load->view('messages/success_message', $msg);
        }
    }


    function select_section($shift_id)
    {
        $array = $this->Main_model->getValue("shift_id = '$shift_id'", 'master_section', '*', "ID DESC");
        $str = "";
        $str .= '<select name="section_id" id="section_id">
				<option value="">--- Select Section ---</option>';
        if (!empty($array)):
            foreach ($array as $row):
                $str .= '<option value="' . $row->id . '">' . $row->section_name . '</option>';
            endforeach;
        endif;
        $str .= '</select>';
        echo $str;
    }


    public function load_released_note_from($id)
    {
        $data['id'] = $id;
        $this->load->view('hr/job_posting/load_released_note_from', $data);
    }

    public function check_duplicate_data($emp_id = null)
    {
        $set_data = urldecode($emp_id);
        $result1 = $this->Main_model->check_duplicate_data('emp_id', $set_data, 'hr_job');
        if ($result1) {
            echo "";
        } else {
            echo "<span style='color: red; font-size: 12px;'>This ID is not valid !!!</span>";
        }
    }
}

?>