<div id="ajaxdata">
    <?php echo $links; ?>
    <table class="table table-striped table-responsive table-bordered table-hover">
        <thead style="background-color: #347CA4;">
        <tr>
            <th>SL NO</th>
            <th>Student ID</th>
            <th>Name</th>
            <th>Mobile</th>
            <th>Email</th>
            <th>picture</th>
            <th>Status</th>
            <th>Payment<br>Status</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $i = 0;
        foreach ($active_student as $v_data) {
            $i++; ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $v_data->student_id; ?></td>
                <td><?php echo $v_data->student_name; ?></td>
                <td><?php echo $v_data->student_mobile_no; ?></td>
                <td><?php echo $v_data->student_email; ?></td>
                <td><img
                        src="<?php echo base_url() ?>public/student_picture/<?php echo $v_data->picture; ?>" height="40" width="40">
                </td>
                <td>
                    <?php
                    if ($v_data->status == 1) {
                        echo "Active";
                    } else {
                        echo "Inactive";
                    }
                    ?>
                </td>
                <td>
                    <?php
                    if ($v_data->payment_status == 1) {
                        echo "Paid";
                    } else if ($v_data->payment_status == 2) {
                        echo "Paid(Partial)";
                    } else {
                        echo "Not Paid";
                    }
                    ?>
                </td>
                <td style="width: 150px;">
                    <a href="#"
                       onclick="update_student(<?php echo $v_data->id; ?>)"
                       class="btn btn-success" data-backdrop="static"
                       data-keyboard="false" data-toggle="modal"
                       data-target="#load_modal"
                       id="update_student"
                       title="Update student info">
                        <i class="glyphicon glyphicon-edit"></i>
                    </a>
                    <a href="#"
                       onclick="details_student(<?php echo $v_data->id; ?>)"
                       class="btn btn-success" data-backdrop="static"
                       data-keyboard="false" data-toggle="modal"
                       data-target="#load_modal"
                       id="details_student"
                       title="Details student info">
                        <i class="fa fa-reply-all"></i>
                    </a>
                    <?php
                    if ($v_data->status == 1) { ?>
                        <a href="#"
                           onclick="student_inactive(<?php echo $v_data->id; ?>)"
                           class="btn btn-warning" title="Inactive">
                            <i class="glyphicon glyphicon-arrow-down"></i>
                        </a>
                    <?php } else { ?>
                        <a href="#"
                           onclick="student_active(<?php echo $v_data->id; ?>)"
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
            <th>Name</th>
            <th>Mobile</th>
            <th>Email</th>
            <th>picture</th>
            <th>Status</th>
            <th>Payment<br>Status</th>
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