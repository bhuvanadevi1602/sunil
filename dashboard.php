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
                    <div class="row mt-4">
                        
                        <div class="col-lg-12">
                            <div class="row justify-content-center"> 
                                <div class="col-lg-3">
                                    <div class="card overflow-hidden">
                                        <div class="card-body">
                                            <div class="row d-flex">
                                                <div class="col-3">
                                                    <i class="ti ti-users font-36 align-self-center text-dark"></i>
                                                </div><!--end col-->
                                                <div class="col-12 ms-auto align-self-center">
                                                    <div id="dash_spark_1" class="mb-3"></div>
                                                </div><!--end col-->
                                                <div class="col-12 ms-auto align-self-center">
                                                    <h3 class="text-dark my-0 font-22 fw-bold">24000</h3>
                                                    <p class="text-muted mb-0 fw-semibold">Sessions</p>
                                                </div><!--end col-->
                                            </div><!--end row-->
                                        </div><!--end card-body--> 
                                    </div><!--end card-->                                     
                                </div> <!--end col--> 
                                <div class="col-lg-3">
                                    <div class="card overflow-hidden">
                                        <div class="card-body">
                                            <div class="row d-flex">
                                                <div class="col-3">
                                                    <i class="ti ti-clock font-36 align-self-center text-dark"></i>
                                                </div><!--end col-->
                                                <div class="col-auto ms-auto align-self-center">
                                                    <span class="badge badge-soft-success px-2 py-1 font-11">Active</span>
                                                </div><!--end col-->
                                                <div class="col-12 ms-auto align-self-center">
                                                    <div id="dash_spark_2" class="mb-3"></div>
                                                </div><!--end col-->
                                                <div class="col-12 ms-auto align-self-center">
                                                    <h3 class="text-dark my-0 font-22 fw-bold">00:18</h3>
                                                    <p class="text-muted mb-0 fw-semibold">Avg.Sessions</p>
                                                </div><!--end col-->
                                            </div><!--end row-->
                                        </div><!--end card-body--> 
                                    </div><!--end card-->                                     
                                </div> <!--end col--> 
                                <div class="col-lg-3">
                                    <div class="card overflow-hidden">
                                        <div class="card-body">
                                            <div class="row d-flex">
                                                <div class="col-3">
                                                    <i class="ti ti-activity font-36 align-self-center text-dark"></i>
                                                </div><!--end col-->
                                                <div class="col-12 ms-auto align-self-center">
                                                    <div id="dash_spark_3" class="mb-3"></div>
                                                </div><!--end col-->
                                                <div class="col-12 ms-auto align-self-center">
                                                    <h3 class="text-dark my-0 font-22 fw-bold">$2400</h3>
                                                    <p class="text-muted mb-0 fw-semibold">Bounce Rate</p>
                                                </div><!--end col-->
                                            </div><!--end row-->
                                        </div><!--end card-body--> 
                                    </div><!--end card-->                                     
                                </div> <!--end col--> 
                                
                                <div class="col-lg-3">
                                    <div class="card overflow-hidden">
                                        <div class="card-body">
                                            <div class="row d-flex">
                                                <div class="col-3">
                                                    <i class="ti ti-confetti font-36 align-self-center text-dark"></i>
                                                </div><!--end col-->
                                                <div class="col-auto ms-auto align-self-center">
                                                    <span class="badge badge-soft-danger px-2 py-1 font-11">-2%</span>
                                                </div><!--end col-->
                                                <div class="col-12 ms-auto align-self-center">
                                                    <div id="dash_spark_4" class="mb-3"></div>
                                                </div><!--end col-->
                                                <div class="col-12 ms-auto align-self-center">
                                                    <h3 class="text-dark my-0 font-22 fw-bold">85000</h3>
                                                    <p class="text-muted mb-0 fw-semibold">Goal Completions</p>
                                                </div><!--end col-->
                                            </div><!--end row-->
                                        </div><!--end card-body--> 
                                    </div><!--end card-->                                     
                                </div> <!--end col-->                                                                   
                            </div><!--end row-->
                           
                </div>
                <!-- container -->
                <!-- end Footer -->                
                <!--end footer-->
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
 
 <script type="text/javascript">
    let startYear = 2021;
    let endYear = new Date().getFullYear();
     $('#yearpicker').append($('<option />').val('').html('Choose Year'));
    for (i = endYear; i >= startYear; i--)
    {
      $('#yearpicker').append($('<option />').val(i).html(i));
      
    }
</script>
