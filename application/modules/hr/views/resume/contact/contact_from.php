<form action="#" id="add_contact_frm" method="post">
    <div class="form-group">
        <div class="row">
            <div class="col-md-4">
                <label>Employee ID:</label> <span id="err_msg"></span>
                <input id="emp_id" value="<?php echo $emp_id ?>" readonly="readonly" name="emp_id" type="text"
                       class="form-control"
                       placeholder="Employee ID ....">
            </div>
            <div class="col-md-4">
                <label>Present Address:</label>
                <input id="present_address" name="present_address" type="text" class="form-control"
                       placeholder="Present Address ....">
            </div>
            <div class="col-md-4">
                <label>Present Post Office:</label>
                <input id="present_post_office" name="present_post_office" type="text" class="form-control"
                       placeholder="Present post office ....">
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="row">
            <div class="col-md-4">
                <label>Present post code:</label> <span id="err_msg"></span>
                <input id="present_post_code" required="required" name="present_post_code" type="text"
                       class="form-control"
                       placeholder="Present post code ....">
            </div>
            <div class="col-md-4">
                <label>Division:</label>
                <select onchange="select_district()" name="present_division_id" id="present_division_id"
                        class="form-control">
                    <option value="">Select Division</option>
                    <?php foreach ($division as $v_division) { ?>
                        <option
                            value="<?php echo $v_division->id; ?>"><?php echo $v_division->division_name; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="col-md-4">
                <label>District:</label>
                <select name="present_district_id" id="present_district_id" class="form-control">
                    <option value="">Select District</option>
                </select>
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="row">
            <div class="col-md-4">
                <label>Thana:</label>
                <select name="present_thana_id" id="present_thana_id" class="form-control">
                    <option value="">Select Thana</option>
                </select>
            </div>
            <div class="col-md-4">
                <label>Present Email:</label> <span id="err_msg"></span>
                <input id="present_email" name="present_email" type="text" class="form-control"
                       placeholder="Present email ....">
            </div>
            <div class="col-md-4">
                <label>Present Phone:</label> <span id="err_msg"></span>
                <input id="present_phone" name="present_phone" type="text" class="form-control"
                       placeholder="Present phone ....">
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="row">
            <div class="col-md-4">
                <label>Present Mobile:</label>
                <input id="present_mobile" name="present_mobile" type="text" class="form-control"
                       placeholder="Present Mobile ....">
            </div>
            <div class="col-md-4">
                <label>Is address same:</label>
                <br>
                <select required="required" name="is_address_same" id="is_address_same" class="form-control">
                    <option value="">Select One</option>
                    <option value="1">Yes</option>
                    <option value="2">No</option>
                </select>
            </div>
        </div>
    </div>

    <div id="permanent" style="display: none">
        <div class="form-group">
            <div class="row">
                <div class="col-md-4">
                    <label>Permanent Address:</label>
                    <input id="permanent_address" name="permanent_address" type="text" class="form-control"
                           placeholder="permanent Address ....">
                </div>
                <div class="col-md-4">
                    <label>Permanent Post Office:</label>
                    <input id="permanent_post_office" name="permanent_post_office" type="text" class="form-control"
                           placeholder="Present post office ....">
                </div>
                <div class="col-md-4">
                    <label>Permanent post code:</label>
                    <input id="permanent_post_code" name="permanent_post_code" type="text"
                           class="form-control"
                           placeholder="Present post code ....">
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                <div class="col-md-4">
                    <label>Division:</label>
                    <select onchange="select_district_permanent()" name="permanent_division_id"
                            id="permanent_division_id" class="form-control">
                        <option value="">Select Division</option>
                        <?php foreach ($permanent_division as $v_division_permanent) { ?>
                            <option
                                value="<?php echo $v_division_permanent->id; ?>"><?php echo $v_division_permanent->division_name; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-md-4">
                    <label>District:</label>
                    <select name="permanent_district_id" id="permanent_district_id" class="form-control">
                        <option value="">Select District</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label>Thana:</label>
                    <select name="permanent_thana_id" id="permanent_thana_id" class="form-control">
                        <option value="">Select Thana</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                <div class="col-md-4">
                    <label>Permanent Email:</label> <span id="err_msg"></span>
                    <input id="permanent_email" name="permanent_email" type="text" class="form-control"
                           placeholder="Permanent email ....">
                </div>
                <div class="col-md-4">
                    <label>Permanent Phone:</label> <span id="err_msg"></span>
                    <input id="permanent_phone" name="permanent_phone" type="text" class="form-control"
                           placeholder="Present phone ....">
                </div>
                <div class="col-md-4">
                    <label>Permanent Mobile:</label>
                    <input id="permanent_mobile" name="permanent_mobile" type="text" class="form-control"
                           placeholder="Permanent mobile ....">
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="form-group">
            <div class="col-md-12">
                <input type="submit" class="form-control btn btn-success" value="Add Contact Info">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="form-group">
            <div class="col-md-12">
                <div id="add_msg" class="text-center"></div>
            </div>
        </div>
    </div>
</form>

<script>
    $('#is_address_same').on('change', function () {
        var get_value = $('#is_address_same').val();
        if (get_value == 2) {
            $('#permanent').show();
        } else {
            $('#permanent').hide();
        }
    });
</script>

<script>
    function select_district() {
        var division_id = $('#present_division_id').val();
        $.ajax({
            type: "POST",
            url: '<?php echo base_url() ?>hr/my_resume/select_district/' + division_id,
            success: function (result) {
                if (result) {
                    $('#present_district_id').html(result);
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
    $('#present_district_id').on('change', function () {
        var division_id = $('#present_division_id').val();
        var district_id = $('#present_district_id').val();
        $.ajax({
            type: "POST",
            url: '<?php echo base_url() ?>hr/my_resume/select_thana/' + division_id + '/' + district_id,
            success: function (result) {
                if (result) {
                    $('#present_thana_id').html(result);
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
    function select_district_permanent() {
        var division_id = $('#permanent_division_id').val();
        $.ajax({
            type: "POST",
            url: '<?php echo base_url() ?>hr/my_resume/select_district/' + division_id,
            success: function (result) {
                if (result) {
                    $('#permanent_district_id').html(result);
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
    $('#permanent_district_id').on('change', function () {
        var division_id = $('#permanent_division_id').val();
        var district_id = $('#permanent_district_id').val();
        $.ajax({
            type: "POST",
            url: '<?php echo base_url() ?>hr/my_resume/select_thana/' + division_id + '/' + district_id,
            success: function (result) {
                if (result) {
                    $('#permanent_thana_id').html(result);
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
    $(document).ready(function () {
        $("#add_contact_frm").submit(function () {
            var dataString = $('#add_contact_frm').serialize();
            $.ajax({
                type: "POST",
                url: '<?php echo base_url() ?>hr/my_resume/create_contact',
                data: dataString,
                success: function (result) {
                    if (result) {
                        $('#add_msg').html(result);
                        $('#add_msg .alert').delay(5000).fadeOut(1000);
                        $('#add_contact_frm').trigger("reset");
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