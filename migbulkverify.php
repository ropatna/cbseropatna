<?php include 'includes/conn.php'; ?>
<?php if(isset($_POST['verifymig'])){
    $rmigyear = $_POST['rmigyear'];
    $rmigclass = $_POST['rmigclass'];
    $rmigexamtype = $_POST['rmigexamtype'];
    $sn = 0;
    if(isset($_POST['reqs1'])){$sn += 1; ${"rol".$sn} = $_POST['reqs1'];}
    if(isset($_POST['reqs2'])){$sn += 1; ${"rol".$sn} = $_POST['reqs2'];}
    if(isset($_POST['reqs3'])){$sn += 1; ${"rol".$sn} = $_POST['reqs3'];}
    if(isset($_POST['reqs4'])){$sn += 1; ${"rol".$sn} = $_POST['reqs4'];}
    if(isset($_POST['reqs5'])){$sn += 1; ${"rol".$sn} = $_POST['reqs5'];}
    if(isset($_POST['reqs6'])){$sn += 1; ${"rol".$sn} = $_POST['reqs6'];}
    if(isset($_POST['reqs7'])){$sn += 1; ${"rol".$sn} = $_POST['reqs7'];}
    if(isset($_POST['reqs8'])){$sn += 1; ${"rol".$sn} = $_POST['reqs8'];}
    if(isset($_POST['reqs9'])){$sn += 1; ${"rol".$sn} = $_POST['reqs9'];}
    if(isset($_POST['reqs10'])){$sn += 1; ${"rol".$sn} = $_POST['reqs10'];}
    if(isset($_POST['reqs11'])){$sn += 1; ${"rol".$sn} = $_POST['reqs11'];}
    if(isset($_POST['reqs12'])){$sn += 1; ${"rol".$sn} = $_POST['reqs12'];}
    if(isset($_POST['reqs13'])){$sn += 1; ${"rol".$sn} = $_POST['reqs13'];}
    if(isset($_POST['reqs14'])){$sn += 1; ${"rol".$sn} = $_POST['reqs14'];}
    if(isset($_POST['reqs15'])){$sn += 1; ${"rol".$sn} = $_POST['reqs15'];}
    if(isset($_POST['reqs16'])){$sn += 1; ${"rol".$sn} = $_POST['reqs16'];}
    if(isset($_POST['reqs17'])){$sn += 1; ${"rol".$sn} = $_POST['reqs17'];}
    if(isset($_POST['reqs18'])){$sn += 1; ${"rol".$sn} = $_POST['reqs18'];}
    if(isset($_POST['reqs19'])){$sn += 1; ${"rol".$sn} = $_POST['reqs19'];}
    if(isset($_POST['reqs20'])){$sn += 1; ${"rol".$sn} = $_POST['reqs20'];}
    if(isset($_POST['reqs21'])){$sn += 1; ${"rol".$sn} = $_POST['reqs21'];}
    if(isset($_POST['reqs22'])){$sn += 1; ${"rol".$sn} = $_POST['reqs22'];}
    if(isset($_POST['reqs23'])){$sn += 1; ${"rol".$sn} = $_POST['reqs23'];}
    if(isset($_POST['reqs24'])){$sn += 1; ${"rol".$sn} = $_POST['reqs24'];}
    if(isset($_POST['reqs25'])){$sn += 1; ${"rol".$sn} = $_POST['reqs25'];}
    if(isset($_POST['reqs26'])){$sn += 1; ${"rol".$sn} = $_POST['reqs26'];}
    if(isset($_POST['reqs27'])){$sn += 1; ${"rol".$sn} = $_POST['reqs27'];}
    if(isset($_POST['reqs28'])){$sn += 1; ${"rol".$sn} = $_POST['reqs28'];}
    if(isset($_POST['reqs29'])){$sn += 1; ${"rol".$sn} = $_POST['reqs29'];}
    if(isset($_POST['reqs30'])){$sn += 1; ${"rol".$sn} = $_POST['reqs30'];}
    if(isset($_POST['reqs31'])){$sn += 1; ${"rol".$sn} = $_POST['reqs31'];}
    if(isset($_POST['reqs32'])){$sn += 1; ${"rol".$sn} = $_POST['reqs32'];}
    if(isset($_POST['reqs33'])){$sn += 1; ${"rol".$sn} = $_POST['reqs33'];}
    if(isset($_POST['reqs34'])){$sn += 1; ${"rol".$sn} = $_POST['reqs34'];}
    if(isset($_POST['reqs35'])){$sn += 1; ${"rol".$sn} = $_POST['reqs35'];}
    if(isset($_POST['reqs36'])){$sn += 1; ${"rol".$sn} = $_POST['reqs36'];}
    if(isset($_POST['reqs37'])){$sn += 1; ${"rol".$sn} = $_POST['reqs37'];}
    if(isset($_POST['reqs38'])){$sn += 1; ${"rol".$sn} = $_POST['reqs38'];}
    if(isset($_POST['reqs39'])){$sn += 1; ${"rol".$sn} = $_POST['reqs39'];}
    if(isset($_POST['reqs40'])){$sn += 1; ${"rol".$sn} = $_POST['reqs40'];}
    if(isset($_POST['reqs41'])){$sn += 1; ${"rol".$sn} = $_POST['reqs41'];}
    if(isset($_POST['reqs42'])){$sn += 1; ${"rol".$sn} = $_POST['reqs42'];}
    if(isset($_POST['reqs43'])){$sn += 1; ${"rol".$sn} = $_POST['reqs43'];}
    if(isset($_POST['reqs44'])){$sn += 1; ${"rol".$sn} = $_POST['reqs44'];}
    if(isset($_POST['reqs45'])){$sn += 1; ${"rol".$sn} = $_POST['reqs45'];}
    if(isset($_POST['reqs46'])){$sn += 1; ${"rol".$sn} = $_POST['reqs46'];}
    if(isset($_POST['reqs47'])){$sn += 1; ${"rol".$sn} = $_POST['reqs47'];}
    if(isset($_POST['reqs48'])){$sn += 1; ${"rol".$sn} = $_POST['reqs48'];}
    if(isset($_POST['reqs49'])){$sn += 1; ${"rol".$sn} = $_POST['reqs49'];}
    if(isset($_POST['reqs50'])){$sn += 1; ${"rol".$sn} = $_POST['reqs50'];}
    if(isset($_POST['reqs51'])){$sn += 1; ${"rol".$sn} = $_POST['reqs51'];}
    if(isset($_POST['reqs52'])){$sn += 1; ${"rol".$sn} = $_POST['reqs52'];}
    if(isset($_POST['reqs53'])){$sn += 1; ${"rol".$sn} = $_POST['reqs53'];}
    if(isset($_POST['reqs54'])){$sn += 1; ${"rol".$sn} = $_POST['reqs54'];}
    if(isset($_POST['reqs55'])){$sn += 1; ${"rol".$sn} = $_POST['reqs55'];}
    if(isset($_POST['reqs56'])){$sn += 1; ${"rol".$sn} = $_POST['reqs56'];}
    if(isset($_POST['reqs57'])){$sn += 1; ${"rol".$sn} = $_POST['reqs57'];}
    if(isset($_POST['reqs58'])){$sn += 1; ${"rol".$sn} = $_POST['reqs58'];}
    if(isset($_POST['reqs59'])){$sn += 1; ${"rol".$sn} = $_POST['reqs59'];}
    if(isset($_POST['reqs60'])){$sn += 1; ${"rol".$sn} = $_POST['reqs60'];}
?>
<table>
    <tr>
        <th>Roll No.</th>
        <th>Can. Name</th>
    </tr>
    <?php
            for($i=1;$i<=50;$i++){
                if(isset(${"rol".$i})){
                    $mgr=mysqli_query($conn,"SELECT cname FROM r".$rmigclass.$rmigyear.$rmigexamtype." WHERE rroll=".${"rol".$i});
                    $row_name = mysqli_fetch_array($mgr);
                    $rowcount=mysqli_num_rows($mgr);
                    if($rowcount==0){
                        $row_name = mysqli_fetch_array(mysqli_query($conn,"SELECT cname FROM r".$rmigclass.$rmigyear."c WHERE rroll=".${"rol".$i}));
                    }
                    $cname = $row_name['cname'];?>
    <tr>
        <td><?php echo ${"rol".$i}; ?></td>
        <td><?php echo $cname ?></td>
    </tr>
    <?php    }
            }
        ?>
</table>
<?php } ?>
