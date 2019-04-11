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
									<img class="avatar" src="<?php echo "https://www.gravatar.com/avatar/" . md5( strtolower( trim( $member["email"] ) ) ) . "?s=80"; ?>" />
								</a>
							</li>
						<?php } ?>
					</ul>
				</div>
				<div>
					<div class="progress">
						<div class="progress-bar bg-success" style="width:<?php $project["percent_complete"]; ?>%;"></div>
					</div>
					<div class="d-flex justify-content-between text-small">
						<div class="d-flex align-items-center">
							<i class="material-icons">playlist_add_check</i>
							<span><?php echo $project["completed_strings"] . " / " . $project["total_strings"]; ?></span>
						</div>
						<span><?php echo $project["status"]; ?></span>
					</div>
				</div>
			</div>
			<div class="row content-list-head">
				<div class="col-auto">
					<h3>Content</h3>
				</div>
			</div>
			<!--end of content list head-->
			<div class="content-list-body">
				<div class="card-list">
					<div class="card-list-body">
						<?php foreach( $sections as $section ) { ?>
							<div class="card card-task">
								<div class="progress">
									<div class="progress-bar bg-danger" role="progressbar" style="width: <?php $section["percent_complete"]; ?>%"></div>
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
	</div>
</div>