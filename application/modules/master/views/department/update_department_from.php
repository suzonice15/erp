<?php foreach ($department as $v_data) { ?>
    <form action="" method="POST" id="add_department_frm" enctype="multipart/form-data">
        <div class="form-group">
            <input type="hidden" name="id" value="<?php echo $v_data->id;?>">
            <input value="<?php echo $v_data->department_name;?>" id="department_name" name="department_name" type="text" required="required" class="form-control"
                   placeholder="department Name....">
            <span id="m1"></span>
        </div>
        <div class="form-group">
            <input type="submit" class="form-control btn btn-success" value="Update department">
        </div>
        <div id="add_msg" class="text-center"></div>
    </form>
<?php } ?>

<script>
    $(document).ready(function () {
        $('#add_department_frm').submit(function () {
            var dataString = $('#add_department_frm').serialize();
            $.ajax({
                type: "POST",
                url: '<?php echo base_url() ?>master/department/update_department',
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

