<?php 
 session_start();
 $email = $_SESSION['email'];
 $donor_id = $_SESSION['user_id'];

 $con = mysqli_connect("localhost","root","","donation_management_system");
 if(mysqli_connect_error()){
    echo" <h1 style = 'color:red ; ' > Database Not Connected </h1>";
 }

 $query1 = "Select * from donor where email = '$email'";
 $result1 = $con -> query($query1);
 $row = $result1 -> fetch_assoc();
 $id = $row['donorID'];
 $fname = $row['firstName'];
 $lname = $row['lastName'];
 $email = $row['email'];
 $password = $row['password'];

 $query2 = "Select * from donor_phone where donorID = '$id'";
 $result2 = $con -> query($query2);
 $row1 = $result2 -> fetch_assoc();
 $fphone = $row1['phone'];

 $row2 = $result2 -> fetch_assoc();
 $sphone = $row2['phone'];

 //collecting total number of donations he made 
 $query_total_donations = "Select SUM(amount) As amount from donations where donorID = $donor_id";
 $result = $con -> query($query_total_donations);
 $row_amount = $result -> fetch_assoc();
 ?> 


<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" rel="stylesheet">

	<title>Display page</title>
  <STYLE>
   .user, .history {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 20px;
        }

        .user i, .history i {
            font-size: 1.8rem;
            color: white;
        }

        .user a, .history a {
            color: white; 
            text-decoration: none;
            font-size: 1.2rem;
        }

        
        .user a:hover, .history a:hover {
            color: #f1c40f;
        }

        
        .side1 {
            position: sticky;
            top: 0;
            height: 100vh;
            background-color: #333;
            padding-top: 20px;
        }
    </style>

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
              <a href="../../index.php">Home</a>
                <a href="../../aboutPage/index.php">About</a>
                <a href="../../donationPage/donation_page.php">Donate</a>
                <a href="../../reviewPage/reviewPage.php">Reviews</a>
                <?php  
                  if (isset($_SESSION['user_id'])){
                   echo "<a style = 'color:white' href='../../profile/Donorpage/index.php'>Profile</a>" ; 
                  }
                
                
                  if (isset($_SESSION['user_id'])){
                    echo "
                    <a class='btn btn-border py-2 px-3 text-primary' href='../../logout.php'>
                      Logout
                      <div class='d-inline-flex bg-white  rounded-circle ms-2 p-1'>
                          <i class='fa fa-arrow-right text-primary'></i>
                      </div>
                  </a>
                  ";
                  }else{
                    echo "
                      <a class='btn btn-border py-2 px-3 text-primary' href='../../login_signup/main.php'>
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
                      <a class='btn btn-border py-2 px-3 text-primary' href='../../../login_signup/main.php'>
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
	
  <div class="side container-fluid gx-0 px-0 ">
  <div class="row gx-0 px-0 w-100  ">
    <!-- Sidebar -->
    <div class="col-lg-2 col-md-3 col-12 side1 d-flex flex-column align-items-center min-vh-100 ">
       <div class="history d-flex align-items-center justify-content-center gap-3 w-100 p-2" style="border-bottom: 2px solid white;">
        <i class="fa-solid fa-user fs-4 text-white " ></i>
        <a href="../Donorpage/index.php" class="fs-6 fw-3 text-white text-decoration-none">Donor</a>
      </div>
       <div class="history d-flex align-items-center justify-content-center gap-3 w-100 p-2" style="border-bottom: 2px solid white;">
        <i class="fa-solid fa-book fs-4 text-white"></i>
        <a href="../Donor-history/index2.php" class="fs-6 fw-3 text-white text-decoration-none">History</a>
      </div>
      <div class="history d-flex align-items-center justify-content-center gap-3 w-100 p-2" style="border-bottom: 2px solid white;">
        <i class="fa-solid fa-message fs-4 text-white"></i>
        <a href="../Donor-review/index2.php" class="fs-6 fw-3 text-white text-decoration-none">Donor Review</a>
      </div>
    </div>

    <!-- Main Content -->
    <div class="col-lg-10 col-md-9 col-12 side2 d-flex flex-column min-vh-100">
      <div class="upper-part d-flex justify-content-between px-4 py-3">
        <?php
        echo "<a href='' class='fs-3 fw-bold text-white text-decoration-none'>$fname $lname</a>";
        echo "<a href='' class='fs-3 fw-bold text-warning text-decoration-none'><span class ='fs-5'>Total Donated Amount : </span>{$row_amount['amount']}</a>";
        ?>
      </div>

      <div class="d-flex justify-content-center w-100">
        <div class="row col-11 lowerpart w-100 ">
          <div class="d-flex gap-3 mt-3">
            <i class="fa-solid fa-user fs-2 text-white"></i>
            <h3 class="text-white fs-5">Donor Details</h3>
          </div>

          <!-- Responsive Tables -->
          <div class="row w-100 mt-3">
            <?php
            echo "
            
          <div class='row'>
                     <div class='col-sm-6 col-12'>
                       <h6 class='mb-1 fs-6' style='color : white;'>First Name</h6><br>
                       <p class='w-100 py-3 px-2 rounded-2 fw-bold' style='background-color:white ; color: black; '> $fname</p>
                     </div>
                     <div class='col-sm-6 col-12'>
                       <h6 class='mb-1 fs-6' style='color : white;'>Last Name</h6><br>
                       <p class='w-100 py-3 px-2 rounded-2 fw-bold' style='background-color:white ; color: black;'>  $lname</p>
                     </div>
          </div>
          <div class='row'>
                     <div class='col-sm-6 col-12'>
                       <h6 class='mb-1 fs-6' style='color : white;'>Email</h6><br>
                       <p class='w-100 py-3 px-2 rounded-2 fw-bold' style='background-color:white ; color: black; '> $email</p>
                     </div>
                     <div class='col-sm-6 col-12'>
                       <h6 class='mb-1 fs-6' style='color : white;'>Password</h6><br>
                       <p class='w-100 py-3 px-2 rounded-2 fw-bold' style='background-color:white ; color: black;'> $password</p>
                     </div>
          </div>
          <div class='row'>
                     <div class='col-sm-6 col-12'>
                       <h6 class='mb-1 fs-6' style='color : white;'>First Phone Number</h6><br>
                       <p class='w-100 py-3 px-2 rounded-2 fw-bold' style='background-color:white ; color: black; '> $fphone</p>
                     </div>
                     <div class='col-sm-6 col-12'>
                       <h6 class='mb-1 fs-6' style='color : white;'>Second Phone Number</h6><br>
                       <p class='w-100 py-3 px-2 rounded-2 fw-bold' style='background-color:white ; color: black; '>  $sphone </p>
                     </div>
          </div>

          <div class='row mt-5'>

             <!-- Update/Delete Buttons -->
      <div class='w-100 gap-3 d-flex justify-content-center align-items-center gx-0 px-0' style='height: 50px;'>
        <button class='py-lg-4 px-lg-4 btn btn-border fw-bold' style='background-color:green; color:white;' onclick='update()'>Update Record</button>
        <button class='py-lg-4 px-lg-4 btn btn-border fw-bold' style='background-color:red; color:white;' onclick='deleteAccount()'>Delete Account</button>
      </div>

         ";
          ?>
      <div class='w-100 gap-3 d-flex justify-content-center align-items-center gx-0 px-0' style='height: 50px;'>

                                 <?php 
                                  if (isset($_SESSION['error'])){
                                      echo "<div class='w-100 py-3 px-3 mb-3 rounded-2 fw-bold text-center' style = 'color:white; background-color:red'>{$_SESSION['error']}</div>";
                                      unset($_SESSION['error']);
                                 }
                            
                                
                                  if (isset($_SESSION['msg']) ){
                                      echo "<div class='w-100 py-3 px-2 mb-3 rounded-2 fw-bold text-center' style = 'color:white; background-color:green'>{$_SESSION['msg']}</div>";
                                      unset($_SESSION['msg']);
                                  }
                                ?>
                              
      </div>
                    
          </div>
               
           
          
          </div>
        </div>
      </div>
    </div>
  </div> 
</div>


   

      <!-- Update Record Modal -->
      <div class="record row gx-0 px-0 align-items-center d-flex justify-content-center" style="position: fixed; top: 0; left: 0; width: 100%; height: 100vh; display: none !important; background-color: rgba(0, 0, 0, 0.5); z-index: 10000;">
        <div class="row gx-0 px-0 d-flex align-items-center justify-content-center" style="position: relative;">
          <div style="position: absolute; top: -10%; font-size: 1.5rem; transform: translateX(80%);">
            <i class="fa-solid fa-x text-white fw-bold" onclick="hide()"></i>
          </div>

          <!-- Form -->
          <form class="col-sm-3 col-8 text-center" style="background-color: azure; height: 300px; border-radius: 10px; padding: 20px;" action="update.php" method="post">
            <label for="data" class="mb-3 fs-5 fw-bold">Select to Update*</label>
            <select name="data" id="data" class="py-3 px-2 rounded-2 fw-bold text-black-50 w-100" required>
              <option value="">Select Data to Update</option>
              <option value="1">First Name</option>
              <option value="2">Second Name</option>
              <option value="3">Email</option>
              <option value="4">Password</option>
              <option value="5">First Phone</option>
              <option value="6">Second Phone</option>
            </select>

            <div id="inner"></div>
            <div class="row d-flex align-items-center justify-content-center">
              <button class="mt-3 py-2 px-5 fw-bold rounded-3 button d-flex align-items-center justify-content-center" name="update_record" type="submit" style="color: #FC8500;">Update Record</button>
            </div>
          </form>
        </div>
      </div>

      <!-- Delete Record Modal -->
      <div class="deleteRecord row gx-0 px-0 align-items-center d-flex justify-content-center" style="position: fixed; top: 0; left: 0; width: 100%; height: 100vh; display: none !important; background-color: rgba(0, 0, 0, 0.5); z-index: 10000;">
        <div class="row gx-0 px-0 d-flex align-items-center justify-content-center" style="position: relative;">
          <div style="position: absolute; top: -10%; font-size: 1.5rem; transform: translateX(80%);">
            <i class="fa-solid fa-x text-white fw-bold" onclick="hide()"></i>
          </div>

          <div class="col-sm-3 col-8 text-center" style="background-color: azure; height: 150px; border-radius: 10px; padding: 20px;">
            <p>Are you sure to delete the record?</p>
            <div class="row d-flex align-items-center justify-content-center">
              <form action="delete.php" method="post">
              <button class="mt-3 py-2 px-5 fw-bold rounded-3 button d-flex align-items-center justify-content-center" name="delete_record"  type="submit" style="color: #ffffff; background-color: red;">Delete Record</button>
              </form>
             
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>


<footer class="container-fluid position-relative ">
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


</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
<script src="script.js"></script>
</html>