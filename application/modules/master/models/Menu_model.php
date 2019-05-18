<?php

class Menu_Model extends CI_Model
{

    public function select_all_menu($limit, $start)
    {
        $this->db->limit($limit, $start);
        $this->db->select('master_menu.*,master_module.module_name');
        $this->db->join('master_module', 'master_module.id = master_menu.module_id', 'LEFT');
        $this->db->order_by('id', "DESC");
        $query_result = $this->db->get('master_menu');
        $result = $query_result->result();
        return $result;
    }

    public function select_all_menu_by_name($limit, $start, $menu_name)
    {
        $this->db->limit($limit, $start);
        $this->db->select('master_menu.*,master_module.module_name');
        $this->db->like('master_menu.menu_name', $menu_name, 'after');
        $this->db->join('master_module', 'master_module.id = master_menu.module_id', 'LEFT');
        $this->db->order_by('id', "DESC");
        $query_result = $this->db->get('master_menu');
        $result = $query_result->result();
        return $result;
    }
    
    public function select_all_menu_by_module_id($limit, $start, $module_id)
    {
        $this->db->limit($limit, $start);
        $this->db->select('master_menu.*,master_module.module_name');
        $this->db->where('master_menu.module_id', $module_id);
        $this->db->join('master_module', 'master_module.id = master_menu.module_id', 'LEFT');
        $this->db->order_by('id', "DESC");
        $query_result = $this->db->get('master_menu');
        $result = $query_result->result();
        return $result;
    }
    public function check_duplicate_data($menu_name,$module_id)
    {
        $this->db->select('menu_name');
        $this->db->where('menu_name',$menu_name);
        $this->db->where('module_id',$module_id);
        $query_result = $this->db->get('master_menu');
        $result = $query_result->result();
        return $result;
    }

}
