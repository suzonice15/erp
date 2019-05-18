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
                    <img style="margin: -167px 0px 0px 700px;"
                         src="<?php echo base_url() ?>public/emp_profile/<?php echo $v_details->profile_picture; ?>"
                         height="150" width="150">
                <?php } else { ?>
                    <img style="margin: -167px 0px 0px 700px;"
                         src="<?php echo base_url() ?>public/emp_profile/demo_picture.jpg" height="150" width="150">
                <?php } ?>


            </td>
        </tr>
        <tr>
            <td>Date of birth</td>
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
                    <img src="<?php echo base_url() ?>public/emp_profile/<?php echo $v_details->signature; ?>"
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
        <td colspan="2" style="text-align: center; background-color: #2e8ece; color: white;">Employee Job Information
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
        <td colspan="10" style="text-align: center; background-color: #2e8ece; color: white;">Employee Job Posting
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

<table class="table table-striped table-bordered table-hover">
    <tr>
        <td colspan="10" style="text-align: center; background-color: #2e8ece; color: white;">Employee Job Posting
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
<!--employee family information end-->
<!--==============================-->

<table class="table table-striped table-bordered table-hover">
    <tr>
        <td colspan="6" style="text-align: center; background-color: #2e8ece; color: white;">Employee Family
            Information
        </td>
    </tr>
    <tr>
        <th>SL NO</th>
        <th>Spouse Name</th>
        <th>Designation</th>
        <th>Contact No</th>
        <th>Total Family Members</th>
        <th>Other Dependents</th>
    </tr>
    <?php
    $i = 0;
    foreach ($family as $v_data) {
        $i++; ?>
        <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo $v_data->spouse_name; ?></td>
            <td><?php echo $v_data->designation_id; ?></td>
            <td><?php echo $v_data->contact_no; ?></td>
            <td><?php echo $v_data->total_family_members; ?></td>
            <td><?php echo $v_data->no_of_other_dependents; ?></td>
        </tr>
    <?php } ?>
</table>

<!--==============================-->
<!--employee family information end-->
<!--==============================-->

<table class="table table-striped table-bordered table-hover">
    <tr>
        <td colspan="6" style="text-align: center; background-color: #2e8ece; color: white;">Employee Child
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
    </tr>
    <?php
    $i = 0;
    foreach ($child as $v_data) {
        $i++; ?>
        <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo $v_data->child_name; ?></td>
            <td><?php echo $v_data->gender_name; ?></td>
            <td><?php echo $v_data->profession_name; ?></td>
            <td><?php echo $v_data->class; ?></td>
            <td><?php echo $v_data->institute; ?></td>
        </tr>
    <?php } ?>
</table>


<!--==============================-->
<!--employee family information end-->
<!--==============================-->

<table class="table table-striped table-bordered table-hover">
    <tr>
        <td colspan="8" style="text-align: center; background-color: #2e8ece; color: white;">Employee Academic
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
    </tr>
    <?php
    $i = 0;
    foreach ($academic as $v_data) {
        $i++; ?>
        <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo $v_data->degree_name; ?></td>
            <td><?php echo $v_data->grade_marks; ?></td>
            <td><?php echo $v_data->year_of_passing; ?></td>
            <td><?php echo $v_data->institute; ?></td>
            <td><?php echo $v_data->board_name; ?></td>
            <td><?php echo $v_data->group_name; ?></td>
            <td><?php echo $v_data->exam_name; ?></td>
        </tr>
    <?php } ?>
</table>

<!--==============================-->
<!--employee family information end-->
<!--==============================-->

<table class="table table-striped table-bordered table-hover">
    <tr>
        <td colspan="6" style="text-align: center; background-color: #2e8ece; color: white;">Employee Ward and Honours
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
    </tr>
    <?php
    $i = 0;
    foreach ($ward_and_honours as $v_data) {
        $i++; ?>
        <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo $v_data->award_honors_title; ?></td>
            <td><?php echo $v_data->awards_type; ?></td>
            <td><?php echo $v_data->country; ?></td>
            <td><?php echo $v_data->receiving_date; ?></td>
            <td><?php echo $v_data->organization_name; ?></td>
        </tr>
    <?php } ?>
</table>

<!--==============================-->
<!--employee family information end-->
<!--==============================-->

<table class="table table-striped table-bordered table-hover">
    <tr>
        <td colspan="2" style="text-align: center; background-color: #2e8ece; color: white;">Employee Co-curricular
            Activities
            Information
        </td>
    </tr>

    <tr>
        <th>SL NO</th>
        <th>Description</th>
    </tr>
    <?php
    $i = 0;
    foreach ($co_curricular_activities as $v_data) {
        $i++; ?>
        <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo $v_data->description; ?></td>
        </tr>
    <?php } ?>
</table>

<!--==============================-->
<!--employee family information end-->
<!--==============================-->

<table class="table table-striped table-bordered table-hover">
    <tr>
        <td colspan="7" style="text-align: center; background-color: #2e8ece; color: white;">Employee Experience
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
    </tr>
    <?php
    $i = 0;
    foreach ($experience as $v_data) {
        $i++; ?>
        <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo $v_data->institute; ?></td>
            <td><?php echo $v_data->business; ?></td>
            <td><?php echo $v_data->department; ?></td>
            <td><?php echo $v_data->joined_on; ?></td>
            <td><?php echo $v_data->release_on; ?></td>
            <td><?php echo $v_data->duration; ?></td>
        </tr>
    <?php } ?>
</table>

<!--==============================-->
<!--employee family information end-->
<!--==============================-->

<table class="table table-striped table-bordered table-hover">
    <tr>
        <td colspan="7" style="text-align: center; background-color: #2e8ece; color: white;">Employee Previous Job
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
    </tr>
    <?php
    $i = 0;
    foreach ($previous_job_history as $v_data) {
        $i++; ?>
        <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo $v_data->organization_name; ?></td>
            <td><?php echo $v_data->address; ?></td>
            <td><?php echo $v_data->position; ?></td>
            <td><?php echo $v_data->job_type; ?></td>
            <td><?php echo $v_data->from_date; ?></td>
            <td><?php echo $v_data->to_date; ?></td>
        </tr>
    <?php } ?>
</table>


<!--==============================-->
<!--employee family information end-->
<!--==============================-->

<table class="table table-striped table-bordered table-hover">
    <tr>
        <td colspan="8" style="text-align: center; background-color: #2e8ece; color: white;">Employee Reference
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
    </tr>
    <?php
    $i = 0;
    foreach ($reference as $v_data) {
        $i++; ?>
        <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo $v_data->name; ?></td>
            <td><?php echo $v_data->designation; ?></td>
            <td><?php echo $v_data->organization; ?></td>
            <td><?php echo $v_data->address; ?></td>
            <td><?php echo $v_data->email; ?></td>
            <td><?php echo $v_data->phone; ?></td>
            <td><?php echo $v_data->mobile; ?></td>
        </tr>
    <?php } ?>
</table>

<!--==============================-->
<!--employee family information end-->
<!--==============================-->

<table class="table table-striped table-bordered table-hover">
    <tr>
        <td colspan="8" style="text-align: center; background-color: #2e8ece; color: white;">Employee Research and
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
    </tr>
    <?php
    $i = 0;
    foreach ($research_and_publication as $v_data) {
        $i++; ?>
        <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo $v_data->title_article; ?></td>
            <td><?php echo $v_data->journal_name; ?></td>
            <td><?php echo $v_data->publish_by; ?></td>
            <td><?php echo $v_data->journal_type; ?></td>
            <td><?php echo $v_data->country; ?></td>
            <td><?php echo $v_data->issn_number; ?></td>
            <td><?php echo $v_data->published_date; ?></td>
        </tr>
    <?php } ?>
</table>

<!--==============================-->
<!--employee family information end-->
<!--==============================-->

<table class="table table-striped table-bordered table-hover">
    <tr>
        <td colspan="7" style="text-align: center; background-color: #2e8ece; color: white;">Employee Training
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
    </tr>
    <?php
    $i = 0;
    foreach ($training as $v_data) {
        $i++; ?>
        <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo $v_data->training_title; ?></td>
            <td><?php echo $v_data->topics_covered; ?></td>
            <td><?php echo $v_data->institute; ?></td>
            <td><?php echo $v_data->country; ?></td>
            <td><?php echo $v_data->location; ?></td>
            <td><?php echo $v_data->duration; ?></td>
        </tr>
    <?php } ?>
</table>

<!--==============================-->
<!--employee family information end-->
<!--==============================-->

<table class="table table-striped table-bordered table-hover">
    <tr>
        <td colspan="10" style="text-align: center; background-color: #2e8ece; color: white;">Employee Contact
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
    </tr>
    <?php
    $i = 0;
    foreach ($contact as $v_data) {
        $i++; ?>
        <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo $v_data->present_address; ?></td>
            <td><?php echo $v_data->present_post_office; ?></td>
            <td><?php echo $v_data->present_post_code; ?></td>
            <td><?php echo $v_data->division_name; ?></td>
            <td><?php echo $v_data->district_name; ?></td>
            <td><?php echo $v_data->thana_name; ?></td>
            <td><?php echo $v_data->present_email; ?></td>
            <td><?php echo $v_data->present_phone; ?></td>
            <td><?php echo $v_data->present_mobile; ?></td>
        </tr>
    <?php } ?>

    <tr>
        <td colspan="10" style="text-align: center;">Permanent Address
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
        </tr>
        <?php
        $i = 0;
        foreach ($contact1 as $v_data) {
            $i++; ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $v_data->permanent_address; ?></td>
                <td><?php echo $v_data->permanent_post_office; ?></td>
                <td><?php echo $v_data->permanent_post_code; ?></td>
                <td><?php echo $v_data->division_name; ?></td>
                <td><?php echo $v_data->district_name; ?></td>
                <td><?php echo $v_data->thana_name; ?></td>
                <td><?php echo $v_data->permanent_email; ?></td>
                <td><?php echo $v_data->permanent_phone; ?></td>
                <td><?php echo $v_data->permanent_mobile; ?></td>
            </tr>
        <?php } ?>
    <?php } else { ?>
        <tr>
            <td colspan="10" style="text-align: center;">Permanent Address is same as present address</td>
        </tr>
    <?php } ?>
</table>
