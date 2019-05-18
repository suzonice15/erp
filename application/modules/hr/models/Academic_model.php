<?php

class Academic_Model extends CI_Model
{
    function countAllByLikeCondition($field, $cond)
    {
        $this->db->select('count(hr_academic.emp_id) count_total_rows');
        $this->db->where('hr_job.emp_id = hr_academic.emp_id');
        $this->db->where('hr_job.status', 1);
        $this->db->like($field, $cond, 'after');
        $query_result = $this->db->get('hr_academic,hr_job');
        $result = $query_result->row();
        return $result;
    }

    function countAllByWhereCondition($field, $cond)
    {
        $this->db->select('count(hr_academic.emp_id) count_total_rows');
        $this->db->where('hr_job.emp_id = hr_academic.emp_id');
        $this->db->where('hr_job.status', 1);
        $this->db->where($field, $cond);
        $query_result = $this->db->get('hr_academic,hr_job');
        $result = $query_result->row();
        return $result;
    }

    function countAll()
    {
        $this->db->select('count(hr_academic.emp_id) count_total_rows');
        $this->db->where('hr_job.emp_id = hr_academic.emp_id');
        $this->db->where('hr_job.status', 1);
        $query_result = $this->db->get('hr_academic,hr_job');
        $result = $query_result->row();
        return $result;
    }

    public function select_emp_academic($limit, $start)
    {
        $this->db->limit($limit, $start);
        $this->db->select('hr_academic.*,master_exam_degree.degree_name,master_study_group.group_name,master_board.board_name,master_exam_name.exam_name');
        $this->db->where('hr_job.emp_id = hr_academic.emp_id');
        $this->db->where('hr_job.status', 1);
        $this->db->join('master_exam_degree', 'master_exam_degree.id = hr_academic.exam_degree_id', 'LEFT');
        $this->db->join('master_study_group', 'master_study_group.id = hr_academic.study_group_id', 'LEFT');
        $this->db->join('master_board', 'master_board.id = hr_academic.board_id', 'LEFT');
        $this->db->join('master_exam_name', 'master_exam_name.id = hr_academic.exam_name_id', 'LEFT');
        $query_result = $this->db->get('hr_academic,hr_job');
        $result = $query_result->result();
        return $result;
    }

    public function select_emp_academic_by_emp_id($limit, $start, $emp_id)
    {
        $this->db->limit($limit, $start);
        $this->db->select('hr_academic.*,master_exam_degree.degree_name,master_study_group.group_name,master_board.board_name,master_exam_name.exam_name');
        $this->db->where('hr_job.emp_id = hr_academic.emp_id');
        $this->db->where('hr_job.status', 1);
        $this->db->like('hr_academic.emp_id', $emp_id, 'after');
        $this->db->join('master_exam_degree', 'master_exam_degree.id = hr_academic.exam_degree_id', 'LEFT');
        $this->db->join('master_study_group', 'master_study_group.id = hr_academic.study_group_id', 'LEFT');
        $this->db->join('master_board', 'master_board.id = hr_academic.board_id', 'LEFT');
        $this->db->join('master_exam_name', 'master_exam_name.id = hr_academic.exam_name_id', 'LEFT');
        $query_result = $this->db->get('hr_academic,hr_job');
        $result = $query_result->result();
        return $result;
    }
    public function selectAcademicInfoByWhereCondition($limit, $start,$cond, $id)
    {
        $this->db->limit($limit, $start);
        $this->db->select('hr_academic.*,master_exam_degree.degree_name,master_study_group.group_name,master_board.board_name,master_exam_name.exam_name');
        $this->db->where('hr_job.emp_id = hr_academic.emp_id');
        $this->db->where('hr_job.status', 1);
        $this->db->where($cond,$id);
        $this->db->join('master_exam_degree', 'master_exam_degree.id = hr_academic.exam_degree_id', 'LEFT');
        $this->db->join('master_study_group', 'master_study_group.id = hr_academic.study_group_id', 'LEFT');
        $this->db->join('master_board', 'master_board.id = hr_academic.board_id', 'LEFT');
        $this->db->join('master_exam_name', 'master_exam_name.id = hr_academic.exam_name_id', 'LEFT');
        $query_result = $this->db->get('hr_academic,hr_job');
        $result = $query_result->result();
        return $result;
    }
    
}
