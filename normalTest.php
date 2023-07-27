<?php
include('./include/config.php');

// echo "<script>alert('".date('Y-m-d h:i')."')</script>";
?>

 <?php include('header.php')?> 

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
    .cursor-center {
        text-align: center;
     }
     #particulars_rows td{
        text-align: center; 
     }
  
  
  
@media screen and (max-width: 992px){
  .collapse:not(.show) {
    display: none !important;
  }
}

@media screen and (max-width: 992px){
  .collapse {
    display: block !important;
  }
}
 
   .col-lg-2 {
            width: 13.9999% !important;
        }
        
         @media screen and (max-width: 992px){
   .col-lg-2 {
            width:100% !important;
        }
 }
</style>



              
        <!-- Top Bar End -->
        <!-- Top Bar End -->

        <div class="page-wrapper">

            <!-- Page Content-->
            <div class="page-content-tab ">
                <div class="container-fluid">
                    <!-- Page-Title -->
                    <div class="container-fluid">
                     <div class="row">
                        <div class="col-lg-12">
                            <div class="page-title-box bg-light-alt text-center bs">
                                <h5 class="m-1 p-1 bgg"><b>INVOICE</b></h5>
                            </div>
                        </div> 
                        <div class="col-lg-3">
                            <div class="detail-design">
                              <div class="tittle">
                                <h6 class="text-center">CUSTOMER DETAILS</h6>
                            </div>
                              <div class="input-group mt-2">
                                <div class="input-group-text a">Name</div>
                                <input type="text" class="add_entry form-control enter" id="customer_name" name="customer_name">
                            </div>
                              <div class="input-group mt-2">
                                <div class="input-group-text b">GST NO</div>
                                <input type="text" class="add_entry form-control enter" id="gst_num" name="gst_num">
                                
                            </div>
                            <span id="gst_num_error" class="text-danger"></span>
                              <div class="input-group mt-2">
                                <div class="input-group-text c">Address</div>
                                <input type="text" class="add_entry form-control enter" id="address_1" name="address_1">
                            </div>
                              <div class="input-group mt-2">
                                <div class="input-group-text d">Address</div>
                                <input type="text" class="add_entry form-control enter" id="address_2" name="address_2" >
                            </div>
                              <div class="input-group mt-2">
                                <div class="input-group-text a">City</div>
                                <input type="text" class="add_entry form-control enter" id="city" name="city">
                            </div>
                              <div class="input-group mt-2">
                                <div class="input-group-text b">Ph no</div>
                                <input type="text" class="add_entry form-control enter" id="contact" name="contact">
                            </div>
                            </div>
                            <div class="detail-design">
                              <div class="tittle">
                                <h6 class="text-center">OTHERS</h6>
                            </div>
                              <div class="input-group mt-2">
                                <div class="input-group-text a">APPr No</div>
                                <input type="text" class="add_entry form-control enter" id="appr_no" name="appr_no">
                            </div>
                              <div class="input-group mt-2">
                                <div class="input-group-text b">APPr Date</div>
                                <input type="date" class="add_entry form-control enter" id="appr_date" name="appr_date" >
                            </div>
                              <div class="input-group mt-2">
                                <div class="input-group-text c">Terms</div>
                                <input type="text" class="add_entry form-control enter" id="terms" name="terms" >
                            </div>
                              <div class="input-group mt-2">
                                <div class="input-group-text d">L/R No</div>
                                <input type="text" class="add_entry form-control enter" id="lr_no" name="lr_no" >
                            </div>
                              <div class="input-group mt-2">
                                <div class="input-group-text a">L/R Date</div> 
                                <input type="date" class="add_entry form-control enter" id="lr_date" name="lr_date" >
                            </div>
                              <div class="input-group mt-2">
                                <div class="input-group-text b">Through</div>
                                <input type="text" class="add_entry form-control  enter" id="through" name="through" >
                              </div>
                             
                            </div>
                        </div>
                        <div class="col-lg-9">
                            <div class="page-title-box bg-light-alt text-center bs">
                                <h5 class="m-1 p-1 bggs"><b>BILLING</b></h5>
                            </div>
                            <div class="row mt-1">
                                <?php
                                    $sql="SELECT bill_id FROM comboset_invoice_final ORDER BY id DESC LIMIT 1";
                                    $result=mysqli_query($conn,$sql);
                                    $rec=mysqli_fetch_assoc($result);
                                    $bill_id=$rec['bill_id'];
                                                        
                                    if($bill_id=='')
                                    {
                                        //   $bill_id=$rec['bill_id']+1;
                                        $bilL_id1="INV_"."1";
                                    }
                                    else
                                    {
                                                               
                                        $id=explode('_',$bill_id);
                                                             
                                        $count=$id[1]+1;
                                                             
                                        $bilL_id1="INV_".$count;
                                    }
                                                          
                                ?>
                                 <div class="col-lg-2"> 
                                    <input id="bill_id" type="text" value="<?php echo $bilL_id1; ?>" name="bill_id" class=" form-control cardss mt-1" > 
                                </div>   
                                <div class="col-lg-2 "> 
                                    <select name="yearpicker" id="yearpicker" class="add_entry form-control cardss mt-1"></select>  
                                </div>
                                
                            </div>
                            <div class="row mt-1">
                               
                                <div class="col-lg-3 ">
                                         <div class="col-sm-3 form-control cardss aa measurement_unit  mb-2">
                                                <input class="add_entry form-check-input" type="radio" name="measurement_unit" id="measurement_unit1" value="meter">
                                                 <label class="form-check-label" for="inlineRadio16"><b>Meter</b></label>
                                         </div>
                                       </div>  
                                        <div class="col-lg-3"> 
                                         <div class="col-sm-3 form-control cardss bb measurement_unit  mb-2">
                                                 <input class="add_entry form-check-input" type="radio" name="measurement_unit" id="measurement_unit2" value="pant_bit">
                                                 <label class="form-check-label" for="inlineRadio16"><b>Pant Bit</b></label>
                                         </div>  
                                     </div>   
                                        <div class="col-lg-3 "> 
                                         <div class="col-sm-3 form-control cardss cc measurement_unit  mb-2">
                                                 <input class="add_entry form-check-input" type="radio" name="measurement_unit" id="measurement_unit3" value="combo_set">
                                                 <label class="form-check-label" for="inlineRadio16"><b>Combo Set</b></label>
                                         </div>  
                                      </div>    
                                        <div class="col-lg-3 "> 
                                         <div class="col-sm-3 form-control cardss dd measurement_unit  mb-2">
                                                 <input class="add_entry form-check-input" type="radio" name="measurement_unit" id="measurement_unit4" value="shirt">
                                                 <label class="form-check-label" for="inlineRadio16"><b>Shirt</b></label>
                                         </div>
                                         </div>
                                <div id="remove1" class="col-lg-2">
                                    <label class=""><b>PARTICULARS</b></label>
                                    <input id="particular" type="text" value="" name="particular" class="add_entry form-control cardss mt-2 enter" placeholder="" required>  
                                    <span id="particular_error" class="text-danger"></span>
                                </div>
                                <div id="remove2" class="col-lg-2">
                                    <label class=""><b>HSN No</b></label>
                                    <input id="hsn_no" type="text" value="" name="hsn_no" class="add_entry form-control cardss mt-2 enter" placeholder="" required>  
                                    <span id="hsn_error" class="text-danger"></span>
                                </div>
                                <div id="remove3" class="col-lg-2">
                                    <label class=""><b>TYPE</b></label>
                                    <input id="measurement_unit_type" type="text" value="" name="measurement_unit_type" class="add_entry form-control cardss mt-2 " placeholder="" required>  
                                </div>
                                <div id="remove4" class="col-lg-2">
                                    <label class=""><b>Mrts/Cms</b></label>
                                    <input id="meters" type="text" value="" name="meters" class="add_entry form-control cardss mt-2 enter" placeholder="" required>  
                                    <span id="meters_error" class="text-danger"></span>
                                </div>
                                <div id="remove5" class="col-lg-2">
                                    <label class=""><b>TOTAL Mrts</b></label>
                                    <input id="total_meters" type="text" value="" name="total_meters" class="cursor-center add_entry form-control cardss mt-2 " placeholder="" required>  
                                    
                                </div>
                                <div id="remove6" class="col-lg-2">
                                    <label class=""><b>PIECES</b></label>
                                    <input id="pieces" type="text" value="" name="pieces" class="cursor-center add_entry form-control cardss mt-2 enter" placeholder="" required>  
                                    <span id="pieces_error" class="text-danger"></span>
                                </div>
                                <div id="remove7" class="col-lg-2">
                                    <label class=""><b>RATE</b></label>
                                    <input id="rate" type="text" value="" name="rate" class="cursor-center add_entry form-control cardss mt-2 enter" placeholder="" required>  
                                    <span id="rate_error" class="text-danger"></span>
                                </div>
                                 <div class="row mt-1">
                    <div class="col-12 mt-3 p-0">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title text-center">Particulars Details</h4>
                            </div><!--end card-header-->
                            <div class="card-body">
                                <div class="table-responsive" >
                                    <table class="table">
                                        <thead class="thead-light">
                                          <tr>
                                            <!--<th>SNO</th>-->
                                            <th class="text-center">PARTICULARS</th>
                                            <th class="text-center">HSN No</th>
                                            <!--<th>METERS</th>-->
                                            <th class="text-center">TYPE</th>
                                            <th class="text-center">METERS</th>
                                            <th class="text-center">TOTAL METERS</th>
                                            <th class="text-center">PIECES</th>
                                            <th class="text-center">RATE/Mrts</th>
                                            <th class="text-center">AMOUNT</th>
                                            <th class="text-center">ACTION</th>
                                          </tr>
                                        </thead>
                                        <tbody id="particulars_rows">
                                           
                                            
                                         
                                            
                                            
                                        </tbody>
                                    </table>
                           
                                </div>
                             
                              <div class="d-flex">
                                       <div class=""> 
                                           <button type="button" style="border-color:#22b783"; class="btn btn-de-success btn-sm print_bill" data-bs-toggle="modal" data-bs-target="#exampleModalRequest"><input type='hidden' id='cus_id'><a href='https://udhaarsudhaar.co.in/sunil/bill.php' target='_blank' id='bill_href'><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-download align-self-center icon-xs me-2"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="7 10 12 15 17 10"></polyline><line x1="12" y1="15" x2="12" y2="3"></line></svg>Print</a></button>
                                       </div>
                                    <div style="margin-left: 15px;" id='save_date_div'>  
                                        <button class="btn btn-outline-primary btn-sm mb-1 mb-xl-0" id="save_refresh">Save</button></td>
                                    </div>
                                  </div>
                            </div>
                            
                           
                        </div>
                    </div> <!-- end col -->
                    <div class="col-lg-6">
                        <div class="row align-items-centers">
                            <div class="col-lg-4">
                                 <label class=""><b>TOTAL PIECES</b></label>
                            </div>
                            <div class="col-lg-8">
                                 <input id="pieces_count" type="text" value="" name="pieces_count" class="add_entry form-control cardss crdsheight" placeholder="" required>
                            </div>
                            <div class="col-lg-4">
                                 <label class=""><b>TOTAL METERS</b></label>
                            </div>
                            <div class="col-lg-8">
                                 <input id="meters_count" type="text" value="" name="meters_count" class="add_entry form-control cardss crdsheight mt-2" placeholder="" required>
                            </div>
                        </div>
                        <div class="row">
                              <div class="col-lg-6">
                                 <label class=" control-label mt-5"><b>Is GST Aplicable?</b></label>
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
                               </div> 
                               <div class="col-lg-6">
                                   <div id="gst_div">
                                       <label class="control-label mt-5"><b>GST Type</b></label>
                                        <div class=" offset-lg-1 mb-2" id="gst_type">
                                                <div class="form-check form-check-inline" id="state">
                                                    <input class="form-check-input gst_type" type="radio" name="gst_type" id="inlineRadio14" value="state_gst">
                                                    <label class="form-check-label" for="inlineRadio14">State</label>
                                                </div>
                                                <div class="form-check form-check-inline" id="interstate">
                                                    <input class="form-check-input gst_type" type="radio" name="gst_type" id="inlineRadio23" value="interstate_gst">
                                                    <label class="form-check-label" for="inlineRadio23">Interstate</label>
                                                </div>
                                        </div>
                                   </div>
                                 
                               </div> 
                          </div>
                      
                    </div>
                    <div class="col-lg-6">
                        <div class="text-ends">
                            <div class="input-group">
                                <div class="input-group-text">Sub Total</div>
                                    <input type="text" class="form-control mb-2" id="sub_total">
                            </div>
                            <div class="input-group">
                                <div class="input-group-text">Discount of Amount</div>
                                    <input type="text" class="form-control mb-2" id="discount_amount" >
                            </div>
                             <div class="input-group">
                                <div class="input-group-text">Total Amount</div>
                                    <input type="text" class="form-control mb-2" id="total_amount">
                            </div>
                            <div id="interstate_gst">
                                <div class="input-group">
                                <div class="input-group-text">IGST</div>
                                    <input type="text" class="form-control mb-2" id="igst" >
                                    <input class="form-control" type="text" id="igst_amount" name="igst_amount" readonly>
                                </div>
                            </div>
                            
                            <div id="state_gst">
                                <div class="input-group">
                                <div class="input-group-text">CGST</div>
                                    <input type="text" class="form-control mb-2" id="cgst">
                                    <input class="form-control" type="text" id="cgst_amount" name="cgst_amount" readonly>
                            </div>
                            <div class="input-group">
                                <div class="input-group-text">SGST</div>
                                    <input type="text" class="form-control mb-2" id="sgst">
                                    <input class="form-control" type="text" id="sgst_amount" name="sgst_amount" readonly>
                            </div>
                            </div>
                            
                            
                            
                            <div class="input-group">
                                <div class="input-group-text">Net Amount</div>
                                    <input type="text" class="form-control" id="net_amount">
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
                <!--Start Footer-->
                <!-- Footer Start -->
                <!-- end Footer -->                
                <!--end footer-->
            <!-- end page content -->

        <!-- age-wrapper -->
</div>

      <!--<script>-->
      <!--   $(document).ready(function() {-->
      <!--           console.log("ready!);-->
      <!--    });-->
      <!--</script>-->
    
    <!--end body-->
 <?php include('footer.php')?>    
 <script>
 
 
    $(document).ready(function(){
                $("#gst_yes").click(function(){
                  $("#gst_div").css('display','block');
                
                });
            });                                                                                                                   
            $(document).ready(function(){
                $("#gst_no").click(function(){
                  var tot_amount=$("#total_amount").val();
                  $('.gst_type').prop('checked', false);
                  $("#gst_div").css('display','none');
                  $("#interstate_gst").css('display','none');
                  $("#state_gst").css('display','none');
                   $("#net_amount").val(tot_amount);
                  
                
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
 
     $('#meters').on('keyup',function(){
            var meters=$(this).val();
            if(meters=='')
            {
              $('#total_meters').val('');  
            }
            else
            {
                var sep_meter=meters.split(',');
                var count=sep_meter.length;
                var tot_meters=0;
                for(var i=0;i<count;i++)
                {
                    tot_meters=parseFloat(tot_meters)+parseFloat(sep_meter[i]);
                }
                $('#total_meters').val(tot_meters.toFixed(2));
                $('#pieces').val(count) 
            }
            
            
            
        });
        
    $('.measurement_unit').on('click',function(){
        var measurement_unit=$(this).find('input').prop('checked',true).val();
        $('#particular').focus();
        if(measurement_unit=='combo_set'||measurement_unit=='shirt')
        {
            
            $('#total_meters').attr('disabled','disabled');
            $('#meters').attr('disabled','disabled');
            $('#meters').removeClass('enter');
            $('#pieces').addClass('enter');
            $('#measurement_unit_type').val('');
            $('#measurement_unit_type').attr('disabled','disabled');
        }
        else if(measurement_unit=='meter'||measurement_unit=='pant_bit')
        {
            
            $('#total_meters').removeAttr('disabled','disabled');
            $('#meters').removeAttr('disabled','disabled');
            $('#meters').addClass('enter');
            $('#pieces').removeClass('enter');
            $('#measurement_unit_type').removeAttr('disabled','disabled');
            $('#measurement_unit_type').val(measurement_unit);
        }
    });
    
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
        
        var bill_id=$('#bill_id').val();
        var yearpicker=$('#yearpicker').val();
        var cus_name=$('#customer_name').val();
        var gst_num=$('#gst_num').val();
        var address_1=$('#address_1').val();
        var address_2=$('#address_2').val();
        var city=$('#city').val();
        var contact=$('#contact').val();
        var appr_no=$('#appr_no').val();
        var appr_date=$('#appr_date').val();
        var terms=$('#terms').val();
        var lr_no=$('#lr_no').val();
        var lr_date=$('#lr_date').val();
        var through=$('#through').val();
        var particular=$('#particular').val();
        var hsn_no=$('#hsn_no').val();
         var measurement_unit_type=$('#measurement_unit_type').val();
        var meters=$('#meters').val();
        var total_meters=$('#total_meters').val();
        var pieces=parseInt($('#pieces').val());
        var rate=parseFloat($('#rate').val()).toFixed(2);
        
        $('#particular_error').html('');
        $('#hsn_error').html('');
        $('#meters_error').html('');
        $('#pieces_error').html('');
        $('#rate_error').html('');
        $('#gst_num_error').html('');
        
       
        if(measurement_unit_type=='meter'||measurement_unit_type=='pant_bit')
        {
            if(particular==''||hsn_no==''||meters==''||pieces==''||rate=='')
            {
            if(particular=='')
            {
                $('#particular_error').append('Particular is required');
                // alert('test')
            }
             else if(hsn_no=='')
            {
               $('#hsn_error').append('HSN is required'); 
            }
            else if(meters=='')
            {
                $('#meters_error').append('meters is required');
            }
           
            else if(pieces=='')
            {
               $('#pieces_error').append('Pieces is required'); 
            }
            else if(rate=='')
            {
               $('#rate_error').append('Rate is required'); 
            }
            
        }
             else 
            {
            
            if(measurement_unit_type=='meter')
            {
                var amount=total_meters*rate;
            }
            else if(measurement_unit_type=='pant_bit')
            {
                var amount=rate;
            }
            
            
            $.ajax({
                url:"ajax_request.php?action=add_normal_invoice_entry",
                type:"POST",
                dataType:"json",
                data:{'bill_id':bill_id,'cus_name':cus_name,'gst_num':gst_num,'address_1':address_1,'address_2':address_2,'city':city,'cus_contact':contact,'appr_no':appr_no,'appr_date':appr_date,'terms':terms,'lr_no':lr_no,'lr_date':lr_date,'through':through,'particular':particular,'hsn_no':hsn_no,'meters':meters,'pieces':pieces,'total_meters':total_meters,'rate':rate,'amount':amount,'measurement_unit_type':measurement_unit_type,'yearpicker':yearpicker},
                success:function(result_job)
                {
                    if(result_job.status==1)
                    {
                           
                            $("#particular").val('');
                            $("#particular").focus();
                            $("#hsn_no").val('');
                            $("#meters").val('');
                            $("#pieces").val('');
                            $('#total_meters').val('');
                            $("#rate").val('');
                            $('#particulars_rows').html('');
                            
                            var count=result_job.data.length;
                            var sub_total=0;
                            var pieces_count=0;
                            var meters_count=0;
                            
                            for(var i=0;i<count;i++)
                            {
                                var rest_amount=parseFloat(result_job.data[i].amount);
                                $('#particulars_rows').append('<tr id="row_'+result_job.data[i].n_invoice_id+'"><td id="td_particular">'+result_job.data[i].particular+'</td><td id="td_hsn">'+result_job.data[i].hsn+'</td><td id="td_hsn">'+result_job.data[i].measurement_type+'</td><td id="td_meters">'+result_job.data[i].meters+'</td><td id="td_total_meters">'+result_job.data[i].total_meters+'</td><td id="td_pieces">'+result_job.data[i].pieces+'</td><td id="td_rate">'+result_job.data[i].rate+'</td><td id="td_amount_'+i+'">'+rest_amount.toFixed(2)+'</td><td><button class="btn btn-outline-primary btn-sm mb-1 mb-xl-0 remove_particular1" id="'+result_job.data[i].n_invoice_id+','+result_job.data[i].bill_id+'">Remove</button></td></tr>')
                                // $('#entries').append('<tr><td>deemo</td><td>test</td></tr>');
                                sub_total=rest_amount+sub_total;
                                pieces_count=parseInt(result_job.data[i].pieces)+parseInt(pieces_count);
                                
                                if(result_job.data[i].total_meters!='---')
                                {
                                    meters_count=parseFloat(result_job.data[i].total_meters)+parseFloat(meters_count);
                                }
                            }
                            
                            $('#pieces_count').val(pieces_count);
                            $('#meters_count').val(meters_count);
                            $('#sub_total').val(sub_total.toFixed(2));
                            var discount=$('#discount_amount').val();
                            
                            var cgst=$('#cgst').val();
                            var sgst=$('#sgst').val();
                            var igst=$('#igst').val();
                            
                            var gst_type=$("input[name='gst_type']:checked").val();
                            
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
                                $('#net_amount').val(net_amount.toFixed());
                                $('#cgst_amount').val(cgst_amount.toFixed(2));
                                $('#sgst_amount').val(sgst_amount.toFixed(2));
                                
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
                                $('#net_amount').val(net_amount.toFixed());
                                $('#cgst_amount').val(cgst_amount.toFixed(2));
                                $('#sgst_amount').val(sgst_amount.toFixed(2));
                                
                            }
                            else if(discount!=''&&gst_type=='interstate_gst')
                            {
                                var total_amount=sub_total.toFixed(2)-discount;
                                $('#total_amount').val(total_amount);
                                var igst=$('#igst').val();
                                var igst_amount=(total_amount/100)*igst;
                                var net_amount=parseFloat(total_amount)+parseFloat(igst_amount);
                                $('#net_amount').val(net_amount.toFixed());
                                $('#igst_amount').val(igst_amount.toFixed(2));
                                
                            }
                            
                             $('#cus_id').val(result_job.data[0].id);
                            $('.remove_particular1').on('click',function(){
    
                                var delete_rec=$(this).attr('id');
                                var arr=delete_rec.split(',');
                                var id=arr[0];
                                var bill_id=arr[1];
                                $.ajax({
                                    url:'ajax_request.php',
                                    type:'POST',
                                    dataType:'json',
                                    data:{'action':'delete_normal_invoice_entry','id':id,'bill_id':bill_id,'yearpicker':yearpicker},
                                    success:function(result_job){
                                         $('#row_'+id+'').load(location.href+' #row_'+id+''); 
                                        
                                         $('#sub_total').val(result_job.data[0].sub_total);
                                         $('#pieces_count').val(result_job.data[0].pieces_count);
                                         $('#meters_count').val(result_job.data[0].meters_count);
                                        
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
                                             else if(typeof gst_type=="undefined"&&cgst==''&&sgst==''&&igst=='')
                                             {
                                                var net_amount=total_amount;
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
        else
        {
            if(particular==''||hsn_no==''||pieces==''||rate=='')
            {
            if(particular=='')
            {
                $('#particular_error').append('Particular is required');
                // alert('test')
            }
             else if(hsn_no=='')
            {
               $('#hsn_error').append('HSN is required'); 
            }
            
            else if(pieces=='')
            {
               $('#pieces_error').append('Pieces is required'); 
            }
            else if(rate=='')
            {
               $('#rate_error').append('Rate is required'); 
            }
           
        }
             else 
            {
            
            
                var amount=pieces*rate;
            
            $.ajax({
                url:"ajax_request.php?action=add_normal_invoice_entry",
                type:"POST",
                dataType:"json",
                data:{'bill_id':bill_id,'cus_name':cus_name,'gst_num':gst_num,'address_1':address_1,'address_2':address_2,'city':city,'cus_contact':contact,'appr_no':appr_no,'appr_date':appr_date,'terms':terms,'lr_no':lr_no,'lr_date':lr_date,'through':through,'particular':particular,'hsn_no':hsn_no,'meters':meters,'pieces':pieces,'total_meters':total_meters,'rate':rate,'amount':amount,'measurement_unit_type':measurement_unit_type,'yearpicker':yearpicker},
                success:function(result_job)
                {
                    if(result_job.status==1)
                    {
                            $("#particular").val('');
                           $("#particular").focus();
                            $("#hsn_no").val('');
                            $("#meters").val('');
                            $("#pieces").val('');
                            $('#total_meters').val('');
                            $("#rate").val('');
                            $('#particulars_rows').html('');
                            
                            var count=result_job.data.length;
                            var sub_total=0;
                            var pieces_count=0;
                            var meters_count=0;
                            
                            for(var i=0;i<count;i++)
                            {
                                var rest_amount=parseFloat(result_job.data[i].amount);
                                $('#particulars_rows').append('<tr id="row_'+result_job.data[i].n_invoice_id+'"><td id="td_particular">'+result_job.data[i].particular+'</td><td id="td_hsn">'+result_job.data[i].hsn+'</td><td id="td_hsn">'+result_job.data[i].measurement_type+'</td><td id="td_meters">'+result_job.data[i].meters+'</td><td id="td_total_meters">'+result_job.data[i].total_meters+'</td><td id="td_pieces">'+result_job.data[i].pieces+'</td><td id="td_rate">'+result_job.data[i].rate+'</td><td id="td_amount_'+i+'">'+rest_amount.toFixed(2)+'</td><td><button class="btn btn-outline-primary btn-sm mb-1 mb-xl-0 remove_particular1" id="'+result_job.data[i].n_invoice_id+','+result_job.data[i].bill_id+'">Remove</button></td></tr>')
                               
                                sub_total=rest_amount+sub_total;
                                pieces_count=parseInt(result_job.data[i].pieces)+parseInt(pieces_count);
                                var total_meters=result_job.data[i].total_meters;
                                
                                if(result_job.data[i].total_meters!='---')
                                {
                                    meters_count=parseFloat(result_job.data[i].total_meters)+parseFloat(meters_count);
                                }
                               
                            }
                            
                            $('#pieces_count').val(pieces_count);
                            $('#meters_count').val(meters_count);
                            $('#sub_total').val(sub_total.toFixed(2));
                            var discount=$('#discount_amount').val();
                            var cgst=$('#cgst').val();
                            var sgst=$('#sgst').val();
                            var igst=$('#igst').val();
                            
                            var gst_type=$("input[name='gst_type']:checked").val();
                            
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
                                $('#net_amount').val(net_amount.toFixed());
                                $('#cgst_amount').val(cgst_amount.toFixed(2));
                                $('#sgst_amount').val(sgst_amount.toFixed(2));
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
                                $('#net_amount').val(net_amount.toFixed());
                                $('#cgst_amount').val(cgst_amount.toFixed(2));
                                $('#sgst_amount').val(sgst_amount.toFixed(2));
                            }
                            else if(discount!=''&&gst_type=='interstate_gst')
                            {
                                var total_amount=sub_total.toFixed(2)-discount;
                                $('#total_amount').val(total_amount);
                                var igst=$('#igst').val();
                                var igst_amount=(total_amount/100)*igst;
                                var net_amount=parseFloat(total_amount)+parseFloat(igst_amount);
                                $('#net_amount').val(net_amount.toFixed());
                                $('#igst_amount').val(igst_amount.toFixed(2));
                                
                            }
                            
                             $('#cus_id').val(result_job.data[0].id);
                            $('.remove_particular1').on('click',function(){
    
                                var delete_rec=$(this).attr('id');
                                var arr=delete_rec.split(',');
                                var id=arr[0];
                                var bill_id=arr[1];
                                $.ajax({
                                    url:'ajax_request.php',
                                    type:'POST',
                                    dataType:'json',
                                    data:{'action':'delete_normal_invoice_entry','id':id,'bill_id':bill_id,'yearpicker':yearpicker},
                                    success:function(result_job){
                                         $('#row_'+id+'').load(location.href+' #row_'+id+''); 
                                        
                                         $('#sub_total').val(result_job.data[0].sub_total);
                                         $('#pieces_count').val(result_job.data[0].pieces_count);
                                         $('#meters_count').val(result_job.data[0].meters_count);
                                        
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
                                             else if(typeof gst_type=="undefined"&&cgst==''&&sgst==''&&igst=='')
                                             {
                                                var net_amount=total_amount;
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
        
        
     
    }
});

$('#discount_amount').on('keyup',function(){
    var sub_total=$('#sub_total').val();
    var discount_amount=$('#discount_amount').val();
    var total_amount=sub_total-discount_amount;
    
    $('#total_amount').val(total_amount.toFixed(2));
    $('#net_amount').val(total_amount.toFixed());
});

$('input[name="gst_type"]').click(function(){
    
    var gst_type=$(this).val();
     
   
    if(gst_type=='state_gst')
    {
        $('#igst_amount').val('0.0');
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
        $('#cgst_amount').val('0.0');
        $('#sgst_amount').val('0.0');
        $('#igst').on('keyup',function(){
           
            var igst=parseFloat($('#igst').val());
            var total_amount=parseFloat($('#total_amount').val());
            
            if(isNaN(igst))
            {
                $('#igst_amount').val('0.0');
                $('#net_amount').val(total_amount); 
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
    var yearpicker=$('#yearpicker').val();
    
    var customer_name=$('#customer_name').val();
    var gst_no=$('#gst_num').val();
    var address_1=$('#address_1').val();
    var address_2=$('#address_2').val();
    var city=$('#city').val();
    var customer_contact=$('#contact').val();
    var appr_no=$('#appr_no').val();
    var appr_date=$('#appr_date').val();
    var lr_no=$('#lr_no').val();
    var lr_date=$('#lr_date').val();
    var terms=$('#terms').val();
    var gst_num=$('#gst_num').val();
    var through=$('#through').val();
    var pieces_count=$('#pieces_count').val();
    
    var sub_total=$('#sub_total').val();
    var discount_amount=$('#discount_amount').val();
    var total_amount=$('#total_amount').val();
    var cgst=$('#cgst').val();
    var sgst=$('#sgst').val();
    var igst=$('#igst').val();
    var net_amount=$('#net_amount').val();
    
     window.open('normal_invoice_bill.php?action=bill_printed&bill_id='+bill_id+'&customer_name='+customer_name+'&customer_contact='+customer_contact+'&gst_num='+gst_num+'&address_1='+address_1+'&address_2='+address_2+'&city='+city+'&sub_total='+sub_total+'&discount_amount='+discount_amount+'&total_amount='+total_amount+'&cgst='+cgst+'&sgst='+sgst+'&igst='+igst+'&net_amount='+net_amount+'&appr_no='+appr_no+'&appr_date='+appr_date+'&lr_no='+lr_no+'&lr_date='+lr_date+'&terms='+terms+'&through='+through+'&pieces_count='+pieces_count+'&financial_year='+yearpicker);

});
$('#save_refresh').on('click',function(){
    var bill_id=$('#bill_id').val();
    var yearpicker=$('#yearpicker').val();
    var customer_name=$('#customer_name').val();
    var gst_num=$('#gst_num').val();
    var customer_contact=$('#contact').val();
    var address_1=$('#address_1').val();
    var address_2=$('#address_2').val();
    var city=$('#city').val();
    var appr_no=$('#appr_no').val();
    var appr_date=$('#appr_date').val();
    var lr_no=$('#lr_no').val();
    var lr_date=$('#lr_date').val();
    var terms=$('#terms').val();
    var through=$('#through').val();
    var sub_total=$('#sub_total').val();
    var discount_amount=$('#discount_amount').val();
    var total_amount=$('#total_amount').val();
    var cgst=$('#cgst').val();
    var sgst=$('#sgst').val();
    var igst=$('#igst').val();
    var net_amount=$('#net_amount').val();
    // var round_of=parseFloat(total_amount)-parseFloat(net_amount);
    $.ajax({
        url:'ajax_request.php',
        type:'POST',
        dataType:'json',
        data:{'action':'normal_invoice_printed','bill_id':bill_id,'customer_name':customer_name,'gst_num':gst_num,'customer_contact':customer_contact,'city':city,'address_1':address_1,'address_2':address_2,'appr_no':appr_no,'appr_date':appr_date,'lr_no':lr_no,'lr_date':lr_date,'terms':terms,'through':through,'sub_total':sub_total,'discount_amount':discount_amount,'total_amount':total_amount,'cgst':cgst,'sgst':sgst,'igst':igst,'net_amount':net_amount,'yearpicker':yearpicker},
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
            data:{'action':'fetch_normal_bills','bill_id':bill_id,'yearpicker':yearpicker},
            dataType:'json',
            success:function(result_job){
                
                $('#particular').focus();
                $('#customer_name').val('');
                $('#gst_num').val('');
                $('#contact').val('');
                $('#address_1').val('');
                $('#address_2').val('');
                $('#city').val('');
                $('#appr_no').val('');
                $('#appr_date').val('');
                $('#lr_no').val('');
                $('#lr_date').val('');
                $('#terms').val('');
                $('#through').val('');
                $('#sub_total').val('');
                $('#discount_amount').val('');
                $('#total_amount').val('');
                $('#net_amount').val('');
                $('#pieces_count').val('');
                $('#meters_count').val('');
                $('#cgst').val('');
                $('#sgst').val('');
                $('#igst').val('');
                $('#cgst_amount').val('');
                $('#sgst_amount').val('');
                $('#igst_amount').val('');
                
                if(result_job.status==1)
                {
                    $('#save_date_div').html('<button class="btn btn-outline-primary btn-sm mb-1 mb-xl-0" id="update_refresh">Update</button></td>');
                    var count=result_job.data.length;
                    $('#particulars_rows').html('');
                    var pieces_count=0;
                    var meters_count=0;
                    
                    for(var i=0;i<count;i++)
                    {
                                var rest_amount=parseFloat(result_job.data[i].amount);
                                $('#particulars_rows').append('<tr id="row_'+result_job.data[i].n_invoice_id+'"><td id="td_particular">'+result_job.data[i].particular+'</td><td id="td_hsn">'+result_job.data[i].hsn+'</td><td id="td_hsn">'+result_job.data[i].measurement_type+'</td><td id="td_meters">'+result_job.data[i].meters+'</td><td id="td_total_meters">'+result_job.data[i].total_meters+'</td><td id="td_pieces">'+result_job.data[i].pieces+'</td><td id="td_rate">'+result_job.data[i].rate+'</td><td id="td_amount_'+i+'">'+rest_amount.toFixed(2)+'</td><td><button class="btn btn-outline-primary btn-sm mb-1 mb-xl-0 remove_particular" id="'+result_job.data[i].n_invoice_id+','+result_job.data[i].bill_id+'">Remove</button></td></tr>')
                               
                                sub_total=rest_amount+sub_total;
                                pieces_count=parseInt(result_job.data[i].pieces)+parseInt(pieces_count);
                                var total_meters=result_job.data[i].total_meters;
                                
                                if(result_job.data[i].total_meters!='---')
                                {
                                    meters_count=parseFloat(result_job.data[i].total_meters)+parseFloat(meters_count);
                                }
                       
                    }
                       $('#customer_name').val(result_job.data[0].customer_name);
                       $('#gst_num').val(result_job.data[0].gst_num);
                       $('#contact').val(result_job.data[0].customer_contact);
                       $('#address_1').val(result_job.data[0].address_1);
                       $('#address_2').val(result_job.data[0].address_2);
                       $('#city').val(result_job.data[0].city);
                       $('#appr_no').val(result_job.data[0].appr_no);
                       $('#appr_date').val(result_job.data[0].appr_date);
                       $('#lr_no').val(result_job.data[0].lr_no);
                       $('#lr_date').val(result_job.data[0].lr_date);
                       $('#terms').val(result_job.data[0].terms);
                       $('#through').val(result_job.data[0].through);
                       $('#sub_total').val(result_job.data[0].sub_total);
                       $('#discount_amount').val(result_job.data[0].discount);
                       $('#total_amount').val(result_job.data[0].total);
                       $('#net_amount').val(result_job.data[0].net_amount);
                       $("#payment_mode").val(result_job.data[0].payment_mode).change();
                       $('#pieces_count').val(pieces_count);
                       $('#meters_count').val(meters_count);
                       
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
    
                            var delete_rec=$(this).attr('id');
                        var arr=delete_rec.split(',');
                        var id=arr[0];
                        var bill_id=arr[1];
                        
                        $.ajax({
                            url:'ajax_request.php',
                            type:'POST',
                            dataType:'json',
                            data:{'action':'delete_normal_invoice_entry','id':id,'bill_id':bill_id},
                            success:function(result_job){
                                 
                                 $('#row_'+id+'').load(location.href+' #row_'+id+''); 
                                
                                $('#sub_total').val(result_job.data[0].sub_total);
                                $('#pieces_count').val(result_job.data[0].pieces_count);
                                $('#meters_count').val(result_job.data[0].meters_count);
                                 
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
                                            data:{'action':'update_normal_invoice','bill_id':bill_id,'customer_name':customer_name,'customer_contact':customer_contact,'payment_mode':payment_mode,'sub_total':sub_total,'discount_amount':discount_amount,'total_amount':total_amount,'cgst':cgst,'sgst':sgst,'igst':igst,'igst_amount':igst_amount,'net_amount':net_amount,'yearpicker':yearpicker},
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
                                            data:{'action':'update_normal_invoice','bill_id':bill_id,'customer_name':customer_name,'customer_contact':customer_contact,'payment_mode':payment_mode,'sub_total':sub_total,'discount_amount':discount_amount,'total_amount':total_amount,'cgst':cgst,'sgst':sgst,'igst':igst,'igst_amount':igst_amount,'net_amount':net_amount,'yearpicker':yearpicker},
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
