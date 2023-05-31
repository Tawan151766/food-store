<?php
$id = $_GET['id'];
include 'connectdb.php';
$sql = "UPDATE `orders` SET `status` = 'success' WHERE `orders`.`order_id` =  $id";

if (mysqli_query($connection, $sql)) {
  header("Location:list_order.php?page=new");
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($connection);
}
?>