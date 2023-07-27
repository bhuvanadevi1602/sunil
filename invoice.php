<?php 
include('./include/config.php'); 
?>

<style>
 
    #state_gst, #interstate_gst {
        display: none;
    }
    #gst_div
    {
        display:none;
    }

   #datatable_1 {
        display: none;
    }
    .card1 {
         display: none !important;
    }
</style>
        
 
  <?php include('header.php') ?>       
        <!-- Top Bar End -->
        <!-- Top Bar End -->
     <div class="page-wrapper">
      <div class="page-content-tab ">
                <div class="container-fluid">
                    <!-- Page-Title -->
                    <div class="container">
                     <div class="row">
                        <div class="col-sm-12">
                            <div class="page-title-box bg-light-alt text-center">
                                <h5 class="m-1"><b>INVOICE</b></h5>
                            </div>
                        </div> 
                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                           
                                    <div class="row mt-1">
                                            <!--<label class="control-label mb-1"><b>Customer Details</b></label>-->
                                                   <div class="col-sm-4 mb-1">
                                                       <?php
                                                          $sql="SELECT bill_id FROM estimate_slip ORDER BY bill_id DESC LIMIT 1";
                                                          $result=mysqli_query($conn,$sql);
                                                          $rec=mysqli_fetch_assoc($result);
                                                          $bill_id=$rec['bill_id'];
                                                         
                                                          if($bill_id=='')
                                                          {
                                                              $bill_id=$rec['bill_id']+1;
                                                              $bilL_id1="ES_".$bill_id;
                                                          }
                                                          else
                                                          {
                                                               
                                                             $id=explode('_',$bill_id);
                                                             
                                                             $count=$id[1]+1;
                                                             $bilL_id1="ES_".$count;
                                                          }
                                                          
                                                       ?>
                                                       <input id="bill_id" type="hidden" value="<?php echo $bilL_id1; ?>" name="bill_id" class="add_entry form-control cardss mt-2" required>
                                                            <label class="">Customer Name</label>
                                                            <input id="customer_name" type="text" value="" name="customer_name" class="add_entry form-control cardss mt-2" placeholder="" required>
                                                        </div>
                            
                                                    <div class="col-sm-4 ">
                                                            <label class="">Phon Number</label>
                                                            <input id="customer_contact" type="text" value="" name="customer_contact" class="add_entry form-control cardss mt-2" placeholder="" required>
                                                    </div>
                                                       <div class="col-sm-4 mb-2">
                                                            <label class="">HSN</label>
                                                            <input id="customer_contact" type="text" value="" name="customer_contact" class="add_entry form-control cardss mt-2" placeholder="" required>
                                                    </div>
                                                    
                                                    <!--<div class="col-sm-4">-->
                                                    <!--        <p class='text-danger mt-1' id="error_element"></p>-->
                                                    <!--</div>-->
                                            </div> 
                                            
                            
                                    <div id="particular_detail">
                                    
                                        <div class="row">
                                        <div class="col-lg-3 ">
                                         <div class="col-sm-3 form-control cardss aa measurement_unit">
                                                <input class="add_entry form-check-input " type="radio" name="measurement_unit" id="measurement_unit1" value="meter">
                                                 <label class="form-check-label" for="inlineRadio16"> Meter</label>
                                         </div>
                                       </div>  
                                       <div class="col-lg-3 "> 
                                         <div class="col-sm-3 form-control cardss bb measurement_unit">
                                                 <input class="add_entry form-check-input " type="radio" name="measurement_unit" id="measurement_unit2" value="pant_bit">
                                                 <label class="form-check-label" for="inlineRadio16">Pant Bit</label>
                                         </div>  
                                     </div>   
                                    <div class="col-lg-3 "> 
                                         <div class="col-sm-3 form-control cardss cc measurement_unit">
                                                 <input class="add_entry form-check-input" type="radio" name="measurement_unit" id="measurement_unit3" value="combo_set">
                                                 <label class="form-check-label" for="inlineRadio16">Combo Set</label>
                                         </div>  
                                      </div>    
                                       <div class="col-lg-3 "> 
                                         <div class="col-sm-3 form-control cardss dd measurement_unit">
                                                 <input class="add_entry form-check-input " type="radio" name="measurement_unit" id="measurement_unit4" value="shirt">
                                                 <label class="form-check-label" for="inlineRadio16">Shirt</label>
                                         </div>
                                         </div>
                                    </div>
                                               
                                            
                                        <div class="row">
                                               <div class="col-lg-3 mt-1">
                                                    <div class="input-group">
                                                        <div class="input-group-text a">Particular</div>
                                                            <input type="text" class="add_entry form-control" id="particular" name="particular" placeholder="Particular" >
                                                        </div>
                                                </div>  
                                                
                                                <div class="col-lg-3 mt-1">
                                                    <div class="input-group">
                                                        <div class="input-group-text b">Meters</div>
                                                        <input type="number" class="add_entry form-control" id="meter" name="meter" placeholder="Meters" >
                                                    </div>
                                                </div> 
                                                
                                                <div class="col-lg-3 mt-1" >
                                                    <div class="input-group">
                                                        <div class="input-group-text c">Pieces</div>
                                                        <input type="text" class="add_entry form-control" id="pieces" name="pieces" placeholder="Pieces" >
                                                    </div>
                                                </div> 
                                                
                                                <div class="col-lg-3 mt-1">
                                                    <div class="input-group">
                                                        <div class="input-group-text d">Rate</div>
                                                        <input type="number" class="add_entry form-control" id="rate" name="rate" placeholder="Rate" >
                                                    </div>
                                                </div> 
                                             
                                             </div>
                                            
                                    </div>
                                        

                              

                  
     

  </div>
         
              <div class="row">
                    <div class="col-12">
                        <div class="card1">
                            <div class="card-header1">
                                <!--<h4 class="card-title">Customers Details </h4>-->
                            </div><!--end card-header-->
                    
                    
                                    <table class="table3" id="datatable_1">
                                        
                                      </table>
                                
                            
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->



                
                


        </form> 

                <div class="row mt-1">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Particulars Details</h4>
                            </div><!--end card-header-->
                            <div class="card-body">
                                <div class="table-responsive" >
                                    <table class="table">
                                        <thead class="thead-light">
                                          <tr>
                                            <th>Particular</th>
                                            <th>Meter's</th>
                                            <th>Pieces</th>
                                            <th>Rate</th>
                                            <th>Amount</th>
                                            <th>Action</th>
                                          </tr>
                                        </thead>
                                        <tbody id="particulars_row">
                                           
                                            
                                         
                                            
                                            
                                        </tbody>
                                    </table>
                                    <!--<button type="button" class="btn btn-sm btn-de-primary csv">Export CSV</button>-->
                                    <!--<button type="button" class="btn btn-sm btn-de-primary sql">Export SQL</button>-->
                                    <!--<button type="button" class="btn btn-sm btn-de-primary txt">Export TXT</button>-->
                                    <!--<button type="button" class="btn btn-sm btn-de-primary json">Export JSON</button>-->
                           
                                </div>
                                          <div class="d-flex">
                              <div class=""> 
                              
                              <button type="button" style="border-color:#22b783"; class="btn btn-de-success btn-sm print_bill" data-bs-toggle="modal" data-bs-target="#exampleModalRequest"><input type='hidden' id='cus_id'><a href='https://udhaarsudhaar.co.in/sunil/bill.php' target='_blank' id='bill_href'><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-download align-self-center icon-xs me-2"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="7 10 12 15 17 10"></polyline><line x1="12" y1="15" x2="12" y2="3"></line></svg>Print</a></button>
                                 </div>
                                 <div style="margin-left: 15px;">  
                                              <button class="btn btn-outline-primary btn-sm mb-1 mb-xl-0" id="save_refresh">Save</button></td>
                                 </div>
                                 </div>
                            </div>
                           
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->
                           
                            
                                        <div class="row">
                                          <div class="col-md-3">
                                            <label class=" control-label"><b>Is GST Aplicable?</b></label>
                                            <div class="offset-md-1">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="gst_status" id="gst_yes" value="gst_yes">
                                                    <label class="form-check-label" for="inlineRadio16">Yes</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="gst_status" id="gst_no" value="gst_yes">
                                                    <label class="form-check-label" for="inlineRadio20">No</label>
                                                </div>
                                                <!--<div class="form-check form-check-inline">-->
                                                <!--    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3">-->
                                                <!--    <label class="form-check-label" for="inlineRadio3">Javascript</label>-->
                                                <!--</div>-->
                                            </div>
                                    </div>
                                
                  
                                    <div class="col-md-3" >   
                                    <div id="gst_div">
                                        <label class="control-label"><b>GST Type</b></label>
                                        <div class=" offset-lg-1 mb-2" id="gst_type">
                                                <div class="form-check form-check-inline" id="state">
                                                    <input class="form-check-input" type="radio" name="gst_type" id="inlineRadio14" value="state_gst">
                                                    <label class="form-check-label" for="inlineRadio14">State</label>
                                                </div>
                                                <div class="form-check form-check-inline" id="interstate">
                                                    <input class="form-check-input" type="radio" name="gst_type" id="inlineRadio23" value="interstate_gst">
                                                    <label class="form-check-label" for="inlineRadio23">Interstate</label>
                                                </div>
                                        </div>
                                    </div>
                                </div>   
                                
                                                   <div class="col-lg-3 offset-sm-1 ">
                                                        <div class="mt-0">
                                                            <div class="col-lg-4 offset-lg-8 mb-1 " style="width: 100%;">
                                                                <div class="input-group">
                                                                    <div class="input-group-text">Sub Total</div>
                                                                        <input type="text" class="form-control" id="sub_total" placeholder="Sub Total">
                                                                    </div>
                                                                </div>
                                                            </div>  
                                          
                                                            <div class="col-lg-4 offset-lg-8 mb-1 " style="width: 100%;">
                                                                <div class="input-group">
                                                                    <div class="input-group-text">Discount of Amount</div>
                                                                        <input type="text" class="form-control" id="discount_amount" name="discount_amount" placeholder="0.0">
                                                                    </div>
                                          
                                                                </div> 
                           
                   
                                                            <div class="col-lg-4 offset-lg-8 mb-1" style="width: 100%;">
                                                                <div class="input-group">
                                                                    <div class="input-group-text">Total</div>
                                                                        <input type="text" class="form-control" id="total_amount" placeholder="Total">
                                                                    </div>
                                                                </div>
                                                                
                                                    <div>           
                                                     <div id="state_gst">
                                                              <div class="col-lg-4 offset-lg-8 mb-1" style="width: 100%;">
                                                                <div class="input-group">
                                                                    <div class="input-group-text">CGST</div>
                                                                    <input type="text" class="form-control" id="cgst" placeholder="CGST" >
                                                                </div>
                                                             </div>
                                                            <div class="col-lg-4 offset-lg-8 mb-1" style="width: 100%;">
                                                                <div class="input-group">
                                                                    <div class="input-group-text">SGST</div>
                                                                    <input type="text" class="form-control" id="sgst" placeholder="SGST">
                                                                </div>
                                                            </div>
                                                     </div>
                                                     <div id="interstate_gst">
                                                         <div class="col-lg-4 offset-lg-8 mb-1" style="width: 100%;">
                                                            <div class="input-group">
                                                                <div class="input-group-text">IGST</div>
                                                                <input type="text" class="form-control" id="igst" placeholder="IGST" >
                                                            </div>
                                                        </div>
                                                     </div>
                                                       
                                                        
                                                    </div>
                                                        <div class="col-lg-4 offset-lg-8 mb-1" style="width: 100%;">
                                                            <div class="input-group">
                                                                <div class="input-group-text">Net Amount</div>
                                                                <input type="text" class="form-control" id="net_amount" placeholder="Net Amount">
                                                            </div>
                                                        </div>
                                                </div>
                                            </div>                 
                                        </div>
       
    
       
          <!--<div class="col-lg-6">-->
          <!--                              <div id="state_gst" class="mb-2">-->
          <!--                                  <div class="row">-->
          <!--                                      <div class="col-lg-6 ">-->
          <!--                                      <div class=" offset-md-1 mb-3">-->
          <!--                                        <label class="visually-hidden" for="inlineFormInputGroupUsername">Username</label>-->
          <!--                                        <div class="input-group">-->
          <!--                                          <div class="input-group-text a">CGST</div>-->
          <!--                                          <input type="text" class="form-control"  name="cgst" id="inlineFormInputGroupUsername" placeholder="Username">-->
          <!--                                        </div>-->
          <!--                                      </div>-->
          <!--                                    </div> -->
                                              
          <!--                                    <div class="col-lg-6">-->
          <!--                                      <div class=" offset-md-1  ml-2">-->
          <!--                                        <label class="visually-hidden" for="inlineFormInputGroupUsername">Username</label>-->
          <!--                                        <div class="input-group">-->
          <!--                                          <div class="input-group-text c">SGST</div>-->
          <!--                                          <input type="text" class="form-control" name="sgst" id="inlineFormInputGroupUsername" placeholder="Username">-->
          <!--                                        </div>-->
          <!--                                      </div>-->
          <!--                                  </div>  -->
          <!--                              </div>-->
          <!--                              </div>   -->
                                
          <!--                              <div id="state_gsts" class="mb-2">-->
          <!--                          <div class="col-lg-6">-->
          <!--                                <div class=" mb-1  mt-1">-->
          <!--                                <label class="visually-hidden" for="inlineFormInputGroupUsername">Username</label>-->
          <!--                                <div class="input-group">-->
          <!--                                  <div class="input-group-text d">IGST</div>-->
          <!--                                  <input type="text" class="form-control" name="igst" id="inlineFormInputGroupUsername" placeholder="Username">-->
          <!--                                </div>-->
          <!--                              </div>-->
          <!--                                 </div>-->
          <!--                              </div> -->
                                        
          <!--                              </div>-->
          
          
          
          
          
                        <!-- <div class="row">
                        <div class="col-sm-12">
                            <div class="page-title-box">
                                <div class="float-end">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#">Unikit</a>
                                        </li>
                                       
                                        <li class="breadcrumb-item"><a href="#">Crypto</a>
                                        </li>
                                        
                                        <li class="breadcrumb-item active">Exchange</li>
                                    </ol>
                                </div>
                                <h4 class="page-title">Exchange</h4>
                            </div>

                        </div>
                      
                    </div>
                end page title end breadcrumb -->
                   

                    
            <!-- container -->

                <!--Start Rightbar-->
                <!--Start Rightbar/offcanvas-->
                <div class="offcanvas offcanvas-end" tabindex="-1" id="Appearance" aria-labelledby="AppearanceLabel">
                    <div class="offcanvas-header border-bottom">
                      <h5 class="m-0 font-14" id="AppearanceLabel">Appearance</h5>
                      <button type="button" class="btn-close text-reset p-0 m-0 align-self-center" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">  
                        <h6>Account Settings</h6>
                        <div class="p-2 text-start mt-3">
                            <div class="form-check form-switch mb-2">
                                <input class="form-check-input" type="checkbox" id="settings-switch1">
                                <label class="form-check-label" for="settings-switch1">Auto updates</label>
                            </div><!--end form-switch-->
                            <div class="form-check form-switch mb-2">
                                <input class="form-check-input" type="checkbox" id="settings-switch2" checked>
                                <label class="form-check-label" for="settings-switch2">Location Permission</label>
                            </div><!--end form-switch-->
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="settings-switch3">
                                <label class="form-check-label" for="settings-switch3">Show offline Contacts</label>
                            </div><!--end form-switch-->
                        </div><!--end /div-->
                        <h6>General Settings</h6>
                        <div class="p-2 text-start mt-3">
                            <div class="form-check form-switch mb-2">
                                <input class="form-check-input" type="checkbox" id="settings-switch4">
                                <label class="form-check-label" for="settings-switch4">Show me Online</label>
                            </div><!--end form-switch-->
                            <div class="form-check form-switch mb-2">
                                <input class="form-check-input" type="checkbox" id="settings-switch5" checked>
                                <label class="form-check-label" for="settings-switch5">Status visible to all</label>
                            </div><!--end form-switch-->
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="settings-switch6">
                                <label class="form-check-label" for="settings-switch6">Notifications Popup</label>
                            </div><!--end form-switch-->
                        </div><!--end /div-->               
                    </div><!--end offcanvas-body-->
                </div>
                <!--end Rightbar/offcanvas-->
                 <!--end Rightbar-->
              </div>
              </div>
              </div>
              
              
                </div>   
                <!--Start Footer-->
                <!-- Footer Start -->
              <?php include('footer.php') ?>   
                <!-- end Footer -->                
                <!--end footer-->
       
            <!-- end page content -->
        
        <!-- end page-wrapper -->

        <!-- Javascript  -->   
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="assets/plugins/apexcharts/apexcharts.min.js"></script>
        <script src="assets/pages/crypto-exchange.init.js"></script>
        <!-- App js -->
        <script src="assets/js/app.js"></script>
   <script>
             $(document).ready(function(){
                $("#gst_yes").click(function(){
                  $("#gst_div").css('display','block');
                //   $("#gst_div").css('display','none');
                // alert('hii');
                });
            });
            $(document).ready(function(){
                $("#gst_no").click(function(){
                //   $("#gst_div").css('display','block');
                  $("#gst_div").css('display','none');
                // alert('hii');
                });
            });
            $(document).ready(function(){
                $("#state").click(function(){
                  $("#state_gst").css('display','block');
                   $("#state_gsts").css('display','none');
                // alert('hii');
                });
            });
            $(document).ready(function(){
                $("#interstate").click(function(){
                  $("#state_gsts").css('display','block');
                   $("#state_gst").css('display','none');
                // alert('hii');
                });
            });
            
            $('.measurement_unit').click(function(){
                $(this).find('input').prop('checked',true);
               var measurement_unit=$(this).find('input').val();
               
               if(measurement_unit=='meters')
               {
                   $('#variable_field').html('');
                   $('#variable_field').append('<div class="input-group"><div class="input-group-text">Meters</div><input type="text" class="form-control" id="meters" name="meters" placeholder="Meters"></div>');
               }
               else
               {
                   $('#variable_field').html('');
                   $('#variable_field').append('<div class="input-group"><div class="input-group-text">Pieces</div><input type="text" class="form-control" id="pieces" name="pieces" placeholder="Pieces"></div>');
               }
            });
            
            $('#pieces').on('keyup',function(){
               var pieces=$('#pieces').val();
               var rate=$('#rate').val();
               var sub
               alert(particular*rate);
            });
        </script>



    </body>
    <!--end body-->
</html>