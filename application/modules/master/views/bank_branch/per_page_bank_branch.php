<div id="ajaxdata">
    <?php echo $links; ?>
    <table class="table table-striped table-responsive table-bordered table-hover">
        <thead style="background-color: #347CA4;">
        <tr>
            <th>SL NO</th>
            <th>Bank Name</th>
            <th>Branch Name</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $i = 0;
        foreach ($bank_branch as $v_data) {
            $i++; ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $v_data->bank_name; ?></td>
                <td><?php echo $v_data->bank_branch_name; ?></td>
                <td style="width: 145px;">
                    <a href="#" onclick="update_bank_branch(<?php echo $v_data->id; ?>)"
                       class="btn btn-success" data-backdrop="static"
                       data-keyboard="false" data-toggle="modal"
                       data-target="#update_bank_branch_modal" id="update_bank_branch"
                       title="Update bank_branch">
                        <i class="glyphicon glyphicon-edit"></i>
                    </a>
                    <a href="#" onclick="delete_bank_branch(<?php echo $v_data->id; ?>)"
                       class="btn btn-danger" title="Delete bank_branch">
                        <i class="glyphicon glyphicon-trash"></i>
                    </a>
                </td>
            </tr>
        <?php } ?>
        </tbody>
        <tfoot>
        <tr>
            <th>SL NO</th>
            <th>Bank Name</th>
            <th>Branch Name</th>
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