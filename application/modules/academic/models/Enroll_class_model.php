<?php

class Enroll_class_model extends CI_Model
{
    public function select_enroll_class($limit, $start)
    {
        $this->db->limit($limit, $start);
        $this->db->select('academic_enroll_class.*,master_class.name class_name,academic_studentinfo.student_name,master_shift.shift_name,master_section.section_name,master_study_group.group_name');
        $this->db->join('master_class', 'master_class.id=academic_enroll_class.class_id');
        $this->db->join('master_shift', 'master_shift.id=academic_enroll_class.shift_id');
        $this->db->join('master_section', 'master_section.id=academic_enroll_class.section_id');
        $this->db->join('academic_studentinfo', 'academic_studentinfo.student_id=academic_enroll_class.student_id');
        $this->db->join('master_study_group', 'master_study_group.id=academic_enroll_class.study_group_id');
        $query_result = $this->db->get('academic_enroll_class');
        $result = $query_result->result();
        return $result;
    }

    public function select_enroll_class_by_subject_id($limit, $start, $subject_id)
    {
        $this->db->limit($limit, $start);
        $this->db->select('academic_enroll_class.*,master_subject.name subject_name,academic_studentinfo.student_name');
        $this->db->join('master_subject', 'master_subject.id=academic_enroll_class.subject_id');
        $this->db->join('academic_studentinfo', 'academic_studentinfo.student_id=academic_enroll_class.student_id');
        $this->db->where('academic_enroll_class.subject_id', $subject_id);
        $query_result = $this->db->get('academic_enroll_class');
        $result = $query_result->result();
        return $result;
    }

    public function select_enroll_class_by_student_id($limit, $start, $student_id)
    {
        $this->db->limit($limit, $start);
        $this->db->select('academic_enroll_class.*,master_subject.name subject_name,academic_studentinfo.student_name');
        $this->db->join('master_subject', 'master_subject.id=academic_enroll_class.subject_id');
        $this->db->join('academic_studentinfo', 'academic_studentinfo.student_id=academic_enroll_class.student_id');
        $this->db->like('academic_enroll_class.student_id', $student_id, 'after');
        $query_result = $this->db->get('academic_enroll_class');
        $result = $query_result->result();
        return $result;
    }

    public function select_student_by_class_id($class_id)
    {
        $this->db->select('academic_studentinfo.student_id,academic_studentinfo.student_name,academic_studentinfo.class_id,academic_studentinfo.shift_id,academic_studentinfo.section_id,academic_studentinfo.admission_date,academic_studentinfo.study_group_id,master_class.name class_name,master_shift.shift_name,master_section.section_name,master_study_group.group_name');
        $this->db->where('academic_studentinfo.class_id', $class_id);
        $this->db->where('academic_studentinfo.status', 1);
        $this->db->join('master_class', 'master_class.id=academic_studentinfo.class_id');
        $this->db->join('master_shift', 'master_shift.id=academic_studentinfo.shift_id');
        $this->db->join('master_section', 'master_section.id=academic_studentinfo.section_id');
        $this->db->join('master_study_group', 'master_study_group.id=academic_studentinfo.study_group_id');
        $query_result = $this->db->get('academic_studentinfo');
        $result = $query_result->result();
        return $result;
    }


}
