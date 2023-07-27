<?php 
    include('./include/config.php');
    // include('header.php');

    if(!empty($_REQUEST['msg'])){
        $msg = $_REQUEST['msg'];
    }else{
        $msg = '';
    }
    if(!empty($_REQUEST['month'])){
        $month = $_REQUEST['month'];
    }else{
        $month = '';
    }

    $year = date('Y');

    if(isset($_POST['filter'])){
        $month = $_POST['month'];
        header("Location: purchase.php?month=$month");
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Purchase | Sunil Traders</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <link href="assets/plugins/datatables/datatable.css" rel="stylesheet" type="text/css" />
     <!-- App css -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" />
    
<style>
tfoot {
        display: table-footer-group;  
    }
    
    @media print{
    tfoot {
        display: table-footer-group;  
        }
        .container-fluid{
            zoom:92%;
        }
    }
    .table-titless td {
        padding: 4px;
        border: 1px;
        border-style: none solid none solid;
    }

.page-wrapper .page-content-tab {

    padding: 0 8px 30px 8px !important;
}

#invoice-table {
               border: 3.5px solid black;
            border-spacing: 0;
            clear: both;
            margin: 0.0mm 0mm;
             min-height: 192mm;
            width: 100%;
        }
        #invoice-table th, td { font-weight: bold; }
        #invoice-table th:first-child, td:first-child { border-left: none; }
        #invoice-table th {font-size:13pt;  }
        #invoice-table td { vertical-align: top; font-size: 10pt;position: relative;
    min-height: 0px;}
        th { text-align: center; font-weight: normal; }
        .amount { text-align: right; }
        .invoice_line { height: 6mm; }
        .invoice_line td, .invoice_line th { padding: 1mm; }
        

@media print{
 #invoice-table{
               border: 3.5px solid black;
            border-spacing: 0;
            clear: both;
            margin: 0.0mm 0mm;
             min-height: 192mm;
            width: 100%;
        }
        #invoice-table th, td { font-weight: bold; }
        #invoice-table th:first-child, td:first-child { border-left: none; }
        #invoice-table th {font-size:14pt; }
        #invoice-table td { vertical-align: top; font-size: 10pt;position: relative;
    min-height: 0px;}
        th { text-align: center; font-weight: normal; }
        .amount { text-align: right; }
        .invoice_line { height: 6mm; }
        .invoice_line td, .invoice_line th { padding: 1mm; }
}

.gst-no{
    width: 140px;
}
.net-amount {
    width: 115px;
}
.party-name {
      width: 240px;
}
@media print {
  html, body {
    width: 100%;
    height: 297mm;
    min-height: 297mm;
  }
/*.page1 { page-break-after: always !important; }*/
}



</style>  
    
    
</head>

<!-- <body id="body" onload="window.print()" class="dark-sidebar"> -->
<body id="body" class="dark-sidebar">
    <!-- Top Bar Start -->
    <?php  include('header.php') ?>
    <!-- Top Bar End -->

    <div class="page-wrapper">

        <!-- Page Content-->
        <div class="page-content-tab">

            <div class="container-fluid" style="margin-top: -2px;">
                <!-- Page-Title -->
                
                
                <!-- end page title end breadcrumb -->
                <div class="row mt-2 " >
                  <div class="col-lg-12" style="font-family: 'PT Serif', serif !important;">
                        <table class="table tablesss" id="invoice-table" style="font-family: 'PT Serif', serif !important;">
                          <thead>
                                <tr>
                                    <th class="text-center pt-1 pb-1" colspan="10"><h4  style="line-height: 10px;"><b><u>PURCHASE REPORT </u></b></h4></td>
                                </tr>
                    
                
                   <?php 
                        $monthSplit1 = $monthSplit2 = 0;
                        $monthSplit = explode("-",$month);
                        $monthSplit1 = $monthSplit[0];
                        $monthSplit2 = $monthSplit[1];
                        $m = '';
                        switch ($monthSplit2) {
                            case '01':
                                $m = "January";
                                break;
                            case '02':
                                $m = "February";
                                break;
                            case '03':
                                $m = "March";
                                break;
                            case '04':
                                $m = "April";
                                break;
                            case '05':
                                $m = "May";
                                break;
                            case '06':
                                $m = "June";
                                break;
                            case '07':
                                $m = "July";
                                break;
                            case '08':
                                $m = "August";
                                break;
                            case '09':
                                $m = "September";
                                break;
                            case '10':
                                $m = "October";
                                break;
                            case '11':
                                $m = "November";
                                break;
                            case '12':
                                $m = "December";
                                break;
                        }
                    ?>
                <tr>
                        <th class="text-start pt-1 pb-1" colspan="3">
                            <h5 class="ttl-color"><b>SUNIL TRADERS</b></h5>
                        </th>
                        <th class="text-center pt-1 pb-1" colspan="4">
                            <h4>MONTH OF <?= strtoupper($m) ?>(<?= $monthSplit1 ?>)</h4>
                        </th>
                        <th class="text-end pt-1 pb-1" colspan="3">
                            <h5 class="ttl-color mx-2"><b>33AAAFS1530K1ZJ</b></h5>
                        </th>
                        </tr>
                  
                            <tr class="table-title">
                                <th class="text-center" style="width: 20px;">S.No</th>
                                <th class="text-center" style="width: 100px;">DATE</th>
                                <th class="text-center party-name">PARTY NAME</th>
                                <th class="text-center">AMOUNT</th>
                                <th class="text-center" style="width: 90px;">CGST</th>
                                <th class="text-center" style="width: 90px;">SGST</th>
                                <th class="text-center" style="width: 90px;">IGST</th>
                                <th class="text-center gst-no">GST NO</th>
                                <th class="text-center invoice">INVOICE No</th>
                                <th class="text-center net-amount" style="width: 100px;">NET AMOUNT</th>
                            </tr>
                             </thead>
                                  <tbody>
                                <?php

                                 if($month){
                                        // $sql2 = "SELECT * FROM purchase WHERE `invoiceDate` LIKE '%$month%' ORDER BY invoiceDate ASC";
                                       $sql2 = "select count(*) as n from purchase where `invoiceDate` LIKE '%$month%'";
                                 }else{
                                        // $sql2 = "SELECT * FROM purchase ORDER BY invoiceDate ASC";
                                       $sql2 = "select count(*) as n from purchase where `invoiceDate` LIKE '%$month%'";
                                 }
                                    
                                    
                                $execo = mysqli_query($conn, $sql2);
                                $no = mysqli_fetch_assoc($execo);
                                // print_r($no['n']);die();
                                $j = $no['n'];
                                // print_r($j);die();
                                $s = 0;
                                $d=0;
                                $n = $j / 25
                                
                                ;
                                $k = floor($n + 1);
                                $m = 0;

                                $i = 1;
                                $totalAmount = 0;
                                $totalCGST = 0;
                                $totalSGST = 0;
                                $totalIGST = 0;
                                $totalNetAmount = 0;
                            //   print_r($m." ".$k);die();
                                   if($m==0 && $k==1){
                                    // print_r($m." ".$k);die();
                                    while ($m < $k || $m == 0) {
                                    $m += 1;
                                    // print_r($m." ".$k);die();
                                    //   print_r($m." ".$k);die();
                                 for ($i = 1; $i <= $k; $i++) {
                                    //   $d++;
                                        $s = $m * 25;
                                        $s1 = (($m - 1) * 25)+1;
                                            $cos = "select * from (select * from purchase where `invoiceDate` LIKE '%$month%' order by invoiceDate asc limit 0,$s) as subt ;";
                                            // $cos="select * from comboset_invoice_final where created_at >= '2023-04-01' and created_at <= '2023-04-30'";
                                    //   print_r($cos);die();
                                            $execos = mysqli_query($conn, $cos);
                                         
                                            while ($rec = mysqli_fetch_assoc($execos)) {
                                                $totalAmount = $totalAmount + $rec['amount'];
                                                $totalNetAmount = $totalNetAmount + $rec['netAmount'];

                                                if (!empty($rec['CGST'])) {
                                                    $totalCGST = $totalCGST + $rec['CGST'];
                                                }


                                                if (!empty($rec['SGST'])) {
                                                    $totalSGST = $totalSGST + $rec['SGST'];
                                                }


                                                if (!empty($rec['IGST'])) {
                                                    $totalIGST = $totalIGST + $rec['IGST'];
                                                }

                                ?>
                                                <tr class="table-titless  invoice_line">
                                                    <td class="text-center"><?= $i++ ?></td>
                                                    <td class="text-center"><?= date('d-m-Y', strtotime($rec['invoiceDate'])) ?></td>
                                                    <td class="text-center text-capitalize" style="white-space:nowrap;"><?= ($rec['supplierName']) ? $rec['supplierName'] : "---" ?></td>
                                                    <td class="text-center ">
                                                        <?php
                                                        $total = number_format($rec['amount'], 2);
                                                        $tot_amount = str_replace(',', '', $total);

                                                        echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $tot_amount);
                                                        // echo $tot_amount;
                                                        ?>
                                                    </td>
                                                    <td class="text-center ">
                                                        <?php
                                                        if ($rec['CGST'] != '') {
                                                            $cgst = number_format($rec['CGST'], 2);
                                                            $cgst_amount = str_replace(',', '', $cgst);
                                                            echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $cgst_amount);
                                                            // echo $cgst_amount;
                                                        } else {
                                                            echo  "---";
                                                        }

                                                        ?>
                                                    </td>
                                                    <td class="text-center ">

                                                        <?php
                                                        if ($rec['SGST'] != '') {
                                                            $sgst = number_format($rec['SGST'], 2);
                                                            $sgst_amount = str_replace(',', '', $sgst);
                                                            echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $sgst_amount);
                                                            // echo $sgst_amount;
                                                        } else {
                                                            echo  "---";
                                                        }

                                                        ?>
                                                    </td>
                                                    <td class="text-center ">

                                                        <?php
                                                        if ($rec['IGST'] != '') {
                                                              $igst = number_format($rec['IGST'], 2);
                                                           $igst_amount = str_replace(',', '', $igst);
                                                            echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $igst_amount);
                                                            // echo $igst_amount;
                                                        } else {
                                                            echo  "---";
                                                        }

                                                        ?>
                                                    </td>
                                                    <td class="text-center text-capitalize "><?= ($rec['GSTNO']) ? $rec['GSTNO'] : "---" ?></td>
                                                    <td class="text-center text-capitalize"><?php echo $rec['invoiceNumber']; ?></td>
                                                    <td class="text-center " style="font-weight: bold;">
                                                        <?php
                                                        $amount = number_format($rec['netAmount'], 2);
                                                        $net_amount = str_replace(',', '', $amount);
        $amount = number_format($rec['netAmount'], 2);
                                                        $net_amount = str_replace(',', '', $amount);

                                                        echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $net_amount);
                                                        // echo $net_amount;
                                                        ?>
                                                    </td>
                                                </tr>
                                            <?php
                                            }
                                          $c=($m-1);
                                           $cos = "select sum(amount) as v,sum(SGST) as sgst,sum(CGST) as cgst,sum(IGST) as igst,sum(netAmount) as net_amount from (select * from purchase where `invoiceDate` LIKE '%$month%' order by invoiceDate asc limit $m,$s) as subt;";
                                //   print_r($cos);die();
                                           $execos = mysqli_query($conn, $cos);
                                            $nos = mysqli_fetch_assoc($execos);
                                            ?>
                                           <tr class="table-titless font-bold">
                                                 <td class="text-center" style="border: 1px solid black;"></td>
                                                <td class="text-center" style="border: 1px solid black;"></td>
                                                <td class="text-center" style="border: 1px solid black;"></td>
                                                <?php 
                                                      $v = number_format($nos['v'],2);
                                                        $vs = str_replace(',', '', $v);
                                                        
                                                          $sg = number_format($nos['sgst'],2);
                                                        $sgs = str_replace(',', '', $sg);
  
     $cg = number_format($nos['cgst'],2);
                                                        $cgs = str_replace(',', '', $cg);
  
   $ig = number_format($nos['igst'],2);
                                                        $igs = str_replace(',', '', $ig);
                                                        
                                                        
                                                 $na = number_format($nos['net_amount'],2);
                                                        $nas = str_replace(',', '', $na);         
                                                ?>
                                                <td class="text-center" style="border: 1px solid black;"><?= preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $vs) ?></td>
                                                <td class="text-center" style="border: 1px solid black;"><?=preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $sgs)?></td>
                                                <td class="text-center" style="border: 1px solid black;"><?=preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $cgs)?></td>
                                                <td class="text-center" style="border: 1px solid black;"><?=preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $igs)?></td>
                                                <td class="text-center" style="border: 1px solid black;"></td>
                                                <td class="text-center" style="border: 1px solid black;"></td>
                                                <td class="text-center" style="border: 1px solid black;"><?=preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $nas) ?></td>
                                            </tr>
                                            <?php if($j<25) { ?>
                                            <tr class="table-titless font-bold">
                                                <!-- <td class="text-center"></td>
                                    <td class="text-center"></td> -->
                                                <?php
                                                $cos1 = "select sum(amount) as tot,sum(CGST) as cgst,sum(SGST) as sgst,sum(IGST) as igst,sum(netAmount) as net_amount from purchase where `invoiceDate` LIKE '%$month%'";
                                   // $cos="select * from  comboset_invoice_final where created_at >= '2023-04-01' and created_at <= '2023-04-30'";
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
                                                    if ($totalCGST != '') {
                                                        $totcgst = number_format($recs['cgst'], 2);
                                                        $totalCGST_amount = str_replace(',', '', $totcgst);
                                                        // echo $totalCGST_amount;
                                                        echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $totalCGST_amount);
                                                    } else {
                                                        echo  "---";
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-center" style="border: 1px solid black;">

                                                    <?php
                                                    if ($totalSGST != '') {
                                                        $totsgst = number_format($recs['sgst'], 2);
                                                        $totalSGST_amount = str_replace(',', '', $totsgst);
                                                        // echo $totalSGST_amount;
                                                        echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $totalSGST_amount);
                                                    } else {
                                                        echo  "---";
                                                    }
                                                    ?>

                                                </td>
                                                <td class="text-center" style="border: 1px solid black;">

                                                    <?php
                                                    if ($totalIGST != '') {
                                                        $totigst = number_format($recs['igst'], 2);
                                                        // $totalIGST_amount = str_replace(',', '', $totigst);
                                                        // echo $totalIGST_amount;
                                                        echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $totigst);
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
                               }
                                   }
                               else {
                                        //  print_r($m." ".$k);die();
                                         while ($m < $k) {
                                    $m += 1;
                                    for ($i = 1; $i < $k; $i++) {
                                    //   $d++;
                                        $s = $m * 25;
                                        $s1 = (($m - 1) * 25); //+1
                                         if ($m == 1) {
                                             $c=($m-1);
                                            $cos = "select * from (select * from purchase where `invoiceDate` LIKE '%$month%' order by invoiceDate asc limit $c,$s) as subt ;";
                                                    // print_r($cos);die();
                                        // $cos="select * from comboset_invoice_final where created_at >= '2023-04-01' and created_at <= '2023-04-30'";
                                            $execos = mysqli_query($conn, $cos);
                                            while ($rec = mysqli_fetch_assoc($execos)) {
                                                $totalAmount = $totalAmount + $rec['amount'];
                                                $totalNetAmount = $totalNetAmount + $rec['netAmount'];

                                                if (!empty($rec['CGST'])) {
                                                    $totalCGST = $totalCGST + $rec['CGST'];
                                                }


                                                if (!empty($rec['SGST'])) {
                                                    $totalSGST = $totalSGST + $rec['SGST'];
                                                }


                                                if (!empty($rec['IGST'])) {
                                                    $totalIGST = $totalIGST + $rec['IGST'];
                                                }

                                ?>
                                                <tr class="table-titless  invoice_line">
                                                    <td class="text-center"><?= $i++ ?></td>
                                                    <td class="text-center"><?= date('d-m-Y', strtotime($rec['invoiceDate'])) ?></td>
                                                    <td class="text-center text-capitalize" style="white-space:nowrap;"><?= ($rec['supplierName']) ? $rec['supplierName'] : "---" ?></td>
                                                    <td class="text-center ">
                                                        <?php
                                                        $total = number_format($rec['amount'], 2);
                                                        $tot_amount = str_replace(',', '', $total);

                                                        echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $tot_amount);
                                                        // echo $tot_amount;
                                                        ?>
                                                    </td>
                                                    <td class="text-center ">
                                                        <?php
                                                        if ($rec['CGST'] != '') {
                                                            $cgst = number_format($rec['CGST'], 2);
                                                            $cgst_amount = str_replace(',', '', $cgst);
                                                            echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $cgst_amount);
                                                            // echo $cgst_amount;
                                                        } else {
                                                            echo  "---";
                                                        }

                                                        ?>
                                                    </td>
                                                    <td class="text-center ">

                                                        <?php
                                                        if ($rec['SGST'] != '') {
                                                            $sgst = number_format($rec['SGST'], 2);
                                                            $sgst_amount = str_replace(',', '', $sgst);
                                                            echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $sgst_amount);
                                                            // echo $sgst_amount;
                                                        } else {
                                                            echo  "---";
                                                        }

                                                        ?>
                                                    </td>
                                                    <td class="text-center ">

                                                        <?php
                                                        if ($rec['IGST'] != '') {
                                                             $igst = number_format($rec['IGST'], 2);
                                                            $igst_amount = str_replace(',', '', $igst);
                                                            echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $igst_amount);
                                                            // echo $igst_amount;
                                                        } else {
                                                            echo  "---";
                                                        }

                                                        ?>
                                                    </td>
                                                    <td class="text-center text-capitalize "><?= ($rec['GSTNO']) ? $rec['GSTNO'] : "---" ?></td>
                                                    <td class="text-center text-capitalize"><?php echo $rec['invoiceNumber']; ?></td>
                                                    <td class="text-center " style="font-weight: bold;">
                                                        <?php
                                                        $amount = number_format($rec['netAmount'], 2);
                                                        $net_amount = str_replace(',', '', $amount);

                                                        echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $net_amount);
                                                        // echo $net_amount;
                                                        ?>
                                                    </td>
                                                </tr>
                                            <?php
                                            }
                                                $c=($m-1);
                                         
                                            $cos = "select sum(amount) as v,sum(SGST) as sgst,sum(CGST) as cgst,sum(IGST) as igst,sum(netAmount) as net_amount from (select * from purchase where `invoiceDate` LIKE '%$month%' order by invoiceDate asc limit $c,$s) as subt;";
                                            // $cos = "select sum(total) as v,sum(sgst_amount) as sgst,sum(cgst_amount) as cgst,sum(igst_amount) as igst,sum(net_amount) as net_amount from (select total,cgst_amount,igst_amount,sgst_amount,net_amount from comboset_invoice_final where created_at >= '$from_date' and created_at <= '$to_date' order by id desc limit $m,$s) as subt;";
                                        //   print_r($cos);die();
                                           $execos = mysqli_query($conn, $cos);
                                            $nos = mysqli_fetch_assoc($execos);
                                            ?>
                                          <tr class="table-titless font-bold">
                                                 <td class="text-center" style="border: 1px solid black;"></td>
                                                <td class="text-center" style="border: 1px solid black;"></td>
                                                <td class="text-center" style="border: 1px solid black;"></td>
                                                <?php 
                                                      $v = number_format($nos['v'],2);
                                                        $vs = str_replace(',', '', $v);
                                                        
                                                          $sg = number_format($nos['sgst'],2);
                                                        $sgs = str_replace(',', '', $sg);
  
     $cg = number_format($nos['cgst'],2);
                                                        $cgs = str_replace(',', '', $cg);
  
   $ig = number_format($nos['igst'],2);
                                                        $igs = str_replace(',', '', $ig);
                                                        
                                                        
                                                 $na = number_format($nos['net_amount'],2);
                                                        $nas = str_replace(',', '', $na);         
                                                ?>
                                                                                               <td class="text-center" style="border: 1px solid black;"><?= preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $vs) ?></td>
                                                <td class="text-center" style="border: 1px solid black;"><?=preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $sgs)?></td>
                                                <td class="text-center" style="border: 1px solid black;"><?=preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $cgs)?></td>
                                                <td class="text-center" style="border: 1px solid black;"><?=preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $igs)?></td>
                                                <td class="text-center" style="border: 1px solid black;"></td>
                                                <td class="text-center" style="border: 1px solid black;"></td>
                                                <td class="text-center" style="border: 1px solid black;"><?=preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $nas) ?></td>
                                            
                                            </tr>
                                            <?php if($j<25) { ?>
                                            <tr class="table-titless font-bold">
                                                <!-- <td class="text-center"></td>
                                    <td class="text-center"></td> -->
                                                <?php
                                                $cos1 = "select sum(amount) as tot,sum(CGST) as cgst,sum(SGST) as sgst,sum(IGST) as igst,sum(netAmount) as net_amount from purchase where `invoiceDate` LIKE '%$month%'";
                                                // $cos1 = "select sum(total) as tot,sum(cgst_amount) as cgst,sum(sgst_amount) as sgst,sum(igst_amount) as igst,sum(net_amount) as net_amount from comboset_invoice_final where created_at >= '$from_date' and created_at <= '$to_date'";
                                                // $cos="select * from  comboset_invoice_final where created_at >= '2023-04-01' and created_at <= '2023-04-30'";
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
                                                    if ($totalCGST != '') {
                                                        $totcgst = number_format($recs['cgst'], 2);
                                                        $totalCGST_amount = str_replace(',', '', $totcgst);
                                                        // echo $totalCGST_amount;
                                                        echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $totalCGST_amount);
                                                    } else {
                                                        echo  "---";
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-center" style="border: 1px solid black;">

                                                    <?php
                                                    if ($totalSGST != '') {
                                                        $totsgst = number_format($recs['sgst'], 2);
                                                        $totalSGST_amount = str_replace(',', '', $totsgst);
                                                        // echo $totalSGST_amount;
                                                        echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $totalSGST_amount);
                                                    } else {
                                                        echo  "---";
                                                    }
                                                    ?>

                                                </td>
                                                <td class="text-center" style="border: 1px solid black;">

                                                    <?php
                                                    if ($totalIGST != '') {
                                                        $totigst = number_format($recs['IGST'], 2);
                                                        $totalIGST_amount = str_replace(',', '', $totigst);
                                                        // echo $totalIGST_amount;
                                                        echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $totalIGST_amount);
                                                    } else {
                                                        echo  "---";
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-end" colspan="1" style="border: 1px solid black;"></td>
                                                <td class="text-end" colspan="1" style="border: 1px solid black;"></td>
                                                <td class="text-center" colspan="2" style="border: 1px solid black;">
                                                    <?php
                                                    $amount = number_format($recs['netAmount'], 2);
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
                                                $d1=($m-1)*25;
$d=$d1+1;
                                            $cos = "select * from (select * from purchase where `invoiceDate` LIKE '%$month%' order by invoiceDate asc limit $s1,$s) as subt;";
                                                // print_r($cos);die();
                                    // $cos = "select * from (select * from comboset_invoice_final where created_at >= '$from_date' and created_at <= '$to_date' order by id desc limit $s1,$s) as subt;";
                                            // $cos="select * from comboset_invoice_final where created_at >= '2023-04-01' and created_at <= '2023-04-30'";
                                            $execos = mysqli_query($conn, $cos);
                                            while ($rec = mysqli_fetch_assoc($execos)) {
                                                $totalAmount = $totalAmount + $rec['amount'];
                                                $totalNetAmount = $totalNetAmount + $rec['netAmount'];

                                                if (!empty($rec['CGST'])) {
                                                    $totalCGST = $totalCGST + $rec['CGST'];
                                                }


                                                if (!empty($rec['SGST'])) {
                                                    $totalSGST = $totalSGST + $rec['SGST'];
                                                }


                                                if (!empty($rec['IGST'])) {
                                                    $totalIGST = $totalIGST + $rec['IGST'];
                                                }

                                            ?>
                                                <tr class="table-titless  invoice_line">
                                                    <td class="text-center"><?= $d++ ?></td>
                                                    <td class="text-center"><?= date('d-m-Y', strtotime($rec['invoiceDate'])) ?></td>
                                                    <td class="text-center text-capitalize" style="white-space:nowrap;"><?= ($rec['supplierName']) ? $rec['supplierName'] : "---" ?></td>
                                                    <td class="text-center ">
                                                        <?php
                                                        $total = number_format($rec['amount'], 2);
                                                        $tot_amount = str_replace(',', '', $total);

                                                        echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $tot_amount);
                                                        // echo $tot_amount;
                                                        ?>
                                                    </td>
                                                    <td class="text-center ">
                                                        <?php
                                                        if ($rec['CGST'] != '') {
                                                            $cgst = number_format($rec['CGST'], 2);
                                                            $cgst_amount = str_replace(',', '', $cgst);
                                                            echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $cgst_amount);
                                                            // echo $cgst_amount;
                                                        } else {
                                                            echo  "---";
                                                        }

                                                        ?>
                                                    </td>
                                                    <td class="text-center ">

                                                        <?php
                                                        if ($rec['SGST'] != '') {
                                                            $sgst = number_format($rec['SGST'], 2);
                                                            $sgst_amount = str_replace(',', '', $sgst);
                                                            echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $sgst_amount);
                                                            // echo $sgst_amount;
                                                        } else {
                                                            echo  "---";
                                                        }

                                                        ?>
                                                    </td>
                                                    <td class="text-center ">

                                                        <?php
                                                        if ($rec['IGST'] != '') {
                                                                $igst = number_format($rec['IGST'], 2);
                                                         $igst_amount = str_replace(',', '',$igst);
                                                            echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $igst_amount);
                                                            // echo $igst_amount;
                                                        } else {
                                                            echo  "---";
                                                        }

                                                        ?>
                                                    </td>
                                                    <td class="text-center text-capitalize "><?= ($rec['GSTNO']) ? $rec['GSTNO'] : "---" ?></td>
                                                    <td class="text-center text-capitalize"><?php echo $rec['invoiceNumber']; ?></td>
                                                    <td class="text-center " style="font-weight: bold;">
                                                        <?php
                                                        $amount = number_format($rec['netAmount'], 2);
                                                        $net_amount = str_replace(',', '', $amount);

                                                        echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $net_amount);
                                                        // echo $net_amount;
                                                        ?>
                                                    </td>
                                                </tr>
                                            <?php
                                            }
                                             $cos = "select sum(amount) as v,sum(SGST) as sgst,sum(CGST) as cgst,sum(IGST) as igst,sum(netAmount) as net_amount from (select * from purchase where `invoiceDate` LIKE '%$month%' order by invoiceDate asc limit $s1,$s) as subt;";
                                            //  $cos = "select sum(total) as v,sum(sgst_amount) as sgst,sum(cgst_amount) as cgst,sum(igst_amount) as igst,sum(net_amount) as net_amount from (select total,cgst_amount,igst_amount,sgst_amount,net_amount from comboset_invoice_final where created_at >= '$from_date' and created_at <= '$to_date' order by id desc limit $s1,$s) as subt;";
                                            $execos = mysqli_query($conn, $cos);
                                            $nos = mysqli_fetch_assoc($execos);
                                            ?>
                                            <tr class="table-titless font-bold">
                                                 <td class="text-center" style="border: 1px solid black;"></td>
                                                <td class="text-center" style="border: 1px solid black;"></td>
                                                <td class="text-center" style="border: 1px solid black;"></td>
                                                <?php 
                                                      $v = number_format($nos['v'],2);
                                                        $vs = str_replace(',', '', $v);
                                                        
                                                          $sg = number_format($nos['sgst'],2);
                                                        $sgs = str_replace(',', '', $sg);
  
     $cg = number_format($nos['cgst'],2);
                                                        $cgs = str_replace(',', '', $cg);
  
   $ig = number_format($nos['igst'],2);
                                                        $igs = str_replace(',', '', $ig);
                                                        
                                                        
                                                 $na = number_format($nos['net_amount'],2);
                                                        $nas = str_replace(',', '', $na);         
                                                ?>
                                                                                                <td class="text-center" style="border: 1px solid black;"><?= preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $vs) ?></td>
                                                <td class="text-center" style="border: 1px solid black;"><?=preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $sgs)?></td>
                                                <td class="text-center" style="border: 1px solid black;"><?=preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $cgs)?></td>
                                                <td class="text-center" style="border: 1px solid black;"><?=preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $igs)?></td>
                                                <td class="text-center" style="border: 1px solid black;"></td>
                                                <td class="text-center" style="border: 1px solid black;"></td>
                                                <td class="text-center" style="border: 1px solid black;"><?=preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $nas) ?></td>
                                            
                                            </tr>
                                            <tr class="table-titless font-bold">
                                                <!-- <td class="text-center"></td>
                                    <td class="text-center"></td> -->
                                                <?php
                                                $cos1 = "select sum(amount) as tot,sum(CGST) as cgst,sum(SGST) as sgst,sum(IGST) as igst,sum(netAmount) as net_amount from purchase where `invoiceDate` LIKE '%$month%'";
                                                // $cos1 = "select sum(total) as tot,sum(cgst_amount) as cgst,sum(sgst_amount) as sgst,sum(igst_amount) as igst,sum(net_amount) as net_amount from comboset_invoice_final where created_at >= '$from_date' and created_at <= '$to_date'";
                                                // $cos="select * from  comboset_invoice_final where created_at >= '2023-04-01' and created_at <= '2023-04-30'";
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
                                                    if ($totalCGST != '') {
                                                        $totcgst = number_format($recs['cgst'], 2);
                                                        $totalCGST_amount = str_replace(',', '', $totcgst);
                                                        // echo $totalCGST_amount;
                                                        echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $totalCGST_amount);
                                                    } else {
                                                        echo  "---";
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-center" style="border: 1px solid black;">

                                                    <?php
                                                    if ($totalSGST != '') {
                                                        $totsgst = number_format($recs['sgst'], 2);
                                                        $totalSGST_amount = str_replace(',', '', $totsgst);
                                                        // echo $totalSGST_amount;
                                                        echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $totalSGST_amount);
                                                    } else {
                                                        echo  "---";
                                                    }
                                                    ?>

                                                </td>
                                                <td class="text-center" style="border: 1px solid black;">

                                                    <?php
                                                    if ($totalIGST != '') {
                                                        $totigst = number_format($recs['igst'], 2);
                                                        $totalIGST_amount = str_replace(',', '', $totigst);
                                                        // echo $totalIGST_amount;
                                                        echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $totalIGST_amount);
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


                                <?php }
                                    }
                                }
                                } ?>
                            </tbody>

                         </table>
                           <!--<p style="page-break-after: always;"></p> -->
                            
                    </div>
                    <!--end col-->
                </div>
                
                <!--end row-->
            </div>
            <!-- container -->
<?php include('footer.php') ?> 
                       
           <!--end footer-->
        </div>
        <!-- end page content -->
    </div>
  
    <!-- end page-wrapper -->
    <!-- Javascript  -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        window.onload = function() { 
        // window.onafterprint = function() { 
        //     location.replace("https://udhaarsudhaar.co.in/sunil/purchase.php");
        //     // window.close();
        // };
        window.print(); 
    }
        // window.print();
    </script>
    <script src="assets/plugins/datatables/simple-datatables.js"></script>
    <script src="assets/pages/datatable.init.js"></script>
    <!-- App js -->
    <script src="assets/js/app.js"></script>
     
</body>

</html>