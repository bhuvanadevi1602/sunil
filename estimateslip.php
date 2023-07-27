<?php include('header.php') ?>      
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



          
        <!-- Top Bar End -->
        <!-- Top Bar End -->

        <div class="page-wrapper">

            <!-- Page Content-->
            <div class="page-content-tab ">
                <div class="container-fluid">
                    <!-- Page-Title -->
                    <div class="container">
                     <div class="row">
                        <div class="col-sm-12">
                            <div class="page-title-box bg-light-alt text-center">
                                <h5 class="m-1"><b>ESTIMATE SLIP</b></h5>
                            </div>
                        </div> 
                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                           
                                    <div class="row mt-1">
                                        <div class="col-sm-2 mb-1">
                                            <?php
                                                          $sql="SELECT bill_id FROM estimate_slip_final ORDER BY est_no DESC LIMIT 1";
                                                          $result=mysqli_query($conn,$sql);
                                                          $rec=mysqli_fetch_assoc($result);
                                                          $bill_id=$rec['bill_id'];
                                               
                                                           if($bill_id=="")
                                                            {
                                                                
                                                               $bilL_id1="ES_"."1";  
                                                                 
                                                            }
                                                            
                                                            else 
                                                            {
                                                               
                                                                $id=explode('_',$bill_id);
                                                                 
                                                                $count=$id[1]+1;
                                                                $bilL_id1="ES_".$count;
                                                                
                                                            }
                                                        
                                                        
                                                       ?>
                                                           
                                                    <input id="bill_id" type="text" value="<?php echo $bilL_id1; ?>" name="bill_id" class="add_entry form-control cardss mt-2" required> 
                                        </div>
                                        <div class="col-sm-2 mb-1">
                                            
                                            <select name="yearpicker" id="yearpicker" class="add_entry form-control cardss mt-2"></select>
                                        </div>
                                    </div>
                           
                                    <div class="row mt-1">
                                            <!--<label class="control-label mb-1"><b>Customer Details</b></label>-->
                                            
                                                       
                                                      
                                                   <div class="col-sm-4 mb-1">
                                                       
                                                            <label class="">Customer Name</label>
                                                            <input id="customer_name" type="text" value="" name="customer_name" class="add_entry form-control cardss mt-2 enter" placeholder="" required>
                                                    </div>
                            
                                                    <div class="col-sm-4 mb-1">
                                                            <label class="">Phon Number</label>
                                                            <input id="customer_contact" type="text" value="" name="customer_contact" class="add_entry form-control cardss mt-2 enter" placeholder="" required>
                                                    </div>
                                                    
                                                    <div class="col-sm-4 mt-4">
                                                            <p class='text-danger mt-1' id="error_element"></p>
                                                    </div>
                                            </div> 
                                            
                            
                                    <div id="particular_detail">
                                    
                                        <div class="row">
                                        <div class="col-lg-3 ">
                                         <div class="col-sm-3 form-control cardss aa measurement_unit">
                                                <input class="add_entry form-check-input " type="radio" name="measurement_unit" id="measurement_unit1" value="meter">
                                                 <label class="form-check-label" for="inlineRadio16">Meter</label>
                                         </div>
                                       </div>  
                                        <div class="col-lg-3"> 
                                         <div class="col-sm-3 form-control cardss bb measurement_unit">
                                                 <input class="add_entry form-check-input " type="radio" name="measurement_unit" id="measurement_unit2" value="pant_bit">
                                                 <label class="form-check-label" for="inlineRadio16">Pant Bit</label>
                                         </div>  
                                     </div>   
                                        <div class="col-lg-3"> 
                                         <div class="col-sm-3 form-control cardss cc measurement_unit">
                                                 <input class="add_entry form-check-input " type="radio" name="measurement_unit" id="measurement_unit3" value="combo_set">
                                                 <label class="form-check-label" for="inlineRadio16">Combo Set</label>
                                         </div>  
                                      </div>    
                                        <div class="col-lg-3"> 
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
                                                            <input type="text" class="add_entry form-control enter" id="particular" name="particular" placeholder="Particular" >
                                                        </div>
                                                </div>  
                                                
                                                <div class="col-lg-3 mt-1">
                                                    <div class="input-group">
                                                        <div class="input-group-text b">Meters</div>
                                                        <input type="number" class="add_entry form-control enter" id="meter" name="meter" placeholder="Meters" >
                                                    </div>
                                                </div> 
                                                
                                                <div class="col-lg-3 mt-1" >
                                                    <div class="input-group">
                                                        <div class="input-group-text c">Pieces</div>
                                                        <input type="text" class="add_entry form-control enter" id="pieces" name="pieces" placeholder="Pieces" >
                                                    </div>
                                                </div> 
                                                
                                                <div class="col-lg-3 mt-1">
                                                    <div class="input-group">
                                                        <div class="input-group-text d">Rate</div>
                                                        <input type="number" class="add_entry form-control enter" id="rate" name="rate" placeholder="Rate" >
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
                                   
                                </div>
                                          <div class="d-flex">
                              <div class=""> 
                              
                              <button type="button" style="border-color:#22b783"; class="btn btn-de-success btn-sm print_bill" data-bs-toggle="modal" data-bs-target="#exampleModalRequest"><input type='hidden' id='cus_id'><a href='https://udhaarsudhaar.org.in/sunil/bill.php' target='_blank' id='bill_href'><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-download align-self-center icon-xs me-2"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="7 10 12 15 17 10"></polyline><line x1="12" y1="15" x2="12" y2="3"></line></svg>Print</a></button>
                                 </div>
                                 <div style="margin-left: 15px;" id="save_date_div">  
                                        <button class="btn btn-outline-primary btn-sm mb-1 mb-xl-0" id="save_refresh">Save</button></td>
                                 </div>
                                 </div>
                            </div>
                           
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->
                           
                           <div class="container">
                                        <div class="row">
                                          <div class="col-md-4">
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
 
                                            </div>
                                            <div class="row mt-3 ">
                                                <div class="col-lg-8  d-flex">
                                           
                                                                                        <label class=" control-label mb-2"><b>Mode Of Payment</b></label>
                                                                        <form action="/action_page.php">                  
                                                                                        
                                                                                        <select name="cars" id="payment_mode">
                                                                     <option value="CASH">CASH</option>
                                                                          <option value="ONLINE PAYMENT">ONLINE PAYMENT</option>
                                                                      
                                                                </select>
  
                                                                  </form>
                                                                  </div> 
                                                                    <div class="col-lg-4  ml-2 d-flex">
                                                                   <div class="input-group ml-2">
                                                        <div class="input-group-text c kk">Pieces</div>
                                                        <input type="text" class="add_entry form-control" id="pieces_count" name="pieces_count"  >
                                                    </div>
                                                    </div>
                                                     </div>
                                                    
                                    </div>
                                
                  
                                    <div class="col-md-4" >   
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
                                
                                                   <div class="col-lg-3">
                                                        <div class="mt-0">
                                                            <div class="col-lg-4 offset-lg-4 mb-1 " style="width: 100%;">
                                                                <div class="input-group">
                                                                    <div class="input-group-text">Sub Total</div>
                                                                        <input type="text" class="form-control" id="sub_total" placeholder="Sub Total">
                                                                    </div>
                                                                </div>
                                                            </div>  
                                          
                                                            <div class="col-lg-4 offset-lg-4 mb-1 " style="width: 100%;">
                                                                <div class="input-group">
                                                                    <div class="input-group-text">Discount of Amount</div>
                                                                        <input type="text" class="form-control" id="discount_amount" name="discount_amount" placeholder="0.0">
                                                                    </div>
                                          
                                                                </div> 
                           
                   
                                                            <div class="col-lg-4 offset-lg-4 mb-1" style="width: 100%;">
                                                                <div class="input-group">
                                                                    <div class="input-group-text">Total</div>
                                                                        <input type="text" class="form-control" id="total_amount" placeholder="Total">
                                                                    </div>
                                                                </div>
                                                                
                                                    <div>           
                                                     <div id="state_gst">
                                                              <div class="col-lg-4 offset-lg-4 mb-1" style="width: 100%;">
                                                                <div class="input-group">
                                                                    <div class="input-group-text">CGST</div>
                                                                    <input type="text" class="form-control" id="cgst" placeholder="CGST" >
                                                                    <input class="form-control" type="text" id="cgst_amount" name="cgst_amount" readonly>
                                                                </div>
                                                             </div>
                                                            <div class="col-lg-4 offset-lg-4 mb-1" style="width: 100%;">
                                                                <div class="input-group">
                                                                    <div class="input-group-text">SGST</div>
                                                                    <input type="text" class="form-control" id="sgst" placeholder="SGST">
                                                                    <input class="form-control" type="text" id="sgst_amount" name="sgst_amount" readonly>
                                                                </div>
                                                            </div>
                                                     </div>
                                                     <div id="interstate_gst">
                                                         <div class="col-lg-4 offset-lg-4 mb-1" style="width: 100%;">
                                                            <div class="input-group">
                                                                <div class="input-group-text">IGST</div>
                                                                <input type="text" class="form-control" id="igst" placeholder="IGST" >
                                                                <input class="form-control" type="text" id="igst_amount" name="igst_amount" readonly>
                                                            </div>
                                                        </div>
                                                     </div>
                                                       
                                                        
                                                    </div>
                                                        <div class="col-lg-4 offset-lg-4 mb-1" style="width: 100%;">
                                                            <div class="input-group">
                                                                <div class="input-group-text">Net Amount</div>
                                                                <input type="text" class="form-control" id="net_amount" placeholder="Net Amount">
                                                            </div>
                                                        </div>
                                                </div>
                                            </div>                 
                                        </div>
       
    
       
                    
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
                <!-- end Footer -->                
                <!--end footer-->
            <!-- end page content -->

        <!-- age-wrapper -->



    
    <!--end body-->
 <?php include('footer.php') ?>    
 
<script>
        $("#customer_name").focus();
        $('.measurement_unit').click(function(){
  
            var measurement_unit=$(this).find('input').prop('checked', true).val();  
            $("#particular").focus();
            if(measurement_unit=='combo_set')
            {
                $('#meter').attr('disabled','disabled');
                $('#meter').removeClass('enter');
                $('#pieces').removeAttr('disabled');
                
            }
            else if(measurement_unit=='shirt')
            {
                $('#meter').attr('disabled','disabled');
                $('#pieces').removeAttr('disabled');
                $('#meter').removeClass('enter');
            }
            else if(measurement_unit=='meter')
            {
                
                $('#meter').removeAttr('disabled');
                $('#meter').addClass('enter');
            }
            else if(measurement_unit=='pant_bit')
            {
                $('#meter').addClass('enter');
                $('#meter').removeAttr('disabled');
               
            }
        });
             $(document).ready(function(){
                $("#gst_yes").click(function(){
                  $("#gst_div").css('display','block');
                
                });
            });                                                                                                                   
            $(document).ready(function(){
                $("#gst_no").click(function(){
                
                  $("#gst_div").css('display','none');
                  $("#interstate_gst").css('display','none');
                  $("#state_gst").css('display','none');
                
                });
            });
            $(document).ready(function(){
                $("#state").click(function(){
                  $("#state_gst").css('display','block');
                   $("#interstate_gst").css('display','none');
                   $('#cgst').val('');
                   $('#sgst').val('');
                
                });
            });
            $(document).ready(function(){
                $("#interstate").click(function(){
                  $("#interstate_gst").css('display','block');
                   $("#state_gst").css('display','none');
                   $('#igst').val('');
                
                });
            });
            
           
</script>


<script>
$(".enter").keyup(function (event) {
    if (event.keyCode == 13) {
        textboxes = $("input.enter");
        currentBoxNumber = textboxes.index(this);
        if (textboxes[currentBoxNumber + 1] != null) {
            nextBox = textboxes[currentBoxNumber + 1];
            nextBox.focus();
            nextBox.select();
        }
        event.preventDefault();
        return false;
    }
});
   $('.add_entry').keypress(function(event) {
   var key =  event.which || event.keyCode;
   if(key == 13)
    {
        
        
        var meter_dis=$('#meter').attr('disabled');
        var yearpicker=$('#yearpicker').val();
        var pieces_dis=$('#pieces').attr('disabled');
        var cus_name=$('#customer_name').val();
        var cus_contact=$('#customer_contact').val();
            if(particular==''||meter==''||pieces==''||rate=='')
            {
                $('#error_element').html('Please fill all the field');
            }
            else
            {
                $('#error_element').html('');
                var measurement_unit=$('.measurement_unit').find('input[name="measurement_unit"]:checked').val(); 
       
                var bill_id=$('#bill_id').val();
                
                var particular=$('#particular').val();
                var meter=parseFloat($('#meter').val());
                 
                var pieces=$('#pieces').val();
                var rate=parseFloat($('#rate').val()).toFixed(2);
        
        if(meter_dis=='disabled')
        {
          var meter='0';    
          var amount=pieces*rate;  
        }
        else if(measurement_unit=='pant_bit'&&meter_dis==undefined)
        {
            var amount=rate;
        }
        else
        {
           
            var amount=meter*rate;
        }
        
        $.ajax({
            url:'ajax_request.php?action=add_product_entry',
            type:'POST',
            dataType:'json',
            data:{'bill_id':bill_id,'cus_name':cus_name,'cus_contact':cus_contact,'measurement_unit':measurement_unit,'particular':particular,'meter':meter,'pieces':pieces,'rate':rate,'amount':amount,'yearpicker':yearpicker},
            success:function(result_job)
            {
                if(result_job.status==1)
                {
                    $("#particular").focus();
                    $("#particular").val('');
                    $("#meter").val('');
                    $("#pieces").val('');
                    $("#rate").val('');
                    
                    var count=result_job.data.length;
                   
                    $('#particulars_row').html('');
                    var sub_total=0;
                    var pieces_count=0;
                    for(var i=0;i<count;i++)
                    {
                        var rest_amount=parseFloat(result_job.data[i].amount);
                        var meters=parseFloat(result_job.data[i].meters);
                        $('#particulars_row').append('<tr id="row_'+result_job.data[i].est_no+'"><td id="td_particular">'+result_job.data[i].particular+'</td><td id="td_meter">'+meters.toFixed(2)+'</td><td id="td_pieces">'+result_job.data[i].pieces+'</td><td id="td_rate">'+result_job.data[i].rate+'</td><td id="td_amount_'+i+'">'+rest_amount.toFixed(2)+'</td><td><button class="btn btn-outline-primary btn-sm mb-1 mb-xl-0 remove_particular1" id="'+result_job.data[i].est_no+','+result_job.data[i].bill_id+'">Remove</button></td></tr>')
                        
                        sub_total=rest_amount+sub_total;
                        pieces_count=parseInt(result_job.data[i].pieces)+parseInt(pieces_count);
                        
                    }
                    $('#pieces_count').val(pieces_count);
                    $('#sub_total').val(sub_total.toFixed(2));
                    var discount=$('#discount_amount').val();
                    
                    var gst_type=$("input[name='gst_type']:checked").val();
                    var cgst=$('#cgst').val();
                    var sgst=$('#sgst').val();
                    var igst=$('#igst').val();
                    
                            if(discount=='' && typeof gst_type=="undefined"&&cgst==''&&sgst==''&&igst=='')
                            {
                                
                                $('#total_amount').val(sub_total.toFixed(2));
                                $('#net_amount').val(sub_total.toFixed());
                            }
                            else if((discount==''||discount=='0.00')&&typeof gst_type=="undefined"&&cgst!=''&&sgst!=''&&igst=='')
                            {
                               
                                $('#total_amount').val(sub_total.toFixed(2));
                                var total_amount=$('#total_amount').val();
                                var cgst=$('#cgst').val();
                                var sgst=$('#sgst').val();
                                var cgst_amount=(total_amount/100)*cgst;
                                var sgst_amount=(total_amount/100)*sgst;
                                var net_amount=parseFloat(total_amount)+parseFloat(cgst_amount)+parseFloat(sgst_amount);
                                $('#cgst_amount').val(cgst_amount.toFixed(2));
                                $('#sgst_amount').val(sgst_amount.toFixed(2));
                                $('#net_amount').val(net_amount.toFixed());
                            }
                            else if(discount!=''&&typeof gst_type=="undefined"&&cgst!=''&&sgst!=''&&igst=='')
                            {
                                
                                var total_amount=sub_total.toFixed(2)-discount;
                                $('#total_amount').val(total_amount);
                                var cgst=$('#cgst').val();
                                var sgst=$('#sgst').val();
                                var cgst_amount=(total_amount/100)*cgst;
                                var sgst_amount=(total_amount/100)*sgst;
                                var net_amount=parseFloat(total_amount)+parseFloat(cgst_amount)+parseFloat(sgst_amount);
                                $('#cgst_amount').val(cgst_amount.toFixed(2));
                                $('#sgst_amount').val(sgst_amount.toFixed(2));
                                $('#net_amount').val(net_amount.toFixed());
                                
                            }
                            else if((discount==''||discount=='0.00')&&typeof gst_type=="undefined"&&cgst==''&&sgst==''&&igst!='')
                            {
                                $('#total_amount').val(sub_total.toFixed(2));
                                var total_amount=$('#total_amount').val();
                                var igst=$('#igst').val();
                                var igst_amount=(total_amount/100)*igst;
                                var net_amount=parseFloat(total_amount)+parseFloat(igst_amount);
                                $('#igst_amount').val(igst_amount.toFixed(2));
                                $('#net_amount').val(net_amount.toFixed());
                            }
                            else if(discount!=''&&typeof gst_type=="undefined"&&cgst==''&&sgst==''&&igst!='')
                            {
                                var total_amount=sub_total.toFixed(2)-discount;
                                $('#total_amount').val(total_amount);
                                var igst=$('#igst').val();
                                var igst_amount=(total_amount/100)*igst;
                                var net_amount=parseFloat(total_amount)+parseFloat(igst_amount);
                                $('#igst_amount').val(igst_amount.toFixed(2));
                                $('#net_amount').val(net_amount.toFixed());
                               
                            }
                            else if(discount!='' && typeof gst_type=="undefined")
                            {
                                
                                var tot_amount=sub_total.toFixed(2)-discount;
                                $('#total_amount').val(tot_amount.toFixed(2));
                                $('#net_amount').val(tot_amount.toFixed());
                            }
                            else if(discount==''&&gst_type=='state_gst')
                            {
                                $('#total_amount').val(sub_total.toFixed(2));
                                var total_amount=$('#total_amount').val();
                                var cgst=$('#cgst').val();
                                var sgst=$('#sgst').val();
                                var cgst_amount=(total_amount/100)*cgst;
                                var sgst_amount=(total_amount/100)*sgst;
                                var net_amount=parseFloat(total_amount)+parseFloat(cgst_amount)+parseFloat(sgst_amount);
                                $('#cgst_amount').val(cgst_amount.toFixed(2));
                                $('#sgst_amount').val(sgst_amount.toFixed(2));
                                $('#net_amount').val(net_amount.toFixed());
                                
                            }
                            else if(discount==''&&gst_type=='interstate_gst')
                            {
                               
                                $('#total_amount').val(sub_total.toFixed(2));
                                var total_amount=$('#total_amount').val();
                                var igst=$('#igst').val();
                                var igst_amount=(total_amount/100)*igst;
                                var net_amount=parseFloat(total_amount)+parseFloat(igst_amount);
                                $('#igst_amount').val(igst_amount.toFixed(2));
                                $('#net_amount').val(net_amount.toFixed());
                                
                            }
                            else if(discount!=''&&gst_type=='state_gst')
                            {
                                var total_amount=sub_total.toFixed(2)-discount;
                                $('#total_amount').val(total_amount);
                                var cgst=$('#cgst').val();
                                var sgst=$('#sgst').val();
                                var cgst_amount=(total_amount/100)*cgst;
                                var sgst_amount=(total_amount/100)*sgst;
                                var net_amount=parseFloat(total_amount)+parseFloat(cgst_amount)+parseFloat(sgst_amount);
                                $('#cgst_amount').val(cgst_amount.toFixed(2));
                                $('#sgst_amount').val(sgst_amount.toFixed(2));
                                $('#net_amount').val(net_amount.toFixed());
                            }
                            else if(discount!=''&&gst_type=='interstate_gst')
                            {
                                var total_amount=sub_total.toFixed(2)-discount;
                                $('#total_amount').val(total_amount);
                                var igst=$('#igst').val();
                                var igst_amount=(total_amount/100)*igst;
                                var net_amount=parseFloat(total_amount)+parseFloat(igst_amount);
                                $('#igst_amount').val(igst_amount.toFixed(2));
                                $('#net_amount').val(net_amount.toFixed());
                                
                            }
                    
                    
                    $('#cus_id').val(result_job.data[0].id);
                    $('.remove_particular1').on('click',function(){
                        var yearpicker=$('#yearpicker').val();
                        
                        var delete_rec=$(this).attr('id');
                        var arr=delete_rec.split(',');
                        var id=arr[0];
                        var bill_id=arr[1];
                        $.ajax({
                            url:'ajax_request.php',
                            type:'POST',
                            dataType:'json',
                            data:{'action':'delete_entry','id':id,'bill_id':bill_id,'yearpicker':yearpicker},
                            success:function(result_job){
                                 $('#row_'+id+'').load(location.href+' #row_'+id+''); 
                                
                                 $('#sub_total').val(result_job.data[0].sub_total);
                                 $('#pieces_count').val(result_job.data[0].pieces_count);
                                 if(result_job.status==1)
                                 {
                                     var sub_tot=$('#sub_total').val();
                                     var net_amount=$('#net_amount').val();
                                     var discount_amount=$('#discount_amount').val();
                                     var cgst=$('#cgst').val();
                                     var sgst=$('#sgst').val();
                                     var igst=$('#igst').val();
                                     
                                     var total_amount=sub_tot-discount_amount;
                                     var cgst_amount=(total_amount/100)*cgst;
                                     var sgst_amount=(total_amount/100)*sgst;
                                     var igst_amount=(total_amount/100)*igst;
                                     var gst_type=$("input[name='gst_type']:checked").val();
                                     
                                     if(gst_type=='state_gst')
                                     {
                                         var net_amount=total_amount+cgst_amount+sgst_amount;
                                         $('#cgst_amount').val(cgst_amount.toFixed(2));
                                         $('#sgst_amount').val(sgst_amount.toFixed(2));
                                         
                                     }
                                     else if(gst_type=='interstate_gst')
                                     {
                                         var net_amount=total_amount+igst_amount;
                                         $('#igst_amount').val(igst_amount.toFixed(2));
                                     }
                                     else if(typeof gst_type=="undefined"&&cgst!=''&&sgst!=''&&igst=='')
                                     {
                                        var net_amount=total_amount+cgst_amount+sgst_amount;
                                        $('#cgst_amount').val(cgst_amount.toFixed(2));
                                        $('#sgst_amount').val(sgst_amount.toFixed(2));
                                     }
                                     else if(typeof gst_type=="undefined"&&cgst==''&&sgst==''&&igst!=''&&(discount==''||discount=='0.00'))
                                     {
                                        var net_amount=total_amount+igst_amount;
                                        $('#igst_amount').val(igst_amount.toFixed(2));
                                     }
                                     else if(typeof gst_type=="undefined"&&cgst==''&&sgst==''&&igst!=''&&discount!='')
                                    {
                                        var net_amount=total_amount+igst_amount;
                                        $('#igst_amount').val(igst_amount.toFixed(2));
                                    }
                                     else if(typeof gst_type=="undefined")
                                     {
                                        var net_amount=total_amount;
                                     }
                                     $('#total_amount').val(total_amount.toFixed(2));
                                     $('#net_amount').val(net_amount.toFixed());
                                     
                                 }
                                 
                                 
                            }
                        });
                        
                    });
                    
                    
                }
            }
            
        });
            }
        
        
    }
});


$('#discount_amount').on('keyup',function(){
    var sub_total=$('#sub_total').val();
    var discount_amount=$('#discount_amount').val();
    var total_amount=sub_total-discount_amount;
    
    $('#total_amount').val(total_amount.toFixed(2));
    $('#net_amount').val(total_amount.toFixed(2));
}); 

$('input[name="gst_type"]').click(function(){
    
    var gst_type=$(this).val();
     
   
    if(gst_type=='state_gst')
    {
            
        $('#cgst').on('keyup',function(){
           
            var cgst=parseFloat($('#cgst').val());
            var total_amount=parseFloat($('#total_amount').val());
            
            if(isNaN(cgst))
            {
                $('#cgst_amount').val('0.0');
                $('#net_amount').val(total_amount);
            }
            else
            {
                var cgst_amount=(total_amount/100)*cgst;
                var net_amount=total_amount+cgst_amount;
                $('#cgst_amount').val(cgst_amount.toFixed(2));
                $('#net_amount').val(net_amount.toFixed());
            }
            
        });
        
        $('#sgst').on('keyup',function(){
   
            var sgst=parseFloat($('#sgst').val());
            var cgst=parseFloat($('#cgst').val());
           
            var total_amount=parseFloat($('#total_amount').val());
           
            var bal_amount=parseFloat($('#net_amount').val());
            
            
            if(isNaN(sgst))
            {
                var cgst=parseFloat($('#cgst').val());
                var total_amount=parseFloat($('#total_amount').val());
                var cgst_amount=(total_amount/100)*cgst;
                var net_amount=total_amount+cgst_amount;
                $('#cgst_amount').val(cgst_amount.toFixed(2));
                $('#sgst_amount').val('0.0');
                $('#net_amount').val(net_amount.toFixed());
            }
            else
            {
                var sgst_amount=(total_amount/100)*sgst;
                var cgst_amount=(total_amount/100)*cgst;
                var net_amount=total_amount+cgst_amount+sgst_amount;
                $('#cgst_amount').val(cgst_amount.toFixed(2));
                $('#sgst_amount').val(sgst_amount.toFixed(2));
                $('#net_amount').val(net_amount.toFixed());
            }
            
        });
    }
    else if(gst_type=='interstate_gst')
    { 
        $('#igst').on('keyup',function(){
           
            var igst=parseFloat($('#igst').val());
            var total_amount=parseFloat($('#total_amount').val());
            
            if(isNaN(igst))
            {
                $('#igst_amount').val('0.0');
                $('#net_amount').val(total_amount.toFixed()); 
            }
            else
            {
                var igst_amount=(total_amount/100)*igst;
                var net_amount=total_amount+igst_amount;
                $('#igst_amount').val(igst_amount.toFixed(2));
                $('#net_amount').val(net_amount.toFixed());
            }
           
             
        });
    }
});

$('.print_bill').click(function(){
    var bill_id=$('#bill_id').val();
    var link = $('#bill_href');
    var financial_year=$('#yearpicker').val();
    
    var customer_name=$('#customer_name').val();
    var customer_contact=$('#customer_contact').val();
    var payment_mode=$('#payment_mode').val();
    var sub_total=$('#sub_total').val();
    var discount_amount=$('#discount_amount').val();
    var total_amount=$('#total_amount').val();
    var cgst=$('#cgst').val();
    var sgst=$('#sgst').val();
    var igst=$('#igst').val();
    var net_amount=$('#net_amount').val();
    
     window.open('bill.php?action=bill_printed&bill_id='+bill_id+'&customer_name='+customer_name+'&customer_contact='+customer_contact+'&sub_total='+sub_total+'&discount_amount='+discount_amount+'&total_amount='+total_amount+'&cgst='+cgst+'&sgst='+sgst+'&igst='+igst+'&net_amount='+net_amount+'&payment_mode='+payment_mode+'&financial_year='+financial_year);
        //  window.open('bill.php?action=bill_printed&bill_id='+bill_id);
        //  myWindow = window.open("bill.php?action=bill_printed&bill_id="+bill_id+'&customer_name='+customer_name+'&customer_contact='+customer_contact+'&sub_total='+sub_total+'&discount_amount='+discount_amount+'&total_amount='+total_amount+'&cgst='+cgst+'&sgst='+sgst+'&igst='+igst+'&net_amount='+net_amount+'&payment_mode='+payment_mode+'&financial_year='+financial_year,"_blank");

// myWindow.print();
});

$('#save_refresh').on('click',function(){
    var customer_name=$('#customer_name').val();
    var yearpicker=$('#yearpicker').val();
    var customer_contact=$('#customer_contact').val();
    var bill_id=$('#bill_id').val();
    var sub_total=$('#sub_total').val();
    var discount_amount=$('#discount_amount').val();
    var payment_mode=$('#payment_mode').val();
    var total_amount=$('#total_amount').val();
    var cgst=$('#cgst').val();
    var sgst=$('#sgst').val();
    var igst=$('#igst').val();
    var net_amount=$('#net_amount').val();
   
    $.ajax({
        url:'ajax_request.php',
        type:'POST',
        dataType:'json',
        data:{'action':'bill_printed','bill_id':bill_id,'customer_name':customer_name,'customer_contact':customer_contact,'payment_mode':payment_mode,'sub_total':sub_total,'discount_amount':discount_amount,'total_amount':total_amount,'cgst':cgst,'sgst':sgst,'igst':igst,'net_amount':net_amount,'yearpicker':yearpicker},
        success:function(result_job)
        {
            if(result_job.status==1)
            {
                 window.location.reload();
                // alert('test')
            }
        }
    });
});
</script>
<script>
//     $('#bill_id').keypress(function(event){
//          var key =  event.which || event.keyCode;
//   if(key == 13)
//     {
        $('#bill_id,#yearpicker').on('change',function(){
        
        var bill_id=$('#bill_id').val();
        var yearpicker=$('#yearpicker').val();
        
        $.ajax({
            url:'ajax_request.php',
            type:'POST',
            data:{'action':'fetch_bills','bill_id':bill_id,'yearpicker':yearpicker},
            dataType:'json',
            success:function(result_job){
                $('#particular').focus();  
                $('#customer_name').val('');
                $('#customer_contact').val('');
                $('#sub_total').val('');
                $('#discount_amount').val('');
                $('#total_amount').val('');
                $('#net_amount').val('');
                $('#pieces_count').val('');
                
                if(result_job.status==1)
                {
                    $('#save_date_div').html('<button class="btn btn-outline-primary btn-sm mb-1 mb-xl-0" id="update_refresh">Update</button></td>');
                    var count=result_job.data.length;
                    $('#particulars_row').html('');
                    var pieces_count=0;
                    for(var i=0;i<count;i++)
                    {
                       var meter=parseFloat(result_job.data[i].meters);
                       pieces_count=parseInt(result_job.data[i].pieces)+parseInt(pieces_count);
                       if(meter==0)
                       {
                            $('#particulars_row').append('<tr id="row_'+result_job.data[i].est_no+'"><td>'+result_job.data[i].particular+'</td><td>---</td><td>'+result_job.data[i].pieces+'</td><td>'+result_job.data[i].rate+'</td><td>'+result_job.data[i].amount+'</td><td><button class="btn btn-outline-primary btn-sm mb-1 mb-xl-0 remove_particular" id="'+result_job.data[i].est_no+','+result_job.data[i].bill_id+'">Remove</button></td></tr>')   
                       }
                       else
                       {
                            $('#particulars_row').append('<tr id="row_'+result_job.data[i].est_no+'"><td>'+result_job.data[i].particular+'</td><td>'+meter.toFixed(2)+'</td><td>'+result_job.data[i].pieces+'</td><td>'+result_job.data[i].rate+'</td><td>'+result_job.data[i].amount+'</td><td><button class="btn btn-outline-primary btn-sm mb-1 mb-xl-0 remove_particular" id="'+result_job.data[i].est_no+','+result_job.data[i].bill_id+'">Remove</button></td></tr>')    
                       }
                    
                       
                    }
                       $('#customer_name').val(result_job.data[0].customer_name);
                       $('#customer_contact').val(result_job.data[0].customer_contact);
                       $('#sub_total').val(result_job.data[0].sub_total);
                       $('#discount_amount').val(result_job.data[0].discount);
                       $('#total_amount').val(result_job.data[0].total);
                       $('#net_amount').val(result_job.data[0].net_amount);
                       $("#payment_mode").val(result_job.data[0].payment_mode).change();
                       $('#pieces_count').val(pieces_count);
                       
                       if(result_job.data[0].igst!=''&&result_job.data[0].cgst==''&&result_job.data[0].sgst=='')
                       {
                           $("#interstate_gst").css('display','block');
                           $("#state_gst").css('display','none');
                           $('#igst').val(result_job.data[0].igst);
                           $('#igst_amount').val(result_job.data[0].igst_amount);
                       }
                       if(result_job.data[0].igst==''&&result_job.data[0].cgst!=''&&result_job.data[0].sgst!='')
                       {
                           $("#state_gst").css('display','block');
                           $("#interstate_gst").css('display','none');
                           $('#cgst').val(result_job.data[0].cgst);
                           $('#sgst').val(result_job.data[0].sgst);
                           $('#cgst_amount').val(result_job.data[0].cgst_amount);
                           $('#sgst_amount').val(result_job.data[0].sgst_amount);
                       }
                       
                       $('.remove_particular').on('click',function(){
                         var yearpicker=$('#yearpicker').val();
                        alert('test2')
                        var delete_rec=$(this).attr('id');
                        var arr=delete_rec.split(',');
                        var id=arr[0];
                        var bill_id=arr[1];
                        
                        $.ajax({
                            url:'ajax_request.php',
                            type:'POST',
                            dataType:'json',
                            data:{'action':'delete_entry','id':id,'bill_id':bill_id,'yearpicker':yearpicker},
                            success:function(result_job){
                               
                                 $('#particular').focus();
                                 $('#row_'+id+'').load(location.href+' #row_'+id+''); 
                                
                                 $('#sub_total').val(result_job.data[0].sub_total);
                                 $('#pieces_count').val(result_job.data[0].pieces_count);
                                 
                                 if(result_job.status==1)
                                 {
                                     
                                     var sub_tot=$('#sub_total').val();
                                     var net_amount=$('#net_amount').val();
                                     var discount_amount=$('#discount_amount').val();
                                     var cgst=$('#cgst').val();
                                     var sgst=$('#sgst').val();
                                     var igst=$('#igst').val();
                                     
                                     var total_amount=sub_tot-discount_amount;
                                     var cgst_amount=(total_amount/100)*cgst;
                                     var sgst_amount=(total_amount/100)*sgst;
                                     var igst_amount=(total_amount/100)*igst;
                                     var gst_type=$("input[name='gst_type']:checked").val();
                                    
                                     if(cgst!=""&&sgst!=""&&igst=="")
                                     {
                                         var net_amount=total_amount+cgst_amount+sgst_amount;
                                         $('#cgst_amount').val(cgst_amount.toFixed(2));
                                         $('#sgst_amount').val(sgst_amount.toFixed(2));
                                         
                                     }
                                     else if(cgst==""&&sgst==""&&igst!="")
                                     {
                                         var net_amount=total_amount+igst_amount;
                                         $('#igst_amount').val(igst_amount.toFixed(2));
                                     }
                                     else if(cgst==""&&sgst==""&&igst=="")
                                     {
                                        var net_amount=total_amount;
                                     }
                                     $('#total_amount').val(total_amount.toFixed(2));
                                     $('#net_amount').val(net_amount.toFixed());
                                     
                                 }
                      
                                 $('#save_date_div').html('<button class="btn btn-outline-primary btn-sm mb-1 mb-xl-0" id="update_refresh">Update</button></td>');
                                 
                                 $('#update_refresh').on('click',function(){
                                        // alert('text');
                                    var customer_name=$('#customer_name').val();
                                    var yearpicker=$('#yearpicker').val();
                                    var customer_contact=$('#customer_contact').val();
                                    var bill_id=$('#bill_id').val();
                                    var sub_total=$('#sub_total').val();
                                    var discount_amount=$('#discount_amount').val();
                                    var payment_mode=$('#payment_mode').val();
                                    var total_amount=$('#total_amount').val();
                                    var cgst=$('#cgst').val();
                                    var sgst=$('#sgst').val();
                                    var igst=$('#igst').val();
                                    var igst_amount=$('#igst_amount').val();
                                    var net_amount=$('#net_amount').val();
   
                                            $.ajax({
                                            url:'ajax_request.php',
                                            type:'POST',
                                            dataType:'json',
                                            data:{'action':'update_estimate_bill','bill_id':bill_id,'customer_name':customer_name,'customer_contact':customer_contact,'payment_mode':payment_mode,'sub_total':sub_total,'discount_amount':discount_amount,'total_amount':total_amount,'cgst':cgst,'sgst':sgst,'igst':igst,'igst_amount':igst_amount,'net_amount':net_amount,'yearpicker':yearpicker},
                                            success:function(result_job)
                                            {
                                                if(result_job.status==1)
                                                {
                                                     window.location.reload();
                                                    
                                                }
                                            }
                                        });
                                });
                                  
                                 
                            }
                        });
                        
                    });
                    
                       $('#update_refresh').on('click',function(){
                                        // alert('text');
                                    var customer_name=$('#customer_name').val();
                                    var yearpicker=$('#yearpicker').val();
                                    var customer_contact=$('#customer_contact').val();
                                    var bill_id=$('#bill_id').val();
                                    var sub_total=$('#sub_total').val();
                                    var discount_amount=$('#discount_amount').val();
                                    var payment_mode=$('#payment_mode').val();
                                    var total_amount=$('#total_amount').val();
                                    var cgst=$('#cgst').val();
                                    var sgst=$('#sgst').val();
                                    var igst=$('#igst').val();
                                    var igst_amount=$('#igst_amount').val();
                                    var net_amount=$('#net_amount').val();
   
                                            $.ajax({
                                            url:'ajax_request.php',
                                            type:'POST',
                                            dataType:'json',
                                            data:{'action':'update_estimate_bill','bill_id':bill_id,'customer_name':customer_name,'customer_contact':customer_contact,'payment_mode':payment_mode,'sub_total':sub_total,'discount_amount':discount_amount,'total_amount':total_amount,'cgst':cgst,'sgst':sgst,'igst':igst,'igst_amount':igst_amount,'net_amount':net_amount,'yearpicker':yearpicker},
                                            success:function(result_job)
                                            {
                                                if(result_job.status==1)
                                                {
                                                     window.location.reload();
                                                    
                                                }
                                            }
                                        });
                                });
                       
                    
                }
               
                
            }
        });
    
        
    // }
    });
</script>


 <script type="text/javascript">
    let startYear = 2021;
    let endYear = new Date().getFullYear();
     $('#yearpicker').append($('<option />').val('').html('Choose Year'));
    for (i = endYear; i >= startYear; i--)
    {
      $('#yearpicker').append($('<option />').val(i).html(i));
      
    }
</script>

  