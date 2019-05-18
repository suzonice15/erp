<?php

class Designation_Model extends CI_Model
{
    public function select_all_designation($limit, $start)
    {
        $this->db->limit($limit, $start);
        $this->db->order_by('id', "DESC");
        $query_result = $this->db->get('master_designation');
        $result = $query_result->result();
        return $result;
    }

    public function check_duplicate_data($designation_name)
    {
        $this->db->select('designation_name');
        $this->db->where('designation_name', $designation_name);
        $query_result = $this->db->get('master_designation');
        $result = $query_result->result();
        return $result;
    }
}
