<form action="" method="POST" id="add_job_frm" enctype="multipart/form-data">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Employee ID:</label> <span id="j1"></span><span id="err_msg"></span>
                <input id="emp_id" name="emp_id" onblur="check_duplicate()" type="text" class="form-control"
                       placeholder="Employee ID ....">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Department:</label> <span id="j2"></span>
                <select name="department_id" id="department_id" class="form-control">
                    <option value="">Select Department</option>
                    <?php foreach ($department as $v_data) { ?>
                        <option value="<?php echo $v_data->id; ?>"><?php echo $v_data->department_name; ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Shift:</label> <span id="j3"></span>
                <select onchange="select_section();" name="shift_id" id="shift_id" class="form-control">
                    <option value="">Select Shift</option>
                    <?php foreach ($shift as $v_data) { ?>
                        <option value="<?php echo $v_data->id; ?>"><?php echo $v_data->shift_name; ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Section:</label> <span id="j4"></span>
                <select name="section_id" id="section_id" class="form-control">
                    <option value="">Select Section</option>
                </select>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Designation:</label> <span id="j5"></span>
                <select name="designation_id" id="designation_id" class="form-control">
                    <option value="">Select Designation</option>
                    <?php foreach ($designation as $v_data) { ?>
                        <option value="<?php echo $v_data->id; ?>"><?php echo $v_data->designation_name; ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Joining Date:</label> <span id="j6"></span>
                <input id="joining_date" name="joining_date" type="text" class="form-control joining_date"
                       placeholder="Joining Date....">
            </div>
        </div>
    </div>
    <div class="form-group">
        <input type="submit" class="form-control btn btn-success" value="Add Job Info">
    </div>
    <div id="add_msg" class="text-center"></div>
</form>

<script>
    function select_section() {
        var shift_id = $('#shift_id').val();
        $.ajax({
            type: "POST",
            url: '<?php echo base_url() ?>hr/job/select_section/' + shift_id,
            success: function (result) {
                if (result) {
                    $('#section_id').html(result);
                    return false;
                } else {
                    return false;
                }
            }
        });
        return false;
    }
</script>

<script>
    function check_duplicate() {
        var emp_id = $('#emp_id').val();
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url()?>hr/job/check_duplicate_data/' + emp_id,
            success: function (result) {
                if (result) {
                    $('#emp_id').val('');
                    $('#err_msg').html(result);
                    //$('#err_msg').delay(3000).fadeOut(800);
                    return false;
                } else {
                    $('#err_msg').html('');
                    return false;
                }
            }
        });
        return false;
    }
</script>
<script>
    $('body').on('focus', ".joining_date", function () {
        $(this).datepicker({dateFormat: 'yy-mm-dd', changeYear: true, changeMonth: true, yearRange: "1970:2100"});
    });
</script>

<script>
    $(document).ready(function () {
        $('#add_job_frm').submit(function () {
            if (validation() == true) {
                var dataString = $('#add_job_frm').serialize();
                $.ajax({
                    type: "POST",
                    url: '<?php echo base_url() ?>hr/job/create_job',
                    data: dataString,
                    success: function (result) {
                        if (result) {
                            $('#add_msg').html(result);
                            $('#add_msg .alert').delay(5000).fadeOut(1000);
                            $('#add_job_frm').trigger("reset");
                            window.setTimeout(function () {
                                window.location.href = "<?php echo base_url()?>hr/job/all_job";
                            }, 1000);
                            return false;
                        } else {
                            return false;
                        }
                    }
                });
                return false;
            } else {
                return false;
            }
        });
        function validation() {
            var emp_id = $('#emp_id').val();
            var department_id = $('#department_id').val();
            var shift_id = $('#shift_id').val();
            var section_id = $('#section_id').val();
            var designation_id = $('#designation_id').val();
            var joining_date = $('#joining_date').val();

            if (emp_id.length == "" || department_id.length == "" || shift_id.length == "" || section_id.length == "" || designation_id.length == "" || joining_date.length == "") {
                if (emp_id.length == "") {
                    $('#j1').html("<code class='err_msg'>* This Required *</code>");
                    $("#emp_id").focus();
                }
                if (department_id.length == "") {
                    $('#j2').html("<code class='err_msg'>* This Required *</code>");
                    $("#department_id").focus();
                }
                if (shift_id.length == "") {
                    $('#j3').html("<code class='err_msg'>* This Required *</code>");
                    $('#shift_id').focus();
                }
                if (section_id.length == "") {
                    $('#j4').html("<code class='err_msg'>* This Required *</code>");
                    $('#section_id').focus();
                }
                if (designation_id.length == "") {
                    $('#j5').html("<code class='err_msg'>* This Required *</code>");
                    $('#designation_id').focus();
                }

                if (joining_date.length == "") {
                    $('#j6').html("<code class='err_msg'>* This Required *</code>");
                    $('#joining_date').focus();
                }
                return false;
            } else {
                return true
            }
        }
    });
</script>

