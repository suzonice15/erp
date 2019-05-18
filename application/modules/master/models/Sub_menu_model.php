<?php

class Sub_Menu_Model extends CI_Model
{

    public function select_all_sub_menu($limit, $start)
    {
        $this->db->limit($limit, $start);
        $this->db->select('master_sub_menu.*,master_menu.menu_name,master_module.module_name');
        $this->db->join('master_menu', 'master_menu.id = master_sub_menu.menu_id', 'LEFT');
        $this->db->join('master_module', 'master_module.id = master_sub_menu.module_id', 'LEFT');
        $this->db->order_by('master_sub_menu.id', "DESC");
        $query_result = $this->db->get('master_sub_menu');
        $result = $query_result->result();
        return $result;
    }

    public function select_all_sub_menu_by_module_id($limit, $start, $module_id)
    {
        $this->db->limit($limit, $start);
        $this->db->select('master_sub_menu.*,master_menu.menu_name,master_module.module_name');
        $this->db->where('master_sub_menu.module_id', $module_id);
        $this->db->join('master_menu', 'master_menu.id = master_sub_menu.menu_id', 'LEFT');
        $this->db->join('master_module', 'master_module.id = master_sub_menu.module_id', 'LEFT');
        $this->db->order_by('master_sub_menu.id', "DESC");
        $query_result = $this->db->get('master_sub_menu');
        $result = $query_result->result();
        return $result;
    }
    public function select_all_sub_menu_by_menu_id($limit, $start, $menu_id)
    {
        $this->db->limit($limit, $start);
        $this->db->select('master_sub_menu.*,master_menu.menu_name,master_module.module_name');
        $this->db->where('master_sub_menu.menu_id', $menu_id);
        $this->db->join('master_menu', 'master_menu.id = master_sub_menu.menu_id', 'LEFT');
        $this->db->join('master_module', 'master_module.id = master_sub_menu.module_id', 'LEFT');
        $this->db->order_by('master_sub_menu.id', "DESC");
        $query_result = $this->db->get('master_sub_menu');
        $result = $query_result->result();
        return $result;
    }
    public function select_all_sub_menu_by_name($limit, $start, $sub_menu_name)
    {
        $this->db->limit($limit, $start);
        $this->db->select('master_sub_menu.*,master_menu.menu_name,master_module.module_name');
        $this->db->like('master_sub_menu.sub_menu_name', $sub_menu_name,'after');
        $this->db->join('master_menu', 'master_menu.id = master_sub_menu.menu_id', 'LEFT');
        $this->db->join('master_module', 'master_module.id = master_sub_menu.module_id', 'LEFT');
        $this->db->order_by('master_sub_menu.id', "DESC");
        $query_result = $this->db->get('master_sub_menu');
        $result = $query_result->result();
        return $result;
    }
    public function check_duplicate_data($sub_menu_name)
    {
        $this->db->select('sub_menu_name');
        $this->db->where('sub_menu_name',$sub_menu_name);
        $query_result = $this->db->get('master_sub_menu');
        $result = $query_result->result();
        return $result;
    }

}
