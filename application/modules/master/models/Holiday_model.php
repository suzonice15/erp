<?php

class Holiday_Model extends CI_Model
{
    public function select_all_holiday($limit, $start)
    {
        $this->db->limit($limit, $start);
        $this->db->order_by('id', "DESC");
        $query_result = $this->db->get('master_holiday');
        $result = $query_result->result();
        return $result;
    }

    public function check_duplicate_data($holiday_name)
    {
        $this->db->select('holiday_name');
        $this->db->where('holiday_name', $holiday_name);
        $query_result = $this->db->get('master_holiday');
        $result = $query_result->result();
        return $result;
    }
}
