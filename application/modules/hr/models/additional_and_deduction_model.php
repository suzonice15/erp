<?php

class Additional_and_deduction_Model extends CI_Model
{
    public function select_all_additional_and_deduction($limit, $start)
    {
        $this->db->limit($limit, $start);
        $this->db->select('hr_additional_and_deduction.*,master_department.department_name, master_shift.shift_name, master_section.section_name');
        $this->db->join('master_department', 'master_department.id = hr_additional_and_deduction.department_id', 'LEFT');
        $this->db->join('master_shift', 'master_shift.id = hr_additional_and_deduction.shift_id', 'LEFT');
        $this->db->join('master_section', 'master_section.id = hr_additional_and_deduction.section_id', 'LEFT');
        $this->db->order_by('hr_additional_and_deduction.id','DESC');
        $query_result = $this->db->get('hr_additional_and_deduction');
        $result = $query_result->result();
        return $result;
    }

    public function select_all_additional_and_deduction_by_department_id($limit, $start, $department_id)
    {
        $this->db->limit($limit, $start);
        $this->db->select('hr_additional_and_deduction.*,master_department.department_name, master_shift.shift_name, master_section.section_name');
        $this->db->where('department_id', $department_id, 'after');
        $this->db->join('master_department', 'master_department.id = hr_additional_and_deduction.department_id', 'LEFT');
        $this->db->join('master_shift', 'master_shift.id = hr_additional_and_deduction.shift_id', 'LEFT');
        $this->db->join('master_section', 'master_section.id = hr_additional_and_deduction.section_id', 'LEFT');
        $this->db->order_by('hr_additional_and_deduction.id','DESC');
        $query_result = $this->db->get('hr_additional_and_deduction');
        $result = $query_result->result();
        return $result;
    }

}
