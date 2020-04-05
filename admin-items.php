<?php include('config/header_admin.php');
    include('config/db.php');
    
    
    
    $select = "SELECT * FROM items";
    $selected = mysqli_query($conn,$select);
    $number_of_results = mysqli_num_rows($selected);
    $result_per_page = 5;
   
    $number_of_pages = ceil($number_of_results/$result_per_page);
    // echo $number_of_pages;
    $id =1;
    $i =1;

    if(!isset($_GET['page'])){
        $page =1;
    }else{
        $page = $_GET['page'];
    }
    if($page <=0){
        $page =1;
    }
    
    $this_page_first_result = ($page -1)* $result_per_page;
    $this_page_first_result_new = $this_page_first_result + 1;
    $sql = "SELECT * FROM items LIMIT $this_page_first_result , $result_per_page";
    $run_sql = mysqli_query($conn,$sql);
    
  
  
    
    
    if(isset($_GET['release_id'])){
        $release_id = $_GET['release_id'];
        $release_value = 1;
        $release = "INSERT INTO items(release_status) VALUES('$release_value') WHERE item_id = '$release_id'";
        $released = mysqli_query($conn,$release);
        
        
    }
    
  
    
?>

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
                    <a href="admin.php"> <li id="user-btn">Users </li></a>
                    <a href="admin-order.php"><li id="order-btn"> Orders </li></a>
                    <a href="admin-items.php"><li id="items-btn"  class="active-btn"> Items </li></a>
                    <button id="index-btn"><a href="index.php"> Back to Page </a></button>
                </ul>
            </div>
            <div id="main-admin">
                
               
                <!--orders table-->
                
               
                <div id="items">
                    <div id="top-title" class="item-title">
                    </div>
                    <table id="table-items">
                    <a href="includes/add-items.php" id="addItem">Add Item</a>
                        <tr>
                            <th>Id</th>
                            <th>Item Name</th>
                            <th>Item Image</th>
                            <th>Details</th>
                            <th>Price</th>
                            <th>Type</th>
                            
                            <th colspan="2">Actions</th>
                            <th >Release</th>
                        </tr>
                        <?php while($items = mysqli_fetch_array($run_sql)):?>     
                                                  
                        <tr>
                            
                            <td><?php echo $this_page_first_result_new++;?></td>
                            <td><?php echo $items['item_name'];?></td>
                            <td><img src="<?php echo 'uploads/'.$items['image_name'];?>" class="item"></td>
                            <td><?php echo $items['details'];?></td>
                            <td>P<?php echo $items['price'];?></td>
                            <td><?php echo $items['item_type'];?></td>
                            <td><a href="includes/edit.php?edit=<?php echo $items['item_id'];?>" class="edit">Edit</a></td>
                            <td id="delete"><a href="includes/delete.php?confirm=<?php echo $items['item_id']?>" class=
                        "error">Delete</a> </td>
                            <?php if($items['release_status'] === '1' ):?>
                                <?php $_SESSION['released'] = "<p class='check-icon'>&#10003;</p>"?>
                            <?php endif;?>
                            <?php if($items['release_status'] === '0' ):?>
                                <?php $_SESSION['released'] = "<p class='close-icon'>&times;</p>"?>
                            <?php endif;?>
                            <td><?php echo $_SESSION['released'];?></td>
                            
                           
                        </tr>
                        <?php endwhile;?>
                       
                    </table>
                <div class="pagination">
                    <p class="page">Page: </p>
                    <?php for($page =1;$page<=$number_of_pages;$page++):?>
                            
                    <a href="admin-items.php?page=<?php echo $page?>"><?php echo $page;?></a>
                    
                     <?php endfor;?>
                </div>   
                </div>
            </div>
        </div>
      
    </div>
<!--pagination-->
                


<?php if(isset($_SESSION['modal'])):?>
                    <div id="modal">
                        Are you sure to delete this item?
                            <div id="confirm">
                            <a href="includes/delete.php?delete_id=<?php echo $_SESSION['modal'] ?>" id="yesBtn">Yes</a>
                            <a href="admin-items.php" id="noBtn">No</a>
                            </div>
                    </div>
                    <?php unset($_SESSION['modal']);?>
                    <?php $_SESSION['deleted-modal'];?>
   <?php endif ;?>
   <?php if(isset($_SESSION['deleted-modal'])):?>
        <div id="deleted-modal">
                <p>An item has been deleted</p>
                <a href="admin-items.php" id="okayBtn" >Ok</a>
        </div>
        <?php unset($_SESSION['deleted-modal']);?>
   <?php endif;?>
   <!--session for add items confirmation-->
   <?php if(isset($_SESSION['add'])):?>
            <div id="add-modal">
                <p>An item has been added to the database</p>
                <a href="admin-items.php" id="okayBtn" >Ok</a>
            </div>
            <?php unset($_SESSION['add']);?>
    <?php endif;?>
    <!--session for edit update of items-->
    <?php if(isset($_SESSION['edit'])):?>
        <div id="add-modal">
            <p>An item has been updated</p>
            <a href="admin-items.php" id="okayBtn" >Ok</a>
        </div>
        <?php unset($_SESSION['edit']);?>
        <?php unset($_SESSION['save']);?>
    <?php endif;?>
    <!--session for release-->
    <?php if(isset($_SESSION['release'])):?>
        <div id="add-modal">
            <p>An item has been release</p>
            <a href="admin-items.php" id="okayBtn" >Ok</a>
        </div>
        <?php unset($_SESSION['release']);?>
       
    <?php endif;?>


     <!--Session cant delete item-->
     <?php if(isset($_SESSION['cant_delete'])):?>
        <div id="add-modal">
            <p>You can't delete this item. An order has been placed to this item.</p>
            <a href="admin-items.php" id="okayBtn" >Ok</a>
        </div>
        <?php unset($_SESSION['cant_delete']);?>
    <?php endif;?>


             
   
    
    


<?php include('config/footer_admin.php')?>