 <?php 
 session_start();
 $email = $_SESSION['email'];

 $con = mysqli_connect("localhost","root","","donation_management_system");
 if(mysqli_connect_error()){
    echo" <h1 style = 'color:red ; ' > Database Not Connected </h1>";
 }

 $query1 = "SELECT CONCAT(o.firstName, ' ', o.lastName, ' gets ', do.amount, ' Dollars  at ',do.datte,' from ', d.firstName, ' ', d.lastName ) AS history
FROM donor AS d
JOIN donations AS do ON d.donorID = do.donorID
JOIN organization AS o ON do.organizationID = o.organizationID
where '$email' = o.email order by do.datte ASC" ;
$result1 = $con -> query($query1);
 

?>
 <!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style2.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" rel="stylesheet">

	<title>Display page</title>
	 <style> .user, .history {
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
                <!-- <a href="../../reviewPage/reviewPage.php">Reviews</a> -->
                <?php  
                   if (isset($_SESSION['user_role'])){
                  
                    if (($_SESSION['user_role'] == 1)){
                      echo "<a href='../../reviewPage/reviewPage.php'>Reviews</a>";
                     echo "<a style = 'color:white' href='../../profile/Donorpage/index.php'>Profile</a>" ; 
                    }
                    if (($_SESSION['user_role'] == 2)){
                     echo "<a style = 'color:white' href='../../profile/organizationPage/index.php'>Profile</a>" ; 
                    }
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
              <div class="menu_icon d-lg-none d-flex">
                  <i class="fa-solid fa-bars text-white fw-bold menu_per_icon"></i>
                  <i class="fa-solid fa-x text-white fw-bold hide menu_per_icon"></i>
              </div>
              <div class="menu_resp d-lg-none d-block text-center">
                <a href="../../index.php">Home</a>
                <a href="../../aboutPage/index.php">About</a>
                <a href="../../donationPage/donation_page.php">Donate</a>
                <a href="../../reviewPage/reviewPage.php">Reviews</a>
                <?php  
                  if (isset($_SESSION['user_id'])){
                   echo "<a style = 'color:white' href='../../profile/organizationPage/index.php'>Profile</a>" ; 
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
          </div>
      </nav>
  </div>
	
<div class="side container-fluid gx-0 px-0">
	<div class="row gx-0 px-0">
            <!-- Sidebar -->
       <div class="col-lg-2 col-md-3 col-12 side1 d-flex flex-column align-items-center min-vh-100 ">
       <div class="history d-flex align-items-center justify-content-center gap-3 w-100 p-2" style="border-bottom: 2px solid white;">
        <i class="fa-solid fa-user fs-4 text-white " ></i>
        <a href="../organizationpage/index.php" class="fs-6 fw-3 text-white text-decoration-none">Organization</a>
      </div>
       <div class="history d-flex align-items-center justify-content-center gap-3 w-100 p-2" style="border-bottom: 2px solid white;">
        <i class="fa-solid fa-book fs-4 text-white"></i>
        <a href="../Organization-history/index2.php" class="fs-6 fw-3 text-white text-decoration-none">History</a>
      </div>
      <div class="history d-flex align-items-center justify-content-center gap-3 w-100 p-2" style="border-bottom: 2px solid white;">
        <i class="fa-solid fa-message fs-4 text-white"></i>
        <a href="../Organization-review/index2.php" class="fs-6 fw-3 text-white text-decoration-none">Organization Review</a>
      </div>
    </div>

	  <div class="col-md-10 col-12 side2 ">
		<div class="upper-part d-flex justify-content-between  mx-5 my-5" >
        <!--  <?php
        echo "<a href='' class='fs-3 fw-bold text-white text-decoration-none'>$first_name $last_name</a>";
        echo "<a href='' class='fs-3 fw-bold text-warning text-decoration-none'>324432</a>";
        ?>	 -->	
		</div>

		
<div class="d-flex justify-content-center mx-3 my-5">
    <div class="row col-11 lowerpart">
        <div class="mt-4 mx-3 d-flex gap-3">
            <i class="fa-solid fa-book fs-2 text-white"></i>
            <h3 class="text-white fs-5">History Details</h3><br>
        </div>
        <div class="text-center mt-4">
        <?php
            $count = 1; 
            while($row = $result1->fetch_assoc()){
                // Adjusted font size for better visibility and spacing
                echo "<p class='w-100 py-3 px-2 rounded-2 fw-bold' style='background-color:white ; color: black;'>" . $count . " - " . $row['history'] . "</p>";
                $count += 1;
            }
      
            ?>
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
			<div class="fw-semibold text-white-50 text-sm-start text-center"><i class="fa-solid fa-arrow-right me-2"></i><a href="../index.html" style="text-decoration: none; color: #fbfbfb88;">Home</a></div>
			<div class="fw-semibold text-white-50 text-sm-start text-center"><i class="fa-solid fa-arrow-right me-2"></i><a href="../aboutPage/index.html" style="text-decoration: none; color: #fbfbfb88;">About</a></div>
			<div class="fw-semibold text-white-50 text-sm-start text-center"><i class="fa-solid fa-arrow-right me-2"></i><a href="../donationPage/donation_page.html" style="text-decoration: none; color: #fbfbfb88;">Donate</a></div>
			<div class="fw-semibold text-white-50 text-sm-start text-center"><i class="fa-solid fa-arrow-right me-2"></i><a href="../reviewPage/reviewPage.html" style="text-decoration: none; color: #fbfbfb88;">Review</a></div>
			<div class="fw-semibold text-white-50 text-sm-start text-center"><i class="fa-solid fa-arrow-right me-2"></i><a href="../login_signup/index.html" style="text-decoration: none; color: #fbfbfb88;">SignUp / Login</a></div>
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
</div>

</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
<script src="script.js"></script>
</html>