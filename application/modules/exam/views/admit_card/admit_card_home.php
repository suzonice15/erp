<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <div class="pageheader" style="background-color: #F5F5F5;">
                <h2><i class="fa fa-home"></i>Admit Card Info Page <br></h2>
                <ol class="breadcrumb" style="background-color: #F5F5F5;">
                    <li><a href="<?php echo base_url() ?>exam/admin_card/all_admit_card">Dashboard</a></li>
                    <li class="active">Add edit delete view.....</li>
                </ol>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading" style="height: 55px;">
                    <div class="col-md-3">
                        <select name="search_academic_exam_id" id="search_academic_exam_id"
                                class="form-control">
                            <?php foreach ($academic_exam as $v_data) { ?>
                                <option value="<?php echo $v_data->id; ?>"><?php echo $v_data->exam_name; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <select onchange="return search_content();" name="search_year" id="search_year"
                                class="form-control">
                            <option value="0">Year</option>
                            <?php foreach ($year as $v_data) { ?>
                                <option
                                    value="<?php echo $v_data->year_name; ?>"><?php echo $v_data->year_name; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="row">
                        <div class="form-group">
                            <div class="col-md-12">
                                <div id="load_data">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function search_content() {
        var academic_exam_id = $('#search_academic_exam_id').val();
        var year = $('#search_year').val();
        $.ajax({
            type: 'post',
            url: '<?php echo base_url(); ?>exam/admit_card/view_admit_card',
            data: {academic_exam_id: academic_exam_id, year: year},
            success: function (data) {
                if (data) {
                    $("#load_data").html(data);
                    return false;
                } else {
                    return false;
                }
            }
        });
    }
</script>


