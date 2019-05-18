<table class="table table-striped table-bordered table-hover">
    <?php
    $i = "";
    foreach ($reference as $v_details) {
        $i++;
        ?>
        <tr>
            <td colspan="2" style="background-color: #3C8DBC;">Reference No.<?php echo $i; ?></td>
        </tr>
        <tr>
            <td>Employee ID</td>
            <td><?php echo $v_details->emp_id; ?></td>
        </tr>
        <tr>
            <td>Name</td>
            <td><?php echo $v_details->name; ?></td>
        </tr>
        <tr>
            <td>Designation</td>
            <td><?php echo $v_details->designation; ?></td>
        </tr>
        <tr>
            <td>Organization</td>
            <td><?php echo $v_details->organization; ?></td>
        </tr>
        <tr>
            <td>Address</td>
            <td><?php echo $v_details->address; ?></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><?php echo $v_details->	email; ?></td>
        </tr>
        <tr>
            <td>Phone</td>
            <td><?php echo $v_details->phone; ?></td>
        </tr>
        <tr>
            <td>Mobile</td>
            <td><?php echo $v_details->mobile; ?></td>
        </tr>
    <?php } ?>
</table>