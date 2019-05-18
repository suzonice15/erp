<div id="ajaxdata">
    <?php echo $links; ?>
    <table class="table table-striped table-responsive table-bordered table-hover">
        <thead style="background-color: #347CA4;">
        <tr>
            <th>SL NO</th>
            <th>Employee ID</th>
            <th>Basic Salary</th>
            <th>Department</th>
            <th>Shift</th>
            <th>Section</th>
            <th>Designation</th>
            <th>Post Name</th>
            <th>Joining Date</th>
            <th>Confirmation Date</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $i = 0;
        foreach ($job_posting as $v_data) {
            $i++; ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $v_data->emp_id; ?></td>
                <td><?php echo $v_data->basic_salary; ?></td>
                <td><?php echo $v_data->department_name; ?></td>
                <td><?php echo $v_data->shift_name; ?></td>
                <td><?php echo $v_data->section_name; ?></td>
                <td><?php echo $v_data->designation_name; ?></td>
                <td><?php echo $v_data->post_name; ?></td>
                <td><?php echo $v_data->joining_date; ?></td>
                <td><?php echo $v_data->confirmation_date; ?></td>
                <td>
                    <?php if ($v_data->status == 1) { ?>
                        <span style="color: green; font: bold;">Present</span>
                    <?php } else { ?>
                        <span style="color:red; font: bold;">Before</span>
                    <?php } ?>
                </td>
                <td style="width: 30px;">
                    <a href="#"
                       onclick="update_job_posting(<?php echo $v_data->id; ?>)"
                       class="btn btn-success" data-backdrop="static"
                       data-keyboard="false" data-toggle="modal"
                       data-target="#load_modal"
                       id="update_job_posting"
                       title="Update emp basic info">
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
            <th>Basic Salary</th>
            <th>Department</th>
            <th>Shift</th>
            <th>Section</th>
            <th>Designation</th>
            <th>Post Name</th>
            <th>Joining Date</th>
            <th>Confirmation Date</th>
            <th>Status</th>
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