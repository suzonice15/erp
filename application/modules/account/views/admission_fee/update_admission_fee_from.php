<?php foreach ($admission_fee as $v_data) { ?>
    <form action="#" id="add_admission_fee">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Student ID</label>
                    <input type="hidden" name="id" value="<?php echo $v_data->id;?>">
                    <input type="hidden" name="class_id" value="<?php echo $v_data->class_id;?>">
                    <input type="text" readonly="readonly" placeholder="Student ID" value="<?php echo $v_data->student_id;?>" class="form-control" name="student_id" id="student_id">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Amount</label>
                    <input type="text" placeholder="Amount" value="<?php echo $v_data->paid_amount;?>" class="form-control" name="paid_amount"
                           id="paid_amount">
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <input type="submit" class="form-control btn btn-success" value="Update admission fee">
                </div>
            </div>
        </div>
        <div id="add_msg" class="text-center"></div>
    </form>
<?php } ?>

<script>
    $(document).ready(function () {
        $('#add_admission_fee').submit(function () {
            var dataString = $('#add_admission_fee').serialize();
            $.ajax({
                type: "POST",
                url: '<?php echo base_url() ?>account/admission_fee/update_admission_fee',
                data: dataString,
                success: function (result) {
                    if (result) {
                        $('#add_msg').html(result);
                        $('#add_msg .alert').delay(5000).fadeOut(1000);
                        $('#add_admission_fee').trigger("reset");
                        window.setTimeout(function () {
                            window.location.href = "<?php echo base_url()?>account/admission_fee/all_admission_fee";
                        }, 2000);
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




