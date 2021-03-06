<div id="ajaxdata">
    <?php echo $links; ?>
    <table class="table table-striped table-responsive table-bordered table-hover">
        <thead style="background-color: #347CA4;">
        <tr>
            <th>SL NO</th>
            <th>Student ID</th>
            <th>Student Name</th>
            <th>Class Roll</th>
            <th>Class Name</th>
            <th>Shift Name</th>
            <th>Section Name</th>
            <th>Year</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $i = 0;
        foreach ($enroll_class as $v_data) {
            $i++; ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $v_data->student_id; ?></td>
                <td><?php echo $v_data->student_name; ?></td>
                <td><?php echo $v_data->class_roll; ?></td>
                <td><?php echo $v_data->class_name; ?></td>
                <td><?php echo $v_data->shift_name; ?></td>
                <td><?php echo $v_data->section_name; ?></td>
                <td><?php echo $v_data->year; ?></td>
                <td>
                    <?php
                    if ($v_data->status == 1) {
                        echo "Active";
                    } else {
                        echo "Inactive";
                    }
                    ?>
                </td>
                <td style="width: 110px;">
                    <a href="#" onclick="update_enroll_class(<?php echo $v_data->id; ?>)"
                       class="btn btn-success" data-backdrop="static"
                       data-keyboard="false" data-toggle="modal"
                       data-target="#load_modal" id="update_menu"
                       title="Update Enroll Class">
                        <i class="glyphicon glyphicon-edit"></i>
                    </a>
                    <?php
                    if ($v_data->status == 1) { ?>
                        <a href="#"
                           onclick="enroll_class_inactive(<?php echo $v_data->id; ?>)"
                           class="btn btn-warning" title="Inactive">
                            <i class="glyphicon glyphicon-arrow-down"></i>
                        </a>
                    <?php } else { ?>
                        <a href="#"
                           onclick="enroll_class_active(<?php echo $v_data->id; ?>)"
                           class="btn btn-warning" title="Active">
                            <i class="glyphicon glyphicon-arrow-up"></i>
                        </a>
                    <?php } ?>
                </td>
            </tr>
        <?php } ?>
        </tbody>
        <tfoot>
        <tr>
            <th>SL NO</th>
            <th>Student ID</th>
            <th>Student Name</th>
            <th>Class Roll</th>
            <th>Class Name</th>
            <th>Shift Name</th>
            <th>Section Name</th>
            <th>Year</th>
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