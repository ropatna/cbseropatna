<?php

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
if(( $_SESSION["cat"] == "admin")||( $_SESSION["cat"] == "ab")||( $_SESSION["cat"] == "rti")||( $_SESSION["cat"] == "exam")){
?>
<script>
    function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
    }
    </script>

<div class="content">
    <form action="index.php?examcorr" id="frm" method="POST" class="navbar-form navbar-left navbar-inverse" style="width:100%;padding:5px;">
        <span class="text-light bg-dark"> Filter On : </span>
        <select name="candsearch" id="candsearch" class="dropdown">
            <option value="0" disabled selected> -Select- </option>
            <option value="iregdno" <?php if($candsearch=="iregdno") { echo "selected"; } ?>>Registration No.</option>
            <option value="sch_no" <?php if($candsearch=="sch_no") { echo "selected"; } ?>>School No.</option>
            <option value="cname" <?php if($candsearch=="cname") { echo "selected"; } ?>>Candidate Name</option>
            <option value="mname" <?php if($candsearch=="mname") { echo "selected"; } ?>>Mother Name</option>
            <option value="fname" <?php if($candsearch=="fname") { echo "selected"; } ?>>Father Name</option>
        </select>
        <select name="file" id="file" class="dropdown">
            <option value="0" disabled selected> -Select- </option>
            <option value="loc" <?php if($file=="loc") { echo "selected"; } ?>>LOC</option>
            <option value="reg" <?php if($file=="reg") { echo "selected"; } ?>>Registration</option>
        </select>
        <select name="class" id="class" class="dropdown">
            <option value="0" disabled selected> -Select- </option>
            <option value="0" disabled> -------LOC-------- </option>
            <option value="x" <?php if($class=="x") { echo "selected"; } ?>>X</option>
            <option value="xii" <?php if($class=="xii") { echo "selected"; } ?>>XII</option>
            <option value="0" disabled> -------REGISTRATION-------- </option>
            <option value="ix" <?php if($class=="ix") { echo "selected"; } ?>>IX</option>
            <option value="xi" <?php if($class=="xi") { echo "selected"; } ?>>XI</option>
        </select>
        <div class="input-group">
            <input type="text" name="candtext" placeholder="Enter" value="<?php echo "$candtext"; ?>" class="form-control">
            <div class="input-group-btn">
                <button class="btn aqua-gradient" type="submit" name="candfind" style="height:34px;margin-top:0px;">
                    <i class="glyphicon glyphicon-search"></i>
                </button>
            </div>
        </div>
    </form>
    
</div>
<?php } ?>