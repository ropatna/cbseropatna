<?php

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit();
}
if(($_SESSION["cat"] == "mm" || $_SESSION["cat"] == "admin")){
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

</style>
<div class="content">
    <form method="post" action="index.php?mmsection2" class="navbar-form navbar-left " style="width:100%;padding:5px;">
        <h4 class="text-light bg-dark"> Individual Correction/Duplicate: </h4>
        <label class="text-light bg-dark"> Document Type : </label>
        <select name="dtype" id="doctype" class="dropdown">
            <option disabled selected> -Select- </option>
            <option value="dublicate" <?php if($doctype=="dublicate") { echo "selected"; } ?>> Dublicate </option>
            <option value="correction" <?php if($doctype=="correction") { echo "selected"; } ?>> Correction </option>
        </select><br>
        <label class="text-light bg-dark"> Year : </label>
        <select name="resultyear" id="ryear" class="dropdown">
            <option disabled selected> -Select Year- </option>
            <option value="2018" <?php if($ryear=="2018") { echo "selected"; } ?> selected> 2018 </option>
            <option value="2019" <?php if($ryear=="2019") { echo "selected"; } ?>> 2019 </option>
            <option value="2020" <?php if($ryear=="2020") { echo "selected"; } ?>> 2020 </option>
            <option value="2021" <?php if($ryear=="2021") { echo "selected"; } ?>> 2021 </option>
            <option value="2022" <?php if($ryear=="2022") { echo "selected"; } ?> > 2022 </option>
            <option value="2011" <?php if($ryear=="2011") { echo "selected"; } ?>> 2011 </option>
        </select>
        <label class="text-light bg-dark">Class : </label>
        <select name="resultclass" id="rclass" class="dropdown">
            <option disabled selected> -Select Class- </option>
            <option value="x" <?php if($rclass=="x") { echo "selected"; } ?>> 10th </option>
            <option value="xii" <?php if($rclass=="xii") { echo "selected"; } ?>> 12th </option>
        </select>
        <label class="text-light bg-dark">Exam Type : </label>
        <select name="rexamtype" id="rexamtype" class="dropdown">
            <option disabled selected> -Select Exam Type- </option>
            <option value="m" <?php if($rexamtype=="m") { echo "selected"; } ?> selected> Main </option>
            <option value="c" <?php if($rexamtype=="c") { echo "selected"; } ?>> Compart </option>
        </select>
        <label class="text-light bg-dark">Roll No. : </label>
        <div class="input-group">
            <input type="text" name="rollno" placeholder="Roll No." value="<?php echo "$rollno"; ?>" class="form-control">
            <div class="input-group-btn">
                <button class="btn btn-default" type="submit" name="rsearch" style="height:34px;margin-top:0px;">
                    <i class="glyphicon glyphicon-search"></i>
                </button>
            </div>
        </div>
        <h4 class="text-light bg-dark"> Bulk Migration: </h4>
        <label class="text-light bg-dark"> Year : </label>
        <select name="rmigyear" class="dropdown">
            <option disabled selected> -Select Year- </option>
            <option value="2018" <?php if($rmigyear=="2018") { echo "selected"; } ?>> 2018 </option>
            <option value="2019" <?php if($rmigyear=="2019") { echo "selected"; } ?>> 2019 </option>
            <option value="2020" <?php if($rmigyear=="2020") { echo "selected"; } ?>> 2020 </option>
            <option value="2021" <?php if($rmigyear=="2021") { echo "selected"; } ?>> 2021 </option>
            <option value="2022" <?php if($rmigyear=="2022") { echo "selected"; } ?> > 2022 </option>
            <option value="2011" <?php if($rmigyear=="2011") { echo "selected"; } ?>> 2011 </option>
        </select>
        <label class="text-light bg-dark">Class : </label>
        <select name="rmigclass" class="dropdown">
            <option disabled selected> -Select Class- </option>
            <option value="x" <?php if($rmigclass=="x") { echo "selected"; } ?>> 10th </option>
            <option value="xii" <?php if($rmigclass=="xii") { echo "selected"; } ?>> 12th </option>
        </select>
        <label class="text-light bg-dark">Exam Type : </label>
        <select name="rmigexamtype" class="dropdown">
            <option disabled selected> -Select Exam Type- </option>
            <option value="m" <?php if($rmigexamtype=="m") { echo "selected"; } ?>> Main </option>
            <option value="c" <?php if($rmigexamtype=="c") { echo "selected"; } ?>> Compart </option>
        </select>
        <div class="input-group">
            <div class="input-group-btn">
                <button class="btn btn-default" type="submit" name="rmigprn" style="height:34px;margin-top:1px;margin-left:-5px;">
                    <i class="glyphicon glyphicon-search"></i>
                </button>
            </div>
        </div>
    </form>
</div>

<?php }else{
        header("location: noaccess.php");
        exit();
    }?>
