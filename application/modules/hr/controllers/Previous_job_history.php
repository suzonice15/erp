<?php

class Previous_job_history extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('hr/previous_job_history_model');
    }

    public function index()
    {
    }

    public function all_previous_job_history()
    {
        $this->config->load('pagination');
        $this->load->library("pagination");
        $config = array();

        $config["base_url"] = base_url() . "hr/previous_job_history/all_previous_job_history";
        $emp_id = $this->input->post('emp_id');

        if ($emp_id) {
            $result = $this->previous_job_history_model->countAllByLikeCondition("hr_previous_job_history.emp_id", $emp_id);
            $config["total_rows"] = $result->count_total_rows;
        } else {
            $result = $this->previous_job_history_model->countAll();
            $config["total_rows"] = $result->count_total_rows;
        }

        $config['per_page'] = 20;
        $config['uri_segment'] = 4;
        $config['num_links'] = 2;
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;

        if ($emp_id) {
            $data["previous_job_history"] = $this->previous_job_history_model->select_emp_previous_job_history_by_emp_id($config["per_page"], $page, $emp_id);
        } else {
            $data["previous_job_history"] = $this->previous_job_history_model->select_emp_previous_job_history($config["per_page"], $page);
        }

        $data["links"] = $this->pagination->create_links();
        if ($this->input->is_ajax_request()) {
            $this->load->view('previous_job_history/per_page_previous_job_history', $data);
        } else {
            $this->load->view('previous_job_history/previous_job_history_tpl', $data);
        }
    }

    public function load_add_previous_job_history_from()
    {
        $this->load->view('hr/previous_job_history/previous_job_history_from');
    }

    public function create_previous_job_history()
    {
        $total_fields = $this->input->post('total_num_of_fields');
        $emp_id = $this->input->post('emp_id');
        $organization_name = $this->input->post('organization_name');
        $position = $this->input->post('position');
        $job_type = $this->input->post('job_type');
        $from_date = $this->input->post('from_date');
        $to_date = $this->input->post('to_date');
        $duration = $this->input->post('duration');
        $address = $this->input->post('address');

        for ($i = 0; $i < $total_fields; $i++) {
            $data = array(
                'emp_id' => $emp_id[$i],
                'organization_name' => $organization_name[$i],
                'position' => $position[$i],
                'job_type' => $job_type[$i],
                'from_date' => $from_date[$i],
                'to_date' => $to_date[$i],
                'duration' => $duration[$i],
                'address' => $address[$i]
            );
            $result = $this->Main_model->insertData($data, 'hr_previous_job_history');
        }
        if ($result) {
            $msg['load_success_message'] = "Previous job info successfully added.";
            $this->load->view('messages/success_message', $msg);
        }
    }

    public function load_update_previous_job_history_from($id)
    {
        $data['previous_job_history'] = $this->Main_model->getValue("emp_id= '$id'", 'hr_previous_job_history', '*', "ID DESC");
        $this->load->view('hr/previous_job_history/update_previous_job_history_from', $data);
    }

    public function update_previous_job_history()
    {
        $id = $this->input->post('id');
        $total_fields = $this->input->post('total_num_of_fields');
        $emp_id = $this->input->post('emp_id');
        $organization_name = $this->input->post('organization_name');
        $position = $this->input->post('position');
        $job_type = $this->input->post('job_type');
        $from_date = $this->input->post('from_date');
        $to_date = $this->input->post('to_date');
        $duration = $this->input->post('duration');
        $address = $this->input->post('address');

        for ($i = 0; $i < $total_fields; $i++) {
            $set_id = $id[$i];
            $data = array(
                'emp_id' => $emp_id[$i],
                'organization_name' => $organization_name[$i],
                'position' => $position[$i],
                'job_type' => $job_type[$i],
                'from_date' => $from_date[$i],
                'to_date' => $to_date[$i],
                'duration' => $duration[$i],
                'address' => $address[$i]
            );
            $result = $this->Main_model->updateData($data, "hr_previous_job_history", "id='$set_id'");
        }
        if ($result) {
            $msg['load_success_message'] = "Previous job history successfully added.";
            $this->load->view('messages/success_message', $msg);
        }
    }

    public function load_details_previous_job_history_from($id)
    {
        $data['previous_job_history'] = $this->previous_job_history_model->select_previous_job_history_by_id($id);
        $this->load->view('hr/previous_job_history/details_previous_job_history_from', $data);
    }
    


}

?>