<?php foreach ($thana as $v_thana) { ?>
    <form action="" method="POST" id="update_thana_frm" enctype="multipart/form-data">
        <div class="form-group">
            <select onchange="select_district()" class="form-control" name="division_id" id="division_id">
                <option value="">Select division</option>
                <?php foreach ($division as $v_division) { ?>
                    <?php if ($v_division->id == $v_thana->division_id) { ?>
                        <option selected="selected"
                                value="<?php echo $v_division->id; ?>"><?php echo $v_division->division_name; ?></option>
                    <?php } else { ?>
                        <option
                            value="<?php echo $v_division->id; ?>"><?php echo $v_division->division_name; ?></option>
                    <?php } ?>
                <?php } ?>
            </select>
            <span id="sm1"></span>
        </div>
        <div class="form-group">
            <select class="form-control" name="district_id" id="district_id">
                <?php foreach ($district as $v_district) { ?>
                    <?php if ($v_district->id == $v_thana->district_id) { ?>
                        <option selected="selected"
                                value="<?php echo $v_district->id; ?>"><?php echo $v_district->district_name; ?></option>
                    <?php } else { ?>
                        <option
                            value="<?php echo $v_district->id; ?>"><?php echo $v_district->district_name; ?></option>
                    <?php } ?>
                <?php } ?>
            </select>
            <span id="sm2"></span>
        </div>

        <div class="form-group">
            <input type="hidden" name="id" value="<?php echo $v_thana->id; ?>">
            <input id="thana_name" value="<?php echo $v_thana->thana_name; ?>" name="thana_name" type="text"
                   class="form-control"
                   placeholder="Sub district Name....">
            <span id="sm3"></span>
        </div>
        <div class="form-group">
            <input type="submit" class="form-control btn btn-success" value="Update Thana">
        </div>
        <div id="add_msg" class="text-center"></div>
    </form>
<?php } ?>
<script>
    function select_district() {
        var division_id = $('#division_id').val();
        $.ajax({
            type: "POST",
            url: '<?php echo base_url() ?>master/thana/select_district/' + division_id,
            success: function (result) {
                if (result) {
                    $('#district_id').html(result);
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
    $(document).ready(function () {
        $('#update_thana_frm').submit(function () {
            if (validation() == true) {
                var dataString = $('#update_thana_frm').serialize();
                $.ajax({
                    type: "POST",
                    url: '<?php echo base_url() ?>master/thana/update_thana',
                    data: dataString,
                    success: function (result) {
                        if (result) {
                            $('#add_msg').html(result);
                            $('#add_msg .alert').delay(5000).fadeOut(1000);
                            window.setTimeout(function () {
                                window.location.href = "<?php echo base_url()?>master/thana/all_thana";
                            }, 2000);
                            return false;
                        } else {
                            return false;
                        }
                    }
                });
                return false;
            } else {
                return false;
            }
        });

        function validation() {
            var division_id = $('#division_id').val();
            var district_id = $('#district_id').val();
            var thana_name = $('#thana_name').val();

            if (division_id.length == "" || district_id.length == "" || thana_name.length == "") {
                if (division_id.length == "") {
                    $('#sm1').html("<code class='err_msg'>* This field is mandatory *</code>");
                    $("#sm1 .err_msg").delay(3000).fadeOut(800);
                    $("#division_id").focus();
                }
                if (district_id.length == "") {
                    $('#sm2').html("<code class='err_msg'>* This field is mandatory *</code>");
                    $("#sm2 .err_msg").delay(3000).fadeOut(800);
                    $("#district_id").focus();
                }
                if (thana_name.length == "") {
                    $('#sm3').html("<code class='err_msg'>* This field is mandatory *</code>");
                    $("#sm3 .err_msg").delay(3000).fadeOut(800);
                    $("#thana_name").focus();
                }
                return false;
            }
            else {
                return true
            }
        }
    });
</script>

