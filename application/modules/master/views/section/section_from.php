<form action="" method="POST" id="add_section_frm" enctype="multipart/form-data">
    <div class="form-group">
        <select class="form-control" name="shift_id" id="shift_id">
            <option value="">Select shift</option>
            <?php foreach ($shift as $v_shift) { ?>
                <option value="<?php echo $v_shift->id; ?>"><?php echo $v_shift->shift_name; ?></option>
            <?php } ?>
        </select>
        <span id="m1"></span>
    </div>
    <div class="form-group">
        <input id="section_name" name="section_name" type="text" class="form-control" placeholder="Shift Name....">
        <span id="m2"></span>
    </div>
    <div class="form-group">
        <input type="submit" class="form-control btn btn-success" value="Add Section">
    </div>
    <div id="add_msg" class="text-center"></div>
</form>


<script>
    $(document).ready(function () {
        $('#add_section_frm').submit(function () {
            if (validation() == true) {
                var dataString = $('#add_section_frm').serialize();
                $.ajax({
                    type: "POST",
                    url: '<?php echo base_url() ?>master/section/create_section',
                    data: dataString,
                    success: function (result) {
                        if (result) {
                            $('#add_msg').html(result);
                            $('#add_msg .alert').delay(5000).fadeOut(1000);
                            $('#add_section_frm').trigger("reset");
                            window.setTimeout(function () {
                                window.location.href = "<?php echo base_url()?>master/section/all_section";
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
            var shift_id = $('#shift_id').val();
            var section_name = $('#section_name').val();

            if (shift_id.length == "" || section_name.length == "") {
                if (shift_id.length == "") {
                    $('#m1').html("<code class='err_msg'>* This field is mandatory *</code>");
                    $("#m1 .err_msg").delay(3000).fadeOut(800);
                    $("#shift_id").focus();
                }
                if (section_name.length == "") {
                    $('#m2').html("<code class='err_msg'>* This field is mandatory *</code>");
                    $("#m2 .err_msg").delay(3000).fadeOut(800);
                    $("#section_name").focus();
                }
                return false;
            }
            else {
                return true
            }
        }
    });
</script>


