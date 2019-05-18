<form action="" id="add_roster">
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
            </tr>
        <?php } ?>
        <td colspan="2">
            <input required="required" name="from_date" type="text" placeholder="From Date"
                   class="form-control from_date">
        </td>
        <td colspan="2">
            <input required="required" name="to_date" type="text" placeholder="To Date"
                   class="form-control to_date">
        </td>
    </table>
    <div class="form-group">
        <input type="submit" class="form-control btn btn-success" value="Add Roster">
    </div>
    <input type="hidden" name="total_num_of_fields" value="<?php echo $i; ?>">
    <div id="add_msg" class="text-center"></div>
</form>


<script>
    $('body').on('focus', ".from_date", function () {
        $(this).datepicker({dateFormat: 'yy-mm-dd', changeYear: true, changeMonth: true, yearRange: "1970:2100"});
    });
    $('body').on('focus', ".to_date", function () {
        $(this).datepicker({dateFormat: 'yy-mm-dd', changeYear: true, changeMonth: true, yearRange: "1970:2100"});
    });
</script>

<script>
    $(document).ready(function () {
        $('#add_roster').submit(function () {
            var dataString = $('#add_roster').serialize();
            $.ajax({
                type: "POST",
                url: '<?php echo base_url() ?>hr/roster/create_roster',
                data: dataString,
                success: function (result) {
                    if (result) {
                        $('#add_msg').html(result);
                        $('#add_msg .alert').delay(5000).fadeOut(1000);
                        $('#add_roster').trigger("reset");
                        window.setTimeout(function () {
                            window.location.href = "<?php echo base_url()?>hr/roster/all_roster";
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