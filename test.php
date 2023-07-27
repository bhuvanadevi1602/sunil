<?php
include('./include/config.php');
// session_start();
// // $time_fixed = date('Y-m-d', strtotime('+1 year', strtotime($current_date)));
// // if($current_date>=$time_fixed)
// // {
                                                            
  
//   $_SESSION['bill_id']='ES_1';
  
//   echo "<script>alert('test')</script>";
   
// // }

$estimate_sql="insert into estimate_slip_final(bill_id) values('')"; 
$result=mysqli_query($conn,$estimate_sql);

$cash_sql="insert into cash_bill_final(bill_id) values('')";
$result=mysqli_query($conn,$cash_sql);

$comboset_sql="insert into comboset_invoice_final(bill_id) values('')";
$result=mysqli_query($conn,$comboset_sql);

$debit_note_sql="insert into debit_note(debit_note_id) values('')";
$debit_note_result=mysqli_query($conn,$debit_note_sql);

$credit_note_sql="insert into credit_note(credit_note_id) values('')";
$credit_note_result=mysqli_query($conn,$credit_note_sql);

?>