<?php foreach ($holiday as $v_data) { ?>
    <form action="" method="POST" id="add_holiday_frm" enctype="multipart/form-data">
        <div class="form-group">
            <input type="hidden" name="id" value="<?php echo $v_data->id;?>">
            <input value="<?php echo $v_data->holiday_name;?>" id="holiday_name" name="holiday_name" type="text" required="required" class="form-control"
                   placeholder="holiday Name....">
            <span id="m1"></span>
        </div>
        <div class="form-group">
            <input value="<?php echo $v_data->start_date;?>" id="start_date" name="start_date" type="text" required="required" class="form-control"
                   placeholder="Start date name....">
        </div>
        <div class="form-group">
            <input value="<?php echo $v_data->end_date;?>" id="end_date" name="end_date" type="text" required="required" class="form-control"
                   placeholder="End date name....">
        </div>
        <div class="form-group">
            <input type="submit" class="form-control btn btn-success" value="Update Holiday">
        </div>
        <div id="add_msg" class="text-center"></div>
    </form>
<?php } ?>

<script>
    $(document).ready(function () {
        $('#add_holiday_frm').submit(function () {
            var dataString = $('#add_holiday_frm').serialize();
            $.ajax({
                type: "POST",
                url: '<?php echo base_url() ?>master/holiday/update_holiday',
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

