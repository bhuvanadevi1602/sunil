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
<!-- <?php // include('./include/topAndSideBar.php') ?> -->
<?php include('header.php') ?>
<!-- Top Bar End -->
<body id="body" class="dark-sidebar">
    <div class="page-wrapper">
        <!-- Page Content-->
        <div class="page-content-tab ">
            <div class="container-fluid">
                <!-- Page-Title -->
                <div class="container-fluid">
                    <form method="post">
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="page-title-box bg-light-alt text-center bs input-group row">
                                    <?php 
                                        $sql = "SELECT * FROM debit_note ORDER BY debit_note_id DESC LIMIT 1";
                                        $result = $conn->query($sql);
                                        $debitNoteTable = $result->fetch_assoc();
                                        $yea=date("M",strtotime($debitNoteTable['createdAt'])); 
                                       $dbi=$debitNoteTable['debit_note_bill_id'];
                                       
                                        $sqlpr = "SELECT * FROM debit_note_product ORDER BY debit_note_id DESC LIMIT 1";
                                        $resultpr = $conn->query($sqlpr);
                                        $debitNoteTablepr = $resultpr->fetch_assoc();
                                    ?>
                                    <select class="form-control col-lg-4" name="yearpicker" id="yearpicker"></select><div class="input-group-text col-lg-5">DEBIT NO :</div>
                                    <?php
                                    //   if($debitNoteTable['debit_note_bill_id'] == ""){
                                    //     $v=1;
                                    // }
                                    if($yea=="Apr" && $dbi!=1) {
                                     $v1=1;   
                                    }
                                    else {
                                        $v=$debitNoteTable['debit_note_bill_id'] + 1;
                                            $v1=$v;
                                                    }
                                    ?>
                                    <input class="form-control col-lg-1" value="<?= $v1 ?>" type="text" id="debit">
                                <!--<div class="input-group mt-2">-->
                                <!--        <div class="input-group-text ">DEBIT BILL No</div>-->
                                <!--        <input type="text" class="add_entry form-control enter" id="debitBillNo" name="debitBillNo">-->
                                <!--    </div>-->
                                    <input class="form-control col-lg-1" type="hidden" value="" id="debitBillNo">
                                    <input class="form-control col-lg-1" type="hidden" value="<?=$debitNoteTablepr['debit_note_id']+1?>" id="debitBillNo1">
                                    <!-- <div class="input-group-text col-lg-2">Year :</div> -->
                                </div>
                            </div>
                            <div class="col-lg-1" style="display: flex;justify-content: center;align-items: center;">
                                <!--<input type="hidden" class="btn btn-primary" id="billid" value="<?=$debitNoteTable['debit_note_id']?>">-->
                                <input type="button" class="btn btn-primary" id="reprint" value="Reprint">
                            </div>
                            <div class="col-lg-8">
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
                                        <div class="input-group-text">NAME</div>
                                        <input type="text" class="add_entry form-control enter" id="supplierName" name="supplierName">
                                    </div>
                                    <div class="input-group mt-2">
                                        <div class="input-group-text ">GST</div>
                                        <input type="text" class="add_entry form-control enter" id="GSTNO" name="GSTNO">
                                    </div>
                                    <div class="input-group mt-2">
                                        <div class="input-group-text">ADDRESS</div>
                                        <input type="text" class="add_entry form-control enter" id="address"  name="address">
                                    </div>
                                    <!-- <div class="input-group mt-2">
                                        <div class="input-group-text ">Address 2</div>
                                        <input type="text" class="add_entry form-control" id="particular" name="particular">
                                    </div> -->
                                    <div class="input-group mt-2">
                                        <div class="input-group-text">CITY</div>
                                        <input type="text" class="add_entry form-control enter" id="city" name="city">
                                    </div>
                                    <div class="input-group mt-2">
                                        <div class="input-group-text">PHNO</div>
                                        <input type="text" class="add_entry form-control enter" id="phoneNo" name="particular">
                                    </div>
                                </div>
                                <div class="detail-design">
                                    <div class="tittle">
                                        <h5 class="text-center">OTHERS</h5>
                                    </div>
                                    <div class="input-group mt-2">
                                        <div class="input-group-text ">APPr No</div>
                                        <input type="text" class="add_entry form-control enter" id="appNo" name="appNo">
                                    </div>
                                    <div class="input-group mt-2">
                                        <div class="input-group-text ">APPr Date</div>
                                        <input type="date" class="add_entry form-control enter" id="aDate" name="aDate">
                                    </div>
                                    <div class="input-group mt-2">
                                        <div class="input-group-text ">TERMS</div>
                                        <input type="text" class="add_entry form-control enter" id="terms" name="terms">
                                    </div>
                                    <div class="input-group mt-2">
                                        <div class="input-group-text ">L/R No</div>
                                        <input type="text" class="add_entry form-control enter" id="LR" name="LR">
                                    </div>
                                    <div class="input-group mt-2">
                                        <div class="input-group-text ">L/R DATE</div>
                                        <input type="date" class="add_entry form-control enter" id="lrDate" name="lrDate">
                                    </div>
                                    <div class="input-group mt-2">
                                        <div class="input-group-text ">THROUGH</div>
                                        <input type="text" class="add_entry form-control enter" id="through" name="through">
                                    </div>
                                    <div class="input-group mt-2">
                                        <div class="input-group-text ">DEBITED BILL NO</div>
                                        <input type="text" class="add_entry form-control enter" id="billNo" name="billNo">
                                    </div>
                                    <div class="input-group mt-2">
                                        <div class="input-group-text ">DEBIT AMT</div>
                                        <input type="text" class="add_entry form-control enter" id="debitAmt" name="debitAmt">
                                    </div>
                                    <div class="input-group mt-2">
                                        <div class="input-group-text ">DEBIT BILL Date</div>
                                        <input type="date" class="add_entry form-control enter" id="debitBillDate" name="debitBill">
                                    </div>
                                    
                                    <div class="input-group mt-2">
                                        <div class="input-group-text ">DEBIT NOTE Id</div>
                                        <input type="date" class="add_entry form-control enter" id="debitnoteid" name="debitnoteid">
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
                                        <input  type="text" value="" id="particulars" name="particulars" class="add_entry form-control enter cardss mt-2 duplicate" placeholder="" required>
                                    </div>
                                    <div class="col-lg-2">
                                        <label class=""><b>INVOICE No</b></label>
                                        <input  type="text" value="" id="invoiceNumber" name="invoiceNumber" class="add_entry form-control enter cardss mt-2" placeholder="" required>
                                    </div>
                                    <div class="col-lg-2">
                                        <label class=""><b>HSN No</b></label>
                                        <input  type="text" value="" id="HSNNo" name="HSNNo" class="add_entry form-control cardss enter mt-2" placeholder="" required>
                                    </div>
                                    <div class="col-lg-2">
                                        <label class=""><b>Mtrs/Cms</b></label>
                                        <input  type="text" id="meterValue" name="meter" class="add_entry form-control cardss enter mt-2 duplicate" oninput="amountCalc()" required>
                                    </div>
                                    <div class="col-lg-2">
                                        <label class=""><b>TOTAL Mtrs</b></label>
                                        <input  type="number" id="totalMeter" name="customer_name" class="add_entry form-control text-center cardss mt-2 duplicate" placeholder="" readonly>
                                    </div>
                                    <div class="col-lg-2">
                                        <label class=""><b>PIECES</b></label>
                                        <input  type="number" id="piecesValue" name="pieces" class="add_entry form-control text-center cardss mt-2" readonly>
                                    </div>
                                    <div class="col-lg-2">
                                        <label class=""><b>RATE/Mtrs</b></label>
                                        <input  type="number" value="" id="rateValue" name="rate" onkeyup="amountCalc()" class="add_entry enter form-control text-center cardss mt-2 duplicate" placeholder="" required>
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
                                                                    <!-- <th class="text-center">S.NO</th> -->
                                                                    <th class="text-center">PATICULARS</th>
                                                                    <th class="text-center">INVOICE NO</th>
                                                                    <th class="text-center">HSN NO</th>
                                                                    <th class="text-center">METERS</th>
                                                                    <th class="text-center">TOTAL METERS</th>
                                                                    <th class="text-center">PIECES</th>
                                                                    <th class="text-center">RATE/Mtrs</th>
                                                                    <th class="text-center">AMOUNT</th>
                                                                    <th class="text-center">ACTION</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody id="particulars_row">
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
                                                    <label class="mt-2"><b>TOTAL PIECES</b></label>
                                                </div>
                                                <div class="col-lg-8">
                                                    <input  type="number" id="totalPicesValue" name="totalPicesValue" class="add_entry form-control cardss crdsheight mt-2"  readonly>
                                                </div>
                                                <div class="col-lg-4">
                                                    <label class="mt-2"><b>TOTAL METERS</b></label>
                                                </div>
                                                <div class="col-lg-8">
                                                    <input  type="number" id="totalMeterValue" name="totalMeterValue" class="add_entry form-control cardss crdsheight mt-2" placeholder="" readonly>
                                                </div>
                                                <div class="col-lg-4">
                                                    <label class="mt-2"><b>GST</b></label>
                                                </div>
                                                <div class="col-lg-8">
                                                    <div class="row mt-2">
                                                        <div class="col-sm-12">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input GSTType" type="radio" name="GSTType" id="state" onclick="$('#stateSGstValue').show();$('#stateCGstValue').show();$('#IGSTValue').hide();" value="state">
                                                                <label class="form-check-label" for="inlineRadio1">State</label>
                                                            </div>
                                                            <div class="form-check form-check-inline ">
                                                                <input class="form-check-input GSTType" type="radio" name="GSTType" id="interState" onclick="$('#IGSTValue').show();$('#stateSGstValue').hide();$('#stateCGstValue').hide();" value="interState">
                                                                <label class="form-check-label" for="inlineRadio2">Inter State</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="text-ends">
                                                <div class="input-group">
                                                    <div class="input-group-text">AMOUNT</div>
                                                    <input type="number" class="form-control mb-2" id="subTotal" name="subTotal" onchange="GSTCalc()" readonly>
                                                </div>
                                                    <div class="input-group" id="IGSTValue">
                                                        <div class="input-group-text">IGST</div>
                                                        <input class="form-control mb-2" type="number" id="IGST" name="IGST" onkeyup="GSTCalc()">
                                                        <input class="form-control" type="number" id="IGSTTax" name="IGSTTax" readonly>
                                                    </div>
                                                <div class="row">
                                                    <div class="input-group col-lg-6" id="stateCGstValue">
                                                        <div class="input-group-text">CGST</div>
                                                        <input class="form-control mb-2" type="number" id="CGST" name="CGST" onkeyup="GSTCalc()">
                                                        <input class="form-control" type="number" id="CGSTTax" name="CGSTTax"  readonly>
                                                    </div>
                                                    <div class="input-group col-lg-6" id="stateSGstValue">
                                                        <div class="input-group-text">SGST</div>
                                                        <input class="form-control mb-2" type="number" id="SGST" name="SGST" onkeyup="GSTCalc()">
                                                        <input class="form-control" type="number" id="SGSTTax" name="SGSTTax" readonly>
                                                    </div>
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
                                        <input class="col-lg-5 btn btn-primary mt-2 p-1 mb-2" type="reset" value="Clear">
                                        <input class="col-lg-5 btn btn-primary mt-2 p-1 mb-2" type="hidden" id="cus_id" >
                                        <div class="col-lg-2 d-flex justify-content-end mt-2 p-1 mb-2"></div>
                                        <input class="col-lg-5 btn btn-success mt-2 p-1 mb-2" id="save" type="button" value="Save & Print">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- age-wrapper -->
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>-->
    <!--<script src="assets/plugins/datatables/simple-datatables.js"></script>-->
    <!--<script src="assets/pages/datatable.init.js"></script>-->
    <!-- App js -->
    <!--<script src="assets/js/app.js"></script>-->
    <!--end body-->
    <?php include('footer.php') ?>
    
    <?php 
        $sql = "SELECT * FROM debit_note ORDER BY debit_note_id DESC LIMIT 1";
        $result = $conn->query($sql);
        $debitNoteTable = $result->fetch_assoc();
        $formId = $debitNoteTable['debit_note_id'];
        // $formId = strtotime(date('Ymdhis')).$debitNoteTable['debit_note_id'];
    ?>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"> 
    </script>
    <script type="text/javascript">
        let startYear = 2021;
        let endYear = new Date().getFullYear();
        for (i = endYear; i >= startYear; i--){
        $('#yearpicker').append($('<option />').val(i).html(i));
        }

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
    </script>
    <script>
       $('#debit').keypress(function(event){
          let key =  event.which || event.keyCode;
          let year = $('#yearpicker').val();
          let idValue = $('#debit').val();
                     
        //   alert(idValue)
            if(key == 13){
                 $.ajax({
                    url:'ajax_debitNote.php?action=reprint',
                    type:'POST',
                    dataType:'json',
                    data:{"printId":idValue,"year":year},
                    success:function(result){
                        if(result.status==4){
                            $('#supplierName').val("");
                            $('#address').val("");
                            $('#city').val("");
                            $('#billNo').val("");
                            $('#appNo').val("");
                            $('#aDate').val("");
                            $('#GSTNO').val("");
                            $('#terms').val("");
                            $('#LR').val("");
                            $('#lrDate').val("");
                            $('#through').val("");
                            $('#creditAmt').val("");
                            $('#creditBillDate').val("");
                            $('#phoneNo').val("");
                            $('#particulars_row').html('');
                            var sub_total = totalMeterValue = totalPicesValue = 0;
                            let inc = 1;
                            for(let i=0;i<result.data.length;i++){
                                $('#particulars_row').append('<tr id="row_'+result.data[i].debit_note_product_id+'"><td class="text-center" id="td_particular">'+result.data[i].particulars+'</td><td class="text-center" id="td_invoice">'+result.data[i].invoiceNumber+'</td><td class="text-center" id="td_HSNNo">'+result.data[i].HSNNo+'</td><td class="text-center" id="td_meter">'+result.data[i].meter+'</td><td class="text-center" id="td_meter">'+parseFloat(result.data[i].totalMeter).toFixed(2)+'</td><td class="text-center" id="td_pieces">'+result.data[i].pieces+'</td><td class="text-center" id="td_rate">'+parseFloat(result.data[i].rate).toFixed(2)+'</td><td class="text-center" id="td_amount_'+i+'">'+parseFloat(result.data[i].amount).toFixed(2)+'</td><td class="text-center"><i class="fa fa-trash fa-danger remove_particular" id="'+result.data[i].debit_note_product_id+'_'+result.data[i].debit_note_id+'"></i></td></tr>')
                                // $('#particulars_row').append('<tr id="row_'+result.data[i].debit_note_product_id+'"><td class="text-center" id="inc">'+ (inc++) +'</td><td class="text-center" id="td_particular">'+result.data[i].particulars+'</td><td class="text-center" id="td_invoice">'+result.data[i].invoiceNumber+'</td><td class="text-center" id="td_HSNNo">'+result.data[i].HSNNo+'</td><td class="text-center" id="td_meter">'+result.data[i].meter+'</td><td class="text-center" id="td_meter">'+result.data[i].totalMeter+'</td><td class="text-center" id="td_pieces">'+result.data[i].pieces+'</td><td class="text-center" id="td_rate">'+result.data[i].rate+'</td><td class="text-center" id="td_amount_'+i+'">'+result.data[i].amount+'</td><td class="text-center"><i class="fa fa-trash fa-danger remove_particular" id="'+result.data[i].debit_note_product_id+'_'+result.data[i].debit_note_id+'"></i></td></tr>')
                                var rest_amount=parseFloat(result.data[i].amount);
                                sub_total = rest_amount+sub_total;
                                var x = parseFloat(result.data[i].totalMeter);
                                totalMeterValue = x+totalMeterValue;
                                var y = parseFloat(result.data[i].pieces);
                                totalPicesValue = y+totalPicesValue;
                            }
                            
                            $('#supplierName').val(result.data1[0].supplierName);
                            $('#address').val(result.data1[0].address);
                            $('#city').val(result.data1[0].city);
                            $('#billNo').val(result.data1[0].billNo);
                            $('#appNo').val(result.data1[0].appNo);
                            $('#aDate').val(result.data1[0].aDate);
                            $('#GSTNO').val(result.data1[0].GSTNO);
                            $('#terms').val(result.data1[0].terms);
                            $('#LR').val(result.data1[0].LR);
                            //debitBillNo,dbn
                            $('#debitBillNo').val(result.data1[0].dbn);
                            $('#lrDate').val(result.data1[0].lrDate);
                            $('#through').val(result.data1[0].through);
                            $('#debitAmt').val(result.data1[0].debitAmt);
                            $('#debitBillDate').val(result.data1[0].debitBillDate);
                            $('#phoneNo').val(result.data1[0].phoneNo);

                            sub_tot = $("#subTotal").val(sub_total.toFixed(2));
                            $("#totalMeterValue").val(totalMeterValue.toFixed(2));
                            $("#totalPicesValue").val(totalPicesValue);
                            // alert((result.data1[0].IGST))
                            // alert(sub_tot)
                            
                            // if(result.data1[0].GSTType == "interState"){
                            //     $('#IGSTValue').show();
                            //     let igstValue = (result.data1[0].IGST)
                            //     $('#IGST').val((result.data1[0].IGST));
                            //     let IGSTTax = (igstValue/100*sub_total).toFixed(2)
                            //     $('#IGSTTax').val(IGSTTax);
                            //     let total = parseFloat(sub_total)+parseFloat(IGSTTax);
                            //     // let total = parseFloat(sub_tot)+parseFloat(CGSTTax)+parseFloat(SGSTTax);
                            //     document.getElementById('total').value = total.toFixed(2)
                            //     let round = total.toFixed();
                            //     let roundedAmount = round-total;
                            //     $('#netAmount').val(round);
                            //     $('#roundOff').val(roundedAmount.toFixed(2));
                            // }
                            // // else if(result.data1[0].SGST && result.data1[0].CGST){
                            // else if(result.data1[0].GSTType == "state"){
                            //     $('#stateCGstValue').show();
                            //     $('#stateSGstValue').show();
                            //     let SGST = (result.data1[0].SGST)
                            //     let CGST = (result.data1[0].CGST)
                            //     let SGSTTax = (SGST/100*sub_total).toFixed(2)
                            //     let CGSTTax = (CGST/100*sub_total).toFixed(2)
                            //     $('#SGST').val(result.data1[0].SGST);
                            //     $('#SGSTTax').val(SGSTTax);
                            //     $('#CGST').val(result.data1[0].CGST);
                            //     $('#CGSTTax').val(CGSTTax);
                                
                            //     let total = parseFloat(sub_total)+parseFloat(CGSTTax)+parseFloat(SGSTTax);
                            //     // alert(total)
                            //     document.getElementById('total').value = total.toFixed(2)
                            //     let round = total.toFixed();
                            //     let roundedAmount = round-total;
                            //     $('#netAmount').val(round);
                            //     $('#roundOff').val(roundedAmount.toFixed(2));
                            // }
                            
                                 let igstValue = (result.data1[0].IGST)
                        //   if(result.data1[0].GSTType == "interState"){
                              if(igstValue!=0) {
                                          $("#interState").prop("checked", true);
                         $('#IGSTValue').show();
                             $('#stateCGstValue').hide();
                                $('#stateSGstValue').hide();
                              $('#IGST').val((result.data1[0].IGST));
                                let IGSTTax = (igstValue/100*sub_total).toFixed(2)
                                $('#IGSTTax').val(IGSTTax);
                                let total = parseFloat(sub_total)+parseFloat(IGSTTax);
                                // let total = parseFloat(sub_tot)+parseFloat(CGSTTax)+parseFloat(SGSTTax);
                                document.getElementById('total').value = total.toFixed(2)
                                let round = total.toFixed();
                                let roundedAmount = round-total;
                                $('#netAmount').val(round);
                                $('#roundOff').val(roundedAmount.toFixed(2));
                          }
                          
                                 let SGST = (result.data1[0].SGST)
                                let CGST = (result.data1[0].CGST)
                        //  else if(result.data1[0].GSTType == "state"){
                        if(SGST!=0 && CGST!=0) {
                                   $("#state").prop("checked", true);
                           $('#stateCGstValue').show();
                                $('#stateSGstValue').show();
                              $('#IGSTValue').hide();
                                let SGSTTax = (SGST/100*sub_total).toFixed(2)
                                let CGSTTax = (CGST/100*sub_total).toFixed(2)
                                $('#SGST').val(result.data1[0].SGST);
                                $('#SGSTTax').val(SGSTTax);
                                $('#CGST').val(result.data1[0].CGST);
                                $('#CGSTTax').val(CGSTTax);
                                
                                let total = parseFloat(sub_total)+parseFloat(CGSTTax)+parseFloat(SGSTTax);
                                // alert(total)
                                document.getElementById('total').value = total.toFixed(2)
                                let round = total.toFixed();
                                let roundedAmount = round-total;
                                $('#netAmount').val(round);
                                $('#roundOff').val(roundedAmount.toFixed(2));     }
                                
                            // $('#cus_id').val(result.data[0].id);
                            // $('#formId').val(result.data[0].formId);
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
                                    data:{'productId':productId,'debitId':debitId,'financialYear':year},
                                    success:function(result_job){
                                        $('#row_'+productId+'').load(location.href+' #row_'+productId+''); 
                                        $('#subTotal').val(result_job.amount[0].sub_total);
                                        let tM = parseFloat(result_job.amount[0].totalMeter);
                                        // alert(tM.toFixed(2))
                                        // let tP = parseFloat(result_job.amount[0].totalPieces)
                                        // alert(result_job.amount[0].totalPieces)
                                        $('#totalMeterValue').val(tM);
                                        $('#totalPicesValue').val(result_job.amount[0].totalPieces);
                                        if(result_job.status==1){
                                            var sub_tot=$('#subTotal').val();
                                            if(sub_tot != null){
                                                let CGST = document.getElementById('CGST').value;
                                                let CGSTTax = sub_tot/100*CGST;
                                                
                                                let SGST = document.getElementById('SGST').value;
                                                let SGSTTax = sub_tot/100*SGST;
                                                
                                                let IGST = document.getElementById('IGST').value;
                                                let IGSTTax = sub_tot/100*IGST;
                                                
                                                if(IGSTTax){
                                                    let total = parseFloat(sub_tot)+parseFloat(IGSTTax);
                                                    // console.log(total);
                                                    document.getElementById('total').value = total.toFixed(2)
                                                    let round = total.toFixed();
                                                    let roundedAmount = round-total;
                                                    $('#netAmount').val(round);
                                                    $('#roundOff').val(roundedAmount.toFixed(2));
                                                    // // $('#CGST').hide();
                                                    // document.getElementById('CGST').setAttribute('readonly', true);
                                                    // // $('#SGST').hide();
                                                }else if(CGSTTax){
                                                    let total = parseFloat(sub_tot)+parseFloat(CGSTTax)+parseFloat(SGSTTax);
                                                    document.getElementById('total').value = total
                                                    let round = total.toFixed();
                                                    let roundedAmount = round-total;
                                                    $('#netAmount').val(round);
                                                    $('#roundOff').val(roundedAmount.toFixed(2));
                                                }else{
                                                    let total = parseFloat(sub_tot);
                                                    document.getElementById('total').value = total
                                                    let round = total.toFixed();
                                                    let roundedAmount = round-total;
                                                    $('#netAmount').val(round);
                                                    $('#roundOff').val(roundedAmount.toFixed(2));
                                                }
                                            }else{
                                                $("#totalMeterValue").val(0);
                                                $("#totalPicesValue").val(0);
                                                $('#total').val(0);
                                                $('#netAmount').val(0);
                                                $('#roundOff').val(0);
                                            }
                                        }
                                    }
                                });
                            }); 
                            $('#reprint').on('click',function(){
                                                                    //   let dbno=('#debitBillNo').val();
                                                                    dbno=document.getElementById("debit").value;
                                                                    dbno1=document.getElementById("debitBillNo1").value;
                                                                    if(dbno!=""){
                                                                      
          window.open("debitnote_bill.php?id="+dbno+"&year="+year);                      
                                                                                                             }
                                                                    else{
                                                  window.open("debitnote_bill.php?id="+dbno+"&year="+year);                      
                                                                    }
                                // window.open('bill.php?bill_id='+result_job.data[0].bill_id);
                            });
                        }
                    }
                });
            }
        });
        $(function() {
            $('#GSTNO').keyup(function() {
                this.value = this.value.toUpperCase();
            });
        });
        
        $(document).ready(function() {
            $('#stateCGstValue').hide();
            $('#stateSGstValue').hide();
            $('#IGSTValue').hide();
        });

        function amountCalc() {
            let meter = document.getElementById('meterValue').value;
            var myArray = meter.split(',');
            
            document.getElementById('piecesValue').value = myArray.length;
            let rate = document.getElementById('rateValue').value;
            let totalMeter = 0;

            for(i=0; i<myArray.length; i++){
                var number = parseFloat(myArray[i], 10);
                totalMeter += number;
            }
            // console.log(totalMeter.toFixed(2));

            document.getElementById('totalMeter').value = totalMeter.toFixed(2);
            let amount =  parseFloat(totalMeter)*parseFloat(rate);
            document.getElementById('amount').value = amount;
        }
        
        function GSTCalc(){
            let subTotalAmount = document.getElementById('subTotal').value;
            let CGST = document.getElementById('CGST').value;
            let CGSTTax = subTotalAmount/100*CGST;
            document.getElementById('CGSTTax').value = CGSTTax.toFixed(2)
                // console.log(CGSTTax);    
            let SGST = document.getElementById('SGST').value;
            let SGSTTax = subTotalAmount/100*SGST;
            document.getElementById('SGSTTax').value = SGSTTax.toFixed(2)
                // console.log(SGSTTax);
            let IGST = document.getElementById('IGST').value;
            let IGSTTax = subTotalAmount/100*IGST;
            document.getElementById('IGSTTax').value = IGSTTax.toFixed(2)
                    // console.log(IGSTTax);
            if(IGSTTax){
                let total = parseFloat(subTotalAmount)+parseFloat(IGSTTax);
                document.getElementById('total').value = total.toFixed(2)
                let round = total.toFixed();
                let roundedAmount = round-total;
                $('#netAmount').val(round);
                $('#roundOff').val(roundedAmount.toFixed(2));
            }else if(CGSTTax){
                let total = parseFloat(subTotalAmount)+parseFloat(CGSTTax)+parseFloat(SGSTTax);
                document.getElementById('total').value = total.toFixed(2)
                let round = total.toFixed();
                let roundedAmount = round-total;
                $('#netAmount').val(round);
                $('#roundOff').val(roundedAmount.toFixed(2));
            }else{
                let total = parseFloat(subTotalAmount);
                document.getElementById('total').value = total.toFixed(2)
                let round = total.toFixed();
                let roundedAmount = round-total;
                $('#netAmount').val(round);
                $('#roundOff').val(roundedAmount.toFixed(2));
            }
        }
        
        $('.duplicate').keypress(function(event){
            var key =  event.which || event.keyCode;
            if(key == 13){
                let year = $('#yearpicker').val();
                var debitBillID = $('#debit').val();
                var supplierName = $('#supplierName').val();
                var address = $('#address').val();
                var address = $('#address').val();
                var city = $('#city').val();
                var billNo = $('#billNo').val();
                var appNo = $('#appNo').val();
                var aDate = $('#aDate').val();
                var GSTNO = $('#GSTNO').val();
                var terms = $('#terms').val();
                var LR = $('#LR').val();
                var lrDate = $('#lrDate').val();
                var through = $('#through').val();
                var particulars = $('#particulars').val();
                var invoiceNumber = $('#invoiceNumber').val(); 
                var HSNNo = $('#HSNNo').val();
                var meterValue = $('#meterValue').val();
                var totalMeter = $('#totalMeter').val();
                var piecesValue = $('#piecesValue').val();
                var rateValue = $('#rateValue').val();
                if(meterValue){
                    var unit = 'Meter';
                }else{
                    var unit = 'Pieces';
                }
                var amount = $('#amount').val();
                var CGST = $('#CGST').val();
                var CGSTTax = $('#CGSTTax').val();
                var SGST = $('#SGST').val();
                var SGSTTax = $('#SGSTTax').val();
                var IGST = $('#IGST').val();
                var IGSTTax = $('#IGSTTax').val();
                    var vals = $("input[name='GSTType']:checked").val()
            // alert(vals)
            if(vals=="interState"){
                var GST = "yes";
                var GSTType = "interState";
                   IGSTTax = IGSTTax;
                   CGSTTax='';
                   SGSTTax='';
                   CGST='';
                   SGST='';
                   }
            else if(vals == "state")
            {
                  var GST = "yes";
              var GSTType = "state";
                  CGSTTax = CGSTTax;
                SGSTTax = CGSTTax;
                IGSTTax='';
                IGST='';
            }
           
           
                var total = $('#total').val();
                var roundOff = $('#roundOff').val();
                var netAmount = $('#netAmount').val();
                
                if(particulars == '' && meterValue == '' && rateValue == '' && invoiceNumber == ''){
                    // alert("Please Enter the Product Unit..")
                }else if(rateValue == ''){
                    alert("Please Enter the Product Rate Amount..")
                }else{
                    $.ajax({
                        url:'ajax_debitNote.php?action=firstEntry',
                        type:'POST',
                        dataType:'json',
                        data:{'debitBillID':debitBillID,'supplierName':supplierName,'address':address,'city':city,'billNo':billNo,'appNo':appNo,'aDate':aDate,'GSTNO':GSTNO,'terms':terms,'HSNNo':HSNNo,'LR':LR,'lrDate':lrDate, 'through':through,'invoiceNumber':invoiceNumber,'unit':unit,'particulars':particulars,'meterValue':meterValue,'totalMeter':totalMeter,'piecesValue':piecesValue,'rateValue':rateValue,'amount':amount,'financialYear':year,formId:'<?= $formId ?>'},
                        // data:{'debitBillID':debitBillID,'supplierName':supplierName,'address':address,'city':city,'billNo':billNo,'appNo':appNo,'aDate':aDate,'GSTNO':GSTNO,'terms':terms,'HSNNo':HSNNo,'LR':LR,'lrDate':lrDate, 'through':through,'invoiceNumber':invoiceNumber,'unit':unit,'particulars':particulars,'meterValue':meterValue,'piecesValue':piecesValue,'rateValue':rateValue,'amount':amount,'subTotal':subTotal,'GST':GST,'GSTType':GSTType,'CGST':CGST,'CGSTTax':CGSTTax,'SGST':SGST,'SGSTTax':SGSTTax,'IGST':IGST,'IGSTTax':IGSTTax,'total':total,'roundOff':roundOff,'netAmount':netAmount,'formId':<?= $formId ?>},
                        success:function(result){
                            if(result.status == 1){
                                       $('#particulars').focus();
                                $("#particulars").val('');
                                $('#invoiceNumber').val('');
                                $('#HSNNo').val('');
                                $("#meterValue").val(0);
                                $("#totalMeter").val(0);
                                $("#piecesValue").val(0);
                                $("#rateValue").val('');
                                $("#amount").val();
                                $('#particulars_row').html('');
                                $("#debitBillDate").focus();
                                var sub_total = totalMeterValue = totalPicesValue = 0;
                                let inc = 1;
                                for(let i=0;i<result.data.length;i++){
                                    $('#particulars_row').append('<tr id="row_'+result.data[i].debit_note_product_id+'"><td class="text-center" id="td_particular">'+result.data[i].particulars+'</td><td class="text-center" id="td_invoice">'+result.data[i].invoiceNumber+'</td><td class="text-center" id="td_HSNNo">'+result.data[i].HSNNo+'</td><td class="text-center" id="td_meter">'+result.data[i].meter+'</td><td class="text-center" id="td_meter">'+parseFloat(result.data[i].totalMeter).toFixed(2)+'</td><td class="text-center" id="td_pieces">'+result.data[i].pieces+'</td><td class="text-center" id="td_rate">'+parseFloat(result.data[i].rate).toFixed(2)+'</td><td class="text-center" id="td_amount_'+i+'">'+parseFloat(result.data[i].amount).toFixed(2)+'</td><td class="text-center"><i class="fa fa-trash fa-danger remove_particular" id="'+result.data[i].debit_note_product_id+'_'+result.data[i].debit_note_id+'"></i></td></tr>')
                                    // $('#particulars_row').append('<tr id="row_'+result.data[i].debit_note_product_id+'"><td class="text-center" id="inc">'+ (inc++) +'</td><td class="text-center" id="td_particular">'+result.data[i].particulars+'</td><td class="text-center" id="td_invoice">'+result.data[i].invoiceNumber+'</td><td class="text-center" id="td_HSNNo">'+result.data[i].HSNNo+'</td><td class="text-center" id="td_meter">'+result.data[i].meter+'</td><td class="text-center" id="td_meter">'+result.data[i].totalMeter+'</td><td class="text-center" id="td_pieces">'+result.data[i].pieces+'</td><td class="text-center" id="td_rate">'+result.data[i].rate+'</td><td class="text-center" id="td_amount_'+i+'">'+result.data[i].amount+'</td><td class="text-center"><i class="fa fa-trash fa-danger remove_particular" id="'+result.data[i].debit_note_product_id+'_'+result.data[i].debit_note_id+'"></i></td></tr>')
                                    var rest_amount=parseFloat(result.data[i].amount);
                                    sub_total = rest_amount+sub_total;
                                    var x = parseFloat(result.data[i].totalMeter);
                                    totalMeterValue = x+totalMeterValue;
                                    var y = parseFloat(result.data[i].pieces);
                                    totalPicesValue = y+totalPicesValue;
                                }

                                sub_tot = $("#subTotal").val(sub_total.toFixed(2));
                                $("#totalMeterValue").val(totalMeterValue.toFixed(2));
                                $("#totalPicesValue").val(totalPicesValue);
                                // alert((result.data1[0].IGST))
                                // alert(sub_tot)
                                
                                if(result.data1[0].GSTType == "interState"){
                                    $('#IGSTValue').show();
                                    let igstValue = (result.data1[0].IGST)
                                    $('#IGST').val((result.data1[0].IGST));
                                    let IGSTTax = (igstValue/100*sub_total).toFixed(2)
                                    $('#IGSTTax').val(IGSTTax);
                                    let total = parseFloat(sub_total)+parseFloat(IGSTTax);
                                    // let total = parseFloat(sub_tot)+parseFloat(CGSTTax)+parseFloat(SGSTTax);
                                    document.getElementById('total').value = total.toFixed(2)
                                    let round = total.toFixed();
                                    let roundedAmount = round-total;
                                    $('#netAmount').val(round);
                                    $('#roundOff').val(roundedAmount.toFixed(2));
                                }else if(result.data1[0].SGST && result.data1[0].CGST){
                                    // $('#stateCGstValue').show();
                                    // $('#stateSGstValue').show();
                                    let SGST = (result.data1[0].SGST)
                                    let CGST = (result.data1[0].CGST)
                                    let SGSTTax = (SGST/100*sub_total).toFixed(2)
                                    let CGSTTax = (CGST/100*sub_total).toFixed(2)
                                    $('#SGST').val(result.data1[0].SGST);
                                    $('#SGSTTax').val(SGSTTax);
                                    $('#CGST').val(result.data1[0].CGST);
                                    $('#CGSTTax').val(CGSTTax);
                                    
                                    let total = parseFloat(sub_total)+parseFloat(CGSTTax)+parseFloat(SGSTTax);
                                    // alert(total)
                                    document.getElementById('total').value = total.toFixed(2)
                                    let round = total.toFixed();
                                    let roundedAmount = round-total;
                                    $('#netAmount').val(round);
                                    $('#roundOff').val(roundedAmount.toFixed(2));
                                }else{
                                    $("#subTotal").val(sub_total.toFixed(2));
                                    $("#totalMeterValue").val(totalMeterValue.toFixed(2));
                                    $("#totalPicesValue").val(totalPicesValue);
                                    let total = parseFloat(sub_total);
                                    document.getElementById('total').value = total.toFixed(2)
                                    let round = total.toFixed();
                                    let roundedAmount = round-total;
                                    $('#netAmount').val(round);
                                    $('#roundOff').val(roundedAmount.toFixed(2));
                                }
                                // let cus_id = $('#cus_id').val(result.data[0].id);
                                // let formId = $('#formId').val(result.data[0].formId);
                                //  console.log(cus_id);
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
                                            data:{'productId':productId,'debitId':debitId,'financialYear':year},
                                            success:function(result_job){
                                                $('#row_'+productId+'').load(location.href+' #row_'+productId+''); 
                                                $('#subTotal').val(result_job.amount[0].sub_total);
                                                let tM = parseFloat(result_job.amount[0].totalMeter);
                                                // alert(tM.toFixed(2))
                                                // let tP = parseFloat(result_job.amount[0].totalPieces)
                                                // alert(result_job.amount[0].totalPieces)
                                                $('#totalMeterValue').val(tM);
                                                $('#totalPicesValue').val(result_job.amount[0].totalPieces);
                                                if(result_job.status==1){
                                                    var sub_tot=$('#subTotal').val();
                                                    if(sub_tot != null){
                                                        let CGST = document.getElementById('CGST').value;
                                                        let CGSTTax = sub_tot/100*CGST;
                                                        
                                                        let SGST = document.getElementById('SGST').value;
                                                        let SGSTTax = sub_tot/100*SGST;
                                                        
                                                        let IGST = document.getElementById('IGST').value;
                                                        let IGSTTax = sub_tot/100*IGST;
                                                        
                                                        if(IGSTTax){
                                                            let total = parseFloat(sub_tot)+parseFloat(IGSTTax);
                                                            // console.log(total);
                                                            document.getElementById('total').value = total.toFixed(2)
                                                            let round = total.toFixed();
                                                            let roundedAmount = round-total;
                                                            $('#netAmount').val(round);
                                                            $('#roundOff').val(roundedAmount.toFixed(2));
                                                            // // $('#CGST').hide();
                                                            // document.getElementById('CGST').setAttribute('readonly', true);
                                                            // // $('#SGST').hide();
                                                        }else if(CGSTTax){
                                                            let total = parseFloat(sub_tot)+parseFloat(CGSTTax)+parseFloat(SGSTTax);
                                                            document.getElementById('total').value = total
                                                            let round = total.toFixed();
                                                            let roundedAmount = round-total;
                                                            $('#netAmount').val(round);
                                                            $('#roundOff').val(roundedAmount.toFixed(2));
                                                        }else{
                                                            let total = parseFloat(sub_tot);
                                                            document.getElementById('total').value = total
                                                            let round = total.toFixed();
                                                            let roundedAmount = round-total;
                                                            $('#netAmount').val(round);
                                                            $('#roundOff').val(roundedAmount.toFixed(2));
                                                        }
                                                    }else{
                                                        $("#totalMeterValue").val(0);
                                                        $("#totalPicesValue").val(0);
                                                        $('#total').val(0);
                                                        $('#netAmount').val(0);
                                                        $('#roundOff').val(0);
                                                    }
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
            var id = $('#debit').val();
            let year = $('#yearpicker').val();
            var supplierName = $('#supplierName').val();
            var address = $('#address').val();
            var city = $('#city').val();
            var billNo = $('#billNo').val();
            var appNo = $('#appNo').val();
            var aDate = $('#aDate').val();
            var GSTNO = $('#GSTNO').val();
            var terms = $('#terms').val();
            var LR = $('#LR').val();
            var lrDate = $('#lrDate').val();
            var through = $('#through').val(); 
            var debitAmt = $('#debitAmt').val(); 
            var debitBillDate = $('#debitBillDate').val();
            var phoneNo = $('#phoneNo').val();
            var particulars = $('#particulars').val();
            var invoiceNumber = $('#invoiceNumber').val(); 
            var HSNNo = $('#HSNNo').val();
            var meterValue = $('#meterValue').val();
            var totalMeter = $('#totalMeter').val();
            var piecesValue = $('#piecesValue').val();
            var rateValue = $('#rateValue').val();
            
                  dbno=document.getElementById("debit").value;
                  dbno1=document.getElementById("debitBillNo1").value;
                                                                
            if(meterValue){
                var unit = 'Meter';
            }else{
                var unit = 'Pieces';
            }
            var amount = $('#amount').val();
            var subTotal = $('#subTotal').val();
            var CGST = $('#CGST').val();
            var CGSTTax = $('#CGSTTax').val();
            var SGST = $('#SGST').val();
            var SGSTTax = $('#SGSTTax').val();
            var IGST = $('#IGST').val();
            var debitnoteid=$('#debitnoteid').val();
            var IGSTTax = $('#IGSTTax').val();
            
           var vals = $("input[name='GSTType']:checked").val()
            // alert(vals)
            if(vals=="interState"){
                var GST = "yes";
                var GSTType = "interState";
                   IGSTTax = IGSTTax;
                   CGSTTax='';
                   SGSTTax='';
                   CGST='';
                   SGST='';
                   }
            else if(vals == "state")
            {
                  var GST = "yes";
              var GSTType = "state";
                  CGSTTax = CGSTTax;
                SGSTTax = CGSTTax;
                IGSTTax='';
                IGST='';
            }
                // if(CGST || SGST){
                //     var GST = "yes";
                //     var GSTType = "state"
                // }else if(IGST){
                //     var GST = "yes";
                //     var GSTType = "interState"
                // }else{
                //     var GST = "no";
                //     var GSTType = ""
                // }
            var total = $('#total').val();
            var roundOff = $('#roundOff').val();
            var netAmount = $('#netAmount').val();
            $.ajax({
                url:'ajax_debitNote.php?action=lastEntry',
                type:'POST',
                dataType:'json',
                data:{'id':id,'financialYear':year,'supplierName':supplierName,'address':address,'city':city,'phoneNo':phoneNo,'billNo':billNo,'appNo':appNo,'aDate':aDate,'GSTNO':GSTNO,'terms':terms,'HSNNo':HSNNo,'LR':LR,'lrDate':lrDate,'debitAmt':debitAmt,'debitBillDate':debitBillDate,'through':through,'invoiceNumber':invoiceNumber,'unit':unit,'particulars':particulars,'meterValue':meterValue,'totalMeter':totalMeter,'piecesValue':piecesValue,'rateValue':rateValue,'amount':amount,'subTotal':subTotal,'GST':GST,'GSTType':GSTType,'CGST':CGST,'CGSTTax':CGSTTax,'SGST':SGST,'SGSTTax':SGSTTax,'IGST':IGST,'IGSTTax':IGSTTax,'total':total,'roundOff':roundOff,'netAmount':netAmount,formId:'<?= $formId ?>','dbno':dbno},
                // data:{'subTotal':subTotal,'GST':GST,'GSTType':GSTType,'CGST':CGST,'CGSTTax':CGSTTax,'SGST':SGST,'SGSTTax':SGSTTax,'IGST':IGST,'IGSTTax':IGSTTax,'total':total,'roundOff':roundOff,'netAmount':netAmount,formId:'<?= $formId ?>'},
                success:function(result){
                    if(result.status==3){
                        if(dbno!=""){
                            window.open("debitnote_bill.php?id="+dbno+"&year="+year);
                        }
                        else
                        {
                            window.open("debitnote_bill.php?id="+dbno+"&year="+year);
                        }
                        window.location.reload();
                    }
                }
            });
        });
    </script>
</body>
</html>