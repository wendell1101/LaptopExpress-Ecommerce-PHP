<?php include('config/header.php');?>   
<?php
    include ('config/db.php');
    $item = "SELECT * FROM items WHERE release_status =1";
    $item_run = mysqli_query($conn,$item);
?> 
      
             
                
   
    <div class="swiper-container">
        <!--header-->
        
        <!--swiper-->
            <div class="swiper-title">
                    <h1>Featured Units</h1>
            </div>
        <div class="swiper-wrapper">
        <?php while($items = mysqli_fetch_assoc($item_run)):?>
        <div class="swiper-slide">
            <div class="imgBx">
                <img src="<?php echo 'uploads/'.$items['image_name'];?>">
            </div>
            <div class="details">
                <h3><?php echo $items['item_name'];?><br><span><?php echo $items['item_type'];?></span></h3>
            </div>
            <a href="items.php"><button id="btn-readmore">Readmore</button></a>
        </div>
        <?php endwhile;?>
        </div>
        <!-- Add Pagination -->
        <div class="swiper-pagination"></div>
       
        
    </div>
    <!--main-->
    <div class="wrapper">
                   
            <section id="company-details">
                <h1 id="title" class="company-details-title">Brief Details</h1><br>
                <div class="brief-details">The Laptop Express Inc. was established in January, 2020. The idea of the web application is based on a school project at first. As the product continues to sell, the company puts more effort in maintaining and updating the website for the sake of the customers, to give them the best and high quality Laptop units. The payment is thru cash on delivery. A shipping fee is required for every amount of price exceeding P50. There is a warranty of  1 month for service, and a seven days of replacement if there is a defect on the laptop units.
                </div>
                <a href="about.php"><button class="btn-about">
                    View More
                </button></a>
            </section><br>
            
        
        <!--main end--> 
        <div id="contact-page">
            <a href="contact.php"><h1 id="title" class="contact-title">Our Team</h1></a><br>
                <div id="group-container">
                    <img src="images/profiles/grouppzzzz.png" alt="">
                </div>
                <a href="contact.php"><button class="btn-about" id="btn-contact">
                    View More
                </button></a>
        </div>
        
        <?php include('config/footer.php');?>      
        


