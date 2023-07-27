<?php
include('./include/config.php');
$date = date('Y-m-d');
$id = $_REQUEST['id'];
$year= $_REQUEST['year'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Debit Note Bill</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">
    <!-- App css -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/styles.css" rel="stylesheet" type="text/css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lobster+Two:wght@400;700&display=swap" rel="stylesheet">

    <style>
    .table-design th {
        padding: 4px;
        border: 0px !important; 
        border-style: none solid solid none;
    }
    
    /*@media only screen and (max-width: 1500px) {*/
    /*.king{*/
    /*    display:none;*/
    /*}*/
    /*}*/
    .table-data td {
        font-size:13px;
        border-style: none;
    }
/*      .demo{*/
/*            border: 1px solid;*/
/*    transform: rotate(90deg);*/
/*    display: -webkit-inline-box;*/
/*   min-width: 436px;*/
/*    position: absolute;*/
/*   top: 515px;*/
/*    left: -133px;*/
/*    }*/
    
/* .demo1{*/
/*      border: 1px solid;*/
/*    transform: rotate(90deg);*/
/*    display: -webkit-inline-box;*/
/*       min-width: 433px;*/
/*    position: absolute;*/
/*    top: 515px;*/
/*    left: 138px;*/
/*}*/
/*     .demo2{*/
/*            border: 1px solid;*/
/*    transform: rotate(90deg);*/
/*    display: -webkit-inline-box;*/
/*   min-width: 435px;*/
/*    position: absolute;*/
/*    top: 514px;*/
/*    left: 231px*/
/*    }*/
/*     .demo3{*/
/*            border: 1px solid;*/
/*    transform: rotate(90deg);*/
/*    display: -webkit-inline-box;*/
/*      min-width: 435px;*/
/*    position: absolute;*/
/*    top: 515px;*/
/*    left: 296px;*/
/*    }*/
/*     .demo4{*/
/*            border: 1px solid;*/
/*    transform: rotate(90deg);*/
/*    display: -webkit-inline-box;*/
/*       min-width: 434px;*/
/*    position: absolute;*/
/*    top: 515px;*/
/*    left: 363px;*/
/*    }*/
/*     .demo5{*/
/*            border: 1px solid;*/
/*    transform: rotate(90deg);*/
/*    display: -webkit-inline-box;*/
/*        min-width: 436px;*/
/*    position: absolute;*/
/*    top: 514px;*/
/*    left: 423px;*/
/*    }*/
    
/*     .demo6{*/
/*            border: 1px solid;*/
/*    transform: rotate(90deg);*/
/*    display: -webkit-inline-box;*/
/*        min-width: 436px;*/
/*    position: absolute;*/
/*    top: 514px;*/
/*    left: 468px;*/
/*    }*/
    
/*     .demo7{*/
/*          border: 0.5px solid;*/
/*    transform: rotate(0deg);*/
/*    display: -webkit-inline-box;*/
/*min-width: 89%;*/
/*    position: absolute;*/
/*    top: 325px;*/
/*    }*/
    
    p{
    line-height: 1.2 !important;
    }
    
    
        .gst2:after {
            width: 220px !important;
        }

        .gst3:after {
            width: 200px !important;
            top: 20px !important;
        }

        .card {
            /* border: 1px solid; */
            border-radius: 1px;
        }

  .card1 {
     
     
       border-bottom: 3px solid black; 
             border-top: 3px solid black; 
            border-radius: 1px;
          min-height: 403px;
        }

        @page {
            margin: 0;
        }

        @media print {
            footer {
                display: none;
                position: fixed;
                bottom: 0;
            }
            .formss{
                padding:30px 42px 23px 42px !important;
            }
            .section{
                page-break-after: always;
            }

            header {
                display: none;
                position: fixed;
                top: 0;
            }
            
        }

        .fontsss{
            font-family: 'Lobster Two', cursive !important;
            font-weight: 900;
            font-size: 45px;
        }
        p {
            margin-top: 0;
            margin-bottom: 1px;
        }

        .ss {
            margin-right: 3px;
            font-family: serif;
            font-size: 29px;
            font-weight: 900;
        }

        /* .h6 ,b,{
               color: #000444 !important;
            } */
        h6 {
            color: #000444 !important;
        }

        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
            /*border: 1px solid #000444 ;*/
            /*text-align: center;*/
            /*padding: 8px;*/
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }

        table1 {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        /* td, th {*/
        /*  border: 1px solid #000444 ;*/
        /*  text-align: center;*/
        /*  padding: 8px;*/
        /*}*/

        tr:nth-child(even) {
            background-color: #dddddd;
        }

        @media only screen and (max-width: 991px) {
            .ll {
                flex-direction: column;
            }

            .tt {
                flex-direction: column-reverse;
            }

            .span-tags1:after {
                width: 100px;
            }

            .gst:after {
                width: 238px !important;
            }
        }
        .min-heights {
            min-height: 100px!important;
        }
        .min-position {
            position: relative;
        }
        .min-height-table{
            padding-top: 0px !important;
            position: absolute;
            top: 0px;
            right: 0px;
            min-height: 400px;
            border:1px solid black;
        }
        .min-position1 {
            position: relative;
        }
        .min-height-table11{
            padding-top: 0px !important;
            position: absolute;
            top: 0px;
            right: 0px;
            min-height: 400px;
            border:0.1px solid;
        }
        .border-bottomss {
            border-bottom: 2px solid black!important;
        }
        .min-height-table-left{
            padding-top: 0px !important;
            position: absolute;
            top: 0px;
            left: 0px;
            min-height: 400px;
            border:1px solid black;
        }
        .position-right-no {
            position: relative;
            right: 12px;
        }
        .tr-width {
            width: 130px;
        }
        .mts-width {
            width: 50px;
        }
        .m-l-20 {
            margin-left: 30px !important;
        }
        /*.tdtd-position {*/
        /*    position: relative;*/
        /*}*/
        /*.tdtdtd-position {*/
        /*    position: absolute;*/
        /*    left: 150px;*/
        /*}*/
        
    </style>
</head>

<!-- <style>
    @import url(https://fonts.googleapis.com/css?family=Open+Sans:400,700);

    body {
        margin: 0;
        padding: 0;
        background: #e1e1e1;
    }

    div,
    p,
    a,
    li,
    td {
        -webkit-text-size-adjust: none;
    }

    .ReadMsgBody {
        width: 100%;
        background-color: #ffffff;
    }

    .ExternalClass {
        width: 100%;
        background-color: #ffffff;
    }

    body {
        width: 100%;
        height: 100%;
        background-color: #e1e1e1;
        margin: 0;
        padding: 0;
        -webkit-font-smoothing: antialiased;
    }

    html {
        width: 100%;
    }

    p {
        padding: 0 !important;
        margin-top: 0 !important;
        margin-right: 0 !important;
        margin-bottom: 0 !important;
        margin-left: 0 !important;
    }

    .visibleMobile {
        display: none;
    }

    .hiddenMobile {
        display: block;
    }

    @media only screen and (max-width: 600px) {
        body {
            width: auto !important;
        }

        table[class=fullTable] {
            width: 96% !important;
            clear: both;
        }

        table[class=fullPadding] {
            width: 85% !important;
            clear: both;
        }

        table[class=col] {
            width: 45% !important;
        }

        .erase {
            display: none;
        }
    }

    @media only screen and (max-width: 420px) {
        table[class=fullTable] {
            width: 100% !important;
            clear: both;
        }

        table[class=fullPadding] {
            width: 85% !important;
            clear: both;
        }

        table[class=col] {
            width: 100% !important;
            clear: both;
        }

        table[class=col] td {
            text-align: left !important;
        }

        .erase {
            display: none;
            font-size: 0;
            max-height: 0;
            line-height: 0;
            padding: 0;
        }

        .visibleMobile {
            display: block !important;
        }

        .hiddenMobile {
            display: none !important;
        }

        /*}*/
        table {
            border: 1px;
            border-style: none none dashed none;
            border-collapse: collapse;
        }

        .tablesss-dashed {
            border: 1px;
            border-style: dashed none dashed none;
        }

        .ttbs-dashed {
            border: 0.1px;
            border-style: none dashed none none;
        }

        /* .right-dashed {
      /*border: 1px;*/
        /*border-right:1px solid dashed !important; */
    }

    */

    /*.right-border {*/
    /*  border-style: dashed dashed none none;*/
    /*}*/
    .slh {
        align-items: baseline;
    }

    .rows-height {
        height: 88px !important;
    }
</style> -->

<?php 
    $sql = "SELECT * FROM debit_note WHERE debit_note_bill_id = '$id' and financialYear like '%$year%'";
    $result = $conn->query($sql);
    $debitNoteTable = $result->fetch_assoc();
?>

<body id="body" class="auth-page" style="background-image: url('assets/images/p-1.png'); background-size: cover; background-position: center center;" onload="myfunction()">
    <div class="section">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div class="formss card mb-0" id="print_content">
                    <div class="sk" style="border:3px solid black; padding: 0px 3px 0px 3px;">
                        <div class="d-flex justify-content-between pt-1" style="margin-right: 5px;">
                            <!-- <div class="row"> -->
                                <div class="col-sm-3" style=" margin-left: 5px; white-space: nowrap;">
                                    <p class="ml-2"><b>GST NO - 33AAAFS1530K1ZJ</b></P>
                                </div>
                                <div class="d-flex col-sm-6 justify-content-center">
                                    <div class="">
                                          <img src="assets/images/sunil.png" class="mx-auto d-block" width="230" height="30" >
                                        <!--<h2 class="text-center fontsss mt-1 mb-0">Sunil Traders</h2>-->
                                        <p class="text-center pr-3"><img src="assets/images/webserve-logo.png"  height="30" alt="logo" border="0" ><span class="ms-1 mt-3" style="font-size:18px;"><b  class="mt-1">SUITINGS</b></span></p>
                                        <p class=" p-0 m-0 text-center" style="font-size: 13px;white-space: nowrap;font-weight: 500;">66 (New No.76), GODOWN STREET, 1st FLOOR, CHENNAI-600001 </p>
                                    </div>
                                </div>
                                <div class="col-sm-3" style="text-align: end;margin-right: 5px; padding-right: 5px;">
                                    <P><span class="position-right-no">Ph no: 98408 13508</span><br><span class="position-right-no">7010872281</span><br><span class="">044-2538 0927</span></P>
                                    <div style="    float: right;">
                                    <div class="d-flex   mb-0">
                                        <p><b>DEBIT NO:</b></p>
                                        <p class="bordersss text-center" style="margin-left:5px; min-width: 74px;"><b class="text-center"><?= $debitNoteTable['debit_note_bill_id'] ?></b></p>
                                    </div>
                                    <div class="d-flex mt-1 mb-1" style="margin-left: 28px;">
                                        <p><b>DATE:</b></p>
                                        <p class="bordersss" style="margin-left:5px;"><b class="text-center col-2"><?= date('d-m-Y',strtotime($debitNoteTable['createdAt'])) ?></b></p>
                                    </div>
                                    </div>
                                </div>
                            <!-- </div> -->
                        </div>
                        
                        
                        <div class="containers 11">
                            <div class="col-lg-12 p-0">
                                <p class="text-center top-bottom-border"><b style="font-size: 20px;">DEBITNOTE</b></p>
                            </div>
                        </div>
                        
                        
                        <div class="containers">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="d-flex ">
                                        <div class="right-border" style="width: -webkit-fill-available;">
                                            <div class="d-flex mt-1">
                                                <h6 class="m-1 span-size col-3" style="white-space: nowrap;"><b>Customer Name:</b></h6>
                                                <p class="bordersss col-8 text-left mb-0 pb-0 ps-2">
                                                    <!--<b>-->
                                                    <?= $debitNoteTable['supplierName'] ?>
                                                    <!--</b>-->
                                                </p><!--<h6 class="m-1 span-size span-tags me-3"><?= $debitNoteTable['supplierName'] ?></h6>-->
                                            </div>
                                            <div class="d-flex mt-1">
                                                <h6 class="m-1 span-size col-3"><b>Address:</b></h6>
                                                <p class="bordersss col-8 text-left ps-2">
                                                    <!--<b>-->
                                                    <?= $debitNoteTable['address'] ?>
                                                    <!--</b>-->
                                                </p><!--<h6 class="m-1 span-size span-tags me-3"><?= $debitNoteTable['supplierName'] ?></h6>-->
                                            </div>
                                            <div class="d-flex mt-1">
                                                <h6 class="m-1 span-size col-3"><b>City:</b></h6>
                                                <p class="bordersss col-8 text-left ps-2">
                                                    <!--<b>-->
                                                    <?= $debitNoteTable['city'] ?>
                                                    <!--</b>-->
                                                </p><!--<h6 class="m-1 span-size span-tags me-3"><?= $debitNoteTable['supplierName'] ?></h6>-->
                                            </div>
                                            <div class="d-flex mt-1">
                                                <h6 class="m-1 span-size col-3"><b>Phone No:</b></h6>
                                                <p class="bordersss col-8 text-left ps-2">
                                                    <!--<b>-->
                                                    <?= $debitNoteTable['phoneNo'] ?>
                                                    <!--</b>-->
                                                </p>
                                            </div>
                                         
                                        </div>

                                        <div class="" style="width:-webkit-fill-available;">
                                            <div class="d-flex justify-content-between mt-1">
                                                        <h6 class="m-1 span-size "><b>APP NO:</b></h6>
                                                        <p class="bordersss col-4 text-center">
                                                            <!--<b>-->
                                                            <?= $debitNoteTable['appNo'] ?>
                                                            <!--</b>-->
                                                        </p>
                                                        
                                                    <!-- </div> -->
                                                    <!-- <div class="col-6"> -->
                                        
                                                          <h6 class="m-1 span-size"><b>Date:</b></h6>
                                                          <span class="bordersss col-4 text-center">
                                                            <!--<b>-->
                                                            <?= ($debitNoteTable['aDate']=="0000-00-00") ? "" : $debitNoteTable['aDate'] ?>
                                                            <!--</b>-->
                                                        </span>
                                                    <!-- </div> -->
                                                <!-- </div> -->
                                            </div>

                                           
                                            <div class="d-flex mt-1">
                                                <h6 class="m-1 span-size" style="padding-right:4px;white-space: nowrap;"><b>GST NO:</b></h6>
                                                <p class="bordersss col-10 text-center">
                                                    <!--<b>-->
                                                    <?= $debitNoteTable['GSTNO'] ?>
                                                    <!--</b>-->
                                                </p>
                                            </div>
                                            <div class="d-flex mt-1">
                                                <h6 class="m-1 span-size " style="padding-right:14px;"><b>Terms:</b></h6>
                                                <p class="bordersss col-10 text-center">
                                                    <!--<b>-->
                                                    <?= $debitNoteTable['terms'] ?>
                                                    <!--</b>-->
                                                </p>
                                            </div>
                                            <div class="d-flex justify-content-between mt-1">
                                            
                                                        <h6 class="m-1 span-size "><b>L/R:</b></h6>
                                                        <p class="bordersss col-4 text-center" style="margin-left:18px">
                                                            <!--<b>-->
                                                            <?= $debitNoteTable['LR'] ?>
                                                            <!--</b>-->
                                                        </p>
                                                 
                                                        <h6 class="m-1 span-size "><b>Date:</b></h6>
                                                        <p class="bordersss col-4 text-center">
                                                            <!--<b>-->
                                                            <?= ($debitNoteTable['lrDate']=="0000-00-00") ? "" : $debitNoteTable['lrDate'] ?>
                                                            <!--</b>-->
                                                        </p>
                                                    <!-- </div> -->
                                                <!-- </div> -->
                                            </div>
                                            <div class="d-flex mt-1">
                                                <h6 class="m-1 span-size" style="padding-right:0px;"><b>Through:</b></h6>
                                                <p class="bordersss col-10 text-center">
                                                    <!--<b>-->
                                                    <?= $debitNoteTable['through'] ?>
                                                    <!--</b>-->
                                                </p>
                                            </div>

                                            <!-- <div class="d-flex  mt-3">
                                                <h6 class="m-1 span-size" style="flex:none;">GST NO:</h6>
                                                <span class="span-tags gst" style="padding-left: 2px;"></span>
                                            </div>

                                            <div class="d-flex   mt-3">
                                                <h6 class="m-1 span-size">Terms:</h6>
                                                <span class="span-tags gst" style=" padding-left: 11px;"></span>
                                            </div>
                                            <div class="d-flex  mt-3">
                                                <div class="d-flex">
                                                    <div class="d-flex justify-content-between">
                                                        <h6 class="m-1 span-size">L/R:</h6>
                                                        <span class="span-tags1" style="padding-left: 25px;"></span>
                                                    </div>
                                                    <div class="d-flex justify-content-between">
                                                        <h6 class="m-1 span-size">Date:</h6>
                                                        <span class="span-tags1"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-flex mt-3 mb-3">
                                                <h6 class="m-1 span-size ">Through:</h6>
                                                <span class="span-tags gst mb-4"></span>
                                            </div> -->
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="col-12 d-flex justify-content-between">
                                    <!-- <div class="row d-flex"> -->
                                        <div class="col-6 d-flex mt-1 mb-1" style="border-top: 1px solid;margin-left: -3px;">
                                            <h6 class="m-1 span-size col-sm-4" style="white-space: nowrap;">DEBITED BILL NO:</h6>
                                            <p class="bordersss col-sm-4 text-center mt-1">
                                                <b>
                                                <?= $debitNoteTable['billNo'] ?>
                                                </b>
                                            </p>
                                        </div>
                                        <span class="line"></span>
                                        <div class="col-6 d-flex mt-1 mb-1" style="border-top: 1px solid;margin-left: -2px;">
                                            <h6 class="m-1 span-size col-sm-4" style="white-space: nowrap;">DEBITED BILL DATE:</h6>
                                            <p class="bordersss col-sm-4 text-center mt-1">
                                                <b>
                                                <?= $debitNoteTable['debitBillDate'] ?>
                                                </b>
                                            </p>
                                        </div>
                                    <!-- </div> -->
                                    <!-- <div class="d-flex  mt-3 pt-1" style="border:1px solid black;">
                                        <h6 class="m-1 span-size" style="flex:none;">RD BILL NO:</h6>
                                        <span class="span-tags gst2 mb-1 pb-4 pt-2" style="padding-left:21px;padding-bottom: 1.7rem!important;"></span>
                                    </div>
                                    <div class="d-flex  mt-4 pt-2" style="border:1px solid black;">
                                        <h6 class="m-1 span-size" style="flex:none;">DEBITED BILL DATE NO:</h6>
                                        <span class="span-tags gst3 pb-4 pt-2" style="padding-bottom: 1.7rem!important;"></span>
                                    </div> -->
                                </div>
                            </div>
                        </div>

                        <!--   <div class="text-start border-width mt-1 p-0">-->
                        <!--    <div class="d-flex mt-1 align-items-baseline">-->
                        <!--        <h6 class="m-1">Customer Name:</h6>-->
                        <!--        <span class="text-left" style="margin-left: 23px;"><b style="margin-left: 5px;"></b></span>-->
                        <!--    </div>  -->
                        <!-- <div class="d-flex align-items-baseline">-->
                        <!--    <h6 class="m-1">GST NO:</h6>-->
                        <!--    <span class="text-left" style="margin-left: 11px;"><b style="margin-left: 5px;"></b></span>-->
                        <!--</div> -->
                        <!--      <div class="d-flex align-items-baseline">-->
                        <!--        <h6 class="m-1">Address:</h6>-->
                        <!--        <span class="text-left"><b style="margin-left: 5px;"></b></span>-->
                        <!--    </div> -->
                        <!--      <div class="d-flex align-items-baseline">-->
                        <!--        <h6 class="m-1">City</h6>-->
                        <!--        <span class="text-left" style="margin-left: 30px;"><b style="margin-left: 5px;"></b></span>-->
                        <!--    </div> -->
                        <!--      <div class="d-flex align-items-baseline">-->
                        <!--        <h6 class="m-1 mb-3">Phone no:</h6>-->
                        <!--        <span class="text-left" style="margin-left: 14px;"><b style="margin-left: 5px;"></b></span>-->
                        <!--    </div> -->
                        <!--</div>-->
<div class="card1">
                        <div class=" table_responsive">
                            <table class="table-design">
                                
                                <thead>
                                    <tr class="border-bottomss">
                                        <th class="text-center min-position"><span class="min-height-table"></span><span class="min-height-table-left"></span><span>SNO</span></th>
                                        
                                        <th class="table-width text-center min-position1"><span class="min-height-table11"></span>PARTICULARS</th>
                                       
                                        <th class="text-center min-position1" style="white-space: nowrap;"><span class="min-height-table11"></span>INVOICE NO</th>
                                        <th class="text-center min-position" style="white-space: nowrap;"><span class="min-height-table"></span>HSN NO</th>
                                        <th class="text-center min-position mts-width"><span class="min-height-table"></span>MTS</th>
                                        <th class="text-center min-position"><span class="min-height-table"></span>PCS</th>
                                        <th class="text-center min-position tr-width"><span class="min-height-table"></span>RATE</th>
                                        <th class="text-center min-position tr-width"><span class="min-height-table"></span>AMOUNT</th>
                                    </tr>
                                </thead>    
                                <div class="" >
                                    <?php 
                                        $sql1 = "SELECT * FROM debit_note_product WHERE debit_note_id = '$id' and financialYear like '%$year%'";
                                        $result1 = $conn->query($sql1);
                                        $i=1;
                                        $totalPrice = 0;
                                        while($productTable = $result1->fetch_assoc()){
                                            $totalPrice += $productTable['pieces'];
                                        ?>
                                        <tr class="table-data">
                                            <td class="text-center left-height-ree"><span class="left-heights-res"></span><?= $i++; ?></td>
                                            
                                            <td class=""><span class="d-flex justify-content-between"><b style='width: 30%;'><?=$productTable['particulars'] ."</b><span style='width: 0%;'>-</span><span class=' tdtdtd-position' style='width: 53%;'>". $productTable['meter'] ?></span></span></td>
                                            <td class="text-center" ><?=$productTable['invoiceNumber'] ?></td>
                                            <td class="text-center" ><?=$productTable['HSNNo'] ?></td>
                                            <td class="text-center"><?= number_format($productTable['totalMeter'],2) ?></td>
                                            <td class="text-center"><?=$productTable['pieces'] ?></td>
                                            <td class="text-center"><?= number_format($productTable['rate'],2) ?></td>
                                            <td class="text-center left-height"><span class="left-heights-rese"></span><?= number_format($productTable['amount'],2) ?></td>
                                            <!-- <td class="text-center">Demo</td>
                                            <td class="text-center">55</td>
                                            <td class="text-center">25486</td>
                                            <td class="text-center">55</td>
                                            <td class="text-center">3698</td>
                                            <td class="text-center">55000</td> -->
                                    </tr>
                             
                              </div>        
                                <?php   
                                    }
                                ?>
                            </table>
                        </div>
                        <div class="king">
                               <div class="demo7"></div>
                          <div class="demo"></div>
<div class="demo1"></div>
<div class="demo2"></div>
<div class="demo3"></div>
<div class="demo4"></div>
<div class="demo5"></div>
<div class="demo6"></div>
      </div>                            
                        <!--        <th>Particulars</th>-->
</div>
                        <div class="">
                            <div class="d-flex justify-content-between tt">
                                <div class="detailsss mt-1" style=" margin-left: 5px;">
                                    <!--        <div class="mt-3">-->
                                    <!--<table1>-->
                                    <!--   <tr>-->
                                    <!--     <th>Company</th>-->
                                    <!--<th>Contact</th>-->
                                    <!--<th>Country</th>-->
                                    <!--   </tr>-->
                                    <!--   <tr>-->
                                    <!--     <td>Alfreds Futterkiste</td>-->
                                    <!--     <td>Maria Anders</td>-->
                                    <!--<td>Germany</td>-->
                                    <!--   </tr>-->
                                    <!--   </table1>-->
                                    <!--   </div>-->
                                    <h6 class="bank-details mb-0 text-center" style="width:399px;">BANK DETAILS</h6>
                                    <div class="d-flex bank-detailss" style="width:359px;">
                                    <div class="rrbb" style="width:200px;">
                                       <p style="white-space:nowrap;"><b>Bank:</b>Central Bank of India</p>
                                       <p>Sowcarpet Branch,chennai</p>
                                       <p><b>Acc no: </b> 3052997228</p>
                                       <p><b>IFSC Code: </b> CBIN0280882</p>
                                    </div>  
                                    <div class="llbb" style="width:266px;">
                                       <p><b>Bank:</b>The Karur Vysya Bank Limited</p>
                                       <!--<p>NO 37,Old No 13,Godown Street,</p>-->
                                       <!--<p>Tamil Nadu-600001</p>-->
                                       <p style="white-space: nowrap;"><b>Acc No: </b> 1755135000017776</p>
                                       <p style="white-space: nowrap;"><b>IFSC Code: </b> KVBL0001755</p>
                                    </div>   
                                 </div>
                                    <div class="borrdesss pb-1" style="">
                                        <h6 class="ps-1"><b>NOTED:</b></h6>
                                        <p class="ps-5">1.Goods once sold will not be taken back or exchanged</p>
                                        <p class="ps-5">2.All disputes are Subject to Chennai Jurisdiction only.</p>
                                    </div>
                                     <div class="d-flex justify-content-between">
                                      <h6 ><b>Net Amount : NO LESS</b></h6>
                                      <!--<span class="line" style="height: 66px;"></span>-->
                                      <h6 >TOTAL PIECES : <b><?= $totalPrice ?></b></h6>
                                    </div>
                                </div>
                                <div class="">
                                    <div class="fontsize">
                                        <div class="d-flex justify-content-between">
                                            <h6 class="rights-brs pos-right-1 fonts-size"><b>AMOUNT(RS)</b></h6>
                                            <span class="pt-2 box-design "><b class="me-3"><?= number_format($debitNoteTable['subTotal'],2) ?></b></span>
                                        </div>
                                        <!--<div class="d-flex justify-content-between">-->
                                        <!--   <h6 class="rights-brs fonts-size1"><b>DISCOUNT AMOUNT</b></h6>-->
                                        <!--   <span class="box-design"></span>-->
                                        <!--</div> -->
                                        <div class="d-flex justify-content-between">
                                            <h6 class="rights-brs pos-right-2 fonts-size7"><b>IGST(<?= $debitNoteTable['IGST'] ?>%)</b></h6>
                                            <span class="pt-2 box-design "><b class="me-3"><?= ($debitNoteTable['IGSTTax']!=0)? $debitNoteTable['IGSTTax'] : "---" ?></b></span>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <h6 class="rights-brs pos-right-3 fonts-size7"><b>CGST(<?= $debitNoteTable['CGST'] ?>%)</b></h6>
                                            <span class="pt-2 box-design "><b class="me-3"><?= ($debitNoteTable['CGSTTax']!=0)? $debitNoteTable['CGSTTax']: "---" ?></b></span>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <h6 class="rights-brs pos-right-4 fonts-size7"><b>SGST(<?= $debitNoteTable['SGST'] ?>%)</b></h6>
                                            <span class="pt-2 box-design "><b class="me-3"><?= ($debitNoteTable['SGSTTax']!=0)? $debitNoteTable['SGSTTax'] : "---" ?></b></span>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <h6 class="rights-brs pos-right-5 fonts-size6"><b>TOTAL AMOUNT(RS)</b></h6>
                                            <span class="pt-2 box-design "><b class="me-3"><?=$debitNoteTable['total'] ?></b></span>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <h6 class="rights-brs pos-right-6 fonts-size7"><b>ROUND OFF</b></h6>
                                            <span class="pt-2 box-design "><b class="me-3"><?=$debitNoteTable['roundOff'] ?></b></span>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <h6 class="rights-brs pos-right-7 fonts-size6"><b>NET AMOUNT(<i class="fa fa-rupee-sign"></i>)</b></h6>
                                            <span class="pt-2 box-design "><b class="me-3"><?=number_format($debitNoteTable['netAmount'],2) ?></b></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="">
                            <!--<div>-->
                            <!--    <h6 class="visibility">total</h6>-->
                            <!--    <h6 style="font-size:13px"><b style="font-size:13px">ROUND OFF</b></h6>-->
                            <!--    <p CLASS="M-0 p-0"><b style="font-size:17px">NET AMOUNT</b><p>-->
                            <!--</div> -->
                            <div>

                            </div>
                                <div class="text-center top-bottom-border">
                          <h6 ><b style="font-size:17px">All Remittance to be Made Favouring SUNIL TRADERS, Chennai-600001</b></h6>
                        
                      </div>
                      
                            <div class="containers mb-0">
                                <div class=" mt-0 mb-0">
                                    <div class="d-flex justify-content-between">
                                        <div class="">
                                            <h6 class="m-1 span-size">Prepared by:</h6>
                                            <span class="m-2 span-tags1 ml-4 pl-4"></span>
                                        </div>

                                        <div class="">
                                            <h6 class="m-1 span-size ml-4">checked by:</h6>
                                            <span class="m-2 span-tags1 ml-4 pl-4"></span>
                                        </div>

                                        <div class="">
                                            <!-- <div class="col-lg-4" style="margin-right:;"> -->
                                            <h6 class="m-1 span-size ml-4">Buyer's Signature:</h6>
                                            <span class="m-2 span-tags1"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>


                    </div>

                </div>
            </div>
        </div>

</div>
        <!-- App js -->
        <script src="assets/js/app.js"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>

</html>
<!--<html>-->
<!--     <head>-->
<!--        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>-->

<!--    </head>-->
<!--     <body onload='window.print()'>-->
<!--         <h3>welcome to my page</h3>-->
<!--     </body>-->

<script type="text/javascript">
    window.onload = function() {
        window.print();
    }
</script>
</html>