<?php
    if(isset($_POST['migbulk'])){
        $cname = $row_rol['cname'];
        $mname = $row_rol['mname'];
        $fname = $row_rol['fname'];
        $rroll = $row_rol['rroll'];
        $sch = $row_rol['sch'];
        $abbr_name = $row_rol2['abbr_name'];
        $rmigyear = $_POST['rmigyear'];
        $myDate = date('d/m/Y');
        $sex = $row_rol['sex'];
        $rmigyear = $_POST['rmigyear'];
    }
?>
<style>

page,.page {
    background: white;
    display: block;
    margin: 0 auto;
    margin-bottom: 0.5cm;
}


.page[size="A4"] {
    width: 21cm;
    height: 29.7cm;
}

page[size="A4"] {
  width: 21cm;
  height: 29.7cm;
}

@media print {
    body,
    page,.page {
        box-shadow: 0;
        font-family: arial;
        font-style: normal;
        font-size: 13px;
        margin: 0;
    }
}
</style>
<page size="A4">
    <label style="position:absolute;margin:120px 0px 0px 620px;"> DUPLICATE </label>
    <label style="position:absolute;margin:328px 0 0 253px;"> <?php echo strtoupper("$cname"); ?> </label><br>
    <label style="position:absolute;margin:382px 0 0 164px;"> <?php echo "$rroll"; ?> </label>
    <?php if(strtoupper($sex)=="F"){?>
    <label style="position:absolute;margin:382px 0 0 314px;">XX</label>
    <?php }else{ ?>
    <label style="position:absolute;margin:382px 0 0 344px;">XXXX</label>
    <?php } ?>
    <label style="position:absolute;margin:382px 0 0 464px;"> <?php echo strtoupper("$mname"); ?> </label><br>
    <label style="position:absolute;margin:440px 0 0 165px;"> <?php echo strtoupper("$fname"); ?> </label><br>
    <label style="position:absolute;margin:468px 0 0 180px;"> <?php echo "$sch"; ?> &nbsp; <?php echo "$abbr_name"; ?> </label><br>
    <label style="position:absolute;margin:548px 0 0 150px;"> ALL INDIA SECONDARY SCHOOL EXAMINATION-<?php echo "$rmigyear"; ?> </label><br>
    <label style="position:absolute;margin:800px 0 0 160px;"> PATNA </label><br>
    <label style="position:absolute;margin:823px 0 0 160px;"> <?php echo "$myDate"; ?> </label>
</page>
