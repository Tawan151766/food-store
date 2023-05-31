<?php
session_start();

$table_id =$_SESSION['table_id'];
$product_id = $_POST['product_id'];
$qty = $_POST['qty'];

include 'connectdb.php';
$sql = "INSERT INTO `orders` (`order_id`, `table_id`, `product_id`, `product_qty`) VALUES (NULL, '$table_id', '$product_id', '$qty');";

if (mysqli_query($connection, $sql)) {

  header("Location:index.php?page=new");
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($connection);
}
?>