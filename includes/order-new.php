<?php 
include('../config/db.php');
session_start();
    if(isset($_GET['order_id'])){
        $_SESSION['display_order'] ='display order modal';
        $order_id = $_GET['order_id'];

        $select = "SELECT i.*, o.* FROM items as i JOIN orders as o ON o.item_id = i.item_id";
        $run_select = mysqli_query($conn,$select);
        $orders = mysqli_fetch_assoc($run_select);
        echo print_r($run_select);
        
    }
    

?>