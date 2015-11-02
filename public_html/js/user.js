function checkAuth()
{
	$.ajax({
		url: '../resources/templates/postQuerry/checkAuth.php',
		type: "post",
		data: {
			'login':$('#login').val(), 
			'form_token':$('#form_token').val(),
			'password': $('#password').val()},
		success: function(html){
			$('#result').empty();
			$('#result').append(html);
		}
	});
}

function returnMessage()
{
	$.ajax({
	url: '../resources/templates/postQuerry/returnMessage.php',
	type: "post",
	data: {
		'id': $('#id').val()},
	success: function(html){
		$('#result').empty();
		$('#result').append(html);
	}
	});
}

$( document ).ready(function() {
	
    returnMessage();
	
	$('.modal-trigger').leanModal();
	
	$.ajax({
		url: '../resources/templates/postQuerry/addUser.php',
		type: "post",
		data: {
			'id_room': $('#id').val()},
		success: function(html){
			$('#userList').empty();
			$('#userList').append(html);
		}
	});
	
});

function sendMessage()
{
	$.ajax({
		url: '../resources/templates/postQuerry/returnMessage.php',
		type: "post",
		data: {
			'text':$('#text').val(), 
			'id': $('#id').val()},
		success: function(html){
			$('#result').empty();
			$('#result').append(html);
			$('#text').val('');
		}
	});
}

function sendPM(id)
{
	$.ajax({
		url: '../resources/templates/postQuerry/pmMessageList.php',
		type: "post",
		data: {
			'id': id,
			'text': $('#text').val()},
		success: function(html){
			$('#messagesList').empty();
			$('#messagesList').append(html);
		}
	});
}

function addUser(id)
{
	$.ajax({
		url: '../resources/templates/postQuerry/addUser.php',
		type: "post",
		data: {
			'id_user':id, 
			'id_room': $('#id').val()},
		success: function(html){
			$('#userList').empty();
			$('#userList').append(html);
		}
	});
}

function newUser()
{
	$.ajax({
		url: '../resources/templates/postQuerry/newUser.php',
		type: "post",
		data: {
			'login': $('#login').val(),
			'password': $('#password').val()},
		success: function(html){
			$('#newRoom').append(html);
		}
	});
}

function addRoom()
{
	$.ajax({
		url: '../resources/templates/postQuerry/addRoom.php',
		type: "post",
		data: {
			'roomName': $('#roomName').val()},
		success: function(html){
			$('#userList').empty();
			$('#userList').append(html);
			//location.reload();
		}
	});
}

function deleteRoom()
{
	$.ajax({
		url: '../resources/templates/postQuerry/deleteRoom.php',
		type: "post",
		data: {
			'id': $('#id').val()},
		success: function(html){
			location.href = 'index.php';
		}
	});
}

function deleteMessage(id)
{
	$.ajax({
		url: '../resources/templates/postQuerry/deleteMessage.php',
		type: "post",
		data: {
			'id': id},
		success: function(html){
			returnMessage();
		}
	});
}

function openDial(id)
{
	$.ajax({
		url: '../resources/templates/postQuerry/pmMessageList.php',
		type: "post",
		data: {
			'id': id},
		success: function(html){
			$('#messagesList').empty();
			$('#messagesList').append(html);
			$('#dialogue').openModal();
		}
	});
}

$('.dropdown-button').dropdown({
    inDuration: 300,
    outDuration: 225,
    constrain_width: false,
    hover: true,
    gutter: 0,
    belowOrigin: false, 
    alignment: 'left' 
    }
);