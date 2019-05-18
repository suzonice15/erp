<?php

class bonus_Model extends CI_Model
{
    public function select_all_bonus($limit, $start)
    {
        $this->db->limit($limit, $start);
        $this->db->select('hr_bonus.*,master_department.department_name, master_shift.shift_name, master_section.section_name,master_bonus.bonus_name');
        $this->db->join('master_department', 'master_department.id = hr_bonus.department_id', 'LEFT');
        $this->db->join('master_shift', 'master_shift.id = hr_bonus.shift_id', 'LEFT');
        $this->db->join('master_section', 'master_section.id = hr_bonus.section_id', 'LEFT');
        $this->db->join('master_bonus', 'master_bonus.id = hr_bonus.bonus_type_id', 'LEFT');
        $this->db->order_by('hr_bonus.id','DESC');
        $query_result = $this->db->get('hr_bonus');
        $result = $query_result->result();
        return $result;
    }

    public function select_all_bonus_by_department_id($limit, $start, $department_id)
    {
        $this->db->limit($limit, $start);
        $this->db->select('hr_bonus.*,master_department.department_name, master_shift.shift_name, master_section.section_name,master_bonus.bonus_name');
        $this->db->where('department_id', $department_id, 'after');
        $this->db->join('master_department', 'master_department.id = hr_bonus.department_id', 'LEFT');
        $this->db->join('master_shift', 'master_shift.id = hr_bonus.shift_id', 'LEFT');
        $this->db->join('master_section', 'master_section.id = hr_bonus.section_id', 'LEFT');
        $this->db->join('master_bonus', 'master_bonus.id = hr_bonus.bonus_type_id', 'LEFT');
        $this->db->order_by('hr_bonus.id','DESC');
        $query_result = $this->db->get('hr_bonus');
        $result = $query_result->result();
        return $result;
    }

}
