<?php
    session_start();
    $id = $_SESSION['user_id'];
  
    $con = mysqli_connect("localhost","root","","donation_management_system");
    
    //deleteing from donor_phone table because this is child table 
    $query1 = "delete from organization_phone where organizationID = $id";
    $result1 = $con -> query($query1);


         //change donation id column in donation table to null. we are not deleting it but removing connection with donor by changing its id to null to showing this donation comes from anonymos user 
         $query2 = "UPDATE donations SET organizationID = NULL WHERE organizationID = $id" ;
         $result2 = $con -> query($query2);
         //  while ($row = $result2->fetch_assoc()){
         //   $row['organizationID'] = NULL ; 
         //  }


         //setting null to org id in review page 
         $query002 = "UPDATE review SET organizationID = NULL WHERE organizationID = $id" ;
         $result002 = $con -> query($query002);
   
          //deleteing from campaign table 
       $query01 = "delete from campaigns_organization where organizationID = $id";
       $result01 = $con -> query($query01);

      

      //deleteing info of donor from donor table
      $query3 = "delete from organization where organizationID = $id";
      $result3 = $con -> query($query3);

    

       //unsetting session varaibles to logout the user by removing email and id from session storage so profile page will not shown to him 
       unset($_SESSION['user_id']);
       unset($_SESSION['email']);
       header("location:../../index.php");




?>