<?php
require_once("./connect.php");
//print_r($_GET);
$sql = "DELETE FROM users WHERE `users`.`id`=$_GET(userId)";
$conn->query($sql);
echo $conn->affected_rows;
if($conn->affected_rows==0){
    header("location:../users_delete.php?deleteUsersId=0");
}
else{
    header("location: ../users_delete.php?deleteUserId=$_GET(userId)");
}
?>
