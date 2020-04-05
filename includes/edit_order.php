<?php
    include('../config/db.php');
    session_start();
    if(isset($_GET['edit_order'])){
        $id = $_GET['edit_order'];
        $_SESSION['id'] = $id;
        $join = "SELECT * FROM items as i INNER JOIN orders as o ON o.item_id = i.item_id";
        $run_join = mysqli_query($conn,$join);
      
        $orders = mysqli_fetch_assoc($run_join);
        $orders_name = $orders['firstname'].' '.$orders['middlename'].' '.$orders['lastname'];
        $orders_address = $orders['streetname'].', '.$orders['barangay'].', '.$orders['city'].', '.$orders['province'];
     
   
    }
    if(isset($_POST['update'])){
       
        $status = mysqli_real_escape_string($conn,$_POST['status']);
        
        $new_id = $_SESSION['id'];
        
        
        $update ="UPDATE orders SET status = '$status' WHERE order_id='$new_id'";
        $run_update = mysqli_query($conn,$update);

        if($run_update){
                $_SESSION['status'] = 'status has been changed';
                header('location:../admin-order.php');
         
            exit();
        }else{
            echo'failed to update order';
        }
    }
    
    

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Items</title>
    <link rel="stylesheet" href="../css/admin.css">
    <link rel="stylesheet" href="../css/edit.css">
    <!-- <link rel="stylesheet" href="../css/style.css"> -->
</head>
<body>
    <div class="container">
        <form action="edit_order.php" method="post"  id="edit-container">
        <h2>Edit User Information:</h2>
            <div id="input">
                <label for="name">Name:</label>
                <input type="text" name="orders_name"value="<?php echo $orders_name?>" readonly>
            </div>
            <div id="input">
                <label for="name">Item_name:</label>
                <input type="text" name="item_name"value="<?php echo $orders['item_name']?>" readonly>
            </div>
            <div id="input">
                <label for="price">Price:</label>
                <input type="text" name="password"value="<?php echo $orders['price']?>" readonly>
            </div>
            <div id="input">
                <label for="type">Quantity:</label>
                <input type="text" name="quantity"value="<?php echo $orders['quantity']?>" readonly>
            </div>
            <div id="input">
                <label for="type">Total Price:</label>
                <input type="text" name="toatal_price"value="<?php echo $orders['total_price']?>" readonly>
            </div>
            <div id="input">
                <label for="type">Status:</label>
                <select name="status" value="<?php echo $orders['status']?>">
                    <option value="0" name="pending">pending</option>
                    <option value="1" name="delivered">delivered</option>
                </select>
            </div>
            

            <div id="box">
                <button type="submit" name="update">Update</button><br>
                
               <a href="../admin-order.php" class="cancel">Cancel</a> 
            </div>
        </form>
    </div>
   
    
    <script src="../js/jquery-3.4.1.min.js"></script>
    
</body>
</html>