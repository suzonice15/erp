<form action="#" id="update_more_data" method="post" enctype="multipart/form-data">
    <?php
    $i = 0;
    foreach ($experience as $v_data) {
        $i++;
        ?>
        <div class="add_more_field">
            <div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <label>Employee ID:</label>
                            <input id="emp_id" required="required" name="emp_id[]" type="text"
                                   class="form-control"
                                   placeholder="Employee ID ....">
                        </div>
                        <div class="col-md-4">
                            <label>Institute:</label>
                            <input id="institute" name="institute[]" type="text" class="form-control"
                                   placeholder="Institute ....">
                        </div>
                        <div class="col-md-4">
                            <label>Business:</label>
                            <input id="business" name="business[]" type="text" class="form-control"
                                   placeholder="Business ....">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <label>Department:</label>
                            <input id="department" required="required" name="department[]" type="text"
                                   class="form-control"
                                   placeholder="Department ....">
                        </div>
                        <div class="col-md-4">
                            <label>Joined On:</label>
                            <input name="joined_on[]" id="joined_on1" type="text" class="form-control joined_on"
                                   placeholder="Joined on ....">
                        </div>
                        <div class="col-md-4">
                            <label>Release On:</label>
                            <input onchange="count_duration()" id="release_on1" name="release_on[]" type="text"
                                   class="form-control release_on"
                                   placeholder="Release on ....">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <label>Duration:</label>
                            <input id="duration1" required="required" name="duration[]" type="text"
                                   class="form-control"
                                   placeholder="Duration ....">
                        </div>
                        <div class="col-md-4">
                            <label>Area of concentration:</label>
                            <input id="area_of_concentration" name="area_of_concentration[]" type="text"
                                   class="form-control"
                                   placeholder="Area of concentration ....">
                        </div>
                        <div class="col-md-4">
                            <label>Position Hold:</label>
                            <input id="position_hold" name="position_hold[]" type="text" class="form-control"
                                   placeholder="Position hold ....">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <label style="padding: 0px 0px 0px 15px;">Job Details:</label>
                        <div class="col-md-12">
                            <textarea name="job_details[]" id="job_details"></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>

    <div class="form-group">
        <div class="row">
            <div class="col-md-12">
                <input type="submit" class="form-control btn btn-success" value="Add Experience">
            </div>
        </div>
    </div>
    <input type="hidden" name="total_num_of_fields" value="<?php echo $i; ?>">
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
    CKEDITOR.replace('job_details');
    CKEDITOR.config.autoParagraph = false;
</script>

<script>
    function count_duration() {
        var total_fields = $('input[name="total_num_of_fields"]').val();
        var firstDate = $('#joined_on' + (total_fields)).val();
        var secondDate = $('#release_on' + (total_fields)).val();
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
        $('#add_more_data').submit(function () {
            var value = CKEDITOR.instances['job_details'].getData();
            var dataString = new FormData($(this)[0]);
            dataString.append("description", value);
            $.ajax({
                type: "POST",
                url: '<?php echo base_url() ?>hr/experience/create_experience',
                data: dataString,
                async: false,
                success: function (result) {
                    if (result) {
                        $('#add_msg').html(result);
                        $('#add_msg .alert').delay(5000).fadeOut(1000);
                        $('#add_more_data').trigger("reset");
                        window.setTimeout(function () {
                            window.location.href = "<?php echo base_url()?>hr/experience/all_experience";
                        }, 1000);
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