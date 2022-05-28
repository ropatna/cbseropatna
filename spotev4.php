<?php
$conn = mysqli_connect('localhost','root','','cbse');
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
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
<script>
    function printDiv(divName) {
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;

        window.print();

        document.body.innerHTML = originalContents;
    }

</script>
<div class="content" id="prn">
    <form action="index.php?spotev4" method="POST" class="navbar-form navbar-left navbar-inverse" style="width:100%;padding:5px;">
        <span class="text-light bg-dark"> Filter On : </span>
        <select name="searchsha" id="shasearch_in" class="dropdown">
            <option disabled selected> -Select- </option>
            <option value="heno" <?php if($shasearch_in=="heno") { echo "selected"; } ?>> Heno </option>
            <option value="dstat" <?php if($shasearch_in=="dstat") { echo "selected"; } ?>> Dispatch Date (YYYY-MM-DD)</option>
            <option value="pending" <?php if($shasearch_in=="pending") { echo "selected"; } ?>> Pending </option>
            <option value="received" <?php if($shasearch_in=="received") { echo "selected"; } ?>> Received </option>
            <option value="lbm" <?php if($shasearch_in=="lbm") { echo "selected"; } ?>> Manjhi Ji </option>
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
                    <option value="<?php echo $list; ?>" <?php if($shasearch_in==$list) { echo "selected"; } ?>> <?php echo $list; ?> </option>
                <?php } ?>
            <option disabled>---------------------------</option>
            <option value="all" <?php if($shasearch_in=="all") { echo "selected"; } ?>>Show All </option>
        </select>
        <div class="input-group">
            <input type="text" name="shatext" placeholder="YYYY-MM-DD" value="<?php echo "$shatext"; ?>" class="form-control" >
            <div class="input-group-btn">
                <button class="btn aqua-gradient" type="submit" name="shasearch" style="height:34px;margin-top:0px;">
                    <i class="glyphicon glyphicon-search"></i>
                </button>
            </div>
        </div>
    </form>
    <input class="btn blue-gradient animated slideInLeft" type="button" onclick="printDiv('prn')" value="Print!" />
    <?php if(isset($_POST['shasearch'])){ ?>

    <span style="float:left;margin-top:0px;color:red;"> <b>HE's Found:
    <?php $spotctr = $hectr['COUNT(*)']; echo "$spotctr"; ?>
    </b> </span>

    <div class="container my-4">
        <table class="table table-striped table-bordered table-sm" id="dtBasicExample">
            <thead>
                <tr>
                    <th class="th-sm" style="background-color: gray;"> Heno </th>
                    <th class="th-sm" style="background-color: gray;"> Bag NO. </th>
                    <th class="th-sm" style="background-color: gray;"> No. of Copies </th>
                    <th class="th-sm" style="background-color: gray;"> Dispatch Date (DD-MM-YYYY) </th>
                    <th class="th-sm" style="background-color: gray;"> Recieve Date </th>
                </tr>
            </thead>
            <tbody>
                <?php while($rowall = mysqli_fetch_array($spotall)){
        $vheno=$rowall['heno'];
        $vhename=$rowall['hename'];
        $vhesub=$rowall['hesub'];
        $vhesubname=$rowall['hesubname'];
        $vhemobile=$rowall['hemobile'];
        $vcnssch_no=$rowall['cns_schno'];
        $vcnsabbr_name=$rowall['cnsabbr_name'];
        $vcnsname=$rowall['cnsname'];
        $vcnsmobile=$rowall['cnsmobile'];
        $vcnsdist=$rowall['cnsdist'];
        $dstat=$rowall['dstat'];
        $newdstat = date("d-m-Y", strtotime($dstat));
        $rstat=$rowall['rstat'];
        $depositby=$rowall['depositby'];
        $receivedby=$rowall['receivedby'];
        for($n=1;$n<=15;$n++){
            ${"bagno".$n} = $rowall['bagno'.$n];
            ${"nocp".$n} = $rowall['nocp'.$n];
        } ?>
                <tr>
                    <th style="background-color: #d8d8d8;" colspan="2"> <?php echo $vheno; ?><br> <?php echo $vhename; ?><br>Mobile No. : <?php echo $vhemobile; ?> </th>
                    <th style="background-color: #d8d8d8;"> <?php echo $vhesub; ?><br> <?php echo $vhesubname; ?><br> <?php echo $vcnsdist; ?> </th>
                    <th style="background-color: #d8d8d8;" colspan="2"> <?php echo $vcnssch_no; ?> &nbsp;&nbsp;&nbsp;<?php echo $vcnsname; ?> <br> <?php echo $vcnsabbr_name; ?> <br> Mobile :<?php echo $vcnsmobile; ?> <br>Deposited By: <?php echo $depositby; ?><br><?php if($rstat!=NULL){ ?>Received By: <?php echo $receivedby; }?></th>
                </tr>
                <?php for($i=1;$i<=15;$i++) { if(${"bagno".$i}!="" && ${"nocp".$i}!="" && $dstat!="") { ?>
                <tr>
                    <td><?php echo $vheno; ?></td>
                    <td><?php echo ${"bagno".$i}; ?></td>
                    <td><?php echo ${"nocp".$i}; ?></td>
                    <td><?php echo $newdstat; ?></td>
                    <td><?php echo $rstat; ?></td>
                </tr>
                <?php } } } ?>
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
    </div>
    <?php } ?>
</div>
<script>
    $(document).ready(function() {
        $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#myTable tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });

</script>
