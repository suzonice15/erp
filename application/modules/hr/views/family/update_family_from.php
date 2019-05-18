<?php foreach ($family as $v_family) { ?>
    <form action="" id="update_family">
        <div class="row">
            <div class="form-group">
                <div class="col-md-6">
                    <label>Employee ID:</label> <span id="err_msg"></span>
                    <input type="hidden" name="id" value="<?php echo $v_family->id; ?>">
                    <input id="emp_id" readonly="readonly" value="<?php echo $v_family->emp_id; ?>" name="emp_id"
                           type="text"
                           class="form-control"
                           placeholder="Employee ID ....">
                </div>
                <div class="col-md-6">
                    <label>Spouse Name:</label>
                    <input id="spouse_name" value="<?php echo $v_family->spouse_name; ?>" name="spouse_name"
                           type="text" class="form-control"
                           placeholder="Spouse name ....">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="form-group">
                <div class="col-md-6">
                    <label>Profession:</label>
                    <select name="profession_id" id="profession_id" class="form-control">
                        <option value="">Select Profession</option>
                        <?php foreach ($profession as $v_data) { ?>
                            <?php if ($v_data->id == $v_family->profession_id) { ?>
                                <option selected="selected"
                                        value="<?php echo $v_data->id; ?>"><?php echo $v_data->profession_name; ?></option>
                            <?php } else { ?>
                                <option
                                    value="<?php echo $v_data->id; ?>"><?php echo $v_data->profession_name; ?></option>
                            <?php } ?>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-md-6">
                    <label>Organization:</label>
                    <input id="organization" value="<?php echo $v_family->organization; ?>" name="organization"
                           type="text" class="form-control"
                           placeholder="Organization ....">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="form-group">
                <div class="col-md-6">
                    <label>Designation:</label>
                    <select name="designation_id" id="designation_id" class="form-control">
                        <option value="">Select Designation</option>
                        <?php foreach ($designation as $v_data) { ?>
                            <?php if ($v_data->id == $v_family->designation_id) { ?>
                                <option selected="selected"
                                        value="<?php echo $v_data->id; ?>"><?php echo $v_data->designation_name; ?></option>
                            <?php } ?>
                            <option
                                value="<?php echo $v_data->id; ?>"><?php echo $v_data->designation_name; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-md-6">
                    <label>Contact No:</label>
                    <input id="contact_no" value="<?php echo $v_family->contact_no; ?>" name="contact_no" type="text"
                           class="form-control"
                           placeholder="Contact No....">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="form-group">
                <div class="col-md-6">
                    <label>Total family members:</label>
                    <input id="total_family_members" value="<?php echo $v_family->total_family_members; ?>"
                           required="required" name="total_family_members" type="text"
                           class="form-control"
                           placeholder="Total family members ....">
                </div>
                <div class="col-md-6">
                    <label>No of other dependents:</label>
                    <input id="no_of_other_dependents" value="<?php echo $v_family->no_of_other_dependents; ?>"
                           required="required" name="no_of_other_dependents" type="text"
                           class="form-control"
                           placeholder="No of Other Dependents	....">
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="form-group">
                <div class="col-md-12">
                    <input type="submit" class="form-control btn btn-success" value="Update Family">
                </div>
            </div>
        </div>
        <br>
        <div id="add_msg" class="text-center"></div>
    </form>
<?php } ?>
<script>
    $(document).ready(function () {
        $("#update_family").submit(function () {
            var dataString = $('#update_family').serialize();
            $.ajax({
                type: "POST",
                url: '<?php echo base_url() ?>hr/family/update_family',
                data: dataString,
                success: function (result) {
                    if (result) {
                        $('#add_msg').html(result);
                        $('#add_msg .alert').delay(5000).fadeOut(1000);
                        $('#update_family').trigger("reset");
                        window.setTimeout(function () {
                            window.location.href = "<?php echo base_url()?>hr/family/all_family";
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