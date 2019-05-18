<form action="" method="post" id="add_bonus_frm" enctype="multipart/form-data">
    <div class="add_more_field">
        <div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Employee ID:</label>
                        <input required="required" type="text" id="emp_id" name="emp_id[]" class="form-control">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Department:</label>
                        <select required="required" name="department_id[]" class="form-control">
                            <option value="">Select Department</option>
                            <?php foreach ($department as $v_data) { ?>
                                <option
                                    value="<?php echo $v_data->id; ?>"><?php echo $v_data->department_name; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Shift:</label>
                        <select required="required" onchange="select_section();" id="shift_id1" name="shift_id[]"
                                class="form-control">
                            <option value="">Select Shift</option>
                            <?php foreach ($shift as $v_data) { ?>
                                <option value="<?php echo $v_data->id; ?>"><?php echo $v_data->shift_name; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Section:</label>
                        <select required="required" id="section_id1" name="section_id[]" class="form-control">
                            <option value="">Select Section</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <label>Year:</label>
                    <select name="year[]" class="form-control" required="required">
                        <option value="">Select Year</option>
                        <option value="2017">2017</option>
                        <option value="2018">2018</option>
                        <option value="2019">2019</option>
                        <option value="2020">2020</option>
                        <option value="2021">2021</option>
                        <option value="2022">2022</option>
                        <option value="2023">2023</option>
                        <option value="2024">2024</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label>Month:</label>
                    <select name="month[]" class="form-control" required="required">
                        <option value="">Select Year</option>
                        <option value="01">January</option>
                        <option value="02">February</option>
                        <option value="03">March</option>
                        <option value="04">April</option>
                        <option value="05">May</option>
                        <option value="06">June</option>
                        <option value="07">July</option>
                        <option value="08">August</option>
                        <option value="09">September</option>
                        <option value="10">October</option>
                        <option value="11">November</option>
                        <option value="12">December</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Amount:</label>
                        <input type="text" name="amount[]" required="required" class="form-control">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Type:</label>
                        <select required="required" name="type[]" onchange="select_type()" id="type1"
                                class="form-control">
                            <option value="">Select</option>
                            <option value="1">Additional</option>
                            <option value="2">Deduction</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-4" style="display: none;" id="additional1">
                    <div class="form-group">
                        <label>Additional:</label>
                        <select name="additional[]" class="form-control">
                            <option value="">Select</option>
                            <option value="1">Arrears</option>
                            <option value="2">Other</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-4" style="display: none;" id="deduction1">
                    <div class="form-group">
                        <label>Deduction:</label>
                        <select name="deduction[]" class="form-control">
                            <option value="">Select</option>
                            <option value="1">Advance</option>
                            <option value="2">Overdrawn</option>
                            <option value="3">Other's</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Remarks:</label>
                        <textarea name="remarks[]" id="remarks" cols="120" rows="5"></textarea>
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
    <br>
    <div class="form-group">
        <input type="submit" class="form-control btn btn-success" value="Add Bonus">
    </div>
    <input type="hidden" id="count" name="total_num_of_fields" value="1">
    <div id="add_msg" class="text-center"></div>
</form>

<script>
    var i = 1;
    function add_more() {
        i++;
        $('.add_more_field').append('<div class="remove_field' + i + '">\
            <div class="row">\
            <div class="col-md-4">\
            <div class="form-group">\
            <label>Employee ID:</label>\
            <input required="required" type="text" id="emp_id" name="emp_id[]" class="form-control">\
            </div>\
            </div>\
            <div class="col-md-4">\
            <div class="form-group">\
            <label>Department:</label>\
            <select required="required" name="department_id[]" class="form-control">\
            <option value="">Select Department</option>\
            <?php foreach ($department as $v_data) { ?>\
            <option value="<?php echo $v_data->id; ?>"><?php echo $v_data->department_name; ?></option>\
            <?php } ?>\
            </select>\
            </div>\
            </div>\
            <div class="col-md-4">\
            <div class="form-group">\
            <label>Shift:</label>\
            <select required="required" onchange="select_section();" id="shift_id' + i + '" name="shift_id[]" class="form-control">\
            <option value="">Select Shift</option>\
            <?php foreach ($shift as $v_data) { ?>\
            <option value="<?php echo $v_data->id; ?>"><?php echo $v_data->shift_name; ?></option>\
            <?php } ?>\
            </select>\
            </div>\
            </div>\
            </div>\
            <div class="row">\
            <div class="col-md-4">\
            <div class="form-group">\
            <label>Section:</label>\
            <select required="required" id="section_id' + i + '" name="section_id[]" class="form-control">\
            <option value="">Select Section</option>\
            </select>\
            </div>\
            </div>\
            <div class="col-md-4">\
            <label>Year:</label>\
            <select name="year[]" class="form-control" required="required">\
            <option value="">Select Year</option>\
            <option value="2017">2017</option>\
            <option value="2018">2018</option>\
            <option value="2019">2019</option>\
            <option value="2020">2020</option>\
            <option value="2021">2021</option>\
            <option value="2022">2022</option>\
            <option value="2023">2023</option>\
            <option value="2024">2024</option>\
            </select>\
            </div>\
            <div class="col-md-4">\
            <label>Month:</label>\
            <select name="month[]" class="form-control" required="required">\
            <option value="">Select Year</option>\
            <option value="01">January</option>\
            <option value="02">February</option>\
            <option value="03">March</option>\
            <option value="04">April</option>\
            <option value="05">May</option>\
            <option value="06">June</option>\
            <option value="07">July</option>\
            <option value="08">August</option>\
            <option value="09">September</option>\
            <option value="10">October</option>\
            <option value="11">November</option>\
            <option value="12">December</option>\
            </select>\
            </div>\
            </div>\
            <div class="row">\
            <div class="col-md-4">\
            <div class="form-group">\
            <label>Amount:</label>\
            <input type="text" name="amount[]" required="required" class="form-control">\
            </div>\
            </div>\
            <div class="col-md-4">\
            <div class="form-group">\
            <label>Type:</label>\
            <select required="required" name="type[]" onchange="select_type()" id="type' + i + '" class="form-control">\
            <option value="">Select</option>\
            <option value="1">Additional</option>\
            <option value="2">Deduction</option>\
            </select>\
            </div>\
            </div>\
            <div class="col-md-4" style="display: none;" id="additional' + i + '">\
            <div class="form-group">\
            <label>Additional:</label>\
            <select name="additional[]" class="form-control">\
            <option value="">Select</option>\
            <option value="1">Arrears</option>\
            <option value="2">Other</option>\
            </select>\
            </div>\
            </div>\
            <div class="col-md-4" style="display: none;" id="deduction' + i + '">\
            <div class="form-group">\
            <label>Deduction:</label>\
            <select name="deduction[]" class="form-control">\
            <option value="">Select</option>\
            <option value="1">Advance</option>\
            <option value="2">Overdrawn</option>\
            <option value="3">Other</option>\
            </select>\
            </div>\
            </div>\
            </div>\
            <div class="row">\
            <div class="col-md-12">\
            <div class="form-group">\
            <label>Remarks:</label>\
            <textarea name="remarks[]" id="remarks" cols="120" rows="5"></textarea>\
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
    function select_type() {
        var id = $('#count').val();
        var type = $('#type' + id).val();

        if (type == 1) {
            $('#additional' + id).show();
            $('#deduction' + id).hide();
        } else if (type == 2) {
            $('#additional' + id).hide();
            $('#deduction' + id).show();
        } else {
            $('#additional' + id).hide();
            $('#deduction' + id).hide();
        }
    }
</script>
<script>
    function select_section() {
        var id = $('#count').val();
        var shift_id = $('#shift_id' + id).val();
        $.ajax({
            type: "POST",
            url: '<?php echo base_url() ?>hr/additional_and_deduction/select_section/' + shift_id,
            success: function (result) {
                if (result) {
                    $('#section_id' + id).html(result);
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
    $(document).ready(function () {
        $('#add_bonus_frm').submit(function () {
            var dataString = $('#add_bonus_frm').serialize();
            $.ajax({
                type: "POST",
                url: '<?php echo base_url() ?>hr/additional_and_deduction/create_additional_and_deduction',
                data: dataString,
                success: function (result) {
                    if (result) {
                        $('#add_msg').html(result);
                        $('#add_msg .alert').delay(5000).fadeOut(1000);
                        $('#add_bonus_frm').trigger("reset");
                        window.setTimeout(function () {
                            window.location.href = "<?php echo base_url()?>hr/additional_and_deduction/all_additional_and_deduction";
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

