<form action="" id="add_award_and_honours">
    <div class="add_more_field">
        <div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-6">
                        <label>Employee ID:</label> <span id="err_msg"></span>
                        <input id="emp_id" required="required" name="emp_id[]" type="text" class="form-control"
                               placeholder="Employee ID ....">
                    </div>
                    <div class="col-md-6">
                        <label>Ward/Honours Title:</label>
                        <input id="award_honors_title" name="award_honors_title[]" type="text" class="form-control"
                               placeholder="Award/honors title ....">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-6">
                        <label>Award/Honours Type:</label>
                        <select name="awards_type[]" id="awards_type" class="form-control">
                            <option value="">Select Type</option>
                            <option value="1">National</option>
                            <option value="2">International</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label>Country:</label>
                        <input id="country" name="country[]" type="text" class="form-control"
                               placeholder="Country ....">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-6">
                        <label>Receiving Date:</label>
                        <input name="receiving_date[]" type="text" class="form-control receiving_date"
                               placeholder="Receiving date....">
                    </div>
                    <div class="col-md-6">
                        <label>Organization Name:</label>
                        <input id="organization_name" name="organization_name[]" type="text" class="form-control"
                               placeholder="Organization name....">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-6">
                        </br>
                        <button type="button" onclick="return add_more();" class="btn btn-success">Add More</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="form-group">
            <div class="col-md-12">
                <input type="submit" class="form-control btn btn-success" value="Add Awards/Honours">
            </div>
        </div>
    </div>
    </br>
    <input type="hidden" name="total_num_of_fields" value="1">
    <div id="add_msg" class="text-center"></div>
</form>


<script>
    var i = 1;
    function add_more() {
        i++;
        $('.add_more_field').append('<div class="remove_field' + i + '">\
            <div class="form-group">\
            <div class="row">\
            <div class="col-md-6">\
            <label>Employee ID:</label> <span id="err_msg"></span>\
            <input id="emp_id" required="required" name="emp_id[]" type="text" class="form-control" placeholder="Employee ID ....">\
            </div>\
            <div class="col-md-6">\
            <label>Ward/Honours Title:</label>\
            <input id="award_honors_title" name="award_honors_title[]" type="text" class="form-control"placeholder="Award/honors title ....">\
            </div>\
            </div>\
            </div>\
            <div class="form-group">\
            <div class="row">\
            <div class="col-md-6">\
            <label>Award/Honours Type:</label>\
            <select name="awards_type[]" id="awards_type" class="form-control">\
            <option value="">Select Type</option>\
            <option value="1">National</option>\
            <option value="2">International</option>\
            </select>\
            </div>\
            <div class="col-md-6">\
            <label>Country:</label>\
            <input id="country" name="country[]" type="text" class="form-control" placeholder="Country ....">\
            </div>\
            </div>\
            </div>\
            <div class="form-group">\
            <div class="row">\
            <div class="col-md-6">\
            <label>Receiving Date:</label>\
            <input name="receiving_date[]" type="text" class="form-control receiving_date" placeholder="Receiving date....">\
            </div>\
            <div class="col-md-6">\
            <label>Organization Name:</label>\
            <input id="organization_name" name="organization_name[]" type="text" class="form-control" placeholder="Organization name....">\
            </div>\
            </div>\
            </div>\
            <div class="form-group">\
            <div class="row">\
            <div class="col-md-6">\
            <button onclick="return remove_button($(this));" value="' + i + '" class="btn btn-danger">Remove</button>\
            </div>\
            </div>\
            </div>\
        </div>');
        var total_fields = parseInt($('input[name="total_num_of_fields"]').val());
        $('input[name="total_num_of_fields"]').val(total_fields + 1);
    }
</script>
<script>
    function remove_button($this) {
        var remove_id = $this.val();
        $(".remove_field" + remove_id + "").remove();
        var total_fields = parseInt($('input[name="total_num_of_fields"]').val());
        $('input[name="total_num_of_fields"]').val(total_fields - 1);
    }
</script>
<script>
    $('body').on('focus', ".receiving_date", function () {
        $(this).datepicker({dateFormat: 'yy-mm-dd', changeYear: true, changeMonth: true, yearRange: "1970:2100"});
    });
</script>
<script>
    $(document).ready(function () {
        $("#add_award_and_honours").submit(function () {
            var dataString = $('#add_award_and_honours').serialize();
            $.ajax({
                type: "POST",
                url: '<?php echo base_url() ?>hr/ward_and_honours/create_ward_and_honours',
                data: dataString,
                success: function (result) {
                    if (result) {
                        $('#add_msg').html(result);
                        $('#add_msg .alert').delay(5000).fadeOut(1000);
                        $('#add_award_and_honours').trigger("reset");
                        window.setTimeout(function () {
                            window.location.href = "<?php echo base_url()?>hr/ward_and_honours/all_ward_and_honours";
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