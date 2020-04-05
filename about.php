<?php include('config/header_about.php');?>    
    <div class="wrapper">
        <div id="about-page">
            <div id="vision-container">
                <span id="title-about" class="vision-title">VISION</span>
                <div id="details" class="vision-details">
                    To become the central producer of technology driven economy in the country that supplies products that is efficient, less expensive and furbished specifications that meets the standards of every customer. We intend the to provide our customers the best experience in and after sales made, thus creating a simultaneous relationship to customers of every kind.
                </div><br>
                <p id="title-location">Location:</p><br>
                <div id="location-container">
                    <a href="https://www.google.com/maps/place/Santo+Tomas,+Batangas/@14.1159083,121.1348327,13z/data=!4m5!3m4!1s0x33bd68b27e517125:0xbf3d5b3b7274628c!8m2!3d14.1262406!4d121.1382576"><img src="images/location.png" alt=""></a>
                </div>

            </div>
            <!---->
            <div id="vision-container">
                <span id="title-about" class="mission-title">MISSION</span>
                <div id="details" class="mission-details">
                        In order to achieve the ultimate goal set by the company, everyone must ensure the following:<br><br>
                    *Provide the best and efficient products with specifications that not only met the standards of the customers but surpass it.<br>
                    *Develop a safe and error-free environment both in the workplace and the products.<br>
                    *Continuous connection with the emerging innovations and changes in trends and in terms with equipment, software and other components that is primary component of the product.<br>
                    *Create a meaningful workplace that envelops satisfaction not only the employees but also the customers.<br>
                    *Collaborate and work with unity among the stakeholders and partner companies.<br>   
                </div>
            </div>
            
        </div>
            
    </div>
    <?php if(isset($_SESSION['admin'])):?>
            <a href="admin.php" class="goAdmin">Go to Admin</a>
        <?php endif;?>   
                
<?php include('config/footer_about.php');?>   
