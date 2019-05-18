<?php

class District_Model extends CI_Model
{

    public function select_all_district($limit, $start)
    {
        $this->db->limit($limit, $start);
        $this->db->select('master_district.*,master_division.division_name');
        $this->db->join('master_division', 'master_division.id = master_district.division_id', 'LEFT');
        $this->db->order_by('id', "DESC");
        $query_result = $this->db->get('master_district');
        $result = $query_result->result();
        return $result;
    }

    public function select_all_district_by_name($limit, $start, $district_name)
    {
        $this->db->limit($limit, $start);
        $this->db->select('master_district.*,master_division.division_name');
        $this->db->like('master_district.district_name', $district_name, 'after');
        $this->db->join('master_division', 'master_division.id = master_district.division_id', 'LEFT');
        $this->db->order_by('id', "DESC");
        $query_result = $this->db->get('master_district');
        $result = $query_result->result();
        return $result;
    }
    
    public function select_all_district_by_division_id($limit, $start, $division_id)
    {
        $this->db->limit($limit, $start);
        $this->db->select('master_district.*,master_division.division_name');
        $this->db->where('master_district.division_id', $division_id);
        $this->db->join('master_division', 'master_division.id = master_district.division_id', 'LEFT');
        $this->db->order_by('id', "DESC");
        $query_result = $this->db->get('master_district');
        $result = $query_result->result();
        return $result;
    }
    
    public function check_duplicate_data($district_name)
    {
        $this->db->select('district_name');
        $this->db->where('district_name',$district_name);
        $query_result = $this->db->get('master_district');
        $result = $query_result->result();
        return $result;
    }

}
