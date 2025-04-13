<?php
session_start();
 $con = mysqli_connect("localhost","root","","donation_management_system");
 if(mysqli_connect_error()){
    echo" <h1 style = 'color:red ; ' > Database Not Connected </h1>";
 }

 //selecting organization names from database
 $query1 = "Select * from organization";
 $result1 = $con -> query($query1);

  //selecting campaigns names from database
  $query2 = "Select * from campaigns";
  $result2 = $con -> query($query2);



?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" rel="stylesheet">
    <title>AUK Charity</title>
</head>
<body>
       <!-- navbar start -->
       <div class="container-fluid">
      <nav >
          <div class="row align-items-center justify-content-between navbar">
              <h2 class="fw-bold text-white title col-sm-6 col-md-5 nav_resp_title">
                  <span>AUK</span> Charity
              </h2>
              <div class="menu d-flex gap-3 col-sm-6 align-items-center justify-content-end d-lg-flex d-none">
              <a href="../index.php">Home</a>
                <a href="../aboutPage/index.php">About</a>
                <a href="../donationPage/donation_page.php">Donate</a>
                
                <?php  
                  if (isset($_SESSION['user_role'])){
                  
                    if (($_SESSION['user_role'] == 1)){
                      echo "<a href='../reviewPage/reviewPage.php'>Reviews</a>";
                     echo "<a style = 'color:white' href='../profile/Donorpage/index.php'>Profile</a>" ; 
                    }
                    if (($_SESSION['user_role'] == 2)){
                     echo "<a style = 'color:white' href='../profile/organizationPage/index.php'>Profile</a>" ; 
                    }
                  }
                
                
                  if (isset($_SESSION['user_id'])){
                    echo "
                    <a class='btn btn-border py-2 px-3 text-primary' href='../logout.php'>
                      Logout
                      <div class='d-inline-flex bg-white  rounded-circle ms-2 p-1'>
                          <i class='fa fa-arrow-right text-primary'></i>
                      </div>
                  </a>
                  ";
                  }else{
                    echo "
                      <a class='btn btn-border py-2 px-3 text-primary' href='../login_signup/main.php'>
                        Sign Up/ Login
                        <div class='d-inline-flex bg-white  rounded-circle ms-2 p-1'>
                            <i class='fa fa-arrow-right text-primary'></i>
                        </div>
                    </a>
                    ";
                  }
                ?>
              </div>
              <!-- navbar menu for mobiles and tablets  -->
          <div class=" menu_icon d-lg-none d-flex">
            <i class="fa-solid fa-bars text-white fw-bold menu_per_icon" ></i>
            <i class="fa-solid fa-x text-white fw-bold hide menu_per_icon" ></i>
          </div>  
        <div class="menu_resp  align-items-center justify-content-center d-lg-none d-block">
        <a href="../index.php">Home</a>
                <a href="../aboutPage/index.php">About</a>
                <a href="../donationPage/donation_page.php">Donate</a>
                <?php  
                  if (isset($_SESSION['user_role'])){
                  
                    if (($_SESSION['user_role'] == 1)){
                      echo "<a href='../reviewPage/reviewPage.php'>Reviews</a>";
                     echo "<a style = 'color:white' href='../profile/Donorpage/index.php'>Profile</a>" ; 
                    }
                    if (($_SESSION['user_role'] == 2)){
                     echo "<a style = 'color:white' href='../profile/organizationPage/index.php'>Profile</a>" ; 
                    }
                  }
                
                
                  if (isset($_SESSION['user_id'])){
                    echo "
                    <a class='btn btn-border py-2 px-3 text-primary' href='../logout.php'>
                      Logout
                      <div class='d-inline-flex bg-white  rounded-circle ms-2 p-1'>
                          <i class='fa fa-arrow-right text-primary'></i>
                      </div>
                  </a>
                  ";
                  }else{
                    echo "
                      <a class='btn btn-border py-2 px-3 text-primary' href='../login_signup/main.php'>
                        Sign Up/ Login
                        <div class='d-inline-flex bg-white  rounded-circle ms-2 p-1'>
                            <i class='fa fa-arrow-right text-primary'></i>
                        </div>
                    </a>
                    ";
                  }
                ?>
                
      </div>
              
         <!-- navbar menu for mobiles and tablets  -->
          </div>
      </nav>
  </div>
     <!-- navbar end  -->
      


    <section class="container-fluid position-relative d-flex align-items-center justify-content-center gx-0 px-0">
      <div class="row w-100 gx-0">
        <img src="main_section_image.webp" style="object-fit: cover; height: 300px; filter: grayscale(100%) brightness(50%); " class="img-fluid"  >
      </div>
      
      <div class="page_name position-absolute  ">
        <h2 class="fw-bold text-white fs-1">Donation details</h2>
        <p class="fw-bold text-white text-center">Home <span style="color: aquamarine;">></span> Donation details</p>
      </div>
    </section>
        
   
    <section class="container-fluid mt-5 " style="min-height: 1000px; ">
        <div class="row  d-flex align-items-center justify-content-center mt-5">
            <div class="col-sm-8 col-12  d-flex align-items-center justify-content-center mt-5" style=" background-color: #e2ded5;">
                <form class="col-sm-11 col-12" style="min-height:950px ;" action="donation.php" method="post">
                <?php 
                                  
                    if (isset($_SESSION['msg'])){
                        echo "<div class='w-100 py-3 mb-3 rounded-2 fw-bold text-center' style = 'color:white; background-color:green'>{$_SESSION['msg']}</div>";
                        unset($_SESSION['msg']);
                        
                    }
                    if (isset($_SESSION['error'])){
                      echo "<div class='w-100 py-3 mb-3 rounded-2 fw-bold text-center' style = 'color:white; background-color:red'>{$_SESSION['error']}</div>";
                      unset($_SESSION['error']);
                      
                  }
                ?>

                   <h4 class="fw-bold mb-3 mt-5">Select Payment Method</h4>
                   <input type="radio" name="payment_method" id="payment_method1" value="card" required> 
                   <label for="payment_method1" class="fs-5 mx-1">Debit Card</label>
                   <input type="radio" name="payment_method" id="payment_method2" value="easypaisa">
                   <label for="payment_method2"  class="fs-5 mx-1">Easypaisa</label>


                    <!-- debit card and easypaisa account details  -->


                    <div class="cards_details d-flex align-items-center justify-content-center">

                   
                   <div class="row mt-3 pb-3 hide debit_card" style="width: 70%; height: 250px; border: 2px solid white; box-shadow: 10px 10px 20px white;">
                    <h4 class="text-white fw-bold text-center">Debit Card Details</h4>
                    <div class="col">
                        <div class="row">
                            <div class="col-sm-6 col-12">
                              <label for="cname" class="mb-3 fs-6">Cardholder Name*</label><br>
                              <input type="text" placeholder="Cardholder Name...." id="cname" name="cname" class="w-100 py-2 px-2 rounded-2 fw-bold" >
                            </div>
                            <div class="col-sm-6 col-12">
                              <label for="cnumber" class="mb-3 fs-6">Card Number*</label><br>
                              <input type="text" placeholder="Card Number...." id="cnumber" name="cnumber" maxlength="16" pattern="\d{16}" class="w-100 py-2 px-2 rounded-2 fw-bold">
                            </div>
                           </div>  
                           <div class="row">
                            <div class="col-sm-6 col-12">
                              <label for="cdate" class="mb-3 fs-6">Expiration Date*</label><br>
                              <input type="month" placeholder="Expiration Date...." id="cdate" name="cdate" class="w-100 py-2 px-2 rounded-2 fw-bold" >
                            </div>
                            <div class="col-sm-6 col-12">
                              <label for="c_cvc" class="mb-3 fs-6">CVV/CVC Code*</label><br>
                              <input type="text" placeholder="CVV/CVC Code...." id="c_cvc" name="c_cvc" maxlength="3" pattern="\d{3}" class="w-100 py-2 px-2 rounded-2 fw-bold" >
                            </div>
                           </div>        
                    </div>
                   </div>

                   <div class="row mt-3 hide easypaisa" style="width: 70%; height: 250px; border: 2px solid white; box-shadow: 10px 10px 20px white;">
                    <div class="col d-flex  align-items-center justify-content-center flex-column">
                        <h4 class="text-white fw-bold text-center">Easypaisa Details</h4>
                        <div class="row ">
                            <div class="col-sm-6 col-12">
                                <label for="ename" class="mb-3 fs-6">Account Name*</label><br>
                                <input type="text" placeholder="Account Name...." id="ename" name="ename" class="w-100 py-3 px-2 rounded-2 fw-bold">
                              </div>
                              <div class="col-sm-6 col-12">
                                <label for="enumber" class="mb-3 fs-6">Account Number*</label><br>
                                <input type="number" placeholder="Account Number...." id="enumber" name="enumber"  class="w-100 py-3 px-2 rounded-2 fw-bold">
                              </div>  
                        </div>
                    </div>
                   </div>
                </div> 


                    <!-- debit card and easypaisa account details  -->
   
                   <h4 class="fw-bold mb-3 mt-5">Personal Information</h4>
                   <div class="row">
                     <div class="col-sm-6 col-12">
                       <label for="name" class="mb-3 fs-6">Your First Name*</label><br>
                       <input type="text" placeholder="First Name...." id="name" name="name" class="w-100 py-3 px-2 rounded-2 fw-bold" required>
                     </div>
                     <div class="col-sm-6 col-12">
                       <label for="lname" class="mb-3 fs-6">Your Last Name*</label><br>
                       <input type="text" placeholder="Last Name...." id="lname" name="lname"  class="w-100 py-3 px-2 rounded-2 fw-bold" required>
                     </div>
                    </div> 

                    <div class="row mt-5">
                        <div class="col-12">
                          <label for="email" class="mb-3 fs-6">Email*</label><br>
                          <input type="email" placeholder="Email...." id="email" name="email" class="w-100 py-3 px-2 rounded-2 fw-bold" required>
                        </div>
                        
                       </div> 


                   
                     <div class="row mt-5">
                        <div class="col-sm-6 col-12">
                          <label for="number" class="mb-3 fs-6">Enter Donation Amount*</label><br>
                          <input type="number" placeholder="Costume Amount.." id="number" name="custome_amount" class="w-100 py-3 px-2 mt-4 rounded-2 fw-bold custome_amount">
                        </div>
                        <div class="col-sm-6 col-12">
                          <p class="mb-1 fs-6">Select Amount*</p><br>
                          <div class="row row-cols-3 row-cols-lg-3 row-cols-sm-2">
                            <div class="col">
                                <input type="radio" name="amount" id="amount1" class="amount_input" value="300"> 
                                <label for="amount1" class="fs-5  amount_label rounded-3" >300Rs</label>
                            </div>
                            <div class="col">
                                <input type="radio" name="amount" id="amount2" class="amount_input" value="500">
                                <label for="amount2"  class="fs-5  amount_label rounded-3 ">500Rs</label>
                            </div>
                            <div class="col">
                                <input type="radio" name="amount" id="amount3" class="amount_input" value="1000">
                                <label for="amount3"  class="fs-5  amount_label rounded-3  ">1000Rs</label>
                            </div>

                          </div>
                          
                        </div>
                  
   
                   
                  
                   </div>

                   <!-- showing total amount  -->

                   <div class="row">
                            <div class="row">
                            <h4 class="fw-bold mb-3 mt-5">Total Amount : </h4>
                           
                            </div>
                            <div class="row">
                             <div class="col">
                                <h6 id="showing_amount">$</h6>
                             </div>
                            </div>

                        </div>


                           <!-- organization or campaigns selection -->
                        <div class="row">
                            <div class="row">
                            <h4 class="fw-bold mb-3 mt-5">Select Receiver</h4>
                            </div>
                            <div class="row">
                             <div class="col">
                                <input type="radio" name="receiver" id="organization" value="organization" required> 
                                <label for="organization" class="fs-5 mx-1">Organization</label>
                                <input type="radio" name="receiver" id="campaigns" value="campaign" >
                                <label for="campaigns" class="fs-5 mx-1">Campaigns</label>
                             </div>
                            </div>

                        </div>

                           <div class="row row-cols-md-2 row-cols-1 mt-5">
                            <div class="col organization hide">
                                <label for="ngos" class="mb-3 fs-5 me-5">Select Organization*</label>
                                <select name="organization" id="ngos" class="py-3 px-2 rounded-2 fw-bold text-black-50">
                                    <option value="">Organization's Names</option>
                                    <?php    
                                      while($row = $result1 -> fetch_assoc()){
                                        echo "<option value='$row[organizationID]'> {$row['firstName']}  {$row['lastName']}</option>";   
                                    }
                                    
                                    ?>
                                    <!-- <option value="Sukat_Khanum">Sukat Khanum</option>
                                    <option value="Edhi_Center_1">Edhi Center</option>
                                    <option value="Edhi_Center_2">Edhi Center</option>
                                    <option value="Edhi_Center_3">Edhi Center</option> -->
                                </select>
                            </div>
                            <div class="col campaigns hide">
                                <label for="ngos" class="mb-3 fs-5 me-5">Select Campaign*</label>
                                <select name="campaign" id="ngos" class="py-3 px-2 rounded-2 fw-bold text-black-50" >
                                    <option value="">Campaign's Names</option>
                                    <?php    
                                      while($row = $result2 -> fetch_assoc()){
                                        echo "<option value='$row[c_ID]'> {$row['name']}</option>";   
                                    }
                                    
                                    ?>
                                    <!-- <option value="Sukat_Khanum">Hunger</option>
                                    <option value="Edhi_Center_1">Pure Water</option>
                                    <option value="Edhi_Center_2">Free Clothes</option>
                                    <option value="Edhi_Center_3">Safety</option> -->
                                </select>
                            </div>
                     
                            
    
                        </div>
    
                        <!-- companies or ngos selection -->

         
                    <button class="row mt-5 p-3 fw-bold w-100 rounded-3 d-flex align-items-center justify-content-center donate_button" type="submit" style="color: white; background-color: #FC8500;">DONATE NOW</button>        
               </form>

            </div>
           
        </div>

    </section>



    <footer class="container-fluid position-relative mt-5">
        <div class="row row-cols-lg-4 row-cols-md-2 row-cols-1 px-lg-3 pt-5 g-3">
            <div class="col">
                <h2 class="fw-bold text-white title text-sm-start text-center"><span>AUK</span> Charity</h2>
                <p class="fs-5 text-white-50 text-sm-start text-center">"Join Us in Creating Lasting Change."<br>Our mission is simple:to make the world a better place by empowering those who need it most.</p>
                <div class="d-flex pt-2 justify-content-sm-start justify-content-center align-items-center">
                    <a class="btn btn-square me-1 text-white border" href=""><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-square me-1 text-white border" href=""><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-square me-1 text-white border" href=""><i class="fab fa-youtube"></i></a>
                    <a class="btn btn-square me-0 text-white border" href=""><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
            <div class="col px-lg-4">
                <h3 class="text-white fw-bold text-sm-start text-center">Address</h3>
                <div class="fw-semibold text-white-50 text-sm-start text-center "><i class="fa fa-map-marker-alt me-3"></i>Gift University</div>
                <div class="fw-semibold text-white-50 text-sm-start text-center"><i class="fa fa-phone-alt me-3"></i>03269889744</div>
                <div class="fw-semibold text-white-50 text-sm-start text-center"><i class="fa fa-envelope me-3"></i>umman@gmail.com</div>
            </div>
            <div class="col">
                <h3 class="text-white fw-bold text-sm-start text-center">Quick Links</h3>
                <div class="fw-semibold text-white-50 text-sm-start text-center"><i class="fa-solid fa-arrow-right me-2"></i><a href="../index.php" style="text-decoration: none; color: #fbfbfb88;">Home</a></div>
                <div class="fw-semibold text-white-50 text-sm-start text-center"><i class="fa-solid fa-arrow-right me-2"></i><a href="../aboutPage/index.php" style="text-decoration: none; color: #fbfbfb88;">About</a></div>
                <div class="fw-semibold text-white-50 text-sm-start text-center"><i class="fa-solid fa-arrow-right me-2"></i><a href="../donationPage/donation_page.php" style="text-decoration: none; color: #fbfbfb88;">Donate</a></div>
                <div class="fw-semibold text-white-50 text-sm-start text-center"><i class="fa-solid fa-arrow-right me-2"></i><a href="../reviewPage/reviewPage.php" style="text-decoration: none; color: #fbfbfb88;">Review</a></div>
                <div class="fw-semibold text-white-50 text-sm-start text-center"><i class="fa-solid fa-arrow-right me-2"></i><a href="../login_signup/main.php" style="text-decoration: none; color: #fbfbfb88;">SignUp / Login</a></div>
            </div>
            <div class="col">
                <h3 class="text-white fw-bold text-sm-start text-center">Quote of the Day</h3>
                <div class="fw-semibold text-white-50 text-sm-start text-center px-3">" Stay happy and help others with what Allah has given you "</div>
            </div>
        </div>
    
        <!-- Copywrite Section -->
        <div class="row mt-4 py-0 bottom-0">
            <div class="col-12 py-0">
                <div class="copywrite d-flex flex-column flex-md-row justify-content-between align-items-end text-center text-md-start p-0">
                    <p>
                        <span class="fw-bold" style="color: #F8F8F9;"><span class="text-white-50">@ </span>AUK CHARITY,</span>
                        <span class="text-white-50">All Rights Reserved.</span>
                    </p>
                    <p>
                        <span class="text-white-50">Designed By</span>
                        <span class="fw-bold" style="color: #F8F8F9;">UN Production</span>
                    </p>
                </div>
            </div>
        </div>
  </footer>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
    <script src="script.js"></script>
</body>
</html>