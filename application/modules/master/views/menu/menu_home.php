<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <div class="pageheader" style="background-color: #F5F5F5;">
                <h2><i class="fa fa-home"></i> Master Menu Page <br></h2>
                <ol class="breadcrumb" style="background-color: #F5F5F5;">
                    <li><a href="<?php echo base_url() ?>master/menu/all_menu" style="color: #0c0c0c;">Dashboard</a>
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
                        <button type="button" class="btn btn-success" id="add_menu" data-backdrop="static"
                                data-keyboard="false" data-toggle="modal"
                                data-target="#add_menu_modal" onclick="return add_menu();">
                            Add Menu
                        </button>
                    </div>

                    <div class="col-md-4">
                        <select onchange="return search_content_by_id();"  class="form-control" id="search_module_id" name="search_module_id">
                            <option value="0">Search by module name</option>
                            <?php foreach ($module as $v_module) { ?>
                                <option value="<?php echo $v_module->id;?>"><?php echo $v_module->module_name;?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <input onkeyup="return search_content();" type="text" class="form-control" id="menu_name"
                               placeholder="Search by menu name">
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
                                            <th>Module Name</th>
                                            <th>Menu Name</th>
                                            <th>URL</th>
                                            <th>Icon</th>
                                            <th>Sorting Position</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $i = 0;
                                        foreach ($menu as $v_data) {
                                            $i++; ?>
                                            <tr>
                                                <td><?php echo $i; ?></td>
                                                <td><?php echo $v_data->module_name; ?></td>
                                                <td><?php echo $v_data->menu_name; ?></td>
                                                <td><?php echo $v_data->menu_url; ?></td>
                                                <td><?php echo $v_data->menu_icon; ?></td>
                                                <td><?php echo $v_data->menu_sort; ?></td>
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
                                                    <a href="#" onclick="update_menu(<?php echo $v_data->id; ?>)"
                                                       class="btn btn-success" data-backdrop="static"
                                                       data-keyboard="false" data-toggle="modal"
                                                       data-target="#update_menu_modal" id="update_menu"
                                                       title="Update Menu">
                                                        <i class="glyphicon glyphicon-edit"></i>
                                                    </a>
                                                    <?php
                                                    if ($v_data->status == 1) { ?>
                                                        <a href="#"
                                                           onclick="menu_inactive(<?php echo $v_data->id; ?>)"
                                                           class="btn btn-warning" title="Inactive">
                                                            <i class="glyphicon glyphicon-arrow-down"></i>
                                                        </a>
                                                    <?php } else { ?>
                                                        <a href="#"
                                                           onclick="menu_active(<?php echo $v_data->id; ?>)"
                                                           class="btn btn-warning" title="Active">
                                                            <i class="glyphicon glyphicon-arrow-up"></i>
                                                        </a>
                                                    <?php } ?>

                                                    <a href="#" onclick="delete_menu(<?php echo $v_data->id; ?>)"
                                                       class="btn btn-danger" title="Delete Menu">
                                                        <i class="glyphicon glyphicon-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <th>SL NO</th>
                                            <th>Module Name</th>
                                            <th>Menu Name</th>
                                            <th>URL</th>
                                            <th>Icon</th>
                                            <th>Sorting Position</th>
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

<div class="modal inmodal" id="add_menu_modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content animated fadeIn">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
                        class="sr-only">Close</span></button>
                <h4 class="modal-title text-center">Add Menu</h4>
            </div>
            <div class="modal-body">
                <div id="load_add_menu_from">
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

<div class="modal inmodal" id="update_menu_modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content animated fadeIn">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
                        class="sr-only">Close</span></button>
                <h4 class="modal-title text-center">Update Menu</h4>
            </div>
            <div class="modal-body">
                <div id="load_update_menu_from">

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
    function add_menu() {
        $.ajax({
            type: "POST",
            url: '<?php echo base_url() ?>master/menu/load_add_menu_from',
            success: function (result) {
                if (result) {
                    $('#load_add_menu_from').html(result);
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
    function update_menu($id) {
        $.ajax({
            type: "POST",
            url: '<?php echo base_url() ?>master/menu/load_update_menu_from/' + $id,
            success: function (result) {
                if (result) {
                    $('#load_update_menu_from').html(result);
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
    function menu_active($id) {
        $.ajax({
            type: "POST",
            url: '<?php echo base_url() ?>master/menu/menu_active/' + $id,
            success: function (result) {
                if (result) {
                    window.location.href = "<?php echo base_url()?>master/menu/all_menu";
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
    function menu_inactive($id) {
        $.ajax({
            type: "POST",
            url: '<?php echo base_url() ?>master/menu/menu_inactive/' + $id,
            success: function (result) {
                if (result) {
                    window.setTimeout(function () {
                        window.location.href = "<?php echo base_url()?>master/menu/all_menu";
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
    function delete_menu($id) {
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
                        url: '<?php echo base_url() ?>master/menu/delete_menu/' + $id,
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
                        window.location.href = "<?php echo base_url()?>master/Module/all_module";
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
        var menu_name = $('#menu_name').val();
        var module_id = $('#module_id').val();
        if (url != '') {
            $.ajax({
                type: "POST",
                url: url,
                data: {menu_name: menu_name, module_id: module_id},
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
        var menu_name = $('#menu_name').val();
        if ($.trim(menu_name) != "") {
            $.ajax({
                type: 'post',
                url: '<?php echo base_url(); ?>master/menu/all_menu',
                data: {menu_name: menu_name},
                success: function (data) {
                    $("#ajaxdata").html(data);
                }
            });
        } else {
            $.post(base_url + "master/menu/all_menu/", function (data) {
                $("#ajaxdata").html(data);
            });
        }
        return false;
    }
</script>

<script>
    function search_content_by_id() {
        var base_url = "<?php echo base_url(); ?>";
        var module_id = $('#search_module_id').val();
        if ($.trim(module_id) != "") {
            $.ajax({
                type: 'post',
                url: '<?php echo base_url(); ?>master/menu/all_menu',
                data: {module_id: module_id},
                success: function (data) {
                    $("#ajaxdata").html(data);
                }
            });
        } else {
            $.post(base_url + "master/menu/all_menu/", function (data) {
                $("#ajaxdata").html(data);
            });
        } 
    }
</script>