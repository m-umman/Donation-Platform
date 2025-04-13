<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Update Review</title>
</head>
<body>

<?php
include "connection.php";

if (isset($_GET['review_id'])) {
    $review_id = (int) $_GET['review_id'];
   
    
    //getting data from review table where id matches to  fill dropdown of organization 
    $sql = "SELECT * FROM review WHERE id = $review_id";
    $result = $connection->query($sql);
    $row = $result->fetch_assoc();

    //selecting name and id of organization whome user give review 
    $organization_id = $row['organizationID'];
    $sql2 = "SELECT * FROM organization WHERE organizationID = $organization_id";
    $result2 = $connection->query($sql2);
    $row02 = $result2->fetch_assoc();






    
   
    if (isset($_POST['name'], $_POST['lname'], $_POST['review'], $_POST['ngos'])) {
        $first_name = $_POST['name'];
        $last_name = $_POST['lname'];
        $review = $_POST['review'];
        $select_receiver = (int) $_POST['ngos'];

        
        $sql = "UPDATE review SET firstname = '$first_name', lastname = '$last_name', commentt = '$review', organizationID = $select_receiver WHERE id = $review_id";
        $result = $connection->query($sql);

        if ($result) {
            
            header('Location:index2.php');
            exit();
        } else {
            echo "<div class='alert alert-danger' role='alert'>Error updating the review.</div>";
        }
    }
   
} else {
    echo "<div class='alert alert-danger' role='alert'>Review ID not specified.</div>";
    exit();
}

?>

<section class="container-fluid mt-5" style="min-height: 500px;">
    <div class="row d-flex align-items-center justify-content-center mt-5">
        <div class="col-sm-5 col-12 d-flex align-items-center justify-content-center mt-5" style="background-color: #e2ded5;">
            <form class="col-sm-8 col-12 mt-3" style="min-height:600px;" action="update.php?review_id=<?php echo $review_id; ?>" method="post">
                <div class="row mt-3">
                    <label for="name" class="mb-3 fs-6">Your First Name*</label><br>
                    <input type="text" placeholder="First Name...." id="name" name="name" class="w-100 py-3 px-3 rounded-2 fw-bold" value="<?php echo $row['firstname']; ?>" required>
                </div>
                <div class="row mt-3">
                    <label for="lname" class="mb-3 fs-6">Your Last Name*</label><br>
                    <input type="text" placeholder="Last Name...." id="lname" name="lname" class="w-100 py-3 px-2 rounded-2 fw-bold" value="<?php echo $row['lastname']; ?>" required>
                </div>
                <div class="row mt-3">
                    <label for="review" class="mb-3 fs-6">Enter Your Review*</label><br>
                    <textarea name="review" id="review" class="w-100 py-3 px-2 rounded-2 fw-bold" required><?php echo $row['commentt']; ?></textarea>
                </div>

                <div class="row mt-3">
                    <label for="ngos" class="mb-3 fs-6">Select Receiver*</label>
                    <select name="ngos" id="ngos" class="py-3 px-2 rounded-2 fw-bold text-black-50 w-100" required>
                        <?php  
                        echo "<option value='$organization_id'> {$row02['firstName']}  {$row02['lastName']}</option>"; 
             
                        //selecting organization names from database
                        $query1 = "Select * from organization";
                        $result1 = $connection -> query($query1); 
                                      while($row = $result1 -> fetch_assoc()){
                                        if ($row['organizationID'] != $organization_id){
                                        echo "<option value='{$row['organizationID']}'> {$row['firstName']}  {$row['lastName']}</option>";   
                                        }
                                    }
                                    
                        ?>
                    </select>
                </div>

                <button class="row mt-5 p-3 fw-bold w-100 rounded-3 d-flex align-items-center justify-content-center donate_button" type="submit" style="color: white; background-color: #FC8500;">Update</button>
            </form>
        </div>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>

</body>
</html>
