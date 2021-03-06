<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <div class="pageheader" style="background-color: #F5F5F5;">
                <h2><i class="fa fa-home"></i>Employee Job Info Page <br></h2>
                <ol class="breadcrumb" style="background-color: #F5F5F5;">
                    <li><a href="<?php echo base_url() ?>hr/job/all_job">Dashboard</a></li>
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
                        <button type="button" class="btn btn-success" id="add_job" data-backdrop="static"
                                data-keyboard="false" data-toggle="modal"
                                data-target="#load_modal" onclick="return add_job();">
                            Add job Info
                        </button>
                    </div>
                    <div class="col-md-3">
                        <input onkeyup="return search_content();" type="text" class="form-control" id="search_emp_id"
                               placeholder="Search by employee ID">
                    </div>
                    <div class="col-md-3">
                        <select onchange="return search_content();" class="form-control" id="search_department_id"
                                name="search_module_id">
                            <option value="0">Search by department name</option>
                            <?php foreach ($department as $v_department) { ?>
                                <option
                                    value="<?php echo $v_department->id; ?>"><?php echo $v_department->department_name;?></option>
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
                                            <th>Designation</th>
                                            <th>Joining Date</th>
                                            <th>Released Date</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $i = 0;
                                        foreach ($job as $v_data) {
                                            $i++; ?>
                                            <tr>
                                                <td><?php echo $i; ?></td>
                                                <td><?php echo $v_data->emp_id; ?></td>
                                                <td><?php echo $v_data->department_name; ?></td>
                                                <td><?php echo $v_data->shift_name; ?></td>
                                                <td><?php echo $v_data->section_name; ?></td>
                                                <td><?php echo $v_data->designation_name; ?></td>
                                                <td><?php echo $v_data->joining_date; ?></td>
                                                <td><?php echo $v_data->date; ?></td>
                                                <td>
                                                    <?php
                                                    if ($v_data->status == 1) {
                                                        echo "Active";
                                                    } else {
                                                        echo "Inactive";
                                                    }
                                                    ?>
                                                </td>
                                                <td style="width: 150px;">
                                                    <a href="#"
                                                       onclick="update_job(<?php echo $v_data->id; ?>)"
                                                       class="btn btn-success" data-backdrop="static"
                                                       data-keyboard="false" data-toggle="modal"
                                                       data-target="#load_modal"
                                                       id="update_job"
                                                       title="Update emp basic info">
                                                        <i class="glyphicon glyphicon-edit"></i>
                                                    </a>
                                                    <button type="button" class="btn btn-danger btn btn-small"
                                                            data-backdrop="static"
                                                            data-keyboard="false" data-toggle="modal"
                                                            data-target="#load_modal" onclick="return released_note(<?php echo $v_data->id;?>);">
                                                        Released
                                                    </button>
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
                                            <th>Designation</th>
                                            <th>Joining Date</th>
                                            <th>Released Date</th>
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
    function add_job() {
        $.ajax({
            type: "POST",
            url: '<?php echo base_url() ?>hr/job/load_add_job_from',
            success: function (result) {
                if (result) {
                    $('#load_from').html(result);
                    $('#load_title').html("Add Employee Job Info");
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
    function update_job(id) {
        $.ajax({
            type: "POST",
            url: '<?php echo base_url() ?>hr/job/load_update_job_from/' + id,
            success: function (result) {
                if (result) {
                    $('#load_from').html(result);
                    $('#load_title').html("Update Employee Job Info");
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
            url: '<?php echo base_url() ?>hr/job/load_released_note_from/' + $id,
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
        var emp_id = $('#search_emp_id').val();
        var department_id = $('#search_department_id').val();
        if ($.trim(emp_id) != "" || (department_id) != "") {
            $.ajax({
                type: 'post',
                url: '<?php echo base_url(); ?>hr/job/all_job',
                data: {emp_id: emp_id, department_id: department_id},
                success: function (data) {
                    $("#ajaxdata").html(data);
                }
            });
        } else {
            $.post(base_url + "hr/job/all_job/", function (data) {
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
