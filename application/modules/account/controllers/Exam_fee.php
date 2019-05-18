<?php

class Exam_fee extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('account/Exam_fee_model');
    }

    public function index()
    {
    }

    public function all_exam_fee()
    {
        $this->config->load('pagination');
        $this->load->library("pagination");
        $config = array();
        $config["base_url"] = base_url() . "account/exam_fee/all_exam_fee";

        $student_id = $this->input->post('student_id');
        $year = $this->input->post('year');
        $class_id = $this->input->post('class_id');

        if ($student_id) {
            $result = $this->Exam_fee_model->countAllByLikeCondition("account_exam_fee.student_id", $student_id);
            $config["total_rows"] = $result->count_total_rows;
        } else if ($year) {
            $result = $this->Exam_fee_model->countAllByWhereCondition("account_exam_fee.year", $year);
            $config["total_rows"] = $result->count_total_rows;
        } else if ($class_id) {
            $result = $this->Exam_fee_model->countAllByWhereCondition("account_exam_fee.class_id", $class_id);
            $config["total_rows"] = $result->count_total_rows;
        } else {
            $result = $this->Exam_fee_model->countAll();
            $config["total_rows"] = $result->count_total_rows;
        }

        $config['per_page'] = 10;
        $config['uri_segment'] = 4;
        $config['num_links'] = 2;
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;


        if ($student_id) {
            $data["exam_fee"] = $this->Exam_fee_model->select_exam_fee_by_student_id($config["per_page"], $page, $student_id);
        } else if ($year) {
            $data["exam_fee"] = $this->Exam_fee_model->select_exam_fee_by_year($config["per_page"], $page, $year);
        } else if ($class_id) {
            $data["exam_fee"] = $this->Exam_fee_model->select_exam_fee_by_class_id($config["per_page"], $page, $class_id);
        } else {
            $data["exam_fee"] = $this->Exam_fee_model->select_all_exam_fee($config["per_page"], $page);
        }

        $data["links"] = $this->pagination->create_links();
        if ($this->input->is_ajax_request()) {
            $data['class'] = $this->Main_model->getValue("", 'master_class', '*', "ID DESC");
            $data['year'] = $this->Main_model->getValue("", 'master_year', '*', "ID DESC");
            $this->load->view('exam_fee/per_page_exam_fee', $data);
        } else {
            $data['class'] = $this->Main_model->getValue("", 'master_class', '*', "ID DESC");
            $data['year'] = $this->Main_model->getValue("", 'master_year', '*', "ID DESC");
            $this->load->view('exam_fee/exam_fee_tpl', $data);
        }
    }

    public function load_add_exam_fee_from()
    {
        $data['academic_exam'] = $this->Main_model->getValue("status='1'", 'master_academic_exam', '*', "ID DESC");
        $this->load->view('account/exam_fee/exam_fee_from', $data);
    }

    public function create_exam_fee()
    {
        $student_id = $this->input->post('student_id');
        $academic_exam_id = $this->input->post('academic_exam_id');
        $year = date('Y');
        $get_data = $this->Exam_fee_model->select_current_student_info($student_id, $year);
        $class_id = $get_data->class_id;
        $shift_id = $get_data->shift_id;
        $section_id = $get_data->section_id;
        $user_name = $this->session->userdata('user_name');
        $data = array(
            'student_id' => $this->input->post('student_id'),
            'class_id' => $class_id,
            'shift_id' => $shift_id,
            'section_id' => $section_id,
            'year' => date("Y"),
            'academic_exam_id' => $academic_exam_id,
            'amount' => $this->input->post('amount'),
            'payment_date' => date("Y-m-d"),
            'user_id' => $user_name,
            'status' => '1'
        );
        $result = $this->Main_model->insertData($data, 'account_exam_fee');
        if ($result) {
            $msg['load_success_message'] = "Exam fee successfully added.";
            $this->load->view('messages/success_message', $msg);
        }
    }


    public function load_update_exam_fee_from($id)
    {
        $data['exam_fee'] = $this->Main_model->getValue("id = '$id'", 'account_exam_fee', '*', "ID DESC");
        $this->load->view('account/exam_fee/update_exam_fee_from', $data);
    }

    public function update_exam_fee()
    {
        $id = $this->input->post('id');
        $user_name = $this->session->userdata('user_name');
        $data = array(
            'student_id' => $this->input->post('student_id'),
            'amount' => $this->input->post('amount'),
            'user_id' => $user_name,
            'status	' => '2'
        );
        $result = $this->Main_model->updateData($data, "account_exam_fee", "id='$id'");
        if ($result) {
            $msg['load_success_message'] = "Exam fee successfully updated.";
            $this->load->view('messages/success_message', $msg);
        }
    }


    public function create_pdf($year, $student_id,$academic_exam_id)
    {
        error_reporting('E_NONE');
        $this->load->library('mpdf/mpdf');
//        $mpdf = new mPDF('', 'A4', 11, 'nikosh');
        $mpdf = new mPDF('', 'A4-L', 11, 'nikosh');
        $data['call_function'] = $this;
        $data['student_info'] = $this->Exam_fee_model->select_student_info_by_id($student_id,$academic_exam_id);
        $data['exam_fee'] = $this->Main_model->getValue("year = '$year'", 'master_exam_fee', '*', "ID DESC");
        $html = $this->load->view('account/exam_fee/money_receipt_pdf', $data, true);
        $mpdf->SetHtmlHeader('');
        $mpdf->WriteHTML($html);
        $mpdf->Output('Exam money receipt.pdf', 'D');
        exit;
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