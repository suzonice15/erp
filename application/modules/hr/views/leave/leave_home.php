<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <div class="pageheader" style="background-color: #F5F5F5;">
                <h2><i class="fa fa-home"></i>Employee Leave Info Page <br></h2>
                <ol class="breadcrumb" style="background-color: #F5F5F5;">
                    <li><a href="<?php echo base_url() ?>hr/leave/all_leave">Dashboard</a></li>
                    <li class="active">Add edit delete view.....</li>
                    <?php
                    $role_id = $this->session->userdata("role_id");
                    ?>
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
                                data-target="#load_modal" onclick="return add_leave();">
                            Add leave Info
                        </button>
                    </div>
                    <?php if (($role_id == 1) || ($role_id == 3) || ($role_id == 5) || ($role_id == 6)) { ?>
                        <div class="col-md-2">
                            <input onkeyup="return search_content();" type="text" class="form-control"
                                   id="search_emp_id"
                                   placeholder="Employee ID">
                        </div>
                    <?php } ?>
                    <?php if (($role_id == 1) || ($role_id == 5) || ($role_id == 6)) { ?>
                        <div class="col-md-2">
                            <select onchange="return search_content();" id="search_department_id" class="form-control">
                                <option value="">Department</option>
                                <?php foreach ($department as $v_department) { ?>
                                    <option
                                        value="<?php echo $v_department->id; ?>"><?php echo $v_department->department_name; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    <?php } ?>
                    <div class="col-md-2">
                        <select onchange="return search_content();" id="search_leave_type_id" class="form-control">
                            <option value="">Leave Type</option>
                            <?php foreach ($leave_type as $v_leave_type) { ?>
                                <option
                                    value="<?php echo $v_leave_type->id; ?>"><?php echo $v_leave_type->leave_name; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <input type="text" id="search_from_date" placeholder="From date" class="form-control from_date">
                    </div>
                    <div class="col-md-2">
                        <input type="text" onchange="return search_content();" placeholder="To date" id="search_to_date"
                               class="form-control to_date">
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
                                            <th>Leave Name</th>
                                            <th>From Date</th>
                                            <th>To Date</th>
                                            <th>Duration</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $i = 0;
                                        foreach ($leave as $v_data) {
                                            $i++; ?>
                                            <tr>
                                                <td><?php echo $i; ?></td>
                                                <td><?php echo $v_data->emp_id; ?></td>
                                                <td><?php echo $v_data->department_name; ?></td>
                                                <td><?php echo $v_data->shift_name; ?></td>
                                                <td><?php echo $v_data->section_name; ?></td>
                                                <td><?php echo $v_data->leave_name; ?></td>
                                                <td><?php echo $v_data->from_date; ?></td>
                                                <td><?php echo $v_data->to_date; ?></td>
                                                <td><?php echo $v_data->duration; ?></td>
                                                <td style="width: 110px;">
                                                    <a href="#"
                                                       onclick="details_leave(<?php echo $v_data->id; ?>)"
                                                       class="btn btn-success" data-backdrop="static"
                                                       data-keyboard="false" data-toggle="modal"
                                                       data-target="#load_modal"
                                                       title="Details leave info">
                                                        <i class="fa fa-reply-all"></i>
                                                    </a>
                                                    <?php if (($role_id == 7) && ($v_data->status != 100)) { ?>
                                                        <a href="#"
                                                           onclick="update_leave(<?php echo $v_data->id; ?>)"
                                                           class="btn btn-success" data-backdrop="static"
                                                           data-keyboard="false" data-toggle="modal"
                                                           data-target="#load_modal"
                                                           title="Update leave info">
                                                            <i class="glyphicon glyphicon-edit"></i>
                                                        </a>
                                                    <?php } else { ?>
                                                        <a href="#" class="btn btn-success" disabled="disabled"
                                                           title="Update leave info">
                                                            <i class="glyphicon glyphicon-edit"></i>
                                                        </a>
                                                    <?php } ?>
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
                                            <th>Leave Name</th>
                                            <th>From Date</th>
                                            <th>To Date</th>
                                            <th>Duration</th>
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
    $('body').on('focus', ".from_date", function () {
        $(this).datepicker({dateFormat: 'yy-mm-dd', changeYear: true, changeMonth: true, yearRange: "1970:2100"});
    });
    $('body').on('focus', ".to_date", function () {
        $(this).datepicker({dateFormat: 'yy-mm-dd', changeYear: true, changeMonth: true, yearRange: "1970:2100"});
    });
</script>
<script>
    function add_leave() {
        $.ajax({
            type: "POST",
            url: '<?php echo base_url() ?>hr/leave/load_add_leave_from',
            success: function (result) {
                if (result) {
                    $('#load_from').html(result);
                    $('#load_title').html("Add Employee Leave Info");
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
    function update_leave($id) {
        $.ajax({
            type: "POST",
            url: '<?php echo base_url() ?>hr/leave/load_update_leave_from/' + $id,
            success: function (result) {
                if (result) {
                    $('#load_from').html(result);
                    $('#load_title').html("Update Employee Leave Info");
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
    function details_leave($id) {
        $.ajax({
            type: "POST",
            url: '<?php echo base_url() ?>hr/leave/details_leave/' + $id,
            success: function (result) {
                if (result) {
                    $('#load_from').html(result);
                    $('#load_title').html("Details Employee leave Info");
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
        var department_id = $('#search_department_id').val();
        var leave_type_id = $('#search_leave_type_id').val();
        var from_date = $('#search_from_date').val();
        var to_date = $('#search_to_date').val();

        if ($.trim(emp_id) != "" || (department_id) != "" || (leave_type_id) != "" || (from_date) != "" || (to_date) != "") {
            $.ajax({
                type: 'post',
                url: '<?php echo base_url(); ?>hr/leave/all_leave',
                data: {
                    emp_id: emp_id,
                    department_id: department_id,
                    leave_type_id: leave_type_id,
                    from_date: from_date,
                    to_date: to_date
                },
                success: function (data) {
                    $("#ajaxdata").html(data);
                }
            });
        } else {
            $.post(base_url + "hr/leave/all_leave/", function (data) {
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
        var department_id = $('#search_department_id').val();
        var leave_type_id = $('#search_leave_type_id').val();
        var from_date = $('#search_from_date').val();
        var to_date = $('#search_to_date').val();
        if (url != '') {
            $.ajax({
                type: "POST",
                url: url,
                data: {
                    emp_id: emp_id,
                    department_id: department_id,
                    leave_type_id: leave_type_id,
                    from_date: from_date,
                    to_date: to_date
                },
                success: function (msg) {
                    $("#ajaxdata").html(msg);
                }
            });
        }
        return false;
    }
</script>

