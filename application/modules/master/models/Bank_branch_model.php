<?php

class Bank_branch_model extends CI_Model
{

    public function select_all_bank_branch($limit, $start)
    {
        $this->db->limit($limit, $start);
        $this->db->select('master_bank_branch.*,master_bank.bank_name');
        $this->db->join('master_bank', 'master_bank.id = master_bank_branch.bank_id', 'LEFT');
        $this->db->order_by('id', "DESC");
        $query_result = $this->db->get('master_bank_branch');
        $result = $query_result->result();
        return $result;
    }

    public function select_all_Bank_branch_by_name($limit, $start, $bank_branch_name)
    {
        $this->db->limit($limit, $start);
        $this->db->select('master_bank_branch.*,master_bank.bank_name');
        $this->db->like('master_bank_branch.Bank_branch_name', $bank_branch_name, 'after');
        $this->db->join('master_bank', 'master_bank.id = master_bank_branch.bank_id', 'LEFT');
        $this->db->order_by('id', "DESC");
        $query_result = $this->db->get('master_bank_branch');
        $result = $query_result->result();
        return $result;
    }
    
    public function select_all_Bank_branch_by_bank_id($limit, $start, $bank_id)
    {
        $this->db->limit($limit, $start);
        $this->db->select('master_bank_branch.*,master_bank.bank_name');
        $this->db->where('master_bank_branch.bank_id', $bank_id);
        $this->db->join('master_bank', 'master_bank.id = master_bank_branch.bank_id', 'LEFT');
        $this->db->order_by('id', "DESC");
        $query_result = $this->db->get('master_bank_branch');
        $result = $query_result->result();
        return $result;
    }
    
    public function check_duplicate_data($bank_branch_name)
    {
        $this->db->select('bank_branch_name');
        $this->db->where('bank_branch_name',$bank_branch_name);
        $query_result = $this->db->get('master_bank_branch');
        $result = $query_result->result();
        return $result;
    }

}
