<?php
//Block of authorization form
//session_start();

$form_token = md5( uniqid('auth', true) );

$_SESSION['form_token'] = $form_token;
?>
<div class="container-fluid" style="margin-top:30vh;">
	<div class="row">
		<div class="col m4 offset-m4 col s10 offset-s1 authForm">
			<div class="container">
				<form>
					<div class="row">
						<div class="input-field col m12">
							<input id="login" type="text" class="validate">
							<label for="login">Login</label>
						</div>
					</div>
					<div class="row">
						<div class="input-field col m12">
							<input id="password" type="password" class="validate">
							<label for="password">Password</label>
						</div>
					</div>
					<input type="hidden" id="form_token" value="<?php echo $form_token; ?>" />
					<div class="row">
						<div class="col m6 s12">
							<a class="waves-effect waves-light teal lighten-2 btn">Cancel</a>
						</div>
						<div class="col m6 s12">
							<a class="waves-effect waves-light btn" onClick="checkAuth()">Enter</a>
						</div>
					</div>
					<div id="result" class="row card-panel">
						
					</div>
				</form>
			</div>
		</div>
	</div>
</div>