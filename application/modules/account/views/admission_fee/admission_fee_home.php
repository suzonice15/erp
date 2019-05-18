<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <div class="pageheader" style="background-color: #F5F5F5;">
                <h2><i class="fa fa-home"></i>Admission Fee Info Page <br></h2>
                <ol class="breadcrumb" style="background-color: #F5F5F5;">
                    <li><a href="<?php echo base_url() ?>account/student/all_admission_fee">Dashboard</a></li>
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
                                data-target="#load_modal" onclick="return add_admission_fee();">
                            Add Admission Fee
                        </button>
                    </div>
                    <div class="col-md-3">
                        <input onkeyup="return search_content();" type="text" class="form-control"
                               id="search_student_id"
                               placeholder="Search by student ID">
                    </div>
                    <div class="col-md-3">
                        <select onchange="return search_content();" class="form-control" id="search_year"
                                name="year">
                            <option value="0">Search by year</option>
                            <option value="2017">2017</option>
                            <option value="2018">2018</option>
                            <option value="2019">2019</option>
                            <option value="2020">2020</option>
                        </select>
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
                                            <th>Picture</th>
                                            <th>Class</th>
                                            <th>Payment Date</th>
                                            <th>Paid Amount</th>
                                            <th>Due Amount</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $i = 0;
                                        foreach ($admission_fee as $v_data) {
                                            $i++; ?>
                                            <tr>
                                                <td><?php echo $i; ?></td>
                                                <td><?php echo $v_data->student_id; ?></td>
                                                <td><?php echo $v_data->student_name; ?></td>
                                                <td>
                                                    <img
                                                        src="<?php echo base_url() ?>public/student_picture/<?php echo $v_data->picture; ?>"
                                                        height="40" width="40">
                                                </td>
                                                <td><?php echo $v_data->class_name; ?></td>
                                                <td><?php echo $v_data->payment_date; ?></td>
                                                <td><?php echo $v_data->paid_amount; ?></td>
                                                <td><?php echo $v_data->due_amount; ?></td>
                                                <td style="width: 110px;">
                                                    <a href="#"
                                                       onclick="update_admission_fee(<?php echo $v_data->id; ?>)"
                                                       class="btn btn-success" data-backdrop="static"
                                                       data-keyboard="false" data-toggle="modal"
                                                       data-target="#load_modal"
                                                       id="update_student"
                                                       title="Update admission fee">
                                                        <i class="glyphicon glyphicon-edit"></i>
                                                    </a>
                                                    <a class="btn btn-warning"
                                                       href="<?php echo base_url() ?>account/admission_fee/create_pdf/<?php echo $v_data->year; ?>/<?php echo $v_data->student_id; ?>">
                                                        <i class="fa fa-file-pdf-o"></i></a>
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
    function add_admission_fee() {
        $.ajax({
            type: "POST",
            url: '<?php echo base_url() ?>account/admission_fee/load_add_admission_fee_from',
            success: function (result) {
                if (result) {
                    $('#load_from').html(result);
                    $('#load_title').html("Add Admission Fee");
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
    function update_admission_fee(id) {
        $.ajax({
            type: "POST",
            url: '<?php echo base_url() ?>account/admission_fee/load_update_admission_fee_from/' + id,
            success: function (result) {
                if (result) {
                    $('#load_from').html(result);
                    $('#load_title').html("Update admission fee");
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
        var year = $('#search_year').val();
        var class_id = $('#search_class_id').val();
        if ($.trim(student_id) != "" || (year) != "" || (class_id) != "") {
            $.ajax({
                type: 'post',
                url: '<?php echo base_url(); ?>account/admission_fee/all_admission_fee',
                data: {student_id: student_id, year: year, class_id: class_id},
                success: function (data) {
                    $("#ajaxdata").html(data);
                }
            });
        } else {
            $.post(base_url + "account/admission_fee/all_admission_fee/", function (data) {
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
