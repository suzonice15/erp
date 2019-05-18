<?php

class Create_salary_Model extends CI_Model
{
    function countAll()
    {
        $this->db->select('count(hr_create_salary.emp_id) count_total_rows');
        $this->db->where('hr_job.emp_id = hr_create_salary.emp_id');
        $this->db->where('hr_job.status', 1);
        $query_result = $this->db->get('hr_create_salary,hr_job');
        $result = $query_result->row();
        return $result;
    }

    public function select_create_salary($limit, $start)
    {
        $this->db->limit($limit, $start);
        $this->db->select('hr_create_salary.*');
        $this->db->where('hr_job.emp_id = hr_create_salary.emp_id');
        $this->db->where('hr_job.status', 1);
        $query_result = $this->db->get('hr_create_salary,hr_job');
        $result = $query_result->result();
        return $result;
    }
}
