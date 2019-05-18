<?php

class Result extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('exam/Result_model');
    }

    public function index()
    {
    }

    public function all_result()
    {
        $this->config->load('pagination');
        $this->load->library("pagination");
        $config = array();
        $config["base_url"] = base_url() . "exam/result/all_result";

        $student_id = $this->input->post('student_id');
        $class_id = $this->input->post('class_id');
        $shift_id = $this->input->post('shift_id');
        $section_id = $this->input->post('section_id');

        if ($student_id) {
            $config["total_rows"] = $this->Main_model->countByLikeCondition("student_id", $student_id, "exam_result");
        } else if ($class_id) {
            $config["total_rows"] = $this->Main_model->countByWhereCondition("class_id = '$class_id'", "exam_result");
        } else if ($shift_id) {
            $config["total_rows"] = $this->Main_model->countByWhereCondition("shift_id = '$shift_id'", "exam_result");
        } else if ($section_id) {
            $config["total_rows"] = $this->Main_model->countByWhereCondition("section_id = '$section_id'", "exam_result");
        } else {
            $config["total_rows"] = $this->Main_model->countAll('exam_result');
        }

        $config['per_page'] = 10;
        $config['uri_segment'] = 4;
        $config['num_links'] = 2;
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;


        if ($student_id) {
            $data["result"] = $this->Result_model->select_result_by_result_id($config["per_page"], $page, $student_id);
        } else if ($class_id) {
            $data["result"] = $this->Result_model->select_result_by_result_name($config["per_page"], $page, $class_id);
        } else if ($shift_id) {
            $data["result"] = $this->Result_model->select_result_by_class_id($config["per_page"], $page, $shift_id);
        } else {
            $data["result"] = $this->Result_model->select_all_result($config["per_page"], $page);
        }

        $data["links"] = $this->pagination->create_links();
        if ($this->input->is_ajax_request()) {
            $data['class'] = $this->Main_model->getValue("", 'master_class', '*', "ID DESC");
            $this->load->view('exam_result/per_page_result', $data);
        } else {
            $data['class'] = $this->Main_model->getValue("", 'master_class', '*', "ID DESC");
            $this->load->view('exam_result/result_tpl', $data);
        }
    }

    public function load_add_result_from()
    {
        $data['class'] = $this->Main_model->getValue("", 'master_class', '*', "ID DESC");
        $data['shift'] = $this->Main_model->getValue("", 'master_shift', '*', "ID DESC");
        $data['exam_name'] = $this->Main_model->getValue("", 'master_academic_exam', '*', "ID DESC");
        $data['study_group'] = $this->Main_model->getValue("", 'master_study_group', '*', "ID DESC");
        $data['year'] = $this->Main_model->getValue("", 'master_year', '*', "ID DESC");
        $this->load->view('exam/exam_result/add_result_from', $data);
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

    function select_subject($class_id)
    {
        $array = $this->Result_model->select_subject_by_class($class_id);
        $str = "";
        $str .= '<select name="subject_id" id="subject_id">
				<option value="">--- Select Section ---</option>';
        if (!empty($array)):
            foreach ($array as $row):
                $str .= '<option value="' . $row->id . '">' . $row->name . '</option>';
            endforeach;
        endif;
        $str .= '</select>';
        echo $str;
    }

    public function select_student_id()
    {
        $class_id = $this->input->post('class_id');
        $shift_id = $this->input->post('shift_id');
        $section_id = $this->input->post('section_id');
        $study_group_id = $this->input->post('study_group_id');
        $year = $this->input->post('year');

        $data['class_id'] = $this->input->post('class_id');
        $data['subject_id'] = $this->input->post('subject_id');
        $data['shift_id'] = $this->input->post('shift_id');
        $data['section_id'] = $this->input->post('section_id');
        $data['academic_exam_id'] = $this->input->post('academic_exam_id');
        $data['study_group_id'] = $this->input->post('study_group_id');
        $data['year'] = $this->input->post('year');
        $data['student_info'] = $this->Result_model->select_student_id($class_id, $shift_id, $section_id, $study_group_id, $year);
        $this->load->view('exam/exam_result/load_add_result_from', $data);
    }

    public function create_result()
    {
        $total_fields = $this->input->post('total_num_of_fields');
        $user_name = $this->session->userdata('user_name');
        $student_id = $this->input->post('student_id');
        $class_id = $this->input->post('class_id');
        $subject_id = $this->input->post('subject_id');
        $shift_id = $this->input->post('shift_id');
        $section_id = $this->input->post('section_id');
        $academic_exam_id = $this->input->post('academic_exam_id');
        $study_group_id = $this->input->post('study_group_id');
        $year = $this->input->post('year');
        $subjective_marks = $this->input->post('subjective_marks');
        $objective_marks = $this->input->post('objective_marks');
        $practical_marks = $this->input->post('practical_marks');

        for ($i = 0; $i < $total_fields; $i++) {
            $data = array(
                'student_id' => $student_id[$i],
                'class_id' => $class_id,
                'subject_id' => $subject_id,
                'shift_id' => $shift_id,
                'section_id' => $section_id,
                'academic_exam_id' => $academic_exam_id,
                'study_group_id' => $study_group_id,
                'year' => $year,
                'subjective_marks' => $subjective_marks[$i],
                'objective_marks' => $objective_marks[$i],
                'practical_marks' => $practical_marks[$i],
                'result_created_by' => $user_name,
                'activity_status' => 1,
                'activity_date' => date('Y-m-d')
            );
            $result = $this->Main_model->insertData($data, 'exam_result');
        }
        if ($result) {
            $msg['exam_result'] = "Result info successfully added.";
            $this->load->view('messages/success_message', $msg);
        }
    }

    public function load_update_result_from($id)
    {
        $data['class'] = $this->Main_model->getValue("", 'master_class', '*', "ID DESC");
        $data['subject'] = $this->Main_model->getValue("", 'master_subject', '*', "ID DESC");
        $data['shift'] = $this->Main_model->getValue("", 'master_shift', '*', "ID DESC");
        $data['exam_name'] = $this->Main_model->getValue("", 'master_academic_exam', '*', "ID DESC");
        $data['study_group'] = $this->Main_model->getValue("", 'master_study_group', '*', "ID DESC");
        $data['year'] = $this->Main_model->getValue("", 'master_year', '*', "ID DESC");
        $data['result'] = $this->Main_model->getValue("id = '$id'", 'exam_result', '*', "ID DESC");
        $this->load->view('exam/exam_result/update_result_from', $data);
    }

    public function update_result()
    {
        $id = $this->input->post('id');
        $user_name = $this->session->userdata('user_name');
        $data = array(
            'student_id' => $this->input->post('student_id'),
            'class_id' => $this->input->post('class_id'),
            'subject_id' => $this->input->post('subject_id'),
            'shift_id' => $this->input->post('shift_id'),
            'section_id' => $this->input->post('section_id'),
            'academic_exam_id' => $this->input->post('academic_exam_id'),
            'study_group_id' => $this->input->post('study_group_id'),
            'year' => $this->input->post('year'),
            'subjective_marks' => $this->input->post('subjective_marks'),
            'objective_marks' => $this->input->post('objective_marks'),
            'practical_marks' => $this->input->post('practical_marks'),
            'result_created_by' => $user_name,
            'activity_status' => 2,
            'activity_date' => date('Y-m-d')
        );
        $result = $this->Main_model->updateData($data, "exam_result", "id='$id'");
        if ($result) {
            $msg['exam_result'] = "Result info successfully updated.";
            $this->load->view('messages/success_message', $msg);
        }
    }

    public function load_details_result_from($id)
    {
        $data['result'] = $this->Result_model->select_result_by_id($id);
        $this->load->view('exam/exam_result/details_result_from', $data);
    }

    public function unblock_result($id)
    {
        $data = array(
            'block_status' => 1
        );
        $result = $this->Main_model->updateData($data, "exam_result", "id='$id'");
        if ($result) {
            echo "1";
        }
    }

    public function block_result($id)
    {
        $data = array(
            'block_status' => 0
        );
        $result = $this->Main_model->updateData($data, "exam_result", "id='$id'");
        if ($result) {
            echo "1";
        }
    }
}

?>