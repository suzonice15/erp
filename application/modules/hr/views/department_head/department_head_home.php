<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <div class="pageheader" style="background-color: #F5F5F5;">
                <h2><i class="fa fa-home"></i>Department Head Info Page <br></h2>
                <ol class="breadcrumb" style="background-color: #F5F5F5;">
                    <li><a href="<?php echo base_url() ?>hr/department_head/all_department_head">Dashboard</a></li>
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
                                data-target="#load_modal" onclick="return add_department_head();">
                            Add Department Head
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
                                            <th>Name</th>
                                            <th>Department</th>
                                            <th>Start Date</th>
                                            <th>End Date</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $i = 0;
                                        foreach ($department_head as $v_data) {
                                            $i++; ?>
                                            <tr>
                                                <td><?php echo $i; ?></td>
                                                <td><?php echo $v_data->user_id; ?></td>
                                                <td><?php echo $v_data->emp_name; ?></td>
                                                <td><?php echo $v_data->department_name; ?></td>
                                                <td><?php echo $v_data->start_date; ?></td>
                                                <td><?php echo $v_data->end_date; ?></td>
                                                <td>
                                                    <?php if ($v_data->status == 1) { ?>
                                                        <p style="color: green">Present</p>
                                                    <?php } else { ?>
                                                        <p style="color:red">Before</p>
                                                    <?php } ?>
                                                </td>
                                                <td style="width: 90px;">
                                                    <?php if ($v_data->status == 1) { ?>
                                                        <a href="#"
                                                           onclick="update_department_head(<?php echo $v_data->id; ?>)"
                                                           class="btn btn-success" data-backdrop="static"
                                                           data-keyboard="false" data-toggle="modal"
                                                           data-target="#load_modal"
                                                           title="Update department">
                                                            <i class="glyphicon glyphicon-edit"></i>
                                                        </a>
                                                    <?php } else { ?>
                                                        <a href="#" disabled="disabled" class="btn btn-success"
                                                           data-backdrop="static">
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
                                            <th>Name</th>
                                            <th>Department</th>
                                            <th>Start Date</th>
                                            <th>End Date</th>
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
    function add_department_head() {
        $.ajax({
            type: "POST",
            url: '<?php echo base_url() ?>hr/department_head/load_add_department_head_from',
            success: function (result) {
                if (result) {
                    $('#load_from').html(result);
                    $('#load_title').html("Add Department Head Info");
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
    function update_department_head($id) {
        $.ajax({
            type: "POST",
            url: '<?php echo base_url() ?>hr/department_head/load_update_department_head_from/' + $id,
            success: function (result) {
                if (result) {
                    $('#load_from').html(result);
                    $('#load_title').html("Update Department Info");
                    return false;
                } else {
                    return false;
                }
            }
        });
        return false;
    }
</script>