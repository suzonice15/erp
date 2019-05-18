<form action="#" id="update_more_data" method="post" enctype="multipart/form-data">
    <?php $i = 0;
    foreach ($training as $v_data) {
        $i++; ?>
        <div class="add_more_field">
            <div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-12">
                            <div style="background-color: #3C8DBC; padding: 7px; text-align: center; height: 35px;">
                                Training No.<?php echo $i; ?></div>
                        </div>
                    </div>
                </div>
                
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <input type="hidden" name="id[]" value="<?php echo $v_data->id?>">
                            <label>Employee ID:</label> <span id="err_msg"></span>
                            <input id="emp_id" value="<?php echo $v_data->emp_id;?>" required="required" name="emp_id[]" type="text" class="form-control"
                                   placeholder="Employee ID ....">
                        </div>
                        <div class="col-md-6">
                            <label>Training Title:</label>
                            <input id="training_title" value="<?php echo $v_data->training_title;?>" name="training_title[]" type="text" class="form-control"
                                   placeholder="Training Title ....">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label>Topics Covered:</label>
                            <input id="topics_covered" value="<?php echo $v_data->topics_covered;?>" name="topics_covered[]" type="text" class="form-control"
                                   placeholder="Topics Covered ....">
                        </div>
                        <div class="col-md-6">
                            <label>Institute:</label>
                            <input id="institute" value="<?php echo $v_data->institute;?>" name="institute[]" type="text" class="form-control"
                                   placeholder="Institute ....">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label>Country:</label>
                            <input name="country[]" value="<?php echo $v_data->country;?>" id="country" type="text" class="form-control"
                                   placeholder="Country....">
                        </div>
                        <div class="col-md-6">
                            <label>Location:</label>
                            <input id="location" value="<?php echo $v_data->location;?>" name="location[]" type="text" class="form-control"
                                   placeholder="Location....">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label>Duration:</label>
                            <input name="duration[]" value="<?php echo $v_data->duration;?>" id="duration" type="text" class="form-control"
                                   placeholder="Duration....">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
    <div class="form-group">
        <div class="row">
            <div class="col-md-12">
                <input type="submit" class="form-control btn btn-success" value="Update Training">
            </div>
        </div>
    </div>

    <input type="hidden" name="total_num_of_fields" value="<?php echo $i; ?>">
    <div id="add_msg" class="text-center"></div>
</form>

<script>
    $(document).ready(function () {
        $('#update_more_data').submit(function () {
            var dataString = $('#update_more_data').serialize();
            $.ajax({
                type: "POST",
                url: '<?php echo base_url() ?>hr/training/update_training',
                data: dataString,
                async: false,
                success: function (result) {
                    if (result) {
                        $('#add_msg').html(result);
                        $('#add_msg .alert').delay(5000).fadeOut(1000);
                        $('#update_more_data').trigger("reset");
                        window.setTimeout(function () {
                            window.location.href = "<?php echo base_url()?>hr/training/all_training";
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