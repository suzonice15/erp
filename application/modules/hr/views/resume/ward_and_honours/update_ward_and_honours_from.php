<?php foreach ($award_and_honours as $v_data) { ?>
    <form action="" id="add_award_and_honours">
        <div class="form-group">
            <div class="row">
                <div class="col-md-6">
                    <label>Employee ID:</label> <span id="err_msg"></span>
                    <input type="hidden" name="id" value="<?php echo $v_data->id; ?>">
                    <input id="emp_id" value="<?php echo $v_data->emp_id; ?>" required="required" readonly="readonly"
                           name="emp_id" type="text"
                           class="form-control"
                           placeholder="Employee ID ....">
                </div>
                <div class="col-md-6">
                    <label>Ward/Honours Title:</label>
                    <input id="award_honors_title" value="<?php echo $v_data->award_honors_title; ?>"
                           name="award_honors_title" type="text" class="form-control"
                           placeholder="Award/honors title ....">
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-6">
                    <label>Award/Honours Type:</label>
                    <select name="awards_type" id="awards_type" class="form-control">
                        <option value="">Select Type</option>
                        <?php if ($v_data->awards_type == 1) { ?>
                            <option selected="selected" value="1">National</option>
                            <option value="2">International</option>
                        <?php } else { ?>
                            <option value="1">National</option>
                            <option selected="selected" value="2">International</option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-md-6">
                    <label>Country:</label>
                    <input id="country" name="country" value="<?php echo $v_data->country; ?>" type="text"
                           class="form-control"
                           placeholder="Country ....">
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-6">
                    <label>Receiving Date:</label>
                    <input name="receiving_date" value="<?php echo $v_data->receiving_date; ?>" type="text"
                           class="form-control receiving_date"
                           placeholder="Receiving date....">
                </div>
                <div class="col-md-6">
                    <label>Organization Name:</label>
                    <input id="organization_name" value="<?php echo $v_data->organization_name; ?>"
                           name="organization_name" type="text" class="form-control"
                           placeholder="Organization name....">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="form-group">
                <div class="col-md-12">
                    <input type="submit" class="form-control btn btn-success" value="Update Award and Honours">
                </div>
            </div>
        </div>
        </br>
        <div id="add_msg" class="text-center"></div>
    </form>
<?php } ?>

<script>
    $(document).ready(function () {
        $("#add_award_and_honours").submit(function () {
            var dataString = $('#add_award_and_honours').serialize();
            $.ajax({
                type: "POST",
                url: '<?php echo base_url() ?>hr/my_resume/update_ward_and_honours',
                data: dataString,
                success: function (result) {
                    if (result) {
                        $('#add_msg').html(result);
                        $('#add_msg .alert').delay(5000).fadeOut(1000);
                        $('#add_award_and_honours').trigger("reset");
                        window.setTimeout(function () {
                            window.location.href = "<?php echo base_url()?>hr/my_resume/all_my_resume";
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