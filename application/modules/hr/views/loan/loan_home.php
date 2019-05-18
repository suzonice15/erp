<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <div class="pageheader" style="background-color: #F5F5F5;">
                <h2><i class="fa fa-home"></i>Employee loan page <br></h2>
                <ol class="breadcrumb" style="background-color: #F5F5F5;">
                    <li><a href="<?php echo base_url() ?>hr/loan/all_loan">Dashboard</a></li>
                    <li class="active">Add edit delete view.....</li>
                </ol>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading" style="height: 55px;">
                    <div class="col-md-2">
                        <button type="button" class="btn btn-success" data-backdrop="static"
                                data-keyboard="false" data-toggle="modal"
                                data-target="#load_modal" onclick="return add_loan();">
                            Add loan
                        </button>
                    </div>
                    <div class="col-md-3">
                        <input onkeyup="return search_content();" type="text" class="form-control" id="search_emp_id"
                               placeholder="Search by employee ID">
                    </div>
                    <div class="col-md-3">
                        <input onkeyup="return search_content();" type="text" class="form-control" id="select_amount"
                               placeholder="Search by amount">
                    </div>
                    <div class="col-md-3">
                        <select name="select_loan_type" id="select_loan_type" onchange="search_content()"
                                class="form-control">
                            <option value="">Select Type</option>
                            <?php foreach ($loan_type as $v_data) { ?>
                                <option
                                    value="<?php echo $v_data->id; ?>"><?php echo $v_data->loan_type_name; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="row">
                        <div class="form-group">
                            <div class="col-md-12">
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal inmodal" id="load_modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content animated fadeIn">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
                        class="sr-only">Close</span></button>
                <h4 class="modal-title text-center" id="load_title"></h4>
            </div>
            <div class="modal-body">
                <div id="load_from">
                </div>
                <p class="m-t text-center">
                    <small><?php echo $this->session->userdata('powered_by'); ?>
                        <br><?php echo $this->session->userdata('copy_write'); ?>
                    </small>
                </p>
                <div class="modal-footer">
                    <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function add_loan() {
        $.ajax({
            type: "POST",
            url: '<?php echo base_url() ?>hr/loan/load_add_loan_from',
            success: function (result) {
                if (result) {
                    $('#load_from').html(result);
                    $('#load_title').html("Add loan Info");
                    return false;
                } else {
                    return false;
                }
            }
        });
        return false;
    }
</script>


<script>
    function update_loan($id) {
        $.ajax({
            type: "POST",
            url: '<?php echo base_url() ?>hr/loan/load_update_loan_from/' + $id,
            success: function (result) {
                if (result) {
                    $('#load_from').html(result);
                    $('#load_title').html("Update loan Info");
                    return false;
                } else {
                    return false;
                }
            }
        });
        return false;
    }
</script>


<script>
    function search_content() {
        var base_url = "<?php echo base_url(); ?>";
        var emp_id = $('#search_emp_id').val();
        var amount = $('#select_amount').val();
        var loan_type = $('#select_loan_type').val();
        if ($.trim(emp_id) != "" || (amount) != "" || (loan_type) != "") {
            $.ajax({
                type: 'post',
                url: '<?php echo base_url(); ?>hr/loan/all_loan',
                data: {emp_id: emp_id, amount: amount, loan_type: loan_type},
                success: function (data) {
                    $("#ajaxdata").html(data);
                }
            });
        } else {
            $.post(base_url + "hr/loan/all_loan/", function (data) {
                $("#ajaxdata").html(data);
            });
        }
    }
</script>

<script>
    $(document).ready(function () {
        $("#ajax_pagingsearc a").attr('onclick', 'return main_page_pagination($(this));');
    });
</script>

<script>
    function main_page_pagination($this) {
        var url = $this.attr("href");
        var emp_id = $('#search_emp_id').val();
        var amount = $('#select_amount').val();
        var loan_type = $('#select_loan_type').val();
        if (url != '') {
            $.ajax({
                type: "POST",
                url: url,
                data: {emp_id: emp_id, amount: amount, loan_type: loan_type},
                success: function (msg) {
                    $("#ajaxdata").html(msg);
                }
            });
        }
        return false;
    }
</script>

