<div class="container">
	<div class="row justify-content-center">
		<div class="col-xl-10 col-lg-11">
			<div class="page-header">
				<h1><?php echo $product["name"]; ?> <span class="badge badge-secondary text-light ml-1"><?php echo $project["language_name"]; ?></span></h1>
				<p class="lead"><?php echo $product["description"]; ?></p>
				<div class="d-flex align-items-center">
					<ul class="avatars">
						<?php foreach( $members as $member ) { ?>
							<li>
								<a href="#" data-toggle="tooltip" data-placement="top" title="<?php $member["first_name"] . " " . $member["last_name"]; ?>">
									<img class="avatar" src="<?php echo "https://www.gravatar.com/avatar/" . md5( strtolower( trim( $member["email"] ) ) ) . "?s=80&d=mp"; ?>" />
								</a>
							</li>
						<?php } ?>
					</ul>
				</div>
				<div>
					<div class="progress">
						<div class="progress-bar bg-success" style="width:<?php echo $project["percent_complete"]; ?>%;"></div>
					</div>
					<div class="d-flex justify-content-between text-small">
						<div class="d-flex align-items-center">
							<i class="material-icons">playlist_add_check</i>
							<span><?php echo $project["completed_strings"] . " / " . $project["total_strings"] . " (" . $project["percent_complete"] . "%)"; ?></span>
						</div>
						<span><?php echo $project["status"]; ?></span>
					</div>
				</div>
			</div>
			<ul class="nav nav-tabs nav-fill" role="tablist">
				<li class="nav-item">
					<a class="nav-link active" data-toggle="tab" href="#content" role="tab">Content</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" data-toggle="tab" href="#members" role="tab">Contributors</a>
				</li>
			</ul>
			
			<div class="tab-content">
				<div class="tab-pane fade show active" id="content" role="tabpanel">
					<div class="row content-list-head">
						<div class="col-auto">
							<h3>Content</h3>
						</div>
					</div>
					<div class="content-list-body">
						<div class="card-list">
							<div class="card-list-body">
								<?php foreach( $sections as $section ) { ?>
									<div class="card card-task">
										<div class="progress">
											<div class="progress-bar bg-success" role="progressbar" style="width: <?php echo $section["percent_complete"]; ?>%"></div>
										</div>
										<div class="card-body">
											<div class="card-title">
												<a href="/editor/<?php echo $project["id"]; ?>/<?php echo $section["id"]; ?>">
													<h6 data-filter-by="text"><?php echo $section["name"]; ?></h6>
												</a>
												<div class="d-flex align-items-center">
													<i class="material-icons">playlist_add_check</i>
													<span><?php echo $section["completed_strings"] . " / " . $section["total_strings"]; ?></span>
												</div>
											</div>
											<div class="card-meta">
												<a href="/editor/<?php echo $project["id"]; ?>/<?php echo $section["id"]; ?>" class="btn btn-secondary">Start Translating</a>
											</div>
										</div>
									</div>
								<?php } ?>
							</div>
						</div>
					</div>
				</div>
				<div class="tab-pane fade show" id="members" role="tabpanel">
					<div class="content-list">
						<div class="row content-list-head">
							<div class="col-auto">
								<h3>Contributors</h3>
								<?php if( $this->ion_auth->is_admin() ) { ?>
									<button class="btn btn-round" data-toggle="modal" data-target="#member-add-modal">
										<i class="material-icons">add</i>
									</button>
								<?php } ?>
							</div>
						</div>
						<div class="content-list-body row">
							<?php foreach( $members as $member ) { ?>
								<div class="col-6">
									<a class="media media-member">
										<img class="avatar avatar-lg" src="<?php echo "https://www.gravatar.com/avatar/" . md5( strtolower( trim( $member["email"] ) ) ) . "?s=144&d=mp"; ?>" />
										<div class="media-body">
											<h6 class="mb-0" data-filter-by="text"><?php echo $member["first_name"] . " " . $member["last_name"]; ?></h6>
											<span data-filter-by="text" class="text-body"><?php echo ucfirst( $member["type"] ); ?></span>
										</div>
									</a>
								</div>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<form class="modal fade" id="member-add-modal" data-project-id="<?php echo $project["id"]; ?>" tabindex="-1" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Add Member</h5>
				<button type="button" class="close btn btn-round" data-dismiss="modal" aria-label="Close">
					<i class="material-icons">close</i>
				</button>
			</div>
			<div class="modal-body">
				<div class="user-search">
					<div class="input-group input-group-round">
						<div class="input-group-prepend">
							<span class="input-group-text">
								<i class="material-icons">filter_list</i>
							</span>
						</div>
						<input type="search" class="form-control search" placeholder="Find users by name or email">
					</div>
					<div class="form-group-users user-list" style="overflow:visible"></div>
				</div>
			</div>
		</div>
	</div>
</form>