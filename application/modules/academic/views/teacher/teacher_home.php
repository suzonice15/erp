<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <div class="pageheader" style="background-color: #F5F5F5;">
                <h2><i class="fa fa-home"></i>Employee Resume Info Page <br></h2>
                <ol class="breadcrumb" style="background-color: #F5F5F5;">
                    <li><a href="<?php echo base_url() ?>hr/resume/all_resume">Dashboard</a></li>
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
                        <input onkeyup="return search_content();" type="text" class="form-control" id="search_emp_id"
                               placeholder="Search by employee ID">
                    </div>
                    <div class="col-md-3">
                        <input onkeyup="return search_content();" type="text" class="form-control" id="search_emp_name"
                               placeholder="Search by employee name">
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
                                            <th>Name</th>
                                            <th>Employee ID</th>
                                            <th>Picture</th>
                                            <th>Mobile No</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $i = 0;
                                        foreach ($teacher as $v_data) {
                                            $i++; ?>
                                            <tr>
                                                <td><?php echo $i; ?></td>
                                                <td><?php echo $v_data->emp_name; ?></td>
                                                <td><?php echo $v_data->emp_id; ?></td>
                                                <td>
                                                    <?php if ($v_data->profile_picture) { ?>
                                                        <img
                                                            src="<?php echo base_url() ?>public/emp_profile/<?php echo $v_data->profile_picture; ?>"
                                                            height="40" width="40">
                                                    <?php } else { ?>
                                                        <img
                                                            src="<?php echo base_url() ?>public/emp_profile/demo_picture.jpg"
                                                            height="50" width="50">
                                                    <?php } ?>
                                                </td>
                                                <td><?php echo $v_data->mobile_no1; ?></td>
                                                <td style="width: 150px;">
                                                    <a href="#"
                                                       onclick="details_teacher(<?php echo $v_data->emp_id; ?>)"
                                                       class="btn btn-success" data-backdrop="static"
                                                       data-keyboard="false" data-toggle="modal"
                                                       data-target="#load_modal"
                                                       id="details_teacher"
                                                       title="Details teacher info">
                                                        <i class="fa fa-reply-all"></i>
                                                    </a>

                                                    <a href="#"
                                                       onclick="class_teacher(<?php echo $v_data->emp_id; ?>)"
                                                       class="btn btn-success" data-backdrop="static"
                                                       data-keyboard="false" data-toggle="modal"
                                                       data-target="#load_modal"
                                                       id="class_teacher"
                                                       title="Add Class Teacher">
                                                        <i class="fa fa-user-plus"></i>
                                                    </a>
                                                    <a href="#"
                                                       onclick="subject_teacher(<?php echo $v_data->emp_id; ?>)"
                                                       class="btn btn-success" data-backdrop="static"
                                                       data-keyboard="false" data-toggle="modal"
                                                       data-target="#load_modal"
                                                       id="class_teacher"
                                                       title="Add Subject Teacher">
                                                        <i class="fa fa-book"></i>
                                                    </a>

                                                </td>
                                            </tr>
                                        <?php } ?>
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <th>SL NO</th>
                                            <th>Name</th>
                                            <th>Employee ID</th>
                                            <th>Picture</th>
                                            <th>Mobile No</th>
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
    function details_teacher($emp_id) {
        $.ajax({
            type: "POST",
            url: '<?php echo base_url() ?>academic/teacher/load_details_teacher_from/' + $emp_id,
            success: function (result) {
                if (result) {
                    $('#load_from').html(result);
                    $('#load_title').html("Add Student Info");
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
    function class_teacher($emp_id) {
        $.ajax({
            type: "POST",
            url: '<?php echo base_url() ?>academic/teacher/load_class_teacher_from/' + $emp_id,
            success: function (result) {
                if (result) {
                    $('#load_from').html(result);
                    $('#load_title').html("Add Class Teacher");
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
    function subject_teacher($emp_id) {
        $.ajax({
            type: "POST",
            url: '<?php echo base_url() ?>academic/teacher/load_subject_teacher_from/' + $emp_id,
            success: function (result) {
                if (result) {
                    $('#load_from').html(result);
                    $('#load_title').html("Add Subject teacher");
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
        var emp_name = $('#search_emp_name').val();

        if ($.trim(emp_id) != "" || (emp_name) != "") {
            $.ajax({
                type: 'post',
                url: '<?php echo base_url(); ?>academic/teacher/all_teacher',
                data: {emp_id: emp_id,emp_name:emp_name},
                success: function (data) {
                    $("#ajaxdata").html(data);
                }
            });
        } else {
            $.post(base_url + "academic/teacher/all_teacher/", function (data) {
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

