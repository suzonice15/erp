<?php

class Bank_Model extends CI_Model
{
    public function select_all_bank($limit, $start)
    {
        $this->db->limit($limit, $start);
        $this->db->order_by('id', "DESC");
        $query_result = $this->db->get('master_bank');
        $result = $query_result->result();
        return $result;
    }
}
