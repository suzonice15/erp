<?php

class Welcome_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    public function check_user_login($user_name, $password)
    {
        $this->db->select('master_user.*,master_role.role_name');
        $this->db->where('master_user.user_name', $user_name);
        $this->db->where('master_user.password', $password);
        $this->db->where('master_user.role_id = master_role.id');
        $query_result = $this->db->get('master_user,master_role');
        $result = $query_result->row();
        return $result;
    }

    public function check_user_department($user_name)
    {
        $this->db->select('department_id');
        $this->db->where('user_id', $user_name);
        $query_result = $this->db->get('hr_assigning_dept_head');
        $result = $query_result->row();
        return $result;
    }
}
