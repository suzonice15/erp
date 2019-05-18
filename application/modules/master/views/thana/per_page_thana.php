<div id="ajaxdata">
    <?php echo $links; ?>
    <table class="table table-striped table-responsive table-bordered table-hover">
        <thead style="background-color: #347CA4;">
        <tr>
            <th>SL NO</th>
            <th>Division Name</th>
            <th>District Name</th>
            <th>Thana Name</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $i = 0;
        foreach ($thana as $v_data) {
            $i++; ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $v_data->division_name; ?></td>
                <td><?php echo $v_data->district_name; ?></td>
                <td><?php echo $v_data->thana_name; ?></td>
                <td style="width: 145px;">
                    <a href="#" onclick="update_thana(<?php echo $v_data->id; ?>)"
                       class="btn btn-success" data-backdrop="static"
                       data-keyboard="false" data-toggle="modal"
                       data-target="#update_thana_modal" id="update_thana"
                       title="Update thana">
                        <i class="glyphicon glyphicon-edit"></i>
                    </a>
                    <a href="#" onclick="delete_thana(<?php echo $v_data->id; ?>)"
                       class="btn btn-danger" title="Delete district">
                        <i class="glyphicon glyphicon-trash"></i>
                    </a>
                </td>
            </tr>
        <?php } ?>
        </tbody>
        <tfoot>
        <tr>
            <th>SL NO</th>
            <th>Division Name</th>
            <th>District Name</th>
            <th>Thana Name</th>
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