<?php foreach ($academic as $v_academic) { ?>
    <form action="#" id="update_academic_frm" method="post">
        <div class="row">
            <div class="form-group">
                <div class="col-md-4">
                    <label>Employee ID:</label>
                    <input type="hidden" name="id" value="<?php echo $v_academic->id; ?>">
                    <input id="emp_id" value="<?php echo $v_academic->emp_id; ?>" name="emp_id" readonly="readonly"
                           type="text" class="form-control"
                           placeholder="Employee ID ....">
                </div>
                <div class="col-md-4">
                    <label>Exam Degree:</label>
                    <select required="required" name="exam_degree_id" class="form-control">
                        <option value="">Degree</option>
                        <?php foreach ($exam_degree as $v_exam) { ?>
                            <?php if ($v_exam->id == $v_academic->exam_degree_id) { ?>
                                <option selected="selected"
                                        value="<?php echo $v_exam->id; ?>"><?php echo $v_exam->degree_name; ?></option>
                            <?php } else { ?>
                                <option value="<?php echo $v_exam->id; ?>"><?php echo $v_exam->degree_name; ?></option>
                            <?php } ?>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-md-4">
                    <label>Grade Marks:</label>
                    <input required="required" value="<?php echo $v_academic->grade_marks; ?>" name="grade_marks"
                           type="text" class="form-control">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="form-group">
                <div class="col-md-4">
                    <label>Academic Session</label>
                    <input required="required" value="<?php echo $v_academic->academic_session; ?>"
                           name="academic_session" type="text"
                           class="form-control">
                </div>
                <div class="col-md-4">
                    <label>Year of Passing:</label>
                    <input required="required" value="<?php echo $v_academic->year_of_passing; ?>"
                           name="year_of_passing" type="text"
                           class="form-control">
                </div>
                <div class="col-md-4">
                    <label>Institute:</label>
                    <input required="required" value="<?php echo $v_academic->institute; ?>" name="institute"
                           type="text" class="form-control">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="form-group">
                <div class="col-md-4">
                    <label>Group Name:</label>
                    <select required="required" name="study_group_id" class="form-control">
                        <option value="">Group</option>
                        <?php foreach ($study_group as $v_study_group) { ?>
                            <?php if ($v_study_group->id == $v_academic->study_group_id) { ?>
                                <option selected="selected"
                                        value="<?php echo $v_study_group->id; ?>"><?php echo $v_study_group->group_name; ?></option>
                            <?php } else { ?>
                                <option
                                    value="<?php echo $v_study_group->id; ?>"><?php echo $v_study_group->group_name; ?></option>
                            <?php } ?>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-md-4">
                    <label>Board name:</label>
                    <select required="required" name="board_id" class="form-control">
                        <option value="">Board</option>
                        <?php foreach ($board as $v_board) { ?>
                            <?php if ($v_board->id == $v_academic->board_id) { ?>
                                <option selected="selected"
                                        value="<?php echo $v_board->id; ?>"><?php echo $v_board->board_name; ?></option>
                            <?php } else { ?>
                                <option value="<?php echo $v_board->id; ?>"><?php echo $v_board->board_name; ?></option>
                            <?php } ?>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-md-4">
                    <label>Exam name:</label>
                    <select required="required" name="exam_name_id" class="form-control">
                        <option value="">Exam</option>
                        <?php foreach ($exam_name as $v_exam_name) { ?>
                            <?php if ($v_exam_name->id == $v_academic->exam_name_id) { ?>
                                <option selected="selected"
                                        value="<?php echo $v_exam_name->id; ?>"><?php echo $v_exam_name->exam_name; ?></option>
                            <?php } else { ?>
                                <option
                                    value="<?php echo $v_exam_name->id; ?>"><?php echo $v_exam_name->exam_name; ?></option>
                            <?php } ?>
                        <?php } ?>
                    </select>
                </div>
            </div>
        </div>
        </br>
        <div class="row">
            <div class="form-group">
                <div class="col-md-12">
                    <input type="submit" class="form-control btn btn-success" value="Update Academic Info">
                </div>
            </div>
        </div>
        </br>
        <div id="add_msg" class="text-center"></div>
    </form>
<?php } ?>

<script>
    $(document).ready(function () {
        $("#update_academic_frm").submit(function () {
            var dataString = $('#update_academic_frm').serialize();
            $.ajax({
                type: "POST",
                url: '<?php echo base_url() ?>hr/my_resume/update_academic',
                data: dataString,
                success: function (result) {
                    if (result) {
                        $('#add_msg').html(result);
                        $('#add_msg .alert').delay(5000).fadeOut(1000);
                        $('#update_academic_frm').trigger("reset");
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