<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <div class="pageheader" style="background-color: #F5F5F5;">
                <h2><i class="fa fa-home"></i>Exam Fee Page <br></h2>
                <ol class="breadcrumb" style="background-color: #F5F5F5;">
                    <li><a href="<?php echo base_url() ?>master/bank/all_bank">Dashboard</a></li>
                    <li class="active">Add edit delete view.....</li>
                </ol>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <button type="button" class="btn btn-success" data-backdrop="static"
                            data-keyboard="false" data-toggle="modal"
                            data-target="#load_modal" onclick="return add_exam_fee();">
                        Add Exam Fee
                    </button>
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
                                            <th>Year</th>
                                            <th>Particulars</th>
                                            <th>Amount</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $i = 0;
                                        foreach ($exam_fee as $v_data) {
                                            $i++; ?>
                                            <tr>
                                                <td><?php echo $i; ?></td>
                                                <td><?php echo $v_data->year; ?></td>
                                                <td><?php echo $v_data->particulars; ?></td>
                                                <td><?php echo $v_data->amount; ?></td>
                                                <td>
                                                    <?php
                                                    if ($v_data->status == 1) {
                                                        echo "Active";
                                                    } else {
                                                        echo "Inactive";
                                                    }
                                                    ?>
                                                </td>
                                                <td style="width: 110px;">
                                                    <a href="#"
                                                       onclick="update_exam_fee(<?php echo $v_data->id; ?>)"
                                                       class="btn btn-success" data-backdrop="static"
                                                       data-keyboard="false" data-toggle="modal"
                                                       data-target="#load_modal"
                                                       id="update_student"
                                                       title="Update exam fee">
                                                        <i class="glyphicon glyphicon-edit"></i>
                                                    </a>
                                                    <?php
                                                    if ($v_data->status == 1) { ?>
                                                        <a href="#"
                                                           onclick="exam_fee_inactive(<?php echo $v_data->id; ?>)"
                                                           class="btn btn-success" title="Inactive">
                                                            <i class="glyphicon glyphicon-arrow-down"></i>
                                                        </a>
                                                    <?php } else { ?>
                                                        <a href="#"
                                                           onclick="exam_fee_active(<?php echo $v_data->id; ?>)"
                                                           class="btn btn-danger" title="Active">
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
                                            <th>Year</th>
                                            <th>Particulars</th>
                                            <th>Amount</th>
                                            <th>Status</th>
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
    <div class="modal-dialog">
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
    function add_exam_fee() {
        $.ajax({
            type: "POST",
            url: '<?php echo base_url() ?>master/exam_fee/load_add_exam_fee_from',
            success: function (result) {
                if (result) {
                    $('#load_from').html(result);
                    $('#load_title').html("Add Exam Fee");
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
    function update_exam_fee(id) {
        $.ajax({
            type: "POST",
            url: '<?php echo base_url() ?>master/exam_fee/load_update_exam_fee_from/' + id,
            success: function (result) {
                if (result) {
                    $('#load_from').html(result);
                    $('#load_title').html("Update Exam Fee");
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
    function exam_fee_active($id) {
        $.ajax({
            type: "POST",
            url: '<?php echo base_url() ?>master/exam_fee/exam_fee_active/' + $id,
            success: function (result) {
                if (result) {
                    window.location.href = "<?php echo base_url()?>master/exam_fee/all_exam_fee";
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
    function exam_fee_inactive($id) {
        $.ajax({
            type: "POST",
            url: '<?php echo base_url() ?>master/exam_fee/exam_fee_inactive/' + $id,
            success: function (result) {
                if (result) {
                    window.setTimeout(function () {
                        window.location.href = "<?php echo base_url()?>master/exam_fee/all_exam_fee";
                    }, 100);
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
    $(document).ready(function () {
        $("#ajax_pagingsearc a").attr('onclick', 'return main_page_pagination($(this));');
    });
</script>

<script>
    function main_page_pagination($this) {
        var url = $this.attr("href");
        if (url != '') {
            $.ajax({
                type: "POST",
                url: url,
                success: function (msg) {
                    $("#ajaxdata").html(msg);
                }
            });
        }
        return false;
    }
</script>