<?php
    if(isset($_POST['print'])){
        $cname = $_POST['cname'];
        $mname = $_POST['mname'];
        $fname = $_POST['fname'];
        $res = $_POST['res'];
        $rroll = $_POST['rroll'];
        $sch = $_POST['sch'];
        $abbr_name = $_POST['abbr_name'];
        $ryear = $_POST['ryear'];
        $dateofupdate = $_POST['dateofupdate'];
        $newDateUpd = date("d-m-Y", strtotime($dateofupdate));
        $sex = $_POST['sex'];
    }
    if((trim($res)=="PASS")||(trim($res)=="COMPARTMENT")||(trim($res)=="COMP")){
?>
<div class="page">
    <label style="position:absolute;margin:321px 0 0 250px;"> <?php echo strtoupper("$cname"); ?> </label><br>
    <label style="position:absolute;margin:377px 0 0 160px;"> <?php echo "$rroll"; ?> </label>
    <?php if(strtoupper($sex)=="F"){?>
    <label style="position:absolute;margin:377px 0 0 310px;">XX</label>
    <?php }else{ ?>
    <label style="position:absolute;margin:377px 0 0 340px;">XXXX</label>
    <?php } ?>
    <label style="position:absolute;margin:377px 0 0 460px;"> <?php echo strtoupper("$mname"); ?> </label><br>
    <label style="position:absolute;margin:433px 0 0 160px;"> <?php echo strtoupper("$fname"); ?> </label><br>
    <label style="position:absolute;margin:463px 0 0 180px;"> <?php echo "$sch"; ?> &nbsp; <?php echo "$abbr_name"; ?> </label><br>
    <label style="position:absolute;margin:548px 0 0 150px;"> ALL INDIA SECONDARY SCHOOL EXAMINATION- <?php echo "$ryear"; ?> </label><br>
    <label style="position:absolute;margin:810px 0 0 150px;"> PATNA </label><br>
    <label style="position:absolute;margin:833px 0 0 150px;"> <?php echo "$newDateUpd"; ?> </label>
</div>
<?php } ?>
