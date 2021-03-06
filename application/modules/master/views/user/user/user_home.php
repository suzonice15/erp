<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <div class="pageheader" style="background-color: #F5F5F5;">
                <h2><i class="fa fa-home"></i>User Page <br></h2>
                <ol class="breadcrumb" style="background-color: #F5F5F5;">
                    <li><a href="<?php echo base_url() ?>master/user/all_user" style="color: #0c0c0c;">Dashboard</a>
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
                        <button type="button" class="btn btn-success" id="add_user" data-backdrop="static"
                                data-keyboard="false" data-toggle="modal"
                                data-target="#add_user_modal" onclick="return add_user();">
                            Add User
                        </button>
                    </div>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="row">
                        <div class="form-group">
                            <div class="col-md-12">
                                <div id="ajaxdata">
                                    <table class="table table-striped table-responsive table-bordered table-hover">
                                        <thead style="background-color: #347CA4;">
                                        <tr>
                                            <th>SL NO</th>
                                            <th>User Name</th>
                                            <th>Role Name</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $i = 0;
                                        foreach ($user as $v_data) {
                                            $i++; ?>
                                            <tr>
                                                <td><?php echo $i; ?></td>
                                                <td><?php echo $v_data->user_name; ?></td>
                                                <td><?php echo $v_data->role_name; ?></td>
                                                <td>
                                                    <?php
                                                    if ($v_data->status == 1) {
                                                        echo "Active";
                                                    } else {
                                                        echo "Inactive";
                                                    }
                                                    ?>
                                                </td>
                                                <td style="width: 145px;">
                                                    <?php
                                                    if ($v_data->status == 1) { ?>
                                                        <a href="#"
                                                           onclick="user_inactive(<?php echo $v_data->id; ?>)"
                                                           class="btn btn-warning" title="Inactive">
                                                            <i class="glyphicon glyphicon-arrow-down"></i>
                                                        </a>
                                                    <?php } else { ?>
                                                        <a href="#"
                                                           onclick="user_active(<?php echo $v_data->id; ?>)"
                                                           class="btn btn-warning" title="Active">
                                                            <i class="glyphicon glyphicon-arrow-up"></i>
                                                        </a>
                                                    <?php } ?>

                                                    <a href="#" onclick="delete_user(<?php echo $v_data->id; ?>)"
                                                       class="btn btn-danger" title="Delete User">
                                                        <i class="glyphicon glyphicon-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal inmodal" id="add_user_modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content animated fadeIn">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
                        class="sr-only">Close</span></button>
                <h4 class="modal-title text-center">Add User</h4>
            </div>
            <div class="modal-body">
                <div id="load_user_from">
                </div>
                <p class="m-t text-center">
                    <small><strong>Powered by</strong> Shoriful Islam &copy; 2015 <br>It's Online
                        Version:shorifulislam.com-2016.1.1
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
    function add_user() {
        $.ajax({
            type: "POST",
            url: '<?php echo base_url() ?>master/user/load_add_user_from',
            success: function (result) {
                if (result) {
                    $('#load_user_from').html(result);
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
    function user_active($id) {
        $.ajax({
            type: "POST",
            url: '<?php echo base_url() ?>master/user/user_active/' + $id,
            success: function (result) {
                if (result) {
                    window.location.href = "<?php echo base_url()?>master/user/all_user";
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
    function user_inactive($id) {
        $.ajax({
            type: "POST",
            url: '<?php echo base_url() ?>master/user/user_inactive/' + $id,
            success: function (result) {
                if (result) {
                    window.setTimeout(function () {
                        window.location.href = "<?php echo base_url()?>master/user/all_user";
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
    function delete_user($id) {
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
                        url: '<?php echo base_url() ?>master/user/delete_user/' + $id,
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
                        window.location.href = "<?php echo base_url()?>master/user/all_user";
                    }, 2000);
                } else {
                    swal("Cancelled", "Your imaginary file is safe :)", "error");
                }
            });
    }
</script>
