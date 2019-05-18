<div id="ajaxdata">
    <?php echo $links; ?>
    <table class="table table-striped table-responsive table-bordered table-hover">
        <thead style="background-color: #347CA4;">
        <tr>
            <th>SL NO</th>
            <th>Employee ID</th>
            <th>Name</th>
            <th>Designation</th>
            <th>Organization</th>
            <th>Address</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Mobile</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $i = 0;
        foreach ($reference_info as $v_data) {
            $i++; ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $v_data->emp_id; ?></td>
                <td><?php echo $v_data->name; ?></td>
                <td><?php echo $v_data->designation; ?></td>
                <td><?php echo $v_data->organization; ?></td>
                <td><?php echo $v_data->address; ?></td>
                <td><?php echo $v_data->email; ?></td>
                <td><?php echo $v_data->phone; ?></td>
                <td><?php echo $v_data->mobile; ?></td>
                <td style="width: 110px;">
                    <a href="#"
                       onclick="details_reference_info(<?php echo $v_data->emp_id; ?>)"
                       class="btn btn-success" data-backdrop="static"
                       data-keyboard="false" data-toggle="modal"
                       data-target="#load_modal"
                       title="Details Nominee Info">
                        <i class="fa fa-reply-all"></i>
                    </a>
                    <a href="#"
                       onclick="update_reference_info(<?php echo $v_data->id; ?>)"
                       class="btn btn-success" data-backdrop="static"
                       data-keyboard="false" data-toggle="modal"
                       data-target="#load_modal"
                       id="update_reference_info"
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
            <th>Name</th>
            <th>Designation</th>
            <th>Organization</th>
            <th>Address</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Mobile</th>
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
