<?php foreach ($bonus as $v_bonus) { ?>
    <form action="" method="post" id="add_bonus_frm" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Department:</label> <span id="j2"></span>
                    <input type="hidden" name="id" value="<?php echo $v_bonus->id; ?>">
                    <select name="department_id" id="department_id" class="form-control">
                        <option value="">Select Department</option>
                        <?php foreach ($department as $v_data) { ?>
                            <?php if ($v_data->id == $v_bonus->department_id) { ?>
                                <option selected="selected"
                                        value="<?php echo $v_data->id; ?>"><?php echo $v_data->department_name; ?></option>
                            <?php } else { ?>
                                <option
                                    value="<?php echo $v_data->id; ?>"><?php echo $v_data->department_name; ?></option>
                            <?php } ?>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Shift:</label> <span id="j3"></span>
                    <select onchange="select_section();" name="shift_id" id="shift_id" class="form-control">
                        <option value="">Select Shift</option>
                        <?php foreach ($shift as $v_data) { ?>
                            <?php if ($v_data->id == $v_bonus->shift_id) { ?>
                                <option selected="selected"
                                        value="<?php echo $v_data->id; ?>"><?php echo $v_data->shift_name; ?></option>
                            <?php } else { ?>
                                <option value="<?php echo $v_data->id; ?>"><?php echo $v_data->shift_name; ?></option>
                            <?php } ?>
                        <?php } ?>
                    </select>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <?php
                    $CI = &get_instance();
                    $section = $CI->Main_model->getValue("shift_id='$v_bonus->shift_id'", 'master_section', '*', "ID DESC");
                    ?>
                    <label>Section:</label> <span id="j4"></span>
                    <select name="section_id" id="section_id" class="form-control">
                        <option value="">Select Section</option>
                        <?php foreach ($section as $v_data) { ?>
                            <?php if ($v_data->id == $v_bonus->section_id) { ?>
                                <option selected="selected"
                                        value="<?php echo $v_data->id; ?>"><?php echo $v_data->section_name; ?></option>
                            <?php } else { ?>
                                <option value="<?php echo $v_data->id; ?>"><?php echo $v_data->section_name; ?></option>
                            <?php } ?>
                        <?php } ?>
                    </select>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label>Bonus Type:</label>
                    <select name="bonus_type_id" id="bonus_type_id" class="form-control">
                        <option value="">Select Bonus Type</option>
                        <?php foreach ($bonus_type as $v_data) { ?>
                            <?php if ($v_data->id == $v_bonus->bonus_type_id) { ?>
                                <option selected="selected"
                                        value="<?php echo $v_data->id; ?>"><?php echo $v_data->bonus_name; ?></option>
                            <?php } else { ?>
                                <option value="<?php echo $v_data->id; ?>"><?php echo $v_data->bonus_name; ?></option>
                            <?php } ?>
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
                        <option <?php if ($v_bonus->amount_type == 1) { ?> selected="selected" <?php } ?> value="1">
                            Fixed
                        </option>
                        <option <?php if ($v_bonus->amount_type == 2) { ?> selected="selected" <?php } ?> value="2">
                            Percent of Basic
                        </option>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Amount:</label>
                    <input type="text" id="amount" name="amount" value="<?php echo $v_bonus->amount; ?>"
                           class="form-control">
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                <div class="col-md-6">
                    <label>Deduction Year:</label>
                    <select name="year" id="year" class="form-control" required="required">
                        <option value="">Select Year</option>
                        <option <?php if ($v_bonus->year == 2017) { ?> selected="selected" <?php } ?>
                            value="2017">2017
                        </option>
                        <option <?php if ($v_bonus->year == 2018) { ?> selected="selected" <?php } ?>
                            value="2018">2018
                        </option>
                        <option <?php if ($v_bonus->year == 2019) { ?> selected="selected" <?php } ?>
                            value="2019">2019
                        </option>
                        <option <?php if ($v_bonus->year == 2020) { ?> selected="selected" <?php } ?>
                            value="2020">2020
                        </option>
                        <option <?php if ($v_bonus->year == 2021) { ?> selected="selected" <?php } ?>
                            value="2021">2021
                        </option>
                        <option <?php if ($v_bonus->year == 2022) { ?> selected="selected" <?php } ?>
                            value="2022">2022
                        </option>
                        <option <?php if ($v_bonus->year == 2023) { ?> selected="selected" <?php } ?>
                            value="2023">2023
                        </option>
                        <option <?php if ($v_bonus->year == 2024) { ?> selected="selected" <?php } ?>
                            value="2024">2024
                        </option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label>Deduction Month:</label>
                    <select name="month" id="month" class="form-control" required="required">
                        <option value="">Select Month</option>
                        <option <?php if ($v_bonus->month == "01") { ?> selected="selected" <?php } ?>
                            value="01">
                            January
                        </option>
                        <option <?php if ($v_bonus->month == "02") { ?> selected="selected" <?php } ?>
                            value="02">
                            February
                        </option>
                        <option <?php if ($v_bonus->month == "03") { ?> selected="selected" <?php } ?>
                            value="03">
                            March
                        </option>
                        <option <?php if ($v_bonus->month == "04") { ?> selected="selected" <?php } ?>
                            value="04">
                            April
                        </option>
                        <option <?php if ($v_bonus->month == "05") { ?> selected="selected" <?php } ?>
                            value="05">
                            May
                        </option>
                        <option <?php if ($v_bonus->month == "06") { ?> selected="selected" <?php } ?>
                            value="06">
                            June
                        </option>
                        <option <?php if ($v_bonus->month == "07") { ?> selected="selected" <?php } ?>
                            value="07">
                            July
                        </option>
                        <option <?php if ($v_bonus->month == "08") { ?> selected="selected" <?php } ?>
                            value="08">August
                        </option>
                        <option <?php if ($v_bonus->month == "09") { ?> selected="selected" <?php } ?>
                            value="09">September
                        </option>
                        <option <?php if ($v_bonus->month == "10") { ?> selected="selected" <?php } ?>
                            value="10">
                            October
                        </option>
                        <option <?php if ($v_bonus->month == "11") { ?> selected="selected" <?php } ?>
                            value="11">
                            November
                        </option>
                        <option <?php if ($v_bonus->month == "12") { ?> selected="selected" <?php } ?>
                            value="12">
                            December
                        </option>
                    </select>
                </div>
            </div>
        </div>
        <div class="form-group">
            <input type="submit" class="form-control btn btn-success" value="Add Bonus">
        </div>
        <div id="add_msg" class="text-center"></div>
    </form>
<?php } ?>

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
                url: '<?php echo base_url() ?>hr/bonus/update_bonus',
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

