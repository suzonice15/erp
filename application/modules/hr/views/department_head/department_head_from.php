<form action="" id="add_department">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Employee ID:</label> <span></span>
                <input name="user_id" onblur="select_section()" id="user_id" required="required" placeholder="Employee ID" type="text"
                       class="form-control">
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label>Department:</label> <span></span>
                <select name="department_id" id="department_id" required="required" class="form-control">
                    <option value="">Select Department</option>
                </select>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label>Start Date:</label> <span></span>
                <input required="required" name="start_date" id="start_date"
                       placeholder="Start Date" type="text" class="form-control start_date">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>End Date:</label> <span></span>
                <input required="required" name="end_date" id="end_date"
                       placeholder="End Date" type="text" class="form-control end_date">
            </div>
        </div>
    </div>
    <div class="form-group">
        <input type="submit" class="form-control btn btn-success" value="Add Department">
    </div>
    <div id="add_msg" class="text-center"></div>
</form>

<script>
    $('body').on('focus', ".start_date", function () {
        $(this).datepicker({dateFormat: 'yy-mm-dd', changeYear: true, changeMonth: true, yearRange: "1970:2100"});
    });
    $('body').on('focus', ".end_date", function () {
        $(this).datepicker({dateFormat: 'yy-mm-dd', changeYear: true, changeMonth: true, yearRange: "1970:2100"});
    });
</script>

<script>
    function select_section() {
        var user_id = $('#user_id').val();
        $.ajax({
            type: "POST",
            url: '<?php echo base_url() ?>hr/department_head/select_department/' + user_id,
            success: function (result) {
                if (result) {
                    $('#department_id').html(result);
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
        $('#add_department').submit(function () {
            var dataString = $('#add_department').serialize();
            $.ajax({
                type: "POST",
                url: '<?php echo base_url() ?>hr/department_head/create_department_head',
                data: dataString,
                success: function (result) {
                    if (result) {
                        $('#add_msg').html(result);
                        $('#add_msg .alert').delay(5000).fadeOut(1000);
                        $('#add_department').trigger("reset");
                        window.setTimeout(function () {
                            window.location.href = "<?php echo base_url()?>hr/department_head/all_department_head";
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