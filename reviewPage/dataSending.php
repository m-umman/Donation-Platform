<?php
session_start();
$donor_id = $_SESSION['user_id'];

$connection = mysqli_connect("localhost", "root", "", "donation_management_system");

if (mysqli_connect_error()) {
    echo "<h1 style='color:red;'>Database Not Connected</h1>";
    exit;
}

//selecting first name and last name of donor from database 
$query_selecting_name  = "Select firstName,lastName from donor where donorID = $donor_id";
$result_selecting_name = $connection -> query($query_selecting_name);
$row_selecting_name = $result_selecting_name -> fetch_assoc();
$fname = $row_selecting_name['firstName'];
$lname = $row_selecting_name['lastName'];

if (!empty($_POST['review'] ) && !empty($_POST['ngos'])) {
  
    $review = $_POST['review'];
    //REMOVING SPECIAL CHARACTER BECUASE IT CAUSE ISSUE IN MYSQL DATABASE 
    $review = mysqli_real_escape_string($connection,$review);
    $select_receiver = (int) $_POST['ngos'];
   
    $sql1 = "INSERT INTO review VALUES ('','$fname', '$lname', '$review',NOW(),$donor_id,$select_receiver)";

    if ($connection->query($sql1)) {
        $_SESSION['msg'] = "Review Send Successfully";
       header('location: reviewPage.php');
    } else {
        echo "Error inserting review: " . $connection->error;
    }
}else {
    $_SESSION['error'] = "Fill All the Fields";
    header('location: reviewPage.php');
}


$connection->close();
?>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>

</body>
</html>
