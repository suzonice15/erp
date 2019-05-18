<?php

class Resume_Model extends CI_Model
{
    function countAllByLikeCondition($field, $cond)
    {
        $this->db->select('count(hr_basic.emp_id) count_total_rows');
        $this->db->where('hr_job.emp_id = hr_basic.emp_id');
        $this->db->where('hr_job.status', 1);
        $this->db->like($field, $cond, 'after');
        $query_result = $this->db->get('hr_basic,hr_job');
        $result = $query_result->row();
        return $result;
    }

    function countAll()
    {
        $this->db->select('count(hr_basic.emp_id) count_total_rows');
        $this->db->where('hr_job.emp_id = hr_basic.emp_id');
        $this->db->where('hr_job.status', 1);
        $query_result = $this->db->get('hr_basic,hr_job');
        $result = $query_result->row();
        return $result;
    }

    public function select_resume($limit, $start)
    {
        $this->db->limit($limit, $start);
        $this->db->select('hr_basic.*,master_gender.gender_name,master_division.division_name,master_district.district_name,master_thana.thana_name,master_blood_group.blood_group_name,master_religion.religion_name,master_freedom_fighter_relation.relation_name');
        $this->db->where('hr_job.emp_id = hr_basic.emp_id');
        $this->db->where('hr_job.status', 1);
        $this->db->join('master_gender', 'master_gender.id = hr_basic.gender_id', 'LEFT');
        $this->db->join('master_division', 'master_division.id = hr_basic.division_id', 'LEFT');
        $this->db->join('master_district', 'master_district.id = hr_basic.district_id', 'LEFT');
        $this->db->join('master_thana', 'master_thana.id = hr_basic.thana_id', 'LEFT');
        $this->db->join('master_blood_group', 'master_blood_group.id = hr_basic.blood_group_id', 'LEFT');
        $this->db->join('master_religion', 'master_religion.id = hr_basic.religion_id', 'LEFT');
        $this->db->join('master_freedom_fighter_relation', 'master_freedom_fighter_relation.id = hr_basic.freedom_fighter_relation_id', 'LEFT');
        $this->db->order_by('hr_basic.emp_id', "ASC");
        $query_result = $this->db->get('hr_basic,hr_job');
        $result = $query_result->result();
        return $result;
    }

    public function select_resume_by_emp_id($limit, $start, $emp_id)
    {
        $this->db->limit($limit, $start);
        $this->db->select('hr_basic.*,master_gender.gender_name,master_division.division_name,master_district.district_name,master_thana.thana_name,master_blood_group.blood_group_name,master_religion.religion_name,master_freedom_fighter_relation.relation_name');
        $this->db->where('hr_job.emp_id = hr_basic.emp_id');
        $this->db->where('hr_job.status', 1);
        $this->db->like('hr_basic.emp_id', $emp_id, 'after');
        $this->db->join('master_gender', 'master_gender.id = hr_basic.gender_id', 'LEFT');
        $this->db->join('master_division', 'master_division.id = hr_basic.division_id', 'LEFT');
        $this->db->join('master_district', 'master_district.id = hr_basic.district_id', 'LEFT');
        $this->db->join('master_thana', 'master_thana.id = hr_basic.thana_id', 'LEFT');
        $this->db->join('master_blood_group', 'master_blood_group.id = hr_basic.blood_group_id', 'LEFT');
        $this->db->join('master_religion', 'master_religion.id = hr_basic.religion_id', 'LEFT');
        $this->db->join('master_freedom_fighter_relation', 'master_freedom_fighter_relation.id = hr_basic.freedom_fighter_relation_id', 'LEFT');
        $query_result = $this->db->get('hr_basic,hr_job');
        $result = $query_result->result();
        return $result;
    }

    public function select_basic_by_emp_id($emp_id)
    {
        $this->db->select('hr_basic.*,master_gender.gender_name,master_division.division_name,master_district.district_name,master_thana.thana_name,master_blood_group.blood_group_name,master_religion.religion_name,master_freedom_fighter_relation.relation_name');
        $this->db->where('hr_basic.emp_id', $emp_id);
        $this->db->join('master_gender', 'master_gender.id = hr_basic.gender_id', 'LEFT');
        $this->db->join('master_division', 'master_division.id = hr_basic.division_id', 'LEFT');
        $this->db->join('master_district', 'master_district.id = hr_basic.district_id', 'LEFT');
        $this->db->join('master_thana', 'master_thana.id = hr_basic.thana_id', 'LEFT');
        $this->db->join('master_blood_group', 'master_blood_group.id = hr_basic.blood_group_id', 'LEFT');
        $this->db->join('master_religion', 'master_religion.id = hr_basic.religion_id', 'LEFT');
        $this->db->join('master_freedom_fighter_relation', 'master_freedom_fighter_relation.id = hr_basic.freedom_fighter_relation_id', 'LEFT');
        $query_result = $this->db->get('hr_basic');
        $result = $query_result->result();
        return $result;
    }

    public function select_job_by_emp_id($emp_id)
    {
        $this->db->select('hr_job.*,master_department.department_name, master_shift.shift_name, master_section.section_name, master_designation.designation_name');
        $this->db->where('emp_id', $emp_id);
        $this->db->join('master_department', 'master_department.id = hr_job.department_id', 'LEFT');
        $this->db->join('master_shift', 'master_shift.id = hr_job.shift_id', 'LEFT');
        $this->db->join('master_section', 'master_section.id = hr_job.section_id', 'LEFT');
        $this->db->join('master_designation', 'master_designation.id = hr_job.designation_id', 'LEFT');
        $this->db->order_by('hr_job.id', 'ASC');
        $query_result = $this->db->get('hr_job');
        $result = $query_result->result();
        return $result;
    }

    public function select_job_posting_by_emp_id($emp_id)
    {
        $this->db->select('hr_job_posting.*,master_department.department_name, master_shift.shift_name, master_section.section_name, master_designation.designation_name');
        $this->db->where('hr_job.emp_id = hr_job_posting.emp_id');
        $this->db->where('hr_job.status', 1);
        $this->db->where('hr_job_posting.emp_id', $emp_id);
        $this->db->join('master_department', 'master_department.id = hr_job_posting.department_id', 'LEFT');
        $this->db->join('master_shift', 'master_shift.id = hr_job_posting.shift_id', 'LEFT');
        $this->db->join('master_section', 'master_section.id = hr_job_posting.section_id', 'LEFT');
        $this->db->join('master_designation', 'master_designation.id = hr_job_posting.designation_id', 'LEFT');
        $this->db->order_by('hr_job_posting.emp_id', 'ASC');
        $query_result = $this->db->get('hr_job_posting,hr_job');
        $result = $query_result->result();
        return $result;
    }

    public function select_family_by_emp_id($emp_id)
    {
        $this->db->select('hr_family.*,master_profession.profession_name, master_designation.designation_name');
        $this->db->where('hr_job.emp_id = hr_family.emp_id');
        $this->db->where('hr_job.status', 1);
        $this->db->where('hr_family.emp_id', $emp_id);
        $this->db->join('master_profession', 'master_profession.id = hr_family.profession_id', 'LEFT');
        $this->db->join('master_designation', 'master_designation.id = hr_family.designation_id', 'LEFT');
        $this->db->order_by('hr_family.id', 'ASC');
        $query_result = $this->db->get('hr_family,hr_job');
        $result = $query_result->result();
        return $result;
    }

    public function select_child_by_emp_id($emp_id)
    {
        $this->db->select('hr_child.*,master_gender.gender_name,master_profession.profession_name');
        $this->db->where('hr_job.emp_id = hr_child.emp_id');
        $this->db->where('hr_job.status', 1);
        $this->db->where('hr_child.emp_id', $emp_id);
        $this->db->join('master_gender', 'master_gender.id = hr_child.gender_id', 'LEFT');
        $this->db->join('master_profession', 'master_profession.id = hr_child.profession_id', 'LEFT');
        $query_result = $this->db->get('hr_child,hr_job');
        $result = $query_result->result();
        return $result;
    }

    public function select_academic_by_emp_id($emp_id)
    {
        $this->db->select('hr_academic.*,master_exam_degree.degree_name,master_study_group.group_name,master_board.board_name,master_exam_name.exam_name');
        $this->db->where('hr_job.emp_id = hr_academic.emp_id');
        $this->db->where('hr_job.status', 1);
        $this->db->where('hr_academic.emp_id', $emp_id);
        $this->db->join('master_exam_degree', 'master_exam_degree.id = hr_academic.exam_degree_id', 'LEFT');
        $this->db->join('master_study_group', 'master_study_group.id = hr_academic.study_group_id', 'LEFT');
        $this->db->join('master_board', 'master_board.id = hr_academic.board_id', 'LEFT');
        $this->db->join('master_exam_name', 'master_exam_name.id = hr_academic.exam_name_id', 'LEFT');
        $query_result = $this->db->get('hr_academic,hr_job');
        $result = $query_result->result();
        return $result;
    }

    public function select_ward_and_honours_by_emp_id($emp_id)
    {
        $this->db->select('hr_award_and_honors.*');
        $this->db->where('hr_job.emp_id = hr_award_and_honors.emp_id');
        $this->db->where('hr_job.status', 1);
        $this->db->where('hr_award_and_honors.emp_id', $emp_id);
        $query_result = $this->db->get('hr_award_and_honors,hr_job');
        $result = $query_result->result();
        return $result;
    }

    public function select_co_curricular_activities_by_emp_id($emp_id)
    {
        $this->db->select('hr_co_curricular_activities.*');
        $this->db->where('hr_job.emp_id = hr_co_curricular_activities.emp_id');
        $this->db->where('hr_job.status', 1);
        $this->db->where('hr_co_curricular_activities.emp_id', $emp_id);
        $query_result = $this->db->get('hr_co_curricular_activities,hr_job');
        $result = $query_result->result();
        return $result;
    }

    public function select_experience_by_emp_id($emp_id)
    {
        $this->db->select('hr_experience.*');
        $this->db->where('hr_job.emp_id = hr_experience.emp_id');
        $this->db->where('hr_job.status', 1);
        $this->db->where('hr_experience.emp_id', $emp_id);
        $this->db->group_by('hr_experience.emp_id');
        $query_result = $this->db->get('hr_experience,hr_job');
        $result = $query_result->result();
        return $result;
    }

    public function select_nominee_by_emp_id($emp_id)
    {
        $this->db->select('hr_nominee.*');
        $this->db->where('hr_job.emp_id = hr_nominee.emp_id');
        $this->db->where('hr_job.status', 1);
        $this->db->where('hr_nominee.emp_id', $emp_id);
        $this->db->group_by('hr_nominee.emp_id');
        $query_result = $this->db->get('hr_nominee,hr_job');
        $result = $query_result->result();
        return $result;
    }

    public function select_previous_job_history_by_emp_id($emp_id)
    {
        $this->db->select('hr_previous_job_history.*');
        $this->db->where('hr_job.emp_id = hr_previous_job_history.emp_id');
        $this->db->where('hr_job.status', 1);
        $this->db->where('hr_previous_job_history.emp_id', $emp_id);
        $this->db->group_by('hr_previous_job_history.emp_id');
        $query_result = $this->db->get('hr_previous_job_history,hr_job');
        $result = $query_result->result();
        return $result;
    }

    public function select_reference_by_emp_id($emp_id)
    {
        $this->db->select('hr_reference.*');
        $this->db->where('hr_job.emp_id = hr_reference.emp_id');
        $this->db->where('hr_job.status', 1);
        $this->db->where('hr_reference.emp_id', $emp_id);
        $this->db->group_by('hr_reference.emp_id');
        $query_result = $this->db->get('hr_reference,hr_job');
        $result = $query_result->result();
        return $result;
    }

    public function select_research_and_publication_by_emp_id($emp_id)
    {
        $this->db->select('hr_research_and_publication.*');
        $this->db->where('hr_job.emp_id = hr_research_and_publication.emp_id');
        $this->db->where('hr_job.status', 1);
        $this->db->where('hr_research_and_publication.emp_id', $emp_id);
        $query_result = $this->db->get('hr_research_and_publication,hr_job');
        $result = $query_result->result();
        return $result;
    }

    public function select_training_by_emp_id($emp_id)
    {
        $this->db->select('hr_training.*');
        $this->db->where('hr_job.emp_id = hr_training.emp_id');
        $this->db->where('hr_job.status', 1);
        $this->db->where('hr_training.emp_id', $emp_id);
        $this->db->group_by('hr_training.emp_id');
        $query_result = $this->db->get('hr_training,hr_job');
        $result = $query_result->result();
        return $result;
    }

    public function select_contact_by_emp_id($emp_id)
    {
        $this->db->select('hr_contact.*,master_division.division_name,master_district.district_name,master_thana.thana_name');
        $this->db->where('hr_job.emp_id = hr_contact.emp_id');
        $this->db->where('hr_job.status', 1);
        $this->db->where('hr_contact.emp_id', $emp_id);
        $this->db->join('master_division', 'master_division.id = hr_contact.present_division_id', 'LEFT');
        $this->db->join('master_district', 'master_district.id = hr_contact.present_district_id', 'LEFT');
        $this->db->join('master_thana', 'master_thana.id = hr_contact.present_thana_id', 'LEFT');
        $query_result = $this->db->get('hr_contact,hr_job');
        $result = $query_result->result();
        return $result;
    }

    public function select_contact_by_emp_id1($emp_id)
    {
        $this->db->select('hr_contact.*,master_division.division_name,master_district.district_name,master_thana.thana_name');
        $this->db->where('hr_job.emp_id = hr_contact.emp_id');
        $this->db->where('hr_job.status', 1);
        $this->db->where('hr_contact.is_address_same',2);
        $this->db->where('hr_contact.emp_id', $emp_id);
        $this->db->join('master_division', 'master_division.id = hr_contact.permanent_division_id', 'LEFT');
        $this->db->join('master_district', 'master_district.id = hr_contact.permanent_district_id', 'LEFT');
        $this->db->join('master_thana', 'master_thana.id = hr_contact.permanent_thana_id', 'LEFT');
        $query_result = $this->db->get('hr_contact,hr_job');
        $result = $query_result->result();
        return $result;
    }

}
