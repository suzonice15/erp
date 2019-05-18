<form action="" id="add_reference_frm" method="post">
    <div class="add_more_field">
        <div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-6">
                        <label>Employee ID:</label> <span id="err_msg"></span>
                        <input id="emp_id" readonly="readonly" value="<?php echo $emp_id; ?>" name="emp_id" type="text"
                               class="form-control"
                               placeholder="Employee ID ....">
                    </div>
                    <div class="col-md-6">
                        <label>Name:</label>
                        <input id="name" name="name[]" type="text" class="form-control"
                               placeholder="Name ....">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-6">
                        <label>Designation:</label>
                        <input id="designation" name="designation[]" type="text" class="form-control"
                               placeholder="Designation ....">
                    </div>
                    <div class="col-md-6">
                        <label>Organization:</label>
                        <input id="organization" name="organization[]" type="text" class="form-control"
                               placeholder="Organization ....">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-6">
                        <label>Address:</label>
                        <input name="address[]" id="address" type="text" class="form-control"
                               placeholder="Address....">
                    </div>
                    <div class="col-md-6">
                        <label>Email:</label>
                        <input id="email" name="email[]" type="text" class="form-control"
                               placeholder="Email Address....">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-6">
                        <label>Phone:</label>
                        <input name="phone[]" id="phone" type="text" class="form-control"
                               placeholder="Phone....">
                    </div>
                    <div class="col-md-6">
                        <label>Mobile:</label>
                        <input id="mobile" name="mobile[]" type="text" class="form-control"
                               placeholder="mobile....">
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
                <input type="submit" class="form-control btn btn-success" value="Add Reference">
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
            <div class="col-md-12">\
            <label>Name:</label>\
            <input id="name" name="name[]" type="text" class="form-control" placeholder="Name ....">\
            </div>\
            </div>\
            </div>\
            <div class="form-group">\
            <div class="row">\
            <div class="col-md-6">\
            <label>Designation:</label>\
            <input id="designation" name="designation[]" type="text" class="form-control" placeholder="Designation ....">\
            </div>\
            <div class="col-md-6">\
            <label>Organization:</label>\
            <input id="organization" name="organization[]" type="text" class="form-control" placeholder="Organization ....">\
            </div>\
            </div>\
            </div>\
            <div class="form-group">\
            <div class="row">\
            <div class="col-md-6">\
            <label>Address:</label>\
            <input name="address[]" id="address" type="text" class="form-control" placeholder="Address....">\
            </div>\
            <div class="col-md-6">\
            <label>Email:</label>\
            <input id="email" name="email[]" type="text" class="form-control" placeholder="Email Address....">\
            </div>\
            </div>\
            </div>\
            <div class="form-group">\
            <div class="row">\
            <div class="col-md-6">\
            <label>Phone:</label>\
            <input name="phone[]" id="phone" type="text" class="form-control" placeholder="Phone....">\
            </div>\
            <div class="col-md-6">\
            <label>Mobile:</label>\
            <input id="mobile" name="mobile[]" type="text" class="form-control" placeholder="mobile....">\
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
        $("#add_reference_frm").submit(function () {
            var dataString = $('#add_reference_frm').serialize();
            $.ajax({
                type: "POST",
                url: '<?php echo base_url() ?>hr/my_resume/create_reference',
                data: dataString,
                success: function (result) {
                    if (result) {
                        $('#add_msg').html(result);
                        $('#add_msg .alert').delay(5000).fadeOut(1000);
                        $('#add_reference_frm').trigger("reset");
                        window.setTimeout(function () {
                            window.location.href = "<?php echo base_url()?>hr/my_resume/all_my_resume";
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