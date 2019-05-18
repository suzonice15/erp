<?php foreach ($child as $v_child) { ?>
    <form action="" id="add_more_data">
        <div class="add_more_field">
            <div>
                <div class="row">
                    <div class="form-group">
                        <div class="col-md-6">
                            <label>Employee ID:</label>
                            <input type="hidden" name="id" value="<?php echo $v_child->id;?>">
                            <input id="emp_id" value="<?php echo $v_child->emp_id; ?>" name="emp_id" readonly="readonly"
                                   type="text" class="form-control"
                                   placeholder="Employee ID ....">
                        </div>
                        <div class="col-md-6">
                            <label>Child name:</label>
                            <input id="child_name" value="<?php echo $v_child->child_name; ?>" name="child_name"
                                   type="text" class="form-control"
                                   placeholder="Child name ....">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group">
                        <div class="col-md-6">
                            <label>Gender:</label>
                            <select name="gender_id" id="gender_id" class="form-control">
                                <option value="">Select Gender</option>
                                <?php foreach ($gender as $v_data) { ?>
                                    <?php if ($v_data->id == $v_child->gender_id) { ?>
                                        <option selected="selected"
                                                value="<?php echo $v_data->id; ?>"><?php echo $v_data->gender_name; ?></option>
                                    <?php } else { ?>
                                        <option
                                            value="<?php echo $v_data->id; ?>"><?php echo $v_data->gender_name; ?></option>
                                    <?php } ?>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label>Profession ID:</label>
                            <select name="profession_id" id="profession_id" class="form-control">
                                <option value="">Select Profession</option>
                                <?php foreach ($profession as $v_data) { ?>
                                    <?php if ($v_data->id == $v_child->profession_id) { ?>
                                        <option selected="selected"
                                            value="<?php echo $v_data->id; ?>"><?php echo $v_data->profession_name; ?></option>
                                    <?php } else { ?>
                                        <option
                                            value="<?php echo $v_data->id; ?>"><?php echo $v_data->profession_name; ?></option>
                                    <?php } ?>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group">
                        <div class="col-md-6">
                            <label>Class:</label>
                            <input id="class" name="class" value="<?php echo $v_child->class; ?>" type="text"
                                   class="form-control"
                                   placeholder="Class ....">
                        </div>
                        <div class="col-md-6">
                            <label>Institute:</label>
                            <input id="institute" value="<?php echo $v_child->institute; ?>" name="institute"
                                   type="text" class="form-control"
                                   placeholder="Institute....">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </br>
        <div class="row">
            <div class="form-group">
                <div class="col-md-12">
                    <input type="submit" class="form-control btn btn-success" value="Update Child">
                </div>
            </div>
        </div>
        </br>
        <div id="add_msg" class="text-center"></div>
    </form>
<?php } ?>

<script>
    $(document).ready(function () {
        $("#add_more_data").submit(function () {
            var dataString = $('#add_more_data').serialize();
            $.ajax({
                type: "POST",
                url: '<?php echo base_url() ?>hr/child/update_child',
                data: dataString,
                success: function (result) {
                    if (result) {
                        $('#add_msg').html(result);
                        $('#add_msg .alert').delay(5000).fadeOut(1000);
                        $('#add_more_data').trigger("reset");
                        window.setTimeout(function () {
                            window.location.href = "<?php echo base_url()?>hr/child/all_child";
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