<?php 
include('config/header_login.php');
include('config/db.php');
include ('includes/register-logic.php');?>
<?php
    include ('config/db.php');
    $item = "SELECT * FROM items WHERE release_status =1";
    $item_run = mysqli_query($conn,$item);

    if(isset($_GET['display_register'])){
        $_SESSION['display_register'] ='display register modal';
        unset($_SESSION['display_login']);
    }
    if(isset($_GET['display_login'])){
        $_SESSION['display_login'] ='display login modal';
        unset($_SESSION['display_register']);
    }
    if(isset($_GET['close_register'])){
        unset($_SESSION['display_register']);
    }   
    if(isset($_GET['close_login'])){
        unset($_SESSION['display_login']);
    }   
    include ('includes/login-logic.php');
?>




    


        <!--login-form-->
        
        
    
            
    <div class="wrapper">
        <div id="title" class="items-title">
                Available Items
            </div>
            <div id="item-page">     
                <?php while($items = mysqli_fetch_assoc($item_run)):?>
                    <div id="item-container">
                
                        <div  class="box">
                        <a href="<?php echo 'uploads/'.$items['image_name'];?>"> <img src="<?php echo 'uploads/'.$items['image_name'];?>"></a>
                        </div>
                       <a href="login.php?display_register"> <button id="btn-buy" class="btn-buy">
                        Buy Now
                        </button></a>
                        <div class="item-details">
                            <span id ="title"class="item-title"><?php echo $items['item_name'];?></span>
                            <p class="details">
                            <?php echo $items['details'];?>
                            </p>
                            <span id="title" class="price">P<?php echo $items['price'];?></span>
                        </div>   
                    </div>
                <?php endwhile;?>

        <?php if(isset($_SESSION['display_register'])):?>
            <div id="form-bg">
                <form method="post" id="register-form" class="register" enctype="multipart/form-data">
                    <div id="btn-exit"><a href="login.php?close_register">&times;</a></div>
                        <div id="error"><?php
                            
                                foreach($errors as $error){
                                    echo $error.'<br>';
                                }
                        
                            ?></div>
                        
                        <div id="prof">
                        <h3 id="register-title">Register Here</h3>
                            <input type="file" name="image" id="" required>
                        </div>
                        <div id="box1">
                            
                        
                            <label for="username">Username: </label>
                            <input type="text" name="username" value="<?php echo (isset($username))? $username: '';?>">
                        </div>
                        <div id="box1">
                            <label for="email">Email: </label>
                            <input type="text" name="email" value="<?php echo (isset($email))? $email: '';?>">
                        </div>
                        <div id="box1">
                            <label for="password1">Password: </label>
                            <input type="password" name="password1" value="<?php echo (isset($password1))? $password1: '';?>" >
                        </div>
                        <div id="box1">
                            <label for="password2">Confirm-Password: </label>
                            <input type="password" name="password2" value="<?php echo (isset($password2))? '': '';?>">
                        </div>
                        <a href="login.php?display_login"><div id="goToModal">Already a user?</div></a>
                    <button id="btn-register"type="submit" name="register_btn">Register</button>
                    <?php// unset($_SESSION['display_register']);?>
                </form>
            </div>
                
            
        <?php endif;?>

        <?php if(isset($_SESSION['display_login'])):?>
            <form method="post" id="register-form"  class="login-form">
                <div id="btn-exit2"><a href="login.php?close_login">&times;</div></a>
                <h3 id="login-title">Login Here</h3>
                <div id="error">
                <?php
               
                        foreach($error as $errors){
                            echo $errors.'<br>';
                        }
                ?>
                </div>
                    
                <div id="box1">
                    <label for="username1">Username: </label>
                    <input type="text" name="username1" value="<?php echo (isset($username))? $username: '';?>">
                </div>       
                <div id="box1">
                    <label for="password">Password: </label>
                    <input type="password" name="password2" id="">
                </div>        
                <a href="login.php?display_register"><div id="goToModal">Not yet Registered?</div></a>
                <button id="btn-register"type="submit" name="login_btn">Login</button>
                <?php// unset($_SESSION['display_login']);?>
            </form>
           
        <?php endif;?>
       

  
    </div>
    
        

<?php include('config/footer_login.php');?>
   
