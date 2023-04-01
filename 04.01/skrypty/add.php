<?php
 //echo "$_POST[firstName]";
foreach ($_POST as $key=> $value){
//  echo "$key = $value<br>";
 if(empty($value)){
  exit();
  header("location: ../form.php");
 }
}
require_once("./connect.php");
$sql="INSERT INTO `users` (`id`, `city_id`, `firstName`, `lastName`, `birthday`) 
VALUES (NULL, '$_POST[city]', '$_POST[firstName]', '$_POST[lastName]', '$_POST[birthday]')";
echo $sql;
$conn->query($sql);
header("location:../form.php");

?>
