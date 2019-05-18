<form action="#" id="add_academic_frm" method="post">
    <table class="add_more_field table table-bordered table-striped table-hover">
        <tr>
            <td colspan="4">Employee ID</td>
            <td colspan="5">
                <input id="emp_id" name="emp_id" value="<?php echo $emp_id; ?>" type="text" readonly="readonly" class="form-control">
            </td>
        </tr>
        <tr>
            <td style="width: 105px;">Exam Degree</td>
            <td style="width: 105px;">Grade Marks</td>
            <td style="width: 105px;">Academic Session</td>
            <td style="width: 105px;">Year of Passing</td>
            <td style="width: 105px;">Institute</td>
            <td style="width: 105px;">Study Group</td>
            <td style="width: 105px;">Board Name</td>
            <td style="width: 105px;">Exam name</td>
            <td style="width: 105px;">Action</td>
        </tr>
        <tr>
            <td>
                <select required="required" name="exam_degree_id[]" id="exam_degree_id" class="form-control">
                    <option value="">Degree</option>
                    <?php foreach ($exam_degree as $v_exam) { ?>
                        <option value="<?php echo $v_exam->id; ?>"><?php echo $v_exam->degree_name; ?></option>
                    <?php } ?>
                </select>
            </td>
            <td>
                <input required="required" id="grade_marks" name="grade_marks[]" type="text" class="form-control">
            </td>
            <td>
                <input required="required" id="academic_session" name="academic_session[]" type="text"
                       class="form-control">
            </td>
            <td>
                <input required="required" id="year_of_passing" name="year_of_passing[]" type="text"
                       class="form-control">
            </td>
            <td>
                <input required="required" id="institute" name="institute[]" type="text" class="form-control">
            </td>
            <td>
                <select required="required" name="study_group_id[]" id="study_group_id" class="form-control">
                    <option value="">Group</option>
                    <?php foreach ($study_group as $v_study_group) { ?>
                        <option
                            value="<?php echo $v_study_group->id; ?>"><?php echo $v_study_group->group_name; ?></option>
                    <?php } ?>
                </select>
            </td>
            <td>
                <select required="required" name="board_id[]" id="board_id" class="form-control">
                    <option value="">Board</option>
                    <?php foreach ($board as $v_board) { ?>
                        <option value="<?php echo $v_board->id; ?>"><?php echo $v_board->board_name; ?></option>
                    <?php } ?>
                </select>
            </td>
            <td>
                <select required="required" name="exam_name_id[]" id="exam_name_id" class="form-control">
                    <option value="">Exam</option>
                    <?php foreach ($exam_name as $v_exam_name) { ?>
                        <option value="<?php echo $v_exam_name->id; ?>"><?php echo $v_exam_name->exam_name; ?></option>
                    <?php } ?>
                </select>
            </td>
            <td>
                <button type="button" onclick="return add_more();" class="btn btn-success">Add More</button>
            </td>
        </tr>
    </table>
    <div class="form-group">
        <input type="submit" class="form-control btn btn-success" value="Add Employee Academic Info">
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
            <select required="required" name="exam_degree_id[]" id="exam_degree_id" class="form-control">\
            <option value="">Degree</option>\
            <?php foreach ($exam_degree as $v_exam) { ?>\
            <option value="<?php echo $v_exam->id;?>"><?php echo $v_exam->degree_name;?></option>\
            <?php } ?>\
            </select>\
            </td>\
            <td>\
            <input required="required" id="grade_marks" name="grade_marks[]" type="text" class="form-control">\
            </td>\
            <td>\
            <input required="required" id="academic_session" name="academic_session[]" type="text" class="form-control">\
            </td>\
            <td>\
            <input required="required" id="year_of_passing" name="year_of_passing[]" type="text" class="form-control">\
            </td>\
            <td>\
            <input required="required" id="institute" name="institute[]" type="text" class="form-control">\
            </td>\
            <td>\
            <select required="required" name="study_group_id[]" id="study_group_id" class="form-control">\
            <option value="">Group</option>\
            <?php foreach ($study_group as $v_study_group) { ?>\
            <option value="<?php echo $v_study_group->id;?>"><?php echo $v_study_group->group_name;?></option>\
            <?php } ?>\
            </select>\
            </td>\
            <td>\
            <select required="required" name="board_id[]" id="board_id" class="form-control">\
            <option value="">Board</option>\
            <?php foreach ($board as $v_board) { ?>\
            <option value="<?php echo $v_board->id;?>"><?php echo $v_board->board_name;?></option>\
            <?php } ?>\
            </select>\
            </td>\
            <td>\
            <select required="required" name="exam_name_id[]" id="exam_name_id" class="form-control">\
            <option value="">Exam</option>\
            <?php foreach ($exam_name as $v_exam_name) { ?>\
            <option value="<?php echo $v_exam_name->id;?>"><?php echo $v_exam_name->exam_name;?></option>\
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
        $("#add_academic_frm").submit(function () {
            var dataString = $('#add_academic_frm').serialize();
            $.ajax({
                type: "POST",
                url: '<?php echo base_url() ?>hr/my_resume/create_academic',
                data: dataString,
                success: function (result) {
                    if (result) {
                        $('#add_msg').html(result);
                        $('#add_msg .alert').delay(5000).fadeOut(1000);
                        $('#add_academic_frm').trigger("reset");
                        window.setTimeout(function () {
                            window.location.href = "<?php echo base_url()?>hr/my_resume/all_my_resume";
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


