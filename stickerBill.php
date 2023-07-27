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
       
        .page-wrapper {
             background: url("./assets/images/back.jpg") no-repeat center top;
             background-attachment: fixed;
        }
    </style>
</head>
<!-- <body id="body" onload="window.print()" class="dark-sidebar"> -->
    <!-- Top Bar Start -->
    <!--<?php //  include('./include/topAndSideBar.php') ?>-->
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
                            <!-- <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModalFullscreen"> view & Print</button> -->
                        </div>
                        <!--end page-title-box -->
                    </div>
                    <!--end col-->
                </div>
                <!-- end page title end breadcrumb -->
                <div class="row mt-5" style="display: flex;justify-content: center;align-items: center;">
                    <div class="col-lg-8 col-sm-12 text-center" >
                        <div class="card" >
                            <div class="card-header" style="background: #3e89e5;">
                                <h4 class="card-title text-light">TAG STICKER</h4>
                                <!-- <h4 class="card-title text-light">Sticker Bill</h4> -->
                            </div>
                            <!--end card-header-->
                            <div class="card-body text-center">  
                                <form  method="post" action="<?php echo $_SERVER['PHP_SELF'] ;?>">
                                    <div class="row" style="display: flex;justify-content: center;align-items: center;">
                                        <div class="col-lg-8 col-sm-12 mt-3">
                                            <div class="mb-3 row">
                                                <label for="example-number-input" class="col-sm-4 col-form-label text-end">S.No:</label>
                                                <div class="col-sm-6">
                                                    <?php 
                                                    $sql2 = "SELECT * FROM stickerbillcount ORDER BY stickerbillCountId DESC LIMIT 1";
                                                    $result2 = $conn->query($sql2);
                                                    $row = $result2->fetch_assoc();
                                                    ?>
                                                    <input class="form-control text-center" type="number" value="<?php echo str_pad($row['stickerbillCountId'] + 1,4,"0",STR_PAD_LEFT) ;?>" placeholder="Enter the Q.No" readonly >
                                                </div>
                                            </div>                                 
                                        </div>
                                        <div class="col-lg-8 col-sm-12">
                                            <div class="mb-3 row">
                                                <label for="example-number-input" class="col-sm-4 col-form-label text-end">Q.No:</label>
                                                <div class="col-sm-6">
                                                    <input class="form-control" type="text" name="qualityNo" placeholder="Enter the Q.No" required id="example-number-input">
                                                </div>
                                            </div>                                 
                                        </div>
                                        <div class="col-lg-8 col-sm-12">
                                            <div class="mb-3 row">
                                                <label for="example-number-input" class="col-sm-4 col-form-label text-end">Mtrs:</label>
                                                <div class="col-sm-6">
                                                    <input class="form-control" type="number" id="meter" step="0.01" name="meter" onkeyup="priceCalc()"  placeholder="Enter the Meter" required >
                                                </div>
                                            </div>                                 
                                        </div>
                                        <div class="col-lg-8 col-sm-12">
                                            <div class="mb-3 row">
                                                <label for="example-number-input" class="col-sm-4 col-form-label text-end">Rate/Mts :</label>
                                                <div class="col-sm-6">
                                                    <input class="form-control" type="number" id="meterRate" step="0.01" name="meterRate" onkeyup="priceCalc()" placeholder="Enter the Meter Rate" required >
                                                </div>
                                            </div>                                 
                                        </div>
                                        <div class="col-lg-8 col-sm-12">
                                            <div class="mb-3 row">
                                                <label for="example-number-input" class="col-sm-4 col-form-label text-end">Total Rate:</label>
                                                <div class="col-sm-6">
                                                    <input class="form-control" type="number" id="price" name="price" value="" readonly >
                                                </div>
                                            </div>                                 
                                        </div>
                                        <div class="col-lg-8 col-sm-12">
                                            <div class="mb-3 row">
                                                <label for="example-number-input" class="col-sm-4 col-form-label text-end">Round off Amount:</label>
                                                <div class="col-sm-6">
                                                    <input class="form-control" type="number" id="roundAmount" name="roundAmount" value="" readonly >
                                                </div>
                                            </div>                                 
                                        </div>
                                        <div class="col-lg-8 col-sm-12">
                                            <div class="mb-3 row">
                                                <label for="example-number-input" class="col-sm-4 col-form-label text-end">No of Printing:</label>
                                                <div class="col-sm-6">
                                                    <input class="form-control" type="number" name="counterCount" placeholder="Enter the Meter Rate" required id="example-number-input">
                                                </div>
                                            </div>                                 
                                        </div>
                                        <div class="col-lg-12 col-sm-12 mb-3" style="display:flex; justify-content:space-around;">
                                            <input class="btn btn-danger" type="reset" value="Clear">
                                            <input class="btn btn-success" id="billSubmit" type="submit" name="submit" value="Print">
                                            <!--<button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModalFullscreen">-->
                                            <!--    view-->
                                            <!--</button>-->
                                        <!-- <input class="btn btn-primary" type="button"   value="print" onclick="printer();"> -->
                                        </div>
                                    </div>                                                                      
                                </form>
                            </div>
                        </div>
                    <iframe id="ifmcontentstoprint" style="height: 0px; width: 0px; position: absolute"></iframe>
                </div>
            </div>
            <?php include('./footer.php') ?> 
           <!-- end Footer -->                
           <!--end footer-->
        </div>
        <!-- end page content -->
    </div>
    <!-- end page-wrapper -->

    <!-- Javascript  -->
    <!--<script src="assets/plugins/datatables/simple-datatables.js"></script>-->
    <!--<script src="assets/pages/datatable.init.js"></script>-->
    <!-- App js -->
    <!--<script src="assets/js/app.js"></script>-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        // $('#billSubmit').click(function (event){
        //     // event.preventDefault();
        //     // alert("button clicked");
        //     // printDiv('bill');
        //     // window.print()
        //     location.reload()
        //     window.open();
        //     // printer()
        //     return true;
        // });
        
        // window.onbeforeunload = null;
        function priceCalc(){
            let meter = document.getElementById('meter').value;
            let meterRate = document.getElementById('meterRate').value;
            // console.log(meter*meterRate);
            let price = parseFloat(meter)*parseFloat(meterRate);
            document.getElementById('price').value = price
            document.getElementById('roundAmount').value = price.toFixed()+".00";
        }

        // $("#billSubmit").click(function(){
        //     printDiv("bill");
        // });

        // function printDiv(divName) {
        //     // var printContents = document.getElementById(divName).innerHTML;
        //     // var originalContents = document.body.innerHTML;
        //     // w = window.open("printScreen.php", "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=50,left=50,width=900,height=400");
        //     var content = document.getElementById(divName);
        //     var pri = document.getElementById("ifmcontentstoprint").contentWindow;
        //     pri.document.open();
        //     pri.document.write(content.innerHTML);
        //     pri.document.close();
        //     pri.focus();
        //     pri.print();
        // }
        // function printer(){
        //     var printContents = document.getElementById('bill').innerHTML
        //     var originalContents = document.body.innerHTML

        //     document.body.innerHTML = printContents

        //     // document.body.style.display = 'flex'
        //     // document.body.style.justifyContent = 'center'
        //     // document.body.style.alignItems = 'center'

        //     window.print()

        //     document.body.innerHTML = originalContents
        //     // document.body.style.display = 'block'
        // }
    </script>
    <?php 

    if(isset($_POST['submit'])){
        $qualityNo = $_POST['qualityNo'];
        $meter = $_POST['meter'];
        $meterRate = $_POST['meterRate'];
        $counterCount = $_POST['counterCount'];
        $price = $_POST['price'];
        $roundAmount = $_POST['roundAmount'];

        $sql = "INSERT INTO stickerbill (qualityNo,meter,meterRate,counterCount,price,roundAmount) VALUES ('$qualityNo','$meter','$meterRate','$counterCount','$price','$roundAmount')";
        if($result = $conn->query($sql)){
            $insertId = $conn->insert_id;
    ?>
            <script>
                // window.open("displayLandscap.php?id=<?= $insertId ?>&count=<?= $counterCount ?>&Qno=<?= $qualityNo ?>&meter=<?= $meter ?>&rate=<?= $meterRate ?>&price=<?= $roundAmount ?>");   
                // window.open("display4.php?id=<?= $insertId ?>&count=<?= $counterCount ?>&Qno=<?= $qualityNo ?>&meter=<?= $meter ?>&rate=<?= $meterRate ?>&price=<?= $roundAmount ?>");   
                // window.open("display1.php?id=<?= $insertId ?>&count=<?= $counterCount ?>&Qno=<?= $qualityNo ?>&meter=<?= $meter ?>&rate=<?= $meterRate ?>&price=<?= $roundAmount ?>");   
                // window.open("bill-original.php?id=<?= $insertId ?>&count=<?= $counterCount ?>&Qno=<?= $qualityNo ?>&meter=<?= $meter ?>&rate=<?= $meterRate ?>&price=<?= $roundAmount ?>");   
                location.replace("bill-original.php?id=<?= $insertId ?>&count=<?= $counterCount ?>&Qno=<?= $qualityNo ?>&meter=<?= $meter ?>&rate=<?= $meterRate ?>&price=<?= $roundAmount ?>");
                // location.reload();
            </script>
    <?php    
        }
    }
    ?>
</body>

</html>