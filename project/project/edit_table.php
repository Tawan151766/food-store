<?php
$id = $_POST['id'];
$name = $_POST['name'];

include 'connectdb.php';
$sql = "UPDATE `tables` SET `table_name` = '$name' WHERE `tables`.`table_id` = '$id' ";

if (mysqli_query($connection, $sql)) {
  header("Location:table.php?page=new");
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($connection);
}
?>