<?php

class Nominee_Model extends CI_Model
{
    function countAllByLikeCondition($field, $cond)
    {
        $this->db->select('count(DISTINCT(hr_nominee.emp_id)) count_total_rows');
        $this->db->where('hr_job.emp_id = hr_nominee.emp_id');
        $this->db->where('hr_job.status', 1);
        $this->db->like($field, $cond, 'after');
        $query_result = $this->db->get('hr_nominee,hr_job');
        $result = $query_result->row();
        return $result;
    }

    function countAll()
    {
        $this->db->select('count(DISTINCT(hr_nominee.emp_id)) count_total_rows');
        $this->db->where('hr_job.emp_id = hr_nominee.emp_id');
        $this->db->where('hr_job.status', 1);
        $query_result = $this->db->get('hr_nominee,hr_job');
        $result = $query_result->row();
        return $result;
    }

    public function select_emp_nominee($limit, $start)
    {
        $this->db->limit($limit, $start);
        $this->db->select('hr_nominee.*');
        $this->db->where('hr_job.emp_id = hr_nominee.emp_id');
        $this->db->where('hr_job.status', 1);
        $this->db->group_by('hr_nominee.emp_id');
        $query_result = $this->db->get('hr_nominee,hr_job');
        $result = $query_result->result();
        return $result;
    }

    public function select_emp_nominee_by_emp_id($limit, $start, $emp_id)
    {
        $this->db->limit($limit, $start);
        $this->db->select('hr_nominee.*');
        $this->db->where('hr_job.emp_id = hr_nominee.emp_id');
        $this->db->where('hr_job.status', 1);
        $this->db->like('hr_nominee.emp_id', $emp_id, 'after');
        $this->db->group_by('hr_nominee.emp_id');
        $query_result = $this->db->get('hr_nominee,hr_job');
        $result = $query_result->result();
        return $result;
    }


    public function select_nominee_by_id($id)
    {
        $this->db->select('hr_nominee.*');
        $this->db->where('hr_job.emp_id = hr_nominee.emp_id');
        $this->db->where('hr_job.status', 1);
        $this->db->where('hr_nominee.emp_id', $id);
        $query_result = $this->db->get('hr_nominee,hr_job');
        $result = $query_result->result();
        return $result;
    }
}
