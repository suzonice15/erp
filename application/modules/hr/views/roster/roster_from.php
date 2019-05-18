<form action="" id="add_weekend_info">
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <select name="department_id" id="department_id" class="form-control">
                    <option value="">Select Department</option>
                    <?php foreach ($department as $v_data) { ?>
                        <option value="<?php echo $v_data->id; ?>"><?php echo $v_data->department_name; ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <select onchange="select_section();" name="shift_id" id="shift_id" class="form-control">
                    <option value="">Select Shift</option>
                    <?php foreach ($shift as $v_data) { ?>
                        <option value="<?php echo $v_data->id; ?>"><?php echo $v_data->shift_name; ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <select name="section_id" onchange="select_emp_info()" id="section_id" class="form-control">
                    <option value="">Select Section</option>
                </select>
            </div>
        </div>
    </div>
    <div id="load_emp_info">

    </div>
</form>

<script>
    function select_section() {
        var shift_id = $('#shift_id').val();
        $.ajax({
            type: "POST",
            url: '<?php echo base_url() ?>hr/roster/select_section/' + shift_id,
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
    function select_emp_info() {
        var department_id = $('#department_id').val();
        var shift_id = $('#shift_id').val();
        var section_id = $('#section_id').val();
        $.ajax({
            type: "POST",
            url: '<?php echo base_url() ?>hr/roster/select_emp_info',
            data: {department_id: department_id, shift_id: shift_id, section_id: section_id},
            success: function (result) {
                if (result) {
                    $('#load_emp_info').html(result);
                    return false;
                } else {
                    return false;
                }
            }
        });
        return false;
    }
</script>


