<form action="" method="POST" id="add_bank_frm" enctype="multipart/form-data">
    <div class="form-group">
        <div class="row">
            <div class="col-md-4">
                <input id="year" name="year" type="text" required="required" class="form-control"
                       placeholder="Year....">
            </div>
            <div class="col-md-4">
                <input id="particulars" name="particulars" type="text" required="required" class="form-control"
                       placeholder="Particulars....">
            </div>
            <div class="col-md-4">
                <input id="amount" name="amount" type="text" required="required" class="form-control"
                       placeholder="Amount....">
            </div>
        </div>
    </div>
    <div class="form-group">
        <input type="submit" class="form-control btn btn-success" value="Add admission fee">
    </div>
    <div id="add_msg" class="text-center"></div>
</form>


<script>
    $(document).ready(function () {
        $('#add_bank_frm').submit(function () {
            var dataString = $('#add_bank_frm').serialize();
            $.ajax({
                type: "POST",
                url: '<?php echo base_url() ?>master/admission_fee/create_admission_fee',
                data: dataString,
                success: function (result) {
                    if (result) {
                        $('#add_msg').html(result);
                        $('#add_msg .alert').delay(5000).fadeOut(1000);
                        $('#add_bank_frm').trigger("reset");
                        window.setTimeout(function () {
                            window.location.href = "<?php echo base_url()?>master/admission_fee/all_admission_fee";
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

