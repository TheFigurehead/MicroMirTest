<?php
//Block for user's rooms list
require_once(realpath(dirname(__FILE__) . "/../config.php"));

global $conn;
$id = $_SESSION['id'];
$sql = "select * from rooms_users where id_user=$id";
$results = $conn->query($sql);
?>
<div class="collection">
	<a class="collection-item" href="index.php">General room</a>
<?php
if(!empty($results)){
	foreach($results as $result)
	{ 
	$sql = $conn->prepare("select * from rooms where id=:id_room");
	$sql->execute(array(":id_room" => $result['id_room']));
	$res = $sql->fetch(\PDO::FETCH_ASSOC);
	?>
	<a class="collection-item" href="index.php?id=<?php echo $res['id'] ?>"><?php echo $res['name'] ?></a>
<?php	}}
?>
</div>         