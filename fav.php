<?php 

$con = mysqli_connect('localhost','root','','carrental');

if(isset($_POST['add_fav'])){
    $id = $_POST['id'];
    $email = $_POST['email'];
    $sql = "INSERT INTO `fav`(`car`, `email`) VALUES ('$id','$email')";
    if($con->query($sql)){
        echo 'sucess';
    }

}
else if(isset($_POST['rem_fav'])
){
    $id = $_POST['id'];
    $email = $_POST['email'];

    $sql = "DELETE FROM `fav` WHERE car='$id' AND email='$email' ";
    if($con->query($sql)){
        echo 'sucess';
    }

}



?>