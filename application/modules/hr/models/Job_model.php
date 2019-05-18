<?php

class Job_Model extends CI_Model
{
    public function select_all_job($limit, $start)
    {
        $this->db->limit($limit, $start);
        $this->db->select('hr_job.*,master_department.department_name, master_shift.shift_name, master_section.section_name, master_designation.designation_name');
        $this->db->join('master_department', 'master_department.id = hr_job.department_id', 'LEFT');
        $this->db->join('master_shift', 'master_shift.id = hr_job.shift_id', 'LEFT');
        $this->db->join('master_section', 'master_section.id = hr_job.section_id', 'LEFT');
        $this->db->join('master_designation', 'master_designation.id = hr_job.designation_id', 'LEFT');
        $this->db->order_by('hr_job.id','DESC');
        $query_result = $this->db->get('hr_job');
        $result = $query_result->result();
        return $result;
    }

    public function select_all_job_by_emp_id($limit, $start, $emp_id)
    {
        $this->db->limit($limit, $start);
        $this->db->select('hr_job.*,master_department.department_name, master_shift.shift_name, master_section.section_name, master_designation.designation_name');
        $this->db->like('emp_id', $emp_id, 'after');
        $this->db->join('master_department', 'master_department.id = hr_job.department_id', 'LEFT');
        $this->db->join('master_shift', 'master_shift.id = hr_job.shift_id', 'LEFT');
        $this->db->join('master_section', 'master_section.id = hr_job.section_id', 'LEFT');
        $this->db->join('master_designation', 'master_designation.id = hr_job.designation_id', 'LEFT');
        $this->db->order_by('hr_job.id','DESC');
        $query_result = $this->db->get('hr_job');
        $result = $query_result->result();
        return $result;
    }

    public function select_all_job_by_department_id($limit, $start, $department_id)
    {
        $this->db->limit($limit, $start);
        $this->db->select('hr_job.*,master_department.department_name, master_shift.shift_name, master_section.section_name, master_designation.designation_name');
        $this->db->where('department_id', $department_id);
        $this->db->join('master_department', 'master_department.id = hr_job.department_id', 'LEFT');
        $this->db->join('master_shift', 'master_shift.id = hr_job.shift_id', 'LEFT');
        $this->db->join('master_section', 'master_section.id = hr_job.section_id', 'LEFT');
        $this->db->join('master_designation', 'master_designation.id = hr_job.designation_id', 'LEFT');
        $this->db->order_by('hr_job.id','DESC');
        $query_result = $this->db->get('hr_job');
        $result = $query_result->result();
        return $result;
    }

}
