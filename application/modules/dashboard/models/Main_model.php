<?php

class Main_model extends CI_Model
{

  public  function __construct()
    {
        parent::__construct();
        $this->_prefix = $this->config->item('DX_table_prefix');
    }

    public function select_all_module($user_id)
    {
        $this->db->select('master_module.*');
        $this->db->where('master_module.status', 1);
        $this->db->where('user_role_permission.user_id', $user_id);
        $this->db->where('user_role_permission.module_id = master_module.id');
        $this->db->order_by('master_module.sort', "ASC");
        $this->db->group_by('user_role_permission.module_id');
        $query_result = $this->db->get('master_module,user_role_permission');
        $result = $query_result->result();
        return $result;
    }

    public function select_menu_by_module_id($id, $user_id)
    {
        $this->db->select('master_menu.*');
        $this->db->where('user_role_permission.user_id', $user_id);
        $this->db->where('user_role_permission.menu_id = master_menu.id');
        $this->db->where('master_menu.module_id', $id);
        $this->db->where('master_menu.status', 1);
        $this->db->order_by('master_menu.menu_sort', "ASC");
        $this->db->group_by('user_role_permission.menu_id');
        $query_result = $this->db->get('master_menu,user_role_permission');
        $result = $query_result->result();
        return $result;
    }

    public function select_sub_menu_by_menu_id($id, $user_id)
    {
        $this->db->select('master_sub_menu.*');
        $this->db->where('user_role_permission.user_id', $user_id);
        $this->db->where('user_role_permission.sub_menu_id = master_sub_menu.id');
        $this->db->where('master_sub_menu.menu_id', $id);
        $this->db->where('master_sub_menu.status', 1);
        $this->db->order_by('master_sub_menu.sub_menu_sort', "ASC");
        $query_result = $this->db->get('master_sub_menu,user_role_permission');
        $result = $query_result->result();
        return $result;
    }

    public function select_user_profile_pic($emp_id)
    {
        $this->db->select('profile_picture');
        $this->db->where('emp_id', $emp_id);
        $query_result = $this->db->get('hr_basic');
        $result = $query_result->row();
        return $result;
    }



//    ===========================
//    dynamic function start here
//    =========================

    public function getValue($cond = FALSE, $tableName = '', $select_qry = '*', $order = 'ID DESC')
    {
        $tableName = $this->_prefix . $tableName;
        $this->db->select($select_qry, FALSE);
        if ($cond): $this->db->where($cond);
        endif;
        $this->db->order_by($order);
        return $this->db->get($tableName)->result();

    }

    public function getValueRow($cond = FALSE, $tableName = '', $select_qry = '*', $order = 'ID DESC')
    {
        $tableName = $this->_prefix . $tableName;
        $this->db->select($select_qry, FALSE);
        if ($cond): $this->db->where($cond);
        endif;
        $this->db->order_by($order);
        return $this->db->get($tableName)->row();

    }

    function insertData($data = '', $tableName = '')
    {
        $tableName = $this->_prefix . $tableName;
        return $this->db->insert($tableName, $data);
    }

    function deleteData($cond = FALSE, $tableName = '')
    {
        if (!empty($cond)): $this->db->where($cond);
        endif;
        return $this->db->delete($tableName);
    }

    function updateData($data = '', $tableName = '', $cond = '')
    {
        $tableName = strtoupper($tableName);
        $tableName = $this->_prefix . $tableName;
        $this->db->where($cond);
        return $this->db->update($tableName, $data);
    }

    function countAll($tableName)
    {
        return $this->db->count_all($tableName);
    }

    function countByLikeCondition($field_name, $cond, $tableName)
    {
        $this->db->like($field_name, $cond, 'after');
        return $this->db->count_all_results($tableName);
    }

    function countByWhereCondition($cond, $tableName)
    {
        $this->db->where($cond);
        return $this->db->count_all_results($tableName);
    }

    public function select_url($new_url)
    {
        $this->db->select('id,module_id,menu_id,sub_menu_url');
        $this->db->like('sub_menu_url', $new_url);
        $this->db->where('status', 1);
        $query_result = $this->db->get('master_sub_menu');
        $result = $query_result->row();
        return $result;
    }

    public function chech_permission($id, $module_id, $menu_id, $role_id)
    {
        $this->db->select('*');
        $this->db->where('module_id', $module_id);
        $this->db->where('menu_id', $menu_id);
        $this->db->where('sub_menu_id', $id);
        $this->db->where('user_id', $role_id);
        $query_result = $this->db->get('user_role_permission');
        $result = $query_result->row();
        return $result;
    }

    public function select_by_likeCondition($limit, $start, $search_data, $table_name, $field_name)
    {
        $this->db->limit($limit, $start);
        $this->db->select('*');
        $this->db->like($field_name, $search_data, 'after');
        $query_result = $this->db->get($table_name);
        $result = $query_result->result();
        return $result;
    }

    public function select_all_info($limit, $start, $table_name)
    {
        $this->db->limit($limit, $start);
        $this->db->order_by('id', "DESC");
        $query_result = $this->db->get($table_name);
        $result = $query_result->result();
        return $result;
    }

    public function check_duplicate_data($select_field, $cond, $table_name)
    {
        $this->db->select($select_field);
        $this->db->where($select_field, $cond);
        $query_result = $this->db->get($table_name);
        $result = $query_result->row();
        return $result;
    }

    function countAllByCondition($query_cond, $tableName)
    {
        $query = $this->db->where($query_cond)->get($tableName);
        return $query->num_rows();
    }

    function countByWhereConditionStatus($select_cond, $query_cond, $tableName)
    {
        $this->db->where($query_cond);
        $this->db->where($select_cond);
        return $this->db->count_all_results($tableName);
    }


}
