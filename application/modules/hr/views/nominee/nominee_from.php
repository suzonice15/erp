<form action="#" id="add_more_data" method="post" enctype="multipart/form-data">
    <div class="add_more_field">
        <div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-6">
                        <label>Employee ID:</label>
                        <input id="emp_id" required="required" name="emp_id[]" type="text"
                               class="form-control"
                               placeholder="Employee ID ....">
                    </div>
                    <div class="col-md-6">
                        <label>Nominee Name:</label>
                        <input id="name" name="name[]" type="text" class="form-control"
                               placeholder="Institute ....">
                    </div>

                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-6">
                        <label>Father Name:</label>
                        <input id="father_name" name="father_name[]" type="text" class="form-control"
                               placeholder="Father Name ....">
                    </div>
                    <div class="col-md-6">
                        <label>Mother Name:</label>
                        <input id="mother_name" required="required" name="mother_name[]" type="text"
                               class="form-control"
                               placeholder="Mother Name ....">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-6">
                        <label>Spouse Name:</label>
                        <input name="spouse_name[]" id="spouse_name" type="text" class="form-control joined_on"
                               placeholder="Spouse Name ....">
                    </div>
                    <div class="col-md-6">
                        <label>Percent:</label>
                        <input name="percent[]" id="percent" type="text" class="form-control joined_on"
                               placeholder="Percent ....">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-md-6">
                        <label>National ID:</label>
                        <input id="national_id" name="national_id[]" type="text" class="form-control"
                               placeholder="National ID ....">
                    </div>
                    <div class="col-md-6">
                        <label>Passport Number:</label>
                        <input id="passport_number" name="passport_number[]" type="text"
                               class="form-control"
                               placeholder="Passport Number ....">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <label style="padding: 0px 0px 0px 15px;">Present Address:</label>
                    <div class="col-md-12">
                        <textarea name="present_address[]" id="present_address" cols="120" rows="4"></textarea>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <label style="padding: 0px 0px 0px 15px;">Permanent Address:</label>
                    <div class="col-md-12">
                        <textarea name="permanent_address[]" id="permanent_address" cols="120" rows="4"></textarea>
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

    <div class="form-group">
        <div class="row">
            <div class="col-md-12">
                <input type="submit" class="form-control btn btn-success" value="Add Nominee">
            </div>
        </div>
    </div>

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
            <label>Employee ID:</label>\
            <input id="emp_id" required="required" name="emp_id[]" type="text" class="form-control" placeholder="Employee ID ....">\
            </div>\
            <div class="col-md-6">\
            <label>Nominee Name:</label>\
            <input id="name" name="name[]" type="text" class="form-control" placeholder="Institute ....">\
            </div>\
            </div>\
            </div>\
            <div class="form-group">\
            <div class="row">\
            <div class="col-md-6">\
            <label>Father Name:</label>\
            <input id="father_name" name="father_name[]" type="text" class="form-control" placeholder="Father Name ....">\
            </div>\
            <div class="col-md-6">\
            <label>Mother Name:</label>\
            <input id="mother_name" required="required" name="mother_name[]" type="text" class="form-control" placeholder="Mother Name ....">\
            </div>\
            </div>\
            </div>\
            <div class="form-group">\
            <div class="row">\
            <div class="col-md-6">\
            <label>Spouse Name:</label>\
            <input name="spouse_name[]" id="spouse_name" type="text" class="form-control joined_on" placeholder="Spouse Name ....">\
            </div>\
            <div class="col-md-6">\
            <label>Percent:</label>\
            <input name="percent[]" id="percent" type="text" class="form-control joined_on" placeholder="Percent ....">\
            </div>\
            </div>\
            </div>\
            <div class="form-group">\
            <div class="row">\
            <div class="col-md-6">\
            <label>National ID:</label>\
            <input id="national_id" name="national_id[]" type="text" class="form-control" placeholder="National ID ....">\
            </div>\
            <div class="col-md-6">\
            <label>Passport Number:</label>\
            <input id="passport_number" name="passport_number[]" type="text" class="form-control" placeholder="Passport Number ....">\
            </div>\
            </div>\
            </div>\
            <div class="form-group">\
            <div class="row">\
            <label style="padding: 0px 0px 0px 15px;">Present Address:</label>\
            <div class="col-md-12">\
            <textarea name="present_address[]" id="present_address" cols="120" rows="4"></textarea>\
            </div>\
            </div>\
            </div>\
            <div class="form-group">\
            <div class="row">\
            <label style="padding: 0px 0px 0px 15px;">Permanent Address:</label>\
            <div class="col-md-12">\
            <textarea name="permanent_address[]" id="permanent_address" cols="120" rows="4"></textarea>\
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
    $(document).ready(function () {
        $('#add_more_data').submit(function () {
            var dataString = $('#add_more_data').serialize();
            $.ajax({
                type: "POST",
                url: '<?php echo base_url() ?>hr/nominee/create_nominee',
                data: dataString,
                async: false,
                success: function (result) {
                    if (result) {
                        $('#add_msg').html(result);
                        $('#add_msg .alert').delay(5000).fadeOut(1000);
                        $('#add_more_data').trigger("reset");
                        window.setTimeout(function () {
                            window.location.href = "<?php echo base_url()?>hr/nominee/all_nominee";
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