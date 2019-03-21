<h1 class="h2">Forgot password &#x1f62B;</h1>
<p class="lead">Enter your email address to reset</p>
<?php if( $message ) { ?>
	<div class="alert alert-warning"><?php echo $message; ?></div>
<?php } ?>
<form action="forgot_password" method="post">
	<div class="form-group">
		<input class="form-control" type="email" placeholder="Email Address" name="identity" />
	</div>
	<button class="btn btn-lg btn-block btn-primary" role="button" type="submit">
		Send reset link
	</button>
</form>