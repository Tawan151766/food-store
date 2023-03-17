<?php
$name = $_POST['name'];
$id = $_POST['id'];

include 'connectdb.php';
$sql = "INSERT INTO `tables` (`table_id`, `table_name`, `table_status`) VALUES ('$id', '$name', '0');";

if (mysqli_query($connection, $sql)) {
  header("Location:table.php?page=new");
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($connection);
}
?>