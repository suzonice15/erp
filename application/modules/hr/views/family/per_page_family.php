<div id="ajaxdata">
    <?php echo $links; ?>
    <table class="table table-striped table-responsive table-bordered table-hover">
        <thead style="background-color: #347CA4;">
        <tr>
            <th>SL NO</th>
            <th>Employee ID</th>
            <th>Spouse Name</th>
            <th>Designation</th>
            <th>Contact No</th>
            <th>Total Family Members</th>
            <th>Other Dependents</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $i = 0;
        foreach ($family as $v_data) {
            $i++; ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $v_data->emp_id; ?></td>
                <td><?php echo $v_data->spouse_name; ?></td>
                <td><?php echo $v_data->designation_id; ?></td>
                <td><?php echo $v_data->contact_no; ?></td>
                <td><?php echo $v_data->total_family_members; ?></td>
                <td><?php echo $v_data->no_of_other_dependents; ?></td>
                <td style="width: 75px;">
                    <a href="#"
                       onclick="update_family_info(<?php echo $v_data->id; ?>)"
                       class="btn btn-success" data-backdrop="static"
                       data-keyboard="false" data-toggle="modal"
                       data-target="#load_modal"
                       title="Update emp family info">
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
            <th>Spouse Name</th>
            <th>Designation</th>
            <th>Contact No</th>
            <th>Total Family Members</th>
            <th>Other Dependents</th>
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