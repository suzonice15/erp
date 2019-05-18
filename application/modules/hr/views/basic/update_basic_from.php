<style>
    /* The container */
    .container {
        display: block;
        position: relative;
        padding-left: 35px;
        margin-bottom: 12px;
        cursor: pointer;
        font-size: 14px;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }

    /* Hide the browser's default radio button */
    .container input {
        position: absolute;
        opacity: 0;
    }

    /* Create a custom radio button */
    .checkmark {
        position: absolute;
        top: 0;
        left: 0;
        height: 25px;
        width: 25px;
        background-color: #eee;
        border-radius: 50%;
    }

    /* On mouse-over, add a grey background color */
    .container:hover input ~ .checkmark {
        background-color: #ccc;
    }

    /* When the radio button is checked, add a blue background */
    .container input:checked ~ .checkmark {
        background-color: #2196F3;
    }

    /* Create the indicator (the dot/circle - hidden when not checked) */
    .checkmark:after {
        content: "";
        position: absolute;
        display: none;
    }

    /* Show the indicator (dot/circle) when checked */
    .container input:checked ~ .checkmark:after {
        display: block;
    }

    /* Style the indicator (dot/circle) */
    .container .checkmark:after {
        top: 9px;
        left: 9px;
        width: 8px;
        height: 8px;
        border-radius: 50%;
        background: white;
    }
</style>
<?php foreach ($basic as $v_basic_info) { ?>
    <form action="" method="POST" id="update_basic_from" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <input type="hidden" name="id" value="<?php echo $v_basic_info->id; ?>">
                    <input type="hidden" name="status" value="<?php echo $v_basic_info->status; ?>">
                    <label>Employee ID:</label> <span id="b1"></span><span id="err_msg"></span>
                    <input id="emp_id" name="emp_id" readonly="readonly" value="<?php echo $v_basic_info->emp_id; ?>"
                           type="text" class="form-control">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Employee Name:</label> <span id="b2"></span>
                    <input id="emp_name" value="<?php echo $v_basic_info->emp_name; ?>" name="emp_name" type="text"
                           class="form-control"
                           placeholder="Employee Name....">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Mobile No1:</label> <span id="b3"></span>
                    <input id="mobile_no1" value="<?php echo $v_basic_info->mobile_no1; ?>" name="mobile_no1"
                           type="text" class="form-control"
                           placeholder="Mobile No1....">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>NID:</label> <span id="b4"></span>
                    <input id="emp_nid" value="<?php echo $v_basic_info->emp_nid; ?>" name="emp_nid"
                           type="text" class="form-control"
                           placeholder="NID">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Email Address:</label> <span id="b5"></span>
                    <input id="email_address" value="<?php echo $v_basic_info->email_address; ?>" name="email_address"
                           type="text" class="form-control"
                           placeholder="Email Address....">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Date of birth:</label> <span id="b6"></span>
                    <input id="date_of_birth" value="<?php echo $v_basic_info->date_of_birth; ?>" name="date_of_birth"
                           type="text"
                           class="form-control date_of_birth"
                           placeholder="Date of birth....">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Select Gender:</label> <span id="b7"></span>
                    <select name="gender_id" id="gender_id" class="form-control">
                        <option value="">Select Gender</option>
                        <?php foreach ($gender as $v_data) { ?>
                            <?php if ($v_data->id == $v_basic_info->gender_id) { ?>
                                <option selected="selected"
                                        value="<?php echo $v_data->id ?>"><?php echo $v_data->gender_name; ?></option>
                            <?php } else { ?>
                                <option value="<?php echo $v_data->id ?>"><?php echo $v_data->gender_name; ?></option>
                            <?php } ?>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Division:</label> <span id="b8"></span>
                    <select name="division_id" id="division_id" onchange="select_district();" class="form-control">
                        <option value="">Select Gender</option>
                        <?php foreach ($division as $v_data) { ?>
                            <?php if ($v_data->id == $v_basic_info->division_id) { ?>
                                <option selected="selected"
                                        value="<?php echo $v_data->id ?>"><?php echo $v_data->division_name; ?></option>
                            <?php } else { ?>
                                <option value="<?php echo $v_data->id ?>"><?php echo $v_data->division_name; ?></option>
                            <?php } ?>
                        <?php } ?>
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>District:</label> <span id="b9"></span>
                    <select name="district_id" id="district_id" class="form-control">
                        <option value="">Select District</option>
                        <?php
                        $district = $this->Main_model->getValue("division_id ='$v_basic_info->division_id'", 'master_district', '*', "ID DESC");
                        foreach ($district as $v_data) { ?>
                            <?php if ($v_data->id == $v_basic_info->district_id) { ?>
                                <option selected="selected"
                                        value="<?php echo $v_data->id ?>"><?php echo $v_data->district_name; ?></option>
                            <?php } else { ?>
                                <option value="<?php echo $v_data->id ?>"><?php echo $v_data->district_name; ?></option>
                            <?php } ?>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Thana:</label> <span id="b10"></span>
                    <select name="thana_id" id="thana_id" class="form-control">
                        <option value="">Select Thana</option>
                        <?php
                        $thana = $this->Main_model->getValue("district_id ='$v_basic_info->district_id'", 'master_thana', '*', "ID DESC");
                        foreach ($thana as $v_data) { ?>
                            <?php if ($v_data->id == $v_basic_info->thana_id) { ?>
                                <option selected="selected"
                                        value="<?php echo $v_data->id ?>"><?php echo $v_data->thana_name; ?></option>
                            <?php } else { ?>
                                <option value="<?php echo $v_data->id ?>"><?php echo $v_data->thana_name; ?></option>
                            <?php } ?>
                        <?php } ?>
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Father Name:</label> <span id="b11"></span>
                    <input id="father_name" value="<?php echo $v_basic_info->father_name; ?>" name="father_name"
                           type="text" class="form-control"
                           placeholder="Father name....">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Mother Name:</label> <span id="b12"></span>
                    <input id="mother_name" value="<?php echo $v_basic_info->mother_name; ?>" name="mother_name"
                           type="text" class="form-control"
                           placeholder="Mother name....">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Passport Number:</label> <span id="b13"></span>
                    <input id="passport_number" value="<?php echo $v_basic_info->passport_number; ?>"
                           name="passport_number" type="text" class="form-control"
                           placeholder="Passport Number....">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Passport number exp date:</label> <span id="b14"></span>
                    <input id="passport_number_exp_date" value="<?php echo $v_basic_info->passport_number_exp_date; ?>"
                           name="passport_number_exp_date" type="text"
                           class="form-control passport_number_exp_date"
                           placeholder="Passport number exp date....">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Birth Certificate:</label> <span id="b15"></span>
                    <input id="birth_certificate" value="<?php echo $v_basic_info->birth_certificate; ?>"
                           name="birth_certificate" type="text" class="form-control"
                           placeholder="Birth Certificate....">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Present address:</label> <span id="b16"></span>
                    <input id="present_address" value="<?php echo $v_basic_info->present_address; ?>"
                           name="present_address" type="text" class="form-control"
                           placeholder="Present Address....">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Permanent Address:</label> <span id="b17"></span>
                    <input id="permanent_address" value="<?php echo $v_basic_info->permanent_address; ?>"
                           name="permanent_address" type="text" class="form-control"
                           placeholder="Permanent Address....">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <div class="col-md-8">
                        <label>Profile Picture:</label> <span id="b18"></span>
                        <input type="hidden" name="old_picture" value="<?php echo $v_basic_info->profile_picture; ?>">
                        <input id="profile_picture" name="profile_picture"
                               type="file" class="form-control">
                    </div>
                    <div class="col-md-4">
                        <?php if ($v_basic_info->profile_picture) { ?>
                            <img style="margin: 10px;"
                                 src="<?php echo base_url() ?>public/emp_profile/<?php echo $v_basic_info->profile_picture; ?>"
                                 height="50" width="50">
                        <?php } else { ?>
                            <img
                                src="<?php echo base_url() ?>public/emp_profile/demo_picture.jpg" height="50"
                                width="50">
                        <?php } ?>
                    </div>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Blood Group:</label> <span id="b18"></span>
                    <select name="blood_group_id" id="blood_group_id" class="form-control">
                        <option value="">Blood Group</option>
                        <?php foreach ($blood_group as $v_data) { ?>
                            <?php if ($v_data->id == $v_basic_info->blood_group_id) { ?>
                                <option selected="selected"
                                        value="<?php echo $v_data->id ?>"><?php echo $v_data->blood_group_name; ?></option>
                            <?php } else { ?>
                                <option
                                    value="<?php echo $v_data->id ?>"><?php echo $v_data->blood_group_name; ?></option>
                            <?php } ?>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Religion:</label> <span id="b20"></span>
                    <select name="religion_id" id="religion_id" class="form-control">
                        <option value="">Select Religion</option>
                        <?php foreach ($religion as $v_data) { ?>
                            <?php if ($v_data->id == $v_basic_info->religion_id) { ?>
                                <option selected="selected" value="<?php echo $v_data->id ?>"><?php echo $v_data->religion_name; ?></option>
                            <?php } else { ?>
                                <option value="<?php echo $v_data->id ?>"><?php echo $v_data->religion_name; ?></option>
                            <?php } ?>
                        <?php } ?>
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <div class="col-md-8">
                        <label>Signature:</label> <span id="b18"></span>
                        <input type="hidden" name="signature" value="<?php echo $v_basic_info->signature ?>">
                        <input id="signature"
                               name="signature"
                               type="file" class="form-control">
                    </div>
                    <div class="col-md-4">
                        <?php if ($v_basic_info->signature) { ?>
                            <img style="margin: 10px;"
                                 src="<?php echo base_url() ?>public/emp_profile/<?php echo $v_basic_info->signature; ?>"
                                 height="50" width="50">
                        <?php } else { ?>
                            <img
                                src="<?php echo base_url() ?>public/emp_profile/demo_signature.png" height="50"
                                width="50">
                        <?php } ?>
                    </div>

                </div>
            </div>

            <div class="col-md-6">
                <label>Freedom fighter family:</label> <span id="b22"></span>
                <br>
                <div class="form-group">
                    <?php if ($v_basic_info->freedom_fighter_family == 1) { ?>
                        <div class="col-md-2">
                            <label class="container">Yes
                                <input type="radio" value="1" checked="checked" name="freedom_fighter_family">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="col-md-2">
                            <label class="container">No
                                <input type="radio" value="0" name="freedom_fighter_family">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                    <?php } else { ?>
                        <div class="col-md-2">
                            <label class="container">Yes
                                <input type="radio" value="1" name="freedom_fighter_family">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="col-md-2">
                            <label class="container">No
                                <input type="radio" checked="checked" value="0" name="freedom_fighter_family">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <?php if ($v_basic_info->freedom_fighter_family == 1) { ?>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Freedom Fighter ID:</label>
                        <input id="freedom_fighter_id" value="<?php echo $v_basic_info->freedom_fighter_id; ?>"
                               name="freedom_fighter_id" type="text" class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Freedom fighter relation:</label>
                        <select name="freedom_fighter_relation_id" id="freedom_fighter_relation_id"
                                class="form-control">
                            <option value="">Freedom fighter relation</option>
                            <?php foreach ($freedom_fighter_relation as $v_data) { ?>
                                <?php if ($v_data->id == $v_basic_info->freedom_fighter_relation_id) { ?>
                                    <option selected="selected"
                                            value="<?php echo $v_data->id; ?>"><?php echo $v_data->relation_name; ?></option>
                                <?php } else { ?>
                                    <option
                                        value="<?php echo $v_data->id; ?>"><?php echo $v_data->relation_name; ?></option>
                                <?php } ?>
                            <?php } ?>
                        </select>
                    </div>
                </div>
            </div>
        <?php } else { ?>
            <div id="hide_content" style="display: none">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Freedom Fighter ID:</label>
                            <input id="freedom_fighter_id" value="<?php echo $v_basic_info->freedom_fighter_id; ?>"
                                   name="freedom_fighter_id" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Freedom fighter relation:</label>
                            <select name="freedom_fighter_relation_id" id="freedom_fighter_relation_id"
                                    class="form-control">
                                <option value="">Freedom fighter relation</option>
                                <?php foreach ($freedom_fighter_relation as $v_data) { ?>
                                    <option
                                        value="<?php echo $v_data->id ?>"><?php echo $v_data->relation_name; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
        <div class="form-group">
            <input type="submit" class="form-control btn btn-success" value="Update basic info">
        </div>
        <div id="add_msg" class="text-center"></div>
    </form>
<?php } ?>
<script>
    function select_district() {
        var division_id = $('#division_id').val();
        $.ajax({
            type: "POST",
            url: '<?php echo base_url() ?>hr/basic/select_district/' + division_id,
            success: function (result) {
                if (result) {
                    $('#district_id').html(result);
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
    $('#district_id').on('change', function () {
        var division_id = $('#division_id').val();
        var district_id = $('#district_id').val();
        $.ajax({
            type: "POST",
            url: '<?php echo base_url() ?>hr/basic/select_thana/' + division_id + '/' + district_id,
            success: function (result) {
                if (result) {
                    $('#thana_id').html(result);
                    return false;
                } else {
                    return false;
                }
            }
        });
        return false;
    });
</script>
<script>
    $('input[type=radio][name=freedom_fighter_family]').on('change', function () {
        var get_value = $('input[name=freedom_fighter_family]:checked').val();
        if (get_value == 1) {
            $('#hide_content').show();
        } else {
            $('#hide_content').hide();
        }
    });
</script>
<script>
    $('body').on('focus', ".date_of_birth", function () {
        $(this).datepicker({dateFormat: 'yy-mm-dd', changeYear: true, changeMonth: true, yearRange: "1970:2100"});
    });
    $('body').on('focus', ".passport_number_exp_date", function () {
        $(this).datepicker({dateFormat: 'yy-mm-dd', changeYear: true, changeMonth: true, yearRange: "1970:2100"});
    });
</script>

<script>
    $(document).ready(function () {
        $('#update_basic_from').submit(function () {
            if (validation() == true) {
                var dataString = new FormData($(this)[0]);
                $.ajax({
                    type: "POST",
                    url: '<?php echo base_url() ?>hr/basic/update_basic',
                    data: dataString,
                    async: false,
                    success: function (result) {
                        if (result) {
                            $('#add_msg').html(result);
                            $('#add_msg .alert').delay(5000).fadeOut(1000);
                            $('#update_basic_from').trigger("reset");
                            window.setTimeout(function () {
                                window.location.href = "<?php echo base_url()?>hr/basic/all_basic";
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
            } else {
                return false;
            }
        });

        function validation() {
            var emp_id = $('#emp_id').val();
            var emp_name = $('#emp_name').val();
            var mobile_no1 = $('#mobile_no1').val();
            var date_of_birth = $('#date_of_birth').val();
            var gender_id = $('#gender_id').val();
            var division_id = $('#division_id').val();
            var district_id = $('#district_id').val();
            var thana_id = $('#thana_id').val();
            var father_name = $('#father_name').val();
            var mother_name = $('#mother_name').val();
            var present_address = $('#present_address').val();
            var permanent_address = $('#permanent_address').val();
            var religion_id = $('#religion_id').val();

            if (emp_id.length == "" || emp_name.length == "" || mobile_no1.length == "" || date_of_birth.length == "" || gender_id.length == "" || division_id.length == "" || district_id.length == "" || thana_id.length == "" || father_name.length == "" || mother_name.length == "" || present_address.length == "" || permanent_address.length == "" || religion_id.length == "") {
                if (emp_id.length == "") {
                    $('#b1').html("<code class='err_msg'>* This field is mandatory *</code>");
                    $("#emp_id").focus();
                }
                if (emp_name.length == "") {
                    $('#b2').html("<code class='err_msg'>* This field is mandatory *</code>");
                    $("#emp_name").focus();
                }
                if (mobile_no1.length == "") {
                    $('#b3').html("<code class='err_msg'>* This Message is mandatory *</code>");
                    $('#mobile_no1').focus();
                }
                if (date_of_birth.length == "") {
                    $('#b6').html("<code class='err_msg'>* This Message is mandatory *</code>");
                    $('#date_of_birth').focus();
                }
                if (gender_id.length == "") {
                    $('#b7').html("<code class='err_msg'>* This Message is mandatory *</code>");
                    $('#gender_id').focus();
                }

                if (division_id.length == "") {
                    $('#b8').html("<code class='err_msg'>* This Message is mandatory *</code>");
                    $('#division_id').focus();
                }
                if (district_id.length == "") {
                    $('#b9').html("<code class='err_msg'>* This Message is mandatory *</code>");
                    $('#district_id').focus();
                }
                if (thana_id.length == "") {
                    $('#b10').html("<code class='err_msg'>* This Message is mandatory *</code>");
                    $('#thana_id').focus();
                }
                if (father_name.length == "") {
                    $('#b11').html("<code class='err_msg'>* This Message is mandatory *</code>");
                    $('#father_name').focus();
                }
                if (mother_name.length == "") {
                    $('#b12').html("<code class='err_msg'>* This Message is mandatory *</code>");
                    $('#mother_name').focus();
                }
                if (present_address.length == "") {
                    $('#b16').html("<code class='err_msg'>* This Message is mandatory *</code>");
                    $('#menu_sort').focus();
                }
                if (permanent_address.length == "") {
                    $('#b17').html("<code class='err_msg'>* This Message is mandatory *</code>");
                    $('#permanent_address').focus();
                }
                if (religion_id.length == "") {
                    $('#b19').html("<code class='err_msg'>* This Message is mandatory *</code>");
                    $('#religion_id').focus();
                }
                return false;
            } else {
                return true
            }
        }
    });
</script>



