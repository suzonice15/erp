<?php

class Loan extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('hr/loan_model');
    }

    public function index()
    {
    }

    public function all_loan()
    {
        $this->config->load('pagination');
        $this->load->library("pagination");
        $config = array();
        $config["base_url"] = base_url() . "hr/loan/all_loan";

        $emp_id = $this->input->post('emp_id');
        $amount = $this->input->post('amount');
        $loan_type = $this->input->post('loan_type');

        if ($emp_id) {
            $result = $this->loan_model->countAllByLikeCondition("hr_loan.emp_id", $emp_id);
            $config["total_rows"] = $result->count_total_rows;
        } else if ($amount) {
            $result = $this->loan_model->countAllByLikeCondition("hr_loan.loan_amount", $amount);
            $config["total_rows"] = $result->count_total_rows;
        } else if ($loan_type) {
            $result = $this->loan_model->countAllByWhereCondition("hr_loan.loan_type_id", $loan_type);
            $config["total_rows"] = $result->count_total_rows;
        } else {
            $result = $this->loan_model->countAll();
            $config["total_rows"] = $result->count_total_rows;
        }

        $config['per_page'] = 20;
        $config['uri_segment'] = 4;
        $config['num_links'] = 2;
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;

        if ($emp_id) {
            $data["loan"] = $this->loan_model->select_loan_by_emp_id($config["per_page"], $page, $emp_id);
        } else if ($amount) {
            $data["loan"] = $this->loan_model->select_loan_by_amount($config["per_page"], $page, $amount);
        } else if ($loan_type) {
            $data["loan"] = $this->loan_model->select_loan_by_loan_type($config["per_page"], $page, $loan_type);
        } else {
            $data["loan"] = $this->loan_model->select_loan($config["per_page"], $page);
        }

        $data["links"] = $this->pagination->create_links();
        if ($this->input->is_ajax_request()) {
            $data['loan_type'] = $this->Main_model->getValue("", 'master_loan_type', '*', "ID DESC");
            $this->load->view('loan/per_page_loan', $data);
        } else {
            $data['loan_type'] = $this->Main_model->getValue("", 'master_loan_type', '*', "ID DESC");
            $this->load->view('loan/loan_tpl', $data);
        }
    }

    public function load_add_loan_from()
    {
        $data['loan_type'] = $this->Main_model->getValue("", 'master_loan_type', '*', "ID DESC");
        $this->load->view('hr/loan/loan_from', $data);
    }

    public function create_loan()
    {
        $data = array(
            'emp_id' => $this->input->post('emp_id'),
            'loan_type_id' => $this->input->post('loan_type_id'),
            'issue_date' => $this->input->post('issue_date'),
            'loan_amount' => $this->input->post('loan_amount'),
            'no_of_installment' => $this->input->post('no_of_installment'),
            'amount_of_installment' => $this->input->post('amount_of_installment'),
            'deduction_year' => $this->input->post('year'),
            'deduction_month' => $this->input->post('month')
        );
        $result = $this->Main_model->insertData($data, 'hr_loan');
        if ($result) {
            $msg['load_success_message'] = "Loan info successfully added.";
            $this->load->view('messages/success_message', $msg);
        }


    }

    public function load_update_loan_from($id)
    {
        $data['loan_type'] = $this->Main_model->getValue("", 'master_loan_type', '*', "ID DESC");
        $data['loan'] = $this->Main_model->getValue("id= '$id'", 'hr_loan', '*', "ID DESC");
        $this->load->view('hr/loan/update_loan_from', $data);
    }

    public function update_loan()
    {
        $id = $this->input->post('id');
        $data = array(
            'emp_id' => $this->input->post('emp_id'),
            'loan_type_id' => $this->input->post('loan_type_id'),
            'issue_date' => $this->input->post('issue_date'),
            'loan_amount' => $this->input->post('loan_amount'),
            'no_of_installment' => $this->input->post('no_of_installment'),
            'amount_of_installment' => $this->input->post('amount_of_installment'),
            'deduction_year' => $this->input->post('year'),
            'deduction_month' => $this->input->post('month')
        );
        $result = $this->Main_model->updateData($data, "hr_loan", "id='$id'");
        if ($result) {
            $msg['load_success_message'] = "Loan info update successfully.";
            $this->load->view('messages/success_message', $msg);
        }
    }
}

?>