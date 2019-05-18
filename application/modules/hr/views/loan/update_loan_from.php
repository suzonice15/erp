<?php foreach ($loan as $v_loan) { ?>
    <form action="#" id="update_loan_frm" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <div class="row">
                <div class="col-md-6">
                    <label>Employee ID:</label>
                    <input type="hidden" name="id" value="<?php echo $v_loan->id; ?>">
                    <input id="emp_id" required="required" readonly="readonly" value="<?php echo $v_loan->emp_id; ?>"
                           name="emp_id"
                           type="text"
                           class="form-control"
                           placeholder="Employee ID ....">
                </div>
                <div class="col-md-6">
                    <label>Loan Type:</label>
                    <select required="required" name="loan_type_id" id="loan_type_id" class="form-control">
                        <option value="">Select one type</option>
                        <?php foreach ($loan_type as $v_loan_type) { ?>
                            <?php if ($v_loan_type->id == $v_loan->loan_type_id) { ?>
                                <option selected="selected"
                                        value="<?php echo $v_loan_type->id; ?>"><?php echo $v_loan_type->loan_type_name; ?></option>
                            <?php } else { ?>
                                <option
                                    value="<?php echo $v_loan_type->id; ?>"><?php echo $v_loan_type->loan_type_name; ?></option>
                            <?php } ?>
                        <?php } ?>
                    </select>
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                <div class="col-md-6">
                    <label>Issue Date:</label>
                    <input id="issue_date" required="required" value="<?php echo $v_loan->issue_date; ?>"
                           name="issue_date" type="text"
                           class="form-control issue_date"
                           placeholder="Issue date ....">
                </div>
                <div class="col-md-6">
                    <label>Loan Amount:</label>
                    <input name="loan_amount" id="loan_amount" required="required"
                           value="<?php echo $v_loan->loan_amount; ?>" type="text" class="form-control"
                           placeholder="Loan amount ....">
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                <div class="col-md-6">
                    <label>No of Installment:</label>
                    <input id="no_of_installment" onchange="check_amount_of_installment()"
                           value="<?php echo $v_loan->no_of_installment; ?>" required="required"
                           name="no_of_installment" type="text"
                           class="form-control"
                           placeholder="Issue date ....">
                </div>
                <div class="col-md-6">
                    <label>Amount of Installment:</label>
                    <input name="amount_of_installment" required="required" id="amount_of_installment"
                           value="<?php echo $v_loan->amount_of_installment; ?>" type="text" class="form-control"
                           placeholder="Amount of installment ....">
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                <div class="col-md-6">
                    <label>Deduction Year:</label>
                    <select name="year" id="year" class="form-control" required="required">
                        <option value="">Select Year</option>
                        <option <?php if ($v_loan->deduction_year == 2017) { ?> selected="selected" <?php } ?>
                            value="2017">2017
                        </option>
                        <option <?php if ($v_loan->deduction_year == 2018) { ?> selected="selected" <?php } ?>
                            value="2018">2018
                        </option>
                        <option <?php if ($v_loan->deduction_year == 2019) { ?> selected="selected" <?php } ?>
                            value="2019">2019
                        </option>
                        <option <?php if ($v_loan->deduction_year == 2020) { ?> selected="selected" <?php } ?>
                            value="2020">2020
                        </option>
                        <option <?php if ($v_loan->deduction_year == 2021) { ?> selected="selected" <?php } ?>
                            value="2021">2021
                        </option>
                        <option <?php if ($v_loan->deduction_year == 2022) { ?> selected="selected" <?php } ?>
                            value="2022">2022
                        </option>
                        <option <?php if ($v_loan->deduction_year == 2023) { ?> selected="selected" <?php } ?>
                            value="2023">2023
                        </option>
                        <option <?php if ($v_loan->deduction_year == 2024) { ?> selected="selected" <?php } ?>
                            value="2024">2024
                        </option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label>Deduction Month:</label>
                    <select name="month" id="month" class="form-control" required="required">
                        <option value="">Select Month</option>
                        <option <?php if ($v_loan->deduction_month == "01") { ?> selected="selected" <?php } ?>
                            value="01">
                            January
                        </option>
                        <option <?php if ($v_loan->deduction_month == "02") { ?> selected="selected" <?php } ?>
                            value="02">
                            February
                        </option>
                        <option <?php if ($v_loan->deduction_month == "03") { ?> selected="selected" <?php } ?>
                            value="03">
                            March
                        </option>
                        <option <?php if ($v_loan->deduction_month == "04") { ?> selected="selected" <?php } ?>
                            value="04">
                            April
                        </option>
                        <option <?php if ($v_loan->deduction_month == "05") { ?> selected="selected" <?php } ?>
                            value="05">
                            May
                        </option>
                        <option <?php if ($v_loan->deduction_month == "06") { ?> selected="selected" <?php } ?>
                            value="06">
                            June
                        </option>
                        <option <?php if ($v_loan->deduction_month == "07") { ?> selected="selected" <?php } ?>
                            value="07">
                            July
                        </option>
                        <option <?php if ($v_loan->deduction_month == "08") { ?> selected="selected" <?php } ?>
                            value="08">August
                        </option>
                        <option <?php if ($v_loan->deduction_month == "09") { ?> selected="selected" <?php } ?>
                            value="09">September
                        </option>
                        <option <?php if ($v_loan->deduction_month == "10") { ?> selected="selected" <?php } ?>
                            value="10">
                            October
                        </option>
                        <option <?php if ($v_loan->deduction_month == "11") { ?> selected="selected" <?php } ?>
                            value="11">
                            November
                        </option>
                        <option <?php if ($v_loan->deduction_month == "12") { ?> selected="selected" <?php } ?>
                            value="12">
                            December
                        </option>
                    </select>
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                <div class="col-md-12">
                    <input type="submit" class="form-control btn btn-success" value="Add Loan">
                </div>
            </div>
        </div>
        <div id="add_msg" class="text-center"></div>
    </form>
<?php } ?>

<script>
    $('body').on('focus', ".issue_date", function () {
        $(this).datepicker({dateFormat: 'yy-mm-dd', changeYear: true, changeMonth: true, yearRange: "1970:2100"});
    });
</script>


<script>
    function check_amount_of_installment() {
        var amount = $('#loan_amount').val();
        var no_of_installment = $('#no_of_installment').val();
        var amount_of_installment = (amount / no_of_installment);
        $('#amount_of_installment').val(amount_of_installment);
    }
</script>
<script>
    $(document).ready(function () {
        $('#update_loan_frm').submit(function () {
            var dataString = $('#update_loan_frm').serialize();
            $.ajax({
                type: "POST",
                url: '<?php echo base_url() ?>hr/loan/update_loan',
                data: dataString,
                async: false,
                success: function (result) {
                    if (result) {
                        $('#add_msg').html(result);
                        $('#add_msg .alert').delay(5000).fadeOut(1000);
                        $('#update_loan_frm').trigger("reset");
                        window.setTimeout(function () {
                            window.location.href = "<?php echo base_url()?>hr/loan/all_loan";
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