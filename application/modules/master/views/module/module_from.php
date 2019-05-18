<form action="" method="POST" id="add_module_frm" enctype="multipart/form-data">
    <div class="form-group">
        <input id="module_name" onblur="check_duplicate()" name="module_name" type="text" class="form-control" placeholder="Module Name....">
        <span id="m1"></span>
    </div>
    <div class="form-group">
        <input id="module_url" name="module_url" type="text" class="form-control" placeholder="Module URL....">
        <span id="m2"></span>
    </div>
    <div class="form-group">
        <input id="module_icon" name="module_icon" type="text" class="form-control" placeholder="Module Icon....">
        <span id="m3"></span>
    </div>
    <div class="form-group">
        <input id="sort" name="sort" type="text" class="form-control" placeholder="Sorting Order....">
        <span id="m4"></span>
    </div>
    <div class="form-group">
        <input type="submit" class="form-control btn btn-success" value="Add Module">
    </div>
    <div id="add_msg" class="text-center"></div>
</form>


<script>
    $(document).ready(function () {
        $('#add_module_frm').submit(function () {
            if (validation() == true) {
                var dataString = $('#add_module_frm').serialize();
                $.ajax({
                    type: "POST",
                    url: '<?php echo base_url() ?>master/Module/create_module',
                    data: dataString,
                    success: function (result) {
                        if (result) {
                            $('#add_msg').html(result);
                            $('#add_msg .alert').delay(5000).fadeOut(1000);
                            $('#add_module_frm').trigger("reset");
                            window.setTimeout(function () {
                                window.location.href = "<?php echo base_url()?>master/Module/all_module";
                            }, 1000);
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

<script>
    function check_duplicate() {
        var module_name = $('#module_name').val();
        $.ajax({
            type:'POST',
            url:'<?php echo base_url()?>master/module/check_duplicate_data/'+module_name,
            success:function (result) {
                if(result){
                    $('#module_name').val('');
                    $('#m1').html(result);
                    return false;
                }else{
                    $('#m1').html('');
                    return false;
                }
            }
        });
        return false;
    }
</script>

