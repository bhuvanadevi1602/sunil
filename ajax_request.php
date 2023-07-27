<?php
include('./include/config.php');

$created_at=date('Y-m-d h:i:s');
$action=$_REQUEST['action'];

if($action=='add_product_entry')
{
    $bill_id=$_REQUEST['bill_id'];
    if($_REQUEST['yearpicker']!='')
    {
        
        $financial_year=$_REQUEST['yearpicker'];
    }
    else if($_REQUEST['yearpicker']=='')
    {
        $financial_year=date('Y'); 
    }
    
    $cus_name=$_REQUEST['cus_name'];
    $cus_contact=$_REQUEST['cus_contact'];
    $measurement_unit=$_REQUEST['measurement_unit'];
    $particular=$_REQUEST['particular'];
    $meter=$_REQUEST['meter'];
    $pieces=$_REQUEST['pieces'];
    $rate=$_REQUEST['rate'];
    $amount=number_format($_REQUEST['amount'], 2,'.','');
    $created_at=date('Y-m-d h:i:s');
    
    
    $sql="insert into estimate_slip(bill_id,measurement_unit,particular,meters,pieces,rate,amount,financial_year,created_at) values('$bill_id','$measurement_unit','$particular',$meter,$pieces,$rate,$amount,$financial_year,'$created_at')"; 
    $result=mysqli_query($conn,$sql);
    
             if($result)
             {
                $today_date=date('Y-m-d h');
                if($_REQUEST['yearpicker']=='')
                {
                    $sql="select * from estimate_slip  where created_at like '$today_date%' and bill_id='$bill_id'";
                   
                    $result=mysqli_query($conn,$sql);
                }
                else if($_REQUEST['yearpicker']!='')
                {
                    $sql="select * from estimate_slip  where financial_year like '$financial_year%' and bill_id='$bill_id'";
                    $result=mysqli_query($conn,$sql); 
                }
                 
                //  $sql="select * from estimate_slip  where created_at like '$today_date%' and bill_status=0";
                //  $result=mysqli_query($conn,$sql);
                 
                 $num_rows=mysqli_num_rows($result);
                 
                 $current_cus_data=array();
                 while($rec=mysqli_fetch_assoc($result))
                 {
                     $length['length']=$num_rows;
                     $current_cus_data[]=array(
                                'length'=>$length['length'],
                                'est_no'=>$rec['Est_no'],
                                 'bill_id'=>$rec['bill_id'],
                                'measurement_unit'=>$rec['measurement_unit'],
                                'particular'=>$rec['particular'],
                                'meters'=>$rec['meters'],
                                'pieces'=>$rec['pieces'],
                                'rate'=>$rec['rate'],
                                'amount'=>$rec['amount']
                         );
                 }
                 $insert_success=array('status'=>1,'data'=>$current_cus_data);
             
                echo json_encode($insert_success); 
             }
    
    
}

if($action=='bill_printed')
{
        $bill_id=$_REQUEST['bill_id'];
        if($yearpicker=='')
        {
            $financial_year=date('Y');
        }
        else
        {
            $financial_year=$_REQUEST['yearpicker']; 
        }
        $customer_name=$_REQUEST['customer_name'];
        $customer_contact=$_REQUEST['customer_contact'];
        $payment_mode=$_REQUEST['payment_mode'];
        $sub_total=$_REQUEST['sub_total'];
        $discount_amount=number_format((float)$_REQUEST['discount_amount'], 2,'.','');
       
        $total_amount=number_format((float)$_REQUEST['total_amount'], 2,'.','');
        $cgst=$_REQUEST['cgst'];
        $sgst=$_REQUEST['sgst'];
        $igst=$_REQUEST['igst'];
        $net_amount=number_format($_REQUEST['net_amount'], 2,'.','');
        $created_at=date('Y-m-d h:i:s');
        
        if($discount_amount==''&&$cgst==''&&$sgst==''&&$igst=='')
        {
            if($sub_total!=''&&$total_amount!=''&&$net_amount!='')
            {
                $round_of=$net_amount-$total_amount;
                $sql="insert into estimate_slip_final(bill_id,customer_name,customer_contact,payment_mode,sub_total,total,financial_year,round_of,net_amount,created_at) values('$bill_id','$customer_name','$customer_contact','$payment_mode','$sub_total','$total_amount','$financial_year','$round_of','$net_amount','$created_at')";
                $result=mysqli_query($conn,$sql);
                if($result)
                {
                    $sql="update estimate_slip set bill_status=1";
                    $result=mysqli_query($conn,$sql);
                    if($result)
                    {
                        $bill_printed=array('status'=>1);
                        echo json_encode($bill_printed);
                    }
                }
            }
                
            
        }
        else if($discount_amount!=''&&$cgst==''&&$sgst==''&&$igst!='')
        {
            if($sub_total!=''&&$discount_amount!=''&&$total_amount!=''&&$net_amount!='')
            {
                $igst_amount=number_format((($total_amount/100)*$igst),2);
                $round_of=number_format(($net_amount-($total_amount+$igst_amount)),2);
            
                $sql="insert into estimate_slip_final(bill_id,customer_name,customer_contact,payment_mode,sub_total,discount,total,financial_year,igst,igst_amount,round_of,net_amount,created_at) values('$bill_id','$customer_name','$customer_contact','$payment_mode','$sub_total','$discount_amount','$total_amount','$financial_year','$igst','$igst_amount','$round_of','$net_amount','$created_at')";
                $result=mysqli_query($conn,$sql);
                
                if($result)
                {
                    $sql="update estimate_slip set bill_status=1";
                    $result=mysqli_query($conn,$sql);
                    if($result)
                    {
                        $bill_printed=array('status'=>1);
                        echo json_encode($bill_printed);
                    }
                }
            }
                
        }
        else if($discount_amount==''&&$cgst==''&&$sgst==''&&$igst!='')
        {
            if($sub_total!=''&&$total_amount!=''&&$net_amount!='')
            {
                $igst_amount=number_format((($total_amount/100)*$igst),2);
                $round_of=number_format(($net_amount-($total_amount+$igst_amount)),2);
            
                $sql="insert into estimate_slip_final(bill_id,customer_name,customer_contact,payment_mode,sub_total,total,financial_year,igst,igst_amount,round_of,net_amount,created_at) values('$bill_id','$customer_name','$customer_contact','$payment_mode','$sub_total','$total_amount','$financial_year','$igst','$igst_amount','$round_of','$net_amount','$created_at')";
                $result=mysqli_query($conn,$sql);
                
                if($result)
                {
                    $sql="update estimate_slip set bill_status=1";
                    $result=mysqli_query($conn,$sql);
                    if($result)
                    {
                        $bill_printed=array('status'=>1);
                        echo json_encode($bill_printed);
                    }
                }
            }
                
        }
        else if($discount_amount!=''&&$cgst==''&&$sgst==''&&$igst=='')
        {
            if($sub_total!=''&&$discount_amount!=''&&$total_amount!=''&&$net_amount!='')
            {
                $round_of=$net_amount-$total_amount;
                $sql="insert into estimate_slip_final(bill_id,customer_name,customer_contact,payment_mode,sub_total,discount,total,financial_year,round_of,net_amount,created_at) values('$bill_id','$customer_name','$customer_contact','$payment_mode','$sub_total','$discount_amount','$total_amount','$financial_year','$round_of','$net_amount','$created_at')";
                $result=mysqli_query($conn,$sql);
                if($result)
                {
                    $sql="update estimate_slip set bill_status=1";
                    $result=mysqli_query($conn,$sql);
                    if($result)
                    {
                        $bill_printed=array('status'=>1);
                        echo json_encode($bill_printed);
                    }
                }
            }
                
        }
        else if($discount_amount!=''&&$cgst!=''&&$sgst!=''&&$igst=='')
        {
            if($sub_total!=''&&$discount_amount!=''&&$total_amount!=''&&$net_amount!='')
            {
                $cgst_amount=number_format((($total_amount/100)*$cgst),2);
                $sgst_amount=number_format((($total_amount/100)*$sgst),2);
                $round_of=number_format(($net_amount-($total_amount+$cgst_amount+$sgst_amount)),2);
            
                $sql="insert into estimate_slip_final(bill_id,customer_name,customer_contact,payment_mode,sub_total,discount,total,financial_year,cgst,sgst,cgst_amount,sgst_amount,round_of,net_amount,created_at) values('$bill_id','$customer_name','$customer_contact','$payment_mode','$sub_total','$discount_amount','$total_amount','$financial_year','$cgst','$sgst','$cgst_amount','$sgst_amount','$round_of','$net_amount','$created_at')";
                $result=mysqli_query($conn,$sql);
                if($result)
                {
                    $sql="update estimate_slip set bill_status=1";
                    $result=mysqli_query($conn,$sql);
                    if($result)
                    {
                        $bill_printed=array('status'=>1);
                        echo json_encode($bill_printed);
                    }
                }
            }
                
        }
        else if($discount_amount==''&&$cgst!=''&&$sgst!=''&&$igst=='')
        {
            if($sub_total!=''&&$total_amount!=''&&$net_amount!='')
            {
                $cgst_amount=number_format((($total_amount/100)*$cgst),2);
                $sgst_amount=number_format((($total_amount/100)*$sgst),2);
                $round_of=number_format(($net_amount-($total_amount+$cgst_amount+$sgst_amount)),2);
            
                $sql="insert into estimate_slip_final(bill_id,customer_name,customer_contact,payment_mode,sub_total,total,financial_year,cgst,sgst,cgst_amount,sgst_amount,round_of,net_amount,created_at) values('$bill_id','$customer_name','$customer_contact','$payment_mode','$sub_total','$total_amount','$financial_year','$cgst','$sgst','$cgst_amount','$sgst_amount','$round_of','$net_amount','$created_at')";
                $result=mysqli_query($conn,$sql);
                if($result)
                {
                    $sql="update estimate_slip set bill_status=1";
                    $result=mysqli_query($conn,$sql);
                    if($result)
                    {
                        $bill_printed=array('status'=>1);
                        echo json_encode($bill_printed);
                    }
                }
            }
                
        }
        
}

if($action=='delete_entry')
{
    $id=$_REQUEST['id'];
    $bill_id=$_REQUEST['bill_id'];
        if($_REQUEST['yearpicker']!='')
        {
            $financial_year=$_REQUEST['yearpicker']; 
        }
        else
        {
            $financial_year=date('Y'); 
        }
        
        $sql="delete from estimate_slip where Est_no=$id and financial_year=$financial_year";
        $result=mysqli_query($conn,$sql);
    
        if($result)
        {
            $today_date=date('Y-m-d h');
            $sql="select sum(amount) as sub_total,sum(pieces) as pieces_count from estimate_slip where bill_id='$bill_id' and financial_year='$financial_year'";
            $result=mysqli_query($conn,$sql);
            if($result)
            {
                $rec=mysqli_fetch_assoc($result);
                
                $amount[]=array('sub_total'=>$rec['sub_total'],'pieces_count'=>$rec['pieces_count']);
                
                $entry_deleted=array('status'=>1,'data'=>$amount);
                echo json_encode($entry_deleted);
            }
                
        }
       
}

if($action=="add_cash_bill_entry")
{
    $bill_id=$_REQUEST['bill_id'];
    if($_REQUEST['yearpicker']!='')
    {
        
        $financial_year=$_REQUEST['yearpicker'];
    }
    else
    {
        $financial_year=date('Y'); 
    }
    $cus_name=$_REQUEST['cus_name'];
    $gst_no=$_REQUEST['gst_no'];
    $address_1=$_REQUEST['address_1'];
    $address_2=$_REQUEST['address_2'];
    $city=$_REQUEST['city'];
    $cus_contact=$_REQUEST['cus_contact'];
    $measurement_unit=$_REQUEST['measurement_unit'];
    $particular=$_REQUEST['particular'];
    $meter=$_REQUEST['meter'];
    $hsn=$_REQUEST['hsn'];
    $pieces=$_REQUEST['pieces'];
    $rate=$_REQUEST['rate'];
    $amount=number_format($_REQUEST['amount'], 2,'.','');
    
    $sql="select * from cash_bill_customer where customer_name='$cus_name' and gst_no='$gst_no'";
    $result=mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)>0)
    {
       $sql="insert into cash_bill(bill_id,hsn,measurement_unit,particular,meters,pieces,rate,amount,financial_year,created_at) values('$bill_id','$hsn','$measurement_unit','$particular',$meter,$pieces,$rate,$amount,$financial_year,'$created_at')"; 
        $result=mysqli_query($conn,$sql);
    
             if($result)
             {
                $today_date=date('Y-m-d h');
                if($_REQUEST['yearpicker']=='')
                {
                    $sql="select * from cash_bill  where created_at like '$today_date%' and bill_id='$bill_id'";
                   
                    $result=mysqli_query($conn,$sql);
                }
                else if($_REQUEST['yearpicker']!='')
                {
                    $sql="select * from cash_bill  where financial_year like '$financial_year%' and bill_id='$bill_id'";
                    $result=mysqli_query($conn,$sql); 
                }
                 
                //  $sql="select * from cash_bill  where created_at like '$today_date%' and bill_status=0";
                //  $result=mysqli_query($conn,$sql);
                 
                 $num_rows=mysqli_num_rows($result);
                 
                 $current_cus_data=array();
                 while($rec=mysqli_fetch_assoc($result))
                 {
                     $length['length']=$num_rows;
                     $current_cus_data[]=array(
                                'length'=>$length['length'],
                                'id'=>$rec['id'],
                                 'bill_id'=>$rec['bill_id'],
                                'measurement_unit'=>$rec['measurement_unit'],
                                'particular'=>$rec['particular'],
                                'meters'=>$rec['meters'],
                                'pieces'=>$rec['pieces'],
                                'rate'=>$rec['rate'],
                                'amount'=>$rec['amount']
                         );
                 }
                 $insert_success=array('status'=>1,'data'=>$current_cus_data);
             
                echo json_encode($insert_success); 
             } 
    }
    else
    {
        $sql="insert into cash_bill_customer(customer_name,gst_no,address_1,address_2,city,contact) values('$cus_name','$gst_no','$address_1','$address_2','$city','$cus_contact')";
        $result=mysqli_query($conn,$sql);
        
        if($result)
        {
             $sql="insert into cash_bill(bill_id,hsn,measurement_unit,particular,meters,pieces,rate,amount,financial_year,created_at) values('$bill_id','$hsn','$measurement_unit','$particular',$meter,$pieces,$rate,$amount,$financial_year,'$created_at')"; 
            $result=mysqli_query($conn,$sql);
    
             if($result)
             {
                $today_date=date('Y-m-d h');
                 
                 if($_REQUEST['yearpicker']=='')
                {
                    $sql="select * from cash_bill  where created_at like '$today_date%' and bill_id='$bill_id'";
                   
                    $result=mysqli_query($conn,$sql);
                }
                else if($_REQUEST['yearpicker']!='')
                {
                    $sql="select * from cash_bill  where financial_year like '$financial_year%' and bill_id='$bill_id'";
                    $result=mysqli_query($conn,$sql); 
                }
                 
                 $num_rows=mysqli_num_rows($result);
                 
                 $current_cus_data=array();
                 while($rec=mysqli_fetch_assoc($result))
                 {
                     $length['length']=$num_rows;
                     $current_cus_data[]=array(
                                'length'=>$length['length'],
                                'id'=>$rec['id'],
                                'bill_id'=>$rec['bill_id'],
                                'measurement_unit'=>$rec['measurement_unit'],
                                'particular'=>$rec['particular'],
                                'meters'=>$rec['meters'],
                                'pieces'=>$rec['pieces'],
                                'rate'=>$rec['rate'],
                                'amount'=>$rec['amount']
                         );
                 }
                 $insert_success=array('status'=>1,'data'=>$current_cus_data);
             
                echo json_encode($insert_success); 
             } 
        }
    }
    
    
}
 
if($action=='delete_cash_bill_entry')
{
    $id=$_REQUEST['id'];
    $bill_id=$_REQUEST['bill_id'];
    if($_REQUEST['yearpicker']!='')
    {
        $financial_year=$_REQUEST['yearpicker']; 
    }
    else
    {
        $financial_year=date('Y'); 
    }
    
        
        $sql="delete from cash_bill where id=$id and financial_year='$financial_year'";
        $result=mysqli_query($conn,$sql);
    
        if($result)
        {
            $today_date=date('Y-m-d h');
            $sql="select sum(amount) as sub_total,sum(pieces) as pieces_count from cash_bill where  bill_id='$bill_id' and financial_year='$financial_year'";
            $result=mysqli_query($conn,$sql);
            if($result)
            {
                $rec=mysqli_fetch_assoc($result);
                
                $amount[]=array('sub_total'=>$rec['sub_total'],'pieces_count'=>$rec['pieces_count']);
                
                $entry_deleted=array('status'=>1,'data'=>$amount);
                echo json_encode($entry_deleted);
            }
                
        }
       
} 

if($action=='cash_bill_printed')
{
        $bill_id=$_REQUEST['bill_id'];
        if($_REQUEST['yearpicker']!='')
        {
        
            $financial_year=$_REQUEST['yearpicker'];
        }
        else if($_REQUEST['yearpicker']=='')
        {
            $financial_year=date('Y'); 
        }
        $customer_name=$_REQUEST['customer_name'];
        $address_1=$_REQUEST['address_1'];
        $address_2=$_REQUEST['address_2'];
        $city=$_REQUEST['city'];
        $customer_contact=$_REQUEST['customer_contact'];
        $payment_mode=$_REQUEST['payment_mode'];
        $sub_total=number_format($_REQUEST['sub_total'], 2,'.','');
        $discount_amount=$_REQUEST['discount_amount'];
        $gst_no=strtoupper($_REQUEST['gst_no']);
        $total_amount=number_format((float)$_REQUEST['total_amount'], 2,'.','');
        $cgst=$_REQUEST['cgst'];
        $sgst=$_REQUEST['sgst'];
        $igst=$_REQUEST['igst'];
        $net_amount=number_format($_REQUEST['net_amount'], 2,'.','');
        
        $created_at=date('Y-m-d h:i:s');
        
        if($discount_amount==''&&$cgst==''&&$sgst==''&&$igst=='')
        {
            if($sub_total!=''&&$total_amount!=''&&$net_amount!='')
            {
                $round_of=$net_amount-$total_amount;
                $sql="insert into cash_bill_final(bill_id,payment_mode,customer_name,customer_contact,address_1,address_2,city,gst_no,sub_total,total,financial_year,round_of,net_amount,created_at) values('$bill_id','$payment_mode','$customer_name','$customer_contact','$address_1','$address_2','$city','$gst_no','$sub_total','$total_amount','$financial_year','$round_of','$net_amount','$created_at')";
                $result=mysqli_query($conn,$sql);
                if($result)
                {
                    $sql="update cash_bill set bill_status=1";
                    $result=mysqli_query($conn,$sql);
                    if($result)
                    {
                        $bill_printed=array('status'=>1);
                        echo json_encode($bill_printed);
                    }
                }
            }
                
            
        }
        else if($discount_amount!=''&&$cgst==''&&$sgst==''&&$igst!='')
        {
            if($sub_total!=''&&$discount_amount!=''&&$total_amount!=''&&$net_amount!='')
            {
                $igst_amount=number_format((($total_amount/100)*$igst),2);
                $round_of=number_format(($net_amount-($total_amount+$igst_amount)),2);
            
                $sql="insert into cash_bill_final(bill_id,payment_mode,customer_name,customer_contact,address_1,address_2,city,gst_no,sub_total,discount,total,financial_year,igst,igst_amount,round_of,net_amount,created_at) values('$bill_id','$payment_mode','$customer_name','$customer_contact','$address_1','$address_2','$city','$gst_no','$sub_total','$discount_amount','$total_amount','$financial_year','$igst','$igst_amount','$round_of','$net_amount','$created_at')";
                $result=mysqli_query($conn,$sql);
                
                if($result)
                {
                    $sql="update cash_bill set bill_status=1";
                    $result=mysqli_query($conn,$sql);
                    if($result)
                    {
                        $bill_printed=array('status'=>1);
                        echo json_encode($bill_printed);
                    }
                }
            }
                
        }
        else if($discount_amount==''&&$cgst==''&&$sgst==''&&$igst!='')
        {
            if($sub_total!=''&&$total_amount!=''&&$net_amount!='')
            {
                $igst_amount=number_format((($total_amount/100)*$igst),2);
                $round_of=number_format(($net_amount-($total_amount+$igst_amount)),2);
            
                $sql="insert into cash_bill_final(bill_id,payment_mode,customer_name,customer_contact,address_1,address_2,city,gst_no,sub_total,total,financial_year,igst,igst_amount,round_of,net_amount,created_at) values('$bill_id','$payment_mode','$customer_name','$customer_contact','$address_1','$address_2','$city','$gst_no','$sub_total','$total_amount','$financial_year','$igst','$igst_amount','$round_of','$net_amount','$created_at')";
                $result=mysqli_query($conn,$sql);
                
                if($result)
                {
                    $sql="update cash_bill set bill_status=1";
                    $result=mysqli_query($conn,$sql);
                    if($result)
                    {
                        $bill_printed=array('status'=>1);
                        echo json_encode($bill_printed);
                    }
                }
            }
                
        }
        else if($discount_amount!=''&&$cgst==''&&$sgst==''&&$igst=='')
        {
            if($sub_total!=''&&$discount_amount!=''&&$total_amount!=''&&$net_amount!='')
            {
                $round_of=$net_amount-$total_amount;
                $sql="insert into cash_bill_final(bill_id,payment_mode,customer_name,customer_contact,address_1,address_2,city,gst_no,sub_total,discount,total,financial_year,round_of,net_amount,created_at) values('$bill_id','$payment_mode','$customer_name','$customer_contact','$address_1','$address_2','$city','$gst_no','$sub_total','$discount_amount','$total_amount','$financial_year','$round_of','$net_amount','$created_at')";
                $result=mysqli_query($conn,$sql);
                if($result)
                {
                    $sql="update cash_bill set bill_status=1";
                    $result=mysqli_query($conn,$sql);
                    if($result)
                    {
                        $bill_printed=array('status'=>1);
                        echo json_encode($bill_printed);
                    }
                }
            }
                
        }
        else if($discount_amount!=''&&$cgst!=''&&$sgst!=''&&$igst=='')
        {
            if($sub_total!=''&&$discount_amount!=''&&$total_amount!=''&&$net_amount!='')
            {
                $cgst_amount=number_format((($total_amount/100)*$cgst),2);
                $sgst_amount=number_format((($total_amount/100)*$sgst),2);
                $round_of=number_format(($net_amount-($total_amount+$cgst_amount+$sgst_amount)),2);
                $sql="insert into cash_bill_final(bill_id,payment_mode,customer_name,customer_contact,address_1,address_2,city,gst_no,sub_total,discount,total,financial_year,cgst,sgst,cgst_amount,sgst_amount,round_of,net_amount,created_at) values('$bill_id','$payment_mode','$customer_name','$customer_contact','$address_1','$address_2','$city','$gst_no','$sub_total','$discount_amount','$total_amount','$financial_year','$cgst','$sgst','$cgst_amount','$sgst_amount','$round_of','$net_amount','$created_at')";
                $result=mysqli_query($conn,$sql);
                if($result)
                {
                    $sql="update cash_bill set bill_status=1";
                    $result=mysqli_query($conn,$sql);
                    if($result)
                    {
                        $bill_printed=array('status'=>1);
                        echo json_encode($bill_printed);
                    }
                }
            }
                
        }
        else if($discount_amount==''&&$cgst!=''&&$sgst!=''&&$igst=='')
        {
            if($sub_total!=''&&$total_amount!=''&&$net_amount!='')
            {
               $cgst_amount=number_format((($total_amount/100)*$cgst),2);
                $sgst_amount=number_format((($total_amount/100)*$sgst),2);
                 $round_of=number_format(($net_amount-($total_amount+$cgst_amount+$sgst_amount)),2);
            
                $sql="insert into cash_bill_final(bill_id,payment_mode,customer_name,customer_contact,address_1,address_2,city,gst_no,sub_total,total,financial_year,cgst,sgst,cgst_amount,sgst_amount,round_of,net_amount,created_at) values('$bill_id','$payment_mode','$customer_name','$customer_contact','$address_1','$address_2','$city','$gst_no','$sub_total','$total_amount','$financial_year','$cgst','$sgst','$cgst_amount','$sgst_amount','$round_of','$net_amount','$created_at')";
                $result=mysqli_query($conn,$sql);
                if($result)
                {
                    $sql="update cash_bill set bill_status=1";
                    $result=mysqli_query($conn,$sql);
                    if($result)
                    {
                        $bill_printed=array('status'=>1);
                        echo json_encode($bill_printed);
                    }
                }  
            }
                
        }
     
     
}

if($action=="add_comboset_bill_entry")
{
    $bill_id=$_REQUEST['bill_id'];
    if($_REQUEST['yearpicker']!='')
    {
        
        $financial_year=$_REQUEST['yearpicker'];
    }
    else if($_REQUEST['yearpicker']=='')
    {
        $financial_year=date('Y'); 
    }
    $cus_name=$_REQUEST['cus_name'];
    $gst_num=strtoupper($_REQUEST['gst_num']);
    $address_1=$_REQUEST['address_1'];
    $address_2=$_REQUEST['address_2'];
    $city=$_REQUEST['city'];
    $cus_contact=$_REQUEST['cus_contact'];
    $appr_no=$_REQUEST['appr_no'];
    $appr_date=$_REQUEST['appr_date'];
    $terms=$_REQUEST['terms'];
    $lr_no=$_REQUEST['lr_no'];
    $lr_date=$_REQUEST['lr_date'];
    $through=$_REQUEST['through'];
    $particular=$_REQUEST['particular'];
    $hsn_no=$_REQUEST['hsn_no'];
    $pieces=$_REQUEST['pieces'];
    $rate=$_REQUEST['rate'];
    $amount=number_format($_REQUEST['amount'], 2,'.','');
    
    $sql="select * from comboset_invoice_customer where customer_name='$cus_name' and gst_no='$gst_num'";
    $result=mysqli_query($conn,$sql);
    
    if(mysqli_num_rows($result)>0)
    {
        $sql="insert into comboset_invoice(bill_id,particular,hsn,pieces,rate,amount,financial_year,created_at) values('$bill_id','$particular','$hsn_no',$pieces,$rate,$amount,$financial_year,'$created_at')"; 
        $result=mysqli_query($conn,$sql);
    
             if($result)
             {
                $today_date=date('Y-m-d h');
                
                if($_REQUEST['yearpicker']=='')
                {
                    $sql="select * from comboset_invoice  where created_at like '$today_date%' and bill_id='$bill_id'";
                   
                    $result=mysqli_query($conn,$sql);
                }
                else if($_REQUEST['yearpicker']!='')
                {
                    $sql="select * from comboset_invoice  where financial_year like '$financial_year%' and bill_id='$bill_id'";
                    $result=mysqli_query($conn,$sql); 
                }
                //  $sql="select * from comboset_invoice  where created_at like '$today_date%' and bill_status=0";
                //  $result=mysqli_query($conn,$sql);
                 
                 $num_rows=mysqli_num_rows($result);
                 
                 $current_cus_data=array();
                 while($rec=mysqli_fetch_assoc($result))
                 {
                     $length['length']=$num_rows;
                     $current_cus_data[]=array(
                                'length'=>$length['length'],
                                'combo_id'=>$rec['combo_id'],
                                 'bill_id'=>$rec['bill_id'],
                                'particular'=>$rec['particular'],
                                'hsn'=>$rec['hsn'],
                                'pieces'=>$rec['pieces'],
                                'rate'=>$rec['rate'],
                                'amount'=>$rec['amount']
                         );
                 }
                 $insert_success=array('status'=>1,'data'=>$current_cus_data);
             
                echo json_encode($insert_success); 
             } 
    }
    else
    {
        $sql="insert into comboset_invoice_customer(customer_name,gst_no,address_1,address_2,city,contact,appr_no,appr_date,terms,lr_no,lr_date,through,created_at) values('$cus_name','$gst_num','$address_1','$address_2','$city','$cus_contact','$appr_no','$appr_date','$terms','$lr_no','$lr_date','$through','$created_at')";
        $result=mysqli_query($conn,$sql);
        
        if($result)
        {
           $sql="insert into comboset_invoice(bill_id,particular,hsn,pieces,rate,amount,financial_year,created_at) values('$bill_id','$particular','$hsn_no',$pieces,$rate,$amount,$financial_year,'$created_at')"; 
            $result=mysqli_query($conn,$sql);
    
             if($result)
             {
                $today_date=date('Y-m-d h');
                
                // if($_REQUEST['yearpicker']=='')
                // {
                //     $sql="select * from comboset_invoice  where created_at like '$today_date%' and bill_id='$bill_id'";
                   
                //     $result=mysqli_query($conn,$sql);
                // }
                // else if($_REQUEST['yearpicker']!='')
                // {
                //     $sql="select * from comboset_invoice  where financial_year like '$financial_year%' and bill_id='$bill_id'";
                //     $result=mysqli_query($conn,$sql); 
                // } 
                 $sql="select * from comboset_invoice  where created_at like '$today_date%' and bill_status=0";
                 $result=mysqli_query($conn,$sql);
                 
                 $num_rows=mysqli_num_rows($result);
                 
                 $current_cus_data=array();
                 while($rec=mysqli_fetch_assoc($result))
                 {
                     $length['length']=$num_rows;
                     $current_cus_data[]=array(
                                'length'=>$length['length'],
                                'combo_id'=>$rec['combo_id'],
                                 'bill_id'=>$rec['bill_id'],
                                'particular'=>$rec['particular'],
                                'hsn'=>$rec['hsn'],
                                'pieces'=>$rec['pieces'],
                                'rate'=>$rec['rate'],
                                'amount'=>$rec['amount']
                         );
                 }
                 $insert_success=array('status'=>1,'data'=>$current_cus_data);
             
                echo json_encode($insert_success); 
             }  
        }
    }
}

if($action=='delete_comboset_bill_entry')
{
    $id=$_REQUEST['id'];
    $bill_id=$_REQUEST['bill_id'];
    if($_REQUEST['yearpicker']!='')
    {
        $financial_year=$_REQUEST['yearpicker']; 
    }
    else
    {
        $financial_year=date('Y'); 
    }
        
        $sql="delete from comboset_invoice where combo_id=$id and financial_year='$financial_year'";
        $result=mysqli_query($conn,$sql);
    
        if($result)
        {
            $today_date=date('Y-m-d h');
            $sql="select sum(amount) as sub_total,sum(pieces) as pieces_count from comboset_invoice where bill_id='$bill_id' and financial_year='$financial_year'";
            $result=mysqli_query($conn,$sql);
            if($result)
            {
                $rec=mysqli_fetch_assoc($result);
                
                $amount[]=array('sub_total'=>$rec['sub_total'],'pieces_count'=>$rec['pieces_count']);
                
                $entry_deleted=array('status'=>1,'data'=>$amount);
                echo json_encode($entry_deleted);
            }
                
        }
       
} 

if($action=='comboset_bill_printed')
{
        $bill_id=$_REQUEST['bill_id'];
        if($_REQUEST['yearpicker']!='')
        {
        
            $financial_year=$_REQUEST['yearpicker'];
        }
        else if($_REQUEST['yearpicker']=='')
        {
            $financial_year=date('Y'); 
        }
        $gst_num=strtoupper($_REQUEST['gst_num']);
        $sub_total=number_format($_REQUEST['sub_total'], 2,'.','');
        $discount_amount=$_REQUEST['discount_amount'];
        $customer_name=$_REQUEST['customer_name'];
        $customer_contact=$_REQUEST['customer_contact'];
        $address_1=$_REQUEST['address_1'];
        $address_2=$_REQUEST['address_2'];
        $city=$_REQUEST['city'];
        $appr_no=$_REQUEST['appr_no'];
        $appr_date=$_REQUEST['appr_date'];
        $lr_no=$_REQUEST['lr_no'];
        $lr_date=$_REQUEST['lr_date'];
        $terms=$_REQUEST['terms'];
        $through=$_REQUEST['through'];
        $total_amount=number_format((float)$_REQUEST['total_amount'], 2,'.','');
        $cgst=$_REQUEST['cgst'];
        $sgst=$_REQUEST['sgst'];
        $igst=$_REQUEST['igst'];
        $net_amount=number_format($_REQUEST['net_amount'], 2,'.','');
        
        $created_at=date('Y-m-d h:i:s');
        
        if($discount_amount==''&&$cgst==''&&$sgst==''&&$igst=='')
        {
            if($sub_total!=''&&$total_amount!=''&&$net_amount!='')
            {
                $round_of=$net_amount-$total_amount;
                $sql="insert into comboset_invoice_final(bill_id,customer_name,gst_no,address_1,address_2,city,contact,appr_no,appr_date,terms,lr_no,lr_date,through,sub_total,total,round_of,net_amount,financial_year,created_at) values('$bill_id','$customer_name','$gst_num','$address_1','$address_2','$city','$customer_contact','$appr_no','$appr_date','$terms','$lr_no','$lr_date','$through','$sub_total','$total_amount','$round_of','$net_amount','$financial_year','$created_at')";
                $result=mysqli_query($conn,$sql);
                if($result)
                {
                    $sql="update comboset_invoice set bill_status=1";
                    $result=mysqli_query($conn,$sql);
                    if($result)
                    {
                        $bill_printed=array('status'=>1);
                        echo json_encode($bill_printed);
                    }
                }
            }
                
            
        }
        else if($discount_amount!=''&&$cgst==''&&$sgst==''&&$igst!='')
        {
            if($sub_total!=''&&$discount_amount!=''&&$total_amount!=''&&$net_amount!='')
            {
                $igst_amount=number_format((($total_amount/100)*$igst),2);
                $round_of=number_format(($net_amount-($total_amount+$igst_amount)),2);
                $sql="insert into comboset_invoice_final(bill_id,customer_name,gst_no,address_1,address_2,city,contact,appr_no,appr_date,terms,lr_no,lr_date,through,sub_total,discount,total,igst,igst_amount,round_of,net_amount,financial_year,created_at) values('$bill_id','$customer_name','$gst_num','$address_1','$address_2','$city','$customer_contact','$appr_no','$appr_date','$terms','$lr_no','$lr_date','$through','$sub_total','$discount_amount','$total_amount','$igst','$igst_amount','$round_of','$net_amount','$financial_year','$created_at')";
                $result=mysqli_query($conn,$sql);
                
                if($result)
                {
                    $sql="update comboset_invoice set bill_status=1";
                    $result=mysqli_query($conn,$sql);
                    if($result)
                    {
                        $bill_printed=array('status'=>1);
                        echo json_encode($bill_printed);
                    }
                }
            }
                
        }
        else if($discount_amount==''&&$cgst==''&&$sgst==''&&$igst!='')
        {
            if($sub_total!=''&&$total_amount!=''&&$net_amount!='')
            {
                $igst_amount=number_format((($total_amount/100)*$igst),2);
                $round_of=number_format(($net_amount-($total_amount+$igst_amount)),2);
                
                $sql="insert into comboset_invoice_final(bill_id,customer_name,gst_no,address_1,address_2,city,contact,appr_no,appr_date,terms,lr_no,lr_date,through,sub_total,total,igst,igst_amount,round_of,net_amount,financial_year,created_at) values('$bill_id','$customer_name','$gst_num','$address_1','$address_2','$city','$customer_contact','$appr_no','$appr_date','$terms','$lr_no','$lr_date','$through','$sub_total','$total_amount','$igst','$igst_amount','$round_of','$net_amount','$financial_year','$created_at')";
                $result=mysqli_query($conn,$sql);
                
                if($result)
                {
                    $sql="update comboset_invoice set bill_status=1";
                    $result=mysqli_query($conn,$sql);
                    if($result)
                    {
                        $bill_printed=array('status'=>1);
                        echo json_encode($bill_printed);
                    }
                }
            }
                
        }
        else if($discount_amount!=''&&$cgst==''&&$sgst==''&&$igst=='')
        {
            if($sub_total!=''&&$discount_amount!=''&&$total_amount!=''&&$net_amount!='')
            {
                $round_of=$net_amount-$total_amount;
                $sql="insert into comboset_invoice_final(bill_id,customer_name,gst_no,address_1,address_2,city,contact,appr_no,appr_date,terms,lr_no,lr_date,through,sub_total,discount,total,round_of,net_amount,financial_year,created_at) values('$bill_id','$customer_name','$gst_num','$address_1','$address_2','$city','$customer_contact','$appr_no','$appr_date','$terms','$lr_no','$lr_date','$through','$sub_total','$discount_amount','$total_amount','$round_of','$net_amount','$financial_year','$created_at')";
                $result=mysqli_query($conn,$sql);
                if($result)
                {
                    $sql="update comboset_invoice set bill_status=1";
                    $result=mysqli_query($conn,$sql);
                    if($result)
                    {
                        $bill_printed=array('status'=>1);
                        echo json_encode($bill_printed);
                    }
                }
            }
                
        }
        else if($discount_amount!=''&&$cgst!=''&&$sgst!=''&&$igst=='')
        {
            if($sub_total!=''&&$discount_amount!=''&&$total_amount!=''&&$net_amount!='')
            {
                $cgst_amount=number_format((($total_amount/100)*$cgst),2);
                $sgst_amount=number_format((($total_amount/100)*$sgst),2);
                $round_of=number_format(($net_amount-($total_amount+$cgst_amount+$sgst_amount)),2);
                $sql="insert into comboset_invoice_final(bill_id,customer_name,gst_no,address_1,address_2,city,contact,appr_no,appr_date,terms,lr_no,lr_date,through,sub_total,discount,total,cgst,sgst,cgst_amount,sgst_amount,round_of,net_amount,financial_year,created_at) values('$bill_id','$customer_name','$gst_num','$address_1','$address_2','$city','$customer_contact','$appr_no','$appr_date','$terms','$lr_no','$lr_date','$through','$sub_total','$discount_amount','$total_amount','$cgst','$sgst','$cgst_amount','$sgst_amount','$round_of','$net_amount','$financial_year','$created_at')";
                $result=mysqli_query($conn,$sql);
                if($result)
                {
                    $sql="update comboset_invoice set bill_status=1";
                    $result=mysqli_query($conn,$sql);
                    if($result)
                    {
                        $bill_printed=array('status'=>1);
                        echo json_encode($bill_printed);
                    }
                }
            }
                
        }
        else if($discount_amount==''&&$cgst!=''&&$sgst!=''&&$igst=='')
        {
            if($sub_total!=''&&$total_amount!=''&&$net_amount!='')
            {
              $cgst_amount=number_format((($total_amount/100)*$cgst),2);
                $sgst_amount=number_format((($total_amount/100)*$sgst),2);
                 $round_of=number_format(($net_amount-($total_amount+$cgst_amount+$sgst_amount)),2);
                $sql="insert into comboset_invoice_final(bill_id,customer_name,gst_no,address_1,address_2,city,contact,appr_no,appr_date,terms,lr_no,lr_date,through,sub_total,total,cgst,sgst,cgst_amount,sgst_amount,round_of,net_amount,financial_year,created_at) values('$bill_id','$customer_name','$gst_num','$address_1','$address_2','$city','$customer_contact','$appr_no','$appr_date','$terms','$lr_no','$lr_date','$through','$sub_total','$total_amount','$cgst','$sgst','$cgst_amount','$sgst_amount','$round_of','$net_amount','$financial_year','$created_at')";
                $result=mysqli_query($conn,$sql);
                if($result)
                {
                    $sql="update comboset_invoice set bill_status=1";
                    $result=mysqli_query($conn,$sql);
                    if($result)
                    {
                        $bill_printed=array('status'=>1);
                        echo json_encode($bill_printed);
                    }
                }  
            }
                
        }
     
     
}

if($action=="add_madharsha_bill_entry")
{
    $bill_id=$_REQUEST['bill_id'];
    
    if($_REQUEST['yearpicker']!='')
    {
        
        $financial_year=$_REQUEST['yearpicker'];
    }
    else if($_REQUEST['yearpicker']=='')
    {
        $financial_year=date('Y'); 
    }
    $cus_name=$_REQUEST['cus_name'];
    $gst_num=$_REQUEST['gst_num'];
    $address_1=$_REQUEST['address_1'];
    $address_2=$_REQUEST['address_2'];
    $city=$_REQUEST['city'];
    $cus_contact=$_REQUEST['cus_contact'];
    $appr_no=$_REQUEST['appr_no'];
    $appr_date=$_REQUEST['appr_date'];
    $terms=$_REQUEST['terms'];
    $lr_no=$_REQUEST['lr_no'];
    $lr_date=$_REQUEST['lr_date'];
    $through=$_REQUEST['through'];
    $particular=$_REQUEST['particular'];
    $hsn_no=$_REQUEST['hsn_no'];
    $pieces=$_REQUEST['pieces'];
    $meters=$_REQUEST['meters'];
    $total_meters=number_format($_REQUEST['total_meters'],2);
    $rate=$_REQUEST['rate'];
    
    $amount=number_format($_REQUEST['amount'], 2,'.','');
    
    $sql="select * from madharsha_invoice_customer where customer_name='$cus_name' and gst_no='$gst_num'";
    $result=mysqli_query($conn,$sql);
    
      $sqls="select * from madharsha_invoice_final where bill_id='$bill_id'";
    $results=mysqli_query($conn,$sqls);
    $nos=mysqli_num_rows($results);
    
    $sqlc="select * from comboset_invoice_final where bill_id='$bill_id'";
    $resultc=mysqli_query($conn,$sqlc);
    $noc=mysqli_num_rows($resultc);
   
//   if($noc==0) {
//   $sql1="insert into comboset_invoice_final(bill_id,customer_name,gst_no,contact,address_1,address_2,city,appr_no,appr_date,lr_no,lr_date,terms,through,financial_year,created_at) values('$bill_id','$cus_name', '$gst_num','$cus_contact','$address_1','$address_2','$city','$appr_no','$appr_date','$terms','$lr_no','$lr_date','$through',$financial_year,'$created_at')";
//                 //   print_r($sql1);die();  
// $results1=mysqli_query($conn,$sql1);
       
// }
//   if($nos==0) {
//         $sqls="insert into madharsha_invoice_final(bill_id,customer_name,gst_no,financial_year,created_at) values('$bill_id','$cus_name','$gst_num',$financial_year,'$created_at')";
//             //   print_r($sqls);die(); 
//               $results=mysqli_query($conn,$sqls);
//         }
    
    if(mysqli_num_rows($result)>0)
    {
        $sql="insert into madharsha_invoice(bill_id,particular,hsn,meters,pieces,rate,total_meters,amount,financial_year,created_at) values('$bill_id','$particular','$hsn_no','$meters',$pieces,$rate,$total_meters,$amount,$financial_year,'$created_at')"; 
        //  print_r($sql);die();
      $result=mysqli_query($conn,$sql);
    
              if($result)
             {
                $today_date=date('Y-m-d h');
                 
                // if($financial_year==date('Y'))
                // {
                //     $sql="select * from madharsha_invoice  where created_at like '$today_date%' and bill_id='$bill_id'";
                //     //  $sql="select * from madharsha_invoice  where created_at like '$today' and bill_id='$bill_id'";
                //     $result=mysqli_query($conn,$sql);
                // }
                // else
                // {
                //     $sql="select * from madharsha_invoice  where financial_year like '$financial_year%' and bill_id='$bill_id'";
                //     $result=mysqli_query($conn,$sql); 
                // }
                
                 $sql="select * from madharsha_invoice  where financial_year like '$financial_year%' and bill_id='$bill_id'";
                 $result=mysqli_query($conn,$sql); 
                 
                $num_rows=mysqli_num_rows($result);
                //  print_r($num_rows);die();
                 $current_cus_data=array();
                 while($rec=mysqli_fetch_assoc($result))
                 {
                     $length['length']=$num_rows;
                     $current_cus_data[]=array(
                                'length'=>$length['length'],
                                'madharsha_id'=>$rec['madharsha_id'],
                                
                                 'bill_id'=>$rec['bill_id'],
                                'particular'=>$rec['particular'],
                                'hsn'=>$rec['hsn'],
                                'meters'=>$rec['meters'],
                                'pieces'=>$rec['pieces'],
                                'rate'=>$rec['rate'],
                                'total_meters'=>$rec['total_meters'],
                                'amount'=>$rec['amount']
                         );
                 }
                 $insert_success=array('status'=>1,'data'=>$current_cus_data);
             
                echo json_encode($insert_success); 
             } 
    }
    else
    {
        $sql="insert into madharsha_invoice_customer(customer_name,gst_no,address_1,address_2,city,contact,appr_no,appr_date,terms,lr_no,lr_date,through,created_at) values('$cus_name','$gst_num','$address_1','$address_2','$city','$cus_contact','$appr_no','$appr_date','$terms','$lr_no','$lr_date','$through','$created_at')";
        // print_r($sql);die();
        $result=mysqli_query($conn,$sql);
        
        if($result)
        {
        //   $sql="insert into madharsha_invoice(bill_id,particular,hsn,meters,pieces,rate,total_meters,amount,created_at) values('$bill_id','$particular','$hsn_no','$meters',$pieces,$rate,$total_meters,$amount,'$created_at')"; 
           $sql="insert into madharsha_invoice(bill_id,particular,hsn,meters,pieces,rate,total_meters,amount,financial_year,created_at) values('$bill_id','$particular','$hsn_no','$meters',$pieces,$rate,$total_meters,$amount,$financial_year,'$created_at')"; 
         $result=mysqli_query($conn,$sql);
    
             if($result)
             {
                $today_date=date('Y-m-d h');
                 
                //  $sql="select * from madharsha_invoice  where created_at like '$today_date%' and (bill_status=0 or bill_status=1)";
                $sql="select * from madharsha_invoice  where financial_year like '$financial_year%' and bill_id='$bill_id'";
                     $result=mysqli_query($conn,$sql);
                 
                 $num_rows=mysqli_num_rows($result);
                 
                 $current_cus_data=array();
                 while($rec=mysqli_fetch_assoc($result))
                 {
                     $length['length']=$num_rows;
                     $current_cus_data[]=array(
                                'length'=>$length['length'],
                                
                                'madharsha_id'=>$rec['madharsha_id'],
                                 'bill_id'=>$rec['bill_id'],
                                'particular'=>$rec['particular'],
                                'hsn'=>$rec['hsn'],
                                'meters'=>$rec['meters'],
                                'pieces'=>$rec['pieces'],
                                'rate'=>$rec['rate'],
                                'total_meters'=>$rec['total_meters'],
                                'amount'=>$rec['amount']
                         );
                 }
                 $insert_success=array('status'=>1,'data'=>$current_cus_data);
             
                echo json_encode($insert_success); 
             }  
        }
    }
}

if($action=='delete_madharsha_bill_entry')
{
    $id=$_REQUEST['id'];
    $bill_id=$_REQUEST['bill_id'];
   
    
        if($_REQUEST['yearpicker']!='')
        {
            $financial_year=$_REQUEST['yearpicker']; 
        }
        else
        {
            $financial_year=date('Y'); 
        }
        $sql="delete from madharsha_invoice where madharsha_id=$id and financial_year=$financial_year";
        $result=mysqli_query($conn,$sql);
    
        if($result)
        {
            $today_date=date('Y-m-d h');
            $sql="select sum(amount) as sub_total,sum(pieces) as pieces_count,sum(total_meters) as meters_count from madharsha_invoice where bill_id='$bill_id' and financial_year='$financial_year'";
            $result=mysqli_query($conn,$sql);
            if($result)
            {
                $rec=mysqli_fetch_assoc($result);
                
                $amount[]=array('sub_total'=>$rec['sub_total'],'pieces_count'=>$rec['pieces_count'],'meters_count'=>$rec['meters_count']);
                
                $entry_deleted=array('status'=>1,'data'=>$amount);
                echo json_encode($entry_deleted);
            }
                
        }
       
} 

if($action=='madharsha_bill_printed')
{
        $bill_id=$_REQUEST['bill_id'];
        $yearpicker=$_REQUEST['yearpicker'];
        
        if($_REQUEST['yearpicker']!='')
        {
            
            $financial_year=$_REQUEST['yearpicker'];
        }
        else if($_REQUEST['yearpicker']=='')
        {
            $financial_year=date('Y'); 
        }
        $customer_name=$_REQUEST['customer_name'];
        $customer_contact=$_REQUEST['customer_contact'];
        $address_1=$_REQUEST['address_1'];
        $address_2=$_REQUEST['address_2'];
        $city=$_REQUEST['city'];
        $appr_no=$_REQUEST['appr_no'];
        $appr_date=$_REQUEST['appr_date'];
        $lr_no=$_REQUEST['lr_no'];
        $lr_date=$_REQUEST['lr_date'];
        $terms=$_REQUEST['terms'];
        $through=$_REQUEST['through'];
        $gst_num=strtoupper($_REQUEST['gst_num']);
        $sub_total=number_format($_REQUEST['sub_total'], 2,'.','');
        $discount_amount=$_REQUEST['discount_amount'];
        if($_REQUEST['gst_type']!='')
        {
          $gst_type=$_REQUEST['gst_type'];  
        }
        else
        {
           $gst_type='TEST';   
        }
        
        $total_amount=number_format((float)$_REQUEST['total_amount'], 2,'.','');
        $cgst=$_REQUEST['cgst'];
        $sgst=$_REQUEST['sgst'];
        $igst=$_REQUEST['igst'];
        $net_amount=number_format($_REQUEST['net_amount'], 2,'.','');
       
        $created_at=date('Y-m-d h:i:s');

        if($discount_amount==''&&$cgst==''&&$sgst==''&&$igst=='')
        {
            if($sub_total!=''&&$total_amount!=''&&$net_amount!='')
            {
                $round_of=$net_amount-$total_amount;
                $sql="insert into madharsha_invoice_final(bill_id,customer_name,gst_no,sub_total,total,round_of,net_amount,financial_year,created_at) values('$bill_id','$customer_name','$gst_num','$sub_total','$total_amount','$round_of','$net_amount',$financial_year,'$created_at')";
                $result=mysqli_query($conn,$sql);
                if($result)
                {
                    $sql="insert into comboset_invoice_final(bill_id,customer_name,gst_no,contact,address_1,address_2,city,appr_no,appr_date,lr_no,lr_date,terms,through,sub_total,total,round_of,net_amount,financial_year,created_at) values('$bill_id','$customer_name','$gst_num','$customer_contact','$address_1','$address_2','$city','$appr_no','$appr_date','$lr_no','$lr_date','$terms','$through','$sub_total','$total_amount','$round_of','$net_amount',$financial_year,'$created_at')";
                    $result=mysqli_query($conn,$sql);
                    if($result)
                    {
                        $sql="update madharsha_invoice set bill_status=1";
                        $result=mysqli_query($conn,$sql);
                        if($result)
                        {
                            $bill_printed=array('status'=>1);
                            echo json_encode($bill_printed);
                        }
                    }
                    
                }
            }
                
            
        }
        else if($discount_amount!=''&&$cgst==''&&$sgst==''&&$igst!='')
        {
            if($sub_total!=''&&$discount_amount!=''&&$total_amount!=''&&$net_amount!='')
            {
                $igst_amount=number_format((($total_amount/100)*$igst),2);
                $round_of=number_format(($net_amount-($total_amount+$igst_amount)),2);
                $sql="insert into madharsha_invoice_final(bill_id,customer_name,gst_no,sub_total,discount,total,igst,igst_amount,round_of,net_amount,financial_year,created_at) values('$bill_id','$customer_name','$gst_num','$sub_total','$discount_amount','$total_amount','$igst','$igst_amount','$round_of','$net_amount',$financial_year,'$created_at')";
                $result=mysqli_query($conn,$sql);
                
                if($result)
                {
                    $sql="insert into comboset_invoice_final(bill_id,customer_name,gst_no,contact,address_1,address_2,city,appr_no,appr_date,lr_no,lr_date,terms,through,sub_total,discount,total,igst,igst_amount,round_of,net_amount,financial_year,created_at) values('$bill_id','$customer_name','$gst_num','$customer_contact','$address_1','$address_2','$city','$appr_no','$appr_date','$lr_no','$lr_date','$terms','$through','$sub_total','$discount_amount','$total_amount','$igst','$igst_amount','$round_of','$net_amount',$financial_year,'$created_at')";
                    $result=mysqli_query($conn,$sql);
                    if($result)
                    {
                        $sql="update madharsha_invoice set bill_status=1";
                        $result=mysqli_query($conn,$sql);
                        if($result)
                        {
                            $bill_printed=array('status'=>1);
                            echo json_encode($bill_printed);
                        }
                    }
                    
                }
            }
                
        }
        else if($discount_amount==''&&$cgst==''&&$sgst==''&&$igst!='')
        {
            if($sub_total!=''&&$total_amount!=''&&$net_amount!='')
            {
                $igst_amount=number_format((($total_amount/100)*$igst),2);
                $round_of=number_format(($net_amount-($total_amount+$igst_amount)),2);
            
                $sql="insert into madharsha_invoice_final(bill_id,customer_name,gst_no,sub_total,total,igst,igst_amount,round_of,net_amount,financial_year,created_at) values('$bill_id','$customer_name','$gst_num','$sub_total','$total_amount','$igst','$igst_amount','$round_of','$net_amount',$financial_year,'$created_at')";
                $result=mysqli_query($conn,$sql);
                
                if($result)
                {
                    $sql="insert into comboset_invoice_final(bill_id,customer_name,gst_no,contact,address_1,address_2,city,appr_no,appr_date,lr_no,lr_date,terms,through,sub_total,total,igst,igst_amount,round_of,net_amount,financial_year,created_at) values('$bill_id','$customer_name','$gst_num','$customer_contact','$address_1','$address_2','$city','$appr_no','$appr_date','$lr_no','$lr_date','$terms','$through','$sub_total','$total_amount','$igst','$igst_amount','$round_of','$net_amount',$financial_year,'$created_at')";
                    $result=mysqli_query($conn,$sql);
                    if($result)
                    {
                        $sql="update madharsha_invoice set bill_status=1";
                        $result=mysqli_query($conn,$sql);
                        if($result)
                        {
                            $bill_printed=array('status'=>1);
                            echo json_encode($bill_printed);
                        }
                    }
                    
                }
            }
                
        }
        else if($discount_amount!=''&&$cgst==''&&$sgst==''&&$igst=='')
        {
            if($sub_total!=''&&$discount_amount!=''&&$total_amount!=''&&$net_amount!='')
            {
                $round_of=$net_amount-$total_amount;
                $sql="insert into madharsha_invoice_final(bill_id,customer_name,gst_no,sub_total,discount,total,round_of,net_amount,financial_year,created_at) values('$bill_id','$customer_name','$gst_num','$sub_total','$discount_amount','$total_amount','$round_of','$net_amount',$financial_year,'$created_at')";
                $result=mysqli_query($conn,$sql);
                if($result)
                {
                    $sql="insert into comboset_invoice_final(bill_id,customer_name,gst_no,contact,address_1,address_2,city,appr_no,appr_date,lr_no,lr_date,terms,through,sub_total,discount,total,round_of,net_amount,financial_year,created_at) values('$bill_id','$customer_name','$gst_num','$customer_contact','$address_1','$address_2','$city','$appr_no','$appr_date','$lr_no','$lr_date','$terms','$through','$sub_total','$discount_amount','$total_amount','$round_of','$net_amount',$financial_year,'$created_at')";
                    $result=mysqli_query($conn,$sql);
                    if($result)
                    {
                        $sql="update madharsha_invoice set bill_status=1";
                        $result=mysqli_query($conn,$sql);
                        if($result)
                        {
                            $bill_printed=array('status'=>1);
                            echo json_encode($bill_printed);
                        }
                    }
                    
                }
            }
                
        }
        else if($discount_amount!=''&&$cgst!=''&&$sgst!=''&&$igst=='')
        {
            if($sub_total!=''&&$discount_amount!=''&&$total_amount!=''&&$net_amount!='')
            {
                $cgst_amount=number_format((($total_amount/100)*$cgst),2);
                $sgst_amount=number_format((($total_amount/100)*$sgst),2);
            
                $round_of=number_format(($net_amount-($total_amount+$cgst_amount+$sgst_amount)),2);
            
                $sql="insert into madharsha_invoice_final(bill_id,customer_name,gst_no,sub_total,discount,total,cgst,sgst,cgst_amount,sgst_amount,round_of,net_amount,financial_year,created_at) values('$bill_id','$customer_name','$gst_num','$sub_total','$discount_amount','$total_amount','$cgst','$sgst','$cgst_amount','$sgst_amount','$round_of','$net_amount',$financial_year,'$created_at')";
                $result=mysqli_query($conn,$sql);
                if($result)
                {
                    $sql="insert into comboset_invoice_final(bill_id,customer_name,gst_no,contact,address_1,address_2,city,appr_no,appr_date,lr_no,lr_date,terms,through,sub_total,discount,total,cgst,sgst,cgst_amount,sgst_amount,round_of,net_amount,financial_year,created_at) values('$bill_id','$customer_name','$gst_num','$customer_contact','$address_1','$address_2','$city','$appr_no','$appr_date','$lr_no','$lr_date','$terms','$through','$sub_total','$discount_amount','$total_amount','$cgst','$sgst','$cgst_amount','$sgst_amount','$round_of','$net_amount',$financial_year,'$created_at')";
                    $result=mysqli_query($conn,$sql);
                    if($result)
                    {
                        $sql="update madharsha_invoice set bill_status=1";
                        $result=mysqli_query($conn,$sql);
                        if($result)
                        {
                            $bill_printed=array('status'=>1);
                            echo json_encode($bill_printed);
                        }
                    }
                    
                }
            }
                
        }
        else if($discount_amount==''&&$cgst!=''&&$sgst!=''&&$igst=='')
        {
            if($sub_total!=''&&$total_amount!=''&&$net_amount!='')
            {
                $cgst_amount=number_format((($total_amount/100)*$cgst),2);
                $sgst_amount=number_format((($total_amount/100)*$sgst),2);
            
                $round_of=number_format(($net_amount-($total_amount+$cgst_amount+$sgst_amount)),2);
                $sql="insert into madharsha_invoice_final(bill_id,customer_name,gst_no,sub_total,total,gst_type,cgst,sgst,cgst_amount,sgst_amount,round_of,net_amount,financial_year,created_at) values('$bill_id','$customer_name','$gst_num','$sub_total','$total_amount','$gst_type','$cgst','$sgst','$cgst_amount','$sgst_amount','$round_of','$net_amount',$financial_year,'$created_at')";
                $result=mysqli_query($conn,$sql);
                if($result)
                {
                     $sql="insert into comboset_invoice_final(bill_id,customer_name,gst_no,contact,address_1,address_2,city,appr_no,appr_date,lr_no,lr_date,terms,through,sub_total,total,gst_type,cgst,sgst,cgst_amount,sgst_amount,round_of,net_amount,financial_year,created_at) values('$bill_id','$customer_name','$gst_num','$customer_contact','$address_1','$address_2','$city','$appr_no','$appr_date','$lr_no','$lr_date','$terms','$through','$sub_total','$total_amount','$gst_type','$cgst','$sgst','$cgst_amount','$sgst_amount','$round_of','$net_amount',$financial_year,'$created_at')";
                     $result=mysqli_query($conn,$sql);
                     if($result)
                     {
                         $sql="update madharsha_invoice set bill_status=1";
                         $result=mysqli_query($conn,$sql);
                            if($result)
                            {
                                $bill_printed=array('status'=>1);
                                echo json_encode($bill_printed);
                            }
                     }
                    
                }  
            }
                
        }
     
     
}

if($action=="add_normal_invoice_entry")
{
    $bill_id=$_REQUEST['bill_id'];
    if($_REQUEST['yearpicker']!='')
    {   
        $financial_year=$_REQUEST['yearpicker'];
    }
    else if($_REQUEST['yearpicker']=='')
    {
        $financial_year=date('Y'); 
    }

    
    $cus_name=$_REQUEST['cus_name'];
    $gst_num=$_REQUEST['gst_num'];
    $address_1=$_REQUEST['address_1'];
    $address_2=$_REQUEST['address_2'];
    $city=$_REQUEST['city'];
    $cus_contact=$_REQUEST['cus_contact'];
    $appr_no=$_REQUEST['appr_no'];
    $appr_date=$_REQUEST['appr_date'];
    $terms=$_REQUEST['terms'];
    $lr_no=$_REQUEST['lr_no'];
    $lr_date=$_REQUEST['lr_date'];
    $through=$_REQUEST['through'];
    $particular=$_REQUEST['particular'];
    $hsn_no=$_REQUEST['hsn_no'];
    $pieces=$_REQUEST['pieces'];
    $meters=$_REQUEST['meters'];
    if(!empty($_REQUEST['total_meters']))
    {
        $total_meters=number_format($_REQUEST['total_meters'],2);
    }
    else
    {
        $total_meters=$_REQUEST['total_meters'];
    }
    
    $rate=$_REQUEST['rate'];
    $amount=$_REQUEST['amount'];
    $measurement_unit_type=$_REQUEST['measurement_unit_type'];
    
    $sql="select * from normal_invoice_customer where customer_name='$cus_name' and gst_num='$gst_num'";
    $result=mysqli_query($conn,$sql);
    
    // $sqls="select * from madharsha_invoice_final where bill_id='$bill_id'";
    // $results=mysqli_query($conn,$sqls);
    // $nos=mysqli_num_rows($results);
    
    
    if(mysqli_num_rows($result)>0)
    {
        if($measurement_unit_type=='meter'||$measurement_unit_type=='pant_bit')
        {
             $sql="insert into normal_invoice(bill_id,particular,hsn,meters,pieces,rate,total_meters,amount,created_at,financial_year,measurement_type) values('$bill_id','$particular','$hsn_no','$meters',$pieces,$rate,$total_meters,$amount,'$created_at','$financial_year','$measurement_unit_type')"; 
            $result=mysqli_query($conn,$sql);
    
             if($result)
             {
                $today_date=date('Y-m-d h');
                if($_REQUEST['yearpicker']=='')
                {
                    $sql="select * from normal_invoice  where created_at like '$today_date%' and bill_id='$bill_id'";
                   
                    $result=mysqli_query($conn,$sql);
                }
                else if($_REQUEST['yearpicker']!='')
                {
                    $sql="select * from normal_invoice  where financial_year like '$financial_year%' and bill_id='$bill_id'";
                    $result=mysqli_query($conn,$sql); 
                }
                 
                //  $sql="select * from normal_invoice  where created_at like '$today_date%' and bill_status=0";
                //  $result=mysqli_query($conn,$sql);
                 
                 $num_rows=mysqli_num_rows($result);
                 
                 $current_cus_data=array();
                 while($rec=mysqli_fetch_assoc($result))
                 {
                     $length['length']=$num_rows;
                     $current_cus_data[]=array(
                                'length'=>$length['length'],
                                'n_invoice_id'=>$rec['n_invoice_id'],
                                'measurement_type'=>$rec['measurement_type'],
                                 'bill_id'=>$rec['bill_id'],
                                'particular'=>$rec['particular'],
                                'hsn'=>$rec['hsn'],
                                'meters'=>$rec['meters'],
                                'pieces'=>$rec['pieces'],
                                'rate'=>$rec['rate'],
                                'total_meters'=>$rec['total_meters'],
                                'amount'=>$rec['amount']
                         );
                 }
                 $insert_success=array('status'=>1,'data'=>$current_cus_data);
             
                echo json_encode($insert_success); 
             } 
        }
        else
        {
             $sql="insert into normal_invoice(bill_id,particular,hsn,meters,pieces,rate,total_meters,amount,created_at,financial_year,measurement_type) values('$bill_id','$particular','$hsn_no','--',$pieces,$rate,'---',$amount,'$created_at','$financial_year','---')"; 
             $result=mysqli_query($conn,$sql);
    
             if($result)
             {
                $today_date=date('Y-m-d h');
                 
                 $sql="select * from normal_invoice  where created_at like '$today_date%' and bill_status=0";
                 $result=mysqli_query($conn,$sql);
                 
                 $num_rows=mysqli_num_rows($result);
                 
                 $current_cus_data=array();
                 while($rec=mysqli_fetch_assoc($result))
                 {
                     $length['length']=$num_rows;
                     $current_cus_data[]=array(
                                'length'=>$length['length'],
                                'n_invoice_id'=>$rec['n_invoice_id'],
                                'measurement_type'=>$rec['measurement_type'],
                                 'bill_id'=>$rec['bill_id'],
                                'particular'=>$rec['particular'],
                                'hsn'=>$rec['hsn'],
                                'meters'=>$rec['meters'],
                                'pieces'=>$rec['pieces'],
                                'rate'=>$rec['rate'],
                                'total_meters'=>$rec['total_meters'],
                                'amount'=>$rec['amount']
                         );
                 }
                 $insert_success=array('status'=>1,'data'=>$current_cus_data);
             
                echo json_encode($insert_success); 
             } 
        }
       
    }
    else
    {
        $sql="insert into normal_invoice_customer(customer_name,gst_num,address_1,address_2,city,contact,appr_no,appr_date,terms,lr_no,lr_date,through,created_at) values('$cus_name','$gst_num','$address_1','$address_2','$city','$cus_contact','$appr_no','$appr_date','$terms','$lr_no','$lr_date','$through','$created_at')";
        $result=mysqli_query($conn,$sql);
        
        if($result)
        {
            if($measurement_unit_type=='meter'||$measurement_unit_type=='pant_bit')
            {
                $sql="insert into normal_invoice(bill_id,particular,hsn,meters,pieces,rate,total_meters,amount,created_at,financial_year,measurement_type) values('$bill_id','$particular','$hsn_no','$meters',$pieces,$rate,$total_meters,$amount,'$created_at','$financial_year','$measurement_unit_type')"; 
                $result=mysqli_query($conn,$sql);
    
             if($result)
             {
                $today_date=date('Y-m-d h');
                 
                 $sql="select * from normal_invoice  where created_at like '$today_date%' and bill_status=0";
                 $result=mysqli_query($conn,$sql);
                 
                 $num_rows=mysqli_num_rows($result);
                 
                 $current_cus_data=array();
                 while($rec=mysqli_fetch_assoc($result))
                 {
                     $length['length']=$num_rows;
                     $current_cus_data[]=array(
                                'length'=>$length['length'],
                                'measurement_type'=>$rec['measurement_type'],
                                'n_invoice_id'=>$rec['n_invoice_id'],
                                 'bill_id'=>$rec['bill_id'],
                                'particular'=>$rec['particular'],
                                'hsn'=>$rec['hsn'],
                                'meters'=>$rec['meters'],
                                'pieces'=>$rec['pieces'],
                                'rate'=>$rec['rate'],
                                'total_meters'=>$rec['total_meters'],
                                'amount'=>$rec['amount']
                         );
                 }
                 $insert_success=array('status'=>1,'data'=>$current_cus_data);
             
                echo json_encode($insert_success); 
             }
            }
            else
            {
                $sql="insert into normal_invoice(bill_id,particular,hsn,meters,pieces,rate,total_meters,amount,created_at,financial_year,measurement_type) values('$bill_id','$particular','$hsn_no','--',$pieces,$rate,'---',$amount,'$created_at','$financial_year','---')"; 
                $result=mysqli_query($conn,$sql);
    
             if($result)
             {
                $today_date=date('Y-m-d h');
                 
                 $sql="select * from normal_invoice  where created_at like '$today_date%' and bill_status=0";
                 $result=mysqli_query($conn,$sql);
                 
                 $num_rows=mysqli_num_rows($result);
                 
                 $current_cus_data=array();
                 while($rec=mysqli_fetch_assoc($result))
                 {
                     $length['length']=$num_rows;
                     $current_cus_data[]=array(
                                'length'=>$length['length'],
                                'measurement_type'=>$rec['measurement_type'],
                                'n_invoice_id'=>$rec['n_invoice_id'],
                                 'bill_id'=>$rec['bill_id'],
                                'particular'=>$rec['particular'],
                                'hsn'=>$rec['hsn'],
                                'meters'=>$rec['meters'],
                                'pieces'=>$rec['pieces'],
                                'rate'=>$rec['rate'],
                                'total_meters'=>$rec['total_meters'],
                                'amount'=>$rec['amount']
                         );
                 }
                 $insert_success=array('status'=>1,'data'=>$current_cus_data);
             
                echo json_encode($insert_success); 
             }
            }
             
        }
    }
}
if($action=='delete_normal_invoice_entry')
{
    $id=$_REQUEST['id'];
    $bill_id=$_REQUEST['bill_id'];
    if($_REQUEST['yearpicker']!='')
    {
        $financial_year=$_REQUEST['yearpicker']; 
    }
    else
    {
        $financial_year=date('Y'); 
    }
        
        $sql="delete from normal_invoice where n_invoice_id=$id and financial_year=$financial_year";
        $result=mysqli_query($conn,$sql);
    
        if($result)
        {
            $today_date=date('Y-m-d h');
            $sql="select sum(amount) as sub_total,sum(pieces) as pieces_count,sum(total_meters) as meters_count from normal_invoice where bill_id='$bill_id' and financial_year=$financial_year ";
            $result=mysqli_query($conn,$sql);
            if($result)
            {
                $rec=mysqli_fetch_assoc($result);
                
                $amount[]=array('sub_total'=>$rec['sub_total'],'pieces_count'=>$rec['pieces_count'],'meters_count'=>$rec['meters_count']);
                
                $entry_deleted=array('status'=>1,'data'=>$amount);
                echo json_encode($entry_deleted);
            }
                
        }
       
}

if($action=='normal_invoice_printed')
{
        $bill_id=$_REQUEST['bill_id'];
        if($_REQUEST['yearpicker']!='')
        {
        
            $financial_year=$_REQUEST['yearpicker'];
        }
        else if($_REQUEST['yearpicker']=='')
        {
            $financial_year=date('Y'); 
        }
        $gst_num=strtoupper($_REQUEST['gst_num']);
        $sub_total=number_format($_REQUEST['sub_total'], 2,'.','');
        $discount_amount=$_REQUEST['discount_amount'];
        $customer_name=$_REQUEST['customer_name'];
        $customer_contact=$_REQUEST['customer_contact'];
        $city=$_REQUEST['city'];
        $address_1=$_REQUEST['address_1'];
        $address_2=$_REQUEST['address_2'];
        $appr_no=$_REQUEST['appr_no'];
        $appr_date=$_REQUEST['appr_date'];
        $lr_no=$_REQUEST['lr_no'];
        $lr_date=$_REQUEST['lr_date'];
        $terms=$_REQUEST['terms'];
        $through=$_REQUEST['through'];
        $total_amount=number_format((float)$_REQUEST['total_amount'], 2,'.','');
        $cgst=$_REQUEST['cgst'];
        $sgst=$_REQUEST['sgst'];
        $igst=$_REQUEST['igst'];
        $net_amount=number_format($_REQUEST['net_amount'], 2,'.','');
        
        $created_at=date('Y-m-d h:i:s');
        
        if($discount_amount==''&&$cgst==''&&$sgst==''&&$igst=='')
        {
            if($sub_total!=''&&$total_amount!=''&&$net_amount!='')
            {
                $round_of=$net_amount-$total_amount;
                $sql="insert into comboset_invoice_final(bill_id,customer_name,gst_no,contact,address_1,address_2,city,appr_no,appr_date,lr_no,lr_date,terms,through,sub_total,total,financial_year,round_of,net_amount,created_at) values('$bill_id','$customer_name','$gst_num','$customer_contact','$address_1','$address_2','$city','$appr_no','$appr_date','$lr_no','$lr_date','$terms','$through','$sub_total','$total_amount','$financial_year','$round_of','$net_amount','$created_at')";
                $result=mysqli_query($conn,$sql);
                if($result)
                {
                    $sql="update normal_invoice set bill_status=1";
                    $result=mysqli_query($conn,$sql);
                    if($result)
                    {
                        $bill_printed=array('status'=>1);
                        echo json_encode($bill_printed);
                    }
                }
            }
                
            
        }
        else if($discount_amount!=''&&$cgst==''&&$sgst==''&&$igst!='')
        {
            if($sub_total!=''&&$discount_amount!=''&&$total_amount!=''&&$net_amount!='')
            {
                $igst_amount=number_format((($total_amount/100)*$igst),2);
                $round_of=number_format(($net_amount-($total_amount+$igst_amount)),2);
                $sql="insert into comboset_invoice_final(bill_id,customer_name,gst_no,contact,address_1,address_2,city,appr_no,appr_date,lr_no,lr_date,terms,through,sub_total,discount,total,financial_year,igst,igst_amount,round_of,net_amount,created_at) values('$bill_id','$customer_name','$gst_num','$customer_contact','$address_1','$address_2','$city','$appr_no','$appr_date','$lr_no','$lr_date','$terms','$through','$sub_total','$discount_amount','$total_amount','$financial_year','$igst','$igst_amount','$round_of','$net_amount','$created_at')";
                $result=mysqli_query($conn,$sql);
                
                if($result)
                {
                    $sql="update normal_invoice set bill_status=1";
                    $result=mysqli_query($conn,$sql);
                    if($result)
                    {
                        $bill_printed=array('status'=>1);
                        echo json_encode($bill_printed);
                    }
                }
            }
                
        }
        else if($discount_amount==''&&$cgst==''&&$sgst==''&&$igst!='')
        {
            if($sub_total!=''&&$total_amount!=''&&$net_amount!='')
            {
                $igst_amount=number_format((($total_amount/100)*$igst),2);
                $round_of=number_format(($net_amount-($total_amount+$igst_amount)),2);
                
                $sql="insert into comboset_invoice_final(bill_id,customer_name,gst_no,contact,address_1,address_2,city,appr_no,appr_date,lr_no,lr_date,terms,through,sub_total,total,financial_year,igst,igst_amount,round_of,net_amount,created_at) values('$bill_id','$customer_name','$gst_num','$customer_contact','$address_1','$address_2','$city','$appr_no','$appr_date','$lr_no','$lr_date','$terms','$through','$sub_total','$total_amount','$financial_year','$igst','$igst_amount','$round_of','$net_amount','$created_at')";
                $result=mysqli_query($conn,$sql);
                
                if($result)
                {
                    $sql="update normal_invoice set bill_status=1";
                    $result=mysqli_query($conn,$sql);
                    if($result)
                    {
                        $bill_printed=array('status'=>1);
                        echo json_encode($bill_printed);
                    }
                }
            }
                
        }
        else if($discount_amount!=''&&$cgst==''&&$sgst==''&&$igst=='')
        {
            if($sub_total!=''&&$discount_amount!=''&&$total_amount!=''&&$net_amount!='')
            {
                $round_of=$net_amount-$total_amount;
                $sql="insert into comboset_invoice_final(bill_id,customer_name,gst_no,contact,address_1,address_2,city,appr_no,appr_date,lr_no,lr_date,terms,through,sub_total,discount,total,financial_year,round_of,net_amount,created_at) values('$bill_id','$customer_name','$gst_num','$customer_contact','$address_1','$address_2','$city','$appr_no','$appr_date','$lr_no','$lr_date','$terms','$through','$sub_total','$discount_amount','$total_amount','$financial_year','$round_of','$net_amount','$created_at')";
                $result=mysqli_query($conn,$sql);
                if($result)
                {
                    $sql="update normal_invoice set bill_status=1";
                    $result=mysqli_query($conn,$sql);
                    if($result)
                    {
                        $bill_printed=array('status'=>1);
                        echo json_encode($bill_printed);
                    }
                }
            }
                
        }
        else if($discount_amount!=''&&$cgst!=''&&$sgst!=''&&$igst=='')
        {
            if($sub_total!=''&&$discount_amount!=''&&$total_amount!=''&&$net_amount!='')
            {
                $cgst_amount=number_format((($total_amount/100)*$cgst),2);
                $sgst_amount=number_format((($total_amount/100)*$sgst),2);
                 $round_of=number_format(($net_amount-($total_amount+$cgst_amount+$sgst_amount)),2);
                $sql="insert into comboset_invoice_final(bill_id,customer_name,gst_no,contact,address_1,address_2,city,appr_no,appr_date,lr_no,lr_date,terms,through,sub_total,discount,total,financial_year,cgst,sgst,cgst_amount,sgst_amount,round_of,net_amount,created_at) values('$bill_id','$customer_name','$gst_num','$customer_contact','$address_1','$address_2','$city','$appr_no','$appr_date','$lr_no','$lr_date','$terms','$through','$sub_total','$discount_amount','$total_amount','$financial_year','$cgst','$sgst','$cgst_amount','$sgst_amount','$round_of','$net_amount','$created_at')";
                $result=mysqli_query($conn,$sql);
                if($result)
                {
                    $sql="update normal_invoice set bill_status=1";
                    $result=mysqli_query($conn,$sql);
                    if($result)
                    {
                        $bill_printed=array('status'=>1);
                        echo json_encode($bill_printed);
                    }
                }
            }
                
        }
        else if($discount_amount==''&&$cgst!=''&&$sgst!=''&&$igst=='')
        {
            if($sub_total!=''&&$total_amount!=''&&$net_amount!='')
            {
              $cgst_amount=number_format((($total_amount/100)*$cgst),2);
                $sgst_amount=number_format((($total_amount/100)*$sgst),2);
                 $round_of=number_format(($net_amount-($total_amount+$cgst_amount+$sgst_amount)),2);
                $sql="insert into comboset_invoice_final(bill_id,customer_name,gst_no,contact,address_1,address_2,city,appr_no,appr_date,lr_no,lr_date,terms,through,sub_total,total,financial_year,cgst,sgst,cgst_amount,sgst_amount,round_of,net_amount,created_at) values('$bill_id','$customer_name','$gst_num','$customer_contact','$address_1','$address_2','$city','$appr_no','$appr_date','$lr_no','$lr_date','$terms','$through','$sub_total','$total_amount','$financial_year','$cgst','$sgst','$cgst_amount','$sgst_amount','$round_of','$net_amount','$created_at')";
                $result=mysqli_query($conn,$sql);
                if($result)
                {
                    $sql="update normal_invoice set bill_status=1";
                    $result=mysqli_query($conn,$sql);
                    if($result)
                    {
                        $bill_printed=array('status'=>1);
                        echo json_encode($bill_printed);
                    }
                }  
            }
                
        }
     
     
}



if($action=="fetch_madharsha_report")
{
    $from_date=$_REQUEST['from_date'];
    $to_date=$_REQUEST['to_date'];
    
    $sql="SELECT * FROM comboset_invoice_final WHERE created_at >= '$from_date' AND created_at <= '$to_date'";
    $result=mysqli_query($conn,$sql);
    
    
    $data=array();
    
    
    while($rec=mysqli_fetch_assoc($result))
    {
        $index++;
        $si_no['si_no']=$index;
        $date['date']=date('d-m-Y', strtotime($rec['created_at']));
        
        $data[]=array(
            'si_no'=>$si_no['si_no'],
            'bill_id'=>$rec['bill_id'],
             'date'=>$date['date'],
             'customer_name'=>$rec['customer_name'],
             'amount'=>$rec['total'],
             'igst_amount'=>$rec['igst_amount'],
             'cgst_amount'=>$rec['cgst_amount'],
             'sgst_amount'=>$rec['sgst_amount'],
             'gst_no'=>$rec['gst_no'],
             'net_amount'=>$rec['net_amount']
            );
    }
    
    $invoice_reponse=array('status'=>1,'data'=>$data);
    
    echo json_encode($invoice_reponse);
}

if($action=="fetch_cash_bill_report")
{
    $from_date=$_REQUEST['from_date'];
    $to_date=$_REQUEST['to_date'];
    
    $sql="SELECT * FROM cash_bill_final WHERE created_at >= '$from_date' AND created_at <= '$to_date'";
    $result=mysqli_query($conn,$sql);
    
    
    $data=array();
    
    
    while($rec=mysqli_fetch_assoc($result))
    {
        $index++;
        $si_no['si_no']=$index;
        $date['date']=date('d-m-Y', strtotime($rec['created_at']));
        
        $data[]=array(
            'si_no'=>$si_no['si_no'],
            'bill_id'=>$rec['bill_id'],
             'date'=>$date['date'],
             'customer_name'=>$rec['customer_name'],
             'amount'=>$rec['total'],
             'igst_amount'=>$rec['igst_amount'],
             'cgst_amount'=>$rec['cgst_amount'],
             'sgst_amount'=>$rec['sgst_amount'],
             'gst_no'=>$rec['gst_no'],
             'net_amount'=>$rec['net_amount']
            );
    }
    
    $invoice_reponse=array('status'=>1,'data'=>$data);
    
    echo json_encode($invoice_reponse);
}

if($action=="fetch_madharsha_showroom")
{
    $from_date=$_REQUEST['from_date'];
    $to_date=$_REQUEST['to_date'];
    
    
    $sql="SELECT * FROM madharsha_invoice_final WHERE customer_name like 'Madhar Sha Showroom' and created_at >= '$from_date' AND created_at <= '$to_date'";
    $result=mysqli_query($conn,$sql);
    
    $data=array();
    
    while($rec=mysqli_fetch_assoc($result))
    {
        $index++;
        $si_no['si_no']=$index;
        $date['date']=date('d-m-Y', strtotime($rec['created_at']));
        $data[]=array(
            'si_no'=>$si_no['si_no'],
            'bill_id'=>$rec['bill_id'],
             'date'=>$date['date'],
             'customer_name'=>$rec['customer_name'],
             'amount'=>$rec['total'],
             'igst_amount'=>$rec['igst_amount'],
             'cgst_amount'=>$rec['cgst_amount'],
             'sgst_amount'=>$rec['sgst_amount'],
             'gst_no'=>$rec['gst_no'],
             'net_amount'=>$rec['net_amount']
            );
    }
    
    $invoice_reponse=array('status'=>1,'data'=>$data);
    
    echo json_encode($invoice_reponse);
}

if($action=="fetch_madharsha_sons")
{
    $from_date=$_REQUEST['from_date'];
    $to_date=$_REQUEST['to_date'];
   
    
    $sql="SELECT * FROM madharsha_invoice_final WHERE customer_name like 'Madhar sha & Sons' and created_at >= '$from_date' AND created_at <= '$to_date'";
    $result=mysqli_query($conn,$sql);
    
    $data=array();
    
    while($rec=mysqli_fetch_assoc($result))
    {
        $index++;
        $si_no['si_no']=$index;
        $date['date']=date('d-m-Y', strtotime($rec['created_at']));
        
        $data[]=array(
            'si_no'=>$si_no['si_no'],
            'bill_id'=>$rec['bill_id'],
             'date'=>$date['date'],
             'customer_name'=>$rec['customer_name'],
             'amount'=>$rec['total'],
             'igst_amount'=>$rec['igst_amount'],
             'cgst_amount'=>$rec['cgst_amount'],
             'sgst_amount'=>$rec['sgst_amount'],
             'gst_no'=>$rec['gst_no'],
             'net_amount'=>$rec['net_amount']
            );
    }
    
    $invoice_reponse=array('status'=>1,'data'=>$data);
    
    echo json_encode($invoice_reponse);
}

if($action=="fetch_sales_invoice_subtotal")
{
    $from_date=$_REQUEST['from_date'];
    $to_date=$_REQUEST['to_date'];
    
    $sql="SELECT FORMAT(SUM(replace(total, ',', '')), 2) as subtotal,FORMAT(SUM(replace(igst_amount, ',', '')), 2) as igst_total,FORMAT(SUM(replace(cgst_amount, ',', '')), 2) as cgst_total,FORMAT(SUM(replace(sgst_amount, ',', '')), 2) as sgst_total,FORMAT(SUM(replace(net_amount, ',', '')), 2) as net_total FROM comboset_invoice_final WHERE created_at >= '$from_date' AND created_at <= '$to_date'";
    // print_r($sql);die();
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_assoc($result);
    
    $data=array('subtotal'=>$row['subtotal'],'igst_total'=>$row['igst_total'],'cgst_total'=>$row['cgst_total'],'sgst_total'=>$row['sgst_total'],'net_total'=>$row['net_total']);
   
    $total_response=array('status'=>1,'data'=>$data);
    
    echo json_encode($total_response);
    
}

if($action=="fetch_cash_bill_subtotal")
{
    $from_date=$_REQUEST['from_date'];
    $to_date=$_REQUEST['to_date'];
    
    $sql="SELECT sum(total) as subtotal,FORMAT(SUM(replace(igst_amount, ',', '')), 2) as igst_total,FORMAT(SUM(replace(cgst_amount, ',', '')), 2) as cgst_total,FORMAT(SUM(replace(sgst_amount, ',', '')), 2) as sgst_total,sum(net_amount) as net_total FROM cash_bill_final WHERE created_at >= '$from_date' AND created_at <= '$to_date'";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_assoc($result);
    
    $data=array('subtotal'=>number_format($row['subtotal'],2),'igst_total'=>$row['igst_total'],'cgst_total'=>$row['cgst_total'],'sgst_total'=>$row['sgst_total'],'net_total'=>number_format($row['net_total'],2));
    
    $total_response=array('status'=>1,'data'=>$data);
    
    echo json_encode($total_response);
    
}

if($action=="fetch_madharsha_sons_subtotal")
{
    $from_date=$_REQUEST['from_date'];
    $to_date=$_REQUEST['to_date'];
    
    $sql="SELECT sum(total) as subtotal, FORMAT(SUM(replace(igst_amount, ',', '')), 2) as igst_total, FORMAT(SUM(replace(cgst_amount, ',', '')), 2) as cgst_total, FORMAT(SUM(replace(sgst_amount, ',', '')), 2) as sgst_total,sum(net_amount) as net_total FROM madharsha_invoice_final WHERE customer_name like 'MADHAR SHA & SONS' and  created_at >= '$from_date' AND created_at <= '$to_date'";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_assoc($result);
    
    $data=array('subtotal'=>number_format($row['subtotal'],2),'igst_total'=>$row['igst_total'],'cgst_total'=>$row['cgst_total'],'sgst_total'=>$row['sgst_total'],'net_total'=>number_format($row['net_total'],2));
    
    $total_response=array('status'=>1,'data'=>$data);
    
    echo json_encode($total_response);
    
}

if($action=="fetch_madharsha_showroom_subtotal")
{
    $from_date=$_REQUEST['from_date'];
    $to_date=$_REQUEST['to_date'];
    
    $sql="SELECT sum(total) as subtotal, FORMAT(SUM(replace(igst_amount, ',', '')), 2)  as igst_total, FORMAT(SUM(replace(cgst_amount, ',', '')), 2)  as cgst_total, FORMAT(SUM(replace(sgst_amount, ',', '')), 2) as sgst_total,sum(net_amount) as net_total FROM madharsha_invoice_final WHERE customer_name like 'Madhar Sha Showroom' and  created_at >= '$from_date' AND created_at <= '$to_date'";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_assoc($result);
    
    $data=array('subtotal'=>number_format($row['subtotal'],2),'igst_total'=>$row['igst_total'],'cgst_total'=>$row['cgst_total'],'sgst_total'=>$row['sgst_total'],'net_total'=>number_format($row['net_total'],2));
    
    $total_response=array('status'=>1,'data'=>$data);
    
    echo json_encode($total_response);
    
}

if($action=="fetch_bills")
{
    $bill_id=$_REQUEST['bill_id'];
    // $year=$_REQUEST['year'];
    // $sql="select *  from estimate_slip inner join estimate_slip_final on estimate_slip.bill_id=estimate_slip_final.bill_id where estimate_slip.created_at like '$year%' and estimate_slip.bill_id='$bill_id'";
    // $result=mysqli_query($conn,$sql);
    
    $year=$_REQUEST['yearpicker'];
    if($year!='')
    {
        $sql="select *  from estimate_slip inner join estimate_slip_final on estimate_slip.bill_id=estimate_slip_final.bill_id where estimate_slip.financial_year like '$year%' and estimate_slip_final.financial_year like '$year%' and estimate_slip.bill_id='$bill_id' ";
        $result=mysqli_query($conn,$sql);
    }
    
    $bill_detail=array();
    
    while($rec=mysqli_fetch_assoc($result))
    {
        $bill_detail[]=array(
                    'bill_id'=>$rec['bill_id'],
                    'est_no'=>$rec['Est_no'],
                    
                    'particular'=>$rec['particular'],
                    'meters'=>$rec['meters'],
                    'pieces'=>$rec['pieces'],
                    'rate'=>$rec['rate'],
                    'amount'=>$rec['amount'],
                    'customer_name'=>$rec['customer_name'],
                    'customer_contact'=>$rec['customer_contact'],
                    'payment_mode'=>$rec['payment_mode'],
                    'sub_total'=>$rec['sub_total'],
                    'discount'=>$rec['discount'],
                    'total'=>$rec['total'],
                    'igst'=>$rec['igst'],
                    'cgst'=>$rec['cgst'],
                    'sgst'=>$rec['sgst'],
                    'igst_amount'=>$rec['igst_amount'],
                    'cgst_amount'=>$rec['cgst_amount'],
                    'sgst_amount'=>$rec['sgst_amount'],
                    'net_amount'=>$rec['net_amount'],
                    
            );
    }
    
    $bill_response=array('status'=>1,'data'=>$bill_detail);
    echo json_encode($bill_response,$final_detail_response);
   
}  

if($action=="fetch_cash_bills")
{
    $bill_id=$_REQUEST['bill_id'];
    $year=$_REQUEST['yearpicker'];
    if($year!='')
    {
        $sql="select *  from cash_bill inner join cash_bill_final on cash_bill.bill_id=cash_bill_final.bill_id where cash_bill.financial_year like '$year%' and cash_bill_final.financial_year like '$year%' and  cash_bill.bill_id='$bill_id'";
        $result=mysqli_query($conn,$sql);
    }
    
    
    $bill_detail=array();
    
    while($rec=mysqli_fetch_assoc($result))
    {
        $bill_detail[]=array(
                    'bill_id'=>$rec['bill_id'],
                    'particular'=>$rec['particular'],
                    'id'=>$rec['id'],
                    'meters'=>$rec['meters'],
                    'pieces'=>$rec['pieces'],
                    'rate'=>$rec['rate'],
                    'amount'=>$rec['amount'],
                    'customer_name'=>$rec['customer_name'],
                    'customer_contact'=>$rec['customer_contact'],
                    'gst_no'=>$rec['gst_no'],
                    'payment_mode'=>$rec['payment_mode'],
                    'address_1'=>$rec['address_1'],
                    'address_2'=>$rec['address_2'],
                    'city'=>$rec['city'],
                    'sub_total'=>$rec['sub_total'],
                    'discount'=>$rec['discount'],
                    'total'=>$rec['total'],
                    'igst'=>$rec['igst'],
                    'cgst'=>$rec['cgst'],
                    'sgst'=>$rec['sgst'],
                    'igst_amount'=>$rec['igst_amount'],
                    'cgst_amount'=>$rec['cgst_amount'],
                    'sgst_amount'=>$rec['sgst_amount'],
                    'net_amount'=>$rec['net_amount'],
                    
            );
    }
    
    $bill_response=array('status'=>1,'data'=>$bill_detail);
    echo json_encode($bill_response,$final_detail_response);
   
}

if($action=="fetch_comboset_bills")
{
    $bill_id=$_REQUEST['bill_id'];
    $year=$_REQUEST['yearpicker'];
    
     $sql1="select *  from comboset_invoice where financial_year like '$year%' and bill_id='$bill_id' ";
    //   print_r($sql1);die();
      $result1=mysqli_query($conn,$sql1);
        $rec1=mysqli_fetch_assoc($result1);  
        
    if($year!='' && $bill_id!='' && $rec1!="")
    {
        $sql="select *  from comboset_invoice inner join comboset_invoice_final on comboset_invoice.bill_id=comboset_invoice_final.bill_id where comboset_invoice.financial_year like '$year%' and comboset_invoice_final.financial_year like '$year%' and comboset_invoice.bill_id='$bill_id' ";
    //  print_r($sql);die();  
     $result=mysqli_query($conn,$sql);
  $bill_detail=array();
  while($rec=mysqli_fetch_assoc($result))
    {
        $bill_detail[]=array(
                    'bill_id'=>$rec['bill_id'],
                    'combo_id'=>$rec['combo_id'],
                    'particular'=>$rec['particular'],
                    'hsn'=>$rec['hsn'],
                    'pieces'=>$rec['pieces'],
                    'rate'=>$rec['rate'],
                    'amount'=>$rec['amount'],
                    'customer_name'=>$rec['customer_name'],
                    'customer_contact'=>$rec['contact'],
                    'gst_num'=>$rec['gst_no'],
                    'address_1'=>$rec['address_1'],
                    'address_2'=>$rec['address_2'],
                    'city'=>$rec['city'],
                    'appr_no'=>$rec['appr_no'],
                    'appr_date'=>$rec['appr_date'],
                    'lr_no'=>$rec['lr_no'],
                    'lr_date'=>$rec['lr_date'],
                    'terms'=>$rec['terms'],
                    'through'=>$rec['through'],
                    'sub_total'=>$rec['sub_total'],
                    'discount'=>$rec['discount'],
                    'total'=>$rec['total'],
                    'igst'=>$rec['igst'],
                    'cgst'=>$rec['cgst'],
                    'sgst'=>$rec['sgst'],
                    'igst_amount'=>$rec['igst_amount'],
                    'cgst_amount'=>$rec['cgst_amount'],
                    'sgst_amount'=>$rec['sgst_amount'],
                    'net_amount'=>$rec['net_amount'],
                    
            );
    }
       $bill_response=array('status'=>1,'data'=>$bill_detail);
    echo json_encode($bill_response,$final_detail_response);
     
    }
    else{
          $sql="select *  from comboset_invoice_final where financial_year like '$year%' and financial_year like '$year%' and bill_id='$bill_id' ";
        $result=mysqli_query($conn,$sql);
        $rec=mysqli_fetch_assoc($result);
    $bill_detail=array();
         if($rec['customer_name']!="") {
    $bill_detail[]=array(
                    'bill_id'=>$rec['bill_id'],
                    'customer_name'=>$rec['customer_name'],
                    'customer_contact'=>$rec['contact'],
                    'gst_num'=>$rec['gst_no'],
                    'address_1'=>$rec['address_1'],
                    'address_2'=>$rec['address_2'],
                    'city'=>$rec['city'],
                    'appr_no'=>$rec['appr_no'],
                    'appr_date'=>$rec['appr_date'],
                    'lr_no'=>$rec['lr_no'],
                    'lr_date'=>$rec['lr_date'],
                    'terms'=>$rec['terms'],
                    'through'=>$rec['through'],
                    
            );
               $bill_response=array('status'=>0,'data'=>$bill_detail);
    echo json_encode($bill_response,$final_detail_response);
         }
         else{
        $bill_response=array('status'=>0,'data'=>$bill_detail);
    echo json_encode($bill_response,$final_detail_response);
             
         }
    }
    
}

if($action=="fetch_madharsha_bills")
{
    $bill_id=$_REQUEST['bill_id'];
    $year=$_REQUEST['yearpicker'];

        $sql1="select *  from madharsha_invoice where financial_year like '$year%' and bill_id='$bill_id' ";
        $result1=mysqli_query($conn,$sql1);
        $rec1=mysqli_fetch_assoc($result1);
// print_r($sql1);die();  && $rec1!=""
    if($year!='' && $bill_id!='' && $rec1!="")
    {
        $sql="select *  from madharsha_invoice inner join comboset_invoice_final on madharsha_invoice.bill_id=comboset_invoice_final.bill_id where madharsha_invoice.financial_year like '$year%' and comboset_invoice_final.financial_year like '$year%' and madharsha_invoice.bill_id='$bill_id' ";
        $result=mysqli_query($conn,$sql);
    // print_r($sql);die();
    $bill_detail=array();
    while($rec=mysqli_fetch_assoc($result))
    {
        $bill_detail[]=array(
                    'bill_id'=>$rec['bill_id'],
                    'madharsha_id'=>$rec['madharsha_id'],
                    'particular'=>$rec['particular'],
                    'hsn'=>$rec['hsn'],
                    'meters'=>$rec['meters'],
                    'pieces'=>$rec['pieces'],
                    'total_meters'=>$rec['total_meters'],
                    'rate'=>$rec['rate'],
                    'amount'=>$rec['amount'],
                    'customer_name'=>$rec['customer_name'],
                    'customer_contact'=>$rec['contact'],
                    'gst_num'=>$rec['gst_no'],
                    'address_1'=>$rec['address_1'],
                    'address_2'=>$rec['address_2'],
                    'city'=>$rec['city'],
                    'appr_no'=>$rec['appr_no'],
                    'appr_date'=>$rec['appr_date'],
                    'lr_no'=>$rec['lr_no'],
                    'lr_date'=>$rec['lr_date'],
                    'terms'=>$rec['terms'],
                    'through'=>$rec['through'],
                    'sub_total'=>$rec['sub_total'],
                    'discount'=>isset($rec['discount'])?$rec['discount']:0,
                    'total'=>$rec['total'],
                    'igst'=>$rec['igst'],
                    'cgst'=>$rec['cgst'],
                    'sgst'=>$rec['sgst'],
                    'igst_amount'=>$rec['igst_amount'],
                    'cgst_amount'=>$rec['cgst_amount'],
                    'sgst_amount'=>$rec['sgst_amount'],
                    'net_amount'=>$rec['net_amount']
                    
            );
    }
   $bill_response=array('status'=>1,'data'=>$bill_detail);
    echo json_encode($bill_response,$final_detail_response);
   
     }
    else {
        
                   
                                 $sql="select *  from comboset_invoice_final where financial_year like '$year%' and bill_id='$bill_id' ";
        $result=mysqli_query($conn,$sql);
        $rec=mysqli_fetch_assoc($result);
        if($rec['customer_name']!="") {
    // print_r($sql);die();
    $bill_detail=array();
     $bill_detail[]=array(
                    'bill_id'=>$rec['bill_id'],
                    'madharsha_id'=>"",
                    'particular'=>"",
                    'hsn'=>"",
                    'meters'=>"",
                    'pieces'=>"",
                    'total_meters'=>"",
                    'rate'=>"",
                    'amount'=>"",
                    'customer_name'=>$rec['customer_name'],
                    'customer_contact'=>$rec['contact'],
                    'gst_num'=>$rec['gst_no'],
                    'address_1'=>$rec['address_1'],
                    'address_2'=>$rec['address_2'],
                    'city'=>$rec['city'],
                    'appr_no'=>$rec['appr_no'],
                    'appr_date'=>$rec['appr_date'],
                    'lr_no'=>$rec['lr_no'],
                    'lr_date'=>$rec['lr_date'],
                    'terms'=>$rec['terms'],
                    'through'=>$rec['through'],
                    'sub_total'=>"",
                    'discount'=>"",
                    'total'=>"",
                    'igst'=>"",
                    'cgst'=>"",
                    'sgst'=>"",
                    'igst_amount'=>"",
                    'cgst_amount'=>"",
                    'sgst_amount'=>"",
                    'net_amount'=>""
                    
            );
           $bill_response=array('status'=>1,'data'=>$bill_detail);
    echo json_encode($bill_response,$final_detail_response);
      }     
        else{
              $bill_response=array('status'=>0,'data'=>[]);
    echo json_encode($bill_response,$final_detail_response);
   
        }
     
      }
     
}

if($action=="fetch_normal_bills")
{
    $bill_id=$_REQUEST['bill_id'];
    $year=$_REQUEST['yearpicker'];
    
        $sql1="select *  from normal_invoice where financial_year like '$year%' and bill_id='$bill_id' ";
    //   print_r($sql1);die();
      $result1=mysqli_query($conn,$sql1);
        $rec1=mysqli_fetch_assoc($result1);
        
    if($year!='' && $bill_id!='' && $rec1!="")
    {
        $sql="select *  from normal_invoice inner join comboset_invoice_final on normal_invoice.bill_id=comboset_invoice_final.bill_id where normal_invoice.financial_year like '$year%' and comboset_invoice_final.financial_year like '$year%' and normal_invoice.bill_id='$bill_id' ";
    //   print_r($sql);die();
        $result=mysqli_query($conn,$sql);
   
    $bill_detail=array();
    
    while($rec=mysqli_fetch_assoc($result))
    {
        $bill_detail[]=array(
                    'bill_id'=>$rec['bill_id'],
                    'n_invoice_id'=>$rec['n_invoice_id'],
                    'particular'=>$rec['particular'],
                    'hsn'=>$rec['hsn'],
                    'meters'=>$rec['meters'],
                    'measurement_type'=>$rec['measurement_type'],
                    'pieces'=>$rec['pieces'],
                    'total_meters'=>$rec['total_meters'],
                    'rate'=>$rec['rate'],
                    'amount'=>$rec['amount'],
                    'customer_name'=>$rec['customer_name'],
                    'customer_contact'=>$rec['contact'],
                    'gst_num'=>$rec['gst_no'],
                    'address_1'=>$rec['address_1'],
                    'address_2'=>$rec['address_2'],
                    'city'=>$rec['city'],
                    'appr_no'=>$rec['appr_no'],
                    'appr_date'=>$rec['appr_date'],
                    'lr_no'=>$rec['lr_no'],
                    'lr_date'=>$rec['lr_date'],
                    'terms'=>$rec['terms'],
                    'through'=>$rec['through'],
                    'sub_total'=>$rec['sub_total'],
                                        'discount'=>isset($rec['discount'])?$rec['discount']:0,
                'total'=>$rec['total'],
                    'igst'=>$rec['igst'],
                    'cgst'=>$rec['cgst'],
                    'sgst'=>$rec['sgst'],
                    'igst_amount'=>$rec['igst_amount'],
                    'cgst_amount'=>$rec['cgst_amount'],
                    'sgst_amount'=>$rec['sgst_amount'],
                    'net_amount'=>$rec['net_amount'],
                    
            );
    }
      $bill_response=array('status'=>1,'data'=>$bill_detail);
    echo json_encode($bill_response,$final_detail_response);
  
    }
    else {
            $sql="select *  from comboset_invoice_final where financial_year like '$year%' and bill_id='$bill_id' ";
            // and financial_year like '$year%' 
        $result=mysqli_query($conn,$sql);
        $rec=mysqli_fetch_assoc($result);
    // print_r($sql);die();
        if($rec['customer_name']!="") {
    $bill_detail=array();
     $bill_detail[]=array(
                    'bill_id'=>$rec['bill_id'],
                    'customer_name'=>$rec['customer_name'],
                    'customer_contact'=>$rec['contact'],
                    'gst_num'=>$rec['gst_no'],
                    'address_1'=>$rec['address_1'],
                    'address_2'=>$rec['address_2'],
                    'city'=>$rec['city'],
                    'appr_no'=>$rec['appr_no'],
                    'appr_date'=>$rec['appr_date'],
                    'lr_no'=>$rec['lr_no'],
                    'lr_date'=>$rec['lr_date'],
                    'terms'=>$rec['terms'],
                    'through'=>$rec['through'],
                     'n_invoice_id'=>"",
                      'particular'=>"",
                    'hsn'=>"",
                    'meters'=>"",
                    'pieces'=>"",
                    'total_meters'=>"",
                    'rate'=>"",
                    'amount'=>"",
                   'sub_total'=>"",
                    'discount'=>"",
                    'total'=>"",
                    'igst'=>"",
                    'cgst'=>"",
                    'sgst'=>"",
                    'igst_amount'=>"",
                    'cgst_amount'=>"",
                    'sgst_amount'=>"",
                    'net_amount'=>""
            );
    $bill_response=array('status'=>0,'data'=>$bill_detail);
    echo json_encode($bill_response,$final_detail_response);
       }
       else{
              $bill_response=array('status'=>0,'data'=>[]);
    echo json_encode($bill_response,$final_detail_response);
   
        }
     
    }
    
}

if($action=='update_estimate_bill')
{
        $bill_id=$_REQUEST['bill_id'];
        $financial_year=$_REQUEST['yearpicker'];
        $customer_name=$_REQUEST['customer_name'];
        $customer_contact=$_REQUEST['customer_contact'];
        $payment_mode=$_REQUEST['payment_mode'];
        $sub_total=number_format((float)$_REQUEST['sub_total'], 2,'.','');
        $discount_amount=number_format((float)$_REQUEST['discount_amount'], 2,'.','');
       
        $total_amount=number_format((float)$_REQUEST['total_amount'], 2,'.','');
        $cgst=$_REQUEST['cgst'];
        $sgst=$_REQUEST['sgst'];
        $igst=$_REQUEST['igst'];
        // $igst_amount=$_REQUEST['igst_amount'];
        $net_amount=number_format($_REQUEST['net_amount'], 2,'.','');
        
        
        if($discount_amount=='0.00'&&$cgst==''&&$sgst==''&&$igst=='')
        {
            if($sub_total!=''&&$total_amount!=''&&$net_amount!='')
            {
                $round_of=$net_amount-$total_amount;
                $sql="update estimate_slip_final set customer_name='$customer_name',customer_contact='$customer_contact',payment_mode='$payment_mode',sub_total='$sub_total',discount='$discount_amount',total='$total_amount',round_of='$round_of',net_amount='$net_amount' where bill_id='$bill_id' and financial_year='$financial_year' ";
                $result=mysqli_query($conn,$sql);
               
                $bill_printed=array('status'=>1);
                echo json_encode($bill_printed);
                   
            }
                
            
        }
        else if($discount_amount!=''&&$cgst==''&&$sgst==''&&$igst!='')
        {
            if($sub_total!=''&&$discount_amount!=''&&$total_amount!=''&&$net_amount!='')
            {
                $igst_amount=number_format((($total_amount/100)*$igst),2);
                $round_of=number_format(($net_amount-($total_amount+$igst_amount)),2);
            
                $sql="update estimate_slip_final set customer_name='$customer_name',customer_contact='$customer_contact',payment_mode='$payment_mode',sub_total='$sub_total',discount='$discount_amount',total='$total_amount',igst='$igst',igst_amount='$igst_amount',round_of='$round_of',net_amount='$net_amount' where bill_id='$bill_id' and financial_year='$financial_year'";
                $result=mysqli_query($conn,$sql);
                
                        $bill_printed=array('status'=>1);
                        echo json_encode($bill_printed);
                  
            }
                
        }
        else if($discount_amount=='0.00'&&$cgst==''&&$sgst==''&&$igst!='')
        {
            if($sub_total!=''&&$total_amount!=''&&$net_amount!='')
            {
                $igst_amount=number_format((($total_amount/100)*$igst),2);
                $round_of=number_format(($net_amount-($total_amount+$igst_amount)),2);
            
                $sql="update estimate_slip_final set customer_name='$customer_name',customer_contact='$customer_contact',payment_mode='$payment_mode',sub_total='$sub_total',discount='$discount_amount',total='$total_amount',igst='$igst',igst_amount='$igst_amount',round_of='$round_of',net_amount='$net_amount' where bill_id='$bill_id' and financial_year='$financial_year' ";
                $result=mysqli_query($conn,$sql);
                
               
                        $bill_printed=array('status'=>1);
                        echo json_encode($bill_printed);
                    
            }
                
        }
        else if($discount_amount!=''&&$cgst==''&&$sgst==''&&$igst=='')
        {
            if($sub_total!=''&&$discount_amount!=''&&$total_amount!=''&&$net_amount!='')
            {
                $round_of=$net_amount-$total_amount;
                $sql="update estimate_slip_final set customer_name='$customer_name',customer_contact='$customer_contact',payment_mode='$payment_mode',sub_total='$sub_total',discount='$discount_amount',total='$total_amount',round_of='$round_of',net_amount='$net_amount' where bill_id='$bill_id' and financial_year='$financial_year'";
                $result=mysqli_query($conn,$sql);
                
                        $bill_printed=array('status'=>1);
                        echo json_encode($bill_printed);
                   
            }
                
        }
        else if($discount_amount=='0.00'&&$cgst!=''&&$sgst!=''&&$igst=='')
        {
            if($sub_total!=''&&$total_amount!=''&&$net_amount!='')
            {
                $cgst_amount=number_format((($total_amount/100)*$cgst),2);
                $sgst_amount=number_format((($total_amount/100)*$sgst),2);
                $round_of=number_format(($net_amount-($total_amount+$cgst_amount+$sgst_amount)),2);
            
                $sql="update estimate_slip_final set customer_name='$customer_name',customer_contact='$customer_contact',payment_mode='$payment_mode',sub_total='$sub_total',discount='$discount_amount',total='$total_amount',cgst='$cgst',sgst='$sgst',cgst_amount='$cgst_amount',sgst_amount='$sgst_amount',round_of='$round_of',net_amount='$net_amount' where bill_id='$bill_id' and financial_year='$financial_year'";
                $result=mysqli_query($conn,$sql);
                
               
                        $bill_printed=array('status'=>1,'test'=>'sbfd');
                        echo json_encode($bill_printed);
            }
                
        }
        else if($discount_amount!=''&&$cgst!=''&&$sgst!=''&&$igst=='')
        {
            if($sub_total!=''&&$discount_amount!=''&&$total_amount!=''&&$net_amount!='')
            {
                $cgst_amount=number_format((($total_amount/100)*$cgst),2);
                $sgst_amount=number_format((($total_amount/100)*$sgst),2);
                $round_of=number_format(($net_amount-($total_amount+$cgst_amount+$sgst_amount)),2);
            
                $sql="update estimate_slip_final set customer_name='$customer_name',customer_contact='$customer_contact',payment_mode='$payment_mode',sub_total='$sub_total',discount='$discount_amount',total='$total_amount',cgst='$cgst',sgst='$sgst',cgst_amount='$cgst_amount',sgst_amount='$sgst_amount',round_of='$round_of',net_amount='$net_amount' where bill_id='$bill_id' and financial_year='$financial_year' ";
                $result=mysqli_query($conn,$sql);
                
               
                        $bill_printed=array('status'=>1,'test'=>'sbfd');
                        echo json_encode($bill_printed);
            }
                
        }
        
        
}

if($action=='update_cash_bill')
{
        $bill_id=$_REQUEST['bill_id'];
        $financial_year=$_REQUEST['yearpicker'];
        $customer_name=$_REQUEST['customer_name'];
        $customer_contact=$_REQUEST['customer_contact'];
        $payment_mode=$_REQUEST['payment_mode'];
        $sub_total=number_format((float)$_REQUEST['sub_total'], 2,'.','');
        $discount_amount=number_format((float)$_REQUEST['discount_amount'], 2,'.','');
       
        $total_amount=number_format((float)$_REQUEST['total_amount'], 2,'.','');
        $cgst=$_REQUEST['cgst'];
        $sgst=$_REQUEST['sgst'];
        $igst=$_REQUEST['igst'];
        // $igst_amount=$_REQUEST['igst_amount'];
        $net_amount=number_format($_REQUEST['net_amount'], 2,'.','');
        
        
        if($discount_amount=='0.00'&&$cgst==''&&$sgst==''&&$igst=='')
        {
            if($sub_total!=''&&$total_amount!=''&&$net_amount!='')
            {
                $round_of=$net_amount-$total_amount;
                $sql="update cash_bill_final set customer_name='$customer_name',customer_contact='$customer_contact',payment_mode='$payment_mode',sub_total='$sub_total',discount='$discount_amount',total='$total_amount',round_of='$round_of',net_amount='$net_amount' where bill_id='$bill_id' and financial_year='$financial_year' ";
                $result=mysqli_query($conn,$sql);
               
                $bill_printed=array('status'=>1);
                echo json_encode($bill_printed);
                   
            }
                
            
        }
        else if($discount_amount!=''&&$cgst==''&&$sgst==''&&$igst!='')
        {
            if($sub_total!=''&&$discount_amount!=''&&$total_amount!=''&&$net_amount!='')
            {
                $igst_amount=number_format((($total_amount/100)*$igst),2);
                $round_of=number_format(($net_amount-($total_amount+$igst_amount)),2);
            
                $sql="update cash_bill_final set customer_name='$customer_name',customer_contact='$customer_contact',payment_mode='$payment_mode',sub_total='$sub_total',discount='$discount_amount',total='$total_amount',igst='$igst',igst_amount='$igst_amount',round_of='$round_of',net_amount='$net_amount' where bill_id='$bill_id' and financial_year='$financial_year' ";
                $result=mysqli_query($conn,$sql);
                
                        $bill_printed=array('status'=>1);
                        echo json_encode($bill_printed);
                  
            }
                
        }
        else if($discount_amount=='0.00'&&$cgst==''&&$sgst==''&&$igst!='')
        {
            if($sub_total!=''&&$total_amount!=''&&$net_amount!='')
            {
                $igst_amount=number_format((($total_amount/100)*$igst),2);
                $round_of=number_format(($net_amount-($total_amount+$igst_amount)),2);
            
                $sql="update cash_bill_final set customer_name='$customer_name',customer_contact='$customer_contact',payment_mode='$payment_mode',sub_total='$sub_total',discount='$discount_amount',total='$total_amount',igst='$igst',igst_amount='$igst_amount',round_of='$round_of',net_amount='$net_amount' where bill_id='$bill_id' and financial_year='$financial_year' ";
                $result=mysqli_query($conn,$sql);
                
               
                        $bill_printed=array('status'=>1);
                        echo json_encode($bill_printed);
                    
            }
                
        }
        else if($discount_amount!=''&&$cgst==''&&$sgst==''&&$igst=='')
        {
            if($sub_total!=''&&$discount_amount!=''&&$total_amount!=''&&$net_amount!='')
            {
                $round_of=$net_amount-$total_amount;
                $sql="update cash_bill_final set customer_name='$customer_name',customer_contact='$customer_contact',payment_mode='$payment_mode',sub_total='$sub_total',discount='$discount_amount',total='$total_amount',round_of='$round_of',net_amount='$net_amount' where bill_id='$bill_id' and financial_year='$financial_year'";
                $result=mysqli_query($conn,$sql);
                
                        $bill_printed=array('status'=>1);
                        echo json_encode($bill_printed);
                   
            }
                
        }
        else if($discount_amount=='0.00'&&$cgst!=''&&$sgst!=''&&$igst=='')
        {
            if($sub_total!=''&&$total_amount!=''&&$net_amount!='')
            {
                $cgst_amount=number_format((($total_amount/100)*$cgst),2);
                $sgst_amount=number_format((($total_amount/100)*$sgst),2);
                $round_of=number_format(($net_amount-($total_amount+$cgst_amount+$sgst_amount)),2);
            
                $sql="update cash_bill_final set customer_name='$customer_name',customer_contact='$customer_contact',payment_mode='$payment_mode',sub_total='$sub_total',discount='$discount_amount',total='$total_amount',cgst='$cgst',sgst='$sgst',cgst_amount='$cgst_amount',sgst_amount='$sgst_amount',round_of='$round_of',net_amount='$net_amount' where bill_id='$bill_id'and financial_year='$financial_year' ";
                $result=mysqli_query($conn,$sql);
                
               
                        $bill_printed=array('status'=>1,'test'=>'sbfd');
                        echo json_encode($bill_printed);
            }
                
        }
        else if($discount_amount!=''&&$cgst!=''&&$sgst!=''&&$igst=='')
        {
            if($sub_total!=''&&$discount_amount!=''&&$total_amount!=''&&$net_amount!='')
            {
                $cgst_amount=number_format((($total_amount/100)*$cgst),2);
                $sgst_amount=number_format((($total_amount/100)*$sgst),2);
                $round_of=number_format(($net_amount-($total_amount+$cgst_amount+$sgst_amount)),2);
            
                $sql="update cash_bill_final set customer_name='$customer_name',customer_contact='$customer_contact',payment_mode='$payment_mode',sub_total='$sub_total',discount='$discount_amount',total='$total_amount',cgst='$cgst',sgst='$sgst',cgst_amount='$cgst_amount',sgst_amount='$sgst_amount',round_of='$round_of',net_amount='$net_amount' where bill_id='$bill_id' and financial_year='$financial_year'";
                $result=mysqli_query($conn,$sql);
                
               
                        $bill_printed=array('status'=>1,'test'=>'sbfd');
                        echo json_encode($bill_printed);
            }
                
        }
        
        
}

if($action=='update_comboset_invoice')
{
        $bill_id=$_REQUEST['bill_id'];
        $financial_year=$_REQUEST['yearpicker'];
          $customer_name=isset($_REQUEST['customer_name'])?$_REQUEST['customer_name']:"";
         $gst=isset($_REQUEST['gst'])?$_REQUEST['gst']:"";
        $address1=isset($_REQUEST['address1'])?$_REQUEST['address1']:"";
        $address2=isset($_REQUEST['address2'])?$_REQUEST['address2']:"";
        $city=isset($_REQUEST['city'])?$_REQUEST['city']:"";
        $appr_no=isset($_REQUEST['appr_no'])?$_REQUEST['appr_no']:"";
        $appr_date=isset($_REQUEST['appr_date'])?$_REQUEST['appr_date']:"";
        $terms=isset($_REQUEST['terms'])?$_REQUEST['terms']:"";
        $lr_no=isset($_REQUEST['lr_no'])?$_REQUEST['lr_no']:"";
        $lr_date=isset($_REQUEST['lr_date'])?$_REQUEST['lr_date']:"";
        $through=isset($_REQUEST['through'])?$_REQUEST['through']:"";
        $customer_contact=isset($_REQUEST['customer_contact'])?$_REQUEST['customer_contact']:"";
        $payment_mode=isset($_REQUEST['payment_mode'])?$_REQUEST['payment_mode']:"";
        $subtotal=$_REQUEST['sub_total'];
        if($subtotal!='') {
        $sub_total=number_format((float)$subtotal, 2,'.','');
        }
        
        $discount=$_REQUEST['discount_amount'];
        if($discount!='') {
        $discount_amount=number_format((float)$discount, 2,'.','');
        }
        
        
        $totamt=$_REQUEST['total_amount'];
        $total_amount=number_format((float)$totamt, 2,'.','');
        $cgst=isset($_REQUEST['cgst'])?$_REQUEST['cgst']:"";
        $sgst=isset($_REQUEST['sgst'])?$_REQUEST['sgst']:"";
        $igst=isset($_REQUEST['igst'])?$_REQUEST['igst']:"";
        // $igst_amount=$_REQUEST['igst_amount'];
        
        $netamt=$_REQUEST['net_amount'];
        if($netamt!=''){
        $net_amount=number_format($netamt, 2,'.','');
        }
        
        if($discount_amount==''&&$cgst==''&&$sgst==''&&$igst=='')
        {
            if($sub_total!=''&&$total_amount!=''&&$net_amount!='')
            {
                $round_of=$net_amount-$total_amount;
                $sql="update comboset_invoice_final set customer_name='$customer_name',contact='$customer_contact',gst_no='$gst',address_1='$address1',address_2='$address2',city='$city',appr_no='$appr_no',appr_date='$appr_date',terms='$terms',lr_no='$lr_no',lr_date='$lr_date',through='$through',sub_total='$sub_total',discount='$discount_amount',total='$total_amount',round_of='$round_of',net_amount='$net_amount' where bill_id='$bill_id' and financial_year='$financial_year' ";
                $result=mysqli_query($conn,$sql);
               
                $bill_printed=array('status'=>1);
                echo json_encode($bill_printed);
                   
            }
              else{
              $sql="update comboset_invoice_final set customer_name='$customer_name',contact='$customer_contact',gst_no='$gst',address_1='$address1',address_2='$address2',city='$city',appr_no='$appr_no',appr_date='$appr_date',terms='$terms',lr_no='$lr_no',lr_date='$lr_date',through='$through',sub_total='',discount='',total='',round_of='',net_amount=''customer_name='$customer_name',contact='$customer_contact',gst_no='$gst',address_1='$address1',address_2='$address2',city='$city',appr_no='$appr_no',appr_date='$appr_date',terms='$terms',lr_no='$lr_no',lr_date='$lr_date',through='$through' where bill_id='$bill_id' and financial_year='$financial_year' ";
                  $result=mysqli_query($conn,$sql);
                 $sql1="update madharsha_invoice_final set customer_name='$customer_name',gst_no='$gst',sub_total='',discount='',total='',round_of='',net_amount='' where bill_id='$bill_id' and financial_year='$financial_year'";
                   $result1=mysqli_query($conn,$sql1);
  
                $bill_printed=array('status'=>1);
                echo json_encode($bill_printed);
                    }
                
            
        }
        else if($discount_amount!=''&&$cgst==''&&$sgst==''&&$igst!='')
        {
            if($sub_total!=''&&$discount_amount!=''&&$total_amount!=''&&$net_amount!='')
            {
                $igst_amount=number_format((($total_amount/100)*$igst),2);
                $round_of=number_format(($net_amount-($total_amount+$igst_amount)),2);
            
                $sql="update comboset_invoice_final set customer_name='$customer_name',contact='$customer_contact',gst_no='$gst',address_1='$address1',address_2='$address2',city='$city',appr_no='$appr_no',appr_date='$appr_date',terms='$terms',lr_no='$lr_no',lr_date='$lr_date',through='$through',sub_total='$sub_total',discount='$discount_amount',total='$total_amount',igst='$igst',igst_amount='$igst_amount',round_of='$round_of',net_amount='$net_amount' where bill_id='$bill_id' and financial_year='$financial_year' ";
                $result=mysqli_query($conn,$sql);
                
                        $bill_printed=array('status'=>1);
                        echo json_encode($bill_printed);
                  
            }
                 else{
              $sql="update comboset_invoice_final set customer_name='$customer_name',contact='$customer_contact',gst_no='$gst',address_1='$address1',address_2='$address2',city='$city',appr_no='$appr_no',appr_date='$appr_date',terms='$terms',lr_no='$lr_no',lr_date='$lr_date',through='$through',sub_total='',discount='',total='',round_of='',net_amount=''customer_name='$customer_name',contact='$customer_contact',gst_no='$gst',address_1='$address1',address_2='$address2',city='$city',appr_no='$appr_no',appr_date='$appr_date',terms='$terms',lr_no='$lr_no',lr_date='$lr_date',through='$through' where bill_id='$bill_id' and financial_year='$financial_year' ";
                  $result=mysqli_query($conn,$sql);
                 $sql1="update madharsha_invoice_final set customer_name='$customer_name',gst_no='$gst',sub_total='',discount='',total='',round_of='',net_amount='' where bill_id='$bill_id' and financial_year='$financial_year'";
                   $result1=mysqli_query($conn,$sql1);
  
                $bill_printed=array('status'=>1);
                echo json_encode($bill_printed);
                    }
                
                
        }
        else if($discount_amount==''&&$cgst==''&&$sgst==''&&$igst!='')
        {
            if($sub_total!=''&&$total_amount!=''&&$net_amount!='')
            {
                $igst_amount=number_format((($total_amount/100)*$igst),2);
                $round_of=number_format(($net_amount-($total_amount+$igst_amount)),2);
            
                $sql="update comboset_invoice_final set customer_name='$customer_name',contact='$customer_contact',gst_no='$gst',address_1='$address1',address_2='$address2',city='$city',appr_no='$appr_no',appr_date='$appr_date',terms='$terms',lr_no='$lr_no',lr_date='$lr_date',through='$through',sub_total='$sub_total',discount='$discount_amount',total='$total_amount',igst='$igst',igst_amount='$igst_amount',round_of='$round_of',net_amount='$net_amount' where bill_id='$bill_id' and financial_year='$financial_year' ";
                $result=mysqli_query($conn,$sql);
                
               
                        $bill_printed=array('status'=>1);
                        echo json_encode($bill_printed);
                    
            }
                 else{
              $sql="update comboset_invoice_final set customer_name='$customer_name',contact='$customer_contact',gst_no='$gst',address_1='$address1',address_2='$address2',city='$city',appr_no='$appr_no',appr_date='$appr_date',terms='$terms',lr_no='$lr_no',lr_date='$lr_date',through='$through',sub_total='',discount='',total='',round_of='',net_amount=''customer_name='$customer_name',contact='$customer_contact',gst_no='$gst',address_1='$address1',address_2='$address2',city='$city',appr_no='$appr_no',appr_date='$appr_date',terms='$terms',lr_no='$lr_no',lr_date='$lr_date',through='$through' where bill_id='$bill_id' and financial_year='$financial_year' ";
                  $result=mysqli_query($conn,$sql);
                 $sql1="update madharsha_invoice_final set customer_name='$customer_name',gst_no='$gst',sub_total='',discount='',total='',round_of='',net_amount='' where bill_id='$bill_id' and financial_year='$financial_year'";
                   $result1=mysqli_query($conn,$sql1);
  
                $bill_printed=array('status'=>1);
                echo json_encode($bill_printed);
                    }
                
                
        }
        else if($discount_amount!=''&&$cgst==''&&$sgst==''&&$igst=='')
        {
            if($sub_total!=''&&$discount_amount!=''&&$total_amount!=''&&$net_amount!='')
            {
                $round_of=$net_amount-$total_amount;
                $sql="update comboset_invoice_final set customer_name='$customer_name',contact='$customer_contact',gst_no='$gst',address_1='$address1',address_2='$address2',city='$city',appr_no='$appr_no',appr_date='$appr_date',terms='$terms',lr_no='$lr_no',lr_date='$lr_date',through='$through',sub_total='$sub_total',discount='$discount_amount',total='$total_amount',round_of='$round_of',net_amount='$net_amount' where bill_id='$bill_id' and financial_year='$financial_year'";
                $result=mysqli_query($conn,$sql);
                
                        $bill_printed=array('status'=>1);
                        echo json_encode($bill_printed);
                   
            }
                 else{
              $sql="update comboset_invoice_final set customer_name='$customer_name',contact='$customer_contact',gst_no='$gst',address_1='$address1',address_2='$address2',city='$city',appr_no='$appr_no',appr_date='$appr_date',terms='$terms',lr_no='$lr_no',lr_date='$lr_date',through='$through',sub_total='',discount='',total='',round_of='',net_amount=''customer_name='$customer_name',contact='$customer_contact',gst_no='$gst',address_1='$address1',address_2='$address2',city='$city',appr_no='$appr_no',appr_date='$appr_date',terms='$terms',lr_no='$lr_no',lr_date='$lr_date',through='$through' where bill_id='$bill_id' and financial_year='$financial_year' ";
                  $result=mysqli_query($conn,$sql);
                 $sql1="update madharsha_invoice_final set customer_name='$customer_name',gst_no='$gst',sub_total='',discount='',total='',round_of='',net_amount='' where bill_id='$bill_id' and financial_year='$financial_year'";
                   $result1=mysqli_query($conn,$sql1);
  
                $bill_printed=array('status'=>1);
                echo json_encode($bill_printed);
                    }
                
                
        }
        else if($discount_amount==''&&$cgst!=''&&$sgst!=''&&$igst=='')
        {
            if($sub_total!=''&&$total_amount!=''&&$net_amount!='')
            {
                $cgst_amount=number_format((($total_amount/100)*$cgst),2);
                $sgst_amount=number_format((($total_amount/100)*$sgst),2);
                $round_of=number_format(($net_amount-($total_amount+$cgst_amount+$sgst_amount)),2);
            
                $sql="update comboset_invoice_final set customer_name='$customer_name',contact='$customer_contact',gst_no='$gst',address_1='$address1',address_2='$address2',city='$city',appr_no='$appr_no',appr_date='$appr_date',terms='$terms',lr_no='$lr_no',lr_date='$lr_date',through='$through',sub_total='$sub_total',discount='$discount_amount',total='$total_amount',cgst='$cgst',sgst='$sgst',cgst_amount='$cgst_amount',sgst_amount='$sgst_amount',round_of='$round_of',net_amount='$net_amount' where bill_id='$bill_id' and financial_year='$financial_year' ";
                $result=mysqli_query($conn,$sql);
                
               
                        $bill_printed=array('status'=>1,'test'=>'sbfd');
                        echo json_encode($bill_printed);
            }
                 else{
              $sql="update comboset_invoice_final set customer_name='$customer_name',contact='$customer_contact',gst_no='$gst',address_1='$address1',address_2='$address2',city='$city',appr_no='$appr_no',appr_date='$appr_date',terms='$terms',lr_no='$lr_no',lr_date='$lr_date',through='$through',sub_total='',discount='',total='',round_of='',net_amount=''customer_name='$customer_name',contact='$customer_contact',gst_no='$gst',address_1='$address1',address_2='$address2',city='$city',appr_no='$appr_no',appr_date='$appr_date',terms='$terms',lr_no='$lr_no',lr_date='$lr_date',through='$through' where bill_id='$bill_id' and financial_year='$financial_year' ";
                  $result=mysqli_query($conn,$sql);
                 $sql1="update madharsha_invoice_final set customer_name='$customer_name',gst_no='$gst',sub_total='',discount='',total='',round_of='',net_amount='' where bill_id='$bill_id' and financial_year='$financial_year'";
                   $result1=mysqli_query($conn,$sql1);
  
                $bill_printed=array('status'=>1);
                echo json_encode($bill_printed);
                    }
                
                
        }
        else if($discount_amount!=''&&$cgst!=''&&$sgst!=''&&$igst=='')
        {
            if($sub_total!=''&&$discount_amount!=''&&$total_amount!=''&&$net_amount!='')
            {
                $cgst_amount=number_format((($total_amount/100)*$cgst),2);
                $sgst_amount=number_format((($total_amount/100)*$sgst),2);
                $round_of=number_format(($net_amount-($total_amount+$cgst_amount+$sgst_amount)),2);
            
                $sql="update comboset_invoice_final set customer_name='$customer_name',contact='$customer_contact',gst_no='$gst',address_1='$address1',address_2='$address2',city='$city',appr_no='$appr_no',appr_date='$appr_date',terms='$terms',lr_no='$lr_no',lr_date='$lr_date',through='$through',sub_total='$sub_total',discount='$discount_amount',total='$total_amount',cgst='$cgst',sgst='$sgst',cgst_amount='$cgst_amount',sgst_amount='$sgst_amount',round_of='$round_of',net_amount='$net_amount' where bill_id='$bill_id' and financial_year='$financial_year' ";
                $result=mysqli_query($conn,$sql);
                
               
                        $bill_printed=array('status'=>1,'test'=>'sbfd');
                        echo json_encode($bill_printed);
            }
                 else{
              $sql="update comboset_invoice_final set customer_name='$customer_name',contact='$customer_contact',gst_no='$gst',address_1='$address1',address_2='$address2',city='$city',appr_no='$appr_no',appr_date='$appr_date',terms='$terms',lr_no='$lr_no',lr_date='$lr_date',through='$through',sub_total='',discount='',total='',round_of='',net_amount=''customer_name='$customer_name',contact='$customer_contact',gst_no='$gst',address_1='$address1',address_2='$address2',city='$city',appr_no='$appr_no',appr_date='$appr_date',terms='$terms',lr_no='$lr_no',lr_date='$lr_date',through='$through' where bill_id='$bill_id' and financial_year='$financial_year' ";
                  $result=mysqli_query($conn,$sql);
                 $sql1="update madharsha_invoice_final set customer_name='$customer_name',gst_no='$gst',sub_total='',discount='',total='',round_of='',net_amount='' where bill_id='$bill_id' and financial_year='$financial_year'";
                   $result1=mysqli_query($conn,$sql1);
  
                $bill_printed=array('status'=>1);
                echo json_encode($bill_printed);
                    }
                
                
        }
         else{
           
            //   print_r("ok6");die();
                  $sql="update comboset_invoice_final set customer_name='$customer_name',contact='$customer_contact',gst_no='$gst',address_1='$address1',address_2='$address2',city='$city',appr_no='$appr_no',appr_date='$appr_date',terms='$terms',lr_no='$lr_no',lr_date='$lr_date',through='$through' where bill_id='$bill_id' and financial_year='$financial_year' ";
                $result=mysqli_query($conn,$sql);
              
                $sql1="update comboset_invoice_final set customer_name='$customer_name',gst_no='$gst' where bill_id='$bill_id' and financial_year='$financial_year' ";
                $result1=mysqli_query($conn,$sql1);
                  $bill_printed=array('status'=>1);
                        echo json_encode($bill_printed);
           
        }
        
        
}

if($action=='update_madharsha_invoice')
{
        $bill_id=$_REQUEST['bill_id'];
        $financial_year=$_REQUEST['yearpicker'];
 $customer_name=isset($_REQUEST['customer_name'])?$_REQUEST['customer_name']:"";
         $gst=isset($_REQUEST['gst'])?$_REQUEST['gst']:"";
        $address1=isset($_REQUEST['address1'])?$_REQUEST['address1']:"";
        $address2=isset($_REQUEST['address2'])?$_REQUEST['address2']:"";
        $city=isset($_REQUEST['city'])?$_REQUEST['city']:"";
        $appr_no=isset($_REQUEST['appr_no'])?$_REQUEST['appr_no']:"";
        $appr_date=isset($_REQUEST['appr_date'])?$_REQUEST['appr_date']:"";
        $terms=isset($_REQUEST['terms'])?$_REQUEST['terms']:"";
        $lr_no=isset($_REQUEST['lr_no'])?$_REQUEST['lr_no']:"";
        $lr_date=isset($_REQUEST['lr_date'])?$_REQUEST['lr_date']:"";
        $through=isset($_REQUEST['through'])?$_REQUEST['through']:"";
     
        $customer_contact=isset($_REQUEST['customer_contact'])?$_REQUEST['customer_contact']:"";
        $payment_mode=isset($_REQUEST['payment_mode'])?$_REQUEST['payment_mode']:"";
        $subtotal=isset($_REQUEST['sub_total'])?$_REQUEST['sub_total']:"";
          $discountamount=isset($_REQUEST['discount_amount'])?$_REQUEST['discount_amount']:"0";
           $totalamount=isset($_REQUEST['total_amount'])?$_REQUEST['total_amount']:"";
      $cgst=isset($_REQUEST['cgst'])?$_REQUEST['cgst']:"";
        $sgst=isset($_REQUEST['sgst'])?$_REQUEST['sgst']:"";
        $igst=isset($_REQUEST['igst'])?$_REQUEST['igst']:"";
        // $igst_amount=$_REQUEST['igst_amount'];
         $net_amount=isset($_REQUEST['net_amount'])?$_REQUEST['net_amount']:"";
     
        
        if($subtotal!='')
{
        $sub_total=number_format($subtotal, 2,'.','');
 }
 else{
     $sub_total=0;
 }
 
 
    if($discountamount!=''||$discountamount!=0||$discountamount!=0.00)
    {
        $discount_amount=number_format($discountamount, 2,'.','');
        }
        
        //  print_r($discount_amount);die(); 
  
      if($totalamount!=''){
         $total_amount=number_format($totalamount, 2,'.','');
      }  
      
     if($net_amount!=''){
          $net_amount=number_format($net_amount, 2,'.','');
      }
      
    //           $sql="select * from madharsha_invoice_final where bill_id='$bill_id'";
    // $result=mysqli_query($conn,$sql);
    // $no=mysqli_num_rows($result);
    
    // $sqlc="select * from comboset_invoice_final where bill_id='$bill_id'";
    // $resultc=mysqli_query($conn,$sqlc);
    // $noc=mysqli_num_rows($resultc);
   
//     if($noc==0) {
//   $sql1="insert into comboset_invoice_final(bill_id,customer_name,gst_no,contact,address_1,address_2,city,appr_no,appr_date,lr_no,lr_date,terms,through,sub_total,discount,total,round_of,net_amount,financial_year,created_at) values('$bill_id','$customer_name','$gst','$customer_contact','$address1','$address2','$city',$appr_no,'$appr_date','$terms','$lr_no','$lr_date','$through','$sub_total','$discount_amount','$total_amount','$round_of','$net_amount',$financial_year,'$created_at')";
//                 //   print_r($sql1);die();  
// $results1=mysqli_query($conn,$sql1);
      
// }

//       if($no==0) {
//         $sqls="insert into madharsha_invoice_final(bill_id,customer_name,gst_no,sub_total,discount,total,round_of,net_amount,financial_year,created_at) values('$bill_id','$customer_name','$gst','$sub_total','$discount_amount','$total_amount','$round_of','$net_amount',$financial_year,'$created_at')";
//             //   print_r($sqls);die(); 
//               $results=mysqli_query($conn,$sqls);
//         }
      if(($discount_amount=='0.00'||$discount_amount==''||$discount_amount==0)&&$cgst==''&&$sgst==''&&$igst=='')
        {
                  if($sub_total!=''&&$total_amount!=''&&$net_amount!='')
            {
                $round_of=$net_amount-$total_amount;
                $sql="update comboset_invoice_final set customer_name='$customer_name',contact='$customer_contact',gst_no='$gst',address_1='$address1',address_2='$address2',city='$city',appr_no='$appr_no',appr_date='$appr_date',terms='$terms',lr_no='$lr_no',lr_date='$lr_date',through='$through',sub_total='$sub_total',discount='$discount_amount',total='$total_amount',round_of='$round_of',net_amount='$net_amount' where bill_id='$bill_id' and financial_year='$financial_year' ";
                $result=mysqli_query($conn,$sql);
                
                if($result)
                {
                    $sql1="update madharsha_invoice_final set customer_name='$customer_name',gst_no='$gst',sub_total='$sub_total',discount='$discount_amount',total='$total_amount',round_of='$round_of',net_amount='$net_amount' where bill_id='$bill_id' and financial_year='$financial_year'";
                    $result1=mysqli_query($conn,$sql1);
                    if($result1)
                    {
                 $bill_printed=array('status'=>1);
                        echo json_encode($bill_printed);
                    }
                }
                   }
                   else{
              $sql="update comboset_invoice_final set customer_name='$customer_name',contact='$customer_contact',gst_no='$gst',address_1='$address1',address_2='$address2',city='$city',appr_no='$appr_no',appr_date='$appr_date',terms='$terms',lr_no='$lr_no',lr_date='$lr_date',through='$through',sub_total='',discount='',total='',round_of='',net_amount=''customer_name='$customer_name',contact='$customer_contact',gst_no='$gst',address_1='$address1',address_2='$address2',city='$city',appr_no='$appr_no',appr_date='$appr_date',terms='$terms',lr_no='$lr_no',lr_date='$lr_date',through='$through' where bill_id='$bill_id' and financial_year='$financial_year' ";
                  $result=mysqli_query($conn,$sql);
                 $sql1="update madharsha_invoice_final set customer_name='$customer_name',gst_no='$gst',sub_total='',discount='',total='',round_of='',net_amount='' where bill_id='$bill_id' and financial_year='$financial_year'";
                   $result1=mysqli_query($conn,$sql1);
                    }
                    }
          else if(($discount_amount!=''||$discount_amount!=0)&&$cgst==''&&$sgst==''&&$igst=='')
        {
            // print_r("ok1");die();
                if($sub_total!=''&&$discount_amount!=''&&$total_amount!=''&&$net_amount!='')
            {
                $round_of=$net_amount-$total_amount;
                $sql="update comboset_invoice_final set customer_name='$customer_name',contact='$customer_contact',gst_no='$gst',address_1='$address1',address_2='$address2',city='$city',appr_no='$appr_no',appr_date='$appr_date',terms='$terms',lr_no='$lr_no',lr_date='$lr_date',through='$through',sub_total='$sub_total',discount='$discount_amount',total='$total_amount',round_of='$round_of',net_amount='$net_amount' where bill_id='$bill_id' and financial_year='$financial_year'";
                $result=mysqli_query($conn,$sql);
                
                $sql1="update madharsha_invoice_final set customer_name='$customer_name',gst_no='$gst',sub_total='$sub_total',discount='$discount_amount',total='$total_amount',round_of='$round_of',net_amount='$net_amount' where bill_id='$bill_id' and financial_year='$financial_year'";
                $result1=mysqli_query($conn,$sql1);
                
                $bill_printed=array('status'=>1);
                echo json_encode($bill_printed);
                   
            }
             else{
              $sql="update comboset_invoice_final set customer_name='$customer_name',contact='$customer_contact',gst_no='$gst',address_1='$address1',address_2='$address2',city='$city',appr_no='$appr_no',appr_date='$appr_date',terms='$terms',lr_no='$lr_no',lr_date='$lr_date',through='$through',sub_total='',discount='',total='',round_of='',net_amount='' where bill_id='$bill_id' and financial_year='$financial_year' ";
                  $result=mysqli_query($conn,$sql);
                 $sql1="update madharsha_invoice_final set customer_name='$customer_name',gst_no='$gst',sub_total='',discount='',total='',round_of='',net_amount='' where bill_id='$bill_id' and financial_year='$financial_year'";
                   $result1=mysqli_query($conn,$sql1);
                    }
                
        }
        else if(($discount_amount=='0.00'||$discount_amount==''||$discount_amount==0)&&$cgst==''&&$sgst==''&&$igst!='')
        {
            // print_r("ok2");die();
                if($sub_total!=''&&$total_amount!=''&&$net_amount!='')
            {
                $igst_amount=number_format((($total_amount/100)*$igst),2);
                $round_of=number_format(($net_amount-($total_amount+$igst_amount)),2);
            
                $sql="update comboset_invoice_final set customer_name='$customer_name',contact='$customer_contact',gst_no='$gst',address_1='$address1',address_2='$address2',city='$city',appr_no='$appr_no',appr_date='$appr_date',terms='$terms',lr_no='$lr_no',lr_date='$lr_date',through='$through',sub_total='$sub_total',discount='$discount_amount',total='$total_amount',igst='$igst',igst_amount='$igst_amount',round_of='$round_of',net_amount='$net_amount' where bill_id='$bill_id' and financial_year='$financial_year' ";
                $result=mysqli_query($conn,$sql);
                
                $sql1="update madharsha_invoice_final set customer_name='$customer_name',gst_no='$gst',sub_total='$sub_total',discount='$discount_amount',total='$total_amount',igst='$igst',igst_amount='$igst_amount',round_of='$round_of',net_amount='$net_amount' where bill_id='$bill_id' and financial_year='$financial_year'";
               $result1=mysqli_query($conn,$sql1);
                
                        $bill_printed=array('status'=>1);
                        echo json_encode($bill_printed);
                    
            }
             else{
              $sql="update comboset_invoice_final set customer_name='$customer_name',contact='$customer_contact',gst_no='$gst',address_1='$address1',address_2='$address2',city='$city',appr_no='$appr_no',appr_date='$appr_date',terms='$terms',lr_no='$lr_no',lr_date='$lr_date',through='$through',sub_total='',discount='',total='',round_of='',net_amount='' where bill_id='$bill_id' and financial_year='$financial_year' ";
                  $result=mysqli_query($conn,$sql);
                 $sql1="update madharsha_invoice_final set customer_name='$customer_name',gst_no='$gst',sub_total='',discount='',total='',round_of='',net_amount='' where bill_id='$bill_id' and financial_year='$financial_year'";
                   $result1=mysqli_query($conn,$sql1);
                    }
                
        }
        else if(($discount_amount!=''||$discount_amount==0)&&$cgst==''&&$sgst==''&&$igst!='')
        {
        //   print_r("ok3");die();
                  if($sub_total!=''&&$discount_amount!=''&&$total_amount!=''&&$net_amount!='')
            {
                $igst_amount=number_format((($total_amount/100)*$igst),2);
                $round_of=number_format(($net_amount-($total_amount+$igst_amount)),2);
            
                $sql="update comboset_invoice_final set customer_name='$customer_name',contact='$customer_contact',gst_no='$gst',address_1='$address1',address_2='$address2',city='$city',appr_no='$appr_no',appr_date='$appr_date',terms='$terms',lr_no='$lr_no',lr_date='$lr_date',through='$through',sub_total='$sub_total',discount='$discount_amount',total='$total_amount',igst='$igst',igst_amount='$igst_amount',round_of='$round_of',net_amount='$net_amount' where bill_id='$bill_id' and financial_year='$financial_year'";
                $result=mysqli_query($conn,$sql);
                
                $sql1="update madharsha_invoice_final set customer_name='$customer_name',gst_no='$gst',sub_total='$sub_total',discount='$discount_amount',total='$total_amount',igst='$igst',igst_amount='$igst_amount',round_of='$round_of',net_amount='$net_amount' where bill_id='$bill_id' and financial_year='$financial_year'";
                $result1=mysqli_query($conn,$sql1);
                
                        $bill_printed=array('status'=>1);
                        echo json_encode($bill_printed);
                  
            }
             else{
              $sql="update comboset_invoice_final set customer_name='$customer_name',contact='$customer_contact',gst_no='$gst',address_1='$address1',address_2='$address2',city='$city',appr_no='$appr_no',appr_date='$appr_date',terms='$terms',lr_no='$lr_no',lr_date='$lr_date',through='$through',sub_total='',discount='',total='',round_of='',net_amount='' where bill_id='$bill_id' and financial_year='$financial_year' ";
                  $result=mysqli_query($conn,$sql);
                 $sql1="update madharsha_invoice_final set customer_name='$customer_name',gst_no='$gst',sub_total='',discount='',total='',round_of='',net_amount='' where bill_id='$bill_id' and financial_year='$financial_year'";
                   $result1=mysqli_query($conn,$sql1);
                    }
                
        }
        
        else if(($discount_amount=='0.00'||$discount_amount==''||$discount_amount==0)&&$cgst!=''&&$sgst!=''&&$igst=='')
        {
        //   print_r("ok4");die();
                 if($sub_total!=''&&$total_amount!=''&&$net_amount!='')
            {
                $cgst_amount=number_format((($total_amount/100)*$cgst),2);
                $sgst_amount=number_format((($total_amount/100)*$sgst),2);
                $round_of=number_format(($net_amount-($total_amount+$cgst_amount+$sgst_amount)),2);
            
                $sql="update comboset_invoice_final set customer_name='$customer_name',contact='$customer_contact',gst_no='$gst',address_1='$address1',address_2='$address2',city='$city',appr_no='$appr_no',appr_date='$appr_date',terms='$terms',lr_no='$lr_no',lr_date='$lr_date',through='$through',sub_total='$sub_total',discount='$discount_amount',total='$total_amount',cgst='$cgst',sgst='$sgst',cgst_amount='$cgst_amount',sgst_amount='$sgst_amount',round_of='$round_of',net_amount='$net_amount' where bill_id='$bill_id' and financial_year='$financial_year' ";
                $result=mysqli_query($conn,$sql);
                
                $sql1="update madharsha_invoice_final set customer_name='$customer_name',gst_no='$gst',sub_total='$sub_total',discount='$discount_amount',total='$total_amount',cgst='$cgst',sgst='$sgst',cgst_amount='$cgst_amount',sgst_amount='$sgst_amount',round_of='$round_of',net_amount='$net_amount' where bill_id='$bill_id' and financial_year='$financial_year' ";
                $result1=mysqli_query($conn,$sql1);
                
                        $bill_printed=array('status'=>1);
                        echo json_encode($bill_printed);
            }
             else{
              $sql="update comboset_invoice_final set customer_name='$customer_name',contact='$customer_contact',gst_no='$gst',address_1='$address1',address_2='$address2',city='$city',appr_no='$appr_no',appr_date='$appr_date',terms='$terms',lr_no='$lr_no',lr_date='$lr_date',through='$through',sub_total='',discount='',total='',round_of='',net_amount='' where bill_id='$bill_id' and financial_year='$financial_year' ";
                  $result=mysqli_query($conn,$sql);
                 $sql1="update madharsha_invoice_final set customer_name='$customer_name',gst_no='$gst',sub_total='',discount='',total='',round_of='',net_amount='' where bill_id='$bill_id' and financial_year='$financial_year'";
                   $result1=mysqli_query($conn,$sql1);
                    }
                
        }
        else if(($discount_amount!=''||$discount_amount==0)&&$cgst!=''&&$sgst!=''&&$igst=='')
        {
        //   print_r("ok5");die();
                  if($sub_total!=''&&$discount_amount!=''&&$total_amount!=''&&$net_amount!='')
            {
                $cgst_amount=number_format((($total_amount/100)*$cgst),2);
                $sgst_amount=number_format((($total_amount/100)*$sgst),2);
                $round_of=number_format(($net_amount-($total_amount+$cgst_amount+$sgst_amount)),2);
            
                $sql="update comboset_invoice_final set customer_name='$customer_name',contact='$customer_contact',gst_no='$gst',address_1='$address1',address_2='$address2',city='$city',appr_no='$appr_no',appr_date='$appr_date',terms='$terms',lr_no='$lr_no',lr_date='$lr_date',through='$through',sub_total='$sub_total',discount='$discount_amount',total='$total_amount',cgst='$cgst',sgst='$sgst',cgst_amount='$cgst_amount',sgst_amount='$sgst_amount',round_of='$round_of',net_amount='$net_amount' where bill_id='$bill_id' and financial_year='$financial_year' ";
                $result=mysqli_query($conn,$sql);
              
                $sql1="update comboset_invoice_final set customer_name='$customer_name',gst_no='$gst',sub_total='$sub_total',discount='$discount_amount',total='$total_amount',cgst='$cgst',sgst='$sgst',cgst_amount='$cgst_amount',sgst_amount='$sgst_amount',round_of='$round_of',net_amount='$net_amount' where bill_id='$bill_id' and financial_year='$financial_year' ";
                $result1=mysqli_query($conn,$sql1);
                  $bill_printed=array('status'=>1);
                        echo json_encode($bill_printed);
            }
             else{
              $sql="update comboset_invoice_final set customer_name='$customer_name',contact='$customer_contact',gst_no='$gst',address_1='$address1',address_2='$address2',city='$city',appr_no='$appr_no',appr_date='$appr_date',terms='$terms',lr_no='$lr_no',lr_date='$lr_date',through='$through',sub_total='',discount='',total='',round_of='',net_amount='' where bill_id='$bill_id' and financial_year='$financial_year' ";
                  $result=mysqli_query($conn,$sql);
                 $sql1="update madharsha_invoice_final set customer_name='$customer_name',gst_no='$gst',sub_total='',discount='',total='',round_of='',net_amount='' where bill_id='$bill_id' and financial_year='$financial_year'";
                   $result1=mysqli_query($conn,$sql1);
                    }
                
        }
        else{
           
            //   print_r("ok6");die();
                  $sql="update comboset_invoice_final set customer_name='$customer_name',contact='$customer_contact',gst_no='$gst',address_1='$address1',address_2='$address2',city='$city',appr_no='$appr_no',appr_date='$appr_date',terms='$terms',lr_no='$lr_no',lr_date='$lr_date',through='$through' where bill_id='$bill_id' and financial_year='$financial_year' ";
                $result=mysqli_query($conn,$sql);
              
                $sql1="update comboset_invoice_final set customer_name='$customer_name',gst_no='$gst' where bill_id='$bill_id' and financial_year='$financial_year' ";
                $result1=mysqli_query($conn,$sql1);
                  $bill_printed=array('status'=>1);
                        echo json_encode($bill_printed);
           
        }
        
        
}

if($action=='update_normal_invoice')
{
        $bill_id=$_REQUEST['bill_id'];
        $financial_year=$_REQUEST['yearpicker'];
        $customer_name=isset($_REQUEST['customer_name'])?$_REQUEST['customer_name']:"";
        
          $gst=isset($_REQUEST['gst'])?$_REQUEST['gst']:"";
        $address1=isset($_REQUEST['address1'])?$_REQUEST['address1']:"";
        $address2=isset($_REQUEST['address2'])?$_REQUEST['address2']:"";
        $city=isset($_REQUEST['city'])?$_REQUEST['city']:"";
        $appr_no=isset($_REQUEST['appr_no'])?$_REQUEST['appr_no']:"";
        $appr_date=isset($_REQUEST['appr_date'])?$_REQUEST['appr_date']:"";
        $terms=isset($_REQUEST['terms'])?$_REQUEST['terms']:"";
        $lr_no=isset($_REQUEST['lr_no'])?$_REQUEST['lr_no']:"";
        $lr_date=isset($_REQUEST['lr_date'])?$_REQUEST['lr_date']:"";
        $through=isset($_REQUEST['through'])?$_REQUEST['through']:"";
        
        $customer_contact=isset($_REQUEST['customer_contact'])?$_REQUEST['customer_contact']:"";
        $payment_mode=isset($_REQUEST['payment_mode'])?$_REQUEST['payment_mode']:"";
        $subtotal=isset($_REQUEST['sub_total'])?$_REQUEST['sub_total']:"";
        if($subtotal!='') {
        $sub_total=number_format((float)$subtotal, 2,'.','');
        }
        
        $discount=isset($_REQUEST['discount_amount'])?$_REQUEST['discount_amount']:"";
        if($discount!='') {
        $discount_amount=number_format((float)$discount, 2,'.','');
        }
        
        $totalamount=isset($_REQUEST['total_amount'])?$_REQUEST['total_amount']:"";
        if($totalamount!=''){
        $total_amount=number_format((float)$totalamount, 2,'.','');
        }
        
        $cgst=isset($_REQUEST['cgst'])?$_REQUEST['cgst']:"";
        $sgst=isset($_REQUEST['sgst'])?$_REQUEST['sgst']:"";
        $igst=isset($_REQUEST['igst'])?$_REQUEST['igst']:"";
        // $igst_amount=$_REQUEST['igst_amount'];
        
      $net_amount=isset($_REQUEST['net_amount'])?$_REQUEST['net_amount']:"";
      if($net_amount!=''){
          $net_amount=number_format($net_amount, 2,'.','');
      }
     
        
        if(($discount_amount=='0.00'||$discount_amount==''||$discount_amount==0)&&$cgst==''&&$sgst==''&&$igst=='')
        {
            // print_r("ok");die();
            if($sub_total!=''&&$total_amount!=''&&$net_amount!='')
            {
           
                $round_of=$net_amount-$total_amount;
                $sql="update comboset_invoice_final set customer_name='$customer_name',contact='$customer_contact',gst_no='$gst',address_1='$address1',address_2='$address2',city='$city',appr_no='$appr_no',appr_date='$appr_date',terms='$terms',lr_no='$lr_no',lr_date='$lr_date',through='$through',sub_total='$sub_total',discount='$discount_amount',total='$total_amount',round_of='$round_of',net_amount='$net_amount' where bill_id='$bill_id' and financial_year='$financial_year' ";
            //   print_r($sql);die();
                $result=mysqli_query($conn,$sql);
               
                $bill_printed=array('status'=>1);
                echo json_encode($bill_printed);
                   
            }
            else{
              $sql="update comboset_invoice_final set customer_name='$customer_name',contact='$customer_contact',gst_no='$gst',address_1='$address1',address_2='$address2',city='$city',appr_no='$appr_no',appr_date='$appr_date',terms='$terms',lr_no='$lr_no',lr_date='$lr_date',through='$through',sub_total='',discount='',total='',round_of='',net_amount='' where bill_id='$bill_id' and financial_year='$financial_year' ";
                //   print_r($sql);die();
               $result=mysqli_query($conn,$sql);
       
                        $bill_printed=array('status'=>1);
                        echo json_encode($bill_printed);
                    }     
       }
        else if(($discount_amount!='0.00'||$discount_amount!=''||$discount_amount!=0)&&$cgst==''&&$sgst==''&&$igst!='')
        {
            //  print_r("ok1");die();
           if($sub_total!=''&&$discount_amount!=''&&$total_amount!=''&&$net_amount!='')
            {
                $igst_amount=number_format((($total_amount/100)*$igst),2);
                $round_of=number_format(($net_amount-($total_amount+$igst_amount)),2);
            
                $sql="update comboset_invoice_final set customer_name='$customer_name',contact='$customer_contact',gst_no='$gst',address_1='$address1',address_2='$address2',city='$city',appr_no='$appr_no',appr_date='$appr_date',terms='$terms',lr_no='$lr_no',lr_date='$lr_date',through='$through',sub_total='$sub_total',discount='$discount_amount',total='$total_amount',igst='$igst',igst_amount='$igst_amount',round_of='$round_of',net_amount='$net_amount' where bill_id='$bill_id' and financial_year='$financial_year' ";
        //   print_r($sql);die();
                $result=mysqli_query($conn,$sql);
                
                        $bill_printed=array('status'=>1);
                        echo json_encode($bill_printed);
            }
                  else{
              $sql="update comboset_invoice_final set customer_name='$customer_name',contact='$customer_contact',gst_no='$gst',address_1='$address1',address_2='$address2',city='$city',appr_no='$appr_no',appr_date='$appr_date',terms='$terms',lr_no='$lr_no',lr_date='$lr_date',through='$through',sub_total='',discount='',total='',round_of='',net_amount='' where bill_id='$bill_id' and financial_year='$financial_year' ";
        //   print_r($sql);die();
          $result=mysqli_query($conn,$sql);
       
                        $bill_printed=array('status'=>1);
                        echo json_encode($bill_printed);
                    }
        }
        else if(($discount_amount=='0.00'||$discount_amount==''||$discount_amount==0)&&$cgst==''&&$sgst==''&&$igst!='')
        {
            // print_r("ok2");die();
            if($sub_total!=''&&$total_amount!=''&&$net_amount!='')
            {
                $igst_amount=number_format((($total_amount/100)*$igst),2);
                $round_of=number_format(($net_amount-($total_amount+$igst_amount)),2);
            
                $sql="update comboset_invoice_final set customer_name='$customer_name',contact='$customer_contact',gst_no='$gst',address_1='$address1',address_2='$address2',city='$city',appr_no='$appr_no',appr_date='$appr_date',terms='$terms',lr_no='$lr_no',lr_date='$lr_date',through='$through',sub_total='$sub_total',discount='$discount_amount',total='$total_amount',igst='$igst',igst_amount='$igst_amount',round_of='$round_of',net_amount='$net_amount' where bill_id='$bill_id' and financial_year='$financial_year'";
                $result=mysqli_query($conn,$sql);
                
                        $bill_printed=array('status'=>1);
                        echo json_encode($bill_printed);
            }
                
                 else{
              $sql="update comboset_invoice_final set customer_name='$customer_name',contact='$customer_contact',gst_no='$gst',address_1='$address1',address_2='$address2',city='$city',appr_no='$appr_no',appr_date='$appr_date',terms='$terms',lr_no='$lr_no',lr_date='$lr_date',through='$through',sub_total='',discount='',total='',round_of='',net_amount='' where bill_id='$bill_id' and financial_year='$financial_year' ";
                  $result=mysqli_query($conn,$sql);
         
                $bill_printed=array('status'=>1);
                        echo json_encode($bill_printed);
                    } 
        }
        else if(($discount_amount!='0.00'||$discount_amount!=''||$discount_amount!=0)&&$cgst==''&&$sgst==''&&$igst=='')
        {
            //  print_r("ok3");die();
           if($sub_total!=''&&$discount_amount!=''&&$total_amount!=''&&$net_amount!='')
            {
                $round_of=$net_amount-$total_amount;
                $sql="update comboset_invoice_final set customer_name='$customer_name',contact='$customer_contact',gst_no='$gst',address_1='$address1',address_2='$address2',city='$city',appr_no='$appr_no',appr_date='$appr_date',terms='$terms',lr_no='$lr_no',lr_date='$lr_date',through='$through',sub_total='$sub_total',discount='$discount_amount',total='$total_amount',round_of='$round_of',net_amount='$net_amount' where bill_id='$bill_id' and financial_year='$financial_year'";
                $result=mysqli_query($conn,$sql);
                
                        $bill_printed=array('status'=>1);
                        echo json_encode($bill_printed);
                   
            }
                 else{
              $sql="update comboset_invoice_final set customer_name='$customer_name',contact='$customer_contact',gst_no='$gst',address_1='$address1',address_2='$address2',city='$city',appr_no='$appr_no',appr_date='$appr_date',terms='$terms',lr_no='$lr_no',lr_date='$lr_date',through='$through',sub_total='',discount='',total='',round_of='',net_amount='' where bill_id='$bill_id' and financial_year='$financial_year' ";
                  $result=mysqli_query($conn,$sql);
      
                $bill_printed=array('status'=>1);
                        echo json_encode($bill_printed);
      
                    } 
          }
        else if(($discount_amount=='0.00'||$discount_amount==''||$discount_amount==0)&&$cgst!=''&&$sgst!=''&&$igst=='')
        {
          
            //  print_r("ok4");die();
           if($sub_total!=''&&$total_amount!=''&&$net_amount!='')
            {
                $cgst_amount=number_format((($total_amount/100)*$cgst),2);
                $sgst_amount=number_format((($total_amount/100)*$sgst),2);
                $round_of=number_format(($net_amount-($total_amount+$cgst_amount+$sgst_amount)),2);
            
                $sql="update comboset_invoice_final set customer_name='$customer_name',contact='$customer_contact',gst_no='$gst',address_1='$address1',address_2='$address2',city='$city',appr_no='$appr_no',appr_date='$appr_date',terms='$terms',lr_no='$lr_no',lr_date='$lr_date',through='$through',sub_total='$sub_total',discount='$discount_amount',total='$total_amount',cgst='$cgst',sgst='$sgst',cgst_amount='$cgst_amount',sgst_amount='$sgst_amount',round_of='$round_of',net_amount='$net_amount' where bill_id='$bill_id' and financial_year='$financial_year' ";
                $result=mysqli_query($conn,$sql);
                
                        $bill_printed=array('status'=>1,'test'=>'sbfd');
                        echo json_encode($bill_printed);
            }
                else{
              $sql="update comboset_invoice_final set customer_name='$customer_name',contact='$customer_contact',gst_no='$gst',address_1='$address1',address_2='$address2',city='$city',appr_no='$appr_no',appr_date='$appr_date',terms='$terms',lr_no='$lr_no',lr_date='$lr_date',through='$through',sub_total='',discount='',total='',round_of='',net_amount='' where bill_id='$bill_id' and financial_year='$financial_year' ";
                  $result=mysqli_query($conn,$sql);
      
                $bill_printed=array('status'=>1);
                        echo json_encode($bill_printed);
                    }
             
          }
        else if(($discount_amount!='0.00'||$discount_amount!=''||$discount_amount!=0)&&$cgst!=''&&$sgst!=''&&$igst=='')
        {
            //  print_r("ok5");die();
           if($sub_total!=''&&$discount_amount!=''&&$total_amount!=''&&$net_amount!='')
            {
                $cgst_amount=number_format((($total_amount/100)*$cgst),2);
                $sgst_amount=number_format((($total_amount/100)*$sgst),2);
                $round_of=number_format(($net_amount-($total_amount+$cgst_amount+$sgst_amount)),2);
            
                $sql="update comboset_invoice_final set customer_name='$customer_name',contact='$customer_contact',gst_no='$gst',address_1='$address1',address_2='$address2',city='$city',appr_no='$appr_no',appr_date='$appr_date',terms='$terms',lr_no='$lr_no',lr_date='$lr_date',through='$through',sub_total='$sub_total',discount='$discount_amount',total='$total_amount',cgst='$cgst',sgst='$sgst',cgst_amount='$cgst_amount',sgst_amount='$sgst_amount',round_of='$round_of',net_amount='$net_amount' where bill_id='$bill_id' and financial_year='$financial_year' ";
                $result=mysqli_query($conn,$sql);
                
               
                        $bill_printed=array('status'=>1,'test'=>'sbfd');
                        echo json_encode($bill_printed);
            }
               else{
              $sql="update comboset_invoice_final set customer_name='$customer_name',contact='$customer_contact',gst_no='$gst',address_1='$address1',address_2='$address2',city='$city',appr_no='$appr_no',appr_date='$appr_date',terms='$terms',lr_no='$lr_no',lr_date='$lr_date',through='$through',sub_total='',discount='',total='',round_of='',net_amount='' where bill_id='$bill_id' and financial_year='$financial_year' ";
                  $result=mysqli_query($conn,$sql);
                    }
                
              $bill_printed=array('status'=>1);
                        echo json_encode($bill_printed);
            }
          else{
           
            //   print_r("ok6");die();
                  $sql="update comboset_invoice_final set customer_name='$customer_name',contact='$customer_contact',gst_no='$gst',address_1='$address1',address_2='$address2',city='$city',appr_no='$appr_no',appr_date='$appr_date',terms='$terms',lr_no='$lr_no',lr_date='$lr_date',through='$through' where bill_id='$bill_id' and financial_year='$financial_year' ";
                $result=mysqli_query($conn,$sql);
              
                $sql1="update comboset_invoice_final set customer_name='$customer_name',gst_no='$gst' where bill_id='$bill_id' and financial_year='$financial_year' ";
                $result1=mysqli_query($conn,$sql1);
        
                  $bill_printed=array('status'=>1);
                        echo json_encode($bill_printed);
           
        }
        
        
}

?>