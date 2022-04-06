<?php

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
if(( $_SESSION["cat"] == "admin")||( $_SESSION["cat"] == "ab")){
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

    <form action="index.php?he" method="POST" class="navbar-form navbar-left navbar-inverse" style="width:100%;padding:5px;">
        <span class="text-light bg-dark"> Filter On : </span>
        <select name="searchhe" id="hesearch_in" class="dropdown">
            <option disabled selected> -Select- </option>
            <option value="uid" <?php if($hesearch_in=="uid") { echo "selected"; } ?>> Uid </option>
            <option value="heno" <?php if($hesearch_in=="heno") { echo "selected"; } ?>> Heno </option>
            <option value="cnssch_no" <?php if($hesearch_in=="cnssch_no") { echo "selected"; } ?>> CNS sch_no </option>
            <option value="cnsstate" <?php if($hesearch_in=="cnsstate") { echo "selected"; } ?>> CNS state </option>
            <option value="cnsdist" <?php if($hesearch_in=="cnsdist") { echo "selected"; } ?>> CNS district </option>
            <option disabled>---------------------------</option>
            <option value="all" <?php if($hesearch_in=="all") { echo "selected"; } ?>>Show All HE's</option>
            <option value="class10" <?php if($hesearch_in=="class10") { echo "selected"; } ?>>Show HE's of heclass:10</option>
            <option value="class12" <?php if($hesearch_in=="class12") { echo "selected"; } ?>>Show HE's of heclass:12</option>
            <option value="grouphesub" <?php if($hesearch_in=="grouphesub") { echo "selected"; } ?>>Group By hesub</option>
            <option value="grouphedist" <?php if($hesearch_in=="grouphedist") { echo "selected"; } ?>>Group By hedist</option>
        </select>
        <label class="text-light bg-dark"> Year : </label>
        <select name="heyear" class="dropdown">
            <option disabled selected> -Select Year- </option>
            <option value="2019" <?php if($heyear=="2019") { echo "selected"; } ?>> 2019 </option>
            <option value="2020" <?php if($heyear=="2020") { echo "selected"; } ?>> 2020 </option>
        </select>
        <label class="text-light bg-dark">Exam Type : </label>
        <select name="heexamtype" id="rexamtype" class="dropdown">
            <option disabled selected> -Select Exam Type- </option>
            <option value="m" <?php if($heexamtype=="m") { echo "selected"; } ?> selected> Main </option>
            <option value="c" <?php if($heexamtype=="c") { echo "selected"; } ?>> Compart </option>
        </select>
        <div class="input-group">
            <input type="text" name="hetext" placeholder="Enter" value="<?php echo "$hetext"; ?>" class="form-control">
            <div class="input-group-btn">
                <button class="btn btn-default" type="submit" name="hesearch" style="height:34px;margin-top:0px;">
                    <i class="glyphicon glyphicon-search"></i>
                </button>
            </div>
        </div>
    </form>
    <?php if(isset($_POST['hesearch'])){?>
       <?php if($hesearch_in=="grouphesub"){ $sum10=0;$sum12=0;?>
        <table class="table table-striped table-sm " style="width:600px;">
        <caption> CLASS 10th </caption>
        <tr>
            <th class="tg-zaje"> heclass </th>
            <th class="tg-zaje"> hesub </th>
            <th class="tg-zaje"> COUNT </th>
        </tr>
        <?php while($row_hesub10 = mysqli_fetch_array($run_hesub10)){
            $heclass = $row_hesub10['heclass'];
            $hesub = $row_hesub10['hesub'];
            $count = $row_hesub10['COUNT(*)'];
            $sum10 += $count;
        ?>
        <tr>
            <td> <?php echo $heclass; ?> </td>
            <td> <?php echo $hesub; ?> </td>
            <td> <?php echo $count; ?> </td>
        </tr>
        <?php } ?>
        <tr>
            <td></td>
            <td><span id="red"><b>Total HE's:</b></span></td>
            <td><span id="red"><b><?php echo $sum10; ?></b></span></td>
        </tr>
        </table>
        <table class="table table-striped table-sm " style="width:600px;">
        <caption> CLASS 12th </caption>
        <tr>
            <th class="tg-zaje"> heclass </th>
            <th class="tg-zaje"> hesub </th>
            <th class="tg-zaje"> COUNT </th>
        </tr>
        <?php while($row_hesub12 = mysqli_fetch_array($run_hesub12)){
            $heclass = $row_hesub12['heclass'];
            $hesub = $row_hesub12['hesub'];
            $count = $row_hesub12['COUNT(*)'];
            $sum12 += $count;
        ?>
        <tr>
            <td> <?php echo $heclass; ?> </td>
            <td> <?php echo $hesub; ?> </td>
            <td> <?php echo $count; ?> </td>
        </tr>
        <?php } ?>
        <tr>
            <td></td>
            <td><span id="red"><b>Total HE's:</b></span></td>
            <td><span id="red"><b><?php echo $sum12; ?></b></span></td>
        </tr>
        </table>
  <?php  }elseif ($hesearch_in=="grouphedist"){ ?>
        <table class="table table-striped table-sm " style="width:600px;">
        <caption> CLASS 10th </caption>
        <tr>
            <th class="tg-zaje"> heclass </th>
            <th class="tg-zaje"> hedist </th>
            <th class="tg-zaje"> COUNT </th>
        </tr>
        <?php while($row_hedist10 = mysqli_fetch_array($run_hedist10)){
            $heclass = $row_hedist10['heclass'];
            $hedist = $row_hedist10['hedist'];
            $count = $row_hedist10['COUNT(*)'];
        ?>
        <tr>
            <td> <?php echo $heclass; ?> </td>
            <td> <?php echo $hedist; ?> </td>
            <td> <?php echo $count; ?> </td>
        </tr>
        <?php } ?>
        </table>
        <table class="table table-striped table-sm " style="width:600px;">
        <caption> CLASS 12th </caption>
        <tr>
            <th class="tg-zaje"> heclass </th>
            <th class="tg-zaje"> hedist </th>
            <th class="tg-zaje"> COUNT </th>
        </tr>
        <?php while($row_hedist12 = mysqli_fetch_array($run_hedist12)){
            $heclass = $row_hedist12['heclass'];
            $hedist = $row_hedist12['hedist'];
            $count = $row_hedist12['COUNT(*)'];
        ?>
        <tr>
            <td> <?php echo $heclass; ?> </td>
            <td> <?php echo $hedist; ?> </td>
            <td> <?php echo $count; ?> </td>
        </tr>
        <?php } ?>
        </table>
  <?php  }else{ ?>
    <span style="float:left;margin-top:0px;color:red;"> <b> HE's Found: <?php echo "$cnter"; ?> </b> </span>
    <input class="btn blue-gradient animated slideInLeft" type="button" onclick="printDiv('prn')" value="Print!" style="font-size:12px;padding:5px">
    <table class="tg">
        <tr>
            <th class="tg-zaje"> Uid <br> Slno. <br> Heno. <br> Reg.</th>
            <th class="tg-zaje"> HE Details </th>
            <th class="tg-zaje"> Sub_10_1 <br> Sub_10_2 <br> Sub_12_1 <br> Sub_12_2 <br> Qualifications</th>
            <th class="tg-zaje"> Exp_10_1 <br> Exp_10_2 <br> Exp_12_1 <br> Exp_12_2 </th>
            <th class="tg-zaje"> Account no <br> IFSC Code <br> Bank Name <br> PAN no </th>
            <th class="tg-zaje"> Other HE's Details </th>
            <th class="tg-zaje" style="background-color: lightgreen;"> CNSsch_no <br> CNS school name </th>
            <th class="tg-zaje" style="background-color: lightgreen"> CNS Distt <br> CNS state</th>
        </tr>
        <?php while($rowhe = mysqli_fetch_array($runhe)){
            $uid = $rowhe['uid'];
            $slno = $rowhe['slno'];
            $sub = $rowhe['sub'];
            $school = $rowhe['school'];
            $abbr_name = $rowhe['abbr_name'];
            $reg = $rowhe['reg'];
            $sch_no = $rowhe['sch_no'];
            $oldsch_no = $rowhe['oldsch_no'];
            $name = $rowhe['name'];
            $gen = $rowhe['gen'];
            $post = $rowhe['post'];
            $app_nat = $rowhe['app_nat'];
            $yoj = $rowhe['yoj'];
            $acad_qual = $rowhe['acad_qual'];
            $prof_qual = $rowhe['prof_qual'];
            $class = $rowhe['class'];
            $cwsn = $rowhe['cwsn'];
            $comp = $rowhe['comp'];
            $mobile = $rowhe['mobile'];
            $email = $rowhe['email'];
            $sub_10_1 = $rowhe['sub_10_1'];
            $sub_12_1 = $rowhe['sub_12_1'];
            $sub_10_2 = $rowhe['sub_10_2'];
            $sub_12_2 = $rowhe['sub_12_2'];
            $exp_10_1 = $rowhe['exp_10_1'];
            $exp_12_1 = $rowhe['exp_12_1'];
            $exp_10_2 = $rowhe['exp_10_2'];
            $exp_12_2 = $rowhe['exp_12_2'];
            $accountno = $rowhe['accountno'];
            $ifsccode = $rowhe['ifsccode'];
            $appear10 = $rowhe['appear10'];
            $appear12 = $rowhe['appear12'];
            $medium = $rowhe['medium'];
            $bankname = $rowhe['bankname'];
            $panno = $rowhe['panno'];
            $remark = $rowhe['remark'];
            $hedist = $rowhe['hedist'];
            $hestate = $rowhe['hestate'];
            $exp_12_ch = $rowhe['exp_12_ch'];
            $hesub = $rowhe['hesub'];
            $heclass = $rowhe['heclass'];
            $heno = $rowhe['heno'];
            $cnssch_no = $rowhe['cnssch_no'];
            $cnsabbrnam = $rowhe['cnsabbrnam'];
            $cnsdist = $rowhe['cnsdist'];
            $cnsstate = $rowhe['cnsstate'];
        ?>
        <tr>
            <td class="tg-zaje"> <?php echo $uid; ?> <br> <?php echo $slno; ?> <br> <u><?php echo $heno; ?></u> <br> <?php echo $reg; ?><span style="color:red;"> <b>hesub: </b> <br> <?php echo $hesub; ?> </span><br> <?php if($heclass=="10"){ ?><span style="color:red;"><b>heclass: </b> <?php echo $heclass;}else{?></span><span style="color:green;"><b>heclass: </b> <?php echo $heclass;} ?> </span></td>
            <td class="tg-zaje">
                <b><?php echo $name; ?></b> <br>
                <?php echo $sch_no; ?> / <?php echo $oldsch_no; ?> <br>
                <?php echo $abbr_name; ?> <br>
                <b>Gen: </b> <?php echo $gen; ?>&nbsp;&nbsp;&nbsp;
                <b>Post: </b> <?php echo $post; ?> <br>
                <b>Dist: </b> <?php echo $hedist; ?> <br>
                <b>State: </b> <?php echo $hestate; ?> <br>
                <b>Year of Join: </b> <?php echo $yoj; ?> <br>
                <b>EM:</b> <?php echo $email; ?> <br><b>M:</b> <?php echo $mobile; ?>
            </td>
            <td class="tg-zaje">
                <?php echo $sub_10_1; ?> <br> <?php echo $sub_10_2; ?> <br> <?php echo $sub_12_1; ?> <br> <?php echo $sub_12_2; ?> <br><br> <b>Acad. Qual. :</b> <br> <b>Prof. Qual. :</b>
            </td>
            <td class="tg-zaje">
                <?php echo $exp_10_1; ?> <br> <?php echo $exp_10_2; ?> <br> <?php echo $exp_12_1; ?> <br> <?php echo $exp_12_2; ?> <br><br> <?php echo $acad_qual; ?> <br> <?php echo $prof_qual; ?>
            </td>
            <td class="tg-zaje">
                <?php echo $accountno; ?> <br> <?php echo $ifsccode; ?> <br> <?php echo $bankname; ?> <br> <?php echo $panno; ?> <br><br>
                <b>Class: </b> <?php echo $class; ?> <br>
                <b>School: </b> <?php echo $school; ?> <br>
                <b>Sub: </b> <?php echo $sub; ?> &nbsp;&nbsp;&nbsp;
                <b>Medium: </b> <?php echo $medium; ?>
            </td>
            <td class="tg-zaje">
                <b>App_nat: </b> <?php echo $app_nat; ?>&nbsp;&nbsp;&nbsp;
                <b>Cwsn: </b> <?php echo $cwsn; ?> <br>
                <b>Comp: </b> <?php echo $comp; ?> <br>
                <b>Appear10: </b> <?php echo $appear10; ?>&nbsp;&nbsp;&nbsp;
                <b>Appear12: </b> <?php echo $appear12; ?> <br>
                <b>Exp_12_ch: </b> <?php echo $exp_12_ch; ?>
            </td>
            <td class="tg-zaje" style="background-color: lightgreen">
                <span style="color:red;"> <b><?php echo $cnssch_no; ?></b> </span> <br> <?php echo $cnsabbrnam; ?>
            </td>
            <td class="tg-zaje" style="background-color: lightgreen">
                <?php echo $cnsdist; ?> <br> <?php echo $cnsstate; ?>
            </td>
        </tr>
        <?php } ?>
    </table>
    <?php } ?>

 <?php } ?>
</div>
<?php }else{
        header("location: noaccess.php");
    }?>
