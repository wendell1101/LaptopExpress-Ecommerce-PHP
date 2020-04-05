<?php
    include('../config/db.php');
    session_start();
    $check = "SELECT * FROM users";
    $result = mysqli_query($conn,$check);
    if(isset($_GET['delete'])){
       $_SESSION['modal-user'] = $_GET['delete'];
        header('location:../admin.php');
        exit();
    }
    if(isset($_GET['delete_user'])){
        $id_user = $_GET['delete_user'];
        $_SESSION['deleted'] ='deleted';
        $delete = "DELETE  FROM users WHERE user_id ='$id_user'";
        $deleted = mysqli_query($conn,$delete); 
        if($deleted){
            header('location:../admin.php');
            exit();
        }else{
            $_SESSION['cant_delete_user'] = "user cannot be deleted";
            header('location:../admin.php');
        }
        
    }
    //items delete logic
    if(isset($_GET['confirm'])){
        $_SESSION['modal']=$_GET['confirm'];
        header('location:../admin-items.php');
        exit();
    }

    if(isset($_GET['delete_id'])){
        $ID = $_GET['delete_id'];
        $_SESSION['deleted-modal'] ='deleted';
        $delete = "DELETE  FROM items WHERE item_id ='$ID'";
        $deleted = mysqli_query($conn,$delete);
        if($deleted){
            header('location:../admin-items.php');
            exit();
        }else{
            $_SESSION['cant_delete'] = "Item cannot be deleted";
            header('location:../admin-items.php');
        }
       
    }
    
    if(isset($_GET['delete_order'])){
        $_SESSION['delete_order_table'] = $_GET['delete_order'];
        header('location:../admin-order.php');
      
    }
    if(isset($_GET['delete_order_id'])){
        $order_id = $_GET['delete_order_id'];
        $delete_order = "DELETE FROM orders WHERE order_id = '$order_id'";
        $deleted = mysqli_query($conn,$delete_order);
        if($deleted){
            $_SESSION['show-delete-order'] = "show delete order confirmation";
            header('location:../admin-order.php');
            exit();
        }
    }

?>