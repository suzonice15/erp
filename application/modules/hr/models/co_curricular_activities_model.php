<?php

class Co_curricular_activities_Model extends CI_Model
{
    function countAllByLikeCondition($field, $cond)
    {
        $this->db->select('count(hr_co_curricular_activities.emp_id) count_total_rows');
        $this->db->where('hr_job.emp_id = hr_co_curricular_activities.emp_id');
        $this->db->where('hr_job.status', 1);
        $this->db->like($field, $cond, 'after');
        $query_result = $this->db->get('hr_co_curricular_activities,hr_job');
        $result = $query_result->row();
        return $result;
    }

    function countAll()
    {
        $this->db->select('count(hr_co_curricular_activities.emp_id) count_total_rows');
        $this->db->where('hr_job.emp_id = hr_co_curricular_activities.emp_id');
        $this->db->where('hr_job.status', 1);
        $query_result = $this->db->get('hr_co_curricular_activities,hr_job');
        $result = $query_result->row();
        return $result;
    }

    public function select_emp_co_curricular_activities($limit, $start)
    {
        $this->db->limit($limit, $start);
        $this->db->select('hr_co_curricular_activities.*');
        $this->db->where('hr_job.emp_id = hr_co_curricular_activities.emp_id');
        $this->db->where('hr_job.status', 1);
        $query_result = $this->db->get('hr_co_curricular_activities,hr_job');
        $result = $query_result->result();
        return $result;
    }

    public function select_emp_co_curricular_activities_by_emp_id($limit, $start, $emp_id)
    {
        $this->db->limit($limit, $start);
        $this->db->select('hr_co_curricular_activities.*');
        $this->db->where('hr_job.emp_id = hr_co_curricular_activities.emp_id');
        $this->db->where('hr_job.status', 1);
        $this->db->like('hr_co_curricular_activities.emp_id', $emp_id, 'after');
        $query_result = $this->db->get('hr_co_curricular_activities,hr_job');
        $result = $query_result->result();
        return $result;
    }
}
