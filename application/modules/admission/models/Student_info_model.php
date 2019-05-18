<?php

class Student_info_model extends CI_Model
{


    function countAllByLikeCondition($field, $cond)
    {
        $this->db->select('count(academic_studentinfo.student_id) count_total_rows');
        $this->db->where('academic_studentinfo.status', 1);
        $this->db->or_where('academic_studentinfo.status', 0);
        $this->db->like($field, $cond, 'after');
        $query_result = $this->db->get('academic_studentinfo');
        $result = $query_result->row();
        return $result;
    }

    function countAllByWhereCondition($field, $cond)
    {
        $this->db->select('count(academic_studentinfo.student_id) count_total_rows');
        $this->db->where('academic_studentinfo.status', 1);
        $this->db->or_where('academic_studentinfo.status', 0);
        $this->db->where($field, $cond);
        $query_result = $this->db->get('academic_studentinfo');
        $result = $query_result->row();
        return $result;
    }

    function countAll()
    {
        $this->db->select('count(student_id) count_total_rows');
        $this->db->where('status', 1);
        $this->db->or_where('status', 0);
        $query_result = $this->db->get('academic_studentinfo');
        $result = $query_result->row();
        return $result;
    }

    public function select_all_active_student($limit, $start)
    {
        $this->db->limit($limit, $start);
        $this->db->select('*');
        $this->db->where('status', 1);
        $this->db->or_where('status', 0);
        $this->db->order_by('student_id', 'DESC');
        $query_result = $this->db->get('academic_studentinfo');
        $result = $query_result->result();
        return $result;
    }

    public function select_student_info_by_student_id($limit, $start, $student_id)
    {
        $this->db->limit($limit, $start);
        $this->db->select('*');
        $this->db->like('student_id', $student_id, 'after');
        $this->db->where("(status='1' OR status='0')");
        $this->db->order_by('student_id', 'DESC');
        $query_result = $this->db->get('academic_studentinfo');
        $result = $query_result->result();
        return $result;
    }

    public function select_student_info_by_student_name($limit, $start, $student_name)
    {
        $this->db->limit($limit, $start);
        $this->db->select('*');
        $this->db->like('student_name', $student_name, 'after');
        $this->db->where("(status='1' OR status='0')");
        $this->db->order_by('student_id', 'DESC');
        $query_result = $this->db->get('academic_studentinfo');
        $result = $query_result->result();
        return $result;
    }

    public function select_student_info_by_class_id($limit, $start, $class_id)
    {
        $this->db->limit($limit, $start);
        $this->db->select('*');
        $this->db->like('class_id', $class_id, 'after');
        $this->db->where("(status='1' OR status='0')");
        $this->db->order_by('student_id', 'DESC');
        $query_result = $this->db->get('academic_studentinfo');
        $result = $query_result->result();
        return $result;
    }


    public function select_student_info_by_id($id)
    {
        $this->db->select('academic_studentinfo.*,master_class.name class_name,master_study_group.group_name,master_shift.shift_name,master_section.section_name,master_subject.name subject_name,master_religion.religion_name,master_gender.gender_name,master_blood_group.blood_group_name');
        $this->db->where('academic_studentinfo.id', $id);
        $this->db->join('master_class', 'master_class.id=academic_studentinfo.class_id', 'LEFT');
        $this->db->join('master_study_group', 'master_study_group.id=academic_studentinfo.study_group_id', 'LEFT');
        $this->db->join('master_shift', 'master_shift.id=academic_studentinfo.shift_id', 'LEFT');
        $this->db->join('master_section', 'master_section.id=academic_studentinfo.section_id', 'LEFT');
        $this->db->join('master_subject', 'master_subject.id=academic_studentinfo.fourth_subject_id', 'LEFT');
        $this->db->join('master_religion', 'master_religion.id=academic_studentinfo.religion_id', 'LEFT');
        $this->db->join('master_gender', 'master_gender.id=academic_studentinfo.gender_id', 'LEFT');
        $this->db->join('master_blood_group', 'master_blood_group.id=academic_studentinfo.blood_group_id', 'LEFT');
        $this->db->order_by('academic_studentinfo.status', 'DESC');
        $query_result = $this->db->get('academic_studentinfo');
        $result = $query_result->result();
        return $result;
    }

    public function select_last_student_id($class_id, $shift_id, $section_id)
    {
        $this->db->select('student_id');
        $this->db->where('class_id', $class_id);
        $this->db->where('shift_id', $shift_id);
        $this->db->where('section_id', $section_id);
        $this->db->order_by('student_id', 'DESC');
        $query_result = $this->db->get('academic_studentinfo');
        $result = $query_result->row();
        return $result; 
    }

}
