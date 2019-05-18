<form action="" method="POST" id="add_user_frm" enctype="multipart/form-data">

    <div class="form-group">
        <select class="form-control" name="role_id" id="role_id">
            <option value="">Select Role</option>
            <?php foreach ($user_role as $v_role) { ?>
                <option value="<?php echo $v_role->id; ?>"><?php echo $v_role->role_name; ?></option>
            <?php } ?>
        </select>
        <span id="u1"></span>
    </div>
    <div class="form-group">
        <input id="user_name" onblur="return check_duplicate()" name="user_name" type="text" class="form-control"
               placeholder="User Name....">
        <span id="u2"></span>
    </div>
    <div class="form-group">
        <input id="password" name="password" type="text" class="form-control" placeholder="Password....">
        <span id="u3"></span>
    </div>
    <div class="form-group">
        <input type="submit" class="form-control btn btn-success" value="Add User">
    </div>
    <div id="add_msg" class="text-center"></div>
</form>


<script>
    $(document).ready(function () {
        $('#add_user_frm').submit(function () {
            if (validation() == true) {
                var dataString = $('#add_user_frm').serialize();
                $.ajax({
                    type: "POST",
                    url: '<?php echo base_url() ?>master/user/create_user',
                    data: dataString,
                    success: function (result) {
                        if (result) {
                            $('#add_msg').html(result);
                            $('#add_msg .alert').delay(5000).fadeOut(1000);
                            $('#add_user_frm').trigger("reset");
                            window.setTimeout(function () {
                                window.location.href = "<?php echo base_url()?>master/user/all_user";
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
            var role_id = $('#role_id').val();
            var user_name = $('#user_name').val();
            var password = $('#password').val();

            if (role_id.length == "" || user_name.length == "" || password.length == "") {
                if (role_id.length == "") {
                    $('#u1').html("<code class='err_msg'>* This field is mandatory *</code>");
                    $("#u1 .err_msg").delay(3000).fadeOut(800);
                    $("#role_id").focus();
                }
                if (user_name.length == "") {
                    $('#u2').html("<code class='err_msg'>* This field is mandatory *</code>");
                    $("#u2 .err_msg").delay(3000).fadeOut(800);
                    $("#user_name").focus();
                }
                if (password.length == "") {
                    $('#u3').html("<code class='err_msg'>* This Message is mandatory *</code>");
                    $('#u3 .err_msg').delay(3000).fadeOut(800);
                    $('#password').focus();
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
        var user_name = $('#user_name').val();
        var role_id = $('#role_id').val();
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url()?>master/user/check_duplicate_data',
            data: {user_name: user_name, role_id: role_id},
            success: function (result) {
                if (result) {
                    $('#user_name').val('');
                    $('#u2').html(result);
                    return false;
                } else {
                    $('#u2').html('');
                    return false;
                }
            }
        });

    }
</script>

