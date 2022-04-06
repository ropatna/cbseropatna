<?php
    /* *****************************************************School tab ********************************************************* */
	$searchtext = "";
	$search_in = "";
    $queryCondition = "";
    $sql = "";
    $schsession_in = "";
    if(isset($_POST['schoolsearch'])){
        $search_in = $_POST['searchfor'];
        $searchtext = trim($_POST['searchtext']);
        $schsession_in = $_POST['schsession'];
        switch($search_in){
            case "sch_no" :
                $queryCondition .= " WHERE " . $search_in . " LIKE '" . $searchtext . "%'";
                $sch_count = "SELECT COUNT(sch_no) FROM schoolmaster".substr($schsession_in,0,2).substr($schsession_in,5,2)."  WHERE " . $search_in . " LIKE '" . $searchtext . "%'";
                break;
            case "affno" :
                $queryCondition .= " WHERE " . $search_in . " LIKE '%" . $searchtext . "%'";
                $sch_count = "SELECT COUNT(sch_no) FROM schoolmaster".substr($schsession_in,0,2).substr($schsession_in,5,2)."  WHERE " . $search_in . " LIKE '%" . $searchtext . "%'";
                break;
            case "abbr_name" :
                $queryCondition .= " WHERE " . $search_in . " LIKE '%" . $searchtext . "%'";
                $sch_count = "SELECT COUNT(sch_no) FROM schoolmaster".substr($schsession_in,0,2).substr($schsession_in,5,2)."  WHERE " . $search_in . " LIKE '%" . $searchtext . "%'";
                break;
            case "distt" :
                $queryCondition .= " WHERE " . $search_in . " LIKE '" . $searchtext . "%'";
                $sch_count = "SELECT COUNT(sch_no) FROM schoolmaster".substr($schsession_in,0,2).substr($schsession_in,5,2)."  WHERE " . $search_in . " LIKE '" . $searchtext . "%'";
                break;
            case "state" :
                $queryCondition .= " WHERE " . $search_in . " LIKE '" . $searchtext . "%'";
                $sch_count = "SELECT COUNT(sch_no) FROM schoolmaster".substr($schsession_in,0,2).substr($schsession_in,5,2)."  WHERE " . $search_in . " LIKE '" . $searchtext . "%'";
                break;
            case "add" :
                $queryCondition .= " WHERE add1 LIKE '" . $searchtext . "%' OR add2 LIKE '" . $searchtext . "%' OR add3 LIKE '" . $searchtext . "%' OR add4 LIKE '" . $searchtext . "%' OR add5 LIKE '" . $searchtext . "%'";
                $sch_count = "SELECT COUNT(sch_no) FROM schoolmaster".substr($schsession_in,0,2).substr($schsession_in,5,2)."  WHERE add1 LIKE '" . $searchtext . "%' OR add2 LIKE '" . $searchtext . "%' OR add3 LIKE '" . $searchtext . "%' OR add4 LIKE '" . $searchtext . "%' OR add5 LIKE '" . $searchtext . "%'";
                break;
            case "pin" :
                $queryCondition .= " WHERE " . $search_in . " LIKE '" . $searchtext . "%'";
                $sch_count = "SELECT COUNT(sch_no) FROM schoolmaster".substr($schsession_in,0,2).substr($schsession_in,5,2)."  WHERE " . $search_in . " LIKE '" . $searchtext . "%'";
                break;
            case "status" :
                $queryCondition .= " WHERE " . $search_in . " LIKE '" . $searchtext . "%'";
                $sch_count = "SELECT COUNT(sch_no) FROM schoolmaster".substr($schsession_in,0,2).substr($schsession_in,5,2)."  WHERE " . $search_in . " LIKE '" . $searchtext . "%'";
                break;
            case "all" :
                $searchtext = "";
                $sch_count = "SELECT COUNT(sch_no) FROM schoolmaster".substr($schsession_in,0,2).substr($schsession_in,5,2);
                break;
        }
        $sql = "SELECT * FROM schoolmaster".substr($schsession_in,0,2).substr($schsession_in,5,2)." " . $queryCondition;
        $result = mysqli_query($conn,$sql);
    }
/* *****************************************************LOC & Registration tab ********************************************************* */
    $session_in = "";
    $locsearchtext = "";
    $lsearch_in = "";
    if(isset($_POST['locsearch'])){
        $session_in = $_POST['locsession'];
        $lsearch_in = $_POST['locsearchfor'];
        $locsearchtext = $_POST['locsearchtext'];
        $seldb = $lsearch_in.$session_in;
        $seldb1 = str_replace('-', '', $seldb);
        switch($lsearch_in){
            case "ix" :
                $sql = "SELECT * FROM ".$seldb1." WHERE sch_no=" . $locsearchtext;
                break;
            case "x" :
                $sql = "SELECT * FROM ".$seldb1." WHERE sch_no=" . $locsearchtext;
                break;
            case "xi" :
                $sql = "SELECT * FROM ".$seldb1." WHERE sch_no=" . $locsearchtext;
                break;
            case "xii" :
                $sql = "SELECT * FROM ".$seldb1." WHERE sch_no=" . $locsearchtext;
                break;
        }
        $result = mysqli_query($conn,$sql);
        $can_count = "SELECT COUNT(*) FROM ".$seldb1." WHERE sch_no=" . $locsearchtext;
    }
/* *****************************************************MM Section tab ********************************************************* */
    $doctype = "";
    $ryear = "";
    $rclass = "";
    $rexamtype = "";
    $rollno = "";
    if(isset($_POST['rsearch'])){
        $doctype = $_POST['dtype'];
        $ryear = $_POST['resultyear'];
        $rclass = $_POST['resultclass'];
        $rexamtype = $_POST['rexamtype'];
        $rollno = $_POST['rollno'];
        $sql1 = "SELECT * FROM r".$rclass.$ryear.$rexamtype." WHERE rroll='".$rollno."'";
        $result1 = mysqli_query($conn,$sql1);
        $sql2 = "SELECT * FROM r".$rclass." WHERE rroll='".$rollno."' AND session='".$ryear."' AND rexamtype='".$rexamtype."'";
        $result2 = mysqli_query($conn,$sql2);
        $row = mysqli_fetch_array($result1);
        $row2 = mysqli_fetch_array($result2);
        if($row2==null){$f=0;}else{$f=1;}
    if($f==1){
    $c_cname = $row2['cname'];
    $c_rroll = $row2['rroll'];
    $c_mname = $row2['mname'];
    $c_fname = $row2['fname'];
    $c_sch = $row2['sch'];
    $c_sub1 = $row2['sub1'];
    $c_sub2 = $row2['sub2'];
    $c_sub3 = $row2['sub3'];
    $c_sub4 = $row2['sub4'];
    $c_sub5 = $row2['sub5'];
    $c_sub6 = $row2['sub6'];
    $c_sname1 = $row2['sname1'];
    $c_sname2 = $row2['sname2'];
    $c_sname3 = $row2['sname3'];
    $c_sname4 = $row2['sname4'];
    $c_sname5 = $row2['sname5'];
    $c_sname6 = $row2['sname6'];
    $c_mrk11 = $row2['mrk11'];
    $c_mrk21 = $row2['mrk21'];
    $c_mrk31 = $row2['mrk31'];
    $c_mrk41 = $row2['mrk41'];
    $c_mrk51 = $row2['mrk51'];
    $c_mrk61 = $row2['mrk61'];
    $c_mrk12 = $row2['mrk12'];
    $c_mrk22 = $row2['mrk22'];
    $c_mrk32 = $row2['mrk32'];
    $c_mrk42 = $row2['mrk42'];
    $c_mrk52 = $row2['mrk52'];
    $c_mrk62 = $row2['mrk62'];
    $c_mrk13 = $row2['mrk13'];
    $c_mrk23 = $row2['mrk23'];
    $c_mrk33 = $row2['mrk33'];
    $c_mrk43 = $row2['mrk43'];
    $c_mrk53 = $row2['mrk53'];
    $c_mrk63 = $row2['mrk63'];
    $c_gr1 = $row2['gr1'];
    $c_gr2 = $row2['gr2'];
    $c_gr3 = $row2['gr3'];
    $c_gr4 = $row2['gr4'];
    $c_gr5 = $row2['gr5'];
    $c_gr6 = $row2['gr6'];
    $c_res = $row2['res'];
    if($rclass=="xii"){
        $c_isub1 = $row2['isub1'];
        $c_isub2 = $row2['isub2'];
        $c_isub3 = $row2['isub3'];
        $c_isname1 = $row2['isname1'];
        $c_isname2 = $row2['isname2'];
        $c_isname3 = $row2['isname3'];
        $c_igr1 = $row2['igr1'];
        $c_igr2 = $row2['igr2'];
        $c_igr3 = $row2['igr3'];
        $c_stream = $row2['stream'];
    }
        if($rclass=="x"){
            $c_pf7 = $row2['pf7'];
            $c_gr7 = $row2['gr7'];
            $c_mrk73 = $row2['mrk73'];
            $c_mrk72 = $row2['mrk72'];
            $c_mrk71 = $row2['mrk71'];
            $c_sname7 = $row2['sname7'];
            $c_sub7 = $row2['sub7'];
            $c_rslt = $row2['rslt'];
            $c_rmk = $row2['rmk'];
            $c_daterev = $row2['daterev'];
            $c_resremark = $row2['resremark'];
            $c_revised = $row2['revised'];
            $c_sent = $row2['sent'];
        }
    $c_dateofdecl = $row2['dateofdecl'];
    $dateofupdate = $row2['dateofupdate'];
    $c_reg = $row2['reg'];
    $c_cat = $row2['cat'];
    $c_dob = $row2['dob'];
    $c_sex = $row2['sex'];
    $c_hand = $row2['hand'];
    $c_scst = $row2['scst'];
    $c_pf1 = $row2['pf1'];
    $c_pf2 = $row2['pf2'];
    $c_pf3 = $row2['pf3'];
    $c_pf4 = $row2['pf4'];
    $c_pf5 = $row2['pf5'];
    $c_pf6 = $row2['pf6'];
    $c_tmrk = $row2['tmrk'];
    $c_comptt = $row2['comptt'];
    $c_res = $row2['res'];
    $c_regdno = $row2['regdno'];
    $c_rlrw = $row2['rlrw'];
    $c_date_rev = $row2['date_rev'];
    $c_state = $row2['state'];
    $c_cent = $row2['cent'];
    $c_schtype = $row2['schtype'];
    $c_admid = $row2['admid'];
    $c_month = $row2['month'];
    $imp = $row2['imp'];
    }

    if(!$result1==null){
        $cname = $row['cname'];
        $rroll = $row['rroll'];
        $mname = $row['mname'];
        $fname = $row['fname'];
        $sch = $row['sch'];
        $sub1 = $row['sub1'];
        $sub2 = $row['sub2'];
        $sub3 = $row['sub3'];
        $sub4 = $row['sub4'];
        $sub5 = $row['sub5'];
        $sub6 = $row['sub6'];
        $mrk11 = $row['mrk11'];
        $mrk21 = $row['mrk21'];
        $mrk31 = $row['mrk31'];
        $mrk41 = $row['mrk41'];
        $mrk51 = $row['mrk51'];
        $mrk61 = $row['mrk61'];
        $mrk12 = $row['mrk12'];
        $mrk22 = $row['mrk22'];
        $mrk32 = $row['mrk32'];
        $mrk42 = $row['mrk42'];
        $mrk52 = $row['mrk52'];
        $mrk62 = $row['mrk62'];
        $mrk13 = $row['mrk13'];
        $mrk23 = $row['mrk23'];
        $mrk33 = $row['mrk33'];
        $mrk43 = $row['mrk43'];
        $mrk53 = $row['mrk53'];
        $mrk63 = $row['mrk63'];
        $gr1 = $row['gr1'];
        $gr2 = $row['gr2'];
        $gr3 = $row['gr3'];
        $gr4 = $row['gr4'];
        $gr5 = $row['gr5'];
        $gr6 = $row['gr6'];
        $res = $row['res'];
        if($rclass=="xii"){
            $isub1 = $row['isub1'];
            $isub2 = $row['isub2'];
            $isub3 = $row['isub3'];
            $igr1 = $row['igr1'];
            $igr2 = $row['igr2'];
            $igr3 = $row['igr3'];
            $stream = $row['stream'];
        }
        if($rclass=="x"){
            $pf7 = $row['pf7'];
            $gr7 = $row['gr7'];
            $mrk73 = $row['mrk73'];
            $mrk72 = $row['mrk72'];
            $mrk71 = $row['mrk71'];
            $sub7 = $row['sub7'];
        }
        $dateofdecl = $row['dateofdecl'];
        $reg = $row['reg'];
        $cat = $row['cat'];
        $dob = $row['dob'];
        $sex = $row['sex'];
        $hand = $row['hand'];
        $scst = $row['scst'];
        $pf1 = $row['pf1'];
        $pf2 = $row['pf2'];
        $pf3 = $row['pf3'];
        $pf4 = $row['pf4'];
        $pf5 = $row['pf5'];
        $pf6 = $row['pf6'];
        $tmrk = $row['tmrk'];
        $comptt = $row['comptt'];
        $res = $row['res'];
        $regdno = $row['regdno'];
        $rlrw = $row['rlrw'];
        $date_rev = $row['date_rev'];
        $state = $row['state'];
        $cent = $row['cent'];
        $schtype = $row['schtype'];
        $admid = $row['admid'];
        $month = $row['month'];
        if($ryear!="2019"){
        $rslt = $row['rslt'];
        $rmk = $row['rmk'];
        $daterev = $row['daterev'];
        $revised = $row['revised'];
        }
        $resremark = $row['resremark'];
        $sent = $row['sent'];
        }
    }

    if(isset($_POST['insert'])){
        $rclass = $_POST['rclass'];
        $doctype = $_POST['doctype'];
        $ryear = $_POST['ryear'];
        $rexamtype = $_POST['rexamtype'];
        $rollno = $_POST['rollno'];
        if($rclass=="xii"){
            $insert = "INSERT INTO rxii (reg,sch,rroll,cat,cname,mname,fname,dob,sex,hand,scst,sub1,sname1,mrk11,mrk12,mrk13,pf1,gr1,sub2,sname2,mrk21,mrk22,mrk23,pf2,gr2,sub3,sname3,mrk31,mrk32,mrk33,pf3,gr3,sub4,sname4,mrk41,mrk42,mrk43,pf4,gr4,sub5,sname5,mrk51,mrk52,mrk53,pf5,gr5,sub6,sname6,mrk61,mrk62,mrk63,pf6,gr6,isub1,isname1,igr1,isub2,isname2,igr2,isub3,isname3,igr3,tmrk,comptt,res,regdno,rlrw,date_rev,stream,abbr_name,state,cent,schtype,admid,month,dateofdecl,imp,dateofupdate,session,rexamtype) VALUES ('".$_POST["reg"]."','".$_POST["sch"]."','".$_POST["rroll"]."','".$_POST["cat"]."','".$_POST["cname"]."','".$_POST["mname"]."','".$_POST["fname"]."','".$_POST["dob"]."','".$_POST["sex"]."','".$_POST["hand"]."','".$_POST["scst"]."','".$_POST["sub1"]."','".$_POST["sname1"]."','".$_POST["mrk11"]."','".$_POST["mrk12"]."','".$_POST["mrk13"]."','".$_POST["pf1"]."','".$_POST["gr1"]."','".$_POST["sub2"]."','".$_POST["sname2"]."','".$_POST["mrk21"]."','".$_POST["mrk22"]."','".$_POST["mrk23"]."','".$_POST["pf2"]."','".$_POST["gr2"]."','".$_POST["sub3"]."','".$_POST["sname3"]."','".$_POST["mrk31"]."','".$_POST["mrk32"]."','".$_POST["mrk33"]."','".$_POST["pf3"]."','".$_POST["gr3"]."','".$_POST["sub4"]."','".$_POST["sname4"]."','".$_POST["mrk41"]."','".$_POST["mrk42"]."','".$_POST["mrk43"]."','".$_POST["pf4"]."','".$_POST["gr4"]."','".$_POST["sub5"]."','".$_POST["sname5"]."','".$_POST["mrk51"]."','".$_POST["mrk52"]."','".$_POST["mrk53"]."','".$_POST["pf5"]."','".$_POST["gr5"]."','".$_POST["sub6"]."','".$_POST["sname6"]."','".$_POST["mrk61"]."','".$_POST["mrk62"]."','".$_POST["mrk63"]."','".$_POST["pf6"]."','".$_POST["gr6"]."','".$_POST["isub1"]."','".$_POST["isname1"]."','".$_POST["igr1"]."','".$_POST["isub2"]."','".$_POST["isname2"]."','".$_POST["igr2"]."','".$_POST["isub3"]."','".$_POST["isname3"]."','".$_POST["igr3"]."','".$_POST['tmrk']."','".$_POST["comptt"]."','".$_POST["res"]."','".$_POST["regdno"]."','".$_POST["rlrw"]."','".$_POST["date_rev"]."','".$_POST["stream"]."','".$_POST["abbr_name"]."','".$_POST["state"]."','".$_POST["cent"]."','".$_POST["schtype"]."','".$_POST["admid"]."','".$_POST["month"]."','".$_POST["dateofdecl"]."','".$_POST["imp"]."',DATE(NOW()),'$ryear','$rexamtype')";
            $run_insert  = mysqli_query($conn,$insert);
            }

        if($rclass=="x"){
            $insert1 = "INSERT INTO rx (reg,sch,abbr_name,rroll,dateofupdate,session,rexamtype,cname,mname,fname,cent,cat,sex,scst,hand,sub1,sname1,mrk11,mrk12,mrk13,pf1,gr1,sub2,sname2,mrk21,mrk22,mrk23,pf2,gr2,sub3,sname3,mrk31,mrk32,mrk33,pf3,gr3,sub4,sname4,mrk41,mrk42,mrk43,pf4,gr4,sub5,sname5,mrk51,mrk52,mrk53,pf5,gr5,sub6,sname6,mrk61,mrk62,mrk63,pf6,gr6,sub7,sname7,mrk71,mrk72,mrk73,pf7,gr7,tmrk,comptt,rslt,res,rlrw,date_rev,rmk,state,schtype,daterev,regdno,admid,month,dateofdecl,imp,resremark,dob,revised,sent) VALUES ('".$_POST["reg"]."','".$_POST["sch"]."','".$_POST["abbr_name"]."','".$_POST["rroll"]."',DATE(NOW()),'".$_POST["ryear"]."','".$_POST["rexamtype"]."','".$_POST["cname"]."','".$_POST["mname"]."','".$_POST["fname"]."','".$_POST["cent"]."','".$_POST["cat"]."','".$_POST["sex"]."','".$_POST["scst"]."','".$_POST["hand"]."','".$_POST["sub1"]."','".$_POST["sname1"]."','".$_POST["mrk11"]."','".$_POST["mrk12"]."','".$_POST["mrk13"]."','".$_POST["pf1"]."','".$_POST["gr1"]."','".$_POST["sub2"]."','".$_POST["sname2"]."','".$_POST["mrk21"]."','".$_POST["mrk22"]."','".$_POST["mrk23"]."','".$_POST["pf2"]."','".$_POST["gr2"]."','".$_POST["sub3"]."','".$_POST["sname3"]."','".$_POST["mrk31"]."','".$_POST["mrk32"]."','".$_POST["mrk33"]."','".$_POST["pf3"]."','".$_POST["gr3"]."','".$_POST["sub4"]."','".$_POST["sname4"]."','".$_POST["mrk41"]."','".$_POST["mrk42"]."','".$_POST["mrk43"]."','".$_POST["pf4"]."','".$_POST["gr4"]."','".$_POST["sub5"]."','".$_POST["sname5"]."','".$_POST["mrk51"]."','".$_POST["mrk52"]."','".$_POST["mrk53"]."','".$_POST["pf5"]."','".$_POST["gr5"]."','".$_POST["sub6"]."','".$_POST["sname6"]."','".$_POST["mrk61"]."','".$_POST["mrk62"]."','".$_POST["mrk63"]."','".$_POST["pf6"]."','".$_POST["gr6"]."','".$_POST["sub7"]."','".$_POST["sname7"]."','".$_POST["mrk71"]."','".$_POST["mrk72"]."','".$_POST["mrk73"]."','".$_POST["pf7"]."','".$_POST["gr7"]."','".$_POST["tmrk"]."','".$_POST["comptt"]."','".$_POST["rslt"]."','".$_POST["res"]."','".$_POST["rlrw"]."','".$_POST["date_rev"]."','".$_POST["rmk"]."','".$_POST["state"]."','".$_POST["schtype"]."','".$_POST["daterev"]."','".$_POST["regdno"]."','".$_POST["admid"]."','".$_POST["month"]."','".$_POST["dateofdecl"]."','".$_POST["imp"]."','".$_POST["resremark"]."','".$_POST['dob']."','".$_POST['revised']."','".$_POST['sent']."')";
            $run_insert1  = mysqli_query($conn,$insert1);
        }
    }
    if(isset($_POST['update'])){
        $rclass = $_POST['rclass'];
        $doctype = $_POST['doctype'];
        $ryear = $_POST['ryear'];
        $rexamtype = $_POST['rexamtype'];
        $rollno = $_POST['rollno'];
        if($rclass=="xii"){
            $update = "UPDATE r".$rclass." SET sch='".$_POST["sch"]."',rroll='".$_POST["rroll"]."',cname='".$_POST["cname"]."',mname='".$_POST["mname"]."',fname='".$_POST["fname"]."',sub1='".$_POST["sub1"]."',mrk11='".$_POST["mrk11"]."',mrk12='".$_POST["mrk12"]."',pf1='".$_POST["pf1"]."',gr1='".$_POST["gr1"]."',sub2='".$_POST["sub2"]."',mrk21='".$_POST["mrk21"]."',mrk22='".$_POST["mrk22"]."',pf2='".$_POST["pf2"]."',gr2='".$_POST["gr2"]."',sub3='".$_POST["sub3"]."',mrk31='".$_POST["mrk31"]."',mrk32='".$_POST["mrk32"]."',pf3='".$_POST["pf3"]."',gr3='".$_POST["gr3"]."',sub4='".$_POST["sub4"]."',mrk41='".$_POST["mrk41"]."',mrk42='".$_POST["mrk42"]."',pf4='".$_POST["pf4"]."',gr4='".$_POST["gr4"]."',sub5='".$_POST["sub5"]."',mrk51='".$_POST["mrk51"]."',mrk52='".$_POST["mrk52"]."',pf5='".$_POST["pf5"]."',gr5='".$_POST["gr5"]."',sub6='".$_POST["sub6"]."',mrk61='".$_POST["mrk61"]."',mrk62='".$_POST["mrk62"]."',pf6='".$_POST["pf6"]."',gr6='".$_POST["gr6"]."',isub1='".$_POST["isub1"]."',igr1='".$_POST["igr1"]."',isub2='".$_POST["isub2"]."',igr2='".$_POST["igr2"]."',isub3='".$_POST["isub3"]."',igr3='".$_POST["igr3"]."',res='".$_POST["res"]."',dateofdecl='".$_POST["dateofdecl"]."',imp='".$_POST["imp"]."',dateofupdate=DATE(NOW()) WHERE rroll=".$rollno." AND session='".$ryear."' AND rexamtype='".$rexamtype."'";
        }
        if($rclass=="x"){
            $update = "UPDATE r".$rclass." SET sch='".$_POST["sch"]."',rroll='".$_POST["rroll"]."',cname='".$_POST["cname"]."',mname='".$_POST["mname"]."',fname='".$_POST["fname"]."',dob='".$_POST["dob"]."',sub1='".$_POST["sub1"]."',mrk11='".$_POST["mrk11"]."',mrk12='".$_POST["mrk12"]."',pf1='".$_POST["pf1"]."',gr1='".$_POST["gr1"]."',sub2='".$_POST["sub2"]."',mrk21='".$_POST["mrk21"]."',mrk22='".$_POST["mrk22"]."',pf2='".$_POST["pf2"]."',gr2='".$_POST["gr2"]."',sub3='".$_POST["sub3"]."',mrk31='".$_POST["mrk31"]."',mrk32='".$_POST["mrk32"]."',pf3='".$_POST["pf3"]."',gr3='".$_POST["gr3"]."',sub4='".$_POST["sub4"]."',mrk41='".$_POST["mrk41"]."',mrk42='".$_POST["mrk42"]."',pf4='".$_POST["pf4"]."',gr4='".$_POST["gr4"]."',sub5='".$_POST["sub5"]."',mrk51='".$_POST["mrk51"]."',mrk52='".$_POST["mrk52"]."',pf5='".$_POST["pf5"]."',gr5='".$_POST["gr5"]."',sub6='".$_POST["sub6"]."',mrk61='".$_POST["mrk61"]."',mrk62='".$_POST["mrk62"]."',pf6='".$_POST["pf6"]."',gr6='".$_POST["gr6"]."',sub7='".$_POST["sub7"]."',mrk71='".$_POST["mrk71"]."',mrk72='".$_POST["mrk72"]."',pf7='".$_POST["pf7"]."',gr7='".$_POST["gr7"]."',res='".$_POST["res"]."',dateofdecl='".$_POST["dateofdecl"]."',imp='".$_POST["imp"]."',dateofupdate=DATE(NOW()) WHERE rroll=".$rollno." AND session='".$ryear."' AND rexamtype='".$rexamtype."'";
        }
        $run_update  = mysqli_query($conn,$update);
    }
    $rmigyear = "";
    $rmigclass = "";
    $rmigexamtype = "";
    if(isset($_POST['rmigprn'])){
        $rmigyear = $_POST['rmigyear'];
        $rmigclass = $_POST['rmigclass'];
        $rmigexamtype = $_POST['rmigexamtype'];
    }
    /* *****************************************************Exam Section tab ********************************************************* */
    $exammigyear = "";
    $exammigclass = "";
    $exammigexamtype = "";
    $roll = "";
    $align = "";
    /* *****************************************************Exam Report tab ********************************************************* */
    $dcssearch="";
    $dcsyear="";
    $dcstext = "";
	$dcssearch = "";
    $qcn = "";
    $dcssql="";
    if(isset($_POST['dcsfind'])){
        $dcssearch = $_POST['dcssearch'];
        $dcstext = trim($_POST['dcstext']);
        $dcsyear = $_POST['dcsyear'];
        switch($dcssearch){
            case "date" :
                $qcn .= "WHERE " . $dcssearch . "='" . $dcstext . "'";
                $cen_count = "SELECT COUNT(distinct cen_no) FROM dcs".$dcsyear."c WHERE " . $dcssearch . "='" . $dcstext . "'";
                $tot_count = "SELECT COUNT(*) FROM dcs".$dcsyear."c WHERE " . $dcssearch . "='" . $dcstext . "'";
                break;
            case "cen_no" :
                $qcn .= "WHERE " . $dcssearch . "='" . $dcstext . "'";
                $cen_count = "SELECT COUNT(distinct cen_no) FROM dcs".$dcsyear."c WHERE " . $dcssearch . "='" . $dcstext . "'";
                $tot_count = "SELECT COUNT(*) FROM dcs".$dcsyear."c WHERE " . $dcssearch . "='" . $dcstext . "'";
                break;
            case "csch_no" :
                $qcn .= "WHERE " . $dcssearch . "='" . $dcstext . "'";
                $cen_count = "SELECT COUNT(distinct cen_no) FROM dcs".$dcsyear."c WHERE " . $dcssearch . "='" . $dcstext . "'";
                $tot_count = "SELECT COUNT(*) FROM dcs".$dcsyear."c WHERE " . $dcssearch . "='" . $dcstext . "'";
                break;
            case "cdistt" :
                $qcn .= "WHERE " . $dcssearch . " LIKE '%" . $dcstext . "%'";
                $cen_count = "SELECT COUNT(distinct cen_no) FROM dcs".$dcsyear."c WHERE " . $dcssearch . " LIKE '%" . $dcstext . "%'";
                $tot_count = "SELECT COUNT(*) FROM dcs".$dcsyear."c WHERE " . $dcssearch . " LIKE '%" . $dcstext . "%'";
                break;
            case "all" :
                $dcstext = "";
                $cen_count = "SELECT COUNT(distinct cen_no) FROM dcs".$dcsyear."c";
                $tot_count = "SELECT COUNT(*) FROM dcs".$dcsyear."c";
                break;
        }
        $dcssql = "SELECT * FROM dcs".$dcsyear."c " . $qcn;
        $dcs = mysqli_query($conn,$dcssql);
    }
    /* *****************************************************Center Notification tab ********************************************************* */
	$centext = "";
	$ssearch_in = "";
    $queryCon = "";
    $cen = "";
    $year = "";
    $examtype = "";
    if(isset($_POST['censearch'])){
        $year = $_POST['year'];
        $examtype = $_POST['examtype'];
        $ssearch_in = $_POST['searchcen'];
        $centext = $_POST['centext'];
        switch($ssearch_in){
            case "cen_no" :
                $queryCon .= " WHERE ".$ssearch_in."='".$centext."'";
                $cencount = "SELECT COUNT(DISTINCT `cen_no`) FROM center".$year.$examtype." WHERE ".$ssearch_in."='".$centext."'";
                break;
            case "cabbr_name" :
                $queryCon .= " WHERE ".$ssearch_in." LIKE '%" . $centext . "%'";
                $cencount = "SELECT COUNT(DISTINCT `cen_no`) FROM center".$year.$examtype." WHERE cabbr_name LIKE '%" . $centext . "%'";
                break;
            case "sabbr_name" :
                $queryCon .= " WHERE cen_no=(SELECT cen_no FROM center".$year.$examtype." WHERE sabbr_name LIKE '%" . $centext . "%')";
                $cencount = "SELECT COUNT(DISTINCT `cen_no`) FROM center".$year.$examtype." WHERE sabbr_name LIKE '%" . $centext . "%'";
                break;
            case "centdist" :
                $queryCon .= " WHERE " . $ssearch_in . "='" . $centext."'";
                $cencount = "SELECT COUNT(DISTINCT `cen_no`) FROM center".$year.$examtype." WHERE ".$ssearch_in."='".$centext."'";
                break;
            case "schdist" :
                $queryCon .= " WHERE " . $ssearch_in . "='" . $centext."'";
                $cencount = "SELECT COUNT(DISTINCT `cen_no`) FROM center".$year.$examtype." WHERE ".$ssearch_in."='".$centext."'";
                break;
            case "censchstat" :
                $queryCon .= " WHERE " . $ssearch_in . "='" . $centext."'";
                $cencount = "SELECT COUNT(DISTINCT `cen_no`) FROM center".$year.$examtype." WHERE ".$ssearch_in."='".$centext."'";
                break;
            case "schstate" :
                $queryCon .= " WHERE " . $ssearch_in . "='" . $centext."'";
                $cencount = "SELECT COUNT(DISTINCT `cen_no`) FROM center".$year.$examtype." WHERE ".$ssearch_in."='".$centext."'";
                break;
            case "censchtype" :
                $queryCon .= " WHERE " . $ssearch_in . "='" . $centext."'";
                $cencount = "SELECT COUNT(DISTINCT `cen_no`) FROM center".$year.$examtype." WHERE ".$ssearch_in."='".$centext."'";
                break;
            case "schschtype" :
                $queryCon .= " WHERE cen_no IN (SELECT cen_no FROM center".$year.$examtype." WHERE " . $ssearch_in . "='" . $centext."')";
                $cencount = "SELECT COUNT(DISTINCT `cen_no`) FROM center".$year.$examtype." WHERE ".$ssearch_in."='".$centext."'";
                break;
            case "school" :
                $queryCon .= " WHERE cen_no=(SELECT cen_no FROM center".$year.$examtype." WHERE nsch_no='" . $centext . "' OR sch_no='".$centext."')";
                $cencount = "SELECT COUNT(DISTINCT `cen_no`) FROM center".$year.$examtype." WHERE nsch_no='" . $centext . "' OR sch_no='".$centext."'";
                break;
            case "self" :
                $queryCon .= " WHERE cen_no IN (SELECT cen_no FROM center".$year.$examtype." WHERE sch_no=cen_sch_no OR nsch_no=ncen_sch_no)";
                $cencount = "SELECT COUNT(DISTINCT `cen_no`) FROM center".$year.$examtype." WHERE sch_no=cen_sch_no OR nsch_no=ncen_sch_no";
                break;
            case "private" :
                $queryCon .= " WHERE cen_no IN (SELECT cen_no FROM center".$year.$examtype." WHERE sch_no='99999')";
                $cencount = "SELECT COUNT(DISTINCT `cen_no`) FROM center".$year.$examtype." WHERE sch_no='99999'";
                break;
            case "all" :
                $centext = "";
                $cencount = "SELECT COUNT(DISTINCT `cen_no`) FROM center".$year.$examtype;
                break;
        }
        $cen = "SELECT * FROM center".$year.$examtype.$queryCon;
        $runcen = mysqli_query($conn,$cen);
    }
/* *****************************************************Subjects tab ********************************************************* */
    $subyear = "";
    $subclass = "";
    $sub = "";
    if(isset($_POST['subsearch'])){
        $subyear = $_POST['subyear'];
        $subclass = $_POST['subclass'];
        $sub = "SELECT * FROM sub".$subclass.$subyear;
        $runsub = mysqli_query($conn,$sub);
        $cntr = mysqli_num_rows($runsub);
    }
/* *****************************************************HE List tab ********************************************************* */
    $heyear = "";
    $heexamtype = "";
    $hetext = "";
    $he = "";
    $querycn = "";
    $hesearch_in = "";
    if(isset($_POST['hesearch'])){
        $heyear = $_POST['heyear'];
        $heexamtype = $_POST['heexamtype'];
        $hetext = $_POST['hetext'];
        $hesearch_in = $_POST['searchhe'];
        if($hesearch_in=="grouphesub"){
            $hesub10 = "SELECT heclass,hesub,COUNT(*) FROM he".$heyear.$heexamtype." WHERE heclass='10' GROUP BY hesub ORDER BY heclass,hesub ASC";
            $run_hesub10 = mysqli_query($conn,$hesub10);
            $hesub12 = "SELECT heclass,hesub,COUNT(*) FROM he".$heyear.$heexamtype." WHERE heclass='12' GROUP BY hesub ORDER BY heclass,hesub ASC";
            $run_hesub12 = mysqli_query($conn,$hesub12);
        }elseif($hesearch_in=="grouphedist"){
            $hedist10 = "SELECT heclass,hedist,COUNT(*) FROM he".$heyear.$heexamtype." WHERE heclass='10' GROUP BY hedist ORDER BY hestate,hedist ASC";
            $run_hedist10 = mysqli_query($conn,$hedist10);
            $hedist12 = "SELECT heclass,hedist,COUNT(*) FROM he".$heyear.$heexamtype." WHERE heclass='12' GROUP BY hedist ORDER BY hestate,hedist ASC";
            $run_hedist12 = mysqli_query($conn,$hedist12);
        }else{
            switch($hesearch_in){
            case "uid" :
                $querycn .= " WHERE ".$hesearch_in."='".$hetext."'";
                $querycnter = "SELECT COUNT(*) FROM he".$heyear.$heexamtype." WHERE ".$hesearch_in."='".$hetext."'";
                break;
            case "heno" :
                $querycn .= " WHERE ".$hesearch_in."='".$hetext."'";
                $querycnter = "SELECT COUNT(*) FROM he".$heyear.$heexamtype." WHERE ".$hesearch_in."='".$hetext."'";
                break;
            case "cnssch_no" :
                $querycn .= " WHERE ".$hesearch_in."='".$hetext."'";
                $querycnter = "SELECT COUNT(*) FROM he".$heyear.$heexamtype." WHERE ".$hesearch_in."='".$hetext."'";
                break;
            case "cnsdist" :
                $querycn .= " WHERE ".$hesearch_in."='".$hetext."'";
                $querycnter = "SELECT COUNT(*) FROM he".$heyear.$heexamtype." WHERE ".$hesearch_in."='".$hetext."'";
                break;
            case "cnsstate" :
                $querycn .= " WHERE ".$hesearch_in."='".$hetext."'";
                $querycnter = "SELECT COUNT(*) FROM he".$heyear.$heexamtype." WHERE ".$hesearch_in."='".$hetext."'";
                break;
            case "class10" :
                $hetext = "";
                $querycn .= " WHERE heclass='10'";
                $querycnter = "SELECT COUNT(*) FROM he".$heyear.$heexamtype." WHERE heclass='10'";
                break;
            case "class12" :
                $hetext = "";
                $querycn .= " WHERE heclass='12'";
                $querycnter = "SELECT COUNT(*) FROM he".$heyear.$heexamtype." WHERE heclass='12'";
                break;
            case "all" :
                $hetext = "";
                $querycnter = "SELECT COUNT(*) FROM he".$heyear.$heexamtype;
                break;
            }
            $he = "SELECT * FROM he".$heyear.$heexamtype.$querycn;
            $runhe = mysqli_query($conn,$he);
            $rowcnter = mysqli_fetch_array(mysqli_query($conn,$querycnter));
            $cnter = $rowcnter['COUNT(*)'];
        }
    }
/* *****************************************************Practical Observer tab ********************************************************* */
    $probsyear = "";
    $probsexamtype = "";
    $probstext = "";
    $probs = "";
    $qrycn = "";
    $probssearch_in = "";
    if(isset($_POST['probssearch'])){
        $probsyear = $_POST['probsyear'];
        $probsexamtype = $_POST['probsexamtype'];
        $probstext = $_POST['probstext'];
        $probssearch_in = $_POST['searchprobs'];
        switch($probssearch_in){
            case "exmr_no" :
                $qrycn .= " WHERE ".$probssearch_in."='".$probstext."'";
                $probsctr = "SELECT COUNT(*) FROM probs".$probsyear.$probsexamtype." WHERE ".$probssearch_in."='".$probstext."'";
                break;
            case "all" :
                $probstext = "";
                $probsctr = "SELECT COUNT(*) FROM probs".$probsyear.$probsexamtype;
                break;
        }
        $probs = "SELECT * FROM probs".$probsyear.$probsexamtype.$qrycn;
        $runprobs = mysqli_query($conn,$probs);
        $rowctr = mysqli_fetch_array(mysqli_query($conn,$probsctr));
        $ctr = $rowctr['COUNT(*)'];
    }
/* *****************************************************Teachers Data Bank tab ********************************************************* */
    $teachersbankyear = "";
    $teachersbanktext = "";
    $teachersbank = "";
    $qurycn = "";
    $teachersbanksearch_in = "";
    if(isset($_POST['teachersbanksearch'])){
        $teachersbankyear = $_POST['teachersbankyear'];
        $teachersbanktext = $_POST['teachersbanktext'];
        $teachersbanksearch_in = $_POST['searchteachersbank'];
        switch($teachersbanksearch_in){
            case "uid" :
                $qurycn .= " WHERE ".$teachersbanksearch_in."='".$teachersbanktext."'";
                $querycnr = "SELECT COUNT(*) FROM teachersbank".$teachersbankyear." WHERE ".$teachersbanksearch_in."='".$teachersbanktext."'";
                break;
            case "uid2" :
                $qurycn .= " WHERE ".$teachersbanksearch_in."='".$teachersbanktext."'";
                $querycnr = "SELECT COUNT(*) FROM teachersbank".$teachersbankyear." WHERE ".$teachersbanksearch_in."='".$teachersbanktext."'";
                break;
            case "sch_no" :
                $qurycn .= " WHERE ".$teachersbanksearch_in."='".$teachersbanktext."'";
                $querycnr = "SELECT COUNT(*) FROM teachersbank".$teachersbankyear." WHERE ".$teachersbanksearch_in."='".$teachersbanktext."'";
                break;
            case "post" :
                $qurycn .= " WHERE ".$teachersbanksearch_in."='".$teachersbanktext."'";
                $querycnr = "SELECT COUNT(*) FROM teachersbank".$teachersbankyear." WHERE ".$teachersbanksearch_in."='".$teachersbanktext."'";
                break;
            case "name" :
                $qurycn .= " WHERE ".$teachersbanksearch_in." LIKE '%" . $teachersbanktext . "%'";
                $querycnr = "SELECT COUNT(*) FROM teachersbank".$teachersbankyear." WHERE ".$teachersbanksearch_in." LIKE '%" . $teachersbanktext . "%'";
                break;
            case "all" :
                $teachersbanktext = "";
                $querycnr = "SELECT COUNT(*) FROM teachersbank".$teachersbankyear;
                break;
            }
            $teachersbank = "SELECT * FROM teachersbank".$teachersbankyear.$qurycn;
            $runteachersbank = mysqli_query($conn,$teachersbank);
            $rowcnr = mysqli_fetch_array(mysqli_query($conn,$querycnr));
            $cnr = $rowcnr['COUNT(*)'];
    }
/* *****************************************************Spot Evaluation Status tab ********************************************************* */
    $evhe = "";
    $heno = "";
    $querycon = "";
    if(isset($_POST['spotsearch'])){
        $heno = $_POST['heno'];
        $bfrom = $_POST['bfrom'];
        $bto = $_POST['bto'];
        $evhe = "SELECT * FROM he2021c WHERE heno='".$heno."'";
        $runspotev = mysqli_query($conn,$evhe);
        $rowspotev = mysqli_fetch_array($runspotev);
        $heabbr_name = $rowspotev['abbr_name'];
        $hename = $rowspotev['name'];
        $hemobile = $rowspotev['mobile'];
        $hedist = $rowspotev['hedist'];
        $hesub = $rowspotev['hesub'];
        $heclass = $rowspotev['heclass'];
        $hestate = $rowspotev['hestate'];
        $cnssch_no = $rowspotev['cns_schno'];
        $heemail = $rowspotev['email'];
        $cnsabbr_name = $rowspotev['cnsabbrnam'];
        $cnsdist = $rowspotev['cnsdist'];
        if($heclass=="10")$class="x"; else $class="xii";
        $SUB = mysqli_fetch_array(mysqli_query($conn,"SELECT subname FROM sub".$class."2020 WHERE sub='".$hesub."'"));
        $hesubname = $SUB['subname'];
    }
if(isset($_POST['submit_row']))
{
 $heno = $_POST['heno'];
 $bagno=$_POST['bagno'];
 $nocp=$_POST['nocp'];
    $heabbr_name = $_POST['heabbr_name'];
    $hename = $_POST['hename'];
    $hemobile = $_POST['hemobile'];
    $hedist = $_POST['hedist'];
    $hesub = $_POST['hesub'];
    $heclass = $_POST['heclass'];
    $hestate = $_POST['hestate'];
    $cnssch_no = $_POST['cns_schno'];
    $heemail = $_POST['heemail'];
    $cnsabbr_name = $_POST['cnsabbr_name'];
    $hesubname = $_POST['hesubname'];
    $cnsdist = $_POST['cnsdist'];
    $staffn = $_POST['staff'];
    $qry1 = "INSERT INTO spotev2021c (heno,heabbr_name,hename,hemobile,hedist,hesub,heclass,hestate,cns_schno,heemail,cnsabbr_name,hesubname,cnsdist,dstat,depositby) VALUES ('$heno','$heabbr_name','$hename','$hemobile','$hedist','$hesub','$heclass','$hestate','$cnssch_no','$heemail','$cnsabbr_name','$hesubname','$cnsdist',DATE(NOW()),'$staffn')";
    $r1 = mysqli_query($conn,$qry1);
 for($i=0;$i<count($bagno);$i++)
 {
  if($bagno[$i]!="" && $nocp[$i]!="")
  {
      $querycon = "UPDATE spotev2021c SET bagno".($i+1)."='".$bagno[$i]."',nocp".($i+1)."='".$nocp[$i]."' WHERE heno='".$heno."' AND dstat=DATE(NOW())";
   $r2 = mysqli_query($conn,$querycon);
  }
 }
}
    $shasearch_in = "";
    $shatext = "";
    $qrysha = "";
    $ctrhe = "";
    $staff="";
    if(isset($_POST['shasearch'])){
        $shatext = $_POST['shatext'];
        $shasearch_in = $_POST['searchsha'];
        switch($shasearch_in){
            case "dstat" :
                $qrysha .= " WHERE ".$shasearch_in."='".$shatext."'";
                $ctrhe = "SELECT COUNT(*) FROM spotev2021c WHERE ".$shasearch_in."='".$shatext."'";
                break;
            case "pending" :
                $qrysha .= " WHERE rstat IS NULL ORDER BY cnsdist,cns_schno,hesub";
                $ctrhe = "SELECT COUNT(*) FROM spotev2021c WHERE rstat IS NULL";
                break;
            case "received" :
                $qrysha .= " WHERE rstat IS NOT NULL ORDER BY cnsdist,cns_schno,hesub";
                $ctrhe = "SELECT COUNT(*) FROM spotev2021c WHERE rstat IS NOT NULL";
                break;
            case "heno" :
                $qrysha .= " WHERE ".$shasearch_in."='".$shatext."'";
                $ctrhe = "SELECT COUNT(*) FROM spotev2021c WHERE ".$shasearch_in."='".$shatext."'";
                break;
            case "lbm" :
                $qrysha .= " WHERE receivedby='Sh. Lal Bihari Manjhi, MTS' ORDER BY cnsdist,cns_schno,hesub";
                $ctrhe = "SELECT COUNT(*) FROM spotev2021c WHERE receivedby='Sh. Lal Bihari Manjhi, MTS'";
                break;
            case "nsa" :
                $qrysha .= " WHERE receivedby='Sh. Niraj Kumar, SA' ORDER BY cnsdist,cns_schno,hesub";
                $ctrhe = "SELECT COUNT(*) FROM spotev2021c WHERE receivedby='Sh. Niraj Kumar, SA'";
                break;
            case "all" :
                $qrysha = " ORDER BY heno";
                $shatext = "";
                $ctrhe = "SELECT COUNT(*) FROM spotev2021c";
                break;
        }
    $hectr = mysqli_fetch_array(mysqli_query($conn,$ctrhe));
    }
    $spotall = mysqli_query($conn,"SELECT * FROM spotev2021c".$qrysha);
