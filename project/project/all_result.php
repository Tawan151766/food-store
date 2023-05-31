<?php
include "connectdb.php";
$sql = "SELECT * FROM `product`INNER JOIN category ON product.category_id = category.category_id;";
$qeury = mysqli_query($connection,$sql);
$data = array();
    while($result = mysqli_fetch_assoc($qeury)){
        $data[] = $result;
    }
    echo json_encode($data);

 ?>
 