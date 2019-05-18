<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <div class="pageheader" style="background-color: #F5F5F5;">
                <h2><i class="fa fa-home"></i>Employee previous job history page <br></h2>
                <ol class="breadcrumb" style="background-color: #F5F5F5;">
                    <li><a href="<?php echo base_url() ?>hr/previous_job_history/all_previous_job_history">Dashboard</a></li>
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
                        <button type="button" class="btn btn-success" data-backdrop="static"
                                data-keyboard="false" data-toggle="modal"
                                data-target="#load_modal" onclick="return add_previous_job_history();">
                            Add Previous Job
                        </button>
                    </div>
                    <div class="col-md-3">
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
                                            <th>Employee ID</th>
                                            <th>Organization Name</th>
                                            <th>Address</th>
                                            <th>Position</th>
                                            <th>Job Type</th>
                                            <th>From Date</th>
                                            <th>To Date</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $i = 0;
                                        foreach ($previous_job_history as $v_data) {
                                            $i++; ?>
                                            <tr>
                                                <td><?php echo $i; ?></td>
                                                <td><?php echo $v_data->emp_id; ?></td>
                                                <td><?php echo $v_data->organization_name; ?></td>
                                                <td><?php echo $v_data->address; ?></td>
                                                <td><?php echo $v_data->position; ?></td>
                                                <td><?php echo $v_data->job_type; ?></td>
                                                <td><?php echo $v_data->from_date; ?></td>
                                                <td><?php echo $v_data->to_date; ?></td>
                                                <td style="width: 110px;">
                                                    <a href="#"
                                                       onclick="details_previous_job_history(<?php echo $v_data->emp_id; ?>)"
                                                       class="btn btn-success" data-backdrop="static"
                                                       data-keyboard="false" data-toggle="modal"
                                                       data-target="#load_modal"
                                                       title="Details Contact Info">
                                                        <i class="fa fa-reply-all"></i>
                                                    </a>
                                                    <a href="#"
                                                       onclick="update_previous_job_history(<?php echo $v_data->emp_id; ?>)"
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
                                            <th>Organization Name</th>
                                            <th>Address</th>
                                            <th>Position</th>
                                            <th>Job Type</th>
                                            <th>From Date</th>
                                            <th>To Date</th>
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
    function add_previous_job_history() {
        $.ajax({
            type: "POST",
            url: '<?php echo base_url() ?>hr/previous_job_history/load_add_previous_job_history_from',
            success: function (result) {
                if (result) {
                    $('#load_from').html(result);
                    $('#load_title').html("Add Previous Job History Info");
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
    function update_previous_job_history($id) {
        $.ajax({
            type: "POST",
            url: '<?php echo base_url() ?>hr/previous_job_history/load_update_previous_job_history_from/' + $id,
            success: function (result) {
                if (result) {
                    $('#load_from').html(result);
                    $('#load_title').html("Update Previous Job History Info");
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
    function details_previous_job_history($id) {
        $.ajax({
            type: "POST",
            url: '<?php echo base_url() ?>hr/previous_job_history/load_details_previous_job_history_from/' + $id,
            success: function (result) {
                if (result) {
                    $('#load_from').html(result);
                    $('#load_title').html("Details Previous Job History Info");
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
        
        if ($.trim(emp_id) != "") {
            $.ajax({
                type: 'post',
                url: '<?php echo base_url(); ?>hr/previous_job_history/all_previous_job_history',
                data: {emp_id: emp_id},
                success: function (data) {
                    $("#ajaxdata").html(data);
                }
            });
        } else {
            $.post(base_url + "hr/previous_job_history/all_previous_job_history/", function (data) {
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
        
        if (url != '') {
            $.ajax({
                type: "POST",
                url: url,
                data: {emp_id: emp_id},
                success: function (msg) {
                    $("#ajaxdata").html(msg);
                }
            });
        }
        return false;
    }
</script>

