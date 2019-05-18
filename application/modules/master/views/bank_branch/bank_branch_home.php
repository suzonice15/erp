<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <div class="pageheader" style="background-color: #F5F5F5;">
                <h2><i class="fa fa-home"></i> Master bank branch Page <br></h2>
                <ol class="breadcrumb" style="background-color: #F5F5F5;">
                    <li><a href="<?php echo base_url() ?>master/bank_branch/all_bank_branch" style="color: #0c0c0c;">Dashboard</a>
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
                    <div class="col-md-2">
                        <button type="button" class="btn btn-success" id="add_bank_branch" data-backdrop="static"
                                data-keyboard="false" data-toggle="modal"
                                data-target="#add_bank_branch_modal" onclick="return add_bank_branch();">
                            Add bank branch
                        </button>
                    </div>

                    <div class="col-md-4">
                        <select onchange="return search_content_by_id();"  class="form-control" id="search_bank_id">
                            <option value="0">Search by bank name</option>
                            <?php foreach ($bank as $v_bank) { ?>
                                <option value="<?php echo $v_bank->id;?>"><?php echo $v_bank->bank_name;?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <input onkeyup="return search_content();" type="text" class="form-control" id="search_bank_branch_name"
                               placeholder="Search by bank branch name">
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
                                            <th>Bank Name</th>
                                            <th>Bank Branch Name</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $i = 0;
                                        foreach ($bank_branch as $v_data) {
                                            $i++; ?>
                                            <tr>
                                                <td><?php echo $i; ?></td>
                                                <td><?php echo $v_data->bank_name; ?></td>
                                                <td><?php echo $v_data->bank_branch_name; ?></td>
                                                <td style="width: 145px;">
                                                    <a href="#" onclick="update_bank_branch(<?php echo $v_data->id; ?>)"
                                                       class="btn btn-success" data-backdrop="static"
                                                       data-keyboard="false" data-toggle="modal"
                                                       data-target="#update_bank_branch_modal" id="update_bank_branch"
                                                       title="Update bank_branch">
                                                        <i class="glyphicon glyphicon-edit"></i>
                                                    </a>
                                                    <a href="#" onclick="delete_bank_branch(<?php echo $v_data->id; ?>)"
                                                       class="btn btn-danger" title="Delete bank_branch">
                                                        <i class="glyphicon glyphicon-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <th>SL NO</th>
                                            <th>bank Name</th>
                                            <th>bank_branch Name</th>
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

<div class="modal inmodal" id="add_bank_branch_modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content animated fadeIn">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
                        class="sr-only">Close</span></button>
                <h4 class="modal-title text-center">Add bank branch</h4>
            </div>
            <div class="modal-body">
                <div id="load_add_bank_branch_from">
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

<div class="modal inmodal" id="update_bank_branch_modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content animated fadeIn">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
                        class="sr-only">Close</span></button>
                <h4 class="modal-title text-center">Update bank_branch</h4>
            </div>
            <div class="modal-body">
                <div id="load_update_bank_branch_from">

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
    function add_bank_branch() {
        $.ajax({
            type: "POST",
            url: '<?php echo base_url() ?>master/bank_branch/load_add_bank_branch_from',
            success: function (result) {
                if (result) {
                    $('#load_add_bank_branch_from').html(result);
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
    function update_bank_branch($id) {
        $.ajax({
            type: "POST",
            url: '<?php echo base_url() ?>master/bank_branch/load_update_bank_branch_from/' + $id,
            success: function (result) {
                if (result) {
                    $('#load_update_bank_branch_from').html(result);
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
    function delete_bank_branch($id) {
        swal({
                title: "Are you sure?",
                text: "You will not be able to recover this imaginary file!",
                type: "warning",
                showCancelButton: true,
                confirmButtonClass: 'btn-danger',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: "No, cancel plx!",
                closeOnConfirm: false,
                closeOnCancel: false
            },
            function (isConfirm) {
                if (isConfirm) {
                    $.ajax({
                        type: "POST",
                        url: '<?php echo base_url() ?>master/bank_branch/delete_bank_branch/' + $id,
                        success: function (result) {
                            if (result) {
                                return false;
                            } else {
                                return false;
                            }
                        }
                    });
                    swal("Deleted!", "Your imaginary file has been deleted!", "success");
                    window.setTimeout(function () {
                        window.location.href = "<?php echo base_url()?>master/bank_branch/all_bank_branch";
                    }, 2000);
                } else {
                    swal("Cancelled", "Your imaginary file is safe :)", "error");
                }
            });
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
        var bank_branch_name = $('#search_bank_branch_name').val();
        var bank_id = $('#search_bank_id').val();
        if (url != '') {
            $.ajax({
                type: "POST",
                url: url,
                data: {bank_branch_name: bank_branch_name, bank_id: bank_id},
                success: function (msg) {
                    $("#ajaxdata").html(msg);
                }
            });
        }
        return false;
    }
</script>

<script>
    function search_content() {
        var base_url = "<?php echo base_url(); ?>";
        var bank_branch_name = $('#search_bank_branch_name').val();
        if ($.trim(bank_branch_name) != "") {
            $.ajax({
                type: 'post',
                url: '<?php echo base_url(); ?>master/bank_branch/all_bank_branch',
                data: {bank_branch_name: bank_branch_name},
                success: function (data) {
                    $("#ajaxdata").html(data);
                }
            });
        } else {
            $.post(base_url + "master/bank_branch/all_bank_branch/", function (data) {
                $("#ajaxdata").html(data);
            });
        }
        return false;
    }
</script>

<script>
    function search_content_by_id() {
        var base_url = "<?php echo base_url(); ?>";
        var bank_id = $('#search_bank_id').val();
        if ($.trim(bank_id) != "") {
            $.ajax({
                type: 'post',
                url: '<?php echo base_url(); ?>master/bank_branch/all_bank_branch',
                data: {bank_id: bank_id},
                success: function (data) {
                    $("#ajaxdata").html(data);
                }
            });
        } else {
            $.post(base_url + "master/bank_branch/all_bank_branch/", function (data) {
                $("#ajaxdata").html(data);
            });
        } 
    }
</script>