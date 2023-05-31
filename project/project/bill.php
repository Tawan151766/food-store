<?php
include "connectdb.php";
include "header.php";
$table_id = $_GET['table'];

session_start();
if (@$_SESSION['username'] == "") {
  echo "<meta http-equiv='refresh' content='0; url=login_admin.php'>";
  exit;
}


?>
<body>
<div class="container">
<div class="container text-center mt-3">
<?php 
if (!isset($table_id) || empty($table_id)) {
  echo "<script>alert('กรุณาเลือกโต๊ะที่ต้องการชำระบิล')</script>";
  echo "<meta http-equiv='refresh' content='0; url=list_order.php'>";
  exit;
}
        $sql = "SELECT *, (price * product_qty) as total_price FROM `orders` INNER JOIN product ON orders.product_id = product.product_id WHERE orders.table_id = $table_id;";
        $query = mysqli_query($connection, $sql);
        $i = 1;
        $total_price = 0;
        ?>
        <h1>ฺใบเสร็จโต๊ะที่ <?php echo$table_id?></h1>
    </div>
    <div class="d-flex justify-content-between mt-3 mb-4">
                  <div class="d-flex justify-content-start">
                  <div class="btn-group" role="group" aria-label="Basic outlined example">
            <a href="category.php" class="btn btn-outline-primary">Category</a>
            <a href="table.php" class="btn btn-outline-primary">Table</a>
            <a href="list_order.php" class="btn btn-outline-primary">Orders</a>
          </div>
              </div>
                  <div class="d-flex justify-content-end">
                  <a class="me-2 btn btn-danger" href="logout.php">LOGOUT</a>
          </div>
              </div>
              <div class="container">
  <div class="card shadow mt-3 rounded">
    <div class="card-body">
      <div class="card-title"><strong>รายละเอียดการสั่งซื้อ</strong></div>
      <table class="table shadow mt-3 rounded text-center">
        <thead>
          <tr>
            <th scope="col">ลำดับ</th>
            <th scope="col">เมนูที่สั่ง</th>
            <th scope="col">จำนวน</th>
            <th scope="col">ราคา/ต่อจาน</th>
            <th scope="col">ราคารวม</th>
          </tr>
        </thead>
        <tbody>
        
          <?php foreach ($query as $value) { ?>
            <tr>
              <th scope="row"><?php echo $i++; ?></th>
              <td><?php echo$value['product_name']?></td>
              <td><?php echo$value['product_qty']?></td>
              <td><?php echo$value['price']?></td>
              <td><?php echo$value['total_price']?></td>
              <?php $total_price += $value['total_price']; ?>
            </tr>
          <?php }?>
          <tr>
            <td  colspan="4"><strong class="fs-3">รวมทั้งหมด</strong></td>
            <td ><strong class="text-success fs-3" ><?php echo $total_price ?></strong></td>
            <td></td>
          </tr>
        </tbody>
        </table>
        <form method="post" action="save_and_delete_order.php">
        <input type="hidden" name="total_price" id="" value="<?php echo $total_price ?>">
      <input type="hidden" name="table_id" value="<?php echo $table_id; ?>">
      <button type="submit" class="btn btn-success">ยืนยันการชำระเงิน</button>
    </form>
    </div>
  </div>
</div>
</div>
</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
</html>