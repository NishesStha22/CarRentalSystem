<?php
session_start();
include('includes/config.php');
$userid='';
if(isset($_COOKIE['userid'])) {
    $userid=$_COOKIE['userid'];
}
if(isset($_POST['submit_rating'])) {
   //fetch userid from session
    $userid=$_SESSION['id'];
  $vehicle_id = $_POST['vehicle_id'];
  $rating = $_POST['rating'];
echo $_SESSION['fname'];
  $sql2 = "INSERT INTO `tbl_rating` (`userid`, `vehicle_id`, `rating`) VALUES  (:userid,:vehicle_id,:rating)";
  $query = $dbh->prepare($sql2);
  $query->bindParam(':userid',$userid,PDO::PARAM_INT);
  $query->bindParam(':vehicle_id',$vehicle_id,PDO::PARAM_INT);
  $query->bindParam(':rating',$rating,PDO::PARAM_INT);
  $query->execute();
  if($query) {
    echo 'sucess';
    //redirect to the previous page  
    //go back to the previous page
    header('location:'.$_SERVER['HTTP_REFERER']);
  }
  else {
    echo 'fail';
  }
}







?>