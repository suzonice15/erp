<div id="ajaxdata">
    <?php echo $links; ?>
    <table class="table table-striped table-responsive table-bordered table-hover">
        <thead style="background-color: #347CA4;">
        <tr>
            <th>SL NO</th>
            <th>Name</th>
            <th>Duration</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $i = 0;
        foreach ($leave_type as $v_data) {
            $i++; ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $v_data->leave_name; ?></td>
                <td><?php echo $v_data->duration; ?></td>
                <td style="width: 145px;">
                    <a href="#" onclick="update_leave_type(<?php echo $v_data->id; ?>)"
                       class="btn btn-success" data-backdrop="static"
                       data-keyboard="false" data-toggle="modal"
                       data-target="#update_leave_type_modal" id="update_leave_type"
                       title="Update leave_type">
                        <i class="glyphicon glyphicon-edit"></i>
                    </a>
                    <a href="#" onclick="delete_leave_type(<?php echo $v_data->id; ?>)"
                       class="btn btn-danger" title="Delete leave_type">
                        <i class="glyphicon glyphicon-trash"></i>
                    </a>

                </td>
            </tr>
        <?php } ?>
        </tbody>
        <tfoot>
        <tr>
            <th>SL NO</th>
            <th>Name</th>
            <th>Duration</th>
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
    