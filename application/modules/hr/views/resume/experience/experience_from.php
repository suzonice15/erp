<form action="#" id="add_experience1" method="post">
    <div class="add_more_field">
        <div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-4">
                        <label>Employee ID:</label>
                        <input id="emp_id" readonly="readonly" name="emp_id" value="<?php echo $emp_id; ?>" type="text"
                               class="form-control">
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
                        <textarea name="job_details[]" cols="120" rows="5" id="job_details"></textarea>
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
                <input type="submit" class="form-control btn btn-success" value="Add Experience">
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
            <label>Institute:</label>\
            <input id="institute" name="institute[]" type="text" class="form-control" placeholder="Institute ....">\
            </div>\
            <div class="col-md-6">\
            <label>Business:</label>\
            <input id="business" name="business[]" type="text" class="form-control" placeholder="Business ....">\
            </div>\
            </div>\
            </div>\
            <div class="form-group">\
            <div class="row">\
            <div class="col-md-4">\
            <label>Department:</label>\
            <input id="department" required="required" name="department[]" type="text" class="form-control" placeholder="Department ....">\
            </div>\
            <div class="col-md-4">\
            <label>Joined On:</label>\
            <input name="joined_on[]" id="joined_on' + i + '" type="text" class="form-control joined_on" placeholder="Joined on ....">\
            </div>\
            <div class="col-md-4">\
            <label>Release On:</label>\
            <input onchange="count_duration()" id="release_on' + i + '" name="release_on[]" type="text" class="form-control release_on" placeholder="Release on ....">\
            </div>\
            </div>\
            </div>\
            <div class="form-group">\
            <div class="row">\
            <div class="col-md-4">\
            <label>Duration:</label>\
            <input id="duration' + i + '" required="required" name="duration[]" type="text" class="form-control" placeholder="Duration ....">\
            </div>\
            <div class="col-md-4">\
            <label>Area of concentration:</label>\
            <input id="area_of_concentration" name="area_of_concentration[]" type="text"class="form-control" placeholder="Area of concentration ....">\
            </div>\
            <div class="col-md-4">\
            <label>Position Hold:</label>\
            <input id="position_hold" name="position_hold[]" type="text" class="form-control" placeholder="Position hold ....">\
            </div>\
            </div>\
            </div>\
            <div class="form-group">\
            <div class="row">\
            <label style="padding: 0px 0px 0px 15px;">Job Details:</label>\
            <div class="col-md-12">\
            <textarea name="job_details[]" cols="120" rows="5" id="job_details"></textarea>\
            </div>\
            </div>\
            </div>\
            <div class="form-group">\
            <div class="row">\
            <div class="col-md-6">\
            </br>\
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
    $('body').on('focus', ".joined_on", function () {
        $(this).datepicker({dateFormat: 'yy-mm-dd', changeYear: true, changeMonth: true, yearRange: "1970:2100"});
    });
    $('body').on('focus', ".release_on", function () {
        $(this).datepicker({dateFormat: 'yy-mm-dd', changeYear: true, changeMonth: true, yearRange: "1970:2100"});
    });
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
        $("#add_experience1").submit(function () {
            var dataString = $('#add_experience1').serialize();
            $.ajax({
                type: "POST",
                url: '<?php echo base_url() ?>hr/my_resume/create_experience',
                data: dataString,
                success: function (result) {
                    if (result) {
                        $('#add_msg').html(result);
                        $('#add_msg .alert').delay(5000).fadeOut(1000);
                        $('#add_experience1').trigger("reset");
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