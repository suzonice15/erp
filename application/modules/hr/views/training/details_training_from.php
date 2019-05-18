<table class="table table-striped table-bordered table-hover">
    <?php
    $i = "";
    $count = 0;
    foreach ($training as $v_details) {
        $i++;
        ?>
        <tr>
            <td colspan="2" style="background-color: #3C8DBC;">Training No.<?php echo $i; ?></td>
        </tr>
        <tr>
            <td>Employee ID</td>
            <td><?php echo $v_details->emp_id; ?></td>
        </tr>
        <tr>
            <td>Training Title</td>
            <td><?php echo $v_details->training_title; ?></td>
        </tr>
        <tr>
            <td>Topics Covered</td>
            <td><?php echo $v_details->topics_covered; ?></td>
        </tr>
        <tr>
            <td>Institute</td>
            <td><?php echo $v_details->institute; ?></td>
        </tr>
        <tr>
            <td>Country</td>
            <td><?php echo $v_details->country; ?></td>
        </tr>
        <tr>
            <td>location</td>
            <td><?php echo $v_details->location; ?></td>
        </tr>
        <tr>
            <td>Duration</td>
            <td>
                <?php echo $v_details->duration;
                $count +=$v_details->duration;
                ?>
            </td>
        </tr>
    <?php } ?>
    <tr>
        <td colspan="2" style="background-color: #3C8DBC;"> Total Duration <?php echo $count; ?> Years</td>
    </tr>
</table>