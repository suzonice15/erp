<?php foreach ($result as $v_result) { ?>
    <form action="" id="update_result_info">
        <div class="row">
            <input type="hidden" value="<?php echo $v_result->id ?>" name="id">
            <input type="hidden" readonly="readonly" placeholder="Student ID"
                   value="<?php echo $v_result->student_id; ?>"
                   class="form-control" name="student_id" id="student_id">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Class</label>
                    <select name="class_id" id="class_id" class="form-control">
                        <option value="">Select Class</option>
                        <?php foreach ($class as $v_data) { ?>
                            <?php if ($v_data->id == $v_result->class_id) { ?>
                                <option selected="selected"
                                        value="<?php echo $v_data->id; ?>"><?php echo $v_data->name; ?></option>
                            <?php } else { ?>
                                <option value="<?php echo $v_data->id; ?>"><?php echo $v_data->name; ?></option>
                            <?php } ?>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Subject</label>
                    <select name="subject_id" id="subject_id" class="form-control">
                        <option value="">Select subject</option>
                        <?php foreach ($subject as $v_data) { ?>
                            <?php if ($v_data->id == $v_result->subject_id) { ?>
                                <option selected="selected"
                                        value="<?php echo $v_data->id; ?>"><?php echo $v_data->name; ?></option>
                            <?php } else { ?>
                                <option value="<?php echo $v_data->id; ?>"><?php echo $v_data->name; ?></option>
                            <?php } ?>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Shift</label>
                    <select onchange="select_section();" name="shift_id" id="shift_id" class="form-control">
                        <option value="">Select Section</option>
                        <?php foreach ($shift as $v_data) { ?>
                            <?php if ($v_data->id == $v_result->shift_id) { ?>
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
                    <label>Section</label>
                    <?php
                    $shift_id = $v_result->shift_id;
                    $CI = &get_instance();
                    $section = $CI->Main_model->getValue("shift_id='$shift_id'", 'master_section', '*', "ID DESC");
                    ?>
                    <select name="section_id" id="section_id" class="form-control">
                        <option value="">Select Section</option>
                        <?php foreach ($section as $v_section) { ?>
                            <?php if ($v_section->id == $v_result->section_id) { ?>
                                <option selected="selected"
                                        value="<?php echo $v_section->id; ?>"><?php echo $v_section->section_name; ?></option>
                            <?php } else { ?>
                                <option
                                    value="<?php echo $v_section->id; ?>"><?php echo $v_section->section_name; ?></option>
                            <?php } ?>
                        <?php } ?>
                    </select>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label>Exam Name</label>
                    <select name="academic_exam_id" id="academic_exam_id" class="form-control">
                        <option value="">Select Exam</option>
                        <?php foreach ($exam_name as $v_data) { ?>
                            <?php if ($v_data->id == $v_result->academic_exam_id) { ?>
                                <option selected="selected"
                                        value="<?php echo $v_data->id; ?>"><?php echo $v_data->exam_name; ?></option>
                            <?php } else { ?>
                                <option value="<?php echo $v_data->id; ?>"><?php echo $v_data->exam_name; ?></option>
                            <?php } ?>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Study Group</label>
                    <select name="study_group_id" id="study_group_id" class="form-control">
                        <option value="">Select Group</option>
                        <?php foreach ($study_group as $v_data) { ?>
                            <?php if ($v_data->id == $v_result->study_group_id) { ?>
                                <option selected="selected"
                                        value="<?php echo $v_data->id; ?>"><?php echo $v_data->group_name; ?></option>
                            <?php } else { ?>
                                <option value="<?php echo $v_data->id; ?>"><?php echo $v_data->group_name; ?></option>
                            <?php } ?>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Year</label>
                    <select name="year" id="year" class="form-control">
                        <option value="">Select Year</option>
                        <?php foreach ($year as $v_data) { ?>
                            <?php if ($v_data->year_name == $v_result->year) { ?>
                                <option selected="selected"
                                        value="<?php echo $v_data->year_name; ?>"><?php echo $v_data->year_name; ?></option>
                            <?php } else { ?>
                                <option
                                    value="<?php echo $v_data->year_name; ?>"><?php echo $v_data->year_name; ?></option>
                            <?php } ?>
                        <?php } ?>
                    </select>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label>Subjective Marks</label>
                    <input type="text" placeholder="Subjective Marks" value="<?php echo $v_result->subjective_marks; ?>"
                           class="form-control" name="subjective_marks"
                           id="subjective_marks">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Objective Marks</label>
                    <input type="text" placeholder="Objective Marks" value="<?php echo $v_result->objective_marks; ?>"
                           class="form-control"
                           name="objective_marks"
                           id="objective_marks">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Practical Marks</label>
                    <input type="text" placeholder="Practical Marks" value="<?php echo $v_result->practical_marks; ?>"
                           name="practical_marks" id="practical_marks" class="form-control">
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <input type="submit" class="form-control btn btn-success" value="Update Result info">
                </div>
            </div>
        </div>
        <div id="add_msg" class="text-center"></div>
    </form>
<?php } ?>


<script>
    $(document).ready(function () {
        $('#update_result_info').submit(function () {
            var dataString = $('#update_result_info').serialize();
            $.ajax({
                type: "POST",
                url: '<?php echo base_url() ?>exam/result/update_result',
                data: dataString,
                success: function (result) {
                    if (result) {
                        $('#add_msg').html(result);
                        $('#add_msg .alert').delay(5000).fadeOut(1000);
                        $('#update_result_info').trigger("reset");
                        window.setTimeout(function () {
                            window.location.href = "<?php echo base_url()?>exam/result/all_result";
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


