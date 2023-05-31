<?php
$id = $_GET['id'];
include 'connectdb.php';
$sql = "DELETE FROM orders WHERE `orders`.`order_id`  = $id";

if (mysqli_query($connection, $sql)) {
  header("Location:index.php?page=new");
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($connection);
}
?>