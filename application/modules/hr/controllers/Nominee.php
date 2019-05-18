<?php

class Nominee extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('hr/nominee_model');
    }

    public function index()
    {
    }

    public function all_nominee()
    {
        $this->config->load('pagination');
        $this->load->library("pagination");
        $config = array();

        $config["base_url"] = base_url() . "hr/nominee/all_nominee";
        $emp_id = $this->input->post('emp_id');

        if ($emp_id) {
            $result = $this->nominee_model->countAllByLikeCondition("hr_nominee.emp_id", $emp_id);
            $config["total_rows"] = $result->count_total_rows;
        } else {
            $result = $this->nominee_model->countAll();
            $config["total_rows"] = $result->count_total_rows;
        }

        $config['per_page'] = 20;
        $config['uri_segment'] = 4;
        $config['num_links'] = 2;
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;

        if ($emp_id) {
            $data["nominee"] = $this->nominee_model->select_emp_nominee_by_emp_id($config["per_page"], $page, $emp_id);
        } else {
            $data["nominee"] = $this->nominee_model->select_emp_nominee($config["per_page"], $page);
        }

        $data["links"] = $this->pagination->create_links();
        if ($this->input->is_ajax_request()) {
            $this->load->view('nominee/per_page_nominee', $data);
        } else {
            $this->load->view('nominee/nominee_tpl', $data);
        }
    }

    public function load_add_nominee_from()
    {
        $this->load->view('hr/nominee/nominee_from');
    }

    public function create_nominee()
    {
        $total_num_of_fields = $this->input->post('total_num_of_fields');
        $emp_id = $this->input->post('emp_id');
        $name = $this->input->post('name');
        $father_name = $this->input->post('father_name');
        $mother_name = $this->input->post('mother_name');
        $spouse_name = $this->input->post('spouse_name');
        $percent = $this->input->post('percent');
        $national_id = $this->input->post('national_id');
        $passport_number = $this->input->post('passport_number');
        $present_address = $this->input->post('present_address');
        $permanent_address = $this->input->post('permanent_address');

        for ($i = 0; $i < $total_num_of_fields; $i++) {
            $data = array(
                'emp_id' => $emp_id[$i],
                'name' => $name[$i],
                'father_name' => $father_name[$i],
                'mother_name' => $mother_name[$i],
                'spouse_name' => $spouse_name[$i],
                'percent' => $percent[$i],
                'national_id' => $national_id[$i],
                'passport_number' => $passport_number[$i],
                'present_address' => $present_address[$i],
                'permanent_address' => $permanent_address[$i]
            );
            $result = $this->Main_model->insertData($data, 'hr_nominee');
        }
        if ($result) {
            $msg['load_success_message'] = "Nominee info successfully added.";
            $this->load->view('messages/success_message', $msg);
        }

    }

    public function load_update_nominee_from($id)
    {
        $data['nominee'] = $this->Main_model->getValue("emp_id= '$id'", 'hr_nominee', '*', "ID DESC");
        $this->load->view('hr/nominee/update_nominee_from', $data);
    }

    public function update_nominee()
    {
        $id = $this->input->post('id');
        $total_num_of_fields = $this->input->post('total_num_of_fields');
        $emp_id = $this->input->post('emp_id');
        $name = $this->input->post('name');
        $father_name = $this->input->post('father_name');
        $mother_name = $this->input->post('mother_name');
        $spouse_name = $this->input->post('spouse_name');
        $percent = $this->input->post('percent');
        $national_id = $this->input->post('national_id');
        $passport_number = $this->input->post('passport_number');
        $present_address = $this->input->post('present_address');
        $permanent_address = $this->input->post('permanent_address');

        for ($i = 0; $i < $total_num_of_fields; $i++) {
            $set_id = $id[$i];
            $data = array(
                'emp_id' => $emp_id[$i],
                'name' => $name[$i],
                'father_name' => $father_name[$i],
                'mother_name' => $mother_name[$i],
                'spouse_name' => $spouse_name[$i],
                'percent' => $percent[$i],
                'national_id' => $national_id[$i],
                'passport_number' => $passport_number[$i],
                'present_address' => $present_address[$i],
                'permanent_address' => $permanent_address[$i]
            );
            $result = $this->Main_model->updateData($data, "hr_nominee", "id='$set_id'");
        }
        if ($result) {
            $msg['load_success_message'] = "Nominee info update successfully.";
            $this->load->view('messages/success_message', $msg);
        }
    }

    public function load_details_nominee_from($id)
    {
        $data['nominee'] = $this->nominee_model->select_nominee_by_id($id);
        $this->load->view('hr/nominee/details_nominee_from', $data);
    }


}

?>