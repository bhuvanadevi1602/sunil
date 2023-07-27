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

  <title>Report Normal Invoice || Sunil Traders</title>

<!-- <body id="body" onload="window.print()" class="dark-sidebar"> --
    <!-- Top Bar Start -->
    
    <!---->
    
<div class="page-wrapper">
        <!-- Page Content-->
<div class="page-content-tab ">

            <div class="containers ml-5" style="margin-left: 15px;">
                <div class="row">
                    <div class="col-12 " >
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title col-11">Normal Invoice Report</h4>
                                <div class="" style="float: right;">
                                    <!-- <input class="btn btn-primary" type="submit" name="filter" value="Submit"> -->
                                    <button class="btn btn-primary" onclick="printDiv()">Print</button>
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
                                                    <input class="btn btn-success" type="submit" name="filter" value="Submit">
                                                    
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <table class="" class="mt-3" id="madharsha_report_table" style=" white-space: nowrap;">
                                        <thead class="p-3">
                                          <tr>
                                                <th class="text-center">S.NO</th>
                                                <th class="text-center">INV DATE</th>
                                                <th class="text-center">PARTY NAME</th>
                                                <th class="text-center">AMOUNT</th>
                                                <th class="text-center">IGST</th>
                                                <th class="text-center">CGST</th>
                                                <th class="text-center">SGST</th>
                                                <th class="text-center">GSTNO</th>
                                                <th class="text-center">INVOICE No</th>
                                                <th class="text-center">TOTAL AMOUNT</th>
                                                
                                          </tr>
                                        </thead>
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
     <!--                 <!--Start Footer-->
                <!-- Footer Start -->
   <?php include('footer.php') ?>