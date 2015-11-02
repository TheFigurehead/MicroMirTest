<?php
require_once(realpath(dirname(__FILE__) . "/../../config.php"));
if(!empty($_POST['roomName']))
{
	//checks if room with the same name is exist
	$s = $conn->prepare("Select * from rooms where name=:name");
	$s->execute(array(":name" => $_POST['roomName']));
	$r = $s->fetch(\PDO::FETCH_ASSOC);
	if(!empty($r))
	{
		?> <script>Materialize.toast('Room is already exist!', 4000)</script> <?php
	} else
	{
		//adding new room to db
		$sql = $conn->prepare("INSERT INTO rooms (name) VALUES (:name)");
		$sql->execute(array(":name" => $_POST['roomName']));
		?> <script>$('#newRoom').closeModal();Materialize.toast('Room has created!', 4000)</script> <?php
	}
}

?>