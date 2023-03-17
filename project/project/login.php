<?php
include "connectdb.php";
include "header.php";
session_start();

      if (isset($_POST['table_id'])){
        $table_id = $_POST['table_id'];

        $sql   = "SELECT * FROM `tables` WHERE table_id = '$table_id'";
        $query = mysqli_query($connection, $sql);
        $num   = mysqli_num_rows($query);

        if ($num <= 0) {
            echo "<br><br><center>โต๊ะนี้มีคนนั่งแล้ว</center>";
            echo "<meta http-equiv=refresh content=2;URL=login.php>";
            exit();
          } else {	
            $result                     = mysqli_fetch_array($query);
            $_SESSION['table_id']       = $result['table_id'];
            $_SESSION['table_name']       = $result['table_name'];
            $_SESSION['table_status']       = $result['table_status'];
            echo "<br><br><center>เลือกโต๊ะสำเร็จ</center>";
            echo "<meta http-equiv='refresh' content='1 ;url=index.php'>";
            exit();
          }
      }
      ?>
<body>
<div class="container d-flex justify-content-center mt-5">
<form class="w-50 p-3 border border-success rounded" action="" method="post">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">เลือกโต๊ะของคุณ</label>
    <select class="form-select border border-success" name="table_id">
    <?php $sql = "SELECT * FROM `tables`;";
  $query = mysqli_query($connection, $sql);
  $i = 1; ?>
    <option selected>เลือกโต๊ะของคุณ</option>
  <?php foreach ($query as $value) { ?>
        <option value="<?php echo$value['table_id']?>"><?php echo$value['table_name']?></option>
        <?php } ?>
    </select>
  </div>
  <button type="submit" class="btn btn-success">Submit</button>
  <a href="login_admin.php">Admin</a>
</form>
</div>
</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
</html>