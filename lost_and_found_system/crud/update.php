<?php
include("../session_check.php");
include("../config/database.php");

$id=$_GET['id'];

if($_SERVER["REQUEST_METHOD"]=="POST"){

$name=$_POST['item_name'];
$desc=$_POST['description'];
$location=$_POST['location'];
$status=$_POST['status'];

$sql="UPDATE items SET item_name=?,description=?,location=?,status=? WHERE id=?";
$stmt=$conn->prepare($sql);
$stmt->execute([$name,$desc,$location,$status,$id]);

header("Location: read.php");

}

$sql="SELECT * FROM items WHERE id=?";
$stmt=$conn->prepare($sql);
$stmt->execute([$id]);
$data=$stmt->fetch();

?>

<form method="POST">

Item Name:<br>
<input type="text" name="item_name" value="<?php echo $data['item_name']; ?>"><br>

Description:<br>
<input type="text" name="description" value="<?php echo $data['description']; ?>"><br>

Location:<br>
<input type="text" name="location" value="<?php echo $data['location']; ?>"><br>

Status:<br>
<select name="status">
<option>Lost</option>
<option>Found</option>
<option>Claimed</option>
</select><br><br>

<button type="submit">Update</button>

</form>