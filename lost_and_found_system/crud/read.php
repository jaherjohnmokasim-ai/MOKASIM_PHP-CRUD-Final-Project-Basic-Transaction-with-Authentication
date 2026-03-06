<?php
include("../session_check.php");
include("../config/database.php");

$sql="SELECT * FROM items";
$stmt=$conn->prepare($sql);
$stmt->execute();
$items=$stmt->fetchAll();
?>

<h2>Lost and Found Items</h2>

<table border="1">

<tr>
<th>ID</th>
<th>Item</th>
<th>Description</th>
<th>Location</th>
<th>Status</th>
<th>Action</th>
</tr>

<?php foreach($items as $row){ ?>

<tr>

<td><?php echo $row['id']; ?></td>
<td><?php echo $row['item_name']; ?></td>
<td><?php echo $row['description']; ?></td>
<td><?php echo $row['location']; ?></td>
<td><?php echo $row['status']; ?></td>

<td>
<a href="update.php?id=<?php echo $row['id']; ?>">Edit</a>
<a href="delete.php?id=<?php echo $row['id']; ?>">Delete</a>
</td>

</tr>

<?php } ?>

</table>