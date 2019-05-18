<?php

class leave_Model extends CI_Model
{
    function countAllByLikeCondition($field, $cond)
    {
        $this->db->select('count(hr_leave.emp_id) count_total_rows');
        $this->db->where('hr_job.emp_id = hr_leave.emp_id');
        $this->db->where('hr_job.status', 1);
        $this->db->like($field, $cond, 'after');
        $query_result = $this->db->get('hr_leave,hr_job');
        $result = $query_result->row();
        return $result;
    }

    public function countAllByLikeConditionStatus($field, $cond, $status)
    {
        $this->db->select('count(hr_leave.emp_id) count_total_rows');
        $this->db->where('hr_job.emp_id = hr_leave.emp_id');
        $this->db->where('hr_job.status', 1);
        $this->db->where('hr_leave.status', $status);
        $this->db->like($field, $cond, 'after');
        $query_result = $this->db->get('hr_leave,hr_job');
        $result = $query_result->row();
        return $result;
    }

    function countAllByDepartmentAndEmpId($emp_id, $department_id)
    {
        $this->db->select('count(hr_leave.emp_id) count_total_rows');
        $this->db->where('hr_job.emp_id = hr_leave.emp_id');
        $this->db->where('hr_job.status', 1);
        $this->db->where('hr_leave.status', 0);
        $this->db->where('hr_leave.emp_id = hr_job_posting.emp_id');
        $this->db->where('hr_job_posting.status', 1);
        $this->db->where('hr_job_posting.department_id', $department_id);
        $this->db->like('hr_leave.emp_id', $emp_id, 'after');
        $query_result = $this->db->get('hr_leave,hr_job,hr_job_posting');
        $result = $query_result->row();
        return $result;
    }

    function countAllByWhereCondition($field, $cond, $user_name = false)
    {
        $this->db->select('count(hr_leave.emp_id) count_total_rows');
        $this->db->where('hr_job.emp_id = hr_leave.emp_id');
        $this->db->where('hr_job.status', 1);
        if ($user_name) {
            $this->db->where('hr_leave.emp_id', $user_name);
        }
        $this->db->where($field, $cond);
        $query_result = $this->db->get('hr_leave,hr_job');
        $result = $query_result->row();
        return $result;
    }
    function countAllByWhereConditionStatus($field, $cond,$status)
    {
        $this->db->select('count(hr_leave.emp_id) count_total_rows');
        $this->db->where('hr_job.emp_id = hr_leave.emp_id');
        $this->db->where('hr_job.status', 1);
        $this->db->where('hr_leave.status', $status);
        $this->db->where($field, $cond);
        $query_result = $this->db->get('hr_leave,hr_job');
        $result = $query_result->row();
        return $result;
    }

    function countAllByLeaveAndDepartment($leave_type_id, $department_id)
    {
        $this->db->select('count(hr_leave.emp_id) count_total_rows');
        $this->db->where('hr_job.emp_id = hr_leave.emp_id');
        $this->db->where('hr_job.status', 1);
        $this->db->where('hr_leave.status', 0);
        $this->db->where('hr_job.emp_id = hr_job_posting.emp_id');
        $this->db->where('hr_job_posting.department_id', $department_id);
        $this->db->where('hr_job_posting.status', 1);
        $this->db->where('hr_leave.leave_type_id', $leave_type_id);
        $query_result = $this->db->get('hr_leave,hr_job,hr_job_posting');
        $result = $query_result->row();
        return $result;
    }

    function countAllByWhereConditionWithJoin($department_id)
    {
        $this->db->select('count(hr_leave.emp_id) count_total_rows');
        $this->db->where('hr_job.emp_id = hr_leave.emp_id');
        $this->db->where('hr_job.status', 1);
        $this->db->where('hr_job.emp_id = hr_job_posting.emp_id');
        $this->db->where('hr_job_posting.department_id', $department_id);
        $this->db->where('hr_job_posting.status', 1);
        $query_result = $this->db->get('hr_leave,hr_job,hr_job_posting');
        $result = $query_result->row();
        return $result;
    }
    function countAllByWhereConditionWithJoinStatus($department_id,$status)
    {
        $this->db->select('count(hr_leave.emp_id) count_total_rows');
        $this->db->where('hr_job.emp_id = hr_leave.emp_id');
        $this->db->where('hr_job.status', 1);
        $this->db->where('hr_leave.status', $status);
        $this->db->where('hr_job.emp_id = hr_job_posting.emp_id');
        $this->db->where('hr_job_posting.department_id', $department_id);
        $this->db->where('hr_job_posting.status', 1);
        $query_result = $this->db->get('hr_leave,hr_job,hr_job_posting');
        $result = $query_result->row();
        return $result;
    }

    public function countAllByBetweenCondition($from_date, $to_date, $user_name = false)
    {
        $this->db->select('count(hr_leave.emp_id) count_total_rows');
        $this->db->where('hr_job.emp_id = hr_leave.emp_id');
        $this->db->where('hr_job.status', 1);
        $this->db->where('hr_leave.from_date >=', $from_date);
        $this->db->where('hr_leave.to_date <=', $to_date);
        if ($user_name) {
            $this->db->where('hr_leave.emp_id', $user_name);
        }
        $query_result = $this->db->get('hr_leave,hr_job');
        $result = $query_result->row();
        return $result;
    }
    public function countAllByBetweenConditionStatus($from_date, $to_date, $sataus)
    {
        $this->db->select('count(hr_leave.emp_id) count_total_rows');
        $this->db->where('hr_job.emp_id = hr_leave.emp_id');
        $this->db->where('hr_job.status', 1);
        $this->db->where('hr_leave.from_date >=', $from_date);
        $this->db->where('hr_leave.to_date <=', $to_date);
        $this->db->where('hr_leave.status', $sataus);
        $query_result = $this->db->get('hr_leave,hr_job');
        $result = $query_result->row();
        return $result;
    }
    public function countAllByBetweenConditionAndDepartment($from_date, $to_date, $dept_id)
    {
        $this->db->select('count(hr_leave.emp_id) count_total_rows');
        $this->db->where('hr_job.emp_id = hr_leave.emp_id');
        $this->db->where('hr_job.status', 1);
        $this->db->where('hr_leave.status', 0);
        $this->db->where('hr_leave.from_date >=', $from_date);
        $this->db->where('hr_leave.to_date <=', $to_date);
        $this->db->where('hr_job.emp_id = hr_job_posting.emp_id');
        $this->db->where('hr_job_posting.department_id', $dept_id);
        $query_result = $this->db->get('hr_leave,hr_job,hr_job_posting');
        $result = $query_result->row();
        return $result;
    }


    function countAll($user_name = false)
    {
        $this->db->select('count(hr_leave.emp_id) count_total_rows');
        $this->db->where('hr_job.emp_id = hr_leave.emp_id');
        $this->db->where('hr_job.status', 1);
        if ($user_name) {
            $this->db->where('hr_leave.emp_id', $user_name);
        }
        $query_result = $this->db->get('hr_leave,hr_job');
        $result = $query_result->row();
        return $result;
    }

    function countAllByDepartment($dept_id)
    {
        $this->db->select('count(hr_leave.emp_id) count_total_rows');
        $this->db->where('hr_job.emp_id = hr_leave.emp_id');
        $this->db->where('hr_job.status', 1);
        $this->db->where('hr_leave.status', 0);
        $this->db->where('hr_leave.emp_id = hr_job_posting.emp_id');
        $this->db->where('hr_job_posting.status', 1);
        $this->db->where('hr_job_posting.department_id', $dept_id);
        $query_result = $this->db->get('hr_leave,hr_job,hr_job_posting');
        $result = $query_result->row();
        return $result;
    }

    function countAllByGM()
    {
        $this->db->select('count(hr_leave.emp_id) count_total_rows');
        $this->db->where('hr_job.emp_id = hr_leave.emp_id');
        $this->db->where('hr_job.status', 1);
        $this->db->where('hr_leave.status', 6);
        $query_result = $this->db->get('hr_leave,hr_job');
        $result = $query_result->row();
        return $result;
    }

    function countAllByMD()
    {
        $this->db->select('count(hr_leave.emp_id) count_total_rows');
        $this->db->where('hr_job.emp_id = hr_leave.emp_id');
        $this->db->where('hr_job.status', 1);
        $this->db->where('hr_leave.status', 5);
        $query_result = $this->db->get('hr_leave,hr_job');
        $result = $query_result->row();
        return $result;
    }

    public function select_leave($limit, $start, $user_name = false)
    {
        $this->db->limit($limit, $start);
        $this->db->select('hr_leave.*,master_department.department_name,master_shift.shift_name,master_section.section_name,master_leave_type.leave_name');
        $this->db->where('hr_job.emp_id = hr_leave.emp_id');
        $this->db->where('hr_job.status', 1);
        if ($user_name) {
            $this->db->where('hr_leave.emp_id', $user_name);
        }
        $this->db->where('hr_leave.emp_id = hr_job_posting.emp_id');
        $this->db->where('hr_job_posting.status', 1);
        $this->db->join('master_department', 'master_department.id = hr_job_posting.department_id', 'LEFT');
        $this->db->join('master_shift', 'master_shift.id = hr_job_posting.shift_id', 'LEFT');
        $this->db->join('master_section', 'master_section.id = hr_job_posting.section_id', 'LEFT');
        $this->db->join('master_leave_type', 'master_leave_type.id = hr_leave.leave_type_id', 'LEFT');
        $query_result = $this->db->get('hr_leave,hr_job,hr_job_posting');
        $result = $query_result->result();
        return $result;
    }

    public function select_leave_by_department($limit, $start, $department_id)
    {
        $this->db->limit($limit, $start);
        $this->db->select('hr_leave.*,master_department.department_name,master_shift.shift_name,master_section.section_name,master_leave_type.leave_name');
        $this->db->where('hr_job.emp_id = hr_leave.emp_id');
        $this->db->where('hr_job.status', 1);
        $this->db->where('hr_leave.status', 0);
        $this->db->where('hr_leave.emp_id = hr_job_posting.emp_id');
        $this->db->where('hr_job_posting.status', 1);
        $this->db->where('hr_job_posting.department_id', $department_id);
        $this->db->join('master_department', 'master_department.id = hr_job_posting.department_id', 'LEFT');
        $this->db->join('master_shift', 'master_shift.id = hr_job_posting.shift_id', 'LEFT');
        $this->db->join('master_section', 'master_section.id = hr_job_posting.section_id', 'LEFT');
        $this->db->join('master_leave_type', 'master_leave_type.id = hr_leave.leave_type_id', 'LEFT');
        $query_result = $this->db->get('hr_leave,hr_job,hr_job_posting');
        $result = $query_result->result();
        return $result;
    }

    public function select_leave_by_status($limit, $start, $status)
    {
        $this->db->limit($limit, $start);
        $this->db->select('hr_leave.*,master_department.department_name,master_shift.shift_name,master_section.section_name,master_leave_type.leave_name');
        $this->db->where('hr_job.emp_id = hr_leave.emp_id');
        $this->db->where('hr_job.status', 1);
        $this->db->where('hr_leave.status', $status);
        $this->db->where('hr_leave.emp_id = hr_job_posting.emp_id');
        $this->db->where('hr_job_posting.status', 1);
        $this->db->join('master_department', 'master_department.id = hr_job_posting.department_id', 'LEFT');
        $this->db->join('master_shift', 'master_shift.id = hr_job_posting.shift_id', 'LEFT');
        $this->db->join('master_section', 'master_section.id = hr_job_posting.section_id', 'LEFT');
        $this->db->join('master_leave_type', 'master_leave_type.id = hr_leave.leave_type_id', 'LEFT');
        $query_result = $this->db->get('hr_leave,hr_job,hr_job_posting');
        $result = $query_result->result();
        return $result;
    }


    public function select_leave_by_id($id)
    {
        $this->db->select('hr_leave.*,master_department.department_name,master_shift.shift_name,master_section.section_name,master_leave_type.leave_name');
        $this->db->where('hr_job.emp_id = hr_leave.emp_id');
        $this->db->where('hr_job.status', 1);
        $this->db->where('hr_leave.id', $id);
        $this->db->where('hr_leave.emp_id = hr_job_posting.emp_id');
        $this->db->where('hr_job_posting.status', 1);
        $this->db->join('master_department', 'master_department.id = hr_job_posting.department_id', 'LEFT');
        $this->db->join('master_shift', 'master_shift.id = hr_job_posting.shift_id', 'LEFT');
        $this->db->join('master_section', 'master_section.id = hr_job_posting.section_id', 'LEFT');
        $this->db->join('master_leave_type', 'master_leave_type.id = hr_leave.leave_type_id', 'LEFT');
        $query_result = $this->db->get('hr_leave,hr_job,hr_job_posting');
        $result = $query_result->result();
        return $result;
    }

    public function select_emp_leave_by_emp_id($limit, $start, $emp_id)
    {
        $this->db->limit($limit, $start);
        $this->db->select('hr_leave.*,master_department.department_name,master_shift.shift_name,master_section.section_name,master_leave_type.leave_name');
        $this->db->where('hr_job.emp_id = hr_leave.emp_id');
        $this->db->where('hr_job.status', 1);
        $this->db->like('hr_leave.emp_id', $emp_id, 'after');
        $this->db->where('hr_leave.emp_id = hr_job_posting.emp_id');
        $this->db->where('hr_job_posting.status', 1);
        $this->db->join('master_department', 'master_department.id = hr_job_posting.department_id', 'LEFT');
        $this->db->join('master_shift', 'master_shift.id = hr_job_posting.shift_id', 'LEFT');
        $this->db->join('master_section', 'master_section.id = hr_job_posting.section_id', 'LEFT');
        $this->db->join('master_leave_type', 'master_leave_type.id = hr_leave.leave_type_id', 'LEFT');
        $query_result = $this->db->get('hr_leave,hr_job,hr_job_posting');
        $result = $query_result->result();
        return $result;
    }

    public function select_emp_leave_by_emp_id_status($limit, $start, $emp_id,$status)
    {
        $this->db->limit($limit, $start);
        $this->db->select('hr_leave.*,master_department.department_name,master_shift.shift_name,master_section.section_name,master_leave_type.leave_name');
        $this->db->where('hr_job.emp_id = hr_leave.emp_id');
        $this->db->where('hr_job.status', 1);
        $this->db->where('hr_leave.status', $status);
        $this->db->like('hr_leave.emp_id', $emp_id, 'after');
        $this->db->where('hr_leave.emp_id = hr_job_posting.emp_id');
        $this->db->where('hr_job_posting.status', 1);
        $this->db->join('master_department', 'master_department.id = hr_job_posting.department_id', 'LEFT');
        $this->db->join('master_shift', 'master_shift.id = hr_job_posting.shift_id', 'LEFT');
        $this->db->join('master_section', 'master_section.id = hr_job_posting.section_id', 'LEFT');
        $this->db->join('master_leave_type', 'master_leave_type.id = hr_leave.leave_type_id', 'LEFT');
        $query_result = $this->db->get('hr_leave,hr_job,hr_job_posting');
        $result = $query_result->result();
        return $result;
    }

    public function select_emp_leave_by_emp_id_and_department($limit, $start, $emp_id, $dept_id)
    {
        $this->db->limit($limit, $start);
        $this->db->select('hr_leave.*,master_department.department_name,master_shift.shift_name,master_section.section_name,master_leave_type.leave_name');
        $this->db->where('hr_job.emp_id = hr_leave.emp_id');
        $this->db->where('hr_job.status', 1);
        $this->db->where('hr_leave.status', 0);
        $this->db->like('hr_leave.emp_id', $emp_id, 'after');
        $this->db->where('hr_leave.emp_id = hr_job_posting.emp_id');
        $this->db->where('hr_job_posting.status', 1);
        $this->db->where('hr_job_posting.department_id', $dept_id);
        $this->db->join('master_department', 'master_department.id = hr_job_posting.department_id', 'LEFT');
        $this->db->join('master_shift', 'master_shift.id = hr_job_posting.shift_id', 'LEFT');
        $this->db->join('master_section', 'master_section.id = hr_job_posting.section_id', 'LEFT');
        $this->db->join('master_leave_type', 'master_leave_type.id = hr_leave.leave_type_id', 'LEFT');
        $query_result = $this->db->get('hr_leave,hr_job,hr_job_posting');
        $result = $query_result->result();
        return $result;
    }

    public function select_emp_leave_by_leave_type_id($limit, $start, $cond, $id, $user_name = false)
    {
        $this->db->limit($limit, $start);
        $this->db->select('hr_leave.*,master_department.department_name,master_shift.shift_name,master_section.section_name,master_leave_type.leave_name');
        $this->db->where('hr_job.emp_id = hr_leave.emp_id');
        $this->db->where('hr_job.status', 1);
        $this->db->where($cond, $id);
        if ($user_name) {
            $this->db->where('hr_leave.emp_id', $user_name);
        }
        $this->db->where('hr_leave.emp_id = hr_job_posting.emp_id');
        $this->db->where('hr_job_posting.status', 1);
        $this->db->join('master_department', 'master_department.id = hr_job_posting.department_id', 'LEFT');
        $this->db->join('master_shift', 'master_shift.id = hr_job_posting.shift_id', 'LEFT');
        $this->db->join('master_section', 'master_section.id = hr_job_posting.section_id', 'LEFT');
        $this->db->join('master_leave_type', 'master_leave_type.id = hr_leave.leave_type_id', 'LEFT');
        $query_result = $this->db->get('hr_leave,hr_job,hr_job_posting');
        $result = $query_result->result();
        return $result;
    }

    public function select_emp_leave_by_leave_type_id_status($limit, $start, $cond, $id,$status)
    {
        $this->db->limit($limit, $start);
        $this->db->select('hr_leave.*,master_department.department_name,master_shift.shift_name,master_section.section_name,master_leave_type.leave_name');
        $this->db->where('hr_job.emp_id = hr_leave.emp_id');
        $this->db->where('hr_job.status', 1);
        $this->db->where('hr_leave.status', $status);
        $this->db->where($cond, $id);
        $this->db->where('hr_leave.emp_id = hr_job_posting.emp_id');
        $this->db->where('hr_job_posting.status', 1);
        $this->db->join('master_department', 'master_department.id = hr_job_posting.department_id', 'LEFT');
        $this->db->join('master_shift', 'master_shift.id = hr_job_posting.shift_id', 'LEFT');
        $this->db->join('master_section', 'master_section.id = hr_job_posting.section_id', 'LEFT');
        $this->db->join('master_leave_type', 'master_leave_type.id = hr_leave.leave_type_id', 'LEFT');
        $query_result = $this->db->get('hr_leave,hr_job,hr_job_posting');
        $result = $query_result->result();
        return $result;
    }

    public function select_emp_leave_by_leave_type_and_department($limit, $start, $leave_type_id, $dept_id)
    {
        $this->db->limit($limit, $start);
        $this->db->select('hr_leave.*,master_department.department_name,master_shift.shift_name,master_section.section_name,master_leave_type.leave_name');
        $this->db->where('hr_job.emp_id = hr_leave.emp_id');
        $this->db->where('hr_job.status', 1);
        $this->db->where('hr_leave.status', 0);
        $this->db->where('hr_leave.emp_id = hr_job_posting.emp_id');
        $this->db->where('hr_job_posting.status', 1);
        $this->db->where('hr_job_posting.department_id', $dept_id);
        $this->db->where('hr_leave.leave_type_id', $leave_type_id);
        $this->db->join('master_department', 'master_department.id = hr_job_posting.department_id', 'LEFT');
        $this->db->join('master_shift', 'master_shift.id = hr_job_posting.shift_id', 'LEFT');
        $this->db->join('master_section', 'master_section.id = hr_job_posting.section_id', 'LEFT');
        $this->db->join('master_leave_type', 'master_leave_type.id = hr_leave.leave_type_id', 'LEFT');
        $query_result = $this->db->get('hr_leave,hr_job,hr_job_posting');
        $result = $query_result->result();
        return $result;
    }


    public function select_emp_leave_by_department_id($limit, $start, $department_id)
    {
        $this->db->limit($limit, $start);
        $this->db->select('hr_leave.*,master_department.department_name,master_shift.shift_name,master_section.section_name,master_leave_type.leave_name');
        $this->db->where('hr_job.emp_id = hr_leave.emp_id');
        $this->db->where('hr_job.status', 1);
        $this->db->where('hr_leave.emp_id = hr_job_posting.emp_id');
        $this->db->where('hr_job_posting.department_id', $department_id);
        $this->db->where('hr_job_posting.status', 1);
        $this->db->join('master_department', 'master_department.id = hr_job_posting.department_id', 'LEFT');
        $this->db->join('master_shift', 'master_shift.id = hr_job_posting.shift_id', 'LEFT');
        $this->db->join('master_section', 'master_section.id = hr_job_posting.section_id', 'LEFT');
        $this->db->join('master_leave_type', 'master_leave_type.id = hr_leave.leave_type_id', 'LEFT');
        $query_result = $this->db->get('hr_leave,hr_job,hr_job_posting');
        $result = $query_result->result();
        return $result;
    }

    public function select_emp_leave_by_department_id_status($limit, $start, $department_id,$status)
    {
        $this->db->limit($limit, $start);
        $this->db->select('hr_leave.*,master_department.department_name,master_shift.shift_name,master_section.section_name,master_leave_type.leave_name');
        $this->db->where('hr_job.emp_id = hr_leave.emp_id');
        $this->db->where('hr_job.status', 1);
        $this->db->where('hr_leave.status', $status);
        $this->db->where('hr_leave.emp_id = hr_job_posting.emp_id');
        $this->db->where('hr_job_posting.department_id', $department_id);
        $this->db->where('hr_job_posting.status', 1);
        $this->db->join('master_department', 'master_department.id = hr_job_posting.department_id', 'LEFT');
        $this->db->join('master_shift', 'master_shift.id = hr_job_posting.shift_id', 'LEFT');
        $this->db->join('master_section', 'master_section.id = hr_job_posting.section_id', 'LEFT');
        $this->db->join('master_leave_type', 'master_leave_type.id = hr_leave.leave_type_id', 'LEFT');
        $query_result = $this->db->get('hr_leave,hr_job,hr_job_posting');
        $result = $query_result->result();
        return $result;
    }

    public function select_emp_leave_by_between_date($limit, $start, $from_date, $to_date, $user_name = false)
    {
        $this->db->limit($limit, $start);
        $this->db->select('hr_leave.*,master_department.department_name,master_shift.shift_name,master_section.section_name,master_leave_type.leave_name');
        $this->db->where('hr_job.emp_id = hr_leave.emp_id');
        $this->db->where('hr_job.status', 1);
        $this->db->where('hr_leave.from_date >=', $from_date);
        $this->db->where('hr_leave.to_date <=', $to_date);
        if ($user_name) {
            $this->db->where('hr_leave.emp_id', $user_name);
        }
        $this->db->where('hr_leave.emp_id = hr_job_posting.emp_id');
        $this->db->where('hr_job_posting.status', 1);
        $this->db->join('master_department', 'master_department.id = hr_job_posting.department_id', 'LEFT');
        $this->db->join('master_shift', 'master_shift.id = hr_job_posting.shift_id', 'LEFT');
        $this->db->join('master_section', 'master_section.id = hr_job_posting.section_id', 'LEFT');
        $this->db->join('master_leave_type', 'master_leave_type.id = hr_leave.leave_type_id', 'LEFT');
        $query_result = $this->db->get('hr_leave,hr_job,hr_job_posting');
        $result = $query_result->result();
        return $result;
    }
    public function select_emp_leave_by_between_date_status($limit, $start, $from_date, $to_date, $status)
    {
        $this->db->limit($limit, $start);
        $this->db->select('hr_leave.*,master_department.department_name,master_shift.shift_name,master_section.section_name,master_leave_type.leave_name');
        $this->db->where('hr_job.emp_id = hr_leave.emp_id');
        $this->db->where('hr_job.status', 1);
        $this->db->where('hr_leave.from_date >=', $from_date);
        $this->db->where('hr_leave.to_date <=', $to_date);
        $this->db->where('hr_leave.status', $status);
        $this->db->where('hr_leave.emp_id = hr_job_posting.emp_id');
        $this->db->where('hr_job_posting.status', 1);
        $this->db->join('master_department', 'master_department.id = hr_job_posting.department_id', 'LEFT');
        $this->db->join('master_shift', 'master_shift.id = hr_job_posting.shift_id', 'LEFT');
        $this->db->join('master_section', 'master_section.id = hr_job_posting.section_id', 'LEFT');
        $this->db->join('master_leave_type', 'master_leave_type.id = hr_leave.leave_type_id', 'LEFT');
        $query_result = $this->db->get('hr_leave,hr_job,hr_job_posting');
        $result = $query_result->result();
        return $result;
    }

    public function select_emp_leave_by_between_date_and_department($limit, $start, $from_date, $to_date, $dept_id)
    {
        $this->db->limit($limit, $start);
        $this->db->select('hr_leave.*,master_department.department_name,master_shift.shift_name,master_section.section_name,master_leave_type.leave_name');
        $this->db->where('hr_job.emp_id = hr_leave.emp_id');
        $this->db->where('hr_job.status', 1);
        $this->db->where('hr_leave.status', 0);
        $this->db->where('hr_leave.from_date >=', $from_date);
        $this->db->where('hr_leave.to_date <=', $to_date);
        $this->db->where('hr_leave.emp_id = hr_job_posting.emp_id');
        $this->db->where('hr_job_posting.status', 1);
        $this->db->where('hr_job_posting.department_id', $dept_id);
        $this->db->join('master_department', 'master_department.id = hr_job_posting.department_id', 'LEFT');
        $this->db->join('master_shift', 'master_shift.id = hr_job_posting.shift_id', 'LEFT');
        $this->db->join('master_section', 'master_section.id = hr_job_posting.section_id', 'LEFT');
        $this->db->join('master_leave_type', 'master_leave_type.id = hr_leave.leave_type_id', 'LEFT');
        $query_result = $this->db->get('hr_leave,hr_job,hr_job_posting');
        $result = $query_result->result();
        return $result;
    }

    public function select_forward_list()
    {
        $this->db->select('id,role_name');
        $this->db->where('leave_status', 1);
        $query_result = $this->db->get('master_role');
        $result = $query_result->result();
        return $result;
    }

    public function select_commenct_on_this_leave_id($id)
    {
        $this->db->select('hr_leave_comment.*,master_role.role_name');
        $this->db->where('hr_leave_comment.leave_id', $id);
        $this->db->where('hr_leave_comment.user_id = master_user.user_name');
        $this->db->where('master_user.role_id = master_role.id');
        $this->db->order_by('hr_leave_comment.id', "ASC");
        $query_result = $this->db->get('hr_leave_comment,master_user,master_role');
        $result = $query_result->result();
        return $result;
    }

    public function select_next_leave_step($id)
    {
        $this->db->select('role_name');
        $this->db->where('id', $id);
        $query_result = $this->db->get('master_role');
        $result = $query_result->row();
        return $result;
    }
}