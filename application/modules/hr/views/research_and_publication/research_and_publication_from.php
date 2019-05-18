<form action="" id="add_research_and_publication" method="post">
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
                        <label>Title/Article:</label>
                        <input id="	title_article" name="title_article[]" type="text" class="form-control"
                               placeholder="Title/article ....">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-6">
                        <label>Journal Name:</label>
                        <input id="journal_name" name="journal_name[]" type="text" class="form-control"
                               placeholder="Journal Name ....">
                    </div>
                    <div class="col-md-6">
                        <label>Publish By:</label>
                        <input id="publish_by" name="publish_by[]" type="text" class="form-control"
                               placeholder="Publish by ....">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-6">
                        <label>Journal Type:</label>
                        <input name="journal_type[]" id="journal_type" type="text" class="form-control"
                               placeholder="Journal type....">
                    </div>
                    <div class="col-md-6">
                        <label>Country:</label>
                        <input id="country" name="country[]" type="text" class="form-control"
                               placeholder="Country....">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-6">
                        <label>Issn Number:</label>
                        <input name="issn_number[]" id="issn_number" type="text" class="form-control"
                               placeholder="Issn number....">
                    </div>
                    <div class="col-md-6">
                        <label>Published Date:</label>
                        <input id="published_date" name="published_date[]" type="text" class="form-control published_date"
                               placeholder="Published date....">
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
                <input type="submit" class="form-control btn btn-success" value="Add Research and publication">
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
            <label>Title/Article:</label>\
            <input id="	title_article" name="title_article[]" type="text" class="form-control" placeholder="Title/article ....">\
            </div>\
            </div>\
            </div>\
            <div class="form-group">\
            <div class="row">\
            <div class="col-md-6">\
            <label>Journal Name:</label>\
            <input id="journal_name" name="journal_name[]" type="text" class="form-control" placeholder="Journal Name ....">\
            </div>\
            <div class="col-md-6">\
            <label>Publish By:</label>\
            <input id="publish_by" name="publish_by[]" type="text" class="form-control" placeholder="Publish by ....">\
            </div>\
            </div>\
            </div>\
            <div class="form-group">\
            <div class="row">\
            <div class="col-md-6">\
            <label>Journal Type:</label>\
            <input name="journal_type[]" id="journal_type" type="text" class="form-control" placeholder="Journal type....">\
            </div>\
            <div class="col-md-6">\
            <label>Country:</label>\
            <input id="country" name="country[]" type="text" class="form-control" placeholder="Country....">\
            </div>\
            </div>\
            </div>\
            <div class="form-group">\
            <div class="row">\
            <div class="col-md-6">\
            <label>Issn Number:</label>\
            <input name="issn_number[]" id="issn_number" type="text" class="form-control" placeholder="Issn number....">\
            </div>\
            <div class="col-md-6">\
            <label>Published Date:</label>\
            <input name="published_date[]" type="text" class="form-control published_date" placeholder="Published date....">\
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
    $('body').on('focus', ".published_date", function () {
        $(this).datepicker({dateFormat: 'yy-mm-dd', changeYear: true, changeMonth: true, yearRange: "1970:2100"});
    });
</script>
<script>
    $(document).ready(function () {
        $("#add_research_and_publication").submit(function () {
            var dataString = $('#add_research_and_publication').serialize();
            $.ajax({
                type: "POST",
                url: '<?php echo base_url() ?>hr/research_and_publication/create_research_and_publication',
                data: dataString,
                success: function (result) {
                    if (result) {
                        $('#add_msg').html(result);
                        $('#add_msg .alert').delay(5000).fadeOut(1000);
                        $('#add_research_and_publication').trigger("reset");
                        window.setTimeout(function () {
                            window.location.href = "<?php echo base_url()?>hr/research_and_publication/all_research_and_publication";
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