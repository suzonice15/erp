<table class="table table-striped table-bordered table-hover">
    <?php foreach ($contact as $v_details) { ?>
        <tr>
            <td>Present Address</td>
            <td><?php echo $v_details->present_address; ?></td>
        </tr>
        <tr>
            <td>Present Post Office</td>
            <td><?php echo $v_details->present_post_office; ?></td>
        </tr>
        <tr>
            <td>Present Post Code</td>
            <td><?php echo $v_details->present_post_code; ?></td>
        </tr>
        <tr>
            <td>Present Division</td>
            <td><?php echo $v_details->division_name; ?></td>
        </tr>
        <tr>
            <td>Present District</td>
            <td><?php echo $v_details->district_name; ?></td>
        </tr>
        <tr>
            <td>Present Thana</td>
            <td><?php echo $v_details->thana_name; ?></td>
        </tr>
        <tr>
            <td>Present Email</td>
            <td><?php echo $v_details->present_email; ?></td>
        </tr>
        <tr>
            <td>Present Phone</td>
            <td><?php echo $v_details->present_phone; ?></td>
        </tr>
        <tr>
            <td>Present Mobile</td>
            <td><?php echo $v_details->present_mobile; ?></td>
        </tr>

        <?php if ($v_details->is_address_same == 1) { ?>
            <tr>
                <td colspan="2">Permanent address is same</td>
            </tr>
        <?php } else { ?>
            <tr>
                <td>Permanent Address</td>
                <td><?php echo $v_details->permanent_address; ?></td>
            </tr>
            <tr>
                <td>Permanent Post Office</td>
                <td><?php echo $v_details->permanent_post_office; ?></td>
            </tr>
            <tr>
                <td>Permanent Post Code</td>
                <td><?php echo $v_details->permanent_post_code; ?></td>
            </tr>
            <tr>
                <td>Permanent Division</td>
                <td>
                    <?php
                    $CI = &get_instance();
                    $result = $CI->contact_info_model->select_division_name($v_details->permanent_division_id);
                    if ($result) {
                        echo $result->division_name;
                    }
                    ?>
                </td>
            </tr>
            <tr>
                <td>Permanent District</td>
                <td>
                    <?php
                    $CI = &get_instance();
                    $result = $CI->contact_info_model->select_district_name($v_details->permanent_district_id);
                    if ($result) {
                        echo $result->district_name;
                    }
                    ?>
                </td>
            </tr>
            <tr>
                <td>Permanent Thana</td>
                <td>
                    <?php
                    $CI = &get_instance();
                    $result = $CI->contact_info_model->select_thana_name($v_details->permanent_thana_id);
                    if ($result) {
                        echo $result->thana_name;
                    }
                    ?>
                </td>
            </tr>
            <tr>
                <td>Permanent Email</td>
                <td><?php echo $v_details->permanent_email; ?></td>
            </tr>
            <tr>
                <td>Permanent Phone</td>
                <td><?php echo $v_details->permanent_phone; ?></td>
            </tr>
            <tr>
                <td>Permanent Mobile</td>
                <td><?php echo $v_details->permanent_mobile; ?></td>
            </tr>
        <?php } ?>
    <?php } ?>
</table>
