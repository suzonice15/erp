<?php

class Thana_Model extends CI_Model
{

    public function select_all_thana($limit, $start)
    {
        $this->db->limit($limit, $start);
        $this->db->select('master_thana.*,master_district.district_name,master_division.division_name');
        $this->db->join('master_district', 'master_district.id = master_thana.district_id', 'LEFT');
        $this->db->join('master_division', 'master_division.id = master_thana.division_id', 'LEFT');
        $this->db->order_by('master_thana.id', "DESC");
        $query_result = $this->db->get('master_thana');
        $result = $query_result->result();
        return $result;
    }

    public function select_all_thana_by_division_id($limit, $start, $division_id)
    {
        $this->db->limit($limit, $start);
        $this->db->select('master_thana.*,master_district.district_name,master_division.division_name');
        $this->db->where('master_thana.division_id', $division_id);
        $this->db->join('master_district', 'master_district.id = master_thana.district_id', 'LEFT');
        $this->db->join('master_division', 'master_division.id = master_thana.division_id', 'LEFT');
        $this->db->order_by('master_thana.id', "DESC");
        $query_result = $this->db->get('master_thana');
        $result = $query_result->result();
        return $result;
    }
    public function select_all_thana_by_district_id($limit, $start, $district_id)
    {
        $this->db->limit($limit, $start);
        $this->db->select('master_thana.*,master_district.district_name,master_division.division_name');
        $this->db->where('master_thana.district_id', $district_id);
        $this->db->join('master_district', 'master_district.id = master_thana.district_id', 'LEFT');
        $this->db->join('master_division', 'master_division.id = master_thana.division_id', 'LEFT');
        $this->db->order_by('master_thana.id', "DESC");
        $query_result = $this->db->get('master_thana');
        $result = $query_result->result();
        return $result;
    }
    public function select_all_thana_by_name($limit, $start, $thana_name)
    {
        $this->db->limit($limit, $start);
        $this->db->select('master_thana.*,master_district.district_name,master_division.division_name');
        $this->db->like('master_thana.thana_name', $thana_name,'after');
        $this->db->join('master_district', 'master_district.id = master_thana.district_id', 'LEFT');
        $this->db->join('master_division', 'master_division.id = master_thana.division_id', 'LEFT');
        $this->db->order_by('master_thana.id', "DESC");
        $query_result = $this->db->get('master_thana');
        $result = $query_result->result();
        return $result;
    }
    public function check_duplicate_data($thana_name)
    {
        $this->db->select('thana_name');
        $this->db->where('thana_name',$thana_name);
        $query_result = $this->db->get('master_thana');
        $result = $query_result->result();
        return $result;
    }

}
