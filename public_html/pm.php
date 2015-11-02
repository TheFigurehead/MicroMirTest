<?php    
    require_once(realpath(dirname(__FILE__) . "/../resources/config.php"));
?>
<!DOCTYPE html>
<html>
	<head>
		<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
		<link type="text/css" rel="stylesheet" href="css/style.css"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		
		<script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript" src="js/materialize.min.js"></script>
		<script type="text/javascript" src="js/user.js"></script>
	</head>
<body>

<?php if (isset($_SESSION['id'])){ ?>

<header>
<?php    
    require_once(TEMPLATES_PATH . "/header.php");
?>
</header>

<main>
	<div class="container">
		<?php require_once(TEMPLATES_PATH . "/postQuerry/pmUserList.php"); ?>
	</div>
</main>

<footer class="page-footer">	
	<?php require_once(TEMPLATES_PATH . "/footer.php"); ?>
</footer>

<?php } else require_once(TEMPLATES_PATH . "/auth.php"); ?>

</body>
</html>