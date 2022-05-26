<?php

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
<style>
    .box {
        width: 400px;
        height: 200px;
        margin: auto;
        margin-top: 50px;
        -webkit-box-shadow: 5px 5px 8px 0px rgba(0, 0, 0, 0.75);
        -moz-box-shadow: 5px 5px 8px 0px rgba(0, 0, 0, 0.75);
        box-shadow: 5px 5px 8px 0px rgba(0, 0, 0, 0.75);
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
<div class="content">
    <div class="header" style="height: 50px;margin-top: -250px;">
        <div class="nav_bar">
            <ul class="nav navbar-nav navbar-left">
                <li class="active"><a href="index.php?spotev"> Allot Bags</a></li>
                <li><a href="index.php?spotev3"> View alloted Bags</a></li>
            </ul>
        </div>
    </div>
    <?php if(!isset($_POST['heallsearch']) && !isset($_POST['spothesearch'])){ ?>
    <div class="box">
        <form action="index.php?spotev3" method="POST" class="form-control" style="width:400px;padding:5px;height:200px;">
            <center><button class="btn btn-primary animated rubberBand" type="submit" name="heallsearch" style="border-radius:4px;font-size:11px;" formaction="index.php?spotev4">
                    <span>Click here to Show all alloted Bags.</span>
                </button><br><br>
                <span><strong>--OR--</strong></span></center><br><br>
            <strong>Search with particular HE. <br> He Number :</strong>
            <input type="text" name="heno" class="form-control" style="border-radius:4px;width:300px;" placeholder="Enter He Number">
            <button class="btn btn-default aqua-gradient" type="submit" name="spothesearch" style="border-radius:4px;float:right;margin-top:-34px;margin-right:40px;height:34px;">
                <i class="glyphicon glyphicon-search"></i>
            </button>
        </form>
    </div>
    <?php } elseif(isset($_POST['spothesearch'])){
        $hespot = mysqli_query($conn,"SELECT * FROM spotev2022m WHERE heno=".$_POST['heno']); ?>
    <table class="table table-striped table-bordered table-sm">
        <thead>
            <tr>
                <th style="background-color: gray;"> Heno </th>
                <th style="background-color: gray;"> Bag NO. </th>
                <th style="background-color: gray;"> No. of Copies </th>
                <th style="background-color: gray;"> Dispatch Date (DD-MM-YYY)</th>
                <th style="background-color: gray;"> Recieve Date </th>
            </tr>
        </thead>
        <tbody>
        <?php $nb=0;$tcopy=0;
        while($rowhe = mysqli_fetch_array($hespot)){;
        $cheno=$rowhe['heno'];
        $vhename=$rowhe['hename'];
        $vhesub=$rowhe['hesub'];
        $vhesubname=$rowhe['hesubname'];
        $vhemobile=$rowhe['hemobile'];
        $vcnssch_no=$rowhe['cns_schno'];
        $vcnsabbr_name=$rowhe['cnsabbr_name'];
        $vcnsname=$rowhe['cnsname'];
        $vcnsmobile=$rowhe['cnsmobile'];
        $vcnsdist=$rowhe['cnsdist'];
        $vdstat=$rowhe['dstat'];
        $newddate = date("d-m-Y", strtotime($vdstat));
        $vrstat=$rowhe['rstat'];
        $rcby=$rowhe['receivedby'];
        $depositby=$rowhe['depositby'];
        for($n=1;$n<=15;$n++){
            ${"bagno".$n.$n} = $rowhe['bagno'.$n];
            ${"nocp".$n.$n} = $rowhe['nocp'.$n];
        }
        for($n=1;$n<=15;$n++){
            if(${"bagno".$n.$n}!=""){
                $nb += 1;
            }
            if(${"nocp".$n.$n}!=""){
                 $tcopy += ${"nocp".$n.$n};
            }
        } ?>
            <tr>
                    <th style="background-color: #d8d8d8;" colspan="2"> <?php echo $cheno; ?><br> <?php echo $vhename; ?><br>Mobile No. : <?php echo $vhemobile; ?> </th>
                    <th style="background-color: #d8d8d8;"> <?php echo $vhesub; ?><br> <?php echo $vhesubname; ?><br> <?php echo $vcnsdist; ?> </th>
                    <th style="background-color: #d8d8d8;" colspan="2"> <?php echo $vcnssch_no; ?> &nbsp;&nbsp;&nbsp;<?php echo $vcnsname; ?> <br> <?php echo $vcnsabbr_name; ?> <br> Mobile :<?php echo $vcnsmobile; ?> </th>
                </tr>
            <?php for($i=1;$i<=15;$i++) { if(${"bagno".$i.$i}!="" && ${"nocp".$i.$i}!="" && $vdstat!="") { ?>
            <tr>
                <td><?php echo $cheno; ?></td>
                <td><?php echo ${"bagno".$i.$i}; ?></td>
                <td><?php echo ${"nocp".$i.$i}; ?></td>
                <td><?php echo $newddate; ?></td>
                <td><?php echo $vrstat; ?></td>
            </tr>
            <?php } } }?>
        </tbody>
        <tfoot>
            <tr>
                <th style="background-color: gray;"> Heno </th>
                <th style="background-color: gray;"> Bag NO. </th>
                <th style="background-color: gray;"> No. of Copies </th>
                <th style="background-color: gray;"> Dispatch Date </th>
                <th style="background-color: gray;"> Recieve Date </th>
            </tr>
        </tfoot>
    </table>
    <p class="deep-orange-text"><label>Total Number of Bags : <?php echo $nb; ?> </label>
    <label>Total Number of copies : <?php echo $tcopy; ?> </label></p><br>

    <p class="deep-orange-text"><label>Deposited By : <?php echo $depositby; ?> </label></p>
    <p class="deep-orange-text" <?php if($vrstat==NULL){ echo "hidden"; } ?>><label>Received By : <?php echo $rcby; ?> </label></p>
    <form action="index.php?spotev3" method="post" <?php if($vrstat!=NULL){ echo "hidden"; } ?>>
        <label>Recieved Back?</label>
        <div class="btn-group btn-group-toggle" data-toggle="buttons">
            <label class="btn btn-primary form-check-label">
                <input class="form-check-input" type="radio" name="options" id="option1" autocomplete="off" value="yes">
                Yes
            </label>
            <label class="btn btn-primary form-check-label active">
                <input class="form-check-input" type="radio" name="options" id="option2" autocomplete="off" checked value="no"> No
            </label>
        </div>
        <label>Recieved By:</label>
        <select name="staff" id="staff_name" class="dropdown">
            <option disabled selected> -Select- </option>
            <?php $stafflist = [
                'Sh. Shambhu Prasad, SO',
                'Sh. V. Lambiakliyan, SO',
                'Sh. Ramanuj Prasad, SO',
                'Sh. Guru Dutt Rohilla',
                'Sh. Andeep Kumar',
                'Sh. Jyoti Prasad',
                'Sh. Shambhu kant roy',
                'Sh. Aditya Kumar, SO',
                'Sh. Rajesh Kumar, Sup.',
                'Sh. Manoj Kumar Singh, Sup.',
                'Sh. Prabhat Kumar Singh, Sup.',
                'Md. Fazal Imam, Sup.',
                'Sh. Pankaj Gupta, PA',
                'Sh. Chhote Lal, Sup.',
                'Sh. Vatan Kumar, Sup.',
                'Sh. Pankaj, Accountant',
                'Sh. Umesh Sharma, SA',
                'Sh. Niraj Kumar, SA',
                'Sh. Dharmendra Kumar, SA',
                'Sh. Jitendra Kumar, SA',
                'Sh. Chandan Kumar, SA',
                'Smt. Nidhi Kumari, SA',
                'Sh. Amarnath Jha, SA',
                'Sh. Sachin Kumar, SA',
                'Sh. Sanjeev Kumar Sinha, SA',
                'Sh. Lal Bihari Manjhi, MTS',
                'Sh. Puran Bahadur, MTS'
                ];
                foreach ($stafflist as $list) { ?>
            <option value="<?php echo $list; ?>" <?php if($staff==$list) { echo "selected"; } ?>> <?php echo $list; ?> </option>
            <?php } ?>
        </select>
        <input type="hidden" name="heno" value="<?php echo $cheno; ?>">
        <input type="submit" name="rstat" value="UPDATE STATUS" class="btn blue-gradient animated flipInY">
    </form>
    <?php } ?>
</div>
<?php
    if(isset($_POST['rstat'])){
        $option = $_POST['options'];
        $heno = $_POST['heno'];
        $today = date("d/m/Y");
        $receivedby = $_POST['staff'];
        if($option=="yes"){
            $q1 = mysqli_query($conn,"UPDATE spotev2022m SET rstat='".$today."', receivedby='".$receivedby."' WHERE heno='".$heno."'");
        }
        if($q1){
            echo "<script>alert('Bag receive Status Updated..');</script>";
        }
    }
?>
