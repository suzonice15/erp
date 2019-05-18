<form action="#" id="update_reference_frm" method="post">
    <?php foreach ($reference as $v_data) { ?>
        <div class="add_more_field">
            <div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <input type="hidden" name="id" value="<?php echo $v_data->id ?>">
                            <label>Employee ID:</label> <span id="err_msg"></span>
                            <input id="emp_id" readonly="readonly" value="<?php echo $v_data->emp_id; ?>"
                                   name="emp_id" type="text" class="form-control"
                                   placeholder="Employee ID ....">
                        </div>
                        <div class="col-md-6">
                            <label>Name:</label>
                            <input id="name" name="name" value="<?php echo $v_data->name; ?>" type="text"
                                   class="form-control"
                                   placeholder="Name ....">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label>Designation:</label>
                            <input id="designation" name="designation" value="<?php echo $v_data->designation; ?>"
                                   type="text" class="form-control"
                                   placeholder="Designation ....">
                        </div>
                        <div class="col-md-6">
                            <label>Organization:</label>
                            <input id="organization" name="organization" value="<?php echo $v_data->organization; ?>"
                                   type="text" class="form-control"
                                   placeholder="Organization ....">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label>Address:</label>
                            <input name="address" id="address" type="text" value="<?php echo $v_data->address; ?>"
                                   class="form-control"
                                   placeholder="Address....">
                        </div>
                        <div class="col-md-6">
                            <label>Email:</label>
                            <input id="email" name="email" type="text" value="<?php echo $v_data->email; ?>"
                                   class="form-control"
                                   placeholder="Email Address....">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label>Phone:</label>
                            <input name="phone" id="phone" type="text" value="<?php echo $v_data->phone; ?>"
                                   class="form-control"
                                   placeholder="Phone....">
                        </div>
                        <div class="col-md-6">
                            <label>Mobile:</label>
                            <input id="mobile" name="mobile" type="text" value="<?php echo $v_data->mobile; ?>"
                                   class="form-control"
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
    <div id="add_msg" class="text-center"></div>
</form>

<script>
    $(document).ready(function () {
        $('#update_reference_frm').submit(function () {
            var dataString = $('#update_reference_frm').serialize();
            $.ajax({
                type: "POST",
                url: '<?php echo base_url() ?>hr/my_resume/update_reference',
                data: dataString,
                async: false,
                success: function (result) {
                    if (result) {
                        $('#add_msg').html(result);
                        $('#add_msg .alert').delay(5000).fadeOut(1000);
                        $('#update_reference_frm').trigger("reset");
                        window.setTimeout(function () {
                            window.location.href = "<?php echo base_url()?>hr/my_resume/all_my_resume";
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