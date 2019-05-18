<?php

class Teacher extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('academic/Teacher_model');
    }

    public function index()
    {
    }

    public function all_teacher()
    {
        $this->config->load('pagination');
        $this->load->library("pagination");
        $config = array();
        $config["base_url"] = base_url() . "academic/teacher/all_teacher";

        $emp_id = $this->input->post('emp_id');
        $emp_name = $this->input->post('emp_name');

        if ($emp_id) {
            $result = $this->Teacher_model->countAllByLikeCondition("hr_basic.emp_id", $emp_id);
            $config["total_rows"] = $result->count_total_rows;
        } else if ($emp_name) {
            $result = $this->Teacher_model->countAllByLikeCondition("hr_basic.emp_id", $emp_name);
            $config["total_rows"] = $result->count_total_rows;
        } else {
            $result = $this->Teacher_model->countAll();
            $config["total_rows"] = $result->count_total_rows;
        }

        $config['per_page'] = 10;
        $config['uri_segment'] = 4;
        $config['num_links'] = 2;
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;

        if ($emp_id) {
            $data["teacher"] = $this->Teacher_model->select_teacher_by_id($config["per_page"], $page, $emp_id);
        } else if ($emp_name) {
            $data["teacher"] = $this->Teacher_model->select_teacher_by_name($config["per_page"], $page, $emp_name);
        } else {
            $data["teacher"] = $this->Teacher_model->select_teacher($config["per_page"], $page);
        }

        $data["links"] = $this->pagination->create_links();
        if ($this->input->is_ajax_request()) {
            $this->load->view('teacher/per_page_teacher', $data);
        } else {
            $this->load->view('teacher/teacher_tpl', $data);
        }
    }


    public function load_details_teacher_from($emp_id)
    {
        $data['basic'] = $this->Teacher_model->select_basic_by_emp_id($emp_id);
        $data['job'] = $this->Teacher_model->select_job_by_emp_id($emp_id);
        $data['job_posting'] = $this->Teacher_model->select_job_posting_by_emp_id($emp_id);
        $data['family'] = $this->Teacher_model->select_family_by_emp_id($emp_id);
        $data['child'] = $this->Teacher_model->select_child_by_emp_id($emp_id);
        $data['academic'] = $this->Teacher_model->select_academic_by_emp_id($emp_id);
        $data['ward_and_honours'] = $this->Teacher_model->select_ward_and_honours_by_emp_id($emp_id);
        $data['co_curricular_activities'] = $this->Teacher_model->select_co_curricular_activities_by_emp_id($emp_id);
        $data['experience'] = $this->Teacher_model->select_experience_by_emp_id($emp_id);
        $data['nominee'] = $this->Teacher_model->select_nominee_by_emp_id($emp_id);
        $data['previous_job_history'] = $this->Teacher_model->select_previous_job_history_by_emp_id($emp_id);
        $data['reference'] = $this->Teacher_model->select_reference_by_emp_id($emp_id);
        $data['research_and_publication'] = $this->Teacher_model->select_research_and_publication_by_emp_id($emp_id);
        $data['training'] = $this->Teacher_model->select_training_by_emp_id($emp_id);
        $data['contact'] = $this->Teacher_model->select_contact_by_emp_id($emp_id);
        $data['contact1'] = $this->Teacher_model->select_contact_by_emp_id1($emp_id);
        $this->load->view('academic/teacher/details_teacher_from', $data);
    }

    public function load_class_teacher_from($teacher_id)
    {
        $result = $this->Teacher_model->check_class_teacher($teacher_id);
        $data['teacher_id'] = $teacher_id;
        $data['year'] = $this->Main_model->getValue("", 'master_year', '*', "ID DESC");
        $data['class'] = $this->Main_model->getValue("", 'master_class', '*', "ID DESC");
        if ($result) {
            $data['update_data'] = $result;
            $this->load->view('academic/teacher/update_class_teacher_from', $data);
        } else {
            $this->load->view('academic/teacher/add_class_teacher_from', $data);
        }
    }

    public function create_class_teacher()
    {
        $data = array(
            'teacher_id' => $this->input->post('teacher_id'),
            'year' => $this->input->post('year'),
            'class_id' => $this->input->post('class_id'),
            'from_date' => $this->input->post('from_date'),
            'to_date' => $this->input->post('to_date'),
            'status	' => '1'
        );

        $result = $this->Main_model->insertData($data, 'academic_class_teacher');
        if ($result) {
            $msg['add_class_teacher'] = "Class Teacher successfully added.";
            $this->load->view('messages/success_message', $msg);
        }
    }

    public function update_class_teacher()
    {
        $id = $this->input->post('id');
        $data = array(
            'teacher_id' => $this->input->post('teacher_id'),
            'year' => $this->input->post('year'),
            'class_id' => $this->input->post('class_id'),
            'from_date' => $this->input->post('from_date'),
            'to_date' => $this->input->post('to_date'),
            'status	' => '1'
        );

        $result = $this->Main_model->updateData($data, "academic_class_teacher", "id='$id'");
        if ($result) {
            $msg['add_class_teacher'] = "Class Teacher successfully updated.";
            $this->load->view('messages/success_message', $msg);
        }
    }


    public function load_subject_teacher_from($teacher_id)
    {
        $data['teacher_id'] = $teacher_id;
        $data['subject'] = $this->Main_model->getValue("", 'master_subject', '*', "ID DESC");
        $data['class'] = $this->Main_model->getValue("", 'master_class', '*', "ID DESC");
        $data['shift'] = $this->Main_model->getValue("", 'master_shift', '*', "ID DESC");
        $this->load->view('academic/teacher/add_subject_teacher_from', $data);
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

    public function check_duplicate_data()
    {
        $teacher_id = $this->input->post('teacher_id');
        $class_id = $this->input->post('class_id');
        $subject_id = $this->input->post('subject_id');
        $shift_id = $this->input->post('shift_id');
        $section_id = $this->input->post('section_id');
        $from_date = $this->input->post('from_date');
        $year = substr($from_date,0,4);

        $result = $this->Teacher_model->check_duplicate_data($teacher_id,$class_id,$subject_id,$shift_id,$section_id,$year);
        if ($result) {
            echo "<span style='color: red; font-size: 12px;'>This teacher id already exit !!!</span>";
        } else {
            echo "";
        }
    }
    public function create_subject_teacher()
    {
        $from_date = $this->input->post('from_date');
        $year = substr($from_date,0,4);
        $data = array(
            'teacher_id' => $this->input->post('teacher_id'),
            'class_id' => $this->input->post('class_id'),
            'subject_id' => $this->input->post('subject_id'),
            'shift_id' => $this->input->post('shift_id'),
            'section_id' => $this->input->post('section_id'),
            'year' => $year,
            'from_date' => $this->input->post('from_date'),
            'to_date' => $this->input->post('to_date'),
            'status	' => '1'
        );
        $result = $this->Main_model->insertData($data, 'academic_subject_teacher');
        if ($result) {
            $msg['add_subject_teacher'] = "Subject Teacher successfully added.";
            $this->load->view('messages/success_message', $msg);
        }
    }
}

?>