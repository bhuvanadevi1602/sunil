<?php

include('./include/config.php');


$insertId = $_REQUEST['id'];
$counterCount = $_REQUEST['count'];
$meter = $_REQUEST['meter'];
$price = $_REQUEST['price'];
$qualityNo = $_REQUEST['Qno'];

require_once 'dompdf/autoload.inc.php';
define("DOMPDF_ENABLE_REMOTE",true);
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('allow_url_fopen', 1);

use Dompdf\Dompdf;

$documemt 	= new Dompdf(array('enable_remote' => true));
$customPaper = array(0,0,100,50);
$documemt->set_paper($customPaper);
$documemt->set_option('dpi', 203);
// $html='';
$html = '<!DOCTYPE html>
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
  
    
            .strickers-desing {
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
                .col-height{
                        margin-top:2px !important;
                }
            }
        </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row" id="bill">';

// for($i=0;$i<2;$i++)
// {
  for ($i=1; $i <= $counterCount; $i++) { 
    $stickerBillCount = $insertId.$i;
    $sql1 = "INSERT INTO stickerbillcount (stickerBillId,stickerbillCount) VALUES ('$insertId','$stickerBillCount')";
    $result1 = $conn->query($sql1);

  $html.='<div class="col-12  col-height ps-0" id="sticker">
              <div class="card strickers-desing body-hg-css mb-2" >
                  <div class="row des-height">
                      <div class="col-3 widthss" style="display: flex;justify-content: center;align-items: center;transform: rotate(90deg);">
                          <!-- <hr> -->
                          <h1><b style="font-size: 4.1875rem;">'.str_pad($stickerBillCount,4,"0",STR_PAD_LEFT).'</b></h1>
                      </div>
                      <div class="col-9 responsive-width  ps-0">
                          <div class="card-body hthree print-height padding-rems">
                              <div class="row border-top-bottom-left-right" style="margin: -8px;padding: 4px;">
                                  <div class="col-6 text-center mt-2" style="display: flex;justify-content: center;align-items: center;">
                                      <img src="assets/images/raymondLogo.png" alt="..."  class="img-fluid" style="display:none">
                                  </div>
                                  <div class="col-6 text-center mt-2" style="display: flex;justify-content: center;align-items: center;">
                                      <img src="assets/images/raymondBarCode.png" alt="..."  class="img-fluid bg-light-alt">
                                  </div>
                                  <div class="col-3 ps-0"><h3 class="ms-2" style="font-size: 2.1875rem;">S.NO.</h3></div>
                                  <div class="col-8 ps-0"><h3 class="ms-2" style="font-size: 2.1875rem;">'.str_pad($stickerBillCount,4,"0",STR_PAD_LEFT).'</h3><hr style="margin: 0px;border: 1px solid;"></div>
                                  <div class="col-3 ps-0"><h3 class="ms-2" style="font-size: 2.1875rem;">Q.NO.</h3></div>
                                  <div class="col-8 ps-0"><h3 class="ms-2" style="font-size: 2.1875rem;">'.$qualityNo.'</h3><hr style="margin: 0px;border: 1px solid;"></div>
                                  <div class="col-3 ps-0"><h3 class="ms-2" style="font-size: 2.1875rem;">Mtrs.</h3></div>
                                  <div class="col-8 ps-0"><h3 class="ms-2" style="font-size: 2.1875rem;">'.$meter.'</h3><hr style="margin: 0px;border: 1px solid;"></div>
                                  <div class="col-3 ps-0"><h3 class="ms-2" style="font-size: 2.1875rem;">Price.</h3></div>
                                  <div class="col-8 ps-0 "><h2 class="ms-2 mb-2 print-fonts" style="font-size: 2.1875rem;">'.number_format($price,2,".","").'</h2><hr style="margin: 0px;border: 1px solid;"></div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>';
}
$html.='
</div>
</div>
</body>
</html>';

               
              $documemt->loadHtml($html);
              $documemt->set_option('isHtml5ParserEnabled', true);
              $documemt->render();
              $documemt->stream('sticker.pdf',array('Attachment'=>false));
              exit (0);
            //   $documemt->stream("Result.pdf",array("Attachment"=>0));
            //   $documemt->clear();
?>
