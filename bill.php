<?php
include('./include/config.php');

  $action=$_GET['action'];
  $financial_year=$_GET['financial_year'];
  $bill_id=$_GET['bill_id'];
  $customer_name=$_GET['customer_name'];
  $customer_contact=$_GET['customer_contact'];
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

// if($action=='bill_printed')
// {
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
  
    
// }
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
<!--     <link rel="preconnect" href="https://fonts.googleapis.com">-->
<!--<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>-->
<!--<link href="https://fonts.googleapis.com/css2?family=Lora:ital@1&family=Poppins&family=Roboto&display=swap" rel="stylesheet">-->
     
             <style>
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
            @media print {
                         body {
                            margin: -2rem 0 0 0;
                            }
            }
            @media print {
                .print_span:after{
                    width: 200px !important;
                }
            }
            
            @media print {
            .no_print_width {
                   width: 100px !important;
                 }
                 .formss {
                     width: 100% !important;
                 /*height: 200px;*/
                 page-break-after: auto !important;
             }
             }
             body{
                 position: relative;
             }
             .formss {
                 padding: 15px !important;
                 position: relative;
                 top: -30px !important;
             }
             
             @media print {
                 .sss span:after {
                      width: 120px !important;
                 }
                 .css span:after {
                     width: 97px !important;
                 }
                 .css {
                     padding: 5px !important;
                 }
             }
             .no-scroll {
                  overflow: hidden !important;
             }
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
  *{
  
  margin: 0mm;
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
      border: 1px;
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
      height: 57px !important;
  }
   .padding-bill-right {
       padding-right: 12px;
   }
   .prints_widths:after {
       min-width: 275px !important;
   }
   h6, p, span, div, th, td, .fontsize > h6 {
       /*font-family: 'Poppins', sans-serif !important;*/
       /*font-family: 'PT Serif', serif !important;*/
       font-family: monaco, Consolas, "Lucida Console", monospace ! important; 
   }
   .padding-rights {
       padding-right: 20px !important;
   }
   .text-ends {
       text-align: end;
   }
    .no-gap p{
        line-height:1 !important;
    }
    .no-gap h6{
        font-size: 16px !important;
        margin: 5px 0 !important;
    }
    .color-code {
        font-size: 12px !important;
    }
    .borderss {
        border: 2px;
       border-style: dashed none none none !important;
    }
        </style>

</head>


<body id="body" class="auth-page" style="background-image: url('assets/images/p-1.png'); background-size: cover; background-position: center center;">
<!--onload="myfunction()"-->
  

  <div class="container mt-4 no-gap">
      <div class="row">
          <div class="col-lg-8 offset-lg-2">
              <div class="formss card" id="print_content">
                  <div class="row">
                     
                      <div class="col-lg-12 p-0">
                          <p class="text-center ends borderss"><b>ESTIMATE SLIP</b></p>
                      </div>
                        
                      <div class="text-start scs mt-1 p-0">
                           <div class="d-flex align-items-baseline">
                              <h6 class="color-code text-uppercase">Cust-Name:</h6>
                              <span class="text-center color-code print_span prints_widths"><b><?php echo $customer_name; ?></b></span>
                          </div>  
                           <div class="d-flex align-items-baseline">
                              <h6 class="color-code text-uppercase">Ph-Number:</h6>
                              <span class="text-center color-code print_span prints_widths"><b><?php echo $customer_contact; ?></b></span>
                          </div> 
                      </div>
                      
                      <div class="row rows-height">
                          <div class="d-flex justify-content-between p-0">
                              <div class="text-start mb-5 mt-1 sss">
                                <div class="d-flex align-items-baseline justify-content-between">    
                                   <h6 class="color-code text-uppercase">Est No:</h6>
                                   <span class="color-code no_print_width" style="white-space: nowrap;text-align: center;">
                                        <b class="ms-1">
                                           <?php
                                            
                                                $bill=explode('_',$bill_id);
                                                echo $bill[1];
                                           ?>
                                        </b>
                                    </span>
                               </div>       
                                <div class="d-flex align-items-baseline">   
                                  <h6 class="color-code text-uppercase">Payment:</h6>
                                  <span class="color-code no_print_width" style="white-space: nowrap;text-align: center;"><b class="ms-1"><?php echo $payment_mode; ?></b></span>
                                </div>  
                               </div>      
                         
                            <div class="modile-bill">
                              <div class="mb-5 css " style="margin-left: 3.2rem!important;">
                                  <?php
                                    if($finacial_year=='')
                                    {
                                        $finacial_year=date('Y');
                                    }
                                    else
                                    {
                                        $finacial_year=$_GET['financial_year'];
                                    } 
                                    
                                    $sql="select created_at from estimate_slip where bill_id='$bill_id' and financial_year='$finacial_year'";
                                    $result=mysqli_query($conn,$sql);
                                    $rec=mysqli_fetch_assoc($result);
                                    
                                  ?>
                                  <div class="d-flex align-items-baseline padding-rights">
                                    <h6 class="color-code text-uppercase">Date:</h6>
                                    <span class="text-starts ms-2 color-code"><b><?php echo date('d-m-Y',strtotime($rec['created_at'])); ?></b></span>
                                  </div>    
                                  <div class="d-flex align-items-baseline">
                                     <h6 class="color-code text-uppercase">Time:</h6>
                                     <span class="text-starts ms-2 color-code"><b><?php echo date('H:i:s',strtotime($rec['created_at']));; ?></b></span>
                                  </div>     
                               </div> 
                               <!--<div class="">-->
                               <!--    <h6>today</h6>-->
                               <!--    <h6>15hrs</h6>-->
                               <!--</div>-->
                          </div>
                           </div>
                      </div>
                      <div class="table-responsive mt-2 no-scroll p-0" style="overflow: hidden;">
                        <table border="0" cellpadding="0" cellspacing="0" align="center" class="fullPadding">
                          <tbody>
                            <tr class="tablesss-dashed">
                      <th class="right-border text-center right-dashed ttbs-dashed text-uppercase" style="font-size: 16px; font-family: 'Open Sans', sans-serif; font-weight: normal; vertical-align: top; padding:1px 4px 0px 0px;" width="10%" align="left">
                        <b>Particulars</b>
                      </th>
                      <th class="right-border text-center right-dashed ttbs-dashed text-uppercase" style="font-size: 16px; font-family: 'Open Sans', sans-serif; font-weight: normal; vertical-align: top; padding:1px 4px 0px 0px;" width="3%" align="left">
                        <b>Mtrs</b>
                      </th>
                      <th class="right-border text-center right-dashed ttbs-dashed text-uppercase" style="font-size: 16px; font-family: 'Open Sans', sans-serif; font-weight: normal; vertical-align: top; padding:1px 4px 0px 0px;" width="3%" align="left">
                        <b>pcs</b>
                      </th>
                      <th class="right-border text-center right-dashed ttbs-dashed text-uppercase" style="font-size: 16px; font-family: 'Open Sans', sans-serif; font-weight: normal; vertical-align: top; padding:1px 4px 0px 0px;" width="10%" align="left">
                       <b>Rate</b>
                      </th>
                        <th class="text-center text-uppercase" style="font-size: 16px; font-family: 'Open Sans', sans-serif; font-weight: normal; vertical-align: top; padding:1px 4px 0px 0px;" width="10%" align="left">
                      <b>Amount</b> 
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
                        $sql="select * from estimate_slip where bill_id='$bill_id' and financial_year='$finacial_year'";
                        $result=mysqli_query($conn,$sql);
                        
                        while($rec=mysqli_fetch_assoc($result))
                        {
                            
                    ?>
                     <tr>
                                 
                      <td class="right-border text-starts  ttbs-dashed text-uppercase" style="font-size: 15px; font-family: 'Open Sans', sans-serif;" class="article">
                        <?php echo $rec['particular']; ?>
                      </td>
                      <td class="right-border text-center ttbs-dashed" style="font-size: 15px; font-family: 'Open Sans', sans-serif;">
                          <small>
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
                              
                          </small>
                          </td> 
                      <td class="right-border text-center ttbs-dashed ttbs-dashed text-uppercase" style="font-size: 15px; font-family: 'Open Sans', sans-serif;" align="center">
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
                      </td>
                      <td class="right-border text-center ttbs-dashed text-uppercase" style="font-size: 15px; font-family: 'Open Sans', sans-serif;" align="left"><?php echo $rec['rate']; ?></td>
                      <td class="text-ends pe-3 text-uppercase" style="font-size: 15px; font-family: 'Open Sans', sans-serif;" align="left"><?php echo $rec['amount']; ?></td>
                    </tr>
                    <?php   
                    }
                    ?>
                                
                  
                        
                           
                           
                          </tbody>
                        </table>
                    </div>    
                    
                      <div class="d-flex justify-content-spacess bbbb">
                           
                          <div class="fontsize">
                              
                              <h6 class="text-uppercase"><b>Sub Total</b></h6>
                              <h6 class="text-uppercase"><b>Discount Amount</b></h6>
                              <h6 class="text-uppercase"><b>Total Amount</b></h6>
                              
                               
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
                           <div class="modile-bill">
                              <div class="text-end fontsize" style="margin-right: 18px;">
                                  <h6><b><?php echo number_format($sub_total,2); ?></b></h6>
                                  <h6><b>
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
                              <h6 class="visibility text-uppercase">total</h6>
                              <h6 class="color-code text-uppercase"><b>Round Off</b></h6>
                              <p class="text-uppercase" style="font-size:0.999rem;"><b>Net Amount</b><p>
                          </div> 
                          <div style="margin-right: 15px;">
                            <h6 class="text-end color-code" >
                                <b><?php
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
                               <h6 class="text-end color-code"><b><?php echo number_format($total-$net_amount, 2); ?></b></h6>
                            <p class="text-end" style="font-size:0.999rem;"><b><?php echo number_format($net_amount,2); ?></b><p>
                        </div>        
                      </div>
                      <div class="d-flex prices p-0 mt-1">
                          <?php
                            $sql="select sum(pieces) as total_pieces from estimate_slip where bill_id='$bill_id' and financial_year='$finacial_year'";
                            $result=mysqli_query($conn,$sql);
                            $rec=mysqli_fetch_assoc($result);
                          ?>
                              <h6 class="color-code text-uppercase"><b>Pieces -  <?php echo $rec['total_pieces']; ?></b></h6>
                              <h6 class="color-code"><b>--</b></h6>
                          </div>
                      <div class="text-center mmmt">
                          <h6 class="color-code"><b>Goods Once Sold cann't be Taken Back</b></h6>
                          <h6 class="color-code"><b>*PLEASE VISIT AGAIN*</b></h6>
                          <h6 class="color-code"><b>*THANK YOU*</b></h6>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
    <!-- App js -->
    <script src="assets/js/app.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript">

     window.onload = function() { window.print(); }

 </script>
    
</body>

</html>

