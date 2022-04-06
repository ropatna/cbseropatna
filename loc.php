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

</style>
<div class="content">
    <form action="index.php?loc" id="frm2" method="POST" class="navbar-form navbar-left navbar-inverse" style="width:100%;padding:5px;">
        <span class="text-light bg-dark"> Session : </span>
        <select name="locsession" id="session_in" class="dropdown">
            <option disabled selected> -Select Session- </option>
            <option value="2018-19" <?php if($session_in=="2018-19") { echo "selected"; } ?>> 2018-19 </option>
            <option value="2019-20" <?php if($session_in=="2019-20") { echo "selected"; } ?>> 2019-20 </option>
            <option value="2020-21" <?php if($session_in=="2020-21") { echo "selected"; } ?>> 2020-21 </option>
        </select>
        <label class="text-light bg-dark">Class : </label>
        <select name="locsearchfor" id="lsearch_in" class="dropdown">
            <option disabled selected> -Select Class- </option>
            <option value="ix" <?php if($lsearch_in=="ix") { echo "selected"; } ?>> 9th </option>
            <option value="x" <?php if($lsearch_in=="x") { echo "selected"; } ?>> 10th </option>
            <option value="xi" <?php if($lsearch_in=="xi") { echo "selected"; } ?>> 11th </option>
            <option value="xii" <?php if($lsearch_in=="xii") { echo "selected"; } ?>> 12th </option>
        </select>
        <label class="text-light bg-dark">School No. : </label>
        <div class="input-group">
            <input type="text" name="locsearchtext" placeholder="School No." value="<?php echo "$locsearchtext"; ?>" class="form-control">
            <div class="input-group-btn">
                <button class="btn btn-default" type="submit" name="locsearch" style="height:34px;margin-top:0px;">
                    <i class="glyphicon glyphicon-search"></i>
                </button>
            </div>
        </div>
    </form>

    <?php if(!isset($_POST['locsearch'])){ ?>
    <div class="info">
        <h2>Select <span id="red">Session</span>, <span id="red">Class</span> with <span id="red">School No.</span></h2>
        <h2> to view the Details of Registered Candidates.</h2>
    </div>
    <?php } ?>

    <div class="tg-wrap">
        <?php  if(isset($_POST['locsearch'])){ ?>
        <span style="float:left;margin-top:0px;color:red;"> <b>Number of Candidates Found:
                <?php
            $row_can_count = mysqli_fetch_array(mysqli_query($conn,$can_count));
            $cancounter = $row_can_count['COUNT(*)'];
            echo "$cancounter"; }?>
            </b> </span>
        <table class="tg">
            <?php
            $abbr_name = "";
            $session = "";
            if(isset($_POST['locsearch'])){
                $query = "SELECT * FROM schoolmaster".substr($session_in,0,2).substr($session_in,5,2)." WHERE sch_no='$locsearchtext'";
                $run = mysqli_query($conn,$query);
                $row = mysqli_fetch_array($run);
                $abbr_name = $row['abbr_name'];
          ?>
            <caption> <b>CBSE REGIONAL OFFICE PATNA FINAL LIST OF CANDIDATES REGISTERED FOR CLASS <?php echo strtoupper("$lsearch_in"); ?> EXAMINATION SESSION <?php echo "$session_in"; ?> <br> SCHOOL - <?php echo "$locsearchtext"; ?> : <?php echo "$abbr_name"; ?> </b> </caption>
            <tr>
                <th class="tg-zaje">SL.NO \<br>SEQ. NO.</th>
                <th class="tg-zaje">CANDIDATE NAME<br>MOTHER NAME<br>FATHER NAME</th>
                <th class="tg-zaje">SEX<br>CAT<br>PwD</th>
                <th class="tg-zaje">SUB</th>
                <th class="tg-zaje">SUBNAME</th>
                <th class="tg-zaje">MED.</th>
                <th class="tg-zaje">INT.<br>SUB</th>
                <th class="tg-zaje"> CANDIDATE <br> PHOTO</th>
            </tr>
            <?php
             }
          ?>
            <?php
                if(isset($_POST['locsearch'])){
                if (!$result) {
                    die("Connection failed: " . mysqli_connect_error());
                } else {
                while($row = mysqli_fetch_array($result)){
                    $sch_no = $row['sch_no'];
                    $serial = $row['serial'];
                    $serialn = sprintf('%05d',$serial);
                    $cname = $row['cname'];
                    $mname = $row['mname'];
                    $fname = $row['fname'];
                    $mobile = $row['mobile'];
                    $email = $row['email'];
                    $aadhar = $row['aadhar'];
                    $iregdno = $row['iregdno'];
                    $sex = $row['sex'];
                    $scst = $row['scst'];
                    $handicap = $row['handicap'];
//                    $session = $row['session'];
                    $sub1 = $row['sub1'];
                    $sub2 = $row['sub2'];
                    $sub3 = $row['sub3'];
                    $sub4 = $row['sub4'];
                    $sub5 = $row['sub5'];
                    $sub6 = $row['sub6'];
                    $sub7 = "";
                    $med1 = "";
                    $med2 = "";
                    $med3 = $row['med3'];
                    $med4 = $row['med4'];
                    $med5 = $row['med5'];
                    $med6 = $row['med6'];
                    $med7 = "";
                    $int_sub_1 = "";
                    $int_sub_2 = "";
                    $int_sub_3 = "";
                    if($lsearch_in=="ix" || $lsearch_in=="x"){
                        $sub7 = $row['sub7'];
                        $med7 = $row['med7'];
                    }
                    if($lsearch_in=="xi" || $lsearch_in=="xii"){
                        $med2 = $row['med2'];
                        $int_sub_1 = $row['int_sub_1'];
                        $int_sub_2 = $row['int_sub_2'];
                        $int_sub_3 = $row['int_sub_3'];
                    }
            ?>
            <tr>
                <td class="tg-zaje"> <?php echo "$serialn"; ?> <br> </td>
                <td class="tg-zaje"> <?php echo "$cname"; ?> <br> <?php echo "$mname"; ?> <br> <?php echo "$fname"; ?> <br> <b>M:</b> <?php echo "$mobile"; ?> <br> <b>EM:</b> <?php echo "$email"; ?> <br> <b>Aadhar No.:</b> <?php echo "$aadhar"; ?> <br> <b>Reg No.:</b> <?php echo "$iregdno"; ?> <br></td>
                <td class="tg-zaje"> <?php echo "$sex"; ?> <br> <?php echo "$scst"; ?> <br> <?php echo "$handicap"; ?> <br> </td>
                <td class="tg-zaje"> <?php echo "$sub1"; ?> <br> <?php echo "$sub2"; ?> <br> <?php echo "$sub3"; ?> <br> <?php echo "$sub4"; ?> <br> <?php echo "$sub5"; ?> <br> <?php echo "$sub6"; ?> <br> <?php echo "$sub7"; ?> <br> </td>
                <td class="tg-zaje">
                    <?php
                $submaster = "sub".$lsearch_in."2019";
                if($sub1!=null){$row_snm1 = mysqli_fetch_array(mysqli_query($conn,"SELECT subname FROM ".$submaster." WHERE sub=".$sub1));$sbname1 = $row_snm1['subname'];}
                if($sub2!=null){$row_snm2 = mysqli_fetch_array(mysqli_query($conn,"SELECT subname FROM ".$submaster." WHERE sub=".$sub2));$sbname2 = $row_snm2['subname'];}
                if($sub3!=null){$row_snm3 = mysqli_fetch_array(mysqli_query($conn,"SELECT subname FROM ".$submaster." WHERE sub=".$sub3));$sbname3 = $row_snm3['subname'];}
                if($sub4!=null){$row_snm4 = mysqli_fetch_array(mysqli_query($conn,"SELECT subname FROM ".$submaster." WHERE sub=".$sub4));$sbname4 = $row_snm4['subname'];}
                if($sub5!=null){$row_snm5 = mysqli_fetch_array(mysqli_query($conn,"SELECT subname FROM ".$submaster." WHERE sub=".$sub5));$sbname5 = $row_snm5['subname'];}
                if($sub6!=null){$row_snm6 = mysqli_fetch_array(mysqli_query($conn,"SELECT subname FROM ".$submaster." WHERE sub=".$sub6));$sbname6 = $row_snm6['subname'];}?>
                    <?php if($sub1!=null){ echo $sbname1;?> <br> <?php } ?>
                    <?php if($sub2!=null){ echo $sbname2;?> <br> <?php } ?>
                    <?php if($sub3!=null){ echo $sbname3;?> <br> <?php } ?>
                    <?php if($sub4!=null){ echo $sbname4;?> <br> <?php } ?>
                    <?php if($sub5!=null){ echo $sbname5;?> <br> <?php } ?>
                    <?php if($sub6!=null){ echo $sbname6;?> <br> <?php } ?>
                </td>
                <td class="tg-zaje"> <?php echo "$med1"; ?> <br> <?php echo "$med2"; ?> <br> <?php echo "$med3"; ?> <br> <?php echo "$med4"; ?> <br> <?php echo "$med5"; ?> <br> <?php echo "$med6"; ?> <br> <?php echo "$med7"; ?> <br> </td>
                <td class="tg-zaje">
                    <?php if($int_sub_1!=null){ echo $int_sub_1;?> <br> <?php } ?>
                    <?php if($int_sub_2!=null){ echo $int_sub_2;?> <br> <?php } ?>
                    <?php if($int_sub_3!=null){ echo $int_sub_3;?> <br> <?php } ?>
                </td>
                <td class="tg-zaje">
                    <center><img src="images/c_photo/<?php echo "$lsearch_in"; ?>/<?php echo "$sch_no"; ?>/<?php echo "$iregdno"; ?>.jpg" alt="c_photo" class="img img-thumbnail" id="c_photo"></center>
                </td>
            </tr>
            <?php
                    }
                    }
                    }
                ?>
        </table>
    </div>
</div>
<?php }else{
        header("location: noaccess.php");
    }?>
