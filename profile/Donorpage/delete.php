<?php
    session_start();
    $donor_id = $_SESSION['user_id'];
  
    $con = mysqli_connect("localhost","root","","donation_management_system");
    
    //deleteing from donor_phone table because this is child table 
    $query1 = "delete from donor_phone where donorID = $donor_id";
    $result1 = $con -> query($query1);


     //change donation id column in donation table to null. we are not deleting it but removing connection with donor by changing its id to null to showing this donation comes from anonymos user 
     $query2 = "UPDATE donations SET donorID = NULL WHERE donorID = $donor_id" ;

     $result2 = $con -> query($query2);
     //  while ($row = $result2->fetch_assoc()){
     //   $row['donorID'] = NULL ; 
     //  }


     //SETTING NULL TO DONORID IN REVEIEW TABLE
     $query002 = "delete from review WHERE donorID = $donor_id" ;

     $result002 = $con -> query($query002);

      //deleteing info of donor from donor table
      $query3 = "delete from donor where donorID = $donor_id";
      $result3 = $con -> query($query3);

    

       //unsetting session varaibles to logout the user by removing email and id from session storage so profile page will not shown to him 
       unset($_SESSION['user_id']);
       unset($_SESSION['email']);
       header("location:../../index.php");




?>