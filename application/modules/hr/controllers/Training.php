<?php

class Training extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('hr/training_model');
    }

    public function index()
    {
    }

    public function all_training()
    {
        $this->config->load('pagination');
        $this->load->library("pagination");
        $config = array();
        $config["base_url"] = base_url() . "hr/training/all_training";

        $emp_id = $this->input->post('emp_id');

        if ($emp_id) {
            $result = $this->training_model->countAllByLikeCondition("hr_training.emp_id", $emp_id);
            $config["total_rows"] = $result->count_total_rows;
        } else {
            $result = $this->training_model->countAll();
            $config["total_rows"] = $result->count_total_rows;
        }

        $config['per_page'] = 4;
        $config['uri_segment'] = 4;
        $config['num_links'] = 2;
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;

        if ($emp_id) {
            $data["training"] = $this->training_model->select_emp_training_by_emp_id($config["per_page"], $page, $emp_id);
        } else {
            $data["training"] = $this->training_model->select_training($config["per_page"], $page);
        }

        $data["links"] = $this->pagination->create_links();
        if ($this->input->is_ajax_request()) {
            $this->load->view('training/per_page_training', $data);
        } else {
            $this->load->view('training/training_tpl', $data);
        }
    }

    public function load_add_training_from()
    {
        $this->load->view('hr/training/training_from');
    }

    public function create_training()
    {
        $total_fields = $this->input->post('total_num_of_fields');
        $emp_id = $this->input->post('emp_id');
        $training_title = $this->input->post('training_title');
        $topics_covered = $this->input->post('topics_covered');
        $institute = $this->input->post('institute');
        $country = $this->input->post('country');
        $location = $this->input->post('location');
        $duration = $this->input->post('duration');
        
        for ($i = 0; $i < $total_fields; $i++) {
            $data = array(
                'emp_id' => $emp_id[$i],
                'training_title' => $training_title[$i],
                'topics_covered' => $topics_covered[$i],
                'institute' => $institute[$i],
                'country' => $country[$i],
                'location' => $location[$i],
                'duration' => $duration[$i]
            );
            $result = $this->Main_model->insertData($data, 'hr_training');
        }
        if ($result) {
            $msg['load_success_message'] = "Training successfully added.";
            $this->load->view('messages/success_message', $msg);
        }
    }

    public function load_update_training_from($emp_id)
    {
        $data['training'] = $this->Main_model->getValue("emp_id='$emp_id'", 'hr_training', '*', "ID DESC");
        $this->load->view('hr/training/update_training_from', $data);
    }

    public function update_training()
    {
        $id = $this->input->post('id');
        $total_fields = $this->input->post('total_num_of_fields');
        $emp_id = $this->input->post('emp_id');
        $training_title = $this->input->post('training_title');
        $topics_covered = $this->input->post('topics_covered');
        $institute = $this->input->post('institute');
        $country = $this->input->post('country');
        $location = $this->input->post('location');
        $duration = $this->input->post('duration');

        for ($i = 0; $i < $total_fields; $i++) {
            $set_id = $id[$i];
            $data = array(
                'emp_id' => $emp_id[$i],
                'training_title' => $training_title[$i],
                'topics_covered' => $topics_covered[$i],
                'institute' => $institute[$i],
                'country' => $country[$i],
                'location' => $location[$i],
                'duration' => $duration[$i]
            );
            $result = $this->Main_model->updateData($data, "hr_training", "id='$set_id'");
        }
        if ($result) {
            $msg['load_success_message'] = "Training update successfully.";
            $this->load->view('messages/success_message', $msg);
        }
    }

    public function load_details_training_from($emp_id)
    {
        $data['training'] = $this->training_model->select_training_by_id($emp_id);
        $this->load->view('hr/training/details_training_from', $data);
    }


}

?>