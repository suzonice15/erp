<?php

class Fourth_subject_model extends CI_Model
{
    public function select_fourth_subject($limit, $start)
    {
        $this->db->limit($limit, $start);
        $this->db->select('academic_fourth_subject.*,master_subject.name subject_name,academic_studentinfo.student_name');
        $this->db->join('master_subject','master_subject.id=academic_fourth_subject.subject_id');
        $this->db->join('academic_studentinfo','academic_studentinfo.student_id=academic_fourth_subject.student_id');
        $query_result = $this->db->get('academic_fourth_subject');
        $result = $query_result->result();
        return $result;
    }

    public function select_fourth_subject_by_subject_id($limit, $start, $subject_id)
    {
        $this->db->limit($limit, $start);
        $this->db->select('academic_fourth_subject.*,master_subject.name subject_name,academic_studentinfo.student_name');
        $this->db->join('master_subject','master_subject.id=academic_fourth_subject.subject_id');
        $this->db->join('academic_studentinfo','academic_studentinfo.student_id=academic_fourth_subject.student_id');
        $this->db->where('academic_fourth_subject.subject_id', $subject_id);
        $query_result = $this->db->get('academic_fourth_subject');
        $result = $query_result->result();
        return $result;
    }

    public function select_fourth_subject_by_student_id($limit, $start, $student_id)
    {
        $this->db->limit($limit, $start);
        $this->db->select('academic_fourth_subject.*,master_subject.name subject_name,academic_studentinfo.student_name');
        $this->db->join('master_subject','master_subject.id=academic_fourth_subject.subject_id');
        $this->db->join('academic_studentinfo','academic_studentinfo.student_id=academic_fourth_subject.student_id');
        $this->db->like('academic_fourth_subject.student_id', $student_id, 'after');
        $query_result = $this->db->get('academic_fourth_subject');
        $result = $query_result->result();
        return $result;
    }

    public function check_class_student($student_id)
    {
        $this->db->select('*');
        $this->db->where('student_id', $student_id);
        $this->db->where('status', 1);
        $query_result = $this->db->get('academic_class_student');
        $result = $query_result->result();
        return $result;
    }


}
