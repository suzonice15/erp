<?php

class Job extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('hr/job_model');
    }

    public function index()
    {
    }

    public function all_job()
    {
        $this->config->load('pagination');
        $this->load->library("pagination");
        $config = array();
        $config["base_url"] = base_url() . "hr/job/all_job";
        
        $emp_id = $this->input->post('emp_id');
        $department_id = $this->input->post('department_id');
        

        if ($emp_id) {
            $config["total_rows"] = $this->Main_model->countByLikeCondition("emp_id", $emp_id, "hr_job");
        } else if ($department_id) {
            $config["total_rows"] = $this->Main_model->countByWhereCondition("department_id = '$department_id'", "hr_job");
        } else {
            $config["total_rows"] = $this->Main_model->countAll('hr_job');
        }
        
        $config['per_page'] = 20;
        $config['uri_segment'] = 4;
        $config['num_links'] = 2;
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        
        if ($emp_id) {
            $data["job"] = $this->job_model->select_all_job_by_emp_id($config["per_page"], $page, $emp_id);
        } else if ($department_id) {
            $data["job"] = $this->job_model->select_all_job_by_department_id($config["per_page"], $page, $department_id);
        } else {
            $data["job"] = $this->job_model->select_all_job($config["per_page"], $page);
        }
        
        
        $data["links"] = $this->pagination->create_links();
        if ($this->input->is_ajax_request()) {
            $data['department'] = $this->Main_model->getValue("", 'master_department', '*', "ID DESC");
            $this->load->view('job/per_page_job', $data);
        } else {
            $data['department'] = $this->Main_model->getValue("", 'master_department', '*', "ID DESC");
            $this->load->view('job/job_tpl', $data);
        }
    }

    public function load_add_job_from()
    {
        $data['department'] = $this->Main_model->getValue("", 'master_department', '*', "ID DESC");
        $data['shift'] = $this->Main_model->getValue("", 'master_shift', '*', "ID DESC");
        $data['section'] = $this->Main_model->getValue("", 'master_section', '*', "ID DESC");
        $data['designation'] = $this->Main_model->getValue("", 'master_designation', '*', "ID DESC");
        $this->load->view('hr/job/job_from', $data);
    }

    public function create_job()
    {
        $data = array(
            'emp_id' => $this->input->post('emp_id'),
            'department_id' => $this->input->post('department_id'),
            'shift_id' => $this->input->post('shift_id'),
            'section_id' => $this->input->post('section_id'),
            'designation_id' => $this->input->post('designation_id'),
            'joining_date' => $this->input->post('joining_date'),
            'status' => '1'
        );
        $result = $this->Main_model->insertData($data, 'hr_job');
        if ($result) {
            $msg['load_success_message'] = "Job info successfully added.";
            $this->load->view('messages/success_message', $msg);
        }
    }


    public function load_update_job_from($id)
    {
        $data['department'] = $this->Main_model->getValue("", 'master_department', '*', "ID DESC");
        $data['shift'] = $this->Main_model->getValue("", 'master_shift', '*', "ID DESC");
        $data['section'] = $this->Main_model->getValue("", 'master_section', '*', "ID DESC");
        $data['designation'] = $this->Main_model->getValue("", 'master_designation', '*', "ID DESC");
        $data['job'] = $this->Main_model->getValue("id='$id'", 'hr_job', '*', "ID DESC");
        $this->load->view('hr/job/update_job_from', $data);
    }

    public function update_job()
    {
        $id = $this->input->post('id');
        $data = array(
            'emp_id' => $this->input->post('emp_id'),
            'department_id' => $this->input->post('department_id'),
            'shift_id' => $this->input->post('shift_id'),
            'section_id' => $this->input->post('section_id'),
            'designation_id' => $this->input->post('designation_id'),
            'joining_date' => $this->input->post('joining_date'),
            'status' => $this->input->post('status')
        );
        $result = $this->Main_model->updateData($data, "hr_job", "id='$id'");
        if ($result) {
            $msg['load_success_message'] = "Job info update successfully.";
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

    public function check_duplicate_data($emp_id = null)
    {
        $set_data = urldecode($emp_id);
        $result = $this->Main_model->check_duplicate_data('emp_id', $set_data, 'hr_job');
        if ($result) {
            echo "<span style='color: red; font-size: 12px;'>This emp id already exit !!!</span>";
        } else {
            echo "";
        }
    }

    public function load_released_note_from($id)
    {
        $data['id'] = $id;
        $this->load->view('hr/job/load_released_note_from', $data);
    }

    public function create_released_note_info()
    {
        $id = $this->input->post('id');
        $data = array(
            'released_note' => $this->input->post('released_note'),
            'date' => $this->input->post('date'),
            'status' => '0'
        );
        $result = $this->Main_model->updateData($data, "hr_job", "id='$id'");
        if ($result) {
            $msg['released_note'] = "Released note added successfully.";
            $this->load->view('messages/success_message', $msg);
        }
    }

}

?>