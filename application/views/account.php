<div class="container">
	<div class="row justify-content-center mt-5">
		<div class="col-lg-3 mb-3">
			<ul class="nav nav-tabs flex-lg-column">
				<li class="nav-item">
					<a class="nav-link active" id="profile-tab" data-toggle="tab" href="#profile">Profile</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" id="password-tab" data-toggle="tab" href="#password" role="tab">Password</a>
				</li>
				<?php if( $this->ion_auth->is_admin() && isset( $permission_groups ) ) { ?>
					<li class="nav-item">
						<a class="nav-link" id="permissions-tab" data-toggle="tab" href="#permissions" role="tab">Permissions</a>
					</li>
				<?php } ?>
			</ul>
		</div>
		<div class="col-xl-8 col-lg-9">
			<div class="card">
				<div class="card-body">
					<div class="tab-content">
						<div class="tab-pane fade show active" role="tabpanel" id="profile">
							<div class="media mb-4">
								<img alt="Image" src="<?php echo "https://www.gravatar.com/avatar/" . md5( strtolower( trim( $user->email ) ) ) . "?s=144&d=mp"; ?>" class="avatar avatar-lg" />
								<div class="media-body ml-3">
									<strong>Profile picture</strong><br>
									<small>To change your profile picture, visit <a href="https://en.gravatar.com/">Gravatar.com</a></small>
								</div>
							</div>
							<!--end of avatar-->
							<form class="auto-submit" action="/account/save" method="post" autocomplete="off">
								<div class="form-group row align-items-center">
									<label class="col-3">First Name</label>
									<div class="col">
										<input type="text" placeholder="First name" value="<?php echo $user->first_name; ?>" name="first_name" class="form-control" required />
									</div>
								</div>
								<div class="form-group row align-items-center">
									<label class="col-3">Last Name</label>
									<div class="col">
										<input type="text" placeholder="Last name" value="<?php echo $user->last_name; ?>" name="last_name" class="form-control" />
									</div>
								</div>
								<div class="form-group row align-items-center">
									<label class="col-3">Email</label>
									<div class="col">
										<input type="email" placeholder="Enter your email address" name="email" value="<?php echo $user->email; ?>" class="form-control" required />
									</div>
								</div>
								<div class="form-group row align-items-center">
									<label class="col-3">Location</label>
									<div class="col">
										<input type="text" placeholder="Enter your location" name="location" value="<?php echo $user->location; ?>" class="form-control" />
									</div>
								</div>
								<div class="form-group row">
									<label class="col-3">Bio</label>
									<div class="col">
										<textarea type="text" placeholder="Tell us a little about yourself" name="bio" class="form-control" rows="4"><?php echo $user->bio; ?></textarea>
										<small>This will be displayed on your public profile</small>
									</div>
								</div>
                                <input type="hidden" name="id" value="<?php echo $user->id; ?>">
								<div class="row justify-content-end">
									<button type="submit" class="btn btn-primary mr-2">Save</button>
								</div>
							</form>
						</div>
						<div class="tab-pane fade" role="tabpanel" id="password">
							<form action="/account/save_password" method="post" class="auto-submit">
								<?php if( ! $this->ion_auth->is_admin() ) { ?>
									<div class="form-group row align-items-center">
										<label class="col-3">Current Password</label>
										<div class="col">
											<input type="password" placeholder="Enter your current password" name="current_password" class="form-control" />
										</div>
									</div>
								<?php } ?>
								<div class="form-group row align-items-center">
									<label class="col-3">New Password</label>
									<div class="col">
										<input type="password" placeholder="Enter a new password" name="new_password" class="form-control" />
										<small>Password must be at least 8 characters long</small>
									</div>
								</div>
								<div class="form-group row align-items-center">
									<label class="col-3">Confirm Password</label>
									<div class="col">
										<input type="password" placeholder="Confirm your new password" name="confirm_password" class="form-control" />
									</div>
								</div>
                                <input type="hidden" name="id" value="<?php echo $user->id; ?>">
								<div class="row justify-content-end">
									<button type="submit" class="btn btn-primary mr-2">Change Password</button>
								</div>
							</form>
						</div>
						<?php if( $this->ion_auth->is_admin() && isset( $permission_groups ) ) { ?>
							<div class="tab-pane fade" role="tabpanel" id="permissions">
								<form action="/user/save_permissions" method="post" class="auto-submit">
									<h6>Site Permissions</h6>
									<div class="form-group row align-items-center">
										<label class="col-3">Permission level</label>
										<div class="col">
											<div class="input-group">
												<select name="group_id" class="custom-select">
													<?php foreach( $permission_groups as $group ) { ?>
														<option <?php echo $group["id"] == $user_group_id ? "selected" : ""; ?> value="<?php echo $group["id"]; ?>"><?php echo $group["description"]; ?></option>
													<?php } ?>
												</select>
											</div>
										</div>
									</div>
									<hr>
									<h6><?php echo $user->first_name . " " . $user->last_name; ?> contributes to the following projects</h6>
									<?php foreach( $membership as $project ) { ?>
										<a href="/projects/<?php echo $project["project_id"]; ?>" target="_blank"><?php echo $project["product_name"] . " (" . $project["language_name"] . ")"; ?></a><span class="badge badge-light text-secondary ml-1"><?php echo $project["member_type"]; ?></span>
									<?php } ?>
									<input type="hidden" name="user_id" value="<?php echo $user->id; ?>">
									<div class="row justify-content-end">
										<button type="submit" class="btn btn-primary mr-2">Save Permissions</button>
									</div>
								</form>
							</div>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>