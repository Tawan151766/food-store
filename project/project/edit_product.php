<?php
$id = $_POST['id'];
$name = $_POST['name'];
$desc = $_POST['desc'];
$price = $_POST['price'];
$img_link = $_POST['img_link'];
$category_id = $_POST['category_id'];

include 'connectdb.php';
$sql = "UPDATE `product` SET `product_name` = '$name', `product_desc` = '$desc', `price` = '$price', `img_link` = '$img_link', `category_id` = '$category_id' WHERE `product`.`product_id` = '$id' ";

if (mysqli_query($connection, $sql)) {
  header("Location:manage_product.php?page=new");
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($connection);
}
?>