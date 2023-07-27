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
    <link href="assets/css/styles.css" rel="stylesheet" type="text/css" />
    <!--<link href="assets/fonts/DXOldStandardGroteskNo2.ttf" rel="stylesheet" type="text/css" />-->
    <style type = "text/css">
    
    body {
  background: rgb(204,204,204); 
}
/*  @page {*/
/*        width: 75mm;*/
/*        height: 24mm;*/
/*        padding: 1mm;*/
/*    margin: 0px 0px 0px 0px;*/
/*      display:block;*/
/*        page-break-after:always;*/
/*    }*/
    
/*page[size="A4"] {  */
/*  width: 21cm;*/
/*  height: 29.7cm;*/
  
/*}*/
    
   .location {
    padding-top: 29px;
    font-weight: bold;
    font-family: Arial, Helvetica, sans-serif;
    /* height: 100%; */
    /* vertical-align: middle; */
    float: right;
    display: inline;
    font-size: 125%;
    position: absolute;
    top: -9.5mm;
    /* bottom: 66mm; */
    left: 0mm;
    white-space: nowrap;
     /*overflow: hidden; */
     /*text-overflow: ellipsis;*/
 
 }

    .qr {
        margin: 2px;
        width: 22mm;
        height: 22mm;
    }    
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
        .strickers-desing {
               /*height: 291px !important;*/
               display: flex !important;
               flex-direction: column-reverse !important;
           }
           
         
        @media print {
           .widthss h1, .responsive-width  h3{
              color: #000000 !important; 
           } 
         
        }
        
         @media print {
           .print-fonts {
               font-size: 40px !important;
               color: #000000 !important; 
           }
           .strickers-desing {
               height: 291px !important;
               display: flex !important;
               flex-direction: column-reverse !important;
           }
        }
        
           @media print {
           /*.col-height{
                margin-top:2px !important;

        
           }*/
           /*.print-height {*/
           /*    height: 100px !important;*/
           /*}*/
}
@media print {
    .col-height {
        page-break-after:always !important;
    }
}
    </style>
</head>
<page size="A4">

<?php 
include('./include/config.php');
$insertId = $_REQUEST['id'];
$counterCount = $_REQUEST['count'];
$meter = $_REQUEST['meter'];
$price = $_REQUEST['price'];
$qualityNo = $_REQUEST['Qno'];
// $counterCount = $_REQUEST['count'];
?>
<!-- <div class="page-wrapper">
    <div class="page-content-tab"> -->
        <div class="container-fluid ">
            <div class="location">
            <div class="row" id="bill">
            <?php 
            for ($i=1; $i <= $counterCount; $i++) { 
                $stickerBillCount = $insertId.$i;
                $sql1 = "INSERT INTO stickerbillcount (stickerBillId,stickerbillCount) VALUES ('$insertId','$stickerBillCount')";
                $result1 = $conn->query($sql1);
            ?>
                <div class="col-12  col-height  ps-0" id="sticker">
                    <div class="card strickers-desing body-hg-css " style="margin-bottom: -0.3rem!important;">
                        <div class="row des-height">
                            <div class="col-3 widthss" style="display: flex;justify-content: center;align-items: center;transform: rotate(90deg);">
                                <!-- <hr> -->
                                <h1><b style="font-size: 4.1875rem;"><?= str_pad($stickerBillCount,4,"0",STR_PAD_LEFT) ?></b></h1>
                            </div>
                          
                            <div class="col-9 responsive-width ps-0">
                                <div class="card-body hthree print-height padding-rems">
                                    <div class="row border-top-bottom-left-right" style="margin: -8px;padding: 4px;">
                                        <div class="col-6 text-center mt-2" style="display: flex;justify-content: center;align-items: center;">
                                            <img src="assets/images/raymondLogo.png" alt="..."  class="img-fluid" style="display:none">
                                        </div>
                                        <div class="col-6 text-center mt-2" style="display: flex;justify-content: center;align-items: center;">
                                            <img src="assets/images/barcode.png" alt="..."  class="img-fluid bg-light-alt">
                                        </div>
                                        <div class="col-3 ps-0"><h3 class="ms-2" style="font-size: 2.1875rem;">S.NO.</h3></div>
                                        <div class="col-8 ps-0"><h3 class="ms-2" style="font-size: 2.1875rem;"><?= $stickerBillCount ?></h3><hr style="margin: 0px;border: 1px solid;"></div>
                                        <div class="col-3 ps-0"><h3 class="ms-2" style="font-size: 2.1875rem;">Q.NO.</h3></div>
                                        <div class="col-8 ps-0"><h3 class="ms-2" style="font-size: 2.1875rem;"><?= $qualityNo ?></h3><hr style="margin: 0px;border: 1px solid;"></div>
                                        <div class="col-3 ps-0"><h3 class="ms-2" style="font-size: 2.1875rem;">Mtrs.</h3></div>
                                        <div class="col-8 ps-0"><h3 class="ms-2" style="font-size: 2.1875rem;"><?= $meter ?></h3><hr style="margin: 0px;border: 1px solid;"></div>
                                        <div class="col-3 ps-0"><h3 class="ms-2" style="font-size: 2.1875rem;">Price.</h3></div>
                                        <div class="col-8 ps-0 "><h2 class="ms-2 mb-2 print-fonts" style="font-size: 2.1875rem;"><?= number_format($price,2,".","") ?></h2><hr style="margin: 0px;border: 1px solid;"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php }
            // header("location: stickerBill.php");
             ?>                                                          
            </div>
            </div>
        </div>
    <!-- </div>
</div> -->
</page>
<script>
    let display = window.print();
    if(display){

        window.close();
    }
</script>