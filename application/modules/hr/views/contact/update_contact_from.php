<?php foreach ($contact as $v_contact) { ?>
    <form action="" id="update_contact">
        <div class="form-group">
            <div class="row">
                <div class="col-md-4">
                    <input type="hidden" name="id" value="<?php echo $v_contact->id; ?>">
                    <label>Employee ID:</label> <span id="err_msg"></span>
                    <input id="emp_id" value="<?php echo $v_contact->emp_id ?>" required="required" name="emp_id"
                           type="text" class="form-control"
                           placeholder="Employee ID ....">
                </div>
                <div class="col-md-4">
                    <label>Present Address:</label>
                    <input id="present_address" value="<?php echo $v_contact->present_address; ?>" required="required"
                           name="present_address" type="text" class="form-control"
                           placeholder="Present Address ....">
                </div>
                <div class="col-md-4">
                    <label>Present Post Office:</label>
                    <input id="present_post_office" value="<?php echo $v_contact->present_post_office; ?>"
                           required="required" name="present_post_office" type="text" class="form-control"
                           placeholder="Present post office ....">
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                <div class="col-md-4">
                    <label>Present post code:</label> <span id="err_msg"></span>
                    <input id="present_post_code" value="<?php echo $v_contact->present_post_code; ?>"
                           required="required" name="present_post_code" type="text"
                           class="form-control"
                           placeholder="Present post code ....">
                </div>
                <div class="col-md-4">
                    <label>Division:</label>
                    <select required="required" onchange="select_district()" name="present_division_id"
                            id="present_division_id"
                            class="form-control">
                        <option value="">Select Division</option>
                        <?php foreach ($division as $v_division) { ?>
                            <?php if ($v_division->id == $v_contact->present_division_id) { ?>
                                <option selected="selected"
                                        value="<?php echo $v_division->id; ?>"><?php echo $v_division->division_name; ?></option>
                            <?php } else { ?>
                                <option
                                    value="<?php echo $v_division->id; ?>"><?php echo $v_division->division_name; ?></option>
                            <?php } ?>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-md-4">
                    <label>District:</label>
                    <?php
                    $CI = &get_instance();
                    $present = $CI->Main_model->getValue("division_id= '$v_contact->present_division_id'", 'master_district', '*', "ID DESC");
                    ?>
                    <select required="required" name="present_district_id" id="present_district_id"
                            class="form-control">
                        <option value="">Select District</option>
                        <?php foreach ($present as $v_p_district) { ?>
                            <?php if ($v_p_district->id == $v_contact->present_district_id) { ?>
                                <option selected="selected"
                                        value="<?php echo $v_p_district->id; ?>"><?php echo $v_p_district->district_name; ?></option>
                            <?php } else { ?>
                                <option
                                    value="<?php echo $v_p_district->id; ?>"><?php echo $v_p_district->district_name; ?></option>
                            <?php } ?>
                        <?php } ?>
                    </select>
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                <div class="col-md-4">
                    <label>Thana:</label>
                    <?php
                    $CI = &get_instance();
                    $present_thana = $CI->Main_model->getValue("district_id= '$v_contact->permanent_district_id'", 'master_thana', '*', "ID DESC");
                    ?>
                    <select required="required" name="present_thana_id" id="present_thana_id"
                            class="form-control">
                        <option value="">Select Thana</option>
                        <?php foreach ($present_thana as $v_present_thana) { ?>
                            <?php if ($v_present_thana->id == $v_contact->present_thana_id) { ?>
                                <option selected="selected"
                                        value="<?php echo $v_present_thana->id; ?>"><?php echo $v_present_thana->thana_name; ?></option>
                            <?php } else { ?>
                                <option
                                    value="<?php echo $v_present_thana->id; ?>"><?php echo $v_present_thana->thana_name; ?></option>
                            <?php } ?>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-md-4">
                    <label>Present Email:</label> <span id="err_msg"></span>
                    <input required="required" value="<?php echo $v_contact->present_email; ?>" id="present_email"
                           name="present_email" type="text" class="form-control"
                           placeholder="Present email ....">
                </div>
                <div class="col-md-4">
                    <label>Present Phone:</label> <span id="err_msg"></span>
                    <input required="required" value="<?php echo $v_contact->present_phone; ?>" id="present_phone"
                           name="present_phone" type="text" class="form-control"
                           placeholder="Present phone ....">
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                <div class="col-md-4">
                    <label>Present Mobile:</label>
                    <input required="required" value="<?php echo $v_contact->present_mobile; ?>" id="present_mobile"
                           name="present_mobile" type="text" class="form-control"
                           placeholder="Present Mobile ....">
                </div>
                <div class="col-md-4">
                    <label>Is address same:</label>
                    <input type="hidden" id="condition" value="<?php echo $v_contact->is_address_same ?>">
                    <select required="required" value="<?php echo $v_contact->is_address_same; ?>"
                            name="is_address_same" id="is_address_same" class="form-control">
                        <option value="">Select One</option>
                        <?php if ($v_contact->is_address_same == 1) { ?>
                            <option selected="selected" value="1">Yes</option>
                            <option value="2">No</option>
                        <?php } else { ?>
                            <option value="1">Yes</option>
                            <option selected="selected" value="2">No</option>
                        <?php } ?>
                    </select>
                </div>
            </div>
        </div>

        <div id="permanent" style="display: none">
            <div class="form-group">
                <div class="row">
                    <div class="col-md-4">
                        <label>Permanent Address:</label>
                        <input id="permanent_address" value="<?php echo $v_contact->permanent_address; ?>"
                               name="permanent_address" type="text" class="form-control"
                               placeholder="permanent Address ....">
                    </div>
                    <div class="col-md-4">
                        <label>Permanent Post Office:</label>
                        <input id="permanent_post_office" value="<?php echo $v_contact->permanent_post_office; ?>"
                               name="permanent_post_office" type="text" class="form-control"
                               placeholder="Present post office ....">
                    </div>
                    <div class="col-md-4">
                        <label>Permanent post code:</label>
                        <input id="permanent_post_code" value="<?php echo $v_contact->permanent_post_code; ?>"
                               name="permanent_post_code" type="text"
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
                                <?php if ($v_division_permanent->id == $v_contact->permanent_division_id) { ?>
                                    <option selected="selected"
                                            value="<?php echo $v_division_permanent->id; ?>"><?php echo $v_division_permanent->division_name; ?></option>
                                <?php } else { ?>
                                    <option
                                        value="<?php echo $v_division_permanent->id; ?>"><?php echo $v_division_permanent->division_name; ?></option>
                                <?php } ?>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label>District:</label>
                        <?php
                        $CI = &get_instance();
                        $present = $CI->Main_model->getValue("division_id= '$v_contact->permanent_division_id'", 'master_district', '*', "ID DESC");
                        ?>
                        <select required="required" name="permanent_district_id" id="permanent_district_id"
                                class="form-control">
                            <option value="">Select District</option>
                            <?php foreach ($present as $v_p_district) { ?>
                                <?php if ($v_p_district->id == $v_contact->permanent_district_id) { ?>
                                    <option selected="selected"
                                            value="<?php echo $v_p_district->id; ?>"><?php echo $v_p_district->district_name; ?></option>
                                <?php } else { ?>
                                    <option
                                        value="<?php echo $v_p_district->id; ?>"><?php echo $v_p_district->district_name; ?></option>
                                <?php } ?>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label>Thana:</label>
                        <?php
                        $CI = &get_instance();
                        $permanent_thana = $CI->Main_model->getValue("district_id= '$v_contact->permanent_district_id'", 'master_thana', '*', "ID DESC");
                        ?>
                        <select required="required" name="permanent_thana_id" id="permanent_thana_id"
                                class="form-control">
                            <option value="">Select Thana</option>
                            <?php foreach ($permanent_thana as $v_permanent_thana) { ?>
                                <?php if ($v_permanent_thana->id == $v_contact->permanent_thana_id) { ?>
                                    <option selected="selected"
                                            value="<?php echo $v_permanent_thana->id; ?>"><?php echo $v_permanent_thana->thana_name; ?></option>
                                <?php } else { ?>
                                    <option
                                        value="<?php echo $v_permanent_thana->id; ?>"><?php echo $v_permanent_thana->thana_name; ?></option>
                                <?php } ?>
                            <?php } ?>
                        </select>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-md-4">
                        <label>Permanent Email:</label> <span id="err_msg"></span>
                        <input id="permanent_email" value="<?php echo $v_contact->permanent_email; ?>"
                               name="permanent_email" type="text" class="form-control"
                               placeholder="Permanent email ....">
                    </div>
                    <div class="col-md-4">
                        <label>Permanent Phone:</label> <span id="err_msg"></span>
                        <input id="permanent_phone" value="<?php echo $v_contact->permanent_phone; ?>"
                               name="permanent_phone" type="text" class="form-control"
                               placeholder="Present phone ....">
                    </div>
                    <div class="col-md-4">
                        <label>Permanent Mobile:</label>
                        <input id="permanent_mobile" value="<?php echo $v_contact->permanent_mobile; ?>"
                               name="permanent_mobile" type="text" class="form-control"
                               placeholder="Permanent mobile ....">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="form-group">
                <div class="col-md-12">
                    <input type="submit" class="form-control btn btn-success" value="Update Contact Info">
                </div>
            </div>
        </div>
        <div id="add_msg" class="text-center"></div>
    </form>
<?php } ?>
<script>
    $('document').ready(function () {
        var get_value = $('#condition').val();
        if (get_value == 2) {
            $('#permanent').show();
        } else {
            $('#permanent').hide();
        }
    });
</script>
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
            url: '<?php echo base_url() ?>hr/contact/select_district/' + division_id,
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
            url: '<?php echo base_url() ?>hr/contact/select_thana/' + division_id + '/' + district_id,
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
            url: '<?php echo base_url() ?>hr/contact/select_district/' + division_id,
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
            url: '<?php echo base_url() ?>hr/contact/select_thana/' + division_id + '/' + district_id,
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
        $("#update_contact").submit(function () {
            var dataString = $('#update_contact').serialize();
            $.ajax({
                type: "POST",
                url: '<?php echo base_url() ?>hr/contact/update_contact',
                data: dataString,
                success: function (result) {
                    if (result) {
                        $('#add_msg').html(result);
                        $('#add_msg .alert').delay(5000).fadeOut(1000);
                        $('#update_contact').trigger("reset");
                        window.setTimeout(function () {
                            window.location.href = "<?php echo base_url()?>hr/contact/all_contact";
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