<?php
    include('../config/db.php');
    session_start();
    if(isset($_GET['edit'])){
        $id = $_GET['edit'];
        $_SESSION['id'] = $id;
        $select = "SELECT * FROM items WHERE item_id ='$id'";
        $selected = mysqli_query($conn,$select);
        $items = mysqli_fetch_assoc($selected);
        $_SESSION['image'] = $items['image_name'];
   
    }
    if(isset($_POST['update'])){
       
        $item_name = mysqli_real_escape_string($conn,$_POST['item_name']);
        $details = mysqli_real_escape_string($conn,$_POST['details']);
        $price = mysqli_real_escape_string($conn,$_POST['price']);
        $type = mysqli_real_escape_string($conn,$_POST['type']);
        
        $new_id = $_SESSION['id'];
        if(isset($_POST['release'])){
            $release_status =1;
        }else{
            $release_status = 0;
        }
        
        $fileName = $_FILES['image'] ['name'];
        $fileTempName = $_FILES['image']['tmp_name'];
        $path = '../uploads/'.$fileName;
        $moved = move_uploaded_file($fileTempName,$path);
        
        
        $update ="UPDATE items SET item_name = '$item_name',image_name='$fileName', details = '$details', price ='$price', item_type = '$type',release_status ='$release_status' WHERE item_id='$new_id'";
        $updated = mysqli_query($conn,$update);
        if($updated){
            $_SESSION['edit'] = 'edited';
                header('location:../admin-items.php');
         
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
        <form action="edit.php" method="post" enctype="multipart/form-data" id="edit-container">
        <h2>Edit Items:</h2>
            <div id="item-image-container">
                <img src="<?php echo '../uploads/'.$items['image_name'];?>">
            </div>
            <input type="file" name="image" value="<?php echo $items['image_name'];?>">
        
            <div id="input">
                <label for="name">Item-name:</label>
                <input type="text" name="item_name"value="<?php echo $items['item_name']?>" >
            </div>
            <textarea name="details" id="" cols="30" rows="10" ><?php echo $items['details']?></textarea>
            <div id="input">
                <label for="price">Price:</label>
                <input type="text" name="price"value="<?php echo $items['price']?>" >
            </div>
            <div id="input">
                <label for="type">Type:</label>
                <input type="text" name="type"value="<?php echo $items['item_type']?>" >
            </div>
            <div id="release-box">
                <label for="type">Release?</label>
                <input type="checkbox" class="release"name="release" value="<?php echo $items['release_status'];?>"> 
            </div>
               
            

            <div id="box">
                <button type="submit" name="update">Update</button><br>
               <a href="../admin-items.php" class="cancel">Cancel</a> 
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