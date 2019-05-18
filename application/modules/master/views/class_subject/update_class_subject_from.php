<?php foreach ($class_subject as $v_data) { ?>
    <form action="#" id="update_class_subject_frm" method="post">
        <table class="table table-bordered table-striped table-hover">
            <tr>
                <td>Class Name</td>
                <td>Subject Name</td>
                <input type="hidden" name="id" value="<?php echo $v_data->id?>">
            </tr>
            <tr>
                <td>
                    <select required="required" name="class_id" id="class_id" class="form-control">
                        <option value="">Class name</option>
                        <?php foreach ($class as $v_class) { ?>
                            <?php if ($v_class->id == $v_data->class_id) { ?>
                                <option selected="selected" value="<?php echo $v_class->id; ?>"><?php echo $v_class->name; ?></option>
                            <?php } else { ?>
                                <option value="<?php echo $v_class->id; ?>"><?php echo $v_class->name; ?></option>
                            <?php } ?>
                        <?php } ?>
                    </select>
                </td>
                <td>
                    <select required="required" name="subject_id" id="subject_id" class="form-control">
                        <option value="">Group</option>
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
            <input type="submit" class="form-control btn btn-success" value="Update Class Subject">
        </div>
        <div id="add_msg" class="text-center"></div>
    </form>
<?php } ?>

<script>
    $(document).ready(function () {
        $("#update_class_subject_frm").submit(function () {
            var dataString = $('#update_class_subject_frm').serialize();
            $.ajax({
                type: "POST",
                url: '<?php echo base_url() ?>master/class_subject/update_class_subject',
                data: dataString,
                success: function (result) {
                    if (result) {
                        $('#add_msg').html(result);
                        $('#add_msg .alert').delay(5000).fadeOut(1000);
                        $('#update_class_subject_frm').trigger("reset");
                        window.setTimeout(function () {
                            window.location.href = "<?php echo base_url()?>master/class_subject/all_class_subject";
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


