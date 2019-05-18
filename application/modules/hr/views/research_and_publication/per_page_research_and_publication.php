<div id="ajaxdata">
    <?php echo $links; ?>
    <table class="table table-striped table-responsive table-bordered table-hover">
        <thead style="background-color: #347CA4;">
        <tr>
            <th>SL NO</th>
            <th>Employee ID</th>
            <th>Title Article</th>
            <th>Journal Name</th>
            <th>Publish By</th>
            <th>Journal Type</th>
            <th>Country</th>
            <th>Issn Number</th>
            <th>Published Date</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $i = 0;
        foreach ($research_and_publication as $v_data) {
            $i++; ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $v_data->emp_id; ?></td>
                <td><?php echo $v_data->title_article; ?></td>
                <td><?php echo $v_data->journal_name; ?></td>
                <td><?php echo $v_data->publish_by; ?></td>
                <td><?php echo $v_data->journal_type; ?></td>
                <td><?php echo $v_data->country; ?></td>
                <td><?php echo $v_data->issn_number; ?></td>
                <td><?php echo $v_data->published_date; ?></td>
                <td style="width: 110px;">
                    <a href="#"
                       onclick="details_research_and_publication(<?php echo $v_data->emp_id; ?>)"
                       class="btn btn-success" data-backdrop="static"
                       data-keyboard="false" data-toggle="modal"
                       data-target="#load_modal"
                       title="Details research and publication">
                        <i class="fa fa-reply-all"></i>
                    </a>
                    <a href="#"
                       onclick="update_research_and_publication(<?php echo $v_data->emp_id; ?>)"
                       class="btn btn-success" data-backdrop="static"
                       data-keyboard="false" data-toggle="modal"
                       data-target="#load_modal"
                       title="Update research and publication">
                        <i class="glyphicon glyphicon-edit"></i>
                    </a>
                </td>
            </tr>
        <?php } ?>
        </tbody>
        <tfoot>
        <tr>
            <th>SL NO</th>
            <th>Employee ID</th>
            <th>Title Article</th>
            <th>Journal Name</th>
            <th>Publish By</th>
            <th>Journal Type</th>
            <th>Country</th>
            <th>Issn Number</th>
            <th>Published Date</th>
            <th>Action</th>
        </tr>
        </tfoot>
    </table>
    <?php echo $links; ?>
</div>
<script>
    $(document).ready(function () {
        $("#ajax_pagingsearc a").attr('onclick', 'return main_page_pagination($(this));');
    });
</script>
