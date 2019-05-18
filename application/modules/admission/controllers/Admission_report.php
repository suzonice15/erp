<?php

class Admission_report extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('admission/Admission_report_model');
    }

    public function index()
    {
    }

    public function all_admission_report()
    {
        $data['class'] = $this->Main_model->getValue("", "master_class", "*", "ID DESC");
        $data['study_group'] = $this->Main_model->getValue("", "master_study_group", "*", "ID DESC");
        $data['shift'] = $this->Main_model->getValue("", "master_shift", "*", "ID DESC");
        $data['section'] = $this->Main_model->getValue("", "master_section", "*", "ID DESC");
        $data['gender'] = $this->Main_model->getValue("", "master_gender", "*", "ID DESC");
        $data['religion'] = $this->Main_model->getValue("", "master_religion", "*", "ID DESC");
        $data['blood_group'] = $this->Main_model->getValue("", "master_blood_group", "*", "ID DESC");
        $data['user_name'] = $this->Main_model->getValue("", "master_user", "*", "ID DESC");
        $data['year'] = $this->Main_model->getValue("", "master_year", "*", "ID DESC");
        $this->load->view('report/report_tpl', $data);
    }

    public function view_admission_report()
    {
        $class_id = $this->input->post('class_id');
        $study_group_id = $this->input->post('study_group_id');
        $shift_id = $this->input->post('shift_id');
        $section_id = $this->input->post('section_id');
        $year = $this->input->post('year');
        $gender_id = $this->input->post('gender_id');
        $religion_id = $this->input->post('religion_id');
        $blood_group_id = $this->input->post('blood_group_id');
        $status = $this->input->post('status');
        $user_name = $this->input->post('user_name');

        $data['class_id'] = $this->input->post('class_id');
        $data['study_group_id'] = $this->input->post('study_group_id');
        $data['shift_id'] = $this->input->post('shift_id');
        $data['section_id'] = $this->input->post('section_id');
        $data['year'] = $this->input->post('year');
        $data['gender_id'] = $this->input->post('gender_id');
        $data['religion_id'] = $this->input->post('religion_id');
        $data['blood_group_id'] = $this->input->post('blood_group_id');
        $data['status'] = $this->input->post('status');
        $data['user_name'] = $this->input->post('user_name');
        $data['admission_report'] = $this->Admission_report_model->select_all($class_id, $study_group_id, $shift_id, $section_id, $year, $gender_id, $religion_id, $blood_group_id, $status, $user_name);
        $this->load->view('admission/report/view_admission_report', $data);
    }


    public function create_excel()
    {
        $class_id = $this->input->post('class_id');
        $study_group_id = $this->input->post('study_group_id');
        $shift_id = $this->input->post('shift_id');
        $section_id = $this->input->post('section_id');
        $year = $this->input->post('year');
        $gender_id = $this->input->post('gender_id');
        $religion_id = $this->input->post('religion_id');
        $blood_group_id = $this->input->post('blood_group_id');
        $status = $this->input->post('status');
        $user_name = $this->input->post('user_name');
        $data['admission_report'] = $this->Admission_report_model->select_all($class_id, $study_group_id, $shift_id, $section_id, $year, $gender_id, $religion_id, $blood_group_id, $status, $user_name);
        $this->load->view('admission/report/view_admission_report_excel', $data);
    }

    function select_section($shift_id)
    {
        $array = $this->Main_model->getValue("shift_id = '$shift_id'", 'master_section', '*', "ID DESC");
        $str = "";
        $str .= '<select name="section_id" id="section_id" class="section_id">
				<option value="">--- Select Section ---</option>';
        if (!empty($array)):
            foreach ($array as $row):
                $str .= '<option value="' . $row->id . '">' . $row->section_name . '</option>';
            endforeach;
        endif;
        $str .= '</select>';
        echo $str;
    }
}

?>