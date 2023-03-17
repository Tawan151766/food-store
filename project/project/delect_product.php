<?php
$id = $_GET['id'];
include 'connectdb.php';
$sql = "DELETE FROM product WHERE `product`.`product_id`  = $id";

if (mysqli_query($connection, $sql)) {
  header("Location:manage_product.php?page=new");
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($connection);
}
?>