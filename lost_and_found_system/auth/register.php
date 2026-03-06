<?php
include("../config/database.php");

if($_SERVER["REQUEST_METHOD"]=="POST"){

$fullname = $_POST['fullname'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

if(empty($fullname) || empty($email) || empty($_POST['password'])){
echo "All fields are required";
}
else{

$sql="INSERT INTO users(fullname,email,password) VALUES(?,?,?)";
$stmt=$conn->prepare($sql);
$stmt->execute([$fullname,$email,$password]);

echo "Registration Successful";
}

}
?>

<form method="POST">

Full Name:<br>
<input type="text" name="fullname"><br>

Email:<br>
<input type="email" name="email"><br>

Password:<br>
<input type="password" name="password"><br><br>

<button type="submit">Register</button>

</form>

<a href="login.php">Login</a>