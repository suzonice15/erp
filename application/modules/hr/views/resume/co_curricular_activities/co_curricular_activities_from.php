<form action="#" id="co_curricular_activities" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <div class="row">
            <div class="col-md-12">
                <label>Employee ID:</label>
                <input id="emp_id" readonly="readonly" value="<?php echo $emp_id; ?>" name="emp_id" type="text"
                       class="form-control">
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="row">
            <label style="padding: 0px 0px 0px 15px;">Description:</label>
            <div class="col-md-12">
                <textarea required="required" name="description" id="description"></textarea>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="form-group">
            <div class="col-md-12">
                <input type="submit" class="form-control btn btn-success" value="Add Co-curricular activities">
            </div>
        </div>
    </div>
    <div id="add_msg" class="text-center"></div>
</form>

<script>
    CKEDITOR.replace('description');
    CKEDITOR.config.autoParagraph = false;
</script>

<script>
    $(document).ready(function () {
        $('#co_curricular_activities').submit(function () {
            var value = CKEDITOR.instances['description'].getData();
            var dataString = new FormData($(this)[0]);
            dataString.append("description", value);
            $.ajax({
                type: "POST",
                url: '<?php echo base_url() ?>hr/my_resume/create_co_curricular_activities',
                data: dataString,
                async: false,
                success: function (result) {
                    if (result) {
                        $('#add_msg').html(result);
                        $('#add_msg .alert').delay(5000).fadeOut(1000);
                        $('#co_curricular_activities').trigger("reset");
                        window.setTimeout(function () {
                            window.location.href = "<?php echo base_url()?>hr/my_resume/all_my_resume";
                        }, 1000);
                        return false;
                    } else {
                        return false;
                    }
                },
                cache: false,
                contentType: false,
                processData: false
            });
            return false;
        });
    });
</script>