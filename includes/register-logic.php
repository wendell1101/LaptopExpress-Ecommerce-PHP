<?php
    include('config/db.php');
    session_start();
    $errors = array();
    $username;
    $_SESSION['user_id'] =''; 
    if(isset($_POST['register_btn'])){
        unset($_POST['register_btn']);
        $username = mysqli_real_escape_string($conn,$_POST['username']);
        $email = mysqli_real_escape_string($conn,$_POST['email']);
        $password1 = mysqli_real_escape_string($conn,$_POST['password1']);
        $password2 = mysqli_real_escape_string($conn,$_POST['password2']);
      
        $image = $_FILES['image'];
        

        
            if(empty($username)){
                array_push($errors,'Username is required');
            }
            if(empty($email)){
                array_push($errors,'Email is required');
            }
            if(empty($password1)){
                array_push($errors,'Password is required');
            }
            if(empty($password2)){
                array_push($errors,'Confirm Password is required');
            }
            if(empty($image)){
                array_push($errors,'A profile image is required');
            }
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                array_push($errors,'Invalid email format');
            }
            
        
       
        if($password1 != $password2){
            array_push($errors,'Passwords did not match. Please try again');
        }
        $check = "SELECT * FROM users WHERE username = '$username' OR email = '$email' LIMIT 1" ;
        $result = mysqli_query($conn,$check);
        $user = mysqli_fetch_assoc($result);
        if($user){
            if($user['username'] === $username){
                array_push($errors,'A username already exists');
            }
            if($user['email'] === $email){
                array_push($errors,'An email already exists');
            }
        }
        if(count($errors)== 0){
            $password = md5($password1);
            $fileTemp = $_FILES['image']['tmp_name'];
            $fileName = time().'_'.$_FILES['image']['name'];
            $path = 'profiles/'.$fileName;
            
            $moved = move_uploaded_file($fileTemp,$path);
            if($moved){
                $query = "INSERT INTO users (profile_img,username,email,password) VALUES ('$fileName','$username','$email','$password')";
                $inserted = mysqli_query($conn,$query);
                if($inserted){
                    $check = "SELECT * FROM users WHERE username = '$username' OR email = '$email' LIMIT 1" ;
                    $result = mysqli_query($conn,$check);
                    $user = mysqli_fetch_assoc($result);
                    $_SESSION['username'] =  $username;
                    $_SESSION['success'] = 'You are now logged in';
                    $_SESSION['user_id'] = $user['user_id'];
                    $_SESSION['user_profile'] = $user['profile_img'];
                    header('location:index.php');
                }else{
                    array_push($errors,"An error occured, Failed to register");
                }      
            }
              
            
               
        }
       
    }


?>