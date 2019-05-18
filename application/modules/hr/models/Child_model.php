<?php

class child_Model extends CI_Model
{
    function countAllByLikeCondition($field, $cond)
    {
        $this->db->select('count(hr_child.emp_id) count_total_rows');
        $this->db->where('hr_job.emp_id = hr_child.emp_id');
        $this->db->where('hr_job.status', 1);
        $this->db->like($field, $cond, 'after');
        $query_result = $this->db->get('hr_child,hr_job');
        $result = $query_result->row();
        return $result;
    }

    function countAll()
    {
        $this->db->select('count(hr_child.emp_id) count_total_rows');
        $this->db->where('hr_job.emp_id = hr_child.emp_id');
        $this->db->where('hr_job.status', 1);
        $query_result = $this->db->get('hr_child,hr_job');
        $result = $query_result->row();
        return $result;
    }

    public function select_emp_child($limit, $start)
    {
        $this->db->limit($limit, $start);
        $this->db->select('hr_child.*,master_gender.gender_name,master_profession.profession_name');
        $this->db->where('hr_job.emp_id = hr_child.emp_id');
        $this->db->where('hr_job.status', 1);
        $this->db->join('master_gender', 'master_gender.id = hr_child.gender_id', 'LEFT');
        $this->db->join('master_profession', 'master_profession.id = hr_child.profession_id', 'LEFT');
        $query_result = $this->db->get('hr_child,hr_job');
        $result = $query_result->result();
        return $result;
    }

    public function select_emp_child_by_emp_id($limit, $start, $emp_id)
    {
        $this->db->limit($limit, $start);
        $this->db->select('hr_child.*,master_gender.gender_name,master_profession.profession_name');
        $this->db->where('hr_job.emp_id = hr_child.emp_id');
        $this->db->where('hr_job.status', 1);
        $this->db->like('hr_child.emp_id', $emp_id, 'after');
        $this->db->join('master_gender', 'master_gender.id = hr_child.gender_id', 'LEFT');
        $this->db->join('master_profession', 'master_profession.id = hr_child.profession_id', 'LEFT');
        $query_result = $this->db->get('hr_child,hr_job');
        $result = $query_result->result();
        return $result;
    }
}
