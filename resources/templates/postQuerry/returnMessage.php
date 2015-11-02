<?php
require_once(realpath(dirname(__FILE__) . "/../../config.php"));

if(!empty($_POST['text']))
{
	$sql = $conn->prepare("INSERT INTO messages (id_sender, id_room, text) VALUES (:id_sender, :id_room, :text)");
	$sql->execute(array(":id_sender" => $_SESSION['id'], ":id_room" => $_POST['id'], ":text" => $_POST['text']));
}

if(!empty($_POST['id']))
{
?>
	<h3>
		<?php
			if($_POST['id'] == 1)
			{
				echo "General chat";
			} else {
				$sqln = $conn->prepare("select * from rooms where id=:id");
				$sqln->execute(array(":id" => $_POST['id']));
				$name = $sqln->fetch(\PDO::FETCH_ASSOC);
				echo $name['name'];
			}
		?>
	</h3>
	<div id="chatList" style="height:40vh; overflow-y:auto;">
	<ul class="collection">
	<?php 
			global $conn;
			$id = $_POST['id'];
			$sql = "select * from messages where id_room=$id";
			$results = $conn->query($sql);
			foreach($results as $result){
	?>
		<li class="collection-item">
		<span>
			<?php if($_SESSION['id'] == $result['id_sender']){echo "You: ";} else
			{
				$sql = $conn->prepare("select * from users where id=:id");
				$sql->execute(array(":id" => $result['id_sender']));
				$res = $sql->fetch(\PDO::FETCH_ASSOC);
				echo $res['login'].": ";
			} ?>
		</span>
		<?php 
		echo $result['text']; 
		if($_SESSION['id'] ==1){
		?>		
		<a href="" onClick="deleteMessage(<?php echo $result['id'] ?>)">
			<span class="secondary-content">
				Delete
			</span>
		</a>
		
		</li>
		<?php }}?>
	</ul>
	</div>
	<script>	
		var wtf    = $('#chatList');
		var height = wtf[0].scrollHeight;	
		wtf.scrollTop(height);
	</script>
<?php } ?>