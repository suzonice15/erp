<div id="ajaxdata">
    <?php echo $links; ?>
    <table class="table table-striped table-responsive table-bordered table-hover">
        <thead style="background-color: #347CA4;">
        <tr>
            <th>SL NO</th>
            <th>Employee ID</th>
            <th>Present Address</th>
            <th>Post Code</th>
            <th>Email</th>
            <th>Mobile</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $i = 0;
        foreach ($contact as $v_data) {
            $i++; ?>
            <tr>
                <td><?php echo $i;?></td>
                <td><?php echo $v_data->emp_id;?></td>
                <td><?php echo $v_data->present_address;?></td>
                <td><?php echo $v_data->present_post_office;?></td>
                <td><?php echo $v_data->present_email;?></td>
                <td><?php echo $v_data->present_mobile;?></td>
                <td style="width: 110px;">
                    <a href="#"
                       onclick="details_emp_basic_info(<?php echo $v_data->id; ?>)"
                       class="btn btn-success" data-backdrop="static"
                       data-keyboard="false" data-toggle="modal"
                       data-target="#load_modal"
                       title="Details Contact Info">
                        <i class="fa fa-reply-all"></i>
                    </a>
                    <a href="#"
                       onclick="update_contact_info(<?php echo $v_data->id; ?>)"
                       class="btn btn-success" data-backdrop="static"
                       data-keyboard="false" data-toggle="modal"
                       data-target="#load_modal"
                       title="Update Contact Info">
                        <i class="glyphicon glyphicon-edit"></i>
                    </a>
                </td>
            </tr>
        <?php } ?>
        </tbody>
        <tfoot>
        <tr>
            <th>SL NO</th>
            <th>Employee ID</th>
            <th>Present Address</th>
            <th>Post Code</th>
            <th>Email</th>
            <th>Mobile</th>
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
