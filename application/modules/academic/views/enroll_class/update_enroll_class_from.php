<?php foreach ($enroll_class as $v_data) { ?>
    <form action="#" id="update_enroll_class_frm" method="post">
        <div class="form-group">
            <div class="row">
                <div class="col-md-6">
                    <label>Student ID</label>
                    <input type="hidden" name="id" value="<?php echo $v_data->id?>">
                    <input type="text" name="student_id" value="<?php echo $v_data->student_id; ?>" id="student_id"
                           class="form-control">
                </div>
                <div class="col-md-6">
                    <label>Class Roll</label>
                    <input type="text" name="class_roll" value="<?php echo $v_data->class_roll; ?>" id="class_roll"
                           class="form-control">
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-6">
                    <label>Class Name</label>
                    <select name="class_id" id="class_id" class="form-control">
                        <option value="">Select Class</option>
                        <?php foreach ($class as $v_class) { ?>
                            <?php if ($v_class->id == $v_data->class_id) { ?>
                                <option selected="selected"
                                        value="<?php echo $v_class->id; ?>"><?php echo $v_class->name; ?></option>
                            <?php } else { ?>
                                <option value="<?php echo $v_class->id; ?>"><?php echo $v_class->name; ?></option>
                            <?php } ?>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-md-6">
                    <label>Shift</label>
                    <select onchange="select_section();" name="shift_id" id="shift_id" class="form-control">
                        <option value="">Select Section</option>
                        <?php foreach ($shift as $v_shift) { ?>
                            <?php if ($v_shift->id == $v_data->shift_id) { ?>
                                <option selected="selected"
                                        value="<?php echo $v_shift->id; ?>"><?php echo $v_shift->shift_name; ?></option>
                            <?php } else { ?>
                                <option
                                    value="<?php echo $v_shift->id; ?>"><?php echo $v_shift->shift_name; ?></option>
                            <?php } ?>
                        <?php } ?>
                    </select>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Section</label>
                        <select name="section_id" id="section_id" class="form-control">
                            <option value="">Select Section</option>
                            <?php foreach ($section as $v_section) { ?>
                                <?php if ($v_section->id == $v_data->section_id) { ?>
                                    <option selected="selected"
                                            value="<?php echo $v_section->id; ?>"><?php echo $v_section->section_name; ?></option>
                                <?php } else { ?>
                                    <option value="<?php echo $v_section->id; ?>"><?php echo $v_section->section_name; ?></option>
                                <?php } ?>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <label>Year Name</label>
                    <select name="year" id="year" class="form-control">
                        <option value="">Select Year</option>
                        <?php foreach ($year as $v_year) { ?>
                            <?php if ($v_year->year_name == $v_data->year) { ?>
                                <option selected="selected"
                                        value="<?php echo $v_year->year_name; ?>"><?php echo $v_year->year_name; ?></option>
                            <?php } else { ?>
                                <option value="<?php echo $v_year->year_name; ?>"><?php echo $v_year->year_name; ?></option>
                            <?php } ?>
                        <?php } ?>
                    </select>
                </div>
            </div>
        </div>
        <div class="form-group">
            <input type="submit" class="form-control btn btn-success" value="Update Enroll Class">
        </div>
        <div id="add_msg" class="text-center"></div>
    </form>
<?php } ?>

<script>
    function select_section() {
        var shift_id = $('#shift_id').val();
        $.ajax({
            type: "POST",
            url: '<?php echo base_url() ?>academic/enroll_class/select_section/' + shift_id,
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
    $(document).ready(function () {
        $("#update_enroll_class_frm").submit(function () {
            var dataString = $('#update_enroll_class_frm').serialize();
            $.ajax({
                type: "POST",
                url: '<?php echo base_url() ?>academic/enroll_class/update_enroll_class',
                data: dataString,
                success: function (result) {
                    if (result) {
                        $('#add_msg').html(result);
                        $('#add_msg .alert').delay(5000).fadeOut(1000);
                        $('#update_enroll_class_frm').trigger("reset");
                        window.setTimeout(function () {
                            window.location.href = "<?php echo base_url()?>academic/enroll_class/all_enroll_class";
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


