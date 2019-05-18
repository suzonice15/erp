<?php

class Exam_fee_model extends CI_Model
{


    function countAllByLikeCondition($field, $cond)
    {
        $this->db->select('count(student_id) count_total_rows');
        $this->db->like($field, $cond, 'after');
        $query_result = $this->db->get('account_exam_fee');
        $result = $query_result->row();
        return $result;
    }

    function countAllByWhereCondition($field, $cond)
    {
        $this->db->select('count(student_id) count_total_rows');
        $this->db->where($field, $cond);
        $query_result = $this->db->get('account_exam_fee');
        $result = $query_result->row();
        return $result;
    }

    function countAll()
    {
        $this->db->select('count(student_id) count_total_rows');
        $this->db->group_by('student_id', 'DESC');
        $query_result = $this->db->get('account_exam_fee');
        $result = $query_result->row();
        return $result;
    }

    public function select_all_exam_fee($limit, $start)
    {
        $this->db->limit($limit, $start);
        $this->db->select('account_exam_fee.*,academic_studentinfo.student_name,academic_studentinfo.picture,master_class.name class_name');
        $this->db->join('academic_studentinfo', 'academic_studentinfo.student_id=account_exam_fee.student_id', 'LEFT');
        $this->db->join('master_class', 'master_class.id=account_exam_fee.class_id', 'LEFT');
        $this->db->group_by('account_exam_fee.student_id', 'DESC');
        $query_result = $this->db->get('account_exam_fee');
        $result = $query_result->result();
        return $result;
    }

    public function select_exam_fee_by_student_id($limit, $start, $student_id)
    {
        $this->db->limit($limit, $start);
        $this->db->select('account_exam_fee.*,academic_studentinfo.student_name,academic_studentinfo.picture,master_class.name class_name');
        $this->db->join('academic_studentinfo', 'academic_studentinfo.student_id=account_exam_fee.student_id', 'LEFT');
        $this->db->join('master_class', 'master_class.id=account_exam_fee.class_id', 'LEFT');
        $this->db->like('account_exam_fee.student_id', $student_id, 'after');
        $this->db->order_by('account_exam_fee.student_id', 'DESC');
        $query_result = $this->db->get('account_exam_fee');
        $result = $query_result->result();
        return $result;
    }

    public function select_exam_fee_by_year($limit, $start, $year)
    {
        $this->db->limit($limit, $start);
        $this->db->select('account_exam_fee.*,academic_studentinfo.student_name,academic_studentinfo.picture,master_class.name class_name');
        $this->db->join('academic_studentinfo', 'academic_studentinfo.student_id=account_exam_fee.student_id', 'LEFT');
        $this->db->join('master_class', 'master_class.id=account_exam_fee.class_id', 'LEFT');
        $this->db->where('account_exam_fee.year', $year, 'after');
        $this->db->order_by('account_exam_fee.student_id', 'DESC');
        $query_result = $this->db->get('account_exam_fee');
        $result = $query_result->result();
        return $result;
    }

    public function select_exam_fee_by_class_id($limit, $start, $class_id)
    {
        $this->db->limit($limit, $start);
        $this->db->select('account_exam_fee.*,academic_studentinfo.student_name,academic_studentinfo.picture,master_class.name class_name');
        $this->db->join('academic_studentinfo', 'academic_studentinfo.student_id=account_exam_fee.student_id', 'LEFT');
        $this->db->join('master_class', 'master_class.id=account_exam_fee.class_id', 'LEFT');
        $this->db->where('account_exam_fee.class_id', $class_id, 'after');
        $this->db->order_by('account_exam_fee.student_id', 'DESC');
        $query_result = $this->db->get('account_exam_fee');
        $result = $query_result->result();
        return $result;
    }

    public function select_current_student_info($student_id, $year)
    {
        $this->db->select('*');
        $this->db->where('student_id', $student_id);
        $this->db->where('year', $year);
        $query_result = $this->db->get('academic_enroll_class');
        $result = $query_result->row();
        return $result;
    }

    public function select_student_info_by_id($student_id, $academic_exam_id)
    {
        $this->db->select('account_exam_fee.*,academic_studentinfo.student_name,master_class.name class_name,master_shift.shift_name,master_section.section_name');
        $this->db->join('academic_studentinfo', 'academic_studentinfo.student_id=account_exam_fee.student_id', 'LEFT');
        $this->db->join('master_class', 'master_class.id=account_exam_fee.class_id', 'LEFT');
        $this->db->join('master_shift', 'master_shift.id=account_exam_fee.shift_id', 'LEFT');
        $this->db->join('master_section', 'master_section.id=account_exam_fee.section_id', 'LEFT');
        $this->db->where('account_exam_fee.student_id', $student_id);
        $this->db->where('account_exam_fee.year', $academic_exam_id);
        $query_result = $this->db->get('account_exam_fee');
        $result = $query_result->row();
        return $result;
    }


}
