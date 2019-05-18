<?php
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=exceldata.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>

<table class="table table-striped table-responsive table-bordered table-hover">
    <tr>
        <td>SL NO</td>
        <td>Student ID</td>
        <td>Student Name</td>
        <td>Class Name</td>
        <td>Group Name</td>
        <td>Shift Name</td>
        <td>Section Name</td>
        <td>Gender Name</td>
        <td>Religion Name</td>
        <td>Blood Group Name</td>
        <td>Nationality</td>
        <td>Date of Birth</td>
        <td>Present Address</td>
        <td>Permanent Address</td>
        <td>Student Mobile NO</td>
        <td>Student Email</td>
        <td>Father Name</td>
        <td>Father Occupation</td>
        <td>Father NID</td>
        <td>Father Mobile NO</td>
        <td>Father Email</td>
        <td>Mother Name</td>
        <td>Mother Occupation</td>
        <td>Mother NID</td>
        <td>Mother Mobile NO</td>
        <td>Mother Email</td>
        <td>Guardian Type</td>
        <td>Previous School Name</td>
        <td>Tc</td>
        <td>Guardian Name</td>
        <td>Guardian NID</td>
        <td>Guardian Email</td>
        <td>Guardian Mobile_no</td>
        <td>Guardian Address</td>
        <td>Guardian Occupation</td>
        <td>Relation With Student</td>
        <td>Status</td>
        <td>Admission Date</td>
        <td>Admission By</td>
    </tr>
    <?php
    $i = 0;
    foreach ($admission_report as $v_data) {
        $i++ ?>
        <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo $v_data->student_id; ?></td>
            <td><?php echo $v_data->student_name; ?></td>
            <td><?php echo $v_data->class_name; ?></td>
            <td><?php echo $v_data->group_name; ?></td>
            <td><?php echo $v_data->shift_name; ?></td>
            <td><?php echo $v_data->section_name; ?></td>
            <td><?php echo $v_data->gender_name; ?></td>
            <td><?php echo $v_data->religion_name; ?></td>
            <td><?php echo $v_data->blood_group_name; ?></td>
            <td><?php echo $v_data->nationality; ?></td>
            <td><?php echo $v_data->date_of_birth; ?></td>
            <td><?php echo $v_data->present_address; ?></td>
            <td><?php echo $v_data->permanent_address; ?></td>
            <td><?php echo $v_data->student_mobile_no; ?></td>
            <td><?php echo $v_data->student_email; ?></td>
            <td><?php echo $v_data->father_name; ?></td>
            <td><?php echo $v_data->father_occupation; ?></td>
            <td><?php echo $v_data->father_nid; ?></td>
            <td><?php echo $v_data->father_mobile_no; ?></td>
            <td><?php echo $v_data->father_email; ?></td>
            <td><?php echo $v_data->mother_name; ?></td>
            <td><?php echo $v_data->mother_occupation; ?></td>
            <td><?php echo $v_data->mother_nid; ?></td>
            <td><?php echo $v_data->mother_mobile_no; ?></td>
            <td><?php echo $v_data->mother_email; ?></td>
            <td><?php echo $v_data->guardian_type; ?></td>
            <td><?php echo $v_data->previous_school_name; ?></td>
            <td><?php echo $v_data->tc; ?></td>
            <td><?php echo $v_data->guardian_name; ?></td>
            <td><?php echo $v_data->guardian_nid; ?></td>
            <td><?php echo $v_data->guardian_email; ?></td>
            <td><?php echo $v_data->guardian_mobile_no; ?></td>
            <td><?php echo $v_data->guardian_address; ?></td>
            <td><?php echo $v_data->guardian_occupation; ?></td>
            <td><?php echo $v_data->relation_with_student; ?></td>
            <td>
                <?php
                if ($v_data->status == 1) {
                    echo "Active";
                } else {
                    echo "Inactive";
                } ?>
            </td>
            <td><?php echo $v_data->admission_date; ?></td>
            <td><?php echo $v_data->admission_by; ?></td>
        </tr>
    <?php } ?>
</table>

