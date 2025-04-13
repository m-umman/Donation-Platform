<?php
    session_start();
    $donor_id = $_SESSION['user_id'];
  
    $con = mysqli_connect("localhost","root","","donation_management_system");
 $data = $_POST['data'];
 if ($data == '1'){
    $fname = $_POST['fname'];
    $query = "UPDATE donor SET firstName = '$fname' WHERE donorID = $donor_id";
    $result = $con -> query($query);
    $_SESSION['msg'] = "First Name updated Successfully";
    header("location: index.php");
 }elseif ($data == '2'){
    $sname = $_POST['sname'];
    $query = "UPDATE donor SET lastName = '$sname' WHERE donorID = $donor_id";
    $result = $con -> query($query);
    $_SESSION['msg'] = "Last Name updated Successfully";
    header("location: index.php");
 }elseif ($data == '3'){
    $email = $_POST['email'];
    //check from donor table
    $query01 = "Select * from donor where email = '$email'";
           $result01 = $con -> query($query01);
           if (($result01->num_rows)>0){
            $_SESSION['error'] = "Sorry! Email Can't be updated because email that yo entered is already taken";
            header("location: index.php");
            exit(); 
           }
    $query = "UPDATE donor SET email = '$email' WHERE donorID = $donor_id";
    $result = $con -> query($query);

    //updating email in session storage 
    $_SESSION['email'] = $email ; 

    $_SESSION['msg'] = "Email updated Successfully";
    header("location: index.php");
 }elseif ($data == '4'){
    $password = $_POST['password'];
    $query = "UPDATE donor SET `password` = '$password' WHERE donorID = $donor_id";
    $result = $con -> query($query);
    $_SESSION['msg'] = "Password updated Successfully";
    header("location: index.php");
 }elseif ($data == '5'){
    $fphone = $_POST['fphone'];
    $select_phone_table_id_query = "Select * from donor_phone WHERE donorID = $donor_id";
    $select_phone_table_id_query_result = $con -> query($select_phone_table_id_query);
    $row1 = $select_phone_table_id_query_result -> fetch_assoc() ;
    $donor_phone_id_1 = $row1['donor_phone_id']; 
  
    $query = "UPDATE donor_phone SET phone = '$fphone' WHERE donorID = $donor_id AND donor_phone_id = $donor_phone_id_1 ";
    $result = $con -> query($query);
    $_SESSION['msg'] = "First Phone updated Successfully";
    header("location: index.php");
 }elseif ($data == '6'){
    $sphone= $_POST['sphone'];
    $select_phone_table_id_query = "Select * from donor_phone WHERE donorID = $donor_id";
    $select_phone_table_id_query_result = $con -> query($select_phone_table_id_query);
    $row1 = $select_phone_table_id_query_result -> fetch_assoc() ;
    $donor_phone_id_1 = $row1['donor_phone_id']; 
    $row2 = $select_phone_table_id_query_result -> fetch_assoc() ; 
    $donor_phone_id_2 = $row2['donor_phone_id']; 
    $query = "UPDATE donor_phone SET phone = '$sphone' WHERE donorID = $donor_id AND donor_phone_id = $donor_phone_id_2 ";
    echo $donor_phone_id_1 ." " . $donor_phone_id_1 ;
    $result = $con -> query($query);
    $_SESSION['msg'] = "Second Phone updated Successfully";
    header("location: index.php");
 }

?>