<?php

class Roster extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('hr/roster_model');
    }

    public function index()
    {
    }

    public function all_roster()
    {
        $this->config->load('pagination');
        $this->load->library("pagination");
        $config = array();
        $config["base_url"] = base_url() . "hr/roster/all_roster";

        $emp_id = $this->input->post('emp_id');

        if ($emp_id) {
            $result = $this->roster_model->countAllByLikeCondition("hr_assigning_roster.emp_id", $emp_id);
            $config["total_rows"] = $result->count_total_rows;
        } else {
            $result = $this->roster_model->countAll();
            $config["total_rows"] = $result->count_total_rows;
        }

        $config['per_page'] = 20;
        $config['uri_segment'] = 4;
        $config['num_links'] = 2;
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;

        if ($emp_id) {
            $data["roster"] = $this->roster_model->select_emp_roster_by_emp_id($config["per_page"], $page, $emp_id);
        } else {
            $data["roster"] = $this->roster_model->select_roster($config["per_page"], $page);
        }

        $data["links"] = $this->pagination->create_links();
        if ($this->input->is_ajax_request()) {
            $this->load->view('roster/per_page_roster', $data);
        } else {
            $this->load->view('roster/roster_tpl', $data);
        }
    }

    public function load_add_roster_from()
    {
        $data['department'] = $this->Main_model->getValue("", 'master_department', '*', "ID DESC");
        $data['shift'] = $this->Main_model->getValue("", 'master_shift', '*', "ID DESC");
        $this->load->view('hr/roster/roster_from', $data);
    }

    public function create_roster()
    {
        $total_fields = $this->input->post('total_num_of_fields');
        $emp_id = $this->input->post('emp_id');
        $from_date = $this->input->post('from_date');
        $to_date = $this->input->post('to_date');

        for ($i = 0; $i < $total_fields; $i++) {
            $set_emp_id = $emp_id[$i];
            $data = array(
                'status' => 0
            );

            $data1 = array(
                'emp_id' => $emp_id[$i],
                'from_date' => $from_date,
                'to_date' => $to_date,
                'status' => 1
            );
            $this->Main_model->updateData($data, "hr_assigning_roster", "emp_id='$set_emp_id'");
            $result = $this->Main_model->insertData($data1, 'hr_assigning_roster');
        }
        if ($result) {
            $msg['load_success_message'] = "Roster info successfully added.";
            $this->load->view('messages/success_message', $msg);
        }


    }

    public function load_update_roster_from($id)
    {
        $data['roster'] = $this->Main_model->getValue("id= '$id'", 'hr_assigning_roster', '*', "ID DESC");
        $this->load->view('hr/roster/update_roster_from', $data);
    }

    public function update_roster()
    {
        $id = $this->input->post('id');
        $data = array(
            'from_date' => $this->input->post('from_date'),
            'to_date' => $this->input->post('to_date')
        );
        $result = $this->Main_model->updateData($data, "hr_assigning_roster", "id='$id'");
        if ($result) {
            $msg['load_success_message'] = "Roster info update successfully.";
            $this->load->view('messages/success_message', $msg);
        }
    }

    function select_section($shift_id)
    {
        $array = $this->Main_model->getValue("shift_id = '$shift_id'", 'master_section', '*', "ID DESC");
        $str = "";
        $str .= '<select name="section_id" id="section_id">
				<option value="">--- Select Section ---</option>';
        if (!empty($array)):
            foreach ($array as $row):
                $str .= '<option value="' . $row->id . '">' . $row->section_name . '</option>';
            endforeach;
        endif;
        $str .= '</select>';
        echo $str;
    }

    public function select_emp_info()
    {
        $department_id = $this->input->post('department_id');
        $shift_id = $this->input->post('shift_id');
        $section_id = $this->input->post('section_id');
        $data['emp_info'] = $this->roster_model->select_emp_info($department_id, $shift_id, $section_id);
        $this->load->view('hr/roster/load_emp_info', $data);
    }
}
?>