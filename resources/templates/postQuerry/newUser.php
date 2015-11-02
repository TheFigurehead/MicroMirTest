<?php 
require_once(realpath(dirname(__FILE__) . "/../../config.php"));

//Если использовать сайт в реальности, то следует зашифровать пароль в md5
// $password = md5($_POST['password']);

if(!empty($_POST['login']) && !empty($_POST['password']))
{
	$s = $conn->prepare("Select * from users where login=:login");
	$s->execute(array(":login" => $_POST['login']));
	$r = $s->fetch(\PDO::FETCH_ASSOC);
	if(!empty($r))
	{
		?> <script>Materialize.toast('User is already exist!', 6000)</script> <?php
	} else
	{
		$sql = $conn->prepare("INSERT INTO users (login, password) VALUES (:login,:password)");
		$sql->execute(array(":login" => $_POST['login'], ":password" => $_POST['password']));
		?> <script>$('#newUser').closeModal();Materialize.toast('User has been registered!', 6000)</script> <?php
	}
} else{
	?> 
	<script>Materialize.toast('Something went wrong!', 6000)</script>
<?php } ?>