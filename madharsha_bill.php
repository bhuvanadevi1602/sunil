
<?php
include('./include/config.php');

  $action=$_GET['action'];
  $bill_id=$_GET['bill_id'];
  $finacial_year=$_GET['finacial_year'];
  $customer_name=$_GET['customer_name'];
  $customer_contact=$_GET['customer_contact'];
  $gst_num=$_GET['gst_num'];
  $address_1=$_GET['address_1'];
  $address_2=$_GET['address_2'];
  $city=$_GET['city'];
  $lr_no=$_GET['lr_no'];
  $lr_date=$_GET['lr_date'];
  $terms=$_GET['terms'];
  $appr_date=$_GET['appr_date'];
  $appr_no=$_GET['appr_no'];
  $through=$_GET['through'];
  $sub_total=$_GET['sub_total'];
  $discount_amount=$_GET['discount_amount'];
  $total_amount=$_GET['total_amount'];
  $cgst=$_GET['cgst'];
  $sgst=$_GET['sgst'];
  $igst=$_GET['igst'];
  $net_amount=$_GET['net_amount'];
  $created_at=date('Y-m-d h:i:s');
  $pieces_count=$_GET['pieces_count'];
//  echo "<script>alert('".$customer_name."')</script>";

if($action=='bill_printed')
{
    if($cgst!=''&&$sgst!=''&&$igst!='')
    {
          if($cgst==''&&$sgst=='')
          {
            
            
                $igst_amount=($total_amount/100)*$igst;
            
            // $sql="insert into estimate_slip_final(customer_id,sub_total,discount,total,igst,net_amount,created_at) values($cus_id,'$sub_total','$discount_amount','$total_amount','$igst_amount','$net_amount','$created_at')";
            // $result=mysqli_query($conn,$sql);
           
            
          }
          else if($igst=='')
          {
                $cgst_amount=($total_amount/100)*$cgst;
                $sgst_amount=($total_amount/100)*$sgst;
            
            // $sql="insert into estimate_slip_final(customer_id,sub_total,discount,total,cgst,sgst,net_amount,created_at) values($cus_id,'$sub_total','$discount_amount','$total_amount','$cgst_amount','$sgst_amount','$net_amount','$created_at')";
            // $result=mysqli_query($conn,$sql);
            
          }
    }
  
    
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  
    <meta charset="utf-8" />
            <title>Login</title>
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
          min-height: 574px;
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
            .section{
                zoom:97%;
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
        
        
       .lk{
           width:421px;
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
            min-height: 571px;
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
            min-height: 571px;
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
            min-height: 571px;
            border:1px solid black;
        }
        .position-right-no {
            
        }
        .position-right-title {
            position: relative;
            right: 12px;
        }
        .position-right-no {
            position: relative;
            right: 12px;
        }
        .mt-1-top {
            margin-top: 1px;
        }
        .upper-case p {
            text-transform: uppercase;
        }
        .upper-case h6 {
            text-transform: uppercase;
        }
        
 @media print {
 .min-height-table11{
            padding-top: 0px !important;
            position: absolute;
            top: 0px;
            right: -29px !important;
            min-height: 571px;
            border:0.1px solid;
        }
        .lk{
           width:402px !important;
       } 
        
      
}    
        
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
  
   
</style>
<body id="body" class="auth-page" style="background-image: url('assets/images/p-1.png'); background-size: cover; background-position: center center;" onload="myfunction()">
    <div class="section">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div class="formss card mb-0" id="print_content">
                    <div class="sk" style="border:3px solid black; padding: 0px 3px 0px 3px;">
                        <div class="d-flex justify-content-between pt-2" style="margin-right: 5px;">
                            <!-- <div class="row"> -->
                                <div class="col-sm-3" style=" margin-left: 5px; white-space: nowrap;">
                                    <p class="ml-2">GST NO - 33AAAFS1530K1ZJ</P>
                                </div>
                                <div class="d-flex col-sm-6 justify-content-center">
                                    <div class="">
                                       
                                            <img src="assets/images/sunil.png" class="mx-auto d-block" width="360" height="40" >
                                        <!--<h2 class="text-center fontsss mt-1 mb-0">Sunil Traders</h2>-->
                                        <p class="text-center pr-3"><img src="assets/images/webserve-logo.png" width="150" height="30" alt="logo" border="0" ><span class="ms-1 mt-3" style="font-size:18px;"><b  class="mt-1">SUITINGS</b></span></p>
                                        
                                        <p class=" p-0 m-0 text-center me-5" style="font-size: 13px;white-space: nowrap;font-weight: 500;">66 (New No.76), GODOWN STREET, 1st FLOOR, CHENNAI-600001 </p>
                                    </div>
                                </div>
                                <?php
                                        $sql="select * from madharsha_invoice  where bill_id='$bill_id' ";
                                        $result=mysqli_query($conn,$sql);
                                        $rec=mysqli_fetch_assoc($result);
                                    ?>
                                <div class="col-sm-3" style="text-align: end;margin-right: 5px; padding-right: 5px;">
                                    <P><span class="position-right-title">Ph no: 98408 13508</span><br><span class="position-right-no">7010872281</span><br><span class="">044-2538 0927</span></P>
                                    <div style="    float: right;">
                                 <div class="d-flex  mt-0 mb-0">
                              <p><b style="">INVOICE NO:</b></p>
                             <p class="bordersss " style="margin-left:19px; min-width: 74px;"><b class="text-center" style=""><?php echo $bill_id; ?></b></p>
                           </div>
                           
                          <div class="d-flex mt-1 mb-1" style="margin-left: 46px;">
                             <p><b>DATE:</b></p>
                              <p class="bordersss " style="margin-left:19px;"><b class="text-center col-2"><?php echo date('d-m-Y',strtotime($rec['created_at'])); ?></b></p>
                           </div>
                           </div>
                      </div>
                   </div>
                   
                   
                <div class="containers p-0">    
                       <!-- <div class="col-lg-12 p-0">-->
                       <!--   <p class=" p-0 m-0 text-center" style="font-size: 15px;position:relative;top:-50px;left:3px;">66 (New No.76), GODOWN STREET, 1st FLOOR, CHENNAI-600001  </p>-->
                       <!--</div>-->
                      
                      <div class="col-lg-12 p-0">
                          <p class="text-center top-bottom-borders"><b style="font-size: 20px;">TAX INVOICE</b></p>
                      </div>
                      
                      
                      
                  
                  
                      
                      <div class="containers">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="d-flex upper-case">
                                        <div class="right-border" style="width: -webkit-fill-available;">
                                            <div class="d-flex " style="padding-right: 10px;justify-content: space-between;">
                                                <h6 class="m-1 span-size col-3" style="white-space: nowrap;">Customer Name:</h6>
                                                <p class="bordersss col-8 text-left text-uppercase">
                                                    <b>
                                                    <?php echo $customer_name; ?>
                                                    </b>
                                                </p>
                                            </div>
                                            <div class="d-flex " style="padding-right: 10px;justify-content: space-between;">
                                                <h6 class="m-1 span-size col-3">Address:</h6>
                                                <p class="bordersss col-8 text-left text-uppercase">
                                                    <b>
                                                    <?php echo $address_1; ?>
                                                    </b>
                                                </p>
                                            </div>
                                            <div class="d-flex" style="padding-right: 10px;justify-content: space-between;">
                                                <h6 class="m-1 span-size col-3 mt-3"></h6>
                                                <p class="bordersss col-8 text-left text-uppercase">
                                                    <b>
                                                    <?php echo $address_2; ?>
                                                    </b>
                                                </p>
                                            </div>
                                            <div class="d-flex " style="padding-right: 10px;justify-content: space-between;">
                                                <h6 class="m-1 span-size col-3">City:</h6>
                                                <p class="bordersss col-8 text-left text-uppercase">
                                                    <b>
                                                    <?php echo $city; ?>
                                                    </b>
                                                </p>
                                            </div>
                                            
                                            <div class="d-flex " style="padding-right: 10px;justify-content: space-between;">
                                                <h6 class="m-1 span-size col-3">Phone No:</h6>
                                                <p class="bordersss col-8 text-left">
                                                    <b>
                                                        <?php echo $customer_contact; ?>
                                                    </b>
                                                </p>
                                            </div>
                                           
                                        </div>

                                        <div class="" style="width:-webkit-fill-available;">
                                            <div class="d-flex justify-content-between ">
                                                <!-- <div class="row "> -->
                                                    <!-- <div class="col-6"> -->
                                                        <h6 class="m-1 span-size ">APP NO:</h6>
                                                        <p class="bordersss col-4 text-center text-uppercase">
                                                            <b>
                                                            <?php echo $appr_no; ?>
                                                            </b>
                                                        </p>
                                                    <!-- </div> -->
                                                    <!-- <div class="col-6"> -->
                                                        <h6 class="m-1 span-size text-capitalize">Date:</h6>
                                                        <p class="bordersss col-4 text-center text-uppercase">
                                                            <b>
                                                            <?php 
                                                            if($appr_date!='')
                                                            {
                                                                echo date('d-m-Y',strtotime($appr_date));
                                                            }
                                                             
                                                            ?>
                                                            </b>
                                                        </p>
                                                    <!-- </div> -->
                                                <!-- </div> -->
                                            </div>

                                            
                                            <div class="d-flex ">
                                                <h6 class="m-1 span-size " style="padding-right:4px;white-space:nowrap">GST NO:</h6>
                                                <p class="bordersss col-10 text-center text-uppercase">
                                                    <b>
                                                    <?php echo $gst_num; ?>
                                                    </b>
                                                </p>
                                            </div>
                                            <div class="d-flex ">
                                                <h6 class="m-1 span-size text-capitalize" style="padding-right:13px;">Terms:</h6>
                                                <p class="bordersss col-10 text-center text-uppercase">
                                                    <b>
                                                    <?php echo $terms; ?>
                                                    </b>
                                                </p>
                                            </div>
                                            <div class="d-flex justify-content-between ">
                                                <!-- <div class="row "> -->
                                                    <!-- <div class="col-6"> -->
                                                        <h6 class="m-1 span-size" style="padding-right: 14px;">L/R:</h6>
                                                        <p class="bordersss col-4 text-center text-uppercase" >
                                                            <b>
                                                            <?php echo $lr_no; ?>
                                                            </b>
                                                        </p>
                                                    <!-- </div> -->
                                                    <!-- <div class="col-6"> -->
                                                        <h6 class="m-1 span-size">Date:</h6>
                                                        <p class="bordersss col-4 text-center text-uppercase">
                                                            <b>
                                                            <?php
                                                            if($lr_date!='')
                                                            {
                                                                echo date('d-m-Y',strtotime($lr_date));
                                                            }
                                                            
                                                            ?>
                                                            </b>
                                                        </p>
                                                    <!-- </div> -->
                                                <!-- </div> -->
                                            </div>
                                            <div class="d-flex  mb-1">
                                                <h6 class="m-1 span-size text-capitalize" style="padding-right:0px;">Through:</h6>
                                                <p class="bordersss col-10 text-center text-uppercase">
                                                    <b>
                                                    <?php echo $through; ?>
                                                    </b>
                                                </p>
                                            </div>

                                        </div>
                                        
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                        </div>
            
            
    <div class="card1">        
  <div class=" table_responsive">
                            <table class="table-design">
                                
                                <thead>
                                    <tr class="border-bottomss">
                                        <th class="text-center min-position"><span class="min-height-table"></span><span class="min-height-table-left"></span><span>SNO</span></th>
                                        
                                        <th class="table-width text-center min-position1"><span class="min-height-table11"></span>PARTICULARS</th>
                                       
                                        <!--<th class="text-center min-position1" style="white-space: nowrap;"><span class="min-height-table11"></span>INVOICE NO</th>-->
                                        <th class="text-center min-position" style="white-space: nowrap;padding-left: 33px;"><span class="min-height-table"></span>HSN NO</th>
                                        <th class="text-center min-position"><span class="min-height-table"></span>MTRS</th>
                                        <th class="text-center min-position"><span class="min-height-table"></span>PCS</th>
                                        <th class="text-center min-position" style="width:12%;"><span class="min-height-table"></span>RATE</th>
                                        <th class="text-center min-position"><span class="min-height-table"></span>AMOUNT</th>
                                    </tr>
                                </thead>    
   <?php
   if($finacial_year=='')
   {
    $sql="select * from madharsha_invoice  where bill_id='$bill_id'";
    $result=mysqli_query($conn,$sql); 
   }
   else
   {
    $sql="select * from madharsha_invoice  where bill_id='$bill_id' and financial_year='$finacial_year'";
    $result=mysqli_query($conn,$sql);   
   }
    
    $i=1;
    while($rec=mysqli_fetch_assoc($result))
    {
        
   ?>
            <tr class="table-data">
             <td class="text-center"><?php echo $i++; ?></td>
             <td class=""><span class="d-flex justify-content-between ms-1 " style="margin-bottom: 0.11rem!important;"><b style='width: 30%;font-size: 14px;'><?=$rec['particular'] ."</b><span style='width: 0%;'>-</span><span class='tdtdtd-position' style='width: 53%;'>". $rec['meters'] ?></span></span></td>
             <!--<td class="text-left text-capitalize"><b><span class="ms-3"><//?php //echo $rec['particular'].'-'.$rec['meters']; ?></span></td>-->
             <td class="text-center"><?php echo $rec['hsn']; ?></td>
             <td class="text-center"><?php echo $rec['total_meters']; ?></td>
             <td class="text-center"><?php echo $rec['pieces']; ?></td>
             <td class="text-center"><?php echo $rec['rate']; ?></td>
             <td class="text-center"><?php echo $rec['amount']; ?></td>
            </tr>
   <?php
    }
   ?>
 
  
</table> 
    </div>
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
                                   <h6 class="bank-details mb-0 text-center " style="width:401px;font-size: 13px;">BANK DETAILS</h6>
                                    <div class="d-flex bank-detailss" style="width:359px;">
                                    <div class="rrbb" style="width:266px;">
                                       <p style="white-space:nowrap;"><b>Bank:</b>Central Bank of India</p>
                                       <p>Sowcarpet Branch,chennai</p>
                                       <p><b>Acc no: </b> 3052997228</p>
                                       <p><b>IFSC Code: </b> CBIN028088</p>
                                    </div>  
                                    <div class="llbb" style="width:266px;">
                                       <p><b>Bank:</b>The Karur Vysya Bank Limited<br> 
                                      </p>
                                       <!--<p>NO 37,Old No 13,Godown Street,</p>-->
                                       <!--<p>Tamil Nadu-600001</p>-->
                                       <p style="white-space: nowrap;"><b>Acc No: </b> 1755135000017776</p>
                                       <p style="white-space: nowrap;"><b>IFSC Code: </b> KVBL0001755</p>
                                    </div>   
                                 </div>
                                    <div class="borrdesss pb-1" style="">
                                        <h6 class="ps-1 mb-0 mt-0"><b>NOTED:</b></h6>
                                        <p class="ps-5">1.Goods once sold will not be taken back or exchanged</p>
                                        <p class="ps-5">2.All disputes are Subject to Chennai Jurisdiction only.</p>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <h6><b>NET AMOUNT : NO LESS</b></h6>
                                       <span class="line" style="height: px;"></span>
                                        <h6><b>TOTAL PIECES:<span style="margin-left: 5px;font-size:17px;"><?php echo $pieces_count; ?></span></b></h6>
                                    </div>
                                </div>
                              
                               <div class="">
                          <div class="fontsize">
                               <div class="d-flex justify-content-between ht">
                                  <h6 class="rights-brs fonts-size5"><b>AMOUNT(RS)</b></h6>
                                  <span class="box-design"><b class="me-3 mt-1"><?php echo number_format($sub_total,2); ?></b></span>
                               </div> 
                                <div class="d-flex justify-content-between ht">
                                  <h6 class="rights-brs fonts-size1 me-1">DISCOUNT AMOUNT</h6>
                                  <span class="box-design">
                                      <b class="me-3 mt-1">
                                  <?php 
                                      if($discount_amount=='')
                                      {
                                          echo '0.0';
                                      }
                                      else
                                      {
                                           echo number_format($discount_amount,2); 
                                      }
                                        
                                      ?>
                                      </b>
                                  </span>
                               </div> 
                               
                               <?php
                               if($cgst==''&&$sgst==''&&$igst!='')
                               {
                               ?>
                               <div class="d-flex justify-content-between ht">
                                    <h6 class="rights-brs fonts-size5">IGST(<?php echo $igst; ?>%)</h6>
                                    <span class="box-design">
                                        <b class="me-3 mt-1">
                                        <?php 
                                            $igst_amount=((float)$total_amount/100)*$igst; 
                                            echo number_format($igst_amount,2);
                                        ?>
                                        </b>
                                    </span>
                                </div>
                                <?php
                               }
                               else if($cgst!=''&&$sgst!=''&&$igst=='')
                               {
                               ?>
                              
                               <div class="d-flex justify-content-between ht">
                                  <h6 class="rights-brs fonts-size5">CGST(<?php echo $cgst; ?>%)</h6>
                                  <span class="box-design">
                                      <b class="me-3 mt-1">
                                      <?php 
                                         $cgst_amount=((float)$total_amount/100)*$cgst;
                                         echo number_format($cgst_amount,2);
                                       ?>
                                      </b>
                                </span>
                                </div> 
                                <div class="d-flex justify-content-between ht">
                                  <h6 class="rights-brs fonts-size5">SGST(<?php echo $sgst; ?>%)</h6>
                                  <span class="box-design">
                                      <b class="me-3 mt-1">
                                          <?php 
                                            $sgst_amount=((float)$total_amount/100)*$sgst; 
                                            echo number_format($sgst_amount,2); 
                                           ?>
                                      </b>
                                  </span>
                                </div>
                                <?php    
                               }
                               ?>
                                 
                              
                              
                                
                              
                                  
                             
                               
                               <div class="d-flex justify-content-between ht">
                                  <h6 class="rights-brs fonts-size6"><b>TOTAL AMOUNT(<i class="fa fa-rupee-sign"></i>)</b></h6>
                                  
                                      <span class="box-design">
                                        <b class="me-3 mt-1"><?php
                                        if($cgst==''&&$sgst==''&&$igst=='')
                                        {
                                            $total=$total_amount;
                                            echo number_format($total,2);
                                        }
                                       
                                        else if($cgst==''&&$sgst==''&&$igst!='')
                                        {
                                             $total=$total_amount+((float)$total_amount/100)*$igst;
                                             echo number_format($total,2);
                                        }
                                        else if($cgst!=''&&$sgst!=''&&$igst=='')
                                        {
                                            $total=$total_amount+((float)$total_amount/100)*$cgst+((float)$total_amount/100)*$sgst;
                                            echo number_format($total,2);
                                        }
                                    
                                        ?></b>
                                      </span>
                                 
                                  
                               </div> 
                               <div class="d-flex justify-content-between ht">
                                  <h6 class="rights-brs fonts-size5">ROUND OFF</h6>
                                  <span class="box-design"><b class="me-3 mt-1"><?php echo number_format($net_amount-$total, 2); ?></b></span>
                               </div> 
                               <div class="d-flex justify-content-between ht">
                                  <h6 class="rights-brs fonts-size6 me-1" style="font-size:17px;"><b>NET AMOUNT(<i class="fa fa-rupee-sign"></i>)</b></h6>
                                  <span class="box-design"><b class="me-2 mt-1" style="font-size:18px;font-weight: bold;"><?php echo number_format($net_amount,2); ?></b></span>
                               </div> 
                        
                          </div>
                          </div>
                            </div> 
                        
                      </div>
                      <div class="">
                          
                          <div>
                         
                          </div>
                          
                          
                          
                                            <div class="text-center top-bottom-border">
                                <h6 class="m-0"><b style="font-size:15px">All Remittance to be Made Favouring SUNIL TRADERS, Chennai-600001</b></h6>
                            </div>
                            <div class="containers mb-0" style="height:54px;">
                                <div class=" mt-0 mb-0">
                                    <div class="d-flex justify-content-between">
                                        <div class="">
                                            <h6 class="m-1 span-size">Prepared by:</h6>
                                            <span class="m-2 span-tags1 ml-4 pl-4"></span>
                                        </div>

                                        <div class="">
                                            <h6 class="m-1 span-size ml-4">Checked by:</h6>
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

     window.onload = function() { window.print(); }
//      function myfunction()
//      {
//          var printContents = document.getElementById('print_content').innerHTML;
// 			var originalContents = document.body.innerHTML;

// 			document.body.innerHTML = printContents;

// 			window.print();

// 			document.body.innerHTML = originalContents;
//      }
     
 </script>       

    

 
 </html>
