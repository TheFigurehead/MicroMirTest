<?php
//Admin's list of rooms

global $conn;
$sql = "select * from rooms where id > 1";
$results = $conn -> query($sql);
?>
<div class="collection">
	<a class="collection-item" href="index.php">General room</a>
<?php
if(!empty($results)){
	foreach($results as $result)
	{ 
	?>
	<a class="collection-item" href="index.php?id=<?php echo $result['id'] ?>"><?php echo $result['name'] ?></a>
<?php	}}
?>
</div>         