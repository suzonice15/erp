<form action="" method="POST" id="add_sub_menu_frm" enctype="multipart/form-data">
    <div class="form-group">
        <select onchange="select_menu()" class="form-control" name="module_id" id="module_id">
            <option value="">Select Module</option>
            <?php foreach ($module as $v_module) { ?>
                <option value="<?php echo $v_module->id; ?>"><?php echo $v_module->module_name; ?></option>
            <?php } ?>
        </select>
        <span id="sm1"></span>
    </div>
    <div class="form-group">
        <select class="form-control" name="menu_id" id="menu_id">
            <option value="">Select Module First</option>
        </select>
        <span id="sm2"></span>
    </div>

    <div class="form-group">
        <input id="sub_menu_name" onblur="check_duplicate()" name="sub_menu_name" type="text" class="form-control" placeholder="Sub Menu Name....">
        <span id="sm3"></span>
    </div>
    <div class="form-group">
        <input id="sub_menu_url" name="sub_menu_url" type="text" class="form-control" placeholder="Sub Menu URL....">
        <span id="sm4"></span>
    </div>
    <div class="form-group">
        <input id="sub_menu_icon" name="sub_menu_icon" type="text" class="form-control" placeholder="Sub Menu Icon....">
        <span id="sm5"></span>
    </div>
    <div class="form-group">
        <input id="sub_menu_sort" name="sub_menu_sort" type="text" class="form-control" placeholder="Sorting Order....">
        <span id="sm6"></span>
    </div>
    <div class="form-group">
        <input type="submit" class="form-control btn btn-success" value="Add Sub-Menu">
    </div>
    <div id="add_msg" class="text-center"></div>
</form>

<script>
    function select_menu() {
        var module_id = $('#module_id').val();
        $.ajax({
            type: "POST",
            url: '<?php echo base_url() ?>master/sub_menu/select_menu/' + module_id,
            success: function (result) {
                if (result) {
                    $('#menu_id').html(result);
                    return false;
                } else {
                    return false;
                }
            }
        });
        return false;
    }
</script>

<script>
    $(document).ready(function () {
        $('#add_sub_menu_frm').submit(function () {
            if (validation() == true) {
                var dataString = $('#add_sub_menu_frm').serialize();
                $.ajax({
                    type: "POST",
                    url: '<?php echo base_url() ?>master/sub_menu/create_sub_menu',
                    data: dataString,
                    success: function (result) {
                        if (result) {
                            $('#add_msg').html(result);
                            $('#add_msg .alert').delay(5000).fadeOut(1000);
                            $('#add_sub_menu_frm').trigger("reset");
                            window.setTimeout(function () {
                                window.location.href = "<?php echo base_url()?>master/sub_menu/all_sub_menu";
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
            var menu_id = $('#menu_id').val();
            var sub_menu_name = $('#sub_menu_name').val();
            var sub_menu_url = $('#sub_menu_url').val();
            var sub_menu_icon = $('#sub_menu_icon').val();
            var sub_menu_sort = $('#sub_menu_sort').val();

            if (module_id.length == "" || menu_id.length == "" || sub_menu_name.length == "" || sub_menu_url.length == "" || sub_menu_icon.length == "" || sub_menu_sort.length == ""
            ) {
                if (module_id.length == "") {
                    $('#sm1').html("<code class='err_msg'>* This field is mandatory *</code>");
                    $("#sm1 .err_msg").delay(3000).fadeOut(800);
                    $("#module_id").focus();
                }
                if (menu_id.length == "") {
                    $('#sm2').html("<code class='err_msg'>* This field is mandatory *</code>");
                    $("#sm2 .err_msg").delay(3000).fadeOut(800);
                    $("#menu_id").focus();
                }
                if (sub_menu_name.length == "") {
                    $('#sm3').html("<code class='err_msg'>* This field is mandatory *</code>");
                    $("#sm3 .err_msg").delay(3000).fadeOut(800);
                    $("#sub_menu_name").focus();
                }
                if (sub_menu_url.length == "") {
                    $('#sm4').html("<code class='err_msg'>* This Message is mandatory *</code>");
                    $('#sm4 .err_msg').delay(3000).fadeOut(800);
                    $('#sub_menu_url').focus();
                }
                if (sub_menu_icon.length == "") {
                    $('#sm5').html("<code class='err_msg'>* This Message is mandatory *</code>");
                    $('#sm5 .err_msg').delay(3000).fadeOut(800);
                    $('#sub_menu_icon').focus();
                }
                if (sub_menu_sort.length == "") {
                    $('#sm6').html("<code class='err_msg'>* This Message is mandatory *</code>");
                    $('#sm6 .err_msg').delay(3000).fadeOut(800);
                    $('#sub_menu_sort').focus();
                }
                return false;
            }
            else {
                return true
            }
        }
    });
</script>
<script>
    function check_duplicate() {
        var sub_menu_name = $('#sub_menu_name').val();
        $.ajax({
            type:'POST',
            url:'<?php echo base_url()?>master/sub_menu/check_duplicate_data/'+sub_menu_name,
            success:function (result) {
                if(result){
                    $('#sub_menu_name').val('');
                    $('#sm3').html(result);
                    return false;
                }else{
                    $('#sm3').html('');
                    return false;
                }
            }
        });
        return false;
    }
</script>

