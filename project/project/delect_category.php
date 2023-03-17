<?php
$id = $_GET['id'];
include 'connectdb.php';
$sql = "DELETE FROM category WHERE `category`.`category_id`  = $id";

if (mysqli_query($connection, $sql)) {
  header("Location:category.php?page=new");
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($connection);
}
?>