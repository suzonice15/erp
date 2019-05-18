<table class="table table-striped table-bordered table-hover">
    <?php
    $count_duration = "";
    $i = "";
    foreach ($previous_job_history as $v_details) {
        $i++;
        ?>
        <tr>
            <td colspan="2" style="background-color: #3C8DBC;">Job history No.<?php echo $i; ?></td>
        </tr>
        <tr>
            <td>Employee ID</td>
            <td><?php echo $v_details->emp_id; ?></td>
        </tr>
        <tr>
            <td>Organization Name</td>
            <td><?php echo $v_details->organization_name; ?></td>
        </tr>
        <tr>
            <td>Address</td>
            <td><?php echo $v_details->address; ?></td>
        </tr>
        <tr>
            <td>Position</td>
            <td><?php echo $v_details->position; ?></td>
        </tr>
        <tr>
            <td>Job Type</td>
            <td><?php echo $v_details->job_type; ?></td>
        </tr>
        <tr>
            <td>From Date</td>
            <td><?php echo $v_details->from_date; ?></td>
        </tr>
        <tr>
            <td>To Date</td>
            <td><?php echo $v_details->to_date; ?></td>
        </tr>

        <tr>
            <td>Duration</td>
            <td>
                <?php
                $count_duration += $v_details->duration;
                echo $v_details->duration; ?>
            </td>
        </tr>
    <?php } ?>
    <tr>
        <td colspan="2" style="background-color: #3C8DBC;">
            <div id="count_duration2"></div>
        </td>
    </tr>
    <input type="hidden" id="count_duration1" value="<?php echo $count_duration; ?>">
</table>

<script>
    $('document').ready(function () {
        function jarh(x) {
            var y = 365;
            var y2 = 31;
            var remainder = x % y;
            var casio = remainder % y2;
            year = (x - remainder) / y;
            month = (remainder - casio) / y2;
            var result = +year + " Years, " + month + " Months, " + casio + " Days";
            return result;
        }

        var all_total = $('#count_duration1').val();
        var call = jarh(all_total);
        $('#count_duration2').html("Total Job History = " + call);
    });
</script>