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
            <th>Weekend Name</th>
            <th>From Date</th>
            <th>To Date</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $i = 0;
        foreach ($weekend as $v_data) {
            $i++; ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $v_data->emp_id; ?></td>
                <td><?php echo $v_data->department_name; ?></td>
                <td><?php echo $v_data->shift_name; ?></td>
                <td><?php echo $v_data->section_name; ?></td>
                <td><?php echo $v_data->weekend_name; ?></td>
                <td><?php echo $v_data->from_date; ?></td>
                <td><?php echo $v_data->to_date; ?></td>
                <td>
                    <?php if ($v_data->status == 1) { ?>
                        <p style="color: green">Present</p>
                    <?php } else { ?>
                        <p style="color:red">Before</p>
                    <?php } ?>
                </td>
                <td style="width: 70px;">
                    <?php if ($v_data->status == 1) {?>
                        <a href="#"
                           onclick="update_weekend_info(<?php echo $v_data->id; ?>)"
                           class="btn btn-success" data-backdrop="static"
                           data-keyboard="false" data-toggle="modal"
                           data-target="#load_modal_small"
                           title="Update weekend info">
                            <i class="glyphicon glyphicon-edit"></i>
                        </a>
                    <?php } else { ?>
                        <a href="#" disabled="disabled" class="btn btn-success" data-backdrop="static">
                            <i class="glyphicon glyphicon-edit"></i>
                        </a>
                    <?php } ?>
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
            <th>Weekend Name</th>
            <th>From Date</th>
            <th>To Date</th>
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
