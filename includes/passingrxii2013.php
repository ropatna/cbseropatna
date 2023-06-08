<!-- Right Passing XII 2013 -->
<?php
    if(isset($_POST['print'])){
        $ryear = $_POST['ryear'];
        $doctype = $_POST['doctype'];
        $cname = $_POST['cname'];
        $mname = $_POST['mname'];
        $fname = $_POST['fname'];
        $rroll = $_POST['rroll'];
        $sch = $_POST['sch'];
        $abbr_name = $_POST['abbr_name'];
        $sub1 = $_POST['sub1'];
        $sub2 = $_POST['sub2'];
        $sub3 = $_POST['sub3'];
        $sub4 = $_POST['sub4'];
        $sub5 = $_POST['sub5'];
        $sub6 = $_POST['sub6'];
        $gr1 = $_POST['gr1'];
        $gr2 = $_POST['gr2'];
        $gr3 = $_POST['gr3'];
        $gr4 = $_POST['gr4'];
        $gr5 = $_POST['gr5'];
        $gr6 = $_POST['gr6'];
        $isub1 = $_POST['isub1'];
        $isub2 = $_POST['isub2'];
        $isub3 = $_POST['isub3'];
        $sname1 = $_POST['sname1'];
        $sname2 = $_POST['sname2'];
        $sname3 = $_POST['sname3'];
        $sname4 = $_POST['sname4'];
        $sname5 = $_POST['sname5'];
        $sname6 = $_POST['sname6'];
        $isname1 = $_POST['isname1'];
        $isname2 = $_POST['isname2'];
        $isname3 = $_POST['isname3'];
        $cent = $_POST['cent'];
        $res = $_POST['res'];
        $regdno = $_POST['regdno'];
        if($regdno!=null){
            $iregdno = substr($regdno,0,4)."/".substr($regdno,4,5)."/".substr($regdno,9,4);
        } else{
            if($sch=="99999"){
                $iregdno = "(".$cent.")";
            }else{
                $iregdno = "";
            }
        }
        $dateofdecl = $_POST['dateofdecl'];
        $newDateDecl = str_replace("/","-","$dateofdecl");
        $dateofupdate = $_POST['dateofupdate'];
        $newDateUpd = date("d-m-Y", strtotime($dateofupdate));
        $sno = 0;
    }
?>
<?php if($res=="PASS") { ?>
<div class="page"> 
    <?php if($sch=="99999"){ ?>
    <label style="position:absolute;margin:30px 0px 0px 570px;"> <?php echo "$iregdno"; ?> </label><br>
    <label style="position:absolute;margin:80px 0px 0px 570px;"> <?php echo "         ";  ?> </label><br>
    <?php } else { ?>
    <label style="position:absolute;margin:65px 0px 0px 550px;"> <?php echo "$iregdno"; ?> </label><br>
    <label style="position:absolute;margin:70px 0px 0px 550px;"> <?php if($doctype=="dublicate"){ echo "DUPLICATE"; } if($doctype=="correction"){ echo "REVISED"; } ?> </label><br>
    <?php } ?>
    <label style="position:absolute;margin:355px 0px 0px 130px;"> ALL INDIA </label><br>
    <label style="position:absolute;margin:410px 0px 0px 260px;"> <?php echo "$cname"; ?> </label><br>
    <label style="position:absolute;margin:440px 0px 0px 170px;"> <?php echo "$rroll"; ?> </label><br>
    <label style="position:absolute;margin:480px 0px 0px 310px;"> <?php echo "$mname"; ?> / <?php echo "$fname"; ?> </label><br>
    <label style="position:absolute;margin:455px 0px 0px 410px;">  </label><br>
    <label style="position:absolute;margin:590px 0px 0px 170px;"> <?php echo "$sch"; ?> - <?php echo "$abbr_name"; ?> </label><br>

    <div style="display: grid;grid-template-columns: 200px 200px 200px;margin:650px 0px 0px 100px;position:absolute;">
        <div style="padding: 10px;font-size: 13px;text-align: left;" <?php if($sub1==null || trim($gr1)=="E"){echo "hidden";}else{$sno+=1;} ?>><?php echo $sno; ?>. <?php echo $sname1; ?></div>
        <div style="padding: 10px;font-size: 13px;text-align: left;" <?php if($sub2==null || trim($gr2)=="E"){echo "hidden";}else{$sno+=1;} ?>><?php echo $sno; ?>. <?php echo "$sname2"; ?></div>
        <div style="padding: 10px;font-size: 13px;text-align: left;" <?php if($sub3==null || trim($gr3)=="E"){echo "hidden";}else{$sno+=1;} ?>><?php echo $sno; ?>. <?php echo "$sname3"; ?></div>
        <div style="padding: 10px;font-size: 13px;text-align: left;" <?php if($sub4==null || trim($gr4)=="E"){echo "hidden";}else{$sno+=1;} ?>><?php echo $sno; ?>. <?php echo "$sname4"; ?></div>
        <div style="padding: 10px;font-size: 13px;text-align: left;" <?php if($sub5==null || trim($gr5)=="E"){echo "hidden";}else{$sno+=1;} ?>><?php echo $sno; ?>. <?php echo "$sname5"; ?></div>
        <div style="padding: 10px;font-size: 13px;text-align: left;" <?php if($sub6==null || trim($gr6)=="E"){echo "hidden";}else{$sno+=1;} ?>><?php echo $sno; ?>. <?php echo "$sname6"; ?></div>
        <div style="padding: 10px;font-size: 13px;text-align: left;" <?php if($isub1==null||$isub1=="0"){echo "hidden";}else{$sno+=1;} ?>><?php echo $sno; ?>. <?php echo "$isname1"; ?></div>
        <div style="padding: 10px;font-size: 13px;text-align: left;" <?php if($isub2==null||$isub2=="0"){echo "hidden";}else{$sno+=1;} ?>><?php echo $sno; ?>. <?php echo "$isname2"; ?></div>
        <div style="padding: 10px;font-size: 13px;text-align: left;" <?php if($isub3==null||$isub3=="0"){echo "hidden";}else{$sno+=1;} ?>><?php echo $sno; ?>. <?php echo "$isname3"; ?></div>
    </div>


    <label style="position:absolute;margin:910px 0px 0px 140px;"> PATNA </label><br>
    <label style="position:absolute;margin:930px 0px 0px 140px;"> <?php echo "$newDateDecl"; ?> / <?php echo "$newDateUpd"; ?></label>
</div>
<?php } ?>
