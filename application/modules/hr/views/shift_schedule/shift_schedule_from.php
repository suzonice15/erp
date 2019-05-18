<form action="" id="add_shift_schedule">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Shift:</label> <span></span>
                <select name="shift_id" id="shift_id" required="required" class="form-control">
                    <option value="">Select Shift</option>
                    <?php foreach ($shift as $v_data) { ?>
                        <option value="<?php echo $v_data->id; ?>"><?php echo $v_data->shift_name; ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>In Time:</label> <span></span>
                <input name="in_time" id="in_time" required="required" placeholder="In Time 00:00" type="text"
                       class="form-control">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Out Time:</label> <span></span>
                <input required="required" name="out_time" id="out_time"
                       placeholder="Out Time 00:00" type="text" class="form-control">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Late Time:</label> <span></span>
                <input required="required" name="late_time" id="late_time"
                       placeholder="Late Time 00:00" type="text" class="form-control">
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label>Early Out:</label> <span></span>
                <input required="required" name="early_out" id="early_out"
                       placeholder="Early Out 00:00" type="text" class="form-control">
            </div>
        </div>
    </div>
    <div class="form-group">
        <input type="submit" class="form-control btn btn-success" value="Add Shift Schedule">
    </div>
    <div id="add_msg" class="text-center"></div>
</form>


<script>
    $(document).ready(function () {
        $('#add_shift_schedule').submit(function () {
            var dataString = $('#add_shift_schedule').serialize();
            $.ajax({
                type: "POST",
                url: '<?php echo base_url() ?>hr/shift_schedule/create_shift_schedule',
                data: dataString,
                success: function (result) {
                    if (result) {
                        $('#add_msg').html(result);
                        $('#add_msg .alert').delay(5000).fadeOut(1000);
                        $('#add_shift_schedule').trigger("reset");
                        window.setTimeout(function () {
                            window.location.href = "<?php echo base_url()?>hr/shift_schedule/all_shift_schedule";
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


