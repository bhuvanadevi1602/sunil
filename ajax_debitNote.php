<?php
   include('./include/config.php');

   $action=$_REQUEST['action'];
   $date =  date('Y-m-d');
   $output_data = $output_data1 =  array();

   if($action == "firstEntry"){
                  
                            $formId = $_REQUEST['formId'];
        $supplierName = $_REQUEST['supplierName'];
      $address = $_REQUEST['address'];
      $address = $_REQUEST['address'];
      $city = $_REQUEST['city'];
      $billNo = $_REQUEST['billNo'];
       $yearpicker = $_REQUEST['financialYear'];
   $creditBillID=$_REQUEST['debitBillID'];
      $appNo = $_REQUEST['appNo'];
      $aDate = $_REQUEST['aDate'];
      $GSTNO = $_REQUEST['GSTNO'];
      $terms = $_REQUEST['terms'];
      $HSNNo = $_REQUEST['HSNNo'];
      $LR = $_REQUEST['LR'];
      $lrDate = $_REQUEST['lrDate'];
      $through = $_REQUEST['through'];
      $invoiceNumber = $_REQUEST['invoiceNumber'];
      // $unit = $_REQUEST['unit'];
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
         $SGSTTax = $_REQUEST['SGSTTax'];
      $IGST = $_REQUEST['IGST'];
      $IGSTTax = $_REQUEST['IGSTTax'];
       $IGSTTax = $_REQUEST['IGSTTax'];
      $IGSTTax = $_REQUEST['IGSTTax'];
      $total = $_REQUEST['total'];
           $roundOff = $_REQUEST['roundOff'];
      $netAmount = $_REQUEST['netAmount'];
         
        //   $sql = "SELECT * FROM debit_note WHERE formId='$formId' AND createdAt LIKE '$date%' order by debit_note_id DESC LIMIT 1";
    $da=date('Y');
      $sql = "SELECT * FROM debit_note WHERE debit_note_bill_id='$creditBillID' AND financialYear LIKE '%$yearpicker%' order by debit_note_id DESC LIMIT 1";
    //  print_r($sql);die(); 
     if($result = $conn->query($sql)){
         if($result->num_rows > 0){
            $debitNoteTable = $result->fetch_assoc();
            $debit_note_id = $debitNoteTable['debit_note_id'];
            // $sql1 = "UPDATE debit_note SET supplierName='$supplierName',address='$address',city='$city',billNo='$billNo',GSTNO='$GSTNO',appNo='$appNo',aDate='$aDate',terms='$terms',LR='$LR',lrDate='$lrDate',through='$through',amount='$amount' WHERE formId='$formId' AND debit_note_id = '$debit_note_id'"; 
            $sql1 = "UPDATE debit_note SET supplierName='$supplierName',address='$address',city='$city',billNo='$billNo',GSTNO='$GSTNO',appNo='$appNo',aDate='$aDate',terms='$terms',HSNNo='$HSNNo', LR='$LR',lrDate='$lrDate',through='$through',amount='$amount',GST='$GST',GSTType='$GSTType',CGST='$CGST',CGSTTax='$CGSTTax',SGST='$SGST',SGSTTax='$SGSTTax',IGST='$IGST',IGSTTax='$IGSTTax',subTotal='$subTotal',total='$total',roundOff='$roundOff',netAmount='$netAmount' WHERE debit_note_id = '$creditBillID'"; 
            if($conn->query($sql1)){
               $sql2 = "INSERT INTO debit_note_product(debit_note_id,HSNNo,particulars,invoiceNumber,meter,totalMeter,pieces,rate,amount,financialYear) values($creditBillID,'$HSNNo','$particulars','$invoiceNumber','$meterValue','$totalMeter','$piecesValue','$rateValue','$amount','$yearpicker')"; 
               if($conn->query($sql2)){
                  $lastInsertId = $conn->insert_id;
                  $output_data1[]=array(
                        'id'=>$debitNoteTable['debit_note_id'],
                        'supplierName'=>$debitNoteTable['supplierName'],
                        'address'=>$debitNoteTable['address'],
                        'city'=>$debitNoteTable['city'],
                        'billNo'=>$debitNoteTable['billNo'],
                        'appNo'=>$debitNoteTable['appNo'],
                        'aDate'=>$debitNoteTable['aDate'],
                        'GSTNO'=>$debitNoteTable['GSTNO'],
                        'terms'=>$debitNoteTable['terms'],
                        'HSNNo'=>$debitNoteTable['HSNNo'],
                        'LR'=>$debitNoteTable['LR'],
                        'lrDate'=>$debitNoteTable['lrDate'],
                        'through'=>$debitNoteTable['through'],
                        'amount'=>$debitNoteTable['amount'],
                        'GST'=>$debitNoteTable['GST'],
                        'GSTType'=>$debitNoteTable['GSTType'],
                        'CGST'=>$debitNoteTable['CGST'],
                        'CGSTTax'=>$debitNoteTable['CGSTTax'],
                        'SGST'=>$debitNoteTable['SGST'],
                        'SGSTTax'=>$debitNoteTable['SGSTTax'],
                        'IGST'=>$debitNoteTable['IGST'],
                        'IGSTTax'=>$debitNoteTable['IGSTTax'],
                        'subTotal'=>$debitNoteTable['subTotal'],
                        'total'=>$debitNoteTable['total'],
                        'roundOff'=>$debitNoteTable['roundOff'],
                        'netAmount'=>$debitNoteTable['netAmount'],
                        'createdAt'=>$debitNoteTable['createdAt'],
                  );
                //   $sql3 = "SELECT * FROM debit_note_product WHERE debit_note_id='$debit_note_id'";
                    $sql3 = "SELECT * FROM debit_note_product WHERE debit_note_id='$creditBillID' AND financialYear LIKE '%$yearpicker%'";
                //   print_r($sql3);die();
                    // order by debit_note_id DESC LIMIT 1
    $result3 = $conn->query($sql3);
                  while($debitNoteProductTable = $result3->fetch_assoc()){
                     // $subTotal += $debitNoteProductTable['amount'];
                     $output_data[]=array(
                        'debit_note_product_id'=>$debitNoteProductTable['debit_note_product_id'],
                        'debit_note_id'=>$debitNoteProductTable['debit_note_id'],
                        'HSNNo'=>$debitNoteProductTable['HSNNo'],
                        'particulars'=>$debitNoteProductTable['particulars'],
                        'invoiceNumber'=>$debitNoteProductTable['invoiceNumber'],
                        'meter'=>$debitNoteProductTable['meter'],
                        'totalMeter'=>$debitNoteProductTable['totalMeter'],
                        'pieces'=>$debitNoteProductTable['pieces'],
                        'rate'=>$debitNoteProductTable['rate'],
                        'amount'=>$debitNoteProductTable['amount'],
                        // 'subTotal'=>$subTotal,
                     );
                  }
                  $success = array('status'=>1,'data'=>$output_data,'data1'=>$output_data1);
                  echo json_encode($success);
               }
            }
         }else{
              $da=date('Y');
   
            // $sql1 = "INSERT INTO debit_note(formId,supplierName,financialYear,address,city,billNo,appNo,aDate,GSTNO, terms,LR,lrDate,through,amount,status,debit_note_bill_id) VALUES ('$formId','$supplierName','$yearpicker','$address','$city','$billNo','$appNo','$aDate','$GSTNO','$terms','$LR','$lrDate','$through','$amount',0,'$creditBillID')"; 
        //  print_r($sql1);die();
           //financialYear ,'$yearpicker'
                $sql1 = "INSERT INTO debit_note(formId,supplierName,financialYear,address,city,billNo,appNo,aDate,GSTNO, terms,HSNNo, LR,lrDate,through,invoiceNumber,amount,GST,GSTType,CGST,CGSTTax,SGST,SGSTTax,IGST,IGSTTax,subTotal,total,roundOff,netAmount,status,debit_note_bill_id) VALUES ('$formId','$supplierName',$yearpicker,'$address','$city','$billNo','$appNo','$aDate','$GSTNO','$terms','$HSNNo','$LR','$lrDate','$through','$invoiceNumber','$amount','$GST','$GSTType','$CGST','$CGSTTax','$SGST','$SGSTTax','$IGST','$IGSTTax','$subTotal','$total','$roundOff','$netAmount',0,$creditBillID)"; 
            // print_r($sql1);die();
           
            if($conn->query($sql1)){
               $lastId = $conn->insert_id;
               $sql2 = "INSERT INTO debit_note_product(debit_note_id,HSNNo,particulars,invoiceNumber,meter,pieces,rate,amount,totalMeter,financialYear) values($creditBillID,'$HSNNo','$particulars','$invoiceNumber','$meterValue','$piecesValue','$rateValue','$amount','$totalMeter','$yearpicker')"; 
            //   print_r($sql2);die();
              if($conn->query($sql2)){
                 $sql9 = "SELECT * FROM debit_note WHERE debit_note_id='$creditBillID' AND financialYear LIKE '%$yearpicker%'";
                 // order by debit_note_id DESC LIMIT 1
    //   $sql9 = "SELECT * FROM debit_note WHERE debit_note_id='$lastId'";
                  if($result9 = $conn->query($sql9)){
                     $debitNoteTable1 = $result9->fetch_assoc();
                  // $debit_note_id = $debitNoteTable1['debit_note_id'];
                     $output_data1[]=array(
                           'id'=>$debitNoteTable1['debit_note_id'],
                           'supplierName'=>$debitNoteTable1['supplierName'],
                           'address'=>$debitNoteTable1['address'],
                           'city'=>$debitNoteTable1['city'],
                           'billNo'=>$debitNoteTable1['billNo'],
                           'appNo'=>$debitNoteTable1['appNo'],
                           'aDate'=>$debitNoteTable1['aDate'],
                           'GSTNO'=>$debitNoteTable1['GSTNO'],
                           'terms'=>$debitNoteTable1['terms'],
                           'HSNNo'=>$debitNoteTable1['HSNNo'],
                           'LR'=>$debitNoteTable1['LR'],
                           'lrDate'=>$debitNoteTable1['lrDate'],
                           'through'=>$debitNoteTable1['through'],
                           'amount'=>$debitNoteTable1['amount'],
                           'GST'=>$debitNoteTable1['GST'],
                           'GSTType'=>$debitNoteTable1['GSTType'],
                           'CGST'=>$debitNoteTable1['CGST'],
                           'CGSTTax'=>$debitNoteTable1['CGSTTax'],
                           'SGST'=>$debitNoteTable1['SGST'],
                           'SGSTTax'=>$debitNoteTable1['SGSTTax'],
                           'IGST'=>$debitNoteTable1['IGST'],
                           'IGSTTax'=>$debitNoteTable1['IGSTTax'],
                           'subTotal'=>$debitNoteTable1['subTotal'],
                           'total'=>$debitNoteTable1['total'],
                           'roundOff'=>$debitNoteTable1['roundOff'],
                           'netAmount'=>$debitNoteTable1['netAmount'],
                           'status'=>$debitNoteTable1['status'],
                           'createdAt'=>$debitNoteTable1['createdAt'],
                     );
                  }
                     $sql3 = "SELECT * FROM debit_note_product WHERE debit_note_id='$creditBillID' and financialYear LIKE '%$yearpicker%'";
                //   print_r($sql3);die();
                     $result3 = $conn->query($sql3);
                     // $subTotal = 0;
                     while($debitNoteProductTable = $result3->fetch_assoc()){
                        $output_data[]=array(
                              'debit_note_product_id'=>$debitNoteProductTable['debit_note_product_id'],
                              'debit_note_id'=>$debitNoteProductTable['debit_note_id'],
                              'particulars'=>$debitNoteProductTable['particulars'],
                              'invoiceNumber'=>$debitNoteProductTable['invoiceNumber'],
                              'HSNNo'=>$debitNoteProductTable['HSNNo'],
                              'meter'=>$debitNoteProductTable['meter'],
                              'totalMeter'=>$debitNoteProductTable['totalMeter'],
                              'pieces'=>$debitNoteProductTable['pieces'],
                              'rate'=>$debitNoteProductTable['rate'],
                              'amount'=>$debitNoteProductTable['amount'],
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
         $invoiceNumber = $_REQUEST['invoiceNumber'];
         $debitAmt = $_REQUEST['debitAmt'];
         $debitBillDate = $_REQUEST['debitBillDate'];
         $particulars = $_REQUEST['particulars'];
         $meterValue = $_REQUEST['meterValue'];
         $totalMeter = $_REQUEST['totalMeter'];
         $piecesValue = $_REQUEST['piecesValue'];
         $rateValue = $_REQUEST['rateValue'];
         $amount = $_REQUEST['amount'];
         $subTotal = $_REQUEST['subTotal'];
         $dbno=$_REQUEST['dbno'];
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

         $sql = "SELECT * FROM debit_note WHERE formId='$formId' AND status='0' AND createdAt LIKE '$date%' order by debit_note_id DESC LIMIT 1";
         if($result = $conn->query($sql)){
            $debitNoteTable2 = $result->fetch_assoc();
            $lastInsertId = $debitNoteTable2['debit_note_id'];
            if($dbno==""){
            $sql1 = "UPDATE debit_note SET supplierName='$supplierName',address='$address',phoneNo='$phoneNo',city='$city',billNo='$billNo',GSTNO='$GSTNO',appNo='$appNo',aDate='$aDate',terms='$terms',LR='$LR',lrDate='$lrDate',through='$through',amount='$amount',GST='$GST',GSTType='$GSTType',CGST='$CGST',SGST='$SGST',IGST='$IGST',CGSTTax='$CGSTTax',SGSTTax='$SGSTTax',IGSTTax='$IGSTTax',subTotal='$subTotal',total='$total',roundOff='$roundOff',netAmount='$netAmount',debitBillDate='$debitBillDate',debitAmt='$debitAmt',status='1' WHERE formId='$formId'"; 
    }
    else{
            $sql1 = "UPDATE debit_note SET supplierName='$supplierName',address='$address',phoneNo='$phoneNo',city='$city',billNo='$billNo',GSTNO='$GSTNO',appNo='$appNo',aDate='$aDate',terms='$terms',LR='$LR',lrDate='$lrDate',through='$through',amount='$amount',GST='$GST',GSTType='$GSTType',CGST='$CGST',SGST='$SGST',IGST='$IGST',CGSTTax='$CGSTTax',SGSTTax='$SGSTTax',IGSTTax='$IGSTTax',subTotal='$subTotal',total='$total',roundOff='$roundOff',netAmount='$netAmount',debitBillDate='$debitBillDate',debitAmt='$debitAmt',status='1' WHERE debit_note_bill_id='$dbno'"; 
    }
    // print_r($sql1);die();
    if($conn->query($sql1)){
               $output_data1[]=array(
                  'id'=>$debitNoteTable2['debit_note_id'],
                  'supplierName'=>$debitNoteTable2['supplierName'],
                  'address'=>$debitNoteTable2['address'],
                  'city'=>$debitNoteTable2['city'],
                  'billNo'=>$debitNoteTable2['billNo'],
                  'appNo'=>$debitNoteTable2['appNo'],
                  'aDate'=>$debitNoteTable2['aDate'],
                  'GSTNO'=>$debitNoteTable2['GSTNO'],
                  'terms'=>$debitNoteTable2['terms'],
                  'HSNNo'=>$debitNoteTable2['HSNNo'],
                  'LR'=>$debitNoteTable2['LR'],
                  'lrDate'=>$debitNoteTable2['lrDate'],
                  'through'=>$debitNoteTable2['through'],
                  'amount'=>$debitNoteTable2['amount'],
                  'GST'=>$debitNoteTable2['GST'],
                  'GSTType'=>$debitNoteTable2['GSTType'],
                  'CGST'=>$debitNoteTable2['CGST'],
                  'CGSTTax'=>$debitNoteTable2['CGSTTax'],
                  'SGST'=>$debitNoteTable2['SGST'],
                  'SGSTTax'=>$debitNoteTable2['SGSTTax'],
                  'IGST'=>$debitNoteTable2['IGST'],
                  'IGSTTax'=>$debitNoteTable2['IGSTTax'],
                  'subTotal'=>$debitNoteTable2['subTotal'],
                  'total'=>$debitNoteTable2['total'],
                  'roundOff'=>$debitNoteTable2['roundOff'],
                  'netAmount'=>$debitNoteTable2['netAmount'],
                  'status'=>$debitNoteTable2['status'],
                  'createdAt'=>$debitNoteTable2['createdAt'],
               );
               $sql3 = "SELECT * FROM debit_note_product WHERE debit_note_id='$lastInsertId'";
               $result3 = $conn->query($sql3);
               while($debitNoteProductTable = $result3->fetch_assoc()){
                  $output_data[]=array(
                        'debit_note_product_id'=>$debitNoteProductTable['debit_note_product_id'],
                        'debit_note_id'=>$debitNoteProductTable['debit_note_id'],
                        // 'unit'=>$debitNoteProductTable['unit'],
                        'particulars'=>$debitNoteProductTable['particulars'],
                        'invoiceNumber'=>$debitNoteProductTable['invoiceNumber'],
                        'meter'=>$debitNoteProductTable['meter'],
                        'pieces'=>$debitNoteProductTable['pieces'],
                        'rate'=>$debitNoteProductTable['rate'],
                        'amount'=>$debitNoteProductTable['amount'],
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
      $debitId=$_REQUEST['debitId'];
    $yearpicker=$_REQUEST['financialYear'];
      $sql = "DELETE FROM debit_note_product WHERE debit_note_product_id=$id AND debit_note_id='$debitId' AND financialYear LIKE '%$yearpicker%'";
      if($conn->query($sql)){
         $sql4 = "SELECT sum(amount) as sub_total,sum(totalMeter) as totalMeter,sum(pieces) as totalPieces from debit_note_product where debit_note_id='$debitId' ";
         $result2 = $conn->query($sql4);
         $rec = $result2->fetch_assoc();
         
         $amount[]=array(
            'sub_total'=>$rec['sub_total'],
            'totalMeter'=>$rec['totalMeter'],
            'totalPieces'=>$rec['totalPieces']
         // $sql5 = "SELECT sum(totalMeter) as totalMeter,sum(pieces) as totalPieces from debit_note_product where debit_note_id='$debitId'";
         // $result5 = $conn->query($sql5);
         // $unitTotal = $result5->fetch_assoc();
         // $unit[]=array(
         //    'totalMeter'=>$unit['totalMeter'],
         //    'totalPieces'=>$unit['totalPieces']
          );
         $sql6 = "SELECT * FROM debit_note WHERE debit_note_id='$debitId'";
         $result6 = $conn->query($sql6);
         $debitNoteTable6 = $result6->fetch_assoc();

         $output_data[]=array(
            'id'=>$debitNoteTable6['debit_note_id'],
            'supplierName'=>$debitNoteTable6['supplierName'],
            'address'=>$debitNoteTable6['address'],
            'city'=>$debitNoteTable6['city'],
            'billNo'=>$debitNoteTable6['billNo'],
            'appNo'=>$debitNoteTable6['appNo'],
            'aDate'=>$debitNoteTable6['aDate'],
            'GSTNO'=>$debitNoteTable6['GSTNO'],
            'terms'=>$debitNoteTable6['terms'],
            'HSNNo'=>$debitNoteTable6['HSNNo'],
            'LR'=>$debitNoteTable6['LR'],
            'lrDate'=>$debitNoteTable6['lrDate'],
            'through'=>$debitNoteTable6['through'],
            'amount'=>$debitNoteTable6['amount'],
            'GST'=>$debitNoteTable6['GST'],
            'GSTType'=>$debitNoteTable6['GSTType'],
            'CGST'=>$debitNoteTable6['CGST'],
            'CGSTTax'=>$debitNoteTable6['CGSTTax'],
            'SGST'=>$debitNoteTable6['SGST'],
            'SGSTTax'=>$debitNoteTable6['SGSTTax'],
            'IGST'=>$debitNoteTable6['IGST'],
            'IGSTTax'=>$debitNoteTable6['IGSTTax'],
            'subTotal'=>$debitNoteTable6['subTotal'],
            'total'=>$debitNoteTable6['total'],
            'roundOff'=>$debitNoteTable6['roundOff'],
            'netAmount'=>$debitNoteTable6['netAmount'],
            'status'=>$debitNoteTable6['status'],
            'createdAt'=>$debitNoteTable6['createdAt'],
         );

         $entry_deleted=array('status'=>1,'data'=>$output_data,'amount'=>$amount);
         // $entry_deleted=array('status'=>1,'data'=>$output_data,'amount'=>$amount,'unit'=>$unit);
         echo json_encode($entry_deleted);

      }
   }
   if($action=='reprint'){
      $printId=$_REQUEST['printId'];
    $yearpicker = $_REQUEST['financialYear'];
  
      $sqlr = "SELECT * FROM debit_note WHERE debit_note_bill_id='$printId' AND financialYear like '%$yearpicker%' order by debit_note_id DESC LIMIT 1"; // status='1'
         if($resultr = $conn->query($sqlr)){
            $debitNoteTable21 = $resultr->fetch_assoc();
            $lastInsertIdr = $debitNoteTable21['debit_note_id'];
            // $sql1 = "UPDATE debit_note SET supplierName='$supplierName',address='$address',phoneNo='$phoneNo',city='$city',billNo='$billNo',GSTNO='$GSTNO',appNo='$appNo',aDate='$aDate',terms='$terms',LR='$LR',lrDate='$lrDate',through='$through',amount='$amount',GST='$GST',GSTType='$GSTType',CGST='$CGST',SGST='$SGST',IGST='$IGST',CGSTTax='$CGSTTax',SGSTTax='$SGSTTax',IGSTTax='$IGSTTax',subTotal='$subTotal',total='$total',roundOff='$roundOff',netAmount='$netAmount',debitBillDate='$debitBillDate',debitAmt='$debitAmt',status='1' WHERE formId='$formId'"; 
            // if($conn->query($sql1)){
               $output_data1[]=array(
                  'id'=>$debitNoteTable21['debit_note_id'],
                  'supplierName'=>$debitNoteTable21['supplierName'],
                  'address'=>$debitNoteTable21['address'],
                  'city'=>$debitNoteTable21['city'],
                  'billNo'=>$debitNoteTable21['billNo'],
                  'appNo'=>$debitNoteTable21['appNo'],
                  'aDate'=>$debitNoteTable21['aDate'],
                  'GSTNO'=>$debitNoteTable21['GSTNO'],
                  'dbn'=>$debitNoteTable21['debit_note_id'],
                  'HSNNo'=>$debitNoteTable21['HSNNo'],
                  'LR'=>$debitNoteTable21['LR'],
                  'lrDate'=>$debitNoteTable21['lrDate'],
                  'through'=>$debitNoteTable21['through'],
                  'amount'=>$debitNoteTable21['amount'],
                  'GST'=>$debitNoteTable21['GST'],
                  'GSTType'=>$debitNoteTable21['GSTType'],
                  'CGST'=>$debitNoteTable21['CGST'],
                  'CGSTTax'=>$debitNoteTable21['CGSTTax'],
                  'SGST'=>$debitNoteTable21['SGST'],
                  'SGSTTax'=>$debitNoteTable21['SGSTTax'],
                  'IGST'=>$debitNoteTable21['IGST'],
                  'IGSTTax'=>$debitNoteTable21['IGSTTax'],
                  'subTotal'=>$debitNoteTable21['subTotal'],
                  'total'=>$debitNoteTable21['total'],
                  'roundOff'=>$debitNoteTable21['roundOff'],
                  'netAmount'=>$debitNoteTable21['netAmount'],
                  'status'=>$debitNoteTable21['status'],
                  'createdAt'=>$debitNoteTable21['createdAt'],
                  'phoneNo'=>$debitNoteTable21['phoneNo'],
                  'debitBillDate'=>$debitNoteTable21['debitBillDate'],
                  'debitAmt'=>$debitNoteTable21['debitAmt'],
               );
               $sql3 = "SELECT * FROM debit_note_product WHERE debit_note_id='$printId' and financialYear like '%$yearpicker%'";
               $result3 = $conn->query($sql3);
               while($debitNoteProductTable1 = $result3->fetch_assoc()){
                  $output_data[]=array(
                        'debit_note_product_id'=>$debitNoteProductTable1['debit_note_product_id'],
                        'debit_note_id'=>$debitNoteProductTable1['debit_note_id'],
                        'particulars'=>$debitNoteProductTable1['particulars'],
                        'invoiceNumber'=>$debitNoteProductTable1['invoiceNumber'],
                        'HSNNo'=>$debitNoteProductTable1['HSNNo'],
                        'totalMeter'=>$debitNoteProductTable1['totalMeter'],
                        'meter'=>$debitNoteProductTable1['meter'],
                        'pieces'=>$debitNoteProductTable1['pieces'],
                        'rate'=>$debitNoteProductTable1['rate'],
                        'amount'=>$debitNoteProductTable1['amount'],
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