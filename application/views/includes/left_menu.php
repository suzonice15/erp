<div class="navbar-default sidebar" role="navigation" style="background-color: #222D32;">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li class="sidebar-search">
                <div class="input-group custom-search-form">
                    <?php
                    $user_name = $this->session->userdata("user_name");
                    $role_name = $this->session->userdata("role_name");
                    $get_data = "";
                    if (($user_name == "admin") || ($user_name == "superadmin")) {
                    } else {
                        $CI = &get_instance();
                        $result = $CI->Main_model->select_user_profile_pic($user_name);
                        $get_data = $result->profile_picture;
                    }
                    ?>
                    <?php if ($get_data) { ?>
                        <div class="pull-left image">
                            <img style="height: 50px; width: 50px;"
                                 src="<?php echo base_url() ?>public/emp_profile/<?php echo $get_data; ?>"
                                 class="img-circle"
                                 alt="User Image">
                        </div>
                    <?php } else { ?>
                        <div class="pull-left image">
                            <img style="height: 50px; width: 50px;"
                                 src="<?php echo base_url() ?>admin_assets/dist/img/user2-160x160.jpg"
                                 class="img-circle"
                                 alt="User Image">
                        </div>
                    <?php } ?>
                    <div class="pull-left info">
                        <p style="padding: 5px 0px 0px 12px;"><?php echo $role_name; ?></p>
                        <i style="padding: 0px 0px 0px 10px;" class="fa fa-circle text-success"></i> Online
                    </div>
                </div>
            </li>
            <li>
                <a href="<?php echo base_url() ?>dashboard/main"><i class="fa fa-dashboard fa-fw"></i>Dashboard</a>
            </li>
            <?php
            $CI = &get_instance();
            $user_id = $this->session->userdata('role_id');
            $result = $CI->Main_model->select_all_module($user_id);
            foreach ($result as $v_module) {
                ?>
                <li>
                    <a href="<?php echo $v_module->module_url; ?>"><i
                            class="<?php echo $v_module->module_icon; ?>"></i><?php echo $v_module->module_name; ?><span
                            class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <?php
                        $CI = &get_instance();
                        $result = $CI->Main_model->select_menu_by_module_id($v_module->id, $user_id);
                        foreach ($result as $v_menu) {
                            ?>
                            <li>
                                <a href="#">
                                    <i class="<?php echo $v_menu->menu_icon; ?>"></i>
                                    <?php echo $v_menu->menu_name; ?>
                                    <span class="fa arrow"></span>
                                </a>
                                <ul class="nav nav-third-level">
                                    <?php
                                    $CI = &get_instance();
                                    $result = $CI->Main_model->select_sub_menu_by_menu_id($v_menu->id, $user_id);
                                    foreach ($result as $v_sub_menu) {
                                        ?>
                                        <li>
                                            <a href="<?php echo base_url() ?><?php echo $v_sub_menu->sub_menu_url; ?>">
                                                <i class="<?php echo $v_sub_menu->sub_menu_icon; ?>"></i>
                                                <?php echo $v_sub_menu->sub_menu_name; ?>
                                            </a>
                                        </li>
                                    <?php } ?>
                                </ul>
                            </li>
                        <?php } ?>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
            <?php } ?>
        </ul>
    </div>
</div>
</nav>