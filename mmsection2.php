<?php

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
<?php
        if(isset($_POST['rsearch'])){
            if($res!="PASS"){
                $dis=1;
            }
            if($res!="COMPARTMENT"){
                $dis=1;
            }
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
    #post label,#insertdata label{
        font-size: 12px;
    }
</style>
<div class="content">
   <?php if($row2!=null){?>
    <div class="f1" <?php if($f==0){echo "hidden";} ?>>
        <div class="form-header">
            <center><span class="text-light bg-dark" style="font-size:20px;">Issued Result</span></center>
            <span style="font-size:25px;float:left;color:red;font-weight:600;"><b><?php if($rexamtype=="m")$exm="MAIN"; if($rexamtype=="c")$exm="COMPARTMENT"; if($rexamtype=="r")$exm="MERGED"; $restype=$ryear." ".$exm." EXAM"; echo $restype; ?></b></span>
        </div>
        <form id="post" class="navbar-form navbar-left" style="width:100%;padding:5px;" method="post" action="index.php?mmsection" <?php if($f==0){echo "hidden";} ?>>
            <table>
                <tr>
                    <td><label> Name of Candidate : </label></td>
                    <td><input type="text" name="cname" value="<?php echo str_replace("'","","$c_cname"); ?>" class="inp" <?php if($c_cname!=$cname){?>id="changed" <?php } ?>></td>
                </tr>
                <tr>
                    <td><label> Roll No. : </label></td>
                    <td><label <?php if($c_rroll!=$rroll){?>id="changed" <?php } ?>> <?php echo "$c_rroll"; ?> </label> <input type="hidden" name="rroll" value="<?php echo "$c_rroll"; ?>" class="inp"></td>
                </tr>
                <tr>
                    <td><label> Mother's Name : </label></td>
                    <td><input type="text" name="mname" value="<?php echo str_replace("'","","$c_mname"); ?>" class="inp" <?php if($c_mname!=$mname){?>id="changed" <?php } ?>></td>
                </tr>
                <tr>
                    <td><label> Father's/guardian's Name : </label></td>
                    <td><input type="text" name="fname" value="<?php echo str_replace("'","","$c_fname"); ?>" class="inp" <?php if($c_fname!=$fname){?>id="changed" <?php } ?>></td>
                </tr>
                <?php if($rclass=="x"){ ?>
                <tr>
                    <td><label> Date Of Birth : </label></td>
                    <td><input type="text" name="dob" value="<?php echo "$c_dob"; ?>" class="inp" <?php if(str_replace("-","","$c_dob")!=$dob){?>id="changed" <?php } ?>></td>
                </tr>
                <?php } ?>
                <tr>
                    <td><label> School : </label></td>
                    <td><input type="text" name="sch" value="<?php echo "$c_sch"; ?>" class="inp1" <?php if($c_sch!=$sch){?>id="changed" <?php } ?>><label> <?php
                    $schmaster = "schoolmaster2023";
                    $school2 = "SELECT * FROM ".$schmaster." WHERE sch_no=".$c_sch;
                    $run_school2 = mysqli_query($conn,$school2);
                    $row_school2 = mysqli_fetch_array($run_school2);
                    if($row_school2==null){
                        $schmaster = "schoolmaster2021";
                        $school2 = "SELECT * FROM ".$schmaster." WHERE nsch_no='".$c_sch."'";
                        $run_school2 = mysqli_query($conn,$school2);
                        $row_school2 = mysqli_fetch_array($run_school2);
                    }
                    $c_abbr_name = $row_school2['abbr_name'];
                    echo "$c_abbr_name"; ?> </label></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="hidden" name="abbr_name" value="<?php echo str_replace("'","","$c_abbr_name"); ?>" class="inp1"></td>
                </tr>
            </table>
            <table>
                <tr>
                    <th class="tg-q9j0">SUB.<br>CODE</th>
                    <th class="tg-q9j0">SUBJECT</th>
                    <th class="tg-q9j0">THEORY</th>
                    <th class="tg-q9j0">PRACTICAL</th>
                    <th class="tg-q9j0">TOTAL</th>
                    <th class="tg-q9j0">FT/FP/F</th>
                    <th class="tg-q9j0">TOTAL IN WORDS</th>
                    <th class="tg-q9j0">POSITIONAL<br>GRADE</th>
                </tr>
                <?php
                $submaster = "sub".$rclass.$ryear;
                if($c_sub1!=null){$row_c_sn1 = mysqli_fetch_array(mysqli_query($conn,"SELECT subname FROM ".$submaster." WHERE sub=".$c_sub1));$c_sname1 = $row_c_sn1['subname'];}
                if($c_sub2!=null){$row_c_sn2 = mysqli_fetch_array(mysqli_query($conn,"SELECT subname FROM ".$submaster." WHERE sub=".$c_sub2));$c_sname2 = $row_c_sn2['subname'];}
                if($c_sub3!=null){$row_c_sn3 = mysqli_fetch_array(mysqli_query($conn,"SELECT subname FROM ".$submaster." WHERE sub=".$c_sub3));$c_sname3 = $row_c_sn3['subname'];}
                if($c_sub4!=null){$row_c_sn4 = mysqli_fetch_array(mysqli_query($conn,"SELECT subname FROM ".$submaster." WHERE sub=".$c_sub4));$c_sname4 = $row_c_sn4['subname'];}
                if($c_sub5!=null){$row_c_sn5 = mysqli_fetch_array(mysqli_query($conn,"SELECT subname FROM ".$submaster." WHERE sub=".$c_sub5));$c_sname5 = $row_c_sn5['subname'];}
            ?>
                <?php if($c_sub1!=null){ ?>
                <tr>
                    <td><input type="text" name="sub1" value="<?php echo sprintf('%03d',$c_sub1); ?>" class="inp1" <?php if($c_sub1!=$sub1){?>id="changed" <?php } ?>></td>
                    <td><label><?php echo "$c_sname1"; ?></label><input type="hidden" name="sname1" value="<?php echo "$c_sname1"; ?>"></td>
                    <td><input type="text" name="mrk11" value="<?php if(trim($c_mrk11)=="AB"){echo "$c_mrk11";}else { echo sprintf('%03d',$c_mrk11);} ?>" class="inp1" <?php if($c_mrk11!=$mrk11){?>id="changed" <?php } ?>></td>
                    <td>
                        <input type="text" name="mrk12" value="<?php if(trim($c_mrk12)=="XXX" || trim($c_mrk12)=="AB"){ echo "$c_mrk12";}else{echo sprintf('%03d',$c_mrk12);} ?>" class="inp1" <?php if($c_mrk12!=$mrk12){ if(($c_mrk12==null||$c_mrk12=="XXX")&&($mrk12==null||$mrk12=="XXX")){}else{?>id="changed" <?php } }?>>
                    </td>
                    <td>
                        <?php if($c_mrk12=="XXX"){$total = $c_mrk11;}else {$total = intval($c_mrk11) + intval($c_mrk12);} ?>
                        <input type="text" name="mrk13" value="<?php if(trim($total)!="AB"){echo sprintf('%03d',$total);}else{echo "$total";} ?>" class="inp1">
                    </td>
                    <td><input type="text" name="pf1" value="<?php echo $c_pf1; ?>" class="inp1" <?php if($c_pf1!=$pf1){?>id="changed" <?php } ?>></td>
                    <td><label> <?php if(trim($total)!="AB"){include 'includes/mrkt13c.php'; if($f==1 && $total!=="AB"){ $mrk1text = mrkt13c($total); echo strtoupper("$mrk1text");} }else{$mrk1text="";} ?></label><input type="hidden" name="mrk1text" value="<?php echo strtoupper("$mrk1text"); ?>"></td>
                    <td><input type="text" name="gr1" value="<?php echo "$c_gr1"; ?>" class="inp1" <?php if($c_gr1!=$gr1){?>id="changed" <?php } ?>></td>
                </tr>
                <?php }  ?>
                <?php if($c_sub1==null){ if($c_cat!="C" && $c_cat!="I"  && $c_cat!="S" && $c_cat!="T"){?>
                <tr>
                    <td><input type="hidden" name="sub1" value="" class="inp1"></td>
                    <td><input type="hidden" name="sname1" value="" class="inp1"></td>
                    <td><input type="hidden" name="mrk11" value="" class="inp1"></td>
                    <td><input type="hidden" name="mrk12" value="" class="inp1"></td>
                    <td><input type="hidden" name="mrk13" value="" class="inp1"></td>
                    <td><input type="hidden" name="pf1" value="" class="inp1"></td>
                    <td><input type="hidden" name="mrk1text" value="" class="inp1"></td>
                    <td><input type="hidden" name="gr1" value="" class="inp1"></td>
                </tr>
                <?php } else{ ?>
                <tr>
                    <td><input type="text" name="sub1" value="" class="inp1" placeholder="sub1"></td>
                    <td><input type="hidden" name="sname1" value="" class="inp1"></td>
                    <td><input type="text" name="mrk11" value="" class="inp1"></td>
                    <td><input type="text" name="mrk12" value="" class="inp1"></td>
                    <td><input type="hidden" name="mrk13" value="" class="inp1"></td>
                    <td><input type="text" name="pf1" value="" class="inp1"></td>
                    <td><input type="hidden" name="mrk1text" value="" class="inp1"></td>
                    <td><input type="text" name="gr1" value="" class="inp1"></td>
                </tr>
                <?php } } ?>
                <?php if($c_sub2!=null){ ?>
                <tr>
                    <td><input type="text" name="sub2" value="<?php echo sprintf('%03d',$c_sub2); ?>" class="inp1" <?php if($c_sub2!=$sub2){?>id="changed" <?php } ?>></td>
                    <td><label><?php echo "$c_sname2"; ?></label><input type="hidden" name="sname2" value="<?php echo "$c_sname2"; ?>"></td>
                    <td><input type="text" name="mrk21" value="<?php if(trim($c_mrk21)=="AB"){echo "$c_mrk21";}else { echo sprintf('%03d',$c_mrk21);} ?>" class="inp1" <?php if($c_mrk21!=$mrk21){?>id="changed" <?php } ?>></td>
                    <td>
                        <input type="text" name="mrk22" value="<?php if(trim($c_mrk22)=="XXX" || trim($c_mrk22)=="AB"){ echo "$c_mrk22";}else{echo sprintf('%03d',$c_mrk22);} ?>" class="inp1" <?php if($c_mrk22!=$mrk22){ if(($c_mrk22==null||$c_mrk22=="XXX")&&($mrk22==null||$mrk22=="XXX")){}else{?>id="changed" <?php } }?>></td>
                    <td>
                        <?php if($c_mrk22=="XXX"){$total = $c_mrk21;}else {$total = intval($c_mrk21) + intval($c_mrk22);} ?>
                        <input type="text" name="mrk23" value="<?php if(trim($total)!="AB"){echo sprintf('%03d',$total);}else{echo "$total";} ?>" class="inp1">
                    </td>
                    <td><input type="text" name="pf2" value="<?php echo $c_pf2; ?>" class="inp1" <?php if($c_pf2!=$pf2){?>id="changed" <?php } ?>></td>
                    <td><label> <?php if(trim($total)!="AB"){include 'includes/mrkt23c.php'; if($f==1 && $total!=="AB"){$mrk2text = mrkt23c($total); echo strtoupper("$mrk2text");} }else{$mrk2text="";}?></label><input type="hidden" name="mrk2text" value="<?php echo strtoupper("$mrk2text"); ?>"></td>
                    <td><input type="text" name="gr2" value="<?php echo "$c_gr2"; ?>" class="inp1" <?php if($c_gr2!=$gr2){?>id="changed" <?php } ?>></td>
                </tr>
                <?php }  ?>
                <?php if($c_sub2==null){ if($c_cat!="C" && $c_cat!="I" && $c_cat!="S" && $c_cat!="T"){?>
                <tr>
                    <td><input type="hidden" name="sub2" value="" class="inp1"></td>
                    <td><input type="hidden" name="sname2" value="" class="inp1"></td>
                    <td><input type="hidden" name="mrk21" value="" class="inp1"></td>
                    <td><input type="hidden" name="mrk22" value="" class="inp1"></td>
                    <td><input type="hidden" name="mrk23" value="" class="inp1"></td>
                    <td><input type="hidden" name="pf2" value="" class="inp1"></td>
                    <td><input type="hidden" name="mrk2text" value="" class="inp1"></td>
                    <td><input type="hidden" name="gr2" value="" class="inp1"></td>
                </tr>
                <?php } else{ ?>
                <tr>
                    <td><input type="text" name="sub2" value="" class="inp1" placeholder="sub2"></td>
                    <td><input type="hidden" name="sname2" value="" class="inp1"></td>
                    <td><input type="text" name="mrk21" value="" class="inp1"></td>
                    <td><input type="text" name="mrk22" value="" class="inp1"></td>
                    <td><input type="hidden" name="mrk23" value="" class="inp1"></td>
                    <td><input type="text" name="pf2" value="" class="inp1"></td>
                    <td><input type="hidden" name="mrk2text" value="" class="inp1"></td>
                    <td><input type="text" name="gr2" value="" class="inp1"></td>
                </tr>
                <?php } } ?>
                <?php if($c_sub3!=null){ ?>
                <tr>
                    <td><input type="text" name="sub3" value="<?php echo sprintf('%03d',$c_sub3); ?>" class="inp1" <?php if($c_sub3!=$sub3){?>id="changed" <?php } ?>></td>
                    <td><label><?php echo "$c_sname3"; ?></label><input type="hidden" name="sname3" value="<?php echo "$c_sname3"; ?>"></td>
                    <td><input type="text" name="mrk31" value="<?php if(trim($c_mrk31)=="AB"){echo "$c_mrk31";}else { echo sprintf('%03d',$c_mrk31);} ?>" class="inp1" <?php if($c_mrk31!=$mrk31){?>id="changed" <?php } ?>></td>
                    <td>
                        <input type="text" name="mrk32" value="<?php if(trim($c_mrk32)=="XXX" || trim($c_mrk32)=="AB"){ echo "$c_mrk32";}else{echo sprintf('%03d',$c_mrk32);} ?>" class="inp1" <?php if($c_mrk32!=$mrk32){ if(($c_mrk32==null||$c_mrk32=="XXX")&&($mrk32==null||$mrk32=="XXX")){}else{?>id="changed" <?php } }?>></td>
                    <td>
                        <?php if($c_mrk32=="XXX"){$total = $c_mrk31;}else {$total = intval($c_mrk31) + intval($c_mrk32);} ?>
                        <input type="text" name="mrk33" value="<?php if(trim($total)!="AB"){echo sprintf('%03d',$total);}else{echo "$total";} ?>" class="inp1">
                    </td>
                    <td><input type="text" name="pf3" value="<?php echo $c_pf3; ?>" class="inp1" <?php if($c_pf3!=$pf3){?>id="changed" <?php } ?>></td>
                    <td><label> <?php if(trim($total)!="AB"){include 'includes/mrkt33c.php';if($f==1 && $total!=="AB"){$mrk3text = mrkt33c($total); echo strtoupper("$mrk3text");} }else{$mrk3text="";}?></label><input type="hidden" name="mrk3text" value="<?php echo strtoupper("$mrk3text"); ?>"></td>
                    <td><input type="text" name="gr3" value="<?php echo "$c_gr3"; ?>" class="inp1" <?php if($c_gr3!=$gr3){?>id="changed" <?php } ?>></td>
                </tr>
                <?php }  ?>
                <?php if($c_sub3==null){ if($c_cat!="C" && $c_cat!="I" && $c_cat!="S" && $c_cat!="T"){?>
                <tr>
                    <td><input type="hidden" name="sub3" value="" class="inp1"></td>
                    <td><input type="hidden" name="sname3" value="" class="inp1"></td>
                    <td><input type="hidden" name="mrk31" value="" class="inp1"></td>
                    <td><input type="hidden" name="mrk32" value="" class="inp1"></td>
                    <td><input type="hidden" name="mrk33" value="" class="inp1"></td>
                    <td><input type="hidden" name="pf3" value="" class="inp1"></td>
                    <td><input type="hidden" name="mrk3text" value="" class="inp1"></td>
                    <td><input type="hidden" name="gr3" value="" class="inp1"></td>
                </tr>
                <?php } else{ ?>
                <tr>
                    <td><input type="text" name="sub3" value="" class="inp1" placeholder="sub3"></td>
                    <td><input type="hidden" name="sname3" value="" class="inp1"></td>
                    <td><input type="text" name="mrk31" value="" class="inp1"></td>
                    <td><input type="text" name="mrk32" value="" class="inp1"></td>
                    <td><input type="hidden" name="mrk33" value="" class="inp1"></td>
                    <td><input type="text" name="pf3" value="" class="inp1"></td>
                    <td><input type="hidden" name="mrk3text" value="" class="inp1"></td>
                    <td><input type="text" name="gr3" value="" class="inp1"></td>
                </tr>
                <?php } } ?>
                <?php if($c_sub4!=null){ ?>
                <tr>
                    <td><input type="text" name="sub4" value="<?php echo sprintf('%03d',$c_sub4); ?>" class="inp1" <?php if($c_sub4!=$sub4){?>id="changed" <?php } ?>></td>
                    <td><label><?php echo "$c_sname4"; ?></label><input type="hidden" name="sname4" value="<?php echo "$c_sname4"; ?>"></td>
                    <td><input type="text" name="mrk41" value="<?php if(trim($c_mrk41)=="AB"){echo "$c_mrk41";}else { echo sprintf('%03d',$c_mrk41);} ?>" class="inp1" <?php if($c_mrk41!=$mrk41){?>id="changed" <?php } ?>></td>
                    <td>
                        <input type="text" name="mrk42" value="<?php if(trim($c_mrk42)=="XXX" || trim($c_mrk42)=="AB"){ echo "$c_mrk42";}else{echo sprintf('%03d',$c_mrk42);} ?>" class="inp1" <?php if($c_mrk42!=$mrk42){ if(($c_mrk42==null||$c_mrk42=="XXX")&&($mrk42==null||$mrk42=="XXX")){}else{?>id="changed" <?php } }?>></td>
                    <td>
                        <?php if($c_mrk42=="XXX"){$total = $c_mrk41;}else {$total = intval($c_mrk41) + intval($c_mrk42);} ?>
                        <input type="text" name="mrk43" value="<?php if(trim($total)!="AB"){echo sprintf('%03d',$total);}else{echo "$total";} ?>" class="inp1">
                    </td>
                    <td><input type="text" name="pf4" value="<?php echo $c_pf4; ?>" class="inp1" <?php if($c_pf4!=$pf4){?>id="changed" <?php } ?>></td>
                    <td><label> <?php if(trim($total)!="AB"){include 'includes/mrkt43c.php'; if($f==1 && $total!=="AB"){$mrk4text = mrkt43c($total); echo strtoupper("$mrk4text");} }else{$mrk4text="";}?></label><input type="hidden" name="mrk4text" value="<?php echo strtoupper("$mrk4text"); ?>"></td>
                    <td><input type="text" name="gr4" value="<?php echo "$c_gr4"; ?>" class="inp1" <?php if($c_gr4!=$gr4){?>id="changed" <?php } ?>></td>
                </tr>
                <?php }  ?>
                <?php if($c_sub4==null){ if($c_cat!="C" && $c_cat!="I" && $c_cat!="S" && $c_cat!="T"){?>
                <tr>
                    <td><input type="hidden" name="sub4" value="" class="inp1"></td>
                    <td><input type="hidden" name="sname4" value="" class="inp1"></td>
                    <td><input type="hidden" name="mrk41" value="" class="inp1"></td>
                    <td><input type="hidden" name="mrk42" value="" class="inp1"></td>
                    <td><input type="hidden" name="mrk43" value="" class="inp1"></td>
                    <td><input type="hidden" name="pf4" value="" class="inp1"></td>
                    <td><input type="hidden" name="mrk4text" value="" class="inp1"></td>
                    <td><input type="hidden" name="gr4" value="" class="inp1"></td>
                </tr>
                <?php } else{ ?>
                <tr>
                    <td><input type="text" name="sub4" value="" class="inp1" placeholder="sub4"></td>
                    <td><input type="hidden" name="sname4" value="" class="inp1"></td>
                    <td><input type="text" name="mrk41" value="" class="inp1"></td>
                    <td><input type="text" name="mrk42" value="" class="inp1"></td>
                    <td><input type="hidden" name="mrk43" value="" class="inp1"></td>
                    <td><input type="text" name="pf4" value="" class="inp1"></td>
                    <td><input type="hidden" name="mrk4text" value="" class="inp1"></td>
                    <td><input type="text" name="gr4" value="" class="inp1"></td>
                </tr>
                <?php } } ?>
                <?php if($c_sub5!=null){ ?>
                <tr>
                    <td><input type="text" name="sub5" value="<?php echo sprintf('%03d',$c_sub5); ?>" class="inp1" <?php if($c_sub5!=$sub5){?>id="changed" <?php } ?>></td>
                    <td><label><?php echo "$c_sname5"; ?></label><input type="hidden" name="sname5" value="<?php echo "$c_sname5"; ?>"></td>
                    <td><input type="text" name="mrk51" value="<?php if(trim($c_mrk51)=="AB"){echo "$c_mrk51";}else { echo sprintf('%03d',$c_mrk51);} ?>" class="inp1" <?php if($c_mrk51!=$mrk51){?>id="changed" <?php } ?>></td>
                    <td>
                        <input type="text" name="mrk52" value="<?php if(trim($c_mrk52)=="XXX" || trim($c_mrk52)=="AB"){ echo "$c_mrk52";}else{echo sprintf('%03d',$c_mrk52);} ?>" class="inp1" <?php if($c_mrk52!=$mrk52){ if(($c_mrk52==null||$c_mrk52=="XXX")&&($mrk52==null||$mrk52=="XXX")){}else{?>id="changed" <?php } }?>></td>
                    <td>
                        <?php if($c_mrk52=="XXX"){$total = $c_mrk51;}else {$total = intval($c_mrk51) + intval($c_mrk52);} ?>
                        <input type="text" name="mrk53" value="<?php if(trim($total)!="AB"){echo sprintf('%03d',$total);}else{echo "$total";} ?>" class="inp1">
                    </td>
                    <td><input type="text" name="pf5" value="<?php echo $c_pf5; ?>" class="inp1" <?php if($c_pf5!=$pf5){?>id="changed" <?php } ?>></td>
                    <td>
                        <label> <?php if(trim($total)!="AB"){include 'includes/mrkt53c.php';if($f==1 && $total!=="AB"){ $mrk5text = mrkt53c($total); echo strtoupper("$mrk5text");} }else{$mrk5text="";}?></label><input type="hidden" name="mrk5text" value="<?php echo strtoupper("$mrk5text"); ?>">
                    </td>
                    <td><input type="text" name="gr5" value="<?php echo "$c_gr5"; ?>" class="inp1" <?php if($c_gr5!=$gr5){?>id="changed" <?php } ?>></td>
                </tr>
                <?php }  ?>
                <?php if($c_sub5==null){ if($c_cat!="C" && $c_cat!="I" && $c_cat!="S" && $c_cat!="T"){ ?>
                <tr>
                    <td><input type="hidden" name="sub5" value="" class="inp1"></td>
                    <td><input type="hidden" name="sname5" value="" class="inp1"></td>
                    <td><input type="hidden" name="mrk51" value="" class="inp1"></td>
                    <td><input type="hidden" name="mrk52" value="" class="inp1"></td>
                    <td><input type="hidden" name="mrk53" value="" class="inp1"></td>
                    <td><input type="hidden" name="pf5" value="" class="inp1"></td>
                    <td><input type="hidden" name="mrk5text" value="" class="inp1"></td>
                    <td><input type="hidden" name="gr5" value="" class="inp1"></td>
                </tr>
                <?php } else{ ?>
                <tr>
                    <td><input type="text" name="sub5" value="" class="inp1" placeholder="sub5"></td>
                    <td><input type="hidden" name="sname5" value="" class="inp1"></td>
                    <td><input type="text" name="mrk51" value="" class="inp1"></td>
                    <td><input type="text" name="mrk52" value="" class="inp1"></td>
                    <td><input type="hidden" name="mrk53" value="" class="inp1"></td>
                    <td><input type="text" name="pf5" value="" class="inp1"></td>
                    <td><input type="hidden" name="mrk5text" value="" class="inp1"></td>
                    <td><input type="text" name="gr5" value="" class="inp1"></td>
                </tr>
                <?php } } ?>
                <?php if($c_sub6!=null){ ?>
                <tr>
                    <td><input type="text" name="sub6" value="<?php echo sprintf('%03d',$c_sub6); ?>" class="inp1" <?php if($c_sub6!=$sub6){?>id="changed" <?php } ?>></td>
                    <td><label><?php $row_c_sn6 = mysqli_fetch_array(mysqli_query($conn,"SELECT subname FROM ".$submaster." WHERE sub=".$c_sub6)); $c_sname6 = $row_c_sn6['subname']; echo "$c_sname6"; ?></label><input type="hidden" name="sname6" value="<?php echo "$c_sname6"; ?>"></td>
                    <td><input type="text" name="mrk61" value="<?php if(trim($c_mrk61)=="AB"){echo "$c_mrk61";}else { echo sprintf('%03d',$c_mrk61);} ?>" class="inp1" <?php if($c_mrk61!=$mrk61){?>id="changed" <?php } ?>></td>
                    <td>
                        <input type="text" name="mrk62" value="<?php if(trim($c_mrk62)=="XXX" || trim($c_mrk62)=="AB"){ echo "$c_mrk62";}else{echo sprintf('%03d',$c_mrk62);} ?>" class="inp1" <?php if($c_mrk62!=$mrk62){ if(($c_mrk62==null||$c_mrk62=="XXX")&&($mrk62==null||$mrk62=="XXX")){}else{?>id="changed" <?php } }?>></td>
                    <td>
                        <?php if($c_mrk62=="XXX" || trim($c_mrk62)=="AB"){$total = $c_mrk61;}else {$total = intval($c_mrk61) + intval($c_mrk62);} ?>
                        <input type="text" name="mrk63" value="<?php if(trim($total)!="AB"){echo sprintf('%03d',$total);}else{echo " ";} ?>" class="inp1">
                    </td>
                    <td><input type="text" name="pf6" value="<?php echo $c_pf6; ?>" class="inp1" <?php if($c_pf6!=$pf6){?>id="changed" <?php } ?>></td>
                    <td><label> <?php if(trim($total)!="AB"){include 'includes/mrkt63c.php';if($f==1 && $total!=="AB"){$mrk6text = mrkt63c($total); echo strtoupper("$mrk6text");} }else{$mrk6text="";}?></label><input type="hidden" name="mrk6text" value="<?php echo strtoupper("$mrk6text"); ?>"></td>
                    <td><input type="text" name="gr6" value="<?php echo "$c_gr6"; ?>" class="inp1" <?php if($c_gr6!=$gr6){?>id="changed" <?php } ?>></td>
                </tr>
                <?php }  ?>
                <?php if($c_sub6==null){if($c_cat!="C" && $c_cat!="I" && $c_cat!="S" && $c_cat!="T"){ ?>
                <tr>
                    <td><input type="hidden" name="sub6" value="" class="inp1"></td>
                    <td><input type="hidden" name="sname6" value="" class="inp1"></td>
                    <td><input type="hidden" name="mrk61" value="" class="inp1"></td>
                    <td><input type="hidden" name="mrk62" value="" class="inp1"></td>
                    <td><input type="hidden" name="mrk63" value="" class="inp1"></td>
                    <td><input type="hidden" name="pf6" value="" class="inp1"></td>
                    <td><input type="hidden" name="mrk6text" value="" class="inp1"></td>
                    <td><input type="hidden" name="gr6" value="" class="inp1"></td>
                </tr>
                <?php } else{ ?>
                <tr>
                    <td><input type="text" name="sub6" value="" class="inp1" placeholder="sub6"></td>
                    <td><input type="hidden" name="sname6" value="" class="inp1"></td>
                    <td><input type="text" name="mrk61" value="" class="inp1"></td>
                    <td><input type="text" name="mrk62" value="" class="inp1"></td>
                    <td><input type="hidden" name="mrk63" value="" class="inp1"></td>
                    <td><input type="text" name="pf6" value="" class="inp1"></td>
                    <td><input type="hidden" name="mrk6text" value="" class="inp1"></td>
                    <td><input type="text" name="gr6" value="" class="inp1"></td>
                </tr>
                <?php } }?>
                <?php if($rclass=="x"){if($c_sub7!=null){ ?>
                <tr>
                    <td><input type="text" name="sub7" value="<?php echo sprintf('%03d',$c_sub7); ?>" class="inp1" <?php if($c_sub7!=$sub7){?>id="changed" <?php } ?>></td>
                    <td><label><?php $row_c_sn7 = mysqli_fetch_array(mysqli_query($conn,"SELECT subname FROM ".$submaster." WHERE sub=".$c_sub7)); $c_sname7 = $row_c_sn7['subname']; echo "$c_sname7"; ?></label><input type="hidden" name="sname7" value="<?php echo "$c_sname7"; ?>"></td>
                    <td><input type="text" name="mrk71" value="<?php if(trim($c_mrk71)=="AB"){echo "$c_mrk71";}else { echo sprintf('%03d',$c_mrk71);} ?>" class="inp1" <?php if($c_mrk71!=$mrk71){?>id="changed" <?php } ?>></td>
                    <td>
                        <input type="text" name="mrk72" value="<?php if(trim($c_mrk72)=="XXX" || trim($c_mrk72)=="AB"){ echo "$c_mrk72";}else{echo sprintf('%03d',$c_mrk72);} ?>" class="inp1" <?php if($c_mrk72!=$mrk72){ if(($c_mrk72==null||$c_mrk72=="XXX")&&($mrk72==null||$mrk72=="XXX")){}else{?>id="changed" <?php } }?>></td>
                    <td>
                        <?php if($c_mrk72=="XXX"){$total = $c_mrk71;}else {$total = intval($c_mrk71) + intval($c_mrk72);} ?>
                        <input type="text" name="mrk73" value="<?php if(trim($total)!="AB"){echo sprintf('%03d',$total);}else{echo "$total";} ?>" class="inp1">
                    </td>
                    <td><input type="text" name="pf7" value="<?php echo $c_pf7; ?>" class="inp1" <?php if($c_pf7!=$pf7){?>id="changed" <?php } ?>></td>
                    <td><label> <?php if(trim($total)!="AB"){include 'includes/mrkt73c.php';if($f==1 && $total!=="AB"){$mrk7text = mrkt73c($total); echo strtoupper("$mrk7text");} }else{$mrk7text="";}?></label><input type="hidden" name="mrk7text" value="<?php echo strtoupper("$mrk7text"); ?>"></td>
                    <td><input type="text" name="gr7" value="<?php echo "$c_gr7"; ?>" class="inp1" <?php if($c_gr7!=$gr7){?>id="changed" <?php } ?>></td>
                </tr>
                <?php }  ?>
                <?php if($c_sub7==null){ if($c_cat!="C" && $c_cat!="I" && $c_cat!="S" && $c_cat!="T"){ ?>
                <tr>
                    <td><input type="hidden" name="sub7" value="" class="inp1"></td>
                    <td><input type="hidden" name="sname7" value="" class="inp1"></td>
                    <td><input type="hidden" name="mrk71" value="" class="inp1"></td>
                    <td><input type="hidden" name="mrk72" value="" class="inp1"></td>
                    <td><input type="hidden" name="mrk73" value="" class="inp1"></td>
                    <td><input type="hidden" name="pf7" value="" class="inp1"></td>
                    <td><input type="hidden" name="mrk7text" value="" class="inp1"></td>
                    <td><input type="hidden" name="gr7" value="" class="inp1"></td>
                </tr>
                <?php }else { ?>
                <tr>
                    <td><input type="text" name="sub7" value="" class="inp1" placeholder="sub7"></td>
                    <td><input type="hidden" name="sname7" value="" class="inp1"></td>
                    <td><input type="text" name="mrk71" value="" class="inp1"></td>
                    <td><input type="text" name="mrk72" value="" class="inp1"></td>
                    <td><input type="hidden" name="mrk73" value="" class="inp1"></td>
                    <td><input type="text" name="pf7" value="" class="inp1"></td>
                    <td><input type="hidden" name="mrk7text" value="" class="inp1"></td>
                    <td><input type="text" name="gr7" value="" class="inp1"></td>
                </tr>
                <?php } } }?>
                <?php if($rclass=="xii"){if($c_isub1!=null){?>
                <tr>
                    <td><input type="text" name="isub1" value="<?php echo sprintf('%03d',$c_isub1); ?>" class="inp1" <?php if($c_isub1!=$isub1){?>id="changed" <?php } ?>></td>
                    <td><label><?php $row_c_isn1 = mysqli_fetch_array(mysqli_query($conn,"SELECT subname FROM ".$submaster." WHERE sub=".$c_isub1)); $c_isname1 = $row_c_isn1['subname']; echo "$c_isname1"; ?></label><input type="hidden" name="isname1" value="<?php echo "$c_isname1"; ?>"></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><input type="text" name="igr1" value="<?php echo "$c_igr1"; ?>" class="inp1" <?php if($c_igr1!=$igr1){?>id="changed" <?php } ?>></td>
                </tr>
                <?php }else{if($c_cat!="C" && $c_cat!="I" && $c_cat!="S" && $c_cat!="T"){?>
                <tr>
                    <td><input type="hidden" name="isub1" value="" class="inp1"></td>
                    <td><input type="hidden" name="isname1" value="" class="inp1"></td>
                    <td><input type="hidden" name="igr1" value="" class="inp1"></td>
                </tr>
                <?php }else { ?>
                <tr>
                    <td><input type="text" name="isub1" value="" class="inp1" placeholder="isub3"></td>
                    <td><input type="hidden" name="isname1" value="" class="inp1"></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><input type="text" name="igr1" value="" class="inp1"></td>
                </tr>
                <?php } } ?>
                <?php if($c_isub2!=null){?>
                <tr>
                    <td><input type="text" name="isub2" value="<?php echo sprintf('%03d',$c_isub2); ?>" class="inp1" <?php if($c_isub2!=$isub2){?>id="changed" <?php } ?>></td>
                    <td><label><?php $row_c_isn2 = mysqli_fetch_array(mysqli_query($conn,"SELECT subname FROM ".$submaster." WHERE sub=".$c_isub2)); $c_isname2 = $row_c_isn2['subname']; echo "$c_isname2"; ?></label><input type="hidden" name="isname2" value="<?php echo "$c_isname2"; ?>"></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><input type="text" name="igr2" value="<?php echo "$c_igr2"; ?>" class="inp1" <?php if($c_igr2!=$igr2){?>id="changed" <?php } ?>></td>
                </tr>
                <?php }else{if($c_cat!="C" && $c_cat!="I" && $c_cat!="S" && $c_cat!="T"){?>
                <tr>
                    <td><input type="hidden" name="isub2" value="" class="inp1"></td>
                    <td><input type="hidden" name="isname2" value="" class="inp1"></td>
                    <td><input type="hidden" name="igr2" value="" class="inp1"></td>
                </tr>
                <?php }else { ?>
                <tr>
                    <td><input type="text" name="isub2" value="" class="inp1" placeholder="isub3"></td>
                    <td><input type="hidden" name="isname2" value="" class="inp1"></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><input type="text" name="igr2" value="" class="inp1"></td>
                </tr>
                <?php } } ?>
                <?php if($c_isub3!=null){?>
                <tr>
                    <td><input type="text" name="isub3" value="<?php echo sprintf('%03d',$c_isub3); ?>" class="inp1" <?php if($c_isub3!=$isub3){?>id="changed" <?php } ?>></td>
                    <td><label><?php $row_c_isn3 = mysqli_fetch_array(mysqli_query($conn,"SELECT subname FROM ".$submaster." WHERE sub=".$c_isub3)); $c_isname3 = $row_c_isn3['subname']; echo "$c_isname3"; ?></label><input type="hidden" name="isname3" value="<?php echo "$c_isname3"; ?>"></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><input type="text" name="igr3" value="<?php echo "$c_igr3"; ?>" class="inp1" <?php if($c_igr3!=$igr3){?>id="changed" <?php } ?>></td>
                </tr>
                <?php }else{if($c_cat!="C" && $c_cat!="I" && $c_cat!="S" && $c_cat!="T"){?>
                <tr>
                    <td><input type="hidden" name="isub3" value="" class="inp1"></td>
                    <td><input type="hidden" name="isname3" value="" class="inp1"></td>
                    <td><input type="hidden" name="igr3" value="" class="inp1"></td>
                </tr>
                <?php }else { ?>
                <tr>
                    <td><input type="text" name="isub3" value="" class="inp1" placeholder="isub3"></td>
                    <td><input type="hidden" name="isname3" value="" class="inp1"></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><input type="text" name="igr3" value="" class="inp1"></td>
                </tr>
                <?php } } }?>
            </table>
            <table>
                <tr>
                    <td><label> Result : </label></td>
                    <td><input type="text" name="res" value="<?php echo "$c_res"; ?>" class="inp1" <?php if($c_res!=$res){?>id="changed" <?php } ?>></td>
                    <td></td>
                    <td></td>
                    <td rowspan="2">&nbsp;&nbsp;&nbsp;<input type="text" name="imp" value="<?php echo "$imp"; ?>" class="imp-text"></td>
                </tr>
                <tr>
                    <td><label> Date of Printing : </label></td>
                    <td><input type="text" name="dateofdecl" value="<?php echo "$c_dateofdecl"; ?>" class="inp2" <?php if($c_dateofdecl!=$dateofdecl){?>id="changed" <?php } ?>> </td>
                    <td>/</td>
                    <td><input type="text" name="dateofupdate" value="<?php echo "$dateofupdate"; ?>" class="inp2"></td>
                </tr>
            </table>
            <table hidden>
                <tr>
                    <td><input type="hidden" name="regdno" value="<?php echo "$c_regdno"; ?>"></td>
                    <td><input type="hidden" name="reg" value="<?php echo "$c_reg"; ?>"></td>
                    <td><input type="hidden" name="cat" value="<?php echo "$c_cat"; ?>"></td>
                    <td><input type="hidden" name="sex" value="<?php echo "$c_sex"; ?>"></td>
                    <td><input type="hidden" name="hand" value="<?php echo "$c_hand"; ?>"></td>
                    <td><input type="hidden" name="scst" value="<?php echo "$c_scst"; ?>"></td>
                    <td><input type="hidden" name="tmrk" value="<?php echo "$c_tmrk"; ?>"></td>
                    <td><input type="hidden" name="comptt" value="<?php echo "$c_comptt"; ?>"></td>
                    <td><input type="hidden" name="rlrw" value="<?php echo "$c_rlrw"; ?>"></td>
                    <td><input type="hidden" name="date_rev" value="<?php echo "$c_date_rev"; ?>"></td>
                    <td><input type="hidden" name="state" value="<?php echo "$c_state"; ?>"></td>
                    <td><input type="hidden" name="cent" value="<?php echo "$c_cent"; ?>"></td>
                    <td><input type="hidden" name="schtype" value="<?php echo "$c_schtype"; ?>"></td>
                    <td><input type="hidden" name="admid" value="<?php echo "$c_admid"; ?>"></td>
                    <td><input type="hidden" name="month" value="<?php echo "$c_month"; ?>"></td>
                    <td><input type="hidden" name="rclass" value="<?php echo "$rclass"; ?>"></td>
                    <td><input type="hidden" name="doctype" value="<?php echo "$doctype"; ?>"></td>
                    <td><input type="hidden" name="ryear" value="<?php echo "$ryear"; ?>"></td>
                    <td><input type="hidden" name="rexamtype" value="<?php echo "$rexamtype"; ?>"></td>
                    <td><input type="hidden" name="rollno" value="<?php echo "$rollno"; ?>"></td>
                    <?php if($ryear!="2019"){?>
                    <td><input type="hidden" name="rslt" value="<?php echo "$c_rslt"; ?>"></td>
                    <td><input type="hidden" name="rmk" value="<?php echo "$c_rmk"; ?>"></td>
                    <td><input type="hidden" name="daterev" value="<?php echo "$c_daterev"; ?>"></td>
                    <td><input type="hidden" name="revised" value="<?php echo "$c_revised"; ?>"></td>
                    <?php }if($rclass=="xii"){ ?>
                    <td><input type="hidden" name="stream" value="<?php echo "$c_stream"; ?>"></td>
                    <td><input type="hidden" name="dob" value="<?php echo "$c_dob"; ?>"></td>
                    <?php } if($rclass=="x"){ ?>
                    <td><input type="hidden" name="resremark" value="<?php echo "$c_resremark"; ?>"></td>
                    <td><input type="hidden" name="sent" value="<?php echo "$c_sent"; ?>"></td>
                    <?php } ?>
                </tr>
            </table>
            <button class="btn btn-primary" type="submit" name="update"> Update </button>
            <span><b>Select Document type : </b></span>
                <input type="radio" name="prntype" value="marksheet" <?php if(intval($ryear)>=2011 && intval($ryear)<=2016){echo "hidden";}?> ><label <?php if(intval($ryear)>=2011 && intval($ryear)<=2016){echo "hidden";}?>>Marksheet</label>
                <input type="radio" name="prntype" value="marksheetl" <?php if(intval($ryear)>=2011 && intval($ryear)<=2016){}else{echo "hidden";}?> ><label <?php if(intval($ryear)>=2011 && intval($ryear)<=2016){}else{echo "hidden";}?>>Left Marksheet</label>
                <input type="radio" name="prntype" value="marksheetr" <?php if(intval($ryear)>=2011 && intval($ryear)<=2016){}else{echo "hidden";}?> ><label <?php if(intval($ryear)>=2011 && intval($ryear)<=2016){}else{echo "hidden";}?>>Right Marksheet</label>
                <input type="radio" name="prntype" value="migration" <?php if($doctype=="dublicate"){ echo "hidden"; }?> ><label <?php if($doctype=="dublicate"){ echo "hidden"; }?>>Migration</label>
                <input type="radio" name="prntype" value="passing" <?php if((intval($ryear)>=2011 && intval($ryear)<=2015)||intval($ryear)==2021){echo "hidden";}?>><label <?php if((intval($ryear)>=2011 && intval($ryear)<=2015)||intval($ryear)==2021){echo "hidden";}?> >Passing</label>
                <input type="radio" name="prntype" value="passingl" <?php if((intval($ryear)>=2011 && intval($ryear)<=2015)||intval($ryear)==2021){}else{echo "hidden";}?>><label <?php if((intval($ryear)>=2011 && intval($ryear)<=2015)||intval($ryear)==2021){}else{echo "hidden";}?> >Left Passing</label>
                <input type="radio" name="prntype" value="passingr" <?php if((intval($ryear)>=2011 && intval($ryear)<=2015)||intval($ryear)==2021){}else{echo "hidden";}?>><label <?php if((intval($ryear)>=2011 && intval($ryear)<=2015)||intval($ryear)==2021){}else{echo "hidden";}?> >Right Passing</label>
            <button class="btn btn-success" type="submit" name="print" formaction="printing.php"> Print </button>
        </form>
    </div><?php } ?>
    <div class="f2">
        <div class="form-header">
            <center><span class="text-light bg-dark" style="font-size:20px;">Declared Result</span></center>
            <span style="font-size:25px;float:left;color:red;font-weight:600;"><b><?php if($rexamtype=="m")$exm="MAIN"; if($rexamtype=="c")$exm="COMPARTMENT"; if($rexamtype=="r")$exm="MERGED"; $restype=$ryear." ".$exm." EXAM"; echo $restype; ?></b></span>
        </div>
        <form class="navbar-form navbar-left" style="width:100%;padding:5px;" method="post" action="index.php?mmsection" id="insertdata">
            <table>
                <tr>
                    <td><label> Name of Candidate : </label></td>
                    <td><input type="text" name="cname" value="<?php echo str_replace("'","","$cname"); ?>" class="inp"></td>
                </tr>
                <tr>
                    <td><label> Roll No. : </label></td>
                    <td><label> <?php echo "$rroll"; ?> </label> <input type="hidden" name="rroll" value="<?php echo "$rroll"; ?>" class="inp"></td>
                </tr>
                <tr>
                    <td><label> Mother's Name : </label></td>
                    <td><input type="text" name="mname" value="<?php echo str_replace("'","","$mname"); ?>" class="inp"></td>
                </tr>
                <tr>
                    <td><label> Father's/guardian's Name : </label></td>
                    <td><input type="text" name="fname" value="<?php echo str_replace("'","","$fname"); ?>" class="inp"></td>
                </tr>
                <?php if($rclass=="x"){ $dob = substr($dob,0,2)."-".substr($dob,2,2)."-".substr($dob,4,4); ?>
                <tr>
                    <td><label> Date Of Birth : </label></td>
                    <td><input type="text" name="dob" value="<?php echo "$dob"; ?>" class="inp"></td>
                </tr>
                <?php } ?>
                <tr>
                    <td><label> School : </label></td>
                    <td><input type="text" name="sch" value="<?php echo "$sch"; ?>" class="inp1">
                        <label> <?php
                    $schmaster = "schoolmaster2023";
                    $school = "SELECT * FROM ".$schmaster." WHERE sch_no='".$sch."'";
                    $run_school = mysqli_query($conn,$school);
                    $row_school = mysqli_fetch_array($run_school);
                    if($row_school==null){
                        $schmaster = "schoolmaster2021";
                        $school = "SELECT * FROM ".$schmaster." WHERE nsch_no='".$sch."'";
                        $run_school = mysqli_query($conn,$school);
                        $row_school = mysqli_fetch_array($run_school);
                    }
                    $abbr_name = $row_school['abbr_name'];
                    echo $abbr_name; ?></label></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="hidden" name="abbr_name" value="<?php echo str_replace("'","","$abbr_name"); ?>" class="inp1"></td>
                </tr>
            </table>
            <table>
                <tr>
                    <th class="tg-q9j0">SUB.<br>CODE</th>
                    <th class="tg-q9j0">SUBJECT</th>
                    <th class="tg-q9j0">THEORY</th>
                    <th class="tg-q9j0">PRACTICAL</th>
                    <th class="tg-q9j0">TOTAL</th>
                    <th class="tg-q9j0">TOTAL IN WORDS</th>
                    <th class="tg-q9j0">POSITIONAL<br>GRADE</th>
                </tr>
                <?php
                $submaster = "sub".$rclass.$ryear;
                if($sub1!=null){$row_sn1 = mysqli_fetch_array(mysqli_query($conn,"SELECT subname FROM ".$submaster." WHERE sub=".$sub1));$sname1 = $row_sn1['subname'];}
                if($sub2!=null){$row_sn2 = mysqli_fetch_array(mysqli_query($conn,"SELECT subname FROM ".$submaster." WHERE sub=".$sub2));$sname2 = $row_sn2['subname'];}
                if($sub3!=null){$row_sn3 = mysqli_fetch_array(mysqli_query($conn,"SELECT subname FROM ".$submaster." WHERE sub=".$sub3));$sname3 = $row_sn3['subname'];}
                if($sub4!=null){$row_sn4 = mysqli_fetch_array(mysqli_query($conn,"SELECT subname FROM ".$submaster." WHERE sub=".$sub4));$sname4 = $row_sn4['subname'];}
                if($sub5!=null){$row_sn5 = mysqli_fetch_array(mysqli_query($conn,"SELECT subname FROM ".$submaster." WHERE sub=".$sub5));$sname5 = $row_sn5['subname'];}
                ?>
                <?php if($sub1!=null){ ?>
                <tr>
                    <td><input type="text" name="sub1" value="<?php echo "$sub1"; ?>" class="inp1"></td>
                    <td><label for=""><?php echo "$sname1"; ?></label><input type="hidden" name="sname1" value="<?php echo "$sname1"; ?>"></td>
                    <td><input type="text" name="mrk11" value="<?php echo "$mrk11"; ?>" class="inp1"></td>
                    <td>
                        <?php if($mrk12==null || $mrk12=="XXX"){$mrk12="XXX";} ?>
                        <input type="text" name="mrk12" value="<?php echo "$mrk12"; ?>" class="inp1"></td>
                    <td>
                        <?php if($mrk12=="XXX"){$total = $mrk11;}else {$total = intval($mrk11) + intval($mrk12);} ?>
                        <input type="text" name="mrk13" value="<?php if(trim($total)!="AB"){echo sprintf('%03d',$total);}else{echo "$total";} ?>" class="inp1">
                    </td>
                    <td><label> <?php if(trim($total)!="AB"){include 'includes/mrkt13.php'; $mrk1text = mrkt13($total); echo strtoupper("$mrk1text");} ?></label></td>
                    <td><input type="text" name="gr1" value="<?php echo "$gr1"; ?>" class="inp1"></td>
                </tr>
                <?php } ?>
                <?php if($sub1==null){?>
                <tr>
                    <td><input type="hidden" name="sub1" value="" class="inp1"></td>
                    <td><input type="hidden" name="sname1" value="" class="inp1"></td>
                    <td><input type="hidden" name="mrk11" value="" class="inp1"></td>
                    <td><input type="hidden" name="mrk12" value="" class="inp1"></td>
                    <td><input type="hidden" name="mrk13" value="" class="inp1"></td>
                    <td><input type="hidden" name="gr1" value="" class="inp1"></td>
                </tr>
                <?php } ?>
                <?php if($sub2!=null){?>
                <tr>
                    <td><input type="text" name="sub2" value="<?php echo "$sub2"; ?>" class="inp1"></td>
                    <td><label for=""><?php echo "$sname2"; ?></label><input type="hidden" name="sname2" value="<?php echo "$sname2"; ?>"></td>
                    <td><input type="text" name="mrk21" value="<?php echo "$mrk21"; ?>" class="inp1"></td>
                    <td>
                        <?php if($mrk22==null || $mrk22=="XXX"){$mrk22="XXX";} ?>
                        <input type="text" name="mrk22" value="<?php echo "$mrk22"; ?>" class="inp1"></td>
                    <td>
                        <?php if($mrk22=="XXX"){$total = $mrk21;}else {$total = intval($mrk21) + intval($mrk22);} ?>
                        <input type="text" name="mrk23" value="<?php if(trim($total)!="AB"){echo sprintf('%03d',$total);}else{echo "$total";} ?>" class="inp1">
                    </td>
                    <td><label> <?php if(trim($total)!="AB"){include 'includes/mrkt23.php'; $mrk2text = mrkt23($total); echo strtoupper("$mrk2text");} ?></label></td>
                    <td><input type="text" name="gr2" value="<?php echo "$gr2"; ?>" class="inp1"></td>
                </tr>
                <?php } ?>
                <?php if($sub2==null){?>
                <tr>
                    <td><input type="hidden" name="sub2" value="" class="inp1"></td>
                    <td><input type="hidden" name="sname2" value="" class="inp1"></td>
                    <td><input type="hidden" name="mrk21" value="" class="inp1"></td>
                    <td><input type="hidden" name="mrk22" value="" class="inp1"></td>
                    <td><input type="hidden" name="mrk23" value="" class="inp1"></td>
                    <td><input type="hidden" name="gr2" value="" class="inp1"></td>
                </tr>
                <?php } ?>
                <?php if($sub3!=null){ ?>
                <tr>
                    <td><input type="text" name="sub3" value="<?php echo "$sub3"; ?>" class="inp1"></td>
                    <td><label for=""><?php echo "$sname3"; ?></label><input type="hidden" name="sname3" value="<?php echo "$sname3"; ?>"></td>
                    <td><input type="text" name="mrk31" value="<?php echo "$mrk31"; ?>" class="inp1"></td>
                    <td>
                        <?php if($mrk32==null || $mrk32=="XXX"){$mrk32="XXX";} ?>
                        <input type="text" name="mrk32" value="<?php echo "$mrk32"; ?>" class="inp1"></td>
                    <td>
                        <?php if($mrk32=="XXX"){$total = $mrk31;}else {$total = intval($mrk31) + intval($mrk32);} ?>
                        <input type="text" name="mrk33" value="<?php if(trim($total)!="AB"){echo sprintf('%03d',$total);}else{echo "$total";} ?>" class="inp1">
                    </td>
                    <td><label> <?php if(trim($total)!="AB"){include 'includes/mrkt33.php'; $mrk3text = mrkt33($total); echo strtoupper("$mrk3text");} ?></label></td>
                    <td><input type="text" name="gr3" value="<?php echo "$gr3"; ?>" class="inp1"></td>
                </tr>
                <?php } ?>
                <?php if($sub3==null){?>
                <tr>
                    <td><input type="hidden" name="sub3" value="" class="inp1"></td>
                    <td><input type="hidden" name="sname3" value="" class="inp1"></td>
                    <td><input type="hidden" name="mrk31" value="" class="inp1"></td>
                    <td><input type="hidden" name="mrk32" value="" class="inp1"></td>
                    <td><input type="hidden" name="mrk33" value="" class="inp1"></td>
                    <td><input type="hidden" name="gr3" value="" class="inp1"></td>
                </tr>
                <?php } ?>
                <?php if($sub4!=null){ ?>
                <tr>
                    <td><input type="text" name="sub4" value="<?php echo "$sub4"; ?>" class="inp1"></td>
                    <td><label for=""><?php echo "$sname4"; ?></label><input type="hidden" name="sname4" value="<?php echo "$sname4"; ?>"></td>
                    <td><input type="text" name="mrk41" value="<?php echo "$mrk41"; ?>" class="inp1"></td>
                    <td>
                        <?php if($mrk42==null || $mrk42=="XXX"){$mrk42="XXX";} ?>
                        <input type="text" name="mrk42" value="<?php echo "$mrk42"; ?>" class="inp1"></td>
                    <td>
                        <?php if($mrk42=="XXX"){$total = $mrk41;}else {$total = intval($mrk41) + intval($mrk42);} ?>
                        <input type="text" name="mrk43" value="<?php if(trim($total)!="AB"){echo sprintf('%03d',$total);}else{echo "$total";} ?>" class="inp1">
                    </td>
                    <td><label> <?php if(trim($total)!="AB"){include 'includes/mrkt43.php'; $mrk4text = mrkt43($total); echo strtoupper("$mrk4text");} ?></label></td>
                    <td><input type="text" name="gr4" value="<?php echo "$gr4"; ?>" class="inp1"></td>
                </tr>
                <?php } ?>
                <?php if($sub4==null){ ?>
                <tr>
                    <td><input type="hidden" name="sub4" value="" class="inp1"></td>
                    <td><input type="hidden" name="sname4" value="" class="inp1"></td>
                    <td><input type="hidden" name="mrk41" value="" class="inp1"></td>
                    <td><input type="hidden" name="mrk42" value="" class="inp1"></td>
                    <td><input type="hidden" name="mrk43" value="" class="inp1"></td>
                    <td><input type="hidden" name="gr4" value="" class="inp1"></td>
                </tr>
                <?php } ?>
                <?php if($sub5!=null){ ?>
                <tr>
                    <td><input type="text" name="sub5" value="<?php echo "$sub5"; ?>" class="inp1"></td>
                    <td><label for=""><?php echo "$sname5"; ?></label><input type="hidden" name="sname5" value="<?php echo "$sname5"; ?>"></td>
                    <td><input type="text" name="mrk51" value="<?php echo "$mrk51"; ?>" class="inp1"></td>
                    <td>
                        <?php if($mrk52==null || $mrk52=="XXX"){$mrk52="XXX";} ?>
                        <input type="text" name="mrk52" value="<?php echo "$mrk52"; ?>" class="inp1"></td>
                    <td>
                        <?php if($mrk52=="XXX"){$total = $mrk51;}else {$total = intval($mrk51) + intval($mrk52);} ?>
                        <input type="text" name="mrk53" value="<?php if(trim($total)!="AB"){echo sprintf('%03d',$total);}else{echo "$total";} ?>" class="inp1">
                    </td>
                    <td><label> <?php if(trim($total)!="AB"){include 'includes/mrkt53.php'; $mrk5text = mrkt53($total); echo strtoupper("$mrk5text");} ?></label></td>
                    <td><input type="text" name="gr5" value="<?php echo "$gr5"; ?>" class="inp1"></td>
                </tr>
                <?php } ?>
                <?php if($sub5==null){?>
                <tr>
                    <td><input type="hidden" name="sub5" value="" class="inp1"></td>
                    <td><input type="hidden" name="sname5" value="" class="inp1"></td>
                    <td><input type="hidden" name="mrk51" value="" class="inp1"></td>
                    <td><input type="hidden" name="mrk52" value="" class="inp1"></td>
                    <td><input type="hidden" name="mrk53" value="" class="inp1"></td>
                    <td><input type="hidden" name="gr5" value="" class="inp1"></td>
                </tr>
                <?php } ?>
                <?php if($sub6!=null){ ?>
                <tr>
                    <td><input type="text" name="sub6" value="<?php echo "$sub6"; ?>" class="inp1"></td>
                    <td><label for=""><?php $row_sn6 = mysqli_fetch_array(mysqli_query($conn,"SELECT subname FROM ".$submaster." WHERE sub=".$sub6)); $sname6 = $row_sn6['subname']; echo "$sname6"; ?></label><input type="hidden" name="sname6" value="<?php echo "$sname6"; ?>"></td>
                    <td><input type="text" name="mrk61" value="<?php echo "$mrk61"; ?>" class="inp1"></td>
                    <td>
                        <?php if($mrk62==null || $mrk62=="XXX"){$mrk62="XXX";} ?>
                        <input type="text" name="mrk62" value="<?php echo "$mrk62"; ?>" class="inp1">
                    </td>
                    <td>
                        <?php if($mrk62=="XXX" && $mrk62=="AB"){$total = $mrk61;}else {$total = intval($mrk61) + intval($mrk62);} ?>
                        <input type="text" name="mrk63" value="<?php if(trim($mrk61)!="AB"){echo sprintf('%03d',$total);}else{echo "$total";} ?>" class="inp1">
                    </td>
                    <td><label> <?php if(trim($mrk61)!="AB"){include 'includes/mrkt63.php'; $mrk6text = mrkt63($total); echo strtoupper("$mrk6text");} ?></label></td>
                    <td><input type="text" name="gr6" value="<?php echo "$gr6"; ?>" class="inp1"></td>
                </tr>
                <?php } ?>
                <?php if($sub6==null){ ?>
                <tr>
                    <td><input type="hidden" name="sub6" value="" class="inp1"></td>
                    <td><input type="hidden" name="sname6" value="" class="inp1"></td>
                    <td><input type="hidden" name="mrk61" value="" class="inp1"></td>
                    <td><input type="hidden" name="mrk62" value="" class="inp1"></td>
                    <td><input type="hidden" name="mrk63" value="" class="inp1"></td>
                    <td><input type="hidden" name="gr6" value="" class="inp1"></td>
                </tr>
                <?php } ?>
                <?php if($rclass=="x"){if($sub7!=null){ ?>
                <tr>
                    <td><input type="text" name="sub7" value="<?php echo "$sub7"; ?>" class="inp1"></td>
                    <td><label for=""><?php $row_sn7 = mysqli_fetch_array(mysqli_query($conn,"SELECT subname FROM ".$submaster." WHERE sub=".$sub7)); $sname7 = $row_sn7['subname']; echo "$sname7"; ?></label><input type="hidden" name="sname7" value="<?php echo "$sname7"; ?>"></td>
                    <td><input type="text" name="mrk71" value="<?php echo "$mrk71"; ?>" class="inp1"></td>
                    <td>
                        <?php if($mrk72==null || $mrk72=="XXX"){$mrk72="XXX";} ?>
                        <input type="text" name="mrk72" value="<?php echo "$mrk72"; ?>" class="inp1">
                    </td>
                    <td>
                        <?php if($mrk72=="XXX"){$total = $mrk71;}else {$total = intval($mrk71) + intval($mrk72);} ?>
                        <input type="text" name="mrk73" value="<?php if(trim($total)!="AB"){echo sprintf('%03d',$total);}else{echo "$total";} ?>" class="inp1">
                    </td>
                    <td><label> <?php if(trim($mrk71)!="AB"){include 'includes/mrkt73.php'; $mrk7text = mrkt73($total); echo strtoupper("$mrk7text");} ?></label></td>
                    <td><input type="text" name="gr7" value="<?php echo "$gr7"; ?>" class="inp1"></td>
                </tr>
                <?php } ?>
                <?php if($sub7==null){?>
                <tr>
                    <td><input type="hidden" name="sub7" value="" class="inp1"></td>
                    <td><input type="hidden" name="sname7" value="" class="inp1"></td>
                    <td><input type="hidden" name="mrk71" value="" class="inp1"></td>
                    <td><input type="hidden" name="mrk72" value="" class="inp1"></td>
                    <td><input type="hidden" name="mrk73" value="" class="inp1"></td>
                    <td><input type="hidden" name="gr7" value="" class="inp1"></td>
                </tr>
                <?php } }?>
                <?php if($rclass=="xii"){if($isub1!=null){  if($isub1!="0" && $isub1!="XXX"){?>
                <tr>
                    <td><input type="text" name="isub1" value="<?php echo "$isub1"; ?>" class="inp1"></td>
                    <td><label for=""><?php $row_isn1 = mysqli_fetch_array(mysqli_query($conn,"SELECT subname FROM ".$submaster." WHERE sub=".$isub1)); $isname1 = $row_isn1['subname']; echo "$isname1"; ?></label><input type="hidden" name="isname1" value="<?php echo "$isname1"; ?>"></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><input type="text" name="igr1" value="<?php echo "$igr1"; ?>" class="inp1"></td>
                </tr>
                <?php }else{?>
                <tr>
                    <td><input type="hidden" name="isub1" value="" class="inp1"></td>
                    <td><input type="hidden" name="isname1" value="" class="inp1"></td>
                    <td><input type="hidden" name="igr1" value="" class="inp1"></td>
                </tr>
                <?php } } else{ ?>
                <tr>
                    <td><input type="hidden" name="isub1" value="" class="inp1"></td>
                    <td><input type="hidden" name="isname1" value="" class="inp1"></td>
                    <td><input type="hidden" name="igr1" value="" class="inp1"></td>
                </tr>
                <?php } ?>
                <?php if($isub2!=null){  if($isub2!="0" && $isub2!="XXX"){?>
                <tr>
                    <td><input type="text" name="isub2" value="<?php echo "$isub2"; ?>" class="inp1"></td>
                    <td><label for=""><?php $row_isn2 = mysqli_fetch_array(mysqli_query($conn,"SELECT subname FROM ".$submaster." WHERE sub=".$isub2)); $isname2 = $row_isn2['subname']; echo "$isname2"; ?></label><input type="hidden" name="isname2" value="<?php echo "$isname2"; ?>"></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><input type="text" name="igr2" value="<?php echo "$igr2"; ?>" class="inp1"></td>
                </tr>
                <?php }else{?>
                <tr>
                    <td><input type="hidden" name="isub2" value="" class="inp1"></td>
                    <td><input type="hidden" name="isname2" value="" class="inp1"></td>
                    <td><input type="hidden" name="igr2" value="" class="inp1"></td>
                </tr>
                <?php } }else{ ?>
                <tr>
                    <td><input type="hidden" name="isub2" value="" class="inp1"></td>
                    <td><input type="hidden" name="isname2" value="" class="inp1"></td>
                    <td><input type="hidden" name="igr2" value="" class="inp1"></td>
                </tr>
                <?php } ?>
                <?php if($isub3!==null){ if($isub3!="0" && $isub3!="XXX"){?>
                <tr>
                    <td><input type="text" name="isub3" value="<?php echo "$isub3"; ?>" class="inp1"></td>
                    <td><label for=""><?php $row_isn3 = mysqli_fetch_array(mysqli_query($conn,"SELECT subname FROM ".$submaster." WHERE sub=".$isub3)); $isname3 = $row_isn3['subname']; echo "$isname3"; ?></label><input type="hidden" name="isname3" value="<?php echo "$isname3"; ?>"></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><input type="text" name="igr3" value="<?php echo "$igr3"; ?>" class="inp1"></td>
                </tr>

                <?php }else {?>
                <tr>
                    <td><input type="hidden" name="isub3" value="" class="inp1"></td>
                    <td><input type="hidden" name="isname3" value="" class="inp1"></td>
                    <td><input type="hidden" name="igr3" value="" class="inp1"></td>
                </tr>
                <?php } }else{ ?>
                <tr>
                    <td><input type="hidden" name="isub3" value="" class="inp1"></td>
                    <td><input type="hidden" name="isname3" value="" class="inp1"></td>
                    <td><input type="hidden" name="igr3" value="" class="inp1"></td>
                </tr>
                <?php } } ?>
            </table>
            <table>
                <tr>
                    <td><label> Result : </label></td>
                    <td><input type="text" name="res" value="<?php echo "$res"; ?>" class="inp1"></td>
                    <td rowspan="2">&nbsp;&nbsp;&nbsp;<input type="text" name="imp" value="" class="imp-text"></td>
                </tr>
                <tr>
                    <td><label> Dated : </label></td>
                    <td><input type="text" name="dateofdecl" value="<?php echo "$dateofdecl"; ?>" class="inp"></td>
                    <td></td>
                </tr>
            </table>
            <table hidden>
                <tr>
                    <td><input type="hidden" name="regdno" value="<?php echo "$regdno"; ?>"></td>
                    <td><input type="hidden" name="reg" value="<?php echo "$reg"; ?>"></td>
                    <td><input type="hidden" name="cat" value="<?php echo "$cat"; ?>"></td>
                    <td><input type="hidden" name="sex" value="<?php echo "$sex"; ?>"></td>
                    <td><input type="hidden" name="hand" value="<?php echo "$hand"; ?>"></td>
                    <td><input type="hidden" name="scst" value="<?php echo "$scst"; ?>"></td>
                    <td><input type="hidden" name="pf1" value="<?php echo "$pf1"; ?>"></td>
                    <td><input type="hidden" name="pf2" value="<?php echo "$pf2"; ?>"></td>
                    <td><input type="hidden" name="pf3" value="<?php echo "$pf3"; ?>"></td>
                    <td><input type="hidden" name="pf4" value="<?php echo "$pf4"; ?>"></td>
                    <td><input type="hidden" name="pf5" value="<?php echo "$pf5"; ?>"></td>
                    <td><input type="hidden" name="pf6" value="<?php echo "$pf6"; ?>"></td>
                    <td><input type="hidden" name="tmrk" value="<?php echo "$tmrk"; ?>"></td>
                    <td><input type="hidden" name="comptt" value="<?php echo "$comptt"; ?>"></td>
                    <td><input type="hidden" name="rlrw" value="<?php echo "$rlrw"; ?>"></td>
                    <td><input type="hidden" name="date_rev" value="<?php echo "$date_rev"; ?>"></td>
                    <td><input type="hidden" name="state" value="<?php echo "$state"; ?>"></td>
                    <td><input type="hidden" name="cent" value="<?php echo "$cent"; ?>"></td>
                    <td><input type="hidden" name="schtype" value="<?php echo "$schtype"; ?>"></td>
                    <td><input type="hidden" name="admid" value="<?php echo "$admid"; ?>"></td>
                    <td><input type="hidden" name="month" value="<?php echo "$month"; ?>"></td>
                    <td><input type="hidden" name="rclass" value="<?php echo "$rclass"; ?>"></td>
                    <td><input type="hidden" name="doctype" value="<?php echo "$doctype"; ?>"></td>
                    <td><input type="hidden" name="ryear" value="<?php echo "$ryear"; ?>"></td>
                    <td><input type="hidden" name="rexamtype" value="<?php echo "$rexamtype"; ?>"></td>
                    <td><input type="hidden" name="rollno" value="<?php echo "$rollno"; ?>"></td>
                    <?php if($rclass=="xii"){ ?>
                    <td><input type="hidden" name="stream" value="<?php echo "$stream"; ?>"></td>
                    <td><input type="hidden" name="dob" value="<?php echo "$dob"; ?>"></td>
                    <?php } if($rclass=="x"){ ?>
                    <td><input type="hidden" name="pf7" value="<?php echo "$pf7"; ?>"></td>
                    <td><input type="hidden" name="rslt" value="<?php echo "$rslt"; ?>"></td>
                    <td><input type="hidden" name="rmk" value="<?php echo "$rmk"; ?>"></td>
                    <td><input type="hidden" name="daterev" value="<?php echo "$daterev"; ?>"></td>
                    <td><input type="hidden" name="resremark" value="<?php echo "$resremark"; ?>"></td>
                    <td><input type="hidden" name="revised" value="<?php echo "$revised"; ?>"></td>
                    <td><input type="hidden" name="sent" value="<?php echo "$sent"; ?>"></td>
                    <?php } ?>
                </tr>
            </table>
            <button class="btn btn-primary" type="submit" name="insert" <?php if($f==1){echo "disabled";} ?>> Update </button>
        </form>
    </div>
</div>
<?php }  ?>
<?php if(isset($_POST['rmigprn'])){ ?>
<style>
    .w3-border {
        border-radius: 4px;
        height: 25px;
    }

    .form {
        height: 100%;
        width: 250px;
        margin-left: 250px;
        margin-top: -30px;
    }

    .hide {
        display: none;
    }

    .frame {
        position: absolute;
        height: 100%;
        width: 300px;
        right: 300px;
        top: 300px;
    }

</style>
<div class="content" style="margin-top:-340px;">
<!--
    <center>
        <h1> Bulk Migration </h1>
    </center>
-->
    <div class="add">
        <h4 style="color:red"> Enter Maximum 50 Roll no.'s </h4>
        <input type="text" id="rrollNo" value="">&nbsp;
        <button class="btn btn-primary" type="button" value="Add" onclick="javascript:add();" id="addb"> Add</button>
    </div>
    <div class="form">
        <form action="printing.php" id="reqs" method="post" target="_blank">
            <table>
                <tr>
                    <td><input type="hidden" name="rmigyear" value="<?php echo $rmigyear; ?>"></td>
                    <td><input type="hidden" name="rmigclass" value="<?php echo $rmigclass; ?>"></td>
                    <td><input type="hidden" name="rmigexamtype" value="<?php echo $rmigexamtype; ?>"></td>
                </tr>
            </table>
            <button class="btn btn-primary" type="submit" name="verifymig" formaction="migbulkverify.php" formtarget="verifyroll"> Verify </button>
            <button class="btn btn-primary" type="submit" name="migbulk"> Generate </button>
        </form>
    </div>
    <div class="frame">
        <iframe src="" frameborder="1" name="verifyroll" height="400px" width="300px"></iframe>
        <a href="migration_notesheet.csv" download><button class="btn btn-success" type="button" name="download"> Download Notesheet </button></a>
    </div>
</div>
<?php }  ?>

<script>
    // Get the input field
    var input = document.getElementById("rrollNo");

    // Execute a function when the user releases a key on the keyboard
    input.addEventListener("keyup", function(event) {
        // Number 13 is the "Enter" key on the keyboard
        if (event.keyCode === 13) {
            // Trigger the button element with a click
            document.getElementById("addb").click();
        }
    });
    ///////////////////////////////
    var reqs_id = 0;

    function removeElement(ev) {
        var button = ev.target;
        var field = button.previousSibling;
        var div = button.parentElement;
        div.removeChild(button);
        div.removeChild(field);
    }

    function add() {
        reqs_id++; // increment reqs_id to get a unique ID for the new element
        var rolad = document.getElementById("rrollNo").value;
        //create textbox
        var input = document.createElement('input');
        input.type = "text";
        input.setAttribute("class", "w3-border");
        input.setAttribute('name', 'reqs' + reqs_id);
        input.setAttribute('value', rolad);
        var reqs = document.getElementById("reqs");
        $('#rrollNo').val("");
        //create remove button
        var remove = document.createElement('button');
        remove.type = "button";
        remove.setAttribute("class", "w3-border");
        remove.setAttribute('id', 'reqsr' + reqs_id);
        remove.innerHTML = "Remove";
        remove.onclick = function(e) {
            removeElement(e)
        };
        //append elements
        reqs.appendChild(input);
        reqs.appendChild(remove);
    }

</script>
