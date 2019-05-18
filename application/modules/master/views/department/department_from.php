<form action="" method="POST" id="add_department_frm" enctype="multipart/form-data">
    <div class="form-group">
        <input id="department_name" onblur="check_duplicate()" name="department_name" type="text" required="required" class="form-control" placeholder="Department Name....">
        <span id="m1"></span>
    </div>
    <div class="form-group">
        <input type="submit" class="form-control btn btn-success" value="Add department">
    </div>
    <div id="add_msg" class="text-center"></div>
</form>


<script>
    $(document).ready(function () {
        $('#add_department_frm').submit(function () {
            var dataString = $('#add_department_frm').serialize();
            $.ajax({
                type: "POST",
                url: '<?php echo base_url() ?>master/department/create_department',
                data: dataString,
                success: function (result) {
                    if (result) {
                        $('#add_msg').html(result);
                        $('#add_msg .alert').delay(5000).fadeOut(1000);
                        $('#add_department_frm').trigger("reset");
                        window.setTimeout(function () {
                            window.location.href = "<?php echo base_url()?>master/department/all_department";
                        }, 1000);
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
<script>
    function check_duplicate() {
        var department_name = $('#department_name').val();
        $.ajax({
            type:'POST',
            url:'<?php echo base_url()?>master/department/check_duplicate_data/'+department_name,
            success:function (result) {
                if(result){
                    $('#department_name').val('');
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


