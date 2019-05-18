<?php

class Bank_Branch extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('master/bank_branch_model');
       
    }

    public function index()
    {

    }

    public function all_bank_branch()
    {
        $this->config->load('pagination');
        $this->load->library("pagination");
        $config = array();

        $bank_branch_name = $this->input->post('bank_branch_name');
        $bank_id = $this->input->post('bank_id');
 
        $config["base_url"] = base_url() . "master/bank_branch/all_bank_branch";

        if ($bank_branch_name) {
            $config["total_rows"] = $this->Main_model->countByLikeCondition("bank_branch_name", $bank_branch_name, "master_bank_branch");
        } else if ($bank_id) {
            $config["total_rows"] = $this->Main_model->countByWhereCondition("bank_id = '$bank_id'", "master_bank_branch");;
        } else {
            $config["total_rows"] = $this->Main_model->countAll('master_bank_branch');
        }

        $config['per_page'] = 20;
        $config['uri_segment'] = 4;
        $config['num_links'] = 2;
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;

        if ($bank_branch_name) {
            $data["bank_branch"] = $this->bank_branch_model->select_all_bank_branch_by_name($config["per_page"], $page, $bank_branch_name);
        } else if ($bank_id) {
            $data["bank_branch"] = $this->bank_branch_model->select_all_bank_branch_by_bank_id($config["per_page"], $page, $bank_id);
        } else {
            $data["bank_branch"] = $this->bank_branch_model->select_all_bank_branch($config["per_page"], $page);
        }


        $data["links"] = $this->pagination->create_links();
        if ($this->input->is_ajax_request()) {
            $this->load->view('bank_branch/per_page_bank_branch', $data);
        } else {
            $data['bank'] = $this->Main_model->getValue("", 'master_bank', '*', "ID DESC");
            $this->load->view('bank_branch/bank_branch_tpl', $data);
        }
    }

    public function load_add_bank_branch_from()
    {
        $data['bank'] = $this->Main_model->getValue("", 'master_bank', '*', "ID DESC");
        $this->load->view('master/bank_branch/bank_branch_from', $data);
    }

    public function create_bank_branch()
    {
        $data = array(
            'bank_id' => $this->input->post('bank_id'),
            'bank_branch_name' => $this->input->post('bank_branch_name')
        );
        $result = $this->Main_model->insertData($data, 'master_bank_branch');
        if ($result) {
            $msg['load_success_message'] = "Bank Branch successfully added.";
            $this->load->view('messages/success_message', $msg);
        }
    }

    public function delete_bank_branch($id)
    {
        $this->Main_model->deleteData("id = '$id'", "master_bank_branch");
    }
    

    public function load_update_bank_branch_from($id)
    {
        $data['bank'] = $this->Main_model->getValue("", 'master_bank', '*', "ID DESC");
        $data['bank_branch'] = $this->Main_model->getValue("id = '$id'", 'master_bank_branch', '*', "ID DESC");
        $this->load->view('master/bank_branch/update_bank_branch_from', $data);
    }

    public function update_bank_branch()
    {
        $id = $this->input->post('id');
        $data = array(
            'bank_id' => $this->input->post('bank_id'),
            'bank_branch_name' => $this->input->post('bank_branch_name')
        );
        $result = $this->Main_model->updateData($data, "master_bank_branch", "id='$id'");
        if ($result) {
            $msg['load_success_message'] = "Branch update successfully.";
            $this->load->view('messages/success_message', $msg);
        }
    }

    public function check_duplicate_data($bank_branch_name = null)
    {
        $set_data = urldecode($bank_branch_name);
        $result = $this->Main_model->check_duplicate_data('bank_branch_name', $set_data, 'master_bank_branch');
        if ($result) {
            echo "<p style='color: red; font-size: 16px;'>This branch name already exit !!!</p>";
        } else {
            echo "";
        }
    }

}

?>