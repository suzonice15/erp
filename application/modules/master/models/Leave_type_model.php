<?php

class Leave_type_Model extends CI_Model
{
    public function select_all_leave_type($limit, $start)
    {
        $this->db->limit($limit, $start);
        $this->db->order_by('id', "DESC");
        $query_result = $this->db->get('master_leave_type');
        $result = $query_result->result();
        return $result;
    }

    public function check_duplicate_data($leave_type_name)
    {
        $this->db->select('leave_type_name');
        $this->db->where('leave_type_name', $leave_type_name);
        $query_result = $this->db->get('master_leave_type');
        $result = $query_result->result();
        return $result;
    }
}
