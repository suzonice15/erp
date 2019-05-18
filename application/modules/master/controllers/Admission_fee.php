<?php

class Admission_fee extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('master/Admission_fee_model');

    }

    public function index()
    {

    }

    public function all_admission_fee()
    {
        $this->config->load('pagination');
        $this->load->library("pagination");
        $config = array();
        $config["base_url"] = base_url() . "master/admission_fee/all_admission_fee";
        $config["total_rows"] = $this->Main_model->countAll('master_admission_fee');;
        $config['per_page'] = 50;
        $config['uri_segment'] = 4;
        $config['num_links'] = 2;
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $data["admission_fee"] = $this->Admission_fee_model->select_all_admission_fee($config["per_page"], $page);
        $data["links"] = $this->pagination->create_links();
        if ($this->input->is_ajax_request()) {
            $this->load->view('admission_fee/per_page_admission_fee', $data);
        } else {
            $this->load->view('admission_fee/admission_fee_tpl', $data);
        }
    }

    public function load_add_admission_fee_from()
    {
        $this->load->view('master/admission_fee/admission_fee_from');
    }

    public function create_admission_fee()
    {
        $data = array(
            'year' => $this->input->post('year'),
            'particulars' => $this->input->post('particulars'),
            'amount' => $this->input->post('amount'),
            'status' => 1
        );
        $result = $this->Main_model->insertData($data, 'master_admission_fee');
        if ($result) {
            $msg['load_success_message'] = "Admission fee successfully added.";
            $this->load->view('messages/success_message', $msg);
        }
    }

    public function load_update_admission_fee_from($id)
    {
        $data['admission_fee'] = $this->Main_model->getValue("id = '$id'", 'master_admission_fee', '*', "ID DESC");
        $this->load->view('master/admission_fee/update_admission_fee_from', $data);
    }

    public function update_admission_fee()
    {
        $id = $this->input->post('id');
        $data = array(
            'year' => $this->input->post('year'),
            'particulars' => $this->input->post('particulars'),
            'amount' => $this->input->post('amount'),
            'status' => $this->input->post('status')
        );
        $result = $this->Main_model->updateData($data, "master_admission_fee", "id='$id'");
        if ($result) {
            $msg['load_success_message'] = "Admission fee update successfully.";
            $this->load->view('messages/success_message', $msg);
        }
    }

    public function admission_fee_active($id)
    {
        $data = array(
            'status' => 1
        );
        $result = $this->Main_model->updateData($data, "master_admission_fee", "id='$id'");
        if ($result) {
            echo "1";
        }
    }

    public function admission_fee_inactive($id)
    {
        $data = array(
            'status' => 0
        );
        $result = $this->Main_model->updateData($data, "master_admission_fee", "id='$id'");
        if ($result) {
            echo "1";
        }
    }
}

?>