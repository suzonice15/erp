<form action="#" id="add_more_data" method="post" enctype="multipart/form-data">
    <div class="add_more_field">
        <div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-6">
                        <label>Employee ID:</label>
                        <input id="emp_id" required="required" name="emp_id[]" type="text"
                               class="form-control"
                               placeholder="Employee ID ....">
                    </div>
                    <div class="col-md-6">
                        <label>Institute:</label>
                        <input id="organization_name" name="organization_name[]" type="text" class="form-control"
                               placeholder="Organization Name ....">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-md-6">
                        <label>Business:</label>
                        <input id="position" name="position[]" type="text" class="form-control"
                               placeholder="Position ....">
                    </div>

                    <div class="col-md-6">
                        <label>Job Type:</label>
                        <input id="job_type" required="required" name="job_type[]" type="text"
                               class="form-control"
                               placeholder="Job Type ....">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-6">
                        <label>Joined On:</label>
                        <input name="from_date[]" id="from_date1" type="text" class="form-control from_date"
                               placeholder="From Date ....">
                    </div>
                    <div class="col-md-6">
                        <label>Release On:</label>
                        <input onchange="count_duration()" id="to_date1" name="to_date[]" type="text"
                               class="form-control to_date"
                               placeholder="To Date ....">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-md-6">
                        <label>Duration:</label>
                        <input id="duration1" name="duration[]" type="text"
                               class="form-control"
                               placeholder="To Date ....">
                    </div>
                    <label style="padding: 0px 0px 0px 15px;">Address:</label>
                    <div class="col-md-6">
                        <textarea name="address[]" id="address" cols="56"></textarea>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-md-6">
                        </br>
                        <button type="button" onclick="return add_more();" class="btn btn-success">Add More</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="row">
            <div class="col-md-12">
                <input type="submit" class="form-control btn btn-success" value="Add Previous Job History">
            </div>
        </div>
    </div>

    <input type="hidden" name="total_num_of_fields" value="1">
    <div id="add_msg" class="text-center"></div>
</form>


<script>
    var i = 1;
    function add_more() {
        i++;
        $('.add_more_field').append('<div class="remove_field' + i + '">\
            <div class="form-group">\
            <div class="row">\
            <div class="col-md-6">\
            <label>Employee ID:</label>\
            <input id="emp_id" required="required" name="emp_id[]" type="text" class="form-control" placeholder="Employee ID ....">\
            </div>\
            <div class="col-md-6">\
            <label>Institute:</label>\
            <input id="organization_name" name="organization_name[]" type="text" class="form-control" placeholder="Organization Name ....">\
            </div>\
            </div>\
            </div>\
            <div class="form-group">\
            <div class="row">\
            <div class="col-md-6">\
            <label>Business:</label>\
            <input id="position" name="position[]" type="text" class="form-control" placeholder="Position ....">\
            </div>\
            <div class="col-md-6">\
            <label>Department:</label>\
            <input id="job_type" required="required" name="job_type[]" type="text" class="form-control" placeholder="Job Type ....">\
            </div>\
            </div>\
            </div>\
            <div class="form-group">\
            <div class="row">\
            <div class="col-md-6">\
            <label>Joined On:</label>\
            <input name="from_date[]" id="from_date' + i + '" type="text" class="form-control from_date" placeholder="From Date ....">\
            </div>\
            <div class="col-md-6">\
            <label>Release On:</label>\
            <input onchange="count_duration()" id="to_date' + i + '" name="to_date[]" type="text" class="form-control to_date" placeholder="To Date ....">\
            </div>\
            </div>\
            </div>\
            <div class="form-group">\
            <div class="row">\
            <div class="col-md-6">\
            <label>Duration:</label>\
            <input id="duration' + i + '" name="duration[]" type="text" class="form-control" placeholder="To Date ....">\
            </div>\
            <label style="padding: 0px 0px 0px 15px;">Address:</label>\
            <div class="col-md-6">\
            <textarea name="address[]" id="address" cols="56"></textarea>\
            </div>\
            </div>\
            </div>\
            <div class="form-group">\
            <div class="row">\
            <div class="col-md-6">\
            <button onclick="return remove_button($(this));" value="' + i + '" class="btn btn-danger">Remove</button>\
            </div>\
            </div>\
            </div>\
        </div>');
        var total_fields = parseInt($('input[name="total_num_of_fields"]').val());
        $('input[name="total_num_of_fields"]').val(total_fields + 1);
    }
</script>
<script>
    function remove_button($this) {
        var remove_id = $this.val();
        $(".remove_field" + remove_id + "").remove();
        var total_fields = parseInt($('input[name="total_num_of_fields"]').val());
        $('input[name="total_num_of_fields"]').val(total_fields - 1);
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
    CKEDITOR.replace('job_details');
    CKEDITOR.config.autoParagraph = false;
</script>

<script>
    function count_duration() {
        var total_fields = $('input[name="total_num_of_fields"]').val();
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
        $('#add_more_data').submit(function () {
            var dataString = $('#add_more_data').serialize();
            $.ajax({
                type: "POST",
                url: '<?php echo base_url() ?>hr/previous_job_history/create_previous_job_history',
                data: dataString,
                success: function (result) {
                    if (result) {
                        $('#add_msg').html(result);
                        $('#add_msg .alert').delay(5000).fadeOut(1000);
                        $('#add_more_data').trigger("reset");
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