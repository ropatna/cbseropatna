<?php

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
<?php if(isset($_POST['spotsearch'])){ ?>
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

    #he_table input[type="text"] {
        width: 150px;
        height: 35px;
        padding-left: 10px;
        margin-right: 20px;
    }

    table td {
        font-size: 1.2rem;
        font-weight: 400;
    }

    table th {
        font-size: 1.4rem;
        font-weight: 800;
    }
</style>

<div class="content">
    <div class="header" style="height: 50px;">
        <div class="nav_bar">
            <ul class="nav navbar-nav navbar-left">
                <li class="active"><a href="index.php?spotev"> Allot Bags</a></li>
                <li><a href="index.php?spotev3"> View alloted Bags</a></li>
            </ul>
        </div>
    </div>
    <div id="form_div">
        <form name="allot" method="post" action="index.php?spotev" onsubmit="return validateForm()">
            <h3 style="color: #0c2b9b"><u>He Details.</u></h3>
            <table align=left>
                <tr>
                    <th> HENO </th>
                    <td>: <?php echo $heno; ?> </td>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    <th> HE NAME </th>
                    <td>: <?php echo str_replace("'","","$hename"); ?> </td>
                </tr>
                <tr>
                    <th> HE CLASS </th>
                    <td>: <?php echo $heclass; ?> </td>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    <th> HE SCHOOL NAME </th>
                    <td>: <?php echo str_replace("'","","$heabbr_name"); ?> </td>
                </tr>
                <tr>
                    <th> HE DISTRICT </th>
                    <td>: <?php echo $hedist; ?> </td>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    <th> HE STATE </th>
                    <td>: <?php echo $hestate; ?> </td>
                </tr>
                <tr>
                    <th> HE SUBJECT </th>
                    <td>: <?php echo $hesub; ?> </td>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    <th> HE SUBJECT NAME </th>
                    <td>: <?php echo $hesubname; ?> </td>
                </tr>
                <tr>
                    <th> MOBILE NO </th>
                    <td>: <?php echo $hemobile; ?> </td>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    <th> EMAIL ID </th>
                    <td>: <?php echo $heemail; ?> </td>
                </tr>
            </table><br><br><br><br><br>
            <h3 style="color: #0c2b9b"><u>CNS Details.</u></h3>
            <table>
                <tr>
                    <th> CNS SCHOOL NUMBER </th>
                    <td>: <?php echo $cnssch_no; ?> </td>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    <th> CNS SCHOOL NAME <br> CNS DISTRICT </th>
                    <td>: <?php echo str_replace("'","","$cnsabbr_name"); ?> <br> : <?php echo $cnsdist; ?> </td>
                </tr>
            </table>
            <table id="he_table" align=left>
                <?php $c=$bto-$bfrom; $n=1; while($bfrom<=$bto){ ?>
                <tr id="<?php echo 'row'.$n; ?>">
                    <td style="width:30px;"> <b><?php echo $n; ?></b> </td>

                    <td><input id="bagno" type="text" name="bagno[]" placeholder="Enter Bag Number" value="<?php echo $bfrom; ?>"></td>
                    <td><input type="text" name="nocp[]" placeholder="Enter No. of Copies" value="200"></td>
                </tr>
                <?php $bfrom=$bfrom+1; $n=$n+1; } ?>
            </table><br><br>
            
            <input type="hidden" name="heno" value="<?php echo $heno; ?>">
            <input type="hidden" name="heabbr_name" value="<?php echo str_replace("'","","$heabbr_name"); ?>">
            <input type="hidden" name="hename" value="<?php echo str_replace("'","","$hename"); ?>">
            <input type="hidden" name="he_sch" value="<?php echo $he_sch; ?>">
            <input type="hidden" name="hemobile" value="<?php echo $hemobile; ?>">
            <input type="hidden" name="hedist" value="<?php echo $hedist; ?>">
            <input type="hidden" name="hesub" value="<?php echo $hesub; ?>">
            <input type="hidden" name="heclass" value="<?php echo $heclass; ?>">
            <input type="hidden" name="hestate" value="<?php echo $hestate; ?>">
            <input type="hidden" name="cns_schno" value="<?php echo $cnssch_no; ?>">
            <input type="hidden" name="heemail" value="<?php echo $heemail; ?>">
            <input type="hidden" name="cnsdist" value="<?php echo $cnsdist; ?>">
            <input type="hidden" name="cnsabbr_name" value="<?php echo str_replace("'","","$cnsabbr_name"); ?>">
            <input type="hidden" name="hesubname" value="<?php echo $hesubname; ?>">
            <input type="hidden" name="cnsname" value="<?php echo str_replace("'","","$cnsname"); ?>">
            <input type="hidden" name="cnsmobile" value="<?php echo $cnsmobile; ?>">
            <input type="hidden" name="cnsstate" value="<?php echo $cnsstate; ?>">
            <input type="hidden" name="cnsadd1" value="<?php echo $cnsadd1; ?>">
            <input type="hidden" name="cnsadd2" value="<?php echo $cnsadd2; ?>">
            <input type="hidden" name="cnsadd3" value="<?php echo $cnsadd3; ?>">
            <br><br><br>
            <input type="button" value="ADD MORE" onclick="add_row()" class="btn blue-gradient animated flipInX">
            <input type="submit" name="submit_row" value="SUBMIT" class="btn blue-gradient animated flipInY subm" id="submit">
            <!-- <button class="btn btn-primary" type="submit" name="printch" formaction="includes/print.php" formtarget="_blank" id="chal"> Print Challan </button> -->
        </form>
    </div>
</div>
<?php }  ?>
<script type="text/javascript">
    function add_row() {
        $rowno = $("#he_table tr").length;
        $rowno = $rowno + 1;
        $("#he_table tr:last").after("<tr id='row" + $rowno + "'><td style='width:30px;'> <b>" + $rowno + "</b> </td><td><input type='text' name='bagno[]' placeholder='Enter Bag Number' value=''></td><td><input type='text' name='nocp[]' placeholder='Enter No. of Copies' value='200'></td><td><input class='btn blue-gradient animated flipInX' type='button' value='DELETE' onclick=delete_row('row" + $rowno + "')></td></tr>");
    }

    function delete_row(rowno) {
        $('#' + rowno).remove();
    }
    function validateForm() {
    let x = document.getElementById("staff_name");
    var selectedValue = x.options[x.selectedIndex].value;
    if (selectedValue == "selectcard")
   {
    alert("Please select Depositor Name");
    return false;
   } else {
    myFunction();
   }
    }
    function myFunction() {
    var x = document.getElementById("submit");
    var y = document.getElementById("chal");
    x.style.display = "block";
    y.style.display = "none";
    }
</script>
<style>
    .datepicker {}

</style>

<script>
    $(function() {
        $(".datepicker").datepicker();
    });

</script>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" />
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js"></script>
