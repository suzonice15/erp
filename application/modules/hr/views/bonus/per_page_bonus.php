<div id="ajaxdata">
    <?php echo $links; ?>
    <table class="table table-striped table-responsive table-bordered table-hover">
        <thead style="background-color: #347CA4;">
        <tr>
            <th>SL NO</th>
            <th>Department</th>
            <th>Shift</th>
            <th>Section</th>
            <th>Bonus Type</th>
            <th>Amount Type</th>
            <th>Amount</th>
            <th>Year</th>
            <th>Month</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $i = 0;
        foreach ($bonus as $v_data) {
            $i++; ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $v_data->department_name; ?></td>
                <td><?php echo $v_data->shift_name; ?></td>
                <td><?php echo $v_data->section_name; ?></td>
                <td><?php echo $v_data->bonus_name; ?></td>
                <td>
                    <?php
                    if ($v_data->amount_type == 1) {
                        echo "Fixed";
                    } else {
                        echo "Percent of basic";
                    }
                    ?>
                </td>
                <td><?php echo $v_data->amount; ?></td>
                <td><?php echo $v_data->year; ?></td>
                <td>
                    <?php
                    $dateObj = DateTime::createFromFormat('!m', $v_data->month);
                    echo $monthName = $dateObj->format('F'); // March
                    ?>
                </td>

                <td style="width: 70px;">
                    <a href="#"
                       onclick="update_bonus(<?php echo $v_data->id; ?>)"
                       class="btn btn-success" data-backdrop="static"
                       data-keyboard="false" data-toggle="modal"
                       data-target="#load_modal"
                       id="update_bonus"
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
            <th>Department</th>
            <th>Shift</th>
            <th>Section</th>
            <th>Bonus Type</th>
            <th>Amount Type</th>
            <th>Amount</th>
            <th>Year</th>
            <th>Month</th>
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