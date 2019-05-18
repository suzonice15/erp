<?php

class Sub_Menu extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('master/Sub_Menu_model');
    }

    public function index()
    {

    }

    public function all_sub_menu()
    {
        $this->config->load('pagination');
        $this->load->library("pagination");
        $config = array();
        $config["base_url"] = base_url() . "master/sub_menu/all_sub_menu";
        $module_id = $this->input->post('module_id');
        $menu_id = $this->input->post('menu_id');
        $sub_menu_name = $this->input->post('sub_menu_name');


        if ($module_id) {
            $config["total_rows"] = $this->Main_model->countByWhereCondition("module_id = '$module_id'", "master_sub_menu");
        } else if ($menu_id) {
            $config["total_rows"] = $this->Main_model->countByWhereCondition("menu_id = '$menu_id'", "master_sub_menu");
        } else if ($sub_menu_name) {
            $config["total_rows"] = $this->Main_model->countByLikeCondition("sub_menu_name", $sub_menu_name, "master_sub_menu");
        } else {
            $config["total_rows"] = $this->Main_model->countAll('master_sub_menu');
        }

        $config['per_page'] = 40;
        $config['uri_segment'] = 4;
        $config['num_links'] = 2;
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;

        if ($module_id) {
            $data["sub_menu"] = $this->Sub_Menu_model->select_all_sub_menu_by_module_id($config["per_page"], $page, $module_id);
        } else if ($menu_id) {
            $data["sub_menu"] = $this->Sub_Menu_model->select_all_sub_menu_by_menu_id($config["per_page"], $page, $menu_id);
        } else if ($sub_menu_name) {
            $data["sub_menu"] = $this->Sub_Menu_model->select_all_sub_menu_by_name($config["per_page"], $page, $sub_menu_name);
        } else {
            $data["sub_menu"] = $this->Sub_Menu_model->select_all_sub_menu($config["per_page"], $page);
        }

        $data["links"] = $this->pagination->create_links();
        if ($this->input->is_ajax_request()) {
            $this->load->view('sub_menu/per_page_sub_menu', $data);
        } else {
            $data['module'] = $this->Main_model->getValue("", 'master_module', '*', "ID DESC");
            $data['menu'] = $this->Main_model->getValue("", 'master_menu', '*', "ID DESC");
            $this->load->view('sub_menu/sub_menu_tpl', $data);
        }
    }

    public function load_add_sub_menu_from()
    {
        $data['module'] = $this->Main_model->getValue("", 'master_module', '*', "ID DESC");
        $this->load->view('master/sub_menu/sub_menu_from', $data);
    }

    public function select_menu($module_id)
    {
        $array = $this->Main_model->getValue("module_id = '$module_id'", 'master_menu', '*', "ID DESC");
        $str = "";
        $str .= '<select name="menu_id" id="menu_id" class="form-control">
				<option value="">--- Select Menu ---</option>';
        if (!empty($array)) {
            foreach ($array as $row) {
                $str .= '<option value="' . $row->id . '">' . $row->menu_name . '</option>';
            }
        }
        $str .= '</select>';
        echo $str;
    }

    public function create_sub_menu()
    {
        $data = array(
            'module_id' => $this->input->post('module_id'),
            'menu_id' => $this->input->post('menu_id'),
            'sub_menu_name' => $this->input->post('sub_menu_name'),
            'sub_menu_url' => $this->input->post('sub_menu_url'),
            'sub_menu_icon' => $this->input->post('sub_menu_icon'),
            'sub_menu_sort' => $this->input->post('sub_menu_sort'),
            'status' => 1
        );
        $result = $this->Main_model->insertData($data, 'master_sub_menu');
        if ($result) {
            $msg['load_success_message'] = "Sub-menu successfully added.";
            $this->load->view('messages/success_message', $msg);
        }
    }

    public function delete_sub_menu($id)
    {
        $this->Main_model->deleteData("id = '$id'", "master_sub_menu");
    }

    public function sub_menu_active($id)
    {
        $data = array(
            'status' => 1
        );
        $result = $this->Main_model->updateData($data, "master_sub_menu", "id='$id'");
        if ($result) {
            echo "1";
        }
    }

    public function sub_menu_inactive($id)
    {
        $data = array(
            'status' => 0
        );
        $result = $this->Main_model->updateData($data, "master_sub_menu", "id='$id'");
        if ($result) {
            echo "1";
        }
    }

    public function load_update_sub_menu_from($id)
    {
        $data['module'] = $this->Main_model->getValue("", 'master_module', '*', "ID DESC");
        $data['menu'] = $this->Main_model->getValue("", 'master_menu', '*', "ID DESC");
        $data['sub_menu'] = $this->Main_model->getValue("id='$id'", 'master_sub_menu', '*', "ID DESC");
        $this->load->view('master/sub_menu/update_sub_menu_from', $data);
    }

    public function update_sub_menu()
    {
        $id = $this->input->post('id');
        $data = array(
            'module_id' => $this->input->post('module_id'),
            'menu_id' => $this->input->post('menu_id'),
            'sub_menu_name' => $this->input->post('sub_menu_name'),
            'sub_menu_url' => $this->input->post('sub_menu_url'),
            'sub_menu_icon' => $this->input->post('sub_menu_icon'),
            'sub_menu_sort' => $this->input->post('sub_menu_sort'),
            'status' => $this->input->post('status')
        );
        $result = $this->Main_model->updateData($data, "master_sub_menu", "id='$id'");
        if ($result) {
            $msg['load_success_message'] = "Sub-Menu update successfully.";
            $this->load->view('messages/success_message', $msg);
        }
    }

    public function check_duplicate_data($sub_menu_name = null)
    {
        $result = $this->Sub_Menu_model->check_duplicate_data($sub_menu_name);
        if ($result) {
            echo "<p style='color: red; font-size: 16px;'>This sub-menu name already exit !!!</p>";
        } else {
            echo "";
        }
    }
}

?>