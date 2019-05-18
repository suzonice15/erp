<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <div class="pageheader" style="background-color: #F5F5F5;">
                <h2><i class="fa fa-home"></i>Employee additional and deduction Info Page <br></h2>
                <ol class="breadcrumb" style="background-color: #F5F5F5;">
                    <li><a href="<?php echo base_url() ?>hr/additional_and_deduction/all_additional_and_deduction">Dashboard</a>
                    </li>
                    <li class="active">Add edit delete view.....</li>
                </ol>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading" style="height: 55px;">
                    <div class="col-md-3">
                        <button type="button" class="btn btn-success" id="add_additional_and_deduction"
                                data-backdrop="static"
                                data-keyboard="false" data-toggle="modal"
                                data-target="#load_modal" onclick="return add_additional_and_deduction();">
                            Add Additional&deduction
                        </button>
                    </div>
                    <div class="col-md-3">
                        <select onchange="return search_content();" class="form-control" id="search_department_id"
                                name="search_module_id">
                            <option value="0">Search by department name</option>
                            <?php foreach ($department as $v_department) { ?>
                                <option
                                    value="<?php echo $v_department->id; ?>"><?php echo $v_department->department_name; ?></option>
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
                                            <th>Department</th>
                                            <th>Shift</th>
                                            <th>Section</th>
                                            <th>Year</th>
                                            <th>Month</th>
                                            <th>Amount</th>
                                            <th>Type</th>
                                            <th>Additional&Deduction</th>
                                            <th>Remarks</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $i = 0;
                                        foreach ($additional_and_deduction as $v_data) {
                                            $i++; ?>
                                            <tr>
                                                <td><?php echo $i; ?></td>
                                                <td><?php echo $v_data->emp_id; ?></td>
                                                <td><?php echo $v_data->department_name; ?></td>
                                                <td><?php echo $v_data->shift_name; ?></td>
                                                <td><?php echo $v_data->section_name; ?></td>
                                                <td><?php echo $v_data->year; ?></td>
                                                <td>
                                                    <?php
                                                    $dateObj = DateTime::createFromFormat('!m', $v_data->month);
                                                    echo $monthName = $dateObj->format('F'); // March
                                                    ?>
                                                </td>
                                                <td><?php echo $v_data->amount; ?></td>
                                                <td>
                                                    <?php
                                                    if ($v_data->type == 1) {
                                                        echo "Additional";
                                                    } else {
                                                        echo "Deduction";
                                                    }
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    if ($v_data->type == 1) {
                                                        if ($v_data->additional_and_deduction_type == 1) {
                                                            echo "Arrears";
                                                        } else {
                                                            echo "Other";
                                                        }
                                                    } else {
                                                        if ($v_data->additional_and_deduction_type == 1) {
                                                            echo "Overdrawn";
                                                        } else if ($v_data->additional_and_deduction_type == 2) {
                                                            echo "Advance";
                                                        } else {
                                                            echo "Other";
                                                        }
                                                    }
                                                    ?>
                                                </td>
                                                <td><?php echo $v_data->remarks; ?></td>

                                                <td style="width: 70px;">
                                                    <a href="#"
                                                       onclick="update_additional_and_deduction(<?php echo $v_data->id; ?>)"
                                                       class="btn btn-success" data-backdrop="static"
                                                       data-keyboard="false" data-toggle="modal"
                                                       data-target="#load_modal"
                                                       id="update_additional_and_deduction"
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
                                            <th>Employee ID</th>
                                            <th>Department</th>
                                            <th>Shift</th>
                                            <th>Section</th>
                                            <th>Year</th>
                                            <th>Month</th>
                                            <th>Amount</th>
                                            <th>Type</th>
                                            <th>Additional&Deduction</th>
                                            <th>Remarks</th>
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
    function add_additional_and_deduction() {
        $.ajax({
            type: "POST",
            url: '<?php echo base_url() ?>hr/additional_and_deduction/load_add_additional_and_deduction_from',
            success: function (result) {
                if (result) {
                    $('#load_from').html(result);
                    $('#load_title').html("Add additional_and_deduction Info");
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
    function update_additional_and_deduction($id) {
        $.ajax({
            type: "POST",
            url: '<?php echo base_url() ?>hr/additional_and_deduction/load_update_additional_and_deduction_from/' + $id,
            success: function (result) {
                if (result) {
                    $('#load_from').html(result);
                    $('#load_title').html("Update additional_and_deduction Info");
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
    function released_note($id) {
        $.ajax({
            type: "POST",
            url: '<?php echo base_url() ?>hr/additional_and_deduction/load_released_note_from/' + $id,
            success: function (result) {
                if (result) {
                    $('#load_from').html(result);
                    $('#load_title').html("Employee released note");
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
        var department_id = $('#search_department_id').val();
        if ($.trim(department_id) != "") {
            $.ajax({
                type: 'post',
                url: '<?php echo base_url(); ?>hr/additional_and_deduction/all_additional_and_deduction',
                data: {department_id: department_id},
                success: function (data) {
                    $("#ajaxdata").html(data);
                }
            });
        } else {
            $.post(base_url + "hr/additional_and_deduction/all_additional_and_deduction/", function (data) {
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
        var department_id = $('#search_department_id').val();
        if (url != '') {
            $.ajax({
                type: "POST",
                url: url,
                data: {department_id: department_id},
                success: function (msg) {
                    $("#ajaxdata").html(msg);
                }
            });
        }
        return false;
    }
</script>
