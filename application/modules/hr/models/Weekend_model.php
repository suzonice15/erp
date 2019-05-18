<?php

class Weekend_Model extends CI_Model
{
    function countAllByLikeCondition($field, $cond)
    {
        $this->db->select('count(hr_assigning_weekend.emp_id) count_total_rows');
        $this->db->where('hr_job.emp_id = hr_assigning_weekend.emp_id');
        $this->db->where('hr_job.status', 1);
        $this->db->like($field, $cond, 'after');
        $query_result = $this->db->get('hr_assigning_weekend,hr_job');
        $result = $query_result->row();
        return $result;
    }

    function countAllByWhereCondition($field, $cond)
    {
        $this->db->select('count(hr_assigning_weekend.emp_id) count_total_rows');
        $this->db->where('hr_job.emp_id = hr_assigning_weekend.emp_id');
        $this->db->where('hr_job.status', 1);
        $this->db->where($field, $cond);
        $query_result = $this->db->get('hr_assigning_weekend,hr_job');
        $result = $query_result->row();
        return $result;
    }

    function countAll()
    {
        $this->db->select('count(hr_assigning_weekend.emp_id) count_total_rows');
        $this->db->where('hr_job.emp_id = hr_assigning_weekend.emp_id');
        $this->db->where('hr_job.status', 1);
        $query_result = $this->db->get('hr_assigning_weekend,hr_job');
        $result = $query_result->row();
        return $result;
    }

    public function select_weekend($limit, $start)
    {
        $this->db->limit($limit, $start);
        $this->db->select('hr_assigning_weekend.*,master_department.department_name,master_shift.shift_name,master_section.section_name,master_weekend.weekend_name');
        $this->db->where('hr_job.emp_id = hr_assigning_weekend.emp_id');
        $this->db->where('hr_job.status', 1);
        $this->db->where('hr_assigning_weekend.emp_id = hr_job_posting.emp_id');
        $this->db->where('hr_job_posting.status', 1);
        $this->db->join('master_department', 'master_department.id = hr_job_posting.department_id', 'LEFT');
        $this->db->join('master_shift', 'master_shift.id = hr_job_posting.shift_id', 'LEFT');
        $this->db->join('master_section', 'master_section.id = hr_job_posting.section_id', 'LEFT');
        $this->db->join('master_weekend', 'master_weekend.id = hr_assigning_weekend.weekend_id', 'LEFT');
        $query_result = $this->db->get('hr_assigning_weekend,hr_job,hr_job_posting');
        $result = $query_result->result();
        return $result;
    }

    public function select_emp_info($department_id, $shift_id, $section_id)
    {
        $this->db->select('hr_job_posting.emp_id,hr_job_posting.post_name,hr_basic.emp_name,master_designation.designation_name');
        $this->db->where('hr_job_posting.department_id', $department_id);
        $this->db->where('hr_job_posting.shift_id', $shift_id);
        $this->db->where('hr_job_posting.section_id', $section_id);
        $this->db->where('hr_job_posting.status', 1);
        $this->db->join('hr_basic', 'hr_basic.emp_id = hr_job_posting.emp_id', 'LEFT');
        $this->db->join('master_designation', 'master_designation.id = hr_job_posting.designation_id', 'LEFT');
        $query_result = $this->db->get('hr_job_posting');
        $result = $query_result->result();
        return $result;
    }
}
