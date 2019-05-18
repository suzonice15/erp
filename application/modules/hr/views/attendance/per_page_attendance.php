<div id="ajaxdata">
    <?php echo $links; ?>
    <table class="table table-striped table-responsive table-bordered table-hover">
        <thead style="background-color: #347CA4;">
        <tr>
            <th>SL NO</th>
            <th>Employee ID</th>
            <th>Department</th>
            <th>Shift</th>
            <th>Section</th>
            <th>Date</th>
            <th>In Time</th>
            <th>Out Time</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $i = 0;
        foreach ($attendance as $v_data) {
            $i++; ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $v_data->emp_id; ?></td>
                <td><?php echo $v_data->department_name; ?></td>
                <td><?php echo $v_data->shift_name; ?></td>
                <td><?php echo $v_data->section_name; ?></td>
                <td><?php echo $v_data->present_date; ?></td>
                <td><?php echo $v_data->in_time; ?></td>
                <td><?php echo $v_data->out_time; ?></td>
                <td style="width: 70px;">
                    <a href="#"
                       onclick="update_attendance_info(<?php echo $v_data->id; ?>)"
                       class="btn btn-success" data-backdrop="static"
                       data-keyboard="false" data-toggle="modal"
                       data-target="#load_modal_small"
                       title="Update attendance info">
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
            <th>Department</th>
            <th>Shift</th>
            <th>Section</th>
            <th>Date</th>
            <th>In Time</th>
            <th>Out Time</th>
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
