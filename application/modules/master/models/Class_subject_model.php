<?php

class Class_subject_model extends CI_Model
{

    public function select_all_class_subject($limit, $start)
    {
        $this->db->limit($limit, $start);
        $this->db->select('master_class_subject.*,master_class.name class_name,master_subject.name subject_name');
        $this->db->join('master_class', 'master_class.id = master_class_subject.class_id', 'LEFT');
        $this->db->join('master_subject', 'master_subject.id = master_class_subject.subject_id', 'LEFT');
        $this->db->order_by('master_class_subject.id', "DESC");
        $query_result = $this->db->get('master_class_subject');
        $result = $query_result->result();
        return $result;
    }

    public function select_all_class_subject_by_class_id($limit, $start, $class_id)
    {
        $this->db->limit($limit, $start);
        $this->db->select('master_class_subject.*,master_class.name class_name,master_subject.name subject_name');
        $this->db->join('master_class', 'master_class.id = master_class_subject.class_id', 'LEFT');
        $this->db->join('master_subject', 'master_subject.id = master_class_subject.subject_id', 'LEFT');
        $this->db->where('master_class_subject.class_id',$class_id);
        $this->db->order_by('master_class_subject.id', "DESC");
        $query_result = $this->db->get('master_class_subject');
        $result = $query_result->result();
        return $result;
    }

    public function select_all_class_subject_by_subject_id($limit, $start, $subject_id)
    {
        $this->db->limit($limit, $start);
        $this->db->select('master_class_subject.*,master_class.name class_name,master_subject.name subject_name');
        $this->db->join('master_class', 'master_class.id = master_class_subject.class_id', 'LEFT');
        $this->db->join('master_subject', 'master_subject.id = master_class_subject.subject_id', 'LEFT');
        $this->db->where('master_class_subject.subject_id',$subject_id);
        $this->db->order_by('master_class_subject.id', "DESC");
        $query_result = $this->db->get('master_class_subject');
        $result = $query_result->result();
        return $result;
    }


}
