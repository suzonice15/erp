<form action="" method="POST" id="add_bank_branch_frm" enctype="multipart/form-data">
    <div class="form-group">
        <select class="form-control" name="bank_id" id="bank_id">
            <option value="">Select bank</option>
            <?php foreach ($bank as $v_bank) { ?>
                <option value="<?php echo $v_bank->id; ?>"><?php echo $v_bank->bank_name; ?></option>
            <?php } ?>
        </select>
        <span id="m1"></span>
    </div>
    <div class="form-group">
        <input id="bank_branch_name" onblur="check_duplicate()" name="bank_branch_name" type="text" class="form-control" placeholder="Bank Branch Name....">
        <span id="m2"></span>
    </div>
    <div class="form-group">
        <input type="submit" class="form-control btn btn-success" value="Add bank branch">
    </div>
    <div id="add_msg" class="text-center"></div>
</form>


<script>
    $(document).ready(function () {
        $('#add_bank_branch_frm').submit(function () {
            if (validation() == true) {
                var dataString = $('#add_bank_branch_frm').serialize();
                $.ajax({
                    type: "POST",
                    url: '<?php echo base_url() ?>master/bank_branch/create_bank_branch',
                    data: dataString,
                    success: function (result) {
                        if (result) {
                            $('#add_msg').html(result);
                            $('#add_msg .alert').delay(5000).fadeOut(1000);
                            $('#add_bank_branch_frm').trigger("reset");
                            window.setTimeout(function () {
                                window.location.href = "<?php echo base_url()?>master/bank_branch/all_bank_branch";
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
            var bank_id = $('#bank_id').val();
            var bank_branch_name = $('#bank_branch_name').val();

            if (bank_id.length == "" || bank_branch_name.length == "") {
                if (bank_id.length == "") {
                    $('#m1').html("<code class='err_msg'>* This field is mandatory *</code>");
                    $("#m1 .err_msg").delay(3000).fadeOut(800);
                    $("#bank_id").focus();
                }
                if (bank_branch_name.length == "") {
                    $('#m2').html("<code class='err_msg'>* This field is mandatory *</code>");
                    $("#m2 .err_msg").delay(3000).fadeOut(800);
                    $("#bank_branch_name").focus();
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
        var bank_branch_name = $('#bank_branch_name').val();
        $.ajax({
            type:'POST',
            url:'<?php echo base_url()?>master/bank_branch/check_duplicate_data/'+bank_branch_name,
            success:function (result) {
                if(result){
                    $('#bank_branch_name').val('');
                    $('#m2').html(result);
                    return false;
                }else{
                    $('#m2').html('');
                    return false;
                }
            }
        });
        return false;
    }
</script>


