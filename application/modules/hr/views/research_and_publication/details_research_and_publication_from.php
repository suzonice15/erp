<table class="table table-striped table-bordered table-hover">
    <?php
    $i = "";
    foreach ($research_and_publication as $v_details) {
        $i++;
        ?>
        <tr>
            <td colspan="2" style="background-color: #3C8DBC;">Publication No.<?php echo $i; ?></td>
        </tr>
        <tr>
            <td>Employee ID</td>
            <td><?php echo $v_details->emp_id; ?></td>
        </tr>
        <tr>
            <td>Title Article</td>
            <td><?php echo $v_details->title_article; ?></td>
        </tr>
        <tr>
            <td>Journal Name</td>
            <td><?php echo $v_details->journal_name; ?></td>
        </tr>
        <tr>
            <td>Publish By</td>
            <td><?php echo $v_details->publish_by; ?></td>
        </tr>
        <tr>
            <td>Journal Type</td>
            <td><?php echo $v_details->journal_type; ?></td>
        </tr>
        <tr>
            <td>Country</td>
            <td><?php echo $v_details->country; ?></td>
        </tr>
        <tr>
            <td>Issn Number</td>
            <td><?php echo $v_details->issn_number; ?></td>
        </tr>
        <tr>
            <td>Published Date</td>
            <td><?php echo $v_details->published_date; ?></td>
        </tr>
    <?php } ?>
</table>