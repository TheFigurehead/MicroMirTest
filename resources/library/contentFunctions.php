<?php
	require_once(realpath(dirname(__FILE__) . "/../config.php"));
	
	//choose the content of index.php
	function getContent($content)
	{
		$contentFileFullPath = TEMPLATES_PATH . "/" . $content;

		if (file_exists($contentFileFullPath)) 
		{
			require_once($contentFileFullPath);
		} 
		else
		{
			require_once(TEMPLATES_PATH . "/error.php");
		}
	}
	
	//chose the left panel of index.php
	
	function getPanel($sidePanel)
	{
		$panelFileFullPath = TEMPLATES_PATH . "/" . $sidePanel;

		if (file_exists($panelFileFullPath)) 
		{
			require_once($panelFileFullPath);
		} 
		else
		{
			require_once(TEMPLATES_PATH . "/error.php");
		}
	}
	
	//check if user have rights to see the room and if the room exists
	function getPage($id)
	{
		if(!empty($_GET['id']))
		{
			global $conn;
			if($_SESSION['id'] == 1)
			{
				$s = $conn->prepare("Select * from rooms where id=:id");
				$s->execute(array(":id" => $id));
				$r = $s->fetch(\PDO::FETCH_ASSOC);
			} else {
				$s = $conn->prepare("Select * from rooms_users where id_room=:id and id_user=:id_user");
				$s->execute(array(":id" => $id, ":id_user" => $_SESSION['id']));
				$r = $s->fetch(\PDO::FETCH_ASSOC);
			}
			if(empty($r))
			{
				require_once(TEMPLATES_PATH . "/404.php");
				return false;
			} else return true;
		} else return true;
	}