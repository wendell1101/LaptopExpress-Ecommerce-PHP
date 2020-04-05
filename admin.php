<?php include('config/header_admin.php');
    include('config/db.php');
    
    

    $check = "SELECT * FROM users";
    $result = mysqli_query($conn,$check);
    $number_of_results = mysqli_num_rows($result);
    $result_per_page = 5;
    $id =1;
    $i =1;
   
    $number_of_pages = ceil($number_of_results/$result_per_page);
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
    $select = "SELECT * FROM users user_id ORDER BY user_id LIMIT $this_page_first_result , $result_per_page";
    $selected = mysqli_query($conn,$select);


   

   
    
   
  
    
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
                    <a href="admin.php"> <li id="user-btn"  class="active-btn">Users </li></a>
                    <a href="admin-order.php"><li id="order-btn"> Orders </li></a>
                    <a href="admin-items.php"><li id="items-btn"> Items </li></a>
                    <button id="index-btn"><a href="index.php"> Back to Page </a></button>
                </ul>
            </div>
            <div id="main-admin">
                
                <table id="table-users">
                    <div id="top-title" class="user-title">
              
                    </div>
                    <tr>
                        <th>Id</th>
                        <th>Profile</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Email</th>
                        <th>User Type</th>
                        <th>Date Created</th>
                        <th colspan = '2'>Action</th>
                    </tr>
                   
                    <?php while($users = mysqli_fetch_assoc($selected)):?>
                    <?php if ($users['admin_type']==1){
                            $type = 'admin';
                        }elseif($users['admin_type']==0){
                            $type ='user';
                        }else{
                            $type = 'unknown';
                        }
                        
                    ?>
                    <tr>
                        <td><?php echo $this_page_first_result_new++;?></td>
                        <?php
                        
                            if(empty($users['profile_img'])){
                                $users_profile = 'default2.png';
                            }else{
                                $users_profile = $users['profile_img'];
                            }
                        ?>
                        <td><img src="<?php echo 'profiles/'.$users_profile;?>" class="item"></td>
                        <td><?php echo $users['username'];?></td>
                        <td><?php echo $users['password'];?></td>
                        <td><?php echo $users['email'];?></td>
                        <td><?php echo $type;?></td>    
                        <td><?php echo $users['created_at'];?></td> 
                        <td ><a href="includes/edit_user.php?edit_user=<?php echo $users['user_id'];?>" class="edit">Edit</a></td>
                        <td ><a href="includes/delete.php?delete=<?php echo $users['user_id'];?>" class="error">Delete</a></td>

                    </tr>
                    <?php endwhile;?>
                </table>
                <!--orders table-->
            <div class="pagination">
                <p class="page">Page: </p>
                    <?php for($page =1;$page<=$number_of_pages;$page++):?>
                        <a href="admin.php?page=<?php echo $page?>"><?php echo $page;?></a>
                <?php endfor;?>
            </div>
                
               
            </div>
            
        </div>
    </div>
    

<?php if(isset($_SESSION['modal-user'])):?>
        <div id="modal">
            Are you sure to delete this user?
                <div id="confirm">
                    <a href="includes/delete.php?delete_user=<?php echo $_SESSION['modal-user'];?>" id="yesBtn">Yes</a>
                    <a href="admin.php" id="noBtn">No</a>
                </div>
        </div>
        <?php unset($_SESSION['modal-user']);?>
   <?php endif ;?>

<?php if(isset($_SESSION['deleted'])):?>
    <div id="deleted-user-modal">
        <p>A user has been deleted</p>
        <a href="admin.php" id="okayBtn" >Ok</a>
    </div>
    <?php unset($_SESSION['deleted']);?>
<?php endif;?>
 <!--Session cant delete user-->
 <?php if(isset($_SESSION['cant_delete_user'])):?>
        <div id="add-modal">
            <p>You can't delete this user. An order has been placed by this user.</p>
            <a href="admin.php" id="okayBtn" >Ok</a>
        </div>
        <?php unset($_SESSION['cant_delete_user']);?>
<?php endif;?>
<!--session for edit update of users-->
    <?php if(isset($_SESSION['edit'])):?>
        <div id="add-modal">
            <p>User's Information <br>has been updated</p>
            <a href="admin.php" id="okayBtn" >Ok</a>
        </div>
        <?php unset($_SESSION['edit']);?>
        <?php unset($_SESSION['save']);?>
    <?php endif;?>

    <script src="js/ckeditor.js"></script>


<?php include('config/footer_admin.php')?>