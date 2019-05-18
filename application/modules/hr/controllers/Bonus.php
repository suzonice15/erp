<?php

class Bonus extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('hr/Bonus_model');
    }

    public function index()
    {
    }

    public function all_bonus()
    {
        $this->config->load('pagination');
        $this->load->library("pagination");
        $config = array();
        $config["base_url"] = base_url() . "hr/bonus/all_bonus";

        $department_id = $this->input->post('department_id');


        if ($department_id) {
            $config["total_rows"] = $this->Main_model->countByWhereCondition("department_id = '$department_id'", "hr_bonus");
        } else {
            $config["total_rows"] = $this->Main_model->countAll('hr_bonus');
        }

        $config['per_page'] = 20;
        $config['uri_segment'] = 4;
        $config['num_links'] = 2;
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;

        if ($department_id) {
            $data["bonus"] = $this->Bonus_model->select_all_bonus_by_department_id($config["per_page"], $page, $department_id);
        } else {
            $data["bonus"] = $this->Bonus_model->select_all_bonus($config["per_page"], $page);
        }


        $data["links"] = $this->pagination->create_links();
        if ($this->input->is_ajax_request()) {
            $data['department'] = $this->Main_model->getValue("", 'master_department', '*', "ID DESC");
            $this->load->view('bonus/per_page_bonus', $data);
        } else {
            $data['department'] = $this->Main_model->getValue("", 'master_department', '*', "ID DESC");
            $this->load->view('bonus/bonus_tpl', $data);
        }
    }

    public function load_add_bonus_from()
    {
        $data['department'] = $this->Main_model->getValue("", 'master_department', '*', "ID DESC");
        $data['shift'] = $this->Main_model->getValue("", 'master_shift', '*', "ID DESC");
        $data['section'] = $this->Main_model->getValue("", 'master_section', '*', "ID DESC");
        $data['bonus_type'] = $this->Main_model->getValue("", 'master_bonus', '*', "ID DESC");
        $this->load->view('hr/bonus/bonus_from', $data);
    }

    public function create_bonus()
    {
        $data = array(
            'department_id' => $this->input->post('department_id'),
            'shift_id' => $this->input->post('shift_id'),
            'section_id' => $this->input->post('section_id'),
            'bonus_type_id' => $this->input->post('bonus_type_id'),
            'amount_type' => $this->input->post('amount_type'),
            'amount' => $this->input->post('amount'),
            'year' => $this->input->post('year'),
            'month' => $this->input->post('month')
        );
        $result = $this->Main_model->insertData($data, 'hr_bonus');
        if ($result) {
            $msg['load_success_message'] = "Bonus info successfully added.";
            $this->load->view('messages/success_message', $msg);
        }
    }


    public function load_update_bonus_from($id)
    {
        $data['department'] = $this->Main_model->getValue("", 'master_department', '*', "ID DESC");
        $data['shift'] = $this->Main_model->getValue("", 'master_shift', '*', "ID DESC");
        $data['section'] = $this->Main_model->getValue("", 'master_section', '*', "ID DESC");
        $data['bonus_type'] = $this->Main_model->getValue("", 'master_bonus', '*', "ID DESC");
        $data['bonus'] = $this->Main_model->getValue("id='$id'", 'hr_bonus', '*', "ID DESC");
        $this->load->view('hr/bonus/update_bonus_from', $data);
    }

    public function update_bonus()
    {
        $id = $this->input->post('id');
        $data = array(
            'department_id' => $this->input->post('department_id'),
            'shift_id' => $this->input->post('shift_id'),
            'section_id' => $this->input->post('section_id'),
            'bonus_type_id' => $this->input->post('bonus_type_id'),
            'amount_type' => $this->input->post('amount_type'),
            'amount' => $this->input->post('amount'),
            'year' => $this->input->post('year'),
            'month' => $this->input->post('month')
        );
        $result = $this->Main_model->updateData($data, "hr_bonus", "id='$id'");
        if ($result) {
            $msg['load_success_message'] = "Bonus info update successfully.";
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
}

?>