<?php

class Shift_Schedule extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('hr/shift_schedule_model');
    }

    public function index()
    {

    }

    public function all_shift_schedule()
    {
        $this->config->load('pagination');
        $this->load->library("pagination");
        $config = array();
        $config["base_url"] = base_url() . "hr/shift_schedule/all_shift_schedule";
        $config["total_rows"] = $this->Main_model->countAll('hr_shift_schedule');;
        $config['per_page'] = 10;
        $config['uri_segment'] = 4;
        $config['num_links'] = 9;
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $data["shift_schedule"] = $this->shift_schedule_model->select_all_shift_schedule($config["per_page"], $page);
        $data["links"] = $this->pagination->create_links();
        if ($this->input->is_ajax_request()) {
            $this->load->view('shift_schedule/per_page_shift_schedule', $data);
        } else {
            $this->load->view('shift_schedule/shift_schedule_tpl', $data);
        }
    }

    public function load_add_shift_schedule_from()
    {
        $data['shift'] = $this->Main_model->getValue("", 'master_shift', '*', "ID DESC");
        $this->load->view('hr/shift_schedule/shift_schedule_from', $data);
    }


    public function create_shift_schedule()
    {
        $data = array(
            'shift_id' => $this->input->post('shift_id'),
            'in_time' => $this->input->post('in_time'),
            'out_time' => $this->input->post('out_time'),
            'late_time' => $this->input->post('late_time'),
            'early_out' => $this->input->post('early_out'),
            'status' => 1
        );
        $result = $this->Main_model->insertData($data, 'hr_shift_schedule');
        if ($result) {
            $msg['load_success_message'] = "Shift schedule successfully added.";
            $this->load->view('messages/success_message', $msg);
        }
    }


    public function shift_schedule_active($id)
    {
        $data = array(
            'status' => 1
        );
        $result = $this->Main_model->updateData($data, "hr_shift_schedule", "id='$id'");
        if ($result) {
            echo "1";
        }
    }

    public function shift_schedule_inactive($id)
    {
        $data = array(
            'status' => 0
        );
        $result = $this->Main_model->updateData($data, "hr_shift_schedule", "id='$id'");
        if ($result) {
            echo "1";
        }
    }

    public function load_update_shift_schedule_from($id)
    {
        $data['shift'] = $this->Main_model->getValue("", 'master_shift', '*', "ID DESC");
        $data['shift_schedule'] = $this->Main_model->getValue("id = '$id'", 'hr_shift_schedule', '*', "ID DESC");
        $this->load->view('hr/shift_schedule/update_shift_schedule_from', $data);
    }

    public function update_shift_schedule()
    {
        $id = $this->input->post('id');
        $data = array(
            'shift_id' => $this->input->post('shift_id'),
            'in_time' => $this->input->post('in_time'),
            'out_time' => $this->input->post('out_time'),
            'late_time' => $this->input->post('late_time'),
            'early_out' => $this->input->post('early_out'),
            'status' => $this->input->post('status')
        );
        $result = $this->Main_model->updateData($data, "hr_shift_schedule", "id='$id'");
        if ($result) {
            $msg['load_success_message'] = "Shift schedule update successfully.";
            $this->load->view('messages/success_message', $msg);
        }
    }
}

?>