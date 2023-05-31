<?php
$id = $_GET['id'];
include 'connectdb.php';
$sql = "DELETE FROM tables WHERE `tables`.`table_id`  = $id";

if (mysqli_query($connection, $sql)) {
  header("Location:table.php?page=new");
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($connection);
}
?>