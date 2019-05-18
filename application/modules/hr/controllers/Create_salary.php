<?php

class Create_salary extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('hr/Create_salary_model');
    }

    public function index()
    {
    }

    public function all_create_salary()
    {
        $this->load->view('create_salary/create_salary_tpl');
    }

    public function load_add_create_salary_from()
    {
        $this->load->view('hr/create_salary/create_salary_from');
    }

    public function create_create_salary()
    {
        $data = array(
            'emp_id' => $this->input->post('emp_id'),
            'create_salary_type_id' => $this->input->post('create_salary_type_id'),
            'issue_date' => $this->input->post('issue_date'),
            'create_salary_amount' => $this->input->post('create_salary_amount'),
            'no_of_installment' => $this->input->post('no_of_installment'),
            'amount_of_installment' => $this->input->post('amount_of_installment'),
            'deduction_year' => $this->input->post('year'),
            'deduction_month' => $this->input->post('month')
        );
        $result = $this->Main_model->insertData($data, 'hr_create_salary');
        if ($result) {
            $msg['load_success_message'] = "create_salary info successfully added.";
            $this->load->view('messages/success_message', $msg);
        }


    }

    public function load_update_create_salary_from($id)
    {
        $data['create_salary'] = $this->Main_model->getValue("id= '$id'", 'hr_create_salary', '*', "ID DESC");
        $this->load->view('hr/create_salary/update_create_salary_from', $data);
    }

    public function update_create_salary()
    {
        $id = $this->input->post('id');
        $data = array(
            'emp_id' => $this->input->post('emp_id'),
            'create_salary_type_id' => $this->input->post('create_salary_type_id'),
            'issue_date' => $this->input->post('issue_date'),
            'create_salary_amount' => $this->input->post('create_salary_amount'),
            'no_of_installment' => $this->input->post('no_of_installment'),
            'amount_of_installment' => $this->input->post('amount_of_installment'),
            'deduction_year' => $this->input->post('year'),
            'deduction_month' => $this->input->post('month')
        );
        $result = $this->Main_model->updateData($data, "hr_create_salary", "id='$id'");
        if ($result) {
            $msg['load_success_message'] = "create_salary info update successfully.";
            $this->load->view('messages/success_message', $msg);
        }
    }
}

?>