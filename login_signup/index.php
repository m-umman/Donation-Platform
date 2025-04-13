<?php 

 $con = mysqli_connect("localhost","root","","donation_management_system");
 if(mysqli_connect_error()){
    echo" <h1 style = 'color:red ; ' > Database Not Connected </h1>";
 }

 if (isset($_POST['signup'])) {
  session_start();
 
    $firstname = $_POST['fname'];
    $lastname = $_POST['lname'];
    $email = $_POST['email'];
    $password =$_POST['password']; 
    $fphone = $_POST['fphone'];
    $sphone = $_POST['sphone'];
    $role = $_POST['role'];

    
    //checking by fetching through database , email is not already taken by someone in donors and organizations data
    
    //check from donor table
    $query01 = "Select * from donor where email = '$email'";
           $result01 = $con -> query($query01);
           if (($result01->num_rows)>0){
             $_SESSION['not_signup'] = 1;
             $_SESSION['error'] = "Email is already taken";
            header("location: main.php");
            exit(); 
           }
    //check from organization table
           $query02 = "Select * from organization where email = '$email'";
           $result02 = $con -> query($query02);
           if (($result02->num_rows)>0){
             $_SESSION['not_signup'] = 1;
             $_SESSION['error'] = "Email is already taken";
            header("location: main.php");
            exit(); 
           }
        
  //checking by fetching through database are phone numbers not already taken by someone in donor or organization table 
  
        //checking from donor_phone table
    $query03 = "Select * from donor_phone where phone = '$fphone' OR phone = '$sphone'";
    $result01 = $con -> query($query03);
    if (($result01->num_rows)>0){
      $_SESSION['not_signup'] = 1;
      $_SESSION['error'] = "Phone numbers are already taken";
     header("location: main.php");
     exit(); 
    }

    //checking from organization_phone table
    $query04 = "Select * from organization_phone where phone = '$fphone' OR phone = '$sphone'";
    $result01 = $con -> query($query04);
    if (($result01->num_rows)>0){
      $_SESSION['not_signup'] = 1;
      $_SESSION['error'] = "Phone numbers are already taken";
     header("location: main.php");
     exit(); 
    }


    //if user select donor role then we will use donor table for entering data
      if ($role == 1){

      //if email and phone numbers are not already taken and unique now we will enter data in tables
         $query1 = "INSERT INTO donor VALUES ('','$firstname', '$lastname', '$email', '$password')";

    if ($con -> query($query1)){   
    }else {
        echo "data not send successfully";
    }


       //inserting phone number in separate table
       //fetching totall number of rows so that i can give foreign key in donor phone table 
       $query2 = "Select * from donor where email = '$email' ";
       $result = $con -> query($query2);
       $rows = $result -> fetch_assoc();
       $donor_id = $rows['donorID'];

       //if first user then rows will be zero fetch 
       if ($rows == 0 ){
        $rows = 1 ;
       }

       //query to insert data in donor phone table
       $query3 = "INSERT INTO donor_phone VALUES ($donor_id,'$fphone','')";
       if ($con -> query($query3)){
      
         
     }else {
         echo "data not send successfully";
     }

     $query4 = "INSERT INTO donor_phone VALUES ($donor_id,'$sphone','')";
     if ($con -> query($query4)){
       
   }else {
       echo "data not send successfully";
   }

   //now we enter data in tables, now return back to main page with successfuly signed up message using session 
   $_SESSION['yes_signup'] = 1;
   $_SESSION['msg'] = "Congratulations! Signed Up Successfully. Login Now ";
  header("location: main.php");
  exit(); 
  


 }else {
      //if email and phone numbers are not already taken and unique now we will enter data in tables


      $province = $_POST['province'];
      $city = $_POST['city'];
      $campaigns = $_POST['campaigns'];

      $query1 = "INSERT INTO organization VALUES ('','$firstname', '$lastname', '$email', '$password','$province','$city')";

      if ($con -> query($query1)){
        
          
      }else {
          echo "data not send successfully";
      }
  
  
         //inserting phone number in separate table
         //fetching totall number of rows so that i can give foreign key in donor phone table 
         $query2 = "Select * from organization where email = '$email' ";
       $result = $con -> query($query2);
       $rows = $result -> fetch_assoc();
       $org_id = $rows['organizationID'];

          //if first user then rows will be zero fetch 
        if ($rows == 0 ){
        $rows = 1 ;
        }

         //query to insert data in donor phone table
         $query3 = "INSERT INTO organization_phone VALUES ($org_id,'$fphone','')";
         if ($con -> query($query3)){
        
           
       }else {
           echo "data not send successfully";
       }
  
       $query4 = "INSERT INTO organization_phone VALUES ($org_id,'$sphone','')";
       if ($con -> query($query4)){
      
         
     }else {
         echo "data not send successfully";
     }

    //inserting data in compaigns_organization table 
    foreach($campaigns as $camp){
      $query5 = "INSERT INTO campaigns_organization VALUES ('','$camp',$org_id)";
      if ($con -> query($query5)){
      
         
     }else {
         echo "data not send successfully";
     }
    }

  

    //now we enter data in tables successfully, now return back to main page with successfuly signed up message using session 

    $_SESSION['yes_signup'] = 1;
    $_SESSION['msg'] = "Congratulations! Signed Up Successfully. Login Now ";
    header("location: main.php");
    exit(); 

   
    



 }
    


 }


 //checking login credentials
 if (isset($_POST['login'])){
  //checking if user already login or not by camparing session storage 
  session_start();
  if(isset($_SESSION['email']) && $_POST['email'] == $_SESSION['email'] ){
      $_SESSION['not_login'] = 1;
      $_SESSION['error'] = "Already Login with same credentials";
       header("location: main.php");
       exit();

  }else{
    //if user not already login then checking is it present in our database or not 
      $email = $_POST['email'];
      $pass = $_POST['password'];
      $query1 = "Select * from donor where email = '$email' AND password = '$pass'";
      $result = $con -> query($query1) ;
      //if our fetch row is greater then 1 then if condition will execute
      if ($result->num_rows > 0){
         $row = $result -> fetch_assoc();
         $_SESSION['user_id'] = $row['donorID'];
         $_SESSION['email'] = "$email";
         //saving user role
          $_SESSION['user_role'] = 1;

         header("location:../index.php");
         exit();
      }else {
         $query1 = "Select * from organization where email = '$email' AND password = '$pass'";
         $result = $con -> query($query1) ;
         if ($result->num_rows > 0){
         $row = $result -> fetch_assoc();
         $_SESSION['user_id'] = $row['organizationID'];
         $_SESSION['email'] = "$email";
         //saving user role
          $_SESSION['user_role'] = 2;
         header("location:../index.php");
         exit();
         }
         }
        $_SESSION['not_login'] = 1;
        $_SESSION['error'] = "Wrong Email or Password";
        header("location: main.php");
    }

 }

?>