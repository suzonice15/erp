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
            <th>Designation</th>
            <th>Joining Date</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $i = 0;
        foreach ($job as $v_data) {
            $i++; ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $v_data->emp_id; ?></td>
                <td><?php echo $v_data->department_name; ?></td>
                <td><?php echo $v_data->shift_name; ?></td>
                <td><?php echo $v_data->section_name; ?></td>
                <td><?php echo $v_data->designation_name; ?></td>
                <td><?php echo $v_data->joining_date; ?></td>
                <td>
                    <?php
                    if ($v_data->status == 1) {
                        echo "Active";
                    } else {
                        echo "Inactive";
                    }
                    ?>
                </td>
                <td style="width: 150px;">
                    <a href="#"
                       onclick="update_job_info(<?php echo $v_data->id; ?>)"
                       class="btn btn-success" data-backdrop="static"
                       data-keyboard="false" data-toggle="modal"
                       data-target="#load_modal"
                       id="update_job_info"
                       title="Update emp basic info">
                        <i class="glyphicon glyphicon-edit"></i>
                    </a>
                    <button type="button" class="btn btn-danger btn btn-small"
                            data-backdrop="static"
                            data-keyboard="false" data-toggle="modal"
                            data-target="#load_modal" onclick="return released_note(<?php echo $v_data->id;?>);">
                        Released
                    </button>
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
            <th>Designation</th>
            <th>Joining Date</th>
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