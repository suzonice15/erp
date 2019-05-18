<?php

class Additional_and_deduction extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('hr/Additional_and_deduction_model');
    }

    public function index()
    {
    }

    public function all_additional_and_deduction()
    {
        $this->config->load('pagination');
        $this->load->library("pagination");
        $config = array();
        $config["base_url"] = base_url() . "hr/additional_and_deduction/all_additional_and_deduction";

        $department_id = $this->input->post('department_id');


        if ($department_id) {
            $config["total_rows"] = $this->Main_model->countByWhereCondition("department_id = '$department_id'", "hr_additional_and_deduction");
        } else {
            $config["total_rows"] = $this->Main_model->countAll('hr_additional_and_deduction');
        }

        $config['per_page'] = 20;
        $config['uri_segment'] = 4;
        $config['num_links'] = 2;
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;

        if ($department_id) {
            $data["additional_and_deduction"] = $this->additional_and_deduction_model->select_all_additional_and_deduction_by_department_id($config["per_page"], $page, $department_id);
        } else {
            $data["additional_and_deduction"] = $this->additional_and_deduction_model->select_all_additional_and_deduction($config["per_page"], $page);
        }


        $data["links"] = $this->pagination->create_links();
        if ($this->input->is_ajax_request()) {
            $data['department'] = $this->Main_model->getValue("", 'master_department', '*', "ID DESC");
            $this->load->view('additional_and_deduction/per_page_additional_and_deduction', $data);
        } else {
            $data['department'] = $this->Main_model->getValue("", 'master_department', '*', "ID DESC");
            $this->load->view('additional_and_deduction/additional_and_deduction_tpl', $data);
        }
    }

    public function load_add_additional_and_deduction_from()
    {
        $data['department'] = $this->Main_model->getValue("", 'master_department', '*', "ID DESC");
        $data['shift'] = $this->Main_model->getValue("", 'master_shift', '*', "ID DESC");
        $this->load->view('hr/additional_and_deduction/additional_and_deduction_from', $data);
    }

    public function create_additional_and_deduction()
    {
        $total_num_of_fields = $this->input->post('total_num_of_fields');
        $emp_id = $this->input->post('emp_id');
        $department_id = $this->input->post('department_id');
        $shift_id = $this->input->post('shift_id');
        $section_id = $this->input->post('section_id');
        $year = $this->input->post('year');
        $month = $this->input->post('month');
        $amount = $this->input->post('amount');
        $type = $this->input->post('type');

        $remarks = $this->input->post('remarks');

        for ($i = 0; $i < $total_num_of_fields; $i++) {
            $set_type = $type[$i];
            if ($set_type == 1) {
                $get_type = $this->input->post('additional');
            } else {
                $get_type = $this->input->post('deduction');
            }
            $data = array(
                'emp_id' => $emp_id[$i],
                'department_id' => $department_id[$i],
                'shift_id' => $shift_id[$i],
                'section_id' => $section_id[$i],
                'amount' => $amount[$i],
                'year' => $year[$i],
                'month' => $month[$i],
                'type' => $type[$i],
                'additional_and_deduction_type' => $get_type[$i],
                'remarks' => $remarks[$i],
            );
            $result = $this->Main_model->insertData($data, 'hr_additional_and_deduction');
        }
        if ($result) {
            $msg['load_success_message'] = "additional_and_deduction info successfully added.";
            $this->load->view('messages/success_message', $msg);
        }
    }


    public function load_update_additional_and_deduction_from($id)
    {
        $data['department'] = $this->Main_model->getValue("", 'master_department', ' * ', "ID DESC");
        $data['shift'] = $this->Main_model->getValue("", 'master_shift', ' * ', "ID DESC");
        $data['section'] = $this->Main_model->getValue("", 'master_section', ' * ', "ID DESC");
        $data['additional_and_deduction_type'] = $this->Main_model->getValue("", 'master_additional_and_deduction', ' * ', "ID DESC");
        $data['additional_and_deduction'] = $this->Main_model->getValue("id='$id'", 'hr_additional_and_deduction', ' * ', "ID DESC");
        $this->load->view('hr / additional_and_deduction / update_additional_and_deduction_from', $data);
    }

    public function update_additional_and_deduction()
    {
        $id = $this->input->post('id');
        $data = array(
            'department_id' => $this->input->post('department_id'),
            'shift_id' => $this->input->post('shift_id'),
            'section_id' => $this->input->post('section_id'),
            'additional_and_deduction_type_id' => $this->input->post('additional_and_deduction_type_id'),
            'amount_type' => $this->input->post('amount_type'),
            'amount' => $this->input->post('amount'),
            'year' => $this->input->post('year'),
            'month' => $this->input->post('month')
        );
        $result = $this->Main_model->updateData($data, "hr_additional_and_deduction", "id='$id'");
        if ($result) {
            $msg['load_success_message'] = "additional_and_deduction info update successfully.";
            $this->load->view('messages / success_message', $msg);
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