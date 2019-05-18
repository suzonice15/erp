<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <div class="pageheader" style="background-color: #F5F5F5;">
                <h2><i class="fa fa-home"></i>Admission Report Info Page <br></h2>
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
                <form action="#" method="post" id="search_admission_report">
                    <div class="panel-heading" style="height: 105px;">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3">
                                    <select name="class_id" id="class_id"
                                            class="form-control">
                                        <option value="">Select Class</option>
                                        <?php foreach ($class as $v_class) { ?>
                                            <option
                                                value="<?php echo $v_class->id; ?>"><?php echo $v_class->name; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <select name="study_group_id" id="study_group_id"
                                            class="form-control">
                                        <option value="">Select study group</option>
                                        <?php foreach ($study_group as $v_study_group) { ?>
                                            <option
                                                value="<?php echo $v_study_group->id; ?>"><?php echo $v_study_group->group_name; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <select onchange="return select_section();" name="shift_id" id="shift_id"
                                            class="form-control">
                                        <option value="">Select Shift</option>
                                        <?php foreach ($shift as $v_shift) { ?>
                                            <option
                                                value="<?php echo $v_shift->id; ?>"><?php echo $v_shift->shift_name; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <select name="section_id" id="section_id" class="form-control">
                                        <option value="">Select Section</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3">
                                    <select name="year" id="year"
                                            class="form-control">
                                        <option value="">Year</option>
                                        <?php foreach ($year as $v_data) { ?>
                                            <option
                                                value="<?php echo $v_data->year_name; ?>"><?php echo $v_data->year_name; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <select name="gender_id" id="gender_id"
                                            class="form-control">
                                        <option value="">Select Gender</option>
                                        <?php foreach ($gender as $v_gender) { ?>
                                            <option
                                                value="<?php echo $v_gender->id; ?>"><?php echo $v_gender->gender_name; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <select name="religion_id" id="religion_id"
                                            class="form-control">
                                        <option value="0">Select Religion</option>
                                        <?php foreach ($religion as $v_religion) { ?>
                                            <option
                                                value="<?php echo $v_religion->id; ?>"><?php echo $v_religion->religion_name; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <select name="blood_group_id" id="blood_group_id"
                                            class="form-control">
                                        <option value="">Blood Group</option>
                                        <?php foreach ($blood_group as $v_blood_group) { ?>
                                            <option
                                                value="<?php echo $v_blood_group->id; ?>"><?php echo $v_blood_group->blood_group_name; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3">
                                    <select name="status" id="status" class="form-control">
                                        <option value="">Status</option>
                                        <option value="1">Active</option>
                                        <option value="2">Inactive</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <select name="admission_by" id="admission_by"
                                            class="form-control">
                                        <option value="">Admission By</option>
                                        <?php foreach ($user_name as $v_user_name) { ?>
                                            <option
                                                value="<?php echo $v_user_name->user_name; ?>"><?php echo $v_user_name->user_name; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <input type="submit" value="Search" class="btn btn-success">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="row">
                        <div class="form-group">
                            <div class="col-md-12">
                                <br>
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
    function select_section() {
        var shift_id = $('#shift_id').val();
        $.ajax({
            type: "POST",
            url: '<?php echo base_url() ?>admission/admission_report/select_section/' + shift_id,
            success: function (result) {
                if (result) {
                    $('#section_id').html(result);
                    return false;
                } else {
                    return false;
                }
            }
        });
        return false;
    }
</script>

<script>
    $(document).ready(function () {
        $('#search_admission_report').submit(function () {
            var dataString = $('#search_admission_report').serialize();
            $.ajax({
                type: "POST",
                url: '<?php echo base_url() ?>admission/admission_report/view_admission_report',
                data: dataString,
                success: function (result) {
                    if (result) {
                        $('#load_data').html(result);
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


