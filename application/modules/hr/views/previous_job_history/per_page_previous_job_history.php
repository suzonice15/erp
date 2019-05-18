<div id="ajaxdata">
    <?php echo $links; ?>
    <table class="table table-striped table-responsive table-bordered table-hover">
        <thead style="background-color: #347CA4;">
        <tr>
            <th>SL NO</th>
            <th>Employee ID</th>
            <th>Organization Name</th>
            <th>Address</th>
            <th>Position</th>
            <th>Job Type</th>
            <th>From Date</th>
            <th>To Date</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $i = 0;
        foreach ($previous_job_history as $v_data) {
            $i++; ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $v_data->emp_id; ?></td>
                <td><?php echo $v_data->organization_name; ?></td>
                <td><?php echo $v_data->address; ?></td>
                <td><?php echo $v_data->position; ?></td>
                <td><?php echo $v_data->job_type; ?></td>
                <td><?php echo $v_data->from_date; ?></td>
                <td><?php echo $v_data->to_date; ?></td>
                <td style="width: 110px;">
                    <a href="#"
                       onclick="details_previous_job_history_info(<?php echo $v_data->emp_id; ?>)"
                       class="btn btn-success" data-backdrop="static"
                       data-keyboard="false" data-toggle="modal"
                       data-target="#load_modal"
                       title="Details Contact Info">
                        <i class="fa fa-reply-all"></i>
                    </a>
                    <a href="#"
                       onclick="update_previous_job_history_info(<?php echo $v_data->emp_id; ?>)"
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
            <th>Organization Name</th>
            <th>Address</th>
            <th>Position</th>
            <th>Job Type</th>
            <th>From Date</th>
            <th>To Date</th>
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
