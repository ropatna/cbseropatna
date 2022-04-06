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

    table th {
        font-size: 1.3rem;
        font-weight: 800;
        background-color: grey;
    }

</style>
<script>
$(document).ready(function () {
  $('#dtBasicExample').DataTable();
  $('.dataTables_length').addClass('bs-select');
});
</script>
<div class="content">
    <form action="index.php?probs" method="POST" class="navbar-form navbar-left navbar-inverse" style="width:100%;padding:5px;">
        <span class="text-light bg-dark"> Filter On : </span>
        <select name="searchprobs" id="probssearch_in" class="dropdown">
            <option disabled selected> -Select- </option>
            <option value="exmr_no" <?php if($probssearch_in=="exmr_no") { echo "selected"; } ?>> Examiner No. </option>
            <option disabled>---------------------------</option>
            <option value="all" <?php if($probssearch_in=="all") { echo "selected"; } ?>>Show All Prac. Observers</option>
        </select>
        <label class="text-light bg-dark"> Year : </label>
        <select name="probsyear" class="dropdown">
            <option disabled selected> -Select Year- </option>
            <option value="2019" <?php if($probsyear=="2019") { echo "selected"; } ?>> 2019 </option>
            <option value="2020" <?php if($probsyear=="2020") { echo "selected"; } ?>> 2020 </option>
        </select>
        <label class="text-light bg-dark">Exam Type : </label>
        <select name="probsexamtype" class="dropdown">
            <option disabled selected> -Select Exam Type- </option>
            <option value="m" <?php if($probsexamtype=="m") { echo "selected"; } ?> selected> Main </option>
            <option value="c" <?php if($probsexamtype=="c") { echo "selected"; } ?>> Compart </option>
        </select>
        <div class="input-group">
            <input type="text" name="probstext" placeholder="Enter" value="<?php echo "$probstext"; ?>" class="form-control">
            <div class="input-group-btn">
                <button class="btn btn-default" type="submit" name="probssearch" style="height:34px;margin-top:0px;">
                    <i class="glyphicon glyphicon-search"></i>
                </button>
            </div>
        </div>
    </form>
    <?php if(isset($_POST['probssearch'])){ $v = ""; ?>
    <span style="float:left;margin-top:0px;color:red;"> <b> Pr. Obsrvr's Found: <?php echo "$ctr"; ?> </b> </span>
    <?php while($rowprobs = mysqli_fetch_array($runprobs)){
            $exmr_no = $rowprobs['exmr_no'];
            $school = $rowprobs['school'];
            $sabbr_name = $rowprobs['sabbr_name'];
            $abbr_name = $rowprobs['abbr_name'];
            $ob_name = $rowprobs['ob_name'];
            $ob_sch_no = $rowprobs['ob_sch_no'];
            $sub = $rowprobs['sub'];
            $cand = $rowprobs['cand'];
            $mobile = $rowprobs['mobile'];
            $expr_xii = $rowprobs['expr_xii'];
        ?>
    <table class="tg">
        <?php if ($v!=$school){ ?>
        <tr>
            <th class="tg-zaje" style="background-color: gray;width:120px;"><?php echo $school; ?></th>
            <th class="tg-zaje" colspan="2" style="background-color: gray;"> <?php echo $sabbr_name; ?> </th>
            <th class="tg-zaje" style="background-color: gray;"></th>
            <th class="tg-zaje" style="background-color: gray;"></th>
            <th class="tg-zaje" style="background-color: gray;"></th>
            <th class="tg-zaje" style="background-color: gray;"></th>
            <th class="tg-zaje" style="background-color: gray;"></th>
        </tr>
        <tr>
            <td class="tg-zaje" style="width:120px;"><?php echo $sub; ?>(<?php echo $cand; ?>)</td>
            <td class="tg-zaje" style="width:200px;"> <?php echo $exmr_no; ?> </td>
            <td class="tg-zaje" style="width:150px;"> <?php echo $ob_name; ?> </td>
            <td class="tg-zaje" style="width:60px;"> <?php echo $ob_sch_no; ?> </td>
            <td class="tg-zaje" style="width:350px;"> <?php echo $abbr_name; ?> </td>
            <td class="tg-zaje" style="width:70px;"> <?php echo $expr_xii; ?> </td>
            <td class="tg-zaje"> <?php echo $mobile; ?> </td>
        </tr>
        <?php $v = $school; }else { ?>
        <tr>
            <td class="tg-zaje" style="width:120px;"><?php echo $sub; ?>(<?php echo $cand; ?>)</td>
            <td class="tg-zaje" style="width:190px;"> <?php echo $exmr_no; ?> </td>
            <td class="tg-zaje" style="width:145px;"> <?php echo $ob_name; ?> </td>
            <td class="tg-zaje" style="width:60px;"> <?php echo $ob_sch_no; ?> </td>
            <td class="tg-zaje" style="width:335px;"> <?php echo $abbr_name; ?> </td>
            <td class="tg-zaje" style="width:70px;"> <?php echo $expr_xii; ?> </td>
            <td class="tg-zaje"> <?php echo $mobile; ?> </td>
        </tr>
        <?php } ?>
    </table>
    <?php } ?>
    <?php } ?>
</div>
<?php }else{
        header("location: noaccess.php");
    }?>
