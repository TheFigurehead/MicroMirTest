<?php
require_once(realpath(dirname(__FILE__) . "/../../config.php"));

	if(isset($_POST['login']) && isset($_POST['password']) && isset($_POST['form_token']))
	{
		if($_POST['form_token'] == $_SESSION['form_token'])
		{
			$sql = $conn->prepare("select * from users where login=:login");
			$sql->execute(array(":login" => $_POST['login']));
			$result = $sql->fetch(\PDO::FETCH_ASSOC);
			if(!empty($result))
			{
				if($_POST['password'] == $result['password'])
				{
					$_SESSION['id'] = $result['id'];
					?> <script>location.reload();</script> <?php
				} else echo "Wrong password.";
			} else echo "User is not set.";
		} else echo "Invalid operation.";
	}
 
?>