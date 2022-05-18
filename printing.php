<?php include 'includes/conn.php'; ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Print Document</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1 user-scalable=no">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <?php
        if(isset($_POST['print'])){
            $ryear = $_POST['ryear'];
            $prntype = $_POST['prntype'];
            $rclass = $_POST['rclass'];
            $casetype = $prntype.$rclass;
            if($ryear=="2018"){
                $casetype = $prntype.$rclass.$ryear;
            }
            switch($casetype){
                case "marksheetxii" :
                    include "includes/marksheetxii.php";
                    break;
                case "marksheetx2018" :
                    include "includes/marksheetx18.php";
                    break;
                case "marksheetx" :
                    include "includes/marksheetx.php";
                    break;
                case "migrationxii" :
                    include 'includes/migrationxii.php';
                    break;
                case "migrationx" :
                    include 'includes/migrationx.php';
                    break;
                case "passingxii" :
                    include 'includes/passingxii.php';
                    break;
                case "passingx" :
                    include 'includes/passingx.php';
                    break;
            }
        }
        if(isset($_POST['migbulk'])){
            $rmigyear = $_POST['rmigyear'];
            $rmigclass = $_POST['rmigclass'];
            $rmigexamtype = $_POST['rmigexamtype'];
            $sn = 0;
            if(isset($_POST['reqs1'])){$sn += 1; ${"rol".$sn} = $_POST['reqs1'];}
            if(isset($_POST['reqs2'])){$sn += 1; ${"rol".$sn} = $_POST['reqs2'];}
            if(isset($_POST['reqs3'])){$sn += 1; ${"rol".$sn} = $_POST['reqs3'];}
            if(isset($_POST['reqs4'])){$sn += 1; ${"rol".$sn} = $_POST['reqs4'];}
            if(isset($_POST['reqs5'])){$sn += 1; ${"rol".$sn} = $_POST['reqs5'];}
            if(isset($_POST['reqs6'])){$sn += 1; ${"rol".$sn} = $_POST['reqs6'];}
            if(isset($_POST['reqs7'])){$sn += 1; ${"rol".$sn} = $_POST['reqs7'];}
            if(isset($_POST['reqs8'])){$sn += 1; ${"rol".$sn} = $_POST['reqs8'];}
            if(isset($_POST['reqs9'])){$sn += 1; ${"rol".$sn} = $_POST['reqs9'];}
            if(isset($_POST['reqs10'])){$sn += 1; ${"rol".$sn} = $_POST['reqs10'];}
            if(isset($_POST['reqs11'])){$sn += 1; ${"rol".$sn} = $_POST['reqs11'];}
            if(isset($_POST['reqs12'])){$sn += 1; ${"rol".$sn} = $_POST['reqs12'];}
            if(isset($_POST['reqs13'])){$sn += 1; ${"rol".$sn} = $_POST['reqs13'];}
            if(isset($_POST['reqs14'])){$sn += 1; ${"rol".$sn} = $_POST['reqs14'];}
            if(isset($_POST['reqs15'])){$sn += 1; ${"rol".$sn} = $_POST['reqs15'];}
            if(isset($_POST['reqs16'])){$sn += 1; ${"rol".$sn} = $_POST['reqs16'];}
            if(isset($_POST['reqs17'])){$sn += 1; ${"rol".$sn} = $_POST['reqs17'];}
            if(isset($_POST['reqs18'])){$sn += 1; ${"rol".$sn} = $_POST['reqs18'];}
            if(isset($_POST['reqs19'])){$sn += 1; ${"rol".$sn} = $_POST['reqs19'];}
            if(isset($_POST['reqs20'])){$sn += 1; ${"rol".$sn} = $_POST['reqs20'];}
            if(isset($_POST['reqs21'])){$sn += 1; ${"rol".$sn} = $_POST['reqs21'];}
            if(isset($_POST['reqs22'])){$sn += 1; ${"rol".$sn} = $_POST['reqs22'];}
            if(isset($_POST['reqs23'])){$sn += 1; ${"rol".$sn} = $_POST['reqs23'];}
            if(isset($_POST['reqs24'])){$sn += 1; ${"rol".$sn} = $_POST['reqs24'];}
            if(isset($_POST['reqs25'])){$sn += 1; ${"rol".$sn} = $_POST['reqs25'];}
            if(isset($_POST['reqs26'])){$sn += 1; ${"rol".$sn} = $_POST['reqs26'];}
            if(isset($_POST['reqs27'])){$sn += 1; ${"rol".$sn} = $_POST['reqs27'];}
            if(isset($_POST['reqs28'])){$sn += 1; ${"rol".$sn} = $_POST['reqs28'];}
            if(isset($_POST['reqs29'])){$sn += 1; ${"rol".$sn} = $_POST['reqs29'];}
            if(isset($_POST['reqs30'])){$sn += 1; ${"rol".$sn} = $_POST['reqs30'];}
            if(isset($_POST['reqs31'])){$sn += 1; ${"rol".$sn} = $_POST['reqs31'];}
            if(isset($_POST['reqs32'])){$sn += 1; ${"rol".$sn} = $_POST['reqs32'];}
            if(isset($_POST['reqs33'])){$sn += 1; ${"rol".$sn} = $_POST['reqs33'];}
            if(isset($_POST['reqs34'])){$sn += 1; ${"rol".$sn} = $_POST['reqs34'];}
            if(isset($_POST['reqs35'])){$sn += 1; ${"rol".$sn} = $_POST['reqs35'];}
            if(isset($_POST['reqs36'])){$sn += 1; ${"rol".$sn} = $_POST['reqs36'];}
            if(isset($_POST['reqs37'])){$sn += 1; ${"rol".$sn} = $_POST['reqs37'];}
            if(isset($_POST['reqs38'])){$sn += 1; ${"rol".$sn} = $_POST['reqs38'];}
            if(isset($_POST['reqs39'])){$sn += 1; ${"rol".$sn} = $_POST['reqs39'];}
            if(isset($_POST['reqs40'])){$sn += 1; ${"rol".$sn} = $_POST['reqs40'];}
            if(isset($_POST['reqs41'])){$sn += 1; ${"rol".$sn} = $_POST['reqs41'];}
            if(isset($_POST['reqs42'])){$sn += 1; ${"rol".$sn} = $_POST['reqs42'];}
            if(isset($_POST['reqs43'])){$sn += 1; ${"rol".$sn} = $_POST['reqs43'];}
            if(isset($_POST['reqs44'])){$sn += 1; ${"rol".$sn} = $_POST['reqs44'];}
            if(isset($_POST['reqs45'])){$sn += 1; ${"rol".$sn} = $_POST['reqs45'];}
            if(isset($_POST['reqs46'])){$sn += 1; ${"rol".$sn} = $_POST['reqs46'];}
            if(isset($_POST['reqs47'])){$sn += 1; ${"rol".$sn} = $_POST['reqs47'];}
            if(isset($_POST['reqs48'])){$sn += 1; ${"rol".$sn} = $_POST['reqs48'];}
            if(isset($_POST['reqs49'])){$sn += 1; ${"rol".$sn} = $_POST['reqs49'];}
            if(isset($_POST['reqs50'])){$sn += 1; ${"rol".$sn} = $_POST['reqs50'];}
            if(isset($_POST['reqs51'])){$sn += 1; ${"rol".$sn} = $_POST['reqs51'];}
            if(isset($_POST['reqs52'])){$sn += 1; ${"rol".$sn} = $_POST['reqs52'];}
            if(isset($_POST['reqs53'])){$sn += 1; ${"rol".$sn} = $_POST['reqs53'];}
            if(isset($_POST['reqs54'])){$sn += 1; ${"rol".$sn} = $_POST['reqs54'];}
            if(isset($_POST['reqs55'])){$sn += 1; ${"rol".$sn} = $_POST['reqs55'];}
            if(isset($_POST['reqs56'])){$sn += 1; ${"rol".$sn} = $_POST['reqs56'];}
            if(isset($_POST['reqs57'])){$sn += 1; ${"rol".$sn} = $_POST['reqs57'];}
            if(isset($_POST['reqs58'])){$sn += 1; ${"rol".$sn} = $_POST['reqs58'];}
            if(isset($_POST['reqs59'])){$sn += 1; ${"rol".$sn} = $_POST['reqs59'];}
            if(isset($_POST['reqs60'])){$sn += 1; ${"rol".$sn} = $_POST['reqs60'];}
            $file_open = fopen("migration_notesheet.csv","w");
            for($i=0;$i<50;$i++){
                if(isset(${"rol".($i + 1)})){
                    $rw_rl = mysqli_query($conn,"SELECT * FROM r".$rmigclass.$rmigyear.$rmigexamtype." WHERE rroll=".${"rol".($i + 1)});
                    $row_rol = mysqli_fetch_array($rw_rl);
                    $rowcnt=mysqli_num_rows($rw_rl);
                    if($rowcnt==0){
                        $row_rol = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM r".$rmigclass.$rmigyear."c WHERE rroll=".${"rol".($i + 1)}));
                    }
                    $sch_no = $row_rol['sch'];
                    $row_rol2 = mysqli_fetch_array(mysqli_query($conn,"SELECT abbr_name FROM schoolmaster".$rmigyear." WHERE sch_no=".$sch_no));
                    $data_array = array('Roll No.' => ${"rol".($i + 1)},'Candidate Name' => $row_rol['cname'],'Mother\'s Name' => $row_rol['mname'],'Father\'s Name' => $row_rol['fname'],'DOB' => $row_rol['dob'],'Class' => $rmigclass,'Year' => $rmigyear);
                    $res = $row_rol['res'];
                    if((trim($res)=="PASS")||(trim($res)=="COMPARTMENT")||(trim($res)=="COMP")){
                        fputcsv($file_open,$data_array);
                        if($rmigclass=="x"){include 'includes/migrationxbulk.php';}
                        if($rmigclass=="xii"){include 'includes/migrationxiibulk.php';}
                    }
                }
            }
        }
    ?>
</body>

</html>
