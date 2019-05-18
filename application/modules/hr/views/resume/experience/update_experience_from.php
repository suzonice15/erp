<form action="#" id="update_experience" method="post">
    <?php foreach ($experience as $v_data) { ?>
        <div class="add_more_field">
            <div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <label>Employee ID:</label>
                            <input type="hidden" name="id" value="<?php echo $v_data->id; ?>">
                            <input id="emp_id" value="<?php echo $v_data->emp_id; ?>" name="emp_id" type="text"
                                   class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label>Institute:</label>
                            <input id="institute" value="<?php echo $v_data->institute; ?>" name="institute" type="text"
                                   class="form-control"
                                   placeholder="Institute ....">
                        </div>
                        <div class="col-md-4">
                            <label>Business:</label>
                            <input id="business" name="business" value="<?php echo $v_data->business; ?>" type="text"
                                   class="form-control"
                                   placeholder="Business ....">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <label>Department:</label>
                            <input id="department" required="required" name="department"
                                   value="<?php echo $v_data->department; ?>" type="text"
                                   class="form-control"
                                   placeholder="Department ....">
                        </div>
                        <div class="col-md-4">
                            <label>Joined On:</label>
                            <input name="joined_on" value="<?php echo $v_data->joined_on; ?>" id="joined_on"
                                   type="text" class="form-control joined_on"
                                   placeholder="Joined on ....">
                        </div>
                        <div class="col-md-4">
                            <label>Release On:</label>
                            <input onchange="count_duration()" id="release_on" name="release_on"
                                   value="<?php echo $v_data->release_on; ?>" type="text"
                                   class="form-control release_on"
                                   placeholder="Release on ....">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <label>Duration:</label>
                            <input id="duration" required="required" name="duration" type="text"
                                   class="form-control"
                                   placeholder="Duration ....">
                        </div>
                        <div class="col-md-4">
                            <label>Area of concentration:</label>
                            <input id="area_of_concentration" name="area_of_concentration"
                                   value="<?php echo $v_data->area_of_concentration; ?>" type="text"
                                   class="form-control"
                                   placeholder="Area of concentration ....">
                        </div>
                        <div class="col-md-4">
                            <label>Position Hold:</label>
                            <input id="position_hold" name="position_hold" value="<?php echo $v_data->position_hold; ?>"
                                   type="text" class="form-control"
                                   placeholder="Position hold ....">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <label style="padding: 0px 0px 0px 15px;">Job Details:</label>
                        <div class="col-md-12">
                            <textarea name="job_details" cols="120" rows="10" id="job_details"><?php echo $v_data->job_details; ?></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>

    <div class="form-group">
        <div class="row">
            <div class="col-md-12">
                <input type="submit" class="form-control btn btn-success" value="Update Experience">
            </div>
        </div>
    </div>
    <div id="add_msg" class="text-center"></div>
</form>


<script>
    $('body').on('focus', ".joined_on", function () {
        $(this).datepicker({dateFormat: 'yy-mm-dd', changeYear: true, changeMonth: true, yearRange: "1970:2100"});
    });
    $('body').on('focus', ".release_on", function () {
        $(this).datepicker({dateFormat: 'yy-mm-dd', changeYear: true, changeMonth: true, yearRange: "1970:2100"});
    });
</script>

<script>
    function count_duration() {
        var firstDate = $('#joined_on').val();
        var secondDate = $('#release_on').val();
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
    $(document).ready(function () {
        $("#update_experience").submit(function () {
            var dataString = $('#update_experience').serialize();
            $.ajax({
                type: "POST",
                url: '<?php echo base_url() ?>hr/my_resume/update_experience',
                data: dataString,
                success: function (result) {
                    if (result) {
                        $('#add_msg').html(result);
                        $('#add_msg .alert').delay(5000).fadeOut(1000);
                        $('#update_experience').trigger("reset");
                        window.setTimeout(function () {
                            window.location.href = "<?php echo base_url()?>hr/my_resume/all_my_resume";
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