<?php
    include('../config/db.php');
    session_start();
    if(isset($_GET['edit_user'])){
        $id = $_GET['edit_user'];
        $_SESSION['id'] = $id;
        $select = "SELECT * FROM users WHERE user_id ='$id'";
        $selected = mysqli_query($conn,$select);
        $users = mysqli_fetch_assoc($selected);

    }
    if(isset($_POST['update'])){
       
        $username = mysqli_real_escape_string($conn,$_POST['username']);
        $password = mysqli_real_escape_string($conn,$_POST['password']);
        $email = mysqli_real_escape_string($conn,$_POST['email']);
        $user_type = mysqli_real_escape_string($conn,$_POST['user_type']);
        $admin = mysqli_real_escape_string($conn,$_POST['admin']);
        $user = mysqli_real_escape_string($conn,$_POST['user']);
        
        
        $new_id = $_SESSION['id'];
        
        
        $update ="UPDATE users SET username = '$username',password='$password', email = '$email', admin_type ='$user_type' WHERE user_id='$new_id'";
        $updated = mysqli_query($conn,$update);
        if($updated){
            $_SESSION['edit'] = 'edited';
                header('location:../admin.php');
         
            exit();
        }else{
            echo'failed to update item';
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
        <form action="edit_user.php" method="post"  id="edit-container">
        <h2>Edit User Information:</h2>
            <div id="input">
                <label for="name">Username:</label>
                <input type="text" name="username"value="<?php echo $users['username']?>" readonly>
            </div>
            <div id="input">
                <label for="price">Password:</label>
                <input type="text" name="password"value="<?php echo $users['password']?>" readonly>
            </div>
            <div id="input">
                <label for="type">Email:</label>
                <input type="text" name="email"value="<?php echo $users['email']?>" readonly>
            </div>
            <div id="input">
                <label for="type">User Type:</label>
                <select name="user_type" value="<?php echo $users['admin_type']?>">
                    <option value="0" name="user">user</option>
                    <option value="1" name="admin">admin</option>
                </select>
            </div>
            

            <div id="box">
                <button type="submit" name="update">Update</button><br>
               <a href="../admin.php" class="cancel">Cancel</a> 
            </div>
        </form>
    </div>
    <?php if(isset($_SESSION['save'])):?>
            <div id="modal">
            <?php $_SESSION['edit'] = 'edited';?>
                Are you sure you want to save changes?
                    <div id="confirm">
                    <a href="../admin-items.php" id="yesBtn">Yes</a>
                    <a href="" id="noBtn">No</a>
                    </div>
            </div>
            <?php unset($_SESSION['save']);?>
    <?php endif;?>
    
    <script src="../js/jquery-3.4.1.min.js"></script>
    
</body>
</html>