<form action="" id="add_student_info" enctype="multipart/form-data">
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label>Student ID</label>
                <input type="text" readonly="readonly" placeholder="Student ID" class="form-control" name="student_id"
                       id="student_id">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>Student Name</label>
                <input type="text" placeholder="Student Name" class="form-control" name="student_name"
                       id="student_name">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>Picture</label>
                <input type="file" class="form-control" name="picture" id="picture">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>Class</label>
                <select name="class_id" id="class_id" class="form-control">
                    <option value="">Select Class</option>
                    <?php foreach ($class as $v_data) { ?>
                        <option value="<?php echo $v_data->id; ?>"><?php echo $v_data->name; ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <div class="col-md-4">
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
        <div class="col-md-4">
            <div class="form-group">
                <label>Section</label>
                <select onchange="select_student_id();" name="section_id" id="section_id" class="form-control">
                    <option value="">Select Section</option>
                </select>
            </div>
        </div>
        <div class="col-md-4">
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
        <div class="col-md-4">
            <div class="form-group">
                <label>Fourth Subject</label>
                <select name="fourth_subject_id" id="fourth_subject_id" class="form-control">
                    <option value="">Select fourth subject</option>
                    <?php foreach ($subject as $v_data) { ?>
                        <option value="<?php echo $v_data->id; ?>"><?php echo $v_data->name; ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>Gender</label>
                <select name="gender_id" id="gender_id" class="form-control">
                    <option value="">Select Gender</option>
                    <?php foreach ($gender as $v_data) { ?>
                        <option value="<?php echo $v_data->id; ?>"><?php echo $v_data->gender_name; ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>Religion</label>
                <select name="religion_id" id="religion_id" class="form-control">
                    <option value="">Select Religion</option>
                    <?php foreach ($religion as $v_data) { ?>
                        <option value="<?php echo $v_data->id; ?>"><?php echo $v_data->religion_name; ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>Nationality</label>
                <input type="text" placeholder="Nationality" class="form-control" name="nationality" id="nationality">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>Date of Birth</label>
                <input type="text" placeholder="Date of Birth" class="form-control date_of_birth" name="date_of_birth"
                       id="date_of_birth">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>Blood Group</label>
                <select name="blood_group_id" id="blood_group_id" class="form-control">
                    <option value="">Select blood group</option>
                    <?php foreach ($blood_group as $v_data) { ?>
                        <option value="<?php echo $v_data->id; ?>"><?php echo $v_data->blood_group_name; ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>Student Mobile NO</label>
                <input type="text" placeholder="Student Mobile NO" class="form-control" name="student_mobile_no"
                       id="student_mobile_no">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>Student Email</label>
                <input type="text" placeholder="Student Email" class="form-control" name="student_email"
                       id="student_email">
            </div>
        </div>


        <div class="col-md-4">
            <div class="form-group">
                <label>Father Name</label>
                <input type="text" placeholder="Father Name" name="father_name" id="father_name" class="form-control">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>Father Occupation</label>
                <input type="text" placeholder="Father Occupation" name="father_occupation" id="father_occupation"
                       class="form-control">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>Father NID</label>
                <input type="text" placeholder="Father NID" name="father_nid" id="father_nid" class="form-control">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>Father Mobile NO</label>
                <input type="text" placeholder="Father Mobile NO" name="father_mobile_no" id="father_mobile_no"
                       class="form-control">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>Father email</label>
                <input type="text" placeholder="Father Email" name="father_email" id="father_email"
                       class="form-control">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>Mother Name</label>
                <input type="text" placeholder="Mother Name" name="mother_name" id="mother_name" class="form-control">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>Mother Occupation</label>
                <input type="text" placeholder="Mother Occupation" name="mother_occupation" id="mother_occupation"
                       class="form-control">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>Mother NID</label>
                <input type="text" placeholder="Mother NID" name="mother_nid" id="mother_nid" class="form-control">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>Mother Mobile NO</label>
                <input type="text" placeholder="Mother Mobile NO" name="mother_mobile_no" id="mother_mobile_no"
                       class="form-control">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>Mother email</label>
                <input type="text" placeholder="Mother Email" name="mother_email" id="mother_email"
                       class="form-control">
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label>Previous School Name</label>
                <input type="text" placeholder="Previous School Name" name="previous_school_name"
                       id="previous_school_name" class="form-control">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>TC NO</label>
                <input type="text" placeholder="TC NO" name="tc" id="tc" class="form-control">
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label>Student Present Address</label>
                <textarea name="present_address" id="present_address" cols="55" rows="5"></textarea>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Student Permanent Address</label>
                <textarea name="permanent_address" id="permanent_address" cols="56" rows="5"></textarea>
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label>Guardian Type</label>
                <select name="guardian_type" id="guardian_type" class="form-control">
                    <option value="">Select Guardian</option>
                    <option value="1">Father</option>
                    <option value="2">Mother</option>
                    <option value="3">Other</option>
                </select>
            </div>
        </div>


        <div class="col-md-4">
            <div class="form-group">
                <label>Guardian Name</label>
                <input type="text" placeholder="Mother Name" name="guardian_name" id="guardian_name"
                       class="form-control">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>Guardian Occupation</label>
                <input type="text" placeholder="Guardian Occupation" name="guardian_occupation" id="guardian_occupation"
                       class="form-control">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>guardian NID</label>
                <input type="text" placeholder="Guardian NID" name="guardian_nid" id="guardian_nid"
                       class="form-control">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>Guardian Mobile NO</label>
                <input type="text" placeholder="Guardian Mobile NO" name="guardian_mobile_no" id="guardian_mobile_no"
                       class="form-control">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>Guardian Email</label>
                <input type="text" placeholder="Guardian Email" name="guardian_email" id="guardian_email"
                       class="form-control">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Guardian Address</label>
                <textarea name="guardian_address" id="guardian_address" cols="55" rows="5"></textarea>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Relation With Student</label>
                <textarea name="relation_with_student" id="relation_with_student" cols="56" rows="5"></textarea>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <input type="submit" class="form-control btn btn-success" value="Add student info">
            </div>
        </div>
    </div>
    <div id="add_msg" class="text-center"></div>
</form>
<script>
    $(document).ready(function () {
        $('#add_student_info').submit(function () {
            var dataString = new FormData($(this)[0]);
            $.ajax({
                type: "POST",
                url: '<?php echo base_url() ?>admission/student_info/create_student',
                data: dataString,
                async: false,
                success: function (result) {
                    if (result) {
                        $('#add_msg').html(result);
                        $('#add_msg .alert').delay(5000).fadeOut(1000);
                        $('#add_student_info').trigger("reset");
                        window.setTimeout(function () {
                            window.location.href = "<?php echo base_url()?>admission/student_info/all_student";
                        }, 2000);
                        return false;
                    } else {
                        return false;
                    }
                },
                cache: false,
                contentType: false,
                processData: false
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
            url: '<?php echo base_url() ?>admission/student_info/select_section/' + shift_id,
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
    function select_student_id() {
        var class_id = $('#class_id').val();
        var shift_id = $('#shift_id').val();
        var section_id = $('#section_id').val();
        $.ajax({
            type: "POST",
            url: '<?php echo base_url() ?>admission/student_info/select_student_id',
            data: {class_id: class_id, shift_id: shift_id, section_id: section_id},
            success: function (result) {
                if (result) {
                    $('#student_id').val(result);
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
    $('body').on('focus', ".date_of_birth", function () {
        $(this).datepicker({dateFormat: 'yy-mm-dd', changeYear: true, changeMonth: true, yearRange: "1970:2100"});
    });
</script>


