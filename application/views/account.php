<div class="row justify-content-center mt-5">
	<div class="col-lg-3 mb-3">
		<ul class="nav nav-tabs flex-lg-column">
			<li class="nav-item">
				<a class="nav-link active" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="true">Profile</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" id="password-tab" data-toggle="tab" href="#password" role="tab" aria-controls="password" aria-selected="false">Password</a>
			</li>
		</ul>
	</div>
	<div class="col-xl-8 col-lg-9">
		<div class="card">
			<div class="card-body">
				<div class="tab-content">
					<div class="tab-pane fade show active" role="tabpanel" id="profile" aria-labelledby="profile-tab">
						<div class="media mb-4">
							<img alt="Image" src="<?php echo "https://www.gravatar.com/avatar/" . md5( strtolower( trim( $this->ion_auth->user()->row()->email ) ) ) . "?s=144"; ?>" class="avatar avatar-lg" />
							<div class="media-body ml-3">
								<strong>Profile picture</strong><br>
								<small>To change your profile picture, visit <a href="https://en.gravatar.com/">Gravatar.com</a></small>
							</div>
						</div>
						<!--end of avatar-->
						<form class="auto-submit" action="/account/save" method="post">
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
							<div class="row justify-content-end">
								<button type="submit" class="btn btn-primary mr-2">Save</button>
							</div>
						</form>
					</div>
					<div class="tab-pane fade" role="tabpanel" id="password" aria-labelledby="password-tab">
						<form action="/account/save_password" method="post" class="auto-submit">
							<div class="form-group row align-items-center">
								<label class="col-3">Current Password</label>
								<div class="col">
									<input type="password" placeholder="Enter your current password" name="current_password" class="form-control" />
								</div>
							</div>
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
							<div class="row justify-content-end">
								<button type="submit" class="btn btn-primary mr-2">Change Password</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>