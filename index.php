<?php
 session_start();
 $con = mysqli_connect("localhost","root","","donation_management_system");
 if(mysqli_connect_error()){
    echo" <h1 style = 'color:red ; ' > Database Not Connected </h1>";
 }
$query = "Select * from campaigns";
$result =  $con -> query($query);
// health
$health = $result -> fetch_assoc();
$h_goal = $health['goal'];
$h_raised = $health['raised'];
$per = ( $h_raised / $h_goal) * 100 ; 
// education
$education = $result -> fetch_assoc();
$e_goal = $education['goal'];
$e_raised = $education['raised'];
$per2 = ( $e_raised / $e_goal) * 100 ; 
// water
$water = $result -> fetch_assoc();
$w_goal = $water['goal'];
$w_raised = $water['raised'];
$per3 = ( $w_raised / $w_goal) * 100 ; 
// blood
$blood = $result -> fetch_assoc();
$b_goal = $water['goal'];
$b_raised = $water['raised'];
$per4 = ( $b_raised / $b_goal) * 100 ; 
// shelter
$shelter = $result -> fetch_assoc();
$s_goal = $water['goal'];
$s_raised = $water['raised'];
$per5 = ( $s_raised / $s_goal) * 100 ; 


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootstrap link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- my own style link  -->
    <link rel="stylesheet" href="style.css">
    <!-- fonts link  -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" rel="stylesheet">
    <title>AUK Charity</title>
  
</head>
<body>
  <section class="container-fluid main p-0">
    <div class="col-12  p-0 color_on_main "></div>
   
    <div class="container-fluid position-absolute top-0">
         <!-- navbar start -->
        <nav class=" pt-3" >

        <div class="row px-lg-4  py-1 mt-1 d-flex align-items-center justify-content-evenly " >
            <h2 class="fw-bold text-white title col-sm-5 nav_resp_title "><span>AUK</span> Charity</h2>
            <div class="menu d-flex gap-3 col-6 align-items-center justify-content-end d-lg-flex d-none">
                <a href="index.php">Home</a>
                <a href="aboutPage/index.php">About</a>
                <a href="donationPage/donation_page.php">Donate</a>
                
                <?php  
                  if (isset($_SESSION['user_role'])){
                  if (($_SESSION['user_role'] == 1)){
                    echo "<a href='reviewPage/reviewPage.php'>Reviews</a>";
                   echo "<a style = 'color:white' href='profile/Donorpage/index.php'>Profile</a>" ; 
                  }
                  if (($_SESSION['user_role'] == 2)){
                   echo "<a style = 'color:white' href='profile/organizationPage/index.php'>Profile</a>" ; 
                  }
                }
                
                
                  if (isset($_SESSION['user_id'])){
                    echo "
                    <a class='btn btn-border py-2 px-3 text-primary' href='logout.php'>
                      Logout
                      <div class='d-inline-flex bg-white  rounded-circle ms-2 p-1'>
                          <i class='fa fa-arrow-right text-primary'></i>
                      </div>
                  </a>
                  ";
                  }else{
                    echo "
                      <a class='btn btn-border py-2 px-3 text-primary' href='login_signup/main.php'>
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
        <a href="index.php">Home</a>
                <a href="aboutPage/index.php">About</a>
                <a href="donationPage/donation_page.php">Donate</a>
                
                <?php  
                
                  if (isset($_SESSION['user_id'])){
                    echo "<a href='reviewPage/reviewPage.php'>Reviews</a>";
                   echo "<a style = 'color:white' href='profile/Donorpage/index.php'>Profile</a>" ; 
                  }
                
                
                  if (isset($_SESSION['user_id'])){
                    echo "
                    <a class='btn btn-border py-2 px-3 text-primary' href='logout.php'>
                      Logout
                      <div class='d-inline-flex bg-white  rounded-circle ms-2 p-1'>
                          <i class='fa fa-arrow-right text-primary'></i>
                      </div>
                  </a>
                  ";
                  }else{
                    echo "
                      <a class='btn btn-border py-2 px-3 text-primary' href='login_signup/main.php'>
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

    
         <!-- navbar end  -->
      
       

        <!--content-->
        <div class="content row row-cols-lg-2 row-cols-sm-2 d-flex align-items-center justify-content-center row-cols-1">
          <div class="col mb-5 ">
            <div class="mb-5" style="height: 50vh;">
              <div class="d-flex align-items-center justify-content-start flex-column px-lg-5 py-2 mt-5">
                <div class="d-flex align-items-center justify-content-start w-100">
                  <h1 class="fw-bold text-white fs-1 text-md-start text-center">Let's Change<br>The World With <span style="color: #FC8500;">Humanity</span>
                  </h1>
                </div>
                <div class="d-flex align-items-center justify-content-start w-100">  
                  <p class="fs-6 text-white-50 text-md-start text-center">Together, we can transform lives—every donation, big or small, brings hope, healing, and opportunity. Join our community of compassion to make a lasting impact today</p>
                </div>   
                     <div class="d-flex align-items-center justify-content-start w-100">
                      <a class="btn btn-border py-2 px-4 text-primary " href="login_signup/main.php">
                        <span class="fw-bold">Join Us</span> 
                         <div class="d-inline-flex bg-white  rounded-circle ms-2 p-2">
                             <i class="fa fa-arrow-right text-primary"></i>
                         </div>
                     </a>
                     </div>
                  <!-- <a class="btn btn-border py-2 px-4 text-primary " href="">
                     <span class="fw-bold">Join Us</span> 
                      <div class="d-inline-flex bg-white  rounded-circle ms-2 p-2">
                          <i class="fa fa-arrow-right text-primary"></i>
                      </div>
                  </a> -->
              </div>
          </div>
    </div>
            <div class="main_moving_img col d-flex align-items-center justify-content-center p-0">
               <div class="row d-flex align-items-center justify-content-center ">
                <div class="d-flex align-items-center justify-content-center col-9 px-0 " >     
                  <img src="img/circulating_image.png" alt="" class="w-100 circular_moving_img">
                  <a class="btn btn-border py-md-2 px-lg-2 px-md-1 px-0   text-primary position-absolute scalling_up_down_effect" href="donationPage/donation_page.php">
                    <span class="fw-bold">Donate Now</span> 
                     <div class="d-inline-flex bg-white  rounded-circle ms-2 px-2 d-sm-inline-block d-none">
                         <i class="fa fa-arrow-right text-primary"></i>
                     </div>
                 </a>
              
            </div>
               </div>
                
            
               

            </div>
      
       
        
    </div>
   


   </div>
    
     
  </section>

  <section class=" container-fluid " style="background-color: #dc821b;">
     <div class="moving_text ">
     <?php 
      $query = "SELECT concat(fname,' ' , lname) as namee , amount FROM donations ORDER BY datte DESC";
      $result = $con -> query($query);
      $row1  = $result -> fetch_assoc();
      $name1 = $row1['namee'];
      $name1 = isset($name1)? $name1 : " " ; 
      $amount1 = $row1['amount'];
      $amount1 = isset($amount1)? $amount1 : " " ;

      $row2  = $result -> fetch_assoc();
      $name2 = $row2['namee'];
      $name2 = isset($name2)? $name2 : " " ; 
      $amount2 = $row2['amount'];
      $amount2 = isset($amount2)? $amount2 : " " ;

      $row3  = $result -> fetch_assoc();
      $name3 = $row3['namee'];
      $name3 = isset($name3)? $name3 : " " ; 
      $amount3 = $row3['amount'];
      $amount3 = isset($amount3)? $amount3 : " " ;
      
 
       echo "           
      <p class='fw-bold text-white '> <b>$name1</b> donates $amount1 dollars   ||   <b> $name2 </b> donates $amount2 dollars  ||   <b> $name3 </b> donates $amount3 dollars </p>
      </div>
      ";         
      ?>
      
  </section>
  
  <section class="container-fluid px-lg-5 py-4 feature_causes d-flex flex-column align-items-center" style="background-color: rgb(241, 247, 247);">
        <p class="py-2 px-2 rounded-pill fw-semibold">Campaigns</p>
        <h1 class="fw-bold text-center">Every Child Deserves <br><span class="px-2">Opportunity To Learn</span></h1>
        <div class="row row-cols-lg-3 row-cols-sm-2 row-cols-1 g-4 d-flex justify-content-evenly mt-5 ">
          <!-- Feature Card 1 -->
          <div class="col">
            <div class="feature_card position-relative d-flex flex-column justify-content-center align-items-center py-4" style="background-color: white;">
                <p class="rounded py-2 px-3 fw-bold position-absolute" style="top: -20px;">Education</p>
                <h4 class="fw-bold mt-1 text-center mb-3">Knowledge for All</h4>
                <h6 class="fw-semibold text-black-50 text-center mb-3 px-3"> Education is the foundation for a brighter future, 
                  yet millions of children are deprived of education.
                   Your donation helps provide scholarships, school supplies, and educational resources to children in need. 
                  </h6>
                <div class="fund_goal  mb-3" style="background-color: rgb(241, 247, 247); width: 90%;">
                <?php
                echo " 
<div class='d-flex justify-content-evenly w-100'>
    <p class='text-dark fw-bold'>$$e_raised <small class='text-body'>Raised</small></p>
    <p class='text-dark fw-bold'>$$e_goal <small class='text-body'>Goal</small></p>
</div>
<div class='progress w-100 mb-5' role='progressbar' aria-label='Basic example' aria-valuenow='$per2' aria-valuemin='0' aria-valuemax='100'>
    <div class='progress-bar' style='width: $per2%;'></div>
</div>";
              ?>
                </div>  
                  <div class="img w-100 mb-4 px-1">
                    <img src="img/save1.avif" alt="" class="img-fluid">
                  </div>

                  <a class="btn btn-border py-2 px-4 text-primary " href="donationPage/donation_page.php">
                    <span class="fw-bold">Donate  Now</span> 
                     <div class="d-inline-flex bg-white  rounded-circle ms-2 p-2"  style="background-color: #FC8500 !important;">
                         <i class="fa fa-arrow-right text-primary"  style="color: #FFFF !important;"></i>
                     </div>
                 </a>      
               
            </div>

          </div>
            
              
            
            <!-- Feature Card 2 -->
            <div class="col">
              <div class="feature_card position-relative d-flex flex-column justify-content-center align-items-center py-4" style="background-color: white;">
                  <p class="rounded py-2 px-3 fw-bold position-absolute" style="top: -20px;">Health</p>
                  <h4 class="fw-bold mt-1 text-center mb-3">Public Health Advancement</h4>
                  <h6 class="fw-semibold text-black-50 text-center mb-3 px-3">Your donation provides life-saving medical care, essential health services, and critical supplies to those in need. Help improve health outcomes and save lives in underserved communities.
                     </h6>
                  <div class="fund_goal  mb-3" style="background-color: rgb(241, 247, 247); width: 90%;">
                  <?php
echo " 
<div class='d-flex justify-content-evenly w-100'>
        <p class='text-dark fw-bold'>$$h_raised <small class='text-body'>Raised</small></p>
    <p class='text-dark fw-bold'>$$h_goal <small class='text-body'>Goal</small></p>
</div>
<div class='progress w-100 mb-5' role='progressbar' aria-label='Basic example' aria-valuenow='$per' aria-valuemin='0' aria-valuemax='100'>
    <div class='progress-bar' style='width: $per%;'></div>
</div>";
?>

                  </div>  
                    <div class="img w-100 mb-4 px-1">
                      <img src="img/save3.avif" alt="" class="img-fluid">
                    </div>
  
                    <a class="btn btn-border py-2 px-4 text-primary " href="donationPage/donation_page.php">
                      <span class="fw-bold">Donate  Now</span> 
                       <div class="d-inline-flex bg-white  rounded-circle ms-2 p-2"  style="background-color: #FC8500 !important;">
                           <i class="fa fa-arrow-right text-primary"  style="color: #FFFF !important;"></i>
                       </div>
                   </a>      
                 
              </div>
  
            </div>
            
            <!-- Feature Card 3 -->
            <div class="col">
              <div class="feature_card position-relative d-flex flex-column justify-content-center align-items-center py-4" style="background-color: white;">
                  <p class="rounded py-2 px-3 fw-bold position-absolute" style="top: -20px;">Water</p>
                  <h4 class="fw-bold mt-1 text-center mb-3">Hydration for Humanity</h4>
                  <h6 class="fw-semibold text-black-50 text-center mb-3 px-3">Through sustainable water projects, awareness campaigns, and partnerships, they aim to combat water scarcity and improve public health. Their mission is to ensure that every person has access to a healthier future.</h6>
                  <div class="fund_goal  mb-3" style="background-color: rgb(241, 247, 247); width: 90%;">
                  <?php
echo " 
<div class='d-flex justify-content-evenly w-100'>
        <p class='text-dark fw-bold'>$$w_raised <small class='text-body'>Raised</small></p>
    <p class='text-dark fw-bold'>$$w_goal <small class='text-body'>Goal</small></p>
</div>
<div class='progress w-100 mb-5' role='progressbar' aria-label='Basic example' aria-valuenow='$per' aria-valuemin='0' aria-valuemax='100'>
    <div class='progress-bar' style='width: $per%;'></div>
</div>";
?>
                  </div>  
                    <div class="img w-100 mb-4 px-1">
                      <img src="img/save2.jpg" alt="" class="img-fluid">
                    </div>
  
                    <a class="btn btn-border py-2 px-4 text-primary " href="donationPage/donation_page.php">
                      <span class="fw-bold">Donate  Now</span> 
                       <div class="d-inline-flex bg-white  rounded-circle ms-2 p-2"  style="background-color: #FC8500 !important;">
                           <i class="fa fa-arrow-right text-primary"  style="color: #FFFF !important;"></i>
                       </div>
                   </a>      
                 
              </div>
  
            </div>

             <!-- Feature Card 4 -->
             <div class="col">
              <div class="feature_card mt-5 position-relative d-flex flex-column justify-content-center align-items-center py-4" style="background-color: white;">
                  <p class="rounded py-2 px-3 fw-bold position-absolute" style="top: -20px;">Blood</p>
                  <h4 class="fw-bold mt-1 text-center mb-3">Emergency Blood Supply</h4>
                  <h6 class="fw-semibold text-black-50 text-center mb-3 px-3">a campaign focused on ensuring a readily available blood supply for critical medical emergencies. It encourages blood donations to save lives and support patients in urgent need</h6>
                  <div class="fund_goal  mb-3" style="background-color: rgb(241, 247, 247); width: 90%;">
                  <?php
echo " 
<div class='d-flex justify-content-evenly w-100'>
        <p class='text-dark fw-bold'>$$b_raised <small class='text-body'>Raised</small></p>
    <p class='text-dark fw-bold'>$$b_goal <small class='text-body'>Goal</small></p>
</div>
<div class='progress w-100 mb-5' role='progressbar' aria-label='Basic example' aria-valuenow='$per4' aria-valuemin='0' aria-valuemax='100'>
    <div class='progress-bar' style='width: $per4%;'></div>
</div>";
?>

                  </div>  
                    <div class="img w-100 mb-4 px-1">
                      <img src="img/save3.avif" alt="" class="img-fluid">
                    </div>
  
                    <a class="btn btn-border py-2 px-4 text-primary " href="donationPage/donation_page.php">
                      <span class="fw-bold">Donate  Now</span> 
                       <div class="d-inline-flex bg-white  rounded-circle ms-2 p-2"  style="background-color: #FC8500 !important;">
                           <i class="fa fa-arrow-right text-primary"  style="color: #FFFF !important;"></i>
                       </div>
                   </a>      
                 
              </div>
  
            </div>

             <!-- Feature Card 5 -->
             <div class="col">
              <div class="feature_card mt-5  position-relative d-flex flex-column justify-content-center align-items-center py-4" style="background-color: white;">
                  <p class="rounded py-2 px-3 fw-bold position-absolute" style="top: -20px;">Shelter</p>
                  <h4 class="fw-bold mt-1 text-center mb-3">Housing Hope</h4>
                  <h6 class="fw-semibold text-black-50 text-center mb-3 px-3"> a campaign dedicated to providing safe and affordable housing for those in need. It aims to support families and individuals by ensuring access to stable homes and essential resources for a better future.</h6>
                  <div class="fund_goal  mb-3" style="background-color: rgb(241, 247, 247); width: 90%;">
                  <?php
echo " 
<div class='d-flex justify-content-evenly w-100'>
        <p class='text-dark fw-bold'>$$s_raised <small class='text-body'>Raised</small></p>
    <p class='text-dark fw-bold'>$$s_goal <small class='text-body'>Goal</small></p>
</div>
<div class='progress w-100 mb-5' role='progressbar' aria-label='Basic example' aria-valuenow='$per5' aria-valuemin='0' aria-valuemax='100'>
    <div class='progress-bar' style='width: $per5%;'></div>
</div>";
?>

                  </div>  
                    <div class="img w-100 mb-4 px-1">
                      <img src="img/save3.avif" alt="" class="img-fluid">
                    </div>
  
                    <a class="btn btn-border py-2 px-4 text-primary " href="donationPage/donation_page.php">
                      <span class="fw-bold">Donate  Now</span> 
                       <div class="d-inline-flex bg-white  rounded-circle ms-2 p-2"  style="background-color: #FC8500 !important;">
                           <i class="fa fa-arrow-right text-primary"  style="color: #FFFF !important;"></i>
                       </div>
                   </a>      
                 
              </div>
  
            </div>
            
            
           </div>
            

           
          
  </section>

  <section class="container-fluid px-lg-5 py-4 what_we_do d-flex flex-column align-items-center" style="background-color: rgb(241, 247, 247);">
        <p class="py-2 px-2 rounded-pill fw-semibold">What We Do</p>
        <h1 class="fw-bold text-center">Learn More What We Do <br><span class="px-2">And Get Involved</span></h1>
        <div class="row row-cols-lg-3 row-cols-sm-2 row-cols-1 g-3 d-flex justify-content-evenly mt-5 ">
          <!-- what we do Card 1 -->
          <div class="col">
            <div class="whatwedo_card px-4 py-2 position-relative d-flex flex-column justify-content-center align-items-center py-4" style="background-color: white;">
              <div class="img w-100 mt-4 mb-3 d-flex align-items-center justify-content-center">
                <img src="img/shelter.jpg" alt="" class=" mb4">
              </div>
              <h3 class="fw-bold mt-1 text-center mb-3">Hunger & Food Security</h3>
                    <h6 class="fw-semibold text-black-50 text-center mb-5">No one should face hunger. Your donation provides shelter and support to needy. Together, we can fight hunger, one meal at a time.your helps feed families, support local farmers and other needy people</h6>
                    <a class="btn btn-border py-2 px-4 text-primary " href="donationPage/donation_page.php">
                      <span class="fw-bold">Donate  Now</span> 
                       <div class="d-inline-flex bg-white  rounded-circle ms-2 p-2"  style="background-color: #FC8500 !important;">
                           <i class="fa fa-arrow-right text-primary"  style="color: #FFFF !important;"></i>
                       </div>
                   </a>      
             
               
            </div>

          </div>
            
              <!-- what we do Card 2 -->
          <div class="col">
            <div class="whatwedo_card px-4 py-2 position-relative d-flex flex-column justify-content-center align-items-center py-4" style="background-color: white;">
              <div class="img w-100 mt-4 mb-3 d-flex align-items-center justify-content-center">
                <img src="img/humanRight.jpg" alt="" class=" mb4">
              </div>
              <h3 class="fw-bold mt-1 text-center mb-3">Human Rights & Justice</h3>
                    <h6 class="fw-semibold text-black-50 text-center mb-5"> Everyone deserves dignity and equality. Your donation supports human rights, fights discrimination, and promotes justice for all, ensuring fairness regardless of race, gender, or background</h6>
                    <a class="btn btn-border py-2 px-4 text-primary " href="donationPage/donation_page.php">
                      <span class="fw-bold">Donate  Now</span> 
                       <div class="d-inline-flex bg-white  rounded-circle ms-2 p-2"  style="background-color: #FC8500 !important;">
                           <i class="fa fa-arrow-right text-primary"  style="color: #FFFF !important;"></i>
                       </div>
                   </a>      
             
               
            </div>

          </div>

            <!-- what we do Card 3 -->
            <div class="col">
              <div class="whatwedo_card px-4 py-2 position-relative d-flex flex-column justify-content-center align-items-center py-4" style="background-color: white;">
                <div class="img w-100 mt-4 mb-3 d-flex align-items-center justify-content-center">
                  <img src="img/elderly.jpg" alt="" class=" mb4">
                </div>
                <h3 class="fw-bold mt-1 text-center mb-3">Elderly Care & Support</h3>
                      <h6 class="fw-semibold text-black-50 text-center mb-5"> Seniors deserve dignity and care. Your donation provides quality care, meals, medical support, and companionship, ensuring they lead fulfilling lives in their later years.
                        </h6>
                      <a class="btn btn-border py-2 px-4 text-primary " href="donationPage/donation_page.php">
                        <span class="fw-bold">Donate  Now</span> 
                         <div class="d-inline-flex bg-white  rounded-circle ms-2 p-2"  style="background-color: #FC8500 !important;">
                             <i class="fa fa-arrow-right text-primary"  style="color: #FFFF !important;"></i>
                         </div>
                     </a>      
               
                 
              </div>
  
            </div>

           
            
           </div>
            

           
          
  </section>

  <section class="container-fluid reveiw_slider d-flex flex-column align-items-center" style="background-color: rgb(241, 247, 247);">
        <p class="py-2 px-2 rounded-pill fw-semibold mt-lg-5">Testimonial</p>
        <h1 class="fw-bold text-center mb-5">Trusted By Thousands Of<br>People And Nonprofits</h1>
        <section class="container-fluid review_slider mb-lg-5">
          <div id="carouselExampleDark" class="carousel carousel-dark slide w-100">
            <!-- <div class="carousel-indicators">
              <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
              <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
              <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div> -->
            <div class="carousel-inner">
              <!-- Slide 1 -->
        
              <!-- <div class="carousel-item active" data-bs-interval="10000" >
                
                <div class=" "  >
                  <div class=" px-4 py-2  py-4 d-flex flex-column justify-content-center align-items-center">
                    
                  

                    <div class="img mt-4 mb-3 d-flex align-items-center justify-content-center" style="width: 30%;">
                        <img src="img/avatar1.png" alt="Child Education" class="img-fluid">
                      </div>
                      <h3 class="fw-bold mt-1 text-center mb-3">Sir Hamza Ali</h3>
                      <h6 class="fw-semibold text-black-50 text-center mb-5 " style="width: 40%;">Great Work and Passionate People<br>I am impressed with the thoughtful design and functionality of this website. The platform effectively facilitates the donation process between donors and organizations, ensuring a seamless experience. The intuitive layout and user-friendly interface reflect the team's attention to detail and understanding of the core requirements. It’s clear that a lot of effort has gone into building a robust, reliable system
                      </h6>
                       <div class="d-flex align-items-center justify-content-center">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                       </div>
                    
                
                  </div>
                </div>
               
              </div> -->
            
              <!-- Slide 2 -->
              <!-- <div class="carousel-item " data-bs-interval="10000" >
                
                <div class="d-flex justify-content-center  "  >
                  <div class=" px-4 py-2  py-4 d-flex flex-column justify-content-center align-items-center">
                    
                  

                    <div class="img mt-4 mb-3 d-flex align-items-center justify-content-center" style="width: 30%;">
                        <img src="img/avatar1.png" alt="Child Education" class="img-fluid">
                      </div>
                      <h3 class="fw-bold mt-1 text-center mb-3">Dr Muhammad Faheem</h3>
                      <h6 class="fw-semibold text-black-50 text-center mb-5 " style="width: 40%;">Great Work and Passionate People<br>A mentor is someone who allows you to see the hope inside yourself.
                        Great work isn’t just about the end result—it’s about the effort, dedication, and care that go into every step of the process.
                         It’s about giving your best, day after day, even when no one is watching<b>"Allah has made every human special and blessed him with a beautiful Brain"  By Dr Muhammad Faheem.
                       .</h6>
                       <div class="d-flex align-items-center justify-content-center">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                       </div>
                    
                
                  </div>
                </div>
               
              </div> -->
                 
              
              
              <!-- Slides -->
<?php
$sql = "SELECT * FROM review";
$result = $con->query($sql);
$flag = true ; 
while ($row = $result->fetch_assoc()) { 
    $first_name = $row['firstname'];
    $last_name = $row['lastname'];
    $comment = $row['commentt'];
    $date = $row['datte'];
    $query00 = "Select CONCAT(firstName , ' ' , lastName) AS name from organization where organizationID =". $row['organizationID'];
    $result00 = $con -> query($query00);
    $row00 = $result00 -> fetch_assoc();
  $org_name = $row00 ['name'];
   
?>
   <?php if ($flag == true){ ?>
    <div class="carousel-item active" data-bs-interval="10000">
        <div class="d-flex justify-content-center">
            <div class="px-4 py-2 py-4 d-flex flex-column justify-content-center align-items-center">
                <div class="img mt-4 mb-3 d-flex align-items-center justify-content-center" style="width: 30%;">
                    <img src="img/avatar1.png" alt="Child Education" class="img-fluid">
                </div>
                <?php echo "<h3 class='fw-bold mt-1 text-center mb-3'>$first_name  $last_name </h3> 
                <h6 class='fw-semibold text-black-50 text-center mb-5' style='width: 40%;'>
                  $comment
                </h6>
                <h6 class='fw-bold mt-1 text-center mb-3'>$date</h6>
                <h6 class='fw-bold mt-1 text-center mb-3'>Given to : " .$org_name. "</h6>
                "; ?>
                <div class="d-flex align-items-center justify-content-center">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                </div>
            </div>
        </div>
    </div>

  <?php  $flag = false ; } else{?>
  
    <div class="carousel-item " data-bs-interval="10000">
        <div class="d-flex justify-content-center">
            <div class="px-4 py-2 py-4 d-flex flex-column justify-content-center align-items-center">
                <div class="img mt-4 mb-3 d-flex align-items-center justify-content-center" style="width: 30%;">
                    <img src="img/avatar1.png" alt="Child Education" class="img-fluid">
                </div>
                <?php echo "<h3 class='fw-bold mt-1 text-center mb-3'>$first_name  $last_name </h3> 
                <h6 class='fw-semibold text-black-50 text-center mb-5' style='width: 40%;'>
                  $comment
                </h6>
                <h6 class='fw-bold mt-1 text-center mb-3'>$date</h6>
                <h6 class='fw-bold mt-1 text-center mb-3'>Given to : " .$org_name. "</h6>
                "; ?>
                <div class="d-flex align-items-center justify-content-center">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                </div>
            </div>
        </div>
    </div>

  <?php } ?>
<?php } ?>


              
        
            </div>  
      
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
        </section>
        
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
                <div class="fw-semibold text-white-50 text-sm-start text-center"><i class="fa-solid fa-arrow-right me-2"></i><a href="index.php" style="text-decoration: none; color: #fbfbfb88;">Home</a></div>
                <div class="fw-semibold text-white-50 text-sm-start text-center"><i class="fa-solid fa-arrow-right me-2"></i><a href="aboutPage/index.php" style="text-decoration: none; color: #fbfbfb88;">About</a></div>
                <div class="fw-semibold text-white-50 text-sm-start text-center"><i class="fa-solid fa-arrow-right me-2"></i><a href="donationPage/donation_page.php" style="text-decoration: none; color: #fbfbfb88;">Donate</a></div>
                <div class="fw-semibold text-white-50 text-sm-start text-center"><i class="fa-solid fa-arrow-right me-2"></i><a href="reviewPage/reviewPage.php" style="text-decoration: none; color: #fbfbfb88;">Review</a></div>
                <div class="fw-semibold text-white-50 text-sm-start text-center"><i class="fa-solid fa-arrow-right me-2"></i><a href="login_signup/main.php" style="text-decoration: none; color: #fbfbfb88;">SignUp / Login</a></div>
            </div>
            <div class="col">
                <h3 class="text-white fw-bold text-sm-start text-center">Quote of the Day</h3>
                <div class="fw-semibold text-white-50 text-sm-start text-center px-3">" Stay happy and help others with what Allah has given you "</div>
            </div>
        </div>
    
        <!-- Copywrite Section -->
        <div class="row mt-4 py-0">
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
