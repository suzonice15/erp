<?php

class Menu extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('master/Menu_model');

    }

    public function index()
    {

    }

    public function all_menu()
    {
        $this->config->load('pagination');
        $this->load->library("pagination");
        $config = array();

        $menu_name = $this->input->post('menu_name');
        $module_id = $this->input->post('module_id');

        $config["base_url"] = base_url() . "master/menu/all_menu";

        if ($menu_name) {
            $config["total_rows"] = $this->Main_model->countByLikeCondition("menu_name", $menu_name, "master_menu");
        } else if ($module_id) {
            $config["total_rows"] = $this->Main_model->countByWhereCondition("module_id = '$module_id'", "master_menu");;
        } else {
            $config["total_rows"] = $this->Main_model->countAll('master_menu');
        }

        $config['per_page'] = 20;
        $config['uri_segment'] = 4;
        $config['num_links'] = 9;
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;

        if ($menu_name) {
            $data["menu"] = $this->Menu_model->select_all_menu_by_name($config["per_page"], $page, $menu_name);
        } else if ($module_id) {
            $data["menu"] = $this->Menu_model->select_all_menu_by_module_id($config["per_page"], $page, $module_id);
        } else {
            $data["menu"] = $this->Menu_model->select_all_menu($config["per_page"], $page);
        }


        $data["links"] = $this->pagination->create_links();
        if ($this->input->is_ajax_request()) {
            $this->load->view('menu/per_page_menu', $data);
        } else {
            $data['module'] = $this->Main_model->getValue("", 'master_module', '*', "ID DESC");
            $this->load->view('menu/menu_tpl', $data);
        }
    }

    public function load_add_menu_from()
    {
        $data['module'] = $this->Main_model->getValue("", 'master_module', '*', "ID DESC");
        $this->load->view('master/menu/menu_from', $data);
    }

    public function create_menu()
    {
        $data = array(
            'module_id' => $this->input->post('module_id'),
            'menu_name' => $this->input->post('menu_name'),
            'menu_url' => $this->input->post('menu_url'),
            'menu_icon' => $this->input->post('menu_icon'),
            'menu_sort' => $this->input->post('menu_sort'),
            'status' => 1
        );
        $result = $this->Main_model->insertData($data, 'master_menu');
        if ($result) {
            $msg['load_success_message'] = "Menu successfully added.";
            $this->load->view('messages/success_message', $msg);
        }
    }

    public function delete_menu($id)
    {
        $this->Main_model->deleteData("id = '$id'", "master_menu");
    }

    public function menu_active($id)
    {
        $data = array(
            'status' => 1
        );
        $result = $this->Main_model->updateData($data, "master_menu", "id='$id'");
        if ($result) {
            echo "1";
        }
    }

    public function menu_inactive($id)
    {
        $data = array(
            'status' => 0
        );
        $result = $this->Main_model->updateData($data, "master_menu", "id='$id'");
        if ($result) {
            echo "1";
        }
    }

    public function load_update_menu_from($id)
    {
        $data['module'] = $this->Main_model->getValue("", 'master_module', '*', "ID DESC");
        $data['menu'] = $this->Main_model->getValue("id = '$id'", 'master_menu', '*', "ID DESC");
        $this->load->view('master/menu/update_menu_from', $data);
    }

    public function update_menu()
    {
        $id = $this->input->post('id');
        $data = array(
            'module_id' => $this->input->post('module_id'),
            'menu_name' => $this->input->post('menu_name'),
            'menu_url' => $this->input->post('menu_url'),
            'menu_icon' => $this->input->post('menu_icon'),
            'menu_sort' => $this->input->post('menu_sort'),
            'status' => $this->input->post('status')
        );
        $result = $this->Main_model->updateData($data, "master_menu", "id='$id'");
        if ($result) {
            $msg['load_success_message'] = "Menu update successfully.";
            $this->load->view('messages/success_message', $msg);
        }
    }

    public function check_duplicate_data()
    {
        $menu_name = $this->input->post('menu_name');
        $module_id = $this->input->post('module_id');
        $set_data = urldecode($menu_name);
        $result = $this->Menu_model->check_duplicate_data($set_data, $module_id);
        if ($result) {
            echo "<p style='color: red; font-size: 16px;'>This menu name already exit !!!</p>";
        } else {
            echo "";
        }
    }

}

?>