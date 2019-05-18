<?php

class Admit_card_model extends CI_Model
{
    public function select_all_paid_student($academic_exam_id, $year)
    {
        $this->db->select('account_exam_fee.student_id,academic_studentinfo.student_name,academic_studentinfo.picture,master_class.name class_name,master_shift.shift_name,master_section.section_name,master_academic_exam.exam_name');
        $this->db->where('account_exam_fee.academic_exam_id', $academic_exam_id);
        $this->db->where('account_exam_fee.year', $year);
        $this->db->join('academic_studentinfo', 'academic_studentinfo.student_id=account_exam_fee.student_id');
        $this->db->join('master_class', 'master_class.id=account_exam_fee.class_id');
        $this->db->join('master_shift', 'master_shift.id=account_exam_fee.shift_id');
        $this->db->join('master_section', 'master_section.id=account_exam_fee.section_id');
        $this->db->join('master_academic_exam', 'master_academic_exam.id=account_exam_fee.academic_exam_id');
        $query_result = $this->db->get('account_exam_fee');
        $result = $query_result->result();
        return $result;
    }


}
