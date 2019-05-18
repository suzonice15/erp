<?php

class Contact extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('hr/Contact_model');
    }

    public function index()
    {
    }

    public function all_contact()
    {
        $this->config->load('pagination');
        $this->load->library("pagination");
        $config = array();

        $config["base_url"] = base_url() . "hr/contact/all_contact";
        $emp_id = $this->input->post('emp_id');
        $division_id = $this->input->post('division_id');
        $district_id = $this->input->post('district_id');

        if ($emp_id) {
            $result = $this->Contact_model->countAllByLikeCondition("hr_contact.emp_id", $emp_id);
            $config["total_rows"] = $result->count_total_rows;
        } else if ($division_id) {
            $result = $this->Contact_model->countAllByWhereCondition("hr_contact.present_division_id", $division_id);
            $config["total_rows"] = $result->count_total_rows;
        } else if ($district_id) {
            $result = $this->Contact_model->countAllByWhereCondition("hr_contact.present_district_id", $district_id);
            $config["total_rows"] = $result->count_total_rows;
        } else {
            $result = $this->Contact_model->countAll();
            $config["total_rows"] = $result->count_total_rows;
        }

        $config['per_page'] = 20;
        $config['uri_segment'] = 4;
        $config['num_links'] = 2;
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;

        if ($emp_id) {
            $data["contact"] = $this->Contact_model->select_emp_contact_by_emp_id($config["per_page"], $page, $emp_id);
        } else if ($division_id) {
            $data["contact"] = $this->Contact_model->select_emp_contact_by_division_id($config["per_page"], $page, $division_id);
        } else if ($district_id) {
            $data["contact"] = $this->Contact_model->select_emp_contact_by_district_id($config["per_page"], $page, $district_id);
        } else {
            $data["contact"] = $this->Contact_model->select_emp_contact($config["per_page"], $page);
        }

        $data["links"] = $this->pagination->create_links();
        if ($this->input->is_ajax_request()) {
            $data['division'] = $this->Main_model->getValue("", 'master_division', '*', "ID DESC");
            $data['district'] = $this->Main_model->getValue("", 'master_district', '*', "ID DESC");
            $this->load->view('contact/per_page_contact', $data);
        } else {
            $data['division'] = $this->Main_model->getValue("", 'master_division', '*', "ID DESC");
            $data['district'] = $this->Main_model->getValue("", 'master_district', '*', "ID DESC");
            $this->load->view('contact/contact_tpl', $data);
        }
    }

    public function load_add_contact_from()
    {
        $data['division'] = $this->Main_model->getValue("", 'master_division', '*', "ID DESC");
        $data['permanent_division'] = $this->Main_model->getValue("", 'master_division', '*', "ID DESC");
        $this->load->view('hr/contact/contact_from', $data);
    }

    public function create_contact()
    {
        $data = array(
            'emp_id' => $this->input->post('emp_id'),
            'present_address' => $this->input->post('present_address'),
            'present_post_office' => $this->input->post('present_post_office'),
            'present_post_code' => $this->input->post('present_post_code'),
            'present_division_id' => $this->input->post('present_division_id'),
            'present_district_id' => $this->input->post('present_district_id'),
            'present_thana_id' => $this->input->post('present_thana_id'),
            'present_email' => $this->input->post('present_email'),
            'present_phone' => $this->input->post('present_phone'),
            'present_mobile' => $this->input->post('present_mobile'),
            'is_address_same' => $this->input->post('is_address_same'),
            'permanent_address' => $this->input->post('permanent_address'),
            'permanent_post_office' => $this->input->post('permanent_post_office'),
            'permanent_post_code' => $this->input->post('permanent_post_code'),
            'permanent_division_id' => $this->input->post('permanent_division_id'),
            'permanent_district_id' => $this->input->post('permanent_district_id'),
            'permanent_thana_id' => $this->input->post('permanent_thana_id'),
            'permanent_email' => $this->input->post('permanent_email'),
            'permanent_phone' => $this->input->post('permanent_phone'),
            'permanent_mobile' => $this->input->post('permanent_mobile'),
        );
        $result = $this->Main_model->insertData($data, 'hr_contact');

        if ($result) {
            $msg['load_success_message'] = "Contact info successfully added.";
            $this->load->view('messages/success_message', $msg);
        }

    }

    public function load_update_contact_from($id)
    {
        $data['division'] = $this->Main_model->getValue("", 'master_division', '*', "ID DESC");
        $data['permanent_division'] = $this->Main_model->getValue("", 'master_division', '*', "ID DESC");
        $data['contact'] = $this->Main_model->getValue("id= '$id'", 'hr_contact', '*', "ID DESC");
        $this->load->view('hr/contact/update_contact_from', $data);
    }

    public function update_contact()
    {
        $id = $this->input->post('id');
        $data = array(
            'emp_id' => $this->input->post('emp_id'),
            'present_address' => $this->input->post('present_address'),
            'present_post_office' => $this->input->post('present_post_office'),
            'present_post_code' => $this->input->post('present_post_code'),
            'present_division_id' => $this->input->post('present_division_id'),
            'present_district_id' => $this->input->post('present_district_id'),
            'present_thana_id' => $this->input->post('present_thana_id'),
            'present_email' => $this->input->post('present_email'),
            'present_phone' => $this->input->post('present_phone'),
            'present_mobile' => $this->input->post('present_mobile'),
            'is_address_same' => $this->input->post('is_address_same'),
            'permanent_address' => $this->input->post('permanent_address'),
            'permanent_post_office' => $this->input->post('permanent_post_office'),
            'permanent_post_code' => $this->input->post('permanent_post_code'),
            'permanent_division_id' => $this->input->post('permanent_division_id'),
            'permanent_district_id' => $this->input->post('permanent_district_id'),
            'permanent_thana_id' => $this->input->post('permanent_thana_id'),
            'permanent_email' => $this->input->post('permanent_email'),
            'permanent_phone' => $this->input->post('permanent_phone'),
            'permanent_mobile' => $this->input->post('permanent_mobile'),
        );
        $result = $this->Main_model->updateData($data, "hr_contact", "id='$id'");
        if ($result) {
            $msg['load_success_message'] = "Contact info update successfully.";
            $this->load->view('messages/success_message', $msg);
        }
    }

    public function load_details_contact_from($id)
    {
        $data['contact'] = $this->Contact_model->select_contact_by_id($id);
        $this->load->view('hr/contact/details_contact_from', $data);
    }

    function select_district($division_id)
    {
        $array = $this->Main_model->getValue("division_id = '$division_id'", 'master_district', '*', "ID DESC");
        $str = "";
        $str .= '<select name="present_division_id" id="present_division_id">
				<option value="">--- Select District ---</option>';
        if (!empty($array)):
            foreach ($array as $row):
                $str .= '<option value="' . $row->id . '">' . $row->district_name . '</option>';
            endforeach;
        endif;
        $str .= '</select>';
        echo $str;
    }

    function select_thana($division_id, $district_id)
    {
        $array = $this->Main_model->getValue("division_id = '$division_id' and district_id = '$district_id'", 'master_thana', '*', "ID DESC");
        $str = "";
        $str .= '<select name="present_thana_id" id="present_thana_id">
				<option value="">--- Select District ---</option>';
        if (!empty($array)):
            foreach ($array as $row):
                $str .= '<option value="' . $row->id . '">' . $row->thana_name . '</option>';
            endforeach;
        endif;
        $str .= '</select>';
        echo $str;
    }
}

?>