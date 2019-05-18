<?php foreach ($exam_fee as $v_data) { ?>
    <form action="#" id="update_exam_fee_frm" method="post">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Student ID</label>
                    <input type="hidden" name="id" value="<?php echo $v_data->id;?>">
                    <input type="text" placeholder="Student ID" value="<?php echo $v_data->student_id;?>" class="form-control" name="student_id" id="student_id">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Amount</label>
                    <input type="text" placeholder="Amount" value="<?php echo $v_data->amount;?>" class="form-control" name="amount"
                           id="amount">
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <input type="submit" class="form-control btn btn-success" value="Update exam fee">
                </div>
            </div>
        </div>
        <div id="add_msg" class="text-center"></div>
    </form>
<?php } ?>

<script>
    $(document).ready(function () {
        $('#update_exam_fee_frm').submit(function () {
            var dataString = $('#update_exam_fee_frm').serialize();
            $.ajax({
                type: "POST",
                url: '<?php echo base_url() ?>account/exam_fee/update_exam_fee',
                data: dataString,
                success: function (result) {
                    if (result) {
                        $('#add_msg').html(result);
                        $('#add_msg .alert').delay(5000).fadeOut(1000);
                        $('#update_exam_fee_frm').trigger("reset");
                        window.setTimeout(function () {
                            window.location.href = "<?php echo base_url()?>account/exam_fee/all_exam_fee";
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




