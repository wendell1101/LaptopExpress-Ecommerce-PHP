<?php
    include('config/db.php');
    $user_id = $_SESSION['user_id'];
  
if(isset($_POST['btn_order'])){
        $id = $_SESSION['id'];
        
   
        $errors = array();
        $item_name = mysqli_real_escape_string($conn,$_POST['item_name']);
        $price = mysqli_real_escape_string($conn,$_POST['price']);
        $quantity = mysqli_real_escape_string($conn,$_POST['quantity']);
        $firstname = mysqli_real_escape_string($conn,$_POST['fname']);
        $middlename = mysqli_real_escape_string($conn,$_POST['mname']);
        $lastname = mysqli_real_escape_string($conn,$_POST['lname']);
        $email = mysqli_real_escape_string($conn,$_POST['email']);
        $province = mysqli_real_escape_string($conn,$_POST['province']);
        $city = mysqli_real_escape_string($conn,$_POST['city']);
        $barangay = mysqli_real_escape_string($conn,$_POST['barangay']);
        $street = mysqli_real_escape_string($conn,$_POST['street']);
        $contact_number = mysqli_real_escape_string($conn,$_POST['contact_number']);
        $other_note = mysqli_real_escape_string($conn,$_POST['other_notes']);
        $total_price = $price * $quantity;
        
        if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
            array_push($errors,'Please enter a valid email');
        }
        if(count($errors) == 0 ){
            
           
             $order = "INSERT INTO orders(order_item_name,order_price,quantity,total_price,firstname,middlename,lastname,email,province,city,barangay,streetname,contact_number,other_note,status,item_id,user_id) VALUES('$id','$id','$quantity','$total_price','$firstname','$middlename','$lastname','$email','$province','$city','$barangay','$street','$contact_number','$other_note','0','$id','$user_id')";
             $run_order = mysqli_query($conn,$order);
            
               
           
            if($run_order){
                $last_id = mysqli_insert_id($conn);
                $_SESSION['last_id'] =$last_id;
                $_SESSION['order_success'] ="order success";
                $_SESSION['receipt'] ="receipt";
                header("location:items.php");
                exit();
            }
            

            
             
        
        }
    }


?>