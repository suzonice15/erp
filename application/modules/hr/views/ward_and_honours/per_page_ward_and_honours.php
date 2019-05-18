<div id="ajaxdata">
    <?php echo $links; ?>
    <table class="table table-striped table-responsive table-bordered table-hover">
        <thead style="background-color: #347CA4;">
        <tr>
            <th>SL NO</th>
            <th>Employee ID</th>
            <th>Title</th>
            <th>Awards Type</th>
            <th>Country</th>
            <th>Receiving Date</th>
            <th>Institute</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $i = 0;
        foreach ($ward_and_honours as $v_data) {
            $i++; ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $v_data->emp_id; ?></td>
                <td><?php echo $v_data->award_honors_title; ?></td>
                <td><?php echo $v_data->awards_type; ?></td>
                <td><?php echo $v_data->country; ?></td>
                <td><?php echo $v_data->receiving_date; ?></td>
                <td><?php echo $v_data->organization_name; ?></td>
                <td style="width: 70px;">
                    <a href="#"
                       onclick="update_ward_and_honours(<?php echo $v_data->id; ?>)"
                       class="btn btn-success" data-backdrop="static"
                       data-keyboard="false" data-toggle="modal"
                       data-target="#load_modal"
                       id="update_ward_and_honours"
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
            <th>Title</th>
            <th>Awards Type</th>
            <th>Country</th>
            <th>Receiving Date</th>
            <th>Institute</th>
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
