<?php
   include('./include/config.php');

   $action=$_REQUEST['action'];
   $date =  date('Y-m-d');
   $output_data = $output_data1 =  array();

   if($action == "firstEntry"){
           $creditBillID = $_REQUEST['creditBillID'];
      $formId = $_REQUEST['formId'];
      $supplierName = $_REQUEST['supplierName'];
      
$yearpicker = $_REQUEST['financialYear'];
      $address = $_REQUEST['address'];
      $address = $_REQUEST['address'];
      $city = $_REQUEST['city'];
        $yearpicker = $_REQUEST['financialYear'];
      $billNo = $_REQUEST['billNo'];
     $appNo = $_REQUEST['appNo'];
      $aDate = $_REQUEST['aDate'];
      $GSTNO = $_REQUEST['GSTNO'];
      $terms = $_REQUEST['terms'];
      $HSNNo = $_REQUEST['HSNNo'];
      $LR = $_REQUEST['LR'];
      $lrDate = $_REQUEST['lrDate'];
      $through = $_REQUEST['through'];
    //   $invoiceNumber = $_REQUEST['invoiceNumber'];
      $particulars = $_REQUEST['particulars'];
      $meterValue = $_REQUEST['meterValue'];
      $totalMeter = $_REQUEST['totalMeter'];
      $piecesValue = $_REQUEST['piecesValue'];
      $rateValue = $_REQUEST['rateValue'];
      $amount = $_REQUEST['amount'];
 $GST = $_REQUEST['GST'];
$GSTType = $_REQUEST['GSTType'];
$CGST = $_REQUEST['CGST'];
$CGSTTax = $_REQUEST['CGSTTax'];
$SGST = $_REQUEST['SGST'];
$SGSTTax = $_REQUEST['SGSTTax'];
$IGST = $_REQUEST['IGST'];
$IGSTTax = $_REQUEST['IGSTTax'];
$total = $_REQUEST['total'];
$roundOff = $_REQUEST['roundOff'];
$netAmount = $_REQUEST['netAmount'];

      
       $da=date('Y');
    $sql = "SELECT * FROM credit_note WHERE credit_note_bill_id='$creditBillID' AND financialYear LIKE '$yearpicker%' order by credit_note_id DESC LIMIT 1";
      if($result = $conn->query($sql)){
         if($result->num_rows > 0){
            $creditNoteTable = $result->fetch_assoc();
            $credit_note_id = $creditNoteTable['credit_note_id'];
            // $sql1 = "UPDATE credit_note SET supplierName='$supplierName',address='$address',city='$city',GSTNO='$GSTNO',appNo='$appNo',aDate='$aDate',terms='$terms',LR='$LR',lrDate='$lrDate',through='$through',amount='$amount' WHERE formId='$formId' AND credit_note_id = '$credit_note_id'"; 
            $sql1 = "UPDATE credit_note SET supplierName='$supplierName',address='$address',city='$city',billNo='$billNo',GSTNO='$GSTNO',appNo='$appNo',aDate='$aDate',terms='$terms',HSNNo='$HSNNo', LR='$LR',lrDate='$lrDate',through='$through',amount='$amount',GST='$GST',GSTType='$GSTType',CGST='$CGST',CGSTTax='$CGSTTax',SGST='$SGST',SGSTTax='$SGSTTax',IGST='$IGST',IGSTTax='$IGSTTax',subTotal='$subTotal',total='$total',roundOff='$roundOff',netAmount='$netAmount' WHERE credit_note_id = '$creditBillID'"; 
            if($conn->query($sql1)){
               $sql2 = "INSERT INTO credit_note_product(credit_note_id,HSNNo,particulars,meter,totalMeter,pieces,rate,amount,financialYear) values($creditBillID,'$HSNNo','$particulars','$meterValue','$totalMeter','$piecesValue','$rateValue','$amount',$da)"; 
 if($conn->query($sql2)){
                  $lastInsertId = $conn->insert_id;
                  $output_data1[]=array(
                        'id'=>$creditNoteTable['credit_note_id'],
                        'supplierName'=>$creditNoteTable['supplierName'],
                        'address'=>$creditNoteTable['address'],
                        'city'=>$creditNoteTable['city'],
                        'billNo'=>$creditNoteTable['billNo'],
                        'appNo'=>$creditNoteTable['appNo'],
                        'aDate'=>$creditNoteTable['aDate'],
                        'GSTNO'=>$creditNoteTable['GSTNO'],
                        'terms'=>$creditNoteTable['terms'],
                        'HSNNo'=>$creditNoteTable['HSNNo'],
                        'LR'=>$creditNoteTable['LR'],
                        'lrDate'=>$creditNoteTable['lrDate'],
                        'through'=>$creditNoteTable['through'],
                        'amount'=>$creditNoteTable['amount'],
                        'GST'=>$creditNoteTable['GST'],
                        'GSTType'=>$creditNoteTable['GSTType'],
                        'CGST'=>$creditNoteTable['CGST'],
                        'CGSTTax'=>$creditNoteTable['CGSTTax'],
                        'SGST'=>$creditNoteTable['SGST'],
                        'SGSTTax'=>$creditNoteTable['SGSTTax'],
                        'IGST'=>$creditNoteTable['IGST'],
                        'IGSTTax'=>$creditNoteTable['IGSTTax'],
                        'subTotal'=>$creditNoteTable['subTotal'],
                        'total'=>$creditNoteTable['total'],
                        'roundOff'=>$creditNoteTable['roundOff'],
                        'netAmount'=>$creditNoteTable['netAmount'],
                        'createdAt'=>$creditNoteTable['createdAt'],
                  );
                  $sql3 = "SELECT * FROM credit_note_product WHERE credit_note_id='$creditBillID' AND financialYear LIKE '$da%'";
                  $result3 = $conn->query($sql3);
                  while($creditNoteProductTable = $result3->fetch_assoc()){
                     // $subTotal += $creditNoteProductTable['amount'];
                     $output_data[]=array(
                        'credit_note_product_id'=>$creditNoteProductTable['credit_note_product_id'],
                        'credit_note_id'=>$creditNoteProductTable['credit_note_id'],
                        'HSNNo'=>$creditNoteProductTable['HSNNo'],
                        'particulars'=>$creditNoteProductTable['particulars'],
                        'invoiceNumber'=>$creditNoteProductTable['invoiceNumber'],
                        'meter'=>$creditNoteProductTable['meter'],
                        'totalMeter'=>$creditNoteProductTable['totalMeter'],
                        'pieces'=>$creditNoteProductTable['pieces'],
                        'rate'=>$creditNoteProductTable['rate'],
                        'amount'=>$creditNoteProductTable['amount'],
                        // 'subTotal'=>$subTotal,
                     );
                  }
                  $success = array('status'=>1,'data'=>$output_data,'data1'=>$output_data1);
                  echo json_encode($success);
               }
            }
         }else{
        //   $sql1 = "INSERT INTO credit_note(formId,supplierName,financialYear,address,city,appNo,aDate,GSTNO,terms,LR,lrDate,through,amount,status,credit_note_bill_id) VALUES('$formId','$supplierName','$yearpicker','$address','$city','$appNo','$aDate','$GSTNO','$terms','$LR','$lrDate','$through','$amount',0,'$creditBillID')"; 
           $sql1 = "INSERT INTO credit_note(formId,supplierName,financialYear,address,city,billNo,appNo,aDate,GSTNO, terms,HSNNo, LR,lrDate,through,invoiceNumber,amount,GST,GSTType,CGST,CGSTTax,SGST,SGSTTax,IGST,IGSTTax,subTotal,total,roundOff,netAmount,status,credit_note_bill_id) VALUES ('$formId','$supplierName',$yearpicker,'$address','$city','$billNo','$appNo','$aDate','$GSTNO','$terms','$HSNNo','$LR','$lrDate','$through','$invoiceNumber','$amount','$GST','$GSTType','$CGST','$CGSTTax','$SGST','$SGSTTax','$IGST','$IGSTTax','$subTotal','$total','$roundOff','$netAmount',0,$creditBillID)"; 
 //  print_r($sql1);die();
               // $sql1 = "INSERT INTO credit_note(formId,supplierName,address,city,billNo,appNo,aDate,GSTNO, terms,HSNNo, LR,lrDate,through,invoiceNumber,amount,GST,GSTType,CGST,CGSTTax,SGST,SGSTTax,IGST,IGSTTax,subTotal,total,roundOff,netAmount,status) VALUES ('$formId','$supplierName','$address','$city','$billNo','$appNo','$aDate','$GSTNO','$terms','$HSNNo','$LR','$lrDate','$through','$invoiceNumber','$amount','$GST','$GSTType','$CGST','$CGSTTax','$SGST','$SGSTTax','$IGST','$IGSTTax','$subTotal','$total','$roundOff','$netAmount',0)"; 
            if($conn->query($sql1)){
               $lastId = $conn->insert_id;
               $sql2 = "INSERT INTO credit_note_product(credit_note_id,HSNNo,particulars,meter,pieces,rate,amount,totalMeter,financialYear) values($creditBillID,'$HSNNo','$particulars','$meterValue','$piecesValue','$rateValue','$amount','$totalMeter','$yearpicker')"; 
  if($conn->query($sql2)){
                  $sql9 = "SELECT * FROM credit_note WHERE credit_note_id='$creditBillID' AND financialYear LIKE '$yearpicker%'";
if($result9 = $conn->query($sql9)){
                     $creditNoteTable1 = $result9->fetch_assoc();
                  // $credit_note_id = $creditNoteTable1['credit_note_id'];
                     $output_data1[]=array(
                           'id'=>$creditNoteTable1['credit_note_id'],
                           'supplierName'=>$creditNoteTable1['supplierName'],
                           'address'=>$creditNoteTable1['address'],
                           'city'=>$creditNoteTable1['city'],
                           'billNo'=>$creditNoteTable1['billNo'],
                           'appNo'=>$creditNoteTable1['appNo'],
                           'aDate'=>$creditNoteTable1['aDate'],
                           'GSTNO'=>$creditNoteTable1['GSTNO'],
                           'terms'=>$creditNoteTable1['terms'],
                           'HSNNo'=>$creditNoteTable1['HSNNo'],
                           'LR'=>$creditNoteTable1['LR'],
                           'lrDate'=>$creditNoteTable1['lrDate'],
                           'through'=>$creditNoteTable1['through'],
                           'amount'=>$creditNoteTable1['amount'],
                           'GST'=>$creditNoteTable1['GST'],
                           'GSTType'=>$creditNoteTable1['GSTType'],
                           'CGST'=>$creditNoteTable1['CGST'],
                           'CGSTTax'=>$creditNoteTable1['CGSTTax'],
                           'SGST'=>$creditNoteTable1['SGST'],
                           'SGSTTax'=>$creditNoteTable1['SGSTTax'],
                           'IGST'=>$creditNoteTable1['IGST'],
                           'IGSTTax'=>$creditNoteTable1['IGSTTax'],
                           'subTotal'=>$creditNoteTable1['subTotal'],
                           'total'=>$creditNoteTable1['total'],
                           'roundOff'=>$creditNoteTable1['roundOff'],
                           'netAmount'=>$creditNoteTable1['netAmount'],
                           'status'=>$creditNoteTable1['status'],
                           'createdAt'=>$creditNoteTable1['createdAt'],
                     );
                  }
                     $sql3 = "SELECT * FROM credit_note_product WHERE credit_note_id='$creditBillID' AND financialYear LIKE '$yearpicker%'";
                    $result3 = $conn->query($sql3);
                     // $subTotal = 0;
                     while($creditNoteProductTable = $result3->fetch_assoc()){
                        $output_data[]=array(
                              'credit_note_product_id'=>$creditNoteProductTable['credit_note_product_id'],
                              'credit_note_id'=>$creditNoteProductTable['credit_note_id'],
                              'particulars'=>$creditNoteProductTable['particulars'],
                              'invoiceNumber'=>$creditNoteProductTable['invoiceNumber'],
                              'HSNNo'=>$creditNoteProductTable['HSNNo'],
                              'meter'=>$creditNoteProductTable['meter'],
                              'totalMeter'=>$creditNoteProductTable['totalMeter'],
                              'pieces'=>$creditNoteProductTable['pieces'],
                              'rate'=>$creditNoteProductTable['rate'],
                              'amount'=>$creditNoteProductTable['amount'],
                        );
                     }
                     $success = array('status'=>1,'data'=>$output_data,'data1'=>$output_data1);
                     echo json_encode($success);
               }
            }
         }
      }
   }

   if($action == "lastEntry"){
      if(!empty($_REQUEST['formId'])){
         $formId = $_REQUEST['formId'];
         $id = $_REQUEST['id'];
         $supplierName = $_REQUEST['supplierName'];
         $address = $_REQUEST['address'];
         $phoneNo = $_REQUEST['phoneNo'];
         $city = $_REQUEST['city'];
         $billNo = $_REQUEST['billNo'];
         $appNo = $_REQUEST['appNo'];
         $aDate = $_REQUEST['aDate'];
         $GSTNO = $_REQUEST['GSTNO'];
         $terms = $_REQUEST['terms'];
         $HSNNo = $_REQUEST['HSNNo'];
         $LR = $_REQUEST['LR'];
         $lrDate = $_REQUEST['lrDate'];
         $through = $_REQUEST['through'];
        //  $invoiceNumber = $_REQUEST['invoiceNumber'];
         $creditAmt = $_REQUEST['creditAmt'];
         $creditBillDate = $_REQUEST['creditBillDate'];
         $particulars = $_REQUEST['particulars'];
         $meterValue = $_REQUEST['meterValue'];
         $totalMeter = $_REQUEST['totalMeter'];
         $piecesValue = $_REQUEST['piecesValue'];
         $rateValue = $_REQUEST['rateValue'];
         $amount = $_REQUEST['amount'];
         $subTotal = $_REQUEST['subTotal'];
         $GST = $_REQUEST['GST'];
         $GSTType = $_REQUEST['GSTType'];
         $CGST = $_REQUEST['CGST'];
          $CGSTTax = $_REQUEST['CGSTTax'];
         $SGST = $_REQUEST['SGST'];
         $dbno = $_REQUEST['dbno'];
         
          $SGSTTax = $_REQUEST['SGSTTax'];
         $IGST = $_REQUEST['IGST'];
          $IGSTTax = $_REQUEST['IGSTTax'];
         $total = $_REQUEST['total'];
         $roundOff = $_REQUEST['roundOff'];
         $netAmount = $_REQUEST['netAmount'];

        //  $sql = "SELECT * FROM credit_note WHERE credit_note_id='$id' order by credit_note_id DESC LIMIT 1";
           $sql = "SELECT * FROM credit_note WHERE formId='$formId' AND status='0' AND financialYear LIKE '$yearpicker%' order by credit_note_id DESC LIMIT 1";
      if($result = $conn->query($sql)){
            $creditNoteTable2 = $result->fetch_assoc();
            $lastInsertId1 = $creditNoteTable2['credit_note_id'];
            if($dbno=="") {
            $sql1 = "UPDATE credit_note SET supplierName='$supplierName',status=1,address='$address',phoneNo='$phoneNo',city='$city',GSTNO='$GSTNO',appNo='$appNo',aDate='$aDate',terms='$terms',LR='$LR',lrDate='$lrDate',through='$through',amount='$amount',GST='$GST',GSTType='$GSTType',CGST='$CGST',CGSTTax='$CGSTTax',SGST='$SGST',SGSTTax='$SGSTTax',IGST='$IGST',IGSTTax='$IGSTTax',subTotal='$subTotal',total='$total',roundOff='$roundOff',netAmount='$netAmount',billNo='$billNo',creditBillDate='$creditBillDate',creditAmt='$creditAmt' WHERE credit_note_id='$lastInsertId1'"; 
        //   print_r($sql1);die();
            }
            else{
            $sql1 = "UPDATE credit_note SET supplierName='$supplierName',status=1,address='$address',phoneNo='$phoneNo',city='$city',GSTNO='$GSTNO',appNo='$appNo',aDate='$aDate',terms='$terms',LR='$LR',lrDate='$lrDate',through='$through',amount='$amount',GST='$GST',GSTType='$GSTType',CGST='$CGST',CGSTTax='$CGSTTax',SGST='$SGST',SGSTTax='$SGSTTax',IGST='$IGST',IGSTTax='$IGSTTax',subTotal='$subTotal',total='$total',roundOff='$roundOff',netAmount='$netAmount',billNo='$billNo',creditBillDate='$creditBillDate',creditAmt='$creditAmt' WHERE credit_note_bill_id='$dbno'"; 
        //   print_r($sql1);die();
            }
                if($conn->query($sql1)){
               $output_data1[]=array(
                  'id'=>$creditNoteTable2['credit_note_id'],
                  'supplierName'=>$creditNoteTable2['supplierName'],
                  'address'=>$creditNoteTable2['address'],
                  'city'=>$creditNoteTable2['city'],
                  'billNo'=>$creditNoteTable2['billNo'],
                  'appNo'=>$creditNoteTable2['appNo'],
                  'aDate'=>$creditNoteTable2['aDate'],
                  'GSTNO'=>$creditNoteTable2['GSTNO'],
                  'terms'=>$creditNoteTable2['terms'],
                  'HSNNo'=>$creditNoteTable2['HSNNo'],
                  'LR'=>$creditNoteTable2['LR'],
                  'lrDate'=>$creditNoteTable2['lrDate'],
                  'through'=>$creditNoteTable2['through'],
                  'amount'=>$creditNoteTable2['amount'],
                  'GST'=>$creditNoteTable2['GST'],
                  'GSTType'=>$creditNoteTable2['GSTType'],
                  'CGST'=>$creditNoteTable2['CGST'],
                  'CGSTTax'=>$creditNoteTable2['CGSTTax'],
                  'SGST'=>$creditNoteTable2['SGST'],
                  'SGSTTax'=>$creditNoteTable2['SGSTTax'],
                  'IGST'=>$creditNoteTable2['IGST'],
                  'IGSTTax'=>$creditNoteTable2['IGSTTax'],
                  'subTotal'=>$creditNoteTable2['subTotal'],
                  'total'=>$creditNoteTable2['total'],
                  'roundOff'=>$creditNoteTable2['roundOff'],
                  'netAmount'=>$creditNoteTable2['netAmount'],
                  'status'=>$creditNoteTable2['status'],
                  'createdAt'=>$creditNoteTable2['createdAt'],
               );
               $sql3 = "SELECT * FROM credit_note_product WHERE credit_note_id='$lastInsertId'";
               $result3 = $conn->query($sql3);
               while($creditNoteProductTable = $result3->fetch_assoc()){
                  $output_data[]=array(
                        'credit_note_product_id'=>$creditNoteProductTable['credit_note_product_id'],
                        'credit_note_id'=>$creditNoteProductTable['credit_note_id'],
                        // 'unit'=>$creditNoteProductTable['unit'],
                        'particulars'=>$creditNoteProductTable['particulars'],
                        'invoiceNumber'=>$creditNoteProductTable['invoiceNumber'],
                        'meter'=>$creditNoteProductTable['meter'],
                        'pieces'=>$creditNoteProductTable['pieces'],
                        'rate'=>$creditNoteProductTable['rate'],
                        'amount'=>$creditNoteProductTable['amount'],
                  );
               }
               $success = array('status'=>3,'data'=>$output_data,'data1'=>$output_data1);
               echo json_encode($success);
            }
         }
      }
   }

   if($action=='delete'){
      $id=$_REQUEST['productId'];
      $creditId=$_REQUEST['creditId'];
$yearpicker=$_REQUEST['financialYear'];

      $sql = "DELETE FROM credit_note_product WHERE credit_note_product_id=$id AND credit_note_id='$creditId'";
        //   $sql4 = "SELECT sum(amount) as sub_total,sum(totalMeter) as totalMeter,sum(pieces) as totalPieces from credit_note_product where credit_note_id='$creditId' AND financialYear LIKE '$yearpicker%'";
    //   print_r($sql4);die();
    if($conn->query($sql)){
          $sql4 = "SELECT sum(amount) as sub_total,sum(totalMeter) as totalMeter,sum(pieces) as totalPieces from credit_note_product where credit_note_id='$creditId' AND financialYear LIKE '$yearpicker%'";
     //  print_r($sql4);die();
   $result2 = $conn->query($sql4);
         $rec = $result2->fetch_assoc();
         
         $amount[]=array(
            'sub_total'=>$rec['sub_total'],
            'totalMeter'=>$rec['totalMeter'],
            'totalPieces'=>$rec['totalPieces']
         );
         // $sql5 = "SELECT sum(totalMeter) as totalMeter,sum(pieces) as totalPieces from credit_note_product where credit_note_id='$creditId'";
         // $result5 = $conn->query($sql5);
         // $unitTotal = $result5->fetch_assoc();
         // $unit[]=array(
         //    'totalMeter'=>$unit['totalMeter'],
         //    'totalPieces'=>$unit['totalPieces']
         // );
         $sql6 = "SELECT * FROM credit_note WHERE credit_note_id='$creditId'";
         $result6 = $conn->query($sql6);
         $creditNoteTable6 = $result6->fetch_assoc();

         $output_data[]=array(
            'id'=>$creditNoteTable6['credit_note_id'],
            'supplierName'=>$creditNoteTable6['supplierName'],
            'address'=>$creditNoteTable6['address'],
            'city'=>$creditNoteTable6['city'],
            'billNo'=>$creditNoteTable6['billNo'],
            'appNo'=>$creditNoteTable6['appNo'],
            'aDate'=>$creditNoteTable6['aDate'],
            'GSTNO'=>$creditNoteTable6['GSTNO'],
            'terms'=>$creditNoteTable6['terms'],
            'HSNNo'=>$creditNoteTable6['HSNNo'],
            'LR'=>$creditNoteTable6['LR'],
            'lrDate'=>$creditNoteTable6['lrDate'],
            'through'=>$creditNoteTable6['through'],
            'amount'=>$creditNoteTable6['amount'],
            'GST'=>$creditNoteTable6['GST'],
            'GSTType'=>$creditNoteTable6['GSTType'],
            'CGST'=>$creditNoteTable6['CGST'],
            'CGSTTax'=>$creditNoteTable6['CGSTTax'],
            'SGST'=>$creditNoteTable6['SGST'],
            'SGSTTax'=>$creditNoteTable6['SGSTTax'],
            'IGST'=>$creditNoteTable6['IGST'],
            'IGSTTax'=>$creditNoteTable6['IGSTTax'],
            'subTotal'=>$creditNoteTable6['subTotal'],
            'total'=>$creditNoteTable6['total'],
            'roundOff'=>$creditNoteTable6['roundOff'],
            'netAmount'=>$creditNoteTable6['netAmount'],
            'status'=>$creditNoteTable6['status'],
            'createdAt'=>$creditNoteTable6['createdAt'],
         );

         $entry_deleted=array('status'=>1,'data'=>$output_data,'amount'=>$amount);
         // $entry_deleted=array('status'=>1,'data'=>$output_data,'amount'=>$amount,'unit'=>$unit);
         echo json_encode($entry_deleted);
      }
   }
   if($action=='reprint'){
      $printId=$_REQUEST['printId'];
      $year=$_REQUEST['year'];

      $sqlr = "SELECT * FROM credit_note WHERE credit_note_bill_id='$printId' AND financialYear LIKE '%$year%'";
      //order by credit_note_id DESC LIMIT 1
    //   print_r($sqlr);die();
      if($resultr = $conn->query($sqlr)){
         $creditNoteTable21 = $resultr->fetch_assoc();
         $lastInsertIdr = $creditNoteTable21['credit_note_id'];
    //       $sql1 = "UPDATE credit_note SET supplierName='$supplierName',address='$address',phoneNo='$phoneNo',city='$city',billNo='$billNo',GSTNO='$GSTNO',appNo='$appNo',aDate='$aDate',terms='$terms',LR='$LR',lrDate='$lrDate',through='$through',amount='$amount',GST='$GST',GSTType='$GSTType',CGST='$CGST',SGST='$SGST',IGST='$IGST',CGSTTax='$CGSTTax',SGSTTax='$SGSTTax',IGSTTax='$IGSTTax',subTotal='$subTotal',total='$total',roundOff='$roundOff',netAmount='$netAmount',debitBillDate='$debitBillDate',debitAmt='$debitAmt',status='1' WHERE formId='$formId'"; 
    //   print_r($sql1);die();
    //   $conn->query($sql1);
       // if($conn->query($sql1)){
            $output_data1[]=array(
               'id'=>$creditNoteTable21['credit_note_id'],
               'supplierName'=>$creditNoteTable21['supplierName'],
               'address'=>$creditNoteTable21['address'],
               'city'=>$creditNoteTable21['city'],
               'billNo'=>$creditNoteTable21['billNo'],
               'appNo'=>$creditNoteTable21['appNo'],
               'aDate'=>$creditNoteTable21['aDate'],
               'GSTNO'=>$creditNoteTable21['GSTNO'],
               'terms'=>$creditNoteTable21['terms'],
               'dbn'=>$creditNoteTable21['credit_note_id'],
                    'HSNNo'=>$creditNoteTable21['HSNNo'],
               'LR'=>$creditNoteTable21['LR'],
               'lrDate'=>$creditNoteTable21['lrDate'],
               'through'=>$creditNoteTable21['through'],
               'amount'=>$creditNoteTable21['amount'],
               'GST'=>$creditNoteTable21['GST'],
               'GSTType'=>$creditNoteTable21['GSTType'],
               'CGST'=>$creditNoteTable21['CGST'],
               'CGSTTax'=>$creditNoteTable21['CGSTTax'],
               'SGST'=>$creditNoteTable21['SGST'],
               'SGSTTax'=>$creditNoteTable21['SGSTTax'],
               'IGST'=>$creditNoteTable21['IGST'],
               'IGSTTax'=>$creditNoteTable21['IGSTTax'],
               'subTotal'=>$creditNoteTable21['subTotal'],
               'total'=>$creditNoteTable21['total'],
               'roundOff'=>$creditNoteTable21['roundOff'],
               'netAmount'=>$creditNoteTable21['netAmount'],
               'status'=>$creditNoteTable21['status'],
               'createdAt'=>$creditNoteTable21['createdAt'],
               'phoneNo'=>$creditNoteTable21['phoneNo'],
               'creditBillDate'=>$creditNoteTable21['creditBillDate'],
               'creditAmt'=>$creditNoteTable21['creditAmt'],
            );
            $sql3 = "SELECT * FROM credit_note_product WHERE credit_note_id='$printId' and financialYear  LIKE '%$year%' ";
            $result3 = $conn->query($sql3);
            while($creditNoteProductTable1 = $result3->fetch_assoc()){
               $output_data[]=array(
                     'credit_note_product_id'=>$creditNoteProductTable1['credit_note_product_id'],
                     'credit_note_id'=>$creditNoteProductTable1['credit_note_id'],
                     'particulars'=>$creditNoteProductTable1['particulars'],
                     'invoiceNumber'=>$creditNoteProductTable1['invoiceNumber'],
                     'HSNNo'=>$creditNoteProductTable1['HSNNo'],
                     'totalMeter'=>$creditNoteProductTable1['totalMeter'],
                     'meter'=>$creditNoteProductTable1['meter'],
                     'pieces'=>$creditNoteProductTable1['pieces'],
                     'rate'=>$creditNoteProductTable1['rate'],
                     'amount'=>$creditNoteProductTable1['amount'],
               );
            }
            $success = array(
                           'status'=>4,
                           'data'=>$output_data,
                           'data1'=>$output_data1
                        );
            echo json_encode($success);
         // }
      }
   }
?>