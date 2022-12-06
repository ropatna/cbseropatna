<?php

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
if(($_SESSION["cat"] == "exam" || $_SESSION["cat"] == "admin")){
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
    <form method="post" action="exammigx.php" class="navbar-form navbar-left navbar-inverse" style="width:100%;padding:5px;">
        <h4 class="text-light bg-dark"> Migration Print: </h4>
        <label class="text-light bg-dark"> Year : </label>
        <select name="exammigyear" class="dropdown">
            <option disabled selected> -Select Year- </option>
            <option value="2018" <?php if($exammigyear=="2018") { echo "selected"; } ?>> 2018 </option>
            <option value="2019" <?php if($exammigyear=="2019") { echo "selected"; } ?> selected> 2019 </option>
            <option value="2020" <?php if($exammigyear=="2020") { echo "selected"; } ?>> 2020 </option>
        </select>
        <label class="text-light bg-dark">Class : </label>
        <select name="exammigclass" class="dropdown">
            <option disabled selected> -Select Class- </option>
            <option value="x" <?php if($exammigclass=="x") { echo "selected"; } ?>selected> 10th </option>
            <option value="xii" <?php if($exammigclass=="xii") { echo "selected"; } ?>> 12th </option>
        </select>
        <label class="text-light bg-dark">Exam Type : </label>
        <select name="exammigexamtype" class="dropdown">
            <option disabled selected> -Select Exam Type- </option>
            <option value="m" <?php if($exammigexamtype=="m") { echo "selected"; } ?> selected> Main </option>
            <option value="c" <?php if($exammigexamtype=="c") { echo "selected"; } ?>> Compart </option>
        </select>
        <label class="text-light bg-dark"> Alignment : </label>
        <select name="align" class="dropdown">
            <option disabled selected> -Select alignment- </option>
            <option value="l" <?php if($align=="l") { echo "selected"; } ?>> Left Side Text</option>
            <option value="r" <?php if($align=="r") { echo "selected"; } ?>> Right Side Text</option>
        </select><br><br>
        <label class="text-light bg-dark">Roll No. : </label>
        <div class="input-group">
           <input type="text" name="roll" placeholder="Roll No." value="<?php echo "$roll"; ?>" class="form-control">
            <div class="input-group-btn">
                <button class="btn btn-default" type="submit" name="exammigprn" style="height:34px;margin-top:0px;">
                    <i class="glyphicon glyphicon-search"></i>
                </button>
            </div>
        </div>
    </form>

</div>


<?php }else{
        header("location: noaccess.php");
    }?>
