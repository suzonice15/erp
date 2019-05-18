<table class="table table-striped table-bordered table-hover">
    <?php
    $role_id = $this->session->userdata("role_id");
    foreach ($leave as $v_details) { ?>
    <tr>
        <td style="width: 300px;">Employee ID</td>
        <td colspan="2"><?php echo $v_details->emp_id; ?></td>
    </tr>
    <tr>
        <td>Department</td>
        <td colspan="2"><?php echo $v_details->department_name; ?></td>
    </tr>
    <tr>
        <td>Shift</td>
        <td colspan="2"><?php echo $v_details->shift_name; ?></td>
    </tr>
    <tr>
        <td>Section</td>
        <td colspan="2"><?php echo $v_details->section_name; ?></td>
    </tr>
    <tr>
        <td>Leave Name</td>
        <td colspan="2"><?php echo $v_details->leave_name; ?></td>
    </tr>
    <tr>
        <td>From Date</td>
        <td colspan="2"><?php echo $v_details->from_date; ?></td>
    </tr>
    <tr>
        <td>To Date</td>
        <td colspan="2"><?php echo $v_details->to_date; ?></td>
    </tr>
    <tr>
        <td>Duration</td>
        <td colspan="2"><?php echo $v_details->duration; ?></td>
    </tr>
    <tr>
        <td>Leave Reason</td>
        <td colspan="2"><?php echo $v_details->leave_reason; ?></td>
    </tr>
    <tr>
        <td>Attach File</td>
        <td colspan="2"><?php echo $v_details->attachment_file; ?></td>
    </tr>
    <tr>
        <td>Replace Employee ID</td>
        <td colspan="2"><?php echo $v_details->employee_id; ?></td>
    </tr>
    <?php
    $role_name = "";
    $CI = &get_instance();
    $result = $CI->leave_model->select_next_leave_step($v_details->status);
    if (!empty($result->role_name)) {
        $role_name = $result->role_name;
    }
    ?>

    <tr>
        <td colspan="3" style="background-color:darkgray; text-align: center; font-size: 20px;">Comment</td>
    </tr>
    <tr>
        <td>User</td>
        <td>Comment</td>
        <td>Comment by</td>
    </tr>


    <?php
    $CI = &get_instance();
    $result = $CI->leave_model->select_commenct_on_this_leave_id($v_details->id);
    foreach ($result as $v_comment) {
        ?>
        <tr>
            <td><?php echo $v_comment->user_id; ?></td>
            <td><?php
                echo $v_comment->comment;
                if ($v_comment->status == 1) {
                    echo "(<strong>Forward</strong>)";
                } else if ($v_comment->status == 2) {
                    echo "(<strong>Approve</strong>)";
                } else {
                    echo "(<strong>Reject</strong>)";
                }
                ?>
            </td>
            <td><?php echo $v_comment->role_name; ?></td>
        </tr>
    <?php } ?>
    <?php if ($v_details->status == 100) { ?>
        <tr>
            <td style="text-align: center; color: green;" colspan="3">Your leave is approve</td>
        </tr>
    <?php } else if ($v_details->status == 101) { ?>
        <tr>
            <td style="text-align: center; color: red;" colspan="3">Your leave is reject!!! Please check comment and
                resubmit
            </td>
        </tr>
    <?php } else if (($v_details->status == 0) && ($role_id == 3)) { ?>
    <?php } else if (($v_details->status == 6) && ($role_id == 6)) { ?>
    <?php } else if (($v_details->status == 5) && ($role_id == 5)) { ?>
    <?php } else if ($v_details->status == 0) { ?>
        <tr>
            <td colspan="3">Your leave application is pending on <strong>Department Head</strong> Panel</td>
        </tr>
    <?php } else { ?>
        <tr>
            <td colspan="3">Your leave application is pending on <strong><?php echo $role_name; ?></strong> Panel</td>
        </tr>
    <?php } ?>
</table>


<form action="" method="post" id="add_comment">
    <?php
    if (($role_id == 3) || ($role_id == 5) || ($role_id == 6)) {
        ?>
        <div class="form-group">
            <div class="row">
                <div class="col-md-6">
                    <select required="required" onchange="show_content()" name="condition" id="condition"
                            class="form-control">
                        <option value="">Select One</option>
                        <option value="1">Comment&Forwadr</option>
                        <option value="2">Approve</option>
                        <option value="3">Reject</option>
                    </select>
                </div>
            </div>
        </div>
    <?php } ?>
    <div class="form-group" style="display: none" id="comment">
        <div class="row">
            <div class="col-md-12">
                <input type="hidden" name="leave_id" value="<?php echo $v_details->id; ?>">
                <textarea required="required" cols="72" rows="5" name="comment" class="form-control"></textarea>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="row">
            <span style="display: none;" id="forward_to">
            <div class="col-md-3">
                <select name="forward_to" class="form-control">
                    <option value="">Next Forward To</option>
                    <?php foreach ($worward as $v_data) { ?>
                        <option value="<?php echo $v_data->id; ?>"><?php echo $v_data->role_name; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="col-md-3">
                <input type="submit" class="btn btn-primary" value="Add Conmment & Forward">
            </div>
            </span>
            <span style="display: none;" id="approve">
            <div class="col-md-1"></div>
            <div class="col-md-2">
                <input type="submit" class="btn btn-success" value="Approve">
            </div>
            </span>
            <span style="display: none;" id="reject">
            <div class="col-md-1"></div>
            <div class="col-md-2">
                <input type="submit" class="btn btn-danger" value="Reject">
            </div>
            </span>
        </div>
    </div>
    <div id="add_msg" class="text-center"></div>
</form>
<?php } ?>

<script>
    function show_content() {
        var condition = $('#condition').val();
        if (condition == 1) {
            $('#comment').show();
            $('#forward_to').show();
            $('#approve').hide();
            $('#reject').hide();
        } else if (condition == 2) {
            $('#comment').show();
            $('#forward_to').hide();
            $('#approve').show();
            $('#reject').hide();
        } else if (condition == 3) {
            $('#comment').show();
            $('#forward_to').hide();
            $('#approve').hide();
            $('#reject').show();
        } else {
            $('#comment').hide();
            $('#forward_to').hide();
            $('#approve').hide();
            $('#reject').hide();
        }
    }
</script>
<script>
    $(document).ready(function () {
        $('#add_comment').submit(function () {
            var dataString = $('#add_comment').serialize();
            $.ajax({
                type: "POST",
                url: '<?php echo base_url() ?>hr/leave/create_leave_comment',
                data: dataString,
                success: function (result) {
                    if (result) {
                        $('#add_msg').html(result);
                        $('#add_msg .alert').delay(5000).fadeOut(1000);
                        $('#add_comment').trigger("reset");
                        window.setTimeout(function () {
                            window.location.href = "<?php echo base_url()?>hr/leave/all_leave";
                        }, 2000);
                        return false;
                    } else {
                        return false;
                    }
                }
            });
            return false;
        });
    });
</script>
