<form action="" method="POST" id="add_sub_menu_frm" enctype="multipart/form-data">
    <div class="form-group">
        <input id="role_name" name="role_name" type="text" class="form-control" placeholder="User Role Name....">
        <span id="ur1"></span>
    </div>
    <div class="form-group">
        <input type="submit" class="form-control btn btn-success" value="Add User Role">
    </div>
    <div id="add_msg" class="text-center"></div>
</form>


<script>
    $(document).ready(function () {
        $('#add_sub_menu_frm').submit(function () {
            if (validation() == true) {
                var dataString = $('#add_sub_menu_frm').serialize();
                $.ajax({
                    type: "POST",
                    url: '<?php echo base_url() ?>master/user/create_user_role',
                    data: dataString,
                    success: function (result) {
                        if (result) {
                            $('#add_msg').html(result);
                            $('#add_msg .alert').delay(5000).fadeOut(1000);
                            $('#add_sub_menu_frm').trigger("reset");
                            window.setTimeout(function () {
                                window.location.href = "<?php echo base_url()?>master/user/all_role";
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
            var role_name = $('#role_name').val();

            if (role_name.length == "") {
                $('#ur1').html("<code class='err_msg'>* This field is mandatory *</code>");
                $("#ur1 .err_msg").delay(3000).fadeOut(800);
                $("#role_name").focus();
                return false;
            } else {
                return true;
            }
        }

    });
</script>


