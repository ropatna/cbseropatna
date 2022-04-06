<?php

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
if(( $_SESSION["cat"] == "admin")||( $_SESSION["cat"] == "ab")){
?>
<?php
$statyear ="";
$statexamtype ="";
if(isset($_POST['statsearch'])){
$statyear = $_POST['statyear'];
$statexamtype = $_POST['statexamtype'];
    /* center */
$row_bs20 = mysqli_fetch_array(mysqli_query($conn,"SELECT COUNT(*) FROM  center".$statyear.$statexamtype." WHERE (sch_no=cen_sch_no) AND censchstat='BR'"));
$bs20 = $row_bs20['COUNT(*)'];
$row_bns20 = mysqli_fetch_array(mysqli_query($conn,"SELECT   COUNT(DISTINCT cen_no) FROM center".$statyear.$statexamtype." WHERE cen_no NOT IN ( SELECT cen_no FROM center".$statyear.$statexamtype." WHERE cen_sch_no=sch_no) AND censchstat=\"BR\""));
$bns20 = $row_bns20['COUNT(DISTINCT cen_no)'];

$row_js20 = mysqli_fetch_array(mysqli_query($conn,"SELECT COUNT(*) FROM  center".$statyear.$statexamtype." WHERE (sch_no=cen_sch_no) AND censchstat='JH'"));
$js20 = $row_js20['COUNT(*)'];
$row_jns20 = mysqli_fetch_array(mysqli_query($conn,"SELECT   COUNT(DISTINCT cen_no) FROM center".$statyear.$statexamtype." WHERE cen_no NOT IN ( SELECT cen_no FROM center".$statyear.$statexamtype." WHERE cen_sch_no=sch_no) AND censchstat=\"JH\""));
$jns20 = $row_jns20['COUNT(DISTINCT cen_no)'];

$row_bsjnv20 = mysqli_fetch_array(mysqli_query($conn,"SELECT  COUNT(censchtype) FROM  center".$statyear.$statexamtype." WHERE remark='SELF CENTRE' AND censchtype='J' AND `censchstat`='BR'"));
$bsjnv20 = $row_bsjnv20['COUNT(censchtype)'];
$row_bskv20 = mysqli_fetch_array(mysqli_query($conn,"SELECT  COUNT(censchtype) FROM  center".$statyear.$statexamtype." WHERE remark='SELF CENTRE' AND censchtype='K' AND `censchstat`='BR'"));
$bskv20 = $row_bskv20['COUNT(censchtype)'];
$row_bsind20 = mysqli_fetch_array(mysqli_query($conn,"SELECT  COUNT(censchtype) FROM  center".$statyear.$statexamtype." WHERE remark='SELF CENTRE' AND censchtype='I' AND `censchstat`='BR'"));
$bsind20 = $row_bsind20['COUNT(censchtype)'];
$row_bsgov20 = mysqli_fetch_array(mysqli_query($conn,"SELECT  COUNT(censchtype) FROM  center".$statyear.$statexamtype." WHERE remark='SELF CENTRE' AND censchtype='G' AND `censchstat`='BR'"));
$bsgov20 = $row_bsgov20['COUNT(censchtype)'];

$row_jsjnv20 = mysqli_fetch_array(mysqli_query($conn,"SELECT  COUNT(censchtype) FROM  center".$statyear.$statexamtype." WHERE remark='SELF CENTRE' AND censchtype='J' AND `censchstat`='JH'"));
$jsjnv20 = $row_jsjnv20['COUNT(censchtype)'];
$row_jskv20 = mysqli_fetch_array(mysqli_query($conn,"SELECT  COUNT(censchtype) FROM  center".$statyear.$statexamtype." WHERE remark='SELF CENTRE' AND censchtype='K' AND `censchstat`='JH'"));
$jskv20 = $row_jskv20['COUNT(censchtype)'];
$row_jsind20 = mysqli_fetch_array(mysqli_query($conn,"SELECT  COUNT(censchtype) FROM  center".$statyear.$statexamtype." WHERE remark='SELF CENTRE' AND censchtype='I' AND `censchstat`='JH'"));
$jsind20 = $row_jsind20['COUNT(censchtype)'];
$row_jsgov20 = mysqli_fetch_array(mysqli_query($conn,"SELECT  COUNT(censchtype) FROM  center".$statyear.$statexamtype." WHERE remark='SELF CENTRE' AND censchtype='G' AND `censchstat`='JH'"));
$jsgov20 = $row_jsgov20['COUNT(censchtype)'];

$row_bnsjnv20 = mysqli_fetch_array(mysqli_query($conn,"SELECT   COUNT(DISTINCT cen_no) FROM center".$statyear.$statexamtype." WHERE cen_no NOT IN ( SELECT cen_no FROM center".$statyear.$statexamtype." WHERE cen_sch_no=sch_no) AND censchstat=\"BR\" AND censchtype = 'J'"));
$bnsjnv20 = $row_bnsjnv20['COUNT(DISTINCT cen_no)'];
$row_bnskv20 = mysqli_fetch_array(mysqli_query($conn,"SELECT   COUNT(DISTINCT cen_no) FROM center".$statyear.$statexamtype." WHERE cen_no NOT IN ( SELECT cen_no FROM center".$statyear.$statexamtype." WHERE cen_sch_no=sch_no) AND censchstat=\"BR\" AND censchtype = 'K'"));
$bnskv20 = $row_bnskv20['COUNT(DISTINCT cen_no)'];
$row_bnsind20 = mysqli_fetch_array(mysqli_query($conn,"SELECT   COUNT(DISTINCT cen_no) FROM center".$statyear.$statexamtype." WHERE cen_no NOT IN ( SELECT cen_no FROM center".$statyear.$statexamtype." WHERE cen_sch_no=sch_no) AND censchstat=\"BR\" AND censchtype = 'I'"));
$bnsind20 = $row_bnsind20['COUNT(DISTINCT cen_no)'];
$row_bnsgov20 = mysqli_fetch_array(mysqli_query($conn,"SELECT   COUNT(DISTINCT cen_no) FROM center".$statyear.$statexamtype." WHERE cen_no NOT IN ( SELECT cen_no FROM center".$statyear.$statexamtype." WHERE cen_sch_no=sch_no) AND censchstat=\"BR\" AND censchtype = 'G'"));
$bnsgov20 = $row_bnsgov20['COUNT(DISTINCT cen_no)'];

$row_jnsjnv20 = mysqli_fetch_array(mysqli_query($conn,"SELECT   COUNT(DISTINCT cen_no) FROM center".$statyear.$statexamtype." WHERE cen_no NOT IN ( SELECT cen_no FROM center".$statyear.$statexamtype." WHERE cen_sch_no=sch_no) AND censchstat=\"JH\" AND censchtype = 'J'"));
$jnsjnv20 = $row_jnsjnv20['COUNT(DISTINCT cen_no)'];
$row_jnskv20 = mysqli_fetch_array(mysqli_query($conn,"SELECT   COUNT(DISTINCT cen_no) FROM center".$statyear.$statexamtype." WHERE cen_no NOT IN ( SELECT cen_no FROM center".$statyear.$statexamtype." WHERE cen_sch_no=sch_no) AND censchstat=\"JH\" AND censchtype = 'K'"));
$jnskv20 = $row_jnskv20['COUNT(DISTINCT cen_no)'];
$row_jnsind20 = mysqli_fetch_array(mysqli_query($conn,"SELECT   COUNT(DISTINCT cen_no) FROM center".$statyear.$statexamtype." WHERE cen_no NOT IN ( SELECT cen_no FROM center".$statyear.$statexamtype." WHERE cen_sch_no=sch_no) AND censchstat=\"JH\" AND censchtype = 'I'"));
$jnsind20 = $row_jnsind20['COUNT(DISTINCT cen_no)'];
$row_jnsgov20 = mysqli_fetch_array(mysqli_query($conn,"SELECT   COUNT(DISTINCT cen_no) FROM center".$statyear.$statexamtype." WHERE cen_no NOT IN ( SELECT cen_no FROM center".$statyear.$statexamtype." WHERE cen_sch_no=sch_no) AND censchstat=\"JH\" AND censchtype = 'G'"));
$jnsgov20 = $row_jnsgov20['COUNT(DISTINCT cen_no)'];
    /* school */
$row_bjnv = mysqli_fetch_array(mysqli_query($conn,"SELECT COUNT(*) FROM schoolmaster".$statyear." WHERE state='BR' AND schtype='J'"));
$bjnv = $row_bjnv['COUNT(*)'];
$row_bkv = mysqli_fetch_array(mysqli_query($conn,"SELECT COUNT(*) FROM schoolmaster".$statyear." WHERE state='BR' AND schtype='K'"));
$bkv = $row_bkv['COUNT(*)'];
$row_bind = mysqli_fetch_array(mysqli_query($conn,"SELECT COUNT(*) FROM schoolmaster".$statyear." WHERE state='BR' AND schtype='I'"));
$bind = $row_bind['COUNT(*)'];
$row_bgov = mysqli_fetch_array(mysqli_query($conn,"SELECT COUNT(*) FROM schoolmaster".$statyear." WHERE state='BR' AND schtype='G'"));
$bgov = $row_bgov['COUNT(*)'];

$row_jjnv = mysqli_fetch_array(mysqli_query($conn,"SELECT COUNT(*) FROM schoolmaster".$statyear." WHERE state='JH' AND schtype='J'"));
$jjnv = $row_jjnv['COUNT(*)'];
$row_jkv = mysqli_fetch_array(mysqli_query($conn,"SELECT COUNT(*) FROM schoolmaster".$statyear." WHERE state='JH' AND schtype='K'"));
$jkv = $row_jkv['COUNT(*)'];
$row_jind = mysqli_fetch_array(mysqli_query($conn,"SELECT COUNT(*) FROM schoolmaster".$statyear." WHERE state='JH' AND schtype='I'"));
$jind = $row_jind['COUNT(*)'];
$row_jgov = mysqli_fetch_array(mysqli_query($conn,"SELECT COUNT(*) FROM schoolmaster".$statyear." WHERE state='JH' AND schtype='G'"));
$jgov = $row_jgov['COUNT(*)'];
    /* no of candidates */
$row_pxii = mysqli_fetch_array(mysqli_query($conn,"SELECT COUNT(*) FROM rxii".$statyear.$statexamtype." WHERE sch='99999'"));
$pxii = $row_pxii['COUNT(*)'];
$row_rxii = mysqli_fetch_array(mysqli_query($conn,"SELECT COUNT(*) FROM rxii".$statyear.$statexamtype." WHERE sch<>'99999'"));
$rxii = $row_rxii['COUNT(*)'];
$row_px = mysqli_fetch_array(mysqli_query($conn,"SELECT COUNT(*) FROM rx".$statyear.$statexamtype." WHERE sch='99999'"));
$px = $row_px['COUNT(*)'];
$row_rx = mysqli_fetch_array(mysqli_query($conn,"SELECT COUNT(*) FROM rx".$statyear.$statexamtype." WHERE sch<>'99999'"));
$rx = $row_rx['COUNT(*)'];
  /* loc */
$sql2 = "select xii201920.sch_no from xii201920,schoolmaster2020 WHERE xii201920.sch_no=schoolmaster2020.sch_no AND schoolmaster2020.state=\"JH\" AND schoolmaster2020.schtype=\"K\" union select x201920.sch_no from x201920,schoolmaster2020 WHERE x201920.sch_no=schoolmaster2020.sch_no AND schoolmaster2020.state=\"JH\" AND schoolmaster2020.schtype=\"K\"";
$result2 = mysqli_query ($conn, $sql2);
$jh_k = mysqli_num_rows($result2);

$sql3 = "select xii201920.sch_no from xii201920,schoolmaster2020 WHERE xii201920.sch_no=schoolmaster2020.sch_no AND schoolmaster2020.state=\"JH\" AND schoolmaster2020.schtype=\"J\" union select x201920.sch_no from x201920,schoolmaster2020 WHERE x201920.sch_no=schoolmaster2020.sch_no AND schoolmaster2020.state=\"JH\" AND schoolmaster2020.schtype=\"J\"";
$result3 = mysqli_query ($conn, $sql3);
$jh_j = mysqli_num_rows($result3);

$sql4 = "select xii201920.sch_no from xii201920,schoolmaster2020 WHERE xii201920.sch_no=schoolmaster2020.sch_no AND schoolmaster2020.state=\"JH\" AND schoolmaster2020.schtype=\"I\" union select x201920.sch_no from x201920,schoolmaster2020 WHERE x201920.sch_no=schoolmaster2020.sch_no AND schoolmaster2020.state=\"JH\" AND schoolmaster2020.schtype=\"I\"";
$result4 = mysqli_query ($conn, $sql4);
$jh_i = mysqli_num_rows($result4);


$sql5 = "select xii201920.sch_no from xii201920,schoolmaster2020 WHERE xii201920.sch_no=schoolmaster2020.sch_no AND schoolmaster2020.state=\"JH\" AND schoolmaster2020.schtype=\"G\" union select x201920.sch_no from x201920,schoolmaster2020 WHERE x201920.sch_no=schoolmaster2020.sch_no AND schoolmaster2020.state=\"JH\" AND schoolmaster2020.schtype=\"G\"";
$result5 = mysqli_query ($conn, $sql5);
$jh_g = mysqli_num_rows($result5);

$sql6 = "select xii201920.sch_no from xii201920,schoolmaster2020 WHERE xii201920.sch_no=schoolmaster2020.sch_no AND schoolmaster2020.state=\"BR\" AND schoolmaster2020.schtype=\"J\" union select x201920.sch_no from x201920,schoolmaster2020 WHERE x201920.sch_no=schoolmaster2020.sch_no AND schoolmaster2020.state=\"BR\" AND schoolmaster2020.schtype=\"J\"";
$result6 = mysqli_query ($conn, $sql6);
$br_j  = mysqli_num_rows($result6);


$sql7 = "select xii201920.sch_no from xii201920,schoolmaster2020 WHERE xii201920.sch_no=schoolmaster2020.sch_no AND schoolmaster2020.state=\"BR\" AND schoolmaster2020.schtype=\"K\" union select x201920.sch_no from x201920,schoolmaster2020 WHERE x201920.sch_no=schoolmaster2020.sch_no AND schoolmaster2020.state=\"BR\" AND schoolmaster2020.schtype=\"K\"";
$result7 = mysqli_query ($conn, $sql7);
$br_k  = mysqli_num_rows($result7);

$sql8 = "select xii201920.sch_no from xii201920,schoolmaster2020 WHERE xii201920.sch_no=schoolmaster2020.sch_no AND schoolmaster2020.state=\"BR\" AND schoolmaster2020.schtype=\"I\" union select x201920.sch_no from x201920,schoolmaster2020 WHERE x201920.sch_no=schoolmaster2020.sch_no AND schoolmaster2020.state=\"BR\" AND schoolmaster2020.schtype=\"I\"";
$result8 = mysqli_query ($conn, $sql8);
$br_i  = mysqli_num_rows($result8);

$sql9 = "select xii201920.sch_no from xii201920,schoolmaster2020 WHERE xii201920.sch_no=schoolmaster2020.sch_no AND schoolmaster2020.state=\"BR\" AND schoolmaster2020.schtype=\"G\" union select x201920.sch_no from x201920,schoolmaster2020 WHERE x201920.sch_no=schoolmaster2020.sch_no AND schoolmaster2020.state=\"BR\" AND schoolmaster2020.schtype=\"G\"";
$result9 = mysqli_query ($conn, $sql9);
$br_g  = mysqli_num_rows($result9);

$row_hexb = mysqli_fetch_array(mysqli_query($conn,"SELECT COUNT(*) FROM `he2020m` WHERE heclass=\"10\" AND hestate=\"BR\""));
$hexb = $row_hexb['COUNT(*)'];

$row_hexj = mysqli_fetch_array(mysqli_query($conn,"SELECT COUNT(*) FROM `he2020m` WHERE heclass=\"10\" AND hestate=\"JH\""));
$hexj = $row_hexj['COUNT(*)'];

$row_hexiib = mysqli_fetch_array(mysqli_query($conn,"SELECT COUNT(*) FROM `he2020m` WHERE heclass=\"12\" AND hestate=\"BR\""));
$hexiib = $row_hexiib['COUNT(*)'];

$row_hexiij = mysqli_fetch_array(mysqli_query($conn,"SELECT COUNT(*) FROM `he2020m` WHERE heclass=\"12\" AND hestate=\"JH\""));
$hexiij = $row_hexiij['COUNT(*)'];
}
?>
<style>
div.content {
    margin-top: -480px;
    margin-left: 220px;
    padding: 1px 16px;
    height: auto;
}
    .navbar-form{
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
    <form action="index.php?stats" method="POST" class="navbar-form navbar-left navbar-inverse" style="width:100%;padding:5px;">
        <label class="text-light bg-dark"> Year : </label>
        <select name="statyear" class="dropdown">
            <option disabled selected> -Select Year- </option>
            <option value="2019" <?php if($statyear=="2019") { echo "selected"; } ?>> 2019 </option>
            <option value="2020" <?php if($statyear=="2020") { echo "selected"; } ?>> 2020 </option>
        </select>
        <label class="text-light bg-dark">Exam Type : </label>
        <select name="statexamtype" class="dropdown">
            <option disabled selected> -Select Exam Type- </option>
            <option value="m" <?php if($statexamtype=="m") { echo "selected"; } ?> selected> Main </option>
            <option value="c" <?php if($statexamtype=="c") { echo "selected"; } ?>> Compart </option>
        </select>
        <div class="input-group">
            <!--<input type="text" name="stattext" placeholder="Enter" value="" class="form-control" disabled>-->
            <div class="input-group-btn">
                <button class="btn btn-default" type="submit" name="statsearch" style="height:34px;margin-top:1px;margin-left:-5px;">
                    <i class="glyphicon glyphicon-search"></i>
                </button>
            </div>
        </div>
    </form>
    <?php if(isset($_POST['statsearch'])){  ?>


    <div style=" background-color:#1b1b1b; margin: 150px 0px 50px 0px; height: 50px; width: 100%;">
        <p style="color : white;font-style: italic;font-size: 28px;font-family: century, serif;text-align:center;"> SCHOOL WISE STATISTICS </p>
    </div>
    <table class="table table-bordered" style="font-size:16px;">
        <tr>
            <th rowspan="2">State</th>
            <th colspan="5" style="text-align:center;"> School Type </th>
        </tr>
        <tr>
            <th>JNV</th>
            <th>KV</th>
            <th>PVT</th>
            <th>GOVT.</th>
            <th>TOTAL</th>
        </tr>
        <tr>
            <td>Bihar</td>
            <td> <?php echo $bjnv; ?> </td>
            <td> <?php echo $bkv; ?> </td>
            <td> <?php echo $bind; ?> </td>
            <td> <?php echo $bgov; ?> </td>
            <td> <?php echo $bjnv+$bkv+$bind+$bgov; ?> </td>
        </tr>
        <tr>
            <td>Jharkhand</td>
            <td> <?php echo $jjnv; ?> </td>
            <td> <?php echo $jkv; ?> </td>
            <td> <?php echo $jind; ?> </td>
            <td> <?php echo $jgov; ?> </td>
            <td> <?php echo $jjnv+$jkv+$jind+$jgov; ?> </td>
        </tr>
        <tr>
            <td>Region<br>Total</td>
            <td> <?php echo $bjnv+$jjnv; ?> </td>
            <td> <?php echo $bkv+$jkv; ?> </td>
            <td> <?php echo $bind+$jind; ?> </td>
            <td> <?php echo $bgov+$jgov; ?> </td>
            <td> <?php echo $bjnv+$bkv+$bind+$bgov+$jjnv+$jkv+$jind+$jgov; ?> </td>
        </tr>
    </table>

    <div style=" background-color:#1b1b1b; margin: 80px 0px 75px 0px; height: 50px; width: 100%;">
        <p style="color : white;font-style: italic;font-size: 28px;font-family: century, serif;text-align:center;"> CENTRE WISE STATISTICS </p>
    </div>
    <ul>
        <li>
            <h4>State Wise number of Centers:</h4>
        </li> <br>
        <table class="table table-bordered" style="font-size:16px;">
            <tr>
                <th rowspan="2">State</th>
                <th colspan="3" style="text-align:center;"><?php echo $statyear; ?></th>

            </tr>
            <tr>

                <th>Self<br>centers</th>
                <th>Non-self<br>centers</th>
                <th>Total</th>

            </tr>
            <tr>
                <td>Bihar</td>

                <td>
                    <?php echo "$bs20";?>
                </td>
                <td>
                    <?php echo $bns20; ?>
                </td>
                <td>
                    <?php echo $bs20+$bns20; ?>
                </td>

            </tr>
            <tr>
                <td>Jharkhand</td>

                <td>
                    <?php echo "$js20"; ?>
                </td>
                <td>
                    <?php echo $jns20; ?>
                </td>
                <td>
                    <?php echo $js20+$jns20; ?>
                </td>

            </tr>
        </table>
        <hr>
        <h4>
            <li> State wise and Category wise no of Examination centers made as self centers :</li>
        </h4> <br>
        <table class="table table-bordered" style="font-size:16px;">
            <tr>
                <th rowspan="2">State</th>

                <th colspan="5" style="text-align:center;"><?php echo $statyear; ?></th>

            </tr>
            <tr>

                <th>JNV</th>
                <th>KV</th>
                <th>PVT</th>
                <th>Govt.</th>
                <th>Total</th>

            </tr>
            <tr>
                <td>Bihar</td>

                <td> <?php echo $bsjnv20; ?> </td>
                <td> <?php echo $bskv20; ?> </td>
                <td> <?php echo $bsind20; ?> </td>
                <td> <?php echo $bsgov20; ?> </td>
                <td> <?php echo $bsjnv20+$bskv20+$bsind20+$bsgov20; ?> </td>

            </tr>
            <tr>
                <td>Jharkhand</td>

                <td> <?php echo $jsjnv20; ?> </td>
                <td> <?php echo $jskv20; ?> </td>
                <td> <?php echo $jsind20; ?> </td>
                <td> <?php echo $jsgov20; ?> </td>
                <td> <?php echo $jsjnv20+$jskv20+$jsind20+$jsgov20; ?> </td>

            </tr>
        </table>
        <hr>
        <h4>
            <li> State wise and Category wise no of Examination centers made as Non-self centers :</li>
        </h4> <br>
        <table class="table table-bordered" style="font-size:16px;">
            <tr>
                <th rowspan="2">State</th>

                <th colspan="5" style="text-align:center;"><?php echo $statyear; ?></th>

            </tr>
            <tr>

                <th>JNV</th>
                <th>KV</th>
                <th>PVT</th>
                <th>Govt.</th>
                <th>Total</th>

            </tr>
            <tr>
                <td>Bihar</td>

                <td>
                    <?php echo $bnsjnv20; ?>
                </td>
                <td>
                    <?php echo $bnskv20; ?>
                </td>
                <td>
                    <?php echo $bnsind20; ?>
                </td>
                <td>
                    <?php echo $bnsgov20; ?>
                </td>
                <td>
                    <?php echo $bnsjnv20+$bnskv20+$bnsind20+$bnsgov20; ?>
                </td>

            </tr>
            <tr>
                <td>Jharkhand</td>

                <td>
                    <?php echo $jnsjnv20; ?>
                </td>
                <td>
                    <?php echo $jnskv20; ?>
                </td>
                <td>
                    <?php echo $jnsind20; ?>
                </td>
                <td>
                    <?php echo $jnsgov20; ?>
                </td>
                <td>
                    <?php echo $jnsjnv20+$jnskv20+$jnsind20+$jnsgov20; ?>
                </td>

            </tr>
        </table>
    </ul>
    <?php

?>
    <div style=" background-color:#1b1b1b; margin: 50px 0px 50px 0px; height: 50px; width: 100%;">

        <p style="color : white;font-style: italic;font-size: 28px;font-family: century, serif;text-align:center;"> SCHOOL WISE STATISTICS ( appearing for exam) </p>
    </div>
    <table class="table table-bordered" style="font-size:16px;">
        <tr>
            <th rowspan="2">STATE</th>
            <th colspan="5" style="text-align:center;"><?php echo $statyear; ?></th>
        </tr>
        <tr>
            <td>JNV</td>
            <td>KV</td>
            <td>PVT.</td>
            <td>GOVT.</td>
            <td>TOTAL</td>
        </tr>
        <tr>
            <td>Bihar</td>
            <td><?php echo $br_j; ?></td>
            <td><?php echo $br_k; ?></td>
            <td><?php echo $br_i; ?></td>
            <td><?php echo $br_g; ?></td>
            <td> <?php echo $br_g+$br_i+$br_k+ $br_j; ?></td>
        </tr>
        <tr>
            <td>Jharkhand</td>
            <td><?php echo $jh_j; ?></td>
            <td><?php echo $jh_k; ?></td>
            <td><?php echo $jh_i; ?></td>
            <td><?php echo $jh_g; ?></td>
            <td><?php echo $jh_g+$jh_i+$jh_j+$jh_k; ?></td>
        </tr>
        <tr>
            <td>Region<br>Total</td>
            <td><?php echo $jh_j+$br_j; ?></td>
            <td><?php echo $jh_k+$br_k; ?></td>
            <td><?php echo $jh_i+$br_i; ?></td>
            <td><?php echo $jh_g+$br_g; ?></td>
            <td><?php echo $br_g+$br_i+$br_k+ $br_j+$jh_g+$jh_i+$jh_j+$jh_k; ?></td>
        </tr>
    </table>

    <div style=" background-color:#1b1b1b; margin: 50px 0px 50px 0px; height: 50px; width: 100%;">
        <p style="color : white;font-style: italic;font-size: 28px;font-family: century, serif;text-align:center;"> NUMBER OF CANDIDATES STATISTICS </p>
    </div>
    <table class="table table-bordered" style="font-size:16px;">
        <tr>
            <th colspan="3">No. of candidates, <?php echo $statyear; ?> (Class X)</th>
            <th colspan="3">No. of candidates, <?php echo $statyear; ?> (Class XII)</th>
        </tr>
        <tr>
            <td>Regular</td>
            <td>Private</td>
            <td>Total</td>
            <td>Regular</td>
            <td>Private</td>
            <td>Total</td>
        </tr>
        <tr>
            <td> <?php echo $rx; ?> </td>
            <td> <?php echo $px; ?> </td>
            <td> <?php echo $rx+$px; ?> </td>
            <td> <?php echo $rxii; ?> </td>
            <td> <?php echo $pxii; ?> </td>
            <td> <?php echo $rxii+$pxii; ?> </td>
        </tr>
    </table>
    <div style=" background-color:#1b1b1b; margin: 50px 0px 50px 0px; height: 50px; width: 100%;">
        <p style="color : white;font-style: italic;font-size: 28px;font-family: century, serif;text-align:center;"> HE's STATISTICS </p>
    </div>
    <table class="table table-bordered" style="font-size:16px;">
        <tr>
            <th style="text-align:center;">State</th>
            <th>No of HE's in <?php echo $statyear; ?> (Class X)</th>
            <th>No of HE's in <?php echo $statyear; ?> (Class XII)</th>
            <th>Total</th>
        </tr>
        <tr>
            <td>Bihar</td>
            <td> <?php echo $hexb; ?> </td>
            <td> <?php echo $hexiib; ?> </td>
            <td>  <?php echo $hexb+$hexiib; ?>  </td>
        </tr>
        <tr>
            <td>Jharkhand</td>
            <td> <?php echo $hexj; ?> </td>
            <td> <?php echo $hexiij; ?> </td>
            <td> <?php echo $hexj+$hexiij; ?> </td>
        </tr>
        <tr>
            <td>Total</td>
            <td> <?php echo $hexb+$hexj; ?> </td>
            <td> <?php echo $hexiib+$hexiij; ?> </td>
            <td> <?php echo $hexb+$hexiib+$hexj+$hexiij; ?> </td>
        </tr>
    </table>
    <?php } ?>
</div>
<?php }else{
        header("location: noaccess.php");
    }?>
