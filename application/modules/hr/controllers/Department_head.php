<?php

class Department_head extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('hr/Department_head_model');
    }

    public function index()
    {
    }

    public function all_department_head()
    {
        $this->config->load('pagination');
        $this->load->library("pagination");
        $config = array();
        $config["base_url"] = base_url() . "hr/department_head/all_department_head";
        $config["total_rows"] = $this->Main_model->countAll('hr_assigning_dept_head');;
        $config['per_page'] = 10;
        $config['uri_segment'] = 4;
        $config['num_links'] = 9;
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $data["department_head"] = $this->Department_head_model->select_all_department_head($config["per_page"], $page);
        $data["links"] = $this->pagination->create_links();
        if ($this->input->is_ajax_request()) {
            $this->load->view('department_head/per_page_department_head', $data);
            $data['department'] = $this->Main_model->getValue("", 'master_department', '*', "ID DESC");
        } else {
            $data['department'] = $this->Main_model->getValue("", 'master_department', '*', "ID DESC");
            $this->load->view('department_head/department_head_tpl', $data);
        }
    }

    public function load_add_department_head_from()
    {
        $data['department'] = $this->Main_model->getValue("", 'master_department', '*', "ID DESC");
        $this->load->view('hr/department_head/department_head_from', $data);
    }


    public function create_department_head()
    {
        $data = array(
            'user_id' => $this->input->post('user_id'),
            'department_id' => $this->input->post('department_id'),
            'start_date' => $this->input->post('start_date'),
            'end_date' => $this->input->post('end_date'),
            'status' => 1
        );
        $result = $this->Main_model->insertData($data, 'hr_assigning_dept_head');
        if ($result) {
            $msg['load_success_message'] = "Department head successfully added.";
            $this->load->view('messages/success_message', $msg);
        }
    }

    function select_department($user_id)
    {
        $array = $this->Department_head_model->select_dept($user_id);
        $str = "";
        $str .= '<select name="department_id" id="department_id">
				<option value="">--- Select Section ---</option>';
        if (!empty($array)):
            foreach ($array as $row):
                $str .= '<option value="' . $row->id . '">' . $row->department_name . '</option>';
            endforeach;
        endif;
        $str .= '</select>';
        echo $str;
    }

    public function load_update_department_head_from($id)
    {
        $data['shift'] = $this->Main_model->getValue("", 'master_shift', '*', "ID DESC");
        $data['department_head'] = $this->Main_model->getValue("id = '$id'", 'hr_department_head', '*', "ID DESC");
        $this->load->view('hr/department_head/update_department_head_from', $data);
    }

    public function update_department_head()
    {
        $id = $this->input->post('id');
        $data = array(
            'shift_id' => $this->input->post('shift_id'),
            'in_time' => $this->input->post('in_time'),
            'out_time' => $this->input->post('out_time'),
            'late_time' => $this->input->post('late_time'),
            'early_out' => $this->input->post('early_out'),
            'status' => $this->input->post('status')
        );
        $result = $this->Main_model->updateData($data, "hr_department_head", "id='$id'");
        if ($result) {
            $msg['load_success_message'] = "Shift schedule update successfully.";
            $this->load->view('messages/success_message', $msg);
        }
    }
}

?>