<form action="" method="POST" id="released_note_from" enctype="multipart/form-data">
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label>Released Note:</label>
                <input type="hidden" value="<?php echo $id?>" name="id">
                <textarea name="released_note" cols="78" rows="12" required="required"></textarea>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label>Date:</label>
                <input name="date" type="text" class="form-control released" required="required">
            </div>
        </div>
    </div>
    <div class="form-group">
        <input type="submit" class="form-control btn btn-success" value="Released Note">
    </div>
    <div id="add_msg" class="text-center"></div>
</form>

<script>
    $('body').on('focus', ".released", function () {
        $(this).datepicker({dateFormat: 'yy-mm-dd', changeYear: true, changeMonth: true, yearRange: "1970:2100"});
    });
</script>

<script>
    $(document).ready(function () {
        $('#released_note_from').submit(function () {
            var dataString = $('#released_note_from').serialize();
            $.ajax({
                type: "POST",
                url: '<?php echo base_url() ?>hr/job_info/create_released_note_info',
                data: dataString,
                success: function (result) {
                    if (result) {
                        $('#add_msg').html(result);
                        $('#add_msg .alert').delay(5000).fadeOut(1000);
                        $('#released_note_from').trigger("reset");
                        window.setTimeout(function () {
                            window.location.href = "<?php echo base_url()?>hr/job_info/all_job_info";
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