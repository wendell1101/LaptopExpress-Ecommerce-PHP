<?php include('config/header_contact.php');?>


    <div class="container">
      <h1 id="title" class="contact-title">Contact Persons</h1>
      <div class="slider-outer">
        <img src="images/arrow-left.png" class="prev" alt="Prev">
        <div class="slider-inner">
          <img src="images/profiles/wendell.png" class="active-img">
          <img src="images/profiles/gelleine.png">
          <img src="images/profiles/reniella.png">
          <img src="images/profiles/salcedo.png">
          <img src="images/profiles/krisan.png">        
        </div>
        
        <div id="details-container" class="active-details">
          <p>Name: Wendell Suazo<br>
            Email: wendellchansuazo11@gmail.com<br>
             City Address: Laguna<br>
            Twitter: @wendell1101<br>
            Github: @wendell1101<br>
        
          </p>
          <h3 class="position">
            BUSINESS OWNER
          </h3>
        </div>
        <div id="details-container" >
          <p class="over">Name: Gelleine B. Mendoza<br>
            Email: gelleinebernabemendoza1@gmail.com<br>
            Contact Number: 09668005303<br>
            City Address: Batangas <br>
            Affiliated Accounts: Twitter @I_UEL_<br>
        
          </p>
          <h3 class="position">
            BUSINESS MANAGER
          </h3>
        </div>
        <div id="details-container" >
          <p>Name: Riniella D. De Leon<br>
            Email: rinielladeleon02@gmail.com<br>
            Contact Number: 09398922491<br>
            City Address: Batangas <br>
            Affiliated Accounts:  Twitter  @ugly_asfck<br>
        
          </p>
          <h3 class="position">
            ASST.MANAGER
          </h3>
        </div>
        <div id="details-container" >
          <p>Name: Mark David N. Salcedo<br>
            Email: bakadesu24@gmail.com <br>
            Contact Number: 09561451021<br>
            City Address: Laguna<br>
            Affiliated Accounts: Twitter @SG_Neeko<br>
        
          </p>
          <h3 class="position">
            PRODUCT CONSULTANT
          </h3>
        </div>
        <div id="details-container" >
          <p>Name: Kris Ann Oruga<br>
            Email: krisannoruga@gmail.com<br>
            Contact Number: 09073466336<br>
            City Address: Batangas <br>
            Affiliated Accounts: Instagram @krisoruga<br>
        
          </p>
          <h3 class="position">
            PRODUCT CONSULTANT
          </h3>
        </div>
     
                 
        <img src="images/arrow-right.png" class="next" alt="Next">
      </div>
    </div>

    <?php if(isset($_SESSION['admin'])):?>
            <a href="admin.php" class="goAdmin">Go to Admin</a>
        <?php endif;?>



<?php include('config/footer_contact.php');?>