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
    <script>
        function printDiv(divName) {
         var printContents = document.getElementById(divName).innerHTML;
         var originalContents = document.body.innerHTML;

         document.body.innerHTML = printContents;

         window.print();

         document.body.innerHTML = originalContents;
         close_window();
         }
         function close_window() {
            close();
         }
    </script>
    <style type="text/css">
      .button-7 {
  background-color: #0095ff;
  border: 1px solid transparent;
  border-radius: 3px;
  box-shadow: rgba(255, 255, 255, .4) 0 1px 0 0 inset;
  box-sizing: border-box;
  color: #fff;
  cursor: pointer;
  display: inline-block;
  font-family: -apple-system,system-ui,"Segoe UI","Liberation Sans",sans-serif;
  font-size: 13px;
  font-weight: 400;
  line-height: 1.15385;
  margin: 0;
  outline: none;
  padding: 8px .8em;
  position: relative;
  text-align: center;
  text-decoration: none;
  user-select: none;
  -webkit-user-select: none;
  touch-action: manipulation;
  vertical-align: baseline;
  white-space: nowrap;
}

.button-7:hover,
.button-7:focus {
  background-color: #07c;
}

.button-7:focus {
  box-shadow: 0 0 0 4px rgba(0, 149, 255, .15);
}

.button-7:active {
  background-color: #0064bd;
  box-shadow: none;
}
      .tg  {border-collapse:collapse;border-spacing:0;margin:0px auto;}
      .tg td{border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:16px;
      overflow:hidden;padding:5px 10px;word-break:normal;}
      .tg th{border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:16px;
      font-weight:normal;overflow:hidden;padding:5px 5px;word-break:normal;}
      .tg .tg-0lax{text-align:left;vertical-align:top; width:200px}
      @media screen and (max-width: 767px) {.tg {width: auto !important;}.tg col {width: auto !important;}.tg-wrap {overflow-x: auto;-webkit-overflow-scrolling: touch;margin: auto 0px;}}
    </style>
    
    <center><input class="button-7" type="button" onclick="printDiv('prn')" value="Print" /></center>
    <div class="page" id="prn">
      <div class="header row">
         <div class="col-md-2">
            <img src="../img/cbse-logo.png" alt="Logo" height="100px" width="100px" style="position:absolute;margin:0px 0px 0px 0px;">
         </div>
         <div class="col-md-10">
            <label style="position:absolute;margin:20px 0px 0px 210px;font-weight:800;font-size:18px;"><u> CENTRAL BOARD OF SECONDARY EDUCATION </u></label><br>
            <label style="position:absolute;margin:25px 0px 0px 290px;font-weight:800;font-size:18px;"> REGIONAL OFFICE, PATNA </label>
            <label style="position:absolute;margin:50px 0px 0px 140px;font-weight:800;font-size:14px;"> AMBIKA COMPLEX, BEHIND STATE BANK COLONY SHEIKHPURA PATNA – 800014 </label>
            <label style="position:absolute;margin:100px 0px 0px 40px;font-weight:800;font-size:19px;"> DISPATCH REGISTER OF ANSWER BOOK TO THE HEAD EXAMINER </label>
            <label style="position:absolute;margin:130px 0px 0px 40px;font-weight:800;font-size:18px;"> Examination Year - ( Compt. ) <?php echo $year; ?></label>
            <label style="position:absolute;margin:130px 0px 0px 390px;font-weight:800;font-size:18px;"> DATE OF DISPATCH:- <?php echo $date; ?></label>
            <label style="position:absolute;margin:150px 0px 0px 20px;font-weight:800;font-size:18px;"> <u>H.E. Details: </u></label>
            
            <label style="position:absolute;margin:170px 0px 0px 20px;font-size:16px;"> 
            H.E. No: &nbsp;&nbsp;<?php echo $heno; ?> &nbsp;&nbsp;&nbsp;&nbsp;Subject Code: &nbsp;&nbsp;<?php echo $hesub; ?> (<?php echo $hesubname; ?>) &nbsp;&nbsp;&nbsp;&nbsp; Class: &nbsp;&nbsp;<?php echo $heclass; ?><br> 
            H.E. Name: &nbsp;&nbsp;<?php echo $hename; ?><br>
            H.E. School: &nbsp;&nbsp;(<?php echo $he_sch; ?>) <?php echo str_replace("'","","$heabbr_name"); ?><br>
            District/State: &nbsp;&nbsp;<?php echo $hedist; ?>/<?php echo $hestate; ?><br>
            H.E. Mobile: &nbsp;&nbsp;<?php echo $hemobile; ?>
            </label>
            
            <label style="position:absolute;margin:250px 0px 0px 300px;font-weight:800;font-size:18px;"> <u>CNS Details: </u></label>
            <label style="position:absolute;margin:270px 0px 0px 300px;font-size:16px;"> 
            CNS Name: &nbsp;&nbsp;<?php echo $cnsname; ?><br>
            CNS School: &nbsp;&nbsp;(<?php echo $cnssch_no; ?>) <?php echo $cnsadd1; ?><br>
            <?php echo $cnsadd2; ?><br>
            <?php echo $cnsadd3; ?><br>
            District/State: &nbsp;&nbsp;<?php echo $cnsdist; ?>/<?php echo $cnsstate; ?><br>
            CNS Mobile: &nbsp;&nbsp;<?php echo $cnsmobile; ?>
            </label>
            <label style="position:absolute;margin:380px 0px 0px 20px;font-weight:800;font-size:18px;"> BAG Details: </label>
            <div class="tg-wrap" style="position:absolute;margin:400px 0px 0px 20px;"><table class="tg">
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
            <table class="th" style="position:absolute;margin:800px 0px 0px 0px; font-weight:800;font-size:17px;">
            <tbody>
            <tr>
               <td class="tg-0pky">Dated: _______________ <br> Name of the CBSE/<br>Board Representative:</td>
               <td class="tg-0pky"> Signature: _______________ <br> <?php echo $staffn; ?></td>
               <td class="tg-0pky" style="padding-left:90px"></td>
            </tr>
            </tbody> 
            </table>
            <label style="position:absolute;margin:880px 0px 0px 530px;font-weight:800;font-size:17px;"> Asstt. Secretary (Conf.) </label>
            <label style="position:absolute;margin:910px 0px 0px 0px;font-weight:800;font-size:17px;"> Received above confidential sealed Bags for Evaluation. </label>
            <label style="position:absolute;margin:940px 0px 0px 530px;font-weight:800;font-size:17px;"> Signature of HE /CNS </label>
            <label style="position:absolute;margin:970px 0px 0px 0px;font-weight:400;font-size:16px;"> Distribution: 1. Office Record 2. CBSE Representative 3. H.E. 4. Dispatcher Copy </label>
         </div>
      </div>
    </div>
    <?php } ?>