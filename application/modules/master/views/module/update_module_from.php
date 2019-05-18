<?php foreach ($module as $v_data) { ?>
    <form action="" method="POST" id="aupdate_module_frm" enctype="multipart/form-data">
        <div class="form-group">
            <input type="hidden" name="id" value="<?php echo $v_data->id?>">
            <input type="hidden" name="status" value="<?php echo $v_data->status?>">
            <input id="module_name" value="<?php echo $v_data->module_name;?>" name="module_name" type="text" class="form-control" placeholder="Module Name....">
            <span id="m1"></span>
        </div>
        <div class="form-group">
            <input id="module_url" value="<?php echo $v_data->module_url;?>" name="module_url" type="text" class="form-control" placeholder="Module URL....">
            <span id="m2"></span>
        </div>
        <div class="form-group">
            <input id="module_icon" value="<?php echo $v_data->module_icon;?>" name="module_icon" type="text" class="form-control" placeholder="Module Icon....">
            <span id="m3"></span>
        </div>
        <div class="form-group">
            <input id="sort" value="<?php echo $v_data->sort;?>" name="sort" type="text" class="form-control" placeholder="Sorting Order....">
            <span id="m4"></span>
        </div>
        <div class="form-group">
            <input type="submit" class="form-control btn btn-success" value="Update Module">
        </div>
        <div id="add_msg" class="text-center"></div>
    </form>
<?php } ?>


<script>
    $(document).ready(function () {
        $('#aupdate_module_frm').submit(function () {
            if (validation() == true) {
                var dataString = $('#aupdate_module_frm').serialize();
                $.ajax({
                    type: "POST",
                    url: '<?php echo base_url() ?>master/Module/update_module',
                    data: dataString,
                    success: function (result) {
                        if (result) {
                            $('#add_msg').html(result);
                            $('#add_msg .alert').delay(5000).fadeOut(1000);
                            $('#aupdate_module_frm').trigger("reset");
                            window.setTimeout(function () {
                                window.location.href = "<?php echo base_url()?>master/Module/all_module";
                            }, 2000);
                            return false;
                        } else {
                            return false;
                        }
                    }
                });
                return false;
            }else{
                return false;
            }
        });


        function validation() {
            var module_name = $('#module_name').val();
            var module_url = $('#module_url').val();
            var module_icon = $('#module_icon').val();
            var sort = $('#sort').val();

            if (module_name.length == "" || module_url.length == "" || module_icon.length == "" || sort.length == ""
            ) {
                if (module_name.length == "") {
                    $('#m1').html("<code class='err_msg'>* This field is mandatory *</code>");
                    $("#m1 .err_msg").delay(3000).fadeOut(800);
                    $("#name").focus();
                }
                if (module_url.length == "") {
                    $('#m2').html("<code class='err_msg'>* This Message is mandatory *</code>");
                    $('#m2 .err_msg').delay(3000).fadeOut(800);
                    $('#account_no').focus();
                }
                if (module_url.length == "") {
                    $('#m3').html("<code class='err_msg'>* This Message is mandatory *</code>");
                    $('#m3 .err_msg').delay(3000).fadeOut(800);
                    $('#address').focus();
                }
                if (sort.length == "") {
                    $('#m4').html("<code class='err_msg'>* This Message is mandatory *</code>");
                    $('#m4 .err_msg').delay(3000).fadeOut(800);
                    $('#address').focus();
                }
                return false;
            }
            else {
                return true
            }
        }
    });
</script>

