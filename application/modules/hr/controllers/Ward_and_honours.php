<?php

class Ward_and_honours extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('hr/ward_and_honours_model');
    }

    public function index()
    {
    }

    public function all_ward_and_honours()
    {
        $this->config->load('pagination');
        $this->load->library("pagination");
        $config = array();
        $config["base_url"] = base_url() . "hr/ward_and_honours/all_ward_and_honours";

        $emp_id = $this->input->post('emp_id');

        if ($emp_id) {
            $result = $this->ward_and_honours_model->countAllByLikeCondition("hr_emp_award_and_honors.emp_id", $emp_id);
            $config["total_rows"] = $result->count_total_rows;
        } else {
            $result = $this->ward_and_honours_model->countAll();
            $config["total_rows"] = $result->count_total_rows;
        }

        $config['per_page'] = 5;
        $config['uri_segment'] = 4;
        $config['num_links'] = 2;
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;

        if ($emp_id) {
            $data["ward_and_honours"] = $this->ward_and_honours_model->select_emp_ward_and_honours_by_emp_id($config["per_page"], $page, $emp_id);
        } else {
            $data["ward_and_honours"] = $this->ward_and_honours_model->select_emp_ward_and_honours($config["per_page"], $page);
        }

        $data["links"] = $this->pagination->create_links();
        if ($this->input->is_ajax_request()) {
            $this->load->view('ward_and_honours/per_page_ward_and_honours', $data);
        } else {
            $this->load->view('ward_and_honours/ward_and_honours_tpl', $data);
        }
    }

    public function load_add_ward_and_honours_from()
    {
        $this->load->view('hr/ward_and_honours/ward_and_honours_from');
    }

    public function create_ward_and_honours()
    {
        $total_fields = $this->input->post('total_num_of_fields');
        $emp_id = $this->input->post('emp_id');
        $award_honors_title = $this->input->post('award_honors_title');
        $awards_type = $this->input->post('awards_type');
        $country = $this->input->post('country');
        $receiving_date = $this->input->post('receiving_date');
        $organization_name = $this->input->post('organization_name');

        for ($i = 0; $i < $total_fields; $i++) {
            $data['emp_id'] = $emp_id[$i];
            $data['award_honors_title'] = $award_honors_title[$i];
            $data['awards_type'] = $awards_type[$i];
            $data['country'] = $country[$i];
            $data['receiving_date'] = $receiving_date[$i];
            $data['organization_name'] = $organization_name[$i];
            $result = $this->Main_model->insertData($data, 'hr_emp_award_and_honors');
        }
        if ($result) {
            $msg['load_success_message'] = "Award/honors info successfully added.";
            $this->load->view('messages/success_message', $msg);
        }

    }

    public function load_update_ward_and_honours_from($id)
    {
        $data['award_and_honours'] = $this->Main_model->getValue("id= '$id'", 'hr_award_and_honors', '*', "ID DESC");
        $this->load->view('hr/ward_and_honours/update_ward_and_honours_from', $data);
    }

    public function update_ward_and_honours()
    {
        $id = $this->input->post('id');
        $data = array(
            'emp_id' => $this->input->post('emp_id'),
            'award_honors_title' => $this->input->post('award_honors_title'),
            'awards_type' => $this->input->post('awards_type'),
            'country' => $this->input->post('country'),
            'receiving_date' => $this->input->post('receiving_date'),
            'organization_name' => $this->input->post('organization_name')
        );
        $result = $this->Main_model->updateData($data, "hr_award_and_honors", "id='$id'");
        if ($result) {
            $msg['load_success_message'] = "Award / Honours update successfully.";
            $this->load->view('messages/success_message', $msg);
        }
    }
}

?>