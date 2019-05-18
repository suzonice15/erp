<?php foreach ($shift_schedule as $v_schedule) { ?>
    <form action="" id="update_shift_schedule">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <input type="hidden" name="id" value="<?php echo $v_schedule->id; ?>">
                    <input type="hidden" name="status" value="<?php echo $v_schedule->status; ?>">
                    <label>Shift:</label> <span></span>
                    <select name="shift_id" id="shift_id" required="required" class="form-control">
                        <option value="">Select Shift</option>
                        <?php foreach ($shift as $v_data) { ?>
                            <?php if ($v_data->id == $v_schedule->shift_id) { ?>
                                <option selected="selected"
                                        value="<?php echo $v_data->id; ?>"><?php echo $v_data->shift_name; ?></option>
                            <?php } else { ?>
                                <option value="<?php echo $v_data->id; ?>"><?php echo $v_data->shift_name; ?></option>
                            <?php } ?>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>In Time:</label> <span></span>
                    <input value="<?php echo $v_schedule->in_time; ?>" name="in_time" id="in_time" required="required"
                           placeholder="In Time 00:00" type="text"
                           class="form-control">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Out Time:</label> <span></span>
                    <input required="required" value="<?php echo $v_schedule->out_time; ?>" name="out_time" id="out_time"
                           placeholder="Out Time 00:00" type="text" class="form-control">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Late Time:</label> <span></span>
                    <input required="required" name="late_time" value="<?php echo $v_schedule->late_time; ?>" id="late_time"
                           placeholder="Late Time 00:00" type="text" class="form-control">
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label>Early Out:</label> <span></span>
                    <input required="required" name="early_out" value="<?php echo $v_schedule->early_out; ?>" id="early_out"
                           placeholder="Early Out 00:00" type="text" class="form-control">
                </div>
            </div>
        </div>
        <div class="form-group">
            <input type="submit" class="form-control btn btn-success" value="Update Shift Schedule">
        </div>
        <div id="add_msg" class="text-center"></div>
    </form>
<?php } ?>

<script>
    $(document).ready(function () {
        $('#update_shift_schedule').submit(function () {
            var dataString = $('#update_shift_schedule').serialize();
            $.ajax({
                type: "POST",
                url: '<?php echo base_url() ?>hr/shift_schedule/update_shift_schedule',
                data: dataString,
                success: function (result) {
                    if (result) {
                        $('#add_msg').html(result);
                        $('#add_msg .alert').delay(5000).fadeOut(1000);
                        $('#update_shift_schedule').trigger("reset");
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