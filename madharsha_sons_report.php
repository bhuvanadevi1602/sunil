<?php include('header.php') ?>

    <style>
    
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

        table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
.table-responsive {
        overflow-x: visible;
}
@media screen and (max-width: 992px){
    .table-responsive {
        overflow-x: auto !important;
}
}

.dataTable-sorter {
       display: contents !important;
}
@media screen and (max-width: 992px){
.left-sidebar .menu-body .nav-item {
    position: relative;
}
}
@media (max-width: 992px){
.enlarge-menu .page-content-tab {
    width: 83%;
}
}
.dataTable-top, .dataTable-bottom {
    padding: 13px 0px !important;
}
  </style>

  <title>Report Madharsha Billing || Sunil Traders</title>

<!-- <body id="body" onload="window.print()" class="dark-sidebar"> --
    <!-- Top Bar Start -->
    
    <!--<?php // include('./include/topAndSideBar.php') ?>-->
    
<div class="page-wrapper">
        <!-- Page Content-->
<div class="page-content-tab ">

            <div class="containers ml-5" style="margin-left: 15px;">
                <div class="row">
                    <div class="col-12 " >
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title col-11">Madharsha & Sons Report</h4>
                                <div class="" style="float: right;">
                                    <!-- <input class="btn btn-primary" type="submit" name="filter" value="Submit"> -->
                                    <button class="btn btn-primary" id="print_report">Print</button>
                                    <!--<button class="btn btn-primary" onclick="printDiv('datatable')">Print</button>-->
                                </div>
                            </div>
                            <!--end card-header-->
                            <div class="card-body">
                                <div class="table-responsive">
                                    <div class="col-lg-12 ">
                                        <form method="post">
                                            <div class="row pb-3 pt-3">
                                                <label class="col-form-label text-center col-2">From Date :</label>
                                                
                                                <div class="col-3 text-center">
                                                    <input type="date" id='fdate' class="form-control" name="fdate" required>
                                                </div>
                                                <label class="col-form-label text-center col-2">To Date :</label>
                                                
                                                <div class="col-3 text-center">
                                                    <input type="date" id='toDate' class="form-control" name="toDate" required>
                                                </div>
                                                <div class="col-2 text-center">
                                                    <input class="btn btn-success" type="button" name="filter" id="filter_invoice" value="Submit">
                                                    
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <table  class="table  mt-3" id="datatable_1" style=" white-space: nowrap;">
                                        <thead class="p-3">
                                          <tr>
                                                <th class="text-center">S.NO</th>
                                                <th class="text-center">INV DATE</th>
                                                <th class="text-center">PARTY NAME</th>
                                                <th class="text-center">AMOUNT</th>
                                                <!--<th class="text-center">IGST</th>-->
                                                <th class="text-center">CGST</th>
                                                <th class="text-center">SGST</th>
                                                <th class="text-center">GSTNO</th>
                                                <th class="text-center">INVOICE No</th>
                                                <th class="text-center">TOTAL AMOUNT</th>
                                                
                                          </tr>
                                        </thead>
                                        
                                        <tfoot>
                                            <tr>
                                                <th class="text-center" colspan="2"></th>
                                               
                                                <th class="text-center">OVER ALL TOTAL</th>
                                                <th class="text-center" id="subtotal">0.0</th>
                                                <!--<th class="text-center" id="igst_total">0.0</th>-->
                                                <th class="text-center" id="cgst_total">0.0</th>
                                                <th class="text-center" id="sgst_total">0.0</th>
                                                <th class="text-center" colspan="2"></th>
                                                
                                                <th class="text-center" id="net_total">0.0</th>
                                                
                                          </tr>
                                        </tfoot>
                        </table>
                                
                                <iframe id="ifmcontentstoprint" style="height: 0px; width: 0px; position: absolute"></iframe>
                            </div>
                        </div>
                    </div>
                
                <!--end row-->
            </div>
            </div>
             </div>
            
</div>
      </div>  
        <!-- end page content -->
<?php include('footer.php')?>
    <!-- end page-wrapper -->

    <!-- Javascript  -->
  
<script>
    $(document).ready(function(){
        
        var table= $('#datatable_1').DataTable(
                      {
                        "processing": true,
                        "responsive": true,
                        data : [],
                    "order" : [ [ 0, "asc" ] ],
                            "columns": [
                            { "data": "si_no" },
                            { "data": "date" },
                            { "data": "customer_name" },
                            { "data": "amount" },
                            // { "data": "igst_amount" },
                            { "data": "cgst_amount" },
                            { "data": "sgst_amount" },
                            { "data": "gst_no" },
                            { "data": "bill_id" },
                            { "data": "net_amount" },
                            ],
                            columnDefs: [
                              {
                                    targets: 0,
                                     className: "text-center",
                                    render: function(data, type, row) {
                                        return row.si_no;
                                    }
                                },
                                {
                                    targets: 1,
                                     className: "text-center",
                                    render: function(data, type, row) {
                                        return row.date;
                                    }
                                },
                                {
                                    targets: 2,
                                    render: function(data, type, row) {
                                        return row.customer_name;
                                    }
                                },
                               
                                {
                                    targets: 3,
                                     className: "text-center",
                                    render: function(data, type, row) {
                                        return row.amount;
                                    }
                                },
                                // {
                                //     targets: 4,
                                //      className: "text-center",
                                //     render: function(data, type, row) {
                                //         if(row.igst_amount!='')
                                //         {
                                //             return row.igst_amount;
                                //         }
                                //         else
                                //         {
                                //             return '---';
                                //         }
                                //     }
                                // },
                                {
                                    targets: 4,
                                     className: "text-center",
                                    render: function(data, type, row) {
                                        if(row.cgst_amount!='')
                                        {
                                            return row.cgst_amount;
                                        }
                                        else
                                        {
                                            return '---';
                                        }
                                        
                                    }
                                },
                                {
                                    targets: 5,
                                     className: "text-center",
                                    render: function(data, type, row) {
                                        if(row.sgst_amount!='')
                                        {
                                            return row.sgst_amount;
                                        }
                                        else
                                        {
                                            return '---';
                                        }
                                    }
                                },
                                {
                                    targets: 6,
                                     className: "text-center",
                                    render: function(data, type, row) {
                                        if(row.gst_no!='')
                                        {
                                            return row.gst_no;
                                        }
                                        else
                                        {
                                            return '---';
                                        }
                                    }
                                },
                                {
                                    targets: 7,
                                     className: "text-center",
                                    render: function(data, type, row) {
                                        return row.bill_id;
                                    }
                                },
                                {
                                    targets: 8,
                                    className: "text-center",
                                    render: function(data, type, row) {
                                        return row.net_amount;
                                    }
                                },
                                
                             ]
            
                        }
                    );
       
        $('#filter_invoice').on('click',function(){
             var from_date=$('#fdate').val();
             var to_date=$('#toDate').val();
             
             table.ajax.url('ajax_request.php?action=fetch_madharsha_sons&from_date='+from_date+'&to_date='+to_date).load();
             table.ajax.reload();
            
             $.ajax({
                 url:'ajax_request.php?action=fetch_madharsha_sons_subtotal',
                 type:'POST',
                 dataType:'json',
                 data:{'from_date':from_date,'to_date':to_date},
                 success:function(result_job){
                    
                    $('#subtotal').html(result_job.data.subtotal);
                    // $('#igst_total').html(result_job.data.igst_total);
                    $('#cgst_total').html(result_job.data.cgst_total);
                    $('#sgst_total').html(result_job.data.sgst_total);
                    $('#net_total').html(result_job.data.net_total);
                 }
             });
             
        })
        
       
    });
    
    $('#print_report').on('click',function(){
        var from_date=$('#fdate').val();
        var to_date=$('#toDate').val();
        
        window.open('madharsha_sons_report_bill1.php?from_date='+from_date+'&to_date='+to_date);
        
    });
    
    
</script>            
         
         

