<style>
    #controller {
        height: 100px;
        width: 234px;
        float: left;
        position: relative;
        text-align: center;
    }

    #officer {
        height: 100px;
        width: 235px;
        text-align: center;
        float: left;
        position: relative;
    }
</style>
<div class="row">
    <div class="col-md-6">
        <?php foreach ($admit_card as $v_data) { ?>
            <table class="table table-striped table-responsive table-bordered table-hover">
                <tr>
                    <td colspan="3" style="text-align: center; font-size: 25px;"><b>Admit Card</b></td>
                </tr>
                <tr>
                    <td colspan="3" style="text-align: center; font-size: 18px;"><?php echo $v_data->exam_name; ?>
                        Exam
                    </td>
                </tr>
                <tr>
                    <td style="width: 130px; text-align: right;">Student ID :</td>
                    <td style="width: 250px;">1801001</td>
                    <td rowspan="5">
                        <img src="<?php echo base_url() ?>public/student_picture/<?php echo $v_data->picture; ?>"
                             height="100" width="100">
                    </td>
                </tr>
                <tr>
                    <td style="width: 130px; text-align: right;">Class Roll :</td>
                    <td style="width: 250px;">1</td>
                </tr>
                <tr>
                    <td style="width: 130px; text-align: right;">Student Name :</td>
                    <td>Huzai Bin Shorif</td>
                </tr>
                <tr>
                    <td style="width: 130px; text-align: right;">Shift Name :</td>
                    <td>Day</td>
                </tr>
                <tr>
                    <td style="width: 130px; text-align: right;">Section Name :</td>
                    <td>A</td>
                </tr>
                <tr>
                    <td colspan="3">
                        <div id="controller">
                            <img src="<?php echo base_url() ?>public/signature/signature.png" height="70" width="220">
                            Exam Controller
                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="3">
                        <b>General Instruction</b>
                        <p>1: Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                        <p>2: Libero laboriosam dolor perspiciatis omnis exercitationem. Beatae, officia pariatur?</p>
                        <p>3: Est cum veniam excepturi.Maiores praesentium, porro voluptas suscipit facere rem dicta,
                            debitis.</p>
                    </td>
                </tr>
            </table>
        <?php } ?>
    </div>
</div>
