<?php

class Admission_report_model extends CI_Model
{
    public function select_all($class_id = null, $study_group_id = null, $shift_id = null, $section_id = null, $year = null, $gender_id = null, $religion_id = null, $blood_group_id = null)
    {
        $this->db->select('academic_studentinfo.*,master_class.name class_name,master_shift.shift_name,master_section.section_name,master_study_group.group_name,master_gender.gender_name,master_religion.religion_name,master_blood_group.blood_group_name');
        if ($class_id) {
            $this->db->where('academic_studentinfo.class_id', $class_id);
        }
        if ($study_group_id) {
            $this->db->where('academic_studentinfo.study_group_id', $study_group_id);
        }
        if ($shift_id) {
            $this->db->where('academic_studentinfo.shift_id', $shift_id);
        }
        if ($section_id) {
            $this->db->where('academic_studentinfo.section_id', $section_id);
        }
        if ($year) {
            $this->db->like('academic_studentinfo.admission_date', $year);
        }
        if ($gender_id) {
            $this->db->where('academic_studentinfo.gender_id', $gender_id);
        }
        if ($religion_id) {
            $this->db->where('academic_studentinfo.religion_id', $religion_id);
        }
        if ($blood_group_id) {
            $this->db->where('academic_studentinfo.blood_group_id', $blood_group_id);
        }

        $this->db->join('master_class', 'master_class.id=academic_studentinfo.class_id', 'left');
        $this->db->join('master_study_group', 'master_study_group.id=academic_studentinfo.study_group_id', 'left');
        $this->db->join('master_shift', 'master_shift.id=academic_studentinfo.shift_id', 'left');
        $this->db->join('master_section', 'master_section.id=academic_studentinfo.section_id', 'left');
        $this->db->join('master_gender', 'master_gender.id=academic_studentinfo.gender_id', 'left');
        $this->db->join('master_religion', 'master_religion.id=academic_studentinfo.religion_id', 'left');
        $this->db->join('master_blood_group', 'master_blood_group.id=academic_studentinfo.blood_group_id', 'left');
        $query_result = $this->db->get('academic_studentinfo');
        $result = $query_result->result();
        return $result;
    }


}
