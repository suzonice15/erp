<?php

class Weekend extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('master/weekend_model');

    }

    public function index()
    {

    }

    public function all_weekend()
    {
        $this->config->load('pagination');
        $this->load->library("pagination");
        $config = array();
        $config["base_url"] = base_url() . "master/weekend/all_weekend";
        $config["total_rows"] = $this->Main_model->countAll('master_weekend');;
        $config['per_page'] = 10;
        $config['uri_segment'] = 4;
        $config['num_links'] = 2;
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $data["weekend"] = $this->weekend_model->select_all_weekend($config["per_page"], $page);
        $data["links"] = $this->pagination->create_links();
        if ($this->input->is_ajax_request()) {
            $this->load->view('weekend/per_page_weekend', $data);
        } else {
            $this->load->view('weekend/weekend_tpl', $data);
        }
    }

    public function load_add_weekend_from()
    {
        $this->load->view('master/weekend/weekend_from');
    }

    public function create_weekend()
    {
        $data = array(
            'weekend_name' => $this->input->post('weekend_name')
        );
        $result = $this->Main_model->insertData($data, 'master_weekend');
        if ($result) {
            $msg['load_success_message'] = "Weekend successfully added.";
            $this->load->view('messages/success_message', $msg);
        }
    }

    public function load_update_weekend_from($id)
    {
        $data['weekend'] = $this->Main_model->getValue("id = '$id'", 'master_weekend', '*', "ID DESC");
        $this->load->view('master/weekend/update_weekend_from', $data);
    }

    public function update_weekend()
    {
        $id = $this->input->post('id');
        $data = array(
            'weekend_name' => $this->input->post('weekend_name')
        );
        $result = $this->Main_model->updateData($data, "master_weekend", "id='$id'");
        if ($result) {
            $msg['load_success_message'] = "Weekend update successfully.";
            $this->load->view('messages/success_message', $msg);
        }
    }

    public function delete_weekend($id)
    {
        $this->Main_model->deleteData("id = '$id'", "master_weekend");
    }


}

?>