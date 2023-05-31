<?php
$id = $_POST['table_id'];
$total_price = $_POST['total_price'];
$today = date("Y-m-d");
include 'connectdb.php';
$sql = "INSERT INTO receipt (receipt_id, table_id, total_price, date)VALUES (NULL, $id, $total_price, '$today');";
if (mysqli_query($connection, $sql)) {
  $sql1 = "DELETE FROM orders WHERE table_id = $id";
  if (mysqli_query($connection, $sql1)) {
    header("Location:list_order.php?page=new");
  }
  
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($connection);
}
?>