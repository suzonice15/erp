<?php

class Thana extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('master/thana_model');
        
    }

    public function index()
    {

    }

    public function all_thana()
    {
        $this->config->load('pagination');
        $this->load->library("pagination");
        $config = array();
        $config["base_url"] = base_url() . "master/thana/all_thana";
        
        $division_id = $this->input->post('division_id');
        $district_id = $this->input->post('district_id');
        $thana_name = $this->input->post('thana_name');


        if ($division_id) {
            $config["total_rows"] = $this->Main_model->countByWhereCondition("division_id = '$division_id'", "master_thana");
        } else if ($district_id) {
            $config["total_rows"] = $this->Main_model->countByWhereCondition("district_id = '$district_id'", "master_thana");
        } else if ($thana_name) {
            $config["total_rows"] = $this->Main_model->countByLikeCondition("thana_name", $thana_name, "master_thana");
        } else {
            $config["total_rows"] = $this->Main_model->countAll('master_thana');
        }

        $config['per_page'] = 10;
        $config['uri_segment'] = 4;
        $config['num_links'] = 2;
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;

        if ($division_id) {
            $data["thana"] = $this->thana_model->select_all_thana_by_division_id($config["per_page"], $page, $division_id);
        } else if ($district_id) {
            $data["thana"] = $this->thana_model->select_all_thana_by_district_id($config["per_page"], $page, $district_id);
        } else if ($thana_name) {
            $data["thana"] = $this->thana_model->select_all_thana_by_name($config["per_page"], $page, $thana_name);
        } else {
            $data["thana"] = $this->thana_model->select_all_thana($config["per_page"], $page);
        }

        $data["links"] = $this->pagination->create_links();
        if ($this->input->is_ajax_request()) {
            $this->load->view('thana/per_page_thana', $data);
        } else {
            $data['division'] = $this->Main_model->getValue("", 'master_division', '*', "ID DESC");
            $data['district'] = $this->Main_model->getValue("", 'master_district', '*', "ID DESC");
            $this->load->view('thana/thana_tpl', $data);
        }
    }

    public function load_add_thana_from()
    {
        $data['division'] = $this->Main_model->getValue("", 'master_division', '*', "ID DESC");
        $this->load->view('master/thana/thana_from', $data);
    }

    public function select_district($division_id)
    {
        $array = $this->Main_model->getValue("division_id = '$division_id'", 'master_district', '*', "ID DESC");
        $str = "";
        $str .= '<select name="district_id" id="district_id" class="form-control">
				<option value="">--- Select district ---</option>';
        if (!empty($array)) {
            foreach ($array as $row) {
                $str .= '<option value="' . $row->id . '">' . $row->district_name . '</option>';
            }
        }
        $str .= '</select>';
        echo $str;
    }

    public function create_thana()
    {
        $data = array(
            'division_id' => $this->input->post('division_id'),
            'district_id' => $this->input->post('district_id'),
            'thana_name' => $this->input->post('thana_name')
        );
        $result = $this->Main_model->insertData($data, 'master_thana');
        if ($result) {
            $msg['load_success_message'] = "Thana successfully added.";
            $this->load->view('messages/success_message', $msg);
        }
    }

    public function delete_thana($id)
    {
        $this->Main_model->deleteData("id = '$id'", "master_thana");
    }
    

    public function load_update_thana_from($id)
    {
        $data['division'] = $this->Main_model->getValue("", 'master_division', '*', "ID DESC");
        $data['district'] = $this->Main_model->getValue("", 'master_district', '*', "ID DESC");
        $data['thana'] = $this->Main_model->getValue("id='$id'", 'master_thana', '*', "ID DESC");
        $this->load->view('master/thana/update_thana_from', $data);
    }

    public function update_thana()
    {
        $id = $this->input->post('id');
        $data = array(
            'division_id' => $this->input->post('division_id'),
            'district_id' => $this->input->post('district_id'),
            'thana_name' => $this->input->post('thana_name')
        );
        $result = $this->Main_model->updateData($data, "master_thana", "id='$id'");
        if ($result) {
            $msg['load_success_message'] = "Thana update successfully.";
            $this->load->view('messages/success_message', $msg);
        }
    }

    public function check_duplicate_data($thana_name = null)
    {
        $result = $this->thana_model->check_duplicate_data($thana_name);
        if ($result) {
            echo "<p style='color: red; font-size: 16px;'>This thana name already exit !!!</p>";
        } else {
            echo "";
        }
    }
}

?>