<?php

class Section_Model extends CI_Model
{

    public function select_all_section($limit, $start)
    {
        $this->db->limit($limit, $start);
        $this->db->select('master_section.*,master_shift.shift_name');
        $this->db->join('master_shift', 'master_shift.id = master_section.shift_id', 'LEFT');
        $this->db->order_by('id', "DESC");
        $query_result = $this->db->get('master_section');
        $result = $query_result->result();
        return $result;
    }
}
