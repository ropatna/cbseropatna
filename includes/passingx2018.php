<?php
    if(isset($_POST['print'])){
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
        $sub7 = $_POST['sub7'];
        $gr1 = $_POST['gr1'];
        $gr2 = $_POST['gr2'];
        $gr3 = $_POST['gr3'];
        $gr4 = $_POST['gr4'];
        $gr5 = $_POST['gr5'];
        $gr6 = $_POST['gr6'];
        $gr7 = $_POST['gr7'];
        $sname1 = $_POST['sname1'];
        $sname2 = $_POST['sname2'];
        $sname3 = $_POST['sname3'];
        $sname4 = $_POST['sname4'];
        $sname5 = $_POST['sname5'];
        $sname6 = $_POST['sname6'];
        $sname7 = $_POST['sname7'];
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
        $dob = $_POST['dob'];
        $dob1 = date('jS F', strtotime($dob));
        $dob2 = date('Y', strtotime($dob));
        include 'includes/dobtext.php';
        if($dob2=="2000"){
            $dob3 = "TWO THOUSAND";
        }else{
            $dob3 = datetext($dob2);
        }
        $dob_text = $dob1." ".$dob3;
    }
?>
<?php if($res=="PASS") { ?>
<div class="page">
    <?php if($sch=="99999"){ ?>
    <label style="position:absolute;margin:30px 0px 0px 620px;"> <?php echo "$iregdno"; ?> </label><br>
    <label style="position:absolute;margin:80px 0px 0px 620px;"> <?php echo "         ";  ?> </label><br>
    <?php } else { ?>
    <label style="position:absolute;margin:80px 0px 0px 640px;"> <?php echo "$iregdno"; ?> </label><br>
    <label style="position:absolute;margin:85px 0px 0px 640px;"> <?php if($doctype=="dublicate"){ echo "DUPLICATE"; } if($doctype=="correction"){ echo "REVISED"; } ?> </label><br>
    <?php } ?>
    <label style="position:absolute;margin:340px 0px 0px 180px;"> ALL INDIA </label><br>
    <label style="position:absolute;margin:405px 0px 0px 245px;"> <?php echo "$cname"; ?> </label><br>
    <label style="position:absolute;margin:423px 0px 0px 220px;"> <?php echo "$rroll"; ?> </label><br>
    <label style="position:absolute;margin:438px 0px 0px 270px;"> <?php echo "$mname"; ?></label><br>
    <label style="position:absolute;margin:453px 0px 0px 390px;"> <?php echo "$fname"; ?> </label><br>
    <label style="position:absolute;margin:475px 0px 0px 270px;"> <?php echo "$dob"; ?> &nbsp;&nbsp; <?php echo strtoupper($dob_text); ?></label><br>
    <label style="position:absolute;margin:550px 0px 0px 160px;"> <?php echo "$sch"; ?> - <?php echo "$abbr_name"; ?> </label><br>

    <div style="display: grid;grid-template-columns: 330px 330px;margin:610px 0px 0px 110px;position:absolute;">
        <div style="padding: 10px;font-size: 13px;text-align: left;" <?php if($sub1==null || trim($gr1)=="E"){echo "hidden";}else{$sno+=1;} ?>><?php echo $sno; ?>. <?php echo $sname1; ?></div>
        <div style="padding: 10px;font-size: 13px;text-align: left;" <?php if($sub2==null || trim($gr2)=="E"){echo "hidden";}else{$sno+=1;} ?>><?php echo $sno; ?>. <?php echo "$sname2"; ?></div>
        <div style="padding: 10px;font-size: 13px;text-align: left;" <?php if($sub3==null || trim($gr3)=="E"){echo "hidden";}else{$sno+=1;} ?>><?php echo $sno; ?>. <?php echo "$sname3"; ?></div>
        <div style="padding: 10px;font-size: 13px;text-align: left;" <?php if($sub4==null || trim($gr4)=="E"){echo "hidden";}else{$sno+=1;} ?>><?php echo $sno; ?>. <?php echo "$sname4"; ?></div>
        <div style="padding: 10px;font-size: 13px;text-align: left;" <?php if($sub5==null || trim($gr5)=="E"){echo "hidden";}else{$sno+=1;} ?>><?php echo $sno; ?>. <?php echo "$sname5"; ?></div>
        <div style="padding: 10px;font-size: 13px;text-align: left;"></div>
        <div style="padding-top: 15px;padding-left: 10px;font-size: 14px;text-align: left;" <?php if(($sub6==null || trim($gr6)=="E") && ($sub7==null || trim($gr7)=="E")){echo "hidden";}?>><?php echo "ADDITIONAL SUBJECT"; ?></div>
        <div style="padding: 10px;font-size: 13px;text-align: left;"></div>
        <div style="padding: 10px;font-size: 13px;text-align: left;" <?php if($sub6==null || trim($gr6)=="E"){echo "hidden";}else{$sno+=1;} ?>><?php echo $sno; ?>. <?php echo "$sname6"; ?></div>
        <div style="padding: 10px;font-size: 13px;text-align: left;" <?php if($sub7==null || trim($gr7)=="E"){echo "hidden";}else{$sno+=1;} ?>><?php echo $sno; ?>. <?php echo "$sname7"; ?></div>
    </div>


    <label style="position:absolute;margin:880px 0px 0px 150px;"> PATNA </label><br>
    <label style="position:absolute;margin:890px 0px 0px 150px;"> <?php echo "$newDateDecl"; ?> / <?php echo "$newDateUpd"; ?></label>
</div>
<?php } ?>
