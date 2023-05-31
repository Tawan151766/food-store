<?php
include "connectdb.php";
include "header.php";
session_start();
if (@$_SESSION['username'] == "") {
  echo "<meta http-equiv='refresh' content='0; url=login_admin.php'>";
  exit;
}
?>
<body>
<div class="container">
<div class="container text-center mt-3">
        <h1>Management Category</h1>
    </div>

    <div class="d-flex justify-content-start mt-3"><h1>My Category</h1></div>

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
                  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Create Category</button>
          </div>
              </div>
<table class="table shadow mt-3 rounded text-center">
  <thead>
    <tr>
      <th scope="col">ลำดับ</th>
      <th scope="col">Category name</th>
      <th scope="col">Manage</th>
      <!-- <th scope="col">จัดการรายละเอียดสินค้า</th> -->
    </tr>
  </thead>
  <tbody>
  <?php $sql = "SELECT * FROM `category`";
  $query = mysqli_query($connection, $sql);
  $i = 1; ?>
    <tr>
    
  <?php foreach ($query as $value) { ?>
      <th scope="row"><?php echo $i++; ?></th>
      <td><?php echo$value['category_name']?></td>
      <td>
        <div class="btn-group" role="group" aria-label="Basic example">
          <button type="button" class="btn btn-warning text-white" data-bs-toggle="modal" data-bs-target="#edit<?php echo$value['category_id']?>">Update</button>
          <a href="delect_category.php?id=<?php echo $value['category_id'] ?>" class="btn btn-danger text-white">ลบ</a>
  </div></td>
    </tr>



    <div class="modal fade" id="edit<?php echo$value['category_id']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <form action="edit_category.php" method="post">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Category</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <label for="" class="form-label">Edit Name</label>
      <input type="text" class="form-control" name="name" value="<?php echo$value['category_name']?>">
      <input type="hidden" class="form-control" name="id" value="<?php echo$value['category_id']?>">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success">Update</button>
      </div>
    </div>
  </div>
  </form>
</div>

    <?php }?>
  </tbody>
  
</table>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <form action="insert_category.php" method="post">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Create Category</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <label for="" class="form-label">Create Name</label>
<input type="text" class="form-control" name="name">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success">Create</button>
      </div>
    </div>
  </div>
  </form>
</div>




</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
</html>