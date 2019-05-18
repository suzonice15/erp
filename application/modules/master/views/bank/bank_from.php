<form action="" method="POST" id="add_bank_frm" enctype="multipart/form-data">
    <div class="form-group">
        <input id="bank_name" name="bank_name" type="text" required="required" class="form-control" placeholder="bank Name....">
        <span id="m1"></span>
    </div>
    <div class="form-group">
        <input type="submit" class="form-control btn btn-success" value="Add bank">
    </div>
    <div id="add_msg" class="text-center"></div>
</form>


<script>
    $(document).ready(function () {
        $('#add_bank_frm').submit(function () {
            var dataString = $('#add_bank_frm').serialize();
            $.ajax({
                type: "POST",
                url: '<?php echo base_url() ?>master/bank/create_bank',
                data: dataString,
                success: function (result) {
                    if (result) {
                        $('#add_msg').html(result);
                        $('#add_msg .alert').delay(5000).fadeOut(1000);
                        $('#add_bank_frm').trigger("reset");
                        window.setTimeout(function () {
                            window.location.href = "<?php echo base_url()?>master/bank/all_bank";
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

