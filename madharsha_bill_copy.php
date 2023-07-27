<?php
include('./include/config.php');

  $action=$_GET['action'];
  $bill_id=$_GET['bill_id'];
  $customer_name=$_GET['customer_name'];
  $customer_contact=$_GET['customer_contact'];
  $gst_num=$_GET['gst_num'];
  $address_1=$_GET['address_1'];
  $address_2=$_GET['address_2'];
  $city=$_GET['city'];
//   $payment_mode=$_GET['payment_mode'];
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
<link href="https://fonts.googleapis.com/css2?family=Lobster+Two:wght@400;700&display=swap" rel="stylesheet">
     
     
     
             <style>
             .card{
                     border: 0px solid;
                     border-radius:1px;
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
                font-family: 'Lobster Two', cursive !important;
                    font-weight: 800;
                    font-size: 49px;
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
            table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

.fonts-size5{
    font-size:12px;
}

td, th {
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
.ll{
        flex-direction: column;
}
.tt{
        flex-direction: column-reverse;
}
.span-tags1:after{
    width:100px;
}
.gst:after{
    width:238px !important;
}
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
      height: 88px !important;
  }
  /*.no-br {*/
  /*    border-style: dashed none none none !important; */
  /*}*/
  /*.none-brd {*/
  /*    border-style: dashed none none none !important; */
  /*}*/
</style>
<body id="body" class="auth-page" style="background-image: url('assets/images/p-1.png'); background-size: cover; background-position: center center;" onload="myfunction()">

   

  <div class="container mt-5">
      <div class="row">
          <div class="col-lg-8 offset-lg-2">
              <div class="border-full">
                 <div class="formss card" id="print_content">
                     
                     <div class="sk" style="border:1.5px solid black; padding: 0px 0px 23px 0px;">
                  <div class="d-flex justifysss">
                      <div style=" margin-left: 5px;">
                          <p class="ml-2">GST NO - 33AAAFS1530K1ZJ</P>
                      </div>
                      <div class="d-flex">
                          <div class="">     
                            <h2 class="text-center fontsss m-0">Sunil Traders</h2>
                            <p class="text-center "><b class="ss">Raymond</b>SUITINGS</p>
                          </div>
                      </div>      
                      <div class="" style="text-align: end;margin-right: 5px;">
                           <P>Phno: 98408 13508<br>98416 03683<br>044-2538 0927</P>
                           <div class="d-flex justify-content-between mt-2 mb-2">
                              <p><b>INVOICE NO:</b></p>
                              <p class="bordersss"><b class="text-center"><?php echo 77; ?></b></p>
                           </div>
                           <div class="d-flex justify-content-between mt-2 mb-2">
                              <p><b>DATE:</b></p>
                              <p class="bordersss"><b class="text-center"><?php echo date('Y-m-d'); ?></b></p>
                           </div>
                      </div>
                   </div>
                <div class="container p-0">    
                        <div class="col-lg-12 p-0">
                          <p class=" p-0 m-0 text-center" style="font-size: 15px;">66 (New No.76), GODOWN STREET, 1st FLOOR, CHENNAI-600001  </p>
                       </div>
                      
                      <div class="col-lg-12 p-0">
                          <p class="text-center top-bottom-borders"><b style="font-size: 20px;">INVOICE</b></p>
                      </div>
                      <div class="d-flex ll">
                         <div class="right-border">
                          <div class="d-flex mt-3">
                              <h6 class="m-1 span-size">Customer Name:</h6>
                              <span class="span-tags me-3"></span>
                          </div>
                          <div class="d-flex justify-content-between mt-3">
                              <h6 class="m-1 span-size">Address</h6>
                              <span class="span-tags me-3"></span>
                          </div>
                          <div class="d-flex justify-content-between mt-3">
                              <h6 class="m-1 span-size">City</h6>
                              <span class="span-tags me-3"></span>
                          </div>
                          <!--<div class="d-flex justify-content-between mt-3">-->
                          <!--    <h6 class="m-1 span-size"  style="flex:none;">Phone no</h6>-->
                          <!--    <span class="span-tags me-3"></span>-->
                          <!--</div>-->
                       </div>  
                         <div class="">
                          <div class="d-flex justify-content-between  mt-3">
                              <div class="d-flex">
                                  <div class="d-flex justify-content-between">
                              <h6 class="m-1 span-size" style="flex: none;" >APP NO:</h6>
                              <span class="span-tags1"></span>
                              </div>
                                <div class="d-flex justify-content-between">
                                <h6 class="m-1 span-size">Date:</h6>
                              <span class="span-tags1"></span>
                              </div>
                              </div>
                          </div>
                          <div class="d-flex  mt-3">
                              <h6 class="m-1 span-size"  style="flex:none;">GST NO:</h6>
                              <span class="span-tags gst" style="padding-left: 2px;"></span>
                          </div>
                          <!--<div class="d-flex   mt-3">-->
                          <!--    <h6 class="m-1 span-size">Terms:</h6>-->
                          <!--    <span class="span-tags gst" style=" padding-left: 11px;">></span>-->
                          <!--</div>-->
                           <div class="d-flex  mt-3 mb-3">
                              <div class="d-flex">
                                <div class="d-flex justify-content-between">
                              <h6 class="m-1 span-size">Terms:</h6>
                              <span class="span-tags1" style="padding-left: 2px;"></span>
                              </div>
                                <div class="d-flex justify-content-between">
                                <h6 class="m-1 span-size">Through:</h6>
                              <span class="span-tags1"></span>
                              </div>
                              </div>
                          </div>
                          
                          <div class="d-flex  mt-3 mb-3">
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
                          <!--  <div class="d-flex mt-3 mb-3">-->
                          <!--    <h6 class="m-1 span-size ">Through:</h6>-->
                          <!--    <span class="span-tags gst"><?php echo 7777; ?></span>-->
                          <!--</div>-->

                      </div> 
                      
                
                      </div>  
            </div>
            
            
            
 <div class=" table-responsive">        
        <table class="table-design">
            <tr>
                <th>SI.NO</th>
                <th class="table-width">PARTICULAR</th>
                <th>HSN Code</th>
                <th>Meters/Cms</th>
                <th>Pieces</th>
                <th>Rate/Mtrs</th>
                <th>Amount</th>
            </tr>
  
            <tr class="table-data">
             <td>1</td>
             <td>fhgf</td>
             <td>fghfh</td>
             <td>7777</td>
             <td>dfsf</td>
             <td>fdgdg</td>
            </tr>
   
 
  <!--<br><br><br><br><br>-->
</table> 
    </div>                     <!--        <th>Particulars</th>-->
                   
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
                                 <h6 class="bank-details mb-0 text-center">Bank Details</h6>
                                 <div class="d-flex">
                                    <div class="rrbb">
                                       <p><b>Bank:</b>Central Bank of India</p>
                                       <p>Sowcarpet Branch,chennai</p>
                                       <p><b>Acc:no</b>8745965123</p>
                                       <p><b>IFSC Code:</b>2536984512</p>
                                    </div>  
                                    <div class="llbb">
                                       <p><b>Bank:</b>Central Bank of India</p>
                                       <p>Sowcarpet Branch,chennai</p>
                                       <p><b>Acc:no</b>8745965123</p>
                                       <p><b>IFSC Code:</b>2536984512</p>
                                    </div>   
                                 </div>
                                  <div class="borrdesss">
                                     <h6 class="ps-2"><b>NOTED:</b></h6>
                                     <p class="ps-2">1.The children of a row-flexbox container automatically</p>
                                     <p class="ps-2">2.The problem is that the right child is not behaving responsively.</p>
                                  </div> 
                                  <div class="d-flex justify-content-between">
                                      <h6><b>Net Amount No Less</b></h6>
                                      <span class="line"></span>
                                      <h6>TOTAL PIECES:<b>666</b></h6>
                                  </div>
                              </div>
                               <div class="">
                          <div class="fontsize">
                               <div class="d-flex justify-content-between">
                                  <h6 class="rights-brs fonts-size5">AMOUNT(RS)</h6>
                                  <span class="box-design">7777</span>
                               </div> 
                               
                               
                               
                               <div class="d-flex justify-content-between">
                                    <h6 class="rights-brs fonts-size5">IGST(7%)</h6>
                                    <span class="box-design">666</span>
                                </div>
                              
                               <div class="d-flex justify-content-between">
                                  <h6 class="rights-brs fonts-size5">CGST(4%)</h6>
                                  <span class="box-design">444</span>
                                </div> 
                                <div class="d-flex justify-content-between">
                                  <h6 class="rights-brs fonts-size5">SGST(6%)</h6>
                                  <span class="box-design">555</span>
                                </div>
                               
                                 
                              
                              
                                
                              
                                  
                             
                               
                               <div class="d-flex justify-content-between">
                                  <h6 class="rights-brs fonts-size6"><b>Total amount($)</b></h6>
                                  
                                      <span class="box-design">
                                        666
                                      </span>
                                 
                                  
                               </div> 
                               <div class="d-flex justify-content-between">
                                  <h6 class="rights-brs fonts-size5">ROUND OFF</h6>
                                  <span class="box-design">500</span>
                               </div> 
                               <div class="d-flex justify-content-between">
                                  <h6 class="rights-brs fonts-size6"><b>NET AMOUNT($)</b></h6>
                                  <span class="box-design">500</span>
                               </div> 
                         <!--      <div class="d-flex">-->
                         <!--         <h6 class="rights-brs"><b>SGST(2.5%)</b></h6>-->
                         <!--         <span class="box-design"></span>-->
                         <!--      </div> -->
                         <!--         <h6 class="rights-brs"><b></b></h6>-->
                         <!--         <h6 class="rights-brs"><b></b></h6>-->
                         <!--         <h6 class="rights-brs"><b></b></h6>-->
                         <!--<h6 class="rights-brs"><b></b></h6>-->
                         <!--    <h6 class="visibility"></h6>-->
                         <!--     <h6 style="font-size:13px"><b style="font-size:13px"></b></h6>-->
                         <!--     <p CLASS="M-0 p-0"><b style="font-size:17px"></b><p>-->
                          </div>
                          </div>
                            </div> 
                          <!-- <div class="modile-bill">-->
                          <!--    <div class="text-end fontsize">-->
                                 
                                  
                                  
                                  
                          <!--    </div>       -->
                          <!--</div>-->
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
                      
                      <div class="container">
                                              <div class=" mt-3 mb-3">
                              <div class="row">
                                  <div class="col-lg-4  justify-content-between">
                              <h6 class="m-1 span-size">Prepared by:</h6>
                              <span class="span-tags1"></span>
                              </div>
                                <div class="col-lg-4 justify-content-between">
                                <h6 class="m-1 span-size">checked by:</h6>
                              <span class="span-tags1"></span>
                              </div>
                              
                                <div class="col-lg-4 justify-content-between">
                                <h6 class="m-1 span-size">Buyer's Signature:</h6>
                              <span class="span-tags1"></span>
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
