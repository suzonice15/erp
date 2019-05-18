<form action="" method="post" id="add_bonus_frm" enctype="multipart/form-data">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Department:</label>
                <select name="department_id" id="department_id" class="form-control">
                    <option value="">Select Department</option>
                    <?php foreach ($department as $v_data) { ?>
                        <option value="<?php echo $v_data->id; ?>"><?php echo $v_data->department_name; ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Shift:</label>
                <select onchange="select_section();" name="shift_id" id="shift_id" class="form-control">
                    <option value="">Select Shift</option>
                    <?php foreach ($shift as $v_data) { ?>
                        <option value="<?php echo $v_data->id; ?>"><?php echo $v_data->shift_name; ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Section:</label>
                <select name="section_id" id="section_id" class="form-control">
                    <option value="">Select Section</option>
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Bonus Type:</label>
                <select name="bonus_type_id" id="bonus_type_id" class="form-control">
                    <option value="">Select Bonus Type</option>
                    <?php foreach ($bonus_type as $v_data) { ?>
                        <option value="<?php echo $v_data->id; ?>"><?php echo $v_data->bonus_name; ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Amount Type:</label>
                <select name="amount_type" id="amount_type" class="form-control">
                    <option value="">Select Amount</option>
                    <option value="1">Fixed</option>
                    <option value="2">Percent of Basic</option>
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Amount:</label>
                <input type="text" id="amount" name="amount" class="form-control">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <label>Deduction Year:</label>
            <select name="year" id="year" class="form-control" required="required">
                <option value="">Select Year</option>
                <option value="2017">2017</option>
                <option value="2018">2018</option>
                <option value="2019">2019</option>
                <option value="2020">2020</option>
                <option value="2021">2021</option>
                <option value="2022">2022</option>
                <option value="2023">2023</option>
                <option value="2024">2024</option>
            </select>
        </div>
        <div class="col-md-6">
            <label>Deduction Month:</label>
            <select name="month" id="month" class="form-control" required="required">
                <option value="">Select Year</option>
                <option value="01">January</option>
                <option value="02">February</option>
                <option value="03">March</option>
                <option value="04">April</option>
                <option value="05">May</option>
                <option value="06">June</option>
                <option value="07">July</option>
                <option value="08">August</option>
                <option value="09">September</option>
                <option value="10">October</option>
                <option value="11">November</option>
                <option value="12">December</option>
            </select>
        </div>
    </div>
    <br>
    <div class="form-group">
        <input type="submit" class="form-control btn btn-success" value="Add Bonus">
    </div>
    <div id="add_msg" class="text-center"></div>
</form>

<script>
    function select_section() {
        var shift_id = $('#shift_id').val();
        $.ajax({
            type: "POST",
            url: '<?php echo base_url() ?>hr/bonus/select_section/' + shift_id,
            success: function (result) {
                if (result) {
                    $('#section_id').html(result);
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
        $('#add_bonus_frm').submit(function () {
            var dataString = $('#add_bonus_frm').serialize();
            $.ajax({
                type: "POST",
                url: '<?php echo base_url() ?>hr/bonus/create_bonus',
                data: dataString,
                success: function (result) {
                    if (result) {
                        $('#add_msg').html(result);
                        $('#add_msg .alert').delay(5000).fadeOut(1000);
                        $('#add_bonus_frm').trigger("reset");
                        window.setTimeout(function () {
                            window.location.href = "<?php echo base_url()?>hr/bonus/all_bonus";
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

