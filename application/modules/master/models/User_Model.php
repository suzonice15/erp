<?php

class User_Model extends CI_Model
{

    public function select_all_user()
    {
        $this->db->select('master_user.*,master_role.role_name');
        $this->db->join('master_role', 'master_role.id = master_user.role_id', 'LEFT');
        $query_result = $this->db->get('master_user');
        $result = $query_result->result();
        return $result;
    }

    public function check_duplicate_data($user_name, $role_id)
    {
        $this->db->select('user_name');
        $this->db->where('user_name', $user_name);
        $this->db->where('role_id', $role_id);
        $query_result = $this->db->get('master_user');
        $result = $query_result->row();
        return $result;
    }

    public function select_all_menu($module_id)
    {
        $this->db->select('master_menu.*');
        $this->db->where('master_menu.module_id', $module_id);
        $this->db->order_by('master_menu.id', 'ASC');
        $query_result = $this->db->get('master_menu');
        $result = $query_result->result();
        return $result;
    }

    public function select_all_sub_menu($module_id,$menu_id)
    {
        $this->db->select('master_sub_menu.*');
        $this->db->where('master_sub_menu.module_id', $module_id);
        $this->db->where('master_sub_menu.menu_id', $menu_id);
        $this->db->order_by('master_sub_menu.id', 'ASC');
        $query_result = $this->db->get('master_sub_menu');
        $result = $query_result->result();
        return $result;
    }
    public function select_module_id_by_user($module_id, $user_id)
    {
        $this->db->select('module_id');
        $this->db->where('user_id', $user_id);
        $this->db->where('module_id', $module_id);
        $this->db->group_by('module_id');
        $query_result = $this->db->get('user_role_permission');
        $result = $query_result->row();
        return $result;
    }
    public function select_menu_id_by_user($module_id, $menu_id, $user_id)
    {
        $this->db->select('menu_id');
        $this->db->where('user_id', $user_id);
        $this->db->where('module_id', $module_id);
        $this->db->where('menu_id', $menu_id);
        $this->db->group_by('menu_id');
        $query_result = $this->db->get('user_role_permission');
        $result = $query_result->row();
        return $result;
    }

    public function select_sub_menu_id_by_user($module_id, $menu_id, $sub_menu_id, $user_id)
    {
        $this->db->select('sub_menu_id');
        $this->db->where('user_id', $user_id);
        $this->db->where('module_id', $module_id);
        $this->db->where('menu_id', $menu_id);
        $this->db->where('sub_menu_id', $sub_menu_id);
        $this->db->group_by('sub_menu_id');
        $query_result = $this->db->get('user_role_permission');
        $result = $query_result->row();
        return $result;
    }
    public function delete_user_data($user_id)
    {
        $this->db->where('user_id', $user_id);
        return $this->db->delete('user_role_permission');
    }

}
