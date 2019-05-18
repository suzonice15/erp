<?php

class My_resume extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('hr/My_resume_model');
    }

    public function index()
    {
    }

    public function all_my_resume()
    {
        $emp_id = $this->session->userdata("user_name");
        $data['basic'] = $this->My_resume_model->select_basic_by_emp_id($emp_id);
        $data['job'] = $this->My_resume_model->select_job_by_emp_id($emp_id);
        $data['job_posting'] = $this->My_resume_model->select_job_posting_by_emp_id($emp_id);
        $data['family'] = $this->My_resume_model->select_family_by_emp_id($emp_id);
        $data['child'] = $this->My_resume_model->select_child_by_emp_id($emp_id);
        $data['academic'] = $this->My_resume_model->select_academic_by_emp_id($emp_id);
        $data['ward_and_honours'] = $this->My_resume_model->select_ward_and_honours_by_emp_id($emp_id);
        $data['co_curricular_activities'] = $this->My_resume_model->select_co_curricular_activities_by_emp_id($emp_id);
        $data['experience'] = $this->My_resume_model->select_experience_by_emp_id($emp_id);
        $data['nominee'] = $this->My_resume_model->select_nominee_by_emp_id($emp_id);
        $data['previous_job_history'] = $this->My_resume_model->select_previous_job_history_by_emp_id($emp_id);
        $data['reference'] = $this->My_resume_model->select_reference_by_emp_id($emp_id);
        $data['research_and_publication'] = $this->My_resume_model->select_research_and_publication_by_emp_id($emp_id);
        $data['training'] = $this->My_resume_model->select_training_by_emp_id($emp_id);
        $data['contact'] = $this->My_resume_model->select_contact_by_emp_id($emp_id);
        $data['contact1'] = $this->My_resume_model->select_contact_by_emp_id1($emp_id);
        $this->load->view('resume/my_resume_tpl', $data);
    }

    public function load_add_family_from()
    {
        $data['designation'] = $this->Main_model->getValue("", 'master_designation', '*', "ID DESC");
        $data['profession'] = $this->Main_model->getValue("", 'master_profession', '*', "ID DESC");
        $data['emp_id'] = $this->session->userdata('user_name');
        $this->load->view('hr/resume/family/family_from', $data);
    }

    public function create_family()
    {
        $total_fields = $this->input->post('total_num_of_fields');
        $emp_id = $this->input->post('emp_id');
        $spouse_name = $this->input->post('spouse_name');
        $profession_id = $this->input->post('profession_id');
        $organization = $this->input->post('organization');
        $designation_id = $this->input->post('designation_id');
        $contact_no = $this->input->post('contact_no');
        $total_family_members = $this->input->post('total_family_members');
        $no_of_other_dependents = $this->input->post('no_of_other_dependents');

        for ($i = 0; $i < $total_fields; $i++) {
            $data['emp_id'] = $emp_id;
            $data['spouse_name'] = $spouse_name[$i];
            $data['profession_id'] = $profession_id[$i];
            $data['organization'] = $organization[$i];
            $data['designation_id'] = $designation_id[$i];
            $data['contact_no'] = $contact_no[$i];
            $data['total_family_members'] = $total_family_members[$i];
            $data['no_of_other_dependents'] = $no_of_other_dependents[$i];
            $result = $this->Main_model->insertData($data, 'hr_family');
        }
        if ($result) {
            $msg['load_success_message'] = "Basic info successfully added.";
            $this->load->view('messages/success_message', $msg);
        }
    }

    public function load_update_family_from($id)
    {
        $data['designation'] = $this->Main_model->getValue("", 'master_designation', '*', "ID DESC");
        $data['profession'] = $this->Main_model->getValue("", 'master_profession', '*', "ID DESC");
        $data['family'] = $this->Main_model->getValue("id='$id'", 'hr_family', '*', "ID DESC");
        $this->load->view('hr/resume/family/update_family_from', $data);
    }

    public function update_family()
    {
        $id = $this->input->post('id');
        $data = array(
            'emp_id' => $this->input->post('emp_id'),
            'spouse_name' => $this->input->post('spouse_name'),
            'profession_id' => $this->input->post('profession_id'),
            'organization' => $this->input->post('organization'),
            'designation_id' => $this->input->post('designation_id'),
            'contact_no' => $this->input->post('contact_no'),
            'total_family_members' => $this->input->post('total_family_members'),
            'no_of_other_dependents' => $this->input->post('no_of_other_dependents')
        );
        $result = $this->Main_model->updateData($data, "hr_family", "id='$id'");
        if ($result) {
            $msg['load_success_message'] = "Emp family info update successfully.";
            $this->load->view('messages/success_message', $msg);
        }
    }

    public function load_add_child_from()
    {
        $data['gender'] = $this->Main_model->getValue("", 'master_gender', '*', "ID DESC");
        $data['profession'] = $this->Main_model->getValue("", 'master_profession', '*', "ID DESC");
        $data['emp_id'] = $this->session->userdata('user_name');
        $this->load->view('hr/resume/child/child_from', $data);
    }

    public function create_child()
    {
        $total_fields = $this->input->post('total_num_of_fields');
        $emp_id = $this->input->post('emp_id');
        $child_name = $this->input->post('child_name');
        $gender_id = $this->input->post('gender_id');
        $profession_id = $this->input->post('profession_id');
        $class = $this->input->post('class');
        $institute = $this->input->post('institute');

        for ($i = 0; $i < $total_fields; $i++) {
            $data['emp_id'] = $emp_id;
            $data['child_name'] = $child_name[$i];
            $data['profession_id'] = $profession_id[$i];
            $data['gender_id'] = $gender_id[$i];
            $data['class'] = $class[$i];
            $data['institute'] = $institute[$i];
            $result = $this->Main_model->insertData($data, 'hr_child');
        }
        if ($result) {
            $msg['load_success_message'] = "Child info successfully added.";
            $this->load->view('messages/success_message', $msg);
        }
    }

    public function load_update_child_from($id)
    {
        $data['gender'] = $this->Main_model->getValue("", 'master_gender', '*', "ID DESC");
        $data['profession'] = $this->Main_model->getValue("", 'master_profession', '*', "ID DESC");
        $data['child'] = $this->Main_model->getValue("id= '$id'", 'hr_child', '*', "ID DESC");
        $this->load->view('hr/resume/child/update_child_from', $data);
    }

    public function update_child()
    {
        $id = $this->input->post('id');
        $data = array(
            'emp_id' => $this->input->post('emp_id'),
            'child_name' => $this->input->post('child_name'),
            'profession_id' => $this->input->post('profession_id'),
            'gender_id' => $this->input->post('gender_id'),
            'class' => $this->input->post('class'),
            'institute' => $this->input->post('institute')
        );
        $result = $this->Main_model->updateData($data, "hr_child", "id='$id'");
        if ($result) {
            $msg['load_success_message'] = "Employee child info update successfully.";
            $this->load->view('messages/success_message', $msg);
        }
    }

    public function load_add_academic_from()
    {
        $data['exam_degree'] = $this->Main_model->getValue("", 'master_exam_degree', '*', "ID DESC");
        $data['study_group'] = $this->Main_model->getValue("", 'master_study_group', '*', "ID DESC");
        $data['board'] = $this->Main_model->getValue("", 'master_board', '*', "ID DESC");
        $data['exam_name'] = $this->Main_model->getValue("", 'master_exam_name', '*', "ID DESC");
        $data['emp_id'] = $this->session->userdata('user_name');
        $this->load->view('hr/resume/academic/academic_from', $data);
    }

    public function create_academic()
    {
        $total_fields = $this->input->post('total_num_of_fields');
        $emp_id = $this->input->post('emp_id');
        $exam_degree_id = $this->input->post('exam_degree_id');
        $grade_marks = $this->input->post('grade_marks');
        $academic_session = $this->input->post('academic_session');
        $year_of_passing = $this->input->post('year_of_passing');
        $institute = $this->input->post('institute');
        $study_group_id = $this->input->post('study_group_id');
        $board_id = $this->input->post('board_id');
        $exam_name_id = $this->input->post('exam_name_id');

        for ($i = 0; $i < $total_fields; $i++) {
            $data['emp_id'] = $emp_id;
            $data['exam_degree_id'] = $exam_degree_id[$i];
            $data['grade_marks'] = $grade_marks[$i];
            $data['academic_session'] = $academic_session[$i];
            $data['year_of_passing'] = $year_of_passing[$i];
            $data['institute'] = $institute[$i];
            $data['study_group_id'] = $study_group_id[$i];
            $data['board_id'] = $board_id[$i];
            $data['exam_name_id'] = $exam_name_id[$i];
            $result = $this->Main_model->insertData($data, 'hr_academic');
        }
        if ($result) {
            $msg['load_success_message'] = "Academic info successfully added.";
            $this->load->view('messages/success_message', $msg);
        }
    }

    public function load_update_academic_from($id)
    {
        $data['exam_degree'] = $this->Main_model->getValue("", 'master_exam_degree', '*', "ID DESC");
        $data['study_group'] = $this->Main_model->getValue("", 'master_study_group', '*', "ID DESC");
        $data['board'] = $this->Main_model->getValue("", 'master_board', '*', "ID DESC");
        $data['exam_name'] = $this->Main_model->getValue("", 'master_exam_name', '*', "ID DESC");
        $data['academic'] = $this->Main_model->getValue("id= '$id'", 'hr_academic', '*', "ID DESC");
        $this->load->view('hr/resume/academic/update_academic_from', $data);
    }

    public function update_academic()
    {
        $id = $this->input->post('id');
        $data = array(
            'emp_id' => $this->input->post('emp_id'),
            'exam_degree_id' => $this->input->post('exam_degree_id'),
            'grade_marks' => $this->input->post('grade_marks'),
            'academic_session' => $this->input->post('academic_session'),
            'year_of_passing' => $this->input->post('year_of_passing'),
            'institute' => $this->input->post('institute'),
            'study_group_id' => $this->input->post('study_group_id'),
            'board_id' => $this->input->post('board_id'),
            'exam_name_id' => $this->input->post('exam_name_id')
        );
        $result = $this->Main_model->updateData($data, "hr_academic", "id='$id'");
        if ($result) {
            $msg['load_success_message'] = "Employee academic info update successfully.";
            $this->load->view('messages/success_message', $msg);
        }
    }

    public function load_add_ward_and_honours_from()
    {
        $data['emp_id'] = $this->session->userdata('user_name');
        $this->load->view('hr/resume/ward_and_honours/ward_and_honours_from', $data);
    }

    public function create_ward_and_honours()
    {
        $total_fields = $this->input->post('total_num_of_fields');
        $emp_id = $this->input->post('emp_id');
        $award_honors_title = $this->input->post('award_honors_title');
        $awards_type = $this->input->post('awards_type');
        $country = $this->input->post('country');
        $receiving_date = $this->input->post('receiving_date');
        $organization_name = $this->input->post('organization_name');

        for ($i = 0; $i < $total_fields; $i++) {
            $data['emp_id'] = $emp_id;
            $data['award_honors_title'] = $award_honors_title[$i];
            $data['awards_type'] = $awards_type[$i];
            $data['country'] = $country[$i];
            $data['receiving_date'] = $receiving_date[$i];
            $data['organization_name'] = $organization_name[$i];
            $result = $this->Main_model->insertData($data, 'hr_award_and_honors');
        }
        if ($result) {
            $msg['load_success_message'] = "Award/honors info successfully added.";
            $this->load->view('messages/success_message', $msg);
        }
    }

    public function load_update_ward_and_honours_from($id)
    {
        $data['award_and_honours'] = $this->Main_model->getValue("id= '$id'", 'hr_award_and_honors', '*', "ID DESC");
        $this->load->view('hr/resume/ward_and_honours/update_ward_and_honours_from', $data);
    }

    public function update_ward_and_honours()
    {
        $id = $this->input->post('id');
        $data = array(
            'emp_id' => $this->input->post('emp_id'),
            'award_honors_title' => $this->input->post('award_honors_title'),
            'awards_type' => $this->input->post('awards_type'),
            'country' => $this->input->post('country'),
            'receiving_date' => $this->input->post('receiving_date'),
            'organization_name' => $this->input->post('organization_name')
        );
        $result = $this->Main_model->updateData($data, "hr_award_and_honors", "id='$id'");
        if ($result) {
            $msg['load_success_message'] = "Award / Honours update successfully.";
            $this->load->view('messages/success_message', $msg);
        }
    }

    public function load_add_co_curricular_activities_from()
    {
        $data['emp_id'] = $this->session->userdata('user_name');
        $this->load->view('hr/resume/co_curricular_activities/co_curricular_activities_from', $data);
    }

    public function create_co_curricular_activities()
    {
        $data = array(
            'emp_id' => $this->input->post('emp_id'),
            'description' => $this->input->post('description')
        );
        $result = $this->Main_model->insertData($data, 'hr_co_curricular_activities');

        if ($result) {
            $msg['load_success_message'] = "Co-curricular activities info successfully added.";
            $this->load->view('messages/success_message', $msg);
        }
    }

    public function load_update_co_curricular_activities_from($id)
    {
        $data['co_curricular_activities'] = $this->Main_model->getValue("id= '$id'", 'hr_co_curricular_activities', '*', "ID DESC");
        $this->load->view('hr/resume/co_curricular_activities/update_co_curricular_activities_from', $data);
    }

    public function update_co_curricular_activities()
    {
        $id = $this->input->post('id');
        $data = array(
            'emp_id' => $this->input->post('emp_id'),
            'description' => $this->input->post('description')
        );
        $result = $this->Main_model->updateData($data, "hr_co_curricular_activities", "id='$id'");
        if ($result) {
            $msg['load_success_message'] = "Co-curricular activities update successfully.";
            $this->load->view('messages/success_message', $msg);
        }
    }

    public function load_add_experience_from()
    {
        $data['emp_id'] = $this->session->userdata('user_name');
        $this->load->view('hr/resume/experience/experience_from', $data);
    }

    public function create_experience()
    {
        $total_fields = $this->input->post('total_num_of_fields');
        $emp_id = $this->input->post('emp_id');
        $institute = $this->input->post('institute');
        $business = $this->input->post('business');
        $department = $this->input->post('department');
        $joined_on = $this->input->post('joined_on');
        $release_on = $this->input->post('release_on');
        $duration = $this->input->post('duration');
        $area_of_concentration = $this->input->post('area_of_concentration');
        $position_hold = $this->input->post('position_hold');
        $job_details = $this->input->post('job_details');

        for ($i = 0; $i < $total_fields; $i++) {
            $data = array(
                'emp_id' => $emp_id,
                'institute' => $institute[$i],
                'business' => $business[$i],
                'department' => $department[$i],
                'joined_on' => $joined_on[$i],
                'release_on' => $release_on[$i],
                'duration' => $duration[$i],
                'area_of_concentration' => $area_of_concentration[$i],
                'position_hold' => $position_hold[$i],
                'job_details' => $job_details[$i]
            );
            $result = $this->Main_model->insertData($data, 'hr_experience');
        }
        if ($result) {
            $msg['load_success_message'] = "Experience info successfully added.";
            $this->load->view('messages/success_message', $msg);
        }
    }


    public function load_update_experience_from($id)
    {
        $data['experience'] = $this->Main_model->getValue("id= '$id'", 'hr_experience', '*', "ID DESC");
        $this->load->view('hr/resume/experience/update_experience_from', $data);
    }

    public function update_experience()
    {
        $id = $this->input->post('id');
        $data = array(
            'emp_id' => $this->input->post('emp_id'),
            'institute' => $this->input->post('institute'),
            'business' => $this->input->post('business'),
            'department' => $this->input->post('department'),
            'joined_on' => $this->input->post('joined_on'),
            'release_on' => $this->input->post('release_on'),
            'duration' => $this->input->post('duration'),
            'area_of_concentration' => $this->input->post('area_of_concentration'),
            'position_hold' => $this->input->post('position_hold'),
            'job_details' => $this->input->post('job_details')
        );
        $result = $this->Main_model->updateData($data, "hr_experience", "id='$id'");
        if ($result) {
            $msg['load_success_message'] = "Experience update successfully.";
            $this->load->view('messages/success_message', $msg);
        }
    }

    public function load_add_previous_job_history_from()
    {
        $data['emp_id'] = $this->session->userdata('user_name');
        $this->load->view('hr/resume/previous_job_history/previous_job_history_from', $data);
    }

    public function create_previous_job_history()
    {
        $total_fields = $this->input->post('total_num_of_fields');
        $emp_id = $this->input->post('emp_id');
        $organization_name = $this->input->post('organization_name');
        $position = $this->input->post('position');
        $job_type = $this->input->post('job_type');
        $from_date = $this->input->post('from_date');
        $to_date = $this->input->post('to_date');
        $duration = $this->input->post('duration');
        $address = $this->input->post('address');

        for ($i = 0; $i < $total_fields; $i++) {
            $data = array(
                'emp_id' => $emp_id,
                'organization_name' => $organization_name[$i],
                'position' => $position[$i],
                'job_type' => $job_type[$i],
                'from_date' => $from_date[$i],
                'to_date' => $to_date[$i],
                'duration' => $duration[$i],
                'address' => $address[$i]
            );
            $result = $this->Main_model->insertData($data, 'hr_previous_job_history');
        }
        if ($result) {
            $msg['load_success_message'] = "Previous job info successfully added.";
            $this->load->view('messages/success_message', $msg);
        }
    }

    public function load_update_previous_job_history_from($id)
    {
        $data['previous_job_history'] = $this->Main_model->getValue("id= '$id'", 'hr_previous_job_history', '*', "ID DESC");
        $this->load->view('hr/resume/previous_job_history/update_previous_job_history_from', $data);
    }

    public function update_previous_job_history()
    {
        $id = $this->input->post('id');
        $emp_id = $this->input->post('emp_id');
        $organization_name = $this->input->post('organization_name');
        $position = $this->input->post('position');
        $job_type = $this->input->post('job_type');
        $from_date = $this->input->post('from_date');
        $to_date = $this->input->post('to_date');
        $duration = $this->input->post('duration');
        $address = $this->input->post('address');
        $data = array(
            'emp_id' => $emp_id,
            'organization_name' => $organization_name,
            'position' => $position,
            'job_type' => $job_type,
            'from_date' => $from_date,
            'to_date' => $to_date,
            'duration' => $duration,
            'address' => $address
        );
        $result = $this->Main_model->updateData($data, "hr_previous_job_history", "id='$id'");
        if ($result) {
            $msg['load_success_message'] = "Previous job history successfully updated.";
            $this->load->view('messages/success_message', $msg);
        }
    }

    public function load_add_reference_from()
    {
        $data['emp_id'] = $this->session->userdata('user_name');
        $this->load->view('hr/resume/reference/reference_from', $data);
    }

    public function create_reference()
    {
        $total_fields = $this->input->post('total_num_of_fields');
        $emp_id = $this->input->post('emp_id');
        $name = $this->input->post('name');
        $designation = $this->input->post('designation');
        $organization = $this->input->post('organization');
        $address = $this->input->post('address');
        $email = $this->input->post('email');
        $phone = $this->input->post('phone');
        $mobile = $this->input->post('mobile');

        for ($i = 0; $i < $total_fields; $i++) {
            $data = array(
                'emp_id' => $emp_id,
                'name' => $name[$i],
                'designation' => $designation[$i],
                'organization' => $organization[$i],
                'address' => $address[$i],
                'email' => $email[$i],
                'phone' => $phone[$i],
                'mobile' => $mobile[$i]
            );
            $result = $this->Main_model->insertData($data, 'hr_reference');
        }
        if ($result) {
            $msg['load_success_message'] = "Reference info successfully added.";
            $this->load->view('messages/success_message', $msg);
        }
    }

    public function load_update_reference_from($id)
    {
        $data['reference'] = $this->Main_model->getValue("id='$id'", 'hr_reference', '*', "ID DESC");
        $this->load->view('hr/resume/reference/update_reference_from', $data);
    }

    public function update_reference()
    {
        $id = $this->input->post('id');
        $emp_id = $this->input->post('emp_id');
        $name = $this->input->post('name');
        $designation = $this->input->post('designation');
        $organization = $this->input->post('organization');
        $address = $this->input->post('address');
        $email = $this->input->post('email');
        $phone = $this->input->post('phone');
        $mobile = $this->input->post('mobile');

        $data = array(
            'emp_id' => $emp_id,
            'name' => $name,
            'designation' => $designation,
            'organization' => $organization,
            'address' => $address,
            'email' => $email,
            'phone' => $phone,
            'mobile' => $mobile
        );
        $result = $this->Main_model->updateData($data, "hr_reference", "id='$id'");
        if ($result) {
            $msg['load_success_message'] = "Reference info update successfully.";
            $this->load->view('messages/success_message', $msg);
        }
    }

    public function load_add_research_and_publication_from()
    {
        $data['emp_id'] = $this->session->userdata('user_name');
        $this->load->view('hr/resume/research_and_publication/research_and_publication_from', $data);
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
                'emp_id' => $emp_id,
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

    public function load_update_research_and_publication_from($id)
    {
        $data['research_and_publication'] = $this->Main_model->getValue("id='$id'", 'hr_research_and_publication', '*', "ID DESC");
        $this->load->view('hr/resume/research_and_publication/update_research_and_publication_from', $data);
    }

    public function update_research_and_publication()
    {
        $id = $this->input->post('id');
        $emp_id = $this->input->post('emp_id');
        $title_article = $this->input->post('title_article');
        $journal_name = $this->input->post('journal_name');
        $publish_by = $this->input->post('publish_by');
        $journal_type = $this->input->post('journal_type');
        $country = $this->input->post('country');
        $issn_number = $this->input->post('issn_number');
        $published_date = $this->input->post('published_date');

        $data = array(
            'emp_id' => $emp_id,
            'title_article' => $title_article,
            'journal_name' => $journal_name,
            'publish_by' => $publish_by,
            'journal_type' => $journal_type,
            'country' => $country,
            'issn_number' => $issn_number,
            'published_date' => $published_date
        );
        $result = $this->Main_model->updateData($data, "hr_research_and_publication", "id='$id'");

        if ($result) {
            $msg['load_success_message'] = "Research and publication update successfully.";
            $this->load->view('messages/success_message', $msg);
        }
    }

    public function load_add_training_from()
    {
        $data['emp_id'] = $this->session->userdata('user_name');
        $this->load->view('hr/resume/training/training_from', $data);
    }

    public function create_training()
    {
        $total_fields = $this->input->post('total_num_of_fields');
        $emp_id = $this->input->post('emp_id');
        $training_title = $this->input->post('training_title');
        $topics_covered = $this->input->post('topics_covered');
        $institute = $this->input->post('institute');
        $country = $this->input->post('country');
        $location = $this->input->post('location');
        $duration = $this->input->post('duration');

        for ($i = 0; $i < $total_fields; $i++) {
            $data = array(
                'emp_id' => $emp_id,
                'training_title' => $training_title[$i],
                'topics_covered' => $topics_covered[$i],
                'institute' => $institute[$i],
                'country' => $country[$i],
                'location' => $location[$i],
                'duration' => $duration[$i]
            );
            $result = $this->Main_model->insertData($data, 'hr_training');
        }
        if ($result) {
            $msg['load_success_message'] = "Training successfully added.";
            $this->load->view('messages/success_message', $msg);
        }
    }

    public function load_update_training_from($id)
    {
        $data['training'] = $this->Main_model->getValue("id='$id'", 'hr_training', '*', "ID DESC");
        $this->load->view('hr/resume/training/update_training_from', $data);
    }

    public function update_training()
    {
        $id = $this->input->post('id');
        $emp_id = $this->input->post('emp_id');
        $training_title = $this->input->post('training_title');
        $topics_covered = $this->input->post('topics_covered');
        $institute = $this->input->post('institute');
        $country = $this->input->post('country');
        $location = $this->input->post('location');
        $duration = $this->input->post('duration');
        $data = array(
            'emp_id' => $emp_id,
            'training_title' => $training_title,
            'topics_covered' => $topics_covered,
            'institute' => $institute,
            'country' => $country,
            'location' => $location,
            'duration' => $duration
        );
        $result = $this->Main_model->updateData($data, "hr_training", "id='$id'");
        if ($result) {
            $msg['load_success_message'] = "Training update successfully.";
            $this->load->view('messages/success_message', $msg);
        }
    }

    public function load_add_contact_from()
    {
        $data['emp_id'] = $this->session->userdata('user_name');
        $data['division'] = $this->Main_model->getValue("", 'master_division', '*', "ID DESC");
        $data['permanent_division'] = $this->Main_model->getValue("", 'master_division', '*', "ID DESC");
        $this->load->view('hr/resume/contact/contact_from', $data);
    }

    public function create_contact()
    {
        $data = array(
            'emp_id' => $this->input->post('emp_id'),
            'present_address' => $this->input->post('present_address'),
            'present_post_office' => $this->input->post('present_post_office'),
            'present_post_code' => $this->input->post('present_post_code'),
            'present_division_id' => $this->input->post('present_division_id'),
            'present_district_id' => $this->input->post('present_district_id'),
            'present_thana_id' => $this->input->post('present_thana_id'),
            'present_email' => $this->input->post('present_email'),
            'present_phone' => $this->input->post('present_phone'),
            'present_mobile' => $this->input->post('present_mobile'),
            'is_address_same' => $this->input->post('is_address_same'),
            'permanent_address' => $this->input->post('permanent_address'),
            'permanent_post_office' => $this->input->post('permanent_post_office'),
            'permanent_post_code' => $this->input->post('permanent_post_code'),
            'permanent_division_id' => $this->input->post('permanent_division_id'),
            'permanent_district_id' => $this->input->post('permanent_district_id'),
            'permanent_thana_id' => $this->input->post('permanent_thana_id'),
            'permanent_email' => $this->input->post('permanent_email'),
            'permanent_phone' => $this->input->post('permanent_phone'),
            'permanent_mobile' => $this->input->post('permanent_mobile'),
        );
        $result = $this->Main_model->insertData($data, 'hr_contact');

        if ($result) {
            $msg['load_success_message'] = "Contact info successfully added.";
            $this->load->view('messages/success_message', $msg);
        }
    }

    public function load_update_contact_from($id)
    {
        $data['division'] = $this->Main_model->getValue("", 'master_division', '*', "ID DESC");
        $data['permanent_division'] = $this->Main_model->getValue("", 'master_division', '*', "ID DESC");
        $data['contact'] = $this->Main_model->getValue("id= '$id'", 'hr_contact', '*', "ID DESC");
        $this->load->view('hr/contact/update_contact_from', $data);
    }

    public function update_contact()
    {
        $id = $this->input->post('id');
        $data = array(
            'emp_id' => $this->input->post('emp_id'),
            'present_address' => $this->input->post('present_address'),
            'present_post_office' => $this->input->post('present_post_office'),
            'present_post_code' => $this->input->post('present_post_code'),
            'present_division_id' => $this->input->post('present_division_id'),
            'present_district_id' => $this->input->post('present_district_id'),
            'present_thana_id' => $this->input->post('present_thana_id'),
            'present_email' => $this->input->post('present_email'),
            'present_phone' => $this->input->post('present_phone'),
            'present_mobile' => $this->input->post('present_mobile'),
            'is_address_same' => $this->input->post('is_address_same'),
            'permanent_address' => $this->input->post('permanent_address'),
            'permanent_post_office' => $this->input->post('permanent_post_office'),
            'permanent_post_code' => $this->input->post('permanent_post_code'),
            'permanent_division_id' => $this->input->post('permanent_division_id'),
            'permanent_district_id' => $this->input->post('permanent_district_id'),
            'permanent_thana_id' => $this->input->post('permanent_thana_id'),
            'permanent_email' => $this->input->post('permanent_email'),
            'permanent_phone' => $this->input->post('permanent_phone'),
            'permanent_mobile' => $this->input->post('permanent_mobile'),
        );
        $result = $this->Main_model->updateData($data, "hr_contact", "id='$id'");
        if ($result) {
            $msg['load_success_message'] = "Contact info update successfully.";
            $this->load->view('messages/success_message', $msg);
        }
    }

    public function load_details_contact_from($id)
    {
        $data['contact'] = $this->Contact_model->select_contact_by_id($id);
        $this->load->view('hr/contact/details_contact_from', $data);
    }

    function select_district($division_id)
    {
        $array = $this->Main_model->getValue("division_id = '$division_id'", 'master_district', '*', "ID DESC");
        $str = "";
        $str .= '<select name="present_division_id" id="present_division_id">
				<option value="">--- Select District ---</option>';
        if (!empty($array)):
            foreach ($array as $row):
                $str .= '<option value="' . $row->id . '">' . $row->district_name . '</option>';
            endforeach;
        endif;
        $str .= '</select>';
        echo $str;
    }

    function select_thana($division_id, $district_id)
    {
        $array = $this->Main_model->getValue("division_id = '$division_id' and district_id = '$district_id'", 'master_thana', '*', "ID DESC");
        $str = "";
        $str .= '<select name="present_thana_id" id="present_thana_id">
				<option value="">--- Select District ---</option>';
        if (!empty($array)):
            foreach ($array as $row):
                $str .= '<option value="' . $row->id . '">' . $row->thana_name . '</option>';
            endforeach;
        endif;
        $str .= '</select>';
        echo $str;
    }

}

?>