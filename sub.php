<?php

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
if(( $_SESSION["cat"] == "admin")||( $_SESSION["cat"] == "ab")){
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
    table td {
    font-size: 1rem;
    font-weight: 600;
}
    table th{
        font-size: 1.3rem;
        font-weight: 800;
        background-color: grey;
    }
</style>
<div class="content">

    <form action="index.php?sub" method="POST" class="navbar-form navbar-left navbar-inverse" style="width:100%;padding:5px;">
        <label class="text-light bg-dark"> Year : </label>
        <select name="subyear" class="dropdown">
            <option disabled selected> -Select Year- </option>
            <option value="2019" <?php if($subyear=="2019") { echo "selected"; } ?>> 2019 </option>
            <option value="2020" <?php if($subyear=="2020") { echo "selected"; } ?>> 2020 </option>
        </select>
        <label class="text-light bg-dark">Class : </label>
        <select name="subclass" id="rclass" class="dropdown">
            <option disabled selected> -Select Class- </option>
            <option value="x" <?php if($subclass=="x") { echo "selected"; } ?>> 10th </option>
            <option value="xii" <?php if($subclass=="xii") { echo "selected"; } ?>> 12th </option>
        </select>
        <div class="input-group">
            <!--<input type="text" name="subtext" value="" class="form-control" disabled>-->
            <div class="input-group-btn">
                <button class="btn btn-default" type="submit" name="subsearch" style="height:34px;margin-top:1px;margin-left:-5px;">
                    <i class="glyphicon glyphicon-search"></i>
                </button>
            </div>
        </div>
    </form>

    <?php if(isset($_POST['subsearch'])){ ?>
    <span style="float:left;margin-top:0px;color:red;"> <b> Subjects Found: <?php echo "$cntr"; ?> </b> </span>
    <table class="table">
        <tr>
            <th> Sub </th>
            <th> Subname </th>
            <th <?php if($subclass=="x"){echo "hidden";} ?>> ext_exm </th>
            <th> max_th </th>
            <th <?php if($subclass=="x"){echo "hidden";} ?>> min_th </th>
            <th> time </th>
            <th> max_prac </th>
            <th <?php if($subclass=="x"){echo "hidden";} ?>> min_prac </th>
            <th> max_proj </th>
            <th <?php if($subclass=="x"){echo "hidden";} ?>> min_proj </th>
            <th> max_ia </th>
            <th <?php if($subclass=="x"){echo "hidden";} ?>> min_ia </th>
            <th> max_sub </th>
            <th> min_sub </th>
            <th> match </th>
            <th> year </th>
        </tr>
        <?php while($row = mysqli_fetch_array($runsub)){
            $sub = $row['sub'];
            $subname = $row['subname'];
            $max_th = $row['max_th'];
            $time = $row['time'];
            $max_prac = $row['max_prac'];
            $max_proj = $row['max_proj'];
            $max_ia = $row['max_ia'];
            $max_sub = $row['max_sub'];
            $min_sub = $row['min_sub'];
            $match = $row['match'];
            $year = $row['year'];
            if($subclass=="xii"){
                $ext_exm = $row['ext_exm'];
                $min_th = $row['min_th'];
                $min_prac = $row['min_prac'];
                $min_proj = $row['min_proj'];
                $min_ia = $row['min_ia'];
            } ?>
        <tr>
            <td> <?php echo $sub; ?> </td>
            <td> <?php echo $subname; ?> </td>
            <td <?php if($subclass=="x"){echo "hidden";} ?>> <?php echo $ext_exm; ?> </td>
            <td> <?php echo $max_th; ?> </td>
            <td <?php if($subclass=="x"){echo "hidden";} ?>> <?php echo $min_th; ?> </td>
            <td> <?php echo $time; ?> </td>
            <td> <?php echo $max_prac; ?> </td>
            <td <?php if($subclass=="x"){echo "hidden";} ?>> <?php echo $min_prac; ?> </td>
            <td> <?php echo $max_proj; ?> </td>
            <td <?php if($subclass=="x"){echo "hidden";} ?>> <?php echo $min_proj; ?> </td>
            <td> <?php echo $max_ia; ?> </td>
            <td <?php if($subclass=="x"){echo "hidden";} ?>> <?php echo $min_ia; ?> </td>
            <td> <?php echo $max_sub; ?> </td>
            <td> <?php echo $min_sub; ?> </td>
            <td> <?php echo $match; ?> </td>
            <td> <?php echo $year; ?> </td>
        </tr>
        <?php } ?>
    </table>
    <?php } ?>

</div>
<?php }else{
        header("location: noaccess.php");
    }?>
