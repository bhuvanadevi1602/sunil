<?php 
    include('./include/config.php');

    if(!empty($_REQUEST['from_date'])){
        $from_date = $_REQUEST['from_date'];
        $to_date = $_REQUEST['to_date'];
    }else{
        $fdate = $toDate = '';
    }

    $year = date('Y');

    

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Cash Bill Report | Sunil Traders</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <link href="assets/plugins/datatables/datatable.css" rel="stylesheet" type="text/css" />
     <!-- App css -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" />

<style>
tfoot  {
    display: table-footer-group;  
    }
    
@media print{
tfoot  {
    display: table-footer-group;  
    }
  
}


 @media print{
  .break
   {
    page-break-after:always !important;
  }
  .pages {
      height: 100px !important;
  }
}
.page-wrapper .page-content-tab {

    padding: 0 8px 35px 8px !important;
}
#invoice-table {
               border: 3.5px solid black !important; 
            border-spacing: 0; 
            clear: both;
            margin: 0.0mm 0mm;
             min-height: 172mm;
            width: 100%;
        }
        #invoice-table th, td { font-weight: bold; }
        #invoice-table th:first-child, td:first-child { border-left: none; }
        #invoice-table th {font-size:15pt;font-weight:bold;  }
        #invoice-table td { vertical-align: top; font-size: 10pt !important;font-weight:bold;position: relative;
    min-height: 0px;}
        th { text-align: center; font-weight: normal; }
        .amount { text-align: right; }
        .invoice_line { height: 6mm; }
        .invoice_line td, .invoice_line th { padding: 1mm; }
        

@media print{
 #invoice-table{
               border: 3.5px solid black !important;
            border-spacing: 0;
            clear: both;
            margin: 0.0mm 0mm;
             min-height: 192mm;
            width: 100%;
        }
        #invoice-table th, td { font-weight: bold; }
        #invoice-table th:first-child, td:first-child { border-left: none; }
       #invoice-table th {font-size:15px !important;font-weight:bold;white-space: nowrap;   }
        #invoice-table td { vertical-align: top; font-size: 10pt !important;font-weight:bold;position: relative;
    min-height: 0px;}
        th { text-align: center; font-weight: normal; }
        .amount { text-align: right; }
        .invoice_line { height: 6mm; }
        .invoice_line td, .invoice_line th { padding: 1mm; }
}

.gst-no, {
     width: 181px;
}
.net-amount {
    width: 115px;
}
.party-name {
      width: 200px;
}

</style> 
</head>
<!-- <body id="body" onload="window.print()" class="dark-sidebar"> -->
<body id="body" class="dark-sidebar">
    <!-- Top Bar Start -->
    <?php include('header.php') ?>
    <!--<?php // include('./include/topAndSideBar.php') ?>-->
    <!-- Top Bar End -->

    <div class="page-wrapper">

        <!-- Page Content-->
        <div class="page-content-tab">

            <div class="container-fluid page " style="margin-top: 10px;">
                <!-- Page-Title -->
                <!-- end page title end breadcrumb -->
                <div class="row">
                    <div class="col-lg-12" style="font-family: 'PT Serif', serif !important;">
                  <table class="table tablesss break" id="invoice-table" style="border: 1px solid;">
                            <thead>
                                <tr>
                                    <th class="text-center pt-1 pb-1" colspan="10">
                                        <h4 style="line-height: 10px;"><b><u>CASH BILL REPORT </u></b></h4>
                                        </td>
                                </tr>
                                <tr>
                                    <th class="text-start pt-1 pb-1" colspan="3">
                                        <h5 class="ttl-color"><b>SUNIL TRADERS</b></h5>
                                    </th>
                                    <th class="text-center pt-1 pb-1" colspan="4">
                                         <h4>From : <?= date('d-m-Y', strtotime($from_date)) ?> TO : <?= date('d-m-Y', strtotime($to_date)) ?></h4> 
                                    </th>
                                    <th class="text-end pt-1 pb-1" colspan="3">
                                        <h5 class="ttl-color"><b>33AAAFS1530K1ZJ</b></h5>
                                    </th>
                                </tr>

                              <tr class="table-title">
                                    <th class="text-center">S.No</th>
                                    <th class="text-center">DATE</th>
                                    <th class="text-center party-name">PARTY NAME</th>
                                    <th class="text-center" style="width: 100px;">TOTAL AMOUNT</th>
                                     <th class="text-center">CGST</th>
                                    <th class="text-center">SGST</th>
                                    <th class="text-center">IGST</th>
                                   <th class="text-center  gst-no">GST NO</th>
                                    <th class="text-center">BILL NO</th>
                                    <th class="text-center">NET AMOUNT</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                $co = "select count(*) as n from cash_bill_final where created_at >= '$from_date' and created_at <= '$to_date';";
                                $execo = mysqli_query($conn, $co);
                                $no = mysqli_fetch_assoc($execo);
                                // print_r($no['n']);die();
                                $j = $no['n'];
                                // print_r($j);die();
                                $s = 0;
                                $d=0;
                                $n = $j / 18;
                                $k = floor($n + 1);
                                $m = 0;

                                $i = 1;
                                $totalAmount = 0;
                                $totalCGST = 0;
                                $totalSGST = 0;
                                $totalIGST = 0;
                                $totalNetAmount = 0;
                            //   print_r($m<$k);die();
                                   if($m==0 && $k==1){
                                    while ($m < $k || $m == 0) {
                                    $m += 1;
                                    // print_r($m." ".$k);die();
                                    //   print_r($m." ".$k);die();
                                 for ($i = 1; $i <= $k; $i++) {
                                    //   $d++;
                                        $s = $m * 18;
                                        $s1 = (($m - 1) * 18)+1;
                                        $ms=$m-1;
                                            $cos = "select * from (select * from cash_bill_final where created_at >= '$from_date' and created_at <= '$to_date' order by cash_id asc limit $ms,$s) as subt ;";
                                        //   print_r($cos);die();
                                          // $cos="select * from cash_bill_final where created_at >= '2023-04-01' and created_at <= '2023-04-30'";
                                            $execos = mysqli_query($conn, $cos);
                                            while ($rec = mysqli_fetch_assoc($execos)) {
                                                $totalAmount = $totalAmount + $rec['total'];
                                                $totalNetAmount = $totalNetAmount + $rec['net_amount'];

                                                if (!empty($rec['cgst_amount'])) {
                                                    $totalCGST = $totalCGST + $rec['cgst_amount'];
                                                }


                                                if (!empty($rec['sgst_amount'])) {
                                                    $totalSGST = $totalSGST + $rec['sgst_amount'];
                                                }


                                                if (!empty($rec['igst_amount'])) {
                                                    $totalIGST = $totalIGST + $rec['igst_amount'];
                                                }

                                ?>
                                                <tr class="table-titless  invoice_line">
                                                    <td class="text-center"><?= $i++ ?></td>
                                                    <td class="text-center"><?= date('d-m-Y', strtotime($rec['created_at'])) ?></td>
                                                    <td class="text-center text-capitalize" style="white-space:nowrap;"><?= ($rec['customer_name']) ? $rec['customer_name'] : "---" ?></td>
                                                    <td class="text-center ">
                                                        <?php
                                                        $total = number_format($rec['total'], 2);
                                                        $tot_amount = str_replace(',', '', $total);

                                                        echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $tot_amount);
                                                        // echo $tot_amount;
                                                        ?>
                                                    </td>
                                                    <td class="text-center ">
                                                        <?php
                                                        $ct=$rec['cgst_amount'];
                                                        $isct = $ct;
$iscts = floatval(str_replace(',', '.', str_replace('.', '', $isct)));
                                                
                                                        if ($rec['cgst_amount'] != '') {
                                                         if(is_float($iscts)){
                                                            echo $ct;
                                                        }
                                                        else {
                                                            $cgst = number_format($rec['cgst_amount'], 2);
                                                            $cgst_amount = str_replace(',', '', $cgst);
                                                            echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $cgst_amount);
                                                            // echo $cgst_amount;
                                                        } 
                                                        }
                                                        else {
                                                            echo  "---";
                                                        }
                                                        ?>
                                                    </td>
                                                    <td class="text-center ">

                                                        <?php
                                                         $st=$rec['sgst_amount'];
                                                        $ssct = $st;
$sscts = floatval(str_replace(',', '.', str_replace('.', '', $ssct)));
                                                
                                                        if ($rec['sgst_amount'] != '') {
                                                          if(is_float($sscts)){
                                                            echo $st;
                                                        }
                                                        else {
                                                            $sgst = number_format($rec['sgst_amount'], 2);
                                                            $sgst_amount = str_replace(',', '', $sgst);
                                                            echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $sgst_amount);
                                                            // echo $sgst_amount;
                                                        } 
                                                        }
                                                        else {
                                                            echo  "---";
                                                        }
                                                        ?>
                                                    </td>
                                                    <td class="text-center ">

                                                        <?php
                                                         $it=$rec['igst_amount'];
                                                        $igct = $it;
$iscts = floatval(str_replace(',', '.', str_replace('.', '', $igct)));
                                               
                                                        if ($rec['igst_amount'] != '') {
                                                         if(is_float($iscts)){
                                                            echo $it;
                                                        } 
                                                        else
                                                        { 
                                                            $igst_amount = str_replace(',', '', $rec['igst_amount']);
                                                            echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $igst_amount);
                                                            // echo $igst_amount;
                                                        }
                                                        }
                                                        else{
                                                              echo  "---";
                                                        }
                                                        ?>
                                                    </td>
                                                    <td class="text-center text-capitalize "><?= ($rec['gst_no']) ? $rec['gst_no'] : "---" ?></td>
                                                    <td class="text-center text-capitalize"><?php echo $rec['bill_id']; ?></td>
                                                    <td class="text-center " style="font-weight: bold;">
                                                        <?php
                                                        $amount = number_format($rec['net_amount'], 2);
                                                        $net_amount = str_replace(',', '', $amount);

                                                        echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $net_amount);
                                                        // echo $net_amount;
                                                        ?>
                                                    </td>
                                                </tr>
                                            <?php
                                            }
                                            $ms=$m-1;
                                            $cos = "select SUM(total) as v,FORMAT(SUM(replace(sgst_amount, ',', '')), 2) as sgst,FORMAT(SUM(replace(cgst_amount, ',', '')), 2) as cgst,FORMAT(SUM(replace(igst_amount, ',', '')), 2) as igst,sum(net_amount) as net_amount from (select total,cgst_amount,igst_amount,sgst_amount,net_amount from cash_bill_final where created_at >= '$from_date' and created_at <= '$to_date' order by cash_id asc limit $ms,$s) as subt;";
                                        //   print_r($cos);die();
                                           $execos = mysqli_query($conn, $cos);
                                            $nos = mysqli_fetch_assoc($execos);
                                            ?>
                                          
                                            <?php if($j<=18) {  if($j==5) {
                                                 ?>
                                                  <tr class="table-titless font-bold">
                                                 <td class="text-center" style="border-right: 1px solid black;"></td>
                                                 <td class="text-center" style="border-right: 1px solid black;"></td>
                                                 <td class="text-center" style="border-right: 1px solid black;"></td>
                                                 <td class="text-center" style="border-right: 1px solid black;"></td>
                                                 <td class="text-center" style="border-right: 1px solid black;"></td>
                                                 <td class="text-center" style="border-right: 1px solid black;"></td>
                                                 <td class="text-center" style="border-right: 1px solid black;"></td>
                                                 <td class="text-center" style="border-right: 1px solid black;"></td>
                                                 <td class="text-center" style="border-right: 1px solid black;"></td>
                                           </tr>
<?php                                              } ?>
                                            <tfoot>
                                           <tr class="table-titless font-bold">
                                                 <td class="text-center" style="border: 1px solid black;"></td>
                                                <td class="text-center" style="border: 1px solid black;"></td>
                                                <td class="text-center" style="border: 1px solid black;"></td>
                                                <td class="text-center" style="border: 1px solid black;"><?= number_format($nos['v'],2) ?></td>
                                                <td class="text-center" style="border: 1px solid black;"><?=$nos['sgst'] ?></td>
                                                <td class="text-center" style="border: 1px solid black;"><?=$nos['cgst'] ?></td>
                                                <td class="text-center" style="border: 1px solid black;"><?=$nos['igst'] ?></td>
                                                <td class="text-center" style="border: 1px solid black;"></td>
                                                <td class="text-center" style="border: 1px solid black;"></td>
                                                <td class="text-center" style="border: 1px solid black;"><?=number_format($nos['net_amount'],2) ?></td>
                                            </tr>  <tr class="table-titless font-bold">
                                                <!-- <td class="text-center"></td>
                                    <td class="text-center"></td> -->
                                                <?php
                                                $cos1 = "select SUM(total) as tot,FORMAT(SUM(replace(cgst_amount, ',', '')), 2)  as cgst,FORMAT(SUM(replace(sgst_amount, ',', '')), 2)  as sgst,FORMAT(SUM(replace(igst_amount, ',', '')), 2)  as igst,sum(net_amount) as net_amount from cash_bill_final where created_at >= '$from_date' and created_at <= '$to_date'";
                                                // $cos="select * from  cash_bill_final where created_at >= '2023-04-01' and created_at <= '2023-04-30'";
                                                $execos1 = mysqli_query($conn, $cos1);
                                                $recs = mysqli_fetch_assoc($execos1);
                                                ?>
                                             
                                               <td class="text-endsss" colspan="3" style="border: 1px solid black;"><b>OVER ALL TOTAL</b></td>
                                                <td class="text-center" style="border: 1px solid black;">
                                                    <?php
                                                    
                                                    $amount = number_format($recs['tot'], 2);
                                                    $tot_amount = str_replace(',', '', $amount);
                                                    // echo $tot_amount;
                                                    echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $tot_amount);
                                                    ?>
                                                </td>
                                                <td class="text-center" style="border: 1px solid black;">

                                                    <?php
                                                    $it=$recs['cgst'];
                                                        $igct = $it;
$iscts = floatval(str_replace(',', '.', str_replace('.', '', $igct)));
                                          
                                                    if ($totalCGST != '') {
                                                          if(is_float($iscts)){
                                                            echo $it;
                                                        }
                                                        else {
                                                            $totcgst = number_format($recs['cgst'], 2);
                                                        $totalCGST_amount = str_replace(',', '', $totcgst);
                                                        // echo $totalCGST_amount;
                                                        echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $totalCGST_amount);
                                                    
                                                        }
                                                        } else {
                                                        echo  "---";
                                                    }
                                                     
                                                    ?>
                                                </td>
                                                <td class="text-center" style="border: 1px solid black;">

                                                    <?php
                                                    $it=$recs['sgst'];
                                                        $igct = $it;
$iscts = floatval(str_replace(',', '.', str_replace('.', '', $igct)));
                                              
                                                    if ($totalSGST != '') {
                                                      if(is_float($iscts)){
                                                            echo $it;
                                                        }
                                                        else {
                                                            $totsgst = number_format($recs['sgst'], 2);
                                                        $totalSGST_amount = str_replace(',', '', $totsgst);
                                                        // echo $totalSGST_amount;
                                                        echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $totalSGST_amount);
                                                    }
                                                    }else {
                                                        echo  "---";
                                                        }
                                                    ?>

                                                </td>
                                                <td class="text-center" style="border: 1px solid black;">

                                                    <?php
                                                   $it=$recs['igst'];
                                                        $igct = $it;
$iscts = floatval(str_replace(',', '.', str_replace('.', '', $igct)));
                                                if ($totalIGST != '') {
                                                       if(is_float($iscts)){
                                                            echo $it;
                                                        }
                                                        else {  $totigst = number_format($recs['igst'], 2);
                                                        $totalIGST_amount = str_replace(',', '', $totigst);
                                                        // echo $totalIGST_amount;
                                                        echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $totalIGST_amount);
                                                    } 
                                                    }
                                                    else {
                                                        echo  "---";
                                                       }
                                                    ?>
                                                </td>
                                                <td class="text-end" colspan="1" style="border: 1px solid black;"></td>
                                                <td class="text-end" colspan="1" style="border: 1px solid black;"></td>
                                                <td class="text-center" colspan="2" style="border: 1px solid black;">
                                                    <?php
                                                    $amount = number_format($recs['net_amount'], 2);
                                                    $tot_amount = str_replace(',', '', $amount);
                                                    // echo $tot_amount;
                                                     echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $tot_amount); 
                                                    ?>
                                                </td>
                                            </tr>
</tfoot>

                                            <?php 
                                            
                                            }
                                    }   
                               }
                                   }
                               else {
                                         while ($m < $k) {
                                    $m += 1;
                                    for ($i = 1; $i < $k; $i++) {
                                    //   $d++;
                                        $s = $m * 18;
                                        $s1 = (($m - 1) * 18)+1;
                                         if ($m == 1) {
                                             $ms=$m-1;
                                            $cos = "select * from (select * from cash_bill_final where created_at >= '$from_date' and created_at <= '$to_date' order by cash_id asc limit $ms,$s) as subt ;";
                                            // $cos="select * from cash_bill_final where created_at >= '2023-04-01' and created_at <= '2023-04-30'";
                                            $execos = mysqli_query($conn, $cos);
                                            while ($rec = mysqli_fetch_assoc($execos)) {
                                                $totalAmount = $totalAmount + $rec['total'];
                                                $totalNetAmount = $totalNetAmount + $rec['net_amount'];

                                                if (!empty($rec['cgst_amount'])) {
                                                    $totalCGST = $totalCGST + $rec['cgst_amount'];
                                                }


                                                if (!empty($rec['sgst_amount'])) {
                                                    $totalSGST = $totalSGST + $rec['sgst_amount'];
                                                }


                                                if (!empty($rec['igst_amount'])) {
                                                    $totalIGST = $totalIGST + $rec['igst_amount'];
                                                }

                                ?>
                                                <tr class="table-titless  invoice_line">
                                                    <td class="text-center"><?= $i++ ?></td>
                                                    <td class="text-center"><?= date('d-m-Y', strtotime($rec['created_at'])) ?></td>
                                                    <td class="text-center text-capitalize" style="white-space:nowrap;"><?= ($rec['customer_name']) ? $rec['customer_name'] : "---" ?></td>
                                                    <td class="text-center ">
                                                        <?php
                                                        $total = number_format($rec['total'], 2);
                                                        $tot_amount = str_replace(',', '', $total);

                                                        echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $tot_amount);
                                                        // echo $tot_amount;
                                                        ?>
                                                    </td>
                                                    <td class="text-center ">
                                                        <?php
                                                     $it=$rec['cgst_amount'];
                                                        $igct = $it;
$iscts = floatval(str_replace(',', '.', str_replace('.', '', $igct)));
                                               
                                                            if ($rec['cgst_amount'] != '') {
                                                            if(is_float($iscts)){
                                                            echo $it;
                                                        }
                                                        else {
                                                            $cgst = number_format($rec['cgst_amount'], 2);
                                                            $cgst_amount = str_replace(',', '', $cgst);
                                                            echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $cgst_amount);
                                                            // echo $cgst_amount;
                                                        }
                                                                
                                                            } else {
                                                            echo  "---";
                                                        }
                                                        ?>
                                                    </td>
                                                    <td class="text-center ">

                                                        <?php
                                                        $it=$rec['sgst_amount'];
                                                        $igct = $it;
$iscts = floatval(str_replace(',', '.', str_replace('.', '', $igct)));
                                               
                                                            if ($rec['sgst_amount'] != '') {
                                                            if(is_float($iscts)){
                                                            echo $it;
                                                        }
                                                        else { $sgst = number_format($rec['sgst_amount'], 2);
                                                            $sgst_amount = str_replace(',', '', $sgst);
                                                            echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $sgst_amount);
                                                            // echo $sgst_amount;
                                                     }
                                                     } else {
                                                            echo  "---";
                                                        }

                                                        ?>
                                                    </td>
                                                    <td class="text-center ">

                                                        <?php
                                                       $it=$rec['igst_amount'];
                                                        $igct = $it;
$iscts = floatval(str_replace(',', '.', str_replace('.', '', $igct)));
                                                if ($rec['igst_amount'] != '') {
                                                            if(is_float($iscts)){
                                                            echo $it;
                                                        }
                                                        else {  $igst_amount = str_replace(',', '', $rec['igst_amount']);
                                                            echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $igst_amount);
                                                            // echo $igst_amount;
                                                        }
                                                        }
                                                        else {
                                                            echo  "---";
                                                        }
                                                        ?>
                                                    </td>
                                                    <td class="text-center text-capitalize "><?= ($rec['gst_no']) ? $rec['gst_no'] : "---" ?></td>
                                                    <td class="text-center text-capitalize"><?php echo $rec['bill_id']; ?></td>
                                                    <td class="text-center " style="font-weight: bold;">
                                                        <?php
                                                        $amount = number_format($rec['net_amount'], 2);
                                                        $net_amount = str_replace(',', '', $amount);

                                                        echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $net_amount);
                                                        // echo $net_amount;
                                                        ?>
                                                    </td>
                                                </tr>
                                            <?php
                                            }
                                            $ms=$m-1;
                                            $cos = "select SUM(total) as tot, FORMAT(SUM(replace(cgst_amount, ',', '')), 2) as cgst, FORMAT(SUM(replace(sgst_amount, ',', '')), 2) as sgst, FORMAT(SUM(replace(igst_amount, ',', '')), 2) as igst, SUM(net_amount) as net_amount  from (select total,cgst_amount,igst_amount,sgst_amount,net_amount from cash_bill_final where created_at >= '$from_date' and created_at <= '$to_date' order by cash_id asc limit $ms,$s) as subt;";
                                        //   print_r($cos);die();
                                           $execos = mysqli_query($conn, $cos);
                                            $nos = mysqli_fetch_assoc($execos);
                                            ?>
                                           <tr class="table-titless font-bold">
                                                 <td class="text-center" style="border: 1px solid black;"></td>
                                                <td class="text-center" style="border: 1px solid black;"></td>
                                                <td class="text-center" style="border: 1px solid black;"></td>
                                                <td class="text-center" style="border: 1px solid black;"><?= number_format($nos['tot'],2) ?></td>
                                                <td class="text-center" style="border: 1px solid black;"><?=$nos['sgst'] ?></td>
                                                <td class="text-center" style="border: 1px solid black;"><?=$nos['cgst'] ?></td>
                                                <td class="text-center" style="border: 1px solid black;"><?=$nos['igst'] ?></td>
                                                <td class="text-center" style="border: 1px solid black;"></td>
                                                <td class="text-center" style="border: 1px solid black;"></td>
                                                <td class="text-center" style="border: 1px solid black;"><?=number_format($nos['net_amount'],2) ?></td>
                                            </tr>
                                            <?php if($j<=18) { ?>
                                            <tr class="table-titless font-bold">
                                                <!-- <td class="text-center"></td>
                                    <td class="text-center"></td> -->
                                                <?php
                                                $cos1 = "select SUM(total) as tot, FORMAT(SUM(replace(cgst_amount, ',', '')), 2) as cgst, FORMAT(SUM(replace(sgst_amount, ',', '')), 2) as sgst, FORMAT(SUM(replace(igst_amount, ',', '')), 2) as igst, FORMAT(SUM(replace(net_amount, ',', '')), 2) as net_amount from cash_bill_final where created_at >= '$from_date' and created_at <= '$to_date'";
                                                // $cos="select * from  cash_bill_final where created_at >= '2023-04-01' and created_at <= '2023-04-30'";
                                                $execos1 = mysqli_query($conn, $cos1);
                                                $recs = mysqli_fetch_assoc($execos1);
                                                ?>
                                             
                                               <td class="text-endsss" colspan="3" style="border: 1px solid black;"><b>OVER ALL TOTAL</b></td>
                                                <td class="text-center" style="border: 1px solid black;">
                                                    <?php
                                                    $amount = number_format($recs['tot'], 2);
                                                    $tot_amount = str_replace(',', '', $amount);
                                                    // echo $tot_amount;
                                                    echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $tot_amount);
                                                    ?>
                                                </td>
                                                <td class="text-center" style="border: 1px solid black;">

                                                    <?php
                                                $it=$rec['cgst'];
                                                        $igct = $it;
$iscts = floatval(str_replace(',', '.', str_replace('.', '', $igct)));
                                              
                                                            if ($totalCGST != '') {
                                                         if(is_float($iscts)){
                                                            echo $it;
                                                        }
                                                        else {
                                                            $totcgst = number_format($recs['cgst'], 2);
                                                        $totalCGST_amount = str_replace(',', '', $totcgst);
                                                        // echo $totalCGST_amount;
                                                        echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $totalCGST_amount);
                                                    }
                                                       } else {
                                                        echo  "---";
                                                    }
                                                     ?>
                                                </td>
                                                <td class="text-center" style="border: 1px solid black;">

                                                    <?php
                                                    $it=$rec['sgst'];
                                                        $igct = $it;
$iscts = floatval(str_replace(',', '.', str_replace('.', '', $igct)));
                                                
                                                            if ($totalSGST != '') {
                                                        if(is_float($iscts)){
                                                            echo $it;
                                                        }
                                                        else {
                                                            $totsgst = number_format($recs['sgst'], 2);
                                                        $totalSGST_amount = str_replace(',', '', $totsgst);
                                                        // echo $totalSGST_amount;
                                                        echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $totalSGST_amount);
                                                       }
                                                  } else {
                                                        echo  "---";
                                                       }
                                                    ?>

                                                </td>
                                                <td class="text-center" style="border: 1px solid black;">

                                                    <?php
                                                   $it=$rec['igst'];
                                                        $igct = $it;
$iscts = floatval(str_replace(',', '.', str_replace('.', '', $igct)));
                                              
                                                            if ($totalIGST != '') {
                                                        if(is_float($iscts)){
                                                            echo $it;
                                                        }
                                                        else {
                                                            $totigst = number_format($recs['igst'], 2);
                                                        $totalIGST_amount = str_replace(',', '', $totigst);
                                                        // echo $totalIGST_amount;
                                                        echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $totalIGST_amount);
                                                       }
                                                 } else {
                                                        echo  "---";
                                                        }
                                                    ?>
                                                </td>
                                                <td class="text-end" colspan="1" style="border: 1px solid black;"></td>
                                                <td class="text-end" colspan="1" style="border: 1px solid black;"></td>
                                                <td class="text-center" colspan="2" style="border: 1px solid black;">
                                                    <?php
                                                    $amount = number_format($recs['net_amount'], 2);
                                                    $tot_amount = str_replace(',', '', $amount);
                                                    // echo $tot_amount;
                                                     echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $tot_amount); 
                                                    ?>
                                                </td>
                                            </tr>


                                            <?php 
                                            }
                                            
                                            }
                                            else {
                                                $d1=($m-1)*18;
$d=$d1+1;
                                            $cos = "select * from (select * from cash_bill_final where created_at >= '$from_date' and created_at <= '$to_date' order by cash_id asc limit $s1,$s) as subt;";
                                            // $cos="select * from cash_bill_final where created_at >= '2023-04-01' and created_at <= '2023-04-30'";
                                            $execos = mysqli_query($conn, $cos);
                                            while ($rec = mysqli_fetch_assoc($execos)) {
                                                $totalAmount = $totalAmount + $rec['total'];
                                                $totalNetAmount = $totalNetAmount + $rec['net_amount'];

                                                if (!empty($rec['cgst_amount'])) {
                                                    $totalCGST = $totalCGST + $rec['cgst_amount'];
                                                }


                                                if (!empty($rec['sgst_amount'])) {
                                                    $totalSGST = $totalSGST + $rec['sgst_amount'];
                                                }


                                                if (!empty($rec['igst_amount'])) {
                                                    $totalIGST = $totalIGST + $rec['igst_amount'];
                                                }

                                            ?>
                                                <tr class="table-titless  invoice_line">
                                                    <td class="text-center"><?= $d++ ?></td>
                                                    <td class="text-center"><?= date('d-m-Y', strtotime($rec['created_at'])) ?></td>
                                                    <td class="text-center text-capitalize" style="white-space:nowrap;"><?= ($rec['customer_name']) ? $rec['customer_name'] : "---" ?></td>
                                                    <td class="text-center ">
                                                        <?php
                                                        $total = number_format($rec['total'], 2);
                                                        $tot_amount = str_replace(',', '', $total);

                                                        echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $tot_amount);
                                                        // echo $tot_amount;
                                                        ?>
                                                    </td>
                                                    <td class="text-center ">
                                                        <?php
                                                      $it=$rec['cgst_amount'];
                                                        $igct = $it;
$iscts = floatval(str_replace(',', '.', str_replace('.', '', $igct)));
                                              
                                                            if ($rec['cgst_amount'] != '') {
                                                          if(is_float($iscts)){
                                                            echo $it;
                                                        }
                                                        else {
                                                            $cgst = number_format($rec['cgst_amount'], 2);
                                                            $cgst_amount = str_replace(',', '', $cgst);
                                                            echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $cgst_amount);
                                                            // echo $cgst_amount;
                                                      }
    } else {
                                                            echo  "---";
                                                      
}                                                        ?>
                                                    </td>
                                                    <td class="text-center ">

                                                        <?php
                                                         $it=$rec['sgst_amount'];
                                                        $igct = $it;
$iscts = floatval(str_replace(',', '.', str_replace('.', '', $igct)));
                                                
                                                            if ($rec['sgst_amount'] != '') {
                                                         if(is_float($iscts)){
                                                            echo $it;
                                                        }
                                                        else {   $sgst = number_format($rec['sgst_amount'], 2);
                                                            $sgst_amount = str_replace(',', '', $sgst);
                                                            echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $sgst_amount);
                                                            // echo $sgst_amount;
                                                        }
                                                        } else {
                                                            echo  "---";
                                                      
}
                                                        ?>
                                                    </td>
                                                    <td class="text-center ">

                                                        <?php
                                                        $it=$rec['igst_amount'];
                                                        $igct = $it;
$iscts = floatval(str_replace(',', '.', str_replace('.', '', $igct)));
                                                
                                                            if ($rec['igst_amount'] != '') {
                                                        if(is_float($iscts)){
                                                            echo $it;
                                                        }
                                                        else {    $igst_amount = str_replace(',', '', $rec['igst_amount']);
                                                            echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $igst_amount);
                                                            // echo $igst_amount;
                                                        }  } else {
                                                            echo  "---";
                                                      
}
                                                        ?>
                                                    </td>
                                                    <td class="text-center text-capitalize "><?= ($rec['gst_no']) ? $rec['gst_no'] : "---" ?></td>
                                                    <td class="text-center text-capitalize"><?php echo $rec['bill_id']; ?></td>
                                                    <td class="text-center " style="font-weight: bold;">
                                                        <?php
                                                        $amount = number_format($rec['net_amount'], 2);
                                                        $net_amount = str_replace(',', '', $amount);

                                                        echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $net_amount);
                                                        // echo $net_amount;
                                                        ?>
                                                    </td>
                                                </tr>
                                            <?php
                                            }
                                             $cos = "select sum(total) as v,FORMAT(SUM(replace(sgst_amount, ',', '')), 2) as sgst,FORMAT(SUM(replace(cgst_amount, ',', '')), 2) as cgst,sumFORMAT(SUM(replace(igst_amount, ',', '')), 2) as igst,sum(net_amount) as net_amount from (select total,cgst_amount,igst_amount,sgst_amount,net_amount from cash_bill_final where created_at >= '$from_date' and created_at <= '$to_date' order by cash_id asc limit $s1,$s) as subt;";
                                            $execos = mysqli_query($conn, $cos);
                                            $nos = mysqli_fetch_assoc($execos);
                                            ?>
                                            <tr class="table-titless font-bold">
                                                <td class="text-center" style="border: 1px solid black;"></td>
                                                <td class="text-center" style="border: 1px solid black;"></td>
                                                <td class="text-center" style="border: 1px solid black;"></td>
                                                <td class="text-center" style="border: 1px solid black;"><?= number_format($nos['v'],2) ?></td>
                                                <td class="text-center" style="border: 1px solid black;"><?=$nos['sgst'] ?></td>
                                                <td class="text-center" style="border: 1px solid black;"><?=$nos['cgst'] ?></td>
                                                <td class="text-center" style="border: 1px solid black;"><?=$nos['igst'] ?></td>
                                                <td class="text-center" style="border: 1px solid black;"></td>
                                                <td class="text-center" style="border: 1px solid black;"></td>
                                                <td class="text-center" style="border: 1px solid black;"><?=number_format($nos['net_amount'],2) ?></td>
                                            </tr>
                                            <tr class="table-titless font-bold">
                                                <!-- <td class="text-center"></td>
                                    <td class="text-center"></td> -->
                                                <?php
                                                $cos1 = "select sum(total) as tot,FORMAT(SUM(replace(cgst_amount, ',', '')), 2) as cgst,FORMAT(SUM(replace(sgst_amount, ',', '')), 2) as sgst,FORMAT(SUM(replace(igst_amount, ',', '')), 2) as igst,sum(net_amount) as net_amount from cash_bill_final where created_at >= '$from_date' and created_at <= '$to_date'";
                                                // $cos="select * from  cash_bill_final where created_at >= '2023-04-01' and created_at <= '2023-04-30'";
                                                $execos1 = mysqli_query($conn, $cos1);
                                                $recs = mysqli_fetch_assoc($execos1);
                                                ?>
                                                <td class="text-endsss" colspan="3" style="border: 1px solid black;"><b>OVER ALL TOTAL</b></td>
                                                <td class="text-center" style="border: 1px solid black;">
                                                    <?php
                                                    $amount = number_format($recs['tot'], 2);
                                                    $tot_amount = str_replace(',', '', $amount);
                                                    // echo $tot_amount;
                                                    echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $tot_amount);
                                                    ?>
                                                </td>
                                                <td class="text-center" style="border: 1px solid black;">

                                                    <?php
                                                 $it=$rec['cgst'];
                                                        $igct = $it;
$iscts = floatval(str_replace(',', '.', str_replace('.', '', $igct)));
                                             
                                                            if ($totalCGST != '') {
                                                        if(is_float($iscts)){
                                                            echo $it;
                                                        }
                                                        else {   $totcgst = number_format($recs['cgst'], 2);
                                                        $totalCGST_amount = str_replace(',', '', $totcgst);
                                                        // echo $totalCGST_amount;
                                                        echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $totalCGST_amount);
                                                  }    } else {
                                                        echo  "---";
                                                  
                                                        }
                                                    ?>
                                                </td>
                                                <td class="text-center" style="border: 1px solid black;">

                                                    <?php
                                                     $it=$rec['sgst'];
                                                        $igct = $it;
$iscts = floatval(str_replace(',', '.', str_replace('.', '', $igct)));
                                               
                                                    if ($totalSGST != '') {
                                                  if(is_float($iscts)){
                                                            echo $it;
                                                        }
                                                        else {       $totsgst = number_format($recs['sgst'], 2);
                                                        $totalSGST_amount = str_replace(',', '', $totsgst);
                                                        // echo $totalSGST_amount;
                                                        echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $totalSGST_amount);
                                                 }    } else {
                                                        echo  "---";
                                                   
                                                        }
                                                    ?>

                                                </td>
                                                <td class="text-center" style="border: 1px solid black;">

                                                    <?php
                                                       $it=$rec['igst'];
                                                        $igct = $it;
$iscts = floatval(str_replace(',', '.', str_replace('.', '', $igct)));
                                               
                                                            if ($totalIGST != '') {
                                                        if(is_float($iscts)){
                                                            echo $it;
                                                        }
                                                        else { $totigst = number_format($recs['igst'], 2);
                                                        $totalIGST_amount = str_replace(',', '', $totigst);
                                                        // echo $totalIGST_amount;
                                                        echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $totalIGST_amount);
                                                    } } else {
                                                        echo  "---";
                                                   
                                                        }
                                                    ?>
                                                </td>
                                                <td class="text-end" colspan="1" style="border: 1px solid black;"></td>
                                                <td class="text-end" colspan="1" style="border: 1px solid black;"></td>
                                                <td class="text-center" colspan="2" style="border: 1px solid black;">
                                                    <?php
                                                    $amount = number_format($recs['net_amount'], 2);
                                                    $tot_amount = str_replace(',', '', $amount);
                                                    // echo $tot_amount;
                                                     echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $tot_amount); 
                                                    ?>
                                                </td>
                                            </tr>


                                <?php }
                                    }
                                }
                                }?>
                            </tbody>

                        </table>  </div>
                </div>
            </div>

            <!--Start Rightbar-->
                <?php // include('./include/rightbar.php') ?>
            <!--end Rightbar-->
            
           <!--Start Footer-->
           <!-- Footer Start -->
           
           <!-- end Footer -->                
           <!--end footer-->
        </div>
        <!-- end page content -->
    </div>
    <!-- end page-wrapper -->

    <!-- Javascript  -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        window.print();
    </script>
    <script src="assets/plugins/datatables/simple-datatables.js"></script>
    <script src="assets/pages/datatable.init.js"></script>
    <!-- App js -->
    <script src="assets/js/app.js"></script>
     
</body>

</html>