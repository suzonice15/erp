<?php

class Department_head_model extends CI_Model
{
    public function select_all_department_head($limit, $start)
    {
        $this->db->limit($limit, $start);
        $this->db->select('hr_assigning_dept_head.*,master_department.department_name,hr_basic.emp_name');
        $this->db->where('hr_job_posting.status', 1);
        $this->db->where('hr_assigning_dept_head.user_id = hr_job_posting.emp_id');
        $this->db->where('hr_assigning_dept_head.department_id = hr_job_posting.department_id');
        $this->db->where('hr_job_posting.emp_id = hr_basic.emp_id');
        $this->db->join('master_department', 'master_department.id = hr_assigning_dept_head.department_id');
        $this->db->order_by('hr_assigning_dept_head.id', "DESC");
        $query_result = $this->db->get('hr_assigning_dept_head,hr_job_posting,hr_basic');
        $result = $query_result->result();
        return $result;
    }

    public function check_duplicate_data($module_name)
    {
        $this->db->select('module_name');
        $this->db->where('module_name', $module_name);
        $query_result = $this->db->get('master_module');
        $result = $query_result->result();
        return $result;
    }

    public function select_dept($user_id)
    {
        $this->db->select('master_department.*');
        $this->db->where('hr_job_posting.emp_id', $user_id);
        $this->db->where('hr_job_posting.status', 1);
        $this->db->where('hr_job_posting.department_id = master_department.id');
        $query_result = $this->db->get('hr_job_posting,master_department');
        $result = $query_result->result();
        return $result;
    }
}
