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
        $sub7 = $_POST['sub7'];
        $sname1 = $_POST['sname1'];
        $sname2 = $_POST['sname2'];
        $sname3 = $_POST['sname3'];
        $sname4 = $_POST['sname4'];
        $sname5 = $_POST['sname5'];
        $sname6 = $_POST['sname6'];
        $sname7 = $_POST['sname7'];
        $mrk11 = $_POST['mrk11'];
        $mrk12 = $_POST['mrk12'];
        $mrk13 = $_POST['mrk13'];
        $mrk1text = $_POST['mrk1text'];
        $gr1 = $_POST['gr1'];
        $mrk21 = $_POST['mrk21'];
        $mrk22 = $_POST['mrk22'];
        $mrk23 = $_POST['mrk23'];
        $mrk2text = $_POST['mrk2text'];
        $gr2 = $_POST['gr2'];
        $mrk31 = $_POST['mrk31'];
        $mrk32 = $_POST['mrk32'];
        $mrk33 = $_POST['mrk33'];
        $mrk3text = $_POST['mrk3text'];
        $gr3 = $_POST['gr3'];
        $mrk41 = $_POST['mrk41'];
        $mrk42 = $_POST['mrk42'];
        $mrk43 = $_POST['mrk43'];
        $mrk4text = $_POST['mrk4text'];
        $gr4 = $_POST['gr4'];
        $mrk51 = $_POST['mrk51'];
        $mrk52 = $_POST['mrk52'];
        $mrk53 = $_POST['mrk53'];
        $mrk5text = $_POST['mrk5text'];
        $gr5 = $_POST['gr5'];
        $mrk61 = $_POST['mrk61'];
        $mrk62 = $_POST['mrk62'];
        $mrk63 = $_POST['mrk63'];
        $mrk6text = $_POST['mrk6text'];
        $gr6 = $_POST['gr6'];
        $mrk71 = $_POST['mrk71'];
        $mrk72 = $_POST['mrk72'];
        $mrk73 = $_POST['mrk73'];
        $mrk7text = $_POST['mrk7text'];
        $gr7 = $_POST['gr7'];
        $res = $_POST['res'];
        if(trim($res)=="XXXX"){$res = "XXXXX";}
        $cent = $_POST['cent'];
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
        $dateofupdate = $_POST['dateofupdate'];
        $newDateUpd = date("d-m-Y", strtotime($dateofupdate));
        $pf1 = $_POST['pf1'];
        $pf2 = $_POST['pf2'];
        $pf3 = $_POST['pf3'];
        $pf4 = $_POST['pf4'];
        $pf5 = $_POST['pf5'];
        $pf6 = $_POST['pf6'];
        $pf7 = $_POST['pf7'];
        $cat = $_POST['cat'];
        if(trim($cat)=="I"){$imp = $_POST['imp'];}else{$imp = "";}
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
<div class="page">
    <?php if($sch=="99999"){ ?>
    <label style="position:absolute;margin:25px 0px 0px 620px;"> <?php echo "$iregdno"; ?> </label><br>
    <label style="position:absolute;margin:75px 0px 0px 620px;"> <?php echo "         ";  ?> </label><br>
    <?php } else { ?>
    <label style="position:absolute;margin:73px 0px 0px 620px;"> <?php echo "$iregdno"; ?> </label><br>
    <label style="position:absolute;margin:78px 0px 0px 620px;"> <?php if($doctype=="dublicate"){ echo "DUPLICATE"; } if($doctype=="correction"){ echo "REVISED"; } ?> </label><br>
    <?php } ?>

    <label style="position:absolute;margin:260px 0px 0px 145px;"> ALL INDIA </label><br>
    <label style="position:absolute;margin:295px 0px 0px 390px;"> <?php echo "$cname"; ?> </label><br>
    <label style="position:absolute;margin:305px 0 0 200px;"> <?php echo "$rroll"; ?> </label><br>
    <label style="position:absolute;margin:316px 0 0 265px;"> <?php echo "$mname"; ?> </label><br>
    <label style="position:absolute;margin:325px 0 0 390px;"> <?php echo "$fname"; ?> </label><br>
    <label style="position:absolute;margin:336px 0 0 220px;"> <?php echo "$dob"; ?> &nbsp;&nbsp; <?php echo strtoupper($dob_text); ?></label><br>
    <label style="position:absolute;margin:345px 0 0 175px;"> <?php echo "$sch"; ?>&nbsp;-&nbsp;<?php echo "$abbr_name"; ?> </label><br>

    <div style="display: grid;grid-template-columns: 60px 260px 62px 52px 60px 150px auto;margin:473px 0px 0px 55px;position:absolute;">

        <div style="padding: 5px;font-size: 13px;text-align: left;" <?php if($sub1==null){echo "hidden";} ?>><?php echo "$sub1"; ?></div>
        <div style="padding: 5px;font-size: 13px;text-align: left;" <?php if($sub1==null){echo "hidden";} ?>><?php echo "$sname1"; ?></div>
        <div style="padding: 5px;font-size: 13px;text-align: left;" <?php if($sub1==null){echo "hidden";} ?>><?php echo "$mrk11"; ?></div>
        <div style="padding: 5px;font-size: 13px;text-align: left;" <?php if($sub1==null){echo "hidden";} ?>><?php echo "$mrk12"; ?></div>
        <div style="padding: 5px;font-size: 13px;text-align: left;" <?php if($sub1==null){echo "hidden";} ?>><?php echo "$mrk13"; ?>&nbsp;<?php echo "$pf1"; ?></div>
        <div style="padding: 5px;font-size: 13px;text-align: left;" <?php if($sub1==null){echo "hidden";} ?>><?php echo "$mrk1text"; ?></div>
        <div style="padding: 5px;font-size: 13px;text-align: left;" <?php if($sub1==null){echo "hidden";} ?>><?php echo "$gr1"; ?></div>


        <div style="padding: 5px;font-size: 13px;text-align: left;" <?php if($sub2==null){echo "hidden";} ?>><?php echo "$sub2"; ?></div>
        <div style="padding: 5px;font-size: 13px;text-align: left;" <?php if($sub2==null){echo "hidden";} ?>><?php echo "$sname2"; ?></div>
        <div style="padding: 5px;font-size: 13px;text-align: left;" <?php if($sub2==null){echo "hidden";} ?>><?php echo "$mrk21"; ?></div>
        <div style="padding: 5px;font-size: 13px;text-align: left;" <?php if($sub2==null){echo "hidden";} ?>><?php echo "$mrk22"; ?></div>
        <div style="padding: 5px;font-size: 13px;text-align: left;" <?php if($sub2==null){echo "hidden";} ?>><?php echo "$mrk23"; ?>&nbsp;<?php echo "$pf2"; ?></div>
        <div style="padding: 5px;font-size: 13px;text-align: left;" <?php if($sub2==null){echo "hidden";} ?>><?php echo "$mrk2text"; ?></div>
        <div style="padding: 5px;font-size: 13px;text-align: left;" <?php if($sub2==null){echo "hidden";} ?>><?php echo "$gr2"; ?></div>


        <div style="padding: 5px;font-size: 13px;text-align: left;" <?php if($sub3==null){echo "hidden";} ?>><?php echo "$sub3"; ?></div>
        <div style="padding: 5px;font-size: 13px;text-align: left;" <?php if($sub3==null){echo "hidden";} ?>><?php echo "$sname3"; ?></div>
        <div style="padding: 5px;font-size: 13px;text-align: left;" <?php if($sub3==null){echo "hidden";} ?>><?php echo "$mrk31"; ?></div>
        <div style="padding: 5px;font-size: 13px;text-align: left;" <?php if($sub3==null){echo "hidden";} ?>><?php echo "$mrk32"; ?></div>
        <div style="padding: 5px;font-size: 13px;text-align: left;" <?php if($sub3==null){echo "hidden";} ?>><?php echo "$mrk33"; ?>&nbsp;<?php echo "$pf3"; ?></div>
        <div style="padding: 5px;font-size: 13px;text-align: left;" <?php if($sub3==null){echo "hidden";} ?>><?php echo "$mrk3text"; ?></div>
        <div style="padding: 5px;font-size: 13px;text-align: left;" <?php if($sub3==null){echo "hidden";} ?>><?php echo "$gr3"; ?></div>


        <div style="padding: 5px;font-size: 13px;text-align: left;" <?php if($sub4==null){echo "hidden";} ?>><?php echo "$sub4"; ?></div>
        <div style="padding: 5px;font-size: 13px;text-align: left;" <?php if($sub4==null){echo "hidden";} ?>><?php echo "$sname4"; ?></div>
        <div style="padding: 5px;font-size: 13px;text-align: left;" <?php if($sub4==null){echo "hidden";} ?>><?php echo "$mrk41"; ?></div>
        <div style="padding: 5px;font-size: 13px;text-align: left;" <?php if($sub4==null){echo "hidden";} ?>><?php echo "$mrk42"; ?></div>
        <div style="padding: 5px;font-size: 13px;text-align: left;" <?php if($sub4==null){echo "hidden";} ?>><?php echo "$mrk43"; ?>&nbsp;<?php echo "$pf4"; ?></div>
        <div style="padding: 5px;font-size: 13px;text-align: left;" <?php if($sub4==null){echo "hidden";} ?>><?php echo "$mrk4text"; ?></div>
        <div style="padding: 5px;font-size: 13px;text-align: left;" <?php if($sub4==null){echo "hidden";} ?>><?php echo "$gr4"; ?></div>


        <div style="padding: 5px;font-size: 13px;text-align: left;" <?php if($sub5==null){echo "hidden";} ?>><?php echo "$sub5"; ?></div>
        <div style="padding: 5px;font-size: 13px;text-align: left;" <?php if($sub5==null){echo "hidden";} ?>><?php echo "$sname5"; ?></div>
        <div style="padding: 5px;font-size: 13px;text-align: left;" <?php if($sub5==null){echo "hidden";} ?>><?php echo "$mrk51"; ?></div>
        <div style="padding: 5px;font-size: 13px;text-align: left;" <?php if($sub5==null){echo "hidden";} ?>><?php echo "$mrk52"; ?></div>
        <div style="padding: 5px;font-size: 13px;text-align: left;" <?php if($sub5==null){echo "hidden";} ?>><?php echo "$mrk53"; ?>&nbsp;<?php echo "$pf5"; ?></div>
        <div style="padding: 5px;font-size: 13px;text-align: left;" <?php if($sub5==null){echo "hidden";} ?>><?php echo "$mrk5text"; ?></div>
        <div style="padding: 5px;font-size: 13px;text-align: left;" <?php if($sub5==null){echo "hidden";} ?>><?php echo "$gr5"; ?></div>

        <div style="padding: 5px;font-size: 13px;text-align: left;" <?php if($sub6==null && $sub7==null){echo "hidden";} ?>></div>
        <div style="padding: 5px;font-size: 13px;text-align: left;" <?php if($sub6==null && $sub7==null){echo "hidden";} ?>> <p style="margin-bottom:0;padding-bottom:0;">ADDITIONAL SUBJECT</p> </div>
        <div style="padding: 5px;font-size: 13px;text-align: left;" <?php if($sub6==null && $sub7==null){echo "hidden";} ?>></div>
        <div style="padding: 5px;font-size: 13px;text-align: left;" <?php if($sub6==null && $sub7==null){echo "hidden";} ?>></div>
        <div style="padding: 5px;font-size: 13px;text-align: left;" <?php if($sub6==null && $sub7==null){echo "hidden";} ?>></div>
        <div style="padding: 5px;font-size: 13px;text-align: left;" <?php if($sub6==null && $sub7==null){echo "hidden";} ?>></div>
        <div style="padding: 5px;font-size: 13px;text-align: left;" <?php if($sub6==null && $sub7==null){echo "hidden";} ?>></div>

        <div style="padding: 5px;font-size: 13px;text-align: left;" <?php if($sub6==null){echo "hidden";} ?>><?php echo "$sub6"; ?></div>
        <div style="padding: 5px;font-size: 13px;text-align: left;" <?php if($sub6==null){echo "hidden";} ?>><?php echo "$sname6"; ?></div>
        <div style="padding: 5px;font-size: 13px;text-align: left;" <?php if($sub6==null){echo "hidden";} ?>><?php echo "$mrk61"; ?></div>
        <div style="padding: 5px;font-size: 13px;text-align: left;" <?php if($sub6==null){echo "hidden";} ?>><?php echo "$mrk62"; ?></div>
        <div style="padding: 5px;font-size: 13px;text-align: left;" <?php if($sub6==null){echo "hidden";} ?>><?php echo "$mrk63"; ?>&nbsp;<?php echo "$pf6"; ?></div>
        <div style="padding: 5px;font-size: 13px;text-align: left;" <?php if($sub6==null){echo "hidden";} ?>><?php echo "$mrk6text"; ?></div>
        <div style="padding: 5px;font-size: 13px;text-align: left;" <?php if($sub6==null){echo "hidden";} ?>><?php echo "$gr6"; ?></div>


        <div style="padding: 5px;font-size: 13px;text-align: left;" <?php if($sub7==null){echo "hidden";} ?>><?php echo "$sub7"; ?></div>
        <div style="padding: 5px;font-size: 13px;text-align: left;" <?php if($sub7==null){echo "hidden";} ?>><?php echo "$sname7"; ?></div>
        <div style="padding: 5px;font-size: 13px;text-align: left;" <?php if($sub7==null){echo "hidden";} ?>><?php echo "$mrk71"; ?></div>
        <div style="padding: 5px;font-size: 13px;text-align: left;" <?php if($sub7==null){echo "hidden";} ?>><?php echo "$mrk72"; ?></div>
        <div style="padding: 5px;font-size: 13px;text-align: left;" <?php if($sub7==null){echo "hidden";} ?>><?php echo "$mrk73"; ?>&nbsp;<?php echo "$pf7"; ?></div>
        <div style="padding: 5px;font-size: 13px;text-align: left;" <?php if($sub7==null){echo "hidden";} ?>><?php echo "$mrk7text"; ?></div>
        <div style="padding: 5px;font-size: 13px;text-align: left;" <?php if($sub7==null){echo "hidden";} ?>><?php echo "$gr7"; ?></div>
    </div>

    <label style="position:absolute;margin:760px 0 0 555px;"> <?php echo "$res"; ?> </label><br>
    <label style="position:absolute;margin:775px 0 0 465px;"> <?php if($cat=="I"){echo "APPEARED FOR IMPROVEMENT";}else {echo "     ";} ?> </label><br>
    <label style="position:absolute;margin:828px 0 0 145px;"> PATNA </label><br>
    <label style="position:absolute;margin:833px 0 0 145px;"> <?php echo "$dateofdecl"; ?> / <?php echo "$newDateUpd"; ?></label>
</div>
