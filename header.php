<?php
include('include/config.php');

if(isset($_SESSION['username'])=='')
{
    echo "<script> window.location.href='auth-login.php'; </script>";
}
?>


<!DOCTYPE html>
<html lang="en">
    <head>
         <!--<meta charset="utf-8" />-->
        <!--<title>  SunilTraders</title>-->
        <!--<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">-->
        <!--<meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />-->
        <!--<meta content="" name="author" />-->
        <!--<meta http-equiv="X-UA-Compatible" content="IE=edge" />-->
        
         <meta charset="utf-8" />
        <title>  SunilTraders</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <link rel="shortcut icon" href="assets/images/favicon.ico">
        <link rel="shortcut icon" href="assets/images/favicon.ico">

         <link href="assets/plugins/datatables/datatable.css" rel="stylesheet" type="text/css" />
         
         <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
         <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
         <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" />
          <link href="assets/css/styles.css" rel="stylesheet" type="text/css" />
          <link href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
          <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<style>


@media (max-width: 1023.98px){
.enlarge-menu .page-content-tab {
    width: 80%;
}
}
 #payment_mode{
        box-shadow: 0 0 0.875rem 0 rgb(52 58 64 / 5%) !important;
    background-color: #fff;
    padding: 4px;
    border-radius: 7px;
    border-color:green;
    }
    .kk{
        align-items: center;
    padding: 0.4rem 0.1rem !important;
    font-size: .875rem;
    font-weight: 400;
    line-height: 1.5;
    color: #000444;
    text-align: center;
    white-space: nowrap;
    background-color: #f1f5fa;
    border: 1px solid #e8ebf3;
    border-radius: 0.25rem;
    }


    .table .thead-light th{color: #8997bd;
    background-color: #f9fafb;font-size: 14px; !important;

}
/*  .collapse:not(.show) {*/
/*     display: block !important; */
/*}*/

@media screen and (max-width: 992px){
  .collapse:not(.show) {
    display: block !important;
  }
}

@media screen and (max-width: 992px){
  .collapse {
    display: none !important;
  }
}


.dataTable-top, .dataTable-bottom {
    padding: 0px 0px !important;
}
.card-header {
    padding: 0.5rem 0.5rem !important;
}
.card-body {

    padding: 0.3rem 0.3rem !important;
}

.dataTable-table>tbody>tr>td, .dataTable-table>tbody>tr>th, .dataTable-table>tfoot>tr>td, .dataTable-table>tfoot>tr>th, .dataTable-table>thead>tr>td, .dataTable-table>thead>tr>th {
     padding: 0.2rem 0.2rem !important; 
}

.cardss {
    box-shadow:0 0 0.875rem 0 rgb(52 58 64 / 5%) !important;
    background-color: #fff;
    padding: 4px;
    border-radius: 9px;
}

.input-group>.form-control{
    height:30px !important;
}
 .input-group-text{
      height:30px !important;
 }

    .btn{
        padding: 0.1rem 0.5rem;
            
    }
    .page-title-box{
        padding:0px 0px !important;
    }
    
  .taggable .selectr-selected {
    padding: 4px 28px 4px 4px;
}
.selectr-options-container, .selectr-selected {
    border-color: #e8ebf3!important;
    background-color: #fff;
}
.selectr-selected {
    position: relative;
    z-index: 1;
    box-sizing: border-box;
    width: 100%;
    padding: 8px 28px 7px 14px;
    cursor: pointer;
    border: 1px solid #999;
    border-radius: 9px;
    background-color: #fff;
}
/*.bg-light-alt {*/
/*    background-color: cornflowerblue !important;*/
/*    border-radius: 7px;*/
/*}*/
/*.page-title-box h5 b{*/
/*    color:white;*/
/*}*/

.table .thead-light th {
    color: cadetblue;
    background-color: #f9fafb;
    font-size: 14px; !important: ;
    /* height: 2px; */
    padding: 10px;
}



  .a{
       background-color: rgba(85,126,248,.15)!important;
       color: #557ef8;
      
    }
    .b{
        background-color: rgba(255,159,67,.15)!important;
        color: #ff9f43;
        
    }
    .c{
        background-color: rgba(239,77,86,.15)!important;
        color: #ef4d56;
    
    }
    .d{
        background-color: rgba(34,183,131,.15)!important;
        color: #22b783
    }
    
    
  .aa:hover{
       background-color: rgba(85,126,248,.15)!important;
       color: #557ef8;
      
    }
    .bb:hover{
        background-color: rgba(255,159,67,.15)!important;
        color: #ff9f43;
        
    }
    .cc:hover{
        background-color: rgba(239,77,86,.15)!important;
        color: #ef4d56;
    
    }
    .dd:hover{
        background-color: rgba(34,183,131,.15)!important;
        color: #22b783
    }
    .form-check-input{
            border-color: cornflowerblue;
    }
    @media print (min-width: 300px){
  .strickers-desing {
      width: 100px !important;
    /*display: none !important;*/
  }
}
@media screen and (max-width: 992px){
.enlarge-menu .topbar .navbar-custom{
    margin-left: 1px !important;
}
}
@media (max-width: 1023.98px){
.navbar-custom {
    margin-left: 1px !important;
}
}
</style>
</head>
<body id="body_contents" class="dark-sidebar">
        <div class="left-sidebar">
            <!-- LOGO -->
            <div class="brand">
                <a href="index.php" class="logo">
                    <span>
                        <img src="assets/images/if_android_n_1175537.ico" style="border-radius:4px;height: 40px;
" alt="logo-small" class="logo-sm">
                    </span>
                    <span>
                        <!--<img src="assets/images/" alt="logo-large" class="logo-lg logo-light">-->
                        <img src="assets/images/" alt="logo-large" class="logo-lg logo-dark">
                    </span>
                </a>
            </div>
            <div class="sidebar-user-pro media border-end">                    
                <div class="position-relative mx-auto">
                    <img src="assets/images/sunillogo1.png" alt="user" class="rounded-circle thumb-md">
                    <span class="online-icon position-absolute end-0"><i class="mdi mdi-record text-success"></i></span>
                </div>
                <div class="media-body ms-2 user-detail align-self-center">
                    <h5 class="font-14 m-0 fw-bold"> SunilTraders</h5>  
                    <!--<p class="opacity-50 mb-0">michael.hill@exemple.com</p>          -->
                </div>                    
            </div>
            <div class="border-end">
                <ul class="nav nav-tabs menu-tab nav-justified" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-bs-toggle="tab" href="#Main" role="tab" aria-selected="true">M<span>enus</span></a>
                    </li>
                   
                </ul>
            </div>
            <!-- Tab panes -->
    
            <!--end logo-->
            <div class="menu-content h-100" data-simplebar>
                <div class="menu-body navbar-vertical">
                    <div class="collapse navbar-collapse tab-content" id="sidebarCollapse">
                        <!-- Navigation -->
                        <ul class="navbar-nav tab-pane active" id="Main" role="tabpanel">
                            <!--<li class="menu-label mt-0 text-primary font-12 fw-semibold">M<span>ain</span><br><span class="font-10 text-secondary fw-normal">Unique Dashboard</span></li>                    -->
                            <li class="nav-item">
                                <a class="nav-link" href="#sidebarAnalytics" data-bs-toggle="collapse" role="button"
                                    aria-expanded="false" aria-controls="sidebarAnalytics">
                                    <i class="ti ti-stack menu-icon"></i>
                                    <span>Bill Type</span>
                                </a>
                                <div class="collapse " id="sidebarAnalytics">
                                    <ul class="nav flex-column">
                                        
                                        <li class="nav-item">
                                            <a class="nav-link" href="estimateslip.php">Estimate Slip</a>
                                        </li><!--end nav-item-->
                                        <li class="nav-item">
                                            <a  class="nav-link " href="cashbill.php">Cash Bill</a>
                                        </li><!--end nav-item-->
                                        <li class="nav-item">
                                <a class="nav-link" href="#sidebarCrypto" data-bs-toggle="collapse" role="button"
                                    aria-expanded="false" aria-controls="sidebarCrypto">
                                    <i class="ti ti-currency-bitcoin menu-icon"></i>
                                    <span>Invoice</span>
                                </a>
                                <div class="collapse " id="sidebarCrypto">
                                    <ul class="nav flex-column">
                                       
                                        <li class="nav-item">
                                            <a class="nav-link" href="normal-invoice.php">Normal Invoice</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="comboset.php">Comboset Invoice</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="madharsha.php">Madharsha Billing</a>
                                        </li>
                                       
                                    </ul>
                                </div>
                            </li>
                            
                                        <li class="nav-item">
                                            <a class="nav-link " href="purchase.php" >Purchase</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link " href="stickerBill.php" >Sticker Bill</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link " href="debitNote.php" >Debit Note</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link " href="creditNote.php" >Credit Note</a>
                                        </li>
                                        
                                        
                                        
                                        
                                           <li class="nav-item">
                                <a class="nav-link" href="#sidebarCrypto1" data-bs-toggle="collapse" role="button"
                                    aria-expanded="false" aria-controls="sidebarCrypto1">
                                    <i class="ti ti-currency-bitcoin menu-icon"></i>
                                    <span>Gst</span>
                                </a>
                                <div class="collapse" id="sidebarCrypto1">
                                    <ul class="nav flex-column">
                                       
                                        <li class="nav-item">
                                            <a class="nav-link" href="madharsha_report.php">Sales Invoice</a>
                                        </li>
                                         <li class="nav-item">
                                            <a class="nav-link" href="cash_bill_report.php">Cash Bill</a>
                                        </li>
                                         <li class="nav-item">
                                            <a  class="nav-link " href="madharsha_sons_report.php">Madharsha & Sons</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="madharsha_showroom_report.php">Madharsha & Showroom</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="debitNoteReport.php">Debit Report</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="creditNoteReport.php">Credit Report</a>
                                        </li>
                                      
                                    </ul>
                                </div>
                            </li>

                                        <!--end nav-item-->
                                    </ul><!--end nav-->
                                </div><!--end sidebarAnalytics-->
                            </li><!--end nav-item-->
                            
                        </ul>
                        <ul class="navbar-nav tab-pane" id="Extra" role="tabpanel">
                            <li>
                                <div class="update-msg text-center position-relative">
                                    <button type="button" class="btn-close position-absolute end-0 me-2" aria-label="Close"></button>
                                    <img src="assets/images/speaker-light.png" alt="" class="" height="110">
                                    <h5 class="mt-0">Mannat Themes</h5>
                                    <p class="mb-3">We Design and Develop Clean and High Quality Web Applications</p>
                                    <a href="javascript: void(0);" class="btn btn-outline-warning btn-sm">Upgrade your plan</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>    
        </div>
        <!-- end left-sidenav-->
        <!-- end leftbar-menu-->

        <!-- Top Bar Start -->
        <!-- Top Bar Start -->
        <div class="topbar">            
            <!-- Navbar -->
            <nav class="navbar-custom" id="navbar-custom">    
                <ul class="list-unstyled topbar-nav float-end mb-0">
                    

                    <li class="dropdown">
                        <a class="nav-link dropdown-toggle nav-user" data-bs-toggle="dropdown" href="#" role="button"
                            aria-haspopup="false" aria-expanded="false">
                            <div class="d-flex align-items-center">
                                <img src="assets/images/sunillogo1.png" alt="profile-user" class="rounded-circle me-5 thumb-sm" />
                                <div>
                                    <small class="d-none d-md-block font-11"><?php echo $_SESSION['username']; ?></small>
                                    <span class="d-none d-md-block fw-semibold font-12">SunilTraders<i
                                            class="mdi mdi-chevron-down"></i></span>
                                </div>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <div class="dropdown-divider mb-0"></div>
                            <a class="dropdown-item" href="logout.php"><i class="ti ti-power font-16 me-1 align-text-bottom"></i> Logout</a>
                        </div>
                    </li>
                </ul><!--end topbar-nav-->

                <ul class="list-unstyled topbar-nav mb-0">                        
                    <li>
                        <button class="nav-link button-menu-mobile nav-icon" id="togglemenu">
                            <i class="ti ti-menu-2"></i>
                        </button>
                    </li> 
                    <li class="hide-phone app-search mt-3">
                        <form role="search" action="#" method="get">
                            <!--<input type="search" name="search" class="form-control top-search mb-0" placeholder="Type text...">-->
                            <!--<button type="submit"><i class="ti ti-search"></i></button>-->
                        </form>
                    </li>                       
                </ul>
            </nav>
            <!-- end navbar-->
        </div>