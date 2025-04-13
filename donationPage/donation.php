<?php 
session_start();
$session_email = $_SESSION['email'];
$role =  $_SESSION['user_role'];
if ($role == 2){
  $_SESSION['error'] = "Organizations are not allowed to donate";
  header("location: donation_page.php");
 exit();
}
 $con = mysqli_connect("localhost","root","","donation_management_system");
 if(mysqli_connect_error()){
    echo" <h1 style = 'color:red ; ' > Database Not Connected </h1>";
 }

 $fname = $_POST['name'];
 $lname = $_POST['lname'];
 $email = $_POST['email'];
 $email = trim($email);
 //if user is loged in and use and give donation by using different email we did not allow it because it will cause issue is history page of donor if email is change fr same donor
 if(isset($_SESSION['email'])){
 if ($email != $session_email){
  $_SESSION['error'] = "Use your email with which yo registered";
  header("location: donation_page.php");
 exit();
 }
}
 $receiver = $_POST['receiver']; 
 $custome_amount = $_POST['custome_amount'];
//if it receive null we will change it to zero or if negative we will change it to zero also so improve calculation
if (empty($custome_amount) ||  $custome_amount < 0){
  $custome_amount = 0 ; 
}
 $radio_amount = $_POST['amount'];
 //if it receive null we will change it to zero so improve calculation
 if (empty($_POST['amount'])){
  $radio_amount = 0 ; 
 }
 $total_amount = (int) $radio_amount + (int)$custome_amount ; 
 $total_amount_with_tax = $total_amount + ($total_amount * 0.26) ; 

 //checking is amount empty or not 
 if (empty($total_amount_with_tax)){
  $_SESSION['error'] = "Enter Amount Correctly";
    header("location: donation_page.php");
   exit();
 } 


 if ( $receiver == 'organization'){
   $orgainzation_id = (int) $_POST['organization'];
    
 //sending data in donation table
 if (isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
   $query01 = "INSERT INTO donations VALUES ('', '$fname' , '$lname' , '$email' , NOW() , $total_amount ,  $total_amount_with_tax ,'$receiver', $orgainzation_id , NULL , $user_id )";
   $con -> query($query01);
 }else {
   $query00 = "Select * from donor where email = '$email' " ;
   $result00 = $con -> query($query00);
   if (($result00 -> num_rows) > 0){
      $row = $result00 -> fetch_assoc() ; 
      $user_id = $row['donorID'];
      $query01 = "INSERT INTO donations VALUES ('', '$fname' , '$lname' , '$email' , NOW() , $total_amount ,  $total_amount_with_tax ,'$receiver', $orgainzation_id , NULL , $user_id )";
      $con -> query($query01);
   }else {
      $query01 = "INSERT INTO donations VALUES ('', '$fname' , '$lname' , '$email' , NOW() , $total_amount ,  $total_amount_with_tax ,'$receiver', $orgainzation_id , NULL , NULL )";
      $con -> query($query01);
   }
 
 }
 

$payment_method = $_POST['payment_method'];
$donation_id_query = "select * from donations";
$donation_id_query_result = $con -> query($donation_id_query) ;
$donation_id = $donation_id_query_result -> num_rows ; 
if ($payment_method == 'card'){
   $cname = $_POST['cname'];
   $cnumber = $_POST['cnumber'];
   $cdate = $_POST['cdate'];
   $c_cvc = $_POST['c_cvc'];

   //checking all fields should be not not empty 

   if (empty($cname) || empty($cnumber) || empty($cdate) || empty ($c_cvc)){
    $_SESSION['error'] = "Fill All Card Info Correctly";
    header("location: donation_page.php");
   exit();
   }

   //sending data in payment table 
 $query02 = "INSERT INTO payment VALUES (NULL , NULL , '$cname' , '$cnumber' ,'$cdate' ,'$c_cvc' , '$payment_method', $donation_id)";
 if ($con -> query($query02)){
   $_SESSION['msg'] = "Congratulations! " . $fname . " " . $lname . " you donated successfully";

   header("location: donation_page.php");
   exit();
   
}else {
   echo "data not send successfully";
}
}else {
     $ename = $_POST['ename'];
     $enumber = $_POST['enumber'];

     //checking all fields should be not not empty 

   if (empty($ename) || empty($enumber) ){
    $_SESSION['error'] = "Fill All Easypaisa Info Correctly";
    header("location: donation_page.php");
   exit();
   }

   //sending data in payment table 
 $query02 = "INSERT INTO payment VALUES ( '$enumber','$ename' , NULL , NULL , NULL , NULL ,'$payment_method',$donation_id)";
 if ($con -> query($query02)){
   $_SESSION['msg'] = "Congratulations! " . $fname . " " . $lname . " you donated successfully";
   header("location: donation_page.php");
   exit();
  
}else {
  echo "data not send successfully";
}
}


 }else {
   $campaigns_id =(int) $_POST['campaign'];
    
  
    //sending data in donation table
 if (isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
   $query01 = "INSERT INTO donations VALUES ('', '$fname' , '$lname' , '$email' , NOW() , $total_amount ,  $total_amount_with_tax ,'$receiver',  NULL ,$campaigns_id, $user_id )";
   $con -> query($query01);
 }else {
   $query00 = "Select * from donor where email = '$email' " ;
   $result00 = $con -> query($query00);
   if (($result00 -> num_rows) > 0){
      $row = $result00 -> fetch_assoc() ; 
      $user_id = $row['donorID'];
      $query01 = "INSERT INTO donations VALUES ('', '$fname' , '$lname' , '$email' , NOW() , $total_amount ,  $total_amount_with_tax ,'$receiver',  NULL , $campaigns_id, $user_id )";
      $con -> query($query01);
   }else {
      $query01 = "INSERT INTO donations VALUES ('', '$fname' , '$lname' , '$email' , NOW() , $total_amount ,  $total_amount_with_tax ,'$receiver', NULL ,$campaigns_id, NULL )";
      $con -> query($query01);
   }
 
 }

 
  
  $payment_method = $_POST['payment_method'];
  $donation_id_query = "Select * from donations";
  $donation_id_query_result = $con -> query($donation_id_query) ;
  $donation_id = $donation_id_query_result -> num_rows ; 
  if ($payment_method == 'card'){
     $cname = $_POST['cname'];
     $cnumber = $_POST['cnumber'];
     $cdate = $_POST['cdate'];
     $c_cvc = $_POST['c_cvc'];

        //checking all fields should be not not empty 

   if (empty($cname) || empty($cnumber) || empty($cdate) || empty ($c_cvc)){
    $_SESSION['error'] = "Fill All Card Info Correctly";
    header("location: donation_page.php");
   exit();
   }
  
     //sending data in payment table 
   $query02 = "INSERT INTO payment VALUES (NULL , NULL , '$cname' , '$cnumber' ,'$cdate' ,'$c_cvc','$payment_method',$donation_id)";
   if ($con -> query($query02)){
      $_SESSION['msg'] = "Congratulations! " . $fname . " " . $lname . " you donated successfully";
      header("location: donation_page.php");
      exit();
     
  }else {
     echo "data not send successfully";
  }
  }else {
       $ename = $_POST['ename'];
       $enumber = $_POST['enumber'];

          //checking all fields should be not not empty 

   if (empty($ename) || empty($enumber) ){
    $_SESSION['error'] = "Fill All Easypaisa Info Correctly";
    header("location: donation_page.php");
   exit();
   }

     //sending data in payment table 
   $query02 = "INSERT INTO payment VALUES ( '$enumber','$ename', NULL , NULL , NULL , NULL,'$payment_method', $donation_id)";
   if ($con -> query($query02)){
    //adding donated amount to compaign table for specific compaign 
    $query_adding_amount_in_campaign = "Update campaigns set raised = raised +  $total_amount where c_id = $campaigns_id  ";
    $result_adding_amount_in_campaign = $con -> query($query_adding_amount_in_campaign);
      $_SESSION['msg'] = "Congratulations! " . $fname . " " . $lname . " you donated successfully";
      header("location: donation_page.php");
      exit();
    
  }else {
    echo "data not send successfully";
  }
  }

 }

?>