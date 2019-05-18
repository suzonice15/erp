<?php

class family_Model extends CI_Model
{
    function countAllByLikeCondition($field, $cond)
    {
        $this->db->select('count(hr_family.emp_id) count_total_rows');
        $this->db->where('hr_job.emp_id = hr_family.emp_id');
        $this->db->where('hr_job.status', 1);
        $this->db->like($field, $cond, 'after');
        $query_result = $this->db->get('hr_family,hr_job');
        $result = $query_result->row();
        return $result;
    }
    function countAll()
    {
        $this->db->select('count(hr_family.emp_id) count_total_rows');
        $this->db->where('hr_job.emp_id = hr_family.emp_id');
        $this->db->where('hr_job.status', 1);
        $query_result = $this->db->get('hr_family,hr_job');
        $result = $query_result->row();
        return $result;
    }

    public function select_emp_family($limit, $start)
    {
        $this->db->limit($limit, $start);
        $this->db->select('hr_family.*,master_profession.profession_name, master_designation.designation_name');
        $this->db->where('hr_job.emp_id = hr_family.emp_id');
        $this->db->where('hr_job.status', 1);
        $this->db->join('master_profession', 'master_profession.id = hr_family.profession_id', 'LEFT');
        $this->db->join('master_designation', 'master_designation.id = hr_family.designation_id', 'LEFT');
        $this->db->order_by('hr_family.id', 'DESC');
        $query_result = $this->db->get('hr_family,hr_job');
        $result = $query_result->result();
        return $result;
    }

    public function select_emp_family_by_emp_id($limit, $start, $emp_id)
    {
        $this->db->limit($limit, $start);
        $this->db->select('hr_family.*,master_profession.profession_name, master_designation.designation_name');
        $this->db->where('hr_job.emp_id = hr_family.emp_id');
        $this->db->where('hr_job.status', 1);
        $this->db->like('hr_family.emp_id', $emp_id, 'after');
        $this->db->join('master_profession', 'master_profession.id = hr_family.profession_id', 'LEFT');
        $this->db->join('master_designation', 'master_designation.id = hr_family.designation_id', 'LEFT');
        $this->db->order_by('hr_family.id', 'DESC');
        $query_result = $this->db->get('hr_family,hr_job');
        $result = $query_result->result();
        return $result;
    }

    public function select_emp_family_by_mobile_no($limit, $start, $mobile_no)
    {
        $this->db->limit($limit, $start);
        $this->db->select('hr_family.*,master_profession.profession_name, master_designation.designation_name');
        $this->db->where('hr_job.emp_id = hr_family.emp_id');
        $this->db->where('hr_job.status', 1);
        $this->db->like('hr_family.contact_no', $mobile_no, 'after');
        $this->db->join('master_profession', 'master_profession.id = hr_family.profession_id', 'LEFT');
        $this->db->join('master_designation', 'master_designation.id = hr_family.designation_id', 'LEFT');
        $this->db->order_by('hr_family.id', 'DESC');
        $query_result = $this->db->get('hr_family,hr_job');
        $result = $query_result->result();
        return $result;
    }

}
