<?php
require_once(realpath(dirname(__FILE__) . "/../../config.php"));
if(!empty($_POST['id']))
	{
		$id = $_POST['id'];
		$sql = "DELETE FROM messages where id=$id";
		$conn -> exec($sql);
	}

?>