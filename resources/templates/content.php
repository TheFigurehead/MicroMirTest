<?php
//Redirecting pages for users and admin
	require_once("../resources/library/contentFunctions.php");
	if(isset($_SESSION['id'])){
		if($_SESSION['id'] == 1)
		{
			$content = "admin/adminPanel.php";
			$sidePanel = "admin/leftPanelAdmin.php";
		} else{
			$content = "chat.php";		
			$sidePanel = "leftPanel.php";
		}
	}
?>