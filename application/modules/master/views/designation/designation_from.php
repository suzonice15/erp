<form action="" method="POST" id="add_designation_frm" enctype="multipart/form-data">
    <div class="form-group">
        <input id="designation_name" onblur="check_duplicate()" name="designation_name" type="text" required="required" class="form-control" placeholder="designation Name....">
        <span id="m1"></span>
    </div>
    <div class="form-group">
        <input type="submit" class="form-control btn btn-success" value="Add designation">
    </div>
    <div id="add_msg" class="text-center"></div>
</form>


<script>
    $(document).ready(function () {
        $('#add_designation_frm').submit(function () {
            var dataString = $('#add_designation_frm').serialize();
            $.ajax({
                type: "POST",
                url: '<?php echo base_url() ?>master/designation/create_designation',
                data: dataString,
                success: function (result) {
                    if (result) {
                        $('#add_msg').html(result);
                        $('#add_msg .alert').delay(5000).fadeOut(1000);
                        $('#add_designation_frm').trigger("reset");
                        window.setTimeout(function () {
                            window.location.href = "<?php echo base_url()?>master/designation/all_designation";
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
        var designation_name = $('#designation_name').val();
        $.ajax({
            type:'POST',
            url:'<?php echo base_url()?>master/designation/check_duplicate_data/'+designation_name,
            success:function (result) {
                if(result){
                    $('#designation_name').val('');
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


