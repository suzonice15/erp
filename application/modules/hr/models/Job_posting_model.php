<?php

class Job_posting_Model extends CI_Model
{
    function countAllByLikeCondition($field, $cond)
    {
        $this->db->select('count(hr_job_posting.emp_id) count_total_rows');
        $this->db->where('hr_job.emp_id = hr_job_posting.emp_id');
        $this->db->where('hr_job.status', 1);
        $this->db->like($field, $cond, 'after');
        $query_result = $this->db->get('hr_job_posting,hr_job');
        $result = $query_result->row();
        return $result;
    }

    function countAllByWhereCondition($field, $cond)
    {
        $this->db->select('count(hr_job_posting.emp_id) count_total_rows');
        $this->db->where('hr_job.emp_id = hr_job_posting.emp_id');
        $this->db->where('hr_job.status', 1);
        $this->db->where($field, $cond);
        $query_result = $this->db->get('hr_job_posting,hr_job');
        $result = $query_result->row();
        return $result;
    }

    function countAll()
    {
        $this->db->select('count(hr_job_posting.emp_id) count_total_rows');
        $this->db->where('hr_job.emp_id = hr_job_posting.emp_id');
        $this->db->where('hr_job.status', 1);
        $query_result = $this->db->get('hr_job_posting,hr_job');
        $result = $query_result->row();
        return $result;
    }

    public function select_all_job_posting($limit, $start)
    {
        $this->db->limit($limit, $start);
        $this->db->select('hr_job_posting.*,master_department.department_name, master_shift.shift_name, master_section.section_name, master_designation.designation_name');
        $this->db->where('hr_job.emp_id = hr_job_posting.emp_id');
        $this->db->where('hr_job.status', 1);
        $this->db->join('master_department', 'master_department.id = hr_job_posting.department_id', 'LEFT');
        $this->db->join('master_shift', 'master_shift.id = hr_job_posting.shift_id', 'LEFT');
        $this->db->join('master_section', 'master_section.id = hr_job_posting.section_id', 'LEFT');
        $this->db->join('master_designation', 'master_designation.id = hr_job_posting.designation_id', 'LEFT');
        $this->db->order_by('hr_job_posting.emp_id', 'DESC');
        $query_result = $this->db->get('hr_job_posting,hr_job');
        $result = $query_result->result();
        return $result;
    }

    public function select_all_job_posting_by_emp_id($limit, $start, $emp_id)
    {
        $this->db->limit($limit, $start);
        $this->db->select('hr_job_posting.*,master_department.department_name, master_shift.shift_name, master_section.section_name, master_designation.designation_name');
        $this->db->where('hr_job.emp_id = hr_job_posting.emp_id');
        $this->db->where('hr_job.status', 1);
        $this->db->like('hr_job_posting.emp_id', $emp_id, 'after');
        $this->db->join('master_department', 'master_department.id = hr_job_posting.department_id', 'LEFT');
        $this->db->join('master_shift', 'master_shift.id = hr_job_posting.shift_id', 'LEFT');
        $this->db->join('master_section', 'master_section.id = hr_job_posting.section_id', 'LEFT');
        $this->db->join('master_designation', 'master_designation.id = hr_job_posting.designation_id', 'LEFT');
        $this->db->order_by('hr_job_posting.emp_id', 'DESC');
        $query_result = $this->db->get('hr_job_posting,hr_job');
        $result = $query_result->result();
        return $result;
    }

    public function select_all_job_posting_by_department_id($limit, $start, $department_id)
    {
        $this->db->limit($limit, $start);
        $this->db->select('hr_job_posting.*,master_department.department_name, master_shift.shift_name, master_section.section_name, master_designation.designation_name');
        $this->db->where('hr_job.emp_id = hr_job_posting.emp_id');
        $this->db->where('hr_job.status', 1);
        $this->db->where('hr_job_posting.department_id', $department_id);
        $this->db->join('master_department', 'master_department.id = hr_job_posting.department_id', 'LEFT');
        $this->db->join('master_shift', 'master_shift.id = hr_job_posting.shift_id', 'LEFT');
        $this->db->join('master_section', 'master_section.id = hr_job_posting.section_id', 'LEFT');
        $this->db->join('master_designation', 'master_designation.id = hr_job_posting.designation_id', 'LEFT');
        $this->db->order_by('hr_job_posting.emp_id', 'DESC');
        $query_result = $this->db->get('hr_job_posting,hr_job');
        $result = $query_result->result();
        return $result;
    }

}
