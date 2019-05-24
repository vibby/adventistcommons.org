<div class="container">
	<div class="row justify-content-center">
		<div class="col-xl-10 col-lg-11">
			<div class="page-header d-flex justify-content-between align-items-center">
				<h1>Users</h1>
			</div>
			<div class="card p-4">
				<div class="table-responsive">
					<table class="table">
						<tr class="table-borderless">
							<th>Picture</th>
							<th>First name</th>
							<th>Last name</th>
							<th>Email</th>
							<th>Access Level</th>
							<th></th>
						</tr>
						<?php foreach ($users as $user):?>
							<tr>
								<td><img alt="Image" width="40" src="<?php echo "https://www.gravatar.com/avatar/" . md5( strtolower( trim( $user->email ) ) ) . "?s=80&d=mp"; ?>" class="avatar" /></td>
								<td><?php echo $user->first_name; ?></td>
								<td><?php echo $user->last_name; ?></td>
								<td><?php echo $user->email; ?></td>
								<td>
									<?php foreach( $user->groups as $group ) : ?>
										<?php echo $group->description; ?><br>
									<?php endforeach ?>
								</td>
								<td>
									<a href="<?php echo "/user/edit/" . $user->id; ?>" class="btn btn-sm btn-outline-secondary">Edit</a>
								</td>
							</tr>
						<?php endforeach;?>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

