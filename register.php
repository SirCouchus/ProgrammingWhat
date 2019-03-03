<?php
echo "
<!DOCTYPE html>
<html>
<head>
	<meta charset=utf-8>
	<meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
	<link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css' integrity='sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T' crossorigin='anonymous'>
	<link rel='stylesheet' type='text/css' href='register-style.css'>
	<title>Register</title>
</head>
<body>
	<main role='main' class='container'>
		<div class='row'>
			<div class='col-md-4'>
				<div class='profile-section'>
					<h3>Have an Account?</h3>
			    		<p class='text-muted'>Log in!
				    		<ul class='list-group'>
					    		<form method='POST' name='login' action='processing/login-processing.php'>
						            <li><input class='list-group-item list-group-item-light' type='text' placeholder='Username' name='username' required /></li>
						            <li><input class='list-group-item list-group-item-light' type='password' placeholder='Password' name='password' required /></li>
				          	</ul>
			    		</p>
			    		<small class='text-muted ml-2'>
			    			<input type='checkbox' name'rememberMe' value='remember'/> Remember Me<br/>
			    			<button type='submit' name='submit'>Login!</button><br/>
			    			<a>Forgot password?</a>
			    		</small>
			    		</form>
				</div>
			</div>
			<div class='col-md-8'>
				<div class='center-body'>
				<h3>Create an Account!</h3>
				<p class='text-muted'>Sign up!
					<ul class='list-group'>
						<form method='POST' name='register' action='processing/registration-processing.php'>
							<li><input class='list-group-item list-group-item-light' type='text' placeholder='Username' name='username' required /></li>
							<li><input class='list-group-item list-group-item-light' type='text' placeholder='Email' name='email' required /></li>
							<li><input class='list-group-item list-group-item-light' type='password' placeholder='Password' name='password' required /></li>
							<li><input class='list-group-item list-group-item-light' type='password' placeholder='Confirm Password' name='confirmpwd' required /></li>
							<small class='text-muted ml-2'>
							<br/>
			    				<button type='submit' name='submit'>Signup!</button><br/>
			    			</small>
						</form>
					</ul>
					<div id='rundown'>
						<ul class='right'>
								<li>ProgrammingWhat allows users to come together to discuss their programming projects</li>
								<li>Tell your friends so they can watch your project progress!</li>
								<li>Follow others and see what they're building!</li>
						</ul>
					</div>
				</p>
				</div>
			</div>
		</div>
	</main>

<!-- JavaScript, Jquery CDN -->
		<script src='https://code.jquery.com/jquery-3.3.1.slim.min.js' integrity='sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo' crossorigin='anonymous'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js' integrity='sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1' crossorigin='anonymous'></script>
<script src='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js' integrity='sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM' crossorigin='anonymous'></script>
</body>
</html>";