<form action="" id="add_class_teacher">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Class</label>
                <input type="hidden" name="teacher_id" value="<?php echo $teacher_id; ?>">
                <select name="class_id" id="class_id" class="form-control">
                    <option value="">Select Class</option>
                    <?php foreach ($class as $v_data) { ?>
                        <option value="<?php echo $v_data->id; ?>"><?php echo $v_data->name; ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Year</label>
                <select name="year" id="year" class="form-control">
                    <option value="">Select Year</option>
                    <?php foreach ($year as $v_year) { ?>
                        <option value="<?php echo $v_year->year_name; ?>"><?php echo $v_year->year_name; ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label>From Date</label>
                <input type="text" placeholder="From date" class="form-control from_date" name="from_date"
                       id="from_date">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>To date</label>
                <input type="text" placeholder="To Date" class="form-control to_date" name="to_date" id="to_date">
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-12">
                <input type="submit" class="form-control btn btn-success" value="Add class teacher">
            </div>
        </div>
    </div>
    <div id="add_msg" class="text-center"></div>
</form>


<script>
    $(document).ready(function () {
        $('#add_class_teacher').submit(function () {
            var dataString = $('#add_class_teacher').serialize();
            $.ajax({
                type: "POST",
                url: '<?php echo base_url() ?>academic/teacher/create_class_teacher',
                data: dataString,
                async: false,
                success: function (result) {
                    if (result) {
                        $('#add_msg').html(result);
                        $('#add_msg .alert').delay(5000).fadeOut(1000);
                        $('#add_student_info').trigger("reset");
                        window.setTimeout(function () {
                            window.location.href = "<?php echo base_url()?>academic/teacher/all_teacher";
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


<script>
    $('body').on('focus', ".from_date", function () {
        $(this).datepicker({dateFormat: 'yy-mm-dd', changeYear: true, changeMonth: true, yearRange: "1970:2100"});
    });
    $('body').on('focus', ".to_date", function () {
        $(this).datepicker({dateFormat: 'yy-mm-dd', changeYear: true, changeMonth: true, yearRange: "1970:2100"});
    });
</script>


