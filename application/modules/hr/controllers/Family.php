<?php

class Family extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('hr/Family_model');
    }

    public function index()
    {
    }

    public function all_family()
    {
        $this->config->load('pagination');
        $this->load->library("pagination");
        $config = array();
        $config["base_url"] = base_url() . "hr/family/all_family";

        $emp_id = $this->input->post('emp_id');
        $mobile_no = $this->input->post('mobile_no');

        if ($emp_id) {
            $result = $this->Family_model->countAllByLikeCondition("hr_family.emp_id",$emp_id);
            $config["total_rows"] = $result->count_total_rows;
        } else if ($mobile_no) {
            $result = $this->Family_model->countAllByCondition("hr_family.contact_no",$mobile_no);
            $config["total_rows"] = $result->count_total_rows;
        } else {
            $result = $this->Family_model->countAll();
            $config["total_rows"] = $result->count_total_rows;
        }

        $config['per_page'] = 20;
        $config['uri_segment'] = 4;
        $config['num_links'] = 2;
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;

        if ($emp_id) {
            $data["family"] = $this->Family_model->select_emp_family_by_emp_id($config["per_page"], $page, $emp_id);
        } else if ($mobile_no) {
            $data["family"] = $this->Family_model->select_emp_family_by_mobile_no($config["per_page"], $page, $mobile_no);
        } else {
            $data["family"] = $this->Family_model->select_emp_family($config["per_page"], $page);
        }

        $data["links"] = $this->pagination->create_links();
        if ($this->input->is_ajax_request()) {
            $this->load->view('family/per_page_family', $data);
        } else {
            $this->load->view('family/family_tpl', $data);
        }
    }

    public function load_add_family_from()
    {
        $data['designation'] = $this->Main_model->getValue("", 'master_designation', '*', "ID DESC");
        $data['profession'] = $this->Main_model->getValue("", 'master_profession', '*', "ID DESC");
        $this->load->view('hr/family/family_from', $data);
    }

    public function create_family()
    {
        $total_fields = $this->input->post('total_num_of_fields');
        $emp_id = $this->input->post('emp_id');
        $spouse_name = $this->input->post('spouse_name');
        $profession_id = $this->input->post('profession_id');
        $organization = $this->input->post('organization');
        $designation_id = $this->input->post('designation_id');
        $contact_no = $this->input->post('contact_no');
        $total_family_members = $this->input->post('total_family_members');
        $no_of_other_dependents = $this->input->post('no_of_other_dependents');

        for ($i = 0; $i < $total_fields; $i++) {
            $data['emp_id'] = $emp_id[$i];
            $data['spouse_name'] = $spouse_name[$i];
            $data['profession_id'] = $profession_id[$i];
            $data['organization'] = $organization[$i];
            $data['designation_id'] = $designation_id[$i];
            $data['contact_no'] = $contact_no[$i];
            $data['total_family_members'] = $total_family_members[$i];
            $data['no_of_other_dependents'] = $no_of_other_dependents[$i];
            $result = $this->Main_model->insertData($data, 'hr_family');
        }
        if ($result) {
            $msg['load_success_message'] = "Basic info successfully added.";
            $this->load->view('messages/success_message', $msg);
        }
    }

    public function load_update_family_from($id)
    {
        $data['designation'] = $this->Main_model->getValue("", 'master_designation', '*', "ID DESC");
        $data['profession'] = $this->Main_model->getValue("", 'master_profession', '*', "ID DESC");
        $data['family'] = $this->Main_model->getValue("id = '$id'", 'hr_family', '*', "ID DESC");
        $this->load->view('hr/family/update_family_from', $data);
    }

    public function update_family()
    {
        $id = $this->input->post('id');
        $data = array(
            'emp_id' => $this->input->post('emp_id'),
            'spouse_name' => $this->input->post('spouse_name'),
            'profession_id' => $this->input->post('profession_id'),
            'organization' => $this->input->post('organization'),
            'designation_id' => $this->input->post('designation_id'),
            'contact_no' => $this->input->post('contact_no'),
            'total_family_members' => $this->input->post('total_family_members'),
            'no_of_other_dependents' => $this->input->post('no_of_other_dependents')
        );
        $result = $this->Main_model->updateData($data, "hr_family", "id='$id'");
        if ($result) {
            $msg['load_success_message'] = "Emp family info update successfully.";
            $this->load->view('messages/success_message', $msg);
        }
    }


    public function check_duplicate_data($emp_id = null)
    {
        $set_data = urldecode($emp_id);
        $result = $this->Main_model->check_duplicate_data('emp_id', $set_data, 'hr_emp_job_info');
        if ($result) {
            echo "";
        } else {
            echo "<span style='color: red; font-size: 12px;'>This ID is not valid !!!</span>";
        }
    }
}

?>