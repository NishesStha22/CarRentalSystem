<?php

$con = mysqli_connect("localhost","root","","carrental");
$user = "SELECT * FROM `tblusers` ";
$user_result = $con->query($user);
if ($user_result->num_rows > 0) {
    while ($user_row = $user_result->fetch_assoc()) {
        $username = $user_row['FullName'];
        $id = $user_row['id'];
        $rating = "SELECT * FROM tbl_rating WHERE userid = '$id'";
        $rating_result = $con->query($rating);
        if ($rating_result->num_rows > 0) {
            while ($rating_row = $rating_result->fetch_assoc()) {
                $product_id = $rating_row['vehicle_id'];
                $product = "SELECT * FROM tblvehicles WHERE id = '$product_id'";
                $product_result = $con->query($product);
                if ($product_result->num_rows > 0) {
                    while ($product_row = $product_result->fetch_assoc()) {
                        $r = $product_row["VehiclesTitle"];
                        $datasets[$username][$r] = $rating_row['rating'];
                    }
                }
            }
        }
    }
}

$cars = $datasets;
// print_r($books);

?>