<?php

class Department_Model extends CI_Model
{
    public function select_all_department($limit, $start)
    {
        $this->db->limit($limit, $start);
        $this->db->order_by('id', "DESC");
        $query_result = $this->db->get('master_department');
        $result = $query_result->result();
        return $result;
    }

    public function check_duplicate_data($department_name)
    {
        $this->db->select('department_name');
        $this->db->where('department_name', $department_name);
        $query_result = $this->db->get('master_department');
        $result = $query_result->result();
        return $result;
    }
}
