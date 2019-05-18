<?php

class Result_model extends CI_Model
{

    public function select_all_result($limit, $start)
    {
        $this->db->limit($limit, $start);
        $this->db->select('exam_result.*,academic_studentinfo.student_name,master_academic_exam.exam_name');
        $this->db->join('academic_studentinfo', 'academic_studentinfo.student_id=exam_result.student_id', 'LEFT');
        $this->db->join('master_academic_exam', 'master_academic_exam.id=exam_result.academic_exam_id', 'LEFT');
        $this->db->order_by('id', 'DESC');
        $query_result = $this->db->get('exam_result');
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

    public function select_subject_by_class($class_id)
    {
        $this->db->select('master_subject.*');
        $this->db->where('master_class_subject.class_id', $class_id);
        $this->db->where('master_subject.id = master_class_subject.subject_id');
        $query_result = $this->db->get('master_class_subject,master_subject');
        $result = $query_result->result();
        return $result;
    }

    public function select_student_id($class_id, $shift_id, $section_id, $study_group_id, $year)
    {
        $this->db->select('academic_enroll_class.*,academic_studentinfo.student_name');
        $this->db->where('academic_enroll_class.class_id', $class_id);
        $this->db->where('academic_enroll_class.shift_id', $shift_id);
        $this->db->where('academic_enroll_class.section_id', $section_id);
        $this->db->where('academic_enroll_class.study_group_id', $study_group_id);
        $this->db->where('academic_enroll_class.year', $year);
        $this->db->where('academic_enroll_class.status', 1);
        $this->db->join('academic_studentinfo', 'academic_studentinfo.student_id=academic_enroll_class.student_id');
        $query_result = $this->db->get('academic_enroll_class');
        $result = $query_result->result();
        return $result;
    }

    public function select_result_by_id($id)
    {
        $this->db->select('exam_result.*,master_class.name class_name,master_subject.name subject_name,master_shift.shift_name,master_section.section_name,master_academic_exam.exam_name,master_study_group.group_name,academic_studentinfo.student_name,academic_studentinfo.student_email,academic_studentinfo.student_mobile_no,academic_studentinfo.present_address,academic_studentinfo.picture');
        $this->db->where('exam_result.id', $id);
        $this->db->join('master_class', 'master_class.id=exam_result.class_id', 'LEFT');
        $this->db->join('master_subject', 'master_subject.id=exam_result.subject_id', 'LEFT');
        $this->db->join('master_shift', 'master_shift.id=exam_result.shift_id', 'LEFT');
        $this->db->join('master_section', 'master_section.id=exam_result.section_id', 'LEFT');
        $this->db->join('master_academic_exam', 'master_academic_exam.id=exam_result.academic_exam_id', 'LEFT');
        $this->db->join('master_study_group', 'master_study_group.id=exam_result.study_group_id', 'LEFT');
        $this->db->join('academic_studentinfo', 'academic_studentinfo.student_id=exam_result.student_id', 'LEFT');
        $query_result = $this->db->get('exam_result');
        $result = $query_result->result();
        return $result;
    }

}
