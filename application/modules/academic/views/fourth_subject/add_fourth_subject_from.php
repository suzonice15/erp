<form action="#" id="add_fourth_subject_frm" method="post">
    <table class="add_more_field table table-bordered table-striped table-hover">
        <tr>
            <td>Student ID</td>
            <td>Subject Name</td>
            <td style="width: 105px;">Action</td>
        </tr>
        <tr>
            <td>
              <input type="text" placeholder="Student ID" id="student_id" name="student_id[]" class="form-control">
            </td>
            <td>
                <select required="required" name="subject_id[]" id="subject_id" class="form-control">
                    <option value="">Subject Subject</option>
                    <?php foreach ($subject as $v_subject) { ?>
                        <option
                            value="<?php echo $v_subject->id; ?>"><?php echo $v_subject->name; ?></option>
                    <?php } ?>
                </select>
            </td>
            <td>
                <button type="button" onclick="return add_more();" class="btn btn-success">Add More</button>
            </td>
        </tr>
    </table>
    <div class="form-group">
        <input type="submit" class="form-control btn btn-success" value="Add fourth subject">
    </div>
    <input type="hidden" name="total_num_of_fields" value="1">
    <div id="add_msg" class="text-center"></div>
</form>

<script>
    var i = 1
    function add_more() {
        i++;
        $('.add_more_field').append('<tr class="remove_field' + i + '">\
            <td>\
            <input type="text" placeholder="Student ID" id="student_id" name="student_id[]" class="form-control">\
            </td>\
            <td>\
            <select required="required" name="subject_id[]" id="subject_id" class="form-control">\
            <option value="">Select Subject</option>\
            <?php foreach ($subject as $v_subject) { ?>\
            <option value="<?php echo $v_subject->id;?>"><?php echo $v_subject->name;?></option>\
            <?php } ?>\
            </select>\
            </td>\
            <td>\
            <button onclick="return remove_button($(this));" value="' + i + '" class="btn btn-danger">Remove</button>\
        </td>\
        </tr>');
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
        $("#add_fourth_subject_frm").submit(function () {
            var dataString = $('#add_fourth_subject_frm').serialize();
            $.ajax({
                type: "POST",
                url: '<?php echo base_url() ?>academic/fourth_subject/create_fourth_subject',
                data: dataString,
                success: function (result) {
                    if (result) {
                        $('#add_msg').html(result);
                        $('#add_msg .alert').delay(5000).fadeOut(1000);
                        $('#add_fourth_subject_frm').trigger("reset");
                        window.setTimeout(function () {
                            window.location.href = "<?php echo base_url()?>academic/fourth_subject/all_fourth_subject";
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


