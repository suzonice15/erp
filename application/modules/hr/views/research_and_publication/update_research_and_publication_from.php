<form action="#" id="update_more_data" method="post" enctype="multipart/form-data">
    <?php $i = 0;
    foreach ($research_and_publication as $v_data) {
        $i++; ?>
        <div class="add_more_field">
            <div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-12">
                            <div style="background-color: #3C8DBC; padding: 7px; text-align: center; height: 35px;">
                                Publication No.<?php echo $i; ?></div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <input type="hidden" name="id[]" value="<?php echo $v_data->id?>">
                            <label>Employee ID:</label> <span id="err_msg"></span>
                            <input id="emp_id" readonly="readonly" required="required" value="<?php echo $v_data->emp_id?>" name="emp_id[]" type="text" class="form-control"
                                   placeholder="Employee ID ....">
                        </div>
                        <div class="col-md-6">
                            <label>Title/Article:</label>
                            <input id="	title_article" value="<?php echo $v_data->title_article?>" name="title_article[]" type="text" class="form-control"
                                   placeholder="Title/article ....">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label>Journal Name:</label>
                            <input id="journal_name" value="<?php echo $v_data->journal_name?>" name="journal_name[]" type="text" class="form-control"
                                   placeholder="Journal Name ....">
                        </div>
                        <div class="col-md-6">
                            <label>Publish By:</label>
                            <input id="publish_by" value="<?php echo $v_data->publish_by?>" name="publish_by[]" type="text" class="form-control"
                                   placeholder="Publish by ....">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label>Journal Type:</label>
                            <input name="journal_type[]" value="<?php echo $v_data->journal_type?>" id="journal_type" type="text" class="form-control"
                                   placeholder="Journal type....">
                        </div>
                        <div class="col-md-6">
                            <label>Country:</label>
                            <input id="country" name="country[]" value="<?php echo $v_data->country?>" type="text" class="form-control"
                                   placeholder="Country....">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label>Issn Number:</label>
                            <input name="issn_number[]" value="<?php echo $v_data->issn_number?>" id="issn_number" type="text" class="form-control"
                                   placeholder="Issn number....">
                        </div>
                        <div class="col-md-6">
                            <label>Published Date:</label>
                            <input value="<?php echo $v_data->published_date?>" name="published_date[]" type="text" class="form-control published_date"
                                   placeholder="Published date....">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
    <div class="form-group">
        <div class="row">
            <div class="col-md-12">
                <input type="submit" class="form-control btn btn-success" value="Update research and publication">
            </div>
        </div>
    </div>

    <input type="hidden" name="total_num_of_fields" value="<?php echo $i; ?>">
    <div id="add_msg" class="text-center"></div>
</form>
<script>
    $('body').on('focus', ".published_date", function () {
        $(this).datepicker({dateFormat: 'yy-mm-dd', changeYear: true, changeMonth: true, yearRange: "1970:2100"});
    });
</script>

<script>
    $(document).ready(function () {
        $('#update_more_data').submit(function () {
            var dataString = $('#update_more_data').serialize();
            $.ajax({
                type: "POST",
                url: '<?php echo base_url() ?>hr/research_and_publication/update_research_and_publication',
                data: dataString,
                async: false,
                success: function (result) {
                    if (result) {
                        $('#add_msg').html(result);
                        $('#add_msg .alert').delay(5000).fadeOut(1000);
                        $('#update_more_data').trigger("reset");
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