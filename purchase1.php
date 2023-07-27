<?php 
    include('./include/config.php');

    if(!empty($_REQUEST['msg'])){
        $msg = $_REQUEST['msg'];
    }else{
        $msg = '';
    }

    if(isset($_POST['submit'])){
        $supplierName = $_POST['supplierName'];
        $GSTNO = $_POST['GSTNO'];
        $amount = $_POST['amount'];
        $GST = $_POST['GST'];
        $GSTType = $_POST['GSTType'];
        $CGST = $_POST['CGST'];
        $CGSTTax = $_POST['CGSTTax'];
        $SGST = $_POST['SGST'];
        $SGSTTax = $_POST['SGSTTax'];
        $IGST = $_POST['IGST'];
        $IGSTTax = $_POST['IGSTTax'];
        $invoiceNumber = $_POST['invoiceNumber'];
        $netAmount = $_POST['netAmount'];

        $sql = "INSERT INTO purchase (supplierName,GSTNO,amount,GST,GSTType,CGST,CGSTTax,SGST,SGSTTax,IGST,IGSTTax,invoiceNumber,netAmount) VALUES ('$supplierName','$GSTNO','$amount','$GST','$GSTType','$CGST','$CGSTTax','$SGST','$SGSTTax','$IGST','$IGSTTax','$invoiceNumber','$netAmount')";
        // $conn->query($sql);
        if($conn->query($sql)){
            header('location: purchase.php?meg=Added Successfully');
        }
    }

    if(!empty($_REQUEST['del'])){
        $del = $_REQUEST['del'];
        $sql = "DELETE FROM purchase WHERE purchaseId = $del";
        if($conn->query($sql)){
            header('location: purchase.php?meg=Deleted Successfully');
        }
    }
?>

    <?php include('header.php') ?>
    <!-- Top Bar End -->

    <div class="page-wrapper">

        <!-- Page Content-->
        <div class="page-content-tab">

            <div class="container-fluid">
                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                            <!-- <div class="float-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Unikit</a></li>
                                    <li class="breadcrumb-item"><a href="#">Forms</a></li>
                                    <li class="breadcrumb-item active">Form Elements</li>
                                </ol>
                            </div> -->
                            <!-- <h4 class="page-title">Purchase</h4> -->
                        </div>
                        <!--end page-title-box-->
                    </div>
                    <!--end col-->
                </div>
                <!-- end page title end breadcrumb -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Purchase <?= $msg ?></h4>
                            </div>
                            <!--end card-header-->
                            <div class="card-body">  
                                <form  method="post">
                                    <div class="row">
                                        <div class="col-lg-6 col-sm-12">
                                            <div class="mb-3 row">
                                                <label for="example-number-input" class="col-sm-2 col-form-label text-end">Name</label>
                                                <div class="col-sm-10">
                                                    <input class="form-control" type="text" name="supplierName" placeholder="Enter the Supplier Name" required >
                                                </div>
                                            </div>                                 
                                        </div>
                                        <div class="col-lg-6 col-sm-12">
                                            <div class="mb-3 row">
                                                <label for="example-number-input" class="col-sm-2 col-form-label text-end">GST No</label>
                                                <div class="col-sm-10">
                                                    <input class="form-control" type="text" name="GSTNO" maxlength="16" placeholder="Enter the GST No">
                                                </div>
                                            </div>                                 
                                        </div>
                                        <div class="col-lg-6 col-sm-12">
                                            <div class="mb-3 row">
                                                <label for="example-number-input" class="col-sm-2 col-form-label text-end">Amount</label>
                                                <div class="col-sm-10">
                                                    <input class="form-control" type="number" id="amount" name="amount" onkeyup="GSTCalc()" placeholder="Enter the Amount" required >
                                                </div>
                                            </div>                                 
                                        </div>
                                        <div class="col-lg-6 col-sm-12">
                                            <div class="row mb-3">
                                                <label for="example-number-input" class="col-md-3 col-sm-3 control-label text-center">GST</label>
                                                <div class="col-md-6 col-sm-6">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="GST" id="GST" onclick="$('#GSTType').show();" value="yes" required>
                                                        <label class="form-check-label" for="inlineRadio1">Yes</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="GST" id="GST" onclick="$('#GSTType').hide();$('#stateSGstValue').hide();$('#stateCGstValue').hide();$('#IGSTValue').hide();" value="no" required>
                                                        <label class="form-check-label" for="inlineRadio2">No</label>
                                                    </div>
                                                </div>
                                            </div>                                 
                                        </div>
                                        <div class="col-lg-6 col-sm-12" id="GSTType">
                                            <div class="row mb-3">
                                                <label for="example-number-input" class="col-md-3 col-sm-3 control-label text-center">GST Type</label>
                                                <div class="col-md-6 col-sm-6">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="GSTType" id="state" onclick="$('#stateSGstValue').show();$('#stateCGstValue').show();$('#IGSTValue').hide();" value="state">
                                                        <label class="form-check-label" for="inlineRadio1">State</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="GSTType" id="interState" onclick="$('#IGSTValue').show();$('#stateSGstValue').hide();$('#stateCGstValue').hide();" value="interState">
                                                        <label class="form-check-label" for="inlineRadio2">Inter State</label>
                                                    </div>
                                                </div>
                                            </div>                                 
                                        </div>
                                        <div class="col-lg-3 col-sm-12" id="stateCGstValue">
                                            <div class="mb-3 row">
                                                <label for="example-number-input" class="col-sm-4 col-form-label text-end">CGST %</label>
                                                <div class="col-sm-8">
                                                    <input class="form-control" type="number" id="CGST" name="CGST" onkeyup="GSTCalc()" placeholder="Enter the CGST %" >
                                                    <input class="form-control" type="hidden" id="CGSTTax" name="CGSTTax" value="" >
                                                </div>
                                            </div>                                 
                                        </div>
                                        <div class="col-lg-3 col-sm-12" id="stateSGstValue">
                                            <div class="mb-3 row">
                                                <label for="example-number-input" class="col-sm-4 col-form-label text-end">SGST %</label>
                                                <div class="col-sm-8">
                                                    <input class="form-control" type="number" id="SGST" name="SGST" onkeyup="GSTCalc()" placeholder="Enter the SGST %">
                                                    <input class="form-control" type="hidden" id="SGSTTax" name="SGSTTax" value="">
                                                </div>
                                            </div>                                 
                                        </div>
                                        <div class="col-lg-6 col-sm-12" id="IGSTValue">
                                            <div class="mb-3 row">
                                                <label for="example-number-input" class="col-sm-2 col-form-label text-end">IGST %</label>
                                                <div class="col-sm-10">
                                                    <input class="form-control" type="number" id="IGST" name="IGST" onkeyup="GSTCalc()"  placeholder="Enter the IGST" >
                                                    <input class="form-control" type="hidden" id="IGSTTax" name="IGSTTax" value="">
                                                </div>
                                            </div>                                 
                                        </div>
                                        <div class="col-lg-6 col-sm-12">
                                            <div class="mb-3 row">
                                                <label for="example-number-input" class="col-sm-2 col-form-label text-end">Invoice number</label>
                                                <div class="col-sm-10">
                                                    <input class="form-control" type="text" id="invoiceNumber" name="invoiceNumber"  placeholder="Enter the Invoice number"  >
                                                </div>
                                            </div>                                 
                                        </div>
                                        <div class="col-lg-6 col-sm-12">
                                            <div class="mb-3 row">
                                                <label for="example-number-input" class="col-sm-2 col-form-label text-end">Net Amount</label>
                                                <div class="col-sm-10">
                                                    <input class="form-control" type="text" id="netAmount" name="netAmount" value="" readonly>
                                                </div>
                                            </div>                                 
                                        </div>
                                        <div class="col-lg-12 col-sm-12 d-flex justify-content-end">
                                            <input class="btn btn-primary" type="submit" name="submit" value="submit">
                                        </div>
                                    </div>                                                                      
                                </form>
                            </div>
                            <!--end card-body-->
                        </div><!--end card-->
                    </div>
                    <div class="col-12" >
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">View Purchase <?= $msg ?></h4>
                            </div>
                            <!--end card-header-->
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table" id="datatable_1">
                                        <thead class="thead-light">
                                          <tr>
                                            <th class="text-center">#</th>
                                            <th class="text-center">Name</th>
                                            <th class="text-center">GST NO</th>
                                            <th class="text-center">Amount ₹</th>
                                            <th class="text-center">GST</th>
                                            <!-- <th class="text-center">GST Type</th> -->
                                            <th class="text-center">CGST%</th>
                                            <th class="text-center">SGST%</th>
                                            <th class="text-center">IGST%</th>
                                            <th class="text-center">Invoice number</th>
                                            <th class="text-center">Net Amount ₹</th>
                                            <!-- <th class="text-center">user</th> -->
                                            <th class="text-center">Date/Time</th>
                                            <th class="text-center">Action</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                                $sql2 = "SELECT * FROM purchase ORDER BY purchaseId DESC";
                                                $result2 = $conn->query($sql2);
                                                $i=1;
                                                while($purchase = $result2->fetch_assoc()){
                                            ?>
                                            <tr>
                                                <td class="text-center"><?= $i++ ?></td>
                                                <td class="text-center"><?= $purchase['supplierName'] ?></td>
                                                <td class="text-center"><?= $purchase['GSTNO'] ?></td>
                                                <td class="text-center"> <?= $purchase['amount'] ?></td>
                                                <td class="text-center"><?= $purchase['GST'] ?></td>
                                                <!-- <td class="text-center"><?= $purchase['GSTType'] ?></td> -->
                                                <td class="text-center"><?= $purchase['CGST'] ?></td>
                                                <td class="text-center"><?= $purchase['SGST'] ?></td>
                                                <td class="text-center"><?= $purchase['IGST'] ?></td>
                                                <td class="text-center"><?= $purchase['invoiceNumber'] ?></td>
                                                <td class="text-center"> <?= $purchase['netAmount'] ?></td>
                                                <td class="text-center"><?= $purchase['createdAt'] ?></td>
                                                <td class="text-center"><a href="purchase.php?del=<?= $purchase['purchaseId'] ?>" ><i class="fa fa-trash btn btn-danger"></i></a></td>
                                            </tr>
                                            <?php
                                                }
                                            ?>                                                                          
                                        </tbody>
                                      </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end col-->
                </div>
                <!--end row-->
            </div>
            <!-- container -->

            <!--Start Rightbar-->
                <?php include('./include/rightbar.php') ?>
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
        $(document).ready(function() {

            $("#GSTType").hide();
            $('#stateCGstValue').hide();
            $('#stateSGstValue').hide();
            $('#IGSTValue').hide();
        });
    </script>
   
    <script>
        function GSTCalc(){
            let amount = document.getElementById('amount').value;

            let CGST = document.getElementById('CGST').value;
            let CGSTTax = amount/100*CGST;
            document.getElementById('CGSTTax').value = CGSTTax
            // console.log(CGSTTax);

            let SGST = document.getElementById('SGST').value;
            let SGSTTax = amount/100*SGST;
            document.getElementById('SGSTTax').value = SGSTTax
            // console.log(SGSTTax);

            let IGST = document.getElementById('IGST').value;
            let IGSTTax = amount/100*IGST;
            document.getElementById('IGSTTax').value = IGSTTax
            // console.log(IGSTTax);

            if(IGSTTax){
                let netAmount = Number(amount)+Number(IGSTTax);
                document.getElementById('netAmount').value = netAmount
                console.log(netAmountIGST);
            }else if(CGSTTax){
                let netAmount = Number(amount)+Number(CGSTTax)+Number(SGSTTax);
                document.getElementById('netAmount').value = netAmount
                console.log(netAmountState);
            }else{
                let netAmount = Number(amount);
                document.getElementById('netAmount').value = netAmount
            }
            
        }
    </script>
     
 <?php include('footer.php') ?>