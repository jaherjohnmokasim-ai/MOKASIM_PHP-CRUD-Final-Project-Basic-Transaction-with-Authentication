<?php
include("session_check.php");
?>

<h2>Lost and Found Dashboard</h2>

<a href="crud/create.php">Report Item</a><br>
<a href="crud/read.php">View Items</a><br>
<a href="auth/logout.php">Logout</a>

<?php
if(isset($_COOKIE['last_login'])){
echo "<br>Last Login: ".$_COOKIE['last_login'];
}
?>