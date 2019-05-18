<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <div class="pageheader" style="background-color: #F5F5F5;">
                <h2><i class="fa fa-home"></i>Student Enroll Class Info Page <br></h2>
                <ol class="breadcrumb" style="background-color: #F5F5F5;">
                    <li><a href="<?php echo base_url() ?>academic/enroll_class/all_enroll_class">Dashboard</a></li>
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
                        <button type="button" class="btn btn-success" id="add_enroll_class" data-backdrop="static"
                                data-keyboard="false" data-toggle="modal"
                                data-target="#load_modal" onclick="return add_enroll_class();">
                            Add enroll Class
                        </button>
                    </div>
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
                                            <th>Student ID</th>
                                            <th>Student Name</th>
                                            <th>Class Roll</th>
                                            <th>Class Name</th>
                                            <th>Shift Name</th>
                                            <th>Section Name</th>
                                            <th>Study Group</th>
                                            <th>Year</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $i = 0;
                                        foreach ($enroll_class as $v_data) {
                                            $i++; ?>
                                            <tr>
                                                <td><?php echo $i; ?></td>
                                                <td><?php echo $v_data->student_id; ?></td>
                                                <td><?php echo $v_data->student_name; ?></td>
                                                <td><?php echo $v_data->class_roll; ?></td>
                                                <td><?php echo $v_data->class_name; ?></td>
                                                <td><?php echo $v_data->shift_name; ?></td>
                                                <td><?php echo $v_data->section_name; ?></td>
                                                <td><?php echo $v_data->group_name; ?></td>
                                                <td><?php echo $v_data->year; ?></td>
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
                                                    <a href="#" onclick="update_enroll_class(<?php echo $v_data->id; ?>)"
                                                       class="btn btn-success" data-backdrop="static"
                                                       data-keyboard="false" data-toggle="modal"
                                                       data-target="#load_modal" id="update_menu"
                                                       title="Update Enroll Class">
                                                        <i class="glyphicon glyphicon-edit"></i>
                                                    </a>
                                                    <?php
                                                    if ($v_data->status == 1) { ?>
                                                        <a href="#"
                                                           onclick="enroll_class_inactive(<?php echo $v_data->id; ?>)"
                                                           class="btn btn-warning" title="Inactive">
                                                            <i class="glyphicon glyphicon-arrow-down"></i>
                                                        </a>
                                                    <?php } else { ?>
                                                        <a href="#"
                                                           onclick="enroll_class_active(<?php echo $v_data->id; ?>)"
                                                           class="btn btn-warning" title="Active">
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
                                            <th>Student ID</th>
                                            <th>Student Name</th>
                                            <th>Class Roll</th>
                                            <th>Class Name</th>
                                            <th>Shift Name</th>
                                            <th>Section Name</th>
                                            <th>Study Group</th>
                                            <th>Year</th>
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
    function add_enroll_class() {
        $.ajax({
            type: "POST",
            url: '<?php echo base_url() ?>academic/enroll_class/load_add_enroll_class_from',
            success: function (result) {
                if (result) {
                    $('#load_from').html(result);
                    $('#load_title').html("Add Enroll Class");
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
    function update_enroll_class($id) {
        $.ajax({
            type: "POST",
            url: '<?php echo base_url() ?>academic/enroll_class/load_update_enroll_class_from/' + $id,
            success: function (result) {
                if (result) {
                    $('#load_from').html(result);
                    $('#load_title').html("Update Enroll Class");
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
    function enroll_class_active($id) {
        $.ajax({
            type: "POST",
            url: '<?php echo base_url() ?>academic/enroll_class/enroll_class_active/' + $id,
            success: function (result) {
                if (result) {
                    window.location.href = "<?php echo base_url()?>academic/enroll_class/all_enroll_class";
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
    function enroll_class_inactive($id) {
        $.ajax({
            type: "POST",
            url: '<?php echo base_url() ?>academic/enroll_class/enroll_class_inactive/' + $id,
            success: function (result) {
                if (result) {
                    window.setTimeout(function () {
                        window.location.href = "<?php echo base_url()?>academic/enroll_class/all_enroll_class";
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

