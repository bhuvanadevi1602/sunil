<?php 
    include('./include/config.php');

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

            <div class="container-fluid">
                <!-- Page-Title -->
                <!-- end page title end breadcrumb -->
                <div class="row">
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
                    <div class="col-lg-12">
                        <table class="table tablesss" style="border: 1px solid;">
                            <thead>
                                <tr>
                                    <th class="text-center pt-1 pb-1" colspan="10"><h4><b>PURCHASE REPORT</b></h4></td>
                                </tr>
                                <tr>
                                    <!-- <div class="d-flex justify-content-between"> -->
                                    <th class="text-start pt-1 pb-1" colspan="3">
                                        <h5 class="ttl-color"><b>SUNIL TRADERS</b></h5>
                                    </th>
                                    <th class="text-center pt-1 pb-1" colspan="4">
                                        <h5>MONTH OF <?= strtoupper($m) ?>(<?= $monthSplit1 ?>)</h5>
                                    </th>
                                    <th class="text-end pt-1 pb-1" colspan="3">
                                        <h5 class="ttl-color"><b>33AAAF81530K1ZS</b></h5>
                                    </th>
                                    <!-- </div> -->
                                </tr>
                                <!--<tr><h2 class="text-center"><b>PURCHASE REPORT</b></h2></tr>-->
                                <tr class="table-title">
                                    <th class="text-center">S.No</th>
                                    <th class="text-center">DATE</th>
                                    <th class="text-center">PARTY NAME</th>
                                    <th class="text-center">AMOUNT</th>
                                    <th class="text-center">CGST</th>
                                    <th class="text-center">SGST</th>
                                    <th class="text-center">IGST</th>
                                    <th class="text-center">GST NO</th>
                                    <th class="text-center">INVOICE No</th>
                                    <th class="text-center">NET AMOUNT</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $totalAmount = $totalCGST = $totalSGST = $totalIGST = $totalNetAmount = 0;
                                    if($month){
                                        $sql2 = "SELECT * FROM purchase WHERE `createdAt` LIKE '%$month%' ORDER BY purchaseId ASC";
                                    }else{
                                        $sql2 = "SELECT * FROM purchase ORDER BY purchaseId DESC";
                                    }
                                    $result2 = $conn->query($sql2);
                                    $i=1;
                                    while($purchase = $result2->fetch_assoc()){
                                        $totalAmount += $purchase['amount'];
                                        $totalCGST += $purchase['CGST'];
                                        $totalSGST += $purchase['SGST'];
                                        $totalIGST += $purchase['IGST'];
                                        $totalNetAmount += $purchase['netAmount'];
                                ?>
                                
                                <tr class="table-titless" >
                                    <td class="text-center"><?= $i++ ?></td>
                                    <td class="text-center"><?= $purchase['supplierName'] ?></td>
                                    <td class="text-center"><?= date('d-m-Y',strtotime($purchase['createdAt'])) ?></td>
                                    <td class="text-center"> <?= $purchase['amount'] ?></td>
                                    <td class="text-center"><?= ($purchase['CGST']) ? $purchase['CGST'] : "---" ?></td>
                                    <td class="text-center"><?= ($purchase['SGST']) ? $purchase['SGST'] : "---" ?></td>
                                    <td class="text-center"><?= ($purchase['IGST']) ? $purchase['IGST'] : "---" ?></td>
                                    <td class="text-center"><?= $purchase['GSTNO'] ?></td>
                                    <td class="text-center"><?= $purchase['invoiceNumber'] ?></td>
                                    <td class="text-center"> <?= $purchase['netAmount'] ?></td>
                                </tr>
                                <?php
                                    }
                                ?> 
                                <tr class="table-titlesss">
                                    <td class="text-endsss" colspan="3"></td>
                                    <td class="text-center"><?= $totalAmount ?></td>
                                    <td class="text-center"><?= $totalCGST ?></td>
                                    <td class="text-center"><?= $totalSGST ?></td>
                                    <td class="text-center"><?= $totalIGST ?></td>
                                    <td class="text-end" colspan="2"></td>
                                    <td class="text-center"><?= $totalNetAmount ?></td>
                                </tr>                                                                        
                                <tr class="table-titless font-bold">
                                    <!-- <td class="text-center"></td>
                                    <td class="text-center"></td> -->
                                    <td class="text-endsss" colspan="3"><b>OVER ALL TOTAL</b></td>
                                    <td class="text-center"><?= $totalAmount ?></td>
                                    <td class="text-center"><?= $totalCGST ?></td>
                                    <td class="text-center"><?= $totalSGST ?></td>
                                    <td class="text-center"><?= $totalIGST ?></td>
                                    <td class="text-end" colspan="2"></td>
                                    <td class="text-center"><?= $totalNetAmount ?></td>
                                </tr>  
                            </tbody>
                        </table>
                    </div>
                    <!--end col-->
                </div>
                <!--end row-->
            </div>
            <!-- container -->

            <!--Start Rightbar-->
                <?php // include('./include/rightbar.php') ?>
            <!--end Rightbar-->
            
           <!--Start Footer-->
           <!-- Footer Start -->
           <?php include('./footer.php') ?>
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