<form action="" id="add_more_data">
    <div class="add_more_field">
        <div>
            <div class="row">
                <div class="form-group">
                    <div class="col-md-6">
                        <label>Employee ID:</label> <span id="err_msg"></span>
                        <input id="emp_id" readonly="readonly" value="<?php echo $emp_id;?>" name="emp_id" type="text"
                               class="form-control"
                               placeholder="Employee ID ....">
                    </div>
                    <div class="col-md-6">
                        <label>Spouse Name:</label>
                        <input id="spouse_name" name="spouse_name[]" type="text" class="form-control"
                               placeholder="Spouse name ....">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group">
                    <div class="col-md-6">
                        <label>Profession:</label>
                        <select name="profession_id[]" id="profession_id" class="form-control">
                            <option value="">Select Profession</option>
                            <?php foreach ($profession as $v_data) { ?>
                                <option
                                    value="<?php echo $v_data->id; ?>"><?php echo $v_data->profession_name; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label>Organization:</label>
                        <input id="organization" name="organization[]" type="text" class="form-control"
                               placeholder="Organization ....">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group">
                    <div class="col-md-6">
                        <label>Designation:</label>
                        <select name="designation_id[]" id="designation_id" class="form-control">
                            <option value="">Select Designation</option>
                            <?php foreach ($designation as $v_data) { ?>
                                <option
                                    value="<?php echo $v_data->id; ?>"><?php echo $v_data->designation_name; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label>Contact No:</label>
                        <input id="contact_no" name="contact_no[]" type="text" class="form-control"
                               placeholder="Contact No....">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group">
                    <div class="col-md-6">
                        <label>Total family members:</label>
                        <input id="total_family_members" required="required" name="total_family_members[]" type="text"
                               class="form-control"
                               placeholder="Total family members ....">
                    </div>
                    <div class="col-md-6">
                        <label>No of other dependents:</label>
                        <input id="no_of_other_dependents" required="required" name="no_of_other_dependents[]"
                               type="text"
                               class="form-control"
                               placeholder="No of Other Dependents	....">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group">
                    <div class="col-md-6">
                        </br>
                        <button type="button" onclick="return add_more();" class="btn btn-success">Add More</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </br>
    <div class="row">
        <div class="form-group">
            <div class="col-md-12">
                <input type="submit" class="form-control btn btn-success" value="Add Family">
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
           <div class="row">\
            <div class="form-group">\
            <div class="col-md-12">\
            <label>Spouse Name:</label>\
            <input id="spouse_name" name="spouse_name[]" type="text" class="form-control" placeholder="Spouse name ....">\
            </div>\
            </div>\
            </div>\
            \
            <div class="row">\
            <div class="form-group">\
            <div class="col-md-6">\
            <label>Profession:</label>\
            <select name="profession_id[]" id="profession_id" class="form-control">\
            <option value="">Select Profession</option>\
            <?php foreach ($profession as $v_data) { ?><option value="<?php echo $v_data->id; ?>"><?php echo $v_data->profession_name; ?></option><?php } ?></select>\
            </div>\
            <div class="col-md-6">\
            <label>Organization:</label>\
            <input id="organization" name="organization[]" type="text" class="form-control" placeholder="Organization ....">\
            </div>\
            </div>\
            </div>\
            \
            <div class="row">\
            <div class="form-group">\
            <div class="col-md-6">\
            <label>Designation:</label>\
            <select name="designation_id[]" id="designation_id" class="form-control">\
            <option value="">Select Designation</option>\
            <?php foreach ($designation as $v_data) { ?><option value="<?php echo $v_data->id; ?>"><?php echo $v_data->designation_name; ?></option><?php } ?></select>\
            </div>\
            <div class="col-md-6">\
            <label>Contact No:</label>\
            <input id="contact_no" name="contact_no[]" type="text" class="form-control" placeholder="Contact No....">\
            </div>\
            </div>\
            </div>\
            \
             <div class="row">\
            <div class="form-group">\
            <div class="col-md-6">\
            <label>Total family members:</label>\
            <input id="total_family_members" required="required" name="total_family_members[]" type="text" class="form-control" placeholder="Total family members ....">\
            </div>\
            <div class="col-md-6">\
            <label>No of other dependents:</label>\
            <input id="no_of_other_dependents" required="required" name="no_of_other_dependents[]" type="text" class="form-control" placeholder="No of Other Dependents	....">\
            </div>\
            </div>\
            </div>\
            \
            <div class="row">\
            <div class="form-group">\
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
    $(document).ready(function () {
        $("#add_more_data").submit(function () {
            var dataString = $('#add_more_data').serialize();
            $.ajax({
                type: "POST",
                url: '<?php echo base_url() ?>hr/my_resume/create_family',
                data: dataString,
                success: function (result) {
                    if (result) {
                        $('#add_msg').html(result);
                        $('#add_msg .alert').delay(5000).fadeOut(1000);
                        $('#add_more_data').trigger("reset");
                        window.setTimeout(function () {
                            window.location.href = "<?php echo base_url()?>hr/my_resume/all_my_resume";
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