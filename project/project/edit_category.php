<?php
$id = $_POST['id'];
$name = $_POST['name'];

include 'connectdb.php';
$sql = "UPDATE `category` SET `category_name` = '$name' WHERE `category`.`category_id` = '$id' ";

if (mysqli_query($connection, $sql)) {
  header("Location:category.php?page=new");
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($connection);
}
?>