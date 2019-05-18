<?php

class Basic_Model extends CI_Model
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

    public function select_basic($limit, $start)
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
        $query_result = $this->db->get('hr_basic,hr_job');
        $result = $query_result->result();
        return $result;
    }

    public function select_basic_by_emp_id($limit, $start, $emp_id)
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

    public function select_basic_by_email_address($limit, $start, $email_address)
    {
        $this->db->limit($limit, $start);
        $this->db->select('hr_basic.*,master_gender.gender_name,master_division.division_name,master_district.district_name,master_thana.thana_name,master_blood_group.blood_group_name,master_religion.religion_name,master_freedom_fighter_relation.relation_name');
        $this->db->where('hr_job.emp_id = hr_basic.emp_id');
        $this->db->where('hr_job.status', 1);
        $this->db->like('hr_basic.email_address', $email_address, 'after');
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

    public function select_basic_by_emp_name($limit, $start, $emp_name)
    {
        $this->db->limit($limit, $start);
        $this->db->select('hr_basic.*,master_gender.gender_name,master_division.division_name,master_district.district_name,master_thana.thana_name,master_blood_group.blood_group_name,master_religion.religion_name,master_freedom_fighter_relation.relation_name');
        $this->db->where('hr_job.emp_id = hr_basic.emp_id');
        $this->db->where('hr_job.status', 1);
        $this->db->like('hr_basic.emp_name', $emp_name, 'after');
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

    public function select_basic_by_id($id)
    {
        $this->db->select('hr_basic.*,master_gender.gender_name,master_division.division_name,master_district.district_name,master_thana.thana_name,master_blood_group.blood_group_name,master_religion.religion_name,master_freedom_fighter_relation.relation_name');
        $this->db->where('hr_basic.id', $id);
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
}
