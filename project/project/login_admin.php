<?php
include "connectdb.php";
include "header.php";
session_start();

      if (isset($_POST['username']) &&  isset($_POST['password'])){
        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql   = "SELECT * FROM `users` WHERE username = '$username' and `password` = '$password' ";
        $query = mysqli_query($connection, $sql);
        $num   = mysqli_num_rows($query);

        if ($num <= 0) {
            echo "<br><br><center>Login error</center>";
            echo "<meta http-equiv=refresh content=2;URL=login_admin.php>";
            exit();
          } else {	
            $result                     = mysqli_fetch_array($query);
            $_SESSION['username']       = $result['username'];
            $_SESSION['password']       = $result['password'];
            $_SESSION['fullname']       = $result['fullname'];
            $_SESSION['phone']       = $result['phone'];
            $_SESSION['email']       = $result['email'];
            $_SESSION['address']       = $result['address'];
            $_SESSION['gender']       = $result['gender'];
            $_SESSION['date_of_birth']       = $result['date_of_birth'];
            echo "<br><br><center>Login Success</center>";
            echo "<meta http-equiv='refresh' content='1 ;url=list_order.php'>";
            exit();
          }
      }
      ?>
<body>
<div class="container d-flex justify-content-center mt-5">
<form class="w-50 p-3 border border-success rounded" action="" method="post">
<div class="mb-3">
    <label for="exampleInputEmail1" class="form-label" >Username</label>
    <input type="text" class="form-control" name="username">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Password</label>
    <input type="password" class="form-control" name="password">
  </div>
  <button type="submit" class="btn btn-success">Submit</button>
  <a href="login.php">user</a>
</form>
</div>
</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
</html>