<?php
include "connection.php";


if (isset($_GET['review_id'])) {
    $review_id = $_GET['review_id'];

   
    $sql1 = "DELETE FROM review WHERE id = $review_id";
    $result1 = $connection->query($sql1);

    if ($result1) {
        $sql = "SELECT id FROM review WHERE id > $review_id";
        $result = $connection->query($sql);

        while ($row = $result->fetch_assoc()) {
            $current_review_id = $row['id'];
              $new_review_id = $current_review_id - 1;
                
           $update_sql = "UPDATE review SET id = $new_review_id WHERE id = $current_review_id";
            $connection->query($update_sql);
        }

        header('Location: index2.php');
    }
      
}
?>
