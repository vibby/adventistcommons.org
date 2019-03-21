<h1><?php echo lang('reset_password_heading');?></h1>

<?php if( $message ) { ?>
	<div class="alert alert-warning"><?php echo $message; ?></div>
<?php } ?>

<form action="/reset_password/<?php echo $code; ?>" method="post">
	<div class="form-group">
		<input class="form-control" type="password" placeholder="New password" name="new_password" />
	</div>
	<div class="form-group">
		<input class="form-control" type="password" placeholder="Confirm new password" name="new_password_confirm" />
	</div>
	<?php echo form_input($user_id);?>
	<?php echo form_hidden($csrf); ?>
	<button class="btn btn-lg btn-block btn-primary" role="button" type="submit">
		Change password
	</button>
</form>
