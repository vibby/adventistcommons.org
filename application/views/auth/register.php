<h1 class="h2">Create account</h1>
<p class="lead">Enter the information below to start translating</p>
<?php if( $message ) { ?>
	<div class="alert alert-warning"><?php echo $message; ?></div>
<?php } ?>
<hr>
<form action="register" method="post">
	<div class="form-group">
		<input class="form-control" type="text" placeholder="First name" name="first_name" />
	</div>
	<div class="form-group">
		<input class="form-control" type="text" placeholder="Last name" name="last_name" />
	</div>
	<div class="form-group">
		<input class="form-control" type="email" placeholder="Email Address" name="email" />
	</div>
	<div class="form-group">
		<input class="form-control" type="password" placeholder="Password" name="password" />
		<div class="text-left">
			<small>Your password should be at least 8 characters</small>
		</div>
	</div>
	<div class="form-group">
		<input class="form-control" type="password" placeholder="Confirm password" name="password_confirm" />
	</div>
	<button class="btn btn-lg btn-block btn-primary" role="button" type="submit">
		Create account
	</button>
	<small>By clicking 'Create Account' you agree to our <a href="#">Terms of Use</a>
	</small>
</form>
