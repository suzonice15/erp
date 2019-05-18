<form action="" method="POST" id="add_holiday_frm" enctype="multipart/form-data">
    <div class="form-group">
        <input id="holiday_name" onblur="check_duplicate()" name="holiday_name" type="text" required="required" class="form-control" placeholder="holiday Name....">
        <span id="m1"></span>
    </div>
    <div class="form-group">
        <input id="start_date" name="start_date" type="text" required="required" class="form-control" placeholder="Start date name....">
    </div>
    <div class="form-group">
        <input id="end_date" name="end_date" type="text" required="required" class="form-control" placeholder="End date name....">
    </div>
    <div class="form-group">
        <input type="submit" class="form-control btn btn-success" value="Add Holiday">
    </div>
    <div id="add_msg" class="text-center"></div>
</form>


<script>
    $(document).ready(function () {
        $('#add_holiday_frm').submit(function () {
            var dataString = $('#add_holiday_frm').serialize();
            $.ajax({
                type: "POST",
                url: '<?php echo base_url() ?>master/holiday/create_holiday',
                data: dataString,
                success: function (result) {
                    if (result) {
                        $('#add_msg').html(result);
                        $('#add_msg .alert').delay(5000).fadeOut(1000);
                        $('#add_holiday_frm').trigger("reset");
                        window.setTimeout(function () {
                            window.location.href = "<?php echo base_url()?>master/holiday/all_holiday";
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
        var holiday_name = $('#holiday_name').val();
        $.ajax({
            type:'POST',
            url:'<?php echo base_url()?>master/holiday/check_duplicate_data/'+holiday_name,
            success:function (result) {
                if(result){
                    $('#holiday_name').val('');
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


