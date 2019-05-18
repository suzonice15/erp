<table class="table table-striped table-bordered table-hover">
    <?php foreach ($basic as $v_details) { ?>
        <tr>
            <td colspan="2">
                <b><p>ID: <?php echo $v_details->emp_id; ?></span></p></b>
                <b><p>Name: <?php echo $v_details->emp_name; ?></p></b>
                <b><p>Email: <?php echo $v_details->email_address; ?></p></b>
                <b><p>Mobile: <?php echo $v_details->mobile_no1; ?></p></b>
                <b><p>Present Address: <?php echo $v_details->present_address ?></p></b>
                <?php if ($v_details->profile_picture) { ?>
                    <img style="margin: -167px 0px 0px 700px;"
                         src="<?php echo base_url() ?>public/emp_profile/<?php echo $v_details->profile_picture; ?>"
                         height="150" width="150">
                <?php } else { ?>
                    <img style="margin: -167px 0px 0px 700px;"
                         src="<?php echo base_url() ?>public/emp_profile/demo_picture.jpg" height="150" width="150">
                <?php } ?>


            </td>
        </tr>
        <tr>
            <td style="width: 300px;">Date of birth</td>
            <td><?php echo $v_details->date_of_birth; ?></td>
        </tr>
        <tr>
            <td>Gender</td>
            <td><?php echo $v_details->gender_name; ?></td>
        </tr>
        <tr>
            <td>Division</td>
            <td><?php echo $v_details->division_name; ?></td>
        </tr>
        <tr>
            <td>District</td>
            <td><?php echo $v_details->district_name; ?></td>
        </tr>
        <tr>
            <td>Thana</td>
            <td><?php echo $v_details->thana_name; ?></td>
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
            <td>Passport Number</td>
            <td><?php echo $v_details->passport_number; ?></td>
        </tr>
        <tr>
            <td>Passport number exp date</td>
            <td><?php echo $v_details->passport_number_exp_date; ?></td>
        </tr>
        <tr>
            <td>Birth Certificate</td>
            <td><?php echo $v_details->birth_certificate; ?></td>
        </tr>
        <tr>
            <td>Permanent Address</td>
            <td><?php echo $v_details->permanent_address; ?></td>
        </tr>
        <tr>
            <td>Blood Group</td>
            <td><?php echo $v_details->blood_group_name; ?></td>
        </tr>
        <tr>
            <td>Religion</td>
            <td><?php echo $v_details->religion_name; ?></td>
        </tr>
        <tr>
            <td>Freedom fighter family</td>
            <td><?php if ($v_details->freedom_fighter_family == 1) {
                    echo "Yes";
                } else {
                    echo "No";
                } ?>
            </td>
        </tr>
        <tr>
            <td>Freedom Fighter</td>
            <td><?php echo $v_details->freedom_fighter_id; ?></td>
        </tr>
        <tr>
            <td>Freedom Fighter Relation</td>
            <td><?php echo $v_details->relation_name; ?></td>
        </tr>
        <tr>
            <td>Signature</td>
            <td>
                <?php if ($v_details->signature) { ?>
                    <img src="<?php echo base_url() ?>public/emp_profile/<?php echo $v_details->signature; ?>"
                         height="50" width="50">
                <?php } else { ?>
                <?php } ?>
            </td>
        </tr>
    <?php } ?>
</table>
