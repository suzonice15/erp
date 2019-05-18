<?php

class Bank extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('master/Bank_model');

    }

    public function index()
    {

    }

    public function all_bank()
    {
        $this->config->load('pagination');
        $this->load->library("pagination");
        $config = array();
        $config["base_url"] = base_url() . "master/bank/all_bank";
        $config["total_rows"] = $this->Main_model->countAll('master_bank');;
        $config['per_page'] = 10;
        $config['uri_segment'] = 4;
        $config['num_links'] = 2;
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $data["bank"] = $this->Bank_model->select_all_bank($config["per_page"], $page);
        $data["links"] = $this->pagination->create_links();
        if ($this->input->is_ajax_request()) {
            $this->load->view('bank/per_page_bank', $data);
        } else {
            $this->load->view('bank/bank_tpl', $data);
        }
    }

    public function load_add_bank_from()
    {
        $this->load->view('master/bank/bank_from');
    }

    public function create_bank()
    {
        $data = array(
            'bank_name' => $this->input->post('bank_name')
        );
        $result = $this->Main_model->insertData($data, 'master_bank');
        if ($result) {
            $msg['load_success_message'] = "Bank successfully added.";
            $this->load->view('messages/success_message', $msg);
        }
    }

    public function load_update_bank_from($id)
    {
        $data['bank'] = $this->Main_model->getValue("id = '$id'", 'master_bank', '*', "ID DESC");
        $this->load->view('master/bank/update_bank_from', $data);
    }

    public function update_bank()
    {
        $id = $this->input->post('id');
        $data = array(
            'bank_name' => $this->input->post('bank_name')
        );
        $result = $this->Main_model->updateData($data, "master_bank", "id='$id'");
        if ($result) {
            $msg['load_success_message'] = "Bank update successfully.";
            $this->load->view('messages/success_message', $msg);
        }
    }

    public function delete_bank($id)
    {
        $this->Main_model->deleteData("id = '$id'", "master_bank");
    }


}

?>