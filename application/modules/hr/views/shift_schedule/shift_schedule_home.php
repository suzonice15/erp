<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <div class="pageheader" style="background-color: #F5F5F5;">
                <h2><i class="fa fa-home"></i>Shift Schedule Info Page <br></h2>
                <ol class="breadcrumb" style="background-color: #F5F5F5;">
                    <li><a href="<?php echo base_url() ?>hr/shift_schedule/all_shift_schedule">Dashboard</a></li>
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
                                data-target="#load_modal" onclick="return add_shift_schedule();">
                            Add shift Schedule
                        </button>
                    </div>
                    <div class="col-md-2">
                        <input onkeyup="return search_content();" type="text" class="form-control" id="search_emp_id"
                               placeholder="Search by employee ID">
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
                                            <th>Shift Name</th>
                                            <th>In Time</th>
                                            <th>Out Tome</th>
                                            <th>Late Time</th>
                                            <th>Early Out</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $i = 0;
                                        foreach ($shift_schedule as $v_data) {
                                            $i++; ?>
                                            <tr>
                                                <td><?php echo $i; ?></td>
                                                <td><?php echo $v_data->shift_name; ?></td>
                                                <td><?php echo $v_data->in_time; ?></td>
                                                <td><?php echo $v_data->out_time; ?></td>
                                                <td><?php echo $v_data->late_time; ?></td>
                                                <td><?php echo $v_data->early_out; ?></td>
                                                <td>
                                                    <?php if ($v_data->status == 1) { ?>
                                                        <p style="color: green">Active</p>
                                                    <?php } else { ?>
                                                        <p style="color:red">Inactive</p>
                                                    <?php } ?>
                                                </td>
                                                <td style="width: 110px;">
                                                    <?php
                                                    if ($v_data->status == 1) { ?>
                                                        <a href="#"
                                                           onclick="shift_schedule_inactive(<?php echo $v_data->id; ?>)"
                                                           class="btn btn-warning" title="Inactive">
                                                            <i class="glyphicon glyphicon-arrow-down"></i>
                                                        </a>
                                                    <?php } else { ?>
                                                        <a href="#"
                                                           onclick="shift_schedule_active(<?php echo $v_data->id; ?>)"
                                                           class="btn btn-warning" title="Active">
                                                            <i class="glyphicon glyphicon-arrow-up"></i>
                                                        </a>
                                                    <?php } ?>

                                                    <?php if ($v_data->status == 1) { ?>
                                                        <a href="#"
                                                           onclick="update_shift_schedule(<?php echo $v_data->id; ?>)"
                                                           class="btn btn-success" data-backdrop="static"
                                                           data-keyboard="false" data-toggle="modal"
                                                           data-target="#load_modal"
                                                           title="Update weekend info">
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
                                            <th>Shift Name</th>
                                            <th>In Time</th>
                                            <th>Out Tome</th>
                                            <th>Late Time</th>
                                            <th>Early Out</th>
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
    function add_shift_schedule() {
        $.ajax({
            type: "POST",
            url: '<?php echo base_url() ?>hr/shift_schedule/load_add_shift_schedule_from',
            success: function (result) {
                if (result) {
                    $('#load_from').html(result);
                    $('#load_title').html("Add Shift Schedule Info");
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
    function update_shift_schedule($id) {
        $.ajax({
            type: "POST",
            url: '<?php echo base_url() ?>hr/shift_schedule/load_update_shift_schedule_from/' + $id,
            success: function (result) {
                if (result) {
                    $('#load_from').html(result);
                    $('#load_title').html("Update Employee weekend Info");
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
    function shift_schedule_active($id) {
        $.ajax({
            type: "POST",
            url: '<?php echo base_url() ?>hr/shift_schedule/shift_schedule_active/' + $id,
            success: function (result) {
                if (result) {
                    window.location.href = "<?php echo base_url()?>hr/shift_schedule/all_shift_schedule";
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
    function shift_schedule_inactive($id) {
        $.ajax({
            type: "POST",
            url: '<?php echo base_url() ?>hr/shift_schedule/shift_schedule_inactive/' + $id,
            success: function (result) {
                if (result) {
                    window.setTimeout(function () {
                        window.location.href = "<?php echo base_url()?>hr/shift_schedule/all_shift_schedule";
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


