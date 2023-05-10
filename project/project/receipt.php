<?php
include "connectdb.php";
include "header.php";

session_start();
if (@$_SESSION['username'] == "") {
  echo "<meta http-equiv='refresh' content='0; url=login_admin.php'>";
  exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Receipt Table</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
  <div class="container mt-3">
    
    <h1>Receipt Table</h1>

    <div class="btn-group" role="group" aria-label="Basic outlined example">
            <a href="category.php" class="btn btn-outline-primary">Category</a>
            <a href="table.php" class="btn btn-outline-primary">Table</a>
            <a href="list_order.php" class="btn btn-outline-primary">Orders</a>
          </div>
          <div class="form-group">
          <form method="POST" class="form-inline">
  <select style="width:300px" class="form-control mt-4" id="month" name="month">
    <option selected>Select Month</option>
    <option value="01">January</option>
    <option value="02">February</option>
    <option value="03">March</option>
    <option value="04">April</option>
    <option value="05">May</option>
    <option value="06">June</option>
    <option value="07">July</option>
    <option value="08">August</option>
    <option value="09">September</option>
    <option value="10">October</option>
    <option value="11">November</option>
    <option value="12">December</option>
  </select>
  <button type="submit" class="btn btn-primary mt-4 ms-2">Search</button>
</form>


  
</div>


    <table class="table shadow mt-3 rounded text-center">
      <thead>
        <tr>
          <th scope="col">Receipt ID</th>
          <th scope="col">Table ID</th>
          <th scope="col">Total Price</th>
          <th scope="col">Date</th>
        </tr>
      </thead>
      <tbody>
      <?php 
      if (isset($_POST['month'])) {
        $month = $_POST['month'];
        $sql = "SELECT * FROM receipt WHERE MONTH(date) = $month;";
      } else {
        $sql = "SELECT * FROM receipt;";
      }
      
      $query = mysqli_query($connection, $sql);
      
      foreach ($query as $value) {
        // display receipt data
      }
      
        foreach ($query as $value) { 
          echo "<tr>";
          echo "<td>{$value['receipt_id']}</td>";
          echo "<td>{$value['table_id']}</td>";
          echo "<td>" . number_format($value['total_price']) .  "</td>";
          echo "<td>{$value['date']}</td>";
          echo "</tr>";
        }?>
      </tbody>
    </table>
  </div>
</body>
</html>
