<?php
session_start();
$donor_id = $_SESSION['user_id'];

$connection = mysqli_connect("localhost", "root", "", "donation_management_system");

if (mysqli_connect_error()) {
    echo "<h1 style='color:red;'>Database Not Connected</h1>";
    exit;
}



if (isset($_REQUEST['name'], $_REQUEST['lname'], $_REQUEST['review'], $_REQUEST['ngos'])) {
    $first_name = $_REQUEST['name'];
    $last_name = $_REQUEST['lname'];
    $review = $_REQUEST['review'];
    $select_receiver = (int) $_REQUEST['ngos'];

    
    // $sql = "SELECT * FROM donor WHERE email = '$email'";
    // $result = $connection->query($sql);
    // if ($result->num_rows > 0) {
    //     $row = $result->fetch_assoc();
    //     $donor_id = $row['donorID']; 
    // } else {
    //     echo "No donor found for this email.";
    //     exit;
    // }

    
    // $sql1 = "SELECT organizationID FROM organization WHERE email='$email'";
    // $result1 = $connection->query($sql1);
    // if ($result1->num_rows > 0) {
    //     $org_row = $result1->fetch_assoc();
    //     $organization_id = $org_row['organizationID'];
    // } else {
    //     echo "No organization found for this email.";
    //     exit;
    // }

   
    $sql1 = "INSERT INTO review 
             VALUES ('','$first_name', '$last_name', '$review',NOW(),$donor_id,$select_receiver)";

    if ($connection->query($sql1)) {
        header('Location: index2.php');
    } else {
        echo "Error inserting review: " . $connection->error;
    }
}

// $sql2 = "SELECT * FROM review";
// $result = $connection->query($sql2);

// if ($result->num_rows > 0) {
//     echo "<table class='table table-bordered table-striped'>
//             <thead>
//                 <tr>
//                     <th>Review ID</th>
//                     <th>First Name</th>
//                     <th>Last Name</th>
//                     <th>Review</th>
//                     <th>Receiver</th>
//                     <th>Date</th>
//                     <th>Donor id</th>
//                     <th>Organization id</th>
//                     <th>Operations</th>
//                 </tr>
//             </thead>
//             <tbody>";

//     while ($row = $result->fetch_assoc()) {
//         echo "<tr>
//                 <td>" . $row['review_id'] . "</td>
//                 <td>" . $row['first_name'] . "</td>
//                 <td>" . $row['last_name'] . "</td>
//                 <td>" . $row['review'] . "</td>
//                 <td>" . $row['select_receiver'] . "</td>
//                 <td>" . $row['created_at'] . "</td>
//                 <td>" . $row['donor_id'] . "</td>
//                 <td>" . $row['organization_id'] . "</td>
//                 <td>
//                  <button class='btn btn-primary btn-sm'>
//                     <a href='update.php?review_id=" . $row['review_id'] . "' style='color: white; text-decoration: none;'>Update</a>
//                  </button>
//                  <button class='btn btn-danger btn-sm'>
//                     <a href='delete.php?review_id=" . $row['review_id'] . "' style='color: white; text-decoration: none;'>Delete</a>
//                  </button>
//                 </td>  
//               </tr>";
//     }

//     echo "</tbody></table>";
// } else {
//     echo "<div class='alert alert-warning' role='alert'>No results found.</div>";
// }

// $connection->close();
// ?>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>

</body>
</html>
