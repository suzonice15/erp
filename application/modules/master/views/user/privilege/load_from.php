<div>
    <?php
    foreach ($module as $v_module) { ?>
        <?php
        $CI = get_instance();
        $set_module_id = '';
        $module = $CI->User_Model->select_module_id_by_user($v_module->id, $user_id);
        if ($module) {
            $set_module_id = $module->module_id;
        }
        ?>
        <ul id="ul_id">
            <li style="font-size: 19px;">
                <?php if ($v_module->id == $set_module_id) { ?>
                    <input type="checkbox"
                           id="module_id_<?php echo $v_module->id; ?>"
                           name="module_id[]"
                           value="<?php echo $v_module->id; ?>" checked>
                    <?php echo $v_module->module_name; ?>
                <?php } else { ?>
                    <input type="checkbox"
                           id="module_id_<?php echo $v_module->id; ?>"
                           name="module_id[]"
                           value="<?php echo $v_module->id; ?>">
                    <?php echo $v_module->module_name; ?>
                <?php } ?>




                <?php
                $CI = get_instance();
                $menu = $CI->User_Model->select_all_menu($v_module->id);
                foreach ($menu as $v_menu) { ?>
                    <?php
                    $set_menu = '';
                    $CI = get_instance();
                    $menu = $CI->User_Model->select_menu_id_by_user($v_module->id, $v_menu->id, $user_id);
                    if ($menu) {
                        $set_menu = $menu->menu_id;
                    }
                    ?>
                    <ul id="ul_id">
                        <li style="font-size: 17px;">
                            <?php if ($v_menu->id == $set_menu) { ?>
                                <input type="checkbox" checked
                                       id="menu_id_<?php echo $v_menu->id; ?>"
                                       name="menu_id[<?php echo $v_module->id; ?>][]"
                                       value="<?php echo $v_menu->id; ?>">
                                <?php echo $v_menu->menu_name; ?>
                            <?php } else { ?>
                                <input type="checkbox"
                                       id="menu_id_<?php echo $v_menu->id; ?>"
                                       name="menu_id[<?php echo $v_module->id; ?>][]"
                                       value="<?php echo $v_menu->id; ?>">
                                <?php echo $v_menu->menu_name; ?>
                            <?php } ?>



                            <?php
                            $CI = get_instance();
                            $sub_menu = $CI->User_Model->select_all_sub_menu($v_module->id, $v_menu->id);
                            foreach ($sub_menu as $v_sub_menu) { ?>
                                <?php
                                $set_sub_menu = '';
                                $CI = get_instance();
                                $sub_menu = $CI->User_Model->select_sub_menu_id_by_user($v_module->id, $v_menu->id, $v_sub_menu->id, $user_id);
                                if ($sub_menu) {
                                    $set_sub_menu = $sub_menu->sub_menu_id;
                                }
                                ?>
                                <ul id="ul_id">
                                    <li style="font-size: 15px;">
                                        <?php if ($v_sub_menu->id == $set_sub_menu) { ?>
                                            <input type="checkbox" checked
                                                   data-id_module="<?php echo $v_module->id; ?>"
                                                   data-id_menu="<?php echo $v_menu->id; ?>"
                                                   data-module_id="module_id_<?php echo $v_module->id; ?>"
                                                   data-menu_id="menu_id_<?php echo $v_menu->id; ?>"
                                                   class="menu_id_<?php echo $v_module->id; ?> sub_menu_id_<?php echo $v_menu->id; ?> CheckedMenu"
                                                   name="sub_menu_id[<?php echo $v_module->id; ?>][<?php echo $v_menu->id; ?>][]"
                                                   value="<?php echo $v_sub_menu->id; ?>">
                                            <?php echo $v_sub_menu->sub_menu_name; ?>
                                        <?php } else { ?>
                                            <input type="checkbox"
                                                   data-id_module="<?php echo $v_module->id; ?>"
                                                   data-id_menu="<?php echo $v_menu->id; ?>"
                                                   data-module_id="module_id_<?php echo $v_module->id; ?>"
                                                   data-menu_id="menu_id_<?php echo $v_menu->id; ?>"
                                                   class="menu_id_<?php echo $v_module->id; ?> sub_menu_id_<?php echo $v_menu->id; ?> CheckedMenu"
                                                   name="sub_menu_id[<?php echo $v_module->id; ?>][<?php echo $v_menu->id; ?>][]"
                                                   value="<?php echo $v_sub_menu->id;?>">
                                            <?php echo $v_sub_menu->sub_menu_name; ?>
                                        <?php } ?>
                                    </li>
                                </ul>
                            <?php } ?>
                        </li>
                    </ul>
                <?php } ?>
            </li>
        </ul>
    <?php } ?>
</div>
<input type="submit" value="Set Privilege" class="btn btn-success">
<script>
    $('document').ready(function () {
        $(".CheckedMenu").click(function () {
            var module_id = $(this).data("module_id");
            var menu_id = $(this).data("menu_id");

            var set_module_id = $(this).data("id_module");
            var set_menu_id = $(this).data("id_menu");
            var get_sub_menu_id = $('.sub_menu_id_' + (set_menu_id)).is(':checked');
            var get_menu_id = $('.menu_id_' + (set_module_id)).is(':checked');

            if (get_sub_menu_id) {
                $("#" + menu_id).prop("checked", true);
                $("#" + module_id).prop("checked", true);
            } else {
                $("#" + menu_id).prop("checked", false);
            }
            if (get_menu_id) {
                $("#" + module_id).prop("checked", true);
            } else {
                $("#" + module_id).prop("checked", false);
            }
        });
    });
</script>

<script language="javascript">
    function checkAll(master) {
        var checked = master.checked;
        var col = document.getElementsByTagName("INPUT");
        for (var i = 0; i < col.length; i++) {
            col[i].checked = checked;
        }
    }
</script>

<script>
    $('document').ready(function () {
        $('#user_privilege').submit(function () {
            var dataString = $('#user_privilege').serialize();
            $.ajax({
                type: 'POST',
                url: '<?php echo base_url()?>master/user/user_privilege',
                data: dataString,
                success: function (result) {
                    if (result) {
                        $('#add_result').show();
                        $('#add_result').html(result);
                        $('#add_result .alert').delay(3000).fadeOut(100);
                        return false;
                    } else {
                        return false;
                    }
                }
            });
            return false;
        });
    });
</script>
