<?php
$name = $_POST['name'];

include 'connectdb.php';
$sql = "INSERT INTO `category` (`category_id`, `category_name`) VALUES (NULL, '$name');";

if (mysqli_query($connection, $sql)) {
  header("Location:category.php?page=new");
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($connection);
}
?>