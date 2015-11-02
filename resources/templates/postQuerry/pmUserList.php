<?php
require_once(realpath(dirname(__FILE__) . "/../../config.php"));

$sql = $conn->prepare("select * from users");
$sql->execute();
$results = $sql -> fetchAll();
?>
<div class="row">
	<h3>User List</h3>
</div>
<div class="row">
	<div class="collection">
		<?php
		if(!empty($results))
		{
			foreach($results as $result)
			{
				if($result['id'] <> $_SESSION['id'])
				{
				?>
					<a href="#" class="collection-item" onClick="openDial(<?php echo $result['id']; ?>)">
						<?php echo $result['login']; ?>
					</a>
				<?php 
				}
			}
		} 
		?>

	</div>
</div>

<div id="dialogue" class="modal modal-fixed-footer">
    <div id="messagesList" class="container">
		
	</div>
</div>
