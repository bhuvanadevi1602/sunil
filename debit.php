<?php
include('./include/config.php');
$date = date('Y-m-d');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Debit Note | Sunil Traders</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <link href="assets/plugins/datatables/datatable.css" rel="stylesheet" type="text/css" />
     <!-- App css -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" />
    <style>
        #state_gst,
        #interstate_gst {
            display: none;
        }
    
        #gst_div {
            display: none;
        }
    
        #datatable_1 {
            display: none;
        }
    
        .card1 {
            display: none !important;
        }
    
        .col-lg-2 {
            width: 13.9999% !important;
        }
    </style>
</head>
<!-- <?php include('./include/topAndSideBar.php') ?> -->
<?php include('header.php') ?>
<!-- Top Bar End -->
<body id="body" class="dark-sidebar">
    <div class="page-wrapper">
        <!-- Page Content-->
        <div class="page-content-tab ">
            <div class="container-fluid">
                <!-- Page-Title -->
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="page-title-box bg-light-alt text-center bs">
                                <h5 class="m-1 p-1"><b>DEBIT NOTE</b></h5>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="detail-design">
                                <div class="tittle">
                                    <h5 class="text-center">CUSTOMER DETAILS</h5>
                                </div>
                                <div class="input-group mt-2">
                                    <div class="input-group-text">Name</div>
                                    <input type="text" class="add_entry form-control" id="supplierName" name="supplierName">
                                </div>
                                <div class="input-group mt-2">
                                    <div class="input-group-text ">GST</div>
                                    <input type="text" class="add_entry form-control" id="GSTNO" name="GSTNO">
                                </div>
                                <div class="input-group mt-2">
                                    <div class="input-group-text">Address</div>
                                    <input type="text" class="add_entry form-control" id="address"  name="address">
                                </div>
                                <!-- <div class="input-group mt-2">
                                    <div class="input-group-text ">Address 2</div>
                                    <input type="text" class="add_entry form-control" id="particular" name="particular">
                                </div> -->
                                <div class="input-group mt-2">
                                    <div class="input-group-text">City</div>
                                    <input type="text" class="add_entry form-control" id="city" name="city">
                                </div>
                                <div class="input-group mt-2">
                                    <div class="input-group-text">Ph no</div>
                                    <input type="text" class="add_entry form-control" id="particular" name="particular">
                                </div>
                            </div>
                            <div class="detail-design">
                                <div class="tittle">
                                    <h5 class="text-center">OTHERS</h5>
                                </div>
                                <div class="input-group mt-2">
                                    <div class="input-group-text ">APPr No</div>
                                    <input type="text" class="add_entry form-control" id="appNo" name="appNo">
                                </div>
                                <div class="input-group mt-2">
                                    <div class="input-group-text ">APPr Date</div>
                                    <input type="date" class="add_entry form-control" id="aDate" name="aDate">
                                </div>
                                <div class="input-group mt-2">
                                    <div class="input-group-text ">Terms</div>
                                    <input type="text" class="add_entry form-control" id="terms" name="terms">
                                </div>
                                <div class="input-group mt-2">
                                    <div class="input-group-text ">L/R No</div>
                                    <input type="text" class="add_entry form-control" id="LR" name="LR">
                                </div>
                                <div class="input-group mt-2">
                                    <div class="input-group-text ">L/R Date</div>
                                    <input type="date" class="add_entry form-control" id="lrDate" name="lrDate">
                                </div>
                                <div class="input-group mt-2">
                                    <div class="input-group-text ">THROUGH</div>
                                    <input type="text" class="add_entry form-control" id="through" name="through">
                                </div>
                                <div class="input-group mt-2">
                                    <div class="input-group-text ">DEBITED BILL NO</div>
                                    <input type="text" class="add_entry form-control" id="billNo" name="billNo">
                                </div>
                                <div class="input-group mt-2">
                                    <div class="input-group-text ">DEBIT ATM</div>
                                    <input type="text" class="add_entry form-control" id="particular" name="particular">
                                </div>
                                <div class="input-group mt-2">
                                    <div class="input-group-text ">DEBIT BILL</div>
                                    <input type="text" class="add_entry form-control" id="particular" name="particular">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-9">
                            <div class="page-title-box bg-light-alt text-center bs">
                                <h5 class="m-1 p-1"><b>BILLING</b></h5>
                            </div>
                            <div class="row mt-3">
                                <div class="col-lg-2">
                                    <label class=""><b>PARTICULARS</b></label>
                                    <input  type="text" value="" id="particulars" name="particulars" class="add_entry form-control cardss mt-2 duplicate" placeholder="" required>
                                </div>
                                <div class="col-lg-2">
                                    <label class=""><b>INVOICE No</b></label>
                                    <input  type="text" value="" id="invoiceNumber" name="invoiceNumber" class="add_entry form-control cardss mt-2" placeholder="" required>
                                </div>
                                <div class="col-lg-2">
                                    <label class=""><b>HSN No</b></label>
                                    <input  type="text" value="" id="HSNNo" name="HSNNo" class="add_entry form-control cardss mt-2" placeholder="" required>
                                </div>
                                <div class="col-lg-2">
                                    <label class=""><b>Mrts/Cms</b></label>
                                    <input  type="text" id="meterValue" name="meter" class="add_entry form-control cardss mt-2 duplicate" onkeyup="amountCalc()" placeholder="" required>
                                </div>
                                <div class="col-lg-2">
                                    <label class=""><b>TOTAL Mrts</b></label>
                                    <input  type="text" value="" name="customer_name" class="add_entry form-control cardss mt-2 duplicate" placeholder="" required>
                                </div>
                                <div class="col-lg-2">
                                    <label class=""><b>PIECES</b></label>
                                    <input  type="text" value="" name="customer_name" class="add_entry form-control cardss mt-2 duplicate" placeholder="" required>
                                </div>
                                <div class="col-lg-2">
                                    <label class=""><b>RATE/Mrts</b></label>
                                    <input  type="text" value="" id="rateValue" name="rate" onkeyup="amountCalc()" class="add_entry form-control cardss mt-2 duplicate" placeholder="" required>
                                    <input class="form-control" type="hidden" id="amount" name="amount" readonly >
                                </div>
                                <div class="row mt-1">
                                    <div class="col-12 mt-3 p-0">
                                        <div class="card">
                                            <div class="card-header">
                                                <h4 class="card-title text-center">Particulars Details</h4>
                                            </div>
                                            <!--end card-header-->
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <thead class="thead-light">
                                                            <tr>
                                                                <th class="text-center">S.NO</th>
                                                                <th class="text-center">Particular</th>
                                                                <th class="text-center">Invoice No</th>
                                                                <th class="text-center">HSN No</th>
                                                                <th class="text-center">Meter's</th>
                                                                <th class="text-center">Pieces</th>
                                                                <th class="text-center">Rate</th>
                                                                <th class="text-center">Amount</th>
                                                                <th class="text-center">Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="particulars_rows">
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <br><br><br><br><br><br>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="row align-items-centers">
                                            <div class="col-lg-4">
                                                <label class=""><b>TOTAL PIECES</b></label>
                                            </div>
                                            <div class="col-lg-8">
                                                <input  type="text" value="" name="customer_name" class="add_entry form-control cardss crdsheight" placeholder="" required>
                                            </div>
                                            <div class="col-lg-4">
                                                <label class=""><b>TOTAL METERS</b></label>
                                            </div>
                                            <div class="col-lg-8">
                                                <input  type="text" value="" name="customer_name" class="add_entry form-control cardss crdsheight mt-2" placeholder="" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="text-ends">
                                            <div class="input-group">
                                                <div class="input-group-text">AMOUNT</div>
                                                <input type="number" class="form-control mb-2" id="subTotal" name="subTotal" readonly>
                                            </div>
                                            <div class="input-group">
                                                <div class="input-group-text">IGST</div>
                                                <input class="form-control mb-2" type="number" id="IGST" name="IGST" oninput="GSTCalc()">
                                                <input class="form-control" type="hidden" id="IGSTTax" name="IGSTTax" value="">
                                            </div>
                                            <div class="input-group">
                                                <div class="input-group-text">CGST</div>
                                                <input class="form-control mb-2" type="number" id="CGST" name="CGST" oninput="GSTCalc()">
                                                <input class="form-control" type="hidden" id="CGSTTax" name="CGSTTax" value="" >
                                            </div>
                                            <div class="input-group">
                                                <div class="input-group-text">SGST</div>
                                                <input class="form-control mb-2" type="number" id="SGST" name="SGST" oninput="GSTCalc()">
                                                <input class="form-control" type="hidden" id="IGSTTax" name="IGSTTax" value="">
                                            </div>
                                            <div class="input-group">
                                                <div class="input-group-text">TOTAL AMOUNT</div>
                                                <input type="text" class="form-control mb-2" type="number" id="total" name="total" onkeyup="GSTCalc()" readonly>
                                            </div>
                                            <div class="input-group">
                                                <div class="input-group-text">ROUND OFF</div>
                                                <input class="form-control mb-2" type="number" id="roundOff" name="roundOff" onkeyup="GSTCalc()" readonly>
                                            </div>
                                            <div class="input-group">
                                                <div class="input-group-text">TOTAL AMOUNT</div>
                                                <input class="form-control" type="number" id="netAmount" name="netAmount" onkeyup="GSTCalc()" readonly>
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
    <!-- age-wrapper -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="assets/plugins/datatables/simple-datatables.js"></script>
    <script src="assets/pages/datatable.init.js"></script>
    <!-- App js -->
    <script src="assets/js/app.js"></script>
    <?php 
        $sql = "SELECT * FROM debit_note ORDER BY debit_note_id DESC LIMIT 1";
        $result = $conn->query($sql);
        $debitNoteTable = $result->fetch_assoc();
        $formId = strtotime(date('Ymdhis')).$debitNoteTable['debit_note_id'];
    ?>
    <script>
        $(document).ready(function() {

            // $("#GSTType").hide();
            // $('#stateCGstValue').hide();
            // $('#stateSGstValue').hide();
            // $('#IGSTValue').hide();
            // $('#meter').hide();
            // $('#pieces').hide();

        });

        // function unitShow(value) {
        //     if(value == "Meter"){
        //         $(`#meter`).show();$(`#pieces`).hide();
        //     }else if(value == "Pieces"){
        //         $(`#meter`).hide();$(`#pieces`).show();
        //     }
        // }

        // let GST = document.getElementById('GST').value;
        // let GSTType = document.getElementById('GSTType').value;
        function amountCalc() {
            let meter = document.getElementById('meterValue').value;
            console.log(meter);
            // let pieces = document.getElementById('piecesValue').value;
            let rate = document.getElementById('rateValue').value;
            console.log(rate);
            // if(meter){
                let amount =  parseFloat(meter)*parseFloat(rate);
                document.getElementById('amount').value = amount;
                console.log(amount);
            // }else{
            //     let amount =  parseFloat(pieces)*parseFloat(rate);
            //     document.getElementById('amount').value = amount;
            // }
        }
        

        function GSTCalc(value){
            // var GST = $('#GST').val(value);

            let subTotalAmount = document.getElementById('subTotal').value;

            // if(value == "yes"){
                    let CGST = document.getElementById('CGST').value;
                    let CGSTTax = subTotalAmount/100*CGST;
                    document.getElementById('CGSTTax').value = CGSTTax
                    // console.log(CGSTTax);
                    let SGST = document.getElementById('SGST').value;
                    let SGSTTax = subTotalAmount/100*SGST;
                    document.getElementById('SGSTTax').value = SGSTTax
                    // console.log(SGSTTax);

                    let IGST = document.getElementById('IGST').value;
                    let IGSTTax = subTotalAmount/100*IGST;
                    document.getElementById('IGSTTax').value = IGSTTax
                    // console.log(IGSTTax);
                
                if(IGSTTax){
                    let total = parseFloat(subTotalAmount)+parseFloat(IGSTTax);
                    // console.log(total);
                    document.getElementById('total').value = total
                    let round = total.toFixed();
                    let roundedAmount = round-total;
                    $('.netAmount').val(round);
                    $('#roundOff').val(roundedAmount);
                }else if(CGSTTax){
                    let total = parseFloat(subTotalAmount)+parseFloat(CGSTTax)+parseFloat(SGSTTax);
                    document.getElementById('total').value = total
                    let round = total.toFixed();
                    let roundedAmount = round-total;
                    $('.netAmount').val(round);
                    $('#roundOff').val(roundedAmount);
                }else{
                    let CGST = document.getElementById('CGST').value = '';
                    let SGST = document.getElementById('SGST').value = '';
                    let IGST = document.getElementById('IGST').value = '';
                    let total = parseFloat(subTotalAmount);
                    document.getElementById('total').value = total
                    let round = total.toFixed();
                    let roundedAmount = round-total;
                    $('#netAmount').val(round);
                    $('#roundOff').val(roundedAmount);
                }
            // }else if(value == "no"){
                // console.log("no");
                // let total = parseFloat(subTotalAmount);
                // document.getElementById('total').value = total
                // let round = total.toFixed();
                // let roundedAmount = round-total;
                // $('#netAmount').val(round);
                // $('#roundOff').val(roundedAmount);
            // }else{
            //     let total = parseFloat(subTotalAmount);
            //     document.getElementById('total').value = total
            //     let round = total.toFixed();
            //     let roundedAmount = round-total;
            //     $('#netAmount').val(round);
            //     $('#roundOff').val(roundedAmount);
            // }
        }
        


        $('.duplicate').keypress(function(event){
            var key =  event.which || event.keyCode;
            if(key == 13){
                var supplierName = $('#supplierName').val();
                var address = $('#address').val();
                var city = $('#city').val();
                var billNo = $('#billNo').val();
                var appNo = $('#appNo').val();
                var aDate = $('#aDate').val();
                var GSTNO = $('#GSTNO').val();
                var terms = $('#terms').val();
                var HSNNo = $('#HSNNo').val();
                var LR = $('#LR').val();
                var lrDate = $('#lrDate').val();
                var through = $('#through').val(); 
                var invoiceNumber = $('#invoiceNumber').val();
                
                var particulars = $('#particulars').val();
                var meterValue = $('#meterValue').val();
                var piecesValue = $('#piecesValue').val();
                var rateValue = $('#rateValue').val();
                if(meterValue){
                    var unit = 'Meter';
                }else{
                    var unit = 'Pieces';
                }
                var amount = $('#amount').val();

                // var GST = $('#GST').val();
                var CGST = $('#CGST').val();
                var CGSTTax = $('#CGSTTax').val();
                var SGST = $('#SGST').val();
                var SGSTTax = $('#SGSTTax').val();
                var IGST = $('#IGST').val();
                var IGSTTax = $('#IGSTTax').val();
                var yearpicker = $('#yearpicker').val();
                  
             if(CGST || SGST){
                        var GST = "yes";
                        var GSTType = "state"
                    }else if(IGST){
                        var GST = "yes";
                        var GSTType = "interState"
                    }else{
                        var GST = "no";
                        var GSTType = ""
                    }
                var total = $('#total').val();
                var roundOff = $('#roundOff').val();
                var netAmount = $('#netAmount').val();
                
                if(particulars == '' && (meterValue == '' || piecesValue == '') && rateValue == '' && invoiceNumber == ''){
                    alert("Please Enter the Product Unit..")
                }else if(rateValue == ''){
                    alert("Please Enter the Product Rate Amount..")
                }else{
                    $.ajax({
                        url:'ajax_debitNote.php?action=firstEntry',
                        type:'POST',
                        dataType:'json',
                        // data:{'supplierName':supplierName,'address':address,'city':city,'billNo':billNo,'appNo':appNo,'aDate':aDate,'GSTNO':GSTNO,'terms':terms,'HSNNo':HSNNo,'LR':LR,'lrDate':lrDate, 'through':through,'invoiceNumber':invoiceNumber,'unit':unit,'particulars':particulars,'meterValue':meterValue,'piecesValue':piecesValue,'rateValue':rateValue,'amount':amount,formId:'<?= $formId ?>'},
                        data:{'supplierName':supplierName,'address':address,'city':city,'billNo':billNo,'appNo':appNo,'aDate':aDate,'GSTNO':GSTNO,'terms':terms,'HSNNo':HSNNo,'LR':LR,'lrDate':lrDate, 'through':through,'invoiceNumber':invoiceNumber,'unit':unit,'particulars':particulars,'meterValue':meterValue,'piecesValue':piecesValue,'rateValue':rateValue,'amount':amount,'subTotal':subTotal,'GST':GST,'GSTType':GSTType,'CGST':CGST,'CGSTTax':CGSTTax,'SGST':SGST,'SGSTTax':SGSTTax,'IGST':IGST,'IGSTTax':IGSTTax,'total':total,'roundOff':roundOff,'netAmount':netAmount,formId:'<?= $formId ?>','financialYear':yearpicker},
                        success:function(result){
                            if(result.status == 1){
                                $('#MeterRadio').find('input').prop('checked',false);
                                $('#piecesRadio').find('input').prop('checked',false);
                                $("#particulars").val('');
                                $('#invoiceNumber').val('');
                                $("#meterValue").val('');
                                $("#piecesValue").val('');
                                $("#rateValue").val('');
                                $("#amount").val(0);
                                $('#particulars_row').html('');
                                var sub_total = 0;
                                let inc = 1;
                                for(let i=0;i<result.data.length;i++){
                                    $('#particulars_row').append('<tr id="row_'+result.data[i].debit_note_product_id+'"><td class="text-center" id="inc">'+ (inc++) +'</td><td class="text-center" id="td_particular">'+result.data[i].particulars+'</td><td class="text-center" id="td_invoice">'+result.data[i].invoiceNumber+'</td><td class="text-center" id="td_meter">'+result.data[i].meter+'</td><td class="text-center" id="td_pieces">'+result.data[i].pieces+'</td><td class="text-center" id="td_rate">'+result.data[i].rate+'</td><td class="text-center" id="td_amount_'+i+'">'+result.data[i].amount+'</td><td class="text-center"><i class="fa fa-trash fa-danger remove_particular" id="'+result.data[i].debit_note_product_id+'_'+result.data[i].debit_note_id+'"></i></td></tr>')
                                    var rest_amount=parseFloat(result.data[i].amount);
                                    sub_total = rest_amount+sub_total;
                                }
                                $("#subTotal").val(sub_total);
                                let total = parseFloat(sub_total);
                                document.getElementById('total').value = total
                                let round = total.toFixed();
                                let roundedAmount = round-total;
                                $('#netAmount').val(round);
                                $('#roundOff').val(roundedAmount);
                                $('#cus_id').val(result.data[0].id);
                                let status = result.data1[0]
                                // if(status == 0){
                                    $('.remove_particular').on('click',function(){
                                        var delete_rec=$(this).attr('id');
                                        var arr=delete_rec.split('_');
                                        var productId=arr[0];
                                        var debitId=arr[1];
                                        var delRecRow = $('#row_'+productId).remove();
                                        $.ajax({
                                            url:'ajax_debitNote.php?action=delete',
                                            type:'POST',
                                            dataType:'json',
                                            data:{'productId':productId,'debitId':debitId},
                                            success:function(result_job){
                                                $('#row_'+productId+'').load(location.href+' #row_'+productId+''); 
                                                $('#subTotal').val(result_job.amount[0].sub_total);
                                                if(result_job.status==1){
                                                    var sub_tot=$('#subTotal').val();
                                                    // if(sub_tot != null){
                                                    //     var cgst=$('#CGST').val();
                                                    //     var sgst=$('#SGST').val();
                                                    //     var igst=$('#IGST').val();
                                                        
                                                    //     var total_amount=sub_tot;
                                                    //     var cgst_amount=(total_amount/100)*cgst;
                                                    //     var sgst_amount=(total_amount/100)*sgst;
                                                    //     var igst_amount=(total_amount/100)*igst;
                                                    //     var gst_type=$("input[name='GSTType']:checked").val();
                                                        
                                                    //     if(gst_type=='state'){
                                                    //         var net_amount=total_amount+cgst_amount+sgst_amount;
                                                    //     }else if(gst_type=='interState'){
                                                    //         var net_amount=total_amount+igst_amount;
                                                    //     }else if(typeof gst_type=="undefined"){
                                                    //         var net_amount=total_amount;
                                                    //     }
                                                    //     let round = total_amount.toFixed();
                                                    //     let roundedAmount = round-total_amount;
                                                    //     $('#netAmount').val(round);
                                                    //     $('#roundOff').val(net_amount);
                                                    // }else{
                                                        $('#total').val('0');
                                                        $('#netAmount').val('0');
                                                        $('#roundOff').val('0');
                                                    // }
                                                }
                                            }
                                        });
                                    });    
                                // }
                            }
                        }
                    });
                }
            }
        });
        $("#save").click(function(){
            var subTotal = $('#subTotal').val();
            var CGST = $('#CGST').val();
            var CGSTTax = $('#CGSTTax').val();
            var SGST = $('#SGST').val();
            var SGSTTax = $('#SGSTTax').val();
            var IGST = $('#IGST').val();
            var IGSTTax = $('#IGSTTax').val();
                if(CGST || SGST){
                    var GST = "yes";
                    var GSTType = "state"
                }else if(IGST){
                    var GST = "yes";
                    var GSTType = "interState"
                }else{
                    var GST = "no";
                    var GSTType = ""
                }
                // alert(GST)
                var total = $('#total').val();
            var roundOff = $('#roundOff').val();
            var netAmount = $('#netAmount').val();
            $.ajax({
                url:'ajax_debitNote.php?action=lastEntry',
                type:'POST',
                dataType:'json',
                data:{'subTotal':subTotal,'GST':GST,'GSTType':GSTType,'CGST':CGST,'CGSTTax':CGSTTax,'SGST':SGST,'SGSTTax':SGSTTax,'IGST':IGST,'IGSTTax':IGSTTax,'total':total,'roundOff':roundOff,'netAmount':netAmount,formId:'<?= $formId ?>'},
                success:function(result){
                    $('#supplierName').val('');
                    $('#address').val('');
                    $('#city').val('');
                    $('#billNo').val('');
                    $('#appNo').val('');
                    $('#aDate').val('');
                    $('#GSTNO').val('');
                    $('#terms').val('');
                    $('#HSNNo').val('');
                    $('#LR').val('');
                    $('#lrDate').val('');
                    $('#through').val('');
                    $('#invoiceNumber').val('');
                    // $('#unit').val('');
                    // $('.unit').find('input').prop('checked',false);
                    $('#MeterRadio').find('input').prop('checked',false);
                    $('#piecesRadio').find('input').prop('checked',false);
                    $('#particulars').val('');
                    $('#meterValue').val('');
                    $('#piecesValue').val('');
                    $('#rateValue').val('');
                    $('#amount').val('');

                    $('#subTotal').val('');
                    $('#GST').val('');
                    // $('#GSTType').val('');
                    $('#GST').find('input').prop('checked',false);
                    $('#GSTType').find('input').prop('checked',false);
                    $('#CGST').val('');
                    $('#CGSTTax').val('');
                    $('#SGST').val('');
                    $('#SGSTTax').val('');
                    $('#IGST').val('');
                    $('#IGSTTax').val('');
                    $('#total').val('');
                    $('#roundOff').val('');
                    $('#netAmount').val('');
                }
            });
        });
    </script>

    <!--end body-->
    <?php include('footer.php') ?>
</body>
</html>