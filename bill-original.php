
<!DOCTYPE html>
<html lang="en">

<head>
  
    <meta charset="utf-8" />
            <title>stciker-original</title>
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
            <meta content="" name="author" />
            <meta http-equiv="X-UA-Compatible" content="IE=edge" />
            <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
            <!-- App favicon -->
            <link rel="shortcut icon" href="assets/images/favicon.ico">
<link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Barlow:wght@700&display=swap" rel="stylesheet">
       

     <!-- App css -->
     <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
     <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
     <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" />
     <link href="assets/css/styles.css" rel="stylesheet" type="text/css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=PT+Serif&family=Poppins:ital,wght@1,100&display=swap" rel="stylesheet">
<style>
 .card-designs-bg {
     background: #fff !important;
     padding: 0px 5px 5px 5px;
 } 
 .col-design {
     border: 4px solid black;
 }
 .rotate h1{
     color: #000;
     font-size: 3.1875rem;
 }
 h3{
    color: #000; 
    /*font-size: 1rem;*/
 }
 @media print{
   .pages
   {
    page-break-after:always !important;
  }
  .pages {
      height: 100px !important;
  }
  .p2 {
    padding: 0.2rem 0.5rem 0.5rem 0.7rem!important;
}
     
 }
 .img-fluid {
    max-width: 100%;
    height: auto;
 }
 .bg-light-alt {
    background-color: #fbfbfb!important;
}

@media print {
    .container-fluid{
        zoom: 80% !important;
  
  }
  .card-designs-bg {
     background: none !important;
     padding: 0px 5px 5px 5px;
 } 
 .card-designs-bg:first-child {
    margin-top:0px!important;
}
/*.pages {*/
/*    position: absolute;*/
/*    top: 3px;*/
/*}*/
}

/* @media print {

      margins:none;
    }
} */
.card-designs-bg:first-child {
    margin-top: -3px!important;
}
</style>
<?php 
include('./include/config.php');
$insertId = $_REQUEST['id'];
$counterCount = $_REQUEST['count'];
$meter = $_REQUEST['meter'];
$price = $_REQUEST['price'];
$qualityNo = $_REQUEST['Qno'];
// $counterCount = $_REQUEST['count'];
?>
</head>

<body style="background: #fff !important;">
   <div class="container-fluid ">
      <div class="card-designs-bg">
           <?php 
            for ($i=1; $i <= $counterCount; $i++) { 
                $stickerBillCount = $insertId.$i;
                $sql1 = "INSERT INTO stickerbillcount (stickerBillId,stickerbillCount) VALUES ('$insertId','$stickerBillCount')";
                $result1 = $conn->query($sql1);
                $lastId = $conn->insert_id;
            ?>
      <div class="row pages mt-1">
         <div class="col-3 d-flex justify-content-center align-items-center" style="transform: rotate(90deg);">
             <div class="rotate">
                 <h1 style="font-weight: bolder;font-family: 'Barlow', sans-serif !important;"><?= str_pad($lastId,4,"0",STR_PAD_LEFT) ?></h1>
             </div>
         </div>
         <div class="col-9 no-p-m mt-2">
               <div class="col-design pt-2 p2">
                   <div class="row">
                       <div class="col-6 d-flex justify-content-center align-items-center">
                       </div>
                       <div class="col-6 d-flex justify-content-center align-items-center">
                           <img src="assets/images/barcode.png" class="img-fluid bg-light-alt">
                       </div>
                   </div>
                   <div class="row">
                       <div class="col-3">
                           <h3>S.NO.</h3>
                       </div>
                       <div class="col-9">
                           <h3 style="font-size: 21px;font-family: 'Barlow', sans-serif !important;"><b> <?= str_pad($lastId,4,"0",STR_PAD_LEFT) ?></b></h3>
                           <hr style="margin: 0px;border: 1px solid;">
                       </div>
                       <div class="col-3">
                           <h3>Q.NO.</h3>
                       </div>
                       <div class="col-9">
                           <h3 style="font-size: 21px;font-family: 'Barlow', sans-serif !important;"><b><?= $qualityNo ?></b></h3>
                           <hr style="margin: 0px;border: 1px solid;">
                       </div>
                       <div class="col-3">
                           <h3>Mtrs.</h3>
                       </div>
                       <div class="col-9">
                           <h3 style="font-size: 21px;font-family: 'Barlow', sans-serif !important;"><b><?= $meter ?></b></h3>
                           <hr style="margin: 0px;border: 1px solid;">
                       </div>
                       <div class="col-3">
                           <h3>Price.</h3>
                       </div>
                       <div class="col-9">
                           <h3 style="font-weight: 600;font-size: 28px;font-family: 'Barlow', sans-serif !important;"><?= number_format($price,2,".","") ?></h3>
                           <hr style="margin: 0px;border: 1px solid;">
                       </div>
                   </div>
               </div>
             </div>
      </div>
       <?php } ?>
      </div>
   </div>
    <!-- App js -->
    <script src="assets/js/app.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        window.onload = function() { 
            window.onafterprint = function() { 
                location.replace("https://udhaarsudhaar.org.in/sunil/stickerBill.php");
                // window.close();
            };
            window.print(); 
        }
    </script>     
    
</body>

</html>

