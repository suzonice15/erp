<?php foreach ($fourth_subject as $v_data) { ?>
    <form action="#" id="update_fourth_subject_frm" method="post">
        <table class="table table-bordered table-striped table-hover">
            <tr>
                <td>Student ID</td>
                <td>Subject Name</td>
            </tr>
            <tr>
                <td>
                    <input type="hidden" value="<?php echo $v_data->id;?>" name="id">
                    <input type="text" placeholder="Student ID" value="<?php echo $v_data->student_id;?>" id="student_id" name="student_id"
                           class="form-control">
                </td>
                <td>
                    <select required="required" name="subject_id" id="subject_id" class="form-control">
                        <option value="">Subject Subject</option>
                        <?php foreach ($subject as $v_subject) { ?>
                            <?php if ($v_subject->id == $v_data->subject_id){?>
                            <option selected="selected"
                                value="<?php echo $v_subject->id; ?>"><?php echo $v_subject->name; ?></option>
                                <?php }else{?>
                                <option
                                    value="<?php echo $v_subject->id; ?>"><?php echo $v_subject->name; ?></option>
                                <?php }?>
                        <?php } ?>
                    </select>
                </td>
            </tr>
        </table>
        <div class="form-group">
            <input type="submit" class="form-control btn btn-success" value="Update fourth subject">
        </div>
        <div id="add_msg" class="text-center"></div>
    </form>
<?php } ?>

<script>
    $(document).ready(function () {
        $("#update_fourth_subject_frm").submit(function () {
            var dataString = $('#update_fourth_subject_frm').serialize();
            $.ajax({
                type: "POST",
                url: '<?php echo base_url() ?>academic/fourth_subject/update_fourth_subject',
                data: dataString,
                success: function (result) {
                    if (result) {
                        $('#add_msg').html(result);
                        $('#add_msg .alert').delay(5000).fadeOut(1000);
                        $('#update_fourth_subject_frm').trigger("reset");
                        window.setTimeout(function () {
                            window.location.href = "<?php echo base_url()?>academic/fourth_subject/all_fourth_subject";
                        }, 1000);
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


