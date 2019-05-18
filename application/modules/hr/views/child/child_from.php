<form action="" id="add_more_data">
    <div class="add_more_field">
        <div>
            <div class="row">
                <div class="form-group">
                    <div class="col-md-6">
                        <label>Employee ID:</label> <span id="err_msg"></span>
                        <input id="emp_id" required="required" name="emp_id[]" type="text" class="form-control"
                               placeholder="Employee ID ....">
                    </div>
                    <div class="col-md-6">
                        <label>Child name:</label>
                        <input id="child_name" name="child_name[]" type="text" class="form-control"
                               placeholder="Child name ....">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group">
                    <div class="col-md-6">
                        <label>Gender:</label>
                        <select name="gender_id[]" id="gender_id" class="form-control">
                            <option value="">Select Gender</option>
                            <?php foreach ($gender as $v_data) { ?>
                                <option
                                    value="<?php echo $v_data->id; ?>"><?php echo $v_data->gender_name;?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label>Profession ID:</label>
                        <select name="profession_id[]" id="profession_id" class="form-control">
                            <option value="">Select Profession</option>
                            <?php foreach ($profession as $v_data) { ?>
                                <option
                                    value="<?php echo $v_data->id; ?>"><?php echo $v_data->profession_name; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group">
                    <div class="col-md-6">
                        <label>Class:</label>
                        <input id="class" name="class[]" type="text" class="form-control"
                               placeholder="Class ....">
                    </div>
                    <div class="col-md-6">
                        <label>Institute:</label>
                        <input id="institute" name="institute[]" type="text" class="form-control"
                               placeholder="Institute....">
                    </div>
                </div>
            </div>
            <br>
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
                <input type="submit" class="form-control btn btn-success" value="Add Child">
            </div>
        </div>
    </div>
    </br>
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
            <div class="col-md-6">\
            <label>Employee ID:</label> <span id="err_msg"></span>\
            <input id="emp_id" required="required" name="emp_id[]" type="text" class="form-control" placeholder="Employee ID ...."></div>\
            <div class="col-md-6">\
            <label>Child Name:</label>\
            <input id="child_name" name="child_name[]" type="text" class="form-control" placeholder="Child name ...."></div>\
            </div>\
            </div>\
            <div class="row">\
            <div class="form-group">\
            <div class="col-md-6">\
            <label>Gender:</label>\
            <select name="gender_id[]" id="gender_id" class="form-control">\
            <option value="">Select Gender</option>\
            <?php foreach ($gender as $v_data) { ?>\
            <option value="<?php echo $v_data->id; ?>"><?php echo $v_data->gender_name;?></option>\
            <?php } ?>\
            </select>\
            </div>\
            <div class="col-md-6">\
            <label>profession_id:</label>\
            <select name="profession_id[]" id="profession_id" class="form-control">\
            <option value="">Select Profession</option>\
            <?php foreach ($profession as $v_data) { ?>\
            <option value="<?php echo $v_data->id; ?>"><?php echo $v_data->profession_name; ?></option>\
            <?php } ?>\
            </select>\
            </div>\
            </div>\
            </div>\
            <div class="row">\
            <div class="form-group">\
            <div class="col-md-6">\
            <label>Class:</label>\
            <input id="class" name="class[]" type="text" class="form-control" placeholder="Class ....">\
            </div>\
            <div class="col-md-6">\
            <label>Institute:</label>\
            <input id="institute" name="institute[]" type="text" class="form-control" placeholder="Institute....">\
            </div>\
            </div>\
            </div>\
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
                url: '<?php echo base_url() ?>hr/child/create_child',
                data: dataString,
                success: function (result) {
                    if (result) {
                        $('#add_msg').html(result);
                        $('#add_msg .alert').delay(5000).fadeOut(1000);
                        $('#add_more_data').trigger("reset");
                        window.setTimeout(function () {
                            window.location.href = "<?php echo base_url()?>hr/child/all_child";
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