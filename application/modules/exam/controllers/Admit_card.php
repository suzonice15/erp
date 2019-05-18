<?php

class Admit_card extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('exam/Admit_card_model');
    }

    public function index()
    {
    }

    public function all_admit_card()
    {
        $data['academic_exam'] = $this->Main_model->getValue("status='1'", "master_academic_exam", "*", "ID DESC");
        $data['year'] = $this->Main_model->getValue("", "master_year", "*", "ID DESC");
        $this->load->view('admit_card/admit_card_tpl', $data);
    }

    public function view_admit_card()
    {
        $academic_exam_id = $this->input->post('academic_exam_id');
        $year = $this->input->post('year');
        $data['academic_exam_id'] = $academic_exam_id;
        $data['year'] = $year;
        $data['admit_card'] = $this->Admit_card_model->select_all_paid_student($academic_exam_id, $year);
        $this->load->view('exam/admit_card/view_admit_card', $data);
    }


    public function create_pdf($academic_exam_id, $year)
    {
        error_reporting('E_NONE');
        $this->load->library('mpdf/mpdf');
//      $mpdf = new mPDF('', 'A4', 11, 'nikosh');
        $mpdf = new mPDF('', 'A4-L', 11, 'nikosh');
        $data['call_function'] = $this;
        $data['admit_card'] = $this->Admit_card_model->select_all_paid_student($academic_exam_id, $year);
        $html = $this->load->view('exam/admit_card/admit_card_pdf', $data, true);
        $mpdf->SetHtmlHeader('');
        $mpdf->WriteHTML($html);
        $mpdf->Output('Admission money receipt.pdf', 'D');
        exit;
    }
}

?>