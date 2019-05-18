<?php

class Attendance extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('hr/Attendance_model');
    }

    public function index()
    {
    }

    public function all_attendance()
    {
        $this->config->load('pagination');
        $this->load->library("pagination");
        $config = array();
        $config["base_url"] = base_url() . "hr/attendance/all_attendance";

        $emp_id = $this->input->post('emp_id');

        if ($emp_id) {
            $result = $this->Attendance_model->countAllByLikeCondition("hr_assigning_roster.emp_id", $emp_id);
            $config["total_rows"] = $result->count_total_rows;
        } else {
            $result = $this->Attendance_model->countAll();
            $config["total_rows"] = $result->count_total_rows;
        }

        $config['per_page'] = 20;
        $config['uri_segment'] = 4;
        $config['num_links'] = 2;
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;

        if ($emp_id) {
            $data["attendance"] = $this->Attendance_model->select_emp_attendance_by_emp_id($config["per_page"], $page, $emp_id);
        } else {
            $data["attendance"] = $this->Attendance_model->select_attendance($config["per_page"], $page);
        }

        $data["links"] = $this->pagination->create_links();
        if ($this->input->is_ajax_request()) {
            $this->load->view('attendance/per_page_attendance', $data);
        } else {
            $this->load->view('attendance/attendance_tpl', $data);
        }
    }

    public function load_add_attendance_from()
    {
        $data['department'] = $this->Main_model->getValue("", 'master_department', '*', "ID DESC");
        $data['shift'] = $this->Main_model->getValue("", 'master_shift', '*', "ID DESC");
        $this->load->view('hr/attendance/attendance_from', $data);
    }

    public function create_attendance()
    {
        $total_fields = $this->input->post('total_num_of_fields');
        $emp_id = $this->input->post('emp_id');
        $present_date = $this->input->post('present_date');
        $in_time = $this->input->post('in_time');
        $out_time = $this->input->post('out_time');

        for ($i = 0; $i < $total_fields; $i++) {
            $data = array(
                'emp_id' => $emp_id[$i],
                'present_date' => $present_date,
                'in_time' => $in_time[$i],
                'out_time' => $out_time[$i]
            );
            $result = $this->Main_model->insertData($data, 'hr_attendance');
        }
        
        if ($result) {
            $msg['load_success_message'] = "Attendance info successfully added.";
            $this->load->view('messages/success_message', $msg);
        }
    }

    public function load_update_attendance_from($id)
    {
        $data['roster'] = $this->Main_model->getValue("id= '$id'", 'hr_assigning_roster', '*', "ID DESC");
        $this->load->view('hr/attendance/update_attendance_from', $data);
    }

    public function update_attendance()
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
        $data['emp_info'] = $this->Attendance_model->select_emp_info($department_id, $shift_id, $section_id);
        $this->load->view('hr/attendance/load_emp_info', $data);
    }
}

?>