<table class="table table-striped table-bordered table-hover">
    <?php
    $count_duration = "";
    $i = "";
    foreach ($experience as $v_details) {
        $i++;
        ?>
        <tr>
            <td colspan="2" style="background-color: #3C8DBC;">Experience No.<?php echo $i; ?></td>
        </tr>
        <tr>
            <td>Employee ID</td>
            <td><?php echo $v_details->emp_id; ?></td>
        </tr>
        <tr>
            <td>Institute</td>
            <td><?php echo $v_details->institute; ?></td>
        </tr>
        <tr>
            <td>Business</td>
            <td><?php echo $v_details->business; ?></td>
        </tr>
        <tr>
            <td>Department</td>
            <td><?php echo $v_details->department; ?></td>
        </tr>
        <tr>
            <td>Joined On</td>
            <td><?php echo $v_details->joined_on; ?></td>
        </tr>
        <tr>
            <td>Release On</td>
            <td><?php echo $v_details->release_on; ?></td>
        </tr>
        <tr>
            <td>Duration</td>
            <td>
                <?php
                $count_duration += $v_details->duration;
                echo $v_details->duration; ?>
            </td>
        </tr>
        <tr>
            <td>Area of concentration</td>
            <td><?php echo $v_details->area_of_concentration; ?></td>
        </tr>
        <tr>
            <td>Position Hold</td>
            <td><?php echo $v_details->position_hold; ?></td>
        </tr>
        <tr>
            <td>Job Details</td>
            <td><?php echo $v_details->job_details; ?></td>
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
        $('#count_duration2').html("Total Experience = " + call);
    });
</script>