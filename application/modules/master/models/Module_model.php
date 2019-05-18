<?php

class Module_Model extends CI_Model
{
    public function select_all_module($limit, $start)
    {
        $this->db->limit($limit, $start);
        $this->db->order_by('id', "DESC");
        $query_result = $this->db->get('master_module');
        $result = $query_result->result();
        return $result;
    }

    public function check_duplicate_data($module_name)
    {
        $this->db->select('module_name');
        $this->db->where('module_name', $module_name);
        $query_result = $this->db->get('master_module');
        $result = $query_result->result();
        return $result;
    }
    
}
