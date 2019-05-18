<?php

class Academic extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('hr/academic_model');
    }

    public function index()
    {
    }

    public function all_academic()
    {
        $this->config->load('pagination');
        $this->load->library("pagination");
        $config = array();
        $config["base_url"] = base_url() . "hr/academic/all_academic";

        $emp_id = $this->input->post('emp_id');
        $exam_name_id = $this->input->post('exam_name_id');
        $board_id = $this->input->post('board_id');
        $study_group_id = $this->input->post('study_group_id');

        if ($emp_id) {
            $result = $this->academic_model->countAllByLikeCondition("hr_academic.emp_id", $emp_id);
            $config["total_rows"] = $result->count_total_rows;
        } else if ($exam_name_id) {
            $result = $this->academic_model->countAllByWhereCondition("hr_academic.exam_name_id", $exam_name_id);
            $config["total_rows"] = $result->count_total_rows;
        } else if ($board_id) {
            $result = $this->academic_model->countAllByWhereCondition("hr_academic.board_id", $board_id);
            $config["total_rows"] = $result->count_total_rows;
        } else if ($study_group_id) {
            $result = $this->academic_model->countAllByWhereCondition("hr_academic.study_group_id", $study_group_id);
            $config["total_rows"] = $result->count_total_rows;
        } else {
            $result = $this->academic_model->countAll();
            $config["total_rows"] = $result->count_total_rows;
        }

        $config['per_page'] = 20;
        $config['uri_segment'] = 4;
        $config['num_links'] = 2;
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;

        if ($emp_id) {
            $data["academic"] = $this->academic_model->select_emp_academic_by_emp_id($config["per_page"], $page, $emp_id);
        } else if ($exam_name_id) {
            $data["academic"] = $this->academic_model->selectAcademicInfoByWhereCondition($config["per_page"], $page, "hr_academic.exam_name_id", $exam_name_id);
        } else if ($board_id) {
            $data["academic"] = $this->academic_model->selectAcademicInfoByWhereCondition($config["per_page"], $page, "hr_academic.board_id", $board_id);
        } else if ($study_group_id) {
            $data["academic"] = $this->academic_model->selectAcademicInfoByWhereCondition($config["per_page"], $page, "hr_academic.study_group_id", $study_group_id);
        } else {
            $data["academic"] = $this->academic_model->select_emp_academic($config["per_page"], $page);
        }

        $data["links"] = $this->pagination->create_links();
        if ($this->input->is_ajax_request()) {
            $data['study_group'] = $this->Main_model->getValue("", 'master_study_group', '*', "ID DESC");
            $data['board'] = $this->Main_model->getValue("", 'master_board', '*', "ID DESC");
            $data['exam_name'] = $this->Main_model->getValue("", 'master_exam_name', '*', "ID DESC");
            $this->load->view('academic/per_page_academic', $data);
        } else {
            $data['study_group'] = $this->Main_model->getValue("", 'master_study_group', '*', "ID DESC");
            $data['board'] = $this->Main_model->getValue("", 'master_board', '*', "ID DESC");
            $data['exam_name'] = $this->Main_model->getValue("", 'master_exam_name', '*', "ID DESC");
            $this->load->view('academic/academic_tpl', $data);
        }
    }

    public function load_add_academic_from()
    {
        $data['exam_degree'] = $this->Main_model->getValue("", 'master_exam_degree', '*', "ID DESC");
        $data['study_group'] = $this->Main_model->getValue("", 'master_study_group', '*', "ID DESC");
        $data['board'] = $this->Main_model->getValue("", 'master_board', '*', "ID DESC");
        $data['exam_name'] = $this->Main_model->getValue("", 'master_exam_name', '*', "ID DESC");
        $this->load->view('hr/academic/academic_from', $data);
    }

    public function create_academic()
    {
        $total_fields = $this->input->post('total_num_of_fields');
        $emp_id = $this->input->post('emp_id');
        $exam_degree_id = $this->input->post('exam_degree_id');
        $grade_marks = $this->input->post('grade_marks');
        $academic_session = $this->input->post('academic_session');
        $year_of_passing = $this->input->post('year_of_passing');
        $institute = $this->input->post('institute');
        $study_group_id = $this->input->post('study_group_id');
        $board_id = $this->input->post('board_id');
        $exam_name_id = $this->input->post('exam_name_id');

        for ($i = 0; $i < $total_fields; $i++) {
            $data['emp_id'] = $emp_id;
            $data['exam_degree_id'] = $exam_degree_id[$i];
            $data['grade_marks'] = $grade_marks[$i];
            $data['academic_session'] = $academic_session[$i];
            $data['year_of_passing'] = $year_of_passing[$i];
            $data['institute'] = $institute[$i];
            $data['study_group_id'] = $study_group_id[$i];
            $data['board_id'] = $board_id[$i];
            $data['exam_name_id'] = $exam_name_id[$i];
            $result = $this->Main_model->insertData($data, 'hr_academic');
        }
        if ($result) {
            $msg['load_success_message'] = "Academic info successfully added.";
            $this->load->view('messages/success_message', $msg);
        }
    }

    public function load_update_academic_from($id)
    {
        $data['exam_degree'] = $this->Main_model->getValue("", 'master_exam_degree', '*', "ID DESC");
        $data['study_group'] = $this->Main_model->getValue("", 'master_study_group', '*', "ID DESC");
        $data['board'] = $this->Main_model->getValue("", 'master_board', '*', "ID DESC");
        $data['exam_name'] = $this->Main_model->getValue("", 'master_exam_name', '*', "ID DESC");
        $data['academic'] = $this->Main_model->getValue("id= '$id'", 'hr_academic', '*', "ID DESC");
        $this->load->view('hr/academic/update_academic_from', $data);
    }

    public function update_academic()
    {
        $id = $this->input->post('id');
        $data = array(
            'emp_id' => $this->input->post('emp_id'),
            'exam_degree_id' => $this->input->post('exam_degree_id'),
            'grade_marks' => $this->input->post('grade_marks'),
            'academic_session' => $this->input->post('academic_session'),
            'year_of_passing' => $this->input->post('year_of_passing'),
            'institute' => $this->input->post('institute'),
            'study_group_id' => $this->input->post('study_group_id'),
            'board_id' => $this->input->post('board_id'),
            'exam_name_id' => $this->input->post('exam_name_id')
        );
        $result = $this->Main_model->updateData($data, "hr_academic", "id='$id'");
        if ($result) {
            $msg['load_success_message'] = "Emp academic info update successfully.";
            $this->load->view('messages/success_message', $msg);
        }
    }
}

?>