<?php include('config/header_items.php');
  
    $select = "SELECT * FROM items WHERE release_status =1 ";
    $selected = mysqli_query($conn,$select);
  
?>

<?php
    include ('config/db.php');
   
    if(isset($_GET['order_id'])){
        $_SESSION['display_order'] ='display order modal';
      $id =  $_GET['order_id'];
      $_SESSION['id'] = $id;
    }
    if(isset($_GET['closeOrderModal'])){
        unset($_SESSION['display_order']);
    }
    if(isset($_GET['cancel'])){
        unset($_SESSION['display_order']);
    }
    if(isset($_GET['okay'])){
        unset($_SESSION['order_success']);
    }
   
    
?>
    <?php include("includes/order-logic.php");?>
   
        <div class="wrapper">
            <div id="title" class="items-title">
                Available Items
            </div>
            <!-- <a href="includes/receipt.php?get_receipt"class="receipt">Get Receipt Here</a> -->
            <div id="item-page">     
                <?php while($items = mysqli_fetch_assoc($selected)):?>
                <div id="item-container">
               
                    <div  class="box">
                   <a href="<?php echo 'uploads/'.$items['image_name'];?>"> <img src="<?php echo 'uploads/'.$items['image_name'];?>"></a>
                    </div>
                    <a href="items.php?order_id=<?php echo $items['item_id']?>"><button id="btn-buy" class="btn-buy">
                       Buy Now
                    </button></a>
                    <div class="item-details">
                        <span id ="title"class="item-title"><?php echo $items['item_name'];?></span>
                        <p class="details">
                        <?php echo $items['details'];?>
                        </p>
                        <span id="title" class="price">₱<?php echo $items['price'];?></span>
                    </div>   
                </div>
                <?php endwhile;?>
                <!--next-item-->
                </div>
                
                
        <!--order Page-->
        
       
        
                
        <!--admin Link-->                         
        <?php if(isset($_SESSION['admin'])):?>
            <a href="admin.php" class="goAdmin">Go to Admin</a>
        <?php endif;?>         


        <!-- Order Modal-->    
    <?php if(isset($_SESSION['inserted'])):?>
        <div id="order-modal">
                Order has been Place
                <button id="okayBtn">okay</button>
        </div>
        <?php unset($_SESSION['inserted']);?>
     <?php endif;?>
        <!-- < -->
        <!--OrderForm modal-->
    <?php if(isset($_SESSION['display_order'])):?>
    <?php
        $select = "SELECT * FROM items WHERE release_status =1";
        $selected = mysqli_query($conn,$select);    
        $items = mysqli_fetch_assoc($selected);
    ?>
        <div class="modal-container">
            <?php
                
                $selected_item = "SELECT * FROM items WHERE item_id = '$id'";
                $run_query = mysqli_query($conn,$selected_item);
                $items = mysqli_fetch_assoc($run_query);
             ?>
        
            <form action="items.php" method ="post" id="order-form">
         
                <div id="btn-order-exit"><a href="items.php?closeOrderModal">&times;</a></div>
                    <div id="item-image">
                        <img src="<?php echo 'uploads/'.$items['image_name'];?>">
                    </div>
                <div id="left-form">
                    <div id="box">
                        <label for="itemname">Item Name:</label>
                        <?php// echo print_r($items);?>
                        <input type="text" name="item_name" value="<?php echo $items['item_name'];?>" readonly>
                        
                    </div>
                    <div id="box">
                        <label for="price">Price:</label>
                        <input type="text" name="price" value="<?php echo $items['price'];?>" readonly>
                    </div>
                    <div id="box">
                        <label for="quantity">Quantity:</label>
                        <input type="number" name="quantity" required>
                    </div>
                    
                    <div id="box">
                        <label for="firstname">First Name:</label>
                        <input type="text" name="fname" required placeholder="input your firstname">
                    </div>
                    <div id="box">
                        <label for="middlename">Middle Name:</label>
                        <input type="text" name="mname" placeholder="optional">
                    </div>
                    <div id="box">
                        <label for="lastname">Last Name:</label>
                        <input type="text" name="lname" required placeholder="input your lastname">
                    </div>
                    <div id="box">
                        <label for="email">Email:</label>
                        <input type="email" name="email" required placeholder="input your lastname">
                    </div>
                </div>
                <!--end of left Form-->
                <div id="right-form">
                    <div id="box">
                            <label for="Address">Province:</label>
                            <input type="text" name="province" required placeholder="choose your province">
                        </div>
                        <div id="box">
                            <label for="City">City/Municipality:</label>
                            <input type="text" name="city" placeholder="choose your city">
                        </div>
                        <div id="box">
                            <label for="Barangay">Barangay:</label>
                            <input type="text" name="barangay" required placeholder="choose your barangay">
                        </div>
                        <div id="box">
                            <label for="Street">House Number,Building and Street Name:</label>
                            <input type="text" name="street" required placeholder="input your street, subdivision etc.">
                        </div>
                        <div id="box">
                            <label for="number">Contact Number:</label>
                            <input type="tel" name="contact_number" required placeholder="input you mobile number">
                        </div>
                        <div id="box">
                            <label for="othernotes">Other Notes:</label>
                            <input type="text" name="other_notes" placeholder="optional">
                        </div>
                </div>
                <div id="box" class="btn-confirm">
                    <button type="submit" name="btn_order" class="orderBtn">ORDER</button>
                    <a href="items.php?cancel" class="cancel">CANCEL</a>
                </div>
            </form>
        </div>
       
        <?php unset($_SESSION['display_order']);?>
    <?php endif;?>
    
    <?php if(isset($_SESSION['order_success'])):?>
        <div id="order-success" class="order-success">
                Order has been Placed
                <a href="items.php?okay"><button id="okayBtn">okay</button></a>
        </div>
    <?php endif;?>
    <?php if(isset($_SESSION['receipt'])):?>
        <a href="includes/receipt2.php?get_receipt" class="receipt">Get Receipt Here</a>
    <?php endif;?>
    <?php if(isset($_SESSION['sent'])):?>
        <div id="order-success" class="order-success">
            A confirmation containing the copy of receipt has been sent to your email account
            <a href="items.php?okay"><button id="okayBtn">okay</button></a>
        </div>
		<?php unset($_SESSION['sent']);?>
		<?php unset($_SESSION['receipt_pdf']);?>
	<?php endif;?>
    <?php if(isset($_SESSION['not_sent'])):?>
        <div id="order-success" class="order-success">
            Failed to send receipt to email. Connection Failure.
            <a href="items.php?okay"><button id="okayBtn">okay</button></a> 
        </div>
		<?php unset($_SESSION['not_sent']);?>
		
	<?php endif;?>
    
    <?php if(isset($_SESSION['receipt_pdf'])):?>
           <a href="mailer/email.php?send" class="mail">Send Receipt to Email</a> 
    <?php endif;?>
  
    
      
           
             <script src ="js/items.js"></script>
 <?php include('config/footer_items.php');?>  