<?php

class Research_and_publication extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('hr/research_and_publication_model');
    }

    public function index()
    {
    }

    public function all_research_and_publication()
    {
        $this->config->load('pagination');
        $this->load->library("pagination");
        $config = array();
        $config["base_url"] = base_url() . "hr/research_and_publication/all_research_and_publication";

        $emp_id = $this->input->post('emp_id');

        if ($emp_id) {
            $result = $this->research_and_publication_model->countAllByLikeCondition("hr_research_and_publication.emp_id", $emp_id);
            $config["total_rows"] = $result->count_total_rows;
        } else {
            $result = $this->research_and_publication_model->countAll();
            $config["total_rows"] = $result->count_total_rows;
        }

        $config['per_page'] = 5;
        $config['uri_segment'] = 4;
        $config['num_links'] = 2;
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;

        if ($emp_id) {
            $data["research_and_publication"] = $this->research_and_publication_model->select_research_and_publication_by_emp_id($config["per_page"], $page, $emp_id);
        } else {
            $data["research_and_publication"] = $this->research_and_publication_model->select_research_and_publication($config["per_page"], $page);
        }

        $data["links"] = $this->pagination->create_links();
        if ($this->input->is_ajax_request()) {
            $this->load->view('research_and_publication/per_page_research_and_publication', $data);
        } else {
            $this->load->view('research_and_publication/research_and_publication_tpl', $data);
        }
    }

    public function load_add_research_and_publication_from()
    {
        $this->load->view('hr/research_and_publication/research_and_publication_from');
    }

    public function create_research_and_publication()
    {
        $total_fields = $this->input->post('total_num_of_fields');
        $emp_id = $this->input->post('emp_id');
        $title_article = $this->input->post('title_article');
        $journal_name = $this->input->post('journal_name');
        $publish_by = $this->input->post('publish_by');
        $journal_type = $this->input->post('journal_type');
        $country = $this->input->post('country');
        $issn_number = $this->input->post('issn_number');
        $published_date = $this->input->post('published_date');

        for ($i = 0; $i < $total_fields; $i++) {
            $data = array(
                'emp_id' => $emp_id[$i],
                'title_article' => $title_article[$i],
                'journal_name' => $journal_name[$i],
                'publish_by' => $publish_by[$i],
                'journal_type' => $journal_type[$i],
                'country' => $country[$i],
                'issn_number' => $issn_number[$i],
                'published_date' => $published_date[$i]
            );
            $result = $this->Main_model->insertData($data, 'hr_research_and_publication');
        }
        if ($result) {
            $msg['load_success_message'] = "Research and publication successfully added.";
            $this->load->view('messages/success_message', $msg);
        }
        
    }

    public function load_update_research_and_publication_from($emp_id)
    {
        $data['research_and_publication'] = $this->Main_model->getValue("emp_id='$emp_id'", 'hr_research_and_publication', '*', "ID DESC");
        $this->load->view('hr/research_and_publication/update_research_and_publication_from', $data);
    }

    public function update_research_and_publication()
    {
        $id = $this->input->post('id');
        $total_fields = $this->input->post('total_num_of_fields');
        $emp_id = $this->input->post('emp_id');
        $title_article = $this->input->post('title_article');
        $journal_name = $this->input->post('journal_name');
        $publish_by = $this->input->post('publish_by');
        $journal_type = $this->input->post('journal_type');
        $country = $this->input->post('country');
        $issn_number = $this->input->post('issn_number');
        $published_date = $this->input->post('published_date');

        for ($i = 0; $i < $total_fields; $i++) {
            $set_id = $id[$i];
            $data = array(
                'emp_id' => $emp_id[$i],
                'title_article' => $title_article[$i],
                'journal_name' => $journal_name[$i],
                'publish_by' => $publish_by[$i],
                'journal_type' => $journal_type[$i],
                'country' => $country[$i],
                'issn_number' => $issn_number[$i],
                'published_date' => $published_date[$i]
            );
            $result = $this->Main_model->updateData($data, "hr_research_and_publication", "id='$set_id'");
       }
        if ($result) {
            $msg['load_success_message'] = "Research and publication update successfully.";
            $this->load->view('messages/success_message', $msg);
        }
    }

    public function load_details_research_and_publication_from($emp_id)
    {
        $data['research_and_publication'] = $this->research_and_publication_model->select_research_and_publication_by_id($emp_id);
        $this->load->view('hr/research_and_publication/details_research_and_publication_from', $data);
    }


}

?>