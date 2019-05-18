<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <div class="pageheader" style="background-color: #F5F5F5;">
                <h2><i class="fa fa-home"></i>Employee Resume Info Page <br></h2>
                <ol class="breadcrumb" style="background-color: #F5F5F5;">
                    <li><a href="<?php echo base_url() ?>hr/resume/all_resume">Dashboard</a></li>
                    <li class="active">Add edit delete view.....</li>
                </ol>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped table-bordered table-hover">
                <tr>
                    <td colspan="2" style="text-align: center; background-color: #2e8ece; color: white;">Employee Basic
                        Information
                    </td>
                </tr>
                <?php foreach ($basic as $v_details) { ?>
                    <tr>
                        <td colspan="2">
                            <b><p>ID: <?php echo $v_details->emp_id; ?></span></p></b>
                            <b><p>Name: <?php echo $v_details->emp_name; ?></p></b>
                            <b><p>Email: <?php echo $v_details->email_address; ?></p></b>
                            <b><p>Mobile: <?php echo $v_details->mobile_no1; ?></p></b>
                            <b><p>Present Address: <?php echo $v_details->present_address ?></p></b>
                            <?php if ($v_details->profile_picture) { ?>
                                <img style="margin: -167px 0px 0px 84%;"
                                     src="<?php echo base_url() ?>public/emp_profile/<?php echo $v_details->profile_picture; ?>"
                                     height="150" width="150">
                            <?php } else { ?>
                                <img style="margin: -167px 0px 0px 700px;"
                                     src="<?php echo base_url() ?>public/emp_profile/demo_picture.jpg" height="150"
                                     width="150">
                            <?php } ?>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 508px;">Date of birth</td>
                        <td><?php echo $v_details->date_of_birth; ?></td>
                    </tr>
                    <tr>
                        <td>Gender</td>
                        <td><?php echo $v_details->gender_name; ?></td>
                    </tr>
                    <tr>
                        <td>Division</td>
                        <td><?php echo $v_details->division_name; ?></td>
                    </tr>
                    <tr>
                        <td>District</td>
                        <td><?php echo $v_details->district_name; ?></td>
                    </tr>
                    <tr>
                        <td>Thana</td>
                        <td><?php echo $v_details->thana_name; ?></td>
                    </tr>
                    <tr>
                        <td>Father Name</td>
                        <td><?php echo $v_details->father_name; ?></td>
                    </tr>
                    <tr>
                        <td>Mother Name</td>
                        <td><?php echo $v_details->mother_name; ?></td>
                    </tr>
                    <tr>
                        <td>Passport Number</td>
                        <td><?php echo $v_details->passport_number; ?></td>
                    </tr>
                    <tr>
                        <td>Passport number exp date</td>
                        <td><?php echo $v_details->passport_number_exp_date; ?></td>
                    </tr>
                    <tr>
                        <td>Birth Certificate</td>
                        <td><?php echo $v_details->birth_certificate; ?></td>
                    </tr>
                    <tr>
                        <td>Permanent Address</td>
                        <td><?php echo $v_details->permanent_address; ?></td>
                    </tr>
                    <tr>
                        <td>Blood Group</td>
                        <td><?php echo $v_details->blood_group_name; ?></td>
                    </tr>
                    <tr>
                        <td>Religion</td>
                        <td><?php echo $v_details->religion_name; ?></td>
                    </tr>
                    <tr>
                        <td>Freedom fighter family</td>
                        <td><?php if ($v_details->freedom_fighter_family == 1) {
                                echo "Yes";
                            } else {
                                echo "No";
                            } ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Freedom Fighter</td>
                        <td><?php echo $v_details->freedom_fighter_id; ?></td>
                    </tr>
                    <tr>
                        <td>Freedom Fighter Relation</td>
                        <td><?php echo $v_details->relation_name; ?></td>
                    </tr>
                    <tr>
                        <td>Signature</td>
                        <td>
                            <?php if ($v_details->signature) { ?>
                                <img
                                    src="<?php echo base_url() ?>public/emp_profile/<?php echo $v_details->signature; ?>"
                                    height="50" width="50">
                            <?php } else { ?>
                            <?php } ?>
                        </td>
                    </tr>
                <?php } ?>
            </table>

            <!--==============================-->
            <!--employee basic information end-->
            <!--==============================-->
            <table class="table table-striped table-bordered table-hover">
                <tr>
                    <td colspan="2" style="text-align: center; background-color: #2e8ece; color: white;">Employee Job
                        Information
                    </td>
                </tr>
                <?php foreach ($job as $v_details) { ?>
                    <tr>
                        <td>Department</td>
                        <td><?php echo $v_details->department_name; ?></td>
                    </tr>
                    <tr>
                        <td>Shift</td>
                        <td><?php echo $v_details->shift_name; ?></td>
                    </tr>
                    <tr>
                        <td>Section</td>
                        <td><?php echo $v_details->section_name; ?></td>
                    </tr>
                    <tr>
                        <td>Designation</td>
                        <td><?php echo $v_details->designation_name; ?></td>
                    </tr>
                    <tr>
                        <td>Joining Date</td>
                        <td><?php echo $v_details->joining_date; ?></td>
                    </tr>
                    <tr>
                        <td>Released Date</td>
                        <td><?php echo $v_details->date; ?></td>
                    </tr>
                <?php } ?>
            </table>
            <!--==============================-->
            <!--employee job information end-->
            <!--==============================-->

            <table class="table table-striped table-bordered table-hover">
                <tr>
                    <td colspan="10" style="text-align: center; background-color: #2e8ece; color: white;">Employee Job
                        Posting
                        Information
                    </td>
                </tr>
                <tr>
                    <th>SL NO</th>
                    <th>Basic Salary</th>
                    <th>Department</th>
                    <th>Shift</th>
                    <th>Section</th>
                    <th>Designation</th>
                    <th>Post Name</th>
                    <th>Joining Date</th>
                    <th>Confirmation Date</th>
                    <th>Status</th>
                </tr>
                <?php
                $i = 0;
                foreach ($job_posting as $v_data) {
                    $i++; ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $v_data->basic_salary; ?></td>
                        <td><?php echo $v_data->department_name; ?></td>
                        <td><?php echo $v_data->shift_name; ?></td>
                        <td><?php echo $v_data->section_name; ?></td>
                        <td><?php echo $v_data->designation_name; ?></td>
                        <td><?php echo $v_data->post_name; ?></td>
                        <td><?php echo $v_data->joining_date; ?></td>
                        <td><?php echo $v_data->confirmation_date; ?></td>
                        <td>
                            <?php if ($v_data->status == 1) { ?>
                                <span style="color: green; font: bold;">Present</span>
                            <?php } else { ?>
                                <span style="color:red; font: bold;">Before</span>
                            <?php } ?>
                        </td>
                    </tr>
                <?php } ?>
            </table>

            <!--==============================-->
            <!--employee job posting information end-->
            <!--==============================-->
            <button type="button" class="btn btn-success" id="add_basic" data-backdrop="static"
                    data-keyboard="false" data-toggle="modal"
                    data-target="#load_modal" onclick="return add_family();">
                Add Family Info
            </button>
            <table class="table table-striped table-bordered table-hover">
                <tr>
                    <td colspan="9" style="text-align: center; background-color: #2e8ece; color: white;">Employee Family
                        Information
                    </td>
                </tr>
                <tr>
                    <th>SL NO</th>
                    <th>Spouse Name</th>
                    <th>Profession</th>
                    <th>Organization</th>
                    <th>Designation</th>
                    <th>Contact No</th>
                    <th>Total Family Members</th>
                    <th>Other Dependents</th>
                    <th>Action</th>
                </tr>
                <?php
                $i = 0;
                foreach ($family as $v_family) {
                    $i++; ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $v_family->spouse_name; ?></td>
                        <td><?php echo $v_family->profession_name; ?></td>
                        <td><?php echo $v_family->organization; ?></td>
                        <td><?php echo $v_family->designation_name; ?></td>
                        <td><?php echo $v_family->contact_no; ?></td>
                        <td><?php echo $v_family->total_family_members; ?></td>
                        <td><?php echo $v_family->no_of_other_dependents; ?></td>
                        <td>
                            <a href="#"
                               onclick="update_family(<?php echo $v_family->id; ?>)"
                               class="btn btn-success" data-backdrop="static"
                               data-keyboard="false" data-toggle="modal"
                               data-target="#load_modal"
                               id="update_basic"
                               title="Update family info">
                                <i class="glyphicon glyphicon-edit"></i>
                            </a>
                        </td>
                    </tr>
                <?php } ?>
            </table>

            <!--==============================-->
            <!--employee family information end-->
            <!--==============================-->
            <button type="button" class="btn btn-success" id="add_child" data-backdrop="static"
                    data-keyboard="false" data-toggle="modal"
                    data-target="#load_modal" onclick="return add_child();">
                Add Child
            </button>
            <table class="table table-striped table-bordered table-hover">
                <tr>
                    <td colspan="7" style="text-align: center; background-color: #2e8ece; color: white;">Employee Child
                        Information
                    </td>
                </tr>
                <tr>
                    <th>SL NO</th>
                    <th>Child Name</th>
                    <th>Gender</th>
                    <th>Profession</th>
                    <th>Class</th>
                    <th>Inatitute</th>
                    <th>Action</th>
                </tr>
                <?php
                $i = 0;
                foreach ($child as $v_child) {
                    $i++; ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $v_child->child_name; ?></td>
                        <td><?php echo $v_child->gender_name; ?></td>
                        <td><?php echo $v_child->profession_name; ?></td>
                        <td><?php echo $v_child->class; ?></td>
                        <td><?php echo $v_child->institute; ?></td>
                        <td>
                            <a href="#"
                               onclick="update_child(<?php echo $v_child->id; ?>)"
                               class="btn btn-success" data-backdrop="static"
                               data-keyboard="false" data-toggle="modal"
                               data-target="#load_modal"
                               id="update_basic"
                               title="Update child info">
                                <i class="glyphicon glyphicon-edit"></i>
                            </a>
                        </td>
                    </tr>
                <?php } ?>
            </table>

            <!--==============================-->
            <!--employee child information end-->
            <!--==============================-->
            <button type="button" class="btn btn-success" id="add_academic" data-backdrop="static"
                    data-keyboard="false" data-toggle="modal"
                    data-target="#load_modal" onclick="return add_academic();">
                Add Academic
            </button>

            <table class="table table-striped table-bordered table-hover">
                <tr>
                    <td colspan="9" style="text-align: center; background-color: #2e8ece; color: white;">Employee
                        Academic
                        Information
                    </td>
                </tr>
                <tr>
                    <th>SL NO</th>
                    <th>Exam Degree</th>
                    <th>Grade Marks</th>
                    <th>Year of Passing</th>
                    <th>Institute</th>
                    <th>Board</th>
                    <th>Academic Group</th>
                    <th>Exam Name</th>
                    <th>Action</th>
                </tr>
                <?php
                $i = 0;
                foreach ($academic as $v_academic) {
                    $i++; ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $v_academic->degree_name; ?></td>
                        <td><?php echo $v_academic->grade_marks; ?></td>
                        <td><?php echo $v_academic->year_of_passing; ?></td>
                        <td><?php echo $v_academic->institute; ?></td>
                        <td><?php echo $v_academic->board_name; ?></td>
                        <td><?php echo $v_academic->group_name; ?></td>
                        <td><?php echo $v_academic->exam_name; ?></td>
                        <td>
                            <a href="#"
                               onclick="update_academic(<?php echo $v_academic->id; ?>)"
                               class="btn btn-success" data-backdrop="static"
                               data-keyboard="false" data-toggle="modal"
                               data-target="#load_modal"
                               id="update_basic"
                               title="Update academic info">
                                <i class="glyphicon glyphicon-edit"></i>
                            </a>
                        </td>
                    </tr>
                <?php } ?>
            </table>

            <!--==============================-->
            <!--employee academic information end-->
            <!--==============================-->

            <button type="button" class="btn btn-success" id="add_ward_and_honours" data-backdrop="static"
                    data-keyboard="false" data-toggle="modal"
                    data-target="#load_modal" onclick="return add_ward_and_honours();">
                Add Ward And Honours
            </button>

            <table class="table table-striped table-bordered table-hover">
                <tr>
                    <td colspan="7" style="text-align: center; background-color: #2e8ece; color: white;">Employee Ward
                        and Honours
                        Information
                    </td>
                </tr>
                <tr>
                    <th>SL NO</th>
                    <th>Title</th>
                    <th>Awards Type</th>
                    <th>Country</th>
                    <th>Receiving Date</th>
                    <th>Institute</th>
                    <th>Action</th>
                </tr>
                <?php
                $i = 0;
                foreach ($ward_and_honours as $v_ward_and_honours) {
                    $i++; ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $v_ward_and_honours->award_honors_title; ?></td>
                        <td><?php echo $v_ward_and_honours->awards_type; ?></td>
                        <td><?php echo $v_ward_and_honours->country; ?></td>
                        <td><?php echo $v_ward_and_honours->receiving_date; ?></td>
                        <td><?php echo $v_ward_and_honours->organization_name; ?></td>
                        <td>
                            <a href="#"
                               onclick="update_ward_and_honours(<?php echo $v_ward_and_honours->id; ?>)"
                               class="btn btn-success" data-backdrop="static"
                               data-keyboard="false" data-toggle="modal"
                               data-target="#load_modal"
                               id="update_basic"
                               title="Update ward and honours info">
                                <i class="glyphicon glyphicon-edit"></i>
                            </a>
                        </td>
                    </tr>
                <?php } ?>
            </table>

            <!--==============================-->
            <!--employee ward and honours end-->
            <!--==============================-->

            <button type="button" class="btn btn-success" id="add_co_curricular_activities" data-backdrop="static"
                    data-keyboard="false" data-toggle="modal"
                    data-target="#load_modal" onclick="return add_co_curricular_activities();">
                Add Co-Curricular Activities
            </button>

            <table class="table table-striped table-bordered table-hover">
                <tr>
                    <td colspan="3" style="text-align: center; background-color: #2e8ece; color: white;">Employee
                        Co-curricular
                        Activities
                        Information
                    </td>
                </tr>

                <tr>
                    <th>SL NO</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
                <?php
                $i = 0;
                foreach ($co_curricular_activities as $v_co_curricular_activities) {
                    $i++; ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $v_co_curricular_activities->description; ?></td>
                        <td>
                            <a href="#"
                               onclick="update_co_curricular_activities(<?php echo $v_co_curricular_activities->id; ?>)"
                               class="btn btn-success" data-backdrop="static"
                               data-keyboard="false" data-toggle="modal"
                               data-target="#load_modal"
                               id="update_basic"
                               title="Update co-curricular activities info">
                                <i class="glyphicon glyphicon-edit"></i>
                            </a>
                        </td>
                    </tr>
                <?php } ?>
            </table>

            <!--==============================-->
            <!--employee family information end-->
            <!--==============================-->

            <button type="button" class="btn btn-success" id="add_experience" data-backdrop="static"
                    data-keyboard="false" data-toggle="modal"
                    data-target="#load_modal" onclick="return add_experience();">
                Add Experience
            </button>
            <table class="table table-striped table-bordered table-hover">
                <tr>
                    <td colspan="8" style="text-align: center; background-color: #2e8ece; color: white;">Employee
                        Experience
                        Information
                    </td>
                </tr>
                <tr>
                    <th>SL NO</th>
                    <th>Institute</th>
                    <th>Business</th>
                    <th>Department</th>
                    <th>Joined_on</th>
                    <th>Release_on</th>
                    <th>Duration</th>
                    <th>Action</th>
                </tr>
                <?php
                $i = 0;
                foreach ($experience as $v_experience) {
                    $i++; ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $v_experience->institute; ?></td>
                        <td><?php echo $v_experience->business; ?></td>
                        <td><?php echo $v_experience->department; ?></td>
                        <td><?php echo $v_experience->joined_on; ?></td>
                        <td><?php echo $v_experience->release_on; ?></td>
                        <td><?php echo $v_experience->duration; ?></td>
                        <td>
                            <a href="#"
                               onclick="update_experience(<?php echo $v_experience->id; ?>)"
                               class="btn btn-success" data-backdrop="static"
                               data-keyboard="false" data-toggle="modal"
                               data-target="#load_modal"
                               title="Update experience info">
                                <i class="glyphicon glyphicon-edit"></i>
                            </a>
                        </td>
                    </tr>
                <?php } ?>
            </table>

            <!--==============================-->
            <!--employee experience information end-->
            <!--==============================-->
            <button type="button" class="btn btn-success" id="add_previous_job_history" data-backdrop="static"
                    data-keyboard="false" data-toggle="modal"
                    data-target="#load_modal" onclick="return add_previous_job_history();">
                Add previous job history
            </button>
            <table class="table table-striped table-bordered table-hover">
                <tr>
                    <td colspan="9" style="text-align: center; background-color: #2e8ece; color: white;">Employee
                        Previous Job
                        History
                        Information
                    </td>
                </tr>
                <tr>
                    <th>SL NO</th>
                    <th>Organization Name</th>
                    <th>Address</th>
                    <th>Position</th>
                    <th>Job Type</th>
                    <th>From Date</th>
                    <th>To Date</th>
                    <th>Duration</th>
                    <th>Action</th>
                </tr>
                <?php
                $i = 0;
                foreach ($previous_job_history as $v_previous_job_history) {
                    $i++; ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $v_previous_job_history->organization_name; ?></td>
                        <td><?php echo $v_previous_job_history->address; ?></td>
                        <td><?php echo $v_previous_job_history->position; ?></td>
                        <td><?php echo $v_previous_job_history->job_type; ?></td>
                        <td><?php echo $v_previous_job_history->from_date; ?></td>
                        <td><?php echo $v_previous_job_history->to_date; ?></td>
                        <td><?php echo $v_previous_job_history->duration; ?></td>
                        <td>
                            <a href="#"
                               onclick="update_previous_job_history(<?php echo $v_previous_job_history->id; ?>)"
                               class="btn btn-success" data-backdrop="static"
                               data-keyboard="false" data-toggle="modal"
                               data-target="#load_modal"
                               title="Update previous job history info">
                                <i class="glyphicon glyphicon-edit"></i>
                            </a>
                        </td>
                    </tr>
                <?php } ?>
            </table>


            <!--==============================-->
            <!--employee previous_job_history information end-->
            <!--==============================-->

            <button type="button" class="btn btn-success" id="add_reference" data-backdrop="static"
                    data-keyboard="false" data-toggle="modal"
                    data-target="#load_modal" onclick="return add_reference();">
                Add Reference
            </button>
            <table class="table table-striped table-bordered table-hover">
                <tr>
                    <td colspan="9" style="text-align: center; background-color: #2e8ece; color: white;">Employee
                        Reference
                        Information
                    </td>
                </tr>
                <tr>
                    <th>SL NO</th>
                    <th>Name</th>
                    <th>Designation</th>
                    <th>Organization</th>
                    <th>Address</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Mobile</th>
                    <th>Action</th>
                </tr>
                <?php
                $i = 0;
                foreach ($reference as $v_reference) {
                    $i++; ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $v_reference->name; ?></td>
                        <td><?php echo $v_reference->designation; ?></td>
                        <td><?php echo $v_reference->organization; ?></td>
                        <td><?php echo $v_reference->address; ?></td>
                        <td><?php echo $v_reference->email; ?></td>
                        <td><?php echo $v_reference->phone; ?></td>
                        <td><?php echo $v_reference->mobile; ?></td>
                        <td>
                            <a href="#"
                               onclick="update_reference(<?php echo $v_reference->id; ?>)"
                               class="btn btn-success" data-backdrop="static"
                               data-keyboard="false" data-toggle="modal"
                               data-target="#load_modal"
                               title="Update reference info">
                                <i class="glyphicon glyphicon-edit"></i>
                            </a>
                        </td>
                    </tr>
                <?php } ?>
            </table>


            <!--==============================-->
            <!--employee update reference information end-->
            <!--==============================-->

            <button type="button" class="btn btn-success" id="add_research_and_publication" data-backdrop="static"
                    data-keyboard="false" data-toggle="modal"
                    data-target="#load_modal" onclick="return add_research_and_publication();">
                Add research and publication
            </button>
            <table class="table table-striped table-bordered table-hover">
                <tr>
                    <td colspan="9" style="text-align: center; background-color: #2e8ece; color: white;">Employee
                        Research and
                        Publication
                        Information
                    </td>
                </tr>
                <tr>
                    <th>SL NO</th>
                    <th>Title Article</th>
                    <th>Journal Name</th>
                    <th>Publish By</th>
                    <th>Journal Type</th>
                    <th>Country</th>
                    <th>Issn Number</th>
                    <th>Published Date</th>
                    <th>Action</th>
                </tr>
                <?php
                $i = 0;
                foreach ($research_and_publication as $v_research_and_publication) {
                    $i++; ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $v_research_and_publication->title_article; ?></td>
                        <td><?php echo $v_research_and_publication->journal_name; ?></td>
                        <td><?php echo $v_research_and_publication->publish_by; ?></td>
                        <td><?php echo $v_research_and_publication->journal_type; ?></td>
                        <td><?php echo $v_research_and_publication->country; ?></td>
                        <td><?php echo $v_research_and_publication->issn_number; ?></td>
                        <td><?php echo $v_research_and_publication->published_date; ?></td>
                        <td>
                            <a href="#"
                               onclick="update_research_and_publication(<?php echo $v_research_and_publication->id; ?>)"
                               class="btn btn-success" data-backdrop="static"
                               data-keyboard="false" data-toggle="modal"
                               data-target="#load_modal"
                               title="Update research and publication info">
                                <i class="glyphicon glyphicon-edit"></i>
                            </a>
                        </td>
                    </tr>
                <?php } ?>
            </table>


            <!--==============================-->
            <!--employee research and publication information end-->
            <!--==============================-->

            <button type="button" class="btn btn-success" id="add_training" data-backdrop="static"
                    data-keyboard="false" data-toggle="modal"
                    data-target="#load_modal" onclick="return add_training();">
                Add Training
            </button>
            <table class="table table-striped table-bordered table-hover">
                <tr>
                    <td colspan="8" style="text-align: center; background-color: #2e8ece; color: white;">Employee
                        Training
                        Information
                    </td>
                </tr>
                <tr>
                    <th>SL NO</th>
                    <th>Training/Title</th>
                    <th>Topics Covered</th>
                    <th>Institute</th>
                    <th>Country</th>
                    <th>Location</th>
                    <th>Duration</th>
                    <th>Action</th>
                </tr>
                <?php
                $i = 0;
                foreach ($training as $v_training) {
                    $i++; ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $v_training->training_title; ?></td>
                        <td><?php echo $v_training->topics_covered; ?></td>
                        <td><?php echo $v_training->institute; ?></td>
                        <td><?php echo $v_training->country; ?></td>
                        <td><?php echo $v_training->location; ?></td>
                        <td><?php echo $v_training->duration; ?></td>
                        <td>
                            <a href="#"
                               onclick="update_training(<?php echo $v_training->id; ?>)"
                               class="btn btn-success" data-backdrop="static"
                               data-keyboard="false" data-toggle="modal"
                               data-target="#load_modal"
                               title="Update training info">
                                <i class="glyphicon glyphicon-edit"></i>
                            </a>
                        </td>
                    </tr>
                <?php } ?>
            </table>

            <!--==============================-->
            <!--employee training information end-->
            <!--==============================-->
            
            <button type="button" class="btn btn-success" id="add_contact" data-backdrop="static"
                    data-keyboard="false" data-toggle="modal"
                    data-target="#load_modal" onclick="return add_contact();">
                Add Contact
            </button>
            <table class="table table-striped table-bordered table-hover">
                <tr>
                    <td colspan="11" style="text-align: center; background-color: #2e8ece; color: white;">Employee
                        Contact
                        Information
                    </td>
                </tr>
                <tr>
                    <td colspan="10" style="text-align: center;">Present Address
                    </td>
                </tr>
                <tr>
                    <th>SL NO</th>
                    <th>Address</th>
                    <th>Post Office</th>
                    <th>Post Code</th>
                    <th>Division</th>
                    <th>District</th>
                    <th>Thana</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Mobile</th>
                    <th>Action</th>
                </tr>
                <?php
                $i = 0;
                foreach ($contact as $v_contact) {
                    $i++; ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $v_contact->present_address; ?></td>
                        <td><?php echo $v_contact->present_post_office; ?></td>
                        <td><?php echo $v_contact->present_post_code; ?></td>
                        <td><?php echo $v_contact->division_name; ?></td>
                        <td><?php echo $v_contact->district_name; ?></td>
                        <td><?php echo $v_contact->thana_name; ?></td>
                        <td><?php echo $v_contact->present_email; ?></td>
                        <td><?php echo $v_contact->present_phone; ?></td>
                        <td><?php echo $v_contact->present_mobile; ?></td>
                        <td>
                            <a href="#"
                               onclick="update_contact(<?php echo $v_contact->id; ?>)"
                               class="btn btn-success" data-backdrop="static"
                               data-keyboard="false" data-toggle="modal"
                               data-target="#load_modal"
                               title="Update contact info">
                                <i class="glyphicon glyphicon-edit"></i>
                            </a>
                        </td>
                    </tr>
                <?php } ?>

                <tr>
                    <td colspan="11" style="text-align: center;">Permanent Address
                    </td>
                </tr>
                <?php if ($contact1) { ?>
                    <tr>
                        <th>SL NO</th>
                        <th>Address</th>
                        <th>Post Office</th>
                        <th>Post Code</th>
                        <th>Division</th>
                        <th>District</th>
                        <th>Thana</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Mobile</th>
                        <th>Action</th>
                    </tr>
                    <?php
                    $i = 0;
                    foreach ($contact1 as $v_contact1) {
                        $i++; ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $v_contact1->permanent_address; ?></td>
                            <td><?php echo $v_contact1->permanent_post_office; ?></td>
                            <td><?php echo $v_contact1->permanent_post_code; ?></td>
                            <td><?php echo $v_contact1->division_name; ?></td>
                            <td><?php echo $v_contact1->district_name; ?></td>
                            <td><?php echo $v_contact1->thana_name; ?></td>
                            <td><?php echo $v_contact1->permanent_email; ?></td>
                            <td><?php echo $v_contact1->permanent_phone; ?></td>
                            <td><?php echo $v_contact1->permanent_mobile; ?></td>
                            <td>
                                <a href="#"
                                   onclick="update_contact1(<?php echo $v_contact1->id; ?>)"
                                   class="btn btn-success" data-backdrop="static"
                                   data-keyboard="false" data-toggle="modal"
                                   data-target="#load_modal"
                                   title="Update contact info">
                                    <i class="glyphicon glyphicon-edit"></i>
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                <?php } else { ?>
                    <tr>
                        <td colspan="11" style="text-align: center;">Permanent Address is same as present address</td>
                    </tr>
                <?php } ?>
            </table>

        </div>
    </div>
</div>

<div class="modal inmodal" id="load_modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content animated fadeIn">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
                        class="sr-only">Close</span></button>
                <h4 class="modal-title text-center" id="load_title"></h4>
            </div>
            <div class="modal-body">
                <div id="load_from">
                </div>
                <p class="m-t text-center">
                    <small><?php echo $this->session->userdata('powered_by'); ?>
                        <br><?php echo $this->session->userdata('copy_write'); ?>
                    </small>
                </p>
                <div class="modal-footer">
                    <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function add_family() {
        $.ajax({
            type: "POST",
            url: '<?php echo base_url() ?>hr/my_resume/load_add_family_from',
            success: function (result) {
                if (result) {
                    $('#load_from').html(result);
                    $('#load_title').html("Add Family Info");
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
    function update_family($id) {
        $.ajax({
            type: "POST",
            url: '<?php echo base_url() ?>hr/my_resume/load_update_family_from/' + $id,
            success: function (result) {
                if (result) {
                    $('#load_from').html(result);
                    $('#load_title').html("Add Family Info");
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
    function add_child() {
        $.ajax({
            type: "POST",
            url: '<?php echo base_url() ?>hr/my_resume/load_add_child_from',
            success: function (result) {
                if (result) {
                    $('#load_from').html(result);
                    $('#load_title').html("Add Child Info");
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
    function update_child($id) {
        $.ajax({
            type: "POST",
            url: '<?php echo base_url() ?>hr/my_resume/load_update_child_from/' + $id,
            success: function (result) {
                if (result) {
                    $('#load_from').html(result);
                    $('#load_title').html("Update Child Info");
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
    function add_academic() {
        $.ajax({
            type: "POST",
            url: '<?php echo base_url() ?>hr/my_resume/load_add_academic_from',
            success: function (result) {
                if (result) {
                    $('#load_from').html(result);
                    $('#load_title').html("Add Academic Info");
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
    function update_academic($id) {
        $.ajax({
            type: "POST",
            url: '<?php echo base_url() ?>hr/my_resume/load_update_academic_from/' + $id,
            success: function (result) {
                if (result) {
                    $('#load_from').html(result);
                    $('#load_title').html("Update Academic Info");
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
    function add_ward_and_honours() {
        $.ajax({
            type: "POST",
            url: '<?php echo base_url() ?>hr/my_resume/load_add_ward_and_honours_from',
            success: function (result) {
                if (result) {
                    $('#load_from').html(result);
                    $('#load_title').html("Add ward and honours info");
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
    function update_ward_and_honours($id) {
        $.ajax({
            type: "POST",
            url: '<?php echo base_url() ?>hr/my_resume/load_update_ward_and_honours_from/' + $id,
            success: function (result) {
                if (result) {
                    $('#load_from').html(result);
                    $('#load_title').html("Update ward and honours info");
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
    function add_co_curricular_activities() {
        $.ajax({
            type: "POST",
            url: '<?php echo base_url() ?>hr/my_resume/load_add_co_curricular_activities_from',
            success: function (result) {
                if (result) {
                    $('#load_from').html(result);
                    $('#load_title').html("Add co-curricular activities info");
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
    function update_co_curricular_activities($id) {
        $.ajax({
            type: "POST",
            url: '<?php echo base_url() ?>hr/my_resume/load_update_co_curricular_activities_from/' + $id,
            success: function (result) {
                if (result) {
                    $('#load_from').html(result);
                    $('#load_title').html("Update co-curricular activities info");
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
    function add_experience() {
        $.ajax({
            type: "POST",
            url: '<?php echo base_url() ?>hr/my_resume/load_add_experience_from',
            success: function (result) {
                if (result) {
                    $('#load_from').html(result);
                    $('#load_title').html("Add experience info");
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
    function update_experience($id) {
        $.ajax({
            type: "POST",
            url: '<?php echo base_url() ?>hr/my_resume/load_update_experience_from/' + $id,
            success: function (result) {
                if (result) {
                    $('#load_from').html(result);
                    $('#load_title').html("Update experience info");
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
    function add_previous_job_history() {
        $.ajax({
            type: "POST",
            url: '<?php echo base_url() ?>hr/my_resume/load_add_previous_job_history_from',
            success: function (result) {
                if (result) {
                    $('#load_from').html(result);
                    $('#load_title').html("Add previous job history info");
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
    function update_previous_job_history($id) {
        $.ajax({
            type: "POST",
            url: '<?php echo base_url() ?>hr/my_resume/load_update_previous_job_history_from/' + $id,
            success: function (result) {
                if (result) {
                    $('#load_from').html(result);
                    $('#load_title').html("Update previous job history info");
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
    function add_reference() {
        $.ajax({
            type: "POST",
            url: '<?php echo base_url() ?>hr/my_resume/load_add_reference_from',
            success: function (result) {
                if (result) {
                    $('#load_from').html(result);
                    $('#load_title').html("Add reference info");
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
    function update_reference($id) {
        $.ajax({
            type: "POST",
            url: '<?php echo base_url() ?>hr/my_resume/load_update_reference_from/' + $id,
            success: function (result) {
                if (result) {
                    $('#load_from').html(result);
                    $('#load_title').html("Update reference info");
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
    function add_research_and_publication() {
        $.ajax({
            type: "POST",
            url: '<?php echo base_url() ?>hr/my_resume/load_add_research_and_publication_from',
            success: function (result) {
                if (result) {
                    $('#load_from').html(result);
                    $('#load_title').html("Add research and publication info");
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
    function update_research_and_publication($id) {
        $.ajax({
            type: "POST",
            url: '<?php echo base_url() ?>hr/my_resume/load_update_research_and_publication_from/' + $id,
            success: function (result) {
                if (result) {
                    $('#load_from').html(result);
                    $('#load_title').html("Update research and publication info");
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
    function add_training() {
        $.ajax({
            type: "POST",
            url: '<?php echo base_url() ?>hr/my_resume/load_add_training_from',
            success: function (result) {
                if (result) {
                    $('#load_from').html(result);
                    $('#load_title').html("Add training info");
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
    function update_training($id) {
        $.ajax({
            type: "POST",
            url: '<?php echo base_url() ?>hr/my_resume/load_update_training_from/' + $id,
            success: function (result) {
                if (result) {
                    $('#load_from').html(result);
                    $('#load_title').html("Update training info");
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
    function add_contact($id) {
        $.ajax({
            type: "POST",
            url: '<?php echo base_url() ?>hr/my_resume/load_add_contact_from/' + $id,
            success: function (result) {
                if (result) {
                    $('#load_from').html(result);
                    $('#load_title').html("Add contact info");
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
    function update_contact($id) {
        $.ajax({
            type: "POST",
            url: '<?php echo base_url() ?>hr/my_resume/load_update_contact_from/' + $id,
            success: function (result) {
                if (result) {
                    $('#load_from').html(result);
                    $('#load_title').html("Update contact info");
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
    function update_contact1($id) {
        $.ajax({
            type: "POST",
            url: '<?php echo base_url() ?>hr/my_resume/load_update_contact_from/' + $id,
            success: function (result) {
                if (result) {
                    $('#load_from').html(result);
                    $('#load_title').html("Update contact info");
                    return false;
                } else {
                    return false;
                }
            }
        });
        return false;
    }
</script>