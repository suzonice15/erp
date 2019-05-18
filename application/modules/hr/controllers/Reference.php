<?php

class Reference extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('hr/reference_model');
    }

    public function index()
    {
    }

    public function all_reference()
    {
        $this->config->load('pagination');
        $this->load->library("pagination");
        $config = array();
        $config["base_url"] = base_url() . "hr/reference/all_reference";

        $emp_id = $this->input->post('emp_id');

        if ($emp_id) {
            $result = $this->reference_model->countAllByLikeCondition("hr_reference.emp_id", $emp_id);
            $config["total_rows"] = $result->count_total_rows;
        } else {
            $result = $this->reference_model->countAll();
            $config["total_rows"] = $result->count_total_rows;
        }

        $config['per_page'] = 20;
        $config['uri_segment'] = 4;
        $config['num_links'] = 2;
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;

        if ($emp_id) {
            $data["reference"] = $this->reference_model->select_emp_reference_by_emp_id($config["per_page"], $page, $emp_id);
        } else {
            $data["reference"] = $this->reference_model->select_reference($config["per_page"], $page);
        }

        $data["links"] = $this->pagination->create_links();
        if ($this->input->is_ajax_request()) {
            $this->load->view('reference/per_page_reference', $data);
        } else {
            $this->load->view('reference/reference_tpl', $data);
        }
    }

    public function load_add_reference_from()
    {
        $this->load->view('hr/reference/reference_from');
    }

    public function create_reference()
    {
        $total_fields = $this->input->post('total_num_of_fields');
        $emp_id = $this->input->post('emp_id');
        $name = $this->input->post('name');
        $designation = $this->input->post('designation');
        $organization = $this->input->post('organization');
        $address = $this->input->post('address');
        $email = $this->input->post('email');
        $phone = $this->input->post('phone');
        $mobile = $this->input->post('mobile');

        for ($i = 0; $i < $total_fields; $i++) {
            $data = array(
                'emp_id' => $emp_id[$i],
                'name' => $name[$i],
                'designation' => $designation[$i],
                'organization' => $organization[$i],
                'address' => $address[$i],
                'email' => $email[$i],
                'phone' => $phone[$i],
                'mobile' => $mobile[$i]
            );
            $result = $this->Main_model->insertData($data, 'hr_reference');
        }
        if ($result) {
            $msg['load_success_message'] = "reference info successfully added.";
            $this->load->view('messages/success_message', $msg);
        }


    }

    public function load_update_reference_from($emp_id)
    {
        $data['reference'] = $this->Main_model->getValue("emp_id='$emp_id'", 'hr_reference', '*', "ID DESC");
        $this->load->view('hr/reference/update_reference_from', $data);
    }

    public function update_reference()
    {
        $id = $this->input->post('id');
        $total_fields = $this->input->post('total_num_of_fields');
        $emp_id = $this->input->post('emp_id');
        $name = $this->input->post('name');
        $designation = $this->input->post('designation');
        $organization = $this->input->post('organization');
        $address = $this->input->post('address');
        $email = $this->input->post('email');
        $phone = $this->input->post('phone');
        $mobile = $this->input->post('mobile');

        for ($i = 0; $i < $total_fields; $i++) {
            $set_id = $id[$i];
            $data = array(
                'emp_id' => $emp_id[$i],
                'name' => $name[$i],
                'designation' => $designation[$i],
                'organization' => $organization[$i],
                'address' => $address[$i],
                'email' => $email[$i],
                'phone' => $phone[$i],
                'mobile' => $mobile[$i]
            );
            $result = $this->Main_model->updateData($data, "hr_reference", "id='$set_id'");
        }
        if ($result) {
            $msg['load_success_message'] = "reference info update successfully.";
            $this->load->view('messages/success_message', $msg);
        }
    }

    public function load_details_reference_from($emp_id)
    {
        $data['reference'] = $this->reference_model->select_reference_by_id($emp_id);
        $this->load->view('hr/reference/details_reference_from', $data);
    }


}

?>