<?php 
//Block shows chat for users
require_once(realpath("../resources/config.php"));

	if(!empty($_GET))
	{
		$chat_id = $_GET['id'];
	}

?>

<div class="container">
	<div id="result" class="row">
		
	</div>
	
	<input id="id" type="hidden" value="<?php echo (!empty($chat_id) ? $chat_id : "1"); ?> " />
	
	<div class="row">
		<div class="input-field col m12">
			<textarea id="text" class="materialize-textarea"></textarea>
			<label for="text">Message</label>
			<a class="btn" onClick="sendMessage()">Send</a>
		</div>
	</div>
</div>