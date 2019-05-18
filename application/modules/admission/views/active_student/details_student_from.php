<table class="table table-striped table-bordered table-hover">
    <?php foreach ($student_info as $v_details) { ?>
        <tr>
            <td colspan="2">
                <b><p>ID: <?php echo $v_details->student_id; ?></span></p></b>
                <b><p>Name: <?php echo $v_details->student_name; ?></p></b>
                <b><p>Email: <?php echo $v_details->student_email; ?></p></b>
                <b><p>Mobile: <?php echo $v_details->student_mobile_no; ?></p></b>
                <b><p>Present Address: <?php echo $v_details->present_address ?></p></b>
                <?php if ($v_details->picture) { ?>
                    <img style="margin: -167px 0px 0px 700px;"
                         src="<?php echo base_url() ?>public/student_picture/<?php echo $v_details->picture; ?>"
                         height="150" width="150">
                <?php } else { ?>
                    <img style="margin: -167px 0px 0px 700px;"
                         src="<?php echo base_url() ?>public/student_picture/demo_picture.jpg" height="150" width="150">
                <?php } ?>
            </td>
        </tr>

        <tr>
            <td style="width: 300px;">Class Name</td>
            <td><?php echo $v_details->class_name; ?></td>
        </tr>
        <tr>
            <td style="width: 300px;">Group Name</td>
            <td><?php echo $v_details->group_name; ?></td>
        </tr>
        <tr>
            <td style="width: 300px;">Shift Name</td>
            <td><?php echo $v_details->shift_name; ?></td>
        </tr>
        <tr>
            <td style="width: 300px;">Section Name</td>
            <td><?php echo $v_details->section_name; ?></td>
        </tr>
        <tr>
            <td style="width: 300px;">Fourth subject Name</td>
            <td><?php echo $v_details->subject_name; ?></td>
        </tr>
        <tr>
            <td style="width: 300px;">Gender</td>
            <td><?php echo $v_details->gender_name; ?></td>
        </tr>
        <tr>
            <td style="width: 300px;">Religion Name</td>
            <td><?php echo $v_details->religion_name; ?></td>
        </tr>
        <tr>
            <td style="width: 300px;">nationality</td>
            <td><?php echo $v_details->nationality; ?></td>
        </tr>
        <tr>
            <td style="width: 300px;">Date of birth</td>
            <td><?php echo $v_details->date_of_birth; ?></td>
        </tr>
        <tr>
            <td>Blood Group</td>
            <td><?php echo $v_details->blood_group_name; ?></td>
        </tr>
        <tr>
            <td>Permanent Address</td>
            <td><?php echo $v_details->permanent_address; ?></td>
        </tr>

        <tr>
            <td>Father Name</td>
            <td><?php echo $v_details->father_name; ?></td>
        </tr>
        <tr>
            <td>Father Occupation</td>
            <td><?php echo $v_details->father_occupation; ?></td>
        </tr>
        <tr>
            <td>Father NID</td>
            <td><?php echo $v_details->father_nid; ?></td>
        </tr>
        <tr>
            <td>Father Mobile NO</td>
            <td><?php echo $v_details->father_mobile_no; ?></td>
        </tr>
        <tr>
            <td>Father Email</td>
            <td><?php echo $v_details->father_email; ?></td>
        </tr>
        <tr>
            <td>Mother Name</td>
            <td><?php echo $v_details->mother_name; ?></td>
        </tr>
        <tr>
            <td>Mother Occupation</td>
            <td><?php echo $v_details->mother_occupation; ?></td>
        </tr>
        <tr>
            <td>Mother NID</td>
            <td><?php echo $v_details->mother_nid; ?></td>
        </tr>
        <tr>
            <td>Mother Mobile NO</td>
            <td><?php echo $v_details->mother_mobile_no; ?></td>
        </tr>
        <tr>
            <td>Mother Email</td>
            <td><?php echo $v_details->mother_email; ?></td>
        </tr>
        <tr>
            <td>type</td>
            <td>  <?php if ($v_details->guardian_type == 1) {
                    echo "Father";
                } else if ($v_details->guardian_type == 1) {
                    echo "Mother";
                }else{
                    echo "Other";
                } ?>
            </td>
        </tr>
        <tr>
            <td>previous_school_name</td>
            <td><?php echo $v_details->previous_school_name; ?></td>
        </tr>
        <tr>
            <td>TC NO</td>
            <td><?php echo $v_details->tc; ?></td>
        </tr>
        <tr>
            <td>Guardian Name</td>
            <td><?php echo $v_details->guardian_name; ?></td>
        </tr>
        <tr>
            <td>Guardian Occupation</td>
            <td><?php echo $v_details->guardian_occupation; ?></td>
        </tr>
        <tr>
            <td>Guardian NID</td>
            <td><?php echo $v_details->guardian_nid; ?></td>
        </tr>
        <tr>
            <td>Guardian Mobile NO</td>
            <td><?php echo $v_details->guardian_mobile_no; ?></td>
        </tr>
        <tr>
            <td>Guardian Email</td>
            <td><?php echo $v_details->guardian_email; ?></td>
        </tr>
        <tr>
            <td>Guardian Address</td>
            <td><?php echo $v_details->guardian_address; ?></td>
        </tr>
        <tr>
            <td>Relation With Student</td>
            <td><?php echo $v_details->relation_with_student; ?></td>
        </tr>
        <tr>
            <td>Status</td>
            <td>
                <?php if ($v_details->status == 1) {
                    echo "Active";
                } else {
                    echo "Inactive";
                } ?>
            </td>
        </tr>
    <?php } ?>
</table>
