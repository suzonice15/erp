<form action="#" id="update_more_data" method="post" enctype="multipart/form-data">
    <?php $i = 0;
    foreach ($nominee as $v_data) {
        $i++; ?>
        <div class="add_more_field">
            <div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-12">
                            <div style="background-color: #3C8DBC; padding: 7px; text-align: center; height: 35px;">
                                Nominee No.<?php echo $i; ?></div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label>Employee ID:</label>
                            <input type="hidden" name="id[]" value="<?php echo $v_data->id; ?>">
                            <input id="emp_id" required="required" value="<?php echo $v_data->emp_id; ?>"
                                   name="emp_id[]" type="text"
                                   class="form-control"
                                   placeholder="Employee ID ....">
                        </div>
                        <div class="col-md-6">
                            <label>Nominee Name:</label>
                            <input id="name" name="name[]" value="<?php echo $v_data->name; ?>" type="text"
                                   class="form-control"
                                   placeholder="Institute ....">
                        </div>

                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label>Father Name:</label>
                            <input id="father_name" name="father_name[]" value="<?php echo $v_data->father_name; ?>"
                                   type="text" class="form-control"
                                   placeholder="Father Name ....">
                        </div>
                        <div class="col-md-6">
                            <label>Mother Name:</label>
                            <input id="mother_name" required="required" value="<?php echo $v_data->mother_name; ?>"
                                   name="mother_name[]" type="text"
                                   class="form-control"
                                   placeholder="Mother Name ....">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label>Spouse Name:</label>
                            <input name="spouse_name[]" id="spouse_name" value="<?php echo $v_data->spouse_name; ?>"
                                   type="text" class="form-control joined_on"
                                   placeholder="Spouse Name ....">
                        </div>
                        <div class="col-md-6">
                            <label>Percent:</label>
                            <input name="percent[]" id="percent" type="text" value="<?php echo $v_data->percent; ?>"
                                   class="form-control joined_on"
                                   placeholder="Percent ....">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label>National ID:</label>
                            <input id="national_id" name="national_id[]" value="<?php echo $v_data->national_id; ?>"
                                   type="text" class="form-control"
                                   placeholder="National ID ....">
                        </div>
                        <div class="col-md-6">
                            <label>Passport Number:</label>
                            <input id="passport_number" name="passport_number[]"
                                   value="<?php echo $v_data->passport_number; ?>" type="text"
                                   class="form-control"
                                   placeholder="Passport Number ....">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <label style="padding: 0px 0px 0px 15px;">Present Address:</label>
                        <div class="col-md-12">
                            <textarea name="present_address[]" id="present_address" cols="120"
                                      rows="4"><?php echo $v_data->present_address; ?></textarea>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <label style="padding: 0px 0px 0px 15px;">Permanent Address:</label>
                        <div class="col-md-12">
                            <textarea name="permanent_address[]" id="permanent_address" cols="120"
                                      rows="4"><?php echo $v_data->permanent_address; ?></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
    <div class="form-group">
        <div class="row">
            <div class="col-md-12">
                <input type="submit" class="form-control btn btn-success" value="Update Nominee">
            </div>
        </div>
    </div>

    <input type="hidden" name="total_num_of_fields" value="<?php echo $i; ?>">
    <div id="add_msg" class="text-center"></div>
</form>

<script>
    $(document).ready(function () {
        $('#update_more_data').submit(function () {
            var dataString = $('#update_more_data').serialize();
            $.ajax({
                type: "POST",
                url: '<?php echo base_url() ?>hr/nominee/update_nominee',
                data: dataString,
                async: false,
                success: function (result) {
                    if (result) {
                        $('#add_msg').html(result);
                        $('#add_msg .alert').delay(5000).fadeOut(1000);
                        $('#update_more_data').trigger("reset");
                        window.setTimeout(function () {
                            window.location.href = "<?php echo base_url()?>hr/nominee/all_nominee";
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