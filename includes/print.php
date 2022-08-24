<?php 
if(isset($_POST['printch'])){
    $heno = $_POST['heno'];
    $bagno=$_POST['bagno'];
    $nocp=$_POST['nocp'];
       $heabbr_name = $_POST['heabbr_name'];
       $he_sch = $_POST['he_sch'];
       $hename = $_POST['hename'];
       $hemobile = $_POST['hemobile'];
       $hedist = $_POST['hedist'];
       $hesub = $_POST['hesub'];
       $heclass = $_POST['heclass'];
       $hestate = $_POST['hestate'];
       $cnssch_no = $_POST['cns_schno'];
       $heemail = $_POST['heemail'];
       $cnsabbr_name = $_POST['cnsabbr_name'];
       $cnsname = $_POST['cnsname'];
       $cnsmobile = $_POST['cnsmobile'];
       $hesubname = $_POST['hesubname'];
       $cnsdist = $_POST['cnsdist'];
       $cnsstate = $_POST['cnsstate'];
       $cnsadd1 = $_POST['cnsadd1'];
       $cnsadd2 = $_POST['cnsadd2'];
       $cnsadd3 = $_POST['cnsadd3'];
       $staffn = $_POST['staff'];
       date_default_timezone_set('Asia/Kolkata');
       $year = date('Y');
       $date = date('d-M-Y');
    ?>
    <style type="text/css">
      .tg  {border-collapse:collapse;border-spacing:0;margin:0px auto;}
      .tg td{border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:16px;
      overflow:hidden;padding:5px 10px;word-break:normal;}
      .tg th{border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:16px;
      font-weight:normal;overflow:hidden;padding:5px 5px;word-break:normal;}
      .tg .tg-0lax{text-align:left;vertical-align:top; width:200px}
      @media screen and (max-width: 767px) {.tg {width: auto !important;}.tg col {width: auto !important;}.tg-wrap {overflow-x: auto;-webkit-overflow-scrolling: touch;margin: auto 0px;}}
    </style>
    <div class="page">
      <div class="header row">
         <div class="col-md-2">
            <img src="../img/cbse-logo.png" alt="Logo" height="100px" width="100px" style="position:absolute;margin:0px 0px 0px 0px;">
         </div>
         <div class="col-md-10">
            <label style="position:absolute;margin:20px 0px 0px 210px;font-weight:800;font-size:18px;"><u> CENTRAL BOARD OF SECONDARY EDUCATION </u></label><br>
            <label style="position:absolute;margin:25px 0px 0px 290px;font-weight:800;font-size:18px;"> REGIONAL OFFICE, PATNA </label>
            <label style="position:absolute;margin:50px 0px 0px 140px;font-weight:800;font-size:14px;"> AMBIKA COMPLEX, BEHIND STATE BANK COLONY SHEIKHPURA PATNA – 800014 </label>
            <label style="position:absolute;margin:100px 0px 0px 40px;font-weight:800;font-size:19px;"> DISPATCH REGISTER OF ANSWER BOOK TO THE HEAD EXAMINER </label>
            <label style="position:absolute;margin:130px 0px 0px 390px;font-weight:800;font-size:18px;"> Examination Year - ( Compt. ) <?php echo $year; ?></label>
            <label style="position:absolute;margin:150px 0px 0px 390px;font-weight:800;font-size:18px;"> DATE OF DISPATCH:- <?php echo $date; ?></label>
            
            <label style="position:absolute;margin:180px 0px 0px 20px;font-size:16px;"> 
            H.E. No: &nbsp;&nbsp;<?php echo $heno; ?> &nbsp;&nbsp;&nbsp;&nbsp;Subject Code: &nbsp;&nbsp;<?php echo $hesub; ?> (<?php echo $hesubname; ?>) &nbsp;&nbsp;&nbsp;&nbsp; Class: &nbsp;&nbsp;<?php echo $heclass; ?><br> 
            H.E. Name: &nbsp;&nbsp;<?php echo $hename; ?><br>
            H.E. School: &nbsp;&nbsp;(<?php echo $he_sch; ?>) <?php echo str_replace("'","","$heabbr_name"); ?><br>
            District/State: &nbsp;&nbsp;<?php echo $hedist; ?>/<?php echo $hestate; ?><br>
            H.E. Mobile: &nbsp;&nbsp;<?php echo $hemobile; ?>
            </label>
            
            <label style="position:absolute;margin:250px 0px 0px 300px;font-size:16px;"> 
            CNS Name: &nbsp;&nbsp;<?php echo $cnsname; ?><br>
            CNS School: &nbsp;&nbsp;(<?php echo $cnssch_no; ?>) <?php echo $cnsadd1; ?><br>
            <?php echo $cnsadd2; ?><br>
            <?php echo $cnsadd3; ?><br>
            District/State: &nbsp;&nbsp;<?php echo $cnsdist; ?>/<?php echo $cnsstate; ?><br>
            CNS Mobile: &nbsp;&nbsp;<?php echo $cnsmobile; ?>
            </label>
            <label style="position:absolute;margin:340px 0px 0px 20px;font-weight:800;font-size:18px;"> BAG Details: </label>
            <div class="tg-wrap" style="position:absolute;margin:370px 0px 0px 20px;"><table class="tg">
               <thead>
               <tr>
                  <th class="tg-0lax"> S.No. </th>
                  <th class="tg-0lax"> Bag No. From</th>
                  <th class="tg-0lax"> No. of Answer Books</th>
               </tr>
               </thead>
               <tbody>
                  <?php $tcopy=0;$nb=0;
                        for($i=0;$i<count($bagno);$i++)
                        {
                        if($bagno[$i]!="" && $nocp[$i]!="")
                        { $tcopy+= $nocp[$i];$nb+=1; ?>
               <tr>
                  <td class="tg-0lax"> <?php echo $i+1; ?>. </td>
                  <td class="tg-0lax"> <?php echo $bagno[$i]; ?></td>
                  <td class="tg-0lax"> <?php echo $nocp[$i]; ?></td>
               </tr>
                  <?php } } ?>
               <tr>
                  <td class="tg-0lax"> <b>TOTAL NO. OF BAG's/AB's</b> </td>
                  <td class="tg-0lax"> <b><?php echo $nb; ?> Bags</b></td>
                  <td class="tg-0lax"> <b><?php echo $tcopy; ?> Copies</b></td>
               </tr>
               </tbody>
               </table>
            </div> 
            <table class="th" style="position:absolute;margin:840px 0px 0px 0px; font-weight:800;font-size:17px;">
            <tbody>
            <tr>
               <td class="tg-0pky">Name of the CBSE/<br>Board Representative:</td>
               <td class="tg-0pky"><?php echo $staffn; ?></td>
               <td class="tg-0pky" style="padding-left:90px"> Signature: _______________ <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Dated: _______________</td>
            </tr>
            </tbody> 
            </table>
            <label style="position:absolute;margin:920px 0px 0px 530px;font-weight:800;font-size:17px;"> Asstt. Secretary (Conf.) </label>
            <label style="position:absolute;margin:950px 0px 0px 0px;font-weight:800;font-size:17px;"> Received above confidential sealed Bags for Evaluation advance as above in cover. </label>
            <label style="position:absolute;margin:980px 0px 0px 530px;font-weight:800;font-size:17px;"> Signature of HE /CNS </label>
            <label style="position:absolute;margin:990px 0px 0px 0px;font-weight:400;font-size:16px;"> Distribution: Office Record/CBSE Representative/H.E./Dispatcher Copy </label>
         </div>
      </div>
    </div>
    <?php } ?>