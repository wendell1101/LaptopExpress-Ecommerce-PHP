<?php
    include('../config/db.php');
    session_start();
    require('../fpdf/fpdf.php');
    if(isset($_GET['get_receipt'])){
        unset($_SESSION['receipt']);
    }
    $last_id = $_SESSION['last_id'];
    
    $join = "SELECT * FROM items WHERE item_id ='$last_id' ";
    $run_join = mysqli_query($conn,$join);
    $item = mysqli_fetch_assoc($run_join);
    $order = "SELECT * FROM orders WHERE item_id ='$last_id' ";
    $run_order = mysqli_query($conn,$order);
    $orders = mysqli_fetch_assoc($run_join);
  
    $item_name = $item['item_name'];
    $item_price = $item['price'];
    $quantity = $orders['quantity'];
    $total_price = $orders['total_price'];
    $date = $orders['date'];
    $orders_name = $orders['firstname'].' '.$orders['middlename'].' '.$orders['lastname'];
    $orders_address = $orders['streetname'].', '.$orders['barangay'].', '.$orders['city'].', '.$orders['province'];
    echo $orders_address;

    mysqli_close($conn);
    $pdf = new fpdf('P','in',array('5','8'));
    $pdf->addPage();
    $pdf->SetAutoPageBreak(false);
    
    $pdf->SetFont('Arial','',12);
    // $pdf->Image('../uploads/1582693692_HP14-SDK0002AX.png');
    $pdf->Cell(4,0.3,'Laptop Express Inc.',0,1,'C');
    $pdf->Cell(4,0.3,"Product :$item_name",0,1,'C');
    $pdf->Cell(4,0.3,"Quantity :$quantity",0,1,'C');
    $pdf->Cell(4,0.3,"Price :$item_price",0,1,'C');
    $pdf->Cell(4,0.3,"Total Price :$total_price",0,1,'C');
    $pdf->Cell(4,0.3,"Name :$orders_name",0,1,'C');
    $pdf->Cell(4,0.3,"Adress :$orders_address",0,1,'C');
    $pdf->Cell(4,0.3,"Date :$date",0,1,'C');

    
        $pdf->Output();

?>