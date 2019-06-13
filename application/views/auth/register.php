<h1 class="h2">Create account</h1>
<p class="lead">Enter the information below to start translating</p>
<?php if( $message ) { ?>
	<div class="alert alert-warning"><?php echo $message; ?></div>
<?php } ?>
<hr>
<form action="register" method="post" data-loading-text="loading...">
	<div class="form-group">
		<input class="form-control" type="text" placeholder="First name" value="<?php echo $post["first_name"] ?? ""; ?>" name="first_name" />
	</div>
	<div class="form-group">
		<input class="form-control" type="text" placeholder="Last name" value="<?php echo $post["last_name"] ?? ""; ?>" name="last_name" />
	</div>
	<div class="form-group">
		<input class="form-control" type="email" placeholder="Email Address" value="<?php echo $post["email"] ?? ""; ?>" name="email" />
	</div>
	<div class="form-group">
		<input class="form-control" type="password" placeholder="Password" value="<?php echo $post["password"] ?? ""; ?>" name="password" />
		<div class="text-left">
			<small>Your password should be at least 8 characters</small>
		</div>
	</div>
	<div class="form-group">
		<input class="form-control" type="password" placeholder="Confirm password" value="<?php echo $post["password_confirm"] ?? ""; ?>" name="password_confirm" />
	</div>
	<div class="form-group text-left">
		<div class="form-check">
			<input class="form-check-input" type="checkbox" value="1" name="product_notify" id="product_notify" checked>
				<label class="form-check-label" for="product_notify">Notify me when new products are available</label>
		</div>
	</div>
	<button class="btn btn-lg btn-block btn-primary" role="button" type="submit">
		Create account
	</button>
	<small>By clicking 'Create Account' you agree to our <a href="#">Terms of Use</a>
	</small>
</form>
