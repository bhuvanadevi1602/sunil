<?php 
    include('./include/config.php');

    if(!empty($_REQUEST['fdate'])){
        $fdate = $_REQUEST['fdate'];
        $toDate = $_REQUEST['toDate'];
    }else{
        $fdate = $toDate = '';
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
    <title>Credit Report Bill | Sunil Traders</title>
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


.page-wrapper .page-content-tab {
    margin-bottom:10px;
    padding: 0 8px 35px 8px !important;
}

#invoice-table {
               border: 3.5px solid black !important;
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
               border: 3.5px solid black !important;
            border-spacing: 0;
            clear: both;
            margin: 0.0mm 0mm;
             min-height: 192mm;
            width: 100%;
        }
        #invoice-table th, td { font-weight: bold; }
        #invoice-table th:first-child, td:first-child { border-left: none; }
        #invoice-table th {font-size:12pt !important;white-space: nowrap; }
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

            <div class="container-fluid" style="margin-top: 10px;">
                <!-- Page-Title -->
                <!-- end page title end breadcrumb -->
                <div class="row">
                    <div class="col-lg-12" style="font-family: 'PT Serif', serif !important;">
                        <table class="table tablesss" id="invoice-table" style="border: 1px solid;">
                            <thead>
                                <tr>
                                    <th class="text-center pt-1 pb-1" colspan="10"><h4  style="line-height: 10px;"><b><u>CREDIT REPORT </u></b></h4></td>
                                </tr>
                                <tr>
                                    <th class="text-start pt-1 pb-1" colspan="3">
                                        <h5 class="ttl-color"><b>SUNIL TRADERS</b></h5>
                                    </th>
                                    <th class="text-center pt-1 pb-1" colspan="4">
                                    <h4>From : <?= date('d-m-Y',strtotime($fdate)) ?> TO : <?= date('d-m-Y',strtotime($toDate)) ?></h4>
                                    </th>
                                    <th class="text-end pt-1 pb-1" colspan="3">
                                        <h5 class="ttl-color"><b>33AAAFS1530K1ZJ</b></h5>
                                    </th>
                                </tr>
                                <!--<tr><h2 class="text-center"><b>PURCHASE REPORT</b></h2></tr>-->
                                <tr class="table-title">
                                    <th class="text-center" style="width: 20px;">S.No</th>
                                    <th class="text-center" style="width: 90px;">DATE</th>
                                    <th class="text-center party-name">PARTY NAME</th>
                                    <th class="text-center">AMOUNT</th>
                                    <th class="text-center" style="width: 90px;">CGST</th>
                                    <th class="text-center" style="width: 90px;">SGST</th>
                                    <th class="text-center" style="width: 90px;">IGST</th>
                                    <th class="text-center gst-no">GST NO</th>
                                    <th class="text-center" style="width: 30px !important;">CREDIT NO</th>
                                    <th class="text-center" style="width: 100px;">NET AMOUNT</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $totalAmount = $totalCGST = $totalSGST = $totalIGST = $totalNetAmount = 0;
                                    if($fdate){
                                        $sql2 = "SELECT * FROM credit_note WHERE `createdAt` BETWEEN '$fdate' AND '$toDate' ORDER BY credit_note_id ASC";
                                    }else{
                                        $sql2 = "SELECT * FROM credit_note ORDER BY credit_note_id DESC";
                                    }
                                    $result2 = $conn->query($sql2);
                                    $i=1;
                                    while($purchase = $result2->fetch_assoc()){
                                        $totalAmount += $purchase['subTotal'];
                                        $totalCGST += $purchase['CGSTTax'];
                                        $totalSGST += $purchase['SGSTTax'];
                                        $totalIGST += $purchase['IGSTTax'];
                                        $totalNetAmount += $purchase['netAmount'];
                                ?>
                                
                                <tr class="table-titless invoice_line" >
                                    <td class="text-center"><?= $i++ ?></td>
                                    <td class="text-center"><?= date('d-m-Y',strtotime($purchase['createdAt'])) ?></td>
                                    <td class="text-center"><?= $purchase['supplierName'] ?></td>
                                    <td class="text-center">
                                        <!--<//?= number_format($purchase['subTotal'],2) ?>-->
                                        <?php 
                                            $total=number_format($purchase['subTotal'],2);
                                            $tot_amount=str_replace( ',', '', $total );
                                        
                                            echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $tot_amount);
                                        ?>
                                    </td>
                                    <td class="text-center">
                                        <!--<//?= ($purchase['CGSTTax']) ? number_format($purchase['CGSTTax'],2) : "---" ?>-->
                                        <?php 
                                        if($purchase['CGSTTax']!='') 
                                        {
                                            $cgst_amount=str_replace( ',', '', $purchase['CGSTTax'] );
                                            echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $cgst_amount);
                                        }
                                        else
                                        {
                                           echo  "---";
                                                
                                        }
                                        
                                        ?>
                                    </td>
                                    <td class="text-center">
                                        <!--<//?= ($purchase['SGSTTax']) ? number_format($purchase['SGSTTax'],2) : "---" ?>-->
                                        <?php 
                                        if($purchase['SGSTTax']!='') 
                                        {
                                            $sgst_amount=str_replace( ',', '', $purchase['SGSTTax'] );
                                            echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $sgst_amount);
                                        }
                                        else
                                        {
                                           echo  "---";
                                                
                                        }
                                        
                                        ?>
                                    </td>
                                    <td class="text-center">
                                        <!--<//?= ($purchase['IGSTTax']) ? number_format($purchase['IGSTTax'],2) : "---" ?>-->
                                        <?php 
                                        if($purchase['IGSTTax']!='') 
                                        {
                                            $igst_amount=str_replace( ',', '', $purchase['IGSTTax'] );
                                            echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $igst_amount);
                                        }
                                        else
                                        {
                                           echo  "---";
                                                
                                        }
                                        
                                        ?>
                                    </td>
                                    <td class="text-center"><?= $purchase['GSTNO'] ?></td>
                                    <td class="text-center"><?= $purchase['credit_note_id'] ?></td>
                                    <td class="text-center" style="font-weight: bold;">
                                        <!--<//?= number_format($purchase['netAmount'],2) ?>-->
                                        <?php 
                                            $total=number_format($purchase['netAmount'],2);
                                            $net_amount=str_replace( ',', '', $total );
                                        
                                            echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $net_amount);
                                        ?>
                                    </td>
                                </tr>
                                <?php
                                    }
                                ?> 
                                <tr class="table-titless" >
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                </tr>
                               
                                <tfoot>
                                <tr class="table-titlesss">
                                    <td class="text-endsss" colspan="3"></td>
                                    <td class="text-center">
                                        <!--<//?= number_format($totalAmount,2) ?>-->
                                        <?php 
                                        $amount=number_format($totalAmount,2);
                                        $tot_amount=str_replace( ',', '', $amount );
                                        
                                        echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $tot_amount);
                                        ?>
                                    </td>
                                    <td class="text-center">
                                        <!--<//?= number_format($totalCGST,2) ?>-->
                                        <?php
                                        if($totalCGST!='') 
                                        {
                                            $totalCGST_amount=str_replace( ',', '', $totalCGST );
                                            echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $totalCGST_amount);
                                        }
                                        else
                                        {
                                           echo  "---";
                                                
                                        }
                                        ?>
                                    </td>
                                    <td class="text-center">
                                        <!--<//?= number_format($totalSGST,2) ?>-->
                                        <?php
                                        if($totalSGST!='') 
                                        {
                                            $totalSGST_amount=str_replace( ',', '', $totalSGST );
                                            echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $totalSGST_amount);
                                        }
                                        else
                                        {
                                           echo  "---";
                                                
                                        }
                                        ?>
                                    </td>
                                    <td class="text-center">
                                        <!--<//?= number_format($totalIGST,2) ?>-->
                                        <?php
                                        if($totalIGST!='') 
                                        {
                                            $totalIGST_amount=str_replace( ',', '', $totalIGST );
                                            echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $totalIGST_amount);
                                        }
                                        else
                                        {
                                           echo  "---";
                                                
                                        }
                                        ?>
                                    </td>
                                    <td class="text-end" colspan="1"></td>
                                    <td class="text-end" colspan="1"></td>
                                    <td class="text-center">
                                        <!--<//?= number_format($totalNetAmount,2) ?>-->
                                        <?php 
                                        $amount=number_format($totalNetAmount,2);
                                        $net_amount=str_replace( ',', '', $amount );
                                        
                                        echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $net_amount);
                                        ?>
                                    </td>
                                </tr>                                                                        
                                <tr class="table-titless font-bold">
                                    <!-- <td class="text-center"></td>
                                    <td class="text-center"></td> -->
                                    <td class="text-endsss" colspan="3"><b>OVER ALL TOTAL</b></td>
                                    <td class="text-center">
                                        <!--<//?= number_format($totalAmount,2) ?>-->
                                        <?php 
                                        $amount=number_format($totalAmount,2);
                                        $tot_amount=str_replace( ',', '', $amount );
                                        
                                        echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $tot_amount);
                                        ?>
                                    </td>
                                    <td class="text-center">
                                        <!--<//?= number_format($totalCGST,2) ?>-->
                                        <?php
                                        if($totalCGST!='') 
                                        {
                                            $totalCGST_amount=str_replace( ',', '', $totalCGST );
                                            echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $totalCGST_amount);
                                        }
                                        else
                                        {
                                           echo  "---";
                                                
                                        }
                                        ?>
                                    </td>
                                    <td class="text-center">
                                        <!--<//?= number_format($totalSGST,2) ?>-->
                                        <?php
                                        if($totalSGST!='') 
                                        {
                                            $totalSGST_amount=str_replace( ',', '', $totalSGST );
                                            echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $totalSGST_amount);
                                        }
                                        else
                                        {
                                           echo  "---";
                                                
                                        }
                                        ?>
                                    </td>
                                    <td class="text-center">
                                        <!--<//?= number_format($totalIGST,2) ?>-->
                                        <?php
                                        if($totalIGST!='') 
                                        {
                                            $totalIGST_amount=str_replace( ',', '', $totalIGST );
                                            echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $totalIGST_amount);
                                        }
                                        else
                                        {
                                           echo  "---";
                                                
                                        }
                                        ?>
                                    </td>
                                    <td class="text-end" colspan="1"></td>
                                    <td class="text-end" colspan="1"></td>
                                    <td class="text-center">
                                        <!--<//?= number_format($totalNetAmount,2) ?>-->
                                        <?php 
                                        $amount=number_format($totalNetAmount,2);
                                        $net_amount=str_replace( ',', '', $amount );
                                        
                                        echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $net_amount);
                                        ?>
                                    </td>
                                </tr>
                                </tfoot>
                            </tbody>
                        </table>
                    </div>
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