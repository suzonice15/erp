<?php

class Shift_schedule_model extends CI_Model
{
    public function select_all_shift_schedule($limit, $start)
    {
        $this->db->limit($limit, $start);
        $this->db->select('hr_shift_schedule.*,master_shift.shift_name');
        $this->db->order_by('id', "DESC");
        $this->db->join('master_shift','master_shift.id = hr_shift_schedule.shift_id');
        $query_result = $this->db->get('hr_shift_schedule');
        $result = $query_result->result();
        return $result;
    }

    public function check_duplicate_data($module_name)
    {
        $this->db->select('module_name');
        $this->db->where('module_name',$module_name);
        $query_result = $this->db->get('master_module');
        $result = $query_result->result();
        return $result;
    }
}
