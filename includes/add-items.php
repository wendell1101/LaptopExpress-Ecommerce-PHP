<?php
   include('../config/db.php');
   session_start();
   


    if(isset($_POST['add_Btn'])){
        unset($_POST['add_Btn']);
        $fileTemp = $_FILES['image']['tmp_name'];
        $fileName = time().'_'.$_FILES['image']['name'];
        $path = '../uploads/'.$fileName;
        
        $moved = move_uploaded_file($fileTemp,$path);
        $item_name = mysqli_real_escape_string($conn,$_POST['item_name']); 
        $details = mysqli_real_escape_string($conn,$_POST['details']); 
        $price = mysqli_real_escape_string($conn,$_POST['price']); 
        $type = mysqli_real_escape_string($conn,$_POST['type']); 
        if($moved){
            $insert = "INSERT INTO items(item_name,image_name,details,price,item_type,release_status) VALUES ('$item_name','$fileName','$details','$price','$type','0')";
            $inserted = mysqli_query($conn,$insert);
            if($inserted){
                $_SESSION['add'] = 'Items has been added to the database';
                header('location:../admin-items.php');
            }
        }else{
            echo'failed to upload in database';
        }

    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/add-items.css">
</head>
<body>
  
    <form action="add-items.php" method="post" id="add-item-form" enctype="multipart/form-data">
    <h1>Add Items Here:</h1>
        <input type="text" name="item_name" placeholder="Item Name"><br>
        <div id="item-input">
            <h3>Choose an Item</h3><br>
            <input type="file" name="image" id="file"> 
        </div><br>
        <h3>Include Item Specs Here:</h3><br> 
        <textarea id="details"name="details"   >
        
        </textarea><br>
        <input type="text" name="price" placeholder="Price"><br>
        <input type="text" name="type" placeholder="Type"><br>
        <div id="box">
            <button type="submit" name="add_Btn" id="addBtn">Add</button>
            <a href="../admin-items.php"class="cancel">Cancel</a> 
        </div>
        
    </form>
    
    <script src="../ckeditor/ckeditor.js">

    CKEDITOR.replace('body');
    </script> 
</body>
</html>
    
  
    

