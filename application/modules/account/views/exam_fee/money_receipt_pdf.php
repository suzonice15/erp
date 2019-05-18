<style>
    #table1 {
        border-collapse: collapse;
        font-size: 13px;
    }

    #address_div {
        width: 300px;
        float: left;
        position: relative;
        margin-left: 12px;
    }

    #main_div {
        height: auto;
        width: auto;
        background-color: rgba(128, 227, 232, 0.93);
    }

    #inner_div1 {
        height: auto;
        width: 332px;
        float: left;
        position: relative;
        background-color: white;
        border: 1px solid black;
    }

    #inner_div2 {
        height: auto;
        width: 332px;
        float: left;
        position: relative;
        background-color: white;
        margin: 0px 0px 0px 5px;
        border: 1px solid black;
    }

    #inner_div3 {
        height: auto;
        width: 332px;
        float: left;
        position: relative;
        background-color: white;
        margin: 0px 0px 0px 5px;
        border: 1px solid black;
    }

    #note {
        float: left;
        position: relative;
        width: 300px;
        margin-left: 12px;
        text-justify: inter-word;
        font-size: 13px;
    }

    #signature1 {
        float: left;
        position: relative;
        width: 100px;
        margin: 60px 0px 0px 10px;
        font-size: 12px;
    }

    #signature2 {
        float: left;
        position: relative;
        width: 100px;
        margin: 0px 0px 0px 10px;
        font-size: 12px;
        padding: 0px 0px 0px 2px;
    }

    #signature3 {
        float: left;
        position: relative;
        width: 100px;
        margin: 0px 0px 0px 10px;
        padding: 0px 0px 0px 2px;
        font-size: 12px;
    }

    #copy {
        float: left;
        position: relative;
        width: 300px;
        margin: 30px 0px 0px 0px;
        text-align: center;
        font-size: 20px;
    }
</style>

<div id="main_div">
    <div id="inner_div1">
        <div id="address_div">
            <table width="310" style="text-align: center;">
                <tr>
                    <td style="padding-bottom: 5px;">
                        <img src="<?php echo base_url() ?>public/payment_invoice/logo.png">
                    </td>
                </tr>
                <tr>
                    <td style="padding-bottom: 5px;  font-size: 13px;">Invoice No:12542157</td>
                </tr>
                <tr>
                    <td style="font-size: 17px;"><b>Payment invoice for: Exam,2018</b></td>
                </tr>
                <?php foreach ($student_info as $v_data) { ?>
                    <tr>
                        <td style="padding-top: 10px; font-size: 13px;">Student
                            ID: <?php echo $v_data->student_id; ?></td>
                    </tr>
                    <tr>
                        <td style="font-size: 13px;">Student
                            Name: <?php echo $v_data->student_name; ?></td>
                    </tr>
                    <tr>
                        <td style="padding-bottom: 8px;  font-size: 13px;">Shift: <?php echo $v_data->shift_name; ?>,
                            Class: <?php echo $v_data->class_name; ?>,
                            Section: <?php echo $v_data->section_name; ?></td>
                    </tr>
                <?php } ?>
            </table>
        </div>


        <table id="table1" border="1" width="310" style="margin-left: 11px; collapse: 0;">
            <tr>
                <th style="width: 15px;">SL</th>
                <th style="width: 210px;">Particulars</th>
                <th>Amount(Tk)</th>
            </tr>
            <?php
            $i = 0;
            $total_amount = 0;
            foreach ($exam_fee as $v_data) {
                $i++; ?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $v_data->particulars ?></td>
                    <td style="text-align: right;">
                        <?php
                        $total_amount += $v_data->amount;
                        echo $result1 = $call_function->taka_format1($v_data->amount);
                        ?>
                    </td>
                </tr>
            <?php } ?>
            <tr>
                <td colspan="2" style="text-align: right;">Total</td>
                <td style="text-align: right;">
                    <?php
                    echo $result = $call_function->taka_format1($total_amount);
                    ?>
                </td>
            </tr>
            <tr>
                <?php
                $number = $total_amount;
                $no = round($number);
                $point = round($number - $no, 2) * 100;
                $hundred = null;
                $digits_1 = strlen($no);
                $i = 0;
                $str = array();
                $words = array('0' => '', '1' => 'one', '2' => 'two',
                    '3' => 'three', '4' => 'four', '5' => 'five', '6' => 'six',
                    '7' => 'seven', '8' => 'eight', '9' => 'nine',
                    '10' => 'ten', '11' => 'eleven', '12' => 'twelve',
                    '13' => 'thirteen', '14' => 'fourteen',
                    '15' => 'fifteen', '16' => 'sixteen', '17' => 'seventeen',
                    '18' => 'eighteen', '19' => 'nineteen', '20' => 'twenty',
                    '30' => 'thirty', '40' => 'forty', '50' => 'fifty',
                    '60' => 'sixty', '70' => 'seventy',
                    '80' => 'eighty', '90' => 'ninety');
                $digits = array('', 'hundred', 'thousand', 'lakh', 'crore');
                while ($i < $digits_1) {
                    $divider = ($i == 2) ? 10 : 100;
                    $number = floor($no % $divider);
                    $no = floor($no / $divider);
                    $i += ($divider == 10) ? 1 : 2;
                    if ($number) {
                        $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
                        $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
                        $str [] = ($number < 21) ? $words[$number] .
                            " " . $digits[$counter] . $plural . " " . $hundred
                            :
                            $words[floor($number / 10) * 10]
                            . " " . $words[$number % 10] . " "
                            . $digits[$counter] . $plural . " " . $hundred;
                    } else $str[] = null;
                }
                $str = array_reverse($str);
                $result = implode('', $str);
                $points = ($point) ?
                    "." . $words[$point / 10] . " " .
                    $words[$point = $point % 10] : '';
                $get_result = ucwords($result);
                ?>
                <td colspan="3" style="font-size: 13px;"><b>In
                        Word:</b><?php echo $get_result . "taka  " . $points . " Paise"; ?></td>
            </tr>
        </table>
        <br>
        <div id="note">
            <b>Note:</b>Lorem Ipsum is simply dummy text of the printing and Lorem Ipsum has been the
            industry's standard dummy text ever since the 1500s
        </div>

        <div id="signature1">
            ---------------------
            Deposited By
        </div>
        <div id="signature2">
            ---------------------
            Cashier
        </div>
        <div id="signature3">
            ---------------------
            Officer
        </div>
        <div id="copy">
            <b>STUDENT COPY</b>
        </div>
    </div>

    <div id="inner_div2">
        <div id="address_div">
            <table width="310" style="text-align: center;">
                <tr>
                    <td style="padding-bottom: 5px;">
                        <img src="<?php echo base_url() ?>public/payment_invoice/logo.png">
                    </td>
                </tr>
                <tr>
                    <td style="padding-bottom: 5px;  font-size: 13px;">Invoice No:12542157</td>
                </tr>
                <tr>
                    <td style="font-size: 16px;"><b>Payment invoice for: Exam,2018</b></td>
                </tr>
                <?php foreach ($student_info as $v_data) { ?>
                    <tr>
                        <td style="padding-top: 10px; font-size: 13px;">Student
                            ID: <?php echo $v_data->student_id; ?></td>
                    </tr>
                    <tr>
                        <td style="font-size: 13px;">Student
                            Name: <?php echo $v_data->student_name; ?></td>
                    </tr>
                    <tr>
                        <td style="padding-bottom: 8px;  font-size: 13px;">Shift: <?php echo $v_data->shift_name; ?>,
                            Class: <?php echo $v_data->class_name; ?>,
                            Section: <?php echo $v_data->section_name; ?></td>
                    </tr>
                <?php } ?>
            </table>
        </div>


        <table id="table1" border="1" width="310" style="margin-left: 11px; collapse: 0;">
            <tr>
                <th style="width: 15px;">SL</th>
                <th style="width: 210px;">Particulars</th>
                <th>Amount(Tk)</th>
            </tr>
            <?php
            $i = 0;
            $total_amount = 0;
            foreach ($exam_fee as $v_data) {
                $i++; ?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $v_data->particulars ?></td>
                    <td style="text-align: right;">
                        <?php
                        $total_amount += $v_data->amount;
                        echo $result1 = $call_function->taka_format1($v_data->amount);
                        ?>
                    </td>
                </tr>
            <?php } ?>
            <tr>
                <td colspan="2" style="text-align: right;">Total</td>
                <td style="text-align: right;">
                    <?php
                    echo $result = $call_function->taka_format1($total_amount);
                    ?>
                </td>
            </tr>
            <tr>
                <?php
                $number = $total_amount;
                $no = round($number);
                $point = round($number - $no, 2) * 100;
                $hundred = null;
                $digits_1 = strlen($no);
                $i = 0;
                $str = array();
                $words = array('0' => '', '1' => 'one', '2' => 'two',
                    '3' => 'three', '4' => 'four', '5' => 'five', '6' => 'six',
                    '7' => 'seven', '8' => 'eight', '9' => 'nine',
                    '10' => 'ten', '11' => 'eleven', '12' => 'twelve',
                    '13' => 'thirteen', '14' => 'fourteen',
                    '15' => 'fifteen', '16' => 'sixteen', '17' => 'seventeen',
                    '18' => 'eighteen', '19' => 'nineteen', '20' => 'twenty',
                    '30' => 'thirty', '40' => 'forty', '50' => 'fifty',
                    '60' => 'sixty', '70' => 'seventy',
                    '80' => 'eighty', '90' => 'ninety');
                $digits = array('', 'hundred', 'thousand', 'lakh', 'crore');
                while ($i < $digits_1) {
                    $divider = ($i == 2) ? 10 : 100;
                    $number = floor($no % $divider);
                    $no = floor($no / $divider);
                    $i += ($divider == 10) ? 1 : 2;
                    if ($number) {
                        $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
                        $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
                        $str [] = ($number < 21) ? $words[$number] .
                            " " . $digits[$counter] . $plural . " " . $hundred
                            :
                            $words[floor($number / 10) * 10]
                            . " " . $words[$number % 10] . " "
                            . $digits[$counter] . $plural . " " . $hundred;
                    } else $str[] = null;
                }
                $str = array_reverse($str);
                $result = implode('', $str);
                $points = ($point) ?
                    "." . $words[$point / 10] . " " .
                    $words[$point = $point % 10] : '';
                $get_result = ucwords($result);
                ?>
                <td colspan="3" style="font-size: 13px;"><b>In
                        Word:</b><?php echo $get_result . "taka  " . $points . " Paise"; ?></td>
            </tr>
        </table>
        <br>
        <div id="note">
            <b>Note:</b>Lorem Ipsum is simply dummy text of the printing and Lorem Ipsum has been the
            industry's standard dummy text ever since the 1500s
        </div>

        <div id="signature1">
            ---------------------
            Deposited By
        </div>
        <div id="signature2">
            ---------------------
            Cashier
        </div>
        <div id="signature3">
            ---------------------
            Officer
        </div>
        <div id="copy">
            <b>STUDENT COPY</b>
        </div>
    </div>

    <div id="inner_div3">
        <div id="address_div">
            <table width="310" style="text-align: center;">
                <tr>
                    <td style="padding-bottom: 5px;">
                        <img src="<?php echo base_url() ?>public/payment_invoice/logo.png">
                    </td>
                </tr>
                <tr>
                    <td style="padding-bottom: 5px;  font-size: 13px;">Invoice No:12542157</td>
                </tr>
                <tr>
                    <td style="font-size: 16px;"><b>Payment invoice for: Exam,2018</b></td>
                </tr>
                <?php foreach ($student_info as $v_data) { ?>
                    <tr>
                        <td style="padding-top: 10px; font-size: 13px;">Student
                            ID: <?php echo $v_data->student_id; ?></td>
                    </tr>
                    <tr>
                        <td style="font-size: 13px;">Student
                            Name: <?php echo $v_data->student_name; ?></td>
                    </tr>
                    <tr>
                        <td style="padding-bottom: 8px;  font-size: 13px;">Shift: <?php echo $v_data->shift_name; ?>,
                            Class: <?php echo $v_data->class_name; ?>,
                            Section: <?php echo $v_data->section_name; ?></td>
                    </tr>
                <?php } ?>
            </table>
        </div>


        <table id="table1" border="1" width="310" style="margin-left: 11px; collapse: 0;">
            <tr>
                <th style="width: 15px;">SL</th>
                <th style="width: 210px;">Particulars</th>
                <th>Amount(Tk)</th>
            </tr>
            <?php
            $i = 0;
            $total_amount = 0;
            foreach ($exam_fee as $v_data) {
                $i++; ?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $v_data->particulars ?></td>
                    <td style="text-align: right;">
                        <?php
                        $total_amount += $v_data->amount;
                        echo $result1 = $call_function->taka_format1($v_data->amount);
                        ?>
                    </td>
                </tr>
            <?php } ?>
            <tr>
                <td colspan="2" style="text-align: right;">Total</td>
                <td style="text-align: right;">
                    <?php
                    echo $result = $call_function->taka_format1($total_amount);
                    ?>
                </td>
            </tr>
            <tr>
                <?php
                $number = $total_amount;
                $no = round($number);
                $point = round($number - $no, 2) * 100;
                $hundred = null;
                $digits_1 = strlen($no);
                $i = 0;
                $str = array();
                $words = array('0' => '', '1' => 'one', '2' => 'two',
                    '3' => 'three', '4' => 'four', '5' => 'five', '6' => 'six',
                    '7' => 'seven', '8' => 'eight', '9' => 'nine',
                    '10' => 'ten', '11' => 'eleven', '12' => 'twelve',
                    '13' => 'thirteen', '14' => 'fourteen',
                    '15' => 'fifteen', '16' => 'sixteen', '17' => 'seventeen',
                    '18' => 'eighteen', '19' => 'nineteen', '20' => 'twenty',
                    '30' => 'thirty', '40' => 'forty', '50' => 'fifty',
                    '60' => 'sixty', '70' => 'seventy',
                    '80' => 'eighty', '90' => 'ninety');
                $digits = array('', 'hundred', 'thousand', 'lakh', 'crore');
                while ($i < $digits_1) {
                    $divider = ($i == 2) ? 10 : 100;
                    $number = floor($no % $divider);
                    $no = floor($no / $divider);
                    $i += ($divider == 10) ? 1 : 2;
                    if ($number) {
                        $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
                        $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
                        $str [] = ($number < 21) ? $words[$number] .
                            " " . $digits[$counter] . $plural . " " . $hundred
                            :
                            $words[floor($number / 10) * 10]
                            . " " . $words[$number % 10] . " "
                            . $digits[$counter] . $plural . " " . $hundred;
                    } else $str[] = null;
                }
                $str = array_reverse($str);
                $result = implode('', $str);
                $points = ($point) ?
                    "." . $words[$point / 10] . " " .
                    $words[$point = $point % 10] : '';
                $get_result = ucwords($result);
                ?>
                <td colspan="3" style="font-size: 13px;"><b>In
                        Word:</b><?php echo $get_result . "taka  " . $points . " Paise"; ?></td>
            </tr>
        </table>
        <br>
        <div id="note">
            <b>Note:</b>Lorem Ipsum is simply dummy text of the printing and Lorem Ipsum has been the
            industry's standard dummy text ever since the 1500s
        </div>

        <div id="signature1">
            ---------------------
            Deposited By
        </div>
        <div id="signature2">
            ---------------------
            Cashier
        </div>
        <div id="signature3">
            ---------------------
            Officer
        </div>
        <div id="copy">
            <b>STUDENT COPY</b>
        </div>
    </div>
</div>