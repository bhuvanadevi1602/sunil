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
        @media print {
           .widthss h1, .responsive-width  h3{
              color: #000000 !important; 
           } 
           .print-height {
               width: 400px !important;
               height: 300px  !important;
           }
           /*.padding-rems {*/
           /*    padding: 2px !important;*/
           /*}*/
           /*.mbp-2 {*/
           /*    margin-bottom: 15px !important;*/
           /*}*/
           .col-height .card {
                margin-bottom: 0px !important;
           }
        }
         @media print {
           .print-fonts {
               font-size: 40px !important;
               color: #000000 !important; 
           }
           .des-height {
               height: 300px !important;
              
           }
        
        }
        

        
  @media print {
     
    
        @media print {
            .strickers-desing {
                margin-bottom: 0px !important;
            }
            .padding-rems {
    position: static;
    padding: 1.6rem 1rem 1rem 0rem !important;
            }
      
            .col-height {
                     position: static;
                     margin-top:1.3px;
                     margin-bottom:-14px;
            }
        }
            /*.print{*/
            /*      page-break-after: always;*/

            /*  }*/
              /*.col-height {*/
              /*    transform: rotate(90deg) !important;*/
              /*}*/
      
/*        @media print {*/

/*    html, body {*/
/*            border: 1px solid white;*/
/*            height: 99%;*/
/*            page-break-after: avoid;*/
/*            page-break-before: avoid;*/
/*        }*/

/*}*/
            /* .strickers-desing {*/
            /*    position: relative !important;*/
                /*top: 540px !important;*/
            /*}*/
            /*.des-height {*/
            /*    position: absolute;*/
            /*    top: 0px;*/
            /*}*/
    </style>
</head>
<body>
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
        <div class="container-fluid">
            <!--<div class="ro" id="btn" style="display: flex;justify-content: space-between;">-->
            <!--    <button type="button" class="btn btn-danger" onclick="window.close();">close</button>-->
            <!--    <button type="button"  class="btn btn-primary" onclick="printDive()">print</button>-->
            <!--</div>-->
            <div class="row" id="bill">
            <?php 
            for ($i=1; $i <= $counterCount; $i++) { 
                $stickerBillCount = $insertId.$i;
                $sql1 = "INSERT INTO stickerbillcount (stickerBillId,stickerbillCount) VALUES ('$insertId','$stickerBillCount')";
                $result1 = $conn->query($sql1);
            ?>
                <div class="col-12 col-height ps-0 print" id="sticker">
                    <div class="card strickers-desing print body-hg-css" >
                        <div class="row des-height">
                            <div class="col-3 widthss p-0" style="display: flex;justify-content: center;align-items: center;transform: rotate(90deg);">
                                <!-- <hr> -->
                                <h1><b style="font-size: 4.1875rem;"><?= str_pad($stickerBillCount,4,"0",STR_PAD_LEFT) ?></b></h1>
                            </div>
                            <div class="col-9 responsive-width ps-0 ">
                                <div class="card-body hthree print-height padding-rems p-0">
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
                                        <div class="col-8 ps-0 mb-1"><h2 class="ms-2 mb-2 print-fonts" style="font-size: 2.1875rem;"><?= number_format($price,2,".","") ?></h2><hr style="margin: 0px;border: 1px solid;"></div>
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
    <!-- </div>
</div> -->
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> -->
<script>
    // function printDive(){
    //     document.getElementById('btn').style.display = 'none';
    //     // $('btn').hide();
    //     window.print();
    //     window.close()
    // }
    // $('btn').show();
    window.print();
</script>
</body>