<form action="#" id="update_more_data" method="post" enctype="multipart/form-data">
    <?php $i = "";
    foreach ($previous_job_history as $v_data) {
        $i++; ?>
        <div class="add_more_field">
            <div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-12">
                            <div style="background-color: #3C8DBC; padding: 7px; text-align: center; height: 35px;">
                                Previous Job.<?php echo $i; ?></div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label>Employee ID:</label>
                            <input type="hidden" name="id[]" value="<?php echo $v_data->id; ?>">
                            <input id="emp_id" required="required" readonly="readonly"
                                   value="<?php echo $v_data->emp_id; ?>" name="emp_id[]" type="text"
                                   class="form-control"
                                   placeholder="Employee ID ....">
                        </div>
                        <div class="col-md-6">
                            <label>Institute:</label>
                            <input id="organization_name" name="organization_name[]"
                                   value="<?php echo $v_data->organization_name; ?>" type="text" class="form-control"
                                   placeholder="Organization Name ....">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label>Business:</label>
                            <input id="position" name="position[]" value="<?php echo $v_data->position; ?>" type="text"
                                   class="form-control"
                                   placeholder="Position ....">
                        </div>

                        <div class="col-md-6">
                            <label>Job Type:</label>
                            <input id="job_type" required="required" value="<?php echo $v_data->job_type; ?>"
                                   name="job_type[]" type="text"
                                   class="form-control"
                                   placeholder="Job Type ....">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label>Joined On:</label>
                            <input name="from_date[]" id="from_date<?php echo $i; ?>"
                                   value="<?php echo $v_data->from_date; ?>"
                                   type="text" class="form-control from_date"
                                   placeholder="From Date ....">
                        </div>
                        <div class="col-md-6">
                            <label>Release On:</label>
                            <input onchange="count_duration(<?php echo $i; ?>)" id="to_date<?php echo $i; ?>"
                                   value="<?php echo $v_data->to_date; ?>"
                                   name="to_date[]" type="text"
                                   class="form-control to_date"
                                   placeholder="To Date ....">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label>Duration:</label>
                            <input id="duration<?php echo $i; ?>" name="duration[]"
                                   value="<?php echo $v_data->duration; ?>" type="text"
                                   class="form-control"
                                   placeholder="Duration ....">
                        </div>
                        <label style="padding: 0px 0px 0px 15px;">Address:</label>
                        <div class="col-md-6">
                            <textarea name="address[]" id="address" cols="56"><?php echo $v_data->address; ?></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
    <div class="form-group">
        <div class="row">
            <div class="col-md-12">
                <input type="submit" class="form-control btn btn-success" value="Update Previous Job History">
            </div>
        </div>
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
    function count_duration($id) {
        var total_fields = $id;
        var firstDate = $('#from_date' + (total_fields)).val();
        var secondDate = $('#to_date' + (total_fields)).val();
        var startDay = new Date(firstDate);
        var endDay = new Date(secondDate);
        var millisecondsPerDay = 1000 * 60 * 60 * 24;
        var millisBetween = endDay.getTime() - startDay.getTime();
        var days = millisBetween / millisecondsPerDay;
        if (days >= 0) {
            var count = days + 1;
            $('#duration' + (total_fields)).val(count);
        } else {
            $('#err_msg').html(" - value not allow");
            $('#duration' + (total_fields)).val('');
        }
    }
</script>

<script>
    $(document).ready(function () {
        $('#update_more_data').submit(function () {
            var dataString = $('#update_more_data').serialize();
            $.ajax({
                type: "POST",
                url: '<?php echo base_url() ?>hr/previous_job_history/update_previous_job_history',
                data: dataString,
                success: function (result) {
                    if (result) {
                        $('#add_msg').html(result);
                        $('#add_msg .alert').delay(5000).fadeOut(1000);
                        $('#update_more_data').trigger("reset");
                        window.setTimeout(function () {
                            window.location.href = "<?php echo base_url()?>hr/previous_job_history/all_previous_job_history";
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