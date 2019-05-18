<?php foreach ($roster as $v_all_data) { ?>
    <form action="" id="add_roster">
        <div class="form-group">
            <div class="row">
                <div class="col-md-12">
                    <input type="hidden" name="id" value="<?php echo $v_all_data->id ?>">
                    <input value="<?php echo $v_all_data->from_date; ?>" required="required" name="from_date"
                           type="text" placeholder="From Date"
                           class="form-control from_date">
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-12">
                    <input value="<?php echo $v_all_data->to_date; ?>" required="required" name="to_date" type="text"
                           placeholder="To Date"
                           class="form-control to_date">
                </div>
            </div>
        </div>
        <div class="form-group">
            <input type="submit" class="form-control btn btn-success" value="Update Weekend">
        </div>
        <div id="add_msg" class="text-center"></div>
    </form>
<?php } ?>

<script>
    $('body').on('focus', ".from_date", function () {
        $(this).datepicker({dateFormat: 'yy-mm-dd', changeYear: true, changeMonth: true, yearRange: "1970:2100"});
    });
    $('body').on('focus', ".to_date", function () {
        $(this).datepicker({dateFormat: 'yy-mm-dd', changeYear: true, changeMonth: true, yearRange: "1970:2100"});
    });
</script>

<script>
    $(document).ready(function () {
        $('#add_roster').submit(function () {
            var dataString = $('#add_roster').serialize();
            $.ajax({
                type: "POST",
                url: '<?php echo base_url() ?>hr/attendance/update_attendance',
                data: dataString,
                success: function (result) {
                    if (result) {
                        $('#add_msg').html(result);
                        $('#add_msg .alert').delay(5000).fadeOut(1000);
                        window.setTimeout(function () {
                            window.location.href = "<?php echo base_url()?>hr/attendance/all_attendance";
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