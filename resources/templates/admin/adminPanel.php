<?php 
//admin's chat
require_once(realpath("../resources/config.php"));

	if(!empty($_GET))
	{
		$chat_id = $_GET['id'];		
	}

?>

<div class="container">
<br/>
<?php if(!empty($chat_id))
{ 
?>
		<a class='dropdown-button btn' href='#' data-activates='dropdown'>Room options</a>
	<?php 
} else{ 
	?>
		<a class='btn modal-trigger' href="#newRoom">Create new room</a>
		<a class='btn modal-trigger' href="#newUser">Sign up new user</a>
	<?php 
} 
	?>
	<div id="result" class="row">
		
	</div>
	
	<input id="id" type="hidden" value="<?php echo (!empty($chat_id) ? $chat_id : "1"); ?> " />
	
	<div class="row">
		<div class="input-field col m12">
			<textarea id="text" class="materialize-textarea"></textarea>
			<label for="text">Message</label>
			<a class="btn" onClick="sendMessage();">Send</a>
		</div>
	</div>
</div>

<!-- Dropdown menu with rooms settings -->
<ul id='dropdown' class='dropdown-content'>
	<li><a class="modal-trigger" href="#adding">Add/delete users</a></li>
	<li><a onClick="deleteRoom()">Drop room</a></li>
</ul>

<!-- Modal for adding/deleting users -->
<div id="adding" class="modal">
    <div class="container">
	<h4 class="center-align">Add/delete user to the room</h4>
		<div id="userList">
			
		</div>
	</div>
</div>

<!-- Modal for creating room -->
<div id="newRoom" class="modal">
    <div class="container">
	<h4 class="center-align">Create new room</h4>
		<div class="row">
		<div class="input-field col m12">
			<input id="roomName" type="text" class="validate">
			<label for="first_name">Room's Name</label>
        </div>
		</div>
		<div class="row">
		<div class="input-field col m12">
			<button class="btn waves-effect waves-light" onClick="addRoom()">Submit
				<i class="material-icons right">send</i>
			</button>
        </div>
		</div>
	</div>
</div>

<!-- Modal for register user -->

<div id="newUser" class="modal">
    <div class="container">
	<h4 class="center-align">Create new user</h4>
		<div class="row">
			<div class="input-field col m12">
				<input id="login" type="text" class="validate">
				<label for="first_name">Login</label>
			</div>
		</div>
		<div class="row">
			<div class="input-field col m12">
				<input id="password" type="password" class="validate">
				<label for="password">Password</label>
			</div>
		</div>
		<div class="row">
			<div class="input-field col m12">
				<button class="btn waves-effect waves-light" onClick="newUser()">Submit
					<i class="material-icons right">send</i>
				</button>
			</div>
		</div>
	</div>
</div>