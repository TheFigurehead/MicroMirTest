<?php 
require_once(realpath(dirname(__FILE__) . "/../../config.php"));
if(!empty($_POST['id_user']))
{
	//if user was in room - delete him, if not - add 
	$s = $conn->prepare("Select * from rooms_users where id_room=:id_room and id_user=:id_user");
	$s->execute(array(":id_room" => $_POST['id_room'], ":id_user" => $_POST['id_user']));
	$r = $s->fetch(\PDO::FETCH_ASSOC);
	if(empty($r))
	{
		$sql = $conn->prepare("INSERT INTO rooms_users (id_room, id_user) VALUES (:id_room, :id_user)");
		$sql->execute(array(":id_room" => $_POST['id_room'], ":id_user" => $_POST['id_user']));
	} else {
		$sql = $conn->prepare("DELETE FROM rooms_users where id_room=:id_room and id_user=:id_user");
		$sql->execute(array(":id_room" => $_POST['id_room'], ":id_user" => $_POST['id_user']));
	}
}
?>

<!-- Show list of users at room -->
<ul class="collection">
	<?php
		global $conn;
		$sql = "select * from users";
		$results = $conn->query($sql);
		foreach($results as $result)
		{	
			$s = $conn->prepare("Select * from rooms_users where id_room=:id_room and id_user=:id_user");
			$s->execute(array(":id_room" => $_POST['id_room'], ":id_user" => $result['id']));
			$r = $s->fetch(\PDO::FETCH_ASSOC);
			?>
		<li class="collection-item">
			<span class="title"><?php echo $result['login'] ?></span>
			<?php if(empty($r)){ ?>
			<span class="secondary-content" onClick="addUser(<?php echo $result['id'] ?>)"><i class="material-icons small">add</i></span>
			<?php } else{ ?>
			<span onClick="addUser(<?php echo $result['id'] ?>)" class="secondary-content"><i class="material-icons small">delete</i></span>
			<?php } ?>
		</li>
	<?php } ?>
	</ul>
</div>