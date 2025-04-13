<?php 
session_start();
if (isset($_SESSION['not_login'])){
    echo "<script> not_login = 1; </script>"; 
    
} 

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
                <a href="../reviewPage/reviewPage.php">Reviews</a>
                <?php
                if (isset($_SESSION['user_role']))  {
                  if (($_SESSION['user_role'] == 1)){
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


    <section class="container-fluid" style="background-color: rgb(248, 244, 244); min-height: 700px;">
        <div class="row d-flex align-items-center justify-content-center">
            <div class="col-10" style="min-height: 700px; margin-top: 10%; margin-bottom: 15%;">
                <div class="row d-flex align-items-center justify-content-center ">
                    <div class="col-md-4 col-12 login" style="background: linear-gradient(to right, #FFFB7D, #85FFBD);
min-height: 700px;" >
                        <div class=" d-flex align-items-center justify-content-center flex-column w-100 col_4_login">
                            <h2 class="fw-bolder text-white text-center mb-2">Welcome Back</h2>
                            <h6  class="fw-bolder text-white text-center mb-4">To Keep Connected with us please login with your personal Info</h6>
                            <div class="d-flex align-items-center justify-content-center w-100 col_4_login_button">
                                <a class="btn btn-border py-2 px-4 text-primary ">
                                  <span class="fw-bold">LOGIN</span> 
                                   <div class="d-inline-flex bg-white  rounded-circle ms-2 p-2">
                                       <i class="fa fa-arrow-right text-primary"></i>
                                   </div>
                               </a>
                               </div>
                        </div>

                        <div class=" d-flex align-items-center justify-content-center flex-column w-100 col_4_signup hide ">
                            <h2 class="fw-bolder text-white text-center mb-2">Hello , Freind!</h2>
                            <h6  class="fw-bolder text-white text-center mb-4">Enter Your Personal Details and Start Your Noble Journey With Us</h6>
                            <div class="d-flex align-items-center justify-content-center w-100 col_4_signup_button">
                                <a class="btn btn-border py-2 px-4 text-primary ">
                                  <span class="fw-bold">SIGN UP</span> 
                                   <div class="d-inline-flex bg-white  rounded-circle ms-2 p-2">
                                       <i class="fa fa-arrow-right text-primary"></i>
                                   </div>
                               </a>
                               </div>
                         </div>

                    </div>
                       
                    
                    <div class="col-md-6 col-12 signUp " style="background-color: rgb(255, 255, 255); min-height: 700px;">
                       <!-- for signup form  -->
                        <div class="d-flex align-items-center justify-content-center flex-column w-100 col_6_signup">
                            <h2 class="fw-bolder text-black text-center">Create Account</h2>
                            <?php 
                                  
                                  if (isset($_SESSION['error']) && isset($_SESSION['not_signup'])){
                                      echo "<div class='w-100 py-3 px-3 mb-3 rounded-2 fw-bold text-center' style = 'color:white; background-color:red'>{$_SESSION['error']}</div>";
                                      unset($_SESSION['error']);
                                      unset($_SESSION['not_signup']);
                                  }
                              ?>
                                <?php 
                                  
                                  if (isset($_SESSION['msg']) && isset($_SESSION['yes_signup'])){
                                      echo "<div class='w-100 py-3 px-2 mb-3 rounded-2 fw-bold text-center' style = 'color:white; background-color:green'>{$_SESSION['msg']}</div>";
                                      unset($_SESSION['msg']);
                                      unset($_SESSION['yes_signup']);
                                  }
                              ?>
                             <form action="index.php" method="post" style="width: 80%;">
                                
                                <input type="text" placeholder="First Name...." id="fname" name="fname"  class="w-100 py-3 px-2 mb-3 rounded-2 fw-bold" required> <br>
                                <input type="text" placeholder="Last Name...." id="lname" name="lname"  class="w-100 py-3 px-2 mb-3 rounded-2 fw-bold" required> <br>
                                <input type="email" placeholder="Email" name="email" class="w-100 py-3 px-2 mb-3 rounded-2 fw-bold" required><br>
                                <input type="password" placeholder="password" name="password" class="w-100 py-3 px-2 mb-3 rounded-2 fw-bold" required><br>
                                <input type="text" placeholder="First Phone Number..." name="fphone" class="w-100 py-3 px-2 mb-3 rounded-2 fw-bold" maxlength="11" pattern="\d{11}" required>
                                <input type="text" placeholder="Second Phone Number..." name="sphone" class="w-100 py-3 px-2 mb-3 rounded-2 fw-bold" maxlength="11" pattern="\d{11}" required>
                                <h6 class="fw-bold mb-3">Select Role</h6>
                                <input type="radio" name="role" id="donor" class="donor_role" value="1"> 
                                <label for="donor" class=" mx-1">Donor</label>
                                <input type="radio" name="role" id="organization" class="organization_role" value="2">
                                <label for="organization"  class=" mx-1 ">Organization</label>
                                 <!-- province and city for organization -->
                                <div class="organization_address hide">
                                 <h6 class="fw-bold mb-3 mt-3">Select Your Province and City</h6>
                                     <label for="province">Select Province:</label>
                                     <input list="provinces" id="province" name="province" placeholder="Select a province" class="w-100 py-3 px-2 mb-3 rounded-2 fw-bold">
                                     <datalist id="provinces">
                                         <option value="Punjab">
                                         <option value="Sindh">
                                         <option value="Khyber Pakhtunkhwa">
                                         <option value="Balochistan">
                                         <option value="Islamabad Capital Territory">
                                         <option value="Azad Jammu and Kashmir">
                                         <option value="Gilgit-Baltistan">
                                     </datalist>
                             
                                    <br>
                             
                                     <label for="city mt-3">Select City:</label>
                                     <input list="cities" id="city" name="city" placeholder="Select a city" class="w-100 py-3 px-2 mb-3 rounded-2 fw-bold">
                                     <datalist id="cities">
                                         <option value="Lahore">
                                         <option value="Karachi">
                                         <option value="Islamabad">
                                         <option value="Peshawar">
                                         <option value="Quetta">
                                         <option value="Rawalpindi">
                                         <option value="Faisalabad">
                                         <option value="Multan">
                                         <option value="Hyderabad">
                                         <option value="Sukkur">
                                     </datalist>
                                     <br>
                                     <label for="campaigns" class="mt-3">Select Campaign:</label>
                                     <input type="checkbox" name="campaigns[]" id="health" value="1">
                                     <label for="health">Health</label>
                                     <input type="checkbox" name="campaigns[]" id="education" value="2">
                                     <label for="education">Education</label>
                                     <input type="checkbox" name="campaigns[]" id="pure_water" value="3">
                                     <label for="pure_water">Pure Water</label>
                                     <input type="checkbox" name="campaigns[]" id="blood" value="4">
                                     <label for="blood">Blood</label>
                                     <input type="checkbox" name="campaigns[]" id="shelter" value="5">
                                     <label for="shelter">Shelter</label>
                                    
                                     
                                     
                         

                                    </div> 


                            
                                     <div class="row d-flex align-items-center justify-content-center ">
                                        <button class=" mt-3 py-2 px-5 fw-bold rounded-3 button d-flex align-items-center justify-content-center " name = "signup" type="submit" style="color: #FC8500;">SIGN UP</button>             
                                    </div>
                        </form>
                        </div>


                        <!-- for login form  -->
                        <div class="d-flex align-items-center justify-content-center flex-column w-100 col_6_login hide">
                            <h2 class="fw-bolder text-black text-center">login In Now</h2>
                             <form action="index.php" method="post" style="width: 80%;">
                                <input type="email" placeholder="Email" name="email" class="w-100 py-3 px-2 mt-3 rounded-2 fw-bold"><br>
                                <input type="password" placeholder="password..." name="password" class="w-100 py-3 px-2 mt-3 rounded-2 fw-bold">
                                <?php 
                                  
                                    if (isset($_SESSION['error']) && isset($_SESSION['not_login'])){
                                        echo "<div class='w-100 py-3 px-2 mt-3 rounded-2 fw-bold' style = 'color:white; background-color:red'>{$_SESSION['error']}</div>";
                                        unset($_SESSION['error']);
                                        unset($_SESSION['not_login']);
                                    }
                                ?>
                                <div class="row d-flex align-items-center justify-content-center ">
                                    <button class=" mt-5 py-2 px-5 fw-bold rounded-3 button d-flex align-items-center justify-content-center " type="submit" name="login" style="color: #FC8500;">LOGIN</button>             
                                </div>
                                
                         
                                
                            </form>
                         
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