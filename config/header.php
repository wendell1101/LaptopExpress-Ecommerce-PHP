<?php
    include('config/db.php');
    session_start();
    
    if(empty($_SESSION['username'])){
        array_push($errors,'You must login first to view this page!');
        header('location:login.php');
    }
   
    $username = $_SESSION['username'];
    
    if(isset($_GET['logout'])){
        session_unset();
        session_destroy();
        header('location:login.php');
    }

    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laptop-Express</title>
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <link rel="stylesheet" href="fontawesome/css/fontawesome.css">
    <script src="fontawesome/js/all.min"></script>
    <script src="fontawesome/js/fontawesome.min"></script>
    <script src="js/plugin.js"></script>
    
    <link rel="stylesheet" href="css/swiper.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/items.css">
    
</head>
<body>
    <div id="side-nav">
            <h1 id="close-slide">
                <div class="bar1"></div>
                <div class="bar2"></div>
            </h1>
            <ul id="side-list">
                <li class="active2"><a href="index.php">Home</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li><a href="items.php">Items</a></li>
                <li class="logout"id ><a href="index.php?logout">Logout</a></li>
                <?php if(isset($_SESSION['admin'])):?>
                    <li><a href="admin.php" >Go to Admin</a></li>
                <?php endif;?>
            </ul>    
    </div>

        <!-- Swiper -->
        <header id="nav">
            <h1 id="open-slide">
                <i class="fas fa-bars"></i>
            </h1>
            
            
            <div id="logo-container">
                <a href="index.php"><img src="images/logo.png" alt="logo"></a>
            </div>
            <ul id="list">
                <li class="active"><a href="index.php" >Home</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li><a href="items.php">Items</a></li>
                <?php
                    $select = "SELECT * FROM users";
                    $selected =  mysqli_query($conn,$select);
                    $users = mysqli_fetch_assoc($selected);
                    
                    if(empty($users['username'])){
                        $username = 'Guest';
                    }
                ?>
              
                <?php if(isset($_SESSION['user_profile'])):?>
                    <?php $img = $_SESSION['user_profile'];?>
                <?php endif;?>
                <?php if(empty($_SESSION['user_profile'])):?>
                    <?php $img = '../profiles/default2.png';?>
                <?php endif;?>
                <li class="profile">    
                    <div class="profile_container">
                    <img src="<?php echo 'profiles/'.$img;?>" class="profile_img">
                    <i class="fa fa-caret-down" id="triangle"></i>
                </div>
                    
                 
                </li>
               
               
            </ul> 
            <ul id="child">
                    <li><a href="#">View Profile</a></li>
                    <li><a href="#">Account Settings</a></li>                    
                    <?php if(isset($_SESSION['admin'])):?>
                        <li><a href="admin.php" >Go to Admin</a></li>
                    <?php endif;?>
                    <li class="logout"id ><a href="index.php?logout">Logout</a>
               </ul>       
        </header>