<?php
$name = $_POST['name'];
$desc = $_POST['desc'];
$price = $_POST['price'];
$img_link = $_POST['img_link'];
$category_id = $_POST['category_id'];

include 'connectdb.php';
$sql = "INSERT INTO `product` (`product_id`, `product_name`, `product_desc`,`price`,`img_link`,`category_id`) VALUES (NULL, '$name', '$desc','$price','$img_link','$category_id');";

if (mysqli_query($connection, $sql)) {
  header("Location:manage_product.php?page=new");
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($connection);
}
?>