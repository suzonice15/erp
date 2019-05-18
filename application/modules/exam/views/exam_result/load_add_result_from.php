<form action="#" method="post" id="add_exam_result">
    <table class="table table-striped table-responsive table-bordered table-hover">
        <thead>
        <tr>
            <th>SL NO</th>
            <th>Student ID</th>
            <th>Student Name</th>
            <th>Subjective Marks</th>
            <th>Objective Marks</th>
            <th>Practical Marks</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $i = 0;
        foreach ($student_info as $v_data) {
            $i++; ?>
            <tr>
                <td><?php echo $i; ?></td>
                <input type="hidden" name="class_id" value="<?php echo $class_id; ?>">
                <input type="hidden" name="subject_id" value="<?php echo $subject_id; ?>">
                <input type="hidden" name="shift_id" value="<?php echo $shift_id; ?>">
                <input type="hidden" name="section_id" value="<?php echo $section_id; ?>">
                <input type="hidden" name="academic_exam_id" value="<?php echo $academic_exam_id; ?>">
                <input type="hidden" name="study_group_id" value="<?php echo $study_group_id; ?>">
                <input type="hidden" name="year" value="<?php echo $year; ?>">
                <td style="width: 100px;">
                    <?php echo $v_data->student_id; ?>
                    <input type="hidden" name="student_id[]" value="<?php echo $v_data->student_id; ?>">
                </td>
                <td style="width: 220px;"><?php echo $v_data->student_name; ?></td>
                <td><input type="text" class="form-control" id="subjective_marks" name="subjective_marks[]"></td>
                <td><input type="text" class="form-control" id="objective_marks" name="objective_marks[]"></td>
                <td><input type="text" class="form-control" id="practical_marks" name="practical_marks[]"></td>
            </tr>
        <?php } ?>
        <input type="hidden" name="total_num_of_fields" value="<?php echo $i; ?>">
        <tr>
            <td colspan="5">
                <div id="add_msg" class="text-center"></div>
            </td>
            <td>
                <input type="submit" class="btn btn-success" value="Confirm">
            </td>
        </tr>
        </tbody>
    </table>
</form>
<script>
    $(document).ready(function () {
        $('#add_exam_result').submit(function () {
            var dataString = $('#add_exam_result').serialize();
            $.ajax({
                type: "POST",
                url: '<?php echo base_url() ?>exam/result/create_result',
                data: dataString,
                async: false,
                success: function (result) {
                    if (result) {
                        $('#add_msg').html(result);
                        $('#add_msg .alert').delay(5000).fadeOut(1000);
                        $('#add_exam_result').trigger("reset");
                        window.setTimeout(function () {
                            window.location.href = "<?php echo base_url()?>exam/result/all_result";
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