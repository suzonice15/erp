<?php

class Loan_Model extends CI_Model
{
    function countAllByLikeCondition($field, $cond)
    {
        $this->db->select('count(hr_loan.emp_id) count_total_rows');
        $this->db->where('hr_job.emp_id = hr_loan.emp_id');
        $this->db->where('hr_job.status', 1);
        $this->db->like($field, $cond, 'after');
        $query_result = $this->db->get('hr_loan,hr_job');
        $result = $query_result->row();
        return $result;
    }

    function countAllByWhereCondition($field, $cond)
    {
        $this->db->select('count(hr_loan.emp_id) count_total_rows');
        $this->db->where('hr_job.emp_id = hr_loan.emp_id');
        $this->db->where('hr_job.status', 1);
        $this->db->where($field, $cond);
        $query_result = $this->db->get('hr_loan,hr_job');
        $result = $query_result->row();
        return $result;
    }

    function countAll()
    {
        $this->db->select('count(hr_loan.emp_id) count_total_rows');
        $this->db->where('hr_job.emp_id = hr_loan.emp_id');
        $this->db->where('hr_job.status', 1);
        $query_result = $this->db->get('hr_loan,hr_job');
        $result = $query_result->row();
        return $result;
    }

    public function select_loan($limit, $start)
    {
        $this->db->limit($limit, $start);
        $this->db->select('hr_loan.*,master_loan_type.loan_type_name');
        $this->db->where('hr_job.emp_id = hr_loan.emp_id');
        $this->db->where('hr_job.status', 1);
        $this->db->join('master_loan_type', 'master_loan_type.id = hr_loan.loan_type_id', 'LEFT');
        $query_result = $this->db->get('hr_loan,hr_job');
        $result = $query_result->result();
        return $result;
    }

    public function select_loan_by_emp_id($limit, $start, $emp_id)
    {
        $this->db->limit($limit, $start);
        $this->db->select('hr_loan.*,master_loan_type.loan_type_name');
        $this->db->where('hr_job.emp_id = hr_loan.emp_id');
        $this->db->where('hr_job.status', 1);
        $this->db->like('hr_loan.emp_id', $emp_id,"after");
        $this->db->join('master_loan_type', 'master_loan_type.id = hr_loan.loan_type_id', 'LEFT');
        $query_result = $this->db->get('hr_loan,hr_job');
        $result = $query_result->result();
        return $result;
    }

    public function select_loan_by_amount($limit, $start, $amount)
    {
        $this->db->limit($limit, $start);
        $this->db->select('hr_loan.*,master_loan_type.loan_type_name');
        $this->db->where('hr_job.emp_id = hr_loan.emp_id');
        $this->db->where('hr_job.status', 1);
        $this->db->like('hr_loan.loan_amount', $amount,"after");
        $this->db->join('master_loan_type', 'master_loan_type.id = hr_loan.loan_type_id', 'LEFT');
        $query_result = $this->db->get('hr_loan,hr_job');
        $result = $query_result->result();
        return $result;
    }

    public function select_loan_by_loan_type($limit, $start, $loan_type)
    {
        $this->db->limit($limit, $start);
        $this->db->select('hr_loan.*,master_loan_type.loan_type_name');
        $this->db->where('hr_job.emp_id = hr_loan.emp_id');
        $this->db->where('hr_job.status', 1);
        $this->db->where('hr_loan.loan_type_id', $loan_type);
        $this->db->join('master_loan_type', 'master_loan_type.id = hr_loan.loan_type_id', 'LEFT');
        $query_result = $this->db->get('hr_loan,hr_job');
        $result = $query_result->result();
        return $result;
    }
}
