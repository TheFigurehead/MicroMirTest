<?php
require_once(realpath(dirname(__FILE__) . "/../../config.php"));
if(!empty($_POST['id']))
	{
		$id = $_POST['id'];
		$sql = "DELETE FROM rooms_users where id_room=$id";
		$conn -> exec($sql);
		$sql = "DELETE FROM rooms where id=$id";
		$conn -> exec($sql);
		$sql = "DELETE FROM messages where id_room=$id";
		$conn -> exec($sql);
	}

?>