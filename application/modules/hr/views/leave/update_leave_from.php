<?php foreach ($leave as $v_leave) { ?>
    <form action="" id="update_leave">
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <input type="hidden" name="id" value="<?php echo $v_leave->id; ?>">
                    <input type="hidden" name="status" value="<?php echo $v_leave->status; ?>">
                    <label>Employee ID:</label> <span></span>
                    <input readonly="readonly" value="<?php echo $v_leave->emp_id; ?>" name="emp_id"
                           placeholder="Employee ID" type="text" class="form-control">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label>Leave Type:</label> <span></span>
                    <select name="leave_type_id" id="leave_type_id" required="required" class="form-control">
                        <option value="">Select Leave Type</option>
                        <?php foreach ($leave_type as $v_data) { ?>
                            <?php if ($v_data->id == $v_leave->leave_type_id) { ?>
                                <option selected="selected" value="<?php echo $v_data->id; ?>"><?php echo $v_data->leave_name; ?></option>
                            <?php } else { ?>
                                <option value="<?php echo $v_data->id; ?>"><?php echo $v_data->leave_name; ?></option>
                            <?php } ?>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label>From Date:</label> <span></span>
                    <input name="from_date" id="from_date" value="<?php echo $v_leave->from_date; ?>"
                           required="required" placeholder="From Date" type="text"
                           class="form-control from_date">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label>To Date:</label> <span></span>
                    <input onchange="count_duration();" required="required" name="to_date" id="to_date"
                           placeholder="To Date" value="<?php echo $v_leave->to_date; ?>" type="text"
                           class="form-control to_date">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label>Duration:</label> <span id="err_msg"></span>
                    <input name="duration" id="duration" value="<?php echo $v_leave->duration; ?>"
                           placeholder="Duration" required="required" type="text"
                           class="form-control">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label>Attach File:</label> <span></span>
                    <input type="hidden" name="old_attachment_file" value="<?php echo $v_leave->attachment_file;?>">
                    <input name="attachment_file" id="attachment_file" type="file"
                           class="form-control">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label>Replace Employee ID:</label> <span></span>
                    <input name="employee_id" id="employee_id" value="<?php echo $v_leave->employee_id; ?>"
                           required="required" placeholder="Replace Employee ID"
                           type="text" class="form-control">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label>Leave Reson:</label> <span></span>
                    <textarea name="leave_reason" required="required"
                              placeholder="Leave reason note"><?php echo $v_leave->leave_reason; ?></textarea>
                </div>
            </div>
        </div>
        <div class="form-group">
            <input type="submit" class="form-control btn btn-success" value="Add Leave Info">
        </div>
        <div id="add_msg" class="text-center"></div>
    </form>
<?php } ?>
<script>
    function count_duration() {
        var firstDate = $('#from_date').val();
        var secondDate = $('#to_date').val();
        var startDay = new Date(firstDate);
        var endDay = new Date(secondDate);
        var millisecondsPerDay = 1000 * 60 * 60 * 24;
        var millisBetween = endDay.getTime() - startDay.getTime();
        var days = millisBetween / millisecondsPerDay;
        if (days >= 0) {
            var count = days + 1;
            $('#duration').val(count);
        } else {
            $('#err_msg').html(" - value not allow");
            $('#duration').val('');
        }
    }
</script>


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
        $('#update_leave').submit(function () {
            var dataString = new FormData($(this)[0]);
            $.ajax({
                type: "POST",
                url: '<?php echo base_url() ?>hr/leave/update_leave',
                data: dataString,
                async: false,
                success: function (result) {
                    if (result) {
                        $('#add_msg').html(result);
                        $('#add_msg .alert').delay(5000).fadeOut(1000);
                        $('#update_leave').trigger("reset");
                        window.setTimeout(function () {
                            window.location.href = "<?php echo base_url()?>hr/leave/all_leave";
                        }, 2000);
                        return false;
                    } else {
                        return false;
                    }
                },
                cache: false,
                contentType: false,
                processData: false
            });
            return false;
        });
    });
</script>


