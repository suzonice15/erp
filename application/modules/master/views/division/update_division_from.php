<?php foreach ($division as $v_data) { ?>
    <form action="" method="POST" id="update_division_frm" enctype="multipart/form-data">
        <div class="form-group">
            <input type="hidden" name="id" value="<?php echo $v_data->id;?>">
            <input id="division_name" value="<?php echo $v_data->division_name;?>" name="division_name" type="text" required="required" class="form-control"
                   placeholder="Division Name....">
            <span id="m1"></span>
        </div>
        <div class="form-group">
            <input type="submit" class="form-control btn btn-success" value="Update Division">
        </div>
        <div id="add_msg" class="text-center"></div>
    </form>
<?php } ?>

<script>
    $(document).ready(function () {
        $('#update_division_frm').submit(function () {
            var dataString = $('#update_division_frm').serialize();
            $.ajax({
                type: "POST",
                url: '<?php echo base_url() ?>master/division/update_division',
                data: dataString,
                success: function (result) {
                    if (result) {
                        $('#add_msg').html(result);
                        $('#add_msg .alert').delay(5000).fadeOut(1000);
                        $('#update_division_frm').trigger("reset");
                        window.setTimeout(function () {
                            window.location.href = "<?php echo base_url()?>master/division/all_division";
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

