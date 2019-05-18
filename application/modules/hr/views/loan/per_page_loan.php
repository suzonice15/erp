<div id="ajaxdata">
    <?php echo $links; ?>
    <table class="table table-striped table-responsive table-bordered table-hover">
        <thead style="background-color: #347CA4;">
        <tr>
            <th>SL NO</th>
            <th>Employee ID</th>
            <th>Loan Type</th>
            <th>Issue Date</th>
            <th>Loan Amount</th>
            <th>No of Installment</th>
            <th>Amount of Installment</th>
            <th>Deduction Year</th>
            <th>Deduction Month</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $i = 0;
        foreach ($loan as $v_data) {
            $i++; ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $v_data->emp_id; ?></td>
                <td><?php echo $v_data->loan_type_name; ?></td>
                <td><?php echo $v_data->issue_date; ?></td>
                <td><?php echo $v_data->loan_amount; ?></td>
                <td><?php echo $v_data->no_of_installment; ?></td>
                <td><?php echo $v_data->amount_of_installment; ?></td>
                <td><?php echo $v_data->deduction_year; ?></td>
                <td>
                    <?php
                    $dateObj = DateTime::createFromFormat('!m', $v_data->deduction_month);
                    echo $monthName = $dateObj->format('F'); // March
                    ?>
                </td>
                <td style="width: 70px;">
                    <a href="#"
                       onclick="update_loan(<?php echo $v_data->id; ?>)"
                       class="btn btn-success" data-backdrop="static"
                       data-keyboard="false" data-toggle="modal"
                       data-target="#load_modal"
                       title="Update Contact Info">
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
            <th>Loan Type</th>
            <th>Issue Date</th>
            <th>Loan Amount</th>
            <th>No of Installment</th>
            <th>Amount of Installment</th>
            <th>Deduction Year</th>
            <th>Deduction Month</th>
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
