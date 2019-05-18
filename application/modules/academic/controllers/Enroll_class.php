<?php

class Enroll_class extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('academic/Enroll_class_model');
    }

    public function index()
    {
    }

    public function all_enroll_class()
    {
        $this->config->load('pagination');
        $this->load->library("pagination");
        $config = array();
        $config["base_url"] = base_url() . "academic/enroll_class/all_enroll_class";

        $student_id = $this->input->post('student_id');
        $class_id = $this->input->post('class_id');
        $shift_id = $this->input->post('shift_id');
        $section_id = $this->input->post('section_id');

        if ($student_id) {
            $config["total_rows"] = $this->Main_model->countByLikeCondition("student_id", $student_id, "academic_enroll_class");
        } else if ($class_id) {
            $config["total_rows"] = $this->Main_model->countByWhereCondition("class_id = '$class_id'", "academic_enroll_class");
        } else if ($shift_id) {
            $config["total_rows"] = $this->Main_model->countByWhereCondition("shift_id = '$shift_id'", "academic_enroll_class");
        } else if ($section_id) {
            $config["total_rows"] = $this->Main_model->countByWhereCondition("section_id = '$section_id'", "academic_enroll_class");
        } else {
            $config["total_rows"] = $this->Main_model->countAll('academic_enroll_class');
        }

        $config['per_page'] = 20;
        $config['uri_segment'] = 4;
        $config['num_links'] = 2;
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;

        if ($student_id) {
            $data["enroll_class"] = $this->Enroll_class_model->select_enroll_class_by_student_id($config["per_page"], $page, $student_id);
        } else if ($class_id) {
            $data["enroll_class"] = $this->Enroll_class_model->select_enroll_class_by_class_id($config["per_page"], $page, $class_id);
        } else if ($shift_id) {
            $data["enroll_class"] = $this->Enroll_class_model->select_enroll_class_by_shift_id($config["per_page"], $page, $shift_id);
        } else if ($section_id) {
            $data["enroll_class"] = $this->Enroll_class_model->select_enroll_class_by_section_id($config["per_page"], $page, $section_id);
        } else {
            $data["enroll_class"] = $this->Enroll_class_model->select_enroll_class($config["per_page"], $page);
        }

        $data["links"] = $this->pagination->create_links();
        if ($this->input->is_ajax_request()) {
            $this->load->view('enroll_class/per_page_enroll_class', $data);
        } else {
            $this->load->view('enroll_class/enroll_class_tpl', $data);
        }
    }

    public function load_add_enroll_class_from()
    {
        $data['class'] = $this->Main_model->getValue("", 'master_class', '*', "ID DESC");
        $this->load->view('academic/enroll_class/add_enroll_class_from', $data);
    }

    public function load_student_list()
    {
        $class_id = $this->input->post('class_id');
        $type = $this->input->post('type');
        if ($type==1){
            $data['student_info'] = $this->Enroll_class_model->select_student_by_class_id($class_id);
            $this->load->view('academic/enroll_class/load_student_list', $data);
        }else{
//            $data['student_info'] = $this->Enroll_class_model->getValue("class_id='$class_id'", 'academic_studentinfo', '*', "ID DESC");
        }

    }

    public function create_enroll_class()
    {
        $total_fields = $this->input->post('total_num_of_fields');
        $student_id = $this->input->post('student_id');
        $class_roll = $this->input->post('class_roll');
        $class_id = $this->input->post('class_id');
        $shift_id = $this->input->post('shift_id');
        $section_id = $this->input->post('section_id');
        $study_group_id = $this->input->post('study_group_id');
        $year = $this->input->post('year');
        for ($i = 0; $i < $total_fields; $i++) {
            $data['student_id'] = $student_id[$i];
            $data['class_roll'] = $class_roll[$i];
            $data['class_id'] = $class_id[$i];
            $data['shift_id'] = $shift_id[$i];
            $data['section_id'] = $section_id[$i];
            $data['study_group_id'] = $study_group_id[$i];
            $data['year'] = $year[$i];
            $data['status'] = 1;
            $result = $this->Main_model->insertData($data, 'academic_enroll_class');
        }
        if ($result) {
            $msg['add_enroll_class'] = "Enroll class successfully added.";
            $this->load->view('messages/success_message', $msg);
        }
    }

    public function load_update_enroll_class_from($id)
    {
        $data['enroll_class'] = $this->Main_model->getValue("id='$id'", 'academic_enroll_class', '*', "ID DESC");
        $data['class'] = $this->Main_model->getValue("", 'master_class', '*', "ID DESC");
        $data['shift'] = $this->Main_model->getValue("", 'master_shift', '*', "ID DESC");
        $data['section'] = $this->Main_model->getValue("", 'master_section', '*', "ID DESC");
        $data['year'] = $this->Main_model->getValue("", 'master_year', '*', "ID DESC");
        $this->load->view('academic/enroll_class/update_enroll_class_from', $data);
    }

    public function update_enroll_class()
    {
        $id = $this->input->post('id');
        $data = array(
            'student_id' => $this->input->post('student_id'),
            'class_roll' => $this->input->post('class_roll'),
            'class_id' => $this->input->post('class_id'),
            'shift_id' => $this->input->post('shift_id'),
            'section_id' => $this->input->post('section_id'),
            'year' => $this->input->post('year'),
            'status' => 1
        );

        $result = $this->Main_model->updateData($data, "academic_enroll_class", "id='$id'");
        if ($result) {
            $msg['add_enroll_class'] = "Enroll class successfully updated.";
            $this->load->view('messages/success_message', $msg);
        }
    }

    public function enroll_class_active($id)
    {
        $data = array(
            'status' => 1
        );
        $result = $this->Main_model->updateData($data, "academic_enroll_class", "id='$id'");
        if ($result) {
            echo "1";
        }
    }

    public function enroll_class_inactive($id)
    {
        $data = array(
            'status' => 0
        );
        $result = $this->Main_model->updateData($data, "academic_enroll_class", "id='$id'");
        if ($result) {
            echo "1";
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
}

?>