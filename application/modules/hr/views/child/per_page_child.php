<div id="ajaxdata">
    <?php echo $links; ?>
    <table class="table table-striped table-responsive table-bordered table-hover">
        <thead style="background-color: #347CA4;">
        <tr>
            <th>SL NO</th>
            <th>Employee ID</th>
            <th>Child Name</th>
            <th>Gender</th>
            <th>Profession</th>
            <th>Class</th>
            <th>Inatitute</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $i = 0;
        foreach ($child as $v_data) {
            $i++; ?>
            <tr>
                <td><?php echo $i;?></td>
                <td><?php echo $v_data->emp_id;?></td>
                <td><?php echo $v_data->child_name;?></td>
                <td><?php echo $v_data->gender_name;?></td>
                <td><?php echo $v_data->profession_name;?></td>
                <td><?php echo $v_data->class;?></td>
                <td><?php echo $v_data->institute;?></td>
                <td style="width: 110px;">
                    <a href="#"
                       onclick="update_child_info(<?php echo $v_data->id; ?>)"
                       class="btn btn-success" data-backdrop="static"
                       data-keyboard="false" data-toggle="modal"
                       data-target="#load_modal"
                       id="update_child_info"
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
            <th>Child Name</th>
            <th>Gender</th>
            <th>Profession</th>
            <th>Class</th>
            <th>Inatitute</th>
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
