<?php
include "connectdb.php";
include "header.php";
session_start();
if (@$_SESSION['table_id'] == "") {
  echo "<meta http-equiv='refresh' content='0; url=login.php'>";
  exit;
}
?>
<body>
<div class=" container">
<div class="ms-4 container mt-3">
    <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label h5">โต๊ะของคุณ</label>
    <div class="d-flex">
    <input type="text" class="me-2 form-control w-25 border border-success" value="<?php echo$_SESSION['table_name']?>" readonly>
    <a class="btn btn-danger" href="logout.php">LOGOUT</a>
    </div>
  </div>
    </div>
    <div class="container ms-4 d-flex">
    <div class=" input-group mb-3 w-50   d-flex justify-content-start" >
    <select class="form-select" aria-label="Default select example" name="category1" id="category1">
  <option value="" >เลือกประเภทอาหาร</option>
  <?php $sql1= "SELECT * FROM `category`";
  $query1= mysqli_query($connection, $sql1);?>
    
  <?php foreach ($query1 as $value) { ?>
  <option value="<?php echo$value['category_id']?>" ><?php echo$value['category_name']?></option>
  <?php } ?>
</select>
</div>

<button type="button" class="btn btn-primary ms-2 mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">รายการของฉัน</button>
    </div>
</div>
    <div class="container mt-3">
        <div class="row" id="product">
            <?php $sql = "SELECT * FROM `product`INNER JOIN category ON product.category_id = category.category_id;";
  $query = mysqli_query($connection, $sql);
  $i = 1; ?>
    
  <?php foreach ($query as $value) { ?>
    <div class="col-sm-4" >
              <div class="d-flex justify-content-center mt-3">
            <div class="card mt-2 w-75" >
            <h5 class="z-1 position-absolute"><span class="mt-3 badge bg-secondary "><?php echo$value['category_name']?></span></h5>
  <img style="object-fit: cover;height:190px" src="<?php echo$value['img_link']?>" class="w-100 card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title"><?php echo$value['product_name']?></h5>
    <p class="card-text"><?php echo$value['product_desc']?></p>
    <div class="d-flex justify-content-between">
        <strong class="card-text">PRICE</strong>
    <strong class="card-text text-success"><?php echo$value['price']?></strong>
    <strong class="card-text text-success">THB</strong> 
    
    
</div>
    <a href="" class="btn btn-success btn-sm mt-1" data-bs-toggle="modal" data-bs-target="#Orders<?php echo$value['product_id']?>">Orders</a>        </div>

    
  </div>
</div>
            </div>

<!-- Modal -->
<div class="modal fade" id="Orders<?php echo$value['product_id']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <form action="order.php" method="post">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><?php echo$value['product_name']?></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="container text-center">
            <img style="width:100%;height: 300px;object-fit: cover;" src="<?php echo$value['img_link']?>" class="card-img-top rounded " alt="...">
        </div>
        <input type="hidden" class="me-2 form-control w-25 border border-success" value="<?php echo$value['product_id']?>" name="product_id" readonly>
        <div class="container mt-3">
            <label for="inputPassword5" class="form-label">จำนวนที่ต้องการสั่ง ราคา <?php echo$value['price']?>/จาน</label>
                <select class="form-select" name="qty">
                <option selected>จำนวนที่ต้องการสั่ง</option>
                <option value="1">1 จาน</option>
                <option value="2">2 จาน</option>
                <option value="3">3 จาน</option>
                <option value="4">4 จาน</option>
                <option value="5">5 จาน</option>
                <option value="6">6 จาน</option>
                </select>
            <textarea class="form-control mt-2" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px" readonly><?php echo$value['product_desc']?>
        </textarea>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success">Add</button>
      </div>
    </div>
  </div>
  </form>
</div>
            <?php }?>
        </div>



    </div>




<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel"><?php echo$_SESSION['table_name']?></h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="modal-title"><strong>รายการของฉัน</strong></div>
      <table class="table shadow mt-3 rounded text-center">
  <thead>
    <tr>
      <th scope="col">ลำดับ</th>
      <th scope="col">เมนูที่สั่ง</th>
      <th scope="col">จำนวน</th>
      <th scope="col">ราคา/ต่อจาน</th>
      <th scope="col">Manage</th>
      <!-- <th scope="col">จัดการรายละเอียดสินค้า</th> -->
    </tr>
  </thead>
  <tbody>
  <?php 
  $table_id = $_SESSION['table_id'];
  $sql = "SELECT * FROM `orders` INNER JOIN product ON orders.product_id = product.product_id WHERE orders.table_id = $table_id;";
  $query = mysqli_query($connection, $sql);
  $i = 1; ?>
    <tr>
    
  <?php foreach ($query as $value) { ?>
      <th scope="row"><?php echo $i++; ?></th>
      <td><?php echo$value['product_name']?></td>
      <td><?php echo$value['product_qty']?></td>
      <td><?php echo$value['price']?></td>
      <td>
        <div class="btn-group" role="group" aria-label="Basic example">
          <a href="delect_order.php?id=<?php echo $value['order_id'] ?>" class="btn btn-danger btn-sm">ยกเลิก</a>
        </div>
      </td>
    </tr>
    <?php }?>
  </tbody>
  
</table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script type="text/javascript">
  $('#category1').change(function() {
    var category1_id = $(this).val();
 
      $.ajax({
      type: "POST",
      url: "product_ajax.php",
      data: {id:category1_id,function:'category1'},
      success: function(data){
          $('#product').html(data); 
      }
    });
  });
</script>
</body>

</html>