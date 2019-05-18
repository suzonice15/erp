<style>
    .fix-column {
        float: left;
    }

    .thead {
        height: 40px;
        white-space: nowrap;
    }

    .thead > span {
        display: inline-block;
        width: 100px;
        line-height: 40px;
        box-shadow: inset 0 0 1px 0 rgba(0, 0, 0, .5);
        background-color: rgba(255, 0, 0, .3);
        text-align: center;
    }

    .trow {
        white-space: nowrap;
    }

    .trow > span {
        display: inline-block;
        width: 100px;
        box-shadow: inset 0 0 1px 0 rgba(0, 0, 0, .5);
        line-height: 25px;
        height: 25px;
        padding-left: 4px;
    }

    .tbody {
        height: 560px;
        overflow: auto;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
        /*font-size: 13px;*/
    }

    .fix-column > .tbody {
        overflow: hidden;
        padding-bottom: 50px;
        /*font-size: 13px;*/
    }

    .fix-column > .tbody > .trow:last-child {
        margin-bottom: 50px;
    }

    .fix-column > .tbody > .trow {
        margin-top: -50px;
        margin-bottom: 50px;
    }

    .fix-column > .tbody > .trow:first-child {
        margin-top: 0px;
    }

    .rest-columns {
        width: 935px;
    }

    .rest-columns > .thead {
        padding-right: 50px;
        overflow: hidden;
    }

    .rest-columns > .thead > :last-child {
        margin-right: 50px;
    }

    .rest-columns > .thead > span {
        margin-right: -4px;
    }

    .rest-columns > .thead > :first-child {
        margin-left: 0px;
    }
</style>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <div class="pageheader" style="background-color: #F5F5F5;">
                <h2><i class="fa fa-home"></i>Employee Salary Page <br></h2>
                <ol class="breadcrumb" style="background-color: #F5F5F5;">
                    <li><a href="<?php echo base_url() ?>hr/create_salary/all_create_salary">Dashboard</a></li>
                    <li class="active">Add edit delete view.....</li>
                </ol>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading" style="height: 55px;">
                    <div class="col-md-2">
                        <button type="button" class="btn btn-success" data-backdrop="static"
                                data-keyboard="false" data-toggle="modal"
                                data-target="#load_modal" onclick="return add_create_salary();">
                            Add create_salary
                        </button>
                    </div>
                    <div class="col-md-3">
                        <input onkeyup="return search_content();" type="text" class="form-control" id="search_emp_id"
                               placeholder="Search by employee ID">
                    </div>
                    <div class="col-md-3">
                        <input onkeyup="return search_content();" type="text" class="form-control" id="select_amount"
                               placeholder="Search by amount">
                    </div>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="row">
                        <div class="form-group">
                            <div class="col-md-12">

                                <div class="total-wrapper">

                                    <!-- ==================================-->
                                    <!-- ===== left fixed bar start ====== -->
                                    <!-- ================================= -->
                                    <div class="fix-column" style="font-size: 13.5px;">
                                        <div class="thead">
                                            <span style="width: 50px;">SL NO</span>
                                            <span style="margin-left: -4px;">Employee ID</span>
                                        </div>
                                        <div class="tbody">
                                            <div class="trow">
                                                <span style="width: 50px;">1</span>
                                                <span style="margin-left: -4px;">17001</span>
                                            </div>
                                            <div class="trow">
                                                <span style="width: 50px;">2</span>
                                                <span style="margin-left: -4px;">17002</span>
                                            </div>
                                            <div class="trow">
                                                <span style="width: 50px;">3</span>
                                                <span style="margin-left: -4px;">17003</span>
                                            </div>
                                            <div class="trow">
                                                <span style="width: 50px;">4</span>
                                                <span style="margin-left: -4px;">17004</span>
                                            </div>
                                            <div class="trow">
                                                <span style="width: 50px;">5</span>
                                                <span style="margin-left: -4px;">17005</span>
                                            </div>
                                            <div class="trow">
                                                <span style="width: 50px;">6</span>
                                                <span style="margin-left: -4px;">17006</span>
                                            </div>
                                            <div class="trow">
                                                <span style="width: 50px;">7</span>
                                                <span style="margin-left: -4px;">17007</span>
                                            </div>
                                            <div class="trow">
                                                <span style="width: 50px;">8</span>
                                                <span style="margin-left: -4px;">17008</span>
                                            </div>
                                            <div class="trow">
                                                <span style="width: 50px;">9</span>
                                                <span style="margin-left: -4px;">17009</span>
                                            </div>
                                            <div class="trow">
                                                <span style="width: 50px;">10</span>
                                                <span style="margin-left: -4px;">17010</span>
                                            </div>
                                            <div class="trow">
                                                <span style="width: 50px;">12</span>
                                                <span style="margin-left: -4px;">17012</span>
                                            </div>
                                            <div class="trow">
                                                <span style="width: 50px;">13</span>
                                                <span style="margin-left: -4px;">17013</span>
                                            </div>
                                            <div class="trow">
                                                <span style="width: 50px;">14</span>
                                                <span style="margin-left: -4px;">17014</span>
                                            </div>
                                            <div class="trow">
                                                <span style="width: 50px;">15</span>
                                                <span style="margin-left: -4px;">17015</span>
                                            </div>
                                            <div class="trow">
                                                <span style="width: 50px;">16</span>
                                                <span style="margin-left: -4px;">17016</span>
                                            </div>
                                            <div class="trow">
                                                <span style="width: 50px;">17</span>
                                                <span style="margin-left: -4px;">17017</span>
                                            </div>
                                            <div class="trow">
                                                <span style="width: 50px;">18</span>
                                                <span style="margin-left: -4px;">17018</span>
                                            </div>
                                            <div class="trow">
                                                <span style="width: 50px;">19</span>
                                                <span style="margin-left: -4px;">17019</span>
                                            </div>
                                            <div class="trow">
                                                <span style="width: 50px;">20</span>
                                                <span style="margin-left: -4px;">17020</span>
                                            </div>
                                            <div class="trow">
                                                <span style="width: 50px;">21</span>
                                                <span style="margin-left: -4px;">17021</span>
                                            </div>
                                            <div class="trow">
                                                <span style="width: 50px;">22</span>
                                                <span style="margin-left: -4px;">17022</span>
                                            </div>
                                            <div class="trow">
                                                <span style="width: 50px;">23</span>
                                                <span style="margin-left: -4px;">17023</span>
                                            </div>
                                            <div class="trow">
                                                <span style="width: 50px;">24</span>
                                                <span style="margin-left: -4px;">17024</span>
                                            </div>
                                            <div class="trow">
                                                <span style="width: 50px;">25</span>
                                                <span style="margin-left: -4px;">17025</span>
                                            </div>
                                            <div class="trow">
                                                <span style="width: 50px;">26</span>
                                                <span style="margin-left: -4px;">17026</span>
                                            </div>
                                            <div class="trow">
                                                <span style="width: 50px;">27</span>
                                                <span style="margin-left: -4px;">17027</span>
                                            </div>
                                            <div class="trow">
                                                <span style="width: 50px;">28</span>
                                                <span style="margin-left: -4px;">17028</span>
                                            </div>
                                            <div class="trow">
                                                <span style="width: 50px;">29</span>
                                                <span style="margin-left: -4px;">17029</span>
                                            </div>
                                            <div class="trow">
                                                <span style="width: 50px;">30</span>
                                                <span style="margin-left: -4px;">17030</span>
                                            </div>
                                            <div class="trow">
                                                <span style="width: 50px;">31</span>
                                                <span style="margin-left: -4px;">17031</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- ==================================-->
                                    <!-- ===== left fixed bar end ======== -->
                                    <!-- ================================= -->


                                    <div class="rest-columns">
                                        <div class="thead" style="font-size: 13.5px;">
                                            <span style="width: 250px;">Name</span>
                                            <span>Designation</span>
                                            <span>Department</span>
                                            <span style="width: 60px;">Shift</span>

                                            <span style="width: 60px;">Section</span>
                                            <span style="width: 90px;">Joining date</span>
                                            <span style="width: 55px;">Month</span>
                                            <span style="width: 60px;">Attend</span>

                                            <span style="width: 70px;">Weekend</span>
                                            <span style="width: 65px;">Holiday</span>
                                            <span style="width: 65px;">Medical</span>
                                            <span style="width: 95px;">Casual Leave</span>


                                            <span style="width: 110px;">Metarnity Leave</span>
                                            <span style="width: 60px;">Absent</span>
                                            <span style="width: 130px;">Total Payable Days</span>
                                            <span style="width: 90px;">Basic Salary</span>

                                            <span style="width: 90px;">House Rent</span>
                                            <span style="width: 60px;">Medical</span>
                                            <span style="width: 90px;">Conveyance</span>
                                            <span style="width: 60px;">Arrears</span>

                                            <span style="width: 80px;">Extra Duty</span>
                                            <span style="width: 60px;">Other</span>
                                            <span style="width: 100px;">Total Addition</span>
                                            <span style="width: 60px;">Tax</span>

                                            <span style="width: 110px;">Provident Fund</span>
                                            <span>Welfare Fund</span>
                                            <span style="width: 120px;">Other Deduction</span>
                                            <span style="width: 50px;">Loan</span>

                                            <span style="width: 70px;">Advance</span>
                                            <span style="width: 60px;">Absent</span>
                                            <span style="width: 55px;">Stamp</span>
                                            <span style="width: 120px;">Deduction Total</span>

                                            <span style="width: 125px;">Net Payable Total</span>
                                            <span style="width: 102px;">Payment Type</span>
                                            <span style="width: 50px;">Year</span>
                                            <span style="width: 60px;">Month</span>
                                        </div>

                                        <div class="tbody" style="font-size: 12px;">
                                            <div class="trow">
                                                <span
                                                    style="width: 250px;">Rashid Binte Salman</span><span>IT Officer</span><span>IT</span><span
                                                    style="width: 60px;">Evening</span>

                                                <span
                                                    style="margin-left: -4px; width: 60px;">A</span><span
                                                    style="width: 90px;">1990-01-01</span><span
                                                    style="width: 55px;">31</span><span style="width: 60px;">26</span>

                                                <span
                                                    style="margin-left: -5px; width: 70px;">4</span><span
                                                    style="width: 65px;">1</span><span
                                                    style="width: 65px;">2</span><span style="width: 95px;">1</span>

                                                <span
                                                    style="margin-left: -5px; width: 110px;">25</span><span
                                                    style="width: 60px;">0</span><span
                                                    style="width: 130px;">31</span><span
                                                    style="width: 90px;">42750</span>

                                                <span
                                                    style="margin-left: -4px; width: 90px;">2000</span><span
                                                    style="width: 60px;">2000</span><span
                                                    style="width: 90px;">2000</span><span
                                                    style="width: 60px;">2000</span>

                                                <span
                                                    style="margin-left: -4px; width: 80px;">1000</span><span
                                                    style="width: 60px;">1000</span><span
                                                    style="width: 100px;">1000</span><span
                                                    style="width: 60px;">1000</span>

                                                <span
                                                    style="margin-left: -4px; width: 110px;">3000</span><span>3000</span><span
                                                    style="width: 120px;">3000</span><span
                                                    style="width: 50px;">3000</span>

                                                 <span
                                                     style="margin-left: -4px; width: 70px;">5000</span><span
                                                    style="width: 60px;">5000</span><span
                                                    style="width: 55px;">5000</span><span
                                                    style="width: 120px;">5000</span>

                                                 <span
                                                     style="margin-left: -4px; width: 125px;">4000</span><span
                                                    style="width: 101px;">4000</span><span
                                                    style="width: 50px;">4000</span><span
                                                    style="width: 60px;">4000</span>
                                            </div>
                                            <div class="trow">
                                                <span
                                                    style="width: 250px;">Rashid Binte Salman</span><span>IT Officer</span><span>IT</span><span
                                                    style="width: 60px;">Evening</span>

                                                <span
                                                    style="margin-left: -4px; width: 60px;">A</span><span
                                                    style="width: 90px;">1990-01-01</span><span
                                                    style="width: 55px;">31</span><span style="width: 60px;">26</span>

                                                <span
                                                    style="margin-left: -5px; width: 70px;">4</span><span
                                                    style="width: 65px;">1</span><span
                                                    style="width: 65px;">2</span><span style="width: 95px;">1</span>

                                                <span
                                                    style="margin-left: -5px; width: 110px;">25</span><span
                                                    style="width: 60px;">0</span><span
                                                    style="width: 130px;">31</span><span
                                                    style="width: 90px;">42750</span>

                                                <span
                                                    style="margin-left: -4px; width: 90px;">2000</span><span
                                                    style="width: 60px;">2000</span><span
                                                    style="width: 90px;">2000</span><span
                                                    style="width: 60px;">2000</span>

                                                <span
                                                    style="margin-left: -4px; width: 80px;">1000</span><span
                                                    style="width: 60px;">1000</span><span
                                                    style="width: 100px;">1000</span><span
                                                    style="width: 60px;">1000</span>

                                                <span
                                                    style="margin-left: -4px; width: 110px;">3000</span><span>3000</span><span
                                                    style="width: 120px;">3000</span><span
                                                    style="width: 50px;">3000</span>

                                                 <span
                                                     style="margin-left: -4px; width: 70px;">5000</span><span
                                                    style="width: 60px;">5000</span><span
                                                    style="width: 55px;">5000</span><span
                                                    style="width: 120px;">5000</span>

                                                 <span
                                                     style="margin-left: -4px; width: 125px;">4000</span><span
                                                    style="width: 101px;">4000</span><span
                                                    style="width: 50px;">4000</span><span
                                                    style="width: 60px;">4000</span>
                                            </div>
                                            <div class="trow">
                                                <span
                                                    style="width: 250px;">Rashid Binte Salman</span><span>IT Officer</span><span>IT</span><span
                                                    style="width: 60px;">Evening</span>

                                                <span
                                                    style="margin-left: -4px; width: 60px;">A</span><span
                                                    style="width: 90px;">1990-01-01</span><span
                                                    style="width: 55px;">31</span><span style="width: 60px;">26</span>

                                                <span
                                                    style="margin-left: -5px; width: 70px;">4</span><span
                                                    style="width: 65px;">1</span><span
                                                    style="width: 65px;">2</span><span style="width: 95px;">1</span>

                                                <span
                                                    style="margin-left: -5px; width: 110px;">25</span><span
                                                    style="width: 60px;">0</span><span
                                                    style="width: 130px;">31</span><span
                                                    style="width: 90px;">42750</span>

                                                <span
                                                    style="margin-left: -4px; width: 90px;">2000</span><span
                                                    style="width: 60px;">2000</span><span
                                                    style="width: 90px;">2000</span><span
                                                    style="width: 60px;">2000</span>

                                                <span
                                                    style="margin-left: -4px; width: 80px;">1000</span><span
                                                    style="width: 60px;">1000</span><span
                                                    style="width: 100px;">1000</span><span
                                                    style="width: 60px;">1000</span>

                                                <span
                                                    style="margin-left: -4px; width: 110px;">3000</span><span>3000</span><span
                                                    style="width: 120px;">3000</span><span
                                                    style="width: 50px;">3000</span>

                                                 <span
                                                     style="margin-left: -4px; width: 70px;">5000</span><span
                                                    style="width: 60px;">5000</span><span
                                                    style="width: 55px;">5000</span><span
                                                    style="width: 120px;">5000</span>

                                                 <span
                                                     style="margin-left: -4px; width: 125px;">4000</span><span
                                                    style="width: 101px;">4000</span><span
                                                    style="width: 50px;">4000</span><span
                                                    style="width: 60px;">4000</span>
                                            </div>
                                            <div class="trow">
                                                <span
                                                    style="width: 250px;">Rashid Binte Salman</span><span>IT Officer</span><span>IT</span><span
                                                    style="width: 60px;">Evening</span>

                                                <span
                                                    style="margin-left: -4px; width: 60px;">A</span><span
                                                    style="width: 90px;">1990-01-01</span><span
                                                    style="width: 55px;">31</span><span style="width: 60px;">26</span>

                                                <span
                                                    style="margin-left: -5px; width: 70px;">4</span><span
                                                    style="width: 65px;">1</span><span
                                                    style="width: 65px;">2</span><span style="width: 95px;">1</span>

                                                <span
                                                    style="margin-left: -5px; width: 110px;">25</span><span
                                                    style="width: 60px;">0</span><span
                                                    style="width: 130px;">31</span><span
                                                    style="width: 90px;">42750</span>

                                                <span
                                                    style="margin-left: -4px; width: 90px;">2000</span><span
                                                    style="width: 60px;">2000</span><span
                                                    style="width: 90px;">2000</span><span
                                                    style="width: 60px;">2000</span>

                                                <span
                                                    style="margin-left: -4px; width: 80px;">1000</span><span
                                                    style="width: 60px;">1000</span><span
                                                    style="width: 100px;">1000</span><span
                                                    style="width: 60px;">1000</span>

                                                <span
                                                    style="margin-left: -4px; width: 110px;">3000</span><span>3000</span><span
                                                    style="width: 120px;">3000</span><span
                                                    style="width: 50px;">3000</span>

                                                 <span
                                                     style="margin-left: -4px; width: 70px;">5000</span><span
                                                    style="width: 60px;">5000</span><span
                                                    style="width: 55px;">5000</span><span
                                                    style="width: 120px;">5000</span>

                                                 <span
                                                     style="margin-left: -4px; width: 125px;">4000</span><span
                                                    style="width: 101px;">4000</span><span
                                                    style="width: 50px;">4000</span><span
                                                    style="width: 60px;">4000</span>
                                            </div>
                                            <div class="trow">
                                                <span
                                                    style="width: 250px;">Rashid Binte Salman</span><span>IT Officer</span><span>IT</span><span
                                                    style="width: 60px;">Evening</span>

                                                <span
                                                    style="margin-left: -4px; width: 60px;">A</span><span
                                                    style="width: 90px;">1990-01-01</span><span
                                                    style="width: 55px;">31</span><span style="width: 60px;">26</span>

                                                <span
                                                    style="margin-left: -5px; width: 70px;">4</span><span
                                                    style="width: 65px;">1</span><span
                                                    style="width: 65px;">2</span><span style="width: 95px;">1</span>

                                                <span
                                                    style="margin-left: -5px; width: 110px;">25</span><span
                                                    style="width: 60px;">0</span><span
                                                    style="width: 130px;">31</span><span
                                                    style="width: 90px;">42750</span>

                                                <span
                                                    style="margin-left: -4px; width: 90px;">2000</span><span
                                                    style="width: 60px;">2000</span><span
                                                    style="width: 90px;">2000</span><span
                                                    style="width: 60px;">2000</span>

                                                <span
                                                    style="margin-left: -4px; width: 80px;">1000</span><span
                                                    style="width: 60px;">1000</span><span
                                                    style="width: 100px;">1000</span><span
                                                    style="width: 60px;">1000</span>

                                                <span
                                                    style="margin-left: -4px; width: 110px;">3000</span><span>3000</span><span
                                                    style="width: 120px;">3000</span><span
                                                    style="width: 50px;">3000</span>

                                                 <span
                                                     style="margin-left: -4px; width: 70px;">5000</span><span
                                                    style="width: 60px;">5000</span><span
                                                    style="width: 55px;">5000</span><span
                                                    style="width: 120px;">5000</span>

                                                 <span
                                                     style="margin-left: -4px; width: 125px;">4000</span><span
                                                    style="width: 101px;">4000</span><span
                                                    style="width: 50px;">4000</span><span
                                                    style="width: 60px;">4000</span>
                                            </div>
                                            <div class="trow">
                                                <span
                                                    style="width: 250px;">Rashid Binte Salman</span><span>IT Officer</span><span>IT</span><span
                                                    style="width: 60px;">Evening</span>

                                                <span
                                                    style="margin-left: -4px; width: 60px;">A</span><span
                                                    style="width: 90px;">1990-01-01</span><span
                                                    style="width: 55px;">31</span><span style="width: 60px;">26</span>

                                                <span
                                                    style="margin-left: -5px; width: 70px;">4</span><span
                                                    style="width: 65px;">1</span><span
                                                    style="width: 65px;">2</span><span style="width: 95px;">1</span>

                                                <span
                                                    style="margin-left: -5px; width: 110px;">25</span><span
                                                    style="width: 60px;">0</span><span
                                                    style="width: 130px;">31</span><span
                                                    style="width: 90px;">42750</span>

                                                <span
                                                    style="margin-left: -4px; width: 90px;">2000</span><span
                                                    style="width: 60px;">2000</span><span
                                                    style="width: 90px;">2000</span><span
                                                    style="width: 60px;">2000</span>

                                                <span
                                                    style="margin-left: -4px; width: 80px;">1000</span><span
                                                    style="width: 60px;">1000</span><span
                                                    style="width: 100px;">1000</span><span
                                                    style="width: 60px;">1000</span>

                                                <span
                                                    style="margin-left: -4px; width: 110px;">3000</span><span>3000</span><span
                                                    style="width: 120px;">3000</span><span
                                                    style="width: 50px;">3000</span>

                                                 <span
                                                     style="margin-left: -4px; width: 70px;">5000</span><span
                                                    style="width: 60px;">5000</span><span
                                                    style="width: 55px;">5000</span><span
                                                    style="width: 120px;">5000</span>

                                                 <span
                                                     style="margin-left: -4px; width: 125px;">4000</span><span
                                                    style="width: 101px;">4000</span><span
                                                    style="width: 50px;">4000</span><span
                                                    style="width: 60px;">4000</span>
                                            </div>
                                            <div class="trow">
                                                <span
                                                    style="width: 250px;">Rashid Binte Salman</span><span>IT Officer</span><span>IT</span><span
                                                    style="width: 60px;">Evening</span>

                                                <span
                                                    style="margin-left: -4px; width: 60px;">A</span><span
                                                    style="width: 90px;">1990-01-01</span><span
                                                    style="width: 55px;">31</span><span style="width: 60px;">26</span>

                                                <span
                                                    style="margin-left: -5px; width: 70px;">4</span><span
                                                    style="width: 65px;">1</span><span
                                                    style="width: 65px;">2</span><span style="width: 95px;">1</span>

                                                <span
                                                    style="margin-left: -5px; width: 110px;">25</span><span
                                                    style="width: 60px;">0</span><span
                                                    style="width: 130px;">31</span><span
                                                    style="width: 90px;">42750</span>

                                                <span
                                                    style="margin-left: -4px; width: 90px;">2000</span><span
                                                    style="width: 60px;">2000</span><span
                                                    style="width: 90px;">2000</span><span
                                                    style="width: 60px;">2000</span>

                                                <span
                                                    style="margin-left: -4px; width: 80px;">1000</span><span
                                                    style="width: 60px;">1000</span><span
                                                    style="width: 100px;">1000</span><span
                                                    style="width: 60px;">1000</span>

                                                <span
                                                    style="margin-left: -4px; width: 110px;">3000</span><span>3000</span><span
                                                    style="width: 120px;">3000</span><span
                                                    style="width: 50px;">3000</span>

                                                 <span
                                                     style="margin-left: -4px; width: 70px;">5000</span><span
                                                    style="width: 60px;">5000</span><span
                                                    style="width: 55px;">5000</span><span
                                                    style="width: 120px;">5000</span>

                                                 <span
                                                     style="margin-left: -4px; width: 125px;">4000</span><span
                                                    style="width: 101px;">4000</span><span
                                                    style="width: 50px;">4000</span><span
                                                    style="width: 60px;">4000</span>
                                            </div>
                                            <div class="trow">
                                                <span
                                                    style="width: 250px;">Rashid Binte Salman</span><span>IT Officer</span><span>IT</span><span
                                                    style="width: 60px;">Evening</span>

                                                <span
                                                    style="margin-left: -4px; width: 60px;">A</span><span
                                                    style="width: 90px;">1990-01-01</span><span
                                                    style="width: 55px;">31</span><span style="width: 60px;">26</span>

                                                <span
                                                    style="margin-left: -5px; width: 70px;">4</span><span
                                                    style="width: 65px;">1</span><span
                                                    style="width: 65px;">2</span><span style="width: 95px;">1</span>

                                                <span
                                                    style="margin-left: -5px; width: 110px;">25</span><span
                                                    style="width: 60px;">0</span><span
                                                    style="width: 130px;">31</span><span
                                                    style="width: 90px;">42750</span>

                                                <span
                                                    style="margin-left: -4px; width: 90px;">2000</span><span
                                                    style="width: 60px;">2000</span><span
                                                    style="width: 90px;">2000</span><span
                                                    style="width: 60px;">2000</span>

                                                <span
                                                    style="margin-left: -4px; width: 80px;">1000</span><span
                                                    style="width: 60px;">1000</span><span
                                                    style="width: 100px;">1000</span><span
                                                    style="width: 60px;">1000</span>

                                                <span
                                                    style="margin-left: -4px; width: 110px;">3000</span><span>3000</span><span
                                                    style="width: 120px;">3000</span><span
                                                    style="width: 50px;">3000</span>

                                                 <span
                                                     style="margin-left: -4px; width: 70px;">5000</span><span
                                                    style="width: 60px;">5000</span><span
                                                    style="width: 55px;">5000</span><span
                                                    style="width: 120px;">5000</span>

                                                 <span
                                                     style="margin-left: -4px; width: 125px;">4000</span><span
                                                    style="width: 101px;">4000</span><span
                                                    style="width: 50px;">4000</span><span
                                                    style="width: 60px;">4000</span>
                                            </div>
                                            <div class="trow">
                                                <span
                                                    style="width: 250px;">Rashid Binte Salman</span><span>IT Officer</span><span>IT</span><span
                                                    style="width: 60px;">Evening</span>

                                                <span
                                                    style="margin-left: -4px; width: 60px;">A</span><span
                                                    style="width: 90px;">1990-01-01</span><span
                                                    style="width: 55px;">31</span><span style="width: 60px;">26</span>

                                                <span
                                                    style="margin-left: -5px; width: 70px;">4</span><span
                                                    style="width: 65px;">1</span><span
                                                    style="width: 65px;">2</span><span style="width: 95px;">1</span>

                                                <span
                                                    style="margin-left: -5px; width: 110px;">25</span><span
                                                    style="width: 60px;">0</span><span
                                                    style="width: 130px;">31</span><span
                                                    style="width: 90px;">42750</span>

                                                <span
                                                    style="margin-left: -4px; width: 90px;">2000</span><span
                                                    style="width: 60px;">2000</span><span
                                                    style="width: 90px;">2000</span><span
                                                    style="width: 60px;">2000</span>

                                                <span
                                                    style="margin-left: -4px; width: 80px;">1000</span><span
                                                    style="width: 60px;">1000</span><span
                                                    style="width: 100px;">1000</span><span
                                                    style="width: 60px;">1000</span>

                                                <span
                                                    style="margin-left: -4px; width: 110px;">3000</span><span>3000</span><span
                                                    style="width: 120px;">3000</span><span
                                                    style="width: 50px;">3000</span>

                                                 <span
                                                     style="margin-left: -4px; width: 70px;">5000</span><span
                                                    style="width: 60px;">5000</span><span
                                                    style="width: 55px;">5000</span><span
                                                    style="width: 120px;">5000</span>

                                                 <span
                                                     style="margin-left: -4px; width: 125px;">4000</span><span
                                                    style="width: 101px;">4000</span><span
                                                    style="width: 50px;">4000</span><span
                                                    style="width: 60px;">4000</span>
                                            </div>
                                            <div class="trow">
                                                <span
                                                    style="width: 250px;">Rashid Binte Salman</span><span>IT Officer</span><span>IT</span><span
                                                    style="width: 60px;">Evening</span>

                                                <span
                                                    style="margin-left: -4px; width: 60px;">A</span><span
                                                    style="width: 90px;">1990-01-01</span><span
                                                    style="width: 55px;">31</span><span style="width: 60px;">26</span>

                                                <span
                                                    style="margin-left: -5px; width: 70px;">4</span><span
                                                    style="width: 65px;">1</span><span
                                                    style="width: 65px;">2</span><span style="width: 95px;">1</span>

                                                <span
                                                    style="margin-left: -5px; width: 110px;">25</span><span
                                                    style="width: 60px;">0</span><span
                                                    style="width: 130px;">31</span><span
                                                    style="width: 90px;">42750</span>

                                                <span
                                                    style="margin-left: -4px; width: 90px;">2000</span><span
                                                    style="width: 60px;">2000</span><span
                                                    style="width: 90px;">2000</span><span
                                                    style="width: 60px;">2000</span>

                                                <span
                                                    style="margin-left: -4px; width: 80px;">1000</span><span
                                                    style="width: 60px;">1000</span><span
                                                    style="width: 100px;">1000</span><span
                                                    style="width: 60px;">1000</span>

                                                <span
                                                    style="margin-left: -4px; width: 110px;">3000</span><span>3000</span><span
                                                    style="width: 120px;">3000</span><span
                                                    style="width: 50px;">3000</span>

                                                 <span
                                                     style="margin-left: -4px; width: 70px;">5000</span><span
                                                    style="width: 60px;">5000</span><span
                                                    style="width: 55px;">5000</span><span
                                                    style="width: 120px;">5000</span>

                                                 <span
                                                     style="margin-left: -4px; width: 125px;">4000</span><span
                                                    style="width: 101px;">4000</span><span
                                                    style="width: 50px;">4000</span><span
                                                    style="width: 60px;">4000</span>
                                            </div>
                                            <div class="trow">
                                                <span
                                                    style="width: 250px;">Rashid Binte Salman</span><span>IT Officer</span><span>IT</span><span
                                                    style="width: 60px;">Evening</span>

                                                <span
                                                    style="margin-left: -4px; width: 60px;">A</span><span
                                                    style="width: 90px;">1990-01-01</span><span
                                                    style="width: 55px;">31</span><span style="width: 60px;">26</span>

                                                <span
                                                    style="margin-left: -5px; width: 70px;">4</span><span
                                                    style="width: 65px;">1</span><span
                                                    style="width: 65px;">2</span><span style="width: 95px;">1</span>

                                                <span
                                                    style="margin-left: -5px; width: 110px;">25</span><span
                                                    style="width: 60px;">0</span><span
                                                    style="width: 130px;">31</span><span
                                                    style="width: 90px;">42750</span>

                                                <span
                                                    style="margin-left: -4px; width: 90px;">2000</span><span
                                                    style="width: 60px;">2000</span><span
                                                    style="width: 90px;">2000</span><span
                                                    style="width: 60px;">2000</span>

                                                <span
                                                    style="margin-left: -4px; width: 80px;">1000</span><span
                                                    style="width: 60px;">1000</span><span
                                                    style="width: 100px;">1000</span><span
                                                    style="width: 60px;">1000</span>

                                                <span
                                                    style="margin-left: -4px; width: 110px;">3000</span><span>3000</span><span
                                                    style="width: 120px;">3000</span><span
                                                    style="width: 50px;">3000</span>

                                                 <span
                                                     style="margin-left: -4px; width: 70px;">5000</span><span
                                                    style="width: 60px;">5000</span><span
                                                    style="width: 55px;">5000</span><span
                                                    style="width: 120px;">5000</span>

                                                 <span
                                                     style="margin-left: -4px; width: 125px;">4000</span><span
                                                    style="width: 101px;">4000</span><span
                                                    style="width: 50px;">4000</span><span
                                                    style="width: 60px;">4000</span>
                                            </div>
                                            <div class="trow">
                                                <span
                                                    style="width: 250px;">Rashid Binte Salman</span><span>IT Officer</span><span>IT</span><span
                                                    style="width: 60px;">Evening</span>

                                                <span
                                                    style="margin-left: -4px; width: 60px;">A</span><span
                                                    style="width: 90px;">1990-01-01</span><span
                                                    style="width: 55px;">31</span><span style="width: 60px;">26</span>

                                                <span
                                                    style="margin-left: -5px; width: 70px;">4</span><span
                                                    style="width: 65px;">1</span><span
                                                    style="width: 65px;">2</span><span style="width: 95px;">1</span>

                                                <span
                                                    style="margin-left: -5px; width: 110px;">25</span><span
                                                    style="width: 60px;">0</span><span
                                                    style="width: 130px;">31</span><span
                                                    style="width: 90px;">42750</span>

                                                <span
                                                    style="margin-left: -4px; width: 90px;">2000</span><span
                                                    style="width: 60px;">2000</span><span
                                                    style="width: 90px;">2000</span><span
                                                    style="width: 60px;">2000</span>

                                                <span
                                                    style="margin-left: -4px; width: 80px;">1000</span><span
                                                    style="width: 60px;">1000</span><span
                                                    style="width: 100px;">1000</span><span
                                                    style="width: 60px;">1000</span>

                                                <span
                                                    style="margin-left: -4px; width: 110px;">3000</span><span>3000</span><span
                                                    style="width: 120px;">3000</span><span
                                                    style="width: 50px;">3000</span>

                                                 <span
                                                     style="margin-left: -4px; width: 70px;">5000</span><span
                                                    style="width: 60px;">5000</span><span
                                                    style="width: 55px;">5000</span><span
                                                    style="width: 120px;">5000</span>

                                                 <span
                                                     style="margin-left: -4px; width: 125px;">4000</span><span
                                                    style="width: 101px;">4000</span><span
                                                    style="width: 50px;">4000</span><span
                                                    style="width: 60px;">4000</span>
                                            </div>
                                            <div class="trow">
                                                <span
                                                    style="width: 250px;">Rashid Binte Salman</span><span>IT Officer</span><span>IT</span><span
                                                    style="width: 60px;">Evening</span>

                                                <span
                                                    style="margin-left: -4px; width: 60px;">A</span><span
                                                    style="width: 90px;">1990-01-01</span><span
                                                    style="width: 55px;">31</span><span style="width: 60px;">26</span>

                                                <span
                                                    style="margin-left: -5px; width: 70px;">4</span><span
                                                    style="width: 65px;">1</span><span
                                                    style="width: 65px;">2</span><span style="width: 95px;">1</span>

                                                <span
                                                    style="margin-left: -5px; width: 110px;">25</span><span
                                                    style="width: 60px;">0</span><span
                                                    style="width: 130px;">31</span><span
                                                    style="width: 90px;">42750</span>

                                                <span
                                                    style="margin-left: -4px; width: 90px;">2000</span><span
                                                    style="width: 60px;">2000</span><span
                                                    style="width: 90px;">2000</span><span
                                                    style="width: 60px;">2000</span>

                                                <span
                                                    style="margin-left: -4px; width: 80px;">1000</span><span
                                                    style="width: 60px;">1000</span><span
                                                    style="width: 100px;">1000</span><span
                                                    style="width: 60px;">1000</span>

                                                <span
                                                    style="margin-left: -4px; width: 110px;">3000</span><span>3000</span><span
                                                    style="width: 120px;">3000</span><span
                                                    style="width: 50px;">3000</span>

                                                 <span
                                                     style="margin-left: -4px; width: 70px;">5000</span><span
                                                    style="width: 60px;">5000</span><span
                                                    style="width: 55px;">5000</span><span
                                                    style="width: 120px;">5000</span>

                                                 <span
                                                     style="margin-left: -4px; width: 125px;">4000</span><span
                                                    style="width: 101px;">4000</span><span
                                                    style="width: 50px;">4000</span><span
                                                    style="width: 60px;">4000</span>
                                            </div>
                                            <div class="trow">
                                                <span
                                                    style="width: 250px;">Rashid Binte Salman</span><span>IT Officer</span><span>IT</span><span
                                                    style="width: 60px;">Evening</span>

                                                <span
                                                    style="margin-left: -4px; width: 60px;">A</span><span
                                                    style="width: 90px;">1990-01-01</span><span
                                                    style="width: 55px;">31</span><span style="width: 60px;">26</span>

                                                <span
                                                    style="margin-left: -5px; width: 70px;">4</span><span
                                                    style="width: 65px;">1</span><span
                                                    style="width: 65px;">2</span><span style="width: 95px;">1</span>

                                                <span
                                                    style="margin-left: -5px; width: 110px;">25</span><span
                                                    style="width: 60px;">0</span><span
                                                    style="width: 130px;">31</span><span
                                                    style="width: 90px;">42750</span>

                                                <span
                                                    style="margin-left: -4px; width: 90px;">2000</span><span
                                                    style="width: 60px;">2000</span><span
                                                    style="width: 90px;">2000</span><span
                                                    style="width: 60px;">2000</span>

                                                <span
                                                    style="margin-left: -4px; width: 80px;">1000</span><span
                                                    style="width: 60px;">1000</span><span
                                                    style="width: 100px;">1000</span><span
                                                    style="width: 60px;">1000</span>

                                                <span
                                                    style="margin-left: -4px; width: 110px;">3000</span><span>3000</span><span
                                                    style="width: 120px;">3000</span><span
                                                    style="width: 50px;">3000</span>

                                                 <span
                                                     style="margin-left: -4px; width: 70px;">5000</span><span
                                                    style="width: 60px;">5000</span><span
                                                    style="width: 55px;">5000</span><span
                                                    style="width: 120px;">5000</span>

                                                 <span
                                                     style="margin-left: -4px; width: 125px;">4000</span><span
                                                    style="width: 101px;">4000</span><span
                                                    style="width: 50px;">4000</span><span
                                                    style="width: 60px;">4000</span>
                                            </div>
                                            <div class="trow">
                                                <span
                                                    style="width: 250px;">Rashid Binte Salman</span><span>IT Officer</span><span>IT</span><span
                                                    style="width: 60px;">Evening</span>

                                                <span
                                                    style="margin-left: -4px; width: 60px;">A</span><span
                                                    style="width: 90px;">1990-01-01</span><span
                                                    style="width: 55px;">31</span><span style="width: 60px;">26</span>

                                                <span
                                                    style="margin-left: -5px; width: 70px;">4</span><span
                                                    style="width: 65px;">1</span><span
                                                    style="width: 65px;">2</span><span style="width: 95px;">1</span>

                                                <span
                                                    style="margin-left: -5px; width: 110px;">25</span><span
                                                    style="width: 60px;">0</span><span
                                                    style="width: 130px;">31</span><span
                                                    style="width: 90px;">42750</span>

                                                <span
                                                    style="margin-left: -4px; width: 90px;">2000</span><span
                                                    style="width: 60px;">2000</span><span
                                                    style="width: 90px;">2000</span><span
                                                    style="width: 60px;">2000</span>

                                                <span
                                                    style="margin-left: -4px; width: 80px;">1000</span><span
                                                    style="width: 60px;">1000</span><span
                                                    style="width: 100px;">1000</span><span
                                                    style="width: 60px;">1000</span>

                                                <span
                                                    style="margin-left: -4px; width: 110px;">3000</span><span>3000</span><span
                                                    style="width: 120px;">3000</span><span
                                                    style="width: 50px;">3000</span>

                                                 <span
                                                     style="margin-left: -4px; width: 70px;">5000</span><span
                                                    style="width: 60px;">5000</span><span
                                                    style="width: 55px;">5000</span><span
                                                    style="width: 120px;">5000</span>

                                                 <span
                                                     style="margin-left: -4px; width: 125px;">4000</span><span
                                                    style="width: 101px;">4000</span><span
                                                    style="width: 50px;">4000</span><span
                                                    style="width: 60px;">4000</span>
                                            </div>
                                            <div class="trow">
                                                <span
                                                    style="width: 250px;">Rashid Binte Salman</span><span>IT Officer</span><span>IT</span><span
                                                    style="width: 60px;">Evening</span>

                                                <span
                                                    style="margin-left: -4px; width: 60px;">A</span><span
                                                    style="width: 90px;">1990-01-01</span><span
                                                    style="width: 55px;">31</span><span style="width: 60px;">26</span>

                                                <span
                                                    style="margin-left: -5px; width: 70px;">4</span><span
                                                    style="width: 65px;">1</span><span
                                                    style="width: 65px;">2</span><span style="width: 95px;">1</span>

                                                <span
                                                    style="margin-left: -5px; width: 110px;">25</span><span
                                                    style="width: 60px;">0</span><span
                                                    style="width: 130px;">31</span><span
                                                    style="width: 90px;">42750</span>

                                                <span
                                                    style="margin-left: -4px; width: 90px;">2000</span><span
                                                    style="width: 60px;">2000</span><span
                                                    style="width: 90px;">2000</span><span
                                                    style="width: 60px;">2000</span>

                                                <span
                                                    style="margin-left: -4px; width: 80px;">1000</span><span
                                                    style="width: 60px;">1000</span><span
                                                    style="width: 100px;">1000</span><span
                                                    style="width: 60px;">1000</span>

                                                <span
                                                    style="margin-left: -4px; width: 110px;">3000</span><span>3000</span><span
                                                    style="width: 120px;">3000</span><span
                                                    style="width: 50px;">3000</span>

                                                 <span
                                                     style="margin-left: -4px; width: 70px;">5000</span><span
                                                    style="width: 60px;">5000</span><span
                                                    style="width: 55px;">5000</span><span
                                                    style="width: 120px;">5000</span>

                                                 <span
                                                     style="margin-left: -4px; width: 125px;">4000</span><span
                                                    style="width: 101px;">4000</span><span
                                                    style="width: 50px;">4000</span><span
                                                    style="width: 60px;">4000</span>
                                            </div>
                                            <div class="trow">
                                                <span
                                                    style="width: 250px;">Rashid Binte Salman</span><span>IT Officer</span><span>IT</span><span
                                                    style="width: 60px;">Evening</span>

                                                <span
                                                    style="margin-left: -4px; width: 60px;">A</span><span
                                                    style="width: 90px;">1990-01-01</span><span
                                                    style="width: 55px;">31</span><span style="width: 60px;">26</span>

                                                <span
                                                    style="margin-left: -5px; width: 70px;">4</span><span
                                                    style="width: 65px;">1</span><span
                                                    style="width: 65px;">2</span><span style="width: 95px;">1</span>

                                                <span
                                                    style="margin-left: -5px; width: 110px;">25</span><span
                                                    style="width: 60px;">0</span><span
                                                    style="width: 130px;">31</span><span
                                                    style="width: 90px;">42750</span>

                                                <span
                                                    style="margin-left: -4px; width: 90px;">2000</span><span
                                                    style="width: 60px;">2000</span><span
                                                    style="width: 90px;">2000</span><span
                                                    style="width: 60px;">2000</span>

                                                <span
                                                    style="margin-left: -4px; width: 80px;">1000</span><span
                                                    style="width: 60px;">1000</span><span
                                                    style="width: 100px;">1000</span><span
                                                    style="width: 60px;">1000</span>

                                                <span
                                                    style="margin-left: -4px; width: 110px;">3000</span><span>3000</span><span
                                                    style="width: 120px;">3000</span><span
                                                    style="width: 50px;">3000</span>

                                                 <span
                                                     style="margin-left: -4px; width: 70px;">5000</span><span
                                                    style="width: 60px;">5000</span><span
                                                    style="width: 55px;">5000</span><span
                                                    style="width: 120px;">5000</span>

                                                 <span
                                                     style="margin-left: -4px; width: 125px;">4000</span><span
                                                    style="width: 101px;">4000</span><span
                                                    style="width: 50px;">4000</span><span
                                                    style="width: 60px;">4000</span>
                                            </div>
                                            <div class="trow">
                                                <span
                                                    style="width: 250px;">Rashid Binte Salman</span><span>IT Officer</span><span>IT</span><span
                                                    style="width: 60px;">Evening</span>

                                                <span
                                                    style="margin-left: -4px; width: 60px;">A</span><span
                                                    style="width: 90px;">1990-01-01</span><span
                                                    style="width: 55px;">31</span><span style="width: 60px;">26</span>

                                                <span
                                                    style="margin-left: -5px; width: 70px;">4</span><span
                                                    style="width: 65px;">1</span><span
                                                    style="width: 65px;">2</span><span style="width: 95px;">1</span>

                                                <span
                                                    style="margin-left: -5px; width: 110px;">25</span><span
                                                    style="width: 60px;">0</span><span
                                                    style="width: 130px;">31</span><span
                                                    style="width: 90px;">42750</span>

                                                <span
                                                    style="margin-left: -4px; width: 90px;">2000</span><span
                                                    style="width: 60px;">2000</span><span
                                                    style="width: 90px;">2000</span><span
                                                    style="width: 60px;">2000</span>

                                                <span
                                                    style="margin-left: -4px; width: 80px;">1000</span><span
                                                    style="width: 60px;">1000</span><span
                                                    style="width: 100px;">1000</span><span
                                                    style="width: 60px;">1000</span>

                                                <span
                                                    style="margin-left: -4px; width: 110px;">3000</span><span>3000</span><span
                                                    style="width: 120px;">3000</span><span
                                                    style="width: 50px;">3000</span>

                                                 <span
                                                     style="margin-left: -4px; width: 70px;">5000</span><span
                                                    style="width: 60px;">5000</span><span
                                                    style="width: 55px;">5000</span><span
                                                    style="width: 120px;">5000</span>

                                                 <span
                                                     style="margin-left: -4px; width: 125px;">4000</span><span
                                                    style="width: 101px;">4000</span><span
                                                    style="width: 50px;">4000</span><span
                                                    style="width: 60px;">4000</span>
                                            </div>
                                            <div class="trow">
                                                <span
                                                    style="width: 250px;">Rashid Binte Salman</span><span>IT Officer</span><span>IT</span><span
                                                    style="width: 60px;">Evening</span>

                                                <span
                                                    style="margin-left: -4px; width: 60px;">A</span><span
                                                    style="width: 90px;">1990-01-01</span><span
                                                    style="width: 55px;">31</span><span style="width: 60px;">26</span>

                                                <span
                                                    style="margin-left: -5px; width: 70px;">4</span><span
                                                    style="width: 65px;">1</span><span
                                                    style="width: 65px;">2</span><span style="width: 95px;">1</span>

                                                <span
                                                    style="margin-left: -5px; width: 110px;">25</span><span
                                                    style="width: 60px;">0</span><span
                                                    style="width: 130px;">31</span><span
                                                    style="width: 90px;">42750</span>

                                                <span
                                                    style="margin-left: -4px; width: 90px;">2000</span><span
                                                    style="width: 60px;">2000</span><span
                                                    style="width: 90px;">2000</span><span
                                                    style="width: 60px;">2000</span>

                                                <span
                                                    style="margin-left: -4px; width: 80px;">1000</span><span
                                                    style="width: 60px;">1000</span><span
                                                    style="width: 100px;">1000</span><span
                                                    style="width: 60px;">1000</span>

                                                <span
                                                    style="margin-left: -4px; width: 110px;">3000</span><span>3000</span><span
                                                    style="width: 120px;">3000</span><span
                                                    style="width: 50px;">3000</span>

                                                 <span
                                                     style="margin-left: -4px; width: 70px;">5000</span><span
                                                    style="width: 60px;">5000</span><span
                                                    style="width: 55px;">5000</span><span
                                                    style="width: 120px;">5000</span>

                                                 <span
                                                     style="margin-left: -4px; width: 125px;">4000</span><span
                                                    style="width: 101px;">4000</span><span
                                                    style="width: 50px;">4000</span><span
                                                    style="width: 60px;">4000</span>
                                            </div>
                                            <div class="trow">
                                                <span
                                                    style="width: 250px;">Rashid Binte Salman</span><span>IT Officer</span><span>IT</span><span
                                                    style="width: 60px;">Evening</span>

                                                <span
                                                    style="margin-left: -4px; width: 60px;">A</span><span
                                                    style="width: 90px;">1990-01-01</span><span
                                                    style="width: 55px;">31</span><span style="width: 60px;">26</span>

                                                <span
                                                    style="margin-left: -5px; width: 70px;">4</span><span
                                                    style="width: 65px;">1</span><span
                                                    style="width: 65px;">2</span><span style="width: 95px;">1</span>

                                                <span
                                                    style="margin-left: -5px; width: 110px;">25</span><span
                                                    style="width: 60px;">0</span><span
                                                    style="width: 130px;">31</span><span
                                                    style="width: 90px;">42750</span>

                                                <span
                                                    style="margin-left: -4px; width: 90px;">2000</span><span
                                                    style="width: 60px;">2000</span><span
                                                    style="width: 90px;">2000</span><span
                                                    style="width: 60px;">2000</span>

                                                <span
                                                    style="margin-left: -4px; width: 80px;">1000</span><span
                                                    style="width: 60px;">1000</span><span
                                                    style="width: 100px;">1000</span><span
                                                    style="width: 60px;">1000</span>

                                                <span
                                                    style="margin-left: -4px; width: 110px;">3000</span><span>3000</span><span
                                                    style="width: 120px;">3000</span><span
                                                    style="width: 50px;">3000</span>

                                                 <span
                                                     style="margin-left: -4px; width: 70px;">5000</span><span
                                                    style="width: 60px;">5000</span><span
                                                    style="width: 55px;">5000</span><span
                                                    style="width: 120px;">5000</span>

                                                 <span
                                                     style="margin-left: -4px; width: 125px;">4000</span><span
                                                    style="width: 101px;">4000</span><span
                                                    style="width: 50px;">4000</span><span
                                                    style="width: 60px;">4000</span>
                                            </div>
                                            <div class="trow">
                                                <span
                                                    style="width: 250px;">Rashid Binte Salman</span><span>IT Officer</span><span>IT</span><span
                                                    style="width: 60px;">Evening</span>

                                                <span
                                                    style="margin-left: -4px; width: 60px;">A</span><span
                                                    style="width: 90px;">1990-01-01</span><span
                                                    style="width: 55px;">31</span><span style="width: 60px;">26</span>

                                                <span
                                                    style="margin-left: -5px; width: 70px;">4</span><span
                                                    style="width: 65px;">1</span><span
                                                    style="width: 65px;">2</span><span style="width: 95px;">1</span>

                                                <span
                                                    style="margin-left: -5px; width: 110px;">25</span><span
                                                    style="width: 60px;">0</span><span
                                                    style="width: 130px;">31</span><span
                                                    style="width: 90px;">42750</span>

                                                <span
                                                    style="margin-left: -4px; width: 90px;">2000</span><span
                                                    style="width: 60px;">2000</span><span
                                                    style="width: 90px;">2000</span><span
                                                    style="width: 60px;">2000</span>

                                                <span
                                                    style="margin-left: -4px; width: 80px;">1000</span><span
                                                    style="width: 60px;">1000</span><span
                                                    style="width: 100px;">1000</span><span
                                                    style="width: 60px;">1000</span>

                                                <span
                                                    style="margin-left: -4px; width: 110px;">3000</span><span>3000</span><span
                                                    style="width: 120px;">3000</span><span
                                                    style="width: 50px;">3000</span>

                                                 <span
                                                     style="margin-left: -4px; width: 70px;">5000</span><span
                                                    style="width: 60px;">5000</span><span
                                                    style="width: 55px;">5000</span><span
                                                    style="width: 120px;">5000</span>

                                                 <span
                                                     style="margin-left: -4px; width: 125px;">4000</span><span
                                                    style="width: 101px;">4000</span><span
                                                    style="width: 50px;">4000</span><span
                                                    style="width: 60px;">4000</span>
                                            </div>
                                            <div class="trow">
                                                <span
                                                    style="width: 250px;">Rashid Binte Salman</span><span>IT Officer</span><span>IT</span><span
                                                    style="width: 60px;">Evening</span>

                                                <span
                                                    style="margin-left: -4px; width: 60px;">A</span><span
                                                    style="width: 90px;">1990-01-01</span><span
                                                    style="width: 55px;">31</span><span style="width: 60px;">26</span>

                                                <span
                                                    style="margin-left: -5px; width: 70px;">4</span><span
                                                    style="width: 65px;">1</span><span
                                                    style="width: 65px;">2</span><span style="width: 95px;">1</span>

                                                <span
                                                    style="margin-left: -5px; width: 110px;">25</span><span
                                                    style="width: 60px;">0</span><span
                                                    style="width: 130px;">31</span><span
                                                    style="width: 90px;">42750</span>

                                                <span
                                                    style="margin-left: -4px; width: 90px;">2000</span><span
                                                    style="width: 60px;">2000</span><span
                                                    style="width: 90px;">2000</span><span
                                                    style="width: 60px;">2000</span>

                                                <span
                                                    style="margin-left: -4px; width: 80px;">1000</span><span
                                                    style="width: 60px;">1000</span><span
                                                    style="width: 100px;">1000</span><span
                                                    style="width: 60px;">1000</span>

                                                <span
                                                    style="margin-left: -4px; width: 110px;">3000</span><span>3000</span><span
                                                    style="width: 120px;">3000</span><span
                                                    style="width: 50px;">3000</span>

                                                 <span
                                                     style="margin-left: -4px; width: 70px;">5000</span><span
                                                    style="width: 60px;">5000</span><span
                                                    style="width: 55px;">5000</span><span
                                                    style="width: 120px;">5000</span>

                                                 <span
                                                     style="margin-left: -4px; width: 125px;">4000</span><span
                                                    style="width: 101px;">4000</span><span
                                                    style="width: 50px;">4000</span><span
                                                    style="width: 60px;">4000</span>
                                            </div>
                                            <div class="trow">
                                                <span
                                                    style="width: 250px;">Rashid Binte Salman</span><span>IT Officer</span><span>IT</span><span
                                                    style="width: 60px;">Evening</span>

                                                <span
                                                    style="margin-left: -4px; width: 60px;">A</span><span
                                                    style="width: 90px;">1990-01-01</span><span
                                                    style="width: 55px;">31</span><span style="width: 60px;">26</span>

                                                <span
                                                    style="margin-left: -5px; width: 70px;">4</span><span
                                                    style="width: 65px;">1</span><span
                                                    style="width: 65px;">2</span><span style="width: 95px;">1</span>

                                                <span
                                                    style="margin-left: -5px; width: 110px;">25</span><span
                                                    style="width: 60px;">0</span><span
                                                    style="width: 130px;">31</span><span
                                                    style="width: 90px;">42750</span>

                                                <span
                                                    style="margin-left: -4px; width: 90px;">2000</span><span
                                                    style="width: 60px;">2000</span><span
                                                    style="width: 90px;">2000</span><span
                                                    style="width: 60px;">2000</span>

                                                <span
                                                    style="margin-left: -4px; width: 80px;">1000</span><span
                                                    style="width: 60px;">1000</span><span
                                                    style="width: 100px;">1000</span><span
                                                    style="width: 60px;">1000</span>

                                                <span
                                                    style="margin-left: -4px; width: 110px;">3000</span><span>3000</span><span
                                                    style="width: 120px;">3000</span><span
                                                    style="width: 50px;">3000</span>

                                                 <span
                                                     style="margin-left: -4px; width: 70px;">5000</span><span
                                                    style="width: 60px;">5000</span><span
                                                    style="width: 55px;">5000</span><span
                                                    style="width: 120px;">5000</span>

                                                 <span
                                                     style="margin-left: -4px; width: 125px;">4000</span><span
                                                    style="width: 101px;">4000</span><span
                                                    style="width: 50px;">4000</span><span
                                                    style="width: 60px;">4000</span>
                                            </div>
                                            <div class="trow">
                                                <span
                                                    style="width: 250px;">Rashid Binte Salman</span><span>IT Officer</span><span>IT</span><span
                                                    style="width: 60px;">Evening</span>

                                                <span
                                                    style="margin-left: -4px; width: 60px;">A</span><span
                                                    style="width: 90px;">1990-01-01</span><span
                                                    style="width: 55px;">31</span><span style="width: 60px;">26</span>

                                                <span
                                                    style="margin-left: -5px; width: 70px;">4</span><span
                                                    style="width: 65px;">1</span><span
                                                    style="width: 65px;">2</span><span style="width: 95px;">1</span>

                                                <span
                                                    style="margin-left: -5px; width: 110px;">25</span><span
                                                    style="width: 60px;">0</span><span
                                                    style="width: 130px;">31</span><span
                                                    style="width: 90px;">42750</span>

                                                <span
                                                    style="margin-left: -4px; width: 90px;">2000</span><span
                                                    style="width: 60px;">2000</span><span
                                                    style="width: 90px;">2000</span><span
                                                    style="width: 60px;">2000</span>

                                                <span
                                                    style="margin-left: -4px; width: 80px;">1000</span><span
                                                    style="width: 60px;">1000</span><span
                                                    style="width: 100px;">1000</span><span
                                                    style="width: 60px;">1000</span>

                                                <span
                                                    style="margin-left: -4px; width: 110px;">3000</span><span>3000</span><span
                                                    style="width: 120px;">3000</span><span
                                                    style="width: 50px;">3000</span>

                                                 <span
                                                     style="margin-left: -4px; width: 70px;">5000</span><span
                                                    style="width: 60px;">5000</span><span
                                                    style="width: 55px;">5000</span><span
                                                    style="width: 120px;">5000</span>

                                                 <span
                                                     style="margin-left: -4px; width: 125px;">4000</span><span
                                                    style="width: 101px;">4000</span><span
                                                    style="width: 50px;">4000</span><span
                                                    style="width: 60px;">4000</span>
                                            </div>
                                            <div class="trow">
                                                <span
                                                    style="width: 250px;">Rashid Binte Salman</span><span>IT Officer</span><span>IT</span><span
                                                    style="width: 60px;">Evening</span>

                                                <span
                                                    style="margin-left: -4px; width: 60px;">A</span><span
                                                    style="width: 90px;">1990-01-01</span><span
                                                    style="width: 55px;">31</span><span style="width: 60px;">26</span>

                                                <span
                                                    style="margin-left: -5px; width: 70px;">4</span><span
                                                    style="width: 65px;">1</span><span
                                                    style="width: 65px;">2</span><span style="width: 95px;">1</span>

                                                <span
                                                    style="margin-left: -5px; width: 110px;">25</span><span
                                                    style="width: 60px;">0</span><span
                                                    style="width: 130px;">31</span><span
                                                    style="width: 90px;">42750</span>

                                                <span
                                                    style="margin-left: -4px; width: 90px;">2000</span><span
                                                    style="width: 60px;">2000</span><span
                                                    style="width: 90px;">2000</span><span
                                                    style="width: 60px;">2000</span>

                                                <span
                                                    style="margin-left: -4px; width: 80px;">1000</span><span
                                                    style="width: 60px;">1000</span><span
                                                    style="width: 100px;">1000</span><span
                                                    style="width: 60px;">1000</span>

                                                <span
                                                    style="margin-left: -4px; width: 110px;">3000</span><span>3000</span><span
                                                    style="width: 120px;">3000</span><span
                                                    style="width: 50px;">3000</span>

                                                 <span
                                                     style="margin-left: -4px; width: 70px;">5000</span><span
                                                    style="width: 60px;">5000</span><span
                                                    style="width: 55px;">5000</span><span
                                                    style="width: 120px;">5000</span>

                                                 <span
                                                     style="margin-left: -4px; width: 125px;">4000</span><span
                                                    style="width: 101px;">4000</span><span
                                                    style="width: 50px;">4000</span><span
                                                    style="width: 60px;">4000</span>
                                            </div>
                                            <div class="trow">
                                                <span
                                                    style="width: 250px;">Rashid Binte Salman</span><span>IT Officer</span><span>IT</span><span
                                                    style="width: 60px;">Evening</span>

                                                <span
                                                    style="margin-left: -4px; width: 60px;">A</span><span
                                                    style="width: 90px;">1990-01-01</span><span
                                                    style="width: 55px;">31</span><span style="width: 60px;">26</span>

                                                <span
                                                    style="margin-left: -5px; width: 70px;">4</span><span
                                                    style="width: 65px;">1</span><span
                                                    style="width: 65px;">2</span><span style="width: 95px;">1</span>

                                                <span
                                                    style="margin-left: -5px; width: 110px;">25</span><span
                                                    style="width: 60px;">0</span><span
                                                    style="width: 130px;">31</span><span
                                                    style="width: 90px;">42750</span>

                                                <span
                                                    style="margin-left: -4px; width: 90px;">2000</span><span
                                                    style="width: 60px;">2000</span><span
                                                    style="width: 90px;">2000</span><span
                                                    style="width: 60px;">2000</span>

                                                <span
                                                    style="margin-left: -4px; width: 80px;">1000</span><span
                                                    style="width: 60px;">1000</span><span
                                                    style="width: 100px;">1000</span><span
                                                    style="width: 60px;">1000</span>

                                                <span
                                                    style="margin-left: -4px; width: 110px;">3000</span><span>3000</span><span
                                                    style="width: 120px;">3000</span><span
                                                    style="width: 50px;">3000</span>

                                                 <span
                                                     style="margin-left: -4px; width: 70px;">5000</span><span
                                                    style="width: 60px;">5000</span><span
                                                    style="width: 55px;">5000</span><span
                                                    style="width: 120px;">5000</span>

                                                 <span
                                                     style="margin-left: -4px; width: 125px;">4000</span><span
                                                    style="width: 101px;">4000</span><span
                                                    style="width: 50px;">4000</span><span
                                                    style="width: 60px;">4000</span>
                                            </div>
                                            <div class="trow">
                                                <span
                                                    style="width: 250px;">Rashid Binte Salman</span><span>IT Officer</span><span>IT</span><span
                                                    style="width: 60px;">Evening</span>

                                                <span
                                                    style="margin-left: -4px; width: 60px;">A</span><span
                                                    style="width: 90px;">1990-01-01</span><span
                                                    style="width: 55px;">31</span><span style="width: 60px;">26</span>

                                                <span
                                                    style="margin-left: -5px; width: 70px;">4</span><span
                                                    style="width: 65px;">1</span><span
                                                    style="width: 65px;">2</span><span style="width: 95px;">1</span>

                                                <span
                                                    style="margin-left: -5px; width: 110px;">25</span><span
                                                    style="width: 60px;">0</span><span
                                                    style="width: 130px;">31</span><span
                                                    style="width: 90px;">42750</span>

                                                <span
                                                    style="margin-left: -4px; width: 90px;">2000</span><span
                                                    style="width: 60px;">2000</span><span
                                                    style="width: 90px;">2000</span><span
                                                    style="width: 60px;">2000</span>

                                                <span
                                                    style="margin-left: -4px; width: 80px;">1000</span><span
                                                    style="width: 60px;">1000</span><span
                                                    style="width: 100px;">1000</span><span
                                                    style="width: 60px;">1000</span>

                                                <span
                                                    style="margin-left: -4px; width: 110px;">3000</span><span>3000</span><span
                                                    style="width: 120px;">3000</span><span
                                                    style="width: 50px;">3000</span>

                                                 <span
                                                     style="margin-left: -4px; width: 70px;">5000</span><span
                                                    style="width: 60px;">5000</span><span
                                                    style="width: 55px;">5000</span><span
                                                    style="width: 120px;">5000</span>

                                                 <span
                                                     style="margin-left: -4px; width: 125px;">4000</span><span
                                                    style="width: 101px;">4000</span><span
                                                    style="width: 50px;">4000</span><span
                                                    style="width: 60px;">4000</span>
                                            </div>
                                            <div class="trow">
                                                <span
                                                    style="width: 250px;">Rashid Binte Salman</span><span>IT Officer</span><span>IT</span><span
                                                    style="width: 60px;">Evening</span>

                                                <span
                                                    style="margin-left: -4px; width: 60px;">A</span><span
                                                    style="width: 90px;">1990-01-01</span><span
                                                    style="width: 55px;">31</span><span style="width: 60px;">26</span>

                                                <span
                                                    style="margin-left: -5px; width: 70px;">4</span><span
                                                    style="width: 65px;">1</span><span
                                                    style="width: 65px;">2</span><span style="width: 95px;">1</span>

                                                <span
                                                    style="margin-left: -5px; width: 110px;">25</span><span
                                                    style="width: 60px;">0</span><span
                                                    style="width: 130px;">31</span><span
                                                    style="width: 90px;">42750</span>

                                                <span
                                                    style="margin-left: -4px; width: 90px;">2000</span><span
                                                    style="width: 60px;">2000</span><span
                                                    style="width: 90px;">2000</span><span
                                                    style="width: 60px;">2000</span>

                                                <span
                                                    style="margin-left: -4px; width: 80px;">1000</span><span
                                                    style="width: 60px;">1000</span><span
                                                    style="width: 100px;">1000</span><span
                                                    style="width: 60px;">1000</span>

                                                <span
                                                    style="margin-left: -4px; width: 110px;">3000</span><span>3000</span><span
                                                    style="width: 120px;">3000</span><span
                                                    style="width: 50px;">3000</span>

                                                 <span
                                                     style="margin-left: -4px; width: 70px;">5000</span><span
                                                    style="width: 60px;">5000</span><span
                                                    style="width: 55px;">5000</span><span
                                                    style="width: 120px;">5000</span>

                                                 <span
                                                     style="margin-left: -4px; width: 125px;">4000</span><span
                                                    style="width: 101px;">4000</span><span
                                                    style="width: 50px;">4000</span><span
                                                    style="width: 60px;">4000</span>
                                            </div>
                                            <div class="trow">
                                                <span
                                                    style="width: 250px;">Rashid Binte Salman</span><span>IT Officer</span><span>IT</span><span
                                                    style="width: 60px;">Evening</span>

                                                <span
                                                    style="margin-left: -4px; width: 60px;">A</span><span
                                                    style="width: 90px;">1990-01-01</span><span
                                                    style="width: 55px;">31</span><span style="width: 60px;">26</span>

                                                <span
                                                    style="margin-left: -5px; width: 70px;">4</span><span
                                                    style="width: 65px;">1</span><span
                                                    style="width: 65px;">2</span><span style="width: 95px;">1</span>

                                                <span
                                                    style="margin-left: -5px; width: 110px;">25</span><span
                                                    style="width: 60px;">0</span><span
                                                    style="width: 130px;">31</span><span
                                                    style="width: 90px;">42750</span>

                                                <span
                                                    style="margin-left: -4px; width: 90px;">2000</span><span
                                                    style="width: 60px;">2000</span><span
                                                    style="width: 90px;">2000</span><span
                                                    style="width: 60px;">2000</span>

                                                <span
                                                    style="margin-left: -4px; width: 80px;">1000</span><span
                                                    style="width: 60px;">1000</span><span
                                                    style="width: 100px;">1000</span><span
                                                    style="width: 60px;">1000</span>

                                                <span
                                                    style="margin-left: -4px; width: 110px;">3000</span><span>3000</span><span
                                                    style="width: 120px;">3000</span><span
                                                    style="width: 50px;">3000</span>

                                                 <span
                                                     style="margin-left: -4px; width: 70px;">5000</span><span
                                                    style="width: 60px;">5000</span><span
                                                    style="width: 55px;">5000</span><span
                                                    style="width: 120px;">5000</span>

                                                 <span
                                                     style="margin-left: -4px; width: 125px;">4000</span><span
                                                    style="width: 101px;">4000</span><span
                                                    style="width: 50px;">4000</span><span
                                                    style="width: 60px;">4000</span>
                                            </div>
                                            <div class="trow">
                                                <span
                                                    style="width: 250px;">Rashid Binte Salman</span><span>IT Officer</span><span>IT</span><span
                                                    style="width: 60px;">Evening</span>

                                                <span
                                                    style="margin-left: -4px; width: 60px;">A</span><span
                                                    style="width: 90px;">1990-01-01</span><span
                                                    style="width: 55px;">31</span><span style="width: 60px;">26</span>

                                                <span
                                                    style="margin-left: -5px; width: 70px;">4</span><span
                                                    style="width: 65px;">1</span><span
                                                    style="width: 65px;">2</span><span style="width: 95px;">1</span>

                                                <span
                                                    style="margin-left: -5px; width: 110px;">25</span><span
                                                    style="width: 60px;">0</span><span
                                                    style="width: 130px;">31</span><span
                                                    style="width: 90px;">42750</span>

                                                <span
                                                    style="margin-left: -4px; width: 90px;">2000</span><span
                                                    style="width: 60px;">2000</span><span
                                                    style="width: 90px;">2000</span><span
                                                    style="width: 60px;">2000</span>

                                                <span
                                                    style="margin-left: -4px; width: 80px;">1000</span><span
                                                    style="width: 60px;">1000</span><span
                                                    style="width: 100px;">1000</span><span
                                                    style="width: 60px;">1000</span>

                                                <span
                                                    style="margin-left: -4px; width: 110px;">3000</span><span>3000</span><span
                                                    style="width: 120px;">3000</span><span
                                                    style="width: 50px;">3000</span>

                                                 <span
                                                     style="margin-left: -4px; width: 70px;">5000</span><span
                                                    style="width: 60px;">5000</span><span
                                                    style="width: 55px;">5000</span><span
                                                    style="width: 120px;">5000</span>

                                                 <span
                                                     style="margin-left: -4px; width: 125px;">4000</span><span
                                                    style="width: 101px;">4000</span><span
                                                    style="width: 50px;">4000</span><span
                                                    style="width: 60px;">4000</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
    function add_create_salary() {
        $.ajax({
            type: "POST",
            url: '<?php echo base_url() ?>hr/create_salary/load_add_create_salary_from',
            success: function (result) {
                if (result) {
                    $('#load_from').html(result);
                    $('#load_title').html("Add create_salary Info");
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
    function update_create_salary($id) {
        $.ajax({
            type: "POST",
            url: '<?php echo base_url() ?>hr/create_salary/load_update_create_salary_from/' + $id,
            success: function (result) {
                if (result) {
                    $('#load_from').html(result);
                    $('#load_title').html("Update create_salary Info");
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
    onload = function () {
        var fcBody = document.querySelector(".fix-column > .tbody"),
            rcBody = document.querySelector(".rest-columns > .tbody"),
            rcHead = document.querySelector(".rest-columns > .thead");
        rcBody.addEventListener("scroll", function () {
            fcBody.scrollTop = this.scrollTop;
            rcHead.scrollLeft = this.scrollLeft;
        }, {passive: true});
    };
</script>


