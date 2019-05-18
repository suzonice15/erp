<?php

class Basic extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('hr/Basic_model');
    }

    public function index()
    {
    }

    public function all_basic()
    {
        $this->config->load('pagination');
        $this->load->library("pagination");
        $config = array();
        $config["base_url"] = base_url() . "hr/basic/all_basic";

        $emp_id = $this->input->post('emp_id');
        $email_address = $this->input->post('email_address');
        $emp_name = $this->input->post('emp_name');

        if ($emp_id) {
            $result = $this->Basic_model->countAllByLikeCondition("hr_basic.emp_id", $emp_id);
            $config["total_rows"] = $result->count_total_rows;
        } else if ($email_address) {
            $result = $this->Basic_model->countAllByLikeCondition("hr_basic.email_address", $email_address);
            $config["total_rows"] = $result->count_total_rows;
        } else if ($emp_name) {
            $result = $this->Basic_model->countAllByLikeCondition("hr_basic.emp_name", $emp_name);
            $this->db->last_query();
            $config["total_rows"] = $result->count_total_rows;
        } else {
            $result = $this->Basic_model->countAll();
            $config["total_rows"] = $result->count_total_rows;
        }


        $config['per_page'] = 10;
        $config['uri_segment'] = 4;
        $config['num_links'] = 2;
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;

        if ($emp_id) {
            $data["basic"] = $this->Basic_model->select_basic_by_emp_id($config["per_page"], $page, $emp_id);
        } else if ($email_address) {
            $data["basic"] = $this->Basic_model->select_basic_by_email_address($config["per_page"], $page, $email_address);
        } else if ($emp_name) {
            $data["basic"] = $this->Basic_model->select_basic_by_emp_name($config["per_page"], $page, $emp_name);
        } else {
            $data["basic"] = $this->Basic_model->select_basic($config["per_page"], $page);
        }

        $data["links"] = $this->pagination->create_links();
        if ($this->input->is_ajax_request()) {
            $this->load->view('basic/per_page_basic', $data);
        } else {
            $this->load->view('basic/basic_tpl', $data);
        }
    }

    public function load_add_basic_from()
    {
        $data['gender'] = $this->Main_model->getValue("", 'master_gender', '*', "ID DESC");
        $data['division'] = $this->Main_model->getValue("", 'master_division', '*', "ID DESC");
        $data['religion'] = $this->Main_model->getValue("", 'master_religion', '*', "ID DESC");
        $data['blood_group'] = $this->Main_model->getValue("", 'master_blood_group', '*', "ID DESC");
        $data['freedom_fighter_relation'] = $this->Main_model->getValue("", 'master_freedom_fighter_relation', '*', "ID DESC");
        $this->load->view('hr/basic/basic_from', $data);
    }

    public function create_basic()
    {
        $data = array(
            'emp_id' => $this->input->post('emp_id'),
            'emp_name' => $this->input->post('emp_name'),
            'mobile_no1' => $this->input->post('mobile_no1'),
            'emp_nid' => $this->input->post('emp_nid'),
            'email_address' => $this->input->post('email_address'),
            'date_of_birth' => $this->input->post('date_of_birth'),
            'gender_id' => $this->input->post('gender_id'),
            'division_id' => $this->input->post('division_id'),
            'district_id' => $this->input->post('district_id'),
            'thana_id' => $this->input->post('thana_id'),
            'father_name' => $this->input->post('father_name'),
            'mother_name' => $this->input->post('mother_name'),
            'passport_number' => $this->input->post('passport_number'),
            'passport_number_exp_date' => $this->input->post('passport_number_exp_date'),
            'birth_certificate' => $this->input->post('birth_certificate'),
            'present_address' => $this->input->post('present_address'),
            'permanent_address' => $this->input->post('permanent_address'),
            'blood_group_id' => $this->input->post('blood_group_id'),
            'religion_id' => $this->input->post('religion_id'),
            'freedom_fighter_family' => $this->input->post('freedom_fighter_family'),
            'freedom_fighter_id' => $this->input->post('freedom_fighter_id'),
            'freedom_fighter_relation_id' => $this->input->post('freedom_fighter_relation_id'),
            'status' => '1'
        );
        $data1 = array();
        $data2 = array();
        if (!empty($_FILES)) {
            $config['upload_path'] = 'public/emp_profile';
            $config['allowed_types'] = 'jpg|png|docx|doc|pdf';
            $config['max_size'] = 100000;
            $config['max_width'] = 100024;
            $config['max_height'] = 100000;
            $config['file_name'] = date('d-m-Y') . '_' . time();
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('profile_picture')) {
                $this->upload->display_errors();
            } else {
                $recipe_file = $this->upload->data();
                $file = $recipe_file['file_name'];
                $data1 = array(
                    'profile_picture' => $file
                );
            }

            $config['upload_path'] = 'public/emp_profile';
            $config['allowed_types'] = 'jpg|png|docx|doc|pdf';
            $config['max_size'] = 100000;
            $config['max_width'] = 100024;
            $config['max_height'] = 100000;
            $config['file_name'] = date('d-m-Y') . '_' . time();
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('signature')) {
                $this->upload->display_errors();
            } else {
                $recipe_file = $this->upload->data();
                $file = $recipe_file['file_name'];
                $data2 = array(
                    'signature' => $file
                );
            }
        }

        $result = array_merge($data, $data1, $data2);
        $result = $this->Main_model->insertData($result, 'hr_basic');
        if ($result) {
            $msg['load_success_message'] = "Basic info successfully added.";
            $this->load->view('messages/success_message', $msg);
        }
    }

    public function load_details_basic_from($id)
    {
        $data['basic'] = $this->Basic_model->select_basic_by_id($id);
        $this->load->view('hr/basic/details_basic_from', $data);
    }


    public function load_update_basic_from($id)
    {
        $data['gender'] = $this->Main_model->getValue("", 'master_gender', '*', "ID DESC");
        $data['division'] = $this->Main_model->getValue("", 'master_division', '*', "ID DESC");
        $data['religion'] = $this->Main_model->getValue("", 'master_religion', '*', "ID DESC");
        $data['blood_group'] = $this->Main_model->getValue("", 'master_blood_group', '*', "ID DESC");
        $data['freedom_fighter_relation'] = $this->Main_model->getValue("", 'master_freedom_fighter_relation', '*', "ID DESC");
        $data['basic'] = $this->Main_model->getValue("id = '$id'", 'hr_basic', '*', "ID DESC");
        $this->load->view('hr/basic/update_basic_from', $data);
    }

    public function update_basic()
    {
        $id = $this->input->post('id');
        $old_picture = $this->input->post('old_picture');
        $old_signature = $this->input->post('old_signature');
        $data = array(
            'emp_id' => $this->input->post('emp_id'),
            'emp_name' => $this->input->post('emp_name'),
            'mobile_no1' => $this->input->post('mobile_no1'),
            'emp_nid' => $this->input->post('emp_nid'),
            'email_address' => $this->input->post('email_address'),
            'date_of_birth' => $this->input->post('date_of_birth'),
            'gender_id' => $this->input->post('gender_id'),
            'division_id' => $this->input->post('division_id'),
            'district_id' => $this->input->post('district_id'),
            'thana_id' => $this->input->post('thana_id'),
            'father_name' => $this->input->post('father_name'),
            'mother_name' => $this->input->post('mother_name'),
            'passport_number' => $this->input->post('passport_number'),
            'passport_number_exp_date' => $this->input->post('passport_number_exp_date'),
            'birth_certificate' => $this->input->post('birth_certificate'),
            'present_address' => $this->input->post('present_address'),
            'permanent_address' => $this->input->post('permanent_address'),
            'blood_group_id' => $this->input->post('blood_group_id'),
            'religion_id' => $this->input->post('religion_id'),
            'freedom_fighter_family' => $this->input->post('freedom_fighter_family'),
            'freedom_fighter_id' => $this->input->post('freedom_fighter_id'),
            'freedom_fighter_relation_id' => $this->input->post('freedom_fighter_relation_id'),
            'status' => $this->input->post('status')
        );
        $data1 = array();
        $data2 = array();
        if (!empty($_FILES)) {
            $config['upload_path'] = 'public/emp_profile';
            $config['allowed_types'] = 'jpg|png|docx|doc|pdf';
            $config['max_size'] = 100000;
            $config['max_width'] = 100024;
            $config['max_height'] = 100000;
            $config['file_name'] = date('d-m-Y') . '_' . time();
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('profile_picture')) {
                $this->upload->display_errors();
            } else {
                if ($old_picture) {
                    $dir = realpath('public/emp_profile/' . $old_picture);
                    if (file_exists($dir)) {
                        unlink($dir);
                    }
                }
                $recipe_file = $this->upload->data();
                $file = $recipe_file['file_name'];
                $data1 = array(
                    'profile_picture' => $file
                );
            }

            $config['upload_path'] = 'public/emp_profile';
            $config['allowed_types'] = 'jpg|png|docx|doc|pdf';
            $config['max_size'] = 100000;
            $config['max_width'] = 100024;
            $config['max_height'] = 100000;
            $config['file_name'] = date('d-m-Y') . '_' . time();
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('signature')) {
                $this->upload->display_errors();
            } else {
                if ($old_signature) {
                    $dir = realpath('public/emp_profile/' . $old_signature);
                    if (file_exists($dir)) {
                        unlink($dir);
                    }
                }
                $recipe_file = $this->upload->data();
                $file = $recipe_file['file_name'];
                $data2 = array(
                    'signature' => $file
                );
            }
        }
        $all_data = array_merge($data, $data1, $data2);
        $result = $this->Main_model->updateData($all_data, "hr_basic", "id='$id'");
        if ($result) {
            $msg['load_success_message'] = "Emp basic info update successfully.";
            $this->load->view('messages/success_message', $msg);
        }
    }


    public function check_duplicate_data($emp_id = null)
    {
        $set_data = urldecode($emp_id);
        $result = $this->Basic_model->check_duplicate_data($set_data);
        if ($result) {
            echo "<span style='color: red; font-size: 12px;'>This emp id already exit !!!</span>";
        } else {
            echo "";
        }
    }

    function select_district($division_id)
    {
        $array = $this->Main_model->getValue("division_id = '$division_id'", 'master_district', '*', "ID DESC");
        $str = "";
        $str .= '<select name="district_id" id="district_id">
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
        $str .= '<select name="thana_id" id="thana_id">
				<option value="">--- Select Thana ---</option>';
        if (!empty($array)):
            foreach ($array as $row):
                $str .= '<option value="' . $row->id . '">' . $row->thana_name . '</option>';
            endforeach;
        endif;
        $str .= '</select>';
        echo $str;
    }

    public function basic_active($id)
    {
        $data = array(
            'status' => 1
        );
        $result = $this->Main_model->updateData($data, "hr_basic", "id='$id'");
        if ($result) {
            echo "1";
        }
    }

    public function basic_inactive($id)
    {
        $data = array(
            'status' => 0
        );
        $result = $this->Main_model->updateData($data, "hr_basic", "id='$id'");
        if ($result) {
            echo "1";
        }
    }
}

?>