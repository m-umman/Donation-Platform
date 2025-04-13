<?php
    session_start();
    $id = $_SESSION['user_id'];
    $con = mysqli_connect("localhost","root","","donation_management_system");
 $data = $_POST['data'];
 if ($data == '1'){
    $fname = $_POST['fname'];
    $query = "UPDATE organization SET firstName = '$fname' WHERE organizationID = $id";
    $result = $con -> query($query);
    $_SESSION['msg'] = "First Name updated Successfully";
    header("location: index.php");
 }elseif ($data == '2'){
    $sname = $_POST['sname'];
    $query = "UPDATE organization SET lastName = '$sname' WHERE organizationID = $id";
    $result = $con -> query($query);
    $_SESSION['msg'] = "Last Name updated Successfully";
    header("location: index.php");
 }elseif ($data == '3'){
    $email = $_POST['email'];
    //check from donor table
    $query01 = "Select * from organization where email = '$email'";
           $result01 = $con -> query($query01);
           if (($result01->num_rows)>0){
            $_SESSION['error'] = "Sorry! Email Can't be updated because email that yo entered is already taken";
            header("location: index.php");
            exit(); 
           }
    $query = "UPDATE organization SET email = '$email' WHERE organizationID = $id";
    $result = $con -> query($query);

    //updating email in session storage 
    $_SESSION['email'] = $email ; 

    $_SESSION['msg'] = "Email updated Successfully";
    header("location: index.php");
 }elseif ($data == '4'){
    $password = $_POST['password'];
    $query = "UPDATE organization SET `password` = '$password' WHERE organizationID = $id";
    $result = $con -> query($query);
    $_SESSION['msg'] = "Password updated Successfully";
    header("location: index.php");
 }elseif ($data == '5'){
    $fphone = $_POST['fphone'];
    $select_phone_table_id_query = "Select * from organization_phone WHERE organizationID = $id";
    $select_phone_table_id_query_result = $con -> query($select_phone_table_id_query);
    $row1 = $select_phone_table_id_query_result -> fetch_assoc() ;
    $org_phone_id_1 = $row1['organization_phone_id']; 
  
    $query = "UPDATE organization_phone SET phone = '$fphone' WHERE organizationID = $id AND organization_phone_id = $org_phone_id_1 ";
    $result = $con -> query($query);
    $_SESSION['msg'] = "First Phone updated Successfully";
    header("location: index.php");
 }elseif ($data == '6'){
    $sphone= $_POST['sphone'];
    $select_phone_table_id_query = "Select * from organization_phone WHERE organizationID = $id";
    $select_phone_table_id_query_result = $con -> query($select_phone_table_id_query);
    $row1 = $select_phone_table_id_query_result -> fetch_assoc() ;
    $org_phone_id_1 = $row1['organization_phone_id']; 
    $row2 = $select_phone_table_id_query_result -> fetch_assoc() ; 
    $org_phone_id_2 = $row2['organization_phone_id']; 
    $query = "UPDATE organization_phone SET phone = '$sphone' WHERE organizationID = $id AND organization_phone_id = $org_phone_id_2 ";
    $result = $con -> query($query);
    $_SESSION['msg'] = "Second Phone updated Successfully";
    header("location: index.php");
 }
 elseif ($data == '7'){
   $province= $_POST['province'];
   $query = "UPDATE organization SET province = '$province' WHERE organizationID = $id";
   $result = $con -> query($query);
   $_SESSION['msg'] = "Province updated Successfully";
   header("location: index.php");
}
elseif ($data == '8'){
   $city = $_POST['city'];
   $query = "UPDATE organization SET city = '$city' WHERE organizationID = $id";
   $result = $con -> query($query);
   $_SESSION['msg'] = "City updated Successfully";
   header("location: index.php");
}

?>