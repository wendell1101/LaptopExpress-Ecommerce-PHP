<?php
   include('../config/db.php');
    $select = "SELECT * FROM items";
    $selected = $conn->prepare($select);
    $selected->execute();
    $records = $selected->get_result()->fetch_all(MYSQLI_ASSOC);


    if(isset($_POST['submit'])){
        unset($_POST['submit']);
        $fileTemp = $_FILES['image']['tmp_name'];
        $fileName = time().'_'.$_FILES['image']['name'];
        $path = '../uploads/'.$fileName;
        $moved = move_uploaded_file($fileTemp,$path);
        if($moved){
            $insert = "INSERT INTO items (image) VALUES ('$fileName')";
            $inserted = mysqli_query($conn,$insert);
            
            echo'file has been uploaded to the database';
            if($inserted){
                header('location:insert-items-logic.php');
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
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="insert-items-logic.php" method="post" enctype="multipart/form-data">
        <input type="file" name="image" id="">
        <button type="submit" name="submit">Upload</button>
    </form>
    <?php foreach($records as $record):?>
    <img src="<?php echo '../upload/'. $record['image'];?>" alt="">
    <?php endforeach;?>
</body>
</html>