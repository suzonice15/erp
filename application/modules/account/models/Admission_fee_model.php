<?php

class Admission_fee_model extends CI_Model
{


    function countAllByLikeCondition($field, $cond)
    {
        $this->db->select('count(student_id) count_total_rows');
        $this->db->like($field, $cond, 'after');
        $query_result = $this->db->get('account_admission_fee');
        $result = $query_result->row();
        return $result;
    }

    function countAllByWhereCondition($field, $cond)
    {
        $this->db->select('count(student_id) count_total_rows');
        $this->db->where($field, $cond);
        $query_result = $this->db->get('account_admission_fee');
        $result = $query_result->row();
        return $result;
    }

    function countAll()
    {
        $this->db->select('count(student_id) count_total_rows');
        $query_result = $this->db->get('account_admission_fee');
        $result = $query_result->row();
        return $result;
    }

    public function select_all_admission_fee($limit, $start)
    {
        $this->db->limit($limit, $start);
        $this->db->select('account_admission_fee.*,academic_studentinfo.student_name,academic_studentinfo.picture,master_class.name class_name');
        $this->db->join('academic_studentinfo', 'academic_studentinfo.student_id=account_admission_fee.student_id', 'LEFT');
        $this->db->join('master_class', 'master_class.id=account_admission_fee.class_id', 'LEFT');
        $this->db->order_by('account_admission_fee.student_id', 'DESC');
        $query_result = $this->db->get('account_admission_fee');
        $result = $query_result->result();
        return $result;
    }

    public function select_admission_fee_by_student_id($limit, $start, $student_id)
    {
        $this->db->limit($limit, $start);
        $this->db->select('account_admission_fee.*,academic_studentinfo.student_name,academic_studentinfo.picture,master_class.name class_name');
        $this->db->join('academic_studentinfo', 'academic_studentinfo.student_id=account_admission_fee.student_id', 'LEFT');
        $this->db->join('master_class', 'master_class.id=account_admission_fee.class_id', 'LEFT');
        $this->db->like('account_admission_fee.student_id', $student_id, 'after');
        $this->db->order_by('account_admission_fee.student_id', 'DESC');
        $query_result = $this->db->get('account_admission_fee');
        $result = $query_result->result();
        return $result;
    }

    public function select_admission_fee_by_year($limit, $start, $year)
    {
        $this->db->limit($limit, $start);
        $this->db->select('account_admission_fee.*,academic_studentinfo.student_name,academic_studentinfo.picture,master_class.name class_name');
        $this->db->join('academic_studentinfo', 'academic_studentinfo.student_id=account_admission_fee.student_id', 'LEFT');
        $this->db->join('master_class', 'master_class.id=account_admission_fee.class_id', 'LEFT');
        $this->db->where('account_admission_fee.year', $year, 'after');
        $this->db->order_by('account_admission_fee.student_id', 'DESC');
        $query_result = $this->db->get('account_admission_fee');
        $result = $query_result->result();
        return $result;
    }

    public function select_admission_fee_by_class_id($limit, $start, $class_id)
    {
        $this->db->limit($limit, $start);
        $this->db->select('account_admission_fee.*,academic_studentinfo.student_name,academic_studentinfo.picture,master_class.name class_name');
        $this->db->join('academic_studentinfo', 'academic_studentinfo.student_id=account_admission_fee.student_id', 'LEFT');
        $this->db->join('master_class', 'master_class.id=account_admission_fee.class_id', 'LEFT');
        $this->db->where('account_admission_fee.class_id', $class_id, 'after');
        $this->db->order_by('account_admission_fee.student_id', 'DESC');
        $query_result = $this->db->get('account_admission_fee');
        $result = $query_result->result();
        return $result;
    }

    public function select_student_info_by_id($student_id)
    {
        $this->db->select('academic_studentinfo.student_id,academic_studentinfo.student_name,master_class.name class_name,master_shift.shift_name,master_section.section_name');
        $this->db->where('academic_studentinfo.student_id',$student_id);
        $this->db->join('master_class', 'master_class.id=academic_studentinfo.class_id', 'LEFT');
        $this->db->join('master_shift', 'master_shift.id=academic_studentinfo.shift_id', 'LEFT');
        $this->db->join('master_section', 'master_section.id=academic_studentinfo.section_id', 'LEFT');
        $query_result = $this->db->get('academic_studentinfo');
        $result = $query_result->result();
        return $result;
    }
}
