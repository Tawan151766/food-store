<?php 
session_start();
include "connectdb.php";
date_default_timezone_set("Asia/Bangkok");

session_destroy();
echo "<meta http-equiv='refresh' content='2;url=index.php'>";
?>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<!-- <div align="center">
  <p><br>
    <br>
    <font size="3" face="MS Sans Serif, Tahoma, sans-serif"><b>Log out</b></font></p><br>
  <p><font size="3" face="MS Sans Serif, Tahoma, sans-serif">Waiting... Return to Log in</font><br>
    <br>
  </p>
</div> -->
<?php
echo "<br><br><center>ออกจากระบบ</center>";
?>