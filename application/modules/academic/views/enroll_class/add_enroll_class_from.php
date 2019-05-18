<div class="form-group">
    <div class="row">
        <div class="col-md-6">
            <label>Class</label>
            <select name="class_id" id="class_id" class="form-control">
                <option value="">Select Class</option>
                <?php foreach ($class as $v_class) { ?>
                    <option value="<?php echo $v_class->id; ?>"><?php echo $v_class->name; ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="col-md-6">
            <label>Type</label>
            <select onchange="select_student();" name="type" id="type" class="form-control">
                <option value="">Select Type</option>
                <option value="1">Admission Student</option>
                <option value="2">Exam Student</option>
            </select>
        </div>
    </div>
</div>
<div id="load_student">

</div>
<script>
    function select_student() {
        var class_id = $('#class_id').val();
        var type = $('#type').val();
        $.ajax({
            type: 'post',
            url: '<?php echo base_url()?>academic/enroll_class/load_student_list',
            data: {class_id: class_id, type: type},
            success: function (result) {
                if (result) {
                    $('#load_student').html(result);
                    return false;
                } else {
                    return false;
                }
            }
        });
        return false;
    }
</script>