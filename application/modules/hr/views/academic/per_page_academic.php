<div id="ajaxdata">
    <?php echo $links; ?>
    <table class="table table-striped table-responsive table-bordered table-hover">
        <thead style="background-color: #347CA4;">
        <tr>
            <th>SL NO</th>
            <th>Employee ID</th>
            <th>Exam Degree</th>
            <th>Grade Marks</th>
            <th>Year of Passing</th>
            <th>Institute</th>
            <th>Board</th>
            <th>Academic Group</th>
            <th>Exam Name</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $i = 0;
        foreach ($academic as $v_data) {
            $i++; ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $v_data->emp_id; ?></td>
                <td><?php echo $v_data->degree_name; ?></td>
                <td><?php echo $v_data->grade_marks; ?></td>
                <td><?php echo $v_data->year_of_passing; ?></td>
                <td><?php echo $v_data->institute; ?></td>
                <td><?php echo $v_data->board_name; ?></td>
                <td><?php echo $v_data->group_name; ?></td>
                <td><?php echo $v_data->exam_name; ?></td>
                <td style="width: 70px;">
                    <a href="#"
                       onclick="update_academic_info(<?php echo $v_data->id; ?>)"
                       class="btn btn-success" data-backdrop="static"
                       data-keyboard="false" data-toggle="modal"
                       data-target="#load_modal"
                       id="update_academic_info"
                       title="Update Emp Child Info">
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
            <th>Exam Degree</th>
            <th>Grade Marks</th>
            <th>Year of Passing</th>
            <th>Institute</th>
            <th>Board</th>
            <th>Academic Group</th>
            <th>Exam Name</th>
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
