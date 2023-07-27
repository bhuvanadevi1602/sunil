<?php
include('./include/config.php');

  $action=$_GET['action'];
  $bill_id=$_GET['bill_id'];
  $financial_year=$_GET['financial_year'];
  $customer_name=$_GET['customer_name'];
  $customer_contact=$_GET['customer_contact'];
  $gst_no=strtoupper($_GET['gst_no']);
  $address_1=$_GET['address_1'];
  $address_2=$_GET['address_2'];
  $city=$_GET['city'];
  $payment_mode=$_GET['payment_mode'];
  $sub_total=$_GET['sub_total'];
  $discount_amount=$_GET['discount_amount'];
  $total_amount=$_GET['total_amount'];
  $cgst=$_GET['cgst'];
  $sgst=$_GET['sgst'];
  $igst=$_GET['igst'];
  $net_amount=$_GET['net_amount'];
  $created_at=date('Y-m-d h:i:s');
//  echo "<script>alert('".$net_amount."')</script>";

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
<link href="https://fonts.googleapis.com/css2?family=PT+Serif&family=Poppins:ital,wght@1,100&display=swap" rel="stylesheet">
     
     
     
             <style>
             
             .sss span:after {
  
                    left: 1px !important;
                    width: 100px !important;
             }         
             
            @page 
            {
                    margin: 0;
            }
            @media print 
            {
                footer 
                {
                    display: none;
                    position: fixed;
                    bottom: 0;
                }
                header 
                {
                    display: none;
                    position: fixed;
                    top: 0;
                }
            }
            .fontsss {
                    font-family: monaco, Consolas, "Lucida Console", monospace ! important;
                    font-weight: 800;
                    font-size: 31px;
            }
            .ss{
                    margin-right: 3px;
                    font-family: auto;
                    font-size: 21px;
                    font-weight: 800;
            }
            
            .h6 ,b,{
               color: #000444 !important;
            }
            h6{
                 color: #000444 !important;
            }
           
        </style>

</head>

<style>
    
  @import url(https://fonts.googleapis.com/css?family=Open+Sans:400,700);
  body { margin: 0; padding: 0; background: #e1e1e1; }
  div, p, a, li, td { -webkit-text-size-adjust: none; }
  .ReadMsgBody { width: 100%; background-color: #ffffff; }
  .ExternalClass { width: 100%; background-color: #ffffff; }
  body { width: 100%; height: 100%; background-color: #e1e1e1; margin: 0; padding: 0; -webkit-font-smoothing: antialiased; }
  html { width: 100%; }
  p { padding: 0 !important; margin-top: 0 !important; margin-right: 0 !important; margin-bottom: 0 !important; margin-left: 0 !important; }
  .visibleMobile { display: none; }
  .hiddenMobile { display: block; }

  @media only screen and (max-width: 600px) {
  body { width: auto !important; }
  table[class=fullTable] { width: 96% !important; clear: both; }
  table[class=fullPadding] { width: 85% !important; clear: both; }
  table[class=col] { width: 45% !important; }
  .erase { display: none; }
  }

  @media only screen and (max-width: 420px) {
  table[class=fullTable] { width: 100% !important; clear: both; }
  table[class=fullPadding] { width: 85% !important; clear: both; }
  table[class=col] { width: 100% !important; clear: both; }
  table[class=col] td { text-align: left !important; }
  .erase { display: none; font-size: 0; max-height: 0; line-height: 0; padding: 0; }
  .visibleMobile { display: block !important; }
  .hiddenMobile { display: none !important; }
  }
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
  .right-dashed {
      /*border: 1px;*/
      /*border-right:1px solid dashed !important; */
  }
   /*.right-border {*/
   /*  border-style: dashed dashed none none;*/
   /*}*/
   .slh {
       align-items: baseline;
   }
  .rows-height {
      height: 50px !important;
  }
  /*.no-br {*/
  /*    border-style: dashed none none none !important; */
  /*}*/
  /*.none-brd {*/
  /*    border-style: dashed none none none !important; */
  /*}*/
  
  .text-start1 span:after {
    position: relative;
    /* top: 22px; */
    left: 4px;
    content: "";
    border: 1px;
    border-style: none none dashed none;
    /* background: blue; */
    display: block;
    width: 245px;
    /* height: 1px; */
}
@media print{
    .no-overflow {
        overflow: hidden !important;
    }
}

 @media only screen and (max-width: 991px){
           .text-start1 span:after{
                width:229px;
            }
            .sss span:after{
    width:98px;
}
.css span:after {
    width:104px;
}
}
.from-padding {
    padding: 15px !important;
}
 h6, p, span, div, th, td, .fontsize > h6 {
       font-family: monaco, Consolas, "Lucida Console", monospace ! important;
   }
.line-height p{
    line-height: 1.2!important;
}
h6 {
    margin: 3px 0px !important;
    font-size: 16px !important;
}
.line-p p{
    line-height: 1 !important;
}
</style>
<body id="body" class="auth-page" style="background-image: url('assets/images/p-1.png'); background-size: cover; background-position: center center;">

    <!--onload="myfunction()"-->

  <div class="container mt-1">
      <div class="row">
          <div class="col-lg-6 offset-lg-3">
              <div class="formss card from-padding" id="print_content">
                  <div class="row">
                      <!--<div class="col-lg-6">-->
                      <!--    <img src="assets/images/webservelogo1.png" width="50" height="50" alt="logo" border="0">-->
                      <!--</div>-->
                      <div style="display: inline-block">
                      <h2 class="text-center fontsss m-0"><img src="assets/images/sunil.png" width="210px;"></h2>
                      <!--<p class="text-center "><b class="ss">Raymond</b><b>SUITINGS</b></p>-->
                      <p class="text-center pr-3"><img src="assets/images/webserve-logo.png"  height="30" alt="logo" border="0" ><span class="ms-1 mt-1" style="font-size:18px;"><b  class="mt-1">SUITINGS</b></span></p>
                      </div>
                <div class="container p-0">    
                        <div class="col-lg-12 p-0 line-height">
                          <p class=" scs p-0 m-0" style="font-size: 14px;"><b>66 (New No.76), GODOWN STREET,<br>
                          1st FLOOR, CHENNAI-600001,<br>
                          Ph no: 9840813408, 7010872281, 044-25380927<br>GST NO - 33AAAFS153OK1ZJ</b></p>
                      </div>
                      
                      <div class="col-lg-12 p-0 line-p">
                          <p class="text-center "><b style="font-size: 27px;">CASH BILL</b></p>
                      </div>
                        
                        
                      <div class="text-start1 scs p-0">
                          <div class="d-flex align-items-baseline print-overflow">
                              <h6 class="m-1 "><b>Name:</b></h6>
                              <span class="text-left" style="margin-left: 23px;"><b style="margin-left: 5px;"><?php echo $customer_name; ?></b></span>
                          </div>  
                           <div class="d-flex align-items-baseline print-overflow">
                              <h6 class="m-1" style="flex:none;"><b>GST NO:</b></h6>
                              <span class="text-left" style="margin-left: 11px;"><b style="margin-left: 5px;"><?php echo $gst_no; ?></b></span>
                          </div> 
                            <div class="d-flex align-items-baseline print-overflow">
                              <h6 class="m-1"><b>ADDRESS:</b></h6>
                              <span class="text-left">
                                  <b style="margin-left: 5px;">
                                  <?php
                                  if(!empty($address_1)&&!empty($address_2))
                                  {
                                     echo $address_1.','.$address_2;  
                                  }
                                  
                                  ?>
                                 </b>
                                 </span>
                          </div> 
                            <div class="d-flex align-items-baseline print-overflow">
                              <h6 class="m-1"><b>CITY:</b></h6>
                              <span class="text-left" style="margin-left: 30px;"><b style="margin-left: 5px;"><?php echo $city; ?></b></span>
                          </div> 
                            <div class="d-flex align-items-baseline print-overflow mb-2">
                              <h6 class="m-1 mb-1"><b>PHONE:</b></h6>
                              <span class="text-left" style="margin-left: 14px;"><b style="margin-left: 5px;"><?php echo $customer_contact; ?></b></span>
                          </div> 
                      </div>
                      
                      
                      
                      
                      <div class=" rows-height">
                          <div class="d-flex justify-content-between p-0">
                              <div class="text-start mb-5 sss" style="">
                            
                                <div class="d-flex align-items-baseline justify-content-between">    
                                   <h6><b>BILL NO:</b></h6>
                                   <span class="ms-2" style="text-align: center;">
                                       <b>
                                           <?php 
                                            // $id=explode("_",$bill_id); 
                                            echo $_GET['bill_id'];
                                           ?>
                                        </b>
                                    </span>
                               </div>       
                                <div class="d-flex align-items-baseline">   
                                  <h6><b>Payment:</b></h6>
                                  <span class="ms-2" style="text-align: center;"><b><?php echo $payment_mode; ?></b></span>
                                </div>  
                               </div>      
                         
                            <div class="modile-bill ms-3">
                              <div class="mb-5 css" style="padding-right: 25px;">
                                  <?php
                                    if($finacial_year=='')
                                    {
                                        $finacial_year=date('Y');
                                    }
                                    else
                                    {
                                        $finacial_year=$_GET['financial_year'];
                                    }
                                    $sql="select created_at from cash_bill where bill_id='$bill_id' and financial_year='$finacial_year'";
                                    $result=mysqli_query($conn,$sql);
                                    $rec=mysqli_fetch_assoc($result);
                                    
                                    $date_arr=strtotime($rec['created_at']);
                                    $date=date('d-m-Y',$date_arr);
                                    $time=date('H:i:s',$date_arr);
                                  ?>
                                  <div class="d-flex align-items-baseline">
                                    <h6><b>Date:</b></h6>
                                    <span class="text-starts ps-2"><b><?php echo $date; ?></b></span>
                                  </div>    
                                  <div class="d-flex align-items-baseline">
                                     <h6><b>Time:</b></h6>
                                     <span class="text-starts ps-2"><b><?php echo $time; ?></b></span>
                                  </div>     
                               </div> 
                               <!--<div class="">-->
                               <!--    <h6>today</h6>-->
                               <!--    <h6>15hrs</h6>-->
                               <!--</div>-->
                          </div>
                           </div>
                      </div>
                    </div>  
                      
                      
                      <div class="table-responsives p-0 no-overflow mt-2" style=" padding-right: 12px;">
                        <table border="0" cellpadding="0" cellspacing="0" align="center" class="fullPadding">
                          <tbody>
                            <tr class="tablesss-dashed">
                      <th class="right-border text-center right-dashed ttbs-dashed" style="font-size: 14px; font-family: 'Open Sans', sans-serif; color: ; font-weight: normal; line-height: 1; vertical-align: top; padding:7px 4px 7px 0px;text-transform: uppercase;" width="10%" align="left">
                        <b>PARTICULARS</b>
                      </th>
                       <th class="right-border text-center right-dashed ttbs-dashed text-uppercase" style="font-size: 14px; font-family: 'Open Sans', sans-serif; color: ; font-weight: normal; line-height: 1; vertical-align: top; padding:7px 4px 7px 0px;" width="10%" align="left">
                        <b style="white-space: nowrap;">HSN NO</b>
                      </th>
                      <th class="right-border text-center right-dashed ttbs-dashed text-uppercase" style="font-size: 14px; font-family: 'Open Sans', sans-serif; color: ; font-weight: normal; line-height: 1; vertical-align: top; padding:7px 4px 7px 0px;" width="10%" align="left">
                        <b>MTRS</b>
                      </th>
                      <th class="right-border text-center right-dashed ttbs-dashed text-uppercase" style="font-size: 14px; font-family: 'Open Sans', sans-serif; color: ; font-weight: normal; line-height: 1; vertical-align: top; padding:7px 4px 7px 0px;" width="10%" align="left">
                        <b>PCS</b>
                      </th>
                      <th class="right-border text-center right-dashed ttbs-dashed text-uppercase" style="font-size: 14px; font-family: 'Open Sans', sans-serif; color:; font-weight: normal; line-height: 1; vertical-align: top; padding:7px 4px 7px 0px;" width="10%" align="left">
                       <b>RATE</b>
                      </th>
                        <th class="text-center text-uppercase" style="font-size: 14px; font-family: 'Open Sans', sans-serif; color: ; font-weight: normal; line-height: 1; vertical-align: top; padding:7px 4px 7px 0px;" width="10%" align="left">
                      <b>AMOUNT</b> 
                      </th>
                    </tr>
                    <!--        <tr>-->
                    <!--  <td></td>-->
                    <!--</tr>-->
                    <!--        <tr>-->
                    <!--  <td></td>-->
                    <!--</tr>-->
                    <?php
                        if($finacial_year=='')
                        {
                            $finacial_year=date('Y');
                        }
                        else
                        {
                            $finacial_year=$_GET['financial_year'];
                        }
                        $sql="select * from cash_bill where bill_id='$bill_id' and financial_year='$finacial_year'";
                        $result=mysqli_query($conn,$sql);
                        
                        while($rec=mysqli_fetch_assoc($result))
                        {
                            
                    ?>
                     <tr>
                                 
                      <td class="right-border text-left ttbs-dashed pe-1" style="font-size: 13px; font-family: 'Open Sans', sans-serif;  vertical-align: top;white-space: nowrap;" class="article"> 
                      <b>
                         <?php echo $rec['particular']; ?> 
                      </b>
                        
                      </td>
                      <td class="right-border text-center ttbs-dashed pe-1" style="font-size: 13px; font-family: 'Open Sans', sans-serif;  vertical-align: top;white-space: nowrap;">
                          <small>
                              <b>
                                <?php echo $rec['hsn']; ?> 
                              </b>
                              
                              
                          </small>
                          </td> 
                      <td class="right-border text-center ttbs-dashed ttbs-dashed pe-1" style="font-size: 13px; font-family: 'Open Sans', sans-serif; vertical-align: top;white-space: nowrap;" align="center">
                         <b>
                            <?php
                              if($rec['meters']==0)
                              {
                                  echo '--';
                              }
                              else
                              {
                                  echo number_format($rec['meters'],2);
                              }
                             
                              ?>  
                         </b>
                         
                      </td>
                      <td class="right-border text-center ttbs-dashed pe-1" style="font-size: 13px; font-family: 'Open Sans', sans-serif;white-space: nowrap;" align="left">
                          <b>
                             <?php 
                              if($rec['pieces']==0)
                              {
                                  echo '--';
                              }
                              else
                              {
                                  echo $rec['pieces'];
                              }
                          ?> 
                          </b>
                          
                      </td>
                      <td class="right-border text-center ttbs-dashed pe-1" style="font-size: 13px; font-family: 'Open Sans', sans-serif;white-space: nowrap;" align="left"><?php echo $rec['rate']; ?></td>
                      <td class="text-right pe-2" style="font-size: 13px; font-family: 'Open Sans', sans-serif;white-space: nowrap;" align="right"><?php echo $rec['amount']; ?></td>
                    </tr>
                    <?php   
                    }
                    ?>
                                
                    
                          </tbody>
                        </table>
                    </div>    
                     
                      <div class="container p-0">
                      <div class="d-flex justify-content-spacess bbbb">
                           
                          <div class="fontsize">
                                  <h6><b>SUB TOTAL</b></h6>
                                  <h6><b>DISCOUNT AMOUNT</b></h6>
                                  <h6><b>TOTAL AMOUNT</b></h6>
                                    
                                  <?php 
                                    
                                    if($cgst!=''&&$sgst!=''&&$igst=='')
                                    {
                                  ?>
                                    <h6><b>CGST(<?php echo $cgst.'%'; ?>)</b></h6>
                                    <h6><b>SCGST(<?php echo $sgst.'%'; ?>)</b></h6>
                                  <?php  
                                        
                                    }
                                    else if($cgst==''&&$sgst==''&&$igst!='')
                                    {
                                    ?>
                                    <h6><b>IGST(<?php echo $igst.'%'; ?>)</b></h6>
                                   <?php
                                   }
                                    
                                   ?>
                             
                            
                          </div>
                           <div class="modile-bill" style="margin-right:9px;">
                              <div class="text-end fontsize">
                                  <h6><b><?php echo number_format($sub_total,2); ?></b></h6>
                                  <h6>
                                      <b>
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
                                  </h6>
                                  <h6><b><?php echo number_format($total_amount,2); ?></b></h6>
                                   
                                  <?php
                                   
                                    if($cgst!=''&&$sgst!=''&&$igst=='')
                                    {
                                   ?>
                
                                        <h6><b><?php echo $cgst_amount=number_format((((float)$total_amount/100)*$cgst),2); ?></b></h6>
                                        <h6><b><?php echo $sgst_amount=number_format((((float)$total_amount/100)*$sgst),2); ?></b></h6>
                                  <?php  
                                        
                                    }
                                    else if($cgst==''&&$sgst==''&&$igst!='')
                                    {
                                  ?>
                                    <h6><b><?php echo $igst_amount=number_format((((float)$total_amount/100)*$igst),2); ?></b></h6>
                                        
                                  <?php
                                  }
                                  ?>
                                  
                                  
                                  
                              </div>       
                          </div>
                      </div>
                      <div class="d-flex flexss prices-padding">
                          <div>
                              <h6 class="visibility">total</h6>
                              <h6 style="font-size:13px"><b style="font-size:15px">ROUND OFF</b></h6>
                              <p CLASS="M-0 p-0"><b style="font-size:17px">NET AMOUNT</b><p>
                          </div> 
                          <div style="margin-right:9px;">
                            <h6 class="text-end"><b>
                                <?php
                                if($discount_amount==''&&$cgst==''&&$sgst==''&&$igst=='')
                                {
                                    $total=$total_amount;
                                    echo number_format($total,2);
                                }
                                else if($discount_amount!=''&&$cgst==''&&$sgst==''&&$igst=='')
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
                                <!--258965-->
                           </h6>
                               <h6 class="text-end"><b><?php echo number_format($total-$net_amount, 2); ?></b></h6>
                            <p class="text-end"><b style="font-size:20px"><?php echo number_format($net_amount,2); ?></b><p>
                                 <!--<p class="text-end"><b><?php //echo number_format($net_amount,2); ?></b><p>-->
                        </div>        
                      </div>
                      <div class="d-flex prices p-0">
                          <?php
                            $sql="select sum(pieces) as total_pieces from cash_bill where bill_id='$bill_id'";
                            $result=mysqli_query($conn,$sql);
                            $rec=mysqli_fetch_assoc($result);
                          ?>
                              <h6 class="text-left "><b>PIECES:  <?php echo $rec['total_pieces']; ?></b></h6>
                              <h6 class=""><b>--</b></h6>
                          </div>
                          </div>
                          
                          
                          
                      <div class="text-center mmmt">
                          <h6 ><b style="font-size:17px">Goods Once Sold cann't be Taken Back</b></h6>
                          <h6><b style="font-size:17px">*PLEASE VISIT AGAIN*</b></h6>
                          <h6><b style="font-size:17px">THANK YOU</b></h6>
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
