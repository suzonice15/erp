<table class="table table-striped table-bordered table-hover">
    <?php
    $i = "";
    foreach ($nominee as $v_details) {
        $i++;
        ?>
        <tr>
            <td colspan="2" style="background-color: #3C8DBC;">Nominee No.<?php echo $i; ?></td>
        </tr>
        <tr>
            <td>Employee ID</td>
            <td><?php echo $v_details->emp_id; ?></td>
        </tr>
        <tr>
            <td>name</td>
            <td><?php echo $v_details->name; ?></td>
        </tr>
        <tr>
            <td>Father Name</td>
            <td><?php echo $v_details->father_name; ?></td>
        </tr>
        <tr>
            <td>Mother Name</td>
            <td><?php echo $v_details->mother_name; ?></td>
        </tr>
        <tr>
            <td>Spouse Name</td>
            <td><?php echo $v_details->spouse_name; ?></td>
        </tr>
        <tr>
            <td>Percent</td>
            <td><?php echo $v_details->percent; ?></td>
        </tr>
        <tr>
            <td>National ID</td>
            <td><?php echo $v_details->national_id; ?></td>
        </tr>
        <tr>
            <td>Passport Number</td>
            <td><?php echo $v_details->passport_number; ?></td>
        </tr>
        <tr>
            <td>Present Address</td>
            <td><?php echo $v_details->present_address; ?></td>
        </tr>
        <tr>
            <td>Permanent Address</td>
            <td><?php echo $v_details->permanent_address; ?></td>
        </tr>
    <?php } ?>
</table>