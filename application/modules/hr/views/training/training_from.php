<form action="" id="add_training">
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
                        <label>Training Title:</label>
                        <input id="training_title" name="training_title[]" type="text" class="form-control"
                               placeholder="Training Title ....">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-6">
                        <label>Topics Covered:</label>
                        <input id="topics_covered" name="topics_covered[]" type="text" class="form-control"
                               placeholder="Topics Covered ....">
                    </div>
                    <div class="col-md-6">
                        <label>Institute:</label>
                        <input id="institute" name="institute[]" type="text" class="form-control"
                               placeholder="Institute ....">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-6">
                        <label>Country:</label>
                        <input name="country[]" id="country" type="text" class="form-control"
                               placeholder="Country....">
                    </div>
                    <div class="col-md-6">
                        <label>Location:</label>
                        <input id="location" name="location[]" type="text" class="form-control"
                               placeholder="Location....">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-6">
                        <label>Duration:</label>
                        <input name="duration[]" id="duration" type="text" class="form-control"
                               placeholder="Duration....">
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
                <input type="submit" class="form-control btn btn-success" value="Add Training">
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
            <label>Training Title:</label>\
            <input id="training_title" name="training_title[]" type="text" class="form-control" placeholder="Training Title ....">\
            </div>\
            </div>\
            </div>\
            <div class="form-group">\
            <div class="row">\
            <div class="col-md-6">\
            <label>Topics Covered:</label>\
            <input id="topics_covered" name="topics_covered[]" type="text" class="form-control" placeholder="Topics Covered ....">\
            </div>\
            <div class="col-md-6">\
            <label>Institute:</label>\
            <input id="institute" name="institute[]" type="text" class="form-control" placeholder="Institute ....">\
            </div>\
            </div>\
            </div>\
            <div class="form-group">\
            <div class="row">\
            <div class="col-md-6">\
            <label>Country:</label>\
            <input name="country[]" id="country" type="text" class="form-control" placeholder="Country....">\
            </div>\
            <div class="col-md-6">\
            <label>Location:</label>\
            <input id="location" name="location[]" type="text" class="form-control" placeholder="Location....">\
            </div>\
            </div>\
            </div>\
            <div class="form-group">\
            <div class="row">\
            <div class="col-md-6">\
            <label>Duration:</label>\
            <input name="duration[]" id="duration" type="text" class="form-control" placeholder="Duration....">\
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
        $("#add_training").submit(function () {
            var dataString = $('#add_training').serialize();
            $.ajax({
                type: "POST",
                url: '<?php echo base_url() ?>hr/training/create_training',
                data: dataString,
                success: function (result) {
                    if (result) {
                        $('#add_msg').html(result);
                        $('#add_msg .alert').delay(5000).fadeOut(1000);
                        $('#add_training').trigger("reset");
                        window.setTimeout(function () {
                            window.location.href = "<?php echo base_url()?>hr/training/all_training";
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