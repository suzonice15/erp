<?php foreach ($leave_type as $v_data) { ?>
    <form action="" method="POST" id="add_leave_type_frm" enctype="multipart/form-data">
        <div class="form-group">
            <input type="hidden" name="id" value="<?php echo $v_data->id;?>">
            <input value="<?php echo $v_data->leave_name;?>" id="leave_type_name" name="leave_type_name" type="text" required="required" class="form-control"
                   placeholder="leave type name....">
        </div>
        <div class="form-group">
            <input value="<?php echo $v_data->duration;?>" id="duration" name="duration" type="text" required="required" class="form-control"
                   placeholder="Duration....">
        </div>
        <div class="form-group">
            <input type="submit" class="form-control btn btn-success" value="Update leave type">
        </div>
        <div id="add_msg" class="text-center"></div>
    </form>
<?php } ?>

<script>
    $(document).ready(function () {
        $('#add_leave_type_frm').submit(function () {
            var dataString = $('#add_leave_type_frm').serialize();
            $.ajax({
                type: "POST",
                url: '<?php echo base_url() ?>master/leave_type/update_leave_type',
                data: dataString,
                success: function (result) {
                    if (result) {
                        $('#add_msg').html(result);
                        $('#add_msg .alert').delay(5000).fadeOut(1000);
                        $('#add_leave_type_frm').trigger("reset");
                        window.setTimeout(function () {
                            window.location.href = "<?php echo base_url()?>master/leave_type/all_leave_type";
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

