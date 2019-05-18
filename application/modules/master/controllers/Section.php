<?php

class Section extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('master/section_model');
    }

    public function index()
    {

    }

    public function all_section()
    {
        $this->config->load('pagination');
        $this->load->library("pagination");
        $config = array();
        $config["base_url"] = base_url() . "master/section/all_section";
        $config["total_rows"] = $this->Main_model->countAll('master_section');
        $config['per_page'] = 20;
        $config['uri_segment'] = 4;
        $config['num_links'] = 9;
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $data["section"] = $this->section_model->select_all_section($config["per_page"], $page);
        $data["links"] = $this->pagination->create_links();
        if ($this->input->is_ajax_request()) {
            $this->load->view('section/per_page_section', $data);
        } else {
            $this->load->view('section/section_tpl', $data);
        }
    }

    public function load_add_section_from()
    {
        $data['shift'] = $this->Main_model->getValue("", 'master_shift', '*', "ID DESC");
        $this->load->view('master/section/section_from', $data);
    }

    public function create_section()
    {
        $data = array(
            'shift_id' => $this->input->post('shift_id'),
            'section_name' => $this->input->post('section_name')
        );
        $result = $this->Main_model->insertData($data, 'master_section');
        if ($result) {
            $msg['load_success_message'] = "Section successfully added.";
            $this->load->view('messages/success_message', $msg);
        }
    }

    public function delete_section($id)
    {
        $this->Main_model->deleteData("id = '$id'", "master_section");
    }


    public function load_update_section_from($id)
    {
        $data['shift'] = $this->Main_model->getValue("", 'master_shift', '*', "ID DESC");
        $data['section'] = $this->Main_model->getValue("id = '$id'", 'master_section', '*', "ID DESC");
        $this->load->view('master/section/update_section_from', $data);
    }

    public function update_section()
    {
        $id = $this->input->post('id');
        $data = array(
            'shift_id' => $this->input->post('shift_id'),
            'section_name' => $this->input->post('section_name')
        );
        $result = $this->Main_model->updateData($data, "master_section", "id='$id'");
        if ($result) {
            $msg['load_success_message'] = "Section update successfully.";
            $this->load->view('messages/success_message', $msg);
        }
    }

    public function check_duplicate_data($section_name = null)
    {
        $set_data = urldecode($section_name);
        $result = $this->section_model->check_duplicate_data($set_data);
        if ($result) {
            echo "<p style='color: red; font-size: 16px;'>This section name already exit !!!</p>";
        } else {
            echo "";
        }
    }

}

?>