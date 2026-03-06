<?php
include("../session_check.php");
include("../config/database.php");

if($_SERVER["REQUEST_METHOD"]=="POST"){

$name=$_POST['item_name'];
$desc=$_POST['description'];
$location=$_POST['location'];
$status=$_POST['status'];
$date=$_POST['date_reported'];

if(empty($name)||empty($desc)||empty($location)){
echo "All fields required";
}
else{

$sql="INSERT INTO items(item_name,description,location,status,date_reported)
VALUES(?,?,?,?,?)";

$stmt=$conn->prepare($sql);
$stmt->execute([$name,$desc,$location,$status,$date]);

echo "Item Reported Successfully";
}

}
?>

<form method="POST">

Item Name:<br>
<input type="text" name="item_name"><br>

Description:<br>
<input type="text" name="description"><br>

Location:<br>
<input type="text" name="location"><br>

Status:<br>
<select name="status">
<option>Lost</option>
<option>Found</option>
</select><br>

Date Reported:<br>
<input type="date" name="date_reported"><br><br>

<button type="submit">Submit</button>

</form>