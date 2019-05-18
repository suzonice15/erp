<?php

class Exam_fee_model extends CI_Model
{
    public function select_all_exam_fee($limit, $start)
    {
        $this->db->limit($limit, $start);
        $this->db->order_by('id', "DESC");
        $query_result = $this->db->get('master_exam_fee');
        $result = $query_result->result();
        return $result;
    }
}
