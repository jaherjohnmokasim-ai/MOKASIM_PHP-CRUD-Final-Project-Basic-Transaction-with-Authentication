<?php
include("../session_check.php");
include("../config/database.php");

$id=$_GET['id'];

$sql="DELETE FROM items WHERE id=?";
$stmt=$conn->prepare($sql);
$stmt->execute([$id]);

header("Location: read.php");
?>