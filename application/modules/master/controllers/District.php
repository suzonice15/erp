<?php

class District extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('master/district_model');
       
    }

    public function index()
    {

    }

    public function all_district()
    {
        $this->config->load('pagination');
        $this->load->library("pagination");
        $config = array();

        $district_name = $this->input->post('district_name');
        $division_id = $this->input->post('division_id');
 
        $config["base_url"] = base_url() . "master/district/all_district";

        if ($district_name) {
            $config["total_rows"] = $this->Main_model->countByLikeCondition("district_name", $district_name, "master_district");
        } else if ($division_id) {
            $config["total_rows"] = $this->Main_model->countByWhereCondition("division_id = '$division_id'", "master_district");;
        } else {
            $config["total_rows"] = $this->Main_model->countAll('master_district');
        }

        $config['per_page'] = 20;
        $config['uri_segment'] = 4;
        $config['num_links'] = 2;
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;

        if ($district_name) {
            $data["district"] = $this->district_model->select_all_district_by_name($config["per_page"], $page, $district_name);
        } else if ($division_id) {
            $data["district"] = $this->district_model->select_all_district_by_division_id($config["per_page"], $page, $division_id);
        } else {
            $data["district"] = $this->district_model->select_all_district($config["per_page"], $page);
        }


        $data["links"] = $this->pagination->create_links();
        if ($this->input->is_ajax_request()) {
            $this->load->view('district/per_page_district', $data);
        } else {
            $data['division'] = $this->Main_model->getValue("", 'master_division', '*', "ID DESC");
            $this->load->view('district/district_tpl', $data);
        }
    }

    public function load_add_district_from()
    {
        $data['division'] = $this->Main_model->getValue("", 'master_division', '*', "ID DESC");
        $this->load->view('master/district/district_from', $data);
    }

    public function create_district()
    {
        $data = array(
            'division_id' => $this->input->post('division_id'),
            'district_name' => $this->input->post('district_name')
        );
        $result = $this->Main_model->insertData($data, 'master_district');
        if ($result) {
            $msg['load_success_message'] = "District successfully added.";
            $this->load->view('messages/success_message', $msg);
        }
    }

    public function delete_district($id)
    {
        $this->Main_model->deleteData("id = '$id'", "master_district");
    }
    

    public function load_update_district_from($id)
    {
        $data['division'] = $this->Main_model->getValue("", 'master_division', '*', "ID DESC");
        $data['district'] = $this->Main_model->getValue("id = '$id'", 'master_district', '*', "ID DESC");
        $this->load->view('master/district/update_district_from', $data);
    }

    public function update_district()
    {
        $id = $this->input->post('id');
        $data = array(
            'division_id' => $this->input->post('division_id'),
            'district_name' => $this->input->post('district_name')
        );
        $result = $this->Main_model->updateData($data, "master_district", "id='$id'");
        if ($result) {
            $msg['load_success_message'] = "District update successfully.";
            $this->load->view('messages/success_message', $msg);
        }
    }

    public function check_duplicate_data($district_name = null)
    {
        $set_data = urldecode($district_name);
        $result = $this->district_model->check_duplicate_data($set_data);
        if ($result) {
            echo "<p style='color: red; font-size: 16px;'>This district name already exit !!!</p>";
        } else {
            echo "";
        }
    }

}

?>
