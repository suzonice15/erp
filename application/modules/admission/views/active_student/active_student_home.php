<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <div class="pageheader" style="background-color: #F5F5F5;">
                <h2><i class="fa fa-home"></i>Student Info Page <br></h2>
                <ol class="breadcrumb" style="background-color: #F5F5F5;">
                    <li><a href="<?php echo base_url() ?>admission/student_info/all_student">Dashboard</a></li>
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
                        <button type="button" class="btn btn-success" id="add_student" data-backdrop="static"
                                data-keyboard="false" data-toggle="modal"
                                data-target="#load_modal" onclick="return add_student();">
                            Add Student
                        </button>
                    </div>
                    
                    <div class="col-md-3">
                        <input onkeyup="return search_content();" type="text" class="form-control"
                               id="search_student_id"
                               placeholder="Search by student ID">
                    </div>
                    <div class="col-md-3">
                        <input onkeyup="return search_content();" type="text" class="form-control"
                               id="search_student_name"
                               placeholder="Search by student name">
                    </div>
                    <div class="col-md-3">
                        <select onchange="return search_content();" class="form-control" id="search_class_id"
                                name="search_class_id">
                            <option value="0">Search by class name</option>
                            <?php foreach ($class as $v_class) { ?>
                                <option
                                    value="<?php echo $v_class->id; ?>"><?php echo $v_class->name; ?></option>
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
                                            <th>Student ID</th>
                                            <th>Name</th>
                                            <th>Mobile</th>
                                            <th>Email</th>
                                            <th>picture</th>
                                            <th>Status</th>
                                            <th>Payment<br>Status</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $i = 0;
                                        foreach ($active_student as $v_data) {
                                            $i++; ?>
                                            <tr>
                                                <td><?php echo $i; ?></td>
                                                <td><?php echo $v_data->student_id; ?></td>
                                                <td><?php echo $v_data->student_name; ?></td>
                                                <td><?php echo $v_data->student_mobile_no; ?></td>
                                                <td><?php echo $v_data->student_email; ?></td>
                                                <td><img
                                                        src="<?php echo base_url() ?>public/student_picture/<?php echo $v_data->picture; ?>"
                                                        height="40" width="40">
                                                </td>
                                                <td>
                                                    <?php
                                                    if ($v_data->status == 1) {
                                                        echo "Active";
                                                    } else {
                                                        echo "Inactive";
                                                    }
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    if ($v_data->payment_status == 1) {
                                                        echo "Paid";
                                                    } else if ($v_data->payment_status == 2) {
                                                        echo "Paid(Partial)";
                                                    } else {
                                                        echo "Not Paid";
                                                    }
                                                    ?>
                                                </td>
                                                <td style="width: 150px;">
                                                    <a href="#"
                                                       onclick="update_student(<?php echo $v_data->id; ?>)"
                                                       class="btn btn-success" data-backdrop="static"
                                                       data-keyboard="false" data-toggle="modal"
                                                       data-target="#load_modal"
                                                       id="update_student"
                                                       title="Update student info">
                                                        <i class="glyphicon glyphicon-edit"></i>
                                                    </a>
                                                    <a href="#"
                                                       onclick="details_student(<?php echo $v_data->id; ?>)"
                                                       class="btn btn-success" data-backdrop="static"
                                                       data-keyboard="false" data-toggle="modal"
                                                       data-target="#load_modal"
                                                       id="details_student"
                                                       title="Details student info">
                                                        <i class="fa fa-reply-all"></i>
                                                    </a>
                                                    <?php
                                                    if ($v_data->status == 1) { ?>
                                                        <a href="#"
                                                           onclick="student_inactive(<?php echo $v_data->id; ?>)"
                                                           class="btn btn-warning" title="Inactive">
                                                            <i class="glyphicon glyphicon-arrow-down"></i>
                                                        </a>
                                                    <?php } else { ?>
                                                        <a href="#"
                                                           onclick="student_active(<?php echo $v_data->id; ?>)"
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
                                            <th>Name</th>
                                            <th>Mobile</th>
                                            <th>Email</th>
                                            <th>picture</th>
                                            <th>Status</th>
                                            <th>Payment<br>Status</th>
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
    function student_active($id) {
        $.ajax({
            type: "POST",
            url: '<?php echo base_url() ?>admission/student_info/student_active/' + $id,
            success: function (result) {
                if (result) {
                    window.location.href = "<?php echo base_url()?>admission/student_info/all_student";
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
    function student_inactive($id) {
        $.ajax({
            type: "POST",
            url: '<?php echo base_url() ?>admission/student_info/student_inactive/' + $id,
            success: function (result) {
                if (result) {
                    window.setTimeout(function () {
                        window.location.href = "<?php echo base_url()?>admission/student_info/all_student";
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
    function add_student() {
        $.ajax({
            type: "POST",
            url: '<?php echo base_url() ?>admission/student_info/load_add_student_from',
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
    function update_student(id) {
        $.ajax({
            type: "POST",
            url: '<?php echo base_url() ?>admission/student_info/load_update_student_from/' + id,
            success: function (result) {
                if (result) {
                    $('#load_from').html(result);
                    $('#load_title').html("Update Student Info");
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
    function details_student(id) {
        $.ajax({
            type: "POST",
            url: '<?php echo base_url() ?>admission/student_info/load_details_student_from/' + id,
            success: function (result) {
                if (result) {
                    $('#load_from').html(result);
                    $('#load_title').html("Details Student Info");
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
        var student_id = $('#search_student_id').val();
        var student_name = $('#search_student_name').val();
        var class_id = $('#search_class_id').val();
        if ($.trim(student_id) != "" || (student_name) != "" || (class_id) != "") {
            $.ajax({
                type: 'post',
                url: '<?php echo base_url(); ?>admission/student_info/all_student',
                data: {student_id: student_id, student_name: student_name, class_id: class_id},
                success: function (data) {
                    $("#ajaxdata").html(data);
                }
            });
        } else {
            $.post(base_url + "admission/student_info/all_student/", function (data) {
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
