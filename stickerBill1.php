<?php 
    include('./include/config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Sticker Bill | Sunil Traders</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="assets/images/favicon.ico">
    <link href="assets/plugins/datatables/datatable.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" />
    <style type = "text/css">
        /*@media print {*/
        /*    body * {*/
        /*        visibility: hidden;*/
        /*    }*/
        /*    #sticker, #sticker * {*/
        /*         visibility: visible !important;*/
        /*    }*/

        /*    #sticker {*/
        /*            overflow: visible !important; */
        /*            float:none !important;*/
        /*            position: fixed;*/
        /*            left: 0px;*/
        /*            top: 0px;*/
        /*            display:block !important;*/
        /*        }*/
        /*}*/
    </style>
</head>
<?php 

    if(isset($_POST['submit'])){
        $qualityNo = $_POST['qualityNo'];
        $meter = $_POST['meter'];
        $meterRate = $_POST['meterRate'];
        $counterCount = $_POST['counterCount'];
        $price = $_POST['price'];

        $sql = "INSERT INTO stickerbill (qualityNo,meter,meterRate,counterCount,price) VALUES ('$qualityNo','$meter','$meterRate','$counterCount','$price')";
        if($result = $conn->query($sql)){
            $insertId = $conn->insert_id;
            // echo '<div class="col-sm-12" >';
            // echo '<div class="row" id="bill">';
            
    ?>
                <div class="modal fade" id="exampleModalFullscreen" tabindex="-1" role="dialog" aria-labelledby="exampleModalFullscreenLabel" aria-hidden="true">
                    <div class="modal-dialog modal-fullscreen" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h6 class="modal-title m-0" id="myLargeModalLabel">View Stickers</h6>
                                <!--<button type="button" class="btn btn-primary text-center" onclick="printer()">Print</button>-->
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div><!--end modal-header-->

                            <div class="modal-body">
                                <div class="row" id="bill">
                                    <?php 
                                    for ($i=1; $i <= $counterCount; $i++) { 
                                        $stickerBillCount = $insertId.$i;
                                        $sql1 = "INSERT INTO stickerbillcount (stickerBillId,stickerbillCount) VALUES ('$insertId','$stickerBillCount')";
                                        $result1 = $conn->query($sql1);
                                    ?>
                                    <div class="col-12" id="sticker">
                                        <div class="card strickers-desing mb-3" >
                                            <div class="row">
                                                <div class="col-3" style="display: flex;justify-content: center;align-items: center;transform: rotate(90deg);">
                                                    <hr>
                                                    <h1><b style="font-size: 4.1875rem;"><?= $stickerBillCount ?></b></h1>
                                                </div>
                                                <div class="col-9">
                                                    <div class="card-body" style="border-left: 1px solid;border-left-color: black;">
                                                        <div class="row" style="margin: -8px;padding: 4px;border: 4px solid black;">
                                                            <div class="col-6 text-center" style="display: flex;justify-content: center;align-items: center;">
                                                                <img src="assets/images/raymondLogo.png" alt="..."  class="img-fluid ">
                                                            </div>
                                                            <div class="col-6 text-center" style="display: flex;justify-content: center;align-items: center;">
                                                                <img src="assets/images/raymondBarCode.png" alt="..."  class="img-fluid bg-light-alt">
                                                            </div>
                                                            <div class="col-3"><h3 style="font-size: 2.1875rem;">S.NO.</h3></div>
                                                            <div class="col-8"><h3 style="font-size: 2.1875rem;"><?= $stickerBillCount ?></h3><hr style="margin: 0px;border: 1px solid;"></div>
                                                            <div class="col-3"><h3 style="font-size: 2.1875rem;">Q.NO.</h3></div>
                                                            <div class="col-8"><h3 style="font-size: 2.1875rem;"><?= $qualityNo ?></h3><hr style="margin: 0px;border: 1px solid;"></div>
                                                            <div class="col-3"><h3 style="font-size: 2.1875rem;">Mtrs.</h3></div>
                                                            <div class="col-8"><h3 style="font-size: 2.1875rem;"><?= $meter ?></h3><hr style="margin: 0px;border: 1px solid;"></div>
                                                            <div class="col-3"><h3 style="font-size: 2.1875rem;">Price.</h3></div>
                                                            <div class="col-8"><h3 style="font-size: 2.1875rem;"><?= $price ?></h3><hr style="margin: 0px;border: 1px solid;"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <div class="col-sm-12">
                                        <div class="card mb-3">
                                            <div class="row g-0">
                                                <div class="col-sm-3" style="display: flex;justify-content: center;align-items: center;transform: rotate(90deg);">
                                                    <h1><b><?= $stickerBillCount ?></b></h1>
                                                </div>
                                                <div class="col-sm-9">
                                                    <div class="card-body" style="border-left: 1px solid;border-left-color: black;">
                                                        <div class="row" style="margin: -8px;padding: 4px;border: 4px solid black;">
                                                            <div class="col-sm-6 align-self-center">
                                                                <img src="assets/images/raymondLogo.png" alt="..."  class="img-fluid">
                                                            </div>
                                                            <div class="col-sm-6 align-self-center">
                                                                <img src="assets/images/raymondBarCode.png" alt="..."  class="img-fluid">
                                                            </div>
                                                            <div class="col-sm-4"><h3>S.NO.</h3></div>
                                                            <div class="col-sm-8"><h3><?= $stickerBillCount ?></h3><hr style="margin: 0px;border: 1px solid;"></div>
                                                            <div class="col-sm-4"><h3>Q.NO.</h3></div>
                                                            <div class="col-sm-8"><h3><?= $qualityNo ?></h3><hr style="margin: 0px;border: 1px solid;"></div>
                                                            <div class="col-sm-4"><h3>Mtrs.</h3></div>
                                                            <div class="col-sm-8"><h3><?= $meter ?></h3><hr style="margin: 0px;border: 1px solid;"></div>
                                                            <div class="col-sm-4"><h3>Price.</h3></div>
                                                            <div class="col-sm-8"><h3><?= $price ?></h3><hr style="margin: 0px;border: 1px solid;"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>  -->
                                    <?php } ?>                                                          
                                </div>
                            </div><!--end modal-body-->
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary btn-sm" onclick="printer()">Print</button>
                                <!-- <button type="button" class="btn btn-primary btn-sm" onclick="printDiv('bill')">Print</button> -->
                            </div>
                            <!--end modal-footer-->
                        </div>
                        <!--end modal-content-->
                    </div>
                    <!--end modal-dialog-->
                </div>
    <?php
            // }
            // echo "</div>";
            // echo "</div>";
            echo "<script>exampleModal()</script>";
        }
    }
?>

<!-- <body id="body" onload="window.print()" class="dark-sidebar"> -->
<body id="body" class="dark-sidebar">
    <!-- Top Bar Start -->
    <?php include('./header.php') ?>
    <!-- Top Bar End -->

    <div class="page-wrapper">

        <!-- Page Content-->
        <div class="page-content-tab">

            <div class="container-fluid">
                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModalFullscreen"> view & Print</button>
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
                                <h4 class="card-title">Sticker Bill</h4>
                            </div>
                            <!--end card-header-->
                            <div class="card-body">  
                                <form  method="post">
                                    <div class="row">
                                        <div class="col-lg-8 col-sm-12">
                                            <div class="mb-3 row">
                                                <label for="example-number-input" class="col-sm-4 col-form-label text-end">Q.No</label>
                                                <div class="col-sm-4">
                                                    <input class="form-control" type="text" name="qualityNo" placeholder="Enter the Q.No" required id="example-number-input">
                                                </div>
                                            </div>                                 
                                        </div>
                                        <div class="col-lg-8 col-sm-12">
                                            <div class="mb-3 row">
                                                <label for="example-number-input" class="col-sm-4 col-form-label text-end">Meter</label>
                                                <div class="col-sm-4">
                                                    <input class="form-control" type="number" id="meter" name="meter" onkeyup="priceCalc()"  placeholder="Enter the Meter" required >
                                                </div>
                                            </div>                                 
                                        </div>
                                        <div class="col-lg-8 col-sm-12">
                                            <div class="mb-3 row">
                                                <label for="example-number-input" class="col-sm-4 col-form-label text-end">Meter Rate</label>
                                                <div class="col-sm-4">
                                                    <input class="form-control" type="number" id="meterRate" name="meterRate" onkeyup="priceCalc()" placeholder="Enter the Meter Rate" required >
                                                </div>
                                            </div>                                 
                                        </div>
                                        <div class="col-lg-8 col-sm-12">
                                            <div class="mb-3 row">
                                                <label for="example-number-input" class="col-sm-4 col-form-label text-end">Price</label>
                                                <div class="col-sm-4">
                                                    <input class="form-control" type="text" id="price" name="price" value="" readonly >
                                                </div>
                                            </div>                                 
                                        </div>
                                        <div class="col-lg-8 col-sm-12">
                                            <div class="mb-3 row">
                                                <label for="example-number-input" class="col-sm-4 col-form-label text-end">No of Printing</label>
                                                <div class="col-sm-4">
                                                    <input class="form-control" type="number" name="counterCount" placeholder="Enter the Meter Rate" required id="example-number-input">
                                                </div>
                                            </div>                                 
                                        </div>
                                        <div class="col-lg-12 col-sm-12 d-flex justify-content-end">
                                            <input class="btn btn-primary" id="billSubmit" type="submit" name="submit" value="submit">
                                            <!--<button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModalFullscreen">-->
                                            <!--    view-->
                                            <!--</button>-->
                                        <!-- <input class="btn btn-primary" type="button"   value="print" onclick="printer();"> -->
                                        </div>
                                    </div>                                                                      
                                </form>
                            </div>
                            <!--end card-body-->
                        </div><!--end card-->
                    </div>
                    <!-- <div class="col-12">
                        <div class="bill2" class="bill2">
                            <div class="col-12">
                                <div class="card mb-3" >
                                    <div class="row g-0">
                                        <div class="col-3" style="display: flex;justify-content: center;align-items: center;transform: rotate(90deg);">
                                            <hr>
                                            <h1><b style="font-size: 4.1875rem;">34855</b></h1>
                                        </div>
                                        <div class="col-9">
                                            <div class="card-body" style="border-left: 1px solid;border-left-color: black;">
                                                <div class="row" style="margin: -8px;padding: 4px;border: 4px solid black;">
                                                    <div class="col-6 text-center" style="display: flex;justify-content: center;align-items: center;">
                                                        <img src="assets/images/raymondLogo.png" alt="..."  class="img-fluid ">
                                                    </div>
                                                    <div class="col-6 text-center" style="display: flex;justify-content: center;align-items: center;">
                                                        <img src="assets/images/raymondBarCode.png" alt="..."  class="img-fluid bg-light-alt">
                                                    </div>
                                                    <div class="col-3"><h3 style="font-size: 2.1875rem;">S.NO.</h3></div>
                                                    <div class="col-8"><h3 style="font-size: 2.1875rem;">34855</h3><hr style="margin: 0px;border: 1px solid;"></div>
                                                    <div class="col-3"><h3 style="font-size: 2.1875rem;">Q.NO.</h3></div>
                                                    <div class="col-8"><h3 style="font-size: 2.1875rem;">54656</h3><hr style="margin: 0px;border: 1px solid;"></div>
                                                    <div class="col-3"><h3 style="font-size: 2.1875rem;">Mtrs.</h3></div>
                                                    <div class="col-8"><h3 style="font-size: 2.1875rem;">1.50</h3><hr style="margin: 0px;border: 1px solid;"></div>
                                                    <div class="col-3"><h3 style="font-size: 2.1875rem;">Price.</h3></div>
                                                    <div class="col-8"><h3 style="font-size: 2.1875rem;">450</h3><hr style="margin: 0px;border: 1px solid;"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->
                    <div class="col-12" >
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Sticker Bill Details </h4>
                            </div>
                            <!--end card-header-->
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table" id="datatable_1">
                                        <thead class="thead-light">
                                          <tr>
                                            <th class="text-center">#</th>
                                            <th class="text-center">Q.NO</th>
                                            <th class="text-center">Meter</th>
                                            <th class="text-center">Rate</th>
                                            <th class="text-center">Price</th>
                                            <th class="text-center" data-type="date" data-format="DD/MM/YYYY"> Date</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                                $sql2 = "SELECT * FROM stickerbill ORDER BY stickerBillId DESC";
                                                $result2 = $conn->query($sql2);
                                                $i=1;
                                                while($stickerBillTable = $result2->fetch_assoc()){
                                            ?>
                                            <tr>
                                                <td class="text-center"><?= $i++ ?></td>
                                                <td class="text-center"><?= $stickerBillTable['qualityNo'] ?></td>
                                                <td class="text-center"><?= $stickerBillTable['meter'] ?></td>
                                                <td class="text-center"><?= $stickerBillTable['meterRate'] ?></td>
                                                <td class="text-center">₹ <?= $stickerBillTable['price'] ?></td>
                                                <td class="text-center"><?= date('d-m-Y',strtotime($stickerBillTable['createdAt'])) ?></td>
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
           <?php include('./footer.php') ?>
           <!-- end Footer -->                
           <!--end footer-->
        </div>
        <!-- end page content -->
    </div>
    <!-- end page-wrapper -->

    <!-- Javascript  -->
    <script src="assets/plugins/datatables/simple-datatables.js"></script>
    <script src="assets/pages/datatable.init.js"></script>
    <!-- App js -->
    <script src="assets/js/app.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        function priceCalc(){
            let meter = document.getElementById('meter').value;
            let meterRate = document.getElementById('meterRate').value;
            // console.log(meter*meterRate);
            let price = meter*meterRate
            document.getElementById('price').value = price
        }

        // $("#billSubmit").click(function(){
        //     printDiv("bill");
        // });

        function printDiv(divName) {
            var printContents = document.getElementById(divName).innerHTML;
            var originalContents = document.body.innerHTML;
            w = window.open("printScreen.php", "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=50,left=50,width=900,height=400");
        }
        
        // $(document).on('click', '#billSubmit input[type=submit]', function(e) {
        //     var isValid = $(e.target).parents('form').isValid();
        //     if(!isValid) {
        //         e.preventDefault(); //prevent the default action
        //     } 
        // });
        // function exampleModal(){ 
        //     $("#exampleModalLarge").modal('toggle');//see here usage
        //     // $("#exampleModalLarge").target('#exampleModalLarge');
        //     // data-toggle="modal" data-target="#exampleModal";
        // };

        // function printDiv(){
        //     var printContents = document.getElementById(divName).innerHTML;
        //     let printContents = document.getElementById('bill').innerHTML
        //     let originalContents = document.body.innerHTML
        //     let doc = document.body.innerHTML = html+printContents
        //     w = window.open();
        //     w.document.write(printer());
        //     w.document.write(`${doc}`);
        //     w.print();
        //     w.close();
        //     console.log('hi');
        // }

        function printer(){
            var printContents = document.getElementById('bill').innerHTML
            var originalContents = document.body.innerHTML

            document.body.innerHTML = printContents

            // document.body.style.display = 'flex'
            // document.body.style.justifyContent = 'center'
            // document.body.style.alignItems = 'center'

            window.print()

            document.body.innerHTML = originalContents
            // document.body.style.display = 'block'
        }
    </script>
</body>

</html>