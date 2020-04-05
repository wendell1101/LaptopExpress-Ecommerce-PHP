<?php include ('../config/db.php');
    session_start();
    $errors = array();
    if(isset($_GET['id'])){
     $id = $_GET['id'];
     $select = "SELECT * FROM items WHERE id ='$id'";
     $run_select = mysqli_query($conn,$select);
     $item = mysqli_fetch_assoc($run_select);
    }
    include('order-logic.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/order.css">

</head>
<body>
    <div class="main-container">
        
        <form action="order.php" method ="post" id="order-form">
            <div id="btn-order-exit">&times;</div>
                <div id="item-image">
                    <img src="<?php echo '../uploads/'.$item['image'];?>">
                </div>
            <div id="left-form">
                
                <?php
                    if(count($errors)>0){
                        foreach($errors as $error){
                            echo $error.'<br>';
                        }
                    }
                    
                ?>
                <div id="box">
                    <label for="itemname">Item Name:</label>
                    <input type="text" name="item_name" value="<?php echo $item['item_name'];?>" readonly>
                    
                </div>
                <div id="box">
                    <label for="price">Price:</label>
                    <input type="text" name="price" value="<?php echo $item['price'];?>" readonly>
                </div>
                <div id="box">
                    <label for="quantity">Quantity:</label>
                    <input type="number" name="quantity" >
                </div>
                
                <div id="box">
                    <label for="firstname">First Name:</label>
                    <input type="text" name="fname" >
                </div>
                <div id="box">
                    <label for="middlename">Middle Name:</label>
                    <input type="text" name="mname" >
                </div>
                <div id="box">
                    <label for="lastname">Last Name:</label>
                    <input type="text" name="lname" >
                </div>
                <div id="box">
                    <label for="email">Email:</label>
                    <input type="email" name="email" >
                </div>
            </div>
            <!--end of left Form-->
            <div id="right-form">
                <div id="box">
                        <label for="Address">Province:</label>
                        <input type="text" name="province" >
                    </div>
                    <div id="box">
                        <label for="City">City/Municipality:</label>
                        <input type="text" name="province" >
                    </div>
                    <div id="box">
                        <label for="Barangay">Barangay:</label>
                        <input type="text" name="brgy" >
                    </div>
                    <div id="box">
                        <label for="Street">House Number,Building and Street Name:</label>
                        <input type="text" name="street" >
                    </div>
                    <div id="box">
                        <label for="number">Contact Number:</label>
                        <input type="number" name="contact_number" >
                    </div>
                    <div id="box">
                        <label for="othernotes">Other Notes:</label>
                        <input type="number" name="other_notes" >
                    </div>
            </div>
            <div id="box" class="btn-confirm">
                <button type="submit" name="btn_order" class="orderBtn">ORDER</button>
                <a href="../items.php" class="cancel">CANCEL</a>
            </div>
            
           

        </form>
    </div>
    
    
    
</body>
</html>