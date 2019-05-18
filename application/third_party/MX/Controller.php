<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

/** load the CI class for Modular Extensions **/
require dirname(__FILE__) . '/Base.php';

/**
 * Modular Extensions - HMVC
 *
 * Adapted from the CodeIgniter Core Classes
 * @link    http://codeigniter.com
 *
 * Description:
 * This library replaces the CodeIgniter Controller class
 * and adds features allowing use of modules and the HMVC design pattern.
 *
 * Install this file as application/third_party/MX/Controller.php
 *
 * @copyright    Copyright (c) 2015 Wiredesignz
 * @version    5.5
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 **/
class MX_Controller
{
    public $autoload = array();

    public function __construct()
    {

        $class = str_replace(CI::$APP->config->item('controller_suffix'), '', get_class($this));
        log_message('debug', $class . " MX_Controller Initialized");
        Modules::$registry[strtolower($class)] = $this;

        /* copy a loader instance and initialize */
        $this->load = clone load_class('Loader');
        $this->load->initialize($this);

        /* autoload module items */
        $this->load->_autoloader($this->autoload);


        $role_id = $this->session->userdata('role_id');
        if ($role_id == "") {
            redirect('Welcome');
        }

        $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $new_url = substr($actual_link, strpos($actual_link, "erp/") + 4);
        $folder = explode("/", $new_url);
        $folder_name = $folder[0];
        $controller = explode("/", $new_url);
        $controller_name = $controller[1];
        $join_string = $folder_name . "/" . $controller_name;
        $result = $this->Main_model->select_url($join_string);
        if ($join_string != 'dashboard/main') {
            if ($result) {
                $permission = $this->Main_model->chech_permission($result->id, $result->module_id, $result->menu_id, $role_id);
			//var_dump(($permission) );
				$conter=$permission->module_id;
				//var_dump(strlen($conter) );exit();
                if (strlen($conter) == "") {
                    $this->session->unset_userdata('user_name');
                    $this->session->unset_userdata('role_id');
                    $this->session->unset_userdata('powered_by');
                    $this->session->unset_userdata('copy_write');
                    redirect('Welcome');
                }
            }
        }
    }

    public function __get($class)
    {
        return CI::$APP->$class;
    }
}