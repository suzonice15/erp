<form action="" id="add_attendance">
    <table class="add_more_field table table-bordered table-striped table-hover">
        <tr>
            <td colspan="6" style="text-align: center; font-size: 20px;">
                Assigning Employee Roster
            </td>
        </tr>
        <tr>
            <td style="width: 105px;">Employee ID</td>
            <td style="width: 105px;">Name</td>
            <td style="width: 105px;">Designation</td>
            <td style="width: 105px;">Post Name</td>
            <td style="width: 105px;">In Time</td>
            <td style="width: 105px;">Out Time</td>
        </tr>
        <?php
        $i = 0;
        foreach ($emp_info as $v_weekend) {
            $i++; ?>
            <tr>
                <input type="hidden" value="<?php echo $v_weekend->emp_id; ?>" name="emp_id[]">
                <td><?php echo $v_weekend->emp_id; ?></td>
                <td><?php echo $v_weekend->emp_name; ?></td>
                <td><?php echo $v_weekend->designation_name; ?></td>
                <td><?php echo $v_weekend->post_name; ?></td>
                <td><input type="text" class="form-control" name="in_time[]"></td>
                <td><input type="text" class="form-control" name="out_time[]"></td>
            </tr>
        <?php } ?>
        <td colspan="4"></td>
        <td colspan="2">
            <input required="required" name="present_date" type="text" placeholder="Present Date"
                   class="form-control present_date">
        </td>
    </table>
    <div class="form-group">
        <input type="submit" class="form-control btn btn-success" value="Add Attendance">
    </div>
    <input type="hidden" name="total_num_of_fields" value="<?php echo $i; ?>">
    <div id="add_msg" class="text-center"></div>
</form>


<script>
    $('body').on('focus', ".present_date", function () {
        $(this).datepicker({dateFormat: 'yy-mm-dd', changeYear: true, changeMonth: true, yearRange: "1970:2100"});
    });
</script>

<script>
    $(document).ready(function () {
        $('#add_attendance').submit(function () {
            var dataString = $('#add_attendance').serialize();
            $.ajax({
                type: "POST",
                url: '<?php echo base_url() ?>hr/attendance/create_attendance',
                data: dataString,
                success: function (result) {
                    if (result) {
                        $('#add_msg').html(result);
                        $('#add_msg .alert').delay(5000).fadeOut(1000);
                        $('#add_attendance').trigger("reset");
                        window.setTimeout(function () {
                            window.location.href = "<?php echo base_url()?>hr/attendance/all_attendance";
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