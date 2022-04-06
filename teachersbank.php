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

    <form action="index.php?teachersbank" method="POST" class="navbar-form navbar-left navbar-inverse" style="width:100%;padding:5px;">
        <span class="text-light bg-dark"> Filter On : </span>
        <select name="searchteachersbank" id="teachersbanksearch_in" class="dropdown">
            <option disabled selected> -Select- </option>
            <option value="uid" <?php if($teachersbanksearch_in=="uid") { echo "selected"; } ?>> Uid </option>
            <option value="uid2" <?php if($teachersbanksearch_in=="uid2") { echo "selected"; } ?>> Uid2 </option>
            <option value="sch_no" <?php if($teachersbanksearch_in=="sch_no") { echo "selected"; } ?>> School No. </option>
            <option value="name" <?php if($teachersbanksearch_in=="name") { echo "selected"; } ?>> Teacher's Name </option>
            <option value="post" <?php if($teachersbanksearch_in=="post") { echo "selected"; } ?>> Teacher's Post </option>
            <option disabled>---------------------------</option>
            <option value="all" <?php if($teachersbanksearch_in=="all") { echo "selected"; } ?>>Show All Teachers</option>
        </select>
        <label class="text-light bg-dark"> Year : </label>
        <select name="teachersbankyear" class="dropdown">
            <option disabled selected> -Select Year- </option>
            <option value="2019" <?php if($teachersbankyear=="2019") { echo "selected"; } ?>> 2019 </option>
            <option value="2020" <?php if($teachersbankyear=="2020") { echo "selected"; } ?> > 2020 </option>
            <option value="2021" <?php if($teachersbankyear=="2021") { echo "selected"; } ?> selected> 2021 </option>
        </select>
        <div class="input-group">
            <input type="text" name="teachersbanktext" placeholder="Enter" value="<?php echo "$teachersbanktext"; ?>" class="form-control">
            <div class="input-group-btn">
                <button class="btn aqua-gradient" type="submit" name="teachersbanksearch" style="height:34px;margin-top:0px;">
                    <i class="glyphicon glyphicon-search"></i>
                </button>
            </div>
        </div>
    </form>
    <?php if(isset($_POST['teachersbanksearch'])){ ?>
    <span style="float:left;margin-top:0px;color:red;"> <b> Teachers Found: <?php echo "$cnr"; ?> </b> </span>
    <input class="btn blue-gradient animated slideInLeft" type="button" onclick="printDiv('prn')" value="Print!" />
    <table class="tg">
        <tr>
            <th class="tg-zaje"> Uid <br>  Reg.</th>
            <th class="tg-zaje"> Teachers Details </th>
            <th class="tg-zaje"> Sub_10_1 <br> Sub_10_2 <br> Sub_12_1 <br> Sub_12_2 <br> Qualifications</th>
            <th class="tg-zaje"> Exp_10_1 <br> Exp_10_2 <br> Exp_12_1 <br> Exp_12_2 </th>
            <th class="tg-zaje"> Account no <br> IFSC Code <br> Bank Name <br> PAN no </th>
            <th class="tg-zaje"> Other Details </th>
        </tr>
        <?php while($rowteachersbank = mysqli_fetch_array($runteachersbank)){
            $uid = $rowteachersbank['uid'];
            $reg = $rowteachersbank['reg'];
            $sch_no = $rowteachersbank['sch_no'];
            $oldsch_no = $rowteachersbank['oldsch_no'];
            $name = $rowteachersbank['name'];
            $gen = $rowteachersbank['gen'];
            $cat = $rowteachersbank['cat'];
            $dob = $rowteachersbank['dob'];
            $post = $rowteachersbank['post'];
            $app_nat = $rowteachersbank['app_nat'];
            $yoj = $rowteachersbank['yoj'];
            $acad_qual = $rowteachersbank['acad_qual'];
            $prof_qual = $rowteachersbank['prof_qual'];
            $class = $rowteachersbank['class'];
            $cwsn = $rowteachersbank['cwsn'];
            $comp = $rowteachersbank['comp'];
            $mobile = $rowteachersbank['mobile'];
            $aadhar = $rowteachersbank['aadhar'];
            $email = $rowteachersbank['email'];
            $sub_10_1 = $rowteachersbank['sub_10_1'];
            $sub_12_1 = $rowteachersbank['sub_12_1'];
            $sub_10_2 = $rowteachersbank['sub_10_2'];
            $sub_12_2 = $rowteachersbank['sub_12_2'];
            $exp_10_1 = $rowteachersbank['exp_10_1'];
            $exp_12_1 = $rowteachersbank['exp_12_1'];
            $exp_10_2 = $rowteachersbank['exp_10_2'];
            $exp_12_2 = $rowteachersbank['exp_12_2'];
            $accountno = $rowteachersbank['accountno'];
            $ifsccode = $rowteachersbank['ifsccode'];
            $appear10 = $rowteachersbank['appear10'];
            $appear12 = $rowteachersbank['appear12'];
            $medium = $rowteachersbank['medium'];
            $bankname = $rowteachersbank['bankname'];
            $panno = $rowteachersbank['panno'];
        ?>
        <tr>
            <td class="tg-zaje"><?php echo $uid; ?><br><?php echo $reg; ?></td>
            <td class="tg-zaje">
                (<?php echo $sch_no; ?>/<?php echo $oldsch_no; ?>) <br>
                <b><?php echo $name; ?></b> <br>
                <b>Post: </b><?php echo $post; ?> &nbsp;&nbsp; <b>Cat: </b><?php echo $cat; ?><br>
                <b>DOB: </b><?php echo $dob; ?> &nbsp;&nbsp; <b>Gen: </b><?php echo $gen; ?> <br>
                <b>AADHAR: </b><?php echo $aadhar; ?> <br>
                <b>MOBILE: </b><?php echo $mobile; ?> <br>
                <b>EMAIL: </b><?php echo $email; ?>
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
                <b>Medium: </b> <?php echo $medium; ?> <br>
                <b>yoj: </b> <?php echo $yoj; ?>
            </td>
            <td class="tg-zaje">
                <b>App_nat: </b> <?php echo $app_nat; ?>&nbsp;&nbsp;&nbsp;
                <b>Cwsn: </b> <?php echo $cwsn; ?> <br>
                <b>Comp: </b> <?php echo $comp; ?> <br>
                <b>Appear10: </b> <?php echo $appear10; ?>&nbsp;&nbsp;&nbsp;
                <b>Appear12: </b> <?php echo $appear12; ?>
            </td>
        </tr>
        <?php } ?>
    </table>

 <?php } ?>
</div>
<?php }else{
        header("location: noaccess.php");
    }?>
