<?php

class Co_curricular_activities extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('hr/Co_curricular_activities_model');
    }

    public function index()
    {
    }

    public function all_co_curricular_activities()
    {
        $this->config->load('pagination');
        $this->load->library("pagination");
        $config = array();

        $config["base_url"] = base_url() . "hr/co_curricular_activities/all_co_curricular_activities";
        $emp_id = $this->input->post('emp_id');

        if ($emp_id) {
            $result = $this->Co_curricular_activities_model->countAllByLikeCondition("hr_co_curricular_activities.emp_id", $emp_id);
            $config["total_rows"] = $result->count_total_rows;
        } else {
            $result = $this->Co_curricular_activities_model->countAll();
            $config["total_rows"] = $result->count_total_rows;
        }

        $config['per_page'] = 5;
        $config['uri_segment'] = 4;
        $config['num_links'] = 2;
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;

        if ($emp_id) {
            $data["co_curricular_activities"] = $this->Co_curricular_activities_model->select_emp_co_curricular_activities_by_emp_id($config["per_page"], $page, $emp_id);
        } else {
            $data["co_curricular_activities"] = $this->Co_curricular_activities_model->select_emp_co_curricular_activities($config["per_page"], $page);
        }

        $data["links"] = $this->pagination->create_links();
        if ($this->input->is_ajax_request()) {
            $this->load->view('co_curricular_activities/per_page_co_curricular_activities', $data);
        } else {
            $this->load->view('co_curricular_activities/co_curricular_activities_tpl', $data);
        }
    }

    public function load_add_co_curricular_activities_from()
    {
        $this->load->view('hr/co_curricular_activities/co_curricular_activities_from');
    }

    public function create_co_curricular_activities()
    {
        $data = array(
            'emp_id' => $this->input->post('emp_id'),
            'description' => $this->input->post('description')
        );
        $result = $this->Main_model->insertData($data, 'hr_co_curricular_activities');

        if ($result) {
            $msg['load_success_message'] = "Co-curricular activities info successfully added.";
            $this->load->view('messages/success_message', $msg);
        }

    }

    public function load_update_co_curricular_activities_from($id)
    {
        $data['co_curricular_activities'] = $this->Main_model->getValue("id= '$id'", 'hr_co_curricular_activities', '*', "ID DESC");
        $this->load->view('hr/co_curricular_activities/update_co_curricular_activities_from', $data);
    }

    public function update_co_curricular_activities()
    {
        $id = $this->input->post('id');
        $data = array(
            'emp_id' => $this->input->post('emp_id'),
            'description' => $this->input->post('description')
        );
        $result = $this->Main_model->updateData($data, "hr_co_curricular_activities", "id='$id'");
        if ($result) {
            $msg['load_success_message'] = "Co-curricular activities update successfully.";
            $this->load->view('messages/success_message', $msg);
        }
    }
}

?>