<?php

class Training_Model extends CI_Model
{
    function countAllByLikeCondition($field, $cond)
    {
        $this->db->select('count(DISTINCT(hr_training.emp_id)) count_total_rows');
        $this->db->where('hr_job.emp_id = hr_training.emp_id');
        $this->db->where('hr_job.status', 1);
        $this->db->like($field, $cond, 'after');
        $query_result = $this->db->get('hr_training,hr_job');
        $result = $query_result->row();
        return $result;
    }

    function countAll()
    {
        $this->db->select('count(DISTINCT(hr_training.emp_id)) count_total_rows');
        $this->db->where('hr_job.emp_id = hr_training.emp_id');
        $this->db->where('hr_job.status', 1);
        $query_result = $this->db->get('hr_training,hr_job');
        $result = $query_result->row();
        return $result;
    }

    public function select_training($limit, $start)
    {
        $this->db->limit($limit, $start);
        $this->db->select('hr_training.*');
        $this->db->where('hr_job.emp_id = hr_training.emp_id');
        $this->db->where('hr_job.status', 1);
        $this->db->group_by('hr_training.emp_id');
        $query_result = $this->db->get('hr_training,hr_job');
        $result = $query_result->result();
        return $result;
    }

    public function select_training_by_id($id)
    {
        $this->db->select('hr_training.*');
        $this->db->where('hr_job.emp_id = hr_training.emp_id');
        $this->db->where('hr_job.status', 1);
        $this->db->where('hr_training.emp_id', $id);
        $query_result = $this->db->get('hr_training,hr_job');
        $result = $query_result->result();
        return $result;
    }

    public function select_emp_training_by_emp_id($limit, $start, $emp_id)
    {
        $this->db->limit($limit, $start);
        $this->db->select('hr_training.*');
        $this->db->where('hr_job.emp_id = hr_training.emp_id');
        $this->db->where('hr_job.status', 1);
        $this->db->like('hr_training.emp_id', $emp_id, 'after');
        $this->db->group_by('hr_training.emp_id');
        $query_result = $this->db->get('hr_training,hr_job');
        $result = $query_result->result();
        return $result;
    }
}
