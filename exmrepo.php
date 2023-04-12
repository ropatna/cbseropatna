<?php

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
if( $_SESSION["cat"] == "ab" || $_SESSION["cat"] == "exam" || $_SESSION["cat"] == "admin"){
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
<style>
    div.content {
        margin-top: -480px;
        margin-left: 220px;
        padding: 1px 16px;
        height: auto;
    }

    .navbar-form {
        border-radius: 8px;
    }
    table td {
    font-size: 1rem;
    font-weight: 600;
}
    table th{
        font-size: 1.3rem;
        font-weight: 800;
        background-color: grey;
    }
</style>
<div class="content" id="prn">
    <form action="index.php?exmrepo" id="frm" method="POST" class="navbar-form navbar-left navbar-inverse" style="width:100%;padding:5px;">
        <span class="text-light bg-dark"> Filter On : </span>
        <select name="dcssearch" id="dcssearch" class="dropdown">
            <option disabled selected> -Select- </option>
            <option value="date" <?php if($dcssearch=="date") { echo "selected"; } ?>>Exam Date</option>
            <option value="cen_no" <?php if($dcssearch=="cen_no") { echo "selected"; } ?>>Centre No.</option>
            <option value="sub" <?php if($dcssearch=="sub") { echo "selected"; } ?>>Subject</option>
            <option value="csch_no" <?php if($dcssearch=="csch_no") { echo "selected"; } ?>>Centre's School No.</option>
            <option value="cdistt" <?php if($dcssearch=="cdistt") { echo "selected"; } ?>>Centre's District</option>
            <option disabled>---------------------------</option>
            <option value="all" <?php if($dcssearch=="all") { echo "selected"; } ?>>Show All Records</option>
        </select>
        <label class="text-light bg-dark"> Year : </label>
        <select name="dcsyear" id="dcsyear" class="dropdown">
            <option disabled selected> -Select Year- </option>
            <option value="2019" <?php if($dcsyear=="2019") { echo "selected"; } ?>> 2019 </option>
            <option value="2020" <?php if($dcsyear=="2020") { echo "selected"; } ?>> 2020 </option>
            <option value="2022" <?php if($dcsyear=="2022") { echo "selected"; } ?>> 2022 </option>
            <option value="2023" <?php if($dcsyear=="2023") { echo "selected"; } ?>> 2023 </option>
        </select>
        <label class="text-light bg-dark">Exam Type : </label>
        <select name="examtype" id="examtype" class="dropdown">
            <option disabled selected> -Select Exam Type- </option>
            <option value="m" <?php if($examtype=="m") { echo "selected"; } ?> selected> Main </option>
            <option value="c" <?php if($examtype=="c") { echo "selected"; } ?>> Compart </option>
        </select>
        <div class="input-group">
            <input type="text" name="dcstext" placeholder="Enter" value="<?php echo "$dcstext"; ?>" class="form-control">
            <div class="input-group-btn">
                <button class="btn aqua-gradient" type="submit" name="dcsfind" style="height:34px;margin-top:0px;">
                    <i class="glyphicon glyphicon-search"></i>
                </button>
            </div>
        </div>
    </form>
    <?php if(isset($_POST['dcsfind'])){ ?>
    <span style="float:left;margin-top:0px;color:red;"> <b>No of Unique Centres:
            <?php
    $row_cen_count = mysqli_fetch_array(mysqli_query($conn,$cen_count));
    $cencounter = $row_cen_count['COUNT(distinct cen_no)'];
    echo "$cencounter"; ?>
        </b> </span>
    <span style="float:right;margin-top:0px;color:red"> <b>Total Records :
            <?php
    $row_tot_count = mysqli_fetch_array(mysqli_query($conn,$tot_count));
    $totcounter = $row_tot_count['COUNT(*)'];
    echo "$totcounter"; ?>
        </b> </span>
         <input class="btn blue-gradient animated slideInLeft" type="button" onclick="printDiv('prn')" value="Print!" style="font-size:12px;padding:5px">
    <div class="table">
        <table class="table table-striped table-hover table-responsive" id="dcs">
            <thead>
                <tr>
                    <th>Centre No</th>
                    <th>Subject</th>
                    <th>Subject Name</th>
                    <th>Exam Date</th>
                    <th>Class</th>
                    <th>No of Candidates</th>
                    <th>Centre's School Name <br> Centre's District</th>
                    <th>CS Name</th>
                    <th>CS Contact</th>
                </tr>
            </thead>
            <tbody>
               <?php } ?>
                <?php
                            if(isset($_POST['dcsfind'])){
                            if (!$dcs) {
                                die("Connection failed: " . mysqli_connect_error());
                            } else {
                            while($row = mysqli_fetch_array($dcs)){
                                 $cen_no = $row['cen_no'];
                                 $csch_no = $row['csch_no'];
                                 $sub = $row['sub'];
                                 $subname = $row['subname'];
                                 $date = $row['date'];
                                 $class = $row['class'];
                                 $cnt = $row['cnt'];
                                 $csname = $row['csname'];
                                 $csmobile = $row['csmobile'];
                                 $cabbrname = $row['cabbrname'];
                                 $cdistt = $row['cdistt'];
                                 $td=date("d.m.Y");
                            ?>
                <tr <?php if($date==$td){echo "style='color:red;'";} ?>>
                    <td><?php echo "$cen_no"; ?><br> <<?php echo "$csch_no"; ?>></td>
                    <td><?php echo "$sub"; ?></td>
                    <td><?php echo "$subname"; ?></td>
                    <td><?php echo "$date"; ?></td>
                    <td><?php echo "$class"; ?></td>
                    <td><?php echo "$cnt"; ?></td>
                    <td><?php echo "$cabbrname"; ?><br><b><?php echo "$cdistt"; ?></b></td>
                    <td><?php echo "$csname"; ?></td>
                    <td><?php echo "$csmobile"; ?></td>
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
        exit();
    }?>
