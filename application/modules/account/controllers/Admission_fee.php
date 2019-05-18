<?php

class Admission_fee extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('account/Admission_fee_model');
    }

    public function index()
    {
    }

    public function all_admission_fee()
    {
        $this->config->load('pagination');
        $this->load->library("pagination");
        $config = array();
        $config["base_url"] = base_url() . "account/admission_fee/all_admission_fee";
        $student_id = $this->input->post('student_id');
        $year = $this->input->post('year');
        $class_id = $this->input->post('class_id');

        if ($student_id) {
            $result = $this->Admission_fee_model->countAllByLikeCondition("account_admission_fee.student_id", $student_id);
            $config["total_rows"] = $result->count_total_rows;
        } else if ($year) {
            $result = $this->Admission_fee_model->countAllByWhereCondition("account_admission_fee.year", $year);
            $config["total_rows"] = $result->count_total_rows;
        } else if ($class_id) {
            $result = $this->Admission_fee_model->countAllByWhereCondition("account_admission_fee.class_id", $class_id);
            $config["total_rows"] = $result->count_total_rows;
        } else {
            $result = $this->Admission_fee_model->countAll();
            $config["total_rows"] = $result->count_total_rows;
        }

        $config['per_page'] = 10;
        $config['uri_segment'] = 4;
        $config['num_links'] = 2;
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;


        if ($student_id) {
            $data["admission_fee"] = $this->Admission_fee_model->select_admission_fee_by_student_id($config["per_page"], $page, $student_id);
        } else if ($year) {
            $data["admission_fee"] = $this->Admission_fee_model->select_admission_fee_by_year($config["per_page"], $page, $year);
        } else if ($class_id) {
            $data["admission_fee"] = $this->Admission_fee_model->select_admission_fee_by_class_id($config["per_page"], $page, $class_id);
        } else {
            $data["admission_fee"] = $this->Admission_fee_model->select_all_admission_fee($config["per_page"], $page);
        }

        $data["links"] = $this->pagination->create_links();
        if ($this->input->is_ajax_request()) {
            $data['class'] = $this->Main_model->getValue("", 'master_class', '*', "ID DESC");
            $this->load->view('admission_fee/per_page_admission_fee', $data);
        } else {
            $data['class'] = $this->Main_model->getValue("", 'master_class', '*', "ID DESC");
            $this->load->view('admission_fee/admission_fee_tpl', $data);
        }
    }


    public function load_add_admission_fee_from()
    {
        $this->load->view('account/admission_fee/admission_fee_from');
    }


    public function create_admission_fee()
    {
        $student_id = $this->input->post('student_id');
        $get_data = $this->Main_model->getValueRow("student_id = '$student_id'", 'academic_studentinfo', 'class_id', "ID DESC");
        $set_data = $get_data->class_id;
        $user_name = $this->session->userdata('user_name');
        $data = array(
            'student_id' => $this->input->post('student_id'),
            'class_id' => $set_data,
            'year' => date("Y"),
            'payment_date' => date("Y-m-d"),
            'paid_amount' => $this->input->post('paid_amount'),
            'due_amount' => 0,
            'user_id' => $user_name,
            'status	' => '1'
        );
        $result = $this->Main_model->insertData($data, 'account_admission_fee');
        if ($result) {
            $msg['add_admission_fee'] = "Admission fee successfully added.";
            $this->load->view('messages/success_message', $msg);
        }
    }

    public function load_update_admission_fee_from($id)
    {
        $data['admission_fee'] = $this->Main_model->getValue("id = '$id'", 'account_admission_fee', '*', "ID DESC");
        $this->load->view('account/admission_fee/update_admission_fee_from', $data);
    }

    public function update_admission_fee()
    {
        $id = $this->input->post('id');
        $user_name = $this->session->userdata('user_name');
        $data = array(
            'student_id' => $this->input->post('student_id'),
            'class_id' => $this->input->post('class_id'),
            'year' => date("Y"),
            'payment_date' => date("Y-m-d"),
            'paid_amount' => $this->input->post('paid_amount'),
            'due_amount' => 0,
            'user_id' => $user_name,
            'status	' => '1'
        );
        $result = $this->Main_model->updateData($data, "account_admission_fee", "id='$id'");
        if ($result) {
            $msg['update_admission_fee'] = "Admission fee successfully updated.";
            $this->load->view('messages/success_message', $msg);
        }
    }


    public function create_pdf($year, $student_id)
    {
        error_reporting('E_NONE');
        $this->load->library('mpdf/mpdf');
//        $mpdf = new mPDF('', 'A4', 11, 'nikosh');
        $mpdf = new mPDF('', 'A4-L', 11, 'nikosh');
        $data['call_function'] = $this;
        $data['student_info'] = $this->Admission_fee_model->select_student_info_by_id($student_id);
        $data['admission_fee'] = $this->Main_model->getValue("year = '$year'", 'master_admission_fee', '*', "ID DESC");
        $html = $this->load->view('account/admission_fee/money_receipt_pdf', $data, true);
        $mpdf->SetHtmlHeader('');
        $mpdf->WriteHTML($html);
        $mpdf->Output('Admission money receipt.pdf', 'D');
        exit;
    }

    function taka_format($amount = 0)
    {
        $tmp = explode(".", $amount); // for float or double values
        $strMoney = "";
        $divide = 1000;
        $amount = $tmp[0];
        $strMoney .= str_pad($amount % $divide, 3, "0", STR_PAD_LEFT);
        $amount = (int)($amount / $divide);
        while ($amount > 0) {
            $divide = 100;
            $strMoney = str_pad($amount % $divide, 2, "0", STR_PAD_LEFT) . "," . $strMoney;
            $amount = (int)($amount / $divide);
        }

        if (substr($strMoney, 0, 1) == "0")
            $strMoney = substr($strMoney, 1);

        if (isset($tmp[1])) // if float and double add the decimal digits here.
        {
            return $strMoney . "." . $tmp[1];
        }
        echo $strMoney;
    }

    function taka_format1($amount = 0)
    {
        $tmp = explode(".", $amount);  // for float or double values
        $strMoney = "";
        $amount = $tmp[0];
        $strMoney .= substr($amount, -3, 3);
        $amount = substr($amount, 0, -3);
        while (strlen($amount) > 0) {
            $strMoney = substr($amount, -2, 2) . "," . $strMoney;
            $amount = substr($amount, 0, -2);
        }
        if (isset($tmp[1]))         // if float and double add the decimal digits here.
        {
            return $strMoney . "." . $tmp[1];
        }
        echo $strMoney;
    }

}

?>