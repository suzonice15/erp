<form action="#" method="post" id="enroll_student">
    <table class="table table-striped table-responsive table-bordered table-hover">
        <thead>
        <tr>
            <th>SL NO</th>
            <th>Student ID</th>
            <th>Student Name</th>
            <th>Class Roll</th>
            <th>Class Name</th>
            <th>Shift Name</th>
            <th>Section Name</th>
            <th>Study Group</th>
            <th>Year</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $i = 0;
        foreach ($student_info as $v_data) {
            $i++; ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td>
                    <?php echo $v_data->student_id; ?>
                    <input type="hidden" name="student_id[]" value="<?php echo $v_data->student_id; ?>">
                </td>
                <td><?php echo $v_data->student_name; ?></td>
                <td>
                    <?php echo $i; ?>
                    <input type="hidden" name="class_roll[]" value="<?php echo $i; ?>">
                </td>
                <td><?php echo $v_data->class_name; ?>
                    <input type="hidden" name="class_id[]" value="<?php echo $v_data->class_id; ?>">
                </td>
                <td><?php echo $v_data->shift_name; ?>
                    <input type="hidden" name="shift_id[]" value="<?php echo $v_data->shift_id; ?>">
                </td>
                <td><?php echo $v_data->section_name; ?>
                    <input type="hidden" name="section_id[]" value="<?php echo $v_data->section_id; ?>">
                </td>
                <td><?php echo $v_data->group_name; ?>
                    <input type="hidden" name="study_group_id[]" value="<?php echo $v_data->study_group_id; ?>">
                </td>

                <td><?php echo $tt = substr($v_data->admission_date, 0, 4); ?>
                    <input type="hidden" name="year[]" value="<?php echo $tt; ?>">
                </td>
            </tr>
        <?php } ?>
        <input type="hidden" name="total_num_of_fields" value="<?php echo $i; ?>">
        <tr>
            <td colspan="8"><div id="add_msg" class="text-center"></div></td>
            <td>
                <input type="submit" class="btn btn-success" value="Confirm">
            </td>
        </tr>
        </tbody>
    </table>
</form>
<script>
    $(document).ready(function () {
        $('#enroll_student').submit(function () {
            var dataString = $('#enroll_student').serialize();
            $.ajax({
                type: "POST",
                url: '<?php echo base_url() ?>academic/enroll_class/create_enroll_class',
                data: dataString,
                async: false,
                success: function (result) {
                    if (result) {
                        $('#add_msg').html(result);
                        $('#add_msg .alert').delay(5000).fadeOut(1000);
                        $('#enroll_student').trigger("reset");
                        window.setTimeout(function () {
                            window.location.href = "<?php echo base_url()?>academic/enroll_class/all_enroll_class";
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