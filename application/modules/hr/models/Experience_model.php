<?php

class Experience_Model extends CI_Model
{
    function countAllByLikeCondition($field, $cond)
    {
        $this->db->select('count(hr_experience.emp_id) count_total_rows');
        $this->db->where('hr_job.emp_id = hr_experience.emp_id');
        $this->db->where('hr_job.status', 1);
        $this->db->like($field, $cond, 'after');
        $this->db->group_by('hr_experience.emp_id');
        $query_result = $this->db->get('hr_experience,hr_job');
        $result = $query_result->row();
        return $result;
    }

    function countAllByWhereCondition($field, $cond)
    {
        $this->db->select('count(hr_experience.emp_id) count_total_rows');
        $this->db->where('hr_job.emp_id = hr_experience.emp_id');
        $this->db->where('hr_job.status', 1);
        $this->db->where($field, $cond);
        $this->db->group_by('hr_experience.emp_id');
        $query_result = $this->db->get('hr_experience,hr_job');
        $result = $query_result->row();
        return $result;
    }

    function countAll()
    {
        $this->db->select('count(hr_experience.emp_id) count_total_rows');
        $this->db->where('hr_job.emp_id = hr_experience.emp_id');
        $this->db->where('hr_job.status', 1);
        $this->db->group_by('hr_experience.emp_id');
        $query_result = $this->db->get('hr_experience,hr_job');
        $result = $query_result->row();
        return $result;
    }

    public function select_emp_experience($limit, $start)
    {
        $this->db->limit($limit, $start);
        $this->db->select('hr_experience.*');
        $this->db->where('hr_job.emp_id = hr_experience.emp_id');
        $this->db->where('hr_job.status', 1);
        $this->db->group_by('hr_experience.emp_id');
        $query_result = $this->db->get('hr_experience,hr_job');
        $result = $query_result->result();
        return $result;
    }

    public function select_emp_experience_by_emp_id($limit, $start, $emp_id)
    {
        $this->db->limit($limit, $start);
        $this->db->select('hr_experience.*');
        $this->db->where('hr_job.emp_id = hr_experience.emp_id');
        $this->db->where('hr_job.status', 1);
        $this->db->like('hr_experience.emp_id', $emp_id, 'after');
        $this->db->group_by('hr_experience.emp_id');
        $query_result = $this->db->get('hr_experience,hr_job');
        $result = $query_result->result();
        return $result;
    }

    public function select_emp_experience_by_division_id($limit, $start, $division_id)
    {
        $this->db->limit($limit, $start);
        $this->db->select('hr_experience.*');
        $this->db->where('hr_job.emp_id = hr_experience.emp_id');
        $this->db->where('hr_job.status', 1);
        $this->db->where('hr_experience.present_division_id', $division_id);
        $this->db->group_by('hr_experience.emp_id');
        $query_result = $this->db->get('hr_experience,hr_job');
        $result = $query_result->result();
        return $result;
    }

    public function select_emp_experience_by_district_id($limit, $start, $district_id)
    {
        $this->db->limit($limit, $start);
        $this->db->select('hr_experience.*');
        $this->db->where('hr_job.emp_id = hr_experience.emp_id');
        $this->db->where('hr_job.status', 1);
        $this->db->where('hr_experience.present_district_id', $district_id);
        $this->db->group_by('hr_experience.emp_id');
        $query_result = $this->db->get('hr_experience,hr_job');
        $result = $query_result->result();
        return $result;
    }

    public function select_experience_by_id($id)
    {
        $this->db->select('hr_experience.*');
        $this->db->where('hr_job.emp_id = hr_experience.emp_id');
        $this->db->where('hr_job.status', 1);
        $this->db->where('hr_experience.emp_id', $id);
        $query_result = $this->db->get('hr_experience,hr_job');
        $result = $query_result->result();
        return $result;
    }

    public function select_total_data($id)
    {
        $this->db->select('count(hr_experience.emp_id) total');
        $this->db->where('hr_job.emp_id = hr_experience.emp_id');
        $this->db->where('hr_job.status', 1);
        $this->db->where('hr_experience.emp_id', $id);
        $query_result = $this->db->get('hr_experience,hr_job');
        $result = $query_result->row();
        return $result;
    }
}
