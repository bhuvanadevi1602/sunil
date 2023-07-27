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
    <title>Madharsha Report | Sunil Traders</title>
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
             min-height: 172mm;
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
             min-height: 172mm;
            width: 100%;
        }
        #invoice-table th, td { font-weight: bold; }
        #invoice-table th:first-child, td:first-child { border-left: none; }
        #invoice-table th {font-size:12pt !important;white-space: nowrap; }
        #invoice-table td { vertical-align: top; font-size: 10pt;font-weight: bold;position: relative;
    min-height: 0px;}
        th { text-align: center; font-weight: normal; }
        .amount { text-align: right; }
        .invoice_line { height: 6mm; }
        .invoice_line td, .invoice_line th { padding: 1mm; }
}

.gst-no{
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

            <div class="container-fluid" style="margin-top: 10px;">
                <!-- Page-Title -->
                <!-- end page title end breadcrumb -->
                <div class="row">
                    <div class="col-lg-12" style="font-family: 'PT Serif', serif !important;">
                        <table class="table tablesss" id="invoice-table" style="border: 1px solid;">
                            <thead>
                                <tr>
                                    <th class="text-center pt-1 pb-1" colspan="10"><h4 style="line-height: 10px;"><b><u>Madharsha & Show Room REPORT </u></b></h4></td>
                                </tr>
                                <tr>
                                    <th class="text-start pt-1 pb-1" colspan="3">
                                        <h4 class="ttl-color"><b>SUNIL TRADERS</b></h4>
                                    </th>
                                    <th class="text-center pt-1 pb-1" colspan="4">
                                    <h4>From : <?= $from_date ?> TO : <?= $to_date ?></h4>
                                    </th>
                                    <th class="text-end pt-1 pb-1" colspan="3">
                                        <h4 class="ttl-color"><b>33AAAFS1530K1ZJ</b></h4>
                                    </th>
                                </tr>
                                
                                <tr class="table-title">
                                    <th class="text-center">S.No</th>
                                    <th class="text-center">INV DATE</th>
                                    <th class="text-center  party-name">PARTY NAME</th>
                                    <th class="text-center" style="width: 135px;">AMOUNT</th>
                                    <th class="text-center" style="width: 90px;">CGST</th>
                                    <th class="text-center" style="width: 90px;">SGST</th>
                                    <th class="text-center" style="width: 90px;">IGST</th>
                                    <th class="text-center gst-no">GST NO</th>
                                    <th class="text-center invoice">INV NO</th>
                                    <th class="text-center">TOTAL AMOUNT</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                   
                                    
                                    $sql="SELECT * FROM madharsha_invoice_final WHERE customer_name like 'Madhar Sha Showroom' and created_at >= '$from_date' AND created_at <= '$to_date'";
                                    $result=mysqli_query($conn,$sql);
                                    $i=1;
                                    $totalAmount=0;
                                    $totalCGST=0;
                                    $totalSGST=0;
                                    $totalIGST=0;
                                    $totalNetAmount=0;
                                    while($rec=mysqli_fetch_assoc($result))
                                    {
                                        
                                      $totalAmount=$totalAmount+$rec['total'];
                                      $totalNetAmount=$totalNetAmount+$rec['net_amount'];
                                      if(!empty($rec['cgst_amount']))
                                      {
                                          $totalCGST=number_format((float)$totalCGST+(float)$rec['cgst_amount'],2);
                                      }
                                      
                                      
                                      if(!empty($rec['sgst_amount']))
                                      {
                                           $totalSGST=number_format((float)$totalSGST+(float)$rec['sgst_amount'],2);
                                      }
                                      
                                      if(!empty($rec['igst_amount']))
                                      {
                                           $totalIGST=number_format((float)$totalIGST+(float)$rec['igst_amount'],2);
                                      }
                                      
                                     
                                ?>
                                
                                <tr class="table-titless invoice_line">
                                    <td class="text-center"><?= $i++ ?></td>
                                    <td class="text-center"><?= date('d-m-Y',strtotime($rec['created_at'])) ?></td>
                                    <td class="text-center"><?= ($rec['customer_name']) ? $rec['customer_name'] : "---" ?></td>
                                    <td class="text-center">
                                        <?php 
                                            $total=number_format($rec['total'],2);
                                            $tot_amount=str_replace( ',', '', $total );
                                        
                                            echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $tot_amount);
                                        ?>
                                    </td>
                                    <td class="text-center">
                                        <?php 
                                        if($rec['cgst_amount']!='') 
                                        {
                                            $cgst_amount=str_replace( ',', '', $rec['cgst_amount'] );
                                            echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $cgst_amount);
                                        }
                                        else
                                        {
                                           echo  "---";
                                                
                                        }
                                        
                                        ?>
                                    </td>
                                    <td class="text-center">
                                        <?php 
                                        if($rec['sgst_amount']!='') 
                                        {
                                            $sgst_amount=str_replace( ',', '', $rec['sgst_amount'] );
                                            echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $sgst_amount);
                                        }
                                        else
                                        {
                                           echo  "---";
                                                
                                        }
                                        
                                        ?>?>
                                    </td>
                                    <td class="text-center">
                                        <?php 
                                        if($rec['igst_amount']!='') 
                                        {
                                            $igst_amount=str_replace( ',', '', $rec['igst_amount'] );
                                            echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $igst_amount);
                                        }
                                        else
                                        {
                                           echo  "---";
                                                
                                        }
                                        
                                        ?>
                                    </td>
                                    <td class="text-center"><?= ($rec['gst_no']) ? $rec['gst_no'] : "---" ?></td>
                                    <td class="text-center"><?= $rec['bill_id'] ?></td>
                                    <td class="text-center" style="font-weight: bold;">
                                        <?php 
                                            $amount=number_format($rec['net_amount'],2);
                                            $net_amount=str_replace( ',', '', $amount );
                                        
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
                                        <?php 
                                        $amount=number_format($totalAmount,2);
                                        $tot_amount=str_replace( ',', '', $amount );
                                        
                                        echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $tot_amount);
                                        ?>
                                    </td>
                                    <td class="text-center">
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
                                        <?php 
                                         $amount=number_format($totalNetAmount,2);
                                         $tot_amount=str_replace( ',', '', $amount );
                                        
                                         echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $tot_amount);
                                         
                                        ?>
                                    </td>
                                </tr>                                                                        
                                <tr class="table-titless font-bold">
                                    <!-- <td class="text-center"></td>
                                    <td class="text-center"></td> -->
                                    <td class="text-endsss" colspan="3"><b>OVER ALL TOTAL</b></td>
                                    <td class="text-center">
                                        <?php 
                                        $amount=number_format($totalAmount,2);
                                        $tot_amount=str_replace( ',', '', $amount );
                                        
                                        echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $tot_amount);
                                        ?>
                                    </td>
                                    <td class="text-center">
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
                                        <?php 
                                         $amount=number_format($totalNetAmount,2);
                                         $tot_amount=str_replace( ',', '', $amount );
                                        
                                         echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $tot_amount);
                                         
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