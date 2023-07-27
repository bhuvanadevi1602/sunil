<?php
// include('./include/config.php');
include('header.php');

if (!empty($_REQUEST['msg'])) {
    $msg = $_REQUEST['msg'];
} else {
    $msg = '';
}
if (!empty($_REQUEST['month'])) {
    $month = $_REQUEST['month'];
} else {
    $month = '';
}

$year = date('Y');

if (isset($_POST['filter'])) {
    $month = $_POST['month'];
    header("Location: purchase.php?month=$month");
}

if (isset($_POST['submit'])) {
    $date = $_POST['date'];
    $supplierName = $_POST['supplierName'];
    $GSTNO = $_POST['GSTNO'];
    $amount = $_POST['amount'];
    $CGST = $_POST['CGST'];
    $CGSTTax = $_POST['CGSTTax'];
    $SGST = $_POST['SGST'];
    $SGSTTax = $_POST['SGSTTax'];
    $IGST = $_POST['IGST'];
    $IGSTTax = $_POST['IGSTTax'];
    $invoiceNumber = $_POST['invoiceNumber'];
    $netAmount = $_POST['netAmount'];
    $sql = "INSERT INTO purchase (invoiceDate,supplierName,GSTNO,amount,CGST,CGSTTax,SGST,SGSTTax,IGST,IGSTTax,invoiceNumber,netAmount) VALUES ('$date','$supplierName','$GSTNO','$amount','$CGST','$CGSTTax','$SGST','$SGSTTax','$IGST','$IGSTTax','$invoiceNumber','$netAmount')";
    if ($conn->query($sql)) {
        header('location: purchase.php?meg=Added Successfully');
    }
}

if (!empty($_REQUEST['del'])) {
    $del = $_REQUEST['del'];
    $sql = "DELETE FROM purchase WHERE purchaseId = $del";
    if ($conn->query($sql)) {
        header('location: purchase.php?meg=Deleted Successfully');
    }
}
?>

<?php // include('header.php') ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Purchase | Sunil Traders</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>

<div class="page-wrapper">
    <!-- Page Content-->
    <div class="page-content-tab">
        <div class="container-fluid">
            <!-- Page-Title -->
            <div class="row">
                <!--  -->
                <!--end col-->
            </div>
            <!-- end page title end breadcrumb -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-center">
                            <h4 class="card-title">Purchase <?= $msg ?></h4>
                        </div>
                        <!--end card-header-->
                        <div class="card-body">
                            <form method="post">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="mb-3 row">
                                            <label for="example-number-input" class="col-sm-4 col-form-label text-end">Date</label>
                                            <div class="col-sm-8">
                                                <input class="form-control" type="date" name="date" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="mb-3 row">
                                            <label for="example-number-input" class="col-sm-4 col-form-label text-end">Party Name</label>
                                            <div class="col-sm-8">
                                                <input class="form-control" type="text" name="supplierName" placeholder="Party Name" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="mb-3 row">
                                            <label for="example-number-input" class="col-sm-4 col-form-label text-end">GSTNo</label>
                                            <div class="col-sm-8">
                                                <input class="form-control" type="text" id="GSTNO" name="GSTNO" maxlength="16" placeholder="Enter the GST No" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class=" col-sm-3">
                                        <div class="mb-3 row">
                                            <label for="example-number-input" class="col-sm-4 col-form-label text-end">Invoice No</label>
                                            <div class="col-sm-8">
                                                <input class="form-control" type="text" id="invoiceNumber" name="invoiceNumber" placeholder="Enter the Invoice number" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="mb-3 row">
                                            <label for="example-number-input" class="col-sm-4 col-form-label text-end">Amount</label>
                                            <div class="col-sm-8">
                                                <input class="form-control" type="number" id="amount" step="0.01" onchange="GSTCalc()" name="amount" placeholder="Enter the Amount" required>
                                                <!-- <input class="form-control" type="number" id="amount" name="amount" onkeyup="GSTCalc()" placeholder="Enter the Amount" required > -->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-sm-12" id="stateCGstValue">
                                        <div class="mb-3 row">
                                            <label for="example-number-input" class="col-sm-4 col-form-label text-end">CGST</label>
                                            <div class="col-sm-8">
                                                <input class="form-control" type="number" id="CGST" name="CGST" step="0.01" onchange="GSTCalc()" placeholder="Enter the CGST">
                                                <input class="form-control" type="hidden" id="CGSTTax" name="CGSTTax">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-sm-12" id="stateSGstValue">
                                        <div class="mb-3 row">
                                            <label for="example-number-input" class="col-sm-4 col-form-label text-end">SGST</label>
                                            <div class="col-sm-8">
                                                <input class="form-control" type="number" id="SGST" name="SGST" step="0.01" onchange="GSTCalc()" placeholder="Enter the SGST">
                                                <input class="form-control" type="hidden" id="SGSTTax" name="SGSTTax">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-sm-12" id="IGSTValue">
                                        <div class="mb-3 row">
                                            <label for="example-number-input" class="col-sm-4 col-form-label text-end">IGST</label>
                                            <div class="col-sm-8">
                                                <input class="form-control" type="number" id="IGST" name="IGST" step="0.01" onchange="GSTCalc()" placeholder="Enter the IGST">
                                                <input class="form-control" type="hidden" id="IGSTTax" name="IGSTTax">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-sm-12 d-flex justify-content-end">
                                        <div class="mb-3 row">
                                            <label for="example-number-input" class="col-sm-4 col-form-label text-end">Net Amount</label>
                                            <div class="col-sm-8">
                                                <input class="form-control" type="text" id="netAmount" step="0.01" onchange="GSTCalc()" name="netAmount" value="" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-sm-12  row d-flex justify-content-between">
                                        <input class="btn btn-primary m-2 col-lg-5" type="reset" value="Clear">
                                        <input class="btn btn-success m-2 col-lg-5" type="submit" name="submit" value="submit">
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!--end card-body-->
                    </div>
                    <!--end card-->
                </div>
                <div class="col-12 ">
                    <div class="card">
                        <!-- <div class="card-header row">
                            <h4 class="card-title col-11">View Purchase <?= $msg ?></h4>
                        </div> -->
                        <!--end card-header-->
                        <div class="card-body">
                            <div class="table-responsive">
                                <div class="col-12 ">
                                    <form method="post">
                                        <div class="row pb-3 pt-3">
                                            <label class="col-form-label text-center col-2">Select Month</label>
                                            <div class="col-8 text-center">
                                                <input type="month" id='gMonth2' class="form-control" name="month" required>
                                            </div>
                                            <div class="col-2 text-center">
                                                <input class="btn btn-success" type="submit" name="filter" value="Submit">
                                                
                                                <button class="btn btn-primary" onclick="printDiv()" style="float: right;">Print</button><!-- <button class="btn btn-primary" onclick="printDiv('datatable')">Print</button> -->
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <table class="table" class="mt-3" id="datatable_1">
                                    <thead class="thead-light p-3">
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th class="text-center">Name</th>
                                            <th class="text-center">Date</th>
                                            <th class="text-center">Amount ₹</th>
                                            <!-- <th class="text-center">GST</th> -->
                                            <!-- <th class="text-center">GST Type</th> -->
                                            <th class="text-center">CGST</th>
                                            <th class="text-center">SGST</th>
                                            <th class="text-center">IGST</th>
                                            <th class="text-center">GST NO</th>
                                            <th class="text-center">Invoice number</th>
                                            <th class="text-center">Net Amount ₹</th>
                                            <!-- <th class="text-center">user</th> -->
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if ($month) {
                                            $sql2 = "SELECT * FROM purchase WHERE `invoiceDate` LIKE '%$month%' ORDER BY purchaseId ASC";
                                            // $sql2 = "SELECT * FROM purchase WHERE `createdAt` LIKE '%$year-$month%' ORDER BY purchaseId ASC";
                                        } else {
                                            $sql2 = "SELECT * FROM purchase ORDER BY purchaseId DESC";
                                        }
                                        $result2 = $conn->query($sql2);
                                        $i = 1;
                                        while ($purchase = $result2->fetch_assoc()) {
                                        ?>
                                            <tr>
                                                <td class="text-center"><?= $i++ ?></td>
                                                <td class="text-center"><?= $purchase['supplierName'] ?></td>
                                                <td class="text-center"><?= date('d-m-Y', strtotime($purchase['invoiceDate'])) ?></td>
                                                <td class="text-center"><?= number_format($purchase['amount'], 2) ?></td>
                                                <td class="text-center"><?= ($purchase['CGST']) ? number_format($purchase['CGST'], 2) : "---" ?></td>
                                                <td class="text-center"><?= ($purchase['SGST']) ? number_format($purchase['SGST'], 2) : "---" ?></td>
                                                <td class="text-center"><?= ($purchase['IGST']) ? number_format($purchase['IGST'], 2) : "---" ?></td>
                                                <td class="text-center"><?= $purchase['GSTNO'] ?></td>
                                                <td class="text-center"><?= $purchase['invoiceNumber'] ?></td>
                                                <td class="text-center"><?= number_format($purchase['netAmount'], 2) ?></td>
                                                <td class="text-center"><a href="purchase.php?del=<?= $purchase['purchaseId'] ?>"><i class="fa fa-trash btn btn-danger"></i></a></td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                        <tr>    
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <?php
                            $monthSplit1 = $monthSplit2 = 0;
                            $monthSplit = explode("-", $month);
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
                            <div class="col-12 printTable" id="datatable">
                                <div class="row">
                                    <div class="col-12" style="display: flex;justify-content: center;">
                                        <h2>PURCHASE REPORT</h2>
                                    </div>
                                    <div class="col-12" style="display: flex;justify-content: space-between;">
                                        <h3>SUNIL TRADERS</h3>
                                        <h4>MONTH OF <?= strtoupper($m) ?>(<?= $monthSplit1 ?>)</h4>
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
                                            if ($month) {
                                                $sql2 = "SELECT * FROM purchase WHERE `invoiceDate` LIKE '%$month%' ORDER BY purchaseId ASC";
                                            } else {
                                                $sql2 = "SELECT * FROM purchase ORDER BY purchaseId DESC";
                                            }
                                            $result2 = $conn->query($sql2);
                                            $i = 1;
                                            while ($purchase = $result2->fetch_assoc()) {
                                                $totalAmount += $purchase['amount'];
                                                $totalCGST += $purchase['CGST'];
                                                $totalSGST += $purchase['SGST'];
                                                $totalIGST += $purchase['IGST'];
                                                $totalNetAmount += $purchase['netAmount'];
                                            ?>
                                                <tr>
                                                    <td class="text-center"><?= $i++ ?></td>
                                                    <td class="text-center"><?= $purchase['supplierName'] ?></td>
                                                    <td class="text-center"><?= date('d-m-Y', strtotime($purchase['invoiceDate'])) ?></td>
                                                    <td class="text-center"> <?= number_format($purchase['amount'], 2) ?></td>
                                                    <td class="text-center"><?= ($purchase['CGST']) ? number_format($purchase['CGST'], 2) : "---" ?></td>
                                                    <td class="text-center"><?= ($purchase['SGST']) ? number_format($purchase['SGST'], 2) : "---" ?></td>
                                                    <td class="text-center"><?= ($purchase['IGST']) ? number_format($purchase['IGST'], 2) : "---" ?></td>
                                                    <td class="text-center"><?= $purchase['GSTNO'] ?></td>
                                                    <td class="text-center"><?= $purchase['invoiceNumber'] ?></td>
                                                    <td class="text-center"> <?= number_format($purchase['netAmount'], 2) ?></td>
                                                    <!-- <td class="text-center"><a href="purchase.php?del=<?= $purchase['purchaseId'] ?>" ><i class="fa fa-trash btn btn-danger"></i></a></td> -->
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
                <!--end col-->
            </div>
            <!--end row-->
        </div>
        <!-- container -->

        <!--Start Rightbar-->
        <!--end Rightbar-->

        <!--Start Footer-->
        <!-- Footer Start -->
        <?php include('footer.php') ?>
        <!-- end Footer -->
        <!--end footer-->
    </div>
    <!-- end page content -->
</div>
<!-- end page-wrapper -->



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

    function printDiv() {
        window.open("purchase-bill.php?month=<?= $month ?>");
    }
</script>
<!--<script src="assets/plugins/datatables/simple-datatables.js"></script>-->
<!--<script src="assets/pages/datatable.init.js"></script>-->
<!-- App js -->
<!--<script src="assets/js/app.js"></script>-->
<script>
    function GSTCalc() {
        let amount = document.getElementById('amount').value;

        let CGST = document.getElementById('CGST').value;
        let CGSTTax = amount / 100 * CGST;
        document.getElementById('CGSTTax').value = CGSTTax
        // console.log(CGSTTax);

        let SGST = document.getElementById('SGST').value;
        let SGSTTax = amount / 100 * SGST;
        document.getElementById('SGSTTax').value = SGSTTax
        // console.log(SGSTTax);

        let IGST = document.getElementById('IGST').value;
        let IGSTTax = amount / 100 * IGST;
        document.getElementById('IGSTTax').value = IGSTTax
        // console.log(IGSTTax);

        if (amount) {
            document.getElementById("CGST").required = true;
            // document.getElementById("SGST").required = true;    
        }
        if (CGST) {
            document.getElementById("SGST").required = true;
        }
        if (IGST) {
            document.getElementById("CGST").required = false;
            document.getElementById("SGST").required = false;
        }

        // if(IGSTTax){
        //     let netAmount = Number(amount)+Number(IGSTTax);
        //     document.getElementById('netAmount').value = netAmount
        //     console.log(netAmountIGST);
        // }else if(CGSTTax){
        //     let netAmount = Number(amount)+Number(CGSTTax)+Number(SGSTTax);
        //     document.getElementById('netAmount').value = netAmount
        //     console.log(netAmountState);
        // }else{
        //     let netAmount = Number(amount);
        //     document.getElementById('netAmount').value = netAmount
        // }
        this.value = parseFloat(this.value).toFixed(2);

    }
    let amount = document.getElementById('amount').value;
    if (amount) {
        if ((CGST == '' && SGST == '') || IGST == '') {
            alert("Enter the GST Type Values ...");
        }
    }
</script>

</body>

</html>