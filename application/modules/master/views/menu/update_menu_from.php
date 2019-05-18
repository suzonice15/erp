<?php foreach ($menu as $v_menu) { ?>
    <form action="" method="POST" id="update_menu_frm" enctype="multipart/form-data">
        <div class="form-group">
            <select class="form-control" name="module_id" id="module_id">
                <option value="">Select Module</option>
                <?php foreach ($module as $v_module) { ?>
                    <?php if ($v_module->id == $v_menu->module_id) { ?>
                        <option selected="selected" value="<?php echo $v_module->id; ?>"><?php echo $v_module->module_name; ?></option>
                    <?php } else { ?>
                        <option value="<?php echo $v_module->id; ?>"><?php echo $v_module->module_name; ?></option>
                    <?php } ?>
                <?php } ?>
            </select>
            <span id="m1"></span>
        </div>
        <input type="hidden" name="id" value="<?php echo $v_menu->id;?>">
        <input type="hidden" name="status" value="<?php echo $v_menu->status;?>">
        <div class="form-group">
            <input id="menu_name1" value="<?php echo $v_menu->menu_name;?>" name="menu_name" type="text" class="form-control" placeholder="Module Name....">
            <span id="m2"></span>
        </div>
        <div class="form-group">
            <input id="menu_url"  value="<?php echo $v_menu->menu_url;?>" name="menu_url" type="text" class="form-control" placeholder="Module URL....">
            <span id="m3"></span>
        </div>
        <div class="form-group">
            <input id="menu_icon" value="<?php echo $v_menu->menu_icon;?>" name="menu_icon" type="text" class="form-control" placeholder="Module Icon....">
            <span id="m4"></span>
        </div>
        <div class="form-group">
            <input id="menu_sort" value="<?php echo $v_menu->menu_sort;?>" name="menu_sort" type="text" class="form-control" placeholder="Sorting Order....">
            <span id="m5"></span>
        </div>
        <div class="form-group">
            <input type="submit" class="form-control btn btn-success" value="Update Menu">
        </div>
        <div id="add_msg" class="text-center"></div>
    </form>
<?php } ?>

<script>
    $(document).ready(function () {
        $('#update_menu_frm').submit(function () {
            if (validation() == true) {
                var dataString = $('#update_menu_frm').serialize();
                $.ajax({
                    type: "POST",
                    url: '<?php echo base_url() ?>master/menu/update_menu',
                    data: dataString,
                    success: function (result) {
                        if (result) {
                            $('#add_msg').html(result);
                            $('#add_msg .alert').delay(5000).fadeOut(1000);
                            $('#update_menu_frm').trigger("reset");
                            window.setTimeout(function () {
                                window.location.href = "<?php echo base_url()?>master/menu/all_menu";
                            }, 2000);
                            return false;
                        } else {
                            return false;
                        }
                    }
                });
                return false;
            } else {
                return false;
            }
        });

        function validation() {
            var module_id = $('#module_id').val();
            var menu_name = $('#menu_name1').val();
            var menu_url = $('#menu_url').val();
            var menu_icon = $('#menu_icon').val();
            var menu_sort = $('#menu_sort').val();

            if (module_id.length == "" || menu_name.length == "" || menu_url.length == "" || menu_icon.length == "" || menu_sort.length == ""
            ) {
                if (module_id.length == "") {
                    $('#m1').html("<code class='err_msg'>* This field is mandatory *</code>");
                    $("#m1 .err_msg").delay(3000).fadeOut(800);
                    $("#module_id").focus();
                }
                if (menu_name.length == "") {
                    $('#m2').html("<code class='err_msg'>* This field is mandatory *</code>");
                    $("#m2 .err_msg").delay(3000).fadeOut(800);
                    $("#menu_name1").focus();
                }
                if (menu_url.length == "") {
                    $('#m3').html("<code class='err_msg'>* This Message is mandatory *</code>");
                    $('#m3 .err_msg').delay(3000).fadeOut(800);
                    $('#menu_url').focus();
                }
                if (menu_icon.length == "") {
                    $('#m4').html("<code class='err_msg'>* This Message is mandatory *</code>");
                    $('#m4 .err_msg').delay(3000).fadeOut(800);
                    $('#menu_icon').focus();
                }
                if (menu_sort.length == "") {
                    $('#m5').html("<code class='err_msg'>* This Message is mandatory *</code>");
                    $('#m5 .err_msg').delay(3000).fadeOut(800);
                    $('#menu_sort').focus();
                }
                return false;
            }
            else {
                return true
            }
        }
    });
</script>

