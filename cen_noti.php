<?php

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
if(( $_SESSION["cat"] == "admin")){
?>
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
<div class="content">
    <form action="index.php?cen_noti" method="POST" class="navbar-form navbar-left navbar-inverse" style="width:100%;padding:5px;">
        <label class="text-light bg-dark"> Filter On : </label>
        <select name="searchcen" id="ssearch_in" class="dropdown">
            <option disabled selected> -Select- </option>
            <option value="cen_no" <?php if($ssearch_in=="cen_no") { echo "selected"; } ?>>Center No.</option>
            <option value="school" <?php if($ssearch_in=="school") { echo "selected"; } ?>>School No.</option>
            <option value="sabbr_name" <?php if($ssearch_in=="sabbr_name") { echo "selected"; } ?>>School Name</option>
            <option value="cabbr_name" <?php if($ssearch_in=="cabbr_name") { echo "selected"; } ?>>Center Name</option>
            <option value="centdist" <?php if($ssearch_in=="centdist") { echo "selected"; } ?>>Center District</option>
            <option value="schdist" <?php if($ssearch_in=="schdist") { echo "selected"; } ?>>School District</option>
            <option value="censchstat" <?php if($ssearch_in=="censchstat") { echo "selected"; } ?>>Center State</option>
            <option value="schstate" <?php if($ssearch_in=="schstate") { echo "selected"; } ?>>School State</option>
            <option value="censchtype" <?php if($ssearch_in=="censchtype") { echo "selected"; } ?>>Center Type</option>
            <option value="schschtype" <?php if($ssearch_in=="schschtype") { echo "selected"; } ?>>School Type</option>
            <option value="self" <?php if($ssearch_in=="self") { echo "selected"; } ?>>Self Centers</option>
            <option value="private" <?php if($ssearch_in=="private") { echo "selected"; } ?>>Private Candidates</option>
            <option disabled>---------------------------</option>
            <option value="all" <?php if($ssearch_in=="all") { echo "selected"; } ?>>Show All Centers</option>
        </select>
        <label class="text-light bg-dark"> Year : </label>
        <select name="year" id="year" class="dropdown">
            <option disabled selected> -Select Year- </option>
            <option value="2019" <?php if($year=="2019") { echo "selected"; } ?>> 2019 </option>
            <option value="2020" <?php if($year=="2020") { echo "selected"; } ?>> 2020 </option>
            <option value="2022" <?php if($year=="2022") { echo "selected"; } ?>> 2022 </option>
        </select>
        <label class="text-light bg-dark">Exam Type : </label>
        <select name="examtype" id="examtype" class="dropdown">
            <option disabled selected> -Select Exam Type- </option>
            <option value="m" <?php if($examtype=="m") { echo "selected"; } ?> selected> Main </option>
            <option value="c" <?php if($examtype=="c") { echo "selected"; } ?>> Compart </option>
        </select>
        <div class="input-group">
            <input type="text" name="centext" placeholder="Enter" value="<?php echo "$centext"; ?>" class="form-control">
            <div class="input-group-btn">
                <button class="btn btn-success" type="submit" name="censearch" style="height:34px;margin-top:0px;">
                    <i class="glyphicon glyphicon-search"></i>
                </button>
            </div>
        </div>
    </form>
    <?php if(isset($_POST['censearch'])){
    $v = "";?>
    <center>
        <h2>CENTER NOTIFICATION FOR <?php echo "$year"; ?> <?php if($examtype=="m"){echo "MAIN";}if($examtype=="c"){echo "COMPART";} ?> EXAM</h2>
    </center><br><br>
    <span style="float:right;margin-top:-30px;color:red"> <b>Updated On :
            <?php echo "25-08-2022"; ?>
        </b> </span>
    <span style="float:left;margin-top:-30px;color:red;"> <b>Centers Found:
            <?php
    $run_cencount = mysqli_query($conn,$cencount);
    $row_cencount = mysqli_fetch_array($run_cencount);
    $counter = $row_cencount['COUNT(DISTINCT `cen_no`)'];
    echo "$counter"; ?>
        </b> </span>
    <?php
    while($rowcen = mysqli_fetch_array($runcen)){
		$cen_no = $rowcen['cen_no'];
        $ncen_sch_no = $rowcen['csch_no'];
        $sch_no = $rowcen['sch_no'];
		$cabbr_name = $rowcen['cabbr_name'];
		$sabbr_name = $rowcen['abbr_name'];
		$centdist = $rowcen['cdistt'];
		$schdist = $rowcen['distt'];
		$schstate = $rowcen['state'];
		$censchstat = $rowcen['cstate'];
        $noc1020 = $rowcen['noc10'];
		$noc1220 = $rowcen['noc12'];
		$cpr_name = $rowcen['cpr_name'];
		$cpr_mob = $rowcen['cpr_mob'];
		$spr_name = $rowcen['spr_name'];
		$sp_mob = $rowcen['sp_mob'];
		$xroll_f = $rowcen['xroll_f'];
		$xroll_t = $rowcen['xroll_t'];
		$xiiroll_f = $rowcen['xiiroll_f'];
		$xiiroll_t = $rowcen['xiiroll_t'];
        $count = "SELECT SUM(noc10),SUM(noc12),SUM(noc10)+SUM(noc12) FROM center".$year.$examtype." WHERE cen_no='".$cen_no."'";
        $runcount = mysqli_query($conn,$count);
        $rowcount = mysqli_fetch_array($runcount);
        $cnt1020 = $rowcount['SUM(noc10)'];
        $cnt1220 = $rowcount['SUM(noc12)'];
        $tot2020 = $rowcount['SUM(noc10)+SUM(noc12)'];
    ?>
    <center>
        <table>
            <?php
        if ($v!=$cen_no){ ?>
            <tr>
                <th style="background-color: gray; width:150px;text-align:left;"> <?php echo "$censchstat"; ?> </th>
                <th style="background-color: gray; width:150px;text-align:left;"> <?php echo "$cen_no"; ?> <br> <?php echo "$centdist"; ?> </th>
                <th style="background-color: gray; width:150px;text-align:left;"> ( <?php echo "$ncen_sch_no"; ?> ) </th>
                <th style="background-color: gray;width:400px;text-align:left;"> <?php echo "$cabbr_name"; ?> <br> CPR NAME: <?php echo "$cpr_name"; ?> <br> CPR CONTACT: <?php echo "$cpr_mob"; ?> </th>
                <th style="background-color: gray;width:80px;text-align:left;"> X<sup>th</sup> <br> <?php echo "$cnt1020"; ?> <br> Total: </th>
                <th style="background-color: gray;width:80px;text-align:left;"> XII<sup>th</sup> <br> <?php echo "$cnt1220"; ?> <br> <?php echo "$tot2020"; ?> </th>
            </tr>
            <tr>
                <td style=" width:150px;text-align:left;"> <?php echo "$schstate"; ?> </td>
                <td style=" width:150px;text-align:left;"> <?php echo "$schdist"; ?> </td>
                <td style=" width:150px;text-align:left;"> ( <?php echo "$sch_no"; ?> ) </td>
                <td style=" width:700px;text-align:left;"> <?php echo "$sabbr_name"; ?> <br> PR NAME: <?php echo "$spr_name"; ?> <br> PR CONTACT: <?php echo "$sp_mob"; ?> </td>
                <td style=" width:80px;text-align:left;"> <?php echo "$noc1020"; ?> </td>
                <td style=" width:80px;text-align:left;"> <?php echo "$noc1220"; ?> </td>
            </tr>
            <?php $v = $cen_no; } else{?>
            <tr>
                <td style=" width:150px;text-align:left;"> <?php echo "$schstate"; ?> </td>
                <td style=" width:150px;text-align:left;"> <?php echo "$schdist"; ?></td>
                <td style=" width:150px;text-align:left;"> ( <?php echo "$sch_no"; ?> ) </td>
                <td style=" width:700px;text-align:left;"> <?php echo "$sabbr_name"; ?> <br> PR NAME: <?php echo "$spr_name"; ?> <br> PR CONTACT: <?php echo "$sp_mob"; ?> </td>
                <td style=" width:80px;text-align:left;"> <?php echo "$noc1020"; ?> </td>
                <td style=" width:80px;text-align:left;"> <?php echo "$noc1220"; ?> </td>
            </tr>
            <?php } ?>
        </table>
    </center>
    <?php } ?>
    <?php } ?>
</div>
<?php }else{
        header("location: noaccess.php");
        exit();
    }?>
