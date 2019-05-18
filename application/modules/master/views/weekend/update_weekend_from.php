<?php foreach ($weekend as $v_data) { ?>
    <form action="" method="POST" id="add_weekend_frm" enctype="multipart/form-data">
        <div class="form-group">
            <input type="hidden" name="id" value="<?php echo $v_data->id;?>">
            <input value="<?php echo $v_data->weekend_name;?>" id="weekend_name" name="weekend_name" type="text" required="required" class="form-control"
                   placeholder="weekend Name....">
            <span id="m1"></span>
        </div>
        <div class="form-group">
            <input type="submit" class="form-control btn btn-success" value="Update weekend">
        </div>
        <div id="add_msg" class="text-center"></div>
    </form>
<?php } ?>

<script>
    $(document).ready(function () {
        $('#add_weekend_frm').submit(function () {
            var dataString = $('#add_weekend_frm').serialize();
            $.ajax({
                type: "POST",
                url: '<?php echo base_url() ?>master/weekend/update_weekend',
                data: dataString,
                success: function (result) {
                    if (result) {
                        $('#add_msg').html(result);
                        $('#add_msg .alert').delay(5000).fadeOut(1000);
                        $('#add_weekend_frm').trigger("reset");
                        window.setTimeout(function () {
                            window.location.href = "<?php echo base_url()?>master/weekend/all_weekend";
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

