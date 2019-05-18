<?php

class Student_info extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('admission/Student_info_model');
    }

    public function index()
    {
    }

    public function all_student()
    {
        $this->config->load('pagination');
        $this->load->library("pagination");
        $config = array();
        $config["base_url"] = base_url() . "admission/student_info/all_student";
        $student_id = $this->input->post('student_id');
        $student_name = $this->input->post('student_name');
        $class_id = $this->input->post('class_id');

        if ($student_id) {
            $result = $this->Student_info_model->countAllByWhereCondition("academic_studentinfo.student_id", $student_id);
            $config["total_rows"] = $result->count_total_rows;
        } else if ($student_name) {
            $result = $this->Student_info_model->countAllByLikeCondition("academic_studentinfo.student_name", $student_name);
            $config["total_rows"] = $result->count_total_rows;
        } else if ($class_id) {
            $result = $this->Student_info_model->countAllByWhereCondition("academic_studentinfo.class_id", $class_id);
            $config["total_rows"] = $result->count_total_rows;
        } else {
            $result = $this->Student_info_model->countAll();
            $config["total_rows"] = $result->count_total_rows;
        }

        $config['per_page'] = 10;
        $config['uri_segment'] = 4;
        $config['num_links'] = 2;
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;


        if ($student_id) {
            $data["active_student"] = $this->Student_info_model->select_student_info_by_student_id($config["per_page"], $page, $student_id);
        } else if ($student_name) {
            $data["active_student"] = $this->Student_info_model->select_student_info_by_student_name($config["per_page"], $page, $student_name);
        } else if ($class_id) {
            $data["active_student"] = $this->Student_info_model->select_student_info_by_class_id($config["per_page"], $page, $class_id);
        } else {
            $data["active_student"] = $this->Student_info_model->select_all_active_student($config["per_page"], $page);
        }

        $data["links"] = $this->pagination->create_links();
        if ($this->input->is_ajax_request()) {
            $data['class'] = $this->Main_model->getValue("", 'master_class', '*', "ID DESC");
            $this->load->view('active_student/per_page_active_student', $data);
        } else {
            $data['class'] = $this->Main_model->getValue("", 'master_class', '*', "ID DESC");
            $this->load->view('active_student/active_student_tpl', $data);
        }
    }

    public function student_active($id)
    {
        $data = array(
            'status' => 1
        );
        $result = $this->Main_model->updateData($data, "academic_studentinfo", "id='$id'");
        if ($result) {
            echo "1";
        }
    }

    public function student_inactive($id)
    {
        $data = array(
            'status' => 0
        );
        $result = $this->Main_model->updateData($data, "academic_studentinfo", "id='$id'");
        if ($result) {
            echo "1";
        }
    }

    public function load_add_student_from()
    {
        $data['class'] = $this->Main_model->getValue("", 'master_class', '*', "ID DESC");
        $data['study_group'] = $this->Main_model->getValue("", 'master_study_group', '*', "ID DESC");
        $data['shift'] = $this->Main_model->getValue("", 'master_shift', '*', "ID DESC");
        $data['exam_name'] = $this->Main_model->getValue("", 'master_exam_name', '*', "ID DESC");
        $data['subject'] = $this->Main_model->getValue("status='2'", 'master_subject', '*', "ID DESC");
        $data['gender'] = $this->Main_model->getValue("", 'master_gender', '*', "ID DESC");
        $data['religion'] = $this->Main_model->getValue("", 'master_religion', '*', "ID DESC");
        $data['blood_group'] = $this->Main_model->getValue("", 'master_blood_group', '*', "ID DESC");
        $this->load->view('admission/active_student/add_student_from', $data);
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

    public function create_student()
    {
        $user_name = $this->session->userdata('user_name');
        $data = array(
            'student_id' => $this->input->post('student_id'),
            'student_name' => $this->input->post('student_name'),
            'class_id' => $this->input->post('class_id'),
            'study_group_id' => $this->input->post('study_group_id'),
            'shift_id' => $this->input->post('shift_id'),
            'section_id' => $this->input->post('section_id'),
            'fourth_subject_id' => $this->input->post('fourth_subject_id'),
            'gender_id' => $this->input->post('gender_id'),
            'religion_id' => $this->input->post('religion_id'),
            'nationality' => $this->input->post('nationality'),
            'date_of_birth' => $this->input->post('date_of_birth'),
            'blood_group_id' => $this->input->post('blood_group_id'),
            'present_address' => $this->input->post('present_address'),
            'permanent_address' => $this->input->post('permanent_address'),
            'student_mobile_no' => $this->input->post('student_mobile_no'),
            'student_email' => $this->input->post('student_email'),
            'father_name' => $this->input->post('father_name'),
            'father_occupation' => $this->input->post('father_occupation'),
            'father_nid' => $this->input->post('father_nid'),
            'father_mobile_no' => $this->input->post('father_mobile_no'),
            'father_email' => $this->input->post('father_email'),
            'mother_name' => $this->input->post('mother_name'),
            'mother_occupation' => $this->input->post('mother_occupation'),
            'mother_nid' => $this->input->post('mother_nid'),
            'mother_mobile_no' => $this->input->post('mother_mobile_no'),
            'mother_email' => $this->input->post('mother_email'),
            'guardian_type' => $this->input->post('guardian_type'),
            'previous_school_name' => $this->input->post('previous_school_name'),
            'tc' => $this->input->post('tc'),
            'guardian_name' => $this->input->post('guardian_name'),
            'guardian_nid' => $this->input->post('guardian_nid'),
            'guardian_email' => $this->input->post('guardian_email'),
            'guardian_mobile_no' => $this->input->post('guardian_mobile_no'),
            'guardian_address' => $this->input->post('guardian_address'),
            'guardian_occupation' => $this->input->post('guardian_occupation'),
            'relation_with_student' => $this->input->post('relation_with_student'),
            'status	' => '1',
            'admission_date	' => date('Y-m-d'),
            'admission_by	' => $user_name
        );
        $data1 = array();
        if (!empty($_FILES)) {
            $config['upload_path'] = 'public/student_picture';
            $config['allowed_types'] = 'jpg|png|docx|doc|pdf';
            $config['max_size'] = 10000000;
            $config['max_width'] = 10000024;
            $config['max_height'] = 10000000;
            $config['file_name'] = date('d-m-Y') . '_' . time();
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('picture')) {
                $this->upload->display_errors();
            } else {
                $recipe_file = $this->upload->data();
                $file = $recipe_file['file_name'];
                $data1 = array(
                    'picture' => $file
                );
            }
        }
        $result = array_merge($data, $data1);
        $result = $this->Main_model->insertData($result, 'academic_studentinfo');
        if ($result) {
            $msg['load_success_message'] = "Student info successfully added.";
            $this->load->view('messages/success_message', $msg);
        }
    }

    public function load_update_student_from($id)
    {
        $data['class'] = $this->Main_model->getValue("", 'master_class', '*', "ID DESC");
        $data['study_group'] = $this->Main_model->getValue("", 'master_study_group', '*', "ID DESC");
        $data['shift'] = $this->Main_model->getValue("", 'master_shift', '*', "ID DESC");
        $data['exam_name'] = $this->Main_model->getValue("", 'master_exam_name', '*', "ID DESC");
        $data['subject'] = $this->Main_model->getValue("status='2'", 'master_subject', '*', "ID DESC");
        $data['gender'] = $this->Main_model->getValue("", 'master_gender', '*', "ID DESC");
        $data['religion'] = $this->Main_model->getValue("", 'master_religion', '*', "ID DESC");
        $data['blood_group'] = $this->Main_model->getValue("", 'master_blood_group', '*', "ID DESC");
        $data['student_data'] = $this->Main_model->getValue("id = '$id'", 'academic_studentinfo', '*', "ID DESC");
        $this->load->view('admission/active_student/update_student_from', $data);
    }

    public function update_student()
    {
        $id = $this->input->post('id');
        $old_picture = $this->input->post('old_picture');
        $data = array(
            'student_id' => $this->input->post('student_id'),
            'student_name' => $this->input->post('student_name'),
            'class_id' => $this->input->post('class_id'),
            'study_group_id' => $this->input->post('study_group_id'),
            'shift_id' => $this->input->post('shift_id'),
            'section_id' => $this->input->post('section_id'),
            'fourth_subject_id' => $this->input->post('fourth_subject_id'),
            'gender_id' => $this->input->post('gender_id'),
            'religion_id' => $this->input->post('religion_id'),
            'nationality' => $this->input->post('nationality'),
            'date_of_birth' => $this->input->post('date_of_birth'),
            'blood_group_id' => $this->input->post('blood_group_id'),
            'present_address' => $this->input->post('present_address'),
            'permanent_address' => $this->input->post('permanent_address'),
            'student_mobile_no' => $this->input->post('student_mobile_no'),
            'student_email' => $this->input->post('student_email'),
            'father_name' => $this->input->post('father_name'),
            'father_occupation' => $this->input->post('father_occupation'),
            'father_nid' => $this->input->post('father_nid'),
            'father_mobile_no' => $this->input->post('father_mobile_no'),
            'father_email' => $this->input->post('father_email'),
            'mother_name' => $this->input->post('mother_name'),
            'mother_occupation' => $this->input->post('mother_occupation'),
            'mother_nid' => $this->input->post('mother_nid'),
            'mother_mobile_no' => $this->input->post('mother_mobile_no'),
            'mother_email' => $this->input->post('mother_email'),
            'guardian_type' => $this->input->post('guardian_type'),
            'previous_school_name' => $this->input->post('previous_school_name'),
            'tc' => $this->input->post('tc'),
            'guardian_name' => $this->input->post('guardian_name'),
            'guardian_nid' => $this->input->post('guardian_nid'),
            'guardian_email' => $this->input->post('guardian_email'),
            'guardian_mobile_no' => $this->input->post('guardian_mobile_no'),
            'guardian_address' => $this->input->post('guardian_address'),
            'guardian_occupation' => $this->input->post('guardian_occupation'),
            'relation_with_student' => $this->input->post('relation_with_student'),
            'status	' => '1'
        );
        $data1 = array();
        if (!empty($_FILES)) {
            $config['upload_path'] = 'public/student_picture';
            $config['allowed_types'] = 'jpg|png|docx|doc|pdf';
            $config['max_size'] = 100000;
            $config['max_width'] = 100024;
            $config['max_height'] = 100000;
            $config['file_name'] = date('d-m-Y') . '_' . time();
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('picture')) {
                $this->upload->display_errors();
            } else {
                if ($old_picture) {
                    $dir = realpath('public/student_picture/' . $old_picture);
                    if (file_exists($dir)) {
                        unlink($dir);
                    }
                }
                $recipe_file = $this->upload->data();
                $file = $recipe_file['file_name'];
                $data1 = array(
                    'picture' => $file
                );
            }
        }
        $result = array_merge($data, $data1);
        $result1 = $this->Main_model->updateData($result, "academic_studentinfo", "id='$id'");
        if ($result1) {
            $msg['load_success_message'] = "Student info successfully updated.";
            $this->load->view('messages/success_message', $msg);
        }
    }

    public function load_details_student_from($id)
    {
        $data['student_info'] = $this->Student_info_model->select_student_info_by_id($id);
        $this->load->view('admission/active_student/details_student_from', $data);
    }

    public function select_student_id()
    {
        $class_id = $this->input->post('class_id');
        $shift_id = $this->input->post('shift_id');
        $section_id = $this->input->post('section_id');

        $result = $this->Student_info_model->select_last_student_id($class_id, $shift_id, $section_id);
        if ($result) {
            echo $result->student_id + 1;
        } else {
            if ($class_id == 1) {
                $set_id = "01";
            } else if ($class_id == 2) {
                $set_id = "02";
            } else if ($class_id == 3) {
                $set_id = "03";
            } else if ($class_id == 4) {
                $set_id = "04";
            } else if ($class_id == 5) {
                $set_id = "05";
            } else if ($class_id == 6) {
                $set_id = "06";
            } else if ($class_id == 7) {
                $set_id = "07";
            } else if ($class_id == 8) {
                $set_id = "08";
            } else if ($class_id == 9) {
                $set_id = "09";
            } else {
                $set_id = $class_id;
            }
            $get_year = date('Y');
            $set_year = substr($get_year, 2, 2);
            echo $student_id = $set_year . "" . $set_id . "001";
        }
    }
}

?>