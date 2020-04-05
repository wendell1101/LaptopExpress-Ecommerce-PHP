<?php
    require('../fpdf/fpdf.php');
    include('../config/db.php');
    session_start();
    if(isset($_GET['get_receipt'])){
        unset($_SESSION['receipt']);
    }
    $last_id = $_SESSION['last_id'];
    
    $join = "SELECT * FROM items INNER JOIN orders on items.item_id = orders.item_id WHERE orders.order_id = $last_id";
    $run_join = mysqli_query($conn,$join);
    $orders = mysqli_fetch_assoc($run_join);
   
  
    $id = $orders['order_id'];
    $email = $orders['email'];
    $item_name = $orders['item_name'];
    $item_price = $orders['price'];
    $quantity = $orders['quantity'];
    $total_price = $orders['total_price'];
    $date = $orders['date'];
    $orders_name = $orders['firstname'].' '.$orders['middlename'].' '.$orders['lastname'];
    $orders_address1 = $orders['streetname'].', '.$orders['barangay'];
    $orders_address2=  $orders['city'].', '.$orders['province'];
    

    // mysqli_close($conn);

    //pdf format
    $pdf = new fpdf('P','in',array('5','6'));
    $pdf->addPage();
    $pdf->SetAutoPageBreak(false);
    $filename="../receipts/2020-receipt-no.$id.pdf";
    $pdf->SetFont('Arial','',11);
    $pdf->setTextColor(47, 47, 47);
    // $pdf->Image('../uploads/1582693692_HP14-SDK0002AX.png');
    $pdf->Cell(4,0.3,'Laptop Express Inc.',0,1,'C');
    $pdf->Cell(4,0.3,'Brgy.Dos Sto. Tomas, Batangas',0,1,'C');
    $pdf->Cell(4,0.3,'',0,1,'C');
    $pdf->Cell(4,0.3,'',0,1,'C');
   
   
    $pdf->Cell(3.35,0.3,"Product :            $item_name",0,1,'C');
    $pdf->Cell(3,0.3,"Price :                 P$item_price",0,1,'C');
    $pdf->Cell(2.6,0.3,"Quantity :            $quantity",0,1,'C');
    $pdf->Cell(3,0.3,"Total Price :       P$total_price",0,1,'C');
    $pdf->Cell(3.9,0.3,"Name :                $orders_name",0,1,'C');
    $pdf->Cell(4.4,0.3,"Address :            $orders_address1",0,1,'C');
    $pdf->Cell(4.5,0.3,"          $orders_address2",0,1,'C');
    $pdf->Cell(4,0.3,"Date :                   $date",0,1,'C');
  
    $pdf->Cell(3.95,0.3,"Receipt Id:           2020-receipt-no.$id",0,1,'C');
    
   
    $pdf->Cell(4,0.3,'',0,1,'C');
 
   
    $pdf->Cell(4,0.3,"OFFICIAL RECEIPT ",0,1,'C');
    $pdf->Cell(4,0.3,"Valid until 1 year date of purchased ",0,1,'C');
    $pdf->Cell(4,0.3,"Copyright 2020 ",0,1,'C');

    
    
    $output = $pdf->Output('F',$filename);
    
   
    $show =$pdf->Output();
        // $_SESSION['receipt_pdf'] = $filename;
        
            $_SESSION['email'] = $email;
            $_SESSION['receipt_pdf'] = $filename;
?>