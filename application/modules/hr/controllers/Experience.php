<?php

class Experience extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('hr/Experience_model');
    }

    public function index()
    {
    }

    public function all_experience()
    {
        $this->config->load('pagination');
        $this->load->library("pagination");
        $config = array();

        $config["base_url"] = base_url() . "hr/experience/all_experience";
        $emp_id = $this->input->post('emp_id');
        $division_id = $this->input->post('division_id');
        $district_id = $this->input->post('district_id');

        if ($emp_id) {
            $result = $this->Experience_model->countAllByLikeCondition("hr_experience.emp_id", $emp_id);
            $config["total_rows"] = $result->count_total_rows;
        } else {
            $result = $this->Experience_model->countAll();
            $config["total_rows"] = $result->count_total_rows;
        }

        $config['per_page'] = 20;
        $config['uri_segment'] = 4;
        $config['num_links'] = 2;
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;

        if ($emp_id) {
            $data["experience"] = $this->Experience_model->select_emp_experience_by_emp_id($config["per_page"], $page, $emp_id);
        } else {
            $data["experience"] = $this->Experience_model->select_emp_experience($config["per_page"], $page);
        }

        $data["links"] = $this->pagination->create_links();
        if ($this->input->is_ajax_request()) {
            $this->load->view('experience/per_page_experience', $data);
        } else {
            $this->load->view('experience/experience_tpl', $data);
        }
    }

    public function load_add_experience_from()
    {
        $this->load->view('hr/experience/experience_from');
    }

    public function create_experience()
    {
        $total_fields = $this->input->post('total_num_of_fields');
        $emp_id = $this->input->post('emp_id');
        $institute = $this->input->post('institute');
        $business = $this->input->post('business');
        $department = $this->input->post('department');
        $joined_on = $this->input->post('joined_on');
        $release_on = $this->input->post('release_on');
        $duration = $this->input->post('duration');
        $area_of_concentration = $this->input->post('area_of_concentration');
        $position_hold = $this->input->post('position_hold');
        $job_details = $this->input->post('job_details');

        for ($i = 0; $i < $total_fields; $i++) {
            $data = array(
                'emp_id' => $emp_id[$i],
                'institute' => $institute[$i],
                'business' => $business[$i],
                'department' => $department[$i],
                'joined_on' => $joined_on[$i],
                'release_on' => $release_on[$i],
                'duration' => $duration[$i],
                'area_of_concentration' => $area_of_concentration[$i],
                'position_hold' => $position_hold[$i],
                'job_details' => $job_details[$i]
            );
            $result = $this->Main_model->insertData($data, 'hr_experience');
        }
        if ($result) {
            $msg['load_success_message'] = "Experience info successfully added.";
            $this->load->view('messages/success_message', $msg);
        }
    }

    public function load_update_experience_from($id)
    {
        $data['experience'] = $this->Main_model->getValue("emp_id= '$id'", 'hr_experience', '*', "ID DESC");
        $this->load->view('hr/experience/update_experience_from', $data);
    }

    public function update_experience()
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
        $result = $this->Main_model->updateData($data, "hr_experience", "id='$id'");
        if ($result) {
            $msg['load_success_message'] = "Contact info update successfully.";
            $this->load->view('messages/success_message', $msg);
        }
    }

    public function load_details_experience_from($id)
    {
        $data['experience'] = $this->Experience_model->select_experience_by_id($id);
        $this->load->view('hr/experience/details_experience_from', $data);
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