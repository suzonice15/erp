<?php

class Contact_Model extends CI_Model
{
    function countAllByLikeCondition($field, $cond)
    {
        $this->db->select('count(hr_contact.emp_id) count_total_rows');
        $this->db->where('hr_job.emp_id = hr_contact.emp_id');
        $this->db->where('hr_job.status', 1);
        $this->db->like($field, $cond, 'after');
        $query_result = $this->db->get('hr_contact,hr_job');
        $result = $query_result->row();
        return $result;
    }

    function countAllByWhereCondition($field, $cond)
    {
        $this->db->select('count(hr_contact.emp_id) count_total_rows');
        $this->db->where('hr_job.emp_id = hr_contact.emp_id');
        $this->db->where('hr_job.status', 1);
        $this->db->where($field, $cond);
        $query_result = $this->db->get('hr_contact,hr_job');
        $result = $query_result->row();
        return $result;
    }

    function countAll()
    {
        $this->db->select('count(hr_contact.emp_id) count_total_rows');
        $this->db->where('hr_job.emp_id = hr_contact.emp_id');
        $this->db->where('hr_job.status', 1);
        $query_result = $this->db->get('hr_contact,hr_job');
        $result = $query_result->row();
        return $result;
    }

    public function select_emp_contact($limit, $start)
    {
        $this->db->limit($limit, $start);
        $this->db->select('hr_contact.*');
        $this->db->where('hr_job.emp_id = hr_contact.emp_id');
        $this->db->where('hr_job.status', 1);
        $query_result = $this->db->get('hr_contact,hr_job');
        $result = $query_result->result();
        return $result;
    }

    public function select_emp_contact_by_emp_id($limit, $start, $emp_id)
    {
        $this->db->limit($limit, $start);
        $this->db->select('hr_contact.*');
        $this->db->where('hr_job.emp_id = hr_contact.emp_id');
        $this->db->where('hr_job.status', 1);
        $this->db->like('hr_contact.emp_id', $emp_id, 'after');
        $query_result = $this->db->get('hr_contact,hr_job');
        $result = $query_result->result();
        return $result;
    }

    public function select_emp_contact_by_division_id($limit, $start, $division_id)
    {
        $this->db->limit($limit, $start);
        $this->db->select('hr_contact.*');
        $this->db->where('hr_job.emp_id = hr_contact.emp_id');
        $this->db->where('hr_job.status', 1);
        $this->db->where('hr_contact.present_division_id', $division_id);
        $query_result = $this->db->get('hr_contact,hr_job');
        $result = $query_result->result();
        return $result;
    }

    public function select_emp_contact_by_district_id($limit, $start, $district_id)
    {
        $this->db->limit($limit, $start);
        $this->db->select('hr_contact.*');
        $this->db->where('hr_job.emp_id = hr_contact.emp_id');
        $this->db->where('hr_job.status', 1);
        $this->db->where('hr_contact.present_district_id', $district_id);
        $query_result = $this->db->get('hr_contact,hr_job');
        $result = $query_result->result();
        return $result;
    }

    public function select_contact_by_id($id)
    {
        $this->db->select('hr_contact.*,master_division.division_name,master_district.district_name,master_thana.thana_name');
        $this->db->where('hr_job.emp_id = hr_contact.emp_id');
        $this->db->where('hr_job.status', 1);
        $this->db->where('hr_contact.id', $id);
        $this->db->join('master_division', 'master_division.id = hr_contact.present_division_id', 'LEFT');
        $this->db->join('master_district', 'master_district.id = hr_contact.present_district_id', 'LEFT');
        $this->db->join('master_thana', 'master_thana.id = hr_contact.present_thana_id', 'LEFT');
        $query_result = $this->db->get('hr_contact,hr_job');
        $result = $query_result->result();
        return $result;
    }

    public function select_division_name($id)
    {
        $this->db->select('division_name');
        $this->db->where('id',$id);
        $query_result = $this->db->get('master_division');
        $result = $query_result->row();
        return $result;
    }
    public function select_district_name($id)
    {
        $this->db->select('district_name');
        $this->db->where('id',$id);
        $query_result = $this->db->get('master_district');
        $result = $query_result->row();
        return $result;
    }
    public function select_thana_name($id)
    {
        $this->db->select('thana_name');
        $this->db->where('id',$id);
        $query_result = $this->db->get('master_thana');
        $result = $query_result->row();
        return $result;
    }
}
