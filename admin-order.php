<?php include('config/header_admin.php');
    include('config/db.php');
    
    //select join table items orders and customers
        $join = "SELECT * FROM items as i INNER JOIN orders as o ON o.item_id = i.item_id";
        $run_join = mysqli_query($conn,$join);
        $number_of_results = mysqli_num_rows($run_join);
        $result_per_page = 7;
        $number_of_pages = ceil($number_of_results/$result_per_page);

        if(!isset($_GET['page'])){
            $page =1;
        }else{
            $page = $_GET['page'];
        }
        $this_page_first_result = ($page -1)* $result_per_page;
        $this_page_first_result_new = $this_page_first_result + 1;

        $select = "SELECT * FROM items as i INNER JOIN orders as o ON o.item_id = i.item_id ORDER BY o.order_id LIMIT $this_page_first_result , $result_per_page " ;
        $run_select = mysqli_query($conn,$select);
        if(!mysqli_num_rows($run_select)){
            $_SESSION['empty'] = 'empty table';
        }else{
            unset($_SESSION['empty']);
        }
        
    $id =1;
    $i =1;
    
   

    
   
?>
 <link rel="stylesheet" href="..css/admin.css">
<ul id="accounts">
        <button id="account-title">Accounts<i class="fas fa-user"></i>
            <ul>
                
                <li><a href="index.php"> Add Account</a></li>                  
                <li><a href="index.php"> Back To Home</a></li>                  
                <li><a href="admin.php?logout"> Logout</a></li>  
            </ul>                
        </button>                
        
</ul>      

                    
   

    <div class="wrapper">
        <div id="admin-page">
            <div id="side-panel">
                <ul>
                    <a href="admin.php"> <li id="user-btn" >Users </li></a>
                    <a href="admin-order.php"><li id="order-btn"class="active-btn"> Orders </li></a>
                    <a href="admin-items.php"><li id="items-btn"> Items </li></a>
                    <button id="index-btn"><a href="index.php"> Back to Page </a></button>
                </ul>
            </div>
            <div id="main-admin">
                
            <table id="table-orders">
                    
                    <tr>
                        <th>Id</th>
                        <th>Item Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total Price</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Contact Number</th>
                        <th colspan="2">Actions</th>
                        <th>Status</th>
                   
                    </tr>
                   
                        
                    
                    <?php while($orders = mysqli_fetch_assoc($run_select)):?>
                        <?php 
                            $order_id = $orders['order_id'];    
                        ?>
                        <tr>
                            <td class="order_id"><?php echo $this_page_first_result_new++;?></td>
                            <td><?php echo $orders['item_name'];?></td>
                            <td>P<?php echo $orders['price'];?></td>
                            <td><?php echo $orders['quantity'];?></td>
                            <td>P<?php echo $orders['total_price'];?></td>
                            <?php
                                $orders_name = $orders['firstname'].' '.$orders['middlename'].' '.$orders['lastname'];
                                $orders_address = $orders['streetname'].', '.$orders['barangay'].', '.$orders['city'].', '.$orders['province'];
                            ?>
                            <td><?php echo $orders_name;?></td>
                            <td><?php echo $orders['email'];?></td>
                            <td><?php echo $orders_address?></td>
                            <td><?php echo $orders['contact_number']?></td>
                            <?php
                               
                               
                               if($orders['status'] == 0){
                                    $status = "<p class='pending'>pending</p>";
                                }else{
                                    $status = "<p class='pending'>Expired</p>";
                                }
                                
                                if($orders['status'] == 1){
                                    $status = "<p class='delivered'>Delivered</p>";
                                }
                                
                                
                            ?>
                            <td ><a href="includes/edit_order.php?edit_order=<?php echo $orders['order_id'];?>" class="edit">Edit</a></td>
                            <td class="td-delete"><a href="includes/delete.php?delete_order=<?php echo $orders['order_id'];?>" class="error">Delete</a></td>
                            <td><?php echo $status;?></td>
                        </tr>
                    <?php endwhile;?>
                </table>
                <!-- empty table-->
                <?php if(isset($_SESSION['empty'])):?>
                    <div id="empty-container">
                        <h5>No Results Found!</h5>
                    </div>
                <?php endif;?>
        <div class="pagination">
            <p class="page">Page: </p>
            <?php for($page =1;$page<=$number_of_pages;$page++):?>
            <a href="admin-order.php?page=<?php echo $page?>"><?php echo $page;?></a>
        <?php endfor;?>
    </div>
    

        </div>
    </div>
    </div>
    <!--pagination-->
    
<?php if(isset($_SESSION['modal'])):?>
    <div id="modal">
                        Are you sure to delete this item?
                            <div id="confirm">
                            <a href="includes/delete.php?delete_id=<?php echo $_SESSION['modal'] ?>">Yes</a>
                            <button>No</button>
                            </div>
                    </div>
                    <?php unset($_SESSION['modal']);?>
   <?php endif ;?>
   <?php if(isset($_SESSION['delete_order_table'])):?>
           
                <div id="modal">
                        Are you sure to delete this order?
                            <div id="confirm">
                            <a href="includes/delete.php?delete_order_id=<?php echo $_SESSION['delete_order_table']; ?>" id="yesBtn">Yes</a>
                            <a href="admin-order.php" id="noBtn">No</a>
                            </div>
                    </div>
                    <?php unset($_SESSION['delete_order_table']);?>
   <?php endif;?>    
          
   <?php if(isset($_SESSION['show-delete-order'])):?>
        <div id="add-modal">
            <p>An order has been deleted</p>
            <a href="admin-order.php" id="okayBtn" >Ok</a>
        </div>
        <?php unset($_SESSION['show-delete-order']);?>
   <?php endif;?>
   <!--status-->

   <?php if(isset($_SESSION['status'])):?>
        <div id="add-modal">
            <p>An order has been updated</p>
            <a href="admin-order.php" id="okayBtn" >Ok</a>
        </div>
        <?php unset($_SESSION['status']);?>
   <?php endif;?>
        
    <!--empty table-->

  
    <script src="js/ckeditor.js"></script>


<?php include('config/footer_admin.php')?>