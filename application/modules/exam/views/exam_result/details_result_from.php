<table class="table table-striped table-bordered table-hover">
    <?php foreach ($result as $v_details) { ?>
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
            <td style="width: 300px;">Subject Name</td>
            <td><?php echo $v_details->subject_name; ?></td>
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
            <td style="width: 300px;">Exam ame</td>
            <td><?php echo $v_details->exam_name; ?></td>
        </tr>
        <tr>
            <td style="width: 300px;">Group Name</td>
            <td><?php echo $v_details->group_name; ?></td>
        </tr>
        <tr>
            <td style="width: 300px;">Year</td>
            <td><?php echo $v_details->year; ?></td>
        </tr>
        <tr>
            <td style="width: 300px;">Subjective Marks</td>
            <td><?php echo $v_details->subjective_marks; ?></td>
        </tr>
        <tr>
            <td style="width: 300px;">Objective_marks</td>
            <td><?php echo $v_details->objective_marks; ?></td>
        </tr>
        <tr>
            <td>Practical Marks</td>
            <td><?php echo $v_details->practical_marks; ?></td>
        </tr>
        <tr>
            <td>Result created by</td>
            <td><?php echo $v_details->result_created_by; ?></td>
        </tr>
        <tr>
            <td>Publish Status</td>
            <td>  <?php if ($v_details->publish_status == 0) {
                    echo "Pending on teacher panel";
                } else if ($v_details->publish_status == 1) {
                    echo "Pending on class teacher panel";
                } else if ($v_details->publish_status == 2) {
                    echo "Pending on principal panel";
                } else {
                    echo "Published";
                } ?>
            </td>
        </tr>
        <tr>
            <td>Block Status</td>
            <td>
                <?php if ($v_details->block_status == 1) {
                    echo "Ok";
                } else {
                    echo "Block";
                } ?>
            </td>
        </tr>
    <?php } ?>
</table>
