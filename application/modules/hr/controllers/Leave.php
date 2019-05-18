<?php

class Leave extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('hr/leave_model');
    }

    public function index()
    {
    }

    public function all_leave()
    {
        $role_id = $this->session->userdata("role_id");
        $user_name = $this->session->userdata("user_name");
        $dept_id = $this->session->userdata("department_id");

        $this->config->load('pagination');
        $this->load->library("pagination");
        $config = array();
        $config["base_url"] = base_url() . "hr/leave/all_leave";

        $emp_id = $this->input->post('emp_id');
        $department_id = $this->input->post('department_id');
        $leave_type_id = $this->input->post('leave_type_id');
        $from_date = $this->input->post('from_date');
        $to_date = $this->input->post('to_date');

        if ($emp_id) {
            if ($role_id == 1) {
                $result = $this->leave_model->countAllByLikeCondition("hr_leave.emp_id", $emp_id);
                $config["total_rows"] = $result->count_total_rows;
            } else if ($role_id == 6) {
                $result = $this->leave_model->countAllByLikeConditionStatus("hr_leave.emp_id", $emp_id, 6);
                $config["total_rows"] = $result->count_total_rows;
            } else if ($role_id == 5) {
                $result = $this->leave_model->countAllByLikeConditionStatus("hr_leave.emp_id", $emp_id, 5);
                $config["total_rows"] = $result->count_total_rows;
            } else {
                $result = $this->leave_model->countAllByDepartmentAndEmpId($emp_id, $dept_id);
                $config["total_rows"] = $result->count_total_rows;
            }
        } else if ($department_id) {
            if ($role_id == 6) {
                $result = $this->leave_model->countAllByWhereConditionWithJoinStatus($department_id, 6);
                $config["total_rows"] = $result->count_total_rows;
            } else if ($role_id == 5) {
                $result = $this->leave_model->countAllByWhereConditionWithJoinStatus($department_id, 5);
                $config["total_rows"] = $result->count_total_rows;
            } else {
                $result = $this->leave_model->countAllByWhereConditionWithJoin($department_id);
                $config["total_rows"] = $result->count_total_rows;
            }

        } else if ($leave_type_id) {
            if ($role_id == 1) {
                $result = $this->leave_model->countAllByWhereCondition("hr_leave.leave_type_id", $leave_type_id, "");
                $config["total_rows"] = $result->count_total_rows;
            } else if ($role_id == 6) {
                $result = $this->leave_model->countAllByWhereConditionStatus("hr_leave.leave_type_id", $leave_type_id, 6);
                $config["total_rows"] = $result->count_total_rows;
            } else if ($role_id == 5) {
                $result = $this->leave_model->countAllByWhereConditionStatus("hr_leave.leave_type_id", $leave_type_id, 5);
                $config["total_rows"] = $result->count_total_rows;
            } else if ($role_id == 3) {
                $result = $this->leave_model->countAllByLeaveAndDepartment($leave_type_id, $dept_id);
                $config["total_rows"] = $result->count_total_rows;
            } else {
                $result = $this->leave_model->countAllByWhereCondition("hr_leave.leave_type_id", $leave_type_id, $user_name);
                $config["total_rows"] = $result->count_total_rows;
            }
        } else if ($from_date && $to_date) {
            if ($role_id == 1) {
                $result = $this->leave_model->countAllByBetweenCondition($from_date, $to_date, "");
                $config["total_rows"] = $result->count_total_rows;
            } else if ($role_id == 6) {
                $result = $this->leave_model->countAllByBetweenConditionStatus($from_date, $to_date,6);
                $config["total_rows"] = $result->count_total_rows;
            } else if ($role_id == 5) {
                $result = $this->leave_model->countAllByBetweenConditionStatus($from_date, $to_date,5);
                $config["total_rows"] = $result->count_total_rows;
            } else if ($role_id == 3) {
                $result = $this->leave_model->countAllByBetweenConditionAndDepartment($from_date, $to_date, $dept_id);
                $config["total_rows"] = $result->count_total_rows;
            } else {
                $result = $this->leave_model->countAllByBetweenCondition($from_date, $to_date, $user_name);
                $config["total_rows"] = $result->count_total_rows;
            }
        } else {
            if ($role_id == 1) {
                $result = $this->leave_model->countAll("");
                $config["total_rows"] = $result->count_total_rows;
            } else if ($role_id == 3) {
                $result = $this->leave_model->countAllByDepartment($dept_id);
                $config["total_rows"] = $result->count_total_rows;
            } else if ($role_id == 6) {
                $result = $this->leave_model->countAllByGM();
                $config["total_rows"] = $result->count_total_rows;
            } else if ($role_id == 5) {
                $result = $this->leave_model->countAllByMD();
                $config["total_rows"] = $result->count_total_rows;
            } else {
                $result = $this->leave_model->countAll($user_name);
                $config["total_rows"] = $result->count_total_rows;
            }
        }

        $config['per_page'] = 20;
        $config['uri_segment'] = 4;
        $config['num_links'] = 2;
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;

        if ($emp_id) {
            if ($role_id == 1) {
                $data["leave"] = $this->leave_model->select_emp_leave_by_emp_id($config["per_page"], $page, $emp_id);
            } else if ($role_id == 6) {
                $data["leave"] = $this->leave_model->select_emp_leave_by_emp_id_status($config["per_page"], $page, $emp_id, 6);
            } else if ($role_id == 5) {
                $data["leave"] = $this->leave_model->select_emp_leave_by_emp_id_status($config["per_page"], $page, $emp_id, 5);
            } else {
                $data["leave"] = $this->leave_model->select_emp_leave_by_emp_id_and_department($config["per_page"], $page, $emp_id, $dept_id);
            }
        } else if ($department_id) {
            if ($role_id == 6) {
                $data["leave"] = $this->leave_model->select_emp_leave_by_department_id_status($config["per_page"], $page, $department_id, 6);
            } else if ($role_id == 5) {
                $data["leave"] = $this->leave_model->select_emp_leave_by_department_id_status($config["per_page"], $page, $department_id, 5);
            } else {
                $data["leave"] = $this->leave_model->select_emp_leave_by_department_id($config["per_page"], $page, $department_id);
            }

        } else if ($leave_type_id) {
            if ($role_id == 1) {
                $data["leave"] = $this->leave_model->select_emp_leave_by_leave_type_id($config["per_page"], $page, "hr_leave.leave_type_id", $leave_type_id, "");
            } else if ($role_id == 6) {
                $data["leave"] = $this->leave_model->select_emp_leave_by_leave_type_id_status($config["per_page"], $page, "hr_leave.leave_type_id", $leave_type_id, 6);
            } else if ($role_id == 5) {
                $data["leave"] = $this->leave_model->select_emp_leave_by_leave_type_id_status($config["per_page"], $page, "hr_leave.leave_type_id", $leave_type_id, 5);
            } else if ($role_id == 3) {
                $data["leave"] = $this->leave_model->select_emp_leave_by_leave_type_and_department($config["per_page"], $page, $leave_type_id, $dept_id);
            } else {
                $data["leave"] = $this->leave_model->select_emp_leave_by_leave_type_id($config["per_page"], $page, "hr_leave.leave_type_id", $leave_type_id, $user_name);
            }
        } else if ($from_date && $to_date) {
            if ($role_id == 1) {
                $data["leave"] = $this->leave_model->select_emp_leave_by_between_date($config["per_page"], $page, $from_date, $to_date, "");
            } else if ($role_id == 6){
                $data["leave"] = $this->leave_model->select_emp_leave_by_between_date_status($config["per_page"], $page, $from_date, $to_date,6);
            } else if ($role_id == 5){
                $data["leave"] = $this->leave_model->select_emp_leave_by_between_date_status($config["per_page"], $page, $from_date, $to_date,5);
            } else if ($role_id == 3) {
                $data["leave"] = $this->leave_model->select_emp_leave_by_between_date_and_department($config["per_page"], $page, $from_date, $to_date, $dept_id);
            } else {
                $data["leave"] = $this->leave_model->select_emp_leave_by_between_date($config["per_page"], $page, $from_date, $to_date, $user_name);
            }
        } else {
            if ($role_id == 1) {
                $data["leave"] = $this->leave_model->select_leave($config["per_page"], $page, "");
            } else if ($role_id == 3) {
                $data["leave"] = $this->leave_model->select_leave_by_department($config["per_page"], $page, $dept_id);
            } else if ($role_id == 6) {
                $data["leave"] = $this->leave_model->select_leave_by_status($config["per_page"], $page, 6);
            } else if ($role_id == 5) {
                $data["leave"] = $this->leave_model->select_leave_by_status($config["per_page"], $page, 5);
            } else {
                $data["leave"] = $this->leave_model->select_leave($config["per_page"], $page, $user_name);
            }
        }

        $data["links"] = $this->pagination->create_links();
        if ($this->input->is_ajax_request()) {
            $data['department'] = $this->Main_model->getValue("", 'master_department', '*', "ID DESC");
            $data['leave_type'] = $this->Main_model->getValue("", 'master_leave_type', '*', "ID DESC");
            $this->load->view('leave/per_page_leave', $data);
        } else {
            $data['department'] = $this->Main_model->getValue("", 'master_department', '*', "ID DESC");
            $data['leave_type'] = $this->Main_model->getValue("", 'master_leave_type', '*', "ID DESC");
            $this->load->view('leave/leave_tpl', $data);
        }
    }

    public function load_add_leave_from()
    {
        $data['leave_type'] = $this->Main_model->getValue("", 'master_leave_type', '*', "ID DESC");
        $this->load->view('hr/leave/leave_from', $data);
    }

    public function create_leave()
    {
        $data = array(
            'emp_id' => $this->input->post('emp_id'),
            'leave_type_id' => $this->input->post('leave_type_id'),
            'from_date' => $this->input->post('from_date'),
            'to_date' => $this->input->post('to_date'),
            'duration' => $this->input->post('duration'),
            'employee_id' => $this->input->post('employee_id'),
            'leave_reason' => $this->input->post('leave_reason')
        );
        $data1 = array();
        if (!empty($_FILES)) {
            $config['upload_path'] = 'public/leave_attach_file';
            $config['allowed_types'] = 'jpg|png|docx|doc|pdf';
            $config['max_size'] = 100000;
            $config['max_width'] = 100024;
            $config['max_height'] = 100000;
            $config['file_name'] = date('d-m-Y') . '_' . time();
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('attachment_file')) {
                $this->upload->display_errors();
            } else {
                $recipe_file = $this->upload->data();
                $file = $recipe_file['file_name'];
                $data1 = array(
                    'attachment_file' => $file
                );
            }
        }

        $merge_array = array_merge($data, $data1);
        $result = $this->Main_model->insertData($merge_array, 'hr_leave');
        if ($result) {
            $msg['load_success_message'] = "Leave info successfully added.";
            $this->load->view('messages/success_message', $msg);
        }

    }

    public function load_update_leave_from($id)
    {
        $data['leave_type'] = $this->Main_model->getValue("", 'master_leave_type', '*', "ID DESC");
        $data['leave'] = $this->Main_model->getValue("id= '$id'", 'hr_leave', '*', "ID DESC");
        $this->load->view('hr/leave/update_leave_from', $data);
    }

    public function update_leave()
    {
        $id = $this->input->post('id');
        $old_attachment_file = $this->input->post('old_attachment_file');
        $data = array(
            'emp_id' => $this->input->post('emp_id'),
            'leave_type_id' => $this->input->post('leave_type_id'),
            'from_date' => $this->input->post('from_date'),
            'to_date' => $this->input->post('to_date'),
            'duration' => $this->input->post('duration'),
            'employee_id' => $this->input->post('employee_id'),
            'leave_reason' => $this->input->post('leave_reason'),
            'status' => 0
        );
        $data1 = array();
        if (!empty($_FILES)) {
            $config['upload_path'] = 'public/leave_attach_file';
            $config['allowed_types'] = 'jpg|png|docx|doc|pdf';
            $config['max_size'] = 100000;
            $config['max_width'] = 100024;
            $config['max_height'] = 100000;
            $config['file_name'] = date('d-m-Y') . '_' . time();
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('attachment_file')) {
                $this->upload->display_errors();
            } else {
                if ($old_attachment_file) {
                    $dir = realpath('public/leave_attach_file/' . $old_attachment_file);
                    if (file_exists($dir)) {
                        unlink($dir);
                    }
                }
                $recipe_file = $this->upload->data();
                $file = $recipe_file['file_name'];
                $data1 = array(
                    'attachment_file' => $file
                );
            }
        }
        $all_data = array_merge($data, $data1);
        $result = $this->Main_model->updateData($all_data, "hr_leave", "id='$id'");
        if ($result) {
            $msg['load_success_message'] = "Leave info update successfully.";
            $this->load->view('messages/success_message', $msg);
        }
    }

    public function details_leave($id)
    {
        $result['leave'] = $this->leave_model->select_leave_by_id($id);
        $result['worward'] = $this->leave_model->select_forward_list();
        $this->load->view('leave/leave_details', $result);
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

    public function create_leave_comment()
    {
        $role_id = $this->session->userdata("role_id");
        $user_name = $this->session->userdata("user_name");
        $id = $this->input->post('leave_id');
        $condition = $this->input->post('condition');
        if ($condition == 1) {
            $comment_tbl_status = 1;
            $leave_tbl_status = $this->input->post('forward_to');
        } elseif ($condition == 2) {
            $comment_tbl_status = 2;
            $leave_tbl_status = 100;
        } else {
            if ($role_id == 5) {
                $comment_tbl_status = 3;
                $leave_tbl_status = 6;
            } else if ($role_id == 6) {
                $comment_tbl_status = 3;
                $leave_tbl_status = 0;
            } else {
                $comment_tbl_status = 3;
                $leave_tbl_status = 101;
            }

        }
        $data = array(
            'leave_id' => $this->input->post('leave_id'),
            'user_id' => $user_name,
            'comment' => $this->input->post('comment'),
            'status' => $comment_tbl_status
        );
        $data1 = array(
            'status' => $leave_tbl_status
        );
        $result = $this->Main_model->updateData($data1, "hr_leave", "id='$id'");
        $result = $this->Main_model->insertData($data, 'hr_leave_comment');
        if ($result) {
            $msg['add_leave_comment'] = "Comment successfully added.";
            $this->load->view('messages/success_message', $msg);
        }
    }
}

?>