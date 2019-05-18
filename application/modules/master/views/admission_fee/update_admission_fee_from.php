<?php foreach ($admission_fee as $v_data) { ?>
    <form action="" method="POST" id="update_admission_fee" enctype="multipart/form-data">
        <div class="form-group">
            <div class="row">
                <div class="col-md-4">
                    <input type="hidden" name="id" value="<?php echo $v_data->id;?>">
                    <input type="hidden" name="status" value="<?php echo $v_data->status;?>">
                    <input id="year" name="year" value="<?php echo $v_data->year;?>" type="text" required="required" class="form-control"
                           placeholder="Year....">
                </div>
                <div class="col-md-4">
                    <input id="particulars" value="<?php echo $v_data->particulars;?>" name="particulars" type="text" required="required" class="form-control"
                           placeholder="Particulars....">
                </div>
                <div class="col-md-4">
                    <input id="amount" name="amount" value="<?php echo $v_data->amount;?>" type="text" required="required" class="form-control"
                           placeholder="Amount....">
                </div>
            </div>
        </div>
        <div class="form-group">
            <input type="submit" class="form-control btn btn-success" value="Update admission fee">
        </div>
        <div id="add_msg" class="text-center"></div>
    </form>
<?php } ?>

<script>
    $(document).ready(function () {
        $('#update_admission_fee').submit(function () {
            var dataString = $('#update_admission_fee').serialize();
            $.ajax({
                type: "POST",
                url: '<?php echo base_url() ?>master/admission_fee/update_admission_fee',
                data: dataString,
                success: function (result) {
                    if (result) {
                        $('#add_msg').html(result);
                        $('#add_msg .alert').delay(5000).fadeOut(1000);
                        $('#update_admission_fee').trigger("reset");
                        window.setTimeout(function () {
                            window.location.href = "<?php echo base_url()?>master/admission_fee/all_admission_fee";
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

