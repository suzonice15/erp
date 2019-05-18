<?php

class Teacher_model extends CI_Model
{
    function countAllByLikeCondition($field, $cond)
    {
        $this->db->select('count(hr_basic.emp_id) count_total_rows');
        $this->db->where('hr_job.emp_id = hr_basic.emp_id');
        $this->db->where('hr_job.status', 1);
        $this->db->like($field, $cond, 'after');
        $query_result = $this->db->get('hr_basic,hr_job');
        $result = $query_result->row();
        return $result;
    }

    function countAll()
    {
        $this->db->select('count(hr_basic.emp_id) count_total_rows');
        $this->db->where('hr_job.emp_id = hr_basic.emp_id');
        $this->db->where('hr_job.status', 1);
        $query_result = $this->db->get('hr_basic,hr_job');
        $result = $query_result->row();
        return $result;
    }

    public function select_teacher($limit, $start)
    {
        $this->db->limit($limit, $start);
        $this->db->select('hr_basic.*');
        $this->db->where('hr_job.emp_id = hr_basic.emp_id');
        $this->db->where('hr_job.status', 1);
        $this->db->order_by('hr_basic.emp_id', "ASC");
        $query_result = $this->db->get('hr_basic,hr_job');
        $result = $query_result->result();
        return $result;
    }

    public function select_teacher_by_id($limit, $start, $emp_id)
    {
        $this->db->limit($limit, $start);
        $this->db->select('hr_basic.*');
        $this->db->where('hr_job.emp_id = hr_basic.emp_id');
        $this->db->where('hr_job.status', 1);
        $this->db->like('hr_basic.emp_id', $emp_id, 'after');
        $query_result = $this->db->get('hr_basic,hr_job');
        $result = $query_result->result();
        return $result;
    }

    public function select_teacher_by_name($limit, $start, $emp_name)
    {
        $this->db->limit($limit, $start);
        $this->db->select('hr_basic.*');
        $this->db->where('hr_job.emp_id = hr_basic.emp_id');
        $this->db->where('hr_job.status', 1);
        $this->db->like('hr_basic.emp_name', $emp_name, 'after');
        $query_result = $this->db->get('hr_basic,hr_job');
        $result = $query_result->result();
        return $result;
    }

    public function check_class_teacher($teacher_id)
    {
        $this->db->select('*');
        $this->db->where('teacher_id', $teacher_id);
        $this->db->where('status', 1);
        $query_result = $this->db->get('academic_class_teacher');
        $result = $query_result->result();
        return $result;
    }

    public function check_duplicate_data($teacher_id,$class_id,$subject_id,$shift_id,$section_id,$year)
    {
        $this->db->select('teacher_id');
        $this->db->where('teacher_id', $teacher_id);
        $this->db->where('class_id', $class_id);
        $this->db->where('subject_id', $subject_id);
        $this->db->where('shift_id', $shift_id);
        $this->db->where('section_id', $section_id);
        $this->db->where('year', $year);
        $this->db->where('status', 1);
        $query_result = $this->db->get('academic_subject_teacher');
        $result = $query_result->row();
        return $result;
    }

}
