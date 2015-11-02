<?php
require_once(realpath(dirname(__FILE__) . "/../../config.php"));

//check post query and add message if it's needed

if(!empty($_POST['text']) && !empty($_POST['id']))
{
	global $conn;
	$id_sender = $_SESSION['id'];
	$id_reciever = $_POST['id'];
	$text = $_POST['text'];
	$s = $conn -> prepare("INSERT INTO pm (id_sender, id_reciever, text) VALUES ($id_sender, $id_reciever, :text)");
	$s->bindValue(':text', $_POST['text'], PDO::PARAM_STR);
	$s->execute();
}

if(!empty($_POST['id']))
{

	$sql = $conn->prepare("select * from pm where (id_sender=:id_sender and id_reciever = :id_reciever) or (id_sender=:id_reciever and id_reciever = :id_sender)");
	$sql->execute(array(":id_sender" => $_POST['id'], ":id_reciever" => $_SESSION['id']));
	$results = $sql -> fetchAll();

	$sql = $conn->prepare("select login from users where id=:id");
	$sql->execute(array(":id" => $_POST['id']));
	$login = $sql->fetch(\PDO::FETCH_ASSOC);

?>
<div class="row">
	<h5 class="center-align">Private Messages with <?php echo " " . $login['login']; ?></h5>
</div>
<div class="row">
	<div id="messageList" class="container-fluid" style="overflow-y: auto; overflow-x: hidden; height: 40vh">
		<?php
			if(!empty($results))
			{
			foreach($results as $result)
				{
					if($result['id_sender'] == $_SESSION['id'])
					{
					?>
						<div class="row">
							<div class="col m10">
								<div class="card-panel green lighten-3"><?php echo "You : " . $result['text']; ?></div>
							</div>
						</div>
			<?php 
					}else {
						?>
						<div class="row">
							<div class="col m10 offset-m2">
								<div class="card-panel blue accent-1"><?php echo $login['login'] ." : ". $result['text']; ?></div>
							</div>
						</div>
						<?php
					}
				}
			} else {
				?>
				<h5 class="center-align">There is no messages yet.</h5>
				<?php
			}
		?>

	</div>
	<!-- Scrolling pm list to the bottom -->
	<script>	
		var wtf    = $('#messageList');
		var height = wtf[0].scrollHeight;	
		wtf.scrollTop(height);
	</script>
</div>

<div class="row">
		<div class="input-field col m12">
			<textarea id="text" class="materialize-textarea"></textarea>
			<label for="text">Message</label>
			<button class="btn" onClick="sendPM(<?php echo $_POST['id']; ?>)">Send</button>
		</div>
</div>

<?php } ?>

