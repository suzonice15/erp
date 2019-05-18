<div>
    <?php
    echo form_open("admission/admission_report/create_excel"); ?>
    <input type="hidden" name="class_id" value="<?php echo $class_id; ?>"/>
    <input type="hidden" name="study_group_id" value="<?php echo $study_group_id; ?>"/>
    <input type="hidden" name="shift_id" value="<?php echo $shift_id; ?>"/>
    <input type="hidden" name="section_id" value="<?php echo $section_id; ?>"/>
    <input type="hidden" name="year" value="<?php echo $year; ?>"/>
    <input type="hidden" name="gender_id" value="<?php echo $gender_id; ?>"/>
    <input type="hidden" name="religion_id" value="<?php echo $religion_id; ?>"/>
    <input type="hidden" name="blood_group_id" value="<?php echo $blood_group_id; ?>"/>
    <input type="submit" class="btn btn-success" value="Export Excel"/>
    <?php echo form_close(); ?>
    <br>
</div>
<table class="table table-striped table-responsive table-bordered table-hover">
    <tr>
        <th>SL NO</th>
        <th>Student ID</th>
        <th>Student Name</th>
        <th>Class</th>
        <th>Study Group</th>
        <th>Shift</th>
        <th>Section</th>
        <th>Gender</th>
        <th>Religion</th>
        <th>Blood Group</th>
    </tr>
    <?php
    $i = 0;
    foreach ($admission_report as $v_data) {
        $i++; ?>
        <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo $v_data->student_id;?></td>
            <td><?php echo $v_data->student_name;?></td>
            <td><?php echo $v_data->class_name;?></td>
            <td><?php echo $v_data->group_name;?></td>
            <td><?php echo $v_data->shift_name;?></td>
            <td><?php echo $v_data->section_name;?></td>
            <td><?php echo $v_data->gender_name;?></td>
            <td><?php echo $v_data->religion_name;?></td>
            <td><?php echo $v_data->blood_group_name;?></td>
        </tr>
    <?php } ?>
</table>

