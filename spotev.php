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
        margin-top: -500px;
        margin-left: 220px;
        padding: 1px 16px;
        height: auto;
    }

    .navbar-form {
        border-radius: 8px;
    }
    .box {
        width: 400px;
        height: 300px;
        margin: auto;
        margin-top: 50px;
        -webkit-box-shadow: 5px 5px 8px 0px rgba(0, 0, 0, 0.75);
        -moz-box-shadow: 5px 5px 8px 0px rgba(0, 0, 0, 0.75);
        box-shadow: 5px 5px 8px 0px rgba(0, 0, 0, 0.75);
    }
</style>
<script>
function validateForm() {
  let x = document.forms["allotb"]["heno"].value;
  let y = document.forms["allotb"]["bfrom"].value;
  let z = document.forms["allotb"]["bto"].value;
  if (x == "" || y==""||z=="") {
    alert("Can't Submit Blank");
    return false;
  }
}
</script>
<div class="content">
     <div class="header" style="height: 50px;">
        <div class="nav_bar">
            <ul class="nav navbar-nav navbar-left">
                <li class="active"><a href="index.php?spotev"> Allot Bags</a></li>
                <li><a href="index.php?spotev3"> View alloted Bags</a></li>
            </ul>
        </div>
    </div>

    <div class="box">
    <form name="allotb" action="index.php?spotev2" method="POST" class="" style="width:100%;padding:5px;" onsubmit="return validateForm()">
        <h3>Enter Detail's of HE :</h3><br>
       <label>He Number : </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <div class="input-group">
            <div class="input-group-btn">
               <input type="text" name="heno" value="" class="form-control" style="border-radius:4px">
            </div>
        </div>
        <label>Bag no. From : </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <div class="input-group">
            <div class="input-group-btn">
               <input type="text" name="bfrom" value="" class="form-control" style="border-radius:4px">
            </div>
        </div>
        <label>Bag no. To : </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <div class="input-group">
            <div class="input-group-btn">
               <input type="text" name="bto" value="" class="form-control" style="border-radius:4px;">
                
            </div>
        </div>
        <center><button class="btn btn-default" type="submit" name="spotsearch" style="border-radius:4px;height:34px;margin-top:0px;"> Allot Bag </button></center>
    </form>
    </div>
</div>
<?php }else{
        header("location: noaccess.php");
    }?>
