<form action="#" id="update_more_data" method="post" enctype="multipart/form-data">
    <?php $i = 0;
    foreach ($reference as $v_data) {
        $i++; ?>
        <div class="add_more_field">
            <div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-12">
                            <div style="background-color: #3C8DBC; padding: 7px; text-align: center; height: 35px;">
                                Reference No.<?php echo $i; ?></div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <input type="hidden" name="id[]" value="<?php echo $v_data->id?>">
                            <label>Employee ID:</label> <span id="err_msg"></span>
                            <input id="emp_id" required="required" value="<?php echo $v_data->emp_id;?>" name="emp_id[]" type="text" class="form-control"
                                   placeholder="Employee ID ....">
                        </div>
                        <div class="col-md-6">
                            <label>Name:</label>
                            <input id="name" name="name[]" value="<?php echo $v_data->name;?>" type="text" class="form-control"
                                   placeholder="Name ....">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label>Designation:</label>
                            <input id="designation" name="designation[]" value="<?php echo $v_data->designation;?>" type="text" class="form-control"
                                   placeholder="Designation ....">
                        </div>
                        <div class="col-md-6">
                            <label>Organization:</label>
                            <input id="organization" name="organization[]" value="<?php echo $v_data->organization;?>" type="text" class="form-control"
                                   placeholder="Organization ....">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label>Address:</label>
                            <input name="address[]" id="address" type="text" value="<?php echo $v_data->address;?>" class="form-control"
                                   placeholder="Address....">
                        </div>
                        <div class="col-md-6">
                            <label>Email:</label>
                            <input id="email" name="email[]" type="text" value="<?php echo $v_data->email;?>" class="form-control"
                                   placeholder="Email Address....">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label>Phone:</label>
                            <input name="phone[]" id="phone" type="text" value="<?php echo $v_data->phone;?>" class="form-control"
                                   placeholder="Phone....">
                        </div>
                        <div class="col-md-6">
                            <label>Mobile:</label>
                            <input id="mobile" name="mobile[]" type="text" value="<?php echo $v_data->mobile;?>" class="form-control"
                                   placeholder="mobile....">
                        </div>
                    </div>
                </div>

            </div>
        </div>
    <?php } ?>
    <div class="form-group">
        <div class="row">
            <div class="col-md-12">
                <input type="submit" class="form-control btn btn-success" value="Update Reference">
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
                url: '<?php echo base_url() ?>hr/reference/update_reference',
                data: dataString,
                async: false,
                success: function (result) {
                    if (result) {
                        $('#add_msg').html(result);
                        $('#add_msg .alert').delay(5000).fadeOut(1000);
                        $('#update_more_data').trigger("reset");
                        window.setTimeout(function () {
                            window.location.href = "<?php echo base_url()?>hr/reference/all_reference";
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