<?php

class Holiday extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('master/holiday_model');

    }

    public function index()
    {

    }

    public function all_holiday()
    {
        $this->config->load('pagination');
        $this->load->library("pagination");
        $config = array();
        $config["base_url"] = base_url() . "master/holiday/all_holiday";
        $config["total_rows"] = $this->Main_model->countAll('master_holiday');;
        $config['per_page'] = 10;
        $config['uri_segment'] = 4;
        $config['num_links'] = 2;
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $data["holiday"] = $this->holiday_model->select_all_holiday($config["per_page"], $page);
        $data["links"] = $this->pagination->create_links();
        if ($this->input->is_ajax_request()) {
            $this->load->view('holiday/per_page_holiday', $data);
        } else {
            $this->load->view('holiday/holiday_tpl', $data);
        }
    }

    public function load_add_holiday_from()
    {
        $this->load->view('master/holiday/holiday_from');
    }

    public function create_holiday()
    {
        $data = array(
            'holiday_name' => $this->input->post('holiday_name'),
            'start_date' => $this->input->post('start_date'),
            'end_date' => $this->input->post('end_date')
        );
        $result = $this->Main_model->insertData($data, 'master_holiday');
        if ($result) {
            $msg['load_success_message'] = "Holiday successfully added.";
            $this->load->view('messages/success_message', $msg);
        }
    }

    public function load_update_holiday_from($id)
    {
        $data['holiday'] = $this->Main_model->getValue("id = '$id'", 'master_holiday', '*', "ID DESC");
        $this->load->view('master/holiday/update_holiday_from', $data);
    }

    public function update_holiday()
    {
        $id = $this->input->post('id');
        $data = array(
            'holiday_name' => $this->input->post('holiday_name'),
            'start_date' => $this->input->post('start_date'),
            'end_date' => $this->input->post('end_date')
        );
        $result = $this->Main_model->updateData($data, "master_holiday", "id='$id'");
        if ($result) {
            $msg['load_success_message'] = "Holiday update successfully.";
            $this->load->view('messages/success_message', $msg);
        }
    }

    public function delete_holiday($id)
    {
        $this->Main_model->deleteData("id = '$id'", "master_holiday");
    }
    
    public function check_duplicate_data($holiday_name = null)
    {
        $set_data = urldecode($holiday_name);
        $result = $this->holiday_model->check_duplicate_data($set_data);
        if ($result) {
            echo "<p style='color: red; font-size: 16px;'>This holiday name already exit !!!</p>";
        } else {
            echo "";
        }
    }


}

?>