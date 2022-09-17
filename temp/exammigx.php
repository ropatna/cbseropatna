 <?php
    $conn = mysqli_connect('localhost','root','','cbse');
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $exammigyear = "";
    $exammigclass = "";
    $exammigexamtype = "";
    $roll = "";
    $align = "";
    if(isset($_POST['exammigprn'])){
        $exammigyear = $_POST['exammigyear'];
        $exammigclass = $_POST['exammigclass'];
        $exammigexamtype = $_POST['exammigexamtype'];
        $roll = $_POST['roll'];
        $align = $_POST['align'];
        $sql = "SELECT * FROM r".$exammigclass.$exammigyear.$exammigexamtype." WHERE rroll=".$roll;
        $runsql = mysqli_query($conn,$sql);
        $rowsql = mysqli_fetch_array($runsql);
        $cname = $rowsql['cname'];
        $mname = $rowsql['mname'];
        $fname = $rowsql['fname'];
        $rroll = $rowsql['rroll'];
        $sch = $rowsql['sch'];
        $abbr_name = $rowsql['abbr_name'];
        $ryear = $exammigyear;
        /*$dateofupdate = $rowsql['dateofdecl'];*/
        $newDateUpd = date("d-m-Y");
        $sex = $rowsql['sex'];
    }
?>
<style>
    .page,.page1{
    background: white;
    display: block;
    margin: 0 auto;
    margin-bottom: 0.5cm;
    }
    .page[size="A4"] {
    width: 21cm;
    height: 29.7cm;
    }
    .page1[size="A4"] {
    width: 21cm;
    height: 29.7cm;
    }
    @media print {
    body,.page,.page1 {
        box-shadow: 0;
        font-family: arial;
        font-style: normal;
        font-size: 13px;
        margin: 0;
        }
    .page1{
        margin-left: 140px;
        }
    }
</style>
<?php if($align=="l"){ ?>
<div class="page">
    <label style="position:absolute;margin:256px 0 0 200px;"> <?php echo strtoupper("$cname"); ?> </label><br>
    <label style="position:absolute;margin:276px 0 0 110px;"> <?php echo "$rroll"; ?> </label>
    <?php if(strtoupper($sex)=="F"){?>
    <label style="position:absolute;margin:276px 0 0 255px;">XX</label>
    <?php }else{ ?>
    <label style="position:absolute;margin:276px 0 0 290px;">XXXX</label>
    <?php } ?>
    <label style="position:absolute;margin:276px 0 0 400px;"> <?php echo strtoupper("$mname"); ?> </label><br>
    <label style="position:absolute;margin:300px 0 0 115px;"> <?php echo strtoupper("$fname"); ?> </label><br>
    <label style="position:absolute;margin:310px 0 0 120px;"> <?php echo "$sch"; ?> &nbsp; <?php echo "$abbr_name"; ?> </label><br>
    <label style="position:absolute;margin:350px 0 0 90px;"> ALL INDIA SENIOR SCHOOL CERTIFICATE EXAMINATION <?php echo "$ryear"; ?> </label><br>
    <label style="position:absolute;margin:445px 0 0 100px;"> PATNA </label><br>
    <label style="position:absolute;margin:455px 0 0 100px;"> <?php echo "$newDateUpd"; ?> </label>
</div>
<?php }else{ ?>
<div class="page">
    <label style="position:absolute;margin:256px 0 0 230px;"> <?php echo strtoupper("$cname"); ?> </label><br>
    <label style="position:absolute;margin:276px 0 0 140px;"> <?php echo "$rroll"; ?> </label>
    <?php if(strtoupper($sex)=="F"){?>
    <label style="position:absolute;margin:276px 0 0 285px;">XX</label>
    <?php }else{ ?>
    <label style="position:absolute;margin:276px 0 0 320px;">XXXX</label>
    <?php } ?>
    <label style="position:absolute;margin:276px 0 0 430px;"> <?php echo strtoupper("$mname"); ?> </label><br>
    <label style="position:absolute;margin:300px 0 0 145px;"> <?php echo strtoupper("$fname"); ?> </label><br>
    <label style="position:absolute;margin:310px 0 0 150px;"> <?php echo "$sch"; ?> &nbsp; <?php echo "$abbr_name"; ?> </label><br>
    <label style="position:absolute;margin:350px 0 0 120px;"> ALL INDIA SENIOR SCHOOL CERTIFICATE EXAMINATION <?php echo "$ryear"; ?> </label><br>
    <label style="position:absolute;margin:445px 0 0 130px;"> PATNA </label><br>
    <label style="position:absolute;margin:455px 0 0 130px;"> <?php echo "$newDateUpd"; ?> </label>
</div>
<?php } ?>
