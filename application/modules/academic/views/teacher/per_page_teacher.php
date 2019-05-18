<div id="ajaxdata">
    <?php echo $links; ?>
    <table class="table table-striped table-responsive table-bordered table-hover">
        <thead style="background-color: #347CA4;">
        <tr>
            <th>SL NO</th>
            <th>Name</th>
            <th>Employee ID</th>
            <th>Picture</th>
            <th>Mobile No</th>
            <th>Email Address</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $i = 0;
        foreach ($teacher as $v_data) {
            $i++; ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $v_data->emp_name; ?></td>
                <td><?php echo $v_data->emp_id; ?></td>
                <td>
                    <?php if ($v_data->profile_picture) { ?>
                        <img
                            src="<?php echo base_url() ?>public/emp_profile/<?php echo $v_data->profile_picture; ?>"
                            height="40" width="40">
                    <?php } else { ?>
                        <img
                            src="<?php echo base_url() ?>public/emp_profile/demo_picture.jpg"
                            height="50" width="50">
                    <?php } ?>
                </td>
                <td><?php echo $v_data->mobile_no1; ?></td>
                <td><?php echo $v_data->email_address; ?></td>
                <td style="width: 70px;">
                    <a href="#"
                       onclick="details_resume(<?php echo $v_data->emp_id; ?>)"
                       class="btn btn-success" data-backdrop="static"
                       data-keyboard="false" data-toggle="modal"
                       data-target="#details_resume_modal"
                       id="details_resume"
                       title="Details emp resume info">
                        <i class="fa fa-reply-all"></i>
                    </a>
                </td>
            </tr>
        <?php } ?>
        </tbody>
        <tfoot>
        <tr>
            <th>SL NO</th>
            <th>Name</th>
            <th>Employee ID</th>
            <th>Picture</th>
            <th>Mobile No</th>
            <th>Email Address</th>
            <th>Action</th>
        </tr>
        </tfoot>
    </table>
    <?php echo $links; ?>
</div>
<script>
    $(document).ready(function () {
        $("#ajax_pagingsearc a").attr('onclick', 'return main_page_pagination($(this));');
    });
</script>