<?php
session_start();
?>
<!DOCTYPE html>
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
                  if (isset($_SESSION['user_id'])){
                    echo "<a href='../reviewPage/reviewPage.php'>Reviews</a>";
                   echo "<a style = 'color:white' href='../profile/Donorpage/index.php'>Profile</a>" ; 
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
          <img src="img/main.webp" style="object-fit: cover; height: 300px; filter: grayscale(100%) brightness(50%); " class="img-fluid"  >
        </div>
        
        <div class="page_name position-absolute  ">
          <h2 class="fw-bold text-white fs-1">About Us</h2>
          <p class="fw-bold text-white text-center">Home <span style="color: aquamarine;">></span> About Us</p>
        </div>
      </section>   



       <!-- second portion -->
     <section class="container-fluid gx-0 px-1 second_portion ">
        
        <div class="container-fluid gx-0 px-2">
           
            <div  class="row row-cols-lg-2 row-cols-1 d-flex justify-content-center align-items-center py-lg-5 px-5 ">

            <div class=" col mb-5 pics_portion  ">
             <div class="pic1"></div>
             <div class="pic2"></div>
             <div class="pic3 d-flex justify-content-center align-items-center">
            <div class="icon">
                    <i class="fa-solid fa-handshake-angle fs-2"></i>
            </div >
                <div class="content fw-bolder"><p>250+</p>
                <h5 class="content-1 fw-bolder">Services We Provide</h5></div>
            </div>
            </div>

            <div class="col part-2 ">

              <div class="row">
              <p class=" paragraph fw-bold fs-2 text-danger ms-5  ">About us</p>
              <h3 class=" paragraph-2 fw-bolder ms-lg-5 text-center text-sm-start " style="font-family: 'Times New Roman', Times, serif;">Unite For A Cause <br>Change the World</h3>
              </div>
 
              <div class="d-flex justify-content-center align-items-center gap-2 mt-5 button-1 mission_vision_goal">
                <a class="btn btn-outline-danger fw-bolder py-2 px-5"id='mission'>Our Mission</a>
                <a class="btn btn-outline-danger fw-bolder py-2 px-5"id='vision'>Our Vision</a>
                <a class="btn btn-outline-danger fw-bolder py-2 px-5"id='goal'>Our Goal</a>
            </div>
             
              <p class="ms-5 mt-5 fw-bold " id='para'></p>
             
            <div>
                <div class=" d-flex justify-content-center align-items-center py-2 px-2">
                    <div class="d-flex justify-content-center align-items-center gap-3 mt-5 button-1">
                        <a class="btn btn-border py-3 px-lg-4 px-3   text-primary position-absolute scalling_up_down_effect" href="../donationPage/donation_page.php">
                            <span class="fw-bold">Donate Now</span> 
                             <div class="d-inline-flex bg-white  rounded-circle ms-2 px-2 " style="background-color:  rgb(194, 56, 37);">
                                 <i class="fa fa-arrow-right text-primary"></i>
                             </div>
                         </a>
                    </div>
                </div>

            </div>
   
            </div>
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