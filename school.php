<?php

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
if(( $_SESSION["cat"] == "admin")||( $_SESSION["cat"] == "ab")||( $_SESSION["cat"] == "rti")||( $_SESSION["cat"] == "exam")){
?>
<script>
        function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
    </script>

<div class="content" id="prn">
    <form action="index.php?school" id="frm" method="POST" class="navbar-form navbar-left navbar-inverse" style="width:100%;padding:5px;">
        <span class="text-light bg-dark"> Filter On : </span>
        <select name="searchfor" id="search_in" class="dropdown">
            <option disabled selected> -Select- </option>
            <option value="sch_no" <?php if($search_in=="sch_no") { echo "selected"; } ?>>School No.</option>
            <option value="affno" <?php if($search_in=="affno") { echo "selected"; } ?>>Affiliation No.</option>
            <option value="distt" <?php if($search_in=="distt") { echo "selected"; } ?>>District</option>
            <option value="state" <?php if($search_in=="state") { echo "selected"; } ?>>State</option>
            <option value="add" <?php if($search_in=="add") { echo "selected"; } ?>>School Name</option>
            <option value="pin" <?php if($search_in=="pin") { echo "selected"; } ?>>School Pin</option>
            <option value="status" <?php if($search_in=="status") { echo "selected"; } ?>>Status (Sec./Sr. Sec.)</option>
            <option disabled>---------------------------</option>
            <option value="all" <?php if($search_in=="all") { echo "selected"; } ?>>Show All Schools</option>
        </select>
        <div class="input-group">
            <input type="text" name="searchtext" placeholder="Enter" value="<?php echo "$searchtext"; ?>" class="form-control">
            <div class="input-group-btn">
                <button class="btn aqua-gradient" type="submit" name="schoolsearch" style="height:34px;margin-top:0px;">
                    <i class="glyphicon glyphicon-search"></i>
                </button>
            </div>
        </div>
    </form>
    <?php if(isset($_POST['schoolsearch'])){ ?>
    <span style="float:left;margin-top:0px;color:red;"> <b>Schools Found:
            <?php
    $row_sch_count = mysqli_fetch_array(mysqli_query($conn,$sch_count));
    $schcounter = $row_sch_count['COUNT(sch_no)'];
    echo "$schcounter"; ?>
        </b> </span>
    <span style="float:right;margin-top:0px;color:red"> <b>Updated On :
            <?php
    $upd_date = $row_update['upd_date'];
    echo date('d-m-Y', strtotime($upd_date)); ?>
        </b> </span>
         <input class="btn blue-gradient animated slideInLeft" type="button" onclick="printDiv('prn')" value="Print!" style="font-size:12px;padding:5px">
    <div class="table">
        <table class="table table-hover table-responsive table-sm" id="sch">
            <thead>
                <tr>
                    <th>School No</th>
                    <th>affno</th>
                    <th>School Name and Address</th>
                    <th>District / State</th>
                    <th>Principal Name</th>
                    <th>Principal Mobile</th>
                    <th>Email</th>
                    <th>School Type</th>
                    <th>Status (Sec./Sr. Sec.)</th>
                </tr>
            </thead>
            <tbody>
               <?php } ?>
                <?php
                            if(isset($_POST['schoolsearch'])){
                            if (!$result) {
                                die("Connection failed: " . mysqli_connect_error());
                            } else {
                            while($row = mysqli_fetch_array($result)){
                                 $sch_no = $row['sch_no'];
                                 $affno = $row['affno'];
                                 $prname = $row['prname'];
                                 $email = $row['email'];
                                 $pmobile = $row['pmobile'];
                                 $st = $row['status'];
                                 $schtype = $row['schtype'];
                                 $distt = $row['distt'];
                                 $state = $row['state'];
                                 $add1 = $row['add1'];
                                 $add2 = $row['add2'];
                                 $add3 = $row['add3'];
                                 $add4 = $row['add4'];
                                 $add5 = $row['add5'];
                                 $pin = $row['pin'];
                                 if($st=="2"){
                                    $status="SEC.";
                                 }
                                 if($st=="3"){
                                    $status="SR. SEC.";
                                 }
                            ?>
                <tr>
                    <td><?php echo "$sch_no"; ?></td>
                    <td><?php echo "$affno"; ?></td>
                    <td><?php echo $add1; ?><br><?php echo $add2; ?><br><?php echo $add3; ?><br><?php echo $add4; ?>, <?php echo $add5; ?>-<?php echo $pin; ?></td>
                    <td><?php echo "$distt"; ?><br><?php echo "$state"; ?></td>
                    <td><?php echo "$prname"; ?></td>
                    <td><?php echo "$pmobile"; ?></td>
                    <td><?php echo "$email"; ?><br><?php echo $sch_no."@cbseshiksha.in"; ?></td>
                    <td><?php echo "$schtype"; ?></td>
                    <td><?php echo "$status"; ?></td>
                </tr>
                <?php
                                }
                                }
                                }
                            ?>
            </tbody>
        </table>
    </div>

</div>
<?php }else{
        header("location: noaccess.php");
    }?>
