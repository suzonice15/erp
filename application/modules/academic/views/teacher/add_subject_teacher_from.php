<form action="" id="add_subject_teacher">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Class</label>
                <input type="hidden" name="teacher_id" id="teacher_id" value="<?php echo $teacher_id; ?>">
                <select name="class_id" id="class_id" class="form-control">
                    <option value="">Select Class</option>
                    <?php foreach ($class as $v_data) { ?>
                        <option value="<?php echo $v_data->id; ?>"><?php echo $v_data->name; ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label>Subject</label>
                <select name="subject_id" id="subject_id" class="form-control">
                    <option value="">Select Subject</option>
                    <?php foreach ($subject as $v_subject) { ?>
                        <option value="<?php echo $v_subject->id; ?>"><?php echo $v_subject->name; ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Shift:</label> <span id="j3"></span>
                <select onchange="select_section();" name="shift_id" id="shift_id" class="form-control">
                    <option value="">Select Shift</option>
                    <?php foreach ($shift as $v_shift) { ?>
                        <option value="<?php echo $v_shift->id; ?>"><?php echo $v_shift->shift_name; ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Section:</label> <span id="j4"></span>
                <select name="section_id" id="section_id" class="form-control">
                    <option value="">Select Section</option>
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>From Date</label>
                <input type="text" required="required" onchange="check_duplicate();" placeholder="From date"
                       class="form-control from_date" name="from_date"
                       id="from_date">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>To date</label>
                <input type="text" placeholder="To Date" class="form-control to_date" name="to_date" id="to_date">
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-12">
                <p id="err_msg"></p>
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-12">
                <input type="submit" class="form-control btn btn-success" value="Add subject teacher">
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-12">
            <div id="add_msg" class="text-center"></div>
        </div>
    </div>
</form>

<script>
    function select_section() {
        var shift_id = $('#shift_id').val();
        $.ajax({
            type: "POST",
            url: '<?php echo base_url() ?>academic/teacher/select_section/' + shift_id,
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
    function check_duplicate() {
        var teacher_id = $('#teacher_id').val();
        var class_id = $('#class_id').val();
        var subject_id = $('#subject_id').val();
        var shift_id = $('#shift_id').val();
        var section_id = $('#section_id').val();
        var from_date = $('#from_date').val();
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url()?>academic/teacher/check_duplicate_data',
            data: {
                teacher_id: teacher_id,
                class_id: class_id,
                subject_id: subject_id,
                shift_id: shift_id,
                section_id: section_id,
                from_date: from_date
            },
            success: function (result) {
                if (result) {
                    $('#from_date').val('');
                    $('#err_msg').html(result);
                    //$('#err_msg').delay(3000).fadeOut(800);
                    return false;
                } else {
                    $('#err_msg').html('');
                    return false;
                }
            }
        });
        return false;
    }
</script>

<script>
    $(document).ready(function () {
        $('#add_subject_teacher').submit(function () {
            var dataString = $('#add_subject_teacher').serialize();
            $.ajax({
                type: "POST",
                url: '<?php echo base_url() ?>academic/teacher/create_subject_teacher',
                data: dataString,
                async: false,
                success: function (result) {
                    if (result) {
                        $('#add_msg').html(result);
                        $('#add_msg .alert').delay(5000).fadeOut(1000);
                        $('#add_student_info').trigger("reset");
                        window.setTimeout(function () {
                            window.location.href = "<?php echo base_url()?>academic/teacher/all_teacher";
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


<script>
    $('body').on('focus', ".from_date", function () {
        $(this).datepicker({dateFormat: 'yy-mm-dd', changeYear: true, changeMonth: true, yearRange: "1970:2100"});
    });
    $('body').on('focus', ".to_date", function () {
        $(this).datepicker({dateFormat: 'yy-mm-dd', changeYear: true, changeMonth: true, yearRange: "1970:2100"});
    });
</script>


