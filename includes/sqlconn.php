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
        $year = "2023";
        switch($search_in){
            case "sch_no" :
                $queryCondition .= " WHERE " . $search_in . " LIKE '" . $searchtext . "%'";
                $sch_count = "SELECT COUNT(sch_no) FROM schoolmaster".$year."  WHERE " . $search_in . " LIKE '" . $searchtext . "%'";
                break;
            case "affno" :
                $queryCondition .= " WHERE " . $search_in . " LIKE '%" . $searchtext . "%'";
                $sch_count = "SELECT COUNT(sch_no) FROM schoolmaster".$year."  WHERE " . $search_in . " LIKE '%" . $searchtext . "%'";
                break;
            case "distt" :
                $queryCondition .= " WHERE " . $search_in . " LIKE '" . $searchtext . "%'";
                $sch_count = "SELECT COUNT(sch_no) FROM schoolmaster".$year."  WHERE " . $search_in . " LIKE '" . $searchtext . "%'";
                break;
            case "state" :
                $queryCondition .= " WHERE " . $search_in . " LIKE '" . $searchtext . "%'";
                $sch_count = "SELECT COUNT(sch_no) FROM schoolmaster".$year."  WHERE " . $search_in . " LIKE '" . $searchtext . "%'";
                break;
            case "add" :
                $queryCondition .= " WHERE add1 LIKE '%" . $searchtext . "%' OR add2 LIKE '%" . $searchtext . "%' OR add3 LIKE '%" . $searchtext . "%' OR add4 LIKE '%" . $searchtext . "%' OR add5 LIKE '%" . $searchtext . "%'";
                $sch_count = "SELECT COUNT(sch_no) FROM schoolmaster".$year."  WHERE add1 LIKE '%" . $searchtext . "%' OR add2 LIKE '%" . $searchtext . "%' OR add3 LIKE '%" . $searchtext . "%' OR add4 LIKE '%" . $searchtext . "%' OR add5 LIKE '%" . $searchtext . "%'";
                break;
            case "pin" :
                $queryCondition .= " WHERE " . $search_in . " LIKE '" . $searchtext . "%'";
                $sch_count = "SELECT COUNT(sch_no) FROM schoolmaster".$year."  WHERE " . $search_in . " LIKE '" . $searchtext . "%'";
                break;
            case "status" :
                $queryCondition .= " WHERE " . $search_in . " LIKE '" . $searchtext . "%'";
                $sch_count = "SELECT COUNT(sch_no) FROM schoolmaster".$year."  WHERE " . $search_in . " LIKE '" . $searchtext . "%'";
                break;
            case "all" :
                $searchtext = "";
                $sch_count = "SELECT COUNT(sch_no) FROM schoolmaster".$year;
                break;
        }
        $sql = "SELECT * FROM schoolmaster".$year." " . $queryCondition;
        $result = mysqli_query($conn,$sql);
        $row_update = mysqli_fetch_array(mysqli_query($conn,"SELECT DISTINCT upd_date FROM schoolmaster".$year));
    }
    /* *****************************************************Exam Section tab ********************************************************* */
    $candsearch = "";
    $candtext = "";
    $class = "";
    $file = "";
    if(isset($_POST['candfind'])){
        $candsearch = $_POST['candsearch'];
        $candtext = $_POST['candtext'];
        $class = $_POST['class'];
        $file = $_POST['file'];
        switch($candsearch){
            case "iregdno" :
                $queryCondition .= " WHERE " . $candsearch . " = '" . $searchtext . "'";
            case "sch_no" :
                $queryCondition .= " WHERE " . $candsearch . " = '" . $searchtext . "'";
            case "cname" :
                $queryCondition .= " WHERE " . $candsearch . " = '" . $searchtext . "'";
            case "mname" :
                $queryCondition .= " WHERE " . $candsearch . " = '" . $searchtext . "'";
            case "fname" :
                $queryCondition .= " WHERE " . $candsearch . " = '" . $searchtext . "'";
        }
        $sql2 = "SELECT * FROM ".$file."2022".$class." " . $queryCondition;
        $cand = mysqli_query($conn,$sql2);
    }
?>