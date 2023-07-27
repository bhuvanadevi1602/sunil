<?php 
    include('./include/config.php');

    if(!empty($_REQUEST['msg'])){
        $msg = $_REQUEST['msg'];
    }else{
        $msg = '';
    }
    if(!empty($_REQUEST['fdate'])){
        $fdate = $_REQUEST['fdate'];
        $toDate = $_REQUEST['toDate'];
    }else{
        $fdate = $toDate = '';
    }

    $year = date('Y');

    if(isset($_POST['filter'])){
        $fdate = $_REQUEST['fdate'];
        $toDate = $_REQUEST['toDate'];
        header("Location: creditNoteReport.php?fdate=$fdate&toDate=$toDate");
    }

?>
<?php include('header.php') ?>

<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="utf-8" />
    <title>Report Credit Note | Sunil Traders</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- App favicon -->
    <!--<link rel="shortcut icon" href="assets/images/favicon.ico">-->
    
    <!--<link href="assets/plugins/datatables/datatable.css" rel="stylesheet" type="text/css" />-->
    <!-- App css -->
    <!--<link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />-->
    <!--<link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />-->
    <!--<link href="assets/css/app.min.css" rel="stylesheet" type="text/css" />-->
    <style>
        @media screen and (max-width: 992px){
            .collapse:not(.show) {
                display: none !important;
            }
            .collapse {
                display: block !important;
            }
        }

        /* @media screen and (max-width: 992px){
        } */
@media (max-width: 1023.98px){
.enlarge-menu .page-content-tab {
    width: 83%;
}
}
    </style>
</head>

<!-- <body id="body" onload="window.print()" class="dark-sidebar"> -->
    
    <!-- Top Bar Start -->

   
    <!--<?php // include('./include/topAndSideBar.php') ?>-->
    <div class="page-wrapper">

        <!-- Page Content-->
        <div class="page-content-tab">

            <div class="container-fluid">
                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <!--end page-title-box-->
                    </div>
                    <!--end col-->
                </div>
                <!-- end page title end breadcrumb -->
                <div class="row">
                    <div class="col-12 m-3" >
                        <div class="card">
                            <div class="card-header row m-1">
                                <h4 class="card-title col-11">Credit Note Report</h4>
                                <div class="" style=" text-align: end;">
                                    <!-- <input class="btn btn-primary" type="submit" name="filter" value="Submit"> -->
                                    <button class="btn btn-primary" onclick="printDiv()">Print</button>
                                    <!--<button class="btn btn-primary" onclick="printDiv('datatable')">Print</button>-->
                                </div>
                            </div>
                            <!--end card-header-->
                            <div class="card-body">
                                <div class="table-responsive">
                                    <div class="col-12 m-3">
                                        <form method="post">
                                            <div class="row pb-3 pt-3">
                                                <label class="col-form-label text-center col-2">From Date :</label>
                                                <!-- <label class="col-form-label text-center col-2">Filter</label> -->
                                                <div class="col-3 text-center">
                                                    <input type="date" id='gMonth2' class="form-control" name="fdate" required>
                                                </div>
                                                <label class="col-form-label text-center col-2">To Date :</label>
                                                <!-- <label class="col-form-label text-center col-2">Filter</label> -->
                                                <div class="col-3 text-center">
                                                    <input type="date" id='gMonth2' class="form-control" name="toDate" required>
                                                </div>
                                                <div class="col-2 text-center">
                                                    <input class="btn btn-success" type="submit" name="filter" value="Submit">
                                                    <!-- <button class="btn btn-primary" onclick="printDiv('datatable')">Print</button> -->
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <table class="table mt-3" id="datatable_1">
                                        <thead class="thead-light p-3">
                                          <tr>
                                            <th class="text-center">S.No</th>
                                            <th class="text-center">Date</th>
                                            <th class="text-center">GST No</th>
                                            <th class="text-center">Buyer's Name</th>
                                            <th class="text-center">Amount ₹</th>
                                            <th class="text-center">CGST</th>
                                            <th class="text-center">SGST</th>
                                            <th class="text-center">IGST</th>
                                            <th class="text-center">Net Amount ₹</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                               if($fdate){
                                                // $sql2 = "SELECT * FROM debit_note WHERE `createdAt` BETWEEN '$fdate' AND '$toDate' ORDER BY debit_note_id ASC";
                                                    $sql2 = "SELECT * FROM `credit_note` WHERE `createdAt` >= '$fdate' AND `createdAt` <= '$toDate' ORDER BY credit_note_id DESC";
                                                // $sql2 = "SELECT * FROM debit_note WHERE `createdAt` LIKE '%$month%' ORDER BY debit_note_id ASC";
                                                }else{
                                                    $sql2 = "SELECT * FROM credit_note ORDER BY credit_note_id DESC";
                                                }
                                                $result2 = $conn->query($sql2);
                                                $i=1;
                                                while($debitNote = $result2->fetch_assoc()){
                                            ?>
                                            <tr>
                                                <td class="text-center"><?= $i++ ?></td>
                                                <td class="text-center"><?= date('d-m-Y',strtotime($debitNote['createdAt'])) ?></td>
                                                <td class="text-center"><?= $debitNote['GSTNO'] ?></td>
                                                <td class="text-center"><?= $debitNote['supplierName'] ?></td>
                                                <td class="text-center"> <?=number_format($debitNote['subTotal'],2) ?></td>
                                                <!--<td class="text-center"> <?=number_format($debitNote['amount'],2) ?></td>-->
                                                <!-- <td class="text-center"><?= $debitNote['GST'] ?></td> -->
                                                <!-- <td class="text-center"><?= $debitNote['GSTType'] ?></td> -->
                                                <td class="text-center"><?= ($debitNote['CGSTTax']) ? number_format($debitNote['CGSTTax'],2) : "---" ?></td>
                                                <td class="text-center"><?= ($debitNote['SGSTTax']) ? number_format($debitNote['SGSTTax'],2) : "---" ?></td>
                                                <td class="text-center"><?= ($debitNote['IGSTTax']) ? number_format($debitNote['IGSTTax'],2) : "---" ?></td>
                                                <!-- <td class="text-center"><?= $debitNote['invoiceNumber'] ?></td> -->
                                                <td class="text-center"> <?= number_format($debitNote['netAmount'],2) ?></td>
                                                <!-- <td class="text-center"><a href="purchase.php?del=<?= $debitNote['debit_note_id'] ?>" ><i class="fa fa-trash btn btn-danger"></i></a></td> -->
                                            </tr>
                                            <?php
                                                }
                                            ?>
                                            <tr>
                                                </tr>                                                                          
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-12 printTable"  id="datatable" >
                                        <div class="row">
                                            <div class="col-12" style="display: flex;justify-content: center;">
                                                <h2>PURCHASE REPORT</h2>
                                            </div>
                                            <div class="col-12" style="display: flex;justify-content: space-between;">
                                                <h3>SUNIL TRADERS</h3>
                                                <h4>From : <?= $fdate ?> TO :<?= $toDate ?></h4>
                                                <h3>33AAAF81530k1ZJ</h3>
                                            </div>
                                            <table class="table">
                                                <thead class="thead-light">
                                                <tr class="top-bottom-border">
                                                    <th class="text-center">S.NO</th>
                                                    <th class="text-center">Name</th>
                                                    <th class="text-center">Date</th>
                                                    <th class="text-center">Amount</th>
                                                    <!-- <th class="text-center">GST</th> -->
                                                    <!-- <th class="text-center">GST Type</th> -->
                                                    <th class="text-center">CGST</th>
                                                    <th class="text-center">SGST</th>
                                                    <th class="text-center">IGST</th>
                                                    <th class="text-center">GST NO</th>
                                                    <th class="text-center">Invoice No</th>
                                                    <!-- <th class="text-center">user</th> -->
                                                    <th class="text-center">NetAmount</th>
                                                    <!-- <th class="text-center">Action</th> -->
                                                </tr>
                                                </thead>
                                                <tbody>
                                                    <?php 
                                                        $totalAmount = $totalCGST = $totalSGST = $totalIGST = $totalNetAmount = 0;
                                                        if($fdate){
                                                            $sql2 = "SELECT * FROM `credit_note` WHERE `createdAt` >= '$fdate' AND `createdAt` <= '$toDate' ORDER BY credit_note_id ASC";
                                                            // $sql2 = "SELECT * FROM debit_note WHERE `createdAt` BETWEEN '$fdate' AND '$toDate' ORDER BY debit_note_id ASC";
                                                        // $sql2 = "SELECT * FROM debit_note WHERE `createdAt` LIKE '%$month%' ORDER BY debit_note_id ASC";
                                                        }else{
                                                            $sql2 = "SELECT * FROM credit_note ORDER BY credit_note_id DESC";
                                                        }
                                                        $result2 = $conn->query($sql2);
                                                        $i=1;
                                                        while($debitNote = $result2->fetch_assoc()){
                                                            $totalAmount += $debitNote['subTotal'];
                                                            $totalCGST += $debitNote['CGSTTax'];
                                                            $totalSGST += $debitNote['SGSTTax'];
                                                            $totalIGST += $debitNote['IGSTTax'];
                                                            $totalNetAmount += $debitNote['netAmount'];
                                                    ?>
                                                    <tr>
                                                        <td class="text-center"><?= $i++ ?></td>
                                                        <td class="text-center"><?= $debitNote['supplierName'] ?></td>
                                                        <td class="text-center"><?= date('d-m-Y',strtotime($debitNote['createdAt'])) ?></td>
                                                        <td class="text-center"> <?=number_format($debitNote['subTotal'],2) ?></td>
                                                        <!--<td class="text-center"> <?= $debitNote['amount'] ?></td>-->
                                                        <!-- <td class="text-center"><?= $debitNote['GST'] ?></td> -->
                                                        <!-- <td class="text-center"><?= $debitNote['GSTType'] ?></td> -->
                                                        <td class="text-center"><?= ($debitNote['CGSTTax']) ? $debitNote['CGSTTax'] : "---" ?></td>
                                                        <td class="text-center"><?= ($debitNote['SGSTTax']) ? $debitNote['SGSTTax'] : "---" ?></td>
                                                        <td class="text-center"><?= ($debitNote['IGSTTax']) ? $debitNote['IGSTTax'] : "---" ?></td>
                                                        <td class="text-center"><?= $debitNote['GSTNO'] ?></td>
                                                        <td class="text-center"><?= $debitNote['invoiceNumber'] ?></td>
                                                        <td class="text-center"> <?= $debitNote['netAmount'] ?></td>
                                                        <!-- <td class="text-center"><a href="purchase.php?del=<?= $debitNote['purchaseId'] ?>" ><i class="fa fa-trash btn btn-danger"></i></a></td> -->
                                                    </tr>
                                                    <?php
                                                        }
                                                    ?> 
                                                    <tr>
                                                        <td class="text-center"></td>
                                                        <td class="text-center"></td>
                                                        <td class="text-center"></td>
                                                        <td class="text-center"><?= $totalAmount ?></td>
                                                        <td class="text-center"><?= $totalCGST ?></td>
                                                        <td class="text-center"><?= $totalSGST ?></td>
                                                        <td class="text-center"><?= $totalIGST ?></td>
                                                        <td class="text-center"></td>
                                                        <td class="text-center"></td>
                                                        <td class="text-center"><?= $totalNetAmount ?></td>
                                                    </tr>                                                                        
                                                    <tr>
                                                        <td class="text-center"></td>
                                                        <td class="text-center"></td>
                                                        <td class="text-end">OVER ALL TOTAL</td>
                                                        <td class="text-center"><?= $totalAmount ?></td>
                                                        <td class="text-center"><?= $totalCGST ?></td>
                                                        <td class="text-center"><?= $totalSGST ?></td>
                                                        <td class="text-center"><?= $totalIGST ?></td>
                                                        <td class="text-center"></td>
                                                        <td class="text-center"></td>
                                                        <td class="text-center"><?= $totalNetAmount ?></td>
                                                    </tr>                                                                        
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                <iframe id="ifmcontentstoprint" style="height: 0px; width: 0px; position: absolute"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end row-->
            </div>
        </div>
        <!-- end page content -->
    </div>
    <!-- end page-wrapper -->
  <?php include('footer.php') ?>
    <!-- Javascript  -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $(".printTable").hide();
        });
        $(function() {
            $('#GSTNO').keyup(function() {
                this.value = this.value.toUpperCase();
            });
        });

        function printDiv(){;
            window.open("creditNoteReportBill.php?fdate=<?= $fdate?>&toDate=<?= $toDate ?>");   
        }
    </script>