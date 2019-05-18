<form action="#" id="add_exam_fee">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Student ID</label>
                <input type="text" placeholder="Student ID" class="form-control" name="student_id" id="student_id">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Amount</label>
                <input type="text" placeholder="Amount" class="form-control" name="amount"
                       id="amount">
            </div>
        </div>
        <div class="col-md-6" style="display: none;">
            <div class="form-group">
                <label>Exam</label>
                <select name="academic_exam_id" id="academic_exam_id" class="form-control">
                    <?php foreach ($academic_exam as $v_data){?>
                    <option value="<?php echo $v_data->id;?>"><?php echo $v_data->exam_name;?></option>
                    <?php }?>
                </select>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <input type="submit" class="form-control btn btn-success" value="Add Exam fee">
            </div>
        </div>
    </div>
    <div id="add_msg" class="text-center"></div>
</form>

<script>
    $(document).ready(function () {
        $('#add_exam_fee').submit(function () {
            var dataString = $('#add_exam_fee').serialize();
            $.ajax({
                type: "POST",
                url: '<?php echo base_url() ?>account/exam_fee/create_exam_fee',
                data: dataString,
                success: function (result) {
                    if (result) {
                        $('#add_msg').html(result);
                        $('#add_msg .alert').delay(5000).fadeOut(1000);
                        $('#add_exam_fee').trigger("reset");
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



