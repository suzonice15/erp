<form action="" method="POST" id="add_thana_frm" enctype="multipart/form-data">
    <div class="form-group">
        <select onchange="select_district()" class="form-control" name="division_id" id="division_id">
            <option value="">Select division</option>
            <?php foreach ($division as $v_division) { ?>
                <option value="<?php echo $v_division->id; ?>"><?php echo $v_division->division_name; ?></option>
            <?php } ?>
        </select>
        <span id="sm1"></span>
    </div>
    <div class="form-group">
        <select class="form-control" name="district_id" id="district_id">
            <option value="">Select division First</option>
        </select>
        <span id="sm2"></span>
    </div>

    <div class="form-group">
        <input id="thana_name" onblur="check_duplicate()" name="thana_name" type="text"
               class="form-control" placeholder="Thana Name....">
        <span id="sm3"></span>
    </div>
    <div class="form-group">
        <input type="submit" class="form-control btn btn-success" value="Add Thana">
    </div>
    <div id="add_msg" class="text-center"></div>
</form>

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
        $('#add_thana_frm').submit(function () {
            if (validation() == true) {
                var dataString = $('#add_thana_frm').serialize();
                $.ajax({
                    type: "POST",
                    url: '<?php echo base_url() ?>master/thana/create_thana',
                    data: dataString,
                    success: function (result) {
                        if (result) {
                            $('#add_msg').html(result);
                            $('#add_msg .alert').delay(5000).fadeOut(1000);
                            $('#add_thana_frm').trigger("reset");
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
<script>
    function check_duplicate() {
        var thana_name = $('#thana_name').val();
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url()?>master/thana/check_duplicate_data/' + thana_name,
            success: function (result) {
                if (result) {
                    $('#thana_name').val('');
                    $('#sm3').html(result);
                    return false;
                } else {
                    $('#sm3').html('');
                    return false;
                }
            }
        });
        return false;
    }
</script>

