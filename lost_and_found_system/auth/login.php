<?php
session_start();
include("../config/database.php");

if($_SERVER["REQUEST_METHOD"]=="POST"){

$email=$_POST['email'];
$password=$_POST['password'];

$sql="SELECT * FROM users WHERE email=?";
$stmt=$conn->prepare($sql);
$stmt->execute([$email]);

$user=$stmt->fetch();

if($user && password_verify($password,$user['password'])){

$_SESSION['user_id']=$user['id'];

setcookie("last_login",date("Y-m-d H:i:s"),time()+3600);

header("Location: ../dashboard.php");

}else{
echo "Invalid login";
}

}
?>

<form method="POST">

Email:<br>
<input type="email" name="email"><br>

Password:<br>
<input type="password" name="password"><br><br>

<button type="submit">Login</button>

</form>

<a href="register.php">Register</a>