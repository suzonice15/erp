<div id="ajaxdata">
    <?php echo $links; ?>
    <table class="table table-striped table-responsive table-bordered table-hover">
        <thead style="background-color: #347CA4;">
        <tr>
            <th>SL NO</th>
            <th>Employee ID</th>
            <th>Training/Title</th>
            <th>Topics Covered</th>
            <th>Institute</th>
            <th>Country</th>
            <th>Location</th>
            <th>Duration</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $i = 0;
        foreach ($training as $v_data) {
            $i++; ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $v_data->emp_id; ?></td>
                <td><?php echo $v_data->training_title; ?></td>
                <td><?php echo $v_data->topics_covered; ?></td>
                <td><?php echo $v_data->institute; ?></td>
                <td><?php echo $v_data->country; ?></td>
                <td><?php echo $v_data->location; ?></td>
                <td><?php echo $v_data->duration; ?></td>
                <td style="width: 110px;">
                    <a href="#"
                       onclick="details_training(<?php echo $v_data->emp_id; ?>)"
                       class="btn btn-success" data-backdrop="static"
                       data-keyboard="false" data-toggle="modal"
                       data-target="#load_modal"
                       title="Details Training Info">
                        <i class="fa fa-reply-all"></i>
                    </a>
                    <a href="#"
                       onclick="update_training(<?php echo $v_data->emp_id; ?>)"
                       class="btn btn-success" data-backdrop="static"
                       data-keyboard="false" data-toggle="modal"
                       data-target="#load_modal"
                       title="Update Training">
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
            <th>Training/Title</th>
            <th>Topics Covered</th>
            <th>Institute</th>
            <th>Country</th>
            <th>Location</th>
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
