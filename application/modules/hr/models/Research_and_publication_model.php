<?php

class Research_and_publication_Model extends CI_Model
{
    function countAllByLikeCondition($field, $cond)
    {
        $this->db->select('count(DISTINCT(hr_research_and_publication.emp_id)) count_total_rows');
        $this->db->where('hr_job.emp_id = hr_research_and_publication.emp_id');
        $this->db->where('hr_job.status', 1);
        $this->db->like($field, $cond, 'after');
        $query_result = $this->db->get('hr_research_and_publication,hr_job');
        $result = $query_result->row();
        return $result;
    }

    function countAll()
    {
        $this->db->select('count(DISTINCT(hr_research_and_publication.emp_id)) count_total_rows');
        $this->db->where('hr_job.emp_id = hr_research_and_publication.emp_id');
        $this->db->where('hr_job.status', 1);
        $query_result = $this->db->get('hr_research_and_publication,hr_job');
        $result = $query_result->row();
        return $result;
    }

    public function select_research_and_publication($limit, $start)
    {
        $this->db->limit($limit, $start);
        $this->db->select('hr_research_and_publication.*');
        $this->db->where('hr_job.emp_id = hr_research_and_publication.emp_id');
        $this->db->where('hr_job.status', 1);
        $this->db->group_by('hr_research_and_publication.emp_id');
        $query_result = $this->db->get('hr_research_and_publication,hr_job');
        $result = $query_result->result();
        return $result;
    }

    public function select_research_and_publication_by_id($emp_id)
    {
        $this->db->select('hr_research_and_publication.*');
        $this->db->where('hr_job.emp_id = hr_research_and_publication.emp_id');
        $this->db->where('hr_job.status', 1);
        $this->db->where('hr_research_and_publication.emp_id', $emp_id);
        $query_result = $this->db->get('hr_research_and_publication,hr_job');
        $result = $query_result->result();
        return $result;
    }

    public function select_research_and_publication_by_emp_id($limit, $start, $emp_id)
    {
        $this->db->limit($limit, $start);
        $this->db->select('hr_research_and_publication.*');
        $this->db->where('hr_job.emp_id = hr_research_and_publication.emp_id');
        $this->db->where('hr_job.status', 1);
        $this->db->like('hr_research_and_publication.emp_id', $emp_id, 'after');
        $this->db->group_by('hr_research_and_publication.emp_id');
        $query_result = $this->db->get('hr_research_and_publication,hr_job');
        $result = $query_result->result();
        return $result;
    }
}
