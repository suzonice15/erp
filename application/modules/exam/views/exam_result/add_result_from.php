<div class="row">
    <div class="col-md-3">
        <div class="form-group">
            <label>Class</label>
            <select name="class_id" onchange="select_subject()" id="class_id" class="form-control">
                <option value="">Select Class</option>
                <?php foreach ($class as $v_data) { ?>
                    <option value="<?php echo $v_data->id; ?>"><?php echo $v_data->name; ?></option>
                <?php } ?>
            </select>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label>Subject</label>
            <select name="subject_id" id="subject_id" class="form-control">
                <option value="">Select subject</option>
            </select>
        </div>
    </div>

    <div class="col-md-3">
        <div class="form-group">
            <label>Shift</label>
            <select onchange="select_section();" name="shift_id" id="shift_id" class="form-control">
                <option value="">Select Section</option>
                <?php foreach ($shift as $v_data) { ?>
                    <option value="<?php echo $v_data->id; ?>"><?php echo $v_data->shift_name; ?></option>
                <?php } ?>
            </select>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label>Section</label>
            <select name="section_id" id="section_id" class="form-control">
                <option value="">Select Section</option>
            </select>
        </div>
    </div>

    <div class="col-md-3">
        <div class="form-group">
            <label>Exam Name</label>
            <select name="academic_exam_id" id="academic_exam_id" class="form-control">
                <option value="">Select Exam</option>
                <?php foreach ($exam_name as $v_data) { ?>
                    <option value="<?php echo $v_data->id; ?>"><?php echo $v_data->exam_name; ?></option>
                <?php } ?>
            </select>
        </div>
    </div>

    <div class="col-md-3">
        <div class="form-group">
            <label>Study Group</label>
            <select name="study_group_id" id="study_group_id" class="form-control">
                <option value="">Select Group</option>
                <?php foreach ($study_group as $v_data) { ?>
                    <option value="<?php echo $v_data->id; ?>"><?php echo $v_data->group_name; ?></option>
                <?php } ?>
            </select>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label>Year</label>
            <select name="year" onchange="select_student_id()" id="year" class="form-control">
                <option value="">Select Year</option>
                <?php foreach ($year as $v_data) { ?>
                    <option
                        value="<?php echo $v_data->year_name; ?>"><?php echo $v_data->year_name; ?></option>
                <?php } ?>
            </select>
        </div>
    </div>
</div>
<div id="view_data">
    
</div>

<script>
    function select_section() {
        var shift_id = $('#shift_id').val();
        $.ajax({
            type: "POST",
            url: '<?php echo base_url() ?>exam/result/select_section/' + shift_id,
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
    function select_subject() {
        var class_id = $('#class_id').val();
        $.ajax({
            type: "POST",
            url: '<?php echo base_url() ?>exam/result/select_subject/' + class_id,
            success: function (result) {
                if (result) {
                    $('#subject_id').html(result);
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
    function select_student_id() {
        var class_id = $('#class_id').val();
        var subject_id = $('#subject_id').val();
        var shift_id = $('#shift_id').val();
        var section_id = $('#section_id').val();
        var academic_exam_id = $('#academic_exam_id').val();
        var study_group_id = $('#study_group_id').val();
        var year = $('#year').val();

        $.ajax({
            type: "POST",
            url: '<?php echo base_url() ?>exam/result/select_student_id',
            data: {
                class_id: class_id,
                subject_id: subject_id,
                shift_id: shift_id,
                section_id: section_id,
                academic_exam_id: academic_exam_id,
                study_group_id: study_group_id,
                year: year
            },
            success: function (result) {
                if (result) {
                    $('#view_data').html(result);
                    return false;
                } else {
                    return false;
                }
            }
        });
        return false;
    }
</script>



