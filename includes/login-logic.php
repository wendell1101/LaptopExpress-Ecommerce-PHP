<?php
    include('config/db.php');
    
    $error = array();
    
    //login
    if(isset($_POST['login_btn'])){
        unset($_POST['login_btn']);
        $username =  mysqli_real_escape_string($conn,$_POST['username1']);
        $password1 =  mysqli_real_escape_string($conn,$_POST['password2']);
            if(empty($username)){
                array_push($error,'A username is required');
            }
            if(empty($password1)){
                array_push($error,'A password is required');
            }
            if(count($error)==0){
                $password = md5($password1);
            $check = "SELECT * FROM users WHERE username = '$username' AND password='$password AND admin_type ='1'";
            $result = mysqli_query($conn,$check);            
                $select = "SELECT * FROM users WHERE username = '$username' AND password='$password'" ;
                $selected = mysqli_query($conn,$select);
                $users = mysqli_fetch_assoc($selected);
                if(mysqli_num_rows($selected)){               
                        
                        if(mysqli_num_rows($selected)&& $users['admin_type']==0){   
                            $_SESSION['username'] =  $username;
                            $_SESSION['success'] = 'You are now logged in';
                            $_SESSION['user_id'] = $users['user_id'];
                            $_SESSION['user_profile'] = $users['profile_img'];
                            header('location:index.php');
                         }else{
                            array_push($error,'A username or password is incorrect.');
                         }     
                         //admin
                         if(mysqli_num_rows($selected)&& $users['admin_type']==1){   
                            
                        $_SESSION['username'] = $username;
                        $_SESSION['admin'] =1;
                        $_SESSION['user_id'] = $users['user_id'];
                        $_SESSION['user_profile'] = $users['profile_img'];
                        header('location:admin.php');
                         }else{
                            array_push($error,'A username or password is incorrect.');
                         }      
                }else{
                    array_push($error,'A username or password is incorrect');
                }
            
           

        }
    }
        
    
?>